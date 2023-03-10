<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Codespaces\UpdateForAuthenticatedUser\Request;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"machine":{"type":"string","description":"A valid machine to transition this codespace to."},"display_name":{"type":"string","description":"Display name for this codespace"},"recent_folders":{"type":"array","items":{"type":"string"},"description":"Recently opened folders inside the codespace. It is currently used by the clients to determine the folder path to load the codespace in."}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"machine":"generated_machine","display_name":"generated_display_name","recent_folders":["generated_recent_folders"]}';
    /**
     * machine: A valid machine to transition this codespace to.
     * display_name: Display name for this codespace
     * recent_folders: Recently opened folders inside the codespace. It is currently used by the clients to determine the folder path to load the codespace in.
     * @param ?array<string> $recent_folders
     */
    public function __construct(public ?string $machine, public ?string $display_name, public ?array $recent_folders)
    {
    }
}
