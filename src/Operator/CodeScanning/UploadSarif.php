<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operator\CodeScanning;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\CodeScanningSarifsReceipt;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\PromiseInterface;

final readonly class UploadSarif
{
    public const OPERATION_ID    = 'code-scanning/upload-sarif';
    public const OPERATION_MATCH = 'POST /repos/{owner}/{repo}/code-scanning/sarifs';
    private const METHOD         = 'POST';
    private const PATH           = '/repos/{owner}/{repo}/code-scanning/sarifs';

    public function __construct(private Browser $browser, private AuthenticationInterface $authentication, private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Hydrator\Operation\Repos\Owner\Repo\CodeScanning\Sarifs $hydrator)
    {
    }

    /**
     * @return PromiseInterface<(CodeScanningSarifsReceipt|array)>
     **/
    public function call(string $owner, string $repo, array $params): PromiseInterface
    {
        $operation = new \ApiClients\Client\GitHubEnterpriseCloud\Operation\CodeScanning\UploadSarif($this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator, $owner, $repo);
        $request   = $operation->createRequest($params);

        return $this->browser->request($request->getMethod(), (string) $request->getUri(), $request->withHeader('Authorization', $this->authentication->authHeader())->getHeaders(), (string) $request->getBody())->then(static function (ResponseInterface $response) use ($operation): CodeScanningSarifsReceipt|array {
            return $operation->createResponse($response);
        });
    }
}