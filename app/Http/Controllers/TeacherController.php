<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teachers::all();
        return view('teachers.index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.form');
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:teachers',
            'cpf' => 'required|max:11|unique:teachers',
            'password' => 'required|confirmed|min:8',
            'discipline' => ['required', Rule::in(['Inglês', 'Matemática', 'Lógica']),]
        ]);

        Teachers::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'cpf' => $request->cpf,
            'password' => Hash::make(  $request->password ),
            'discipline' => $request->discipline
        ]);

        return redirect('/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $teacher = Teachers::find($id);
        return view('teachers.form', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $teacher = Teachers::find($id);
        return view('teachers.form', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $teacher = Teachers::find($id);

        $teacher->name = $request->name;
        // nao editaveis
        // $teacher->email = $request->email;
        // $teacher->cpf = $request->cpf;
        $teacher->password = Hash::make($request->password);
        $teacher->name = $request->name;
        $teacher->save();

        return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $teacher = Teachers::find($id);
        $teacher->delete();
        return redirect('/teachers');
    }

    public function search(Request $request){
        $teachers = Teachers::where('name', 'LIKE', "%".$request->search."%")->orWhere('id', '=', $request->search)->get();
        return view('teachers.index', [
            'teachers' => $teachers
        ]);
    }
}
