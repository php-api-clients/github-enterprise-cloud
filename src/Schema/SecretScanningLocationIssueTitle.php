<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class SecretScanningLocationIssueTitle
{
    public const SCHEMA_JSON = '{"required":["issue_title_url"],"type":"object","properties":{"issue_title_url":{"type":"string","description":"The API URL to get the issue where the secret was detected.","format":"uri","examples":["https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/1347"]}},"description":"Represents an \'issue_title\' secret scanning location type. This location type shows that a secret was detected in the title of an issue."}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = 'Represents an \'issue_title\' secret scanning location type. This location type shows that a secret was detected in the title of an issue.';
    public const SCHEMA_EXAMPLE_DATA = '{"issue_title_url":"https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/1347"}';
    /**
     * issue_title_url: The API URL to get the issue where the secret was detected.
     */
    public function __construct(public string $issue_title_url)
    {
    }
}
