<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operator\Users;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class SetPrimaryEmailVisibilityForAuthenticatedUser
{
    public const OPERATION_ID    = 'users/set-primary-email-visibility-for-authenticated-user';
    public const OPERATION_MATCH = 'PATCH /user/email/visibility';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\User\Email\Visibility $hydrator)
    {
    }

    /** @return Observable<Schema\Email>|array{code:int} */
    public function call(array $params): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Users\SetPrimaryEmailVisibilityForAuthenticatedUser($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}