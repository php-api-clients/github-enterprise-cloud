<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final class ListEnvironmentSecrets
{
    public const OPERATION_ID = 'actions/list-environment-secrets';
    public const OPERATION_MATCH = 'GET /repositories/{repository_id}/environments/{environment_name}/secrets';
    private const METHOD = 'GET';
    private const PATH = '/repositories/{repository_id}/environments/{environment_name}/secrets';
    /**The unique identifier of the repository.**/
    private int $repository_id;
    /**The name of the environment.**/
    private string $environment_name;
    /**The number of results per page (max 100).**/
    private int $per_page;
    /**Page number of the results to fetch.**/
    private int $page;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Repositories\CbRepositoryIdRcb\Environments\CbEnvironmentNameRcb\Secrets $hydrator, int $repository_id, string $environment_name, int $per_page = 30, int $page = 1)
    {
        $this->repository_id = $repository_id;
        $this->environment_name = $environment_name;
        $this->per_page = $per_page;
        $this->page = $page;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{repository_id}', '{environment_name}', '{per_page}', '{page}'), array($this->repository_id, $this->environment_name, $this->per_page, $this->page), self::PATH . '?per_page={per_page}&page={page}'));
    }
    /**
     * @return Schema\Operation\Actions\ListRepoSecrets\Response\Applicationjson\H200
     */
    function createResponse(\Psr\Http\Message\ResponseInterface $response) : Schema\Operation\Actions\ListRepoSecrets\Response\Applicationjson\H200
    {
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        $body = json_decode($response->getBody()->getContents(), true);
        switch ($response->getStatusCode()) {
            /**Response**/
            case 200:
                switch ($contentType) {
                    case 'application/json':
                        $this->responseSchemaValidator->validate($body, \cebe\openapi\Reader::readFromJson(Schema\Operation\Actions\ListRepoSecrets\Response\Applicationjson\H200::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        return $this->hydrator->hydrateObject(Schema\Operation\Actions\ListRepoSecrets\Response\Applicationjson\H200::class, $body);
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
