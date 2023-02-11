<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdIssueRequest;
use App\Http\Requests\UpdateAdIssueRequest;
use App\Models\AdIssue;

class AdIssueController extends Controller
{
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
     * @param  \App\Http\Requests\StoreAdIssueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdIssueRequest $request)
    {
        $request['media_owner_id'] = auth()->user()->id;
        $storedAdIssue = AdIssue::create($request->all());
        return redirect()->back()->with('message', 'Your issue has been sent successfully, we will contact you soon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdIssue  $adIssue
     * @return \Illuminate\Http\Response
     */
    public function show(AdIssue $adIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdIssue  $adIssue
     * @return \Illuminate\Http\Response
     */
    public function edit(AdIssue $adIssue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdIssueRequest  $request
     * @param  \App\Models\AdIssue  $adIssue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdIssueRequest $request, AdIssue $adIssue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdIssue  $adIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdIssue $adIssue)
    {
        //
    }
}
