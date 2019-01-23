<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

    return view('tracks', [
      'tracks' => $tracks
           ]);
  }
}