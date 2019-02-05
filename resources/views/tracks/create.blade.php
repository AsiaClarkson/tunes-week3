@extends('layout')

@section('title', 'Add a Track')

@section('main')
<div class="row">
    <div class="col">
        <form action="/tracks" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
                <small class="text-danger">{{$errors->first('name')}}</small>
                <br>
                <label for="name">Album</label>
                <select name="album" class="form-control">
                    @foreach($albums as $album)
                    <option value="{{$album->AlbumId}}" >
                        {{$album->Title}}
                    </option>
                    @endforeach
                </select>
                <small class="text-danger">{{$errors->first('album')}}</small>
                <br>
                <label for="name">Media Type</label>
                <select name="mediaType" class="form-control">
                    @foreach($media_types as $media_type)
                    <option value="{{$media_type->MediaTypeId}}" >
                        {{$media_type->Name}}
                    </option>
                    @endforeach
                </select>
                <small class="text-danger">{{$errors->first('mediaType')}}</small>
                <br>
                <label for="name">Genre</label>
                <select name="genre" class="form-control">
                    @foreach($genres as $genre)
                    <option value="{{$genre->GenreId}}">
                        {{$genre->Name}}
                    </option>
                    @endforeach
                </select>
                <small class="text-danger">{{$errors->first('genre')}}</small>
                <br>
                <label for="Composer">Composer</label>
                <input type="text" id="composer" name="composer" class="form-control" value="{{old('composer')}}">
                <small class="text-danger">{{$errors->first('composer')}}</small>
                <br>
                <label for="milliseconds">Milliseconds</label>
                <input type="number" name="milliseconds">
                <small class="text-danger">{{$errors->first('milliseconds')}}</small>
                <br>
                <label for="bytes">Bytes</label>
                <input type="number" name="bytes">
                <small class="text-danger">{{$errors->first('bytes')}}</small>
                <br>
                <label for="unitPrice">Unit Price</label>
                <input type="number" name="unitPrice">
                <small class="text-danger">{{$errors->first('unitPrice')}}</small>
            </div>
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </form>
    </div>
</div>
@endsection
