<!DOCTYPE html>
<html>
    <head>
          <title>Sign up</title>
          <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script type="text/javascript">
            function val()
            { 
                if(frm.username.value == "")
                {
                    alert("Enter the username");
                    frm.username.focus();
                    return false;
                }

                if(frm.email.value == "")
                {
                    alert("Enter the email");
                    frm.email.focus();
                    return false;
                }
                if(frm.password.value == "")
                {
                    alert("Enter the password");
                    frm.password.focus();
                    return false;
                }
                if(frm.confirm_password.value == "")
                {
                    alert("Enter the Confirmation password");
                    frm.confirm_password.focus();
                    return false;
                }
                if(frm.confirm_password.value !== frm.password.value)
                {
                    alert("Password does not match");
                    frm.password.focus();
                    return false;
                }
                return true;
            }
         </script>
    </head>
<body>
        <center>
              @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
        
            <form name="frm" action="{{url('signup')}}" method="POST">
            {{ csrf_field() }}

                <h1>SIGN UP</h1>

                <p>USER NAME :</p>

                <p><input type="text" name="username" ></p>
                
                <p>EMAIL</p>

                <p><input type="text" name="email" ></p>
        
                <p>PASSWORD</p>

                <p><input type="password" name="password"></p>
        
                <p>CONFIRM PASSWORD</p>

                <p><input type="password" name="confirm_password"></p>     

                <p>USER TYPE</p>

                <p>
                <select name="usertype">
                <option value="admin">ADMIN</option>
                <option value="doctor">DOCTOR</option>
                </select>
                </p>

                <div>
                <p>
                    <input type="submit" class="btn btn-success"  value="SIGN IN" onclick='return val()'>

                    <input type="reset" class="btn btn-warning"  value="RESET" >
                    
                    <a class=" btn btn-info" href="{{ url('login') }}">LOGIN</a>
                    </p>
                </div>


                </div>
            </form>  
        </center>
    </body>
</html>