<?php

namespace Tyondo\LaravelNotifications\Controllers;

use Illuminate\Http\Request;
use Tyondo\LaravelNotifications\Helpers\LaravelNotificationsHelper;

class LaravelNotificationsController extends Controller
{

    /**
     * Create a new helper instance.
     *
     * @param mixed
     */
    public function __construct(LaravelNotificationsHelper $laravelNotificationsHelper)
    {
        $this->auth = $auth;
        $this->laravelNotificationsHelper = $laravelNotificationsHelper;
        $this->user = config('laravel_notifications.options.model')::find(Auth::user()->id);
    }

    public function activateUser($token)
    {
        if ($user = $this->laravelNotificationsHelper->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
