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

final class Migrations
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

    public function cancelImport(array $params)
    {
        $arguments = [];
        if (array_key_exists('owner', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: owner');
        }

        $arguments['owner'] = $params['owner'];
        unset($params['owner']);
        if (array_key_exists('repo', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo');
        }

        $arguments['repo'] = $params['repo'];
        unset($params['repo']);
        if (array_key_exists(Hydrator\Operation\Repos\Owner\Repo\Import::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Import::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Import();
        }

        $operator = new Operator\Migrations\CancelImport($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Import::class]);

        return $operator->call($arguments['owner'], $arguments['repo']);
    }

    public function deleteArchiveForAuthenticatedUser(array $params)
    {
        $arguments = [];
        if (array_key_exists('migration_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: migration_id');
        }

        $arguments['migration_id'] = $params['migration_id'];
        unset($params['migration_id']);
        if (array_key_exists(Hydrator\Operation\User\Migrations\MigrationId\Archive::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Migrations\MigrationId\Archive::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Migrations🌀MigrationId🌀Archive();
        }

        $operator = new Operator\Migrations\DeleteArchiveForAuthenticatedUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Migrations\MigrationId\Archive::class]);

        return $operator->call($arguments['migration_id']);
    }

    public function unlockRepoForAuthenticatedUser(array $params)
    {
        $arguments = [];
        if (array_key_exists('migration_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: migration_id');
        }

        $arguments['migration_id'] = $params['migration_id'];
        unset($params['migration_id']);
        if (array_key_exists('repo_name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo_name');
        }

        $arguments['repo_name'] = $params['repo_name'];
        unset($params['repo_name']);
        if (array_key_exists(Hydrator\Operation\User\Migrations\MigrationId\Repos\RepoName\Lock::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Migrations\MigrationId\Repos\RepoName\Lock::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Migrations🌀MigrationId🌀Repos🌀RepoName🌀Lock();
        }

        $operator = new Operator\Migrations\UnlockRepoForAuthenticatedUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Migrations\MigrationId\Repos\RepoName\Lock::class]);

        return $operator->call($arguments['migration_id'], $arguments['repo_name']);
    }

    public function deleteArchiveForOrg(array $params)
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('migration_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: migration_id');
        }

        $arguments['migration_id'] = $params['migration_id'];
        unset($params['migration_id']);
        if (array_key_exists(Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Archive::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Archive::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Migrations🌀MigrationId🌀Archive();
        }

        $operator = new Operator\Migrations\DeleteArchiveForOrg($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Archive::class]);

        return $operator->call($arguments['org'], $arguments['migration_id']);
    }

    public function unlockRepoForOrg(array $params)
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists('migration_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: migration_id');
        }

        $arguments['migration_id'] = $params['migration_id'];
        unset($params['migration_id']);
        if (array_key_exists('repo_name', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: repo_name');
        }

        $arguments['repo_name'] = $params['repo_name'];
        unset($params['repo_name']);
        if (array_key_exists(Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Repos\RepoName\Lock::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Repos\RepoName\Lock::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Migrations🌀MigrationId🌀Repos🌀RepoName🌀Lock();
        }

        $operator = new Operator\Migrations\UnlockRepoForOrg($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\Org\Migrations\MigrationId\Repos\RepoName\Lock::class]);

        return $operator->call($arguments['org'], $arguments['migration_id'], $arguments['repo_name']);
    }
}