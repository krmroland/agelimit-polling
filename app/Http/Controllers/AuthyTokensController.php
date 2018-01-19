<?php

namespace App\Http\Controllers;

use App\Admin\AuthyToken;
use Illuminate\Http\Request;

class AuthyTokensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AuthyToken::create($request->validate(['value' => 'required', 'name' => 'required']));

        flash()->message('Token was added successfully')->make();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\AuthyToken $authyToken
     *
     * @return \Illuminate\Http\Response
     */
    public function show(AuthyToken $authyToken)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AuthyToken $authyToken
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthyToken $authyToken)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\AuthyToken          $authyToken
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthyToken $token)
    {
        $token->update($request->validate(['value' => 'required', 'name' => 'required']));

        return $token;

        // flash()->message('Token was updated successfully')->make();

        // return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AuthyToken $authyToken
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthyToken $token)
    {
        $token->delete();
    }
}
