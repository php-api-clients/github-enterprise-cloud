<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operator\Git;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\ShortBlob;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class CreateBlob
{
    public const OPERATION_ID    = 'git/create-blob';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/git/blobs';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\Git\Blobs $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo, array $params): ShortBlob
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Git\CreateBlob($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo);
        $request   = $operation->createRequest($params);
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ShortBlob {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}
