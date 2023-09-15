<?php

namespace App\Http\Controllers;
use App\Models\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    // Read
    public function index () {
        $siswas = Siswa::all();
        return view('admin.mastersiswa', compact('siswas'));
    }

    // Create
    public function create () {
        return view('admin.createsiswa');
    }

    // Store Create Data
    public function store (Request $request) {

        // Custom Message
        $message=[
            'required'  => 'Data :attribute tidak boleh kosong!',
            'min'       => 'Data :attribute terlalu pendek, minimal :min karakter',
            'max'       => 'Data :attribute terlalu panjang, maksimal :max karakter',
            // 'max'       => 'Too many: your attribute, maximal: max character',
            'mimes'     => 'Data :attribute salah, harus ber-ekstensi: jpg, jpeg, atau png'
        ];

        // Validation
        $validatedData = $request->validate([
            'name'      => 'required|min:3|max:100',
            'about'     => 'required|min:5|max:255',
            'photo'     => 'required|mimes:jpg,jpeg,png'
        ], $message);

        $validatedData['photo'] = $request->file('photo')->store('photos');

        // backup
        // $data['photo'] = $request->file('photo')->getClientOriginalName();
        // if ($request->hasFile('photo')) {
        //     $imagePath = $request->file('photo')->move('siswa_images/', $request->file('photo')->getClientOriginalName());
        //     $data['photo'] = $imagePath;
        // }

        Siswa::create($validatedData);

        toastr()->success('Data Siswa Succesfully Created!', 'Success', ['timeOut' => 5000]);

        return redirect()->route('mastersiswa');
        //->with('success', 'Data Siswa Succesfully Created!');
    }

    // Edit
    public function edit($id) {
        $siswa = Siswa::find($id);
        return view('admin.editsiswa', compact('siswa'));
    }

    // Store Update Edit Data
    public function update (Request $request, $id) {

        // Custom Message
        $message=[
            'required'  => 'Data :attribute tidak boleh kosong!',
            'min'       => 'Data :attribute terlalu pendek, minimal :min karakter',
            'max'       => 'Data :attribute terlalu panjang, maksimal :max karakter',
            'mimes'     => 'Data :attribute salah, harus ber-ekstensi: jpg, jpeg, atau png'
            // 'required'  => 'Please fill: your attribute',
            // 'min'       => 'Too little: your attribute, minimal: min character',
            // 'max'       => 'Too many: your attribute, maximal: max character',
            // 'mimes'     => 'file: wrong attribute, must be jpg, jpeg, or png'
        ];

        // Validation Request Form
        $validatedData = $request->validate([
            'name'      => 'required|min:3|max:100',
            'about'     => 'required|min:5',
            'photo'     => '|mimes:jpg,jpeg,png'
        ], $message);

        if($request->file('photo')) {
            if($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('photos');
        }

        Siswa::where('id', $request->id)
                ->update($validatedData);

        toastr()->success('Data Siswa Succesfully Updated!', 'Success', ['timeOut' => 5000]);

        return redirect()->route('mastersiswa');

        // $siswa = Siswa::find($id);
        // $requestAll = $request->all();

        // if($request->hasFile('photo')) {
        //     $imagePath = $request->file('photo')->move('siswa_images/', $request->file('photo')->getClientOriginalName());
        //     $requestAll['photo'] = $imagePath;

        //     if ($siswa->photo){
        //         Storage::disk('public/siswa_images')->delete($siswa->photo);
        //     }
        // }

        // $siswa->update($requestAll);
        // return redirect()->route('mastersiswa');
    }

    // Delete
    public function destroy ($id) {
        $siswa = Siswa::find($id);

        if($siswa->photo) {
            Storage::delete($siswa->photo);
        }

        $siswa->delete();

        // Siswa::destroy($id);

        toastr()->success('Data Siswa Succesfully Deleted!', 'Success');

        return redirect()->route('mastersiswa');
    }

    // public function index(){
    //     return view('admin.mastersiswa');
    // }
    // public function create(){
    //     return view('admin.createsiswa');
    // }
    // public function edit(){
    //     return view('admin.editsiswa');
    // }
}
