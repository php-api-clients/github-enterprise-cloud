<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\EnterpriseAdmin;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class SetCustomLabelsForSelfHostedRunnerForEnterprise
{
    public const OPERATION_ID    = 'enterprise-admin/set-custom-labels-for-self-hosted-runner-for-enterprise';
    public const OPERATION_MATCH = 'PUT /enterprises/{enterprise}/actions/runners/{runner_id}/labels';
    private const METHOD         = 'PUT';
    private const PATH           = '/enterprises/{enterprise}/actions/runners/{runner_id}/labels';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Enterprises\Enterprise\Actions\Runners\RunnerId\Labels $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Ok>
     **/
    public function call(string $enterprise, int $runnerId, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\EnterpriseAdmin\SetCustomLabelsForSelfHostedRunnerForEnterprise($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $enterprise, $runnerId);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok {
            return $operation->createResponse($response);
        });
    }
}