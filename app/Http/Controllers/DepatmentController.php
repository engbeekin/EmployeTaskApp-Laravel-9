<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepatmentRequest;
use App\Http\Requests\UpdateDepatmentRequest;
use App\Models\Depatment;

class DepatmentController extends Controller
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
     * @param  \App\Http\Requests\StoreDepatmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepatmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depatment  $depatment
     * @return \Illuminate\Http\Response
     */
    public function show(Depatment $depatment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depatment  $depatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Depatment $depatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepatmentRequest  $request
     * @param  \App\Models\Depatment  $depatment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepatmentRequest $request, Depatment $depatment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depatment  $depatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depatment $depatment)
    {
        //
    }
}
