<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Router\Put;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrators;
use ApiClients\Client\GitHubEnterpriseCloud\Operator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use EventSauce\ObjectHydrator\ObjectMapper;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class EnterpriseAdmin
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

    public function setGithubActionsPermissionsEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        $operator = new Operator\EnterpriseAdmin\SetGithubActionsPermissionsEnterprise($this->browser, $this->authentication, $this->requestSchemaValidator);

        return $operator->call($arguments['enterprise'], $params);
    }

    public function enableSelectedOrganizationGithubActionsEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('org_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org_id');
        }

        $arguments['org_id'] = $params['org_id'];
        unset($params['org_id']);
        $operator = new Operator\EnterpriseAdmin\EnableSelectedOrganizationGithubActionsEnterprise($this->browser, $this->authentication);

        return $operator->call($arguments['enterprise'], $arguments['org_id']);
    }

    public function setOrgAccessToSelfHostedRunnerGroupInEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: runner_group_id');
        }

        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
        $operator = new Operator\EnterpriseAdmin\SetOrgAccessToSelfHostedRunnerGroupInEnterprise($this->browser, $this->authentication, $this->requestSchemaValidator);

        return $operator->call($arguments['enterprise'], $arguments['runner_group_id'], $params);
    }

    public function setSelfHostedRunnersInGroupForEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: runner_group_id');
        }

        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
        $operator = new Operator\EnterpriseAdmin\SetSelfHostedRunnersInGroupForEnterprise($this->browser, $this->authentication, $this->requestSchemaValidator);

        return $operator->call($arguments['enterprise'], $arguments['runner_group_id'], $params);
    }

    public function setCustomLabelsForSelfHostedRunnerForEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: runner_id');
        }

        $arguments['runner_id'] = $params['runner_id'];
        unset($params['runner_id']);
        if (array_key_exists(Hydrator\Operation\Enterprises\Enterprise\Actions\Runners\RunnerId\Labels::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Enterprises\Enterprise\Actions\Runners\RunnerId\Labels::class] = $this->hydrators->getObjectMapperOperation🌀Enterprises🌀Enterprise🌀Actions🌀Runners🌀RunnerId🌀Labels();
        }

        $operator = new Operator\EnterpriseAdmin\SetCustomLabelsForSelfHostedRunnerForEnterprise($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Enterprises\Enterprise\Actions\Runners\RunnerId\Labels::class]);

        return $operator->call($arguments['enterprise'], $arguments['runner_id'], $params);
    }

    public function setSelectedOrganizationsEnabledGithubActionsEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        $operator = new Operator\EnterpriseAdmin\SetSelectedOrganizationsEnabledGithubActionsEnterprise($this->browser, $this->authentication, $this->requestSchemaValidator);

        return $operator->call($arguments['enterprise'], $params);
    }

    public function setAllowedActionsEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        $operator = new Operator\EnterpriseAdmin\SetAllowedActionsEnterprise($this->browser, $this->authentication, $this->requestSchemaValidator);

        return $operator->call($arguments['enterprise'], $params);
    }

    public function addOrgAccessToSelfHostedRunnerGroupInEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: runner_group_id');
        }

        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
        if (array_key_exists('org_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org_id');
        }

        $arguments['org_id'] = $params['org_id'];
        unset($params['org_id']);
        $operator = new Operator\EnterpriseAdmin\AddOrgAccessToSelfHostedRunnerGroupInEnterprise($this->browser, $this->authentication);

        return $operator->call($arguments['enterprise'], $arguments['runner_group_id'], $arguments['org_id']);
    }

    public function addSelfHostedRunnerToGroupForEnterprise(array $params)
    {
        $arguments = [];
        if (array_key_exists('enterprise', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: enterprise');
        }

        $arguments['enterprise'] = $params['enterprise'];
        unset($params['enterprise']);
        if (array_key_exists('runner_group_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: runner_group_id');
        }

        $arguments['runner_group_id'] = $params['runner_group_id'];
        unset($params['runner_group_id']);
        if (array_key_exists('runner_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: runner_id');
        }

        $arguments['runner_id'] = $params['runner_id'];
        unset($params['runner_id']);
        $operator = new Operator\EnterpriseAdmin\AddSelfHostedRunnerToGroupForEnterprise($this->browser, $this->authentication);

        return $operator->call($arguments['enterprise'], $arguments['runner_group_id'], $arguments['runner_id']);
    }
}