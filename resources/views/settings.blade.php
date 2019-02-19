@extends('layout')
@section('title', 'Settings')
@section('main')
<h1>Settings</h1>

<form method="post">
    @csrf
    <div class="form-group">

        <input class="form-check-input" style='margin-left: 10px;' type="checkbox" {{ $mode == 'off'? '' : 'checked'}}
            name='mode' id="mode">
        <label class="form-check-label" style='margin-left: 25px;' for="mode" value={{$mode}}>
            Maintenance Mode
        </label><br><br>
        <input type="submit" value="Submit" class="btn btn-primary">
        <h1>{{$mode}}</h1>

    </div>
</form>
@endsection
