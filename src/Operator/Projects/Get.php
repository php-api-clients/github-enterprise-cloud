<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Projects;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Project;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class Get
{
    public const OPERATION_ID    = 'projects/get';
    public const OPERATION_MATCH = 'GET /projects/{project_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/projects/{project_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Projects\ProjectId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<(Project|array)>
     **/
    public function call(int $projectId): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Projects\Get($this->responseSchemaValidator, $this->hydrator, $projectId);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): Project|array {
            return $operation->createResponse($response);
        });
    }
}