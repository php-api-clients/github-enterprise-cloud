<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Hydrator\WebHook;

use ApiClients\Client\GitHubEnterpriseCloud\Schema\EnterpriseWebhooks;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\LicenseSimple;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\OrganizationSimpleWebhooks;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\CustomProperties;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\Permissions;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Owner;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleInstallation;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUserWebhooks;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\DismissedBy;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Location;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Message;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Rule;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Tool;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser;
use EventSauce\ObjectHydrator\IterableList;
use EventSauce\ObjectHydrator\ObjectMapper;
use EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems;
use EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime;
use EventSauce\ObjectHydrator\PropertySerializers\SerializeUuidToString;
use EventSauce\ObjectHydrator\UnableToHydrateObject;
use EventSauce\ObjectHydrator\UnableToSerializeObject;
use Generator;
use LogicException;
use Throwable;

use function array_pop;
use function assert;
use function count;
use function is_a;
use function is_array;

class CodeScanningAlert implements ObjectMapper
{
    private array $hydrationStack = [];

    public function __construct()
    {
    }

    /**
     * @param class-string<T> $className
     *
     * @return T
     *
     * @template T of object
     */
    public function hydrateObject(string $className, array $payload): object
    {
        return match ($className) {
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\DismissedBy' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️DismissedBy($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Location' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Message' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Rule' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Rule($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Tool' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Tool($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\EnterpriseWebhooks' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleInstallation' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\OrganizationSimpleWebhooks' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\LicenseSimple' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️LicenseSimple($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\Permissions' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️Permissions($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Owner' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Owner($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Permissions($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUserWebhooks' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️DismissedBy($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Location($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Message($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Rule($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Tool($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Location($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Message($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Rule($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Tool($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️DismissedBy($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Location($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Message($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Rule($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Tool($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Location($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Message($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Rule($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Tool($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Location($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Message($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Rule($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Tool($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\CustomProperties' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️CustomProperties($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Owner' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Owner($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Permissions' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Permissions($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\DismissedBy' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️DismissedBy($payload),
            default => throw UnableToHydrateObject::noHydrationDefined($className, $this->hydrationStack),
        };
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch(array $payload): WebhookCodeScanningAlertAppearedInBranch
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['action'] ?? null;

            if ($value === null) {
                $missingFields[] = 'action';
                goto after_action;
            }

            $properties['action'] = $value;

            after_action:

            $value = $payload['alert'] ?? null;

            if ($value === null) {
                $missingFields[] = 'alert';
                goto after_alert;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'alert';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['alert'] = $value;

            after_alert:

            $value = $payload['commit_oid'] ?? null;

            if ($value === null) {
                $missingFields[] = 'commit_oid';
                goto after_commitOid;
            }

            $properties['commitOid'] = $value;

            after_commitOid:

            $value = $payload['enterprise'] ?? null;

            if ($value === null) {
                $properties['enterprise'] = null;
                goto after_enterprise;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'enterprise';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['enterprise'] = $value;

            after_enterprise:

            $value = $payload['installation'] ?? null;

            if ($value === null) {
                $properties['installation'] = null;
                goto after_installation;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'installation';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['installation'] = $value;

            after_installation:

            $value = $payload['organization'] ?? null;

            if ($value === null) {
                $properties['organization'] = null;
                goto after_organization;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'organization';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['organization'] = $value;

            after_organization:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['repository'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository';
                goto after_repository;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'repository';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['repository'] = $value;

            after_repository:

            $value = $payload['sender'] ?? null;

            if ($value === null) {
                $missingFields[] = 'sender';
                goto after_sender;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'sender';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['sender'] = $value;

            after_sender:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(WebhookCodeScanningAlertAppearedInBranch::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new WebhookCodeScanningAlertAppearedInBranch(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert(array $payload): Alert
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'created_at';
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['dismissed_at'] ?? null;

            if ($value === null) {
                $properties['dismissedAt'] = null;
                goto after_dismissedAt;
            }

            $properties['dismissedAt'] = $value;

            after_dismissedAt:

            $value = $payload['dismissed_by'] ?? null;

            if ($value === null) {
                $properties['dismissedBy'] = null;
                goto after_dismissedBy;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'dismissedBy';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️DismissedBy($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['dismissedBy'] = $value;

            after_dismissedBy:

            $value = $payload['dismissed_reason'] ?? null;

            if ($value === null) {
                $properties['dismissedReason'] = null;
                goto after_dismissedReason;
            }

            $properties['dismissedReason'] = $value;

            after_dismissedReason:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['most_recent_instance'] ?? null;

            if ($value === null) {
                $properties['mostRecentInstance'] = null;
                goto after_mostRecentInstance;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'mostRecentInstance';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['mostRecentInstance'] = $value;

            after_mostRecentInstance:

            $value = $payload['number'] ?? null;

            if ($value === null) {
                $missingFields[] = 'number';
                goto after_number;
            }

            $properties['number'] = $value;

            after_number:

            $value = $payload['rule'] ?? null;

            if ($value === null) {
                $missingFields[] = 'rule';
                goto after_rule;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'rule';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Rule($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['rule'] = $value;

            after_rule:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:

            $value = $payload['tool'] ?? null;

            if ($value === null) {
                $missingFields[] = 'tool';
                goto after_tool;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'tool';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Tool($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['tool'] = $value;

            after_tool:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(Alert::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new Alert(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️DismissedBy(array $payload): DismissedBy
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $properties['avatarUrl'] = null;
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['deleted'] ?? null;

            if ($value === null) {
                $properties['deleted'] = null;
                goto after_deleted;
            }

            $properties['deleted'] = $value;

            after_deleted:

            $value = $payload['email'] ?? null;

            if ($value === null) {
                $properties['email'] = null;
                goto after_email;
            }

            $properties['email'] = $value;

            after_email:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $properties['eventsUrl'] = null;
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $properties['followersUrl'] = null;
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $properties['followingUrl'] = null;
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $properties['gistsUrl'] = null;
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $properties['htmlUrl'] = null;
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['login'] ?? null;

            if ($value === null) {
                $missingFields[] = 'login';
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $properties['nodeId'] = null;
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $properties['organizationsUrl'] = null;
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $properties['receivedEventsUrl'] = null;
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $properties['reposUrl'] = null;
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $properties['siteAdmin'] = null;
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $properties['starredUrl'] = null;
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $properties['subscriptionsUrl'] = null;
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $properties['type'] = null;
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(DismissedBy::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new DismissedBy(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance(array $payload): MostRecentInstance
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['analysis_key'] ?? null;

            if ($value === null) {
                $missingFields[] = 'analysis_key';
                goto after_analysisKey;
            }

            $properties['analysisKey'] = $value;

            after_analysisKey:

            $value = $payload['category'] ?? null;

            if ($value === null) {
                $properties['category'] = null;
                goto after_category;
            }

            $properties['category'] = $value;

            after_category:

            $value = $payload['classifications'] ?? null;

            if ($value === null) {
                $properties['classifications'] = null;
                goto after_classifications;
            }

            $properties['classifications'] = $value;

            after_classifications:

            $value = $payload['commit_sha'] ?? null;

            if ($value === null) {
                $properties['commitSha'] = null;
                goto after_commitSha;
            }

            $properties['commitSha'] = $value;

            after_commitSha:

            $value = $payload['environment'] ?? null;

            if ($value === null) {
                $missingFields[] = 'environment';
                goto after_environment;
            }

            $properties['environment'] = $value;

            after_environment:

            $value = $payload['location'] ?? null;

            if ($value === null) {
                $properties['location'] = null;
                goto after_location;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'location';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['location'] = $value;

            after_location:

            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'message';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(MostRecentInstance::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new MostRecentInstance(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location(array $payload): Location
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['end_column'] ?? null;

            if ($value === null) {
                $properties['endColumn'] = null;
                goto after_endColumn;
            }

            $properties['endColumn'] = $value;

            after_endColumn:

            $value = $payload['end_line'] ?? null;

            if ($value === null) {
                $properties['endLine'] = null;
                goto after_endLine;
            }

            $properties['endLine'] = $value;

            after_endLine:

            $value = $payload['path'] ?? null;

            if ($value === null) {
                $properties['path'] = null;
                goto after_path;
            }

            $properties['path'] = $value;

            after_path:

            $value = $payload['start_column'] ?? null;

            if ($value === null) {
                $properties['startColumn'] = null;
                goto after_startColumn;
            }

            $properties['startColumn'] = $value;

            after_startColumn:

            $value = $payload['start_line'] ?? null;

            if ($value === null) {
                $properties['startLine'] = null;
                goto after_startLine;
            }

            $properties['startLine'] = $value;

            after_startLine:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(Location::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new Location(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message(array $payload): Message
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['text'] ?? null;

            if ($value === null) {
                $properties['text'] = null;
                goto after_text;
            }

            $properties['text'] = $value;

            after_text:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(Message::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new Message(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Rule(array $payload): Rule
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['description'] ?? null;

            if ($value === null) {
                $missingFields[] = 'description';
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['severity'] ?? null;

            if ($value === null) {
                $properties['severity'] = null;
                goto after_severity;
            }

            $properties['severity'] = $value;

            after_severity:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Rule', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(Rule::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new Rule(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Rule', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Tool(array $payload): Tool
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['version'] ?? null;

            if ($value === null) {
                $properties['version'] = null;
                goto after_version;
            }

            $properties['version'] = $value;

            after_version:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Tool', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(Tool::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new Tool(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Tool', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks(array $payload): EnterpriseWebhooks
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['description'] ?? null;

            if ($value === null) {
                $properties['description'] = null;
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['website_url'] ?? null;

            if ($value === null) {
                $properties['websiteUrl'] = null;
                goto after_websiteUrl;
            }

            $properties['websiteUrl'] = $value;

            after_websiteUrl:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['slug'] ?? null;

            if ($value === null) {
                $missingFields[] = 'slug';
                goto after_slug;
            }

            $properties['slug'] = $value;

            after_slug:

            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $properties['createdAt'] = null;
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['updated_at'] ?? null;

            if ($value === null) {
                $properties['updatedAt'] = null;
                goto after_updatedAt;
            }

            $properties['updatedAt'] = $value;

            after_updatedAt:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'avatar_url';
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\EnterpriseWebhooks', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(EnterpriseWebhooks::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new EnterpriseWebhooks(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\EnterpriseWebhooks', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation(array $payload): SimpleInstallation
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleInstallation', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(SimpleInstallation::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new SimpleInstallation(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleInstallation', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks(array $payload): OrganizationSimpleWebhooks
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['login'] ?? null;

            if ($value === null) {
                $missingFields[] = 'login';
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repos_url';
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events_url';
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['hooks_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'hooks_url';
                goto after_hooksUrl;
            }

            $properties['hooksUrl'] = $value;

            after_hooksUrl:

            $value = $payload['issues_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'issues_url';
                goto after_issuesUrl;
            }

            $properties['issuesUrl'] = $value;

            after_issuesUrl:

            $value = $payload['members_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'members_url';
                goto after_membersUrl;
            }

            $properties['membersUrl'] = $value;

            after_membersUrl:

            $value = $payload['public_members_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'public_members_url';
                goto after_publicMembersUrl;
            }

            $properties['publicMembersUrl'] = $value;

            after_publicMembersUrl:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'avatar_url';
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['description'] ?? null;

            if ($value === null) {
                $properties['description'] = null;
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\OrganizationSimpleWebhooks', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(OrganizationSimpleWebhooks::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new OrganizationSimpleWebhooks(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\OrganizationSimpleWebhooks', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks(array $payload): RepositoryWebhooks
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['full_name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'full_name';
                goto after_fullName;
            }

            $properties['fullName'] = $value;

            after_fullName:

            $value = $payload['license'] ?? null;

            if ($value === null) {
                $properties['license'] = null;
                goto after_license;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'license';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️LicenseSimple($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['license'] = $value;

            after_license:

            $value = $payload['organization'] ?? null;

            if ($value === null) {
                $properties['organization'] = null;
                goto after_organization;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'organization';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['organization'] = $value;

            after_organization:

            $value = $payload['forks'] ?? null;

            if ($value === null) {
                $missingFields[] = 'forks';
                goto after_forks;
            }

            $properties['forks'] = $value;

            after_forks:

            $value = $payload['permissions'] ?? null;

            if ($value === null) {
                $properties['permissions'] = null;
                goto after_permissions;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'permissions';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️Permissions($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['permissions'] = $value;

            after_permissions:

            $value = $payload['owner'] ?? null;

            if ($value === null) {
                $missingFields[] = 'owner';
                goto after_owner;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'owner';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['owner'] = $value;

            after_owner:

            $value = $payload['private'] ?? null;

            if ($value === null) {
                $missingFields[] = 'private';
                goto after_private;
            }

            $properties['private'] = $value;

            after_private:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['description'] ?? null;

            if ($value === null) {
                $properties['description'] = null;
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['fork'] ?? null;

            if ($value === null) {
                $missingFields[] = 'fork';
                goto after_fork;
            }

            $properties['fork'] = $value;

            after_fork:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['archive_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'archive_url';
                goto after_archiveUrl;
            }

            $properties['archiveUrl'] = $value;

            after_archiveUrl:

            $value = $payload['assignees_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'assignees_url';
                goto after_assigneesUrl;
            }

            $properties['assigneesUrl'] = $value;

            after_assigneesUrl:

            $value = $payload['blobs_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'blobs_url';
                goto after_blobsUrl;
            }

            $properties['blobsUrl'] = $value;

            after_blobsUrl:

            $value = $payload['branches_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'branches_url';
                goto after_branchesUrl;
            }

            $properties['branchesUrl'] = $value;

            after_branchesUrl:

            $value = $payload['collaborators_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'collaborators_url';
                goto after_collaboratorsUrl;
            }

            $properties['collaboratorsUrl'] = $value;

            after_collaboratorsUrl:

            $value = $payload['comments_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'comments_url';
                goto after_commentsUrl;
            }

            $properties['commentsUrl'] = $value;

            after_commentsUrl:

            $value = $payload['commits_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'commits_url';
                goto after_commitsUrl;
            }

            $properties['commitsUrl'] = $value;

            after_commitsUrl:

            $value = $payload['compare_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'compare_url';
                goto after_compareUrl;
            }

            $properties['compareUrl'] = $value;

            after_compareUrl:

            $value = $payload['contents_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'contents_url';
                goto after_contentsUrl;
            }

            $properties['contentsUrl'] = $value;

            after_contentsUrl:

            $value = $payload['contributors_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'contributors_url';
                goto after_contributorsUrl;
            }

            $properties['contributorsUrl'] = $value;

            after_contributorsUrl:

            $value = $payload['deployments_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'deployments_url';
                goto after_deploymentsUrl;
            }

            $properties['deploymentsUrl'] = $value;

            after_deploymentsUrl:

            $value = $payload['downloads_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'downloads_url';
                goto after_downloadsUrl;
            }

            $properties['downloadsUrl'] = $value;

            after_downloadsUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events_url';
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['forks_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'forks_url';
                goto after_forksUrl;
            }

            $properties['forksUrl'] = $value;

            after_forksUrl:

            $value = $payload['git_commits_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'git_commits_url';
                goto after_gitCommitsUrl;
            }

            $properties['gitCommitsUrl'] = $value;

            after_gitCommitsUrl:

            $value = $payload['git_refs_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'git_refs_url';
                goto after_gitRefsUrl;
            }

            $properties['gitRefsUrl'] = $value;

            after_gitRefsUrl:

            $value = $payload['git_tags_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'git_tags_url';
                goto after_gitTagsUrl;
            }

            $properties['gitTagsUrl'] = $value;

            after_gitTagsUrl:

            $value = $payload['git_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'git_url';
                goto after_gitUrl;
            }

            $properties['gitUrl'] = $value;

            after_gitUrl:

            $value = $payload['issue_comment_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'issue_comment_url';
                goto after_issueCommentUrl;
            }

            $properties['issueCommentUrl'] = $value;

            after_issueCommentUrl:

            $value = $payload['issue_events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'issue_events_url';
                goto after_issueEventsUrl;
            }

            $properties['issueEventsUrl'] = $value;

            after_issueEventsUrl:

            $value = $payload['issues_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'issues_url';
                goto after_issuesUrl;
            }

            $properties['issuesUrl'] = $value;

            after_issuesUrl:

            $value = $payload['keys_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'keys_url';
                goto after_keysUrl;
            }

            $properties['keysUrl'] = $value;

            after_keysUrl:

            $value = $payload['labels_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'labels_url';
                goto after_labelsUrl;
            }

            $properties['labelsUrl'] = $value;

            after_labelsUrl:

            $value = $payload['languages_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'languages_url';
                goto after_languagesUrl;
            }

            $properties['languagesUrl'] = $value;

            after_languagesUrl:

            $value = $payload['merges_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'merges_url';
                goto after_mergesUrl;
            }

            $properties['mergesUrl'] = $value;

            after_mergesUrl:

            $value = $payload['milestones_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'milestones_url';
                goto after_milestonesUrl;
            }

            $properties['milestonesUrl'] = $value;

            after_milestonesUrl:

            $value = $payload['notifications_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'notifications_url';
                goto after_notificationsUrl;
            }

            $properties['notificationsUrl'] = $value;

            after_notificationsUrl:

            $value = $payload['pulls_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'pulls_url';
                goto after_pullsUrl;
            }

            $properties['pullsUrl'] = $value;

            after_pullsUrl:

            $value = $payload['releases_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'releases_url';
                goto after_releasesUrl;
            }

            $properties['releasesUrl'] = $value;

            after_releasesUrl:

            $value = $payload['ssh_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ssh_url';
                goto after_sshUrl;
            }

            $properties['sshUrl'] = $value;

            after_sshUrl:

            $value = $payload['stargazers_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'stargazers_url';
                goto after_stargazersUrl;
            }

            $properties['stargazersUrl'] = $value;

            after_stargazersUrl:

            $value = $payload['statuses_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'statuses_url';
                goto after_statusesUrl;
            }

            $properties['statusesUrl'] = $value;

            after_statusesUrl:

            $value = $payload['subscribers_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'subscribers_url';
                goto after_subscribersUrl;
            }

            $properties['subscribersUrl'] = $value;

            after_subscribersUrl:

            $value = $payload['subscription_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'subscription_url';
                goto after_subscriptionUrl;
            }

            $properties['subscriptionUrl'] = $value;

            after_subscriptionUrl:

            $value = $payload['tags_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'tags_url';
                goto after_tagsUrl;
            }

            $properties['tagsUrl'] = $value;

            after_tagsUrl:

            $value = $payload['teams_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'teams_url';
                goto after_teamsUrl;
            }

            $properties['teamsUrl'] = $value;

            after_teamsUrl:

            $value = $payload['trees_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'trees_url';
                goto after_treesUrl;
            }

            $properties['treesUrl'] = $value;

            after_treesUrl:

            $value = $payload['clone_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'clone_url';
                goto after_cloneUrl;
            }

            $properties['cloneUrl'] = $value;

            after_cloneUrl:

            $value = $payload['mirror_url'] ?? null;

            if ($value === null) {
                $properties['mirrorUrl'] = null;
                goto after_mirrorUrl;
            }

            $properties['mirrorUrl'] = $value;

            after_mirrorUrl:

            $value = $payload['hooks_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'hooks_url';
                goto after_hooksUrl;
            }

            $properties['hooksUrl'] = $value;

            after_hooksUrl:

            $value = $payload['svn_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'svn_url';
                goto after_svnUrl;
            }

            $properties['svnUrl'] = $value;

            after_svnUrl:

            $value = $payload['homepage'] ?? null;

            if ($value === null) {
                $properties['homepage'] = null;
                goto after_homepage;
            }

            $properties['homepage'] = $value;

            after_homepage:

            $value = $payload['language'] ?? null;

            if ($value === null) {
                $properties['language'] = null;
                goto after_language;
            }

            $properties['language'] = $value;

            after_language:

            $value = $payload['forks_count'] ?? null;

            if ($value === null) {
                $missingFields[] = 'forks_count';
                goto after_forksCount;
            }

            $properties['forksCount'] = $value;

            after_forksCount:

            $value = $payload['stargazers_count'] ?? null;

            if ($value === null) {
                $missingFields[] = 'stargazers_count';
                goto after_stargazersCount;
            }

            $properties['stargazersCount'] = $value;

            after_stargazersCount:

            $value = $payload['watchers_count'] ?? null;

            if ($value === null) {
                $missingFields[] = 'watchers_count';
                goto after_watchersCount;
            }

            $properties['watchersCount'] = $value;

            after_watchersCount:

            $value = $payload['size'] ?? null;

            if ($value === null) {
                $missingFields[] = 'size';
                goto after_size;
            }

            $properties['size'] = $value;

            after_size:

            $value = $payload['default_branch'] ?? null;

            if ($value === null) {
                $missingFields[] = 'default_branch';
                goto after_defaultBranch;
            }

            $properties['defaultBranch'] = $value;

            after_defaultBranch:

            $value = $payload['open_issues_count'] ?? null;

            if ($value === null) {
                $missingFields[] = 'open_issues_count';
                goto after_openIssuesCount;
            }

            $properties['openIssuesCount'] = $value;

            after_openIssuesCount:

            $value = $payload['is_template'] ?? null;

            if ($value === null) {
                $properties['isTemplate'] = null;
                goto after_isTemplate;
            }

            $properties['isTemplate'] = $value;

            after_isTemplate:

            $value = $payload['topics'] ?? null;

            if ($value === null) {
                $properties['topics'] = null;
                goto after_topics;
            }

            $properties['topics'] = $value;

            after_topics:

            $value = $payload['custom_properties'] ?? null;

            if ($value === null) {
                $properties['customProperties'] = null;
                goto after_customProperties;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'customProperties';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️CustomProperties($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['customProperties'] = $value;

            after_customProperties:

            $value = $payload['has_issues'] ?? null;

            if ($value === null) {
                $missingFields[] = 'has_issues';
                goto after_hasIssues;
            }

            $properties['hasIssues'] = $value;

            after_hasIssues:

            $value = $payload['has_projects'] ?? null;

            if ($value === null) {
                $missingFields[] = 'has_projects';
                goto after_hasProjects;
            }

            $properties['hasProjects'] = $value;

            after_hasProjects:

            $value = $payload['has_wiki'] ?? null;

            if ($value === null) {
                $missingFields[] = 'has_wiki';
                goto after_hasWiki;
            }

            $properties['hasWiki'] = $value;

            after_hasWiki:

            $value = $payload['has_pages'] ?? null;

            if ($value === null) {
                $missingFields[] = 'has_pages';
                goto after_hasPages;
            }

            $properties['hasPages'] = $value;

            after_hasPages:

            $value = $payload['has_downloads'] ?? null;

            if ($value === null) {
                $missingFields[] = 'has_downloads';
                goto after_hasDownloads;
            }

            $properties['hasDownloads'] = $value;

            after_hasDownloads:

            $value = $payload['has_discussions'] ?? null;

            if ($value === null) {
                $properties['hasDiscussions'] = null;
                goto after_hasDiscussions;
            }

            $properties['hasDiscussions'] = $value;

            after_hasDiscussions:

            $value = $payload['archived'] ?? null;

            if ($value === null) {
                $missingFields[] = 'archived';
                goto after_archived;
            }

            $properties['archived'] = $value;

            after_archived:

            $value = $payload['disabled'] ?? null;

            if ($value === null) {
                $missingFields[] = 'disabled';
                goto after_disabled;
            }

            $properties['disabled'] = $value;

            after_disabled:

            $value = $payload['visibility'] ?? null;

            if ($value === null) {
                $properties['visibility'] = null;
                goto after_visibility;
            }

            $properties['visibility'] = $value;

            after_visibility:

            $value = $payload['pushed_at'] ?? null;

            if ($value === null) {
                $properties['pushedAt'] = null;
                goto after_pushedAt;
            }

            $properties['pushedAt'] = $value;

            after_pushedAt:

            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $properties['createdAt'] = null;
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['updated_at'] ?? null;

            if ($value === null) {
                $properties['updatedAt'] = null;
                goto after_updatedAt;
            }

            $properties['updatedAt'] = $value;

            after_updatedAt:

            $value = $payload['allow_rebase_merge'] ?? null;

            if ($value === null) {
                $properties['allowRebaseMerge'] = null;
                goto after_allowRebaseMerge;
            }

            $properties['allowRebaseMerge'] = $value;

            after_allowRebaseMerge:

            $value = $payload['template_repository'] ?? null;

            if ($value === null) {
                $properties['templateRepository'] = null;
                goto after_templateRepository;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'templateRepository';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['templateRepository'] = $value;

            after_templateRepository:

            $value = $payload['temp_clone_token'] ?? null;

            if ($value === null) {
                $properties['tempCloneToken'] = null;
                goto after_tempCloneToken;
            }

            $properties['tempCloneToken'] = $value;

            after_tempCloneToken:

            $value = $payload['allow_squash_merge'] ?? null;

            if ($value === null) {
                $properties['allowSquashMerge'] = null;
                goto after_allowSquashMerge;
            }

            $properties['allowSquashMerge'] = $value;

            after_allowSquashMerge:

            $value = $payload['allow_auto_merge'] ?? null;

            if ($value === null) {
                $properties['allowAutoMerge'] = null;
                goto after_allowAutoMerge;
            }

            $properties['allowAutoMerge'] = $value;

            after_allowAutoMerge:

            $value = $payload['delete_branch_on_merge'] ?? null;

            if ($value === null) {
                $properties['deleteBranchOnMerge'] = null;
                goto after_deleteBranchOnMerge;
            }

            $properties['deleteBranchOnMerge'] = $value;

            after_deleteBranchOnMerge:

            $value = $payload['allow_update_branch'] ?? null;

            if ($value === null) {
                $properties['allowUpdateBranch'] = null;
                goto after_allowUpdateBranch;
            }

            $properties['allowUpdateBranch'] = $value;

            after_allowUpdateBranch:

            $value = $payload['use_squash_pr_title_as_default'] ?? null;

            if ($value === null) {
                $properties['useSquashPrTitleAsDefault'] = null;
                goto after_useSquashPrTitleAsDefault;
            }

            $properties['useSquashPrTitleAsDefault'] = $value;

            after_useSquashPrTitleAsDefault:

            $value = $payload['squash_merge_commit_title'] ?? null;

            if ($value === null) {
                $properties['squashMergeCommitTitle'] = null;
                goto after_squashMergeCommitTitle;
            }

            $properties['squashMergeCommitTitle'] = $value;

            after_squashMergeCommitTitle:

            $value = $payload['squash_merge_commit_message'] ?? null;

            if ($value === null) {
                $properties['squashMergeCommitMessage'] = null;
                goto after_squashMergeCommitMessage;
            }

            $properties['squashMergeCommitMessage'] = $value;

            after_squashMergeCommitMessage:

            $value = $payload['merge_commit_title'] ?? null;

            if ($value === null) {
                $properties['mergeCommitTitle'] = null;
                goto after_mergeCommitTitle;
            }

            $properties['mergeCommitTitle'] = $value;

            after_mergeCommitTitle:

            $value = $payload['merge_commit_message'] ?? null;

            if ($value === null) {
                $properties['mergeCommitMessage'] = null;
                goto after_mergeCommitMessage;
            }

            $properties['mergeCommitMessage'] = $value;

            after_mergeCommitMessage:

            $value = $payload['allow_merge_commit'] ?? null;

            if ($value === null) {
                $properties['allowMergeCommit'] = null;
                goto after_allowMergeCommit;
            }

            $properties['allowMergeCommit'] = $value;

            after_allowMergeCommit:

            $value = $payload['allow_forking'] ?? null;

            if ($value === null) {
                $properties['allowForking'] = null;
                goto after_allowForking;
            }

            $properties['allowForking'] = $value;

            after_allowForking:

            $value = $payload['web_commit_signoff_required'] ?? null;

            if ($value === null) {
                $properties['webCommitSignoffRequired'] = null;
                goto after_webCommitSignoffRequired;
            }

            $properties['webCommitSignoffRequired'] = $value;

            after_webCommitSignoffRequired:

            $value = $payload['subscribers_count'] ?? null;

            if ($value === null) {
                $properties['subscribersCount'] = null;
                goto after_subscribersCount;
            }

            $properties['subscribersCount'] = $value;

            after_subscribersCount:

            $value = $payload['network_count'] ?? null;

            if ($value === null) {
                $properties['networkCount'] = null;
                goto after_networkCount;
            }

            $properties['networkCount'] = $value;

            after_networkCount:

            $value = $payload['open_issues'] ?? null;

            if ($value === null) {
                $missingFields[] = 'open_issues';
                goto after_openIssues;
            }

            $properties['openIssues'] = $value;

            after_openIssues:

            $value = $payload['watchers'] ?? null;

            if ($value === null) {
                $missingFields[] = 'watchers';
                goto after_watchers;
            }

            $properties['watchers'] = $value;

            after_watchers:

            $value = $payload['master_branch'] ?? null;

            if ($value === null) {
                $properties['masterBranch'] = null;
                goto after_masterBranch;
            }

            $properties['masterBranch'] = $value;

            after_masterBranch:

            $value = $payload['starred_at'] ?? null;

            if ($value === null) {
                $properties['starredAt'] = null;
                goto after_starredAt;
            }

            $properties['starredAt'] = $value;

            after_starredAt:

            $value = $payload['anonymous_access_enabled'] ?? null;

            if ($value === null) {
                $properties['anonymousAccessEnabled'] = null;
                goto after_anonymousAccessEnabled;
            }

            $properties['anonymousAccessEnabled'] = $value;

            after_anonymousAccessEnabled:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(RepositoryWebhooks::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new RepositoryWebhooks(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️LicenseSimple(array $payload): LicenseSimple
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['key'] ?? null;

            if ($value === null) {
                $missingFields[] = 'key';
                goto after_key;
            }

            $properties['key'] = $value;

            after_key:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['spdx_id'] ?? null;

            if ($value === null) {
                $properties['spdxId'] = null;
                goto after_spdxId;
            }

            $properties['spdxId'] = $value;

            after_spdxId:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $properties['htmlUrl'] = null;
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\LicenseSimple', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(LicenseSimple::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new LicenseSimple(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\LicenseSimple', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser(array $payload): SimpleUser
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['email'] ?? null;

            if ($value === null) {
                $properties['email'] = null;
                goto after_email;
            }

            $properties['email'] = $value;

            after_email:

            $value = $payload['login'] ?? null;

            if ($value === null) {
                $missingFields[] = 'login';
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'avatar_url';
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'followers_url';
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'following_url';
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'gists_url';
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'starred_url';
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'subscriptions_url';
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'organizations_url';
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repos_url';
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events_url';
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'received_events_url';
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $missingFields[] = 'type';
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $missingFields[] = 'site_admin';
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:

            $value = $payload['starred_at'] ?? null;

            if ($value === null) {
                $properties['starredAt'] = null;
                goto after_starredAt;
            }

            $properties['starredAt'] = $value;

            after_starredAt:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(SimpleUser::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new SimpleUser(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️Permissions(array $payload): Permissions
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['admin'] ?? null;

            if ($value === null) {
                $missingFields[] = 'admin';
                goto after_admin;
            }

            $properties['admin'] = $value;

            after_admin:

            $value = $payload['pull'] ?? null;

            if ($value === null) {
                $missingFields[] = 'pull';
                goto after_pull;
            }

            $properties['pull'] = $value;

            after_pull:

            $value = $payload['triage'] ?? null;

            if ($value === null) {
                $properties['triage'] = null;
                goto after_triage;
            }

            $properties['triage'] = $value;

            after_triage:

            $value = $payload['push'] ?? null;

            if ($value === null) {
                $missingFields[] = 'push';
                goto after_push;
            }

            $properties['push'] = $value;

            after_push:

            $value = $payload['maintain'] ?? null;

            if ($value === null) {
                $properties['maintain'] = null;
                goto after_maintain;
            }

            $properties['maintain'] = $value;

            after_maintain:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\Permissions', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(Permissions::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new Permissions(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\Permissions', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository(array $payload): TemplateRepository
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['id'] ?? null;

            if ($value === null) {
                $properties['id'] = null;
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $properties['nodeId'] = null;
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['full_name'] ?? null;

            if ($value === null) {
                $properties['fullName'] = null;
                goto after_fullName;
            }

            $properties['fullName'] = $value;

            after_fullName:

            $value = $payload['owner'] ?? null;

            if ($value === null) {
                $properties['owner'] = null;
                goto after_owner;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'owner';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Owner($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['owner'] = $value;

            after_owner:

            $value = $payload['private'] ?? null;

            if ($value === null) {
                $properties['private'] = null;
                goto after_private;
            }

            $properties['private'] = $value;

            after_private:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $properties['htmlUrl'] = null;
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['description'] ?? null;

            if ($value === null) {
                $properties['description'] = null;
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['fork'] ?? null;

            if ($value === null) {
                $properties['fork'] = null;
                goto after_fork;
            }

            $properties['fork'] = $value;

            after_fork:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['archive_url'] ?? null;

            if ($value === null) {
                $properties['archiveUrl'] = null;
                goto after_archiveUrl;
            }

            $properties['archiveUrl'] = $value;

            after_archiveUrl:

            $value = $payload['assignees_url'] ?? null;

            if ($value === null) {
                $properties['assigneesUrl'] = null;
                goto after_assigneesUrl;
            }

            $properties['assigneesUrl'] = $value;

            after_assigneesUrl:

            $value = $payload['blobs_url'] ?? null;

            if ($value === null) {
                $properties['blobsUrl'] = null;
                goto after_blobsUrl;
            }

            $properties['blobsUrl'] = $value;

            after_blobsUrl:

            $value = $payload['branches_url'] ?? null;

            if ($value === null) {
                $properties['branchesUrl'] = null;
                goto after_branchesUrl;
            }

            $properties['branchesUrl'] = $value;

            after_branchesUrl:

            $value = $payload['collaborators_url'] ?? null;

            if ($value === null) {
                $properties['collaboratorsUrl'] = null;
                goto after_collaboratorsUrl;
            }

            $properties['collaboratorsUrl'] = $value;

            after_collaboratorsUrl:

            $value = $payload['comments_url'] ?? null;

            if ($value === null) {
                $properties['commentsUrl'] = null;
                goto after_commentsUrl;
            }

            $properties['commentsUrl'] = $value;

            after_commentsUrl:

            $value = $payload['commits_url'] ?? null;

            if ($value === null) {
                $properties['commitsUrl'] = null;
                goto after_commitsUrl;
            }

            $properties['commitsUrl'] = $value;

            after_commitsUrl:

            $value = $payload['compare_url'] ?? null;

            if ($value === null) {
                $properties['compareUrl'] = null;
                goto after_compareUrl;
            }

            $properties['compareUrl'] = $value;

            after_compareUrl:

            $value = $payload['contents_url'] ?? null;

            if ($value === null) {
                $properties['contentsUrl'] = null;
                goto after_contentsUrl;
            }

            $properties['contentsUrl'] = $value;

            after_contentsUrl:

            $value = $payload['contributors_url'] ?? null;

            if ($value === null) {
                $properties['contributorsUrl'] = null;
                goto after_contributorsUrl;
            }

            $properties['contributorsUrl'] = $value;

            after_contributorsUrl:

            $value = $payload['deployments_url'] ?? null;

            if ($value === null) {
                $properties['deploymentsUrl'] = null;
                goto after_deploymentsUrl;
            }

            $properties['deploymentsUrl'] = $value;

            after_deploymentsUrl:

            $value = $payload['downloads_url'] ?? null;

            if ($value === null) {
                $properties['downloadsUrl'] = null;
                goto after_downloadsUrl;
            }

            $properties['downloadsUrl'] = $value;

            after_downloadsUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $properties['eventsUrl'] = null;
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['forks_url'] ?? null;

            if ($value === null) {
                $properties['forksUrl'] = null;
                goto after_forksUrl;
            }

            $properties['forksUrl'] = $value;

            after_forksUrl:

            $value = $payload['git_commits_url'] ?? null;

            if ($value === null) {
                $properties['gitCommitsUrl'] = null;
                goto after_gitCommitsUrl;
            }

            $properties['gitCommitsUrl'] = $value;

            after_gitCommitsUrl:

            $value = $payload['git_refs_url'] ?? null;

            if ($value === null) {
                $properties['gitRefsUrl'] = null;
                goto after_gitRefsUrl;
            }

            $properties['gitRefsUrl'] = $value;

            after_gitRefsUrl:

            $value = $payload['git_tags_url'] ?? null;

            if ($value === null) {
                $properties['gitTagsUrl'] = null;
                goto after_gitTagsUrl;
            }

            $properties['gitTagsUrl'] = $value;

            after_gitTagsUrl:

            $value = $payload['git_url'] ?? null;

            if ($value === null) {
                $properties['gitUrl'] = null;
                goto after_gitUrl;
            }

            $properties['gitUrl'] = $value;

            after_gitUrl:

            $value = $payload['issue_comment_url'] ?? null;

            if ($value === null) {
                $properties['issueCommentUrl'] = null;
                goto after_issueCommentUrl;
            }

            $properties['issueCommentUrl'] = $value;

            after_issueCommentUrl:

            $value = $payload['issue_events_url'] ?? null;

            if ($value === null) {
                $properties['issueEventsUrl'] = null;
                goto after_issueEventsUrl;
            }

            $properties['issueEventsUrl'] = $value;

            after_issueEventsUrl:

            $value = $payload['issues_url'] ?? null;

            if ($value === null) {
                $properties['issuesUrl'] = null;
                goto after_issuesUrl;
            }

            $properties['issuesUrl'] = $value;

            after_issuesUrl:

            $value = $payload['keys_url'] ?? null;

            if ($value === null) {
                $properties['keysUrl'] = null;
                goto after_keysUrl;
            }

            $properties['keysUrl'] = $value;

            after_keysUrl:

            $value = $payload['labels_url'] ?? null;

            if ($value === null) {
                $properties['labelsUrl'] = null;
                goto after_labelsUrl;
            }

            $properties['labelsUrl'] = $value;

            after_labelsUrl:

            $value = $payload['languages_url'] ?? null;

            if ($value === null) {
                $properties['languagesUrl'] = null;
                goto after_languagesUrl;
            }

            $properties['languagesUrl'] = $value;

            after_languagesUrl:

            $value = $payload['merges_url'] ?? null;

            if ($value === null) {
                $properties['mergesUrl'] = null;
                goto after_mergesUrl;
            }

            $properties['mergesUrl'] = $value;

            after_mergesUrl:

            $value = $payload['milestones_url'] ?? null;

            if ($value === null) {
                $properties['milestonesUrl'] = null;
                goto after_milestonesUrl;
            }

            $properties['milestonesUrl'] = $value;

            after_milestonesUrl:

            $value = $payload['notifications_url'] ?? null;

            if ($value === null) {
                $properties['notificationsUrl'] = null;
                goto after_notificationsUrl;
            }

            $properties['notificationsUrl'] = $value;

            after_notificationsUrl:

            $value = $payload['pulls_url'] ?? null;

            if ($value === null) {
                $properties['pullsUrl'] = null;
                goto after_pullsUrl;
            }

            $properties['pullsUrl'] = $value;

            after_pullsUrl:

            $value = $payload['releases_url'] ?? null;

            if ($value === null) {
                $properties['releasesUrl'] = null;
                goto after_releasesUrl;
            }

            $properties['releasesUrl'] = $value;

            after_releasesUrl:

            $value = $payload['ssh_url'] ?? null;

            if ($value === null) {
                $properties['sshUrl'] = null;
                goto after_sshUrl;
            }

            $properties['sshUrl'] = $value;

            after_sshUrl:

            $value = $payload['stargazers_url'] ?? null;

            if ($value === null) {
                $properties['stargazersUrl'] = null;
                goto after_stargazersUrl;
            }

            $properties['stargazersUrl'] = $value;

            after_stargazersUrl:

            $value = $payload['statuses_url'] ?? null;

            if ($value === null) {
                $properties['statusesUrl'] = null;
                goto after_statusesUrl;
            }

            $properties['statusesUrl'] = $value;

            after_statusesUrl:

            $value = $payload['subscribers_url'] ?? null;

            if ($value === null) {
                $properties['subscribersUrl'] = null;
                goto after_subscribersUrl;
            }

            $properties['subscribersUrl'] = $value;

            after_subscribersUrl:

            $value = $payload['subscription_url'] ?? null;

            if ($value === null) {
                $properties['subscriptionUrl'] = null;
                goto after_subscriptionUrl;
            }

            $properties['subscriptionUrl'] = $value;

            after_subscriptionUrl:

            $value = $payload['tags_url'] ?? null;

            if ($value === null) {
                $properties['tagsUrl'] = null;
                goto after_tagsUrl;
            }

            $properties['tagsUrl'] = $value;

            after_tagsUrl:

            $value = $payload['teams_url'] ?? null;

            if ($value === null) {
                $properties['teamsUrl'] = null;
                goto after_teamsUrl;
            }

            $properties['teamsUrl'] = $value;

            after_teamsUrl:

            $value = $payload['trees_url'] ?? null;

            if ($value === null) {
                $properties['treesUrl'] = null;
                goto after_treesUrl;
            }

            $properties['treesUrl'] = $value;

            after_treesUrl:

            $value = $payload['clone_url'] ?? null;

            if ($value === null) {
                $properties['cloneUrl'] = null;
                goto after_cloneUrl;
            }

            $properties['cloneUrl'] = $value;

            after_cloneUrl:

            $value = $payload['mirror_url'] ?? null;

            if ($value === null) {
                $properties['mirrorUrl'] = null;
                goto after_mirrorUrl;
            }

            $properties['mirrorUrl'] = $value;

            after_mirrorUrl:

            $value = $payload['hooks_url'] ?? null;

            if ($value === null) {
                $properties['hooksUrl'] = null;
                goto after_hooksUrl;
            }

            $properties['hooksUrl'] = $value;

            after_hooksUrl:

            $value = $payload['svn_url'] ?? null;

            if ($value === null) {
                $properties['svnUrl'] = null;
                goto after_svnUrl;
            }

            $properties['svnUrl'] = $value;

            after_svnUrl:

            $value = $payload['homepage'] ?? null;

            if ($value === null) {
                $properties['homepage'] = null;
                goto after_homepage;
            }

            $properties['homepage'] = $value;

            after_homepage:

            $value = $payload['language'] ?? null;

            if ($value === null) {
                $properties['language'] = null;
                goto after_language;
            }

            $properties['language'] = $value;

            after_language:

            $value = $payload['forks_count'] ?? null;

            if ($value === null) {
                $properties['forksCount'] = null;
                goto after_forksCount;
            }

            $properties['forksCount'] = $value;

            after_forksCount:

            $value = $payload['stargazers_count'] ?? null;

            if ($value === null) {
                $properties['stargazersCount'] = null;
                goto after_stargazersCount;
            }

            $properties['stargazersCount'] = $value;

            after_stargazersCount:

            $value = $payload['watchers_count'] ?? null;

            if ($value === null) {
                $properties['watchersCount'] = null;
                goto after_watchersCount;
            }

            $properties['watchersCount'] = $value;

            after_watchersCount:

            $value = $payload['size'] ?? null;

            if ($value === null) {
                $properties['size'] = null;
                goto after_size;
            }

            $properties['size'] = $value;

            after_size:

            $value = $payload['default_branch'] ?? null;

            if ($value === null) {
                $properties['defaultBranch'] = null;
                goto after_defaultBranch;
            }

            $properties['defaultBranch'] = $value;

            after_defaultBranch:

            $value = $payload['open_issues_count'] ?? null;

            if ($value === null) {
                $properties['openIssuesCount'] = null;
                goto after_openIssuesCount;
            }

            $properties['openIssuesCount'] = $value;

            after_openIssuesCount:

            $value = $payload['is_template'] ?? null;

            if ($value === null) {
                $properties['isTemplate'] = null;
                goto after_isTemplate;
            }

            $properties['isTemplate'] = $value;

            after_isTemplate:

            $value = $payload['topics'] ?? null;

            if ($value === null) {
                $properties['topics'] = null;
                goto after_topics;
            }

            $properties['topics'] = $value;

            after_topics:

            $value = $payload['has_issues'] ?? null;

            if ($value === null) {
                $properties['hasIssues'] = null;
                goto after_hasIssues;
            }

            $properties['hasIssues'] = $value;

            after_hasIssues:

            $value = $payload['has_projects'] ?? null;

            if ($value === null) {
                $properties['hasProjects'] = null;
                goto after_hasProjects;
            }

            $properties['hasProjects'] = $value;

            after_hasProjects:

            $value = $payload['has_wiki'] ?? null;

            if ($value === null) {
                $properties['hasWiki'] = null;
                goto after_hasWiki;
            }

            $properties['hasWiki'] = $value;

            after_hasWiki:

            $value = $payload['has_pages'] ?? null;

            if ($value === null) {
                $properties['hasPages'] = null;
                goto after_hasPages;
            }

            $properties['hasPages'] = $value;

            after_hasPages:

            $value = $payload['has_downloads'] ?? null;

            if ($value === null) {
                $properties['hasDownloads'] = null;
                goto after_hasDownloads;
            }

            $properties['hasDownloads'] = $value;

            after_hasDownloads:

            $value = $payload['archived'] ?? null;

            if ($value === null) {
                $properties['archived'] = null;
                goto after_archived;
            }

            $properties['archived'] = $value;

            after_archived:

            $value = $payload['disabled'] ?? null;

            if ($value === null) {
                $properties['disabled'] = null;
                goto after_disabled;
            }

            $properties['disabled'] = $value;

            after_disabled:

            $value = $payload['visibility'] ?? null;

            if ($value === null) {
                $properties['visibility'] = null;
                goto after_visibility;
            }

            $properties['visibility'] = $value;

            after_visibility:

            $value = $payload['pushed_at'] ?? null;

            if ($value === null) {
                $properties['pushedAt'] = null;
                goto after_pushedAt;
            }

            $properties['pushedAt'] = $value;

            after_pushedAt:

            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $properties['createdAt'] = null;
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['updated_at'] ?? null;

            if ($value === null) {
                $properties['updatedAt'] = null;
                goto after_updatedAt;
            }

            $properties['updatedAt'] = $value;

            after_updatedAt:

            $value = $payload['permissions'] ?? null;

            if ($value === null) {
                $properties['permissions'] = null;
                goto after_permissions;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'permissions';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Permissions($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['permissions'] = $value;

            after_permissions:

            $value = $payload['allow_rebase_merge'] ?? null;

            if ($value === null) {
                $properties['allowRebaseMerge'] = null;
                goto after_allowRebaseMerge;
            }

            $properties['allowRebaseMerge'] = $value;

            after_allowRebaseMerge:

            $value = $payload['temp_clone_token'] ?? null;

            if ($value === null) {
                $properties['tempCloneToken'] = null;
                goto after_tempCloneToken;
            }

            $properties['tempCloneToken'] = $value;

            after_tempCloneToken:

            $value = $payload['allow_squash_merge'] ?? null;

            if ($value === null) {
                $properties['allowSquashMerge'] = null;
                goto after_allowSquashMerge;
            }

            $properties['allowSquashMerge'] = $value;

            after_allowSquashMerge:

            $value = $payload['allow_auto_merge'] ?? null;

            if ($value === null) {
                $properties['allowAutoMerge'] = null;
                goto after_allowAutoMerge;
            }

            $properties['allowAutoMerge'] = $value;

            after_allowAutoMerge:

            $value = $payload['delete_branch_on_merge'] ?? null;

            if ($value === null) {
                $properties['deleteBranchOnMerge'] = null;
                goto after_deleteBranchOnMerge;
            }

            $properties['deleteBranchOnMerge'] = $value;

            after_deleteBranchOnMerge:

            $value = $payload['allow_update_branch'] ?? null;

            if ($value === null) {
                $properties['allowUpdateBranch'] = null;
                goto after_allowUpdateBranch;
            }

            $properties['allowUpdateBranch'] = $value;

            after_allowUpdateBranch:

            $value = $payload['use_squash_pr_title_as_default'] ?? null;

            if ($value === null) {
                $properties['useSquashPrTitleAsDefault'] = null;
                goto after_useSquashPrTitleAsDefault;
            }

            $properties['useSquashPrTitleAsDefault'] = $value;

            after_useSquashPrTitleAsDefault:

            $value = $payload['squash_merge_commit_title'] ?? null;

            if ($value === null) {
                $properties['squashMergeCommitTitle'] = null;
                goto after_squashMergeCommitTitle;
            }

            $properties['squashMergeCommitTitle'] = $value;

            after_squashMergeCommitTitle:

            $value = $payload['squash_merge_commit_message'] ?? null;

            if ($value === null) {
                $properties['squashMergeCommitMessage'] = null;
                goto after_squashMergeCommitMessage;
            }

            $properties['squashMergeCommitMessage'] = $value;

            after_squashMergeCommitMessage:

            $value = $payload['merge_commit_title'] ?? null;

            if ($value === null) {
                $properties['mergeCommitTitle'] = null;
                goto after_mergeCommitTitle;
            }

            $properties['mergeCommitTitle'] = $value;

            after_mergeCommitTitle:

            $value = $payload['merge_commit_message'] ?? null;

            if ($value === null) {
                $properties['mergeCommitMessage'] = null;
                goto after_mergeCommitMessage;
            }

            $properties['mergeCommitMessage'] = $value;

            after_mergeCommitMessage:

            $value = $payload['allow_merge_commit'] ?? null;

            if ($value === null) {
                $properties['allowMergeCommit'] = null;
                goto after_allowMergeCommit;
            }

            $properties['allowMergeCommit'] = $value;

            after_allowMergeCommit:

            $value = $payload['subscribers_count'] ?? null;

            if ($value === null) {
                $properties['subscribersCount'] = null;
                goto after_subscribersCount;
            }

            $properties['subscribersCount'] = $value;

            after_subscribersCount:

            $value = $payload['network_count'] ?? null;

            if ($value === null) {
                $properties['networkCount'] = null;
                goto after_networkCount;
            }

            $properties['networkCount'] = $value;

            after_networkCount:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(TemplateRepository::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new TemplateRepository(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Owner(array $payload): Owner
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['login'] ?? null;

            if ($value === null) {
                $properties['login'] = null;
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $properties['id'] = null;
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $properties['nodeId'] = null;
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $properties['avatarUrl'] = null;
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $properties['htmlUrl'] = null;
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $properties['followersUrl'] = null;
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $properties['followingUrl'] = null;
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $properties['gistsUrl'] = null;
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $properties['starredUrl'] = null;
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $properties['subscriptionsUrl'] = null;
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $properties['organizationsUrl'] = null;
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $properties['reposUrl'] = null;
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $properties['eventsUrl'] = null;
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $properties['receivedEventsUrl'] = null;
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $properties['type'] = null;
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $properties['siteAdmin'] = null;
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Owner', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(Owner::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new Owner(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Owner', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Permissions(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['admin'] ?? null;

            if ($value === null) {
                $properties['admin'] = null;
                goto after_admin;
            }

            $properties['admin'] = $value;

            after_admin:

            $value = $payload['maintain'] ?? null;

            if ($value === null) {
                $properties['maintain'] = null;
                goto after_maintain;
            }

            $properties['maintain'] = $value;

            after_maintain:

            $value = $payload['push'] ?? null;

            if ($value === null) {
                $properties['push'] = null;
                goto after_push;
            }

            $properties['push'] = $value;

            after_push:

            $value = $payload['triage'] ?? null;

            if ($value === null) {
                $properties['triage'] = null;
                goto after_triage;
            }

            $properties['triage'] = $value;

            after_triage:

            $value = $payload['pull'] ?? null;

            if ($value === null) {
                $properties['pull'] = null;
                goto after_pull;
            }

            $properties['pull'] = $value;

            after_pull:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks(array $payload): SimpleUserWebhooks
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['email'] ?? null;

            if ($value === null) {
                $properties['email'] = null;
                goto after_email;
            }

            $properties['email'] = $value;

            after_email:

            $value = $payload['login'] ?? null;

            if ($value === null) {
                $missingFields[] = 'login';
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'avatar_url';
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'followers_url';
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'following_url';
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'gists_url';
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'starred_url';
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'subscriptions_url';
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'organizations_url';
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repos_url';
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events_url';
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'received_events_url';
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $missingFields[] = 'type';
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $missingFields[] = 'site_admin';
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:

            $value = $payload['starred_at'] ?? null;

            if ($value === null) {
                $properties['starredAt'] = null;
                goto after_starredAt;
            }

            $properties['starredAt'] = $value;

            after_starredAt:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUserWebhooks', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(SimpleUserWebhooks::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new SimpleUserWebhooks(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUserWebhooks', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser(array $payload): WebhookCodeScanningAlertClosedByUser
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['action'] ?? null;

            if ($value === null) {
                $missingFields[] = 'action';
                goto after_action;
            }

            $properties['action'] = $value;

            after_action:

            $value = $payload['alert'] ?? null;

            if ($value === null) {
                $missingFields[] = 'alert';
                goto after_alert;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'alert';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['alert'] = $value;

            after_alert:

            $value = $payload['commit_oid'] ?? null;

            if ($value === null) {
                $missingFields[] = 'commit_oid';
                goto after_commitOid;
            }

            $properties['commitOid'] = $value;

            after_commitOid:

            $value = $payload['enterprise'] ?? null;

            if ($value === null) {
                $properties['enterprise'] = null;
                goto after_enterprise;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'enterprise';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['enterprise'] = $value;

            after_enterprise:

            $value = $payload['installation'] ?? null;

            if ($value === null) {
                $properties['installation'] = null;
                goto after_installation;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'installation';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['installation'] = $value;

            after_installation:

            $value = $payload['organization'] ?? null;

            if ($value === null) {
                $properties['organization'] = null;
                goto after_organization;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'organization';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['organization'] = $value;

            after_organization:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['repository'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository';
                goto after_repository;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'repository';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['repository'] = $value;

            after_repository:

            $value = $payload['sender'] ?? null;

            if ($value === null) {
                $missingFields[] = 'sender';
                goto after_sender;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'sender';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['sender'] = $value;

            after_sender:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(WebhookCodeScanningAlertClosedByUser::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new WebhookCodeScanningAlertClosedByUser(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'created_at';
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['dismissed_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismissed_at';
                goto after_dismissedAt;
            }

            $properties['dismissedAt'] = $value;

            after_dismissedAt:

            $value = $payload['dismissed_by'] ?? null;

            if ($value === null) {
                $properties['dismissedBy'] = null;
                goto after_dismissedBy;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'dismissedBy';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️DismissedBy($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['dismissedBy'] = $value;

            after_dismissedBy:

            $value = $payload['dismissed_reason'] ?? null;

            if ($value === null) {
                $properties['dismissedReason'] = null;
                goto after_dismissedReason;
            }

            $properties['dismissedReason'] = $value;

            after_dismissedReason:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['most_recent_instance'] ?? null;

            if ($value === null) {
                $properties['mostRecentInstance'] = null;
                goto after_mostRecentInstance;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'mostRecentInstance';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['mostRecentInstance'] = $value;

            after_mostRecentInstance:

            $value = $payload['number'] ?? null;

            if ($value === null) {
                $missingFields[] = 'number';
                goto after_number;
            }

            $properties['number'] = $value;

            after_number:

            $value = $payload['rule'] ?? null;

            if ($value === null) {
                $missingFields[] = 'rule';
                goto after_rule;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'rule';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Rule($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['rule'] = $value;

            after_rule:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:

            $value = $payload['tool'] ?? null;

            if ($value === null) {
                $missingFields[] = 'tool';
                goto after_tool;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'tool';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Tool($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['tool'] = $value;

            after_tool:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️DismissedBy(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $properties['avatarUrl'] = null;
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['deleted'] ?? null;

            if ($value === null) {
                $properties['deleted'] = null;
                goto after_deleted;
            }

            $properties['deleted'] = $value;

            after_deleted:

            $value = $payload['email'] ?? null;

            if ($value === null) {
                $properties['email'] = null;
                goto after_email;
            }

            $properties['email'] = $value;

            after_email:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $properties['eventsUrl'] = null;
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $properties['followersUrl'] = null;
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $properties['followingUrl'] = null;
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $properties['gistsUrl'] = null;
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $properties['htmlUrl'] = null;
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['login'] ?? null;

            if ($value === null) {
                $missingFields[] = 'login';
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $properties['nodeId'] = null;
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $properties['organizationsUrl'] = null;
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $properties['receivedEventsUrl'] = null;
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $properties['reposUrl'] = null;
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $properties['siteAdmin'] = null;
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $properties['starredUrl'] = null;
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $properties['subscriptionsUrl'] = null;
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $properties['type'] = null;
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['analysis_key'] ?? null;

            if ($value === null) {
                $missingFields[] = 'analysis_key';
                goto after_analysisKey;
            }

            $properties['analysisKey'] = $value;

            after_analysisKey:

            $value = $payload['category'] ?? null;

            if ($value === null) {
                $properties['category'] = null;
                goto after_category;
            }

            $properties['category'] = $value;

            after_category:

            $value = $payload['classifications'] ?? null;

            if ($value === null) {
                $properties['classifications'] = null;
                goto after_classifications;
            }

            $properties['classifications'] = $value;

            after_classifications:

            $value = $payload['commit_sha'] ?? null;

            if ($value === null) {
                $properties['commitSha'] = null;
                goto after_commitSha;
            }

            $properties['commitSha'] = $value;

            after_commitSha:

            $value = $payload['environment'] ?? null;

            if ($value === null) {
                $missingFields[] = 'environment';
                goto after_environment;
            }

            $properties['environment'] = $value;

            after_environment:

            $value = $payload['location'] ?? null;

            if ($value === null) {
                $properties['location'] = null;
                goto after_location;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'location';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['location'] = $value;

            after_location:

            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'message';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Location(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['end_column'] ?? null;

            if ($value === null) {
                $properties['endColumn'] = null;
                goto after_endColumn;
            }

            $properties['endColumn'] = $value;

            after_endColumn:

            $value = $payload['end_line'] ?? null;

            if ($value === null) {
                $properties['endLine'] = null;
                goto after_endLine;
            }

            $properties['endLine'] = $value;

            after_endLine:

            $value = $payload['path'] ?? null;

            if ($value === null) {
                $properties['path'] = null;
                goto after_path;
            }

            $properties['path'] = $value;

            after_path:

            $value = $payload['start_column'] ?? null;

            if ($value === null) {
                $properties['startColumn'] = null;
                goto after_startColumn;
            }

            $properties['startColumn'] = $value;

            after_startColumn:

            $value = $payload['start_line'] ?? null;

            if ($value === null) {
                $properties['startLine'] = null;
                goto after_startLine;
            }

            $properties['startLine'] = $value;

            after_startLine:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Message(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['text'] ?? null;

            if ($value === null) {
                $properties['text'] = null;
                goto after_text;
            }

            $properties['text'] = $value;

            after_text:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Rule(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['description'] ?? null;

            if ($value === null) {
                $missingFields[] = 'description';
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['full_description'] ?? null;

            if ($value === null) {
                $properties['fullDescription'] = null;
                goto after_fullDescription;
            }

            $properties['fullDescription'] = $value;

            after_fullDescription:

            $value = $payload['help'] ?? null;

            if ($value === null) {
                $properties['help'] = null;
                goto after_help;
            }

            $properties['help'] = $value;

            after_help:

            $value = $payload['help_uri'] ?? null;

            if ($value === null) {
                $properties['helpUri'] = null;
                goto after_helpUri;
            }

            $properties['helpUri'] = $value;

            after_helpUri:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['severity'] ?? null;

            if ($value === null) {
                $properties['severity'] = null;
                goto after_severity;
            }

            $properties['severity'] = $value;

            after_severity:

            $value = $payload['tags'] ?? null;

            if ($value === null) {
                $properties['tags'] = null;
                goto after_tags;
            }

            $properties['tags'] = $value;

            after_tags:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Tool(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['guid'] ?? null;

            if ($value === null) {
                $properties['guid'] = null;
                goto after_guid;
            }

            $properties['guid'] = $value;

            after_guid:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['version'] ?? null;

            if ($value === null) {
                $properties['version'] = null;
                goto after_version;
            }

            $properties['version'] = $value;

            after_version:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated(array $payload): WebhookCodeScanningAlertCreated
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['action'] ?? null;

            if ($value === null) {
                $missingFields[] = 'action';
                goto after_action;
            }

            $properties['action'] = $value;

            after_action:

            $value = $payload['alert'] ?? null;

            if ($value === null) {
                $missingFields[] = 'alert';
                goto after_alert;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'alert';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['alert'] = $value;

            after_alert:

            $value = $payload['commit_oid'] ?? null;

            if ($value === null) {
                $missingFields[] = 'commit_oid';
                goto after_commitOid;
            }

            $properties['commitOid'] = $value;

            after_commitOid:

            $value = $payload['enterprise'] ?? null;

            if ($value === null) {
                $properties['enterprise'] = null;
                goto after_enterprise;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'enterprise';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['enterprise'] = $value;

            after_enterprise:

            $value = $payload['installation'] ?? null;

            if ($value === null) {
                $properties['installation'] = null;
                goto after_installation;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'installation';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['installation'] = $value;

            after_installation:

            $value = $payload['organization'] ?? null;

            if ($value === null) {
                $properties['organization'] = null;
                goto after_organization;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'organization';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['organization'] = $value;

            after_organization:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['repository'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository';
                goto after_repository;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'repository';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['repository'] = $value;

            after_repository:

            $value = $payload['sender'] ?? null;

            if ($value === null) {
                $missingFields[] = 'sender';
                goto after_sender;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'sender';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['sender'] = $value;

            after_sender:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(WebhookCodeScanningAlertCreated::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new WebhookCodeScanningAlertCreated(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $properties['createdAt'] = null;
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['dismissed_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismissed_at';
                goto after_dismissedAt;
            }

            $properties['dismissedAt'] = $value;

            after_dismissedAt:

            $value = $payload['dismissed_by'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismissed_by';
                goto after_dismissedBy;
            }

            $properties['dismissedBy'] = $value;

            after_dismissedBy:

            $value = $payload['dismissed_comment'] ?? null;

            if ($value === null) {
                $properties['dismissedComment'] = null;
                goto after_dismissedComment;
            }

            $properties['dismissedComment'] = $value;

            after_dismissedComment:

            $value = $payload['dismissed_reason'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismissed_reason';
                goto after_dismissedReason;
            }

            $properties['dismissedReason'] = $value;

            after_dismissedReason:

            $value = $payload['fixed_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'fixed_at';
                goto after_fixedAt;
            }

            $properties['fixedAt'] = $value;

            after_fixedAt:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['instances_url'] ?? null;

            if ($value === null) {
                $properties['instancesUrl'] = null;
                goto after_instancesUrl;
            }

            $properties['instancesUrl'] = $value;

            after_instancesUrl:

            $value = $payload['most_recent_instance'] ?? null;

            if ($value === null) {
                $properties['mostRecentInstance'] = null;
                goto after_mostRecentInstance;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'mostRecentInstance';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['mostRecentInstance'] = $value;

            after_mostRecentInstance:

            $value = $payload['number'] ?? null;

            if ($value === null) {
                $missingFields[] = 'number';
                goto after_number;
            }

            $properties['number'] = $value;

            after_number:

            $value = $payload['rule'] ?? null;

            if ($value === null) {
                $missingFields[] = 'rule';
                goto after_rule;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'rule';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Rule($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['rule'] = $value;

            after_rule:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:

            $value = $payload['tool'] ?? null;

            if ($value === null) {
                $properties['tool'] = null;
                goto after_tool;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'tool';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Tool($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['tool'] = $value;

            after_tool:

            $value = $payload['updated_at'] ?? null;

            if ($value === null) {
                $properties['updatedAt'] = null;
                goto after_updatedAt;
            }

            $properties['updatedAt'] = $value;

            after_updatedAt:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['analysis_key'] ?? null;

            if ($value === null) {
                $missingFields[] = 'analysis_key';
                goto after_analysisKey;
            }

            $properties['analysisKey'] = $value;

            after_analysisKey:

            $value = $payload['category'] ?? null;

            if ($value === null) {
                $properties['category'] = null;
                goto after_category;
            }

            $properties['category'] = $value;

            after_category:

            $value = $payload['classifications'] ?? null;

            if ($value === null) {
                $properties['classifications'] = null;
                goto after_classifications;
            }

            $properties['classifications'] = $value;

            after_classifications:

            $value = $payload['commit_sha'] ?? null;

            if ($value === null) {
                $properties['commitSha'] = null;
                goto after_commitSha;
            }

            $properties['commitSha'] = $value;

            after_commitSha:

            $value = $payload['environment'] ?? null;

            if ($value === null) {
                $missingFields[] = 'environment';
                goto after_environment;
            }

            $properties['environment'] = $value;

            after_environment:

            $value = $payload['location'] ?? null;

            if ($value === null) {
                $properties['location'] = null;
                goto after_location;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'location';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['location'] = $value;

            after_location:

            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'message';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Location(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['end_column'] ?? null;

            if ($value === null) {
                $properties['endColumn'] = null;
                goto after_endColumn;
            }

            $properties['endColumn'] = $value;

            after_endColumn:

            $value = $payload['end_line'] ?? null;

            if ($value === null) {
                $properties['endLine'] = null;
                goto after_endLine;
            }

            $properties['endLine'] = $value;

            after_endLine:

            $value = $payload['path'] ?? null;

            if ($value === null) {
                $properties['path'] = null;
                goto after_path;
            }

            $properties['path'] = $value;

            after_path:

            $value = $payload['start_column'] ?? null;

            if ($value === null) {
                $properties['startColumn'] = null;
                goto after_startColumn;
            }

            $properties['startColumn'] = $value;

            after_startColumn:

            $value = $payload['start_line'] ?? null;

            if ($value === null) {
                $properties['startLine'] = null;
                goto after_startLine;
            }

            $properties['startLine'] = $value;

            after_startLine:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Message(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['text'] ?? null;

            if ($value === null) {
                $properties['text'] = null;
                goto after_text;
            }

            $properties['text'] = $value;

            after_text:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Rule(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['description'] ?? null;

            if ($value === null) {
                $missingFields[] = 'description';
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['full_description'] ?? null;

            if ($value === null) {
                $properties['fullDescription'] = null;
                goto after_fullDescription;
            }

            $properties['fullDescription'] = $value;

            after_fullDescription:

            $value = $payload['help'] ?? null;

            if ($value === null) {
                $properties['help'] = null;
                goto after_help;
            }

            $properties['help'] = $value;

            after_help:

            $value = $payload['help_uri'] ?? null;

            if ($value === null) {
                $properties['helpUri'] = null;
                goto after_helpUri;
            }

            $properties['helpUri'] = $value;

            after_helpUri:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['severity'] ?? null;

            if ($value === null) {
                $properties['severity'] = null;
                goto after_severity;
            }

            $properties['severity'] = $value;

            after_severity:

            $value = $payload['tags'] ?? null;

            if ($value === null) {
                $properties['tags'] = null;
                goto after_tags;
            }

            $properties['tags'] = $value;

            after_tags:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Tool(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['guid'] ?? null;

            if ($value === null) {
                $properties['guid'] = null;
                goto after_guid;
            }

            $properties['guid'] = $value;

            after_guid:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['version'] ?? null;

            if ($value === null) {
                $properties['version'] = null;
                goto after_version;
            }

            $properties['version'] = $value;

            after_version:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed(array $payload): WebhookCodeScanningAlertFixed
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['action'] ?? null;

            if ($value === null) {
                $missingFields[] = 'action';
                goto after_action;
            }

            $properties['action'] = $value;

            after_action:

            $value = $payload['alert'] ?? null;

            if ($value === null) {
                $missingFields[] = 'alert';
                goto after_alert;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'alert';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['alert'] = $value;

            after_alert:

            $value = $payload['commit_oid'] ?? null;

            if ($value === null) {
                $missingFields[] = 'commit_oid';
                goto after_commitOid;
            }

            $properties['commitOid'] = $value;

            after_commitOid:

            $value = $payload['enterprise'] ?? null;

            if ($value === null) {
                $properties['enterprise'] = null;
                goto after_enterprise;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'enterprise';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['enterprise'] = $value;

            after_enterprise:

            $value = $payload['installation'] ?? null;

            if ($value === null) {
                $properties['installation'] = null;
                goto after_installation;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'installation';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['installation'] = $value;

            after_installation:

            $value = $payload['organization'] ?? null;

            if ($value === null) {
                $properties['organization'] = null;
                goto after_organization;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'organization';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['organization'] = $value;

            after_organization:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['repository'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository';
                goto after_repository;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'repository';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['repository'] = $value;

            after_repository:

            $value = $payload['sender'] ?? null;

            if ($value === null) {
                $missingFields[] = 'sender';
                goto after_sender;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'sender';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['sender'] = $value;

            after_sender:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(WebhookCodeScanningAlertFixed::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new WebhookCodeScanningAlertFixed(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'created_at';
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['dismissed_at'] ?? null;

            if ($value === null) {
                $properties['dismissedAt'] = null;
                goto after_dismissedAt;
            }

            $properties['dismissedAt'] = $value;

            after_dismissedAt:

            $value = $payload['dismissed_by'] ?? null;

            if ($value === null) {
                $properties['dismissedBy'] = null;
                goto after_dismissedBy;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'dismissedBy';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️DismissedBy($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['dismissedBy'] = $value;

            after_dismissedBy:

            $value = $payload['dismissed_reason'] ?? null;

            if ($value === null) {
                $properties['dismissedReason'] = null;
                goto after_dismissedReason;
            }

            $properties['dismissedReason'] = $value;

            after_dismissedReason:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['instances_url'] ?? null;

            if ($value === null) {
                $properties['instancesUrl'] = null;
                goto after_instancesUrl;
            }

            $properties['instancesUrl'] = $value;

            after_instancesUrl:

            $value = $payload['most_recent_instance'] ?? null;

            if ($value === null) {
                $properties['mostRecentInstance'] = null;
                goto after_mostRecentInstance;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'mostRecentInstance';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['mostRecentInstance'] = $value;

            after_mostRecentInstance:

            $value = $payload['number'] ?? null;

            if ($value === null) {
                $missingFields[] = 'number';
                goto after_number;
            }

            $properties['number'] = $value;

            after_number:

            $value = $payload['rule'] ?? null;

            if ($value === null) {
                $missingFields[] = 'rule';
                goto after_rule;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'rule';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Rule($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['rule'] = $value;

            after_rule:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:

            $value = $payload['tool'] ?? null;

            if ($value === null) {
                $missingFields[] = 'tool';
                goto after_tool;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'tool';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Tool($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['tool'] = $value;

            after_tool:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️DismissedBy(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $properties['avatarUrl'] = null;
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['deleted'] ?? null;

            if ($value === null) {
                $properties['deleted'] = null;
                goto after_deleted;
            }

            $properties['deleted'] = $value;

            after_deleted:

            $value = $payload['email'] ?? null;

            if ($value === null) {
                $properties['email'] = null;
                goto after_email;
            }

            $properties['email'] = $value;

            after_email:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $properties['eventsUrl'] = null;
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $properties['followersUrl'] = null;
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $properties['followingUrl'] = null;
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $properties['gistsUrl'] = null;
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $properties['htmlUrl'] = null;
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['login'] ?? null;

            if ($value === null) {
                $missingFields[] = 'login';
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $properties['nodeId'] = null;
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $properties['organizationsUrl'] = null;
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $properties['receivedEventsUrl'] = null;
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $properties['reposUrl'] = null;
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $properties['siteAdmin'] = null;
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $properties['starredUrl'] = null;
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $properties['subscriptionsUrl'] = null;
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $properties['type'] = null;
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['analysis_key'] ?? null;

            if ($value === null) {
                $missingFields[] = 'analysis_key';
                goto after_analysisKey;
            }

            $properties['analysisKey'] = $value;

            after_analysisKey:

            $value = $payload['category'] ?? null;

            if ($value === null) {
                $properties['category'] = null;
                goto after_category;
            }

            $properties['category'] = $value;

            after_category:

            $value = $payload['classifications'] ?? null;

            if ($value === null) {
                $properties['classifications'] = null;
                goto after_classifications;
            }

            $properties['classifications'] = $value;

            after_classifications:

            $value = $payload['commit_sha'] ?? null;

            if ($value === null) {
                $properties['commitSha'] = null;
                goto after_commitSha;
            }

            $properties['commitSha'] = $value;

            after_commitSha:

            $value = $payload['environment'] ?? null;

            if ($value === null) {
                $missingFields[] = 'environment';
                goto after_environment;
            }

            $properties['environment'] = $value;

            after_environment:

            $value = $payload['location'] ?? null;

            if ($value === null) {
                $properties['location'] = null;
                goto after_location;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'location';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['location'] = $value;

            after_location:

            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'message';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Location(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['end_column'] ?? null;

            if ($value === null) {
                $properties['endColumn'] = null;
                goto after_endColumn;
            }

            $properties['endColumn'] = $value;

            after_endColumn:

            $value = $payload['end_line'] ?? null;

            if ($value === null) {
                $properties['endLine'] = null;
                goto after_endLine;
            }

            $properties['endLine'] = $value;

            after_endLine:

            $value = $payload['path'] ?? null;

            if ($value === null) {
                $properties['path'] = null;
                goto after_path;
            }

            $properties['path'] = $value;

            after_path:

            $value = $payload['start_column'] ?? null;

            if ($value === null) {
                $properties['startColumn'] = null;
                goto after_startColumn;
            }

            $properties['startColumn'] = $value;

            after_startColumn:

            $value = $payload['start_line'] ?? null;

            if ($value === null) {
                $properties['startLine'] = null;
                goto after_startLine;
            }

            $properties['startLine'] = $value;

            after_startLine:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Message(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['text'] ?? null;

            if ($value === null) {
                $properties['text'] = null;
                goto after_text;
            }

            $properties['text'] = $value;

            after_text:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Rule(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['description'] ?? null;

            if ($value === null) {
                $missingFields[] = 'description';
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['full_description'] ?? null;

            if ($value === null) {
                $properties['fullDescription'] = null;
                goto after_fullDescription;
            }

            $properties['fullDescription'] = $value;

            after_fullDescription:

            $value = $payload['help'] ?? null;

            if ($value === null) {
                $properties['help'] = null;
                goto after_help;
            }

            $properties['help'] = $value;

            after_help:

            $value = $payload['help_uri'] ?? null;

            if ($value === null) {
                $properties['helpUri'] = null;
                goto after_helpUri;
            }

            $properties['helpUri'] = $value;

            after_helpUri:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['severity'] ?? null;

            if ($value === null) {
                $properties['severity'] = null;
                goto after_severity;
            }

            $properties['severity'] = $value;

            after_severity:

            $value = $payload['tags'] ?? null;

            if ($value === null) {
                $properties['tags'] = null;
                goto after_tags;
            }

            $properties['tags'] = $value;

            after_tags:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Tool(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['guid'] ?? null;

            if ($value === null) {
                $properties['guid'] = null;
                goto after_guid;
            }

            $properties['guid'] = $value;

            after_guid:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['version'] ?? null;

            if ($value === null) {
                $properties['version'] = null;
                goto after_version;
            }

            $properties['version'] = $value;

            after_version:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened(array $payload): WebhookCodeScanningAlertReopened
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['action'] ?? null;

            if ($value === null) {
                $missingFields[] = 'action';
                goto after_action;
            }

            $properties['action'] = $value;

            after_action:

            $value = $payload['alert'] ?? null;

            if ($value === null) {
                $properties['alert'] = null;
                goto after_alert;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'alert';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['alert'] = $value;

            after_alert:

            $value = $payload['commit_oid'] ?? null;

            if ($value === null) {
                $properties['commitOid'] = null;
                goto after_commitOid;
            }

            $properties['commitOid'] = $value;

            after_commitOid:

            $value = $payload['enterprise'] ?? null;

            if ($value === null) {
                $properties['enterprise'] = null;
                goto after_enterprise;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'enterprise';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['enterprise'] = $value;

            after_enterprise:

            $value = $payload['installation'] ?? null;

            if ($value === null) {
                $properties['installation'] = null;
                goto after_installation;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'installation';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['installation'] = $value;

            after_installation:

            $value = $payload['organization'] ?? null;

            if ($value === null) {
                $properties['organization'] = null;
                goto after_organization;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'organization';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['organization'] = $value;

            after_organization:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $properties['ref'] = null;
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['repository'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository';
                goto after_repository;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'repository';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['repository'] = $value;

            after_repository:

            $value = $payload['sender'] ?? null;

            if ($value === null) {
                $missingFields[] = 'sender';
                goto after_sender;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'sender';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['sender'] = $value;

            after_sender:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(WebhookCodeScanningAlertReopened::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new WebhookCodeScanningAlertReopened(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'created_at';
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['dismissed_at'] ?? null;

            if ($value === null) {
                $properties['dismissedAt'] = null;
                goto after_dismissedAt;
            }

            $properties['dismissedAt'] = $value;

            after_dismissedAt:

            $value = $payload['dismissed_by'] ?? null;

            if ($value === null) {
                $properties['dismissedBy'] = null;
                goto after_dismissedBy;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'dismissedBy';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️DismissedBy($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['dismissedBy'] = $value;

            after_dismissedBy:

            $value = $payload['dismissed_reason'] ?? null;

            if ($value === null) {
                $properties['dismissedReason'] = null;
                goto after_dismissedReason;
            }

            $properties['dismissedReason'] = $value;

            after_dismissedReason:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['most_recent_instance'] ?? null;

            if ($value === null) {
                $properties['mostRecentInstance'] = null;
                goto after_mostRecentInstance;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'mostRecentInstance';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['mostRecentInstance'] = $value;

            after_mostRecentInstance:

            $value = $payload['number'] ?? null;

            if ($value === null) {
                $missingFields[] = 'number';
                goto after_number;
            }

            $properties['number'] = $value;

            after_number:

            $value = $payload['rule'] ?? null;

            if ($value === null) {
                $missingFields[] = 'rule';
                goto after_rule;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'rule';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Rule($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['rule'] = $value;

            after_rule:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:

            $value = $payload['tool'] ?? null;

            if ($value === null) {
                $missingFields[] = 'tool';
                goto after_tool;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'tool';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Tool($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['tool'] = $value;

            after_tool:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['analysis_key'] ?? null;

            if ($value === null) {
                $missingFields[] = 'analysis_key';
                goto after_analysisKey;
            }

            $properties['analysisKey'] = $value;

            after_analysisKey:

            $value = $payload['category'] ?? null;

            if ($value === null) {
                $properties['category'] = null;
                goto after_category;
            }

            $properties['category'] = $value;

            after_category:

            $value = $payload['classifications'] ?? null;

            if ($value === null) {
                $properties['classifications'] = null;
                goto after_classifications;
            }

            $properties['classifications'] = $value;

            after_classifications:

            $value = $payload['commit_sha'] ?? null;

            if ($value === null) {
                $properties['commitSha'] = null;
                goto after_commitSha;
            }

            $properties['commitSha'] = $value;

            after_commitSha:

            $value = $payload['environment'] ?? null;

            if ($value === null) {
                $missingFields[] = 'environment';
                goto after_environment;
            }

            $properties['environment'] = $value;

            after_environment:

            $value = $payload['location'] ?? null;

            if ($value === null) {
                $properties['location'] = null;
                goto after_location;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'location';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['location'] = $value;

            after_location:

            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'message';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Location(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['end_column'] ?? null;

            if ($value === null) {
                $properties['endColumn'] = null;
                goto after_endColumn;
            }

            $properties['endColumn'] = $value;

            after_endColumn:

            $value = $payload['end_line'] ?? null;

            if ($value === null) {
                $properties['endLine'] = null;
                goto after_endLine;
            }

            $properties['endLine'] = $value;

            after_endLine:

            $value = $payload['path'] ?? null;

            if ($value === null) {
                $properties['path'] = null;
                goto after_path;
            }

            $properties['path'] = $value;

            after_path:

            $value = $payload['start_column'] ?? null;

            if ($value === null) {
                $properties['startColumn'] = null;
                goto after_startColumn;
            }

            $properties['startColumn'] = $value;

            after_startColumn:

            $value = $payload['start_line'] ?? null;

            if ($value === null) {
                $properties['startLine'] = null;
                goto after_startLine;
            }

            $properties['startLine'] = $value;

            after_startLine:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Message(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['text'] ?? null;

            if ($value === null) {
                $properties['text'] = null;
                goto after_text;
            }

            $properties['text'] = $value;

            after_text:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Rule(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['description'] ?? null;

            if ($value === null) {
                $missingFields[] = 'description';
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['full_description'] ?? null;

            if ($value === null) {
                $properties['fullDescription'] = null;
                goto after_fullDescription;
            }

            $properties['fullDescription'] = $value;

            after_fullDescription:

            $value = $payload['help'] ?? null;

            if ($value === null) {
                $properties['help'] = null;
                goto after_help;
            }

            $properties['help'] = $value;

            after_help:

            $value = $payload['help_uri'] ?? null;

            if ($value === null) {
                $properties['helpUri'] = null;
                goto after_helpUri;
            }

            $properties['helpUri'] = $value;

            after_helpUri:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $properties['name'] = null;
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['severity'] ?? null;

            if ($value === null) {
                $properties['severity'] = null;
                goto after_severity;
            }

            $properties['severity'] = $value;

            after_severity:

            $value = $payload['tags'] ?? null;

            if ($value === null) {
                $properties['tags'] = null;
                goto after_tags;
            }

            $properties['tags'] = $value;

            after_tags:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Tool(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['guid'] ?? null;

            if ($value === null) {
                $properties['guid'] = null;
                goto after_guid;
            }

            $properties['guid'] = $value;

            after_guid:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['version'] ?? null;

            if ($value === null) {
                $properties['version'] = null;
                goto after_version;
            }

            $properties['version'] = $value;

            after_version:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser(array $payload): WebhookCodeScanningAlertReopenedByUser
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['action'] ?? null;

            if ($value === null) {
                $missingFields[] = 'action';
                goto after_action;
            }

            $properties['action'] = $value;

            after_action:

            $value = $payload['alert'] ?? null;

            if ($value === null) {
                $missingFields[] = 'alert';
                goto after_alert;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'alert';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['alert'] = $value;

            after_alert:

            $value = $payload['commit_oid'] ?? null;

            if ($value === null) {
                $missingFields[] = 'commit_oid';
                goto after_commitOid;
            }

            $properties['commitOid'] = $value;

            after_commitOid:

            $value = $payload['enterprise'] ?? null;

            if ($value === null) {
                $properties['enterprise'] = null;
                goto after_enterprise;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'enterprise';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['enterprise'] = $value;

            after_enterprise:

            $value = $payload['installation'] ?? null;

            if ($value === null) {
                $properties['installation'] = null;
                goto after_installation;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'installation';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['installation'] = $value;

            after_installation:

            $value = $payload['organization'] ?? null;

            if ($value === null) {
                $properties['organization'] = null;
                goto after_organization;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'organization';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['organization'] = $value;

            after_organization:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['repository'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository';
                goto after_repository;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'repository';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['repository'] = $value;

            after_repository:

            $value = $payload['sender'] ?? null;

            if ($value === null) {
                $missingFields[] = 'sender';
                goto after_sender;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'sender';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['sender'] = $value;

            after_sender:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(WebhookCodeScanningAlertReopenedByUser::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new WebhookCodeScanningAlertReopenedByUser(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'created_at';
                goto after_createdAt;
            }

            $properties['createdAt'] = $value;

            after_createdAt:

            $value = $payload['dismissed_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismissed_at';
                goto after_dismissedAt;
            }

            $properties['dismissedAt'] = $value;

            after_dismissedAt:

            $value = $payload['dismissed_by'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismissed_by';
                goto after_dismissedBy;
            }

            $properties['dismissedBy'] = $value;

            after_dismissedBy:

            $value = $payload['dismissed_reason'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismissed_reason';
                goto after_dismissedReason;
            }

            $properties['dismissedReason'] = $value;

            after_dismissedReason:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['most_recent_instance'] ?? null;

            if ($value === null) {
                $properties['mostRecentInstance'] = null;
                goto after_mostRecentInstance;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'mostRecentInstance';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['mostRecentInstance'] = $value;

            after_mostRecentInstance:

            $value = $payload['number'] ?? null;

            if ($value === null) {
                $missingFields[] = 'number';
                goto after_number;
            }

            $properties['number'] = $value;

            after_number:

            $value = $payload['rule'] ?? null;

            if ($value === null) {
                $missingFields[] = 'rule';
                goto after_rule;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'rule';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Rule($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['rule'] = $value;

            after_rule:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:

            $value = $payload['tool'] ?? null;

            if ($value === null) {
                $missingFields[] = 'tool';
                goto after_tool;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'tool';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Tool($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['tool'] = $value;

            after_tool:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'url';
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['analysis_key'] ?? null;

            if ($value === null) {
                $missingFields[] = 'analysis_key';
                goto after_analysisKey;
            }

            $properties['analysisKey'] = $value;

            after_analysisKey:

            $value = $payload['category'] ?? null;

            if ($value === null) {
                $properties['category'] = null;
                goto after_category;
            }

            $properties['category'] = $value;

            after_category:

            $value = $payload['classifications'] ?? null;

            if ($value === null) {
                $properties['classifications'] = null;
                goto after_classifications;
            }

            $properties['classifications'] = $value;

            after_classifications:

            $value = $payload['commit_sha'] ?? null;

            if ($value === null) {
                $properties['commitSha'] = null;
                goto after_commitSha;
            }

            $properties['commitSha'] = $value;

            after_commitSha:

            $value = $payload['environment'] ?? null;

            if ($value === null) {
                $missingFields[] = 'environment';
                goto after_environment;
            }

            $properties['environment'] = $value;

            after_environment:

            $value = $payload['location'] ?? null;

            if ($value === null) {
                $properties['location'] = null;
                goto after_location;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'location';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['location'] = $value;

            after_location:

            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'message';
                    $value                  = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['ref'] ?? null;

            if ($value === null) {
                $missingFields[] = 'ref';
                goto after_ref;
            }

            $properties['ref'] = $value;

            after_ref:

            $value = $payload['state'] ?? null;

            if ($value === null) {
                $missingFields[] = 'state';
                goto after_state;
            }

            $properties['state'] = $value;

            after_state:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Location(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['end_column'] ?? null;

            if ($value === null) {
                $properties['endColumn'] = null;
                goto after_endColumn;
            }

            $properties['endColumn'] = $value;

            after_endColumn:

            $value = $payload['end_line'] ?? null;

            if ($value === null) {
                $properties['endLine'] = null;
                goto after_endLine;
            }

            $properties['endLine'] = $value;

            after_endLine:

            $value = $payload['path'] ?? null;

            if ($value === null) {
                $properties['path'] = null;
                goto after_path;
            }

            $properties['path'] = $value;

            after_path:

            $value = $payload['start_column'] ?? null;

            if ($value === null) {
                $properties['startColumn'] = null;
                goto after_startColumn;
            }

            $properties['startColumn'] = $value;

            after_startColumn:

            $value = $payload['start_line'] ?? null;

            if ($value === null) {
                $properties['startLine'] = null;
                goto after_startLine;
            }

            $properties['startLine'] = $value;

            after_startLine:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Message(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['text'] ?? null;

            if ($value === null) {
                $properties['text'] = null;
                goto after_text;
            }

            $properties['text'] = $value;

            after_text:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Rule(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['description'] ?? null;

            if ($value === null) {
                $missingFields[] = 'description';
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['severity'] ?? null;

            if ($value === null) {
                $properties['severity'] = null;
                goto after_severity;
            }

            $properties['severity'] = $value;

            after_severity:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Tool(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['version'] ?? null;

            if ($value === null) {
                $properties['version'] = null;
                goto after_version;
            }

            $properties['version'] = $value;

            after_version:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️CustomProperties(array $payload): CustomProperties
    {
        $properties    = [];
        $missingFields = [];
        try {
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\CustomProperties', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(CustomProperties::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new CustomProperties(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\CustomProperties', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Owner(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Owner
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['login'] ?? null;

            if ($value === null) {
                $properties['login'] = null;
                goto after_login;
            }

            $properties['login'] = $value;

            after_login:

            $value = $payload['id'] ?? null;

            if ($value === null) {
                $properties['id'] = null;
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $properties['nodeId'] = null;
                goto after_nodeId;
            }

            $properties['nodeId'] = $value;

            after_nodeId:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $properties['avatarUrl'] = null;
                goto after_avatarUrl;
            }

            $properties['avatarUrl'] = $value;

            after_avatarUrl:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatarId'] = null;
                goto after_gravatarId;
            }

            $properties['gravatarId'] = $value;

            after_gravatarId:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $properties['htmlUrl'] = null;
                goto after_htmlUrl;
            }

            $properties['htmlUrl'] = $value;

            after_htmlUrl:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $properties['followersUrl'] = null;
                goto after_followersUrl;
            }

            $properties['followersUrl'] = $value;

            after_followersUrl:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $properties['followingUrl'] = null;
                goto after_followingUrl;
            }

            $properties['followingUrl'] = $value;

            after_followingUrl:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $properties['gistsUrl'] = null;
                goto after_gistsUrl;
            }

            $properties['gistsUrl'] = $value;

            after_gistsUrl:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $properties['starredUrl'] = null;
                goto after_starredUrl;
            }

            $properties['starredUrl'] = $value;

            after_starredUrl:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $properties['subscriptionsUrl'] = null;
                goto after_subscriptionsUrl;
            }

            $properties['subscriptionsUrl'] = $value;

            after_subscriptionsUrl:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $properties['organizationsUrl'] = null;
                goto after_organizationsUrl;
            }

            $properties['organizationsUrl'] = $value;

            after_organizationsUrl:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $properties['reposUrl'] = null;
                goto after_reposUrl;
            }

            $properties['reposUrl'] = $value;

            after_reposUrl:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $properties['eventsUrl'] = null;
                goto after_eventsUrl;
            }

            $properties['eventsUrl'] = $value;

            after_eventsUrl:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $properties['receivedEventsUrl'] = null;
                goto after_receivedEventsUrl;
            }

            $properties['receivedEventsUrl'] = $value;

            after_receivedEventsUrl:

            $value = $payload['type'] ?? null;

            if ($value === null) {
                $properties['type'] = null;
                goto after_type;
            }

            $properties['type'] = $value;

            after_type:

            $value = $payload['site_admin'] ?? null;

            if ($value === null) {
                $properties['siteAdmin'] = null;
                goto after_siteAdmin;
            }

            $properties['siteAdmin'] = $value;

            after_siteAdmin:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Owner', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Owner::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Owner(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Owner', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Permissions(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Permissions
    {
        $properties    = [];
        $missingFields = [];
        try {
            $value = $payload['admin'] ?? null;

            if ($value === null) {
                $properties['admin'] = null;
                goto after_admin;
            }

            $properties['admin'] = $value;

            after_admin:

            $value = $payload['maintain'] ?? null;

            if ($value === null) {
                $properties['maintain'] = null;
                goto after_maintain;
            }

            $properties['maintain'] = $value;

            after_maintain:

            $value = $payload['push'] ?? null;

            if ($value === null) {
                $properties['push'] = null;
                goto after_push;
            }

            $properties['push'] = $value;

            after_push:

            $value = $payload['triage'] ?? null;

            if ($value === null) {
                $properties['triage'] = null;
                goto after_triage;
            }

            $properties['triage'] = $value;

            after_triage:

            $value = $payload['pull'] ?? null;

            if ($value === null) {
                $properties['pull'] = null;
                goto after_pull;
            }

            $properties['pull'] = $value;

            after_pull:
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Permissions', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Permissions::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Permissions(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Repository\TemplateRepository\Permissions', $exception, stack: $this->hydrationStack);
        }
    }

    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️DismissedBy(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\DismissedBy
    {
        $properties    = [];
        $missingFields = [];
        try {
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\DismissedBy::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\DismissedBy(...$properties);
        } catch (Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\DismissedBy', $exception, stack: $this->hydrationStack);
        }
    }

    private function serializeViaTypeMap(string $accessor, object $object, array $payloadToTypeMap): array
    {
        foreach ($payloadToTypeMap as $payloadType => [$valueType, $method]) {
            if (is_a($object, $valueType)) {
                return [$accessor => $payloadType] + $this->{$method}($object);
            }
        }

        throw new LogicException('No type mapped for object of class: ' . $object::class);
    }

    public function serializeObject(object $object): mixed
    {
        return $this->serializeObjectOfType($object, $object::class);
    }

    /**
     * @param T               $object
     * @param class-string<T> $className
     *
     * @template T
     */
    public function serializeObjectOfType(object $object, string $className): mixed
    {
        try {
            return match ($className) {
                'array' => $this->serializeValuearray($object),
                'Ramsey\Uuid\UuidInterface' => $this->serializeValueRamsey⚡️Uuid⚡️UuidInterface($object),
                'DateTime' => $this->serializeValueDateTime($object),
                'DateTimeImmutable' => $this->serializeValueDateTimeImmutable($object),
                'DateTimeInterface' => $this->serializeValueDateTimeInterface($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\DismissedBy' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️DismissedBy($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Location' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\MostRecentInstance\Message' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Rule' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Rule($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertAppearedInBranch\Alert\Tool' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Tool($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\EnterpriseWebhooks' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleInstallation' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\OrganizationSimpleWebhooks' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\LicenseSimple' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️LicenseSimple($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\Permissions' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️Permissions($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Owner' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Owner($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Permissions($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUserWebhooks' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️DismissedBy($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Location($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Message($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Rule($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Tool($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Location($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Message($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Rule($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Tool($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️DismissedBy($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Location($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Message($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Rule($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Tool($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Location($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Message($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Rule($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Tool($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Location($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Message($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Rule($object),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Tool($object),
                default => throw new LogicException('No serialization defined for $className'),
            };
        } catch (Throwable $exception) {
            throw UnableToSerializeObject::dueToError($className, $exception);
        }
    }

    private function serializeValuearray(mixed $value): mixed
    {
        static $serializer;

        if ($serializer === null) {
            $serializer = new SerializeArrayItems(...[]);
        }

        return $serializer->serialize($value, $this);
    }

    private function serializeValueRamsey⚡️Uuid⚡️UuidInterface(mixed $value): mixed
    {
        static $serializer;

        if ($serializer === null) {
            $serializer = new SerializeUuidToString(...[]);
        }

        return $serializer->serialize($value, $this);
    }

    private function serializeValueDateTime(mixed $value): mixed
    {
        static $serializer;

        if ($serializer === null) {
            $serializer = new SerializeDateTime(...[]);
        }

        return $serializer->serialize($value, $this);
    }

    private function serializeValueDateTimeImmutable(mixed $value): mixed
    {
        static $serializer;

        if ($serializer === null) {
            $serializer = new SerializeDateTime(...[]);
        }

        return $serializer->serialize($value, $this);
    }

    private function serializeValueDateTimeInterface(mixed $value): mixed
    {
        static $serializer;

        if ($serializer === null) {
            $serializer = new SerializeDateTime(...[]);
        }

        return $serializer->serialize($value, $this);
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch(mixed $object): mixed
    {
        assert($object instanceof WebhookCodeScanningAlertAppearedInBranch);
        $result = [];

        $action                                = $object->action;
        after_action:        $result['action'] = $action;

        $alert                               = $object->alert;
        $alert                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert($alert);
        after_alert:        $result['alert'] = $alert;

        $commitOid                                    = $object->commitOid;
        after_commitOid:        $result['commit_oid'] = $commitOid;

        $enterprise = $object->enterprise;

        if ($enterprise === null) {
            goto after_enterprise;
        }

        $enterprise                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($enterprise);
        after_enterprise:        $result['enterprise'] = $enterprise;

        $installation = $object->installation;

        if ($installation === null) {
            goto after_installation;
        }

        $installation                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($installation);
        after_installation:        $result['installation'] = $installation;

        $organization = $object->organization;

        if ($organization === null) {
            goto after_organization;
        }

        $organization                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($organization);
        after_organization:        $result['organization'] = $organization;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $repository                                    = $object->repository;
        $repository                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($repository);
        after_repository:        $result['repository'] = $repository;

        $sender                                = $object->sender;
        $sender                                = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($sender);
        after_sender:        $result['sender'] = $sender;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert(mixed $object): mixed
    {
        assert($object instanceof Alert);
        $result = [];

        $createdAt                                    = $object->createdAt;
        after_createdAt:        $result['created_at'] = $createdAt;

        $dismissedAt = $object->dismissedAt;

        if ($dismissedAt === null) {
            goto after_dismissedAt;
        }

        after_dismissedAt:        $result['dismissed_at'] = $dismissedAt;

        $dismissedBy = $object->dismissedBy;

        if ($dismissedBy === null) {
            goto after_dismissedBy;
        }

        $dismissedBy                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️DismissedBy($dismissedBy);
        after_dismissedBy:        $result['dismissed_by'] = $dismissedBy;

        $dismissedReason = $object->dismissedReason;

        if ($dismissedReason === null) {
            goto after_dismissedReason;
        }

        after_dismissedReason:        $result['dismissed_reason'] = $dismissedReason;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $mostRecentInstance = $object->mostRecentInstance;

        if ($mostRecentInstance === null) {
            goto after_mostRecentInstance;
        }

        $mostRecentInstance                                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance($mostRecentInstance);
        after_mostRecentInstance:        $result['most_recent_instance'] = $mostRecentInstance;

        $number                                = $object->number;
        after_number:        $result['number'] = $number;

        $rule                              = $object->rule;
        $rule                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Rule($rule);
        after_rule:        $result['rule'] = $rule;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        $tool                              = $object->tool;
        $tool                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Tool($tool);
        after_tool:        $result['tool'] = $tool;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️DismissedBy(mixed $object): mixed
    {
        assert($object instanceof DismissedBy);
        $result = [];

        $avatarUrl = $object->avatarUrl;

        if ($avatarUrl === null) {
            goto after_avatarUrl;
        }

        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        $deleted = $object->deleted;

        if ($deleted === null) {
            goto after_deleted;
        }

        after_deleted:        $result['deleted'] = $deleted;

        $email = $object->email;

        if ($email === null) {
            goto after_email;
        }

        after_email:        $result['email'] = $email;

        $eventsUrl = $object->eventsUrl;

        if ($eventsUrl === null) {
            goto after_eventsUrl;
        }

        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $followersUrl = $object->followersUrl;

        if ($followersUrl === null) {
            goto after_followersUrl;
        }

        after_followersUrl:        $result['followers_url'] = $followersUrl;

        $followingUrl = $object->followingUrl;

        if ($followingUrl === null) {
            goto after_followingUrl;
        }

        after_followingUrl:        $result['following_url'] = $followingUrl;

        $gistsUrl = $object->gistsUrl;

        if ($gistsUrl === null) {
            goto after_gistsUrl;
        }

        after_gistsUrl:        $result['gists_url'] = $gistsUrl;

        $gravatarId = $object->gravatarId;

        if ($gravatarId === null) {
            goto after_gravatarId;
        }

        after_gravatarId:        $result['gravatar_id'] = $gravatarId;

        $htmlUrl = $object->htmlUrl;

        if ($htmlUrl === null) {
            goto after_htmlUrl;
        }

        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $login                               = $object->login;
        after_login:        $result['login'] = $login;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $nodeId = $object->nodeId;

        if ($nodeId === null) {
            goto after_nodeId;
        }

        after_nodeId:        $result['node_id'] = $nodeId;

        $organizationsUrl = $object->organizationsUrl;

        if ($organizationsUrl === null) {
            goto after_organizationsUrl;
        }

        after_organizationsUrl:        $result['organizations_url'] = $organizationsUrl;

        $receivedEventsUrl = $object->receivedEventsUrl;

        if ($receivedEventsUrl === null) {
            goto after_receivedEventsUrl;
        }

        after_receivedEventsUrl:        $result['received_events_url'] = $receivedEventsUrl;

        $reposUrl = $object->reposUrl;

        if ($reposUrl === null) {
            goto after_reposUrl;
        }

        after_reposUrl:        $result['repos_url'] = $reposUrl;

        $siteAdmin = $object->siteAdmin;

        if ($siteAdmin === null) {
            goto after_siteAdmin;
        }

        after_siteAdmin:        $result['site_admin'] = $siteAdmin;

        $starredUrl = $object->starredUrl;

        if ($starredUrl === null) {
            goto after_starredUrl;
        }

        after_starredUrl:        $result['starred_url'] = $starredUrl;

        $subscriptionsUrl = $object->subscriptionsUrl;

        if ($subscriptionsUrl === null) {
            goto after_subscriptionsUrl;
        }

        after_subscriptionsUrl:        $result['subscriptions_url'] = $subscriptionsUrl;

        $type = $object->type;

        if ($type === null) {
            goto after_type;
        }

        after_type:        $result['type'] = $type;

        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }

        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance(mixed $object): mixed
    {
        assert($object instanceof MostRecentInstance);
        $result = [];

        $analysisKey                                      = $object->analysisKey;
        after_analysisKey:        $result['analysis_key'] = $analysisKey;

        $category = $object->category;

        if ($category === null) {
            goto after_category;
        }

        after_category:        $result['category'] = $category;

        $classifications = $object->classifications;

        if ($classifications === null) {
            goto after_classifications;
        }

        static $classificationsSerializer0;

        if ($classificationsSerializer0 === null) {
            $classificationsSerializer0 = new SerializeArrayItems(...[]);
        }

        $classifications                                         = $classificationsSerializer0->serialize($classifications, $this);
        after_classifications:        $result['classifications'] = $classifications;

        $commitSha = $object->commitSha;

        if ($commitSha === null) {
            goto after_commitSha;
        }

        after_commitSha:        $result['commit_sha'] = $commitSha;

        $environment                                     = $object->environment;
        after_environment:        $result['environment'] = $environment;

        $location = $object->location;

        if ($location === null) {
            goto after_location;
        }

        $location                                  = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($location);
        after_location:        $result['location'] = $location;

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }

        $message                                 = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($message);
        after_message:        $result['message'] = $message;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location(mixed $object): mixed
    {
        assert($object instanceof Location);
        $result = [];

        $endColumn = $object->endColumn;

        if ($endColumn === null) {
            goto after_endColumn;
        }

        after_endColumn:        $result['end_column'] = $endColumn;

        $endLine = $object->endLine;

        if ($endLine === null) {
            goto after_endLine;
        }

        after_endLine:        $result['end_line'] = $endLine;

        $path = $object->path;

        if ($path === null) {
            goto after_path;
        }

        after_path:        $result['path'] = $path;

        $startColumn = $object->startColumn;

        if ($startColumn === null) {
            goto after_startColumn;
        }

        after_startColumn:        $result['start_column'] = $startColumn;

        $startLine = $object->startLine;

        if ($startLine === null) {
            goto after_startLine;
        }

        after_startLine:        $result['start_line'] = $startLine;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message(mixed $object): mixed
    {
        assert($object instanceof Message);
        $result = [];

        $text = $object->text;

        if ($text === null) {
            goto after_text;
        }

        after_text:        $result['text'] = $text;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Rule(mixed $object): mixed
    {
        assert($object instanceof Rule);
        $result = [];

        $description                                     = $object->description;
        after_description:        $result['description'] = $description;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $severity = $object->severity;

        if ($severity === null) {
            goto after_severity;
        }

        after_severity:        $result['severity'] = $severity;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️Tool(mixed $object): mixed
    {
        assert($object instanceof Tool);
        $result = [];

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $version = $object->version;

        if ($version === null) {
            goto after_version;
        }

        after_version:        $result['version'] = $version;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks(mixed $object): mixed
    {
        assert($object instanceof EnterpriseWebhooks);
        $result = [];

        $description = $object->description;

        if ($description === null) {
            goto after_description;
        }

        after_description:        $result['description'] = $description;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $websiteUrl = $object->websiteUrl;

        if ($websiteUrl === null) {
            goto after_websiteUrl;
        }

        after_websiteUrl:        $result['website_url'] = $websiteUrl;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $nodeId                                 = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $slug                              = $object->slug;
        after_slug:        $result['slug'] = $slug;

        $createdAt = $object->createdAt;

        if ($createdAt === null) {
            goto after_createdAt;
        }

        after_createdAt:        $result['created_at'] = $createdAt;

        $updatedAt = $object->updatedAt;

        if ($updatedAt === null) {
            goto after_updatedAt;
        }

        after_updatedAt:        $result['updated_at'] = $updatedAt;

        $avatarUrl                                    = $object->avatarUrl;
        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation(mixed $object): mixed
    {
        assert($object instanceof SimpleInstallation);
        $result = [];

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $nodeId                                 = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks(mixed $object): mixed
    {
        assert($object instanceof OrganizationSimpleWebhooks);
        $result = [];

        $login                               = $object->login;
        after_login:        $result['login'] = $login;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $nodeId                                 = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        $reposUrl                                   = $object->reposUrl;
        after_reposUrl:        $result['repos_url'] = $reposUrl;

        $eventsUrl                                    = $object->eventsUrl;
        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $hooksUrl                                   = $object->hooksUrl;
        after_hooksUrl:        $result['hooks_url'] = $hooksUrl;

        $issuesUrl                                    = $object->issuesUrl;
        after_issuesUrl:        $result['issues_url'] = $issuesUrl;

        $membersUrl                                     = $object->membersUrl;
        after_membersUrl:        $result['members_url'] = $membersUrl;

        $publicMembersUrl                                            = $object->publicMembersUrl;
        after_publicMembersUrl:        $result['public_members_url'] = $publicMembersUrl;

        $avatarUrl                                    = $object->avatarUrl;
        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        $description = $object->description;

        if ($description === null) {
            goto after_description;
        }

        after_description:        $result['description'] = $description;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks(mixed $object): mixed
    {
        assert($object instanceof RepositoryWebhooks);
        $result = [];

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $nodeId                                 = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $fullName                                   = $object->fullName;
        after_fullName:        $result['full_name'] = $fullName;

        $license = $object->license;

        if ($license === null) {
            goto after_license;
        }

        $license                                 = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️LicenseSimple($license);
        after_license:        $result['license'] = $license;

        $organization = $object->organization;

        if ($organization === null) {
            goto after_organization;
        }

        $organization                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($organization);
        after_organization:        $result['organization'] = $organization;

        $forks                               = $object->forks;
        after_forks:        $result['forks'] = $forks;

        $permissions = $object->permissions;

        if ($permissions === null) {
            goto after_permissions;
        }

        $permissions                                     = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️Permissions($permissions);
        after_permissions:        $result['permissions'] = $permissions;

        $owner                               = $object->owner;
        $owner                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($owner);
        after_owner:        $result['owner'] = $owner;

        $private                                 = $object->private;
        after_private:        $result['private'] = $private;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $description = $object->description;

        if ($description === null) {
            goto after_description;
        }

        after_description:        $result['description'] = $description;

        $fork                              = $object->fork;
        after_fork:        $result['fork'] = $fork;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        $archiveUrl                                     = $object->archiveUrl;
        after_archiveUrl:        $result['archive_url'] = $archiveUrl;

        $assigneesUrl                                       = $object->assigneesUrl;
        after_assigneesUrl:        $result['assignees_url'] = $assigneesUrl;

        $blobsUrl                                   = $object->blobsUrl;
        after_blobsUrl:        $result['blobs_url'] = $blobsUrl;

        $branchesUrl                                      = $object->branchesUrl;
        after_branchesUrl:        $result['branches_url'] = $branchesUrl;

        $collaboratorsUrl                                           = $object->collaboratorsUrl;
        after_collaboratorsUrl:        $result['collaborators_url'] = $collaboratorsUrl;

        $commentsUrl                                      = $object->commentsUrl;
        after_commentsUrl:        $result['comments_url'] = $commentsUrl;

        $commitsUrl                                     = $object->commitsUrl;
        after_commitsUrl:        $result['commits_url'] = $commitsUrl;

        $compareUrl                                     = $object->compareUrl;
        after_compareUrl:        $result['compare_url'] = $compareUrl;

        $contentsUrl                                      = $object->contentsUrl;
        after_contentsUrl:        $result['contents_url'] = $contentsUrl;

        $contributorsUrl                                          = $object->contributorsUrl;
        after_contributorsUrl:        $result['contributors_url'] = $contributorsUrl;

        $deploymentsUrl                                         = $object->deploymentsUrl;
        after_deploymentsUrl:        $result['deployments_url'] = $deploymentsUrl;

        $downloadsUrl                                       = $object->downloadsUrl;
        after_downloadsUrl:        $result['downloads_url'] = $downloadsUrl;

        $eventsUrl                                    = $object->eventsUrl;
        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $forksUrl                                   = $object->forksUrl;
        after_forksUrl:        $result['forks_url'] = $forksUrl;

        $gitCommitsUrl                                         = $object->gitCommitsUrl;
        after_gitCommitsUrl:        $result['git_commits_url'] = $gitCommitsUrl;

        $gitRefsUrl                                      = $object->gitRefsUrl;
        after_gitRefsUrl:        $result['git_refs_url'] = $gitRefsUrl;

        $gitTagsUrl                                      = $object->gitTagsUrl;
        after_gitTagsUrl:        $result['git_tags_url'] = $gitTagsUrl;

        $gitUrl                                 = $object->gitUrl;
        after_gitUrl:        $result['git_url'] = $gitUrl;

        $issueCommentUrl                                           = $object->issueCommentUrl;
        after_issueCommentUrl:        $result['issue_comment_url'] = $issueCommentUrl;

        $issueEventsUrl                                          = $object->issueEventsUrl;
        after_issueEventsUrl:        $result['issue_events_url'] = $issueEventsUrl;

        $issuesUrl                                    = $object->issuesUrl;
        after_issuesUrl:        $result['issues_url'] = $issuesUrl;

        $keysUrl                                  = $object->keysUrl;
        after_keysUrl:        $result['keys_url'] = $keysUrl;

        $labelsUrl                                    = $object->labelsUrl;
        after_labelsUrl:        $result['labels_url'] = $labelsUrl;

        $languagesUrl                                       = $object->languagesUrl;
        after_languagesUrl:        $result['languages_url'] = $languagesUrl;

        $mergesUrl                                    = $object->mergesUrl;
        after_mergesUrl:        $result['merges_url'] = $mergesUrl;

        $milestonesUrl                                        = $object->milestonesUrl;
        after_milestonesUrl:        $result['milestones_url'] = $milestonesUrl;

        $notificationsUrl                                           = $object->notificationsUrl;
        after_notificationsUrl:        $result['notifications_url'] = $notificationsUrl;

        $pullsUrl                                   = $object->pullsUrl;
        after_pullsUrl:        $result['pulls_url'] = $pullsUrl;

        $releasesUrl                                      = $object->releasesUrl;
        after_releasesUrl:        $result['releases_url'] = $releasesUrl;

        $sshUrl                                 = $object->sshUrl;
        after_sshUrl:        $result['ssh_url'] = $sshUrl;

        $stargazersUrl                                        = $object->stargazersUrl;
        after_stargazersUrl:        $result['stargazers_url'] = $stargazersUrl;

        $statusesUrl                                      = $object->statusesUrl;
        after_statusesUrl:        $result['statuses_url'] = $statusesUrl;

        $subscribersUrl                                         = $object->subscribersUrl;
        after_subscribersUrl:        $result['subscribers_url'] = $subscribersUrl;

        $subscriptionUrl                                          = $object->subscriptionUrl;
        after_subscriptionUrl:        $result['subscription_url'] = $subscriptionUrl;

        $tagsUrl                                  = $object->tagsUrl;
        after_tagsUrl:        $result['tags_url'] = $tagsUrl;

        $teamsUrl                                   = $object->teamsUrl;
        after_teamsUrl:        $result['teams_url'] = $teamsUrl;

        $treesUrl                                   = $object->treesUrl;
        after_treesUrl:        $result['trees_url'] = $treesUrl;

        $cloneUrl                                   = $object->cloneUrl;
        after_cloneUrl:        $result['clone_url'] = $cloneUrl;

        $mirrorUrl = $object->mirrorUrl;

        if ($mirrorUrl === null) {
            goto after_mirrorUrl;
        }

        after_mirrorUrl:        $result['mirror_url'] = $mirrorUrl;

        $hooksUrl                                   = $object->hooksUrl;
        after_hooksUrl:        $result['hooks_url'] = $hooksUrl;

        $svnUrl                                 = $object->svnUrl;
        after_svnUrl:        $result['svn_url'] = $svnUrl;

        $homepage = $object->homepage;

        if ($homepage === null) {
            goto after_homepage;
        }

        after_homepage:        $result['homepage'] = $homepage;

        $language = $object->language;

        if ($language === null) {
            goto after_language;
        }

        after_language:        $result['language'] = $language;

        $forksCount                                     = $object->forksCount;
        after_forksCount:        $result['forks_count'] = $forksCount;

        $stargazersCount                                          = $object->stargazersCount;
        after_stargazersCount:        $result['stargazers_count'] = $stargazersCount;

        $watchersCount                                        = $object->watchersCount;
        after_watchersCount:        $result['watchers_count'] = $watchersCount;

        $size                              = $object->size;
        after_size:        $result['size'] = $size;

        $defaultBranch                                        = $object->defaultBranch;
        after_defaultBranch:        $result['default_branch'] = $defaultBranch;

        $openIssuesCount                                           = $object->openIssuesCount;
        after_openIssuesCount:        $result['open_issues_count'] = $openIssuesCount;

        $isTemplate = $object->isTemplate;

        if ($isTemplate === null) {
            goto after_isTemplate;
        }

        after_isTemplate:        $result['is_template'] = $isTemplate;

        $topics = $object->topics;

        if ($topics === null) {
            goto after_topics;
        }

        static $topicsSerializer0;

        if ($topicsSerializer0 === null) {
            $topicsSerializer0 = new SerializeArrayItems(...[]);
        }

        $topics                                = $topicsSerializer0->serialize($topics, $this);
        after_topics:        $result['topics'] = $topics;

        $customProperties = $object->customProperties;

        if ($customProperties === null) {
            goto after_customProperties;
        }

        $customProperties                                           = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️CustomProperties($customProperties);
        after_customProperties:        $result['custom_properties'] = $customProperties;

        $hasIssues                                    = $object->hasIssues;
        after_hasIssues:        $result['has_issues'] = $hasIssues;

        $hasProjects                                      = $object->hasProjects;
        after_hasProjects:        $result['has_projects'] = $hasProjects;

        $hasWiki                                  = $object->hasWiki;
        after_hasWiki:        $result['has_wiki'] = $hasWiki;

        $hasPages                                   = $object->hasPages;
        after_hasPages:        $result['has_pages'] = $hasPages;

        $hasDownloads                                       = $object->hasDownloads;
        after_hasDownloads:        $result['has_downloads'] = $hasDownloads;

        $hasDiscussions = $object->hasDiscussions;

        if ($hasDiscussions === null) {
            goto after_hasDiscussions;
        }

        after_hasDiscussions:        $result['has_discussions'] = $hasDiscussions;

        $archived                                  = $object->archived;
        after_archived:        $result['archived'] = $archived;

        $disabled                                  = $object->disabled;
        after_disabled:        $result['disabled'] = $disabled;

        $visibility = $object->visibility;

        if ($visibility === null) {
            goto after_visibility;
        }

        after_visibility:        $result['visibility'] = $visibility;

        $pushedAt = $object->pushedAt;

        if ($pushedAt === null) {
            goto after_pushedAt;
        }

        after_pushedAt:        $result['pushed_at'] = $pushedAt;

        $createdAt = $object->createdAt;

        if ($createdAt === null) {
            goto after_createdAt;
        }

        after_createdAt:        $result['created_at'] = $createdAt;

        $updatedAt = $object->updatedAt;

        if ($updatedAt === null) {
            goto after_updatedAt;
        }

        after_updatedAt:        $result['updated_at'] = $updatedAt;

        $allowRebaseMerge = $object->allowRebaseMerge;

        if ($allowRebaseMerge === null) {
            goto after_allowRebaseMerge;
        }

        after_allowRebaseMerge:        $result['allow_rebase_merge'] = $allowRebaseMerge;

        $templateRepository = $object->templateRepository;

        if ($templateRepository === null) {
            goto after_templateRepository;
        }

        $templateRepository                                             = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository($templateRepository);
        after_templateRepository:        $result['template_repository'] = $templateRepository;

        $tempCloneToken = $object->tempCloneToken;

        if ($tempCloneToken === null) {
            goto after_tempCloneToken;
        }

        after_tempCloneToken:        $result['temp_clone_token'] = $tempCloneToken;

        $allowSquashMerge = $object->allowSquashMerge;

        if ($allowSquashMerge === null) {
            goto after_allowSquashMerge;
        }

        after_allowSquashMerge:        $result['allow_squash_merge'] = $allowSquashMerge;

        $allowAutoMerge = $object->allowAutoMerge;

        if ($allowAutoMerge === null) {
            goto after_allowAutoMerge;
        }

        after_allowAutoMerge:        $result['allow_auto_merge'] = $allowAutoMerge;

        $deleteBranchOnMerge = $object->deleteBranchOnMerge;

        if ($deleteBranchOnMerge === null) {
            goto after_deleteBranchOnMerge;
        }

        after_deleteBranchOnMerge:        $result['delete_branch_on_merge'] = $deleteBranchOnMerge;

        $allowUpdateBranch = $object->allowUpdateBranch;

        if ($allowUpdateBranch === null) {
            goto after_allowUpdateBranch;
        }

        after_allowUpdateBranch:        $result['allow_update_branch'] = $allowUpdateBranch;

        $useSquashPrTitleAsDefault = $object->useSquashPrTitleAsDefault;

        if ($useSquashPrTitleAsDefault === null) {
            goto after_useSquashPrTitleAsDefault;
        }

        after_useSquashPrTitleAsDefault:        $result['use_squash_pr_title_as_default'] = $useSquashPrTitleAsDefault;

        $squashMergeCommitTitle = $object->squashMergeCommitTitle;

        if ($squashMergeCommitTitle === null) {
            goto after_squashMergeCommitTitle;
        }

        after_squashMergeCommitTitle:        $result['squash_merge_commit_title'] = $squashMergeCommitTitle;

        $squashMergeCommitMessage = $object->squashMergeCommitMessage;

        if ($squashMergeCommitMessage === null) {
            goto after_squashMergeCommitMessage;
        }

        after_squashMergeCommitMessage:        $result['squash_merge_commit_message'] = $squashMergeCommitMessage;

        $mergeCommitTitle = $object->mergeCommitTitle;

        if ($mergeCommitTitle === null) {
            goto after_mergeCommitTitle;
        }

        after_mergeCommitTitle:        $result['merge_commit_title'] = $mergeCommitTitle;

        $mergeCommitMessage = $object->mergeCommitMessage;

        if ($mergeCommitMessage === null) {
            goto after_mergeCommitMessage;
        }

        after_mergeCommitMessage:        $result['merge_commit_message'] = $mergeCommitMessage;

        $allowMergeCommit = $object->allowMergeCommit;

        if ($allowMergeCommit === null) {
            goto after_allowMergeCommit;
        }

        after_allowMergeCommit:        $result['allow_merge_commit'] = $allowMergeCommit;

        $allowForking = $object->allowForking;

        if ($allowForking === null) {
            goto after_allowForking;
        }

        after_allowForking:        $result['allow_forking'] = $allowForking;

        $webCommitSignoffRequired = $object->webCommitSignoffRequired;

        if ($webCommitSignoffRequired === null) {
            goto after_webCommitSignoffRequired;
        }

        after_webCommitSignoffRequired:        $result['web_commit_signoff_required'] = $webCommitSignoffRequired;

        $subscribersCount = $object->subscribersCount;

        if ($subscribersCount === null) {
            goto after_subscribersCount;
        }

        after_subscribersCount:        $result['subscribers_count'] = $subscribersCount;

        $networkCount = $object->networkCount;

        if ($networkCount === null) {
            goto after_networkCount;
        }

        after_networkCount:        $result['network_count'] = $networkCount;

        $openIssues                                     = $object->openIssues;
        after_openIssues:        $result['open_issues'] = $openIssues;

        $watchers                                  = $object->watchers;
        after_watchers:        $result['watchers'] = $watchers;

        $masterBranch = $object->masterBranch;

        if ($masterBranch === null) {
            goto after_masterBranch;
        }

        after_masterBranch:        $result['master_branch'] = $masterBranch;

        $starredAt = $object->starredAt;

        if ($starredAt === null) {
            goto after_starredAt;
        }

        after_starredAt:        $result['starred_at'] = $starredAt;

        $anonymousAccessEnabled = $object->anonymousAccessEnabled;

        if ($anonymousAccessEnabled === null) {
            goto after_anonymousAccessEnabled;
        }

        after_anonymousAccessEnabled:        $result['anonymous_access_enabled'] = $anonymousAccessEnabled;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️LicenseSimple(mixed $object): mixed
    {
        assert($object instanceof LicenseSimple);
        $result = [];

        $key                             = $object->key;
        after_key:        $result['key'] = $key;

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }

        after_url:        $result['url'] = $url;

        $spdxId = $object->spdxId;

        if ($spdxId === null) {
            goto after_spdxId;
        }

        after_spdxId:        $result['spdx_id'] = $spdxId;

        $nodeId                                 = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        $htmlUrl = $object->htmlUrl;

        if ($htmlUrl === null) {
            goto after_htmlUrl;
        }

        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser(mixed $object): mixed
    {
        assert($object instanceof SimpleUser);
        $result = [];

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $email = $object->email;

        if ($email === null) {
            goto after_email;
        }

        after_email:        $result['email'] = $email;

        $login                               = $object->login;
        after_login:        $result['login'] = $login;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $nodeId                                 = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        $avatarUrl                                    = $object->avatarUrl;
        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        $gravatarId = $object->gravatarId;

        if ($gravatarId === null) {
            goto after_gravatarId;
        }

        after_gravatarId:        $result['gravatar_id'] = $gravatarId;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $followersUrl                                       = $object->followersUrl;
        after_followersUrl:        $result['followers_url'] = $followersUrl;

        $followingUrl                                       = $object->followingUrl;
        after_followingUrl:        $result['following_url'] = $followingUrl;

        $gistsUrl                                   = $object->gistsUrl;
        after_gistsUrl:        $result['gists_url'] = $gistsUrl;

        $starredUrl                                     = $object->starredUrl;
        after_starredUrl:        $result['starred_url'] = $starredUrl;

        $subscriptionsUrl                                           = $object->subscriptionsUrl;
        after_subscriptionsUrl:        $result['subscriptions_url'] = $subscriptionsUrl;

        $organizationsUrl                                           = $object->organizationsUrl;
        after_organizationsUrl:        $result['organizations_url'] = $organizationsUrl;

        $reposUrl                                   = $object->reposUrl;
        after_reposUrl:        $result['repos_url'] = $reposUrl;

        $eventsUrl                                    = $object->eventsUrl;
        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $receivedEventsUrl                                             = $object->receivedEventsUrl;
        after_receivedEventsUrl:        $result['received_events_url'] = $receivedEventsUrl;

        $type                              = $object->type;
        after_type:        $result['type'] = $type;

        $siteAdmin                                    = $object->siteAdmin;
        after_siteAdmin:        $result['site_admin'] = $siteAdmin;

        $starredAt = $object->starredAt;

        if ($starredAt === null) {
            goto after_starredAt;
        }

        after_starredAt:        $result['starred_at'] = $starredAt;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️Permissions(mixed $object): mixed
    {
        assert($object instanceof Permissions);
        $result = [];

        $admin                               = $object->admin;
        after_admin:        $result['admin'] = $admin;

        $pull                              = $object->pull;
        after_pull:        $result['pull'] = $pull;

        $triage = $object->triage;

        if ($triage === null) {
            goto after_triage;
        }

        after_triage:        $result['triage'] = $triage;

        $push                              = $object->push;
        after_push:        $result['push'] = $push;

        $maintain = $object->maintain;

        if ($maintain === null) {
            goto after_maintain;
        }

        after_maintain:        $result['maintain'] = $maintain;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository(mixed $object): mixed
    {
        assert($object instanceof TemplateRepository);
        $result = [];

        $id = $object->id;

        if ($id === null) {
            goto after_id;
        }

        after_id:        $result['id'] = $id;

        $nodeId = $object->nodeId;

        if ($nodeId === null) {
            goto after_nodeId;
        }

        after_nodeId:        $result['node_id'] = $nodeId;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $fullName = $object->fullName;

        if ($fullName === null) {
            goto after_fullName;
        }

        after_fullName:        $result['full_name'] = $fullName;

        $owner = $object->owner;

        if ($owner === null) {
            goto after_owner;
        }

        $owner                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Owner($owner);
        after_owner:        $result['owner'] = $owner;

        $private = $object->private;

        if ($private === null) {
            goto after_private;
        }

        after_private:        $result['private'] = $private;

        $htmlUrl = $object->htmlUrl;

        if ($htmlUrl === null) {
            goto after_htmlUrl;
        }

        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $description = $object->description;

        if ($description === null) {
            goto after_description;
        }

        after_description:        $result['description'] = $description;

        $fork = $object->fork;

        if ($fork === null) {
            goto after_fork;
        }

        after_fork:        $result['fork'] = $fork;

        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }

        after_url:        $result['url'] = $url;

        $archiveUrl = $object->archiveUrl;

        if ($archiveUrl === null) {
            goto after_archiveUrl;
        }

        after_archiveUrl:        $result['archive_url'] = $archiveUrl;

        $assigneesUrl = $object->assigneesUrl;

        if ($assigneesUrl === null) {
            goto after_assigneesUrl;
        }

        after_assigneesUrl:        $result['assignees_url'] = $assigneesUrl;

        $blobsUrl = $object->blobsUrl;

        if ($blobsUrl === null) {
            goto after_blobsUrl;
        }

        after_blobsUrl:        $result['blobs_url'] = $blobsUrl;

        $branchesUrl = $object->branchesUrl;

        if ($branchesUrl === null) {
            goto after_branchesUrl;
        }

        after_branchesUrl:        $result['branches_url'] = $branchesUrl;

        $collaboratorsUrl = $object->collaboratorsUrl;

        if ($collaboratorsUrl === null) {
            goto after_collaboratorsUrl;
        }

        after_collaboratorsUrl:        $result['collaborators_url'] = $collaboratorsUrl;

        $commentsUrl = $object->commentsUrl;

        if ($commentsUrl === null) {
            goto after_commentsUrl;
        }

        after_commentsUrl:        $result['comments_url'] = $commentsUrl;

        $commitsUrl = $object->commitsUrl;

        if ($commitsUrl === null) {
            goto after_commitsUrl;
        }

        after_commitsUrl:        $result['commits_url'] = $commitsUrl;

        $compareUrl = $object->compareUrl;

        if ($compareUrl === null) {
            goto after_compareUrl;
        }

        after_compareUrl:        $result['compare_url'] = $compareUrl;

        $contentsUrl = $object->contentsUrl;

        if ($contentsUrl === null) {
            goto after_contentsUrl;
        }

        after_contentsUrl:        $result['contents_url'] = $contentsUrl;

        $contributorsUrl = $object->contributorsUrl;

        if ($contributorsUrl === null) {
            goto after_contributorsUrl;
        }

        after_contributorsUrl:        $result['contributors_url'] = $contributorsUrl;

        $deploymentsUrl = $object->deploymentsUrl;

        if ($deploymentsUrl === null) {
            goto after_deploymentsUrl;
        }

        after_deploymentsUrl:        $result['deployments_url'] = $deploymentsUrl;

        $downloadsUrl = $object->downloadsUrl;

        if ($downloadsUrl === null) {
            goto after_downloadsUrl;
        }

        after_downloadsUrl:        $result['downloads_url'] = $downloadsUrl;

        $eventsUrl = $object->eventsUrl;

        if ($eventsUrl === null) {
            goto after_eventsUrl;
        }

        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $forksUrl = $object->forksUrl;

        if ($forksUrl === null) {
            goto after_forksUrl;
        }

        after_forksUrl:        $result['forks_url'] = $forksUrl;

        $gitCommitsUrl = $object->gitCommitsUrl;

        if ($gitCommitsUrl === null) {
            goto after_gitCommitsUrl;
        }

        after_gitCommitsUrl:        $result['git_commits_url'] = $gitCommitsUrl;

        $gitRefsUrl = $object->gitRefsUrl;

        if ($gitRefsUrl === null) {
            goto after_gitRefsUrl;
        }

        after_gitRefsUrl:        $result['git_refs_url'] = $gitRefsUrl;

        $gitTagsUrl = $object->gitTagsUrl;

        if ($gitTagsUrl === null) {
            goto after_gitTagsUrl;
        }

        after_gitTagsUrl:        $result['git_tags_url'] = $gitTagsUrl;

        $gitUrl = $object->gitUrl;

        if ($gitUrl === null) {
            goto after_gitUrl;
        }

        after_gitUrl:        $result['git_url'] = $gitUrl;

        $issueCommentUrl = $object->issueCommentUrl;

        if ($issueCommentUrl === null) {
            goto after_issueCommentUrl;
        }

        after_issueCommentUrl:        $result['issue_comment_url'] = $issueCommentUrl;

        $issueEventsUrl = $object->issueEventsUrl;

        if ($issueEventsUrl === null) {
            goto after_issueEventsUrl;
        }

        after_issueEventsUrl:        $result['issue_events_url'] = $issueEventsUrl;

        $issuesUrl = $object->issuesUrl;

        if ($issuesUrl === null) {
            goto after_issuesUrl;
        }

        after_issuesUrl:        $result['issues_url'] = $issuesUrl;

        $keysUrl = $object->keysUrl;

        if ($keysUrl === null) {
            goto after_keysUrl;
        }

        after_keysUrl:        $result['keys_url'] = $keysUrl;

        $labelsUrl = $object->labelsUrl;

        if ($labelsUrl === null) {
            goto after_labelsUrl;
        }

        after_labelsUrl:        $result['labels_url'] = $labelsUrl;

        $languagesUrl = $object->languagesUrl;

        if ($languagesUrl === null) {
            goto after_languagesUrl;
        }

        after_languagesUrl:        $result['languages_url'] = $languagesUrl;

        $mergesUrl = $object->mergesUrl;

        if ($mergesUrl === null) {
            goto after_mergesUrl;
        }

        after_mergesUrl:        $result['merges_url'] = $mergesUrl;

        $milestonesUrl = $object->milestonesUrl;

        if ($milestonesUrl === null) {
            goto after_milestonesUrl;
        }

        after_milestonesUrl:        $result['milestones_url'] = $milestonesUrl;

        $notificationsUrl = $object->notificationsUrl;

        if ($notificationsUrl === null) {
            goto after_notificationsUrl;
        }

        after_notificationsUrl:        $result['notifications_url'] = $notificationsUrl;

        $pullsUrl = $object->pullsUrl;

        if ($pullsUrl === null) {
            goto after_pullsUrl;
        }

        after_pullsUrl:        $result['pulls_url'] = $pullsUrl;

        $releasesUrl = $object->releasesUrl;

        if ($releasesUrl === null) {
            goto after_releasesUrl;
        }

        after_releasesUrl:        $result['releases_url'] = $releasesUrl;

        $sshUrl = $object->sshUrl;

        if ($sshUrl === null) {
            goto after_sshUrl;
        }

        after_sshUrl:        $result['ssh_url'] = $sshUrl;

        $stargazersUrl = $object->stargazersUrl;

        if ($stargazersUrl === null) {
            goto after_stargazersUrl;
        }

        after_stargazersUrl:        $result['stargazers_url'] = $stargazersUrl;

        $statusesUrl = $object->statusesUrl;

        if ($statusesUrl === null) {
            goto after_statusesUrl;
        }

        after_statusesUrl:        $result['statuses_url'] = $statusesUrl;

        $subscribersUrl = $object->subscribersUrl;

        if ($subscribersUrl === null) {
            goto after_subscribersUrl;
        }

        after_subscribersUrl:        $result['subscribers_url'] = $subscribersUrl;

        $subscriptionUrl = $object->subscriptionUrl;

        if ($subscriptionUrl === null) {
            goto after_subscriptionUrl;
        }

        after_subscriptionUrl:        $result['subscription_url'] = $subscriptionUrl;

        $tagsUrl = $object->tagsUrl;

        if ($tagsUrl === null) {
            goto after_tagsUrl;
        }

        after_tagsUrl:        $result['tags_url'] = $tagsUrl;

        $teamsUrl = $object->teamsUrl;

        if ($teamsUrl === null) {
            goto after_teamsUrl;
        }

        after_teamsUrl:        $result['teams_url'] = $teamsUrl;

        $treesUrl = $object->treesUrl;

        if ($treesUrl === null) {
            goto after_treesUrl;
        }

        after_treesUrl:        $result['trees_url'] = $treesUrl;

        $cloneUrl = $object->cloneUrl;

        if ($cloneUrl === null) {
            goto after_cloneUrl;
        }

        after_cloneUrl:        $result['clone_url'] = $cloneUrl;

        $mirrorUrl = $object->mirrorUrl;

        if ($mirrorUrl === null) {
            goto after_mirrorUrl;
        }

        after_mirrorUrl:        $result['mirror_url'] = $mirrorUrl;

        $hooksUrl = $object->hooksUrl;

        if ($hooksUrl === null) {
            goto after_hooksUrl;
        }

        after_hooksUrl:        $result['hooks_url'] = $hooksUrl;

        $svnUrl = $object->svnUrl;

        if ($svnUrl === null) {
            goto after_svnUrl;
        }

        after_svnUrl:        $result['svn_url'] = $svnUrl;

        $homepage = $object->homepage;

        if ($homepage === null) {
            goto after_homepage;
        }

        after_homepage:        $result['homepage'] = $homepage;

        $language = $object->language;

        if ($language === null) {
            goto after_language;
        }

        after_language:        $result['language'] = $language;

        $forksCount = $object->forksCount;

        if ($forksCount === null) {
            goto after_forksCount;
        }

        after_forksCount:        $result['forks_count'] = $forksCount;

        $stargazersCount = $object->stargazersCount;

        if ($stargazersCount === null) {
            goto after_stargazersCount;
        }

        after_stargazersCount:        $result['stargazers_count'] = $stargazersCount;

        $watchersCount = $object->watchersCount;

        if ($watchersCount === null) {
            goto after_watchersCount;
        }

        after_watchersCount:        $result['watchers_count'] = $watchersCount;

        $size = $object->size;

        if ($size === null) {
            goto after_size;
        }

        after_size:        $result['size'] = $size;

        $defaultBranch = $object->defaultBranch;

        if ($defaultBranch === null) {
            goto after_defaultBranch;
        }

        after_defaultBranch:        $result['default_branch'] = $defaultBranch;

        $openIssuesCount = $object->openIssuesCount;

        if ($openIssuesCount === null) {
            goto after_openIssuesCount;
        }

        after_openIssuesCount:        $result['open_issues_count'] = $openIssuesCount;

        $isTemplate = $object->isTemplate;

        if ($isTemplate === null) {
            goto after_isTemplate;
        }

        after_isTemplate:        $result['is_template'] = $isTemplate;

        $topics = $object->topics;

        if ($topics === null) {
            goto after_topics;
        }

        static $topicsSerializer0;

        if ($topicsSerializer0 === null) {
            $topicsSerializer0 = new SerializeArrayItems(...[]);
        }

        $topics                                = $topicsSerializer0->serialize($topics, $this);
        after_topics:        $result['topics'] = $topics;

        $hasIssues = $object->hasIssues;

        if ($hasIssues === null) {
            goto after_hasIssues;
        }

        after_hasIssues:        $result['has_issues'] = $hasIssues;

        $hasProjects = $object->hasProjects;

        if ($hasProjects === null) {
            goto after_hasProjects;
        }

        after_hasProjects:        $result['has_projects'] = $hasProjects;

        $hasWiki = $object->hasWiki;

        if ($hasWiki === null) {
            goto after_hasWiki;
        }

        after_hasWiki:        $result['has_wiki'] = $hasWiki;

        $hasPages = $object->hasPages;

        if ($hasPages === null) {
            goto after_hasPages;
        }

        after_hasPages:        $result['has_pages'] = $hasPages;

        $hasDownloads = $object->hasDownloads;

        if ($hasDownloads === null) {
            goto after_hasDownloads;
        }

        after_hasDownloads:        $result['has_downloads'] = $hasDownloads;

        $archived = $object->archived;

        if ($archived === null) {
            goto after_archived;
        }

        after_archived:        $result['archived'] = $archived;

        $disabled = $object->disabled;

        if ($disabled === null) {
            goto after_disabled;
        }

        after_disabled:        $result['disabled'] = $disabled;

        $visibility = $object->visibility;

        if ($visibility === null) {
            goto after_visibility;
        }

        after_visibility:        $result['visibility'] = $visibility;

        $pushedAt = $object->pushedAt;

        if ($pushedAt === null) {
            goto after_pushedAt;
        }

        after_pushedAt:        $result['pushed_at'] = $pushedAt;

        $createdAt = $object->createdAt;

        if ($createdAt === null) {
            goto after_createdAt;
        }

        after_createdAt:        $result['created_at'] = $createdAt;

        $updatedAt = $object->updatedAt;

        if ($updatedAt === null) {
            goto after_updatedAt;
        }

        after_updatedAt:        $result['updated_at'] = $updatedAt;

        $permissions = $object->permissions;

        if ($permissions === null) {
            goto after_permissions;
        }

        $permissions                                     = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Repository⚡️TemplateRepository⚡️Permissions($permissions);
        after_permissions:        $result['permissions'] = $permissions;

        $allowRebaseMerge = $object->allowRebaseMerge;

        if ($allowRebaseMerge === null) {
            goto after_allowRebaseMerge;
        }

        after_allowRebaseMerge:        $result['allow_rebase_merge'] = $allowRebaseMerge;

        $tempCloneToken = $object->tempCloneToken;

        if ($tempCloneToken === null) {
            goto after_tempCloneToken;
        }

        after_tempCloneToken:        $result['temp_clone_token'] = $tempCloneToken;

        $allowSquashMerge = $object->allowSquashMerge;

        if ($allowSquashMerge === null) {
            goto after_allowSquashMerge;
        }

        after_allowSquashMerge:        $result['allow_squash_merge'] = $allowSquashMerge;

        $allowAutoMerge = $object->allowAutoMerge;

        if ($allowAutoMerge === null) {
            goto after_allowAutoMerge;
        }

        after_allowAutoMerge:        $result['allow_auto_merge'] = $allowAutoMerge;

        $deleteBranchOnMerge = $object->deleteBranchOnMerge;

        if ($deleteBranchOnMerge === null) {
            goto after_deleteBranchOnMerge;
        }

        after_deleteBranchOnMerge:        $result['delete_branch_on_merge'] = $deleteBranchOnMerge;

        $allowUpdateBranch = $object->allowUpdateBranch;

        if ($allowUpdateBranch === null) {
            goto after_allowUpdateBranch;
        }

        after_allowUpdateBranch:        $result['allow_update_branch'] = $allowUpdateBranch;

        $useSquashPrTitleAsDefault = $object->useSquashPrTitleAsDefault;

        if ($useSquashPrTitleAsDefault === null) {
            goto after_useSquashPrTitleAsDefault;
        }

        after_useSquashPrTitleAsDefault:        $result['use_squash_pr_title_as_default'] = $useSquashPrTitleAsDefault;

        $squashMergeCommitTitle = $object->squashMergeCommitTitle;

        if ($squashMergeCommitTitle === null) {
            goto after_squashMergeCommitTitle;
        }

        after_squashMergeCommitTitle:        $result['squash_merge_commit_title'] = $squashMergeCommitTitle;

        $squashMergeCommitMessage = $object->squashMergeCommitMessage;

        if ($squashMergeCommitMessage === null) {
            goto after_squashMergeCommitMessage;
        }

        after_squashMergeCommitMessage:        $result['squash_merge_commit_message'] = $squashMergeCommitMessage;

        $mergeCommitTitle = $object->mergeCommitTitle;

        if ($mergeCommitTitle === null) {
            goto after_mergeCommitTitle;
        }

        after_mergeCommitTitle:        $result['merge_commit_title'] = $mergeCommitTitle;

        $mergeCommitMessage = $object->mergeCommitMessage;

        if ($mergeCommitMessage === null) {
            goto after_mergeCommitMessage;
        }

        after_mergeCommitMessage:        $result['merge_commit_message'] = $mergeCommitMessage;

        $allowMergeCommit = $object->allowMergeCommit;

        if ($allowMergeCommit === null) {
            goto after_allowMergeCommit;
        }

        after_allowMergeCommit:        $result['allow_merge_commit'] = $allowMergeCommit;

        $subscribersCount = $object->subscribersCount;

        if ($subscribersCount === null) {
            goto after_subscribersCount;
        }

        after_subscribersCount:        $result['subscribers_count'] = $subscribersCount;

        $networkCount = $object->networkCount;

        if ($networkCount === null) {
            goto after_networkCount;
        }

        after_networkCount:        $result['network_count'] = $networkCount;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Owner(mixed $object): mixed
    {
        assert($object instanceof Owner);
        $result = [];

        $login = $object->login;

        if ($login === null) {
            goto after_login;
        }

        after_login:        $result['login'] = $login;

        $id = $object->id;

        if ($id === null) {
            goto after_id;
        }

        after_id:        $result['id'] = $id;

        $nodeId = $object->nodeId;

        if ($nodeId === null) {
            goto after_nodeId;
        }

        after_nodeId:        $result['node_id'] = $nodeId;

        $avatarUrl = $object->avatarUrl;

        if ($avatarUrl === null) {
            goto after_avatarUrl;
        }

        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        $gravatarId = $object->gravatarId;

        if ($gravatarId === null) {
            goto after_gravatarId;
        }

        after_gravatarId:        $result['gravatar_id'] = $gravatarId;

        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }

        after_url:        $result['url'] = $url;

        $htmlUrl = $object->htmlUrl;

        if ($htmlUrl === null) {
            goto after_htmlUrl;
        }

        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $followersUrl = $object->followersUrl;

        if ($followersUrl === null) {
            goto after_followersUrl;
        }

        after_followersUrl:        $result['followers_url'] = $followersUrl;

        $followingUrl = $object->followingUrl;

        if ($followingUrl === null) {
            goto after_followingUrl;
        }

        after_followingUrl:        $result['following_url'] = $followingUrl;

        $gistsUrl = $object->gistsUrl;

        if ($gistsUrl === null) {
            goto after_gistsUrl;
        }

        after_gistsUrl:        $result['gists_url'] = $gistsUrl;

        $starredUrl = $object->starredUrl;

        if ($starredUrl === null) {
            goto after_starredUrl;
        }

        after_starredUrl:        $result['starred_url'] = $starredUrl;

        $subscriptionsUrl = $object->subscriptionsUrl;

        if ($subscriptionsUrl === null) {
            goto after_subscriptionsUrl;
        }

        after_subscriptionsUrl:        $result['subscriptions_url'] = $subscriptionsUrl;

        $organizationsUrl = $object->organizationsUrl;

        if ($organizationsUrl === null) {
            goto after_organizationsUrl;
        }

        after_organizationsUrl:        $result['organizations_url'] = $organizationsUrl;

        $reposUrl = $object->reposUrl;

        if ($reposUrl === null) {
            goto after_reposUrl;
        }

        after_reposUrl:        $result['repos_url'] = $reposUrl;

        $eventsUrl = $object->eventsUrl;

        if ($eventsUrl === null) {
            goto after_eventsUrl;
        }

        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $receivedEventsUrl = $object->receivedEventsUrl;

        if ($receivedEventsUrl === null) {
            goto after_receivedEventsUrl;
        }

        after_receivedEventsUrl:        $result['received_events_url'] = $receivedEventsUrl;

        $type = $object->type;

        if ($type === null) {
            goto after_type;
        }

        after_type:        $result['type'] = $type;

        $siteAdmin = $object->siteAdmin;

        if ($siteAdmin === null) {
            goto after_siteAdmin;
        }

        after_siteAdmin:        $result['site_admin'] = $siteAdmin;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks⚡️TemplateRepository⚡️Permissions(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\RepositoryWebhooks\TemplateRepository\Permissions);
        $result = [];

        $admin = $object->admin;

        if ($admin === null) {
            goto after_admin;
        }

        after_admin:        $result['admin'] = $admin;

        $maintain = $object->maintain;

        if ($maintain === null) {
            goto after_maintain;
        }

        after_maintain:        $result['maintain'] = $maintain;

        $push = $object->push;

        if ($push === null) {
            goto after_push;
        }

        after_push:        $result['push'] = $push;

        $triage = $object->triage;

        if ($triage === null) {
            goto after_triage;
        }

        after_triage:        $result['triage'] = $triage;

        $pull = $object->pull;

        if ($pull === null) {
            goto after_pull;
        }

        after_pull:        $result['pull'] = $pull;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks(mixed $object): mixed
    {
        assert($object instanceof SimpleUserWebhooks);
        $result = [];

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $email = $object->email;

        if ($email === null) {
            goto after_email;
        }

        after_email:        $result['email'] = $email;

        $login                               = $object->login;
        after_login:        $result['login'] = $login;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $nodeId                                 = $object->nodeId;
        after_nodeId:        $result['node_id'] = $nodeId;

        $avatarUrl                                    = $object->avatarUrl;
        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        $gravatarId = $object->gravatarId;

        if ($gravatarId === null) {
            goto after_gravatarId;
        }

        after_gravatarId:        $result['gravatar_id'] = $gravatarId;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $followersUrl                                       = $object->followersUrl;
        after_followersUrl:        $result['followers_url'] = $followersUrl;

        $followingUrl                                       = $object->followingUrl;
        after_followingUrl:        $result['following_url'] = $followingUrl;

        $gistsUrl                                   = $object->gistsUrl;
        after_gistsUrl:        $result['gists_url'] = $gistsUrl;

        $starredUrl                                     = $object->starredUrl;
        after_starredUrl:        $result['starred_url'] = $starredUrl;

        $subscriptionsUrl                                           = $object->subscriptionsUrl;
        after_subscriptionsUrl:        $result['subscriptions_url'] = $subscriptionsUrl;

        $organizationsUrl                                           = $object->organizationsUrl;
        after_organizationsUrl:        $result['organizations_url'] = $organizationsUrl;

        $reposUrl                                   = $object->reposUrl;
        after_reposUrl:        $result['repos_url'] = $reposUrl;

        $eventsUrl                                    = $object->eventsUrl;
        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $receivedEventsUrl                                             = $object->receivedEventsUrl;
        after_receivedEventsUrl:        $result['received_events_url'] = $receivedEventsUrl;

        $type                              = $object->type;
        after_type:        $result['type'] = $type;

        $siteAdmin                                    = $object->siteAdmin;
        after_siteAdmin:        $result['site_admin'] = $siteAdmin;

        $starredAt = $object->starredAt;

        if ($starredAt === null) {
            goto after_starredAt;
        }

        after_starredAt:        $result['starred_at'] = $starredAt;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser(mixed $object): mixed
    {
        assert($object instanceof WebhookCodeScanningAlertClosedByUser);
        $result = [];

        $action                                = $object->action;
        after_action:        $result['action'] = $action;

        $alert                               = $object->alert;
        $alert                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert($alert);
        after_alert:        $result['alert'] = $alert;

        $commitOid                                    = $object->commitOid;
        after_commitOid:        $result['commit_oid'] = $commitOid;

        $enterprise = $object->enterprise;

        if ($enterprise === null) {
            goto after_enterprise;
        }

        $enterprise                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($enterprise);
        after_enterprise:        $result['enterprise'] = $enterprise;

        $installation = $object->installation;

        if ($installation === null) {
            goto after_installation;
        }

        $installation                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($installation);
        after_installation:        $result['installation'] = $installation;

        $organization = $object->organization;

        if ($organization === null) {
            goto after_organization;
        }

        $organization                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($organization);
        after_organization:        $result['organization'] = $organization;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $repository                                    = $object->repository;
        $repository                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($repository);
        after_repository:        $result['repository'] = $repository;

        $sender                                = $object->sender;
        $sender                                = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($sender);
        after_sender:        $result['sender'] = $sender;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert);
        $result = [];

        $createdAt                                    = $object->createdAt;
        after_createdAt:        $result['created_at'] = $createdAt;

        $dismissedAt                                      = $object->dismissedAt;
        after_dismissedAt:        $result['dismissed_at'] = $dismissedAt;

        $dismissedBy = $object->dismissedBy;

        if ($dismissedBy === null) {
            goto after_dismissedBy;
        }

        $dismissedBy                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️DismissedBy($dismissedBy);
        after_dismissedBy:        $result['dismissed_by'] = $dismissedBy;

        $dismissedReason = $object->dismissedReason;

        if ($dismissedReason === null) {
            goto after_dismissedReason;
        }

        after_dismissedReason:        $result['dismissed_reason'] = $dismissedReason;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $mostRecentInstance = $object->mostRecentInstance;

        if ($mostRecentInstance === null) {
            goto after_mostRecentInstance;
        }

        $mostRecentInstance                                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance($mostRecentInstance);
        after_mostRecentInstance:        $result['most_recent_instance'] = $mostRecentInstance;

        $number                                = $object->number;
        after_number:        $result['number'] = $number;

        $rule                              = $object->rule;
        $rule                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Rule($rule);
        after_rule:        $result['rule'] = $rule;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        $tool                              = $object->tool;
        $tool                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Tool($tool);
        after_tool:        $result['tool'] = $tool;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️DismissedBy(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\DismissedBy);
        $result = [];

        $avatarUrl = $object->avatarUrl;

        if ($avatarUrl === null) {
            goto after_avatarUrl;
        }

        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        $deleted = $object->deleted;

        if ($deleted === null) {
            goto after_deleted;
        }

        after_deleted:        $result['deleted'] = $deleted;

        $email = $object->email;

        if ($email === null) {
            goto after_email;
        }

        after_email:        $result['email'] = $email;

        $eventsUrl = $object->eventsUrl;

        if ($eventsUrl === null) {
            goto after_eventsUrl;
        }

        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $followersUrl = $object->followersUrl;

        if ($followersUrl === null) {
            goto after_followersUrl;
        }

        after_followersUrl:        $result['followers_url'] = $followersUrl;

        $followingUrl = $object->followingUrl;

        if ($followingUrl === null) {
            goto after_followingUrl;
        }

        after_followingUrl:        $result['following_url'] = $followingUrl;

        $gistsUrl = $object->gistsUrl;

        if ($gistsUrl === null) {
            goto after_gistsUrl;
        }

        after_gistsUrl:        $result['gists_url'] = $gistsUrl;

        $gravatarId = $object->gravatarId;

        if ($gravatarId === null) {
            goto after_gravatarId;
        }

        after_gravatarId:        $result['gravatar_id'] = $gravatarId;

        $htmlUrl = $object->htmlUrl;

        if ($htmlUrl === null) {
            goto after_htmlUrl;
        }

        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $login                               = $object->login;
        after_login:        $result['login'] = $login;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $nodeId = $object->nodeId;

        if ($nodeId === null) {
            goto after_nodeId;
        }

        after_nodeId:        $result['node_id'] = $nodeId;

        $organizationsUrl = $object->organizationsUrl;

        if ($organizationsUrl === null) {
            goto after_organizationsUrl;
        }

        after_organizationsUrl:        $result['organizations_url'] = $organizationsUrl;

        $receivedEventsUrl = $object->receivedEventsUrl;

        if ($receivedEventsUrl === null) {
            goto after_receivedEventsUrl;
        }

        after_receivedEventsUrl:        $result['received_events_url'] = $receivedEventsUrl;

        $reposUrl = $object->reposUrl;

        if ($reposUrl === null) {
            goto after_reposUrl;
        }

        after_reposUrl:        $result['repos_url'] = $reposUrl;

        $siteAdmin = $object->siteAdmin;

        if ($siteAdmin === null) {
            goto after_siteAdmin;
        }

        after_siteAdmin:        $result['site_admin'] = $siteAdmin;

        $starredUrl = $object->starredUrl;

        if ($starredUrl === null) {
            goto after_starredUrl;
        }

        after_starredUrl:        $result['starred_url'] = $starredUrl;

        $subscriptionsUrl = $object->subscriptionsUrl;

        if ($subscriptionsUrl === null) {
            goto after_subscriptionsUrl;
        }

        after_subscriptionsUrl:        $result['subscriptions_url'] = $subscriptionsUrl;

        $type = $object->type;

        if ($type === null) {
            goto after_type;
        }

        after_type:        $result['type'] = $type;

        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }

        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance);
        $result = [];

        $analysisKey                                      = $object->analysisKey;
        after_analysisKey:        $result['analysis_key'] = $analysisKey;

        $category = $object->category;

        if ($category === null) {
            goto after_category;
        }

        after_category:        $result['category'] = $category;

        $classifications = $object->classifications;

        if ($classifications === null) {
            goto after_classifications;
        }

        static $classificationsSerializer0;

        if ($classificationsSerializer0 === null) {
            $classificationsSerializer0 = new SerializeArrayItems(...[]);
        }

        $classifications                                         = $classificationsSerializer0->serialize($classifications, $this);
        after_classifications:        $result['classifications'] = $classifications;

        $commitSha = $object->commitSha;

        if ($commitSha === null) {
            goto after_commitSha;
        }

        after_commitSha:        $result['commit_sha'] = $commitSha;

        $environment                                     = $object->environment;
        after_environment:        $result['environment'] = $environment;

        $location = $object->location;

        if ($location === null) {
            goto after_location;
        }

        $location                                  = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($location);
        after_location:        $result['location'] = $location;

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }

        $message                                 = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($message);
        after_message:        $result['message'] = $message;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Location(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Location);
        $result = [];

        $endColumn = $object->endColumn;

        if ($endColumn === null) {
            goto after_endColumn;
        }

        after_endColumn:        $result['end_column'] = $endColumn;

        $endLine = $object->endLine;

        if ($endLine === null) {
            goto after_endLine;
        }

        after_endLine:        $result['end_line'] = $endLine;

        $path = $object->path;

        if ($path === null) {
            goto after_path;
        }

        after_path:        $result['path'] = $path;

        $startColumn = $object->startColumn;

        if ($startColumn === null) {
            goto after_startColumn;
        }

        after_startColumn:        $result['start_column'] = $startColumn;

        $startLine = $object->startLine;

        if ($startLine === null) {
            goto after_startLine;
        }

        after_startLine:        $result['start_line'] = $startLine;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️MostRecentInstance⚡️Message(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\MostRecentInstance\Message);
        $result = [];

        $text = $object->text;

        if ($text === null) {
            goto after_text;
        }

        after_text:        $result['text'] = $text;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Rule(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Rule);
        $result = [];

        $description                                     = $object->description;
        after_description:        $result['description'] = $description;

        $fullDescription = $object->fullDescription;

        if ($fullDescription === null) {
            goto after_fullDescription;
        }

        after_fullDescription:        $result['full_description'] = $fullDescription;

        $help = $object->help;

        if ($help === null) {
            goto after_help;
        }

        after_help:        $result['help'] = $help;

        $helpUri = $object->helpUri;

        if ($helpUri === null) {
            goto after_helpUri;
        }

        after_helpUri:        $result['help_uri'] = $helpUri;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $severity = $object->severity;

        if ($severity === null) {
            goto after_severity;
        }

        after_severity:        $result['severity'] = $severity;

        $tags = $object->tags;

        if ($tags === null) {
            goto after_tags;
        }

        static $tagsSerializer0;

        if ($tagsSerializer0 === null) {
            $tagsSerializer0 = new SerializeArrayItems(...[]);
        }

        $tags                              = $tagsSerializer0->serialize($tags, $this);
        after_tags:        $result['tags'] = $tags;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertClosedByUser⚡️Alert⚡️Tool(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertClosedByUser\Alert\Tool);
        $result = [];

        $guid = $object->guid;

        if ($guid === null) {
            goto after_guid;
        }

        after_guid:        $result['guid'] = $guid;

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $version = $object->version;

        if ($version === null) {
            goto after_version;
        }

        after_version:        $result['version'] = $version;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated(mixed $object): mixed
    {
        assert($object instanceof WebhookCodeScanningAlertCreated);
        $result = [];

        $action                                = $object->action;
        after_action:        $result['action'] = $action;

        $alert                               = $object->alert;
        $alert                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert($alert);
        after_alert:        $result['alert'] = $alert;

        $commitOid                                    = $object->commitOid;
        after_commitOid:        $result['commit_oid'] = $commitOid;

        $enterprise = $object->enterprise;

        if ($enterprise === null) {
            goto after_enterprise;
        }

        $enterprise                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($enterprise);
        after_enterprise:        $result['enterprise'] = $enterprise;

        $installation = $object->installation;

        if ($installation === null) {
            goto after_installation;
        }

        $installation                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($installation);
        after_installation:        $result['installation'] = $installation;

        $organization = $object->organization;

        if ($organization === null) {
            goto after_organization;
        }

        $organization                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($organization);
        after_organization:        $result['organization'] = $organization;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $repository                                    = $object->repository;
        $repository                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($repository);
        after_repository:        $result['repository'] = $repository;

        $sender                                = $object->sender;
        $sender                                = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($sender);
        after_sender:        $result['sender'] = $sender;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert);
        $result = [];

        $createdAt = $object->createdAt;

        if ($createdAt === null) {
            goto after_createdAt;
        }

        after_createdAt:        $result['created_at'] = $createdAt;

        $dismissedAt                                      = $object->dismissedAt;
        after_dismissedAt:        $result['dismissed_at'] = $dismissedAt;

        $dismissedBy                                      = $object->dismissedBy;
        after_dismissedBy:        $result['dismissed_by'] = $dismissedBy;

        $dismissedComment = $object->dismissedComment;

        if ($dismissedComment === null) {
            goto after_dismissedComment;
        }

        after_dismissedComment:        $result['dismissed_comment'] = $dismissedComment;

        $dismissedReason                                          = $object->dismissedReason;
        after_dismissedReason:        $result['dismissed_reason'] = $dismissedReason;

        $fixedAt                                  = $object->fixedAt;
        after_fixedAt:        $result['fixed_at'] = $fixedAt;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $instancesUrl = $object->instancesUrl;

        if ($instancesUrl === null) {
            goto after_instancesUrl;
        }

        after_instancesUrl:        $result['instances_url'] = $instancesUrl;

        $mostRecentInstance = $object->mostRecentInstance;

        if ($mostRecentInstance === null) {
            goto after_mostRecentInstance;
        }

        $mostRecentInstance                                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance($mostRecentInstance);
        after_mostRecentInstance:        $result['most_recent_instance'] = $mostRecentInstance;

        $number                                = $object->number;
        after_number:        $result['number'] = $number;

        $rule                              = $object->rule;
        $rule                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Rule($rule);
        after_rule:        $result['rule'] = $rule;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        $tool = $object->tool;

        if ($tool === null) {
            goto after_tool;
        }

        $tool                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Tool($tool);
        after_tool:        $result['tool'] = $tool;

        $updatedAt = $object->updatedAt;

        if ($updatedAt === null) {
            goto after_updatedAt;
        }

        after_updatedAt:        $result['updated_at'] = $updatedAt;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance);
        $result = [];

        $analysisKey                                      = $object->analysisKey;
        after_analysisKey:        $result['analysis_key'] = $analysisKey;

        $category = $object->category;

        if ($category === null) {
            goto after_category;
        }

        after_category:        $result['category'] = $category;

        $classifications = $object->classifications;

        if ($classifications === null) {
            goto after_classifications;
        }

        static $classificationsSerializer0;

        if ($classificationsSerializer0 === null) {
            $classificationsSerializer0 = new SerializeArrayItems(...[]);
        }

        $classifications                                         = $classificationsSerializer0->serialize($classifications, $this);
        after_classifications:        $result['classifications'] = $classifications;

        $commitSha = $object->commitSha;

        if ($commitSha === null) {
            goto after_commitSha;
        }

        after_commitSha:        $result['commit_sha'] = $commitSha;

        $environment                                     = $object->environment;
        after_environment:        $result['environment'] = $environment;

        $location = $object->location;

        if ($location === null) {
            goto after_location;
        }

        $location                                  = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($location);
        after_location:        $result['location'] = $location;

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }

        $message                                 = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($message);
        after_message:        $result['message'] = $message;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Location(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Location);
        $result = [];

        $endColumn = $object->endColumn;

        if ($endColumn === null) {
            goto after_endColumn;
        }

        after_endColumn:        $result['end_column'] = $endColumn;

        $endLine = $object->endLine;

        if ($endLine === null) {
            goto after_endLine;
        }

        after_endLine:        $result['end_line'] = $endLine;

        $path = $object->path;

        if ($path === null) {
            goto after_path;
        }

        after_path:        $result['path'] = $path;

        $startColumn = $object->startColumn;

        if ($startColumn === null) {
            goto after_startColumn;
        }

        after_startColumn:        $result['start_column'] = $startColumn;

        $startLine = $object->startLine;

        if ($startLine === null) {
            goto after_startLine;
        }

        after_startLine:        $result['start_line'] = $startLine;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️MostRecentInstance⚡️Message(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\MostRecentInstance\Message);
        $result = [];

        $text = $object->text;

        if ($text === null) {
            goto after_text;
        }

        after_text:        $result['text'] = $text;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Rule(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Rule);
        $result = [];

        $description                                     = $object->description;
        after_description:        $result['description'] = $description;

        $fullDescription = $object->fullDescription;

        if ($fullDescription === null) {
            goto after_fullDescription;
        }

        after_fullDescription:        $result['full_description'] = $fullDescription;

        $help = $object->help;

        if ($help === null) {
            goto after_help;
        }

        after_help:        $result['help'] = $help;

        $helpUri = $object->helpUri;

        if ($helpUri === null) {
            goto after_helpUri;
        }

        after_helpUri:        $result['help_uri'] = $helpUri;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $severity = $object->severity;

        if ($severity === null) {
            goto after_severity;
        }

        after_severity:        $result['severity'] = $severity;

        $tags = $object->tags;

        if ($tags === null) {
            goto after_tags;
        }

        static $tagsSerializer0;

        if ($tagsSerializer0 === null) {
            $tagsSerializer0 = new SerializeArrayItems(...[]);
        }

        $tags                              = $tagsSerializer0->serialize($tags, $this);
        after_tags:        $result['tags'] = $tags;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertCreated⚡️Alert⚡️Tool(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertCreated\Alert\Tool);
        $result = [];

        $guid = $object->guid;

        if ($guid === null) {
            goto after_guid;
        }

        after_guid:        $result['guid'] = $guid;

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $version = $object->version;

        if ($version === null) {
            goto after_version;
        }

        after_version:        $result['version'] = $version;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed(mixed $object): mixed
    {
        assert($object instanceof WebhookCodeScanningAlertFixed);
        $result = [];

        $action                                = $object->action;
        after_action:        $result['action'] = $action;

        $alert                               = $object->alert;
        $alert                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert($alert);
        after_alert:        $result['alert'] = $alert;

        $commitOid                                    = $object->commitOid;
        after_commitOid:        $result['commit_oid'] = $commitOid;

        $enterprise = $object->enterprise;

        if ($enterprise === null) {
            goto after_enterprise;
        }

        $enterprise                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($enterprise);
        after_enterprise:        $result['enterprise'] = $enterprise;

        $installation = $object->installation;

        if ($installation === null) {
            goto after_installation;
        }

        $installation                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($installation);
        after_installation:        $result['installation'] = $installation;

        $organization = $object->organization;

        if ($organization === null) {
            goto after_organization;
        }

        $organization                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($organization);
        after_organization:        $result['organization'] = $organization;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $repository                                    = $object->repository;
        $repository                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($repository);
        after_repository:        $result['repository'] = $repository;

        $sender                                = $object->sender;
        $sender                                = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($sender);
        after_sender:        $result['sender'] = $sender;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert);
        $result = [];

        $createdAt                                    = $object->createdAt;
        after_createdAt:        $result['created_at'] = $createdAt;

        $dismissedAt = $object->dismissedAt;

        if ($dismissedAt === null) {
            goto after_dismissedAt;
        }

        after_dismissedAt:        $result['dismissed_at'] = $dismissedAt;

        $dismissedBy = $object->dismissedBy;

        if ($dismissedBy === null) {
            goto after_dismissedBy;
        }

        $dismissedBy                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️DismissedBy($dismissedBy);
        after_dismissedBy:        $result['dismissed_by'] = $dismissedBy;

        $dismissedReason = $object->dismissedReason;

        if ($dismissedReason === null) {
            goto after_dismissedReason;
        }

        after_dismissedReason:        $result['dismissed_reason'] = $dismissedReason;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $instancesUrl = $object->instancesUrl;

        if ($instancesUrl === null) {
            goto after_instancesUrl;
        }

        after_instancesUrl:        $result['instances_url'] = $instancesUrl;

        $mostRecentInstance = $object->mostRecentInstance;

        if ($mostRecentInstance === null) {
            goto after_mostRecentInstance;
        }

        $mostRecentInstance                                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance($mostRecentInstance);
        after_mostRecentInstance:        $result['most_recent_instance'] = $mostRecentInstance;

        $number                                = $object->number;
        after_number:        $result['number'] = $number;

        $rule                              = $object->rule;
        $rule                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Rule($rule);
        after_rule:        $result['rule'] = $rule;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        $tool                              = $object->tool;
        $tool                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Tool($tool);
        after_tool:        $result['tool'] = $tool;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️DismissedBy(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\DismissedBy);
        $result = [];

        $avatarUrl = $object->avatarUrl;

        if ($avatarUrl === null) {
            goto after_avatarUrl;
        }

        after_avatarUrl:        $result['avatar_url'] = $avatarUrl;

        $deleted = $object->deleted;

        if ($deleted === null) {
            goto after_deleted;
        }

        after_deleted:        $result['deleted'] = $deleted;

        $email = $object->email;

        if ($email === null) {
            goto after_email;
        }

        after_email:        $result['email'] = $email;

        $eventsUrl = $object->eventsUrl;

        if ($eventsUrl === null) {
            goto after_eventsUrl;
        }

        after_eventsUrl:        $result['events_url'] = $eventsUrl;

        $followersUrl = $object->followersUrl;

        if ($followersUrl === null) {
            goto after_followersUrl;
        }

        after_followersUrl:        $result['followers_url'] = $followersUrl;

        $followingUrl = $object->followingUrl;

        if ($followingUrl === null) {
            goto after_followingUrl;
        }

        after_followingUrl:        $result['following_url'] = $followingUrl;

        $gistsUrl = $object->gistsUrl;

        if ($gistsUrl === null) {
            goto after_gistsUrl;
        }

        after_gistsUrl:        $result['gists_url'] = $gistsUrl;

        $gravatarId = $object->gravatarId;

        if ($gravatarId === null) {
            goto after_gravatarId;
        }

        after_gravatarId:        $result['gravatar_id'] = $gravatarId;

        $htmlUrl = $object->htmlUrl;

        if ($htmlUrl === null) {
            goto after_htmlUrl;
        }

        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $login                               = $object->login;
        after_login:        $result['login'] = $login;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $nodeId = $object->nodeId;

        if ($nodeId === null) {
            goto after_nodeId;
        }

        after_nodeId:        $result['node_id'] = $nodeId;

        $organizationsUrl = $object->organizationsUrl;

        if ($organizationsUrl === null) {
            goto after_organizationsUrl;
        }

        after_organizationsUrl:        $result['organizations_url'] = $organizationsUrl;

        $receivedEventsUrl = $object->receivedEventsUrl;

        if ($receivedEventsUrl === null) {
            goto after_receivedEventsUrl;
        }

        after_receivedEventsUrl:        $result['received_events_url'] = $receivedEventsUrl;

        $reposUrl = $object->reposUrl;

        if ($reposUrl === null) {
            goto after_reposUrl;
        }

        after_reposUrl:        $result['repos_url'] = $reposUrl;

        $siteAdmin = $object->siteAdmin;

        if ($siteAdmin === null) {
            goto after_siteAdmin;
        }

        after_siteAdmin:        $result['site_admin'] = $siteAdmin;

        $starredUrl = $object->starredUrl;

        if ($starredUrl === null) {
            goto after_starredUrl;
        }

        after_starredUrl:        $result['starred_url'] = $starredUrl;

        $subscriptionsUrl = $object->subscriptionsUrl;

        if ($subscriptionsUrl === null) {
            goto after_subscriptionsUrl;
        }

        after_subscriptionsUrl:        $result['subscriptions_url'] = $subscriptionsUrl;

        $type = $object->type;

        if ($type === null) {
            goto after_type;
        }

        after_type:        $result['type'] = $type;

        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }

        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance);
        $result = [];

        $analysisKey                                      = $object->analysisKey;
        after_analysisKey:        $result['analysis_key'] = $analysisKey;

        $category = $object->category;

        if ($category === null) {
            goto after_category;
        }

        after_category:        $result['category'] = $category;

        $classifications = $object->classifications;

        if ($classifications === null) {
            goto after_classifications;
        }

        static $classificationsSerializer0;

        if ($classificationsSerializer0 === null) {
            $classificationsSerializer0 = new SerializeArrayItems(...[]);
        }

        $classifications                                         = $classificationsSerializer0->serialize($classifications, $this);
        after_classifications:        $result['classifications'] = $classifications;

        $commitSha = $object->commitSha;

        if ($commitSha === null) {
            goto after_commitSha;
        }

        after_commitSha:        $result['commit_sha'] = $commitSha;

        $environment                                     = $object->environment;
        after_environment:        $result['environment'] = $environment;

        $location = $object->location;

        if ($location === null) {
            goto after_location;
        }

        $location                                  = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($location);
        after_location:        $result['location'] = $location;

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }

        $message                                 = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($message);
        after_message:        $result['message'] = $message;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Location(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Location);
        $result = [];

        $endColumn = $object->endColumn;

        if ($endColumn === null) {
            goto after_endColumn;
        }

        after_endColumn:        $result['end_column'] = $endColumn;

        $endLine = $object->endLine;

        if ($endLine === null) {
            goto after_endLine;
        }

        after_endLine:        $result['end_line'] = $endLine;

        $path = $object->path;

        if ($path === null) {
            goto after_path;
        }

        after_path:        $result['path'] = $path;

        $startColumn = $object->startColumn;

        if ($startColumn === null) {
            goto after_startColumn;
        }

        after_startColumn:        $result['start_column'] = $startColumn;

        $startLine = $object->startLine;

        if ($startLine === null) {
            goto after_startLine;
        }

        after_startLine:        $result['start_line'] = $startLine;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️MostRecentInstance⚡️Message(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\MostRecentInstance\Message);
        $result = [];

        $text = $object->text;

        if ($text === null) {
            goto after_text;
        }

        after_text:        $result['text'] = $text;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Rule(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Rule);
        $result = [];

        $description                                     = $object->description;
        after_description:        $result['description'] = $description;

        $fullDescription = $object->fullDescription;

        if ($fullDescription === null) {
            goto after_fullDescription;
        }

        after_fullDescription:        $result['full_description'] = $fullDescription;

        $help = $object->help;

        if ($help === null) {
            goto after_help;
        }

        after_help:        $result['help'] = $help;

        $helpUri = $object->helpUri;

        if ($helpUri === null) {
            goto after_helpUri;
        }

        after_helpUri:        $result['help_uri'] = $helpUri;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $severity = $object->severity;

        if ($severity === null) {
            goto after_severity;
        }

        after_severity:        $result['severity'] = $severity;

        $tags = $object->tags;

        if ($tags === null) {
            goto after_tags;
        }

        static $tagsSerializer0;

        if ($tagsSerializer0 === null) {
            $tagsSerializer0 = new SerializeArrayItems(...[]);
        }

        $tags                              = $tagsSerializer0->serialize($tags, $this);
        after_tags:        $result['tags'] = $tags;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertFixed⚡️Alert⚡️Tool(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertFixed\Alert\Tool);
        $result = [];

        $guid = $object->guid;

        if ($guid === null) {
            goto after_guid;
        }

        after_guid:        $result['guid'] = $guid;

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $version = $object->version;

        if ($version === null) {
            goto after_version;
        }

        after_version:        $result['version'] = $version;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened(mixed $object): mixed
    {
        assert($object instanceof WebhookCodeScanningAlertReopened);
        $result = [];

        $action                                = $object->action;
        after_action:        $result['action'] = $action;

        $alert = $object->alert;

        if ($alert === null) {
            goto after_alert;
        }

        $alert                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert($alert);
        after_alert:        $result['alert'] = $alert;

        $commitOid = $object->commitOid;

        if ($commitOid === null) {
            goto after_commitOid;
        }

        after_commitOid:        $result['commit_oid'] = $commitOid;

        $enterprise = $object->enterprise;

        if ($enterprise === null) {
            goto after_enterprise;
        }

        $enterprise                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($enterprise);
        after_enterprise:        $result['enterprise'] = $enterprise;

        $installation = $object->installation;

        if ($installation === null) {
            goto after_installation;
        }

        $installation                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($installation);
        after_installation:        $result['installation'] = $installation;

        $organization = $object->organization;

        if ($organization === null) {
            goto after_organization;
        }

        $organization                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($organization);
        after_organization:        $result['organization'] = $organization;

        $ref = $object->ref;

        if ($ref === null) {
            goto after_ref;
        }

        after_ref:        $result['ref'] = $ref;

        $repository                                    = $object->repository;
        $repository                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($repository);
        after_repository:        $result['repository'] = $repository;

        $sender                                = $object->sender;
        $sender                                = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($sender);
        after_sender:        $result['sender'] = $sender;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert);
        $result = [];

        $createdAt                                    = $object->createdAt;
        after_createdAt:        $result['created_at'] = $createdAt;

        $dismissedAt = $object->dismissedAt;

        if ($dismissedAt === null) {
            goto after_dismissedAt;
        }

        after_dismissedAt:        $result['dismissed_at'] = $dismissedAt;

        $dismissedBy = $object->dismissedBy;

        if ($dismissedBy === null) {
            goto after_dismissedBy;
        }

        $dismissedBy                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️DismissedBy($dismissedBy);
        after_dismissedBy:        $result['dismissed_by'] = $dismissedBy;

        $dismissedReason = $object->dismissedReason;

        if ($dismissedReason === null) {
            goto after_dismissedReason;
        }

        after_dismissedReason:        $result['dismissed_reason'] = $dismissedReason;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $mostRecentInstance = $object->mostRecentInstance;

        if ($mostRecentInstance === null) {
            goto after_mostRecentInstance;
        }

        $mostRecentInstance                                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance($mostRecentInstance);
        after_mostRecentInstance:        $result['most_recent_instance'] = $mostRecentInstance;

        $number                                = $object->number;
        after_number:        $result['number'] = $number;

        $rule                              = $object->rule;
        $rule                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Rule($rule);
        after_rule:        $result['rule'] = $rule;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        $tool                              = $object->tool;
        $tool                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Tool($tool);
        after_tool:        $result['tool'] = $tool;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance);
        $result = [];

        $analysisKey                                      = $object->analysisKey;
        after_analysisKey:        $result['analysis_key'] = $analysisKey;

        $category = $object->category;

        if ($category === null) {
            goto after_category;
        }

        after_category:        $result['category'] = $category;

        $classifications = $object->classifications;

        if ($classifications === null) {
            goto after_classifications;
        }

        static $classificationsSerializer0;

        if ($classificationsSerializer0 === null) {
            $classificationsSerializer0 = new SerializeArrayItems(...[]);
        }

        $classifications                                         = $classificationsSerializer0->serialize($classifications, $this);
        after_classifications:        $result['classifications'] = $classifications;

        $commitSha = $object->commitSha;

        if ($commitSha === null) {
            goto after_commitSha;
        }

        after_commitSha:        $result['commit_sha'] = $commitSha;

        $environment                                     = $object->environment;
        after_environment:        $result['environment'] = $environment;

        $location = $object->location;

        if ($location === null) {
            goto after_location;
        }

        $location                                  = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($location);
        after_location:        $result['location'] = $location;

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }

        $message                                 = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($message);
        after_message:        $result['message'] = $message;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Location(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Location);
        $result = [];

        $endColumn = $object->endColumn;

        if ($endColumn === null) {
            goto after_endColumn;
        }

        after_endColumn:        $result['end_column'] = $endColumn;

        $endLine = $object->endLine;

        if ($endLine === null) {
            goto after_endLine;
        }

        after_endLine:        $result['end_line'] = $endLine;

        $path = $object->path;

        if ($path === null) {
            goto after_path;
        }

        after_path:        $result['path'] = $path;

        $startColumn = $object->startColumn;

        if ($startColumn === null) {
            goto after_startColumn;
        }

        after_startColumn:        $result['start_column'] = $startColumn;

        $startLine = $object->startLine;

        if ($startLine === null) {
            goto after_startLine;
        }

        after_startLine:        $result['start_line'] = $startLine;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️MostRecentInstance⚡️Message(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\MostRecentInstance\Message);
        $result = [];

        $text = $object->text;

        if ($text === null) {
            goto after_text;
        }

        after_text:        $result['text'] = $text;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Rule(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Rule);
        $result = [];

        $description                                     = $object->description;
        after_description:        $result['description'] = $description;

        $fullDescription = $object->fullDescription;

        if ($fullDescription === null) {
            goto after_fullDescription;
        }

        after_fullDescription:        $result['full_description'] = $fullDescription;

        $help = $object->help;

        if ($help === null) {
            goto after_help;
        }

        after_help:        $result['help'] = $help;

        $helpUri = $object->helpUri;

        if ($helpUri === null) {
            goto after_helpUri;
        }

        after_helpUri:        $result['help_uri'] = $helpUri;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $name = $object->name;

        if ($name === null) {
            goto after_name;
        }

        after_name:        $result['name'] = $name;

        $severity = $object->severity;

        if ($severity === null) {
            goto after_severity;
        }

        after_severity:        $result['severity'] = $severity;

        $tags = $object->tags;

        if ($tags === null) {
            goto after_tags;
        }

        static $tagsSerializer0;

        if ($tagsSerializer0 === null) {
            $tagsSerializer0 = new SerializeArrayItems(...[]);
        }

        $tags                              = $tagsSerializer0->serialize($tags, $this);
        after_tags:        $result['tags'] = $tags;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopened⚡️Alert⚡️Tool(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopened\Alert\Tool);
        $result = [];

        $guid = $object->guid;

        if ($guid === null) {
            goto after_guid;
        }

        after_guid:        $result['guid'] = $guid;

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $version = $object->version;

        if ($version === null) {
            goto after_version;
        }

        after_version:        $result['version'] = $version;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser(mixed $object): mixed
    {
        assert($object instanceof WebhookCodeScanningAlertReopenedByUser);
        $result = [];

        $action                                = $object->action;
        after_action:        $result['action'] = $action;

        $alert                               = $object->alert;
        $alert                               = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert($alert);
        after_alert:        $result['alert'] = $alert;

        $commitOid                                    = $object->commitOid;
        after_commitOid:        $result['commit_oid'] = $commitOid;

        $enterprise = $object->enterprise;

        if ($enterprise === null) {
            goto after_enterprise;
        }

        $enterprise                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️EnterpriseWebhooks($enterprise);
        after_enterprise:        $result['enterprise'] = $enterprise;

        $installation = $object->installation;

        if ($installation === null) {
            goto after_installation;
        }

        $installation                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleInstallation($installation);
        after_installation:        $result['installation'] = $installation;

        $organization = $object->organization;

        if ($organization === null) {
            goto after_organization;
        }

        $organization                                      = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️OrganizationSimpleWebhooks($organization);
        after_organization:        $result['organization'] = $organization;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $repository                                    = $object->repository;
        $repository                                    = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️RepositoryWebhooks($repository);
        after_repository:        $result['repository'] = $repository;

        $sender                                = $object->sender;
        $sender                                = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUserWebhooks($sender);
        after_sender:        $result['sender'] = $sender;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert);
        $result = [];

        $createdAt                                    = $object->createdAt;
        after_createdAt:        $result['created_at'] = $createdAt;

        $dismissedAt                                      = $object->dismissedAt;
        after_dismissedAt:        $result['dismissed_at'] = $dismissedAt;

        $dismissedBy                                      = $object->dismissedBy;
        after_dismissedBy:        $result['dismissed_by'] = $dismissedBy;

        $dismissedReason                                          = $object->dismissedReason;
        after_dismissedReason:        $result['dismissed_reason'] = $dismissedReason;

        $htmlUrl                                  = $object->htmlUrl;
        after_htmlUrl:        $result['html_url'] = $htmlUrl;

        $mostRecentInstance = $object->mostRecentInstance;

        if ($mostRecentInstance === null) {
            goto after_mostRecentInstance;
        }

        $mostRecentInstance                                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance($mostRecentInstance);
        after_mostRecentInstance:        $result['most_recent_instance'] = $mostRecentInstance;

        $number                                = $object->number;
        after_number:        $result['number'] = $number;

        $rule                              = $object->rule;
        $rule                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Rule($rule);
        after_rule:        $result['rule'] = $rule;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        $tool                              = $object->tool;
        $tool                              = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Tool($tool);
        after_tool:        $result['tool'] = $tool;

        $url                             = $object->url;
        after_url:        $result['url'] = $url;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance);
        $result = [];

        $analysisKey                                      = $object->analysisKey;
        after_analysisKey:        $result['analysis_key'] = $analysisKey;

        $category = $object->category;

        if ($category === null) {
            goto after_category;
        }

        after_category:        $result['category'] = $category;

        $classifications = $object->classifications;

        if ($classifications === null) {
            goto after_classifications;
        }

        static $classificationsSerializer0;

        if ($classificationsSerializer0 === null) {
            $classificationsSerializer0 = new SerializeArrayItems(...[]);
        }

        $classifications                                         = $classificationsSerializer0->serialize($classifications, $this);
        after_classifications:        $result['classifications'] = $classifications;

        $commitSha = $object->commitSha;

        if ($commitSha === null) {
            goto after_commitSha;
        }

        after_commitSha:        $result['commit_sha'] = $commitSha;

        $environment                                     = $object->environment;
        after_environment:        $result['environment'] = $environment;

        $location = $object->location;

        if ($location === null) {
            goto after_location;
        }

        $location                                  = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Location($location);
        after_location:        $result['location'] = $location;

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }

        $message                                 = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertAppearedInBranch⚡️Alert⚡️MostRecentInstance⚡️Message($message);
        after_message:        $result['message'] = $message;

        $ref                             = $object->ref;
        after_ref:        $result['ref'] = $ref;

        $state                               = $object->state;
        after_state:        $result['state'] = $state;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Location(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Location);
        $result = [];

        $endColumn = $object->endColumn;

        if ($endColumn === null) {
            goto after_endColumn;
        }

        after_endColumn:        $result['end_column'] = $endColumn;

        $endLine = $object->endLine;

        if ($endLine === null) {
            goto after_endLine;
        }

        after_endLine:        $result['end_line'] = $endLine;

        $path = $object->path;

        if ($path === null) {
            goto after_path;
        }

        after_path:        $result['path'] = $path;

        $startColumn = $object->startColumn;

        if ($startColumn === null) {
            goto after_startColumn;
        }

        after_startColumn:        $result['start_column'] = $startColumn;

        $startLine = $object->startLine;

        if ($startLine === null) {
            goto after_startLine;
        }

        after_startLine:        $result['start_line'] = $startLine;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️MostRecentInstance⚡️Message(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\MostRecentInstance\Message);
        $result = [];

        $text = $object->text;

        if ($text === null) {
            goto after_text;
        }

        after_text:        $result['text'] = $text;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Rule(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Rule);
        $result = [];

        $description                                     = $object->description;
        after_description:        $result['description'] = $description;

        $id                            = $object->id;
        after_id:        $result['id'] = $id;

        $severity = $object->severity;

        if ($severity === null) {
            goto after_severity;
        }

        after_severity:        $result['severity'] = $severity;

        return $result;
    }

    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️WebhookCodeScanningAlertReopenedByUser⚡️Alert⚡️Tool(mixed $object): mixed
    {
        assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\WebhookCodeScanningAlertReopenedByUser\Alert\Tool);
        $result = [];

        $name                              = $object->name;
        after_name:        $result['name'] = $name;

        $version = $object->version;

        if ($version === null) {
            goto after_version;
        }

        after_version:        $result['version'] = $version;

        return $result;
    }

    /**
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToHydrateObject
     *
     * @template T
     */
    public function hydrateObjects(string $className, iterable $payloads): IterableList
    {
        return new IterableList($this->doHydrateObjects($className, $payloads));
    }

    private function doHydrateObjects(string $className, iterable $payloads): Generator
    {
        foreach ($payloads as $index => $payload) {
            yield $index => $this->hydrateObject($className, $payload);
        }
    }

    /**
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToSerializeObject
     *
     * @template T
     */
    public function serializeObjects(iterable $payloads): IterableList
    {
        return new IterableList($this->doSerializeObjects($payloads));
    }

    private function doSerializeObjects(iterable $objects): Generator
    {
        foreach ($objects as $index => $object) {
            yield $index => $this->serializeObject($object);
        }
    }
}