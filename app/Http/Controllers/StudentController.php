<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::all();

        return view('students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required'
        ]);

        Students::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date
        ]);

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $student = Students::find($id);
        return view('students.form', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $student = Students::find($id);
        return view('students.form', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $student = Students::find($id);
        $student->name = $request->name;
        $student->birth_date = $request->birth_date;
        $student->save();

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $student = Students::find($id);
        $student->delete();
        return redirect('/students');
    }

    public function search(Request $request)
    {
        $students = Students::where('name', 'LIKE', "%".$request->search."%")->orWhere('id', '=', $request->search)->get();
        return view('students.index', [
            'students' => $students
        ]);
    }
}
