<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\ServerStatistics;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class DormantUsers
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"total_dormant_users":{"type":"integer"},"dormancy_threshold":{"type":"string"}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"total_dormant_users":13,"dormancy_threshold":"generated_dormancy_threshold"}';
    public function __construct(public ?int $total_dormant_users, public ?string $dormancy_threshold)
    {
    }
}
