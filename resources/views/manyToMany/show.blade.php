<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            color:white;
        }
           body{
            display: flex;
            justify-content: center;
            background: #1b0722;
            font-size:27px;
            color:white;
        }

    </style>
</head>
<body>
    <table border=5 cellspacing=5 cellpadding=5>
        <tr>
            <td>SingerName</td>
            <td>{{ $singer->name }}</td>
        </tr>
        <tr>
            <td>TottalSongs</td>
            <td>{{ implode(', ', Arr::pluck($singer->songs,'title')) }}</td>
        </tr>
    </table>
</body>
</html>
