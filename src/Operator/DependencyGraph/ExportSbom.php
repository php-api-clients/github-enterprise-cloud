<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\DependencyGraph;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\DependencyGraphSpdxSbom;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ExportSbom
{
    public const OPERATION_ID    = 'dependency-graph/export-sbom';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/dependency-graph/sbom';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/dependency-graph/sbom';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\DependencyGraph\Sbom $hydrator)
    {
    }

    /**
     * @return PromiseInterface<DependencyGraphSpdxSbom>
     **/
    public function call(string $owner, string $repo): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\DependencyGraph\ExportSbom($this->responseSchemaValidator, $this->hydrator, $owner, $repo);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): DependencyGraphSpdxSbom {
            return $operation->createResponse($response);
        });
    }
}