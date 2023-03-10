<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class SecretScanningLocationIssueBody
{
    public const SCHEMA_JSON = '{"required":["issue_body_url"],"type":"object","properties":{"issue_body_url":{"type":"string","description":"The API URL to get the issue where the secret was detected.","format":"uri","examples":["https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/1347"]}},"description":"Represents an \'issue_body\' secret scanning location type. This location type shows that a secret was detected in the body of an issue."}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = 'Represents an \'issue_body\' secret scanning location type. This location type shows that a secret was detected in the body of an issue.';
    public const SCHEMA_EXAMPLE_DATA = '{"issue_body_url":"https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/1347"}';
    /**
     * issue_body_url: The API URL to get the issue where the secret was detected.
     */
    public function __construct(public string $issue_body_url)
    {
    }
}
