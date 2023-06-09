@extends('mahasiswas.layout');
@section('content')
<div class="container">
    <form action="/articles/{{ $article->id }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="title" >Judul</label>
            <input type="text" class="form-control" required="required" name="title" value="{{ $article->title }}"><br>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" required="required" name="content" value="{{ $article->content }}"><br>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" required="required" name="image" value="{{ $article->image }}" style="width: 150px"> <br>
            <img src="{{ asset('storage/'.$article->featured_image) }}" alt="">
        </div>

        <button type="submit" class="btn btn-primary float-right">Ubah Data</button>
    </form>
</div>
@endsection