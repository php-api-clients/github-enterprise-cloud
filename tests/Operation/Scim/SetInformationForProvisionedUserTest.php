<?php

declare (strict_types=1);
namespace ApiClients\Tests\Client\Github\Operation\Scim;

use ApiClients\Client\Github\Error as ErrorSchemas;
use ApiClients\Client\Github\Hydrator;
use ApiClients\Client\Github\Operation;
use ApiClients\Client\Github\Schema;
use ApiClients\Client\Github\WebHook;
final class SetInformationForProvisionedUserTest extends \WyriHaximus\AsyncTestUtilities\AsyncTestCase
{
    /**
     * @test
     */
    public function t200te721a100ec95fd3067a83a0920ca7a5e()
    {
        $response = new \React\Http\Message\Response(200, array('Content-Type' => 'application/scim+json'), Schema\ScimUser::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/scim/v2/organizations/generated_null/Users/generated_null', \Prophecy\Argument::type('array'), Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\Scim\SetInformationForProvisionedUser::OPERATION_MATCH, (static function (array $data) : array {
            $data['org'] = 'generated_null';
            $data['scim_user_id'] = 'generated_null';
            return $data;
        })(json_decode(Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
    /**
     * @test
     */
    public function t404td1f5a9d446c6cec2cf63545e8163e585()
    {
        self::expectException(ErrorSchemas\ScimError::class);
        $response = new \React\Http\Message\Response(404, array('Content-Type' => 'application/json'), Schema\ScimError::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/scim/v2/organizations/generated_null/Users/generated_null', \Prophecy\Argument::type('array'), Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\Scim\SetInformationForProvisionedUser::OPERATION_MATCH, (static function (array $data) : array {
            $data['org'] = 'generated_null';
            $data['scim_user_id'] = 'generated_null';
            return $data;
        })(json_decode(Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
    /**
     * @test
     */
    public function t404te721a100ec95fd3067a83a0920ca7a5e()
    {
        self::expectException(ErrorSchemas\ScimError::class);
        $response = new \React\Http\Message\Response(404, array('Content-Type' => 'application/scim+json'), Schema\ScimError::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/scim/v2/organizations/generated_null/Users/generated_null', \Prophecy\Argument::type('array'), Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\Scim\SetInformationForProvisionedUser::OPERATION_MATCH, (static function (array $data) : array {
            $data['org'] = 'generated_null';
            $data['scim_user_id'] = 'generated_null';
            return $data;
        })(json_decode(Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
    /**
     * @test
     */
    public function t403td1f5a9d446c6cec2cf63545e8163e585()
    {
        self::expectException(ErrorSchemas\ScimError::class);
        $response = new \React\Http\Message\Response(403, array('Content-Type' => 'application/json'), Schema\ScimError::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/scim/v2/organizations/generated_null/Users/generated_null', \Prophecy\Argument::type('array'), Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\Scim\SetInformationForProvisionedUser::OPERATION_MATCH, (static function (array $data) : array {
            $data['org'] = 'generated_null';
            $data['scim_user_id'] = 'generated_null';
            return $data;
        })(json_decode(Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
    /**
     * @test
     */
    public function t403te721a100ec95fd3067a83a0920ca7a5e()
    {
        self::expectException(ErrorSchemas\ScimError::class);
        $response = new \React\Http\Message\Response(403, array('Content-Type' => 'application/scim+json'), Schema\ScimError::SCHEMA_EXAMPLE_DATA);
        $auth = $this->prophesize(\ApiClients\Contracts\HTTP\Headers\AuthenticationInterface::class);
        $auth->authHeader(\Prophecy\Argument::any())->willReturn('Bearer beer')->shouldBeCalled();
        $browser = $this->prophesize(\React\Http\Browser::class);
        $browser->withBase(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->withFollowRedirects(\Prophecy\Argument::any())->willReturn($browser->reveal());
        $browser->request('PUT', '/scim/v2/organizations/generated_null/Users/generated_null', \Prophecy\Argument::type('array'), Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA)->willReturn(\React\Promise\resolve($response))->shouldBeCalled();
        $client = new \ApiClients\Client\Github\Client($auth->reveal(), $browser->reveal());
        $client->call(\ApiClients\Client\Github\Operation\Scim\SetInformationForProvisionedUser::OPERATION_MATCH, (static function (array $data) : array {
            $data['org'] = 'generated_null';
            $data['scim_user_id'] = 'generated_null';
            return $data;
        })(json_decode(Schema\Scim\SetInformationForProvisionedUser\Request\Applicationjson::SCHEMA_EXAMPLE_DATA, true)));
    }
}