<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Scim;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;
use cebe\openapi\Reader;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function explode;
use function json_decode;
use function str_replace;

final class GetProvisioningInformationForUser
{
    public const OPERATION_ID    = 'scim/get-provisioning-information-for-user';
    public const OPERATION_MATCH = 'GET /scim/v2/organizations/{org}/Users/{scim_user_id}';
    /**The organization name. The name is not case sensitive. **/
    private string $org;
    /**The unique identifier of the SCIM user. **/
    private string $scimUserId;

    public function __construct(private readonly SchemaValidator $responseSchemaValidator, private readonly Internal\Hydrator\Operation\Scim\V2\Organizations\Org\Users\ScimUserId $hydrator, string $org, string $scimUserId)
    {
        $this->org        = $org;
        $this->scimUserId = $scimUserId;
    }

    public function createRequest(): RequestInterface
    {
        return new Request('GET', str_replace(['{org}', '{scim_user_id}'], [$this->org, $this->scimUserId], '/scim/v2/organizations/{org}/Users/{scim_user_id}'));
    }

    public function createResponse(ResponseInterface $response): Schema\ScimUser|WithoutBody
    {
        $code          = $response->getStatusCode();
        [$contentType] = explode(';', $response->getHeaderLine('Content-Type'));
        switch ($contentType) {
            case 'application/json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Resource not found
                     **/
                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ScimError(404, $this->hydrator->hydrateObject(Schema\ScimError::class, $body));
                    /**
                     * Forbidden
                     **/

                    case 403:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ScimError(403, $this->hydrator->hydrateObject(Schema\ScimError::class, $body));
                }

                break;
            case 'application/scim+json':
                $body = json_decode($response->getBody()->getContents(), true);
                switch ($code) {
                    /**
                     * Response
                     **/
                    case 200:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimUser::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        return $this->hydrator->hydrateObject(Schema\ScimUser::class, $body);
                    /**
                     * Resource not found
                     **/

                    case 404:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ScimError(404, $this->hydrator->hydrateObject(Schema\ScimError::class, $body));
                    /**
                     * Forbidden
                     **/

                    case 403:
                        $this->responseSchemaValidator->validate($body, Reader::readFromJson(Schema\ScimError::SCHEMA_JSON, \cebe\openapi\spec\Schema::class));

                        throw new ErrorSchemas\ScimError(403, $this->hydrator->hydrateObject(Schema\ScimError::class, $body));
                }

                break;
        }

        switch ($code) {
            /**
             * Not modified
             **/
            case 304:
                return new WithoutBody(304, []);
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}
