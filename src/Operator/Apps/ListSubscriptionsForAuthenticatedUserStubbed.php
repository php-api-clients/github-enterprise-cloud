<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Apps;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListSubscriptionsForAuthenticatedUserStubbed
{
    public const OPERATION_ID    = 'apps/list-subscriptions-for-authenticated-user-stubbed';
    public const OPERATION_MATCH = 'GET /user/marketplace_purchases/stubbed';
    private const METHOD         = 'GET';
    private const PATH           = '/user/marketplace_purchases/stubbed';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\MarketplacePurchases\Stubbed $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Apps\ListSubscriptionsForAuthenticatedUserStubbed($this->responseSchemaValidator, $this->hydrator, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}