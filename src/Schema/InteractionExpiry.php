<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

final readonly class InteractionExpiry
{
    public const SCHEMA_JSON         = '{
    "enum": [
        "one_day",
        "three_days",
        "one_week",
        "one_month",
        "six_months"
    ],
    "type": "string",
    "description": "The duration of the interaction restriction. Default: `one_day`.",
    "examples": [
        "one_month"
    ]
}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = 'The duration of the interaction restriction. Default: `one_day`.';
    public const SCHEMA_EXAMPLE_DATA = '[]';

    public function __construct()
    {
    }
}
