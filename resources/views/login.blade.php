<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Digital Library - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif

                @if(session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
                @endif
    
                <form action="" method="post">
                    @csrf
                    <h1 class="my-3">Digital Library</h1>
        
                    <div class="form-group">
                        <label for="floatingInput">Username</label>
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username" required>
                    </div>
        
                    <div class="form-group">
                        <label for="floatingInput">Password</label>
                        <input type="password" name="password" class="form-control" id="floatingInput" placeholder="password" required>
                    </div>
        
                    <button type="submit" class="w-100 btn btn-lg btn-success">Login</button>
                </form>
                
                <p class="text-center mt-5">Belum punya akun? <a href="register" class="register">Register</a></p>
            </div>
        </div>
    </div>
           

        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>





