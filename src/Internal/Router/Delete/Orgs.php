<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Router\Delete;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Orgs\Delete\Response\ApplicationJson\Accepted\Application\Json;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Orgs
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return array{code:int} */
    public function unblockUser(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('username', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: username');
        }

        $arguments['username'] = $params['username'];
        unset($params['username']);
        $operator = new Internal\Operator\Orgs\UnblockUser($this->browser, $this->authentication);

        return $operator->call($arguments['org'], $arguments['username']);
    }

    /** @return array{code:int} */
    public function removeSamlSsoAuthorization(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('credential_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: credential_id');
        }

        $arguments['credential_id'] = $params['credential_id'];
        unset($params['credential_id']);
        $operator = new Internal\Operator\Orgs\RemoveSamlSsoAuthorization($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀CredentialAuthorizations🌀CredentialId());

        return $operator->call($arguments['org'], $arguments['credential_id']);
    }

    /** @return array{code:int} */
    public function deleteCustomRepoRole(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('role_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: role_id');
        }

        $arguments['role_id'] = $params['role_id'];
        unset($params['role_id']);
        $operator = new Internal\Operator\Orgs\DeleteCustomRepoRole($this->browser, $this->authentication);

        return $operator->call($arguments['org'], $arguments['role_id']);
    }

    /** @return array{code:int} */
    public function deleteCustomRole(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('role_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: role_id');
        }

        $arguments['role_id'] = $params['role_id'];
        unset($params['role_id']);
        $operator = new Internal\Operator\Orgs\DeleteCustomRole($this->browser, $this->authentication);

        return $operator->call($arguments['org'], $arguments['role_id']);
    }

    /** @return array{code:int} */
    public function deleteWebhook(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('hook_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: hook_id');
        }

        $arguments['hook_id'] = $params['hook_id'];
        unset($params['hook_id']);
        $operator = new Internal\Operator\Orgs\DeleteWebhook($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Hooks🌀HookId());

        return $operator->call($arguments['org'], $arguments['hook_id']);
    }

    /** @return array{code:int} */
    public function cancelInvitation(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('invitation_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: invitation_id');
        }

        $arguments['invitation_id'] = $params['invitation_id'];
        unset($params['invitation_id']);
        $operator = new Internal\Operator\Orgs\CancelInvitation($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Invitations🌀InvitationId());

        return $operator->call($arguments['org'], $arguments['invitation_id']);
    }

    /** @return array{code:int} */
    public function removeMember(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('username', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: username');
        }

        $arguments['username'] = $params['username'];
        unset($params['username']);
        $operator = new Internal\Operator\Orgs\RemoveMember($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Members🌀Username());

        return $operator->call($arguments['org'], $arguments['username']);
    }

    /** @return array{code:int} */
    public function removeMembershipForUser(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('username', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: username');
        }

        $arguments['username'] = $params['username'];
        unset($params['username']);
        $operator = new Internal\Operator\Orgs\RemoveMembershipForUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Memberships🌀Username());

        return $operator->call($arguments['org'], $arguments['username']);
    }

    /** @return array{code:int} */
    public function removeOutsideCollaborator(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('username', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: username');
        }

        $arguments['username'] = $params['username'];
        unset($params['username']);
        $operator = new Internal\Operator\Orgs\RemoveOutsideCollaborator($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀OutsideCollaborators🌀Username());

        return $operator->call($arguments['org'], $arguments['username']);
    }

    /** @return array{code:int} */
    public function removePublicMembershipForAuthenticatedUser(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('username', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: username');
        }

        $arguments['username'] = $params['username'];
        unset($params['username']);
        $operator = new Internal\Operator\Orgs\RemovePublicMembershipForAuthenticatedUser($this->browser, $this->authentication);

        return $operator->call($arguments['org'], $arguments['username']);
    }

    /** @return array{code:int} */
    public function removeSecurityManagerTeam(array $params): array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('team_slug', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: team_slug');
        }

        $arguments['team_slug'] = $params['team_slug'];
        unset($params['team_slug']);
        $operator = new Internal\Operator\Orgs\RemoveSecurityManagerTeam($this->browser, $this->authentication);

        return $operator->call($arguments['org'], $arguments['team_slug']);
    }

    /** @return */
    public function delete(array $params): Json|array
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        $operator = new Internal\Operator\Orgs\Delete($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org());

        return $operator->call($arguments['org']);
    }
}