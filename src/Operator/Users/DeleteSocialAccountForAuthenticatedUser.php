<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Users;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteSocialAccountForAuthenticatedUser
{
    public const OPERATION_ID    = 'users/delete-social-account-for-authenticated-user';
    public const OPERATION_MATCH = 'DELETE /user/social_accounts';
    private const METHOD         = 'DELETE';
    private const PATH           = '/user/social_accounts';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\SocialAccounts $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Users\DeleteSocialAccountForAuthenticatedUser($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}