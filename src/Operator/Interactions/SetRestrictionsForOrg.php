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

final readonly class SetRestrictionsForOrg
{
    public const OPERATION_ID    = 'interactions/set-restrictions-for-org';
    public const OPERATION_MATCH = 'PUT /orgs/{org}/interaction-limits';
    private const METHOD         = 'PUT';
    private const PATH           = '/orgs/{org}/interaction-limits';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\InteractionLimits $hydrator)
    {
    }

    /**
     * @return PromiseInterface<InteractionLimitResponse>
     **/
    public function call(string $org, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Interactions\SetRestrictionsForOrg($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $org);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): InteractionLimitResponse {
            return $operation->createResponse($response);
        });
    }
}