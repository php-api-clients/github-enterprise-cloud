<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\Github\Operation\CodeScanning;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
final class ListAlertsForOrgTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function t200td1f5a9d446c6cec2cf63545e8163e585()
    {
        $response = new \React\Http\Message\Response(200, array('Content-Type' => 'application/json'), '[' . (Schema\CodeScanningOrganizationAlertItems::SCHEMA_EXAMPLE_DATA . ']'));
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/orgs/generated_null/code-scanning/alerts?tool_name=generated_null&tool_guid=&before=generated_null&after=generated_null&state=generated_null&severity=generated_null&page=13&per_page=13&direction=generated_null&sort=generated_null', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\CodeScanning\ListAlertsForOrg::OPERATION_MATCH, array('org' => 'generated_null', 'tool_name' => 'generated_null', 'tool_guid' => null, 'before' => 'generated_null', 'after' => 'generated_null', 'state' => 'generated_null', 'severity' => 'generated_null', 'page' => 13, 'per_page' => 13, 'direction' => 'generated_null', 'sort' => 'generated_null'));
    }
    /**
     * @test
     */
    public function t404td1f5a9d446c6cec2cf63545e8163e585()
    {
        self::expectException(ErrorSchemas\BasicError::class);
        $response = new \React\Http\Message\Response(404, array('Content-Type' => 'application/json'), Schema\BasicError::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/orgs/generated_null/code-scanning/alerts?tool_name=generated_null&tool_guid=&before=generated_null&after=generated_null&state=generated_null&severity=generated_null&page=13&per_page=13&direction=generated_null&sort=generated_null', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\CodeScanning\ListAlertsForOrg::OPERATION_MATCH, array('org' => 'generated_null', 'tool_name' => 'generated_null', 'tool_guid' => null, 'before' => 'generated_null', 'after' => 'generated_null', 'state' => 'generated_null', 'severity' => 'generated_null', 'page' => 13, 'per_page' => 13, 'direction' => 'generated_null', 'sort' => 'generated_null'));
    }
    /**
     * @test
     */
    public function t503td1f5a9d446c6cec2cf63545e8163e585()
    {
        self::expectException(ErrorSchemas\Operation\CodeScanning\ListAlertsForEnterprise\Response\Applicationjson\H503::class);
        $response = new \React\Http\Message\Response(503, array('Content-Type' => 'application/json'), Schema\Operation\CodeScanning\ListAlertsForEnterprise\Response\Applicationjson\H503::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('GET', '/orgs/generated_null/code-scanning/alerts?tool_name=generated_null&tool_guid=&before=generated_null&after=generated_null&state=generated_null&severity=generated_null&page=13&per_page=13&direction=generated_null&sort=generated_null', \Prophecy\Argument::type('array'), '')->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\CodeScanning\ListAlertsForOrg::OPERATION_MATCH, array('org' => 'generated_null', 'tool_name' => 'generated_null', 'tool_guid' => null, 'before' => 'generated_null', 'after' => 'generated_null', 'state' => 'generated_null', 'severity' => 'generated_null', 'page' => 13, 'per_page' => 13, 'direction' => 'generated_null', 'sort' => 'generated_null'));
    }
}