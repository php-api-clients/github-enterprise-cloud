<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Projects\MoveCard\Response\ApplicationJson\Forbidden;

final readonly class Errors
{
    public const SCHEMA_JSON         = '{
    "type": "object",
    "properties": {
        "code": {
            "type": "string"
        },
        "message": {
            "type": "string"
        },
        "resource": {
            "type": "string"
        },
        "field": {
            "type": "string"
        }
    }
}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{
    "code": "generated",
    "message": "generated",
    "resource": "generated",
    "field": "generated"
}';

    public function __construct(public string|null $code, public string|null $message, public string|null $resource, public string|null $field)
    {
    }
}
