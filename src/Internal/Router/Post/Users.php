<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Router\Post;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\GpgKey;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Key;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\SshSigningKey;
use ApiClients\Contracts\HTTP\Headers\AuthenticationInterface;
use League\OpenAPIValidation\Schema\SchemaValidator;
use React\Http\Browser;

final class Users
{
    public function __construct(private SchemaValidator $requestSchemaValidator, private SchemaValidator $responseSchemaValidator, private Internal\Hydrators $hydrators, private Browser $browser, private AuthenticationInterface $authentication)
    {
    }

    /** @return Observable<Schema\Email>|array{code:int} */
    public function addEmailForAuthenticatedUser(array $params): iterable
    {
        $operator = new Internal\Operator\Users\AddEmailForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀Emails());

        return $operator->call($params);
    }

    /** @return Schema\GpgKey|array{code:int} */
    public function createGpgKeyForAuthenticatedUser(array $params): GpgKey|array
    {
        $operator = new Internal\Operator\Users\CreateGpgKeyForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀GpgKeys());

        return $operator->call($params);
    }

    /** @return Schema\Key|array{code:int} */
    public function createPublicSshKeyForAuthenticatedUser(array $params): Key|array
    {
        $operator = new Internal\Operator\Users\CreatePublicSshKeyForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀Keys());

        return $operator->call($params);
    }

    /** @return Observable<Schema\SocialAccount>|array{code:int} */
    public function addSocialAccountForAuthenticatedUser(array $params): iterable
    {
        $operator = new Internal\Operator\Users\AddSocialAccountForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀SocialAccounts());

        return $operator->call($params);
    }

    /** @return Schema\SshSigningKey|array{code:int} */
    public function createSshSigningKeyForAuthenticatedUser(array $params): SshSigningKey|array
    {
        $operator = new Internal\Operator\Users\CreateSshSigningKeyForAuthenticatedUser($this->browser, $this->authentication, $this->requestSchemaValidator, $this->responseSchemaValidator, $this->hydrators->getObjectMapperOperation🌀User🌀SshSigningKeys());

        return $operator->call($params);
    }
}