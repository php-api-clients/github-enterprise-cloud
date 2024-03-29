<?php

declare(strict_types=1);

namespace ApiClients\Client\GitHubEnterpriseCloud\Operation;

use ApiClients\Client\GitHubEnterpriseCloud\Internal;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\ScimUser;
use ApiClients\Client\GitHubEnterpriseCloud\Schema\ScimUserList;
use ApiClients\Tools\OpenApiClient\Utils\Response\WithoutBody;

final class Scim
{
    public function __construct(private Internal\Operators $operators)
    {
    }

    /** @return */
    public function listProvisionedIdentities(string $org, int $startIndex, int $count, string $filter): ScimUserList|WithoutBody
    {
        return $this->operators->scim👷ListProvisionedIdentities()->call($org, $startIndex, $count, $filter);
    }

    /** @return */
    public function provisionAndInviteUser(string $org, array $params): ScimUser|WithoutBody
    {
        return $this->operators->scim👷ProvisionAndInviteUser()->call($org, $params);
    }

    /** @return */
    public function getProvisioningInformationForUser(string $org, string $scimUserId): ScimUser|WithoutBody
    {
        return $this->operators->scim👷GetProvisioningInformationForUser()->call($org, $scimUserId);
    }

    /** @return */
    public function setInformationForProvisionedUser(string $org, string $scimUserId, array $params): ScimUser|WithoutBody
    {
        return $this->operators->scim👷SetInformationForProvisionedUser()->call($org, $scimUserId, $params);
    }

    /** @return */
    public function deleteUserFromOrg(string $org, string $scimUserId): WithoutBody
    {
        return $this->operators->scim👷DeleteUserFromOrg()->call($org, $scimUserId);
    }

    /** @return */
    public function updateAttributeForUser(string $org, string $scimUserId, array $params): ScimUser|WithoutBody
    {
        return $this->operators->scim👷UpdateAttributeForUser()->call($org, $scimUserId, $params);
    }
}
