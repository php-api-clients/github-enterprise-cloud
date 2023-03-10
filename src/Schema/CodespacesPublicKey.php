<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class CodespacesPublicKey
{
    public const SCHEMA_JSON = '{"title":"CodespacesPublicKey","required":["key_id","key"],"type":"object","properties":{"key_id":{"type":"string","description":"The identifier for the key.","examples":["1234567"]},"key":{"type":"string","description":"The Base64 encoded public key.","examples":["hBT5WZEj8ZoOv6TYJsfWq7MxTEQopZO5\\/IT3ZCVQPzs="]},"id":{"type":"integer","examples":[2]},"url":{"type":"string","examples":["https:\\/\\/api.github.com\\/user\\/keys\\/2"]},"title":{"type":"string","examples":["ssh-rsa AAAAB3NzaC1yc2EAAA"]},"created_at":{"type":"string","examples":["2011-01-26T19:01:12Z"]}},"description":"The public key used for setting Codespaces secrets."}';
    public const SCHEMA_TITLE = 'CodespacesPublicKey';
    public const SCHEMA_DESCRIPTION = 'The public key used for setting Codespaces secrets.';
    public const SCHEMA_EXAMPLE_DATA = '{"key_id":"1234567","key":"hBT5WZEj8ZoOv6TYJsfWq7MxTEQopZO5\\/IT3ZCVQPzs=","id":2,"url":"https:\\/\\/api.github.com\\/user\\/keys\\/2","title":"ssh-rsa AAAAB3NzaC1yc2EAAA","created_at":"2011-01-26T19:01:12Z"}';
    /**
     * key_id: The identifier for the key.
     * key: The Base64 encoded public key.
     */
    public function __construct(public string $key_id, public string $key, public ?int $id, public ?string $url, public ?string $title, public ?string $created_at)
    {
    }
}
