<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Projects;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\ProjectCard;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetCard
{
    public const OPERATION_ID    = 'projects/get-card';
    public const OPERATION_MATCH = 'GET /projects/columns/cards/{card_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/projects/columns/cards/{card_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Projects\Columns\Cards\CardId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<(ProjectCard|array)>
     **/
    public function call(int $cardId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Projects\GetCard($this->responseSchemaValidator, $this->hydrator, $cardId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ProjectCard|array {
            return $operation->createResponse($response);
        });
    }
}