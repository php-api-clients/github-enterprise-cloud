<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class SetSelectedReposToRequiredWorkflow
{
    public const OPERATION_ID    = 'actions/set-selected-repos-to-required-workflow';
    public const OPERATION_MATCH = 'PUT /orgs/{org}/actions/required_workflows/{required_workflow_id}/repositories';
    private const METHOD         = 'PUT';
    private const PATH           = '/orgs/{org}/actions/required_workflows/{required_workflow_id}/repositories';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(string $org, int $requiredWorkflowId, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\SetSelectedReposToRequiredWorkflow($this->requestSchemaValidator, $org, $requiredWorkflowId);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}