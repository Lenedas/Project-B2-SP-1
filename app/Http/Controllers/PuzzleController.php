<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuzzleController extends Controller
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
        return view('puzzles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'image' => 'required|max:100',
            'price' => 'required|numeric|between:0,99.99',
        ]);

        $puzzle = new Puzzle();
        $puzzle->name = $request->name;
        $puzzle->category = $request->category;
        $puzzle->description = $request->description;
        $puzzle->image = $request->image;
        $puzzle->price = $request->price;
        $puzzle->save();
        return back()->with('message',"Le puzzle a bien été créé");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puzzle $puzzle)
    {
        return view('puzzles.edit', compact('puzzles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puzzle $puzzle)
    {
        $data = $request->validate([
            'name'         => 'required|max:100',
            'category'   => 'required|max:100',
            'description' => 'required|max:500',
            'price'        => 'required|numeric|between:0,99.99',
        ]);

        $puzzle->name = $request->name;
        $puzzle->category = $request->category;
        $puzzle->description = $request->description;
        $puzzle->price = $request->price;

        $puzzle->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
