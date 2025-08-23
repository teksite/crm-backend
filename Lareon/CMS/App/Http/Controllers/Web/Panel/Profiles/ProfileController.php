<?php

namespace Lareon\CMS\App\Http\Controllers\Web\Panel\Profiles;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Lareon\CMS\App\Http\Controllers\Controller;
use Lareon\CMS\App\Http\Requests\Panel\ProfileRequest;
use Lareon\CMS\App\Logic\UserLogic;
use Lareon\CMS\App\Logic\UserMetaLogic;
use Teksite\Handler\Actions\ServiceResult;
use Teksite\Lareon\Facade\WebResponse;

class ProfileController extends Controller implements HasMiddleware
{

    public function __construct(public UserLogic $logic , public UserMetaLogic $metaLogic)
    {

    }

    public static function middleware()
    {
        return [
            new Middleware('can:panel.profile.edit'),

        ];
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user=auth()->user();
        $meta=$this->metaLogic->get($user ,'social' ,'value')->result;
        return view('lareon::panel.pages.profiles.edit', compact('user' ,'meta'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request)
    {
        $user=auth()->user();
        $response_user = $this->logic->change($request->validated() , $user);
        $response_meta = $this->metaLogic->registerOrChange($user , $request->validated('meta'));
        $res=new ServiceResult($response_meta->success &&  $response_user->success , null);
        return WebResponse::byResult($res, route('panel.profile.edit', $user))->go();
    }
}
