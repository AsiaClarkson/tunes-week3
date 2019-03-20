@extends('layout')
@section('title', 'Docs')
@section('main')
<h1>We're Making Docs Ova Here!</h1>
<br>
<h2><em>Untitled Document</em><h2>
<div id="docarea">

</div>
<br><br>
<div contenteditable="true" id="docinput" style="background-color: #ececec; padding: 5px;">
  Let's make a document!
</div>

<script type="text/javascript">
// let connection = new WebSocket('ws://localhost:8080');
let connection = new WebSocket('ws://aclarkso-node-websockets.herokuapp.com');

connection.onopen = () => {
    console.log('connected from the frontend');
};

connection.onerror = () => {
    console.log('fail to connect from the frontend');
};

connection.onmessage = (event) => {
    console.log('received message', event.data);
    let h5 = document.createElement('h5');
    h5.innerText = event.data;
    document.querySelector('#docarea').innerText = '';
    document.querySelector('#docarea').append(h5);
};

document.querySelector('#docinput').addEventListener("input", (event) => {
    event.preventDefault();
    let message = document.querySelector('#docinput').innerText;
    connection.send(message);
 
  });

</script>
@endsection