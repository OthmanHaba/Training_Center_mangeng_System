<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class TraineeController extends Controller
{
    public function index()
    {
        $trainees = Trainee::all([
            'name',
            'berthDate',
            'EducationalLevel',
            'phoneNumber',
            'startDate',
            'states',
        ]);
        return Inertia::render('Trainees/Index', [
            'trainees' => $trainees
        ]);
    }

    public function create()
    {
        return Inertia::render('Trainees/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'phoneNumber' => 'required|numeric',
            'name' => 'required',
            'berthDate' => 'required|date',
            'educationalLevel' => 'required',
            'startDate' => 'nullable',
            'UniqeSahapMAil' => 'nullable',
            'states' => 'required',
            'endDate' => 'nullable',
            'note' => 'nullable',
        ]);
        DB::transaction(function () use ($request) {

            Trainee::create([
                'name' => $request->name,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'berthDate' => $request->berthDate,
                'educationalLevel' => $request->educationalLevel,
                'startDate' => $request->startDate,
                'UniqeSahapMAil' => $request->uniqueSahapMail,
                'states' => $request->states,
                'endDate' => $request->endDate,
                'note' => $request->note,
            ]);
        });
//        session()->flash('success', 'Item added successfully.');
        return redirect()->back()->with('success', 'Item added successfully.');
    }

    public function show($id)
    {

        $trainee = Trainee::find($id);
        return Inertia::render('Trainees/show', [
            'trainee' => $trainee
        ]);
    }
}
