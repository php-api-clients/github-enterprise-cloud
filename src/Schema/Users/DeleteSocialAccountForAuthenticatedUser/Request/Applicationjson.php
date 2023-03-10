<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Users\DeleteSocialAccountForAuthenticatedUser\Request;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"required":["account_urls"],"type":"object","properties":{"account_urls":{"type":"array","items":{"type":"string","examples":["https:\\/\\/twitter.com\\/github"]},"description":"Full URLs for the social media profiles to delete.","examples":[]}},"example":{"account_urls":["https:\\/\\/www.linkedin.com\\/company\\/github\\/","https:\\/\\/twitter.com\\/github"]}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"account_urls":["https:\\/\\/www.linkedin.com\\/company\\/github\\/","https:\\/\\/twitter.com\\/github"]}';
    /**
     * account_urls: Full URLs for the social media profiles to delete.
     * @param array<string> $account_urls
     */
    public function __construct(public array $account_urls)
    {
    }
}
