<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Meta;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetAllVersions
{
    public const OPERATION_ID    = 'meta/get-all-versions';
    public const OPERATION_MATCH = 'GET /versions';
    private const METHOD         = 'GET';
    private const PATH           = '/versions';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Versions $hydrator)
    {
    }

    /**
     * @return PromiseInterface<mixed>
     **/
    public function call(): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Meta\GetAllVersions($this->responseSchemaValidator, $this->hydrator);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): mixed {
            return $operation->createResponse($response);
        });
    }
}