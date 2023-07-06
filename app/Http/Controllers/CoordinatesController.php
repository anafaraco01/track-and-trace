<?php

namespace App\Http\Controllers;

use App\Models\Coordinates;
use Illuminate\Http\Request;

class CoordinatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coordinates = Coordinates::all();
        return view('dashboard', compact('coordinates'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Coordinates $coordnates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coordinates $coordnates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coordinates $coordnates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coordinates $coordnates)
    {
        //
    }
}
