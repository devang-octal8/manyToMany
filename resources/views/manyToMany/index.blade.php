<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index of many to many</title>
    {{-- Here is the Bootstrap cdn s'. --}}

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        *{
            color:black;
        }
           body{
            display: flex;
            justify-content: center;
            background-color: rgb(236, 236, 250);
            font-size:27px;
            color:white;
        }
        .container{
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .w-5{
            display: none;
        }
        .paginatio-links{
            width: 500px;
            display: flex;
            justify-content: center;
        }
        table{
            margin-top: 50px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div>
            @if(session('message'))
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert">X</button>
                 {{session()->get('message')}}
                </div>
            @endif
        </div>
        <table cellspacing=5 cellpadding=5 class="table table-info">
            <thead>
            <tr>
                <td collspan='3'>
                    <a href="{{ route('singers.create') }}" class="btn btn-primary text-light">Add_Singers</a>&nbsp;
                    <a href="{{ route('songs.create') }}"  class="btn btn-primary text-light">Add_Songs</a>
                </td>
            </tr>
            <tr>
                <th><b>Name</b></th>
                <th><b>image</b></th>
                <th><b>Roles</b></th>
                <th><b>OPERATIONS</b></th>
            </tr>
            </thead>
            <tbody>
            @foreach($singers as $singer)
            {{-- dd($singers); --}}
            <tr>
                <td>{{ $singer->name }}</td>
                <td><img src="{{ asset('storage/images/'.$singer->image)}}" alt="" width=80 height="80"></td>
                <td>{{ $singer->role }}</td>
                <td>
                    <form action="{{ route('singers.destroy',$singer->id) }}" method="post">
                        <a href="{{ Route('singers.show',$singer->id) }}"  class="btn btn-primary text-light">SHOW</a>&nbsp;
                        <a href="{{ Route('singers.edit',$singer->id) }}" class="btn btn-info text-light">EDIT</a>&nbsp;
                            @csrf
                            @method('DELETE ')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </table>
        </table>
        <div class="pagination-links">
            {{ $singers->links()}}
            {{-- {{ $singers->total()}} --}}
        </div>
        <div>
            <a href="{{ route('author.destroy') }}" class="btn btn-info">Logout</a>
        </div>
    </div>
</body>
</html>




