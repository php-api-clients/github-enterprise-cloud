<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Operation\EnterpriseAdmin\ListLabelsForSelfHostedRunnerForEnterprise\Response\Applicationjson;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class H200
{
    public const SCHEMA_JSON = '{"required":["total_count","labels"],"type":"object","properties":{"total_count":{"type":"integer"},"labels":{"type":"array","items":{"title":"Self hosted runner label","required":["name"],"type":"object","properties":{"id":{"type":"integer","description":"Unique identifier of the label."},"name":{"type":"string","description":"Name of the label."},"type":{"enum":["read-only","custom"],"type":"string","description":"The type of label. Read-only labels are applied automatically when the runner is configured."}},"description":"A label for a self hosted runner"}}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"total_count":13,"labels":[{"id":13,"name":"generated_name","type":"generated_type"}]}';
    /**
     * @param array<\ApiClients\Client\GitHubEnterpriseCloud\Schema\RunnerLabel> $labels
     */
    public function __construct(public int $total_count, #[\EventSauce\ObjectHydrator\PropertyCasters\CastListToType(Schema\RunnerLabel::class)] public array $labels)
    {
    }
}
