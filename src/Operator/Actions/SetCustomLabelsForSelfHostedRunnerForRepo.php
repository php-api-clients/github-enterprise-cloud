<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class SetCustomLabelsForSelfHostedRunnerForRepo
{
    public const OPERATION_ID    = 'actions/set-custom-labels-for-self-hosted-runner-for-repo';
    public const OPERATION_MATCH = 'PUT /repos/{owner}/{repo}/actions/runners/{runner_id}/labels';
    private const METHOD         = 'PUT';
    private const PATH           = '/repos/{owner}/{repo}/actions/runners/{runner_id}/labels';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Actions\Runners\RunnerId\Labels $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Ok>
     **/
    public function call(string $owner, string $repo, int $runnerId, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\SetCustomLabelsForSelfHostedRunnerForRepo($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo, $runnerId);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok {
            return $operation->createResponse($response);
        });
    }
}