<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Psy\Util\Json;
use function Termwind\renderUsing;

class ProgramController extends Controller
{
    public function index()
    {
        //return Program::with('category')->get();

        return Inertia::render('Programs/Index', [
            'programs' => Program::with('category')->get(),
        ]);
    }

    public function create()
    {
        $category = Category::all();
        //return  $category;
        return Inertia::render('Programs/create', [
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
        return response()->json($category, 201);
    }

    public function deleteCategory($id)
    {

        $record = Category::find($id);
        if (!$record) {
            return response()->json(['message' => 'Record not found.'], 404);
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
    public function show($program)
    {
        $program = Program::findOrFail($program);
        return Inertia::render('Programs/show', [
            'program' => $program
        ]);
    }

    public function edit($id)
    {
        //$program = Program::findOrFail($program)->with('category');
        $id = Program::/*with('category')-> المفروض اندير بالعلاقة لاكن فتتها*/ findOrFail($id);//
        $categories = Category::all();
        return Inertia::render('Programs/edit', [
            'program' => $id,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)//, Program $program
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'hour_count' => 'required',
            'days_count' => 'required',
        ]);
        $program = Program::findOrFail($id);
        $program->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'hour_count' => $request->hour_count,
            'days_count' => $request->days_count,
        ]);
        return Redirect::route('program.index');
    }

    public function destroy($id)
    {
         $program =  Program::findOrFail($id);
         $program->delete();
    }
}
