<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Pulls;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\PullRequestReview;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class CreateReview
{
    public const OPERATION_ID    = 'pulls/create-review';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/pulls/{pull_number}/reviews';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/pulls/{pull_number}/reviews';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Pulls\PullNumber\Reviews $hydrator)
    {
    }

    /**
     * @return PromiseInterface<PullRequestReview>
     **/
    public function call(string $owner, string $repo, int $pullNumber, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Pulls\CreateReview($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $pullNumber);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): PullRequestReview {
            return $operation->createResponse($response);
        });
    }
}