<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\Projects\CreateCard\Request;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class Applicationjson
{
    public const SCHEMA_JSON = '{"oneOf":[{"required":["note"],"type":"object","properties":{"note":{"type":["string","null"],"description":"The project card\'s note","examples":["Update all gems"]}}},{"required":["content_id","content_type"],"type":"object","properties":{"content_id":{"type":"integer","description":"The unique identifier of the content associated with the card","examples":[42]},"content_type":{"type":"string","description":"The piece of content associated with the card","examples":["PullRequest"]}}}]}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '[]';
    public function __construct()
    {
    }
}
