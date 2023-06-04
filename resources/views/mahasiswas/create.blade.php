@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">

 <div class="row justify-content-center align-items-center">
 <div class="card" style="width: 24rem;">
 <div class="card-header">
 Tambah Mahasiswa
 </div>
 <div class="card-body">
 @if ($errors->any())
 <div class="alert alert-danger">
 <strong>Whoops!</strong> There were some problems with your i
nput.<br><br>
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
 @endif
 <form method="post" action="{{ route('mahasiswa.store') }}" id="myFo
rm" enctype="multipart/form-data">
 @csrf
 <div class="form-group">
 <label for="nim">Nim</label><br>
 <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim" >
 </div>
 
 <div class="form-group">
 <label for="nama">Nama</label><br>
 <input type="nama" name="nama" class="form-control" id="nama" aria-describedby="nama" >
 </div>

 <div class="form-group">
    <label for="image">Image</label><br>
    <input type="file" class="form-control" aria-describedby="image" name="image">
 </div>


 <div class="form-group">
 <label for="kelas">Kelas</label><br>
<select name="kelas" class="form-control">
    @foreach($kelas as $Kelas){
        <option value="{{ $Kelas->id }}" ">{{ $Kelas->nama_kelas }}</option>
     }
     @endforeach
</select>
 </div>
 
 <div class="form-group">
 <label for="jurusan">Jurusan</label><br>
 <input type="jurusan" name="jurusan" class="form-control" id="jurusan" aria-describedby="jurusan" >
 </div>
 
 <div class="form-group">
 <label for="no_handphone">No_Handphone</label><br>
 <input type="no_handphone" name="no_handphone" class="form-control" id="no_handphone" aria-describedby="no_handphone" >
 </div>

 <div class="form-group">
    <label for="email">Email</label><br>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" >
</div>

<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label><br>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" aria-describedby="tanggal_lahir" class="form-control">
</div>

 <button type="submit" class="btn btn-primary">Submit</button>
 </form>
 </div>
 </div>
 </div>
 </div>
@endsection