<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Teams;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\GroupMapping;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class CreateOrUpdateIdpGroupConnectionsLegacy
{
    public const OPERATION_ID    = 'teams/create-or-update-idp-group-connections-legacy';
    public const OPERATION_MATCH = 'PATCH /teams/{team_id}/team-sync/group-mappings';
    private const METHOD         = 'PATCH';
    private const PATH           = '/teams/{team_id}/team-sync/group-mappings';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Teams\TeamId\TeamSync\GroupMappings $hydrator)
    {
    }

    /**
     * @return PromiseInterface<GroupMapping>
     **/
    public function call(int $teamId, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Teams\CreateOrUpdateIdpGroupConnectionsLegacy($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $teamId);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): GroupMapping {
            return $operation->createResponse($response);
        });
    }
}