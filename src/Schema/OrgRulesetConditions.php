<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

final readonly class OrgRulesetConditions
{
    public const SCHEMA_JSON         = '{"title":"Organization ruleset conditions","type":"object","allOf":[{"title":"Repository ruleset conditions for ref names","type":"object","properties":{"ref_name":{"type":"object","properties":{"include":{"type":"array","items":{"type":"string"},"description":"Array of ref names or patterns to include. One of these patterns must match for the condition to pass. Also accepts `~DEFAULT_BRANCH` to include the default branch or `~ALL` to include all branches."},"exclude":{"type":"array","items":{"type":"string"},"description":"Array of ref names or patterns to exclude. The condition will not pass if any of these patterns match."}}}},"description":"Parameters for a repository ruleset ref name condition"},{"title":"Repository ruleset conditions for repository names","type":"object","properties":{"repository_name":{"type":"object","properties":{"include":{"type":"array","items":{"type":"string"},"description":"Array of repository names or patterns to include. One of these patterns must match for the condition to pass. Also accepts `~ALL` to include all repositories."},"exclude":{"type":"array","items":{"type":"string"},"description":"Array of repository names or patterns to exclude. The condition will not pass if any of these patterns match."},"protected":{"type":"boolean","description":"Whether renaming of target repositories is prevented."}}}},"description":"Parameters for a repository name condition"}],"description":"Conditions for a organization ruleset"}';
    public const SCHEMA_TITLE        = 'Organization ruleset conditions';
    public const SCHEMA_DESCRIPTION  = 'Conditions for a organization ruleset';
    public const SCHEMA_EXAMPLE_DATA = '[]';

    public function __construct()
    {
    }
}