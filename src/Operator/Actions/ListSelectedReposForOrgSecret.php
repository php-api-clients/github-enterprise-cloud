<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Actions\ListSelectedReposForOrgSecret\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListSelectedReposForOrgSecret
{
    public const OPERATION_ID    = 'actions/list-selected-repos-for-org-secret';
    public const OPERATION_MATCH = 'GET /orgs/{org}/actions/secrets/{secret_name}/repositories';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/actions/secrets/{secret_name}/repositories';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Orgs\Org\Actions\Secrets\SecretName\Repositories $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Ok>
     **/
    public function call(string $org, string $secretName, int $page = 1, int $perPage = 30): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\ListSelectedReposForOrgSecret($this->responseSchemaValidator, $this->hydrator, $org, $secretName, $page, $perPage);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok {
            return $operation->createResponse($response);
        });
    }
}