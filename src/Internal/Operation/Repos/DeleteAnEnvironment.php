<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Operation\Repos;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RingCentral\Psr7\Request;
use RuntimeException;

use function str_replace;

final class DeleteAnEnvironment
{
    public const OPERATION_ID    = 'repos/delete-an-environment';
    public const OPERATION_MATCH = 'DELETE /repos/{owner}/{repo}/environments/{environment_name}';
    private const METHOD         = 'DELETE';
    private const PATH           = '/repos/{owner}/{repo}/environments/{environment_name}';
    /**The account owner of the repository. The name is not case sensitive. **/
    private string $owner;
    /**The name of the repository without the `.git` extension. The name is not case sensitive. **/
    private string $repo;
    /**The name of the environment. **/
    private string $environmentName;

    public function __construct(string $owner, string $repo, string $environmentName)
    {
        $this->owner           = $owner;
        $this->repo            = $repo;
        $this->environmentName = $environmentName;
    }

    public function createRequest(): RequestInterface
    {
        return new Request(self::METHOD, str_replace(['{owner}', '{repo}', '{environment_name}'], [$this->owner, $this->repo, $this->environmentName], self::PATH));
    }

    /** @return array{code: int} */
    public function createResponse(ResponseInterface $response): array
    {
        $code = $response->getStatusCode();
        switch ($code) {
            /**
             * Default response
             **/
            case 204:
                return ['code' => 204];
        }

        throw new RuntimeException('Unable to find matching response code and content type');
    }
}