<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operator\Pulls;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\PullRequestReviewComment;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class CreateReviewComment
{
    public const OPERATION_ID    = 'pulls/create-review-comment';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/pulls/{pull_number}/comments';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\Pulls\PullNumber\Comments $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo, int $pullNumber, array $params): PullRequestReviewComment
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Pulls\CreateReviewComment($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $pullNumber);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): PullRequestReviewComment {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
