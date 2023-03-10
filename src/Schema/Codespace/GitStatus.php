<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Codespace;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class GitStatus
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"ahead":{"type":"integer","description":"The number of commits the local repository is ahead of the remote.","examples":[0]},"behind":{"type":"integer","description":"The number of commits the local repository is behind the remote.","examples":[0]},"has_unpushed_changes":{"type":"boolean","description":"Whether the local repository has unpushed changes."},"has_uncommitted_changes":{"type":"boolean","description":"Whether the local repository has uncommitted changes."},"ref":{"type":"string","description":"The current branch (or SHA if in detached HEAD state) of the local repository.","examples":["main"]}},"description":"Details about the codespace\'s git repository."}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = 'Details about the codespace\'s git repository.';
    public const SCHEMA_EXAMPLE_DATA = '{"ahead":0,"behind":0,"has_unpushed_changes":false,"has_uncommitted_changes":false,"ref":"main"}';
    /**
     * ahead: The number of commits the local repository is ahead of the remote.
     * behind: The number of commits the local repository is behind the remote.
     * has_unpushed_changes: Whether the local repository has unpushed changes.
     * has_uncommitted_changes: Whether the local repository has uncommitted changes.
     * ref: The current branch (or SHA if in detached HEAD state) of the local repository.
     */
    public function __construct(public ?int $ahead, public ?int $behind, public ?bool $has_unpushed_changes, public ?bool $has_uncommitted_changes, public ?string $ref)
    {
    }
}
