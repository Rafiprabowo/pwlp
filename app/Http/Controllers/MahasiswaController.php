<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\MahasiswaMataKuliah;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class MahasiswaController extends Controller
{

    
    public function nilai($nim)
    {

        $Mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswas.nilai',compact('Mahasiswa'));

    }

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
        $kelas_id = Kelas::class;
        $mahasiswas = Mahasiswa::orderBy('nim','asc')->paginate(5);
        // $mahasiswas = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);
        return view('mahasiswas.index',compact('mahasiswas','kelas_id'));
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
        $kelas = Kelas::all();

            return view('mahasiswas.create', ['kelas'=> $kelas]);
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
            'jurusan'=> 'required',
            'no_handphone'=> 'required',
            'email'=> 'required',
            'tanggal_lahir'=>'required'
        ]);

        // Mahasiswa::create($request->all());

        $mahasiswa = new Mahasiswa;

        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_handphone = $request->get('no_handphone');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
    

        $kelas = new Kelas;

        $kelas->id = $request->get('kelas');


        $mahasiswa->kelas()->associate($kelas);
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
        $kelas = Kelas::all();
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.edit',compact('Mahasiswa', 'kelas'));
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
            'jurusan'=> 'required',
            'no_handphone'=> 'required',
            'email'=>'required',
            'tanggal_lahir' => 'required'
        ]);

        $mahasiswa = Mahasiswa::find($nim);
        
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_handphone = $request->get('no_handphone');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');

        $kelas = new Kelas;

        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);

        $mahasiswa->update();

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
