<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operator\Search;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Search\Code\Response\ApplicationJson\Ok;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class Code
{
    public const OPERATION_ID    = 'search/code';
    public const OPERATION_MATCH = 'GET /search/code';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Search\Code $hydrator)
    {
    }

    /** @return Schema\Operations\Search\Code\Response\ApplicationJson\Ok|array{code:int} */
    public function call(string $q, string $sort, string $order = 'desc', int $perPage = 30, int $page = 1): Ok|array
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Search\Code($this->responseSchemaValidator, $this->hydrator, $q, $sort, $order, $perPage, $page);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Ok|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}