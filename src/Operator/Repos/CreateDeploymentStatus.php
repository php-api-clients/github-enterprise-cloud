<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Repos;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\DeploymentStatus;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class CreateDeploymentStatus
{
    public const OPERATION_ID    = 'repos/create-deployment-status';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/deployments/{deployment_id}/statuses';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/deployments/{deployment_id}/statuses';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Deployments\DeploymentId\Statuses $hydrator)
    {
    }

    /**
     * @return PromiseInterface<DeploymentStatus>
     **/
    public function call(string $owner, string $repo, int $deploymentId, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Repos\CreateDeploymentStatus($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $deploymentId);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): DeploymentStatus {
            return $operation->createResponse($response);
        });
    }
}