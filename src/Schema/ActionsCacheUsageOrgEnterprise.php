<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class ActionsCacheUsageOrgEnterprise
{
    public const SCHEMA_JSON = '{"required":["total_active_caches_count","total_active_caches_size_in_bytes"],"type":"object","properties":{"total_active_caches_count":{"type":"integer","description":"The count of active caches across all repositories of an enterprise or an organization."},"total_active_caches_size_in_bytes":{"type":"integer","description":"The total size in bytes of all active cache items across all repositories of an enterprise or an organization."}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"total_active_caches_count":13,"total_active_caches_size_in_bytes":13}';
    /**
     * total_active_caches_count: The count of active caches across all repositories of an enterprise or an organization.
     * total_active_caches_size_in_bytes: The total size in bytes of all active cache items across all repositories of an enterprise or an organization.
     */
    public function __construct(public int $total_active_caches_count, public int $total_active_caches_size_in_bytes)
    {
    }
}
