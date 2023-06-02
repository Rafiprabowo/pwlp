@extends('mahasiswas.layout');
@section('content')

<div class="container mt-2 ">
    
    <h2 class="mb-4 text-center">Jurusan Teknologi Informasi - Politeknik Negeri Malang</h2>
    <h2 class="mb-4 text-center">KARTU HASIL STUDI (KHS)</h2>
    
    <p class=""><b>Nama</b> : {{ $Mahasiswa->nama }}</p>
    <p class=""><b>NIM</b>  : {{ $Mahasiswa->nim }}</p>
    <p class=""><b>Kelas</b> : {{ $Mahasiswa->kelas->nama_kelas }}</p>
    <div class="row justify-content-center align-items-center">
        
        <div class="card " style="width:100%" >
            <div class="card-header bg-dark text-white">
                Nilai Mahasiswa
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Nilai</th>
                    </tr>
                
                
                  
                        @foreach($Mahasiswa->mataKuliah as $matkul)
                        
                            <tr>
                            <td>{{ $matkul->nama_matkul }}</td>
                            <td>{{ $matkul->sks }}</td>
                            <td>{{ $matkul->semester }}</td>
                            <td>{{ $matkul->pivot->nilai }}</td>
                        </tr>
                        
                        @endforeach
                    </table>
            </div>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-success mt-3">Kembali</a>
        </div>
    </div>

  
</div>






@endsection