<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Schema;

final readonly class RepositoryRuleMergeQueue
{
    public const SCHEMA_JSON         = '{
    "title": "merge_queue",
    "required": [
        "type"
    ],
    "type": "object",
    "properties": {
        "type": {
            "enum": [
                "merge_queue"
            ],
            "type": "string"
        },
        "parameters": {
            "required": [
                "check_response_timeout_minutes",
                "grouping_strategy",
                "max_entries_to_build",
                "max_entries_to_merge",
                "merge_method",
                "min_entries_to_merge",
                "min_entries_to_merge_wait_minutes"
            ],
            "type": "object",
            "properties": {
                "check_response_timeout_minutes": {
                    "maximum": 360,
                    "minimum": 1,
                    "type": "integer",
                    "description": "Maximum time for a required status check to report a conclusion. After this much time has elapsed, checks that have not reported a conclusion will be assumed to have failed"
                },
                "grouping_strategy": {
                    "enum": [
                        "ALLGREEN",
                        "HEADGREEN"
                    ],
                    "type": "string",
                    "description": "When set to ALLGREEN, the merge commit created by merge queue for each PR in the group must pass all required checks to merge. When set to HEADGREEN, only the commit at the head of the merge group, i.e. the commit containing changes from all of the PRs in the group, must pass its required checks to merge."
                },
                "max_entries_to_build": {
                    "maximum": 100,
                    "minimum": 0,
                    "type": "integer",
                    "description": "Limit the number of queued pull requests requesting checks and workflow runs at the same time."
                },
                "max_entries_to_merge": {
                    "maximum": 100,
                    "minimum": 0,
                    "type": "integer",
                    "description": "The maximum number of PRs that will be merged together in a group."
                },
                "merge_method": {
                    "enum": [
                        "MERGE",
                        "SQUASH",
                        "REBASE"
                    ],
                    "type": "string",
                    "description": "Method to use when merging changes from queued pull requests."
                },
                "min_entries_to_merge": {
                    "maximum": 100,
                    "minimum": 0,
                    "type": "integer",
                    "description": "The minimum number of PRs that will be merged together in a group."
                },
                "min_entries_to_merge_wait_minutes": {
                    "maximum": 360,
                    "minimum": 0,
                    "type": "integer",
                    "description": "The time merge queue should wait after the first PR is added to the queue for the minimum group size to be met. After this time has elapsed, the minimum group size will be ignored and a smaller group will be merged."
                }
            }
        }
    },
    "description": "Merges must be performed via a merge queue."
}';
    public const SCHEMA_TITLE        = 'merge_queue';
    public const SCHEMA_DESCRIPTION  = 'Merges must be performed via a merge queue.';
    public const SCHEMA_EXAMPLE_DATA = '{
    "type": "merge_queue",
    "parameters": {
        "check_response_timeout_minutes": 30,
        "grouping_strategy": "ALLGREEN",
        "max_entries_to_build": 20,
        "max_entries_to_merge": 20,
        "merge_method": "REBASE",
        "min_entries_to_merge": 20,
        "min_entries_to_merge_wait_minutes": 33
    }
}';

    public function __construct(public string $type, public Schema\RepositoryRuleMergeQueue\Parameters|null $parameters)
    {
    }
}