<!DOCTYPE html>
<html>
    <head>
          <title>Sign up</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
          </script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
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
            <form action="{{url('login')}}" method="POST" >
            
            {{ csrf_field() }}

                <h1>LOGIN</h1>
         
                <p>Email ID:</p>

                <p><input type="text" name="email" ></p>
         
                <p>PASSWORD :</p>

                <p><input type="password" name="password" ></p>     

                <div>
                    <p>
  
                    <input type="submit" class="btn btn-success"  value="Login">
                    
                    </p>
                   
                    Not a registered user?
                <a  href="{{url('signup')}}">signup</a>
            </form>
        </center>
        
    </body>
</html>