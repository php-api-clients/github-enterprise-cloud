<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Users;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Key;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetPublicSshKeyForAuthenticatedUser
{
    public const OPERATION_ID    = 'users/get-public-ssh-key-for-authenticated-user';
    public const OPERATION_MATCH = 'GET /user/keys/{key_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/user/keys/{key_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\Keys\KeyId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<(Key|array)>
     **/
    public function call(int $keyId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Users\GetPublicSshKeyForAuthenticatedUser($this->responseSchemaValidator, $this->hydrator, $keyId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Key|array {
            return $operation->createResponse($response);
        });
    }
}