<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Error;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final class ScimError extends \Error
{
    public function __construct(public Schema\ScimError $error)
    {
    }
}
