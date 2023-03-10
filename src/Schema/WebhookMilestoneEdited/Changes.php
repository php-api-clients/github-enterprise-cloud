<?php

declare (strict_types=1);
namespace ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookMilestoneEdited;

use ApiClients\Client\GitHubEnterpriseCloud\Error as ErrorSchemas;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Operation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\WebHook;
final readonly class Changes
{
    public const SCHEMA_JSON = '{"type":"object","properties":{"description":{"required":["from"],"type":"object","properties":{"from":{"type":"string","description":"The previous version of the description if the action was `edited`."}}},"due_on":{"required":["from"],"type":"object","properties":{"from":{"type":"string","description":"The previous version of the due date if the action was `edited`."}}},"title":{"required":["from"],"type":"object","properties":{"from":{"type":"string","description":"The previous version of the title if the action was `edited`."}}}},"description":"The changes to the milestone if the action was `edited`."}';
    public const SCHEMA_TITLE = '';
    public const SCHEMA_DESCRIPTION = 'The changes to the milestone if the action was `edited`.';
    public const SCHEMA_EXAMPLE_DATA = '{"description":{"from":"generated_from"},"due_on":{"from":"generated_from"},"title":{"from":"generated_from"}}';
    public function __construct(public ?Schema\WebhookLabelEdited\Changes\Description $description, public ?Schema\WebhookMilestoneEdited\Changes\DueOn $due_on, public ?Schema\WebhookMilestoneEdited\Changes\Title $title)
    {
    }
}
