<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\Repos;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryRuleset;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class GetRepoRuleset
{
    public const OPERATION_ID    = 'repos/get-repo-ruleset';
    public const OPERATION_MATCH = 'GET /repos/{owner}/{repo}/rulesets/{ruleset_id}';
    private const METHOD         = 'GET';
    private const PATH           = '/repos/{owner}/{repo}/rulesets/{ruleset_id}';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\Rulesets\RulesetId $hydrator)
    {
    }

    /**
     * @return PromiseInterface<RepositoryRuleset>
     **/
    public function call(string $owner, string $repo, int $rulesetId, bool $includesParents): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\Repos\GetRepoRuleset($this->responseSchemaValidator, $this->hydrator, $owner, $repo, $rulesetId, $includesParents);
        $request   = $operation->createRequest();

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): RepositoryRuleset {
            return $operation->createResponse($response);
        });
    }
}