@extends('mahasiswas.layout')
@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left mt-2">
 <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
 </div>
 <div class="float-left my-2">
    <form action="{{ route('mahasiswa.index') }}" method="GET" class="d-flex">
        <input type="text" class="form-control" name="nama" placeholder="Cari Berdasarkan Nama" >
        <button type="submit" class="btn btn-dark">Search</button>
    </form>
</div>
 <div class="float-right my-2">
 <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
 </div>
 </div>
 </div>

 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
 @endif

 <table class="table table-bordered">
 <tr>
 <th>Nim</th>
 <th>Nama</th>
 <th>Foto</th>
 <th>Kelas</th>
 <th>Jurusan</th>
 <th>No_Handphone</th>
 <th>Email</th>
 <th>Tanggal Lahir</th>
 <th width="280px">Action</th>
 </tr>
 @foreach ($mahasiswas as $Mahasiswa)
 <tr>

 <td>{{ $Mahasiswa->nim }}</td>
 <td>{{ $Mahasiswa->nama }}</td>
 <td><img src="{{asset('storage/'.$Mahasiswa->image ) }}" alt="" width="100px"></td>
 <td>{{ $Mahasiswa->Kelas->nama_kelas }}</td>
 <td>{{ $Mahasiswa->jurusan }}</td>
 <td>{{ $Mahasiswa->no_handphone }}</td>
 <td>{{ $Mahasiswa->email }} </td>
 <td>{{ $Mahasiswa->tanggal_lahir }}</td>
 <td>
 <form action="{{ route('mahasiswa.destroy', $Mahasiswa->nim) }}" method="POST">

 <a class="btn btn-info" href="{{ route('mahasiswa.show',$Mahasiswa->nim) }}">Show</a>
 <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$Mahasiswa->nim) }}">Edit</a>
 <a class="btn btn-warning" href="/mahasiswa/nilai/{{ $Mahasiswa->nim }}">Nilai</a>

 @csrf
 @method('DELETE')
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>
 </td>
 </tr>
 @endforeach
 </table>
{{ $mahasiswas->links() }}



@endsection