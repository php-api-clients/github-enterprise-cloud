<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Router\Post;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\BaseGist;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\GistComment;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\GistSimple;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use InvalidArgumentException;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

use function array_key_exists;

final class Gists
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return Schema\GistComment|array{code:int} */
    public function createComment(array $params): GistComment|array
    {
        $arguments = [];
        if (array_key_exists('gist_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: gist_id');
        }

        $arguments['gist_id'] = $params['gist_id'];
        unset($params['gist_id']);
        $operator = new Internal\Operator\Gists\CreateComment($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Gists🌀GistId🌀Comments());

        return $operator->call($arguments['gist_id'], $params);
    }

    /** @return Schema\BaseGist|array{code:int} */
    public function fork(array $params): BaseGist|array
    {
        $arguments = [];
        if (array_key_exists('gist_id', $params) === false) {
            throw new InvalidArgumentException('Missing mandatory field: gist_id');
        }

        $arguments['gist_id'] = $params['gist_id'];
        unset($params['gist_id']);
        $operator = new Internal\Operator\Gists\Fork($this->browser, $this->authentication, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Gists🌀GistId🌀Forks());

        return $operator->call($arguments['gist_id']);
    }

    /** @return Schema\GistSimple|array{code:int} */
    public function create(array $params): GistSimple|array
    {
        $operator = new Internal\Operator\Gists\Create($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀Gists());

        return $operator->call($params);
    }
}