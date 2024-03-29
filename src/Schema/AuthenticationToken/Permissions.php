<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\AuthenticationToken;

final readonly class Permissions
{
    public const SCHEMA_JSON         = '{
    "type": "object",
    "examples": [
        {
            "issues": "read",
            "deployments": "write"
        }
    ]
}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '[]';

    public function __construct()
    {
    }
}
