<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;
use Rx\Observable;

final readonly class DownloadArtifactStreaming
{
    public const OPERATION_ID    = 'actions/download-artifact';
    public const OPERATION_MATCH = 'STREAM /repos/{owner}/{repo}/actions/artifacts/{artifact_id}/{archive_format}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/actions/artifacts/{artifact_id}/{archive_format}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Actions\Artifacts\ArtifactId\ArchiveFormat $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Observable>
     **/
    public function call(string $owner, string $repo, int $artifactId, string $archiveFormat): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\DownloadArtifactStreaming($this->responseSchemaValidator, $this->hydrator, $this->browser, $owner, $repo, $artifactId, $archiveFormat);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable {
            return $operation->createResponse($response);
        });
    }
}