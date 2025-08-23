<?php

namespace Lareon\CMS\App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Lareon\CMS\App\Http\Controllers\Controller;
use Lareon\CMS\App\Http\Requests\Auth\NewUserApiRequest;
use Lareon\CMS\App\Logic\UserLogic;
use Lareon\CMS\App\Logic\UserMetaLogic;
use Teksite\Lareon\Facade\JsonResponse;
use function Pest\Laravel\json;

class CreateUserController extends Controller
{
    public function __construct(public UserLogic $logic , public UserMetaLogic $metaLogic)
    {
    }

    public function post(NewUserApiRequest $request)
    {
        $res = $this->logic->register($request->validated());
        return JsonResponse::byResult($res)->reply();
    }
}
