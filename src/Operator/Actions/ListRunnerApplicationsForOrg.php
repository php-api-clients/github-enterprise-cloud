<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Actions;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListRunnerApplicationsForOrg
{
    public const OPERATION_ID    = 'actions/list-runner-applications-for-org';
    public const OPERATION_MATCH = 'GET /orgs/{org}/actions/runners/downloads';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/actions/runners/downloads';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /**
     * @return PromiseInterface<ResponseInterface>
     **/
    public function call(string $org): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions\ListRunnerApplicationsForOrg($org);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ResponseInterface {
            return $operation->createResponse($response);
        });
    }
}