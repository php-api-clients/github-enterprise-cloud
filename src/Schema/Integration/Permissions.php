<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class Permissions
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"issues":{"type":"string"},"checks":{"type":"string"},"metadata":{"type":"string"},"contents":{"type":"string"},"deployments":{"type":"string"}},"description":"The set of permissions for the GitHub app","example":{"issues":"read","deployments":"write"},"additionalProperties":{"type":"string"}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = 'The set of permissions for the GitHub app';
    public const SCHEMA_EXAMPLE_DATA = '{"issues":"read","deployments":"write","checks":"generated_checks","metadata":"generated_metadata","contents":"generated_contents"}';
    public function __construct(public ?string $issues, public ?string $checks, public ?string $metadata, public ?string $contents, public ?string $deployments)
    {
    }
}
