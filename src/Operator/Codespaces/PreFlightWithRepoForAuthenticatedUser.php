<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Codespaces;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Codespaces\PreFlightWithRepoForAuthenticatedUser\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class PreFlightWithRepoForAuthenticatedUser
{
    public const OPERATION_ID    = 'codespaces/pre-flight-with-repo-for-authenticated-user';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/codespaces/new';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/codespaces/new';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Codespaces\New_ $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Ok>
     **/
    public function call(string $owner, string $repo, string $ref, string $clientIp): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Codespaces\PreFlightWithRepoForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $ref, $clientIp);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok {
            return $operation->createResponse($response);
        });
    }
}