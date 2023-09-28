<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // ($id)
        // $data = Siswa::find($id);
        // return view('admin.createprojects', compact('data'));

        // return view('admin.createprojects');
    }
    public function add($id) {
        $data = Siswa::find($id);
        return view('admin.createprojects', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Message
        $message=[
            'required'      => 'Data :attribute tidak boleh kosong!',
            'min'           => 'Data :attribute terlalu pendek,  minimal :min karakter',
            'max'           => 'Data :atrribute terlalu panjang, maksimal :max karakter',
            'mimes'         => 'Data :attribute salah, harus ber-ekstensi: jpg, jpeg, atau png'
        ];

        $validatedData = $request->validate([
            'project_name'  => 'required|min:3|max:30',
            'project_date'  => 'required',
            'photo'         => 'required|mimes:jpg,jpeg,png'
        ], $message);

        $validatedData['siswa_id'] = $request->siswa_id;

        $validatedData['photo'] = $request->file('photo')->store('project');

        Project::create($validatedData);

        return redirect()->route('projects.index')->with('success', 'Data Created Successfully!');

        // $file = $request->file('photo');
        // $fileName = $request->project_name . '.' . $file->getClientOriginalName();

        // $image = $file->storeAs('photo', $fileName, 'public');

        // Siswa::create([
        //     'project_name'  => $request->project_name,
        //     'project_date'  => $request->project_date,
        //     'siswa_id'      => $request->siswa_id,
        //     'photo'         => $image,
        // ]);
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
        $projects = Project::find($id);
        return view('admin.editprojects', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projects = Project::find($id);

        // Message
        $message=[
            'required'      => 'Data :attribute tidak boleh kosong!',
            'min'           => 'Data :attribute terlalu pendek,  minimal :min karakter',
            'max'           => 'Data :atrribute terlalu panjang, maksimal :max karakter',
            'mimes'         => 'Data :attribute salah, harus ber-ekstensi: jpg, jpeg, atau png'
        ];

        // Validate
        $validatedData = $request->validate([
            'project_name'  => 'required|min:3|max:30',
            'project_date'  => 'required',
            'photo'         => 'mimes:jpg,jpeg,png'
        ], $message);


        if($request->file('photo')) {
            if($request->oldProject) {
                Storage::delete($request->oldProject);
            }
            $validatedData['photo'] = $request->file('photo')->store('project');
        }

        $projects->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Data Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Project::find($id);

        if($data->photo) {
            Storage::delete($data->photo);
        }

        $data->delete();

        return redirect()->route('projects.index')->with('success', 'Data Deleted Successfully!');
    }
}
