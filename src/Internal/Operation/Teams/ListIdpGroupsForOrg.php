<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Teams;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function explode;
use function json_decode;
use function str_replace;

final class ListIdpGroupsForOrg
{
    public const OPERATION_ID    = 'teams/list-idp-groups-for-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/team-sync/groups';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/team-sync/groups';
    /**The organization name. The name is not case sensitive. **/
    private string $org;
    /**Page token **/
    private string $page;
    /**Filters the results to return only those that begin with the value specified by this parameter. For example, a value of `ab` will return results that begin with "ab". **/
    private string $q;
    /**The number of results per page (max 100). **/
    private int $perPage;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Internal\Hydrator\Operation\Orgs\Org\TeamSync\Groups $hydrator, string $org, string $page, string $q, int $perPage = 30)
    {
        $this->org     = $org;
        $this->page    = $page;
        $this->q       = $q;
        $this->perPage = $perPage;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{org}', '{page}', '{q}', '{per_page}'], [$this->org, $this->page, $this->q, $this->perPage], self::PATH . '?page={page}&q={q}&per_page={per_page}'));
    }

    public function createResponse(ResponseInterface $response): Schema\GroupMapping
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response
                     **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\GroupMapping::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\GroupMapping::class, $body);
                }

                break;
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}