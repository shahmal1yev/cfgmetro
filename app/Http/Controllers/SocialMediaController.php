<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Policies\SocialMediaPolicy;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SocialMediaResource;
use App\Http\Requests\SocialMediaRequest;

class SocialMediaController extends Controller
{
    public function __construct(){
        $this->middleware('auth:web')->only(['store','show','destroy']);
        $this->middleware('verify.accept.only.json.request')->only('index');

    }
    public function index()
    {
        // $this->authorize('view', $contact);
        $social = SocialMedia::get();
        return $social;
    }

    public function store(SocialMediaRequest $request)
    {
        return (new SocialMediaResource(SocialMedia::create($request->all())))->additional([
            'message' => __('lang.created.success')
        ]);
    }

   
    public function show(SocialMedia $social)
    {
        $this->authorize('show', $social);

        return view('admin.social.show');
    }

    public function update(SocialMediaRequest $request, string $id)
    {
        //
    }

    public function destroy(SocialMedia $social)
    {
        $this->authorize('delete', $social);

        $social->delete();
    }
}
