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

final class Activity
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

    public function setThreadSubscription(array $params)
    {
        $arguments = [];
        if (array_key_exists('thread_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: thread_id');
        }

        $arguments['thread_id'] = $params['thread_id'];
        unset($params['thread_id']);
        if (array_key_exists(Hydrator\Operation\Notifications\Threads\ThreadId\Subscription::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Notifications\Threads\ThreadId\Subscription::class] = $this->hydrators->getObjectMapperOperation🌀Notifications🌀Threads🌀ThreadId🌀Subscription();
        }

        $operator = new Operator\Activity\SetThreadSubscription($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Notifications\Threads\ThreadId\Subscription::class]);

        return $operator->call($arguments['thread_id'], $params);
    }

    public function markRepoNotificationsAsRead(array $params)
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
        if (array_key_exists(Hydrator\Operation\Repos\Owner\Repo\Notifications::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Notifications::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Notifications();
        }

        $operator = new Operator\Activity\MarkRepoNotificationsAsRead($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Notifications::class]);

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    public function setRepoSubscription(array $params)
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
        if (array_key_exists(Hydrator\Operation\Repos\Owner\Repo\Subscription::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Subscription::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Subscription();
        }

        $operator = new Operator\Activity\SetRepoSubscription($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Subscription::class]);

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    public function starRepoForAuthenticatedUser(array $params)
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
        if (array_key_exists(Hydrator\Operation\User\Starred\Owner\Repo::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Starred\Owner\Repo::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Starred🌀Owner🌀Repo();
        }

        $operator = new Operator\Activity\StarRepoForAuthenticatedUser($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Starred\Owner\Repo::class]);

        return $operator->call($arguments['owner'], $arguments['repo']);
    }

    public function markNotificationsAsRead(array $params)
    {
        if (array_key_exists(Hydrator\Operation\Notifications::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Notifications::class] = $this->hydrators->getObjectMapperOperation🌀Notifications();
        }

        $operator = new Operator\Activity\MarkNotificationsAsRead($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Notifications::class]);

        return $operator->call($params);
    }
}