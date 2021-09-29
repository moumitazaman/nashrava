<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    
           #login .container #login-row #login-column #login-box {
              margin-top: 100px;
              max-width: 600px;
              height: 320px;
              border: 1px solid #9C9C9C;
              background-color: #f7dae9;
            }
            #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
            }
            #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
            }
</style>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body style="background-color: #4f0d7a;">
 <div id="login">
        <h3 class="text-center text-white pt-5" ><strong style="color:deeppink;">Ecommerce Site</strong></h3>
        <div class="container" >
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('login') }}" method="post">
                            @csrf
                            <h3 class="text-center text-info" >Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info" ><h5>Username:</h5></label><br>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info"><h5>Password:</h5></label><br>
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                           <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login"> 
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
