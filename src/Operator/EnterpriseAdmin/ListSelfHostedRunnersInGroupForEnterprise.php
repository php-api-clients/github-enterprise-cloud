<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\EnterpriseAdmin\ListSelfHostedRunnersInGroupForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListSelfHostedRunnersInGroupForEnterprise
{
    public const OPERATION_ID    = 'enterprise-admin/list-self-hosted-runners-in-group-for-enterprise';
    public const OPERATION_MATCH = 'GET /enterprises/{enterprise}/actions/runner-groups/{runner_group_id}/runners';
    private const METHOD         = 'GET';
    private const PATH           = '/enterprises/{enterprise}/actions/runner-groups/{runner_group_id}/runners';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Enterprises\Enterprise\Actions\RunnerGroups\RunnerGroupId\Runners $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Ok>
     **/
    public function call(string $enterprise, int $runnerGroupId, int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\EnterpriseAdmin\ListSelfHostedRunnersInGroupForEnterprise($this->responseSchemaValidator, $this->hydrator, $enterprise, $runnerGroupId, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok {
            return $operation->createResponse($response);
        });
    }
}