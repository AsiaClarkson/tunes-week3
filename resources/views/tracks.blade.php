<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tracks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>

<body>
    <table class='table'>
    <tr><th></th></tr>
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
</body>

</html>