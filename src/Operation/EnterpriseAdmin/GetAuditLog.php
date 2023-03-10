<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Operation\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final class GetAuditLog
{
    public const OPERATION_ID = 'enterprise-admin/get-audit-log';
    public const OPERATION_MATCH = 'GET /enterprises/{enterprise}/audit-log';
    private const METHOD = 'GET';
    private const PATH = '/enterprises/{enterprise}/audit-log';
    /**The slug version of the enterprise name. You can also substitute this value with the enterprise id.**/
    private string $enterprise;
    /**A search phrase. For more information, see [Searching the audit log](https://docs.github.com/enterprise-cloud@latest//admin/monitoring-activity-in-your-enterprise/reviewing-audit-logs-for-your-enterprise/searching-the-audit-log-for-your-enterprise#searching-the-audit-log).**/
    private string $phrase;
    /**The event types to include:
    
    - `web` - returns web (non-Git) events.
    - `git` - returns Git events.
    - `all` - returns both web and Git events.
    
    The default is `web`.**/
    private string $include;
    /**A cursor, as given in the [Link header](https://docs.github.com/enterprise-cloud@latest//rest/overview/resources-in-the-rest-api#link-header). If specified, the query only searches for events after this cursor.**/
    private string $after;
    /**A cursor, as given in the [Link header](https://docs.github.com/enterprise-cloud@latest//rest/overview/resources-in-the-rest-api#link-header). If specified, the query only searches for events before this cursor.**/
    private string $before;
    /**The order of audit log events. To list newest events first, specify `desc`. To list oldest events first, specify `asc`.
    
    The default is `desc`.**/
    private string $order;
    /**Page number of the results to fetch.**/
    private int $page;
    /**The number of results per page (max 100).**/
    private int $per_page;
    private readonly \League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator;
    private readonly Hydrator\Operation\Enterprises\CbEnterpriseRcb\AuditLog $hydrator;
    public function __construct(\League\OpenAPIValidation\Schema\SchemaValidator $responseSchemaValidator, Hydrator\Operation\Enterprises\CbEnterpriseRcb\AuditLog $hydrator, string $enterprise, string $phrase, string $include, string $after, string $before, string $order, int $page = 1, int $per_page = 30)
    {
        $this->enterprise = $enterprise;
        $this->phrase = $phrase;
        $this->include = $include;
        $this->after = $after;
        $this->before = $before;
        $this->order = $order;
        $this->page = $page;
        $this->per_page = $per_page;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrator = $hydrator;
    }
    function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{enterprise}', '{phrase}', '{include}', '{after}', '{before}', '{order}', '{page}', '{per_page}'), array($this->enterprise, $this->phrase, $this->include, $this->after, $this->before, $this->order, $this->page, $this->per_page), self::PATH . '?phrase={phrase}&include={include}&after={after}&before={before}&order={order}&page={page}&per_page={per_page}'));
    }
    /**
     * @return \Rx\Observable<Schema\AuditLogEvent>
     */
    function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Rx\Observable
    {
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        $body = json_decode($response->getBody()->getContents(), true);
        switch ($response->getStatusCode()) {
            /**Response**/
            case 200:
                switch ($contentType) {
                    case 'application/json':
                        foreach ($body as $bodyItem) {
                            $this->responseSchemaValidator->validate($bodyItem, \cebe\openapi\Reader::readFromJson(Schema\AuditLogEvent::SCHEMA_JSON, '\\cebe\\openapi\\spec\\Schema'));
                        }
                        return \Rx\Observable::fromArray($body, new \Rx\Scheduler\ImmediateScheduler())->map(function (array $body) : Schema\AuditLogEvent {
                            return $this->hydrator->hydrateObject(Schema\AuditLogEvent::class, $body);
                        });
                }
                break;
        }
        throw new \RuntimeException('Unable to find matching response code and content type');
    }
}
