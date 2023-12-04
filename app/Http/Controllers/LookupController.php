<?php declare(strict_types=1);

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Services\RequestService;

/**
 * Class LookupController
 *
 * @package App\Http\Controllers
 */
class LookupController extends Controller
{
    public function lookup(Request $request, RequestService $requestService)
    {
        $profile = $requestService->getProfile($request);

        $avatar = $requestService->getProfileAvatar($request);

        return [
            'username' => $profile->username,
            'id' => $profile->id,
            'avatar' => $avatar,
        ];
    }

    public function index(Request $request, RequestService $requestService) {
        if($request->type && (count($request->all()) == 2)) {
            $this->lookup($request, $requestService);
        } else {
            return response('Awaiting request', 200);
        }
    }
}
