<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operator\Checks;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\EmptyObject;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use Rx\Observable;

use function React\Async\await;
use function WyriHaximus\React\awaitObservable;

final readonly class RerequestSuite
{
    public const OPERATION_ID    = 'checks/rerequest-suite';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/check-suites/{check_suite_id}/rerequest';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Internal\Hydrator\Operation\Repos\Owner\Repo\CheckSuites\CheckSuiteId\Rerequest $hydrator)
    {
    }

    /** @return */
    public function call(string $owner, string $repo, int $checkSuiteId): EmptyObject|array
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Checks\RerequestSuite($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $checkSuiteId);
        $request   = $operation->createRequest();
        $result    = await($this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): EmptyObject|array {
            return $operation->createResponse($response);
        }));
        if ($result instanceof Observable) {
            $result = awaitObservable($result);
        }

        return $result;
    }
}