<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Issues;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Issue;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class Update
{
    public const OPERATION_ID    = 'issues/update';
    public const OPERATION_MATCH = 'PATCH /repos/{owner}/{repo}/issues/{issue_number}';
    private const METHOD         = 'PATCH';
    private const PATH           = '/repos/{owner}/{repo}/issues/{issue_number}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Issues\IssueNumber $hydrator)
    {
    }

    /**
     * @return PromiseInterface<(Issue|BasicError)>
     **/
    public function call(string $owner, string $repo, int $issueNumber, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Issues\Update($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $issueNumber);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Issue|BasicError {
            return $operation->createResponse($response);
        });
    }
}