@extends('layout')

@section('title', 'Profile')

@section('main')
  <p>Your email is {{$user->email}}</p>
@endsection