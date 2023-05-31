<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login-Form</title>
</head>

<body>
<div class="container w-25 mt-5">

    <form action="{{ route('author.register') }}" method="post">
        @csrf
        <h3 class="text-center text-primary mb-5">Register Form</h3>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter the name" id="exampleInputPassword1">
        </div>
        <span class="text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </span>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter the email" aria-describedby="emailHelp">
        </div>
        <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter the password" id="exampleInputPassword1">
        </div>
        <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Select Role</label>
            <select class="form-select" name="role" aria-label="Default select example">
                <option selected>Select role</option>

                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="employee">Employee</option>

            </select>
        </div>
        <span class="text-danger">
            @error('role')
                {{ $message }}
            @enderror
        </span>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</div>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
