<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Orgs\CreateOrUpdateCustomProperty\Request;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class ApplicationJson
{
    public const SCHEMA_JSON         = '{
    "required": [
        "value_type"
    ],
    "type": "object",
    "properties": {
        "value_type": {
            "enum": [
                "string",
                "single_select"
            ],
            "type": "string",
            "description": "The type of the value for the property",
            "examples": [
                "single_select"
            ]
        },
        "required": {
            "type": "boolean",
            "description": "Whether the property is required."
        },
        "default_value": {
            "type": [
                "string",
                "null"
            ],
            "description": "Default value of the property"
        },
        "description": {
            "type": [
                "string",
                "null"
            ],
            "description": "Short description of the property"
        },
        "allowed_values": {
            "type": [
                "array",
                "null"
            ],
            "items": {
                "type": "string"
            },
            "description": "Ordered list of allowed values of the property"
        }
    }
}';
    public const SCHEMA_TITLE        = '';
    public const SCHEMA_DESCRIPTION  = '';
    public const SCHEMA_EXAMPLE_DATA = '{
    "value_type": "single_select",
    "required": false,
    "default_value": "generated",
    "description": "generated",
    "allowed_values": null
}';

    /**
     * valueType: The type of the value for the property
     * required: Whether the property is required.
     * defaultValue: Default value of the property
     * description: Short description of the property
     * allowedValues: Ordered list of allowed values of the property
     */
    public function __construct(#[MapFrom('value_type')]
    public string $valueType, public bool|null $required, #[MapFrom('default_value')]
    public string|null $defaultValue, public string|null $description, #[MapFrom('allowed_values')]
    public array|null $allowedValues,)
    {
    }
}