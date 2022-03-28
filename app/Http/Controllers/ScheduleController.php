<?php

namespace App\Http\Controllers;

use App\Models\Schedules;
use App\Models\Teachers;
use App\Models\Students;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedules::all();
        return view('schedules.index', [
            'schedules' => $schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all();
        $teachers = Teachers::all();
        return view('schedules.form', [
            'students' => $students,
            'teachers' => $teachers
        ]);
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
            'teacher_id' => 'required',
            'student_id' => 'required',
            'date_time_schedule' => 'required'
        ]);

        Schedules::create([
            'teacher_id' => $request->teacher_id,
            'student_id' => $request->student_id,
            'date_time_schedule' => $request->date_time_schedule
        ]);

        return redirect('/schedules');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $schedule = Schedules::find($id);
        $students = Students::all();
        $teachers = Teachers::all();
        return view('schedules.form', [
            'teachers' => $teachers,
            'students' => $students,
            'schedule' => $schedule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $schedule = Schedules::find($id);
        $schedule->date_time_schedule = date('Y-m-d\TH:i:s', strtotime($schedule->date_time_schedule));
        $students = Students::all();
        $teachers = Teachers::all();

        return view('schedules.form', [
            'teachers' => $teachers,
            'students' => $students,
            'schedule' => $schedule
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'student_id' => 'required',
            'date_time_schedule' => 'required'
        ]);

        $schedule = Schedules::find($id);
        $schedule->student_id = $request->student_id;
        $schedule->teacher_id = $request->teacher_id;
        $schedule->date_time_schedule = date('Y-m-d H:i:s', strtotime($request->date_time_schedule));
        $schedule->save();

        return redirect('/schedules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $schedule = Schedules::find($id);
        $schedule->delete();
        return redirect('/schedules');
    }

    public function search(Request $request){
        $schedules = Schedules::where('teacher_id', '=', "%{$request->search}%")->orWhere('id', '=', $request->search)->get();
        return view('schedules.index', [
            'schedules' => $schedules
        ]);
    }
}
