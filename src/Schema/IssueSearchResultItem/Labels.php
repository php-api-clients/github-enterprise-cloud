<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\IssueSearchResultItem;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class Labels
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"id":{"type":"integer","format":"int64"},"node_id":{"type":"string"},"url":{"type":"string"},"name":{"type":"string"},"color":{"type":"string"},"default":{"type":"boolean"},"description":{"type":["string","null"]}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"id":13,"node_id":"generated_node_id","url":"generated_url","name":"generated_name","color":"generated_color","default":false,"description":"generated_description"}';
    public function __construct(public ?int $id, public ?string $node_id, public ?string $url, public ?string $name, public ?string $color, public ?bool $default, public ?string $description)
    {
    }
}
