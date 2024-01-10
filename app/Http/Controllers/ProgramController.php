<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Psy\Util\Json;
use function Termwind\renderUsing;

class ProgramController extends Controller
{
    public function  index()
    {
        //return Program::with('category:name')->get();
        return Inertia::render('Programs/Index',[
            'programs' => Program::with('category')->get(),
        ]);
    }

    public function create()
    {
        $category = Category::all();
        //return  $category;
        return Inertia::render('Programs/create',[
            'categories' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::create([
            'name' => $request->name
        ]);
        return response()->json($category,201);
    }

    public function deleteCategory($id)
    {
        $record = Category::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found.'], 404) ;
        }

        $record->delete();

        return response()->json(['message' => 'Record deleted successfully.']);
    }

    public function getCategories()
    {
        $category = Category::all();
        return response()->json($category);
    }
    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
    }
}
