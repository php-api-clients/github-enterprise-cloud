<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Interactions;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\InteractionLimitResponse;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class SetRestrictionsForAuthenticatedUser
{
    public const OPERATION_ID    = 'interactions/set-restrictions-for-authenticated-user';
    public const OPERATION_MATCH = 'PUT /user/interaction-limits';
    private const METHOD         = 'PUT';
    private const PATH           = '/user/interaction-limits';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\User\InteractionLimits $hydrator)
    {
    }

    /**
     * @return PromiseInterface<InteractionLimitResponse>
     **/
    public function call(array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Interactions\SetRestrictionsForAuthenticatedUser($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): InteractionLimitResponse {
            return $operation->createResponse($response);
        });
    }
}