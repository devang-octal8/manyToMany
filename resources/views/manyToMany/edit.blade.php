<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingersForm</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            background: #1b0722;
            font-size:27px;
            color:white;

        }
        lable{
            display: block;
        }
        form{
            padding:15px;
            background:#8c42b1;
            border-radius:5px;
            margin-top:10%;
        }
        select{
            padding:5px 17px;
        }
        input{
            padding:7px;
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
    <form action="{{ route('singers.update',$singer->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <h3>Singers</h3>
        <div>
            <lable>Title</lable>
            <input type="text" name="name" value="{{ $singer->name }} " placeholder="Enter the name of singer">
        </div>
        <div>
            <label class="white" style="display:block">Images</label>
            <input class="form-control form-control-lg" type="file" name="profile" id="formFileLg" >
          </div>
         <div>
            {{-- {{dd($singer->id)}} --}}
            <lable>Songs</lable>
            <select name="song[]" id="" multiple>
                {{-- {{implode(',', Arr::pluck(($singer->songs),'id'))}} --}}
                @foreach($songs as $song)

                        <option value="{{$song->id}}" @if(in_array($song->id, Arr::pluck(($singer->songs),'id'))) selected @endif> {{ $song->title }} </option>

                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
