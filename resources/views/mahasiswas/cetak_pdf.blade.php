<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membuat Laporan K</title>
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>

    
    <div class="container mt-2">
        <center>
            <h5>JURUSAN TEKNOLOGI INFORMASI POLITEKNIK NEGERI MALANG</h5>
            <h4>KARTU HASIL STUDI (KHS)</h4>
        </center>

        <div class="row justify-content-center text-center align-items-center">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Mahasiswa->mataKuliah as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_matkul }}</td>
                    <td>{{ $data->sks }}</td>
                    <td>{{ $data->semester }}</td>
                    <td>{{ $data->pivot->nilai }}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>
  

</div>
</body>
</html>