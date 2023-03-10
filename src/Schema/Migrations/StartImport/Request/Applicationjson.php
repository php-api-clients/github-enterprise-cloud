<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Migrations\StartImport\Request;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"required":["vcs_url"],"type":"object","properties":{"vcs_url":{"type":"string","description":"The URL of the originating repository."},"vcs":{"enum":["subversion","git","mercurial","tfvc"],"type":"string","description":"The originating VCS type. Without this parameter, the import job will take additional time to detect the VCS type before beginning the import. This detection step will be reflected in the response."},"vcs_username":{"type":"string","description":"If authentication is required, the username to provide to `vcs_url`."},"vcs_password":{"type":"string","description":"If authentication is required, the password to provide to `vcs_url`."},"tfvc_project":{"type":"string","description":"For a tfvc import, the name of the project that is being imported."}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"vcs_url":"generated_vcs_url","vcs":"generated_vcs","vcs_username":"generated_vcs_username","vcs_password":"generated_vcs_password","tfvc_project":"generated_tfvc_project"}';
    /**
     * vcs_url: The URL of the originating repository.
     * vcs: The originating VCS type. Without this parameter, the import job will take additional time to detect the VCS type before beginning the import. This detection step will be reflected in the response.
     * vcs_username: If authentication is required, the username to provide to `vcs_url`.
     * vcs_password: If authentication is required, the password to provide to `vcs_url`.
     * tfvc_project: For a tfvc import, the name of the project that is being imported.
     */
    public function __construct(public string $vcs_url, public ?string $vcs, public ?string $vcs_username, public ?string $vcs_password, public ?string $tfvc_project)
    {
    }
}
