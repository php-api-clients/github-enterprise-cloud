<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\Github\Operation\Activity;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
final class ListRepoNotificationsForAuthenticatedUserTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function t200td1f5a9d446c6cec2cf63545e8163e585()
    {
        $response = new \React\Http\Message\Response(200, array('Content-Type' => 'application/json'), '[' . (Schema\Thread::SCHEMA_EXAMPLE_DATA . ']'));
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/repos/generated_null/generated_null/notifications?since=1970-01-01T00:00:00+00:00&before=1970-01-01T00:00:00+00:00&all=&participating=&per_page=13&page=13', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\Activity\ListRepoNotificationsForAuthenticatedUser::OPERATION_MATCH, array('owner' => 'generated_null', 'repo' => 'generated_null', 'since' => '1970-01-01T00:00:00+00:00', 'before' => '1970-01-01T00:00:00+00:00', 'all' => false, 'participating' => false, 'per_page' => 13, 'page' => 13));
    }
}