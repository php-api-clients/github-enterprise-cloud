<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operator\Actions;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class AddRepoAccessToSelfHostedRunnerGroupInOrg
{
    public const OPERATION_ID    = 'actions/add-repo-access-to-self-hosted-runner-group-in-org';
    public const OPERATION_MATCH = 'PUT /orgs/{org}/actions/runner-groups/{runner_group_id}/repositories/{repository_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return array{code:int} */
    public function call(string $org, int $runnerGroupId, int $repositoryId): array
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Actions\AddRepoAccessToSelfHostedRunnerGroupInOrg($org, $runnerGroupId, $repositoryId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}