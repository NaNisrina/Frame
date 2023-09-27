<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Siswa::all('id','name');
        return view('admin.masterprojects', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = Siswa::find($id);
        return view('admin.createprojects');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name'  => 'required|string|min:3',
            'project_date'  => 'required',
            'photo'         => 'required|mimes:jpg,jpeg,png'
        ]);

        $file = $request->file('photo');
        $fileName = $request->project_name . '.' . $file->getClientOriginalName();

        $image = $file->storeAs('photo', $fileName, 'public');

        Siswa::create([
            'project_name'  => $request->project_name,
            'project_date'  => $request->project_date,
            'siswa_id'      => $request->siswa_id,
            'photo'         => $image,
        ]);

        return redirect()->route('projects.index')->with('message', 'Data Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas = Siswa::find($id)->project()->get();
        return view('admin.showprojects', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
