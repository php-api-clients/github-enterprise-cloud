<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Router\Delete;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrators;
use ApiClients\Client\GitHubEnterpriseCloud\Operator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use EventSauce\ObjectHydrator\ObjectMapper;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Users
{
    /** @var array<class-string, ObjectMapper> */
    private array $hydrator = [];
    private readonly SchemaValidator $requestSchemaValidator;
    private readonly SchemaValidator $responseSchemaValidator;
    private readonly Hydrators $hydrators;
    private readonly Browser $browser;
    private readonly AuthenticationInterface $authentication;

    public function __construct(SchemaValidator $requestSchemaValidator, SchemaValidator $responseSchemaValidator, Hydrators $hydrators, Browser $browser, AuthenticationInterface $authentication)
    {
        $this->requestSchemaValidator  = $requestSchemaValidator;
        $this->responseSchemaValidator = $responseSchemaValidator;
        $this->hydrators               = $hydrators;
        $this->browser                 = $browser;
        $this->authentication          = $authentication;
    }

    public function unblock(array $params)
    {
        $arguments = [];
        if (array_key_exists('username', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: username');
        }

        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists(Hydrator\Operation\User\Blocks\Username::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Blocks\Username::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Blocks🌀Username();
        }

        $operator = new Operator\Users\Unblock($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Blocks\Username::class]);

        return $operator->call($arguments['username']);
    }

    public function unfollow(array $params)
    {
        $arguments = [];
        if (array_key_exists('username', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: username');
        }

        $arguments['username'] = $params['username'];
        unset($params['username']);
        if (array_key_exists(Hydrator\Operation\User\Following\Username::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Following\Username::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Following🌀Username();
        }

        $operator = new Operator\Users\Unfollow($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Following\Username::class]);

        return $operator->call($arguments['username']);
    }

    public function deleteGpgKeyForAuthenticatedUser(array $params)
    {
        $arguments = [];
        if (array_key_exists('gpg_key_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: gpg_key_id');
        }

        $arguments['gpg_key_id'] = $params['gpg_key_id'];
        unset($params['gpg_key_id']);
        if (array_key_exists(Hydrator\Operation\User\GpgKeys\GpgKeyId::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\GpgKeys\GpgKeyId::class] = $this->hydrators->getObjectMapperOperation🌀User🌀GpgKeys🌀GpgKeyId();
        }

        $operator = new Operator\Users\DeleteGpgKeyForAuthenticatedUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\GpgKeys\GpgKeyId::class]);

        return $operator->call($arguments['gpg_key_id']);
    }

    public function deletePublicSshKeyForAuthenticatedUser(array $params)
    {
        $arguments = [];
        if (array_key_exists('key_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: key_id');
        }

        $arguments['key_id'] = $params['key_id'];
        unset($params['key_id']);
        if (array_key_exists(Hydrator\Operation\User\Keys\KeyId::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Keys\KeyId::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Keys🌀KeyId();
        }

        $operator = new Operator\Users\DeletePublicSshKeyForAuthenticatedUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Keys\KeyId::class]);

        return $operator->call($arguments['key_id']);
    }

    public function deleteSshSigningKeyForAuthenticatedUser(array $params)
    {
        $arguments = [];
        if (array_key_exists('ssh_signing_key_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: ssh_signing_key_id');
        }

        $arguments['ssh_signing_key_id'] = $params['ssh_signing_key_id'];
        unset($params['ssh_signing_key_id']);
        if (array_key_exists(Hydrator\Operation\User\SshSigningKeys\SshSigningKeyId::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\SshSigningKeys\SshSigningKeyId::class] = $this->hydrators->getObjectMapperOperation🌀User🌀SshSigningKeys🌀SshSigningKeyId();
        }

        $operator = new Operator\Users\DeleteSshSigningKeyForAuthenticatedUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\SshSigningKeys\SshSigningKeyId::class]);

        return $operator->call($arguments['ssh_signing_key_id']);
    }

    public function deleteEmailForAuthenticatedUser(array $params)
    {
        if (array_key_exists(Hydrator\Operation\User\Emails::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Emails::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Emails();
        }

        $operator = new Operator\Users\DeleteEmailForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Emails::class]);

        return $operator->call($params);
    }

    public function deleteSocialAccountForAuthenticatedUser(array $params)
    {
        if (array_key_exists(Hydrator\Operation\User\SocialAccounts::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\SocialAccounts::class] = $this->hydrators->getObjectMapperOperation🌀User🌀SocialAccounts();
        }

        $operator = new Operator\Users\DeleteSocialAccountForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\SocialAccounts::class]);

        return $operator->call($params);
    }
}