<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operator\Orgs;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class GetAllCustomProperties
{
    public const OPERATION_ID    = 'orgs/get-all-custom-properties';
    public const OPERATION_MATCH = 'GET /orgs/{org}/properties/schema';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Orgs\Org\Properties\Schema $hydrator)
    {
    }

    /** @return iterable<int,Schema\OrgCustomProperty> */
    public function call(string $org): iterable
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Orgs\GetAllCustomProperties($this->responseSchemaValidator, $this->hydrator, $org);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Observable {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}