@extends('frontend.layouts.master')
@section('css')
<style type="text/css">
 
        #login .container #login-row #login-column #login-box {
                margin-top: 40px;
                max-width: 600px;
              
                border: 1px solid #9C9C9C;
                background-color: #EAEAEA;
                margin-bottom: 40px;
      }

      #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
      }

      #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
      }

  </style>
@endsection
@section('content')
<!-- End Header -->
<div id="main-content-area" class="padtop80 padbot15 my2">
      
       <div id="login" style="background-color:white;">
        <div class="container" >
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12" >
                         <form id="login-form" class="form" action="{{route('customer.signup.store')}}" method="post">
                               
                               @csrf

                            <h3 class="text-center text-info">  Signup</h3>
                             <div class="form-group">
                                <label  class="text-info">Full Name:</label><br>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Please Enter Your Fullname" required>
                                 <font style="color:red">
                                 {{($errors->has('name'))?($errors->first('name')):' '}}

                                 </font>
                            </div>
                            
                            <div class="form-group">
                                <label  class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Please Enter Your Valid Email Address" required>
                                 <font style="color:red">
                                 {{($errors->has('email'))?($errors->first('email')):' '}}

                                 </font>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Mobile No:</label><br>
                                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Please Enter Your Phone Number" >
                                 <font style="color:red">
                                 {{($errors->has('mobile'))?($errors->first('mobile')):' '}}

                                 </font>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Please Enter Your Password" required>
                                 <font style="color:red">
                                 {{($errors->has('password'))?($errors->first('password')):' '}}

                                 </font>
                            </div>

                             <div class="form-group">
                                <label  class="text-info"> Confirm Password:</label><br>
                                <input type="password" name="confirmation_password" id="confirmation_password" class="form-control" placeholder=" Please Enter Your Confirm Password" required>
                                 <font style="color:red">
                                 {{($errors->has('confirmation_password'))?($errors->first('confirmation_password')):' '}}

                                 </font>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Signup" style="background-color:#e35614">
                                <i class="fa fa-user" ></i> Have you account ? <a href="{{route('customer.login')}}"><span style="font-weight : bold">Login here</span></a>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>
	
@endsection