<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WorkflowUsage;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetWorkflowUsage
{
    public const OPERATION_ID    = 'actions/get-workflow-usage';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/actions/workflows/{workflow_id}/timing';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/actions/workflows/{workflow_id}/timing';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Actions\Workflows\WorkflowId\Timing $hydrator)
    {
    }

    /**
     * @return PromiseInterface<WorkflowUsage>
     **/
    public function call(string $owner, string $repo, $workflowId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\GetWorkflowUsage($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $workflowId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): WorkflowUsage {
            return $operation->createResponse($response);
        });
    }
}