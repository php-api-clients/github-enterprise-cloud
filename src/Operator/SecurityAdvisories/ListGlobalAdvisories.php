<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\SecurityAdvisories;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class ListGlobalAdvisories
{
    public const OPERATION_ID    = 'security-advisories/list-global-advisories';
    public const OPERATION_MATCH = 'GET /advisories';
    private const METHOD         = 'GET';
    private const PATH           = '/advisories';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Advisories $hydrator)
    {
    }

    /** @return PromiseInterface<mixed> **/
    public function call(string $ghsaId, string $cveId, string $ecosystem, string $severity, $cwes, bool $isWithdrawn, $affects, string $published, string $updated, string $modified, string $before, string $after, string $type = 'reviewed', string $direction = 'desc', int $perPage = 30, string $sort = 'published'): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\SecurityAdvisories\ListGlobalAdvisories($this->responseSchemaValidator, $this->hydrator, $ghsaId, $cveId, $ecosystem, $severity, $cwes, $isWithdrawn, $affects, $published, $updated, $modified, $before, $after, $type, $direction, $perPage, $sort);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): mixed {
            return $operation->createResponse($response);
        });
    }
}