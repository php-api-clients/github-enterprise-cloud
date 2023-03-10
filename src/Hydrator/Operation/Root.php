<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Hydrator\Operation;

use EventSauce\ObjectHydrator\IterableList;
use EventSauce\ObjectHydrator\ObjectMapper;
use EventSauce\ObjectHydrator\UnableToHydrateObject;
use EventSauce\ObjectHydrator\UnableToSerializeObject;
use Generator;

class Root implements ObjectMapper
{
    private array $hydrationStack = [];
    public function __construct() {}

    /**
     * @template T of object
     * @param class-string<T> $className
     * @return T
     */
    public function hydrateObject(string $className, array $payload): object
    {
        return match($className) {
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Root' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Root($payload),
            default => throw UnableToHydrateObject::noHydrationDefined($className, $this->hydrationStack),
        };
    }
    
            
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Root(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Root
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['current_user_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'current_user_url';
                goto after_current_user_url;
            }

            $properties['current_user_url'] = $value;

            after_current_user_url:

            $value = $payload['current_user_authorizations_html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'current_user_authorizations_html_url';
                goto after_current_user_authorizations_html_url;
            }

            $properties['current_user_authorizations_html_url'] = $value;

            after_current_user_authorizations_html_url:

            $value = $payload['authorizations_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'authorizations_url';
                goto after_authorizations_url;
            }

            $properties['authorizations_url'] = $value;

            after_authorizations_url:

            $value = $payload['code_search_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'code_search_url';
                goto after_code_search_url;
            }

            $properties['code_search_url'] = $value;

            after_code_search_url:

            $value = $payload['commit_search_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'commit_search_url';
                goto after_commit_search_url;
            }

            $properties['commit_search_url'] = $value;

            after_commit_search_url:

            $value = $payload['emails_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'emails_url';
                goto after_emails_url;
            }

            $properties['emails_url'] = $value;

            after_emails_url:

            $value = $payload['emojis_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'emojis_url';
                goto after_emojis_url;
            }

            $properties['emojis_url'] = $value;

            after_emojis_url:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events_url';
                goto after_events_url;
            }

            $properties['events_url'] = $value;

            after_events_url:

            $value = $payload['feeds_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'feeds_url';
                goto after_feeds_url;
            }

            $properties['feeds_url'] = $value;

            after_feeds_url:

            $value = $payload['followers_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'followers_url';
                goto after_followers_url;
            }

            $properties['followers_url'] = $value;

            after_followers_url:

            $value = $payload['following_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'following_url';
                goto after_following_url;
            }

            $properties['following_url'] = $value;

            after_following_url:

            $value = $payload['gists_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'gists_url';
                goto after_gists_url;
            }

            $properties['gists_url'] = $value;

            after_gists_url:

            $value = $payload['hub_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'hub_url';
                goto after_hub_url;
            }

            $properties['hub_url'] = $value;

            after_hub_url:

            $value = $payload['issue_search_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'issue_search_url';
                goto after_issue_search_url;
            }

            $properties['issue_search_url'] = $value;

            after_issue_search_url:

            $value = $payload['issues_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'issues_url';
                goto after_issues_url;
            }

            $properties['issues_url'] = $value;

            after_issues_url:

            $value = $payload['keys_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'keys_url';
                goto after_keys_url;
            }

            $properties['keys_url'] = $value;

            after_keys_url:

            $value = $payload['label_search_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'label_search_url';
                goto after_label_search_url;
            }

            $properties['label_search_url'] = $value;

            after_label_search_url:

            $value = $payload['notifications_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'notifications_url';
                goto after_notifications_url;
            }

            $properties['notifications_url'] = $value;

            after_notifications_url:

            $value = $payload['organization_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'organization_url';
                goto after_organization_url;
            }

            $properties['organization_url'] = $value;

            after_organization_url:

            $value = $payload['organization_repositories_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'organization_repositories_url';
                goto after_organization_repositories_url;
            }

            $properties['organization_repositories_url'] = $value;

            after_organization_repositories_url:

            $value = $payload['organization_teams_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'organization_teams_url';
                goto after_organization_teams_url;
            }

            $properties['organization_teams_url'] = $value;

            after_organization_teams_url:

            $value = $payload['public_gists_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'public_gists_url';
                goto after_public_gists_url;
            }

