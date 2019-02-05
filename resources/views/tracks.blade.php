@extends('layout')
@section('title', 'Tracks')
@section('main')
    <table class='table'>
    <a href="/tracks/new">Add Track</a>
    <tr><th>{{$genreName}} Songs</th></tr>
        <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Price</th>
        </tr>
        @foreach($tracks as $track)
        <tr>
            <td>
            {{$track->trackName}}
            </td>
            <td>
            {{$track->artistName}}
            </td>
            <td>
            {{$track->Album}}
            </td>
            <td>
            {{$track->Price}}
            </td>
        </tr>
        @endforeach
    </table>
@endsection