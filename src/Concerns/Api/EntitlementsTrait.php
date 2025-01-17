<?php

namespace romanzipp\Twitch\Concerns\Api;

use romanzipp\Twitch\Concerns\Operations\AbstractOperationsTrait;
use romanzipp\Twitch\Concerns\Operations\AbstractValidationTrait;
use romanzipp\Twitch\Result;

trait EntitlementsTrait
{
    use AbstractValidationTrait;
    use AbstractOperationsTrait;

    /**
     * Create Entitlement Grants Upload URL.
     *
     * @see https://dev.twitch.tv/docs/api/reference#create-entitlement-grants-upload-url
     *
     * @param array<string, mixed> $parameters
     *
     * @return \romanzipp\Twitch\Result Result instance
     *
     * @deprecated since 2021‑02‑26 "Removed the “Create Entitlement Grants Upload URL” Twitch API endpoint associated with a previous version of Twitch Drops."
     */
    public function createEntitlementUrl(array $parameters = []): Result
    {
        $this->validateRequired($parameters, ['manifest_id', 'type']);

        return $this->post('entitlements/upload', $parameters);
    }

    /**
     * Gets the status of one or more provided codes. This API requires that the caller is an authenticated Twitch user.
     * The API is throttled to one request per second per authenticated user.
     *
     * @see https://dev.twitch.tv/docs/api/reference#get-code-status
     *
     * @param array<string, mixed> $parameters
     *
     * @return \romanzipp\Twitch\Result
     */
    public function getEntitlementsCodeStatus(array $parameters = []): Result
    {
        $this->validateRequired($parameters, ['code', 'user_id']);

        return $this->get('entitlements/codes', $parameters);
    }

    /**
     * Gets a list of entitlements for a given organization that have been granted to a game, user, or both.
     *
     * @see https://dev.twitch.tv/docs/api/reference#get-drops-entitlements
     *
     * @param array<string, mixed> $parameters
     *
     * @return \romanzipp\Twitch\Result
     */
    public function getDropsEntitlements(array $parameters = []): Result
    {
        return $this->get('entitlements/drops', $parameters);
    }

    /**
     * Redeems one or more provided codes to the authenticated Twitch user. This API requires that the caller is an authenticated Twitch user.
     * The API is throttled to one request per second per authenticated user. This API requires that the caller is an authenticated Twitch user.
     * The API is throttled to one request per second per authenticated user.
     *
     * @see https://dev.twitch.tv/docs/api/reference#redeem-code
     *
     * @param array<string, mixed> $parameters
     *
     * @return \romanzipp\Twitch\Result
     */
    public function redeemEntitlementsCode(array $parameters = []): Result
    {
        return $this->post('entitlements/code', $parameters);
    }

    /**
     * Updates the fulfillment status on a set of Drops entitlements, specified by their entitlement IDs.
     *
     * @see https://dev.twitch.tv/docs/api/reference#update-drops-entitlements
     *
     * @param array<string, mixed> $parameters
     * @param array<string, mixed> $body
     *
     * @return \romanzipp\Twitch\Result
     */
    public function updateDropsEntitlements(array $parameters = [], array $body = []): Result
    {
        return $this->patch('entitlements/drops', $parameters, null, $body);
    }
}
