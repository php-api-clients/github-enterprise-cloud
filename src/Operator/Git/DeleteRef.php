<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Git;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteRef
{
    public const OPERATION_ID    = 'git/delete-ref';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/git/refs/{ref}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/git/refs/{ref}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Git\Refs\Ref $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(string $owner, string $repo, string $ref): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Git\DeleteRef($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $ref);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}