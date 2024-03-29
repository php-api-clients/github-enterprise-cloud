<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Migrations;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use React\Http\Browser;
use React\Stream\ReadableStreamInterface;
use RingCentral\Psr7\Request;
use RuntimeException;
use Rx\Observable;
use Rx\Subject\Subject;
use Throwable;

use function explode;
use function json_decode;
use function str_replace;

final class DownloadArchiveForOrgStreaming
{
    public const OPERATION_ID    = 'migrations/download-archive-for-org';
    public const OPERATION_MATCH = 'STREAM /orgs/{org}/migrations/{migration_id}/archive';
    /**The organization name. The name is not case sensitive. **/
    private string $org;
    /**The unique identifier of the migration. **/
    private int $migrationId;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Internal\Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Archive $hydrator, private readonly Browser $browser, string $org, int $migrationId)
    {
        $this->org         = $org;
        $this->migrationId = $migrationId;
    }

    public function createRequest(): RequestInterface
    {
        return new Request('GET', str_replace(['{org}', '{migration_id}'], [$this->org, $this->migrationId], '/orgs/{org}/migrations/{migration_id}/archive'));
    }

    /** @return Observable<string> */
    public function createResponse(ResponseInterface $response): Observable
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Resource not found
                     **/
                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(404, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

        switch ($code) {
            /**
             * Response
             **/
            case 302:
                $stream = new Subject();
                $this->browser->requestStreaming('GET', $response->getHeaderLine('location'))->then(static function (ResponseInterface $response) use ($stream): void {
                    $body = $response->getBody();
                    if (! ($body instanceof StreamInterface && $body instanceof ReadableStreamInterface)) {
                        $stream->onError(new RuntimeException());

                        return;
                    }

                    $body->on('data', static function (string $data) use ($stream): void {
                        $stream->onNext($data);
                    });
                    $body->on('close', static function () use ($stream): void {
                        $stream->onCompleted();
                    });
                    $body->on('error', static function (Throwable $error) use ($stream): void {
                        $stream->onError($error);
                    });
                });

                return $stream;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
