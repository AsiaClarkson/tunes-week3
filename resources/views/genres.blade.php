<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Genres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>

<body>
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
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>