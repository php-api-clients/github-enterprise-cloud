<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\RequiredWorkflow;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetRequiredWorkflow
{
    public const OPERATION_ID    = 'actions/get-required-workflow';
    public const OPERATION_MATCH = 'GET /orgs/{org}/actions/required_workflows/{required_workflow_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/actions/required_workflows/{required_workflow_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Actions\RequiredWorkflows\RequiredWorkflowId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<RequiredWorkflow>
     **/
    public function call(string $org, int $requiredWorkflowId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\GetRequiredWorkflow($this->responseSchemaValidator, $this->hydrator, $org, $requiredWorkflowId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): RequiredWorkflow {
            return $operation->createResponse($response);
        });
    }
}