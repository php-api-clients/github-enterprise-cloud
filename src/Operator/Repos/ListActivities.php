<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Repos;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListActivities
{
    public const OPERATION_ID    = 'repos/list-activities';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/activity';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/activity';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Activity $hydrator)
    {
    }

    /** @return PromiseInterface<mixed> **/
    public function call(string $owner, string $repo, string $before, string $after, string $ref, string $actor, string $timePeriod, string $activityType, string $direction = 'desc', int $perPage = 30): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Repos\ListActivities($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $before, $after, $ref, $actor, $timePeriod, $activityType, $direction, $perPage);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): mixed {
            return $operation->createResponse($response);
        });
    }
}