<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Router\Post;

use ApiClients\Client\GitHubEnterpriseCloud\Internal\Routers;
use ApiClients\Client\GitHubEnterpriseCloud\Schema;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\GistSimple;
use InvalidArgumentException;

final class Two
{
    public function __construct(private Routers $routers)
    {
    }

    /** @return Schema\GistSimple|array{code:int}|string */
    public function call(string $call, array $params, array $pathChunks): GistSimple|string|array
    {
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'gists') {
                if ($call === 'POST /gists') {
                    return $this->routers->internal🔀Router🔀Post🔀Gists()->create($params);
                }
            } elseif ($pathChunks[1] === 'markdown') {
                if ($call === 'POST /markdown') {
                    return $this->routers->internal🔀Router🔀Post🔀Markdown()->render($params);
                }
            }
        }

        throw new InvalidArgumentException();
    }
}