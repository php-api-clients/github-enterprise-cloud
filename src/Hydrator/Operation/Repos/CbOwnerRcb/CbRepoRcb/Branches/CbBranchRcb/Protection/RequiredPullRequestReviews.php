<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Hydrator\Operation\Repos\CbOwnerRcb\CbRepoRcb\Branches\CbBranchRcb\Protection;

use EventSauce\ObjectHydrator\IterableList;
use EventSauce\ObjectHydrator\ObjectMapper;
use EventSauce\ObjectHydrator\UnableToHydrateObject;
use EventSauce\ObjectHydrator\UnableToSerializeObject;
use Generator;

class RequiredPullRequestReviews implements ObjectMapper
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
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️DismissalRestrictions($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\Team' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team⚡️Permissions($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration⚡️Permissions($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️BypassPullRequestAllowances($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError($payload),
                'ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors' => $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError⚡️Errors($payload),
            default => throw UnableToHydrateObject::noHydrationDefined($className, $this->hydrationStack),
        };
    }
    
            
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['dismissal_restrictions'] ?? null;

            if ($value === null) {
                $properties['dismissal_restrictions'] = null;
                goto after_dismissal_restrictions;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'dismissal_restrictions';
                    $value = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️DismissalRestrictions($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['dismissal_restrictions'] = $value;

            after_dismissal_restrictions:

            $value = $payload['bypass_pull_request_allowances'] ?? null;

            if ($value === null) {
                $properties['bypass_pull_request_allowances'] = null;
                goto after_bypass_pull_request_allowances;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'bypass_pull_request_allowances';
                    $value = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️BypassPullRequestAllowances($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['bypass_pull_request_allowances'] = $value;

            after_bypass_pull_request_allowances:

            $value = $payload['dismiss_stale_reviews'] ?? null;

            if ($value === null) {
                $missingFields[] = 'dismiss_stale_reviews';
                goto after_dismiss_stale_reviews;
            }

            $properties['dismiss_stale_reviews'] = $value;

            after_dismiss_stale_reviews:

            $value = $payload['require_code_owner_reviews'] ?? null;

            if ($value === null) {
                $missingFields[] = 'require_code_owner_reviews';
                goto after_require_code_owner_reviews;
            }

            $properties['require_code_owner_reviews'] = $value;

            after_require_code_owner_reviews:

            $value = $payload['required_approving_review_count'] ?? null;

            if ($value === null) {
                $properties['required_approving_review_count'] = null;
                goto after_required_approving_review_count;
            }

            $properties['required_approving_review_count'] = $value;

            after_required_approving_review_count:

            $value = $payload['require_last_push_approval'] ?? null;

            if ($value === null) {
                $properties['require_last_push_approval'] = null;
                goto after_require_last_push_approval;
            }

            $properties['require_last_push_approval'] = $value;

            after_require_last_push_approval:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️DismissalRestrictions(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['users'] ?? null;

            if ($value === null) {
                $properties['users'] = null;
                goto after_users;
            }

            static $usersCaster1;

            if ($usersCaster1 === null) {
                $usersCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\SimpleUser',
));
            }

            $value = $usersCaster1->cast($value, $this);

            $properties['users'] = $value;

            after_users:

            $value = $payload['teams'] ?? null;

            if ($value === null) {
                $properties['teams'] = null;
                goto after_teams;
            }

            static $teamsCaster1;

            if ($teamsCaster1 === null) {
                $teamsCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Team',
));
            }

            $value = $teamsCaster1->cast($value, $this);

            $properties['teams'] = $value;

            after_teams:

            $value = $payload['apps'] ?? null;

            if ($value === null) {
                $properties['apps'] = null;
                goto after_apps;
            }

            static $appsCaster1;

            if ($appsCaster1 === null) {
                $appsCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Integration',
));
            }

            $value = $appsCaster1->cast($value, $this);

            $properties['apps'] = $value;

            after_apps:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['users_url'] ?? null;

            if ($value === null) {
                $properties['users_url'] = null;
                goto after_users_url;
            }

            $properties['users_url'] = $value;

            after_users_url:

            $value = $payload['teams_url'] ?? null;

            if ($value === null) {
                $properties['teams_url'] = null;
                goto after_teams_url;
            }

            $properties['teams_url'] = $value;

            after_teams_url:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser
    {
        $properties = []; 
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
                goto after_node_id;
            }

            $properties['node_id'] = $value;

            after_node_id:

            $value = $payload['avatar_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'avatar_url';
                goto after_avatar_url;
            }

            $properties['avatar_url'] = $value;

            after_avatar_url:

            $value = $payload['gravatar_id'] ?? null;

            if ($value === null) {
                $properties['gravatar_id'] = null;
                goto after_gravatar_id;
            }

            $properties['gravatar_id'] = $value;

            after_gravatar_id:

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
                goto after_html_url;
            }

            $properties['html_url'] = $value;

            after_html_url:

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

            $value = $payload['starred_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'starred_url';
                goto after_starred_url;
            }

            $properties['starred_url'] = $value;

            after_starred_url:

            $value = $payload['subscriptions_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'subscriptions_url';
                goto after_subscriptions_url;
            }

            $properties['subscriptions_url'] = $value;

            after_subscriptions_url:

            $value = $payload['organizations_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'organizations_url';
                goto after_organizations_url;
            }

            $properties['organizations_url'] = $value;

            after_organizations_url:

            $value = $payload['repos_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repos_url';
                goto after_repos_url;
            }

            $properties['repos_url'] = $value;

            after_repos_url:

            $value = $payload['events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events_url';
                goto after_events_url;
            }

            $properties['events_url'] = $value;

            after_events_url:

            $value = $payload['received_events_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'received_events_url';
                goto after_received_events_url;
            }

            $properties['received_events_url'] = $value;

            after_received_events_url:

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
                goto after_site_admin;
            }

            $properties['site_admin'] = $value;

            after_site_admin:

            $value = $payload['starred_at'] ?? null;

            if ($value === null) {
                $properties['starred_at'] = null;
                goto after_starred_at;
            }

            $properties['starred_at'] = $value;

            after_starred_at:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Team
    {
        $properties = []; 
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
                goto after_node_id;
            }

            $properties['node_id'] = $value;

            after_node_id:

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

            $value = $payload['description'] ?? null;

            if ($value === null) {
                $properties['description'] = null;
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['privacy'] ?? null;

            if ($value === null) {
                $properties['privacy'] = null;
                goto after_privacy;
            }

            $properties['privacy'] = $value;

            after_privacy:

            $value = $payload['permission'] ?? null;

            if ($value === null) {
                $missingFields[] = 'permission';
                goto after_permission;
            }

            $properties['permission'] = $value;

            after_permission:

            $value = $payload['permissions'] ?? null;

            if ($value === null) {
                $properties['permissions'] = null;
                goto after_permissions;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'permissions';
                    $value = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team⚡️Permissions($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['permissions'] = $value;

            after_permissions:

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
                goto after_html_url;
            }

            $properties['html_url'] = $value;

            after_html_url:

            $value = $payload['members_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'members_url';
                goto after_members_url;
            }

            $properties['members_url'] = $value;

            after_members_url:

            $value = $payload['repositories_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'repositories_url';
                goto after_repositories_url;
            }

            $properties['repositories_url'] = $value;

            after_repositories_url:

            $value = $payload['parent'] ?? null;

            if ($value === null) {
                $properties['parent'] = null;
                goto after_parent;
            }

            $properties['parent'] = $value;

            after_parent:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Team', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Team::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Team(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Team', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team⚡️Permissions(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['pull'] ?? null;

            if ($value === null) {
                $missingFields[] = 'pull';
                goto after_pull;
            }

            $properties['pull'] = $value;

            after_pull:

            $value = $payload['triage'] ?? null;

            if ($value === null) {
                $missingFields[] = 'triage';
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
                $missingFields[] = 'maintain';
                goto after_maintain;
            }

            $properties['maintain'] = $value;

            after_maintain:

            $value = $payload['admin'] ?? null;

            if ($value === null) {
                $missingFields[] = 'admin';
                goto after_admin;
            }

            $properties['admin'] = $value;

            after_admin:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'id';
                goto after_id;
            }

            $properties['id'] = $value;

            after_id:

            $value = $payload['slug'] ?? null;

            if ($value === null) {
                $properties['slug'] = null;
                goto after_slug;
            }

            $properties['slug'] = $value;

            after_slug:

            $value = $payload['node_id'] ?? null;

            if ($value === null) {
                $missingFields[] = 'node_id';
                goto after_node_id;
            }

            $properties['node_id'] = $value;

            after_node_id:

            $value = $payload['owner'] ?? null;

            if ($value === null) {
                $properties['owner'] = null;
                goto after_owner;
            }

            $properties['owner'] = $value;

            after_owner:

            $value = $payload['name'] ?? null;

            if ($value === null) {
                $missingFields[] = 'name';
                goto after_name;
            }

            $properties['name'] = $value;

            after_name:

            $value = $payload['description'] ?? null;

            if ($value === null) {
                $properties['description'] = null;
                goto after_description;
            }

            $properties['description'] = $value;

            after_description:

            $value = $payload['external_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'external_url';
                goto after_external_url;
            }

            $properties['external_url'] = $value;

            after_external_url:

            $value = $payload['html_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'html_url';
                goto after_html_url;
            }

            $properties['html_url'] = $value;

            after_html_url:

            $value = $payload['created_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'created_at';
                goto after_created_at;
            }

            $properties['created_at'] = $value;

            after_created_at:

            $value = $payload['updated_at'] ?? null;

            if ($value === null) {
                $missingFields[] = 'updated_at';
                goto after_updated_at;
            }

            $properties['updated_at'] = $value;

            after_updated_at:

            $value = $payload['permissions'] ?? null;

            if ($value === null) {
                $missingFields[] = 'permissions';
                goto after_permissions;
            }

            if (is_array($value)) {
                try {
                    $this->hydrationStack[] = 'permissions';
                    $value = $this->hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration⚡️Permissions($value);
                } finally {
                    array_pop($this->hydrationStack);
                }
            }

            $properties['permissions'] = $value;

            after_permissions:

            $value = $payload['events'] ?? null;

            if ($value === null) {
                $missingFields[] = 'events';
                goto after_events;
            }

            $properties['events'] = $value;

            after_events:

            $value = $payload['installations_count'] ?? null;

            if ($value === null) {
                $properties['installations_count'] = null;
                goto after_installations_count;
            }

            $properties['installations_count'] = $value;

            after_installations_count:

            $value = $payload['client_id'] ?? null;

            if ($value === null) {
                $properties['client_id'] = null;
                goto after_client_id;
            }

            $properties['client_id'] = $value;

            after_client_id:

            $value = $payload['client_secret'] ?? null;

            if ($value === null) {
                $properties['client_secret'] = null;
                goto after_client_secret;
            }

            $properties['client_secret'] = $value;

            after_client_secret:

            $value = $payload['webhook_secret'] ?? null;

            if ($value === null) {
                $properties['webhook_secret'] = null;
                goto after_webhook_secret;
            }

            $properties['webhook_secret'] = $value;

            after_webhook_secret:

            $value = $payload['pem'] ?? null;

            if ($value === null) {
                $properties['pem'] = null;
                goto after_pem;
            }

            $properties['pem'] = $value;

            after_pem:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration⚡️Permissions(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['issues'] ?? null;

            if ($value === null) {
                $properties['issues'] = null;
                goto after_issues;
            }

            $properties['issues'] = $value;

            after_issues:

            $value = $payload['checks'] ?? null;

            if ($value === null) {
                $properties['checks'] = null;
                goto after_checks;
            }

            $properties['checks'] = $value;

            after_checks:

            $value = $payload['metadata'] ?? null;

            if ($value === null) {
                $properties['metadata'] = null;
                goto after_metadata;
            }

            $properties['metadata'] = $value;

            after_metadata:

            $value = $payload['contents'] ?? null;

            if ($value === null) {
                $properties['contents'] = null;
                goto after_contents;
            }

            $properties['contents'] = $value;

            after_contents:

            $value = $payload['deployments'] ?? null;

            if ($value === null) {
                $properties['deployments'] = null;
                goto after_deployments;
            }

            $properties['deployments'] = $value;

            after_deployments:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️BypassPullRequestAllowances(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['users'] ?? null;

            if ($value === null) {
                $properties['users'] = null;
                goto after_users;
            }

            static $usersCaster1;

            if ($usersCaster1 === null) {
                $usersCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\SimpleUser',
));
            }

            $value = $usersCaster1->cast($value, $this);

            $properties['users'] = $value;

            after_users:

            $value = $payload['teams'] ?? null;

            if ($value === null) {
                $properties['teams'] = null;
                goto after_teams;
            }

            static $teamsCaster1;

            if ($teamsCaster1 === null) {
                $teamsCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Team',
));
            }

            $value = $teamsCaster1->cast($value, $this);

            $properties['teams'] = $value;

            after_teams:

            $value = $payload['apps'] ?? null;

            if ($value === null) {
                $properties['apps'] = null;
                goto after_apps;
            }

            static $appsCaster1;

            if ($appsCaster1 === null) {
                $appsCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Integration',
));
            }

            $value = $appsCaster1->cast($value, $this);

            $properties['apps'] = $value;

            after_apps:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['documentation_url'] ?? null;

            if ($value === null) {
                $properties['documentation_url'] = null;
                goto after_documentation_url;
            }

            $properties['documentation_url'] = $value;

            after_documentation_url:

            $value = $payload['url'] ?? null;

            if ($value === null) {
                $properties['url'] = null;
                goto after_url;
            }

            $properties['url'] = $value;

            after_url:

            $value = $payload['status'] ?? null;

            if ($value === null) {
                $properties['status'] = null;
                goto after_status;
            }

            $properties['status'] = $value;

            after_status:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['message'] ?? null;

            if ($value === null) {
                $missingFields[] = 'message';
                goto after_message;
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['documentation_url'] ?? null;

            if ($value === null) {
                $missingFields[] = 'documentation_url';
                goto after_documentation_url;
            }

            $properties['documentation_url'] = $value;

            after_documentation_url:

            $value = $payload['errors'] ?? null;

            if ($value === null) {
                $properties['errors'] = null;
                goto after_errors;
            }

            static $errorsCaster1;

            if ($errorsCaster1 === null) {
                $errorsCaster1 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\ValidationError\\Errors',
));
            }

            $value = $errorsCaster1->cast($value, $this);

            $properties['errors'] = $value;

            after_errors:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError', $exception, stack: $this->hydrationStack);
        }
    }

        
    private function hydrateApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError⚡️Errors(array $payload): \ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors
    {
        $properties = []; 
        $missingFields = [];
        try {
            $value = $payload['resource'] ?? null;

            if ($value === null) {
                $properties['resource'] = null;
                goto after_resource;
            }

            $properties['resource'] = $value;

            after_resource:

            $value = $payload['field'] ?? null;

            if ($value === null) {
                $properties['field'] = null;
                goto after_field;
            }

            $properties['field'] = $value;

            after_field:

            $value = $payload['message'] ?? null;

            if ($value === null) {
                $properties['message'] = null;
                goto after_message;
            }

            $properties['message'] = $value;

            after_message:

            $value = $payload['code'] ?? null;

            if ($value === null) {
                $missingFields[] = 'code';
                goto after_code;
            }

            $properties['code'] = $value;

            after_code:

            $value = $payload['index'] ?? null;

            if ($value === null) {
                $properties['index'] = null;
                goto after_index;
            }

            $properties['index'] = $value;

            after_index:

            $value = $payload['value'] ?? null;

            if ($value === null) {
                $properties['value'] = null;
                goto after_value;
            }

            $properties['value'] = $value;

            after_value:

        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors', $exception, stack: $this->hydrationStack);
        }

        if (count($missingFields) > 0) {
            throw UnableToHydrateObject::dueToMissingFields(\ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors::class, $missingFields, stack: $this->hydrationStack);
        }

        try {
            return new \ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors(...$properties);
        } catch (\Throwable $exception) {
            throw UnableToHydrateObject::dueToError('ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors', $exception, stack: $this->hydrationStack);
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
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️DismissalRestrictions($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Team' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team⚡️Permissions($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration⚡️Permissions($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️BypassPullRequestAllowances($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError($object),
            'ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors' => $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError⚡️Errors($object),
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


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview);
        $result = [];

        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }
        after_url:        $result['url'] = $url;

        
        $dismissal_restrictions = $object->dismissal_restrictions;

        if ($dismissal_restrictions === null) {
            goto after_dismissal_restrictions;
        }
        $dismissal_restrictions = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️DismissalRestrictions($dismissal_restrictions);
        after_dismissal_restrictions:        $result['dismissal_restrictions'] = $dismissal_restrictions;

        
        $bypass_pull_request_allowances = $object->bypass_pull_request_allowances;

        if ($bypass_pull_request_allowances === null) {
            goto after_bypass_pull_request_allowances;
        }
        $bypass_pull_request_allowances = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️BypassPullRequestAllowances($bypass_pull_request_allowances);
        after_bypass_pull_request_allowances:        $result['bypass_pull_request_allowances'] = $bypass_pull_request_allowances;

        
        $dismiss_stale_reviews = $object->dismiss_stale_reviews;
        after_dismiss_stale_reviews:        $result['dismiss_stale_reviews'] = $dismiss_stale_reviews;

        
        $require_code_owner_reviews = $object->require_code_owner_reviews;
        after_require_code_owner_reviews:        $result['require_code_owner_reviews'] = $require_code_owner_reviews;

        
        $required_approving_review_count = $object->required_approving_review_count;

        if ($required_approving_review_count === null) {
            goto after_required_approving_review_count;
        }
        after_required_approving_review_count:        $result['required_approving_review_count'] = $required_approving_review_count;

        
        $require_last_push_approval = $object->require_last_push_approval;

        if ($require_last_push_approval === null) {
            goto after_require_last_push_approval;
        }
        after_require_last_push_approval:        $result['require_last_push_approval'] = $require_last_push_approval;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️DismissalRestrictions(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\DismissalRestrictions);
        $result = [];

        $users = $object->users;

        if ($users === null) {
            goto after_users;
        }
        static $usersSerializer0;

        if ($usersSerializer0 === null) {
            $usersSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\SimpleUser',
));
        }
        
        $users = $usersSerializer0->serialize($users, $this);
        after_users:        $result['users'] = $users;

        
        $teams = $object->teams;

        if ($teams === null) {
            goto after_teams;
        }
        static $teamsSerializer0;

        if ($teamsSerializer0 === null) {
            $teamsSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Team',
));
        }
        
        $teams = $teamsSerializer0->serialize($teams, $this);
        after_teams:        $result['teams'] = $teams;

        
        $apps = $object->apps;

        if ($apps === null) {
            goto after_apps;
        }
        static $appsSerializer0;

        if ($appsSerializer0 === null) {
            $appsSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Integration',
));
        }
        
        $apps = $appsSerializer0->serialize($apps, $this);
        after_apps:        $result['apps'] = $apps;

        
        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }
        after_url:        $result['url'] = $url;

        
        $users_url = $object->users_url;

        if ($users_url === null) {
            goto after_users_url;
        }
        after_users_url:        $result['users_url'] = $users_url;

        
        $teams_url = $object->teams_url;

        if ($teams_url === null) {
            goto after_teams_url;
        }
        after_teams_url:        $result['teams_url'] = $teams_url;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️SimpleUser(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\SimpleUser);
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

        
        $login = $object->login;
        after_login:        $result['login'] = $login;

        
        $id = $object->id;
        after_id:        $result['id'] = $id;

        
        $node_id = $object->node_id;
        after_node_id:        $result['node_id'] = $node_id;

        
        $avatar_url = $object->avatar_url;
        after_avatar_url:        $result['avatar_url'] = $avatar_url;

        
        $gravatar_id = $object->gravatar_id;

        if ($gravatar_id === null) {
            goto after_gravatar_id;
        }
        after_gravatar_id:        $result['gravatar_id'] = $gravatar_id;

        
        $url = $object->url;
        after_url:        $result['url'] = $url;

        
        $html_url = $object->html_url;
        after_html_url:        $result['html_url'] = $html_url;

        
        $followers_url = $object->followers_url;
        after_followers_url:        $result['followers_url'] = $followers_url;

        
        $following_url = $object->following_url;
        after_following_url:        $result['following_url'] = $following_url;

        
        $gists_url = $object->gists_url;
        after_gists_url:        $result['gists_url'] = $gists_url;

        
        $starred_url = $object->starred_url;
        after_starred_url:        $result['starred_url'] = $starred_url;

        
        $subscriptions_url = $object->subscriptions_url;
        after_subscriptions_url:        $result['subscriptions_url'] = $subscriptions_url;

        
        $organizations_url = $object->organizations_url;
        after_organizations_url:        $result['organizations_url'] = $organizations_url;

        
        $repos_url = $object->repos_url;
        after_repos_url:        $result['repos_url'] = $repos_url;

        
        $events_url = $object->events_url;
        after_events_url:        $result['events_url'] = $events_url;

        
        $received_events_url = $object->received_events_url;
        after_received_events_url:        $result['received_events_url'] = $received_events_url;

        
        $type = $object->type;
        after_type:        $result['type'] = $type;

        
        $site_admin = $object->site_admin;
        after_site_admin:        $result['site_admin'] = $site_admin;

        
        $starred_at = $object->starred_at;

        if ($starred_at === null) {
            goto after_starred_at;
        }
        after_starred_at:        $result['starred_at'] = $starred_at;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\Team);
        $result = [];

        $id = $object->id;
        after_id:        $result['id'] = $id;

        
        $node_id = $object->node_id;
        after_node_id:        $result['node_id'] = $node_id;

        
        $name = $object->name;
        after_name:        $result['name'] = $name;

        
        $slug = $object->slug;
        after_slug:        $result['slug'] = $slug;

        
        $description = $object->description;

        if ($description === null) {
            goto after_description;
        }
        after_description:        $result['description'] = $description;

        
        $privacy = $object->privacy;

        if ($privacy === null) {
            goto after_privacy;
        }
        after_privacy:        $result['privacy'] = $privacy;

        
        $permission = $object->permission;
        after_permission:        $result['permission'] = $permission;

        
        $permissions = $object->permissions;

        if ($permissions === null) {
            goto after_permissions;
        }
        $permissions = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team⚡️Permissions($permissions);
        after_permissions:        $result['permissions'] = $permissions;

        
        $url = $object->url;
        after_url:        $result['url'] = $url;

        
        $html_url = $object->html_url;
        after_html_url:        $result['html_url'] = $html_url;

        
        $members_url = $object->members_url;
        after_members_url:        $result['members_url'] = $members_url;

        
        $repositories_url = $object->repositories_url;
        after_repositories_url:        $result['repositories_url'] = $repositories_url;

        
        $parent = $object->parent;

        if ($parent === null) {
            goto after_parent;
        }
        after_parent:        $result['parent'] = $parent;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Team⚡️Permissions(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\Team\Permissions);
        $result = [];

        $pull = $object->pull;
        after_pull:        $result['pull'] = $pull;

        
        $triage = $object->triage;
        after_triage:        $result['triage'] = $triage;

        
        $push = $object->push;
        after_push:        $result['push'] = $push;

        
        $maintain = $object->maintain;
        after_maintain:        $result['maintain'] = $maintain;

        
        $admin = $object->admin;
        after_admin:        $result['admin'] = $admin;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration);
        $result = [];

        $id = $object->id;
        after_id:        $result['id'] = $id;

        
        $slug = $object->slug;

        if ($slug === null) {
            goto after_slug;
        }
        after_slug:        $result['slug'] = $slug;

        
        $node_id = $object->node_id;
        after_node_id:        $result['node_id'] = $node_id;

        
        $owner = $object->owner;

        if ($owner === null) {
            goto after_owner;
        }
        after_owner:        $result['owner'] = $owner;

        
        $name = $object->name;
        after_name:        $result['name'] = $name;

        
        $description = $object->description;

        if ($description === null) {
            goto after_description;
        }
        after_description:        $result['description'] = $description;

        
        $external_url = $object->external_url;
        after_external_url:        $result['external_url'] = $external_url;

        
        $html_url = $object->html_url;
        after_html_url:        $result['html_url'] = $html_url;

        
        $created_at = $object->created_at;
        after_created_at:        $result['created_at'] = $created_at;

        
        $updated_at = $object->updated_at;
        after_updated_at:        $result['updated_at'] = $updated_at;

        
        $permissions = $object->permissions;
        $permissions = $this->serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration⚡️Permissions($permissions);
        after_permissions:        $result['permissions'] = $permissions;

        
        $events = $object->events;
        static $eventsSerializer0;

        if ($eventsSerializer0 === null) {
            $eventsSerializer0 = new \EventSauce\ObjectHydrator\PropertySerializers\SerializeArrayItems(...array (
));
        }
        
        $events = $eventsSerializer0->serialize($events, $this);
        after_events:        $result['events'] = $events;

        
        $installations_count = $object->installations_count;

        if ($installations_count === null) {
            goto after_installations_count;
        }
        after_installations_count:        $result['installations_count'] = $installations_count;

        
        $client_id = $object->client_id;

        if ($client_id === null) {
            goto after_client_id;
        }
        after_client_id:        $result['client_id'] = $client_id;

        
        $client_secret = $object->client_secret;

        if ($client_secret === null) {
            goto after_client_secret;
        }
        after_client_secret:        $result['client_secret'] = $client_secret;

        
        $webhook_secret = $object->webhook_secret;

        if ($webhook_secret === null) {
            goto after_webhook_secret;
        }
        after_webhook_secret:        $result['webhook_secret'] = $webhook_secret;

        
        $pem = $object->pem;

        if ($pem === null) {
            goto after_pem;
        }
        after_pem:        $result['pem'] = $pem;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️Integration⚡️Permissions(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\Integration\Permissions);
        $result = [];

        $issues = $object->issues;

        if ($issues === null) {
            goto after_issues;
        }
        after_issues:        $result['issues'] = $issues;

        
        $checks = $object->checks;

        if ($checks === null) {
            goto after_checks;
        }
        after_checks:        $result['checks'] = $checks;

        
        $metadata = $object->metadata;

        if ($metadata === null) {
            goto after_metadata;
        }
        after_metadata:        $result['metadata'] = $metadata;

        
        $contents = $object->contents;

        if ($contents === null) {
            goto after_contents;
        }
        after_contents:        $result['contents'] = $contents;

        
        $deployments = $object->deployments;

        if ($deployments === null) {
            goto after_deployments;
        }
        after_deployments:        $result['deployments'] = $deployments;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ProtectedBranchPullRequestReview⚡️BypassPullRequestAllowances(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\ProtectedBranchPullRequestReview\BypassPullRequestAllowances);
        $result = [];

        $users = $object->users;

        if ($users === null) {
            goto after_users;
        }
        static $usersSerializer0;

        if ($usersSerializer0 === null) {
            $usersSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\SimpleUser',
));
        }
        
        $users = $usersSerializer0->serialize($users, $this);
        after_users:        $result['users'] = $users;

        
        $teams = $object->teams;

        if ($teams === null) {
            goto after_teams;
        }
        static $teamsSerializer0;

        if ($teamsSerializer0 === null) {
            $teamsSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Team',
));
        }
        
        $teams = $teamsSerializer0->serialize($teams, $this);
        after_teams:        $result['teams'] = $teams;

        
        $apps = $object->apps;

        if ($apps === null) {
            goto after_apps;
        }
        static $appsSerializer0;

        if ($appsSerializer0 === null) {
            $appsSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\Integration',
));
        }
        
        $apps = $appsSerializer0->serialize($apps, $this);
        after_apps:        $result['apps'] = $apps;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️BasicError(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\BasicError);
        $result = [];

        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }
        after_message:        $result['message'] = $message;

        
        $documentation_url = $object->documentation_url;

        if ($documentation_url === null) {
            goto after_documentation_url;
        }
        after_documentation_url:        $result['documentation_url'] = $documentation_url;

        
        $url = $object->url;

        if ($url === null) {
            goto after_url;
        }
        after_url:        $result['url'] = $url;

        
        $status = $object->status;

        if ($status === null) {
            goto after_status;
        }
        after_status:        $result['status'] = $status;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError);
        $result = [];

        $message = $object->message;
        after_message:        $result['message'] = $message;

        
        $documentation_url = $object->documentation_url;
        after_documentation_url:        $result['documentation_url'] = $documentation_url;

        
        $errors = $object->errors;

        if ($errors === null) {
            goto after_errors;
        }
        static $errorsSerializer0;

        if ($errorsSerializer0 === null) {
            $errorsSerializer0 = new \EventSauce\ObjectHydrator\PropertyCasters\CastListToType(...array (
  0 => 'ApiClients\\Client\\GitHubEnterpriseCloud\\Schema\\ValidationError\\Errors',
));
        }
        
        $errors = $errorsSerializer0->serialize($errors, $this);
        after_errors:        $result['errors'] = $errors;


        return $result;
    }


    private function serializeObjectApiClients⚡️Client⚡️GitHubEnterpriseCloud⚡️Schema⚡️ValidationError⚡️Errors(mixed $object): mixed
    {
        \assert($object instanceof \ApiClients\Client\GitHubEnterpriseCloud\Schema\ValidationError\Errors);
        $result = [];

        $resource = $object->resource;

        if ($resource === null) {
            goto after_resource;
        }
        after_resource:        $result['resource'] = $resource;

        
        $field = $object->field;

        if ($field === null) {
            goto after_field;
        }
        after_field:        $result['field'] = $field;

        
        $message = $object->message;

        if ($message === null) {
            goto after_message;
        }
        after_message:        $result['message'] = $message;

        
        $code = $object->code;
        after_code:        $result['code'] = $code;

        
        $index = $object->index;

        if ($index === null) {
            goto after_index;
        }
        after_index:        $result['index'] = $index;

        
        $value = $object->value;

        if ($value === null) {
            goto after_value;
        }
        after_value:        $result['value'] = $value;


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
