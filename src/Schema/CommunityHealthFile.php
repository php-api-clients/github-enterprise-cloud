<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class CommunityHealthFile
{
    public const SCHEMA_JSON = '{"title":"Community Health File","required":["url","html_url"],"type":"object","properties":{"url":{"type":"string","format":"uri"},"html_url":{"type":"string","format":"uri"}}}';
    public const SCHEMA_TITLE = 'Community Health File';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"url":"generated_url","html_url":"generated_html_url"}';
    public function __construct(public string $url, public string $html_url)
    {
    }
}
