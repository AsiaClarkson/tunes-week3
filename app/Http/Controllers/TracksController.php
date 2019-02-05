<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller
{
  public function index(Request $request)
  {
    $query = DB::table('tracks')
    ->select('tracks.Name as trackName',
            'artists.Name as artistName',
            'albums.Title as Album',
            'tracks.UnitPrice as Price',
            'genres.Name as genreName'
    )
    ->join('albums', 'albums.AlbumId', '=', 'tracks.AlbumId')
    ->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
    ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId');
    IF ($request->query('genre')){
        $query->where('genreName', '=', $request->query('genre'));
    }
      $tracks = $query->get();
      $genreName = $request->query('genre');

    return view('tracks', [
      'tracks' => $tracks,
      'genreName' => $genreName
           ]);
  }
  public function create(Request $request){
    $query = DB::table('tracks')
    ->select('albums.Title as AlbumTitle',
              'media_types.Name as MediaType',
              'genres.Name as Genre'
  )

  ->join('media_types', 'tracks.MediaTypeId', '=', 'media_types.MediaTypeId')
  ->join('albums', 'albums.AlbumId', '=', 'tracks.AlbumId')
  ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId');

  $query1 = DB::table('albums');
  $query2 = DB::table('media_types');
  $query3 = DB::table('genres');
    
    $tracks = $query->get();
    $albums = $query1->get();
    $media_types = $query2->get();
    $genres = $query3->get();


    return view('tracks.create',[
      'tracks' => $tracks,
      'albums' => $albums,
      'media_types' => $media_types,
      'genres' => $genres
    ]);
}
public function store(Request $request){
  //validate name
  $input = $request->all();
  // dd($input);
  $validation = Validator::make($input, [
      'name' => 'required',
      'album' => 'required',
      'mediaType' => 'required',
      'genre' => 'required',
      'composer' => 'required',
      'milliseconds' => 'required|numeric',
      'bytes' => 'required|numeric',
      'unitPrice' => 'required|numeric'
  ]);

  //if validation fails, redirect back to for w/ error message
      if($validation->fails()){
          return redirect('/tracks/new')
          ->withInput()
          ->withErrors($validation);
      }
  //otherwise insert playlist into database, redirect to /playlists
  DB::table('tracks')
  ->join('media_types', 'tracks.MediaTypeId', '=', 'media_types.MediaTypeId')
  ->join('albums', 'albums.AlbumId', '=', 'tracks.AlbumId')
  ->join('genres', 'genres.GenreId', '=', 'tracks.GenreId')
  ->insert([
      'Name' => $request->name,
      'AlbumId' => $request->album,
      'MediaTypeId' => $request->mediaType,
      'GenreId' => $request->genre,
      'Composer' => $request->composer,
      'Milliseconds' => $request->milliseconds,
      'Bytes' => $request->bytes,
      'UnitPrice' => $request->unitPrice,

  ]);
  return redirect('/tracks');
}
}
