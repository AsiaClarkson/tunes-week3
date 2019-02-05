@extends('layout')
@section('title', 'Genres')
@section('main')
    <table class='table'>
        <tr>
            <th>Genres</th>
        </tr>
        @foreach($genres as $genre)
        <tr>
            <td>
            <a href='tracks?genre={{urlencode($genre->Name)}}'>{{$genre->Name}}</a>
            </td>
            <td>
            <a href='/genres/{{$genre->GenreId}}/edit'>Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection