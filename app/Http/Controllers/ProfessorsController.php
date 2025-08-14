<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfessorsRequest;
use App\Http\Requests\UpdateProfessorsRequest;
use App\Models\Professors;

class ProfessorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfessorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Professors $professors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professors $professors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfessorsRequest $request, Professors $professors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professors $professors)
    {
        //
    }
}
