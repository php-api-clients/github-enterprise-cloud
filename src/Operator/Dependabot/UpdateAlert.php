<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Dependabot;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\DependabotAlert;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class UpdateAlert
{
    public const OPERATION_ID    = 'dependabot/update-alert';
    public const OPERATION_MATCH = 'PATCH /repos/{owner}/{repo}/dependabot/alerts/{alert_number}';
    private const METHOD         = 'PATCH';
    private const PATH           = '/repos/{owner}/{repo}/dependabot/alerts/{alert_number}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Dependabot\Alerts\AlertNumber $hydrator)
    {
    }

    /**
     * @return PromiseInterface<DependabotAlert>
     **/
    public function call(string $owner, string $repo, int $alertNumber, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Dependabot\UpdateAlert($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $alertNumber);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): DependabotAlert {
            return $operation->createResponse($response);
        });
    }
}