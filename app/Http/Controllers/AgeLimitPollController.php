<?php

namespace App\Http\Controllers;

use App\AgeLimitPoll;
use Illuminate\Http\Request;
use App\Http\Requests\AgeLimitPollRequest;

class AgeLimitPollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agelimit.index');
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
    public function store(AgeLimitPollRequest $request)
    {
        try {
            \DB::transaction(function () use ($request) {
                AgeLimitPoll::create($request->only('phoneNumber', 'choice'))->finalize();
            });

            return redirect()->route('age-limit-verification.create');
        } catch (Exception $e) {
            report($e);
            flash()->error()->title('Something went Wrong')->message('Please try again');

            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\AgeLimitPoll $ageLimitPoll
     *
     * @return \Illuminate\Http\Response
     */
    public function show(AgeLimitPoll $ageLimitPoll)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AgeLimitPoll $ageLimitPoll
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(AgeLimitPoll $ageLimitPoll)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\AgeLimitPoll        $ageLimitPoll
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgeLimitPoll $ageLimitPoll)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AgeLimitPoll $ageLimitPoll
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgeLimitPoll $ageLimitPoll)
    {
    }
}
