<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Repos;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Status;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class CreateCommitStatus
{
    public const OPERATION_ID    = 'repos/create-commit-status';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/statuses/{sha}';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/statuses/{sha}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Statuses\Sha $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Status>
     **/
    public function call(string $owner, string $repo, string $sha, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Repos\CreateCommitStatus($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $sha);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Status {
            return $operation->createResponse($response);
        });
    }
}