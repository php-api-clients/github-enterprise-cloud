<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Codespaces;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\CodespacesOrgSecret;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetOrgSecret
{
    public const OPERATION_ID    = 'codespaces/get-org-secret';
    public const OPERATION_MATCH = 'GET /orgs/{org}/codespaces/secrets/{secret_name}';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/codespaces/secrets/{secret_name}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Codespaces\Secrets\SecretName $hydrator)
    {
    }

    /**
     * @return PromiseInterface<CodespacesOrgSecret>
     **/
    public function call(string $org, string $secretName): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Codespaces\GetOrgSecret($this->responseSchemaValidator, $this->hydrator, $org, $secretName);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): CodespacesOrgSecret {
            return $operation->createResponse($response);
        });
    }
}