<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Router\Post;

use ApiClients\Client\GitHubEnterpriseCloud\Hydrator;
use ApiClients\Client\GitHubEnterpriseCloud\Hydrators;
use ApiClients\Client\GitHubEnterpriseCloud\Operator;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use EventSauce\ObjectHydrator\ObjectMapper;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Projects
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

    public function createForOrg(array $params)
    {
        $arguments = [];
        if (array_key_exists('org', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: org');
        }

        $arguments['org'] = $params['org'];
        unset($params['org']);
        if (array_key_exists(Hydrator\Operation\Orgs\Org\Projects::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Orgs\Org\Projects::class] = $this->hydrators->getObjectMapperOperation🌀Orgs🌀Org🌀Projects();
        }

        $operator = new Operator\Projects\CreateForOrg($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Orgs\Org\Projects::class]);

        return $operator->call($arguments['org'], $params);
    }

    public function createColumn(array $params)
    {
        $arguments = [];
        if (array_key_exists('project_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: project_id');
        }

        $arguments['project_id'] = $params['project_id'];
        unset($params['project_id']);
        if (array_key_exists(Hydrator\Operation\Projects\ProjectId\Columns::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Projects\ProjectId\Columns::class] = $this->hydrators->getObjectMapperOperation🌀Projects🌀ProjectId🌀Columns();
        }

        $operator = new Operator\Projects\CreateColumn($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Projects\ProjectId\Columns::class]);

        return $operator->call($arguments['project_id'], $params);
    }

    public function moveCard(array $params)
    {
        $arguments = [];
        if (array_key_exists('card_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: card_id');
        }

        $arguments['card_id'] = $params['card_id'];
        unset($params['card_id']);
        if (array_key_exists(Hydrator\Operation\Projects\Columns\Cards\CardId\Moves::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Projects\Columns\Cards\CardId\Moves::class] = $this->hydrators->getObjectMapperOperation🌀Projects🌀Columns🌀Cards🌀CardId🌀Moves();
        }

        $operator = new Operator\Projects\MoveCard($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Projects\Columns\Cards\CardId\Moves::class]);

        return $operator->call($arguments['card_id'], $params);
    }

    public function createCard(array $params)
    {
        $arguments = [];
        if (array_key_exists('column_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: column_id');
        }

        $arguments['column_id'] = $params['column_id'];
        unset($params['column_id']);
        if (array_key_exists(Hydrator\Operation\Projects\Columns\ColumnId\Cards::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Projects\Columns\ColumnId\Cards::class] = $this->hydrators->getObjectMapperOperation🌀Projects🌀Columns🌀ColumnId🌀Cards();
        }

        $operator = new Operator\Projects\CreateCard($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Projects\Columns\ColumnId\Cards::class]);

        return $operator->call($arguments['column_id'], $params);
    }

    public function moveColumn(array $params)
    {
        $arguments = [];
        if (array_key_exists('column_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: column_id');
        }

        $arguments['column_id'] = $params['column_id'];
        unset($params['column_id']);
        if (array_key_exists(Hydrator\Operation\Projects\Columns\ColumnId\Moves::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Projects\Columns\ColumnId\Moves::class] = $this->hydrators->getObjectMapperOperation🌀Projects🌀Columns🌀ColumnId🌀Moves();
        }

        $operator = new Operator\Projects\MoveColumn($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Projects\Columns\ColumnId\Moves::class]);

        return $operator->call($arguments['column_id'], $params);
    }

    public function createForRepo(array $params)
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
        if (array_key_exists(Hydrator\Operation\Repos\Owner\Repo\Projects::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Projects::class] = $this->hydrators->getObjectMapperOperation🌀Repos🌀Owner🌀Repo🌀Projects();
        }

        $operator = new Operator\Projects\CreateForRepo($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\Repos\Owner\Repo\Projects::class]);

        return $operator->call($arguments['owner'], $arguments['repo'], $params);
    }

    public function createForAuthenticatedUser(array $params)
    {
        if (array_key_exists(Hydrator\Operation\User\Projects::class, $this->hydrator) === false) {
            $this->hydrator[Hydrator\Operation\User\Projects::class] = $this->hydrators->getObjectMapperOperation🌀User🌀Projects();
        }

        $operator = new Operator\Projects\CreateForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrator[Hydrator\Operation\User\Projects::class]);

        return $operator->call($params);
    }
}