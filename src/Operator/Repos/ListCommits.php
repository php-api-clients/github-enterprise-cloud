<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Repos;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListCommits
{
    public const OPERATION_ID    = 'repos/list-commits';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/commits';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/commits';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Commits $hydrator)
    {
    }

    /**
     * @return PromiseInterface<mixed>
     **/
    public function call(string $owner, string $repo, string $sha, string $path, string $author, string $committer, string $since, string $until, int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Repos\ListCommits($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $sha, $path, $author, $committer, $since, $until, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): mixed {
            return $operation->createResponse($response);
        });
    }
}