<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Repos;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\CloneTraffic;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetClones
{
    public const OPERATION_ID    = 'repos/get-clones';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/traffic/clones';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/traffic/clones';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Traffic\Clones $hydrator)
    {
    }

    /**
     * @return PromiseInterface<CloneTraffic>
     **/
    public function call(string $owner, string $repo, string $per = 'day'): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Repos\GetClones($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $per);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): CloneTraffic {
            return $operation->createResponse($response);
        });
    }
}