<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Operation\Actions;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final class RemoveSelfHostedRunnerFromGroupForOrg
{
    public const OPERATION_ID = 'actions/remove-self-hosted-runner-from-group-for-org';
    public const OPERATION_MATCH = 'DELETE /orgs/{org}/actions/runner-groups/{runner_group_id}/runners/{runner_id}';
    private const METHOD = 'DELETE';
    private const PATH = '/orgs/{org}/actions/runner-groups/{runner_group_id}/runners/{runner_id}';
    /**The organization name. The name is not case sensitive.**/
    private string $org;
    /**Unique identifier of the self-hosted runner group.**/
    private int $runner_group_id;
    /**Unique identifier of the self-hosted runner.**/
    private int $runner_id;
    public function __construct(string $org, int $runner_group_id, int $runner_id)
    {
        $this->org = $org;
        $this->runner_group_id = $runner_group_id;
        $this->runner_id = $runner_id;
    }
    function createRequest(array $data = array()) : \Psr\Http\Message\RequestInterface
    {
        return new \RingCentral\Psr7\Request(self::METHOD, \str_replace(array('{org}', '{runner_group_id}', '{runner_id}'), array($this->org, $this->runner_group_id, $this->runner_id), self::PATH));
    }
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    function createResponse(\Psr\Http\Message\ResponseInterface $response) : \Psr\Http\Message\ResponseInterface
    {
        return $response;
    }
}
