<?php

namespace App\Services;

use App\Interfaces\RequestInterface;
use App\Services\Traits\UserIdentifier;
use Illuminate\Support\Str;

class Xbl implements RequestInterface { 
   
    use UserIdentifier;

    const URL = "https://ident.tebex.io/usernameservices/3/username/";

    public function getUrl($request) { 

        $identifer = $this->getIdentifierType($request);

        if ($identifer == "username") {
            $requestUrl = self::URL . $this->getIdentifierValue($request) . "?type=username";
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