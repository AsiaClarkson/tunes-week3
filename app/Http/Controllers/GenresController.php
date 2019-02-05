<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
  public function index(Request $request)
  {
    $query = DB::table('genres');
    $genres = $query->get();

    return view('genres', [
      'genres' => $genres
           ]);
  }
  public function edit($genreId=null)
  {
    $query = DB::table('genres')->where('GenreId', $genreId);
    $editedGenre = $query->first();
    return view('genres/edit', [
      'genre' => $editedGenre
    ]);

  }

  public function store(Request $request){
    $input = $request->all();
    $genreId = $request->input('genreId');
    $name = $request->input('name');
    $validation = Validator::make($input, [
      'name' => 'required|min:3|unique:genres,Name'
    ]);
    if($validation->fails()){
      return redirect('/genres/'. $genreId . '/edit')
      ->withInput()
      ->withErrors($validation);
  }

//add to database UPDATE
DB::table('genres')
        ->where('GenreId', $genreId)
        ->update(['Name'=>$name]);

        //redirect
        return redirect('/genres');
      }
}
