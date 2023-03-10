<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Operation\Teams;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final class ListLinkedExternalIdpGroupsToTeamForOrg
{
    public const OPERATION_ID = 'teams/list-linked-external-idp-groups-to-team-for-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/teams/{team_slug}/external-groups';
    private const METHOD = 'GET';
    private const PATH = '/orgs/{org}/teams/{team_slug}/external-groups';
    /**The organization name. The name is not case sensitive.**/
    private string $org;
    /**The slug of the team name.**/
    private string $team_slug;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\ExternalDashGroups $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Orgs\CbOrgRcb\Teams\CbTeamSlugRcb\ExternalDashGroups $hydrator, string $org, string $team_slug)
    {
        $this->org = $org;
        $this->team_slug = $team_slug;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{org}', '{team_slug}'), array($this->org, $this->team_slug), self::PATH));
    }
    /**
     * @return Schema\ExternalGroups
     */
    function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\ExternalGroups
    {
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        $body = json_decode($response->getBody()->getContents(), true);
        switch ($response->getStatusCode()) {
            /**Response**/
            case 200:
                switch ($contentType) {
                    case 'application/json':
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\ExternalGroups::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\ExternalGroups::class, $body);
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
