<?php

namespace App\Interfaces;

interface RequestInterface {
    public function getUrl($request);
    public function getAvatar($profile);
}


