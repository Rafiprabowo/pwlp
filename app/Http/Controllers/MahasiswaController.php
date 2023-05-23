<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('nama')){
            $nama = $request->input('nama');
            $mahasiswas = Mahasiswa::where('nama','LIKE','%'.$nama.'%')->paginate(5);
            return view('mahasiswas.index',['mahasiswas'=>$mahasiswas]);
        }else{
        // $mahasiswas = Mahasiswa::all();
        $mahasiswas = Mahasiswa::orderBy('nim','asc')->paginate(5);
        // $mahasiswas = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);
        return view('mahasiswas.index',['mahasiswas'=>$mahasiswas]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nim'=> 'required',
            'nama'=> 'required',
            'kelas' => 'required',
            'jurusan'=> 'required',
            'no_handphone'=> 'required',
            'email'=> 'required',
            'tanggal_lahir'=>'required'
        ]);

        // Mahasiswa::create($request->all());

        $mahasiswa = new Mahasiswa;
        $mahasiswa->fill($request->all());

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        //
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        //

        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.edit',compact('Mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        //

        $request->validate([
            'nim'=> 'required',
            'nama'=> 'required',
            'kelas' => 'required',
            'jurusan'=> 'required',
            'no_handphone'=> 'required',
            'email'=>'required',
            'tanggal_lahir' => 'required'
        ]);

        Mahasiswa::find($nim)->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        //

        Mahasiswa::find($nim)->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
