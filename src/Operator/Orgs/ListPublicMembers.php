<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Orgs;

use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListPublicMembers
{
    public const OPERATION_ID    = 'orgs/list-public-members';
    public const OPERATION_MATCH = 'GET /orgs/{org}/public_members';
    private const METHOD         = 'GET';
    private const PATH           = '/orgs/{org}/public_members';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /**
     * @return PromiseInterface<ResponseInterface>
     **/
    public function call(string $org, int $perPage = 30, int $page = 1): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Orgs\ListPublicMembers($org, $perPage, $page);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ResponseInterface {
            return $operation->createResponse($response);
        });
    }
}