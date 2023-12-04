<?php

namespace App\Services;

use App\Interfaces\RequestInterface;
use App\Services\Traits\UserIdentifier;
use Illuminate\Support\Str;

class Minecraft implements RequestInterface { 

    use UserIdentifier;

    const URL_ID = "https://sessionserver.mojang.com/session/minecraft/profile/";
    const URL_USERNAME = "https://api.mojang.com/users/profiles/minecraft/";
    const URL_AVATAR = "https://crafatar.com/avatars";
    
    public function getUrl($request) { 
        $identifer = $this->getIdentifierType($request);

        $requestUrl = constant("self::URL_" . Str::upper($identifer)) . $this->getIdentifierValue($request); 

        return $requestUrl;
    }
    public function getAvatar($profile) {
        $avatar = "https://crafatar.com/avatars/" . $profile->id;
        return $avatar;
    }
}