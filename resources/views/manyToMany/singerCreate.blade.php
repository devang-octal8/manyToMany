<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingersForm</title>
        {{-- Here is the Bootstrap cdn s'. --}}

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{
            display: flex;
            justify-content: center;
            font-size:27px;
            background-color: rgb(236, 236, 250);

        }
        lable{
            display: block;
        }
        form{
            padding:15px;
            background:#2f54f5;
            border-radius:5px;
            margin-top:10%;
        }
        select{
            padding:5px 17px;
        }
        input{
            padding:7px;
        }
        .white{
            color: white;
        }
        h3{
            text-align: center;
        }
        button{
            padding:5px;
            background: pink;
            color: black;
            outline:none;
            border-radius:5px;
        }
    </style>
</head>

<body>
    <form action="{{ route('singer.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h3 class="white center"><b>Singers</b></h3>
        <div>
            <lable class="white">Name</lable>
            <input type="text" name="name" placeholder="Enter the name of singer">
        </div>
        <span class="block text-danger bg-danger">
            @error('name')
            {{$message}}
            @enderror
        </span>
        </div>
        <div>
            <label class="white">Images</label>
            <input class="form-control form-control-lg" type="file" name="profile" id="formFileLg" >
          </div>
        <div>
            <lable class="white">role</lable>
            <input type="text" name="role" placeholder="Enter the name of singer">
        </div>
        <span class="block text-danger bg-danger">
            @error('role')
            {{$message}}
            @enderror
        </span>
         <div>

            <lable class="white">Songs</lable>
            <select name="song[]" class="form-select" id="" multiple>
                <option value="" selected>Select Song</option>
                @foreach($songs as $song)
                <option value="{{$song->id}}">{{$song->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn">Submit</button>
        </div>
    </form>
</body>
</html>

{{-- demo op selects --}}
{{--  --}}
