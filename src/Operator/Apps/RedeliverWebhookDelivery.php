<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Apps;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Apps\RedeliverWebhookDelivery\Response\ApplicationJson\Accepted\Application\Json;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class RedeliverWebhookDelivery
{
    public const OPERATION_ID    = 'apps/redeliver-webhook-delivery';
    public const OPERATION_MATCH = 'POST /app/hook/deliveries/{delivery_id}/attempts';
    private const METHOD         = 'POST';
    private const PATH           = '/app/hook/deliveries/{delivery_id}/attempts';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\App\Hook\Deliveries\DeliveryId\Attempts $hydrator)
    {
    }

    /**
     * @return PromiseInterface<Json>
     **/
    public function call(int $deliveryId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Apps\RedeliverWebhookDelivery($this->responseSchemaValidator, $this->hydrator, $deliveryId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Json {
            return $operation->createResponse($response);
        });
    }
}