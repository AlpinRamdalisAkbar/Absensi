<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use App\Models\Absen;
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
        $students = student::latest()->paginate(5); //
        return view('students.index', compact('students'))
           -> with ('i', (request()->input('page', 1) - 1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        $absens = Absen::all();
        return view('students.create',compact('rombels', 'rayons', 'absens'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);//

        Student::create($request->all());

        return redirect()->route('students.index')
                        ->with('success','berhasil menyimpan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $rombels = Rombel::all();
        $rayons = Rayon::all();
        $absens = Absen::all();
        return view('students.edit',compact('student','rombels', 'rayons', 'absens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request -> validate ([
            'nis' => 'required',
            'nama' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);//

        $student->update($request->all());

        return redirect()->route('students.index')
                        ->with('success','berhasil menyimpan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
       $student->delete();
       
        return redirect()->route('students.index')
                         ->with('success','berhasil menghapus !');
    }
}
