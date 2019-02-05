<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class PlaylistsController extends Controller
{
  public function index($playlistId = null)
  {
    $playlist = DB::table('playlists')->get();

    if ($playlistId){
        $tracks = DB::table('tracks')
        ->join('playlist_track', 'tracks.trackId', '=', 'playlist_track.TrackId')
        ->where('PlaylistId', '=', $playlistId)
      ->get();
    }
    else{
        $tracks = [];
    }

    return view('playlists.index',[
      'playlists' => $playlist,
      'tracks' => $tracks
    ]);
  }

    public function create(){
        return view('playlists.create',[

        ]);
    }
    public function store(Request $request){
        //validate name
        $input = $request->all();
        // dd($input);
        $validation = Validator::make($input, [
            'name' => 'required|min:5|unique:playlists,Name'
        ]);

        //if validation fails, redirect back to for w/ error message
            if($validation->fails()){
                return redirect('/playlists/new')
                ->withInput()
                ->withErrors($validation);
            }
        //otherwise insert playlist into database, redirect to /playlists
        DB::table('playlists')->insert([
            'Name' => $request->name
        ]);
        return redirect('/playlists');
    }
  }
  

