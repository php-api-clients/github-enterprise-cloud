<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\EnterpriseAdmin;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class AddSelfHostedRunnerToGroupForEnterprise
{
    public const OPERATION_ID    = 'enterprise-admin/add-self-hosted-runner-to-group-for-enterprise';
    public const OPERATION_MATCH = 'PUT /enterprises/{enterprise}/actions/runner-groups/{runner_group_id}/runners/{runner_id}';
    private const METHOD         = 'PUT';
    private const PATH           = '/enterprises/{enterprise}/actions/runner-groups/{runner_group_id}/runners/{runner_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(string $enterprise, int $runnerGroupId, int $runnerId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\EnterpriseAdmin\AddSelfHostedRunnerToGroupForEnterprise($enterprise, $runnerGroupId, $runnerId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}