            $properties['public_gists_url'] = $value;

            after_public_gists_url:

            $value = $payload['rate_limit_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'rate_limit_url';
                goto after_rate_limit_url;
            }

            $properties['rate_limit_url'] = $value;

            after_rate_limit_url:

            $value = $payload['repository_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository_url';
                goto after_repository_url;
            }

            $properties['repository_url'] = $value;

            after_repository_url:

            $value = $payload['repository_search_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repository_search_url';
                goto after_repository_search_url;
            }

            $properties['repository_search_url'] = $value;

            after_repository_search_url:

            $value = $payload['current_user_repositories_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'current_user_repositories_url';
                goto after_current_user_repositories_url;
            }

            $properties['current_user_repositories_url'] = $value;

            after_current_user_repositories_url:

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'starred_url';
                goto after_starred_url;
            }

            $properties['starred_url'] = $value;

            after_starred_url:

            $value = $payload['starred_gists_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'starred_gists_url';
                goto after_starred_gists_url;
            }

            $properties['starred_gists_url'] = $value;

            after_starred_gists_url:

            $value = $payload['topic_search_url'] ?? null;

            if ($value === null) {
                $properties['topic_search_url'] = null;
                goto after_topic_search_url;
            }

            $properties['topic_search_url'] = $value;

            after_topic_search_url:

            $value = $payload['user_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'user_url';
                goto after_user_url;
            }

            $properties['user_url'] = $value;

            after_user_url:

            $value = $payload['user_organizations_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'user_organizations_url';
                goto after_user_organizations_url;
            }

            $properties['user_organizations_url'] = $value;

            after_user_organizations_url:

            $value = $payload['user_repositories_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'user_repositories_url';
                goto after_user_repositories_url;
            }

            $properties['user_repositories_url'] = $value;

            after_user_repositories_url:

            $value = $payload['user_search_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'user_search_url';
                goto after_user_search_url;
            }

            $properties['user_search_url'] = $value;

            after_user_search_url:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Root', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Root::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Root(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Root', $exception, stack: $this->hydrationStack);
        }
    }
    
    private function serializeViaTypeMap(string $accessor, object $object, array $payloadToTypeMap): array
    {
        foreach ($payloadToTypeMap as $payloadType => [$valueType, $method]) {
            if (is_a($object, $valueType)) {
                return [$accessor => $payloadType] + $this->{$method}($object);
            }
        }

        throw new \LogicException('No type mapped for object of class: ' . get_class($object));
    }

    public function serializeObject(object $object): mixed
    {
        return $this->serializeObjectOfType($object, get_class($object));
    }

    /**
     * @template T
     *
     * @param T               $object
     * @param class-string<T> $className
     */
    public function serializeObjectOfType(object $object, string $className): mixed
    {
        try {
            return match($className) {
                'array' => $this->serializeValuearray($object),
            'Ramsey\Uuid\UuidInterface' => $this->serializeValueRamsey⚡️Uuid⚡️UuidInterface($object),
            'DateTime' => $this->serializeValueDateTime($object),
            'DateTimeImmutable' => $this->serializeValueDateTimeImmutable($object),
            'DateTimeInterface' => $this->serializeValueDateTimeInterface($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Root' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Root($object),
                default => throw new \LogicException('No serialization defined for $className'),
            };
        } catch (\Throwable $exception) {
            throw UnableToSerializeObject::dueToError($className, $exception);
        }
    }
    
    
    private function serializeValuearray(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueRamsey⚡️Uuid⚡️UuidInterface(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeUuidToString(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTime(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTimeImmutable(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeValueDateTimeInterface(mixed $value): mixed
    {
        static $serializer;
        
        if ($serializer === null) {
            $serializer = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeDateTime(...array (
));
        }
        
        return $serializer->serialize($value, $this);
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Root(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\Root);
        $result = [];

        $current_user_url = $object->current_user_url;
        after_current_user_url:        $result['current_user_url'] = $current_user_url;

        
        $current_user_authorizations_html_url = $object->current_user_authorizations_html_url;
        after_current_user_authorizations_html_url:        $result['current_user_authorizations_html_url'] = $current_user_authorizations_html_url;

        
        $authorizations_url = $object->authorizations_url;
        after_authorizations_url:        $result['authorizations_url'] = $authorizations_url;

        
        $code_search_url = $object->code_search_url;
        after_code_search_url:        $result['code_search_url'] = $code_search_url;

        
        $commit_search_url = $object->commit_search_url;
        after_commit_search_url:        $result['commit_search_url'] = $commit_search_url;

        
        $emails_url = $object->emails_url;
        after_emails_url:        $result['emails_url'] = $emails_url;

        
        $emojis_url = $object->emojis_url;
        after_emojis_url:        $result['emojis_url'] = $emojis_url;

        
        $events_url = $object->events_url;
        after_events_url:        $result['events_url'] = $events_url;

        
        $feeds_url = $object->feeds_url;
        after_feeds_url:        $result['feeds_url'] = $feeds_url;

        
        $followers_url = $object->followers_url;
        after_followers_url:        $result['followers_url'] = $followers_url;

        
        $following_url = $object->following_url;
        after_following_url:        $result['following_url'] = $following_url;

        
        $gists_url = $object->gists_url;
        after_gists_url:        $result['gists_url'] = $gists_url;

        
        $hub_url = $object->hub_url;
        after_hub_url:        $result['hub_url'] = $hub_url;

        
        $issue_search_url = $object->issue_search_url;
        after_issue_search_url:        $result['issue_search_url'] = $issue_search_url;

        
        $issues_url = $object->issues_url;
        after_issues_url:        $result['issues_url'] = $issues_url;

        
        $keys_url = $object->keys_url;
        after_keys_url:        $result['keys_url'] = $keys_url;

        
        $label_search_url = $object->label_search_url;
        after_label_search_url:        $result['label_search_url'] = $label_search_url;

        
        $notifications_url = $object->notifications_url;
        after_notifications_url:        $result['notifications_url'] = $notifications_url;

        
        $organization_url = $object->organization_url;
        after_organization_url:        $result['organization_url'] = $organization_url;

        
        $organization_repositories_url = $object->organization_repositories_url;
        after_organization_repositories_url:        $result['organization_repositories_url'] = $organization_repositories_url;

        
        $organization_teams_url = $object->organization_teams_url;
        after_organization_teams_url:        $result['organization_teams_url'] = $organization_teams_url;

        
        $public_gists_url = $object->public_gists_url;
        after_public_gists_url:        $result['public_gists_url'] = $public_gists_url;

        
        $rate_limit_url = $object->rate_limit_url;
        after_rate_limit_url:        $result['rate_limit_url'] = $rate_limit_url;

        
        $repository_url = $object->repository_url;
        after_repository_url:        $result['repository_url'] = $repository_url;

        
        $repository_search_url = $object->repository_search_url;
        after_repository_search_url:        $result['repository_search_url'] = $repository_search_url;

        
        $current_user_repositories_url = $object->current_user_repositories_url;
        after_current_user_repositories_url:        $result['current_user_repositories_url'] = $current_user_repositories_url;

        
        $starred_url = $object->starred_url;
        after_starred_url:        $result['starred_url'] = $starred_url;

        
        $starred_gists_url = $object->starred_gists_url;
        after_starred_gists_url:        $result['starred_gists_url'] = $starred_gists_url;

        
        $topic_search_url = $object->topic_search_url;

        if ($topic_search_url === null) {
            goto after_topic_search_url;
        }
        after_topic_search_url:        $result['topic_search_url'] = $topic_search_url;

        
        $user_url = $object->user_url;
        after_user_url:        $result['user_url'] = $user_url;

        
        $user_organizations_url = $object->user_organizations_url;
        after_user_organizations_url:        $result['user_organizations_url'] = $user_organizations_url;

        
        $user_repositories_url = $object->user_repositories_url;
        after_user_repositories_url:        $result['user_repositories_url'] = $user_repositories_url;

        
        $user_search_url = $object->user_search_url;
        after_user_search_url:        $result['user_search_url'] = $user_search_url;


        return $result;
    }
    
    

    /**
     * @template T
     *
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToHydrateObject
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
     * @template T
     *
     * @param class-string<T> $className
     * @param iterable<array> $payloads;
     *
     * @return IterableList<T>
     *
     * @throws UnableToSerializeObject
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
