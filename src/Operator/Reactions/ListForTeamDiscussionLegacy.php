<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Reactions;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListForTeamDiscussionLegacy
{
    public const OPERATION_ID    = 'reactions/list-for-team-discussion-legacy';
    public const OPERATION_MATCH = 'GET /teams/{team_id}/discussions/{discussion_number}/reactions';
    private const METHOD         = 'GET';
    private const PATH           = '/teams/{team_id}/discussions/{discussion_number}/reactions';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /**
     * @return PromiseInterface<ResponseInterface>
     **/
    public function call(int $teamId, int $discussionNumber, string $content, int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Reactions\ListForTeamDiscussionLegacy($teamId, $discussionNumber, $content, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ResponseInterface {
            return $operation->createResponse($response);
        });
    }
}