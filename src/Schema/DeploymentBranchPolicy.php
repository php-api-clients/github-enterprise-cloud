<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class DeploymentBranchPolicy
{
    public const SCHEMA_JSON = '{"title":"Deployment branch policy","type":"object","properties":{"id":{"type":"integer","description":"The unique identifier of the branch policy.","examples":[361471]},"node_id":{"type":"string","examples":["MDE2OkdhdGVCcmFuY2hQb2xpY3kzNjE0NzE="]},"name":{"type":"string","description":"The name pattern that branches must match in order to deploy to the environment.","examples":["release\\/*"]}},"description":"Details of a deployment branch policy."}';
    public const SCHEMA_TITLE = 'Deployment branch policy';
    public const SCHEMA_DESCRIPTION = 'Details of a deployment branch policy.';
    public const SCHEMA_EXAMPLE_DATA = '{"id":361471,"node_id":"MDE2OkdhdGVCcmFuY2hQb2xpY3kzNjE0NzE=","name":"release\\/*"}';
    /**
     * id: The unique identifier of the branch policy.
     * name: The name pattern that branches must match in order to deploy to the environment.
     */
    public function __construct(public ?int $id, public ?string $node_id, public ?string $name)
    {
    }
}
