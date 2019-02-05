@extends('layout')
@section('title', 'Genres')
@section('main')
<form action="/genres" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') != null ? old('name'): $genre->Name}}">
        <input type="hidden" name="genreId" value="{{$genre->GenreId}}" />
        <small class="text-danger">{{$errors->first('name')}}</small>
      </div>
      <button type="submit" class="btn btn-primary">
        Save
      </button>
    </form>
    @endsection