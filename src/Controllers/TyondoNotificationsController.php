<?php

namespace Tyondo\Notifications\Controllers;

use Illuminate\Http\Request;
use Tyondo\Notifications\Helpers\TyondoNotificationsHelper;

class TyondoNotificationsController extends Controller
{
    private $tyondoNotificationsHelper;
    /**
     * Create a new helper instance.
     *
     * @param mixed
     */
    public function __construct(TyondoNotificationsHelper $tyondoNotificationsHelper)
    {
        $this->tyondoNotificationsHelper = $tyondoNotificationsHelper;
    }

    public function activateUser($token)
    {
        if ($user = $this->tyondoNotificationsHelper->activateUser($token)) {
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
