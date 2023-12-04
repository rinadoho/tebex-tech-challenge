<?php

namespace App\Services\Traits;

use Illuminate\Http\Request;

trait UserIdentifier
{

    /**
     * get what type of user identifier is being passed
     * assuming it can ever only either be an ID or a username but never both
     * @param Request $request
     * @return string
     */
    public function getIdentifierType($request)
    {
        //name or id?
        $userIdentifier = $request->id ? 'id' : 'username';

        return $userIdentifier;
    }

    /**
     * get value by which we search the user
     * @param Request $request
     * @return string param value
     */
    public function getIdentifierValue($request) {
        $userValue = $request->id ?? $request->username;

        return $userValue;
    }

}