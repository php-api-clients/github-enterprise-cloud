<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class CodeScanningSarifsReceipt
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"id":{"type":"string","description":"An identifier for the upload.","examples":["6c81cd8e-b078-4ac3-a3be-1dad7dbd0b53"]},"url":{"type":"string","description":"The REST API URL for checking the status of the upload.","format":"uri","readOnly":true}}}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = '';
    public const SCHEMA_EXAMPLE_DATA = '{"id":"6c81cd8e-b078-4ac3-a3be-1dad7dbd0b53","url":"generated_url"}';
    /**
     * id: An identifier for the upload.
     * url: The REST API URL for checking the status of the upload.
     */
    public function __construct(public ?string $id, public ?string $url)
    {
    }
}
