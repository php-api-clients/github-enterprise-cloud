<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Internal\Router\Get;

use ApiClients\Client\GitHubEnterpriseCloud\Internal\Routers;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\Operations\Actions\ListJobsForWorkflowRunAttempt\Response\ApplicationJson\Ok;
use InvalidArgumentException;

final class Ten
{
    public function __construct(private Routers $routers)
    {
    }

    /** @return Observable<Schema\Reaction>||array{code:int,location:string} */
    public function call(string $call, array $params, array $pathChunks): iterable|Ok
    {
        if ($pathChunks[0] === '') {
            if ($pathChunks[1] === 'orgs') {
                if ($pathChunks[2] === '{org}') {
                    if ($pathChunks[3] === 'teams') {
                        if ($pathChunks[4] === '{team_slug}') {
                            if ($pathChunks[5] === 'discussions') {
                                if ($pathChunks[6] === '{discussion_number}') {
                                    if ($pathChunks[7] === 'comments') {
                                        if ($pathChunks[8] === '{comment_number}') {
                                            if ($pathChunks[9] === 'reactions') {
                                                if ($call === 'GET /orgs/{org}/teams/{team_slug}/discussions/{discussion_number}/comments/{comment_number}/reactions') {
                                                    return $this->routers->internal🔀Router🔀Get🔀Reactions()->listForTeamDiscussionCommentInOrg($params);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($pathChunks[1] === 'repos') {
                if ($pathChunks[2] === '{owner}') {
                    if ($pathChunks[3] === '{repo}') {
                        if ($pathChunks[4] === 'actions') {
                            if ($pathChunks[5] === 'runs') {
                                if ($pathChunks[6] === '{run_id}') {
                                    if ($pathChunks[7] === 'attempts') {
                                        if ($pathChunks[8] === '{attempt_number}') {
                                            if ($pathChunks[9] === 'jobs') {
                                                if ($call === 'GET /repos/{owner}/{repo}/actions/runs/{run_id}/attempts/{attempt_number}/jobs') {
                                                    return $this->routers->internal🔀Router🔀Get🔀Actions()->listJobsForWorkflowRunAttempt($params);
                                                }
                                            } elseif ($pathChunks[9] === 'logs') {
                                                if ($call === 'GET /repos/{owner}/{repo}/actions/runs/{run_id}/attempts/{attempt_number}/logs') {
                                                    return $this->routers->internal🔀Router🔀Get🔀Actions()->downloadWorkflowRunAttemptLogs($params);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        throw new InvalidArgumentException();
    }
}