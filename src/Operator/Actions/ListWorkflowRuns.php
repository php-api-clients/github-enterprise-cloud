<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Actions\ListWorkflowRuns\Response\ApplicationJson\Ok\Application\Json;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListWorkflowRuns
{
    public const OPERATION_ID    = 'actions/list-workflow-runs';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/actions/workflows/{workflow_id}/runs';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/actions/workflows/{workflow_id}/runs';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Actions\Workflows\WorkflowId\Runs $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Json>
     **/
    public function call(string $owner, string $repo, $workflowId, string $actor, string $branch, string $event, string $status, string $created, int $checkSuiteId, string $headSha, int $perPage = 30, int $page = 1, bool $excludePullRequests = false): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\ListWorkflowRuns($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $workflowId, $actor, $branch, $event, $status, $created, $checkSuiteId, $headSha, $perPage, $page, $excludePullRequests);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Json {
            return $operation->createResponse($response);
        });
    }
}