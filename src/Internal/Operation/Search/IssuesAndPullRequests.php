<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Search;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function explode;
use function json_decode;
use function str_replace;

final class IssuesAndPullRequests
{
    public const OPERATION_ID    = 'search/issues-and-pull-requests';
    public const OPERATION_MATCH = 'GET /search/issues';
    private const METHOD         = 'GET';
    private const PATH           = '/search/issues';
    /**The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub Enterprise Cloud. The REST API supports the same qualifiers as the web interface for GitHub Enterprise Cloud. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/enterprise-cloud@latest//rest/search/search#constructing-a-search-query). See "[Searching issues and pull requests](https://docs.github.com/enterprise-cloud@latest//search-github/searching-on-github/searching-issues-and-pull-requests)" for a detailed list of qualifiers. **/
    private string $q;
    /**Sorts the results of your query by the number of `comments`, `reactions`, `reactions-+1`, `reactions--1`, `reactions-smile`, `reactions-thinking_face`, `reactions-heart`, `reactions-tada`, or `interactions`. You can also sort results by how recently the items were `created` or `updated`, Default: [best match](https://docs.github.com/enterprise-cloud@latest//rest/search/search#ranking-search-results) **/
    private string $sort;
    /**Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`. **/
    private string $order;
    /**The number of results per page (max 100). **/
    private int $perPage;
    /**Page number of the results to fetch. **/
    private int $page;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Internal\Hydrator\Operation\Search\Issues $hydrator, string $q, string $sort, string $order = 'desc', int $perPage = 30, int $page = 1)
    {
        $this->q       = $q;
        $this->sort    = $sort;
        $this->order   = $order;
        $this->perPage = $perPage;
        $this->page    = $page;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{q}', '{sort}', '{order}', '{per_page}', '{page}'], [$this->q, $this->sort, $this->order, $this->perPage, $this->page], self::PATH . '?q={q}&sort={sort}&order={order}&per_page={per_page}&page={page}'));
    }

    /** @return Schema\Operations\Search\IssuesAndPullRequests\Response\ApplicationJson\Ok|array{code: int} */
    public function createResponse(ResponseInterface $response): Schema\Operations\Search\IssuesAndPullRequests\Response\ApplicationJson\Ok|array
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response
                     **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operations\Search\IssuesAndPullRequests\Response\ApplicationJson\Ok::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\Operations\Search\IssuesAndPullRequests\Response\ApplicationJson\Ok::class, $body);
                    /**
                     * Service unavailable
                     **/

                    case 503:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\Operations\CodeScanning\ListAlertsForEnterprise\Response\ApplicationJson\ServiceUnavailable::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\Operations\CodeScanning\ListAlertsForEnterprise\Response\ApplicationJson\ServiceUnavailable(503, $this->hydrator->hydrateObject(Schema\Operations\CodeScanning\ListAlertsForEnterprise\Response\ApplicationJson\ServiceUnavailable::class, $body));
                    /**
                     * Validation failed, or the endpoint has been spammed.
                     **/

                    case 422:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ValidationError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ValidationError(422, $this->hydrator->hydrateObject(Schema\ValidationError::class, $body));
                    /**
                     * Forbidden
                     **/

                    case 403:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\BasicError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\BasicError(403, $this->hydrator->hydrateObject(Schema\BasicError::class, $body));
                }

                break;
        }

        switch ($code) {
            /**
             * Not modified
             **/
            case 304:
                return ['code' => 304];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}