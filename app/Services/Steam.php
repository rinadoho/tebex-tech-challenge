<?php

namespace App\Services;

use App\Interfaces\RequestInterface;
use App\Services\RequestService;
use App\Services\Traits\UserIdentifier;

class Steam implements RequestInterface { 

    use UserIdentifier;

    const URL = "https://ident.tebex.io/usernameservices/4/username/";

    public function getUrl($request) { 

        $identifer = $this->getIdentifierType($request);

        if ($identifer == "username") {
            die("Steam only supports IDs");
        } else {
            $requestUrl = self::URL . $this->getIdentifierValue($request); 
        }

        return $requestUrl;
    }
    public function getAvatar($profile) {
        $avatar = $profile->meta->avatar;

        return $avatar;
    }

}