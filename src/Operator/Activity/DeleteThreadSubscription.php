<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Activity;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class DeleteThreadSubscription
{
    public const OPERATION_ID    = 'activity/delete-thread-subscription';
    public const OPERATION_MATCH = 'DELETE /notifications/threads/{thread_id}/subscription';
    private const METHOD         = 'DELETE';
    private const PATH           = '/notifications/threads/{thread_id}/subscription';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Notifications\Threads\ThreadId\Subscription $hydrator)
    {
    }

    /**
     * @return PromiseInterface<array>
     **/
    public function call(int $threadId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Activity\DeleteThreadSubscription($this->responseSchemaValidator, $this->hydrator, $threadId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): array {
            return $operation->createResponse($response);
        });
    }
}