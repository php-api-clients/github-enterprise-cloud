<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use EventSauce\ObjectHydrator\MapFrom;

final readonly class CodespaceMachine
{
    public const SCHEMA_JSON         = '{
    "title": "Codespace machine",
    "required": [
        "name",
        "display_name",
        "operating_system",
        "storage_in_bytes",
        "memory_in_bytes",
        "cpus",
        "prebuild_availability"
    ],
    "type": "object",
    "properties": {
        "name": {
            "type": "string",
            "description": "The name of the machine.",
            "examples": [
                "standardLinux"
            ]
        },
        "display_name": {
            "type": "string",
            "description": "The display name of the machine includes cores, memory, and storage.",
            "examples": [
                "4 cores, 16 GB RAM, 64 GB storage"
            ]
        },
        "operating_system": {
            "type": "string",
            "description": "The operating system of the machine.",
            "examples": [
                "linux"
            ]
        },
        "storage_in_bytes": {
            "type": "integer",
            "description": "How much storage is available to the codespace.",
            "examples": [
                68719476736
            ]
        },
        "memory_in_bytes": {
            "type": "integer",
            "description": "How much memory is available to the codespace.",
            "examples": [
                17179869184
            ]
        },
        "cpus": {
            "type": "integer",
            "description": "How many cores are available to the codespace.",
            "examples": [
                4
            ]
        },
        "prebuild_availability": {
            "enum": [
                "none",
                "ready",
                "in_progress",
                null
            ],
            "type": [
                "string",
                "null"
            ],
            "description": "Whether a prebuild is currently available when creating a codespace for this machine and repository. If a branch was not specified as a ref, the default branch will be assumed. Value will be \\"null\\" if prebuilds are not supported or prebuild availability could not be determined. Value will be \\"none\\" if no prebuild is available. Latest values \\"ready\\" and \\"in_progress\\" indicate the prebuild availability status.",
            "examples": [
                "ready"
            ]
        }
    },
    "description": "A description of the machine powering a codespace."
}';
    public const SCHEMA_TITLE        = 'Codespace machine';
    public const SCHEMA_DESCRIPTION  = 'A description of the machine powering a codespace.';
    public const SCHEMA_EXAMPLE_DATA = '{
    "name": "standardLinux",
    "display_name": "4 cores, 16 GB RAM, 64 GB storage",
    "operating_system": "linux",
    "storage_in_bytes": 68719476736,
    "memory_in_bytes": 17179869184,
    "cpus": 4,
    "prebuild_availability": "ready"
}';

    /**
     * name: The name of the machine.
     * displayName: The display name of the machine includes cores, memory, and storage.
     * operatingSystem: The operating system of the machine.
     * storageInBytes: How much storage is available to the codespace.
     * memoryInBytes: How much memory is available to the codespace.
     * cpus: How many cores are available to the codespace.
     * prebuildAvailability: Whether a prebuild is currently available when creating a codespace for this machine and repository. If a branch was not specified as a ref, the default branch will be assumed. Value will be "null" if prebuilds are not supported or prebuild availability could not be determined. Value will be "none" if no prebuild is available. Latest values "ready" and "in_progress" indicate the prebuild availability status.
     */
    public function __construct(public string $name, #[MapFrom('display_name')]
    public string $displayName, #[MapFrom('operating_system')]
    public string $operatingSystem, #[MapFrom('storage_in_bytes')]
    public int $storageInBytes, #[MapFrom('memory_in_bytes')]
    public int $memoryInBytes, public int $cpus, #[MapFrom('prebuild_availability')]
    public string|null $prebuildAvailability,)
    {
    }
}
