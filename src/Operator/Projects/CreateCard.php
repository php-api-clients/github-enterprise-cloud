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

final readonly class CreateCard
{
    public const OPERATION_ID    = 'projects/create-card';
    public const OPERATION_MATCH = 'POST /projects/columns/{column_id}/cards';
    private const METHOD         = 'POST';
    private const PATH           = '/projects/columns/{column_id}/cards';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Projects\Columns\ColumnId\Cards $hydrator)
    {
    }

    /**
     * @return PromiseInterface<(ProjectCard|array)>
     **/
    public function call(int $columnId, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Projects\CreateCard($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $columnId);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): ProjectCard|array {
            return $operation->createResponse($response);
        });
    }
}