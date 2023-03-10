<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class SecretScanningLocationIssueComment
{
    public const SCHEMA_JSON = '{"required":["issue_comment_url"],"type":"object","properties":{"issue_comment_url":{"type":"string","description":"The API URL to get the issue comment where the secret was detected.","format":"uri","examples":["https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments\\/1081119451"]}},"description":"Represents an \'issue_comment\' secret scanning location type. This location type shows that a secret was detected in a comment on an issue."}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = 'Represents an \'issue_comment\' secret scanning location type. This location type shows that a secret was detected in a comment on an issue.';
    public const SCHEMA_EXAMPLE_DATA = '{"issue_comment_url":"https:\\/\\/api.github.com\\/repos\\/octocat\\/Hello-World\\/issues\\/comments\\/1081119451"}';
    /**
     * issue_comment_url: The API URL to get the issue comment where the secret was detected.
     */
    public function __construct(public string $issue_comment_url)
    {
    }
}
