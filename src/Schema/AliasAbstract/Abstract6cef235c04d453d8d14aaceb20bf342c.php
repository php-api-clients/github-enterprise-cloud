<?php

declare (strict_types=1);
namespace ApiClients\Client\Github\Schema\AliasAbstract;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
abstract readonly class Abstract6cef235c04d453d8d14aaceb20bf342c
{
    public const SCHEMA_JSON = '{"required":["total_ms","jobs"],"type":"object","properties":{"total_ms":{"type":"integer"},"jobs":{"type":"integer"},"job_runs":{"type":"array","items":{"required":["job_id","duration_ms"],"type":"object","properties":{"job_id":{"type":"integer"},"duration_ms":{"type":"integer"}}}}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"total_ms":13,"jobs":13,"job_runs":[{"job_id":13,"duration_ms":13}]}';
    /**
     * @param ?array<\ApiClients\Client\Github\Schema\WorkflowRunUsage\Billable\Ubuntu\JobRuns> $jobRuns
     */
    public function __construct(#[\EventSauce\ObjectHydrator\MapFrom('total_ms')] public int $totalMs, public int $jobs, #[\EventSauce\ObjectHydrator\MapFrom('job_runs')] #[\EventSauce\ObjectHydrator\PropertyCasters\CastListToType(Schema\WorkflowRunUsage\Billable\Ubuntu\JobRuns::class)] public ?array $jobRuns)
    {
    }
}