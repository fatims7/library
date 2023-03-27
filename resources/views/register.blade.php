<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Digital Library - Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center register">
            <div class="col-md-4">
    
                <form action="" method="post">
                    @csrf
                    <h1 class="my-3">Form Register User</h1>
        
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="floatingPoint" required="">
                        <label for="floatingInput">Name</label>
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="floatingPoint" required="">
                        <label for="floatingInput">Email</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="floatingPoint" required="">
                        <label for="floatingInput">Username</label>
                    </div>
        
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingInput" placeholder="floatingPoint" placeholder="floatingPoint" required="">
                        <label for="floatingInput">Password</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" name="phone" class="form-control" id="floatingInput" placeholder="floatingPoint" required="">
                        <label for="floatingInput">Phone</label>
                    </div>
                    
                    <button type="submit" class="w-100 btn btn-lg btn-primary mt-3">Register</button>
                </form>
                
                <p class="text-center mt-4">Sudah punya akun? <a href="login" class="login">Login</a></p>
            </div>
        </div>
    </div>
           

        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>





