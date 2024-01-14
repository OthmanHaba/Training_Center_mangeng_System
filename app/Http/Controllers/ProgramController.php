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
        //return Program::with('category')->get();

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
        $request->validate([
            'name' => 'required',
            'hour_count' => 'required',
            'days_count' => 'required',
            'category_id' => 'required',
        ]);
        Program::create([
            'name' => $request->name,
            'hour_count' => $request->hour_count,
            'days_count' => $request->days_count,
            'category_id' => $request->category_id,
        ]);

        return back()->with(['success' => 'the program has been inserted successfully']);
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
        $cat = Category::all();
        return response()->json($cat);
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
        $program = Program::findOrFail($program);
        return Inertia::render('Programs/show',[
            'program' => $program
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $program)
    {
          $program = Program::findOrFail($program);

         return Inertia::render('Programs/edit',[
             'program'=> $program

         ]);
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
