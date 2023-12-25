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
        $trainees = Trainee::all(['id','name','grade','phone']);
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
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'name' => 'required',
        ]);
        DB::transaction(function() use ($request){
             $traineeAcoutn =  User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('123456'),
            ]);

            Trainee::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'grade' => 0,
                'currentCourse' => '',
                'user_id' => $traineeAcoutn->id]);
        });
        return redirect()->back()->with('flash', 'sucsses');
    }
}
