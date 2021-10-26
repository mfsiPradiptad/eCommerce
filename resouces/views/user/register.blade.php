<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Sign Up</title>
    <style>
* {box-sizing: border-box}

.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
}

input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none;
}

input:hover,
.btn:hover {
  opacity: 1;
}


input[type=submit] {
  background-color: #04AA6D;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Two-column layout */
.col {

  width: 100%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

/* text inside the vertical line */
.inner {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}

/* bottom container */
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
}
    </style>
    <script>

        function validator(){
               if($('#username').val().length <8){
                   alert("Minimum 8 character.");
                   return false;
               }
               if($('#password').val().length <8){
                   alert("Password should be Minimum 8 character.");
                   return false;
               }
               if($('#cPassword').val().length <8){
                   alert("confirm Password should be Minimum 8 character.");
                   return false;
               }
               var pass =$('#password').val();
               var conPass =$('#cPassword').val()
               if(pass !== conPass){
                    alert("Password and confirm password doesn't match");
                   return false;
               }
               $('#form').submit();

            }
            @php
                if($msg){
                    @endphp
                    alert('@php echo $msg; @endphp');
                    @php
                }
            @endphp

    </script>
</head>
<body>
    <div class="container">
        <form action="/userRegister" method="post" id="form">
            @csrf
          <div class="row">
            <h2 style="text-align:center">Sign Up</h2>

            <div class="col">
              <input type="text" name="username" placeholder="Username" required minlength="8" id="username">
              <input type="email" name="email" placeholder="email" required minlength="8" id="email">
              <input type="password" name="password" placeholder="Password" required minlength="8" id="password">
              <input type="password" name="cPassword" placeholder="Confirm" required minlength="8" id="cPassword">

              <input type="hidden" name="role" value="7">
              <input type="button" class="btn btn-success" onclick="validator();" value="Register">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          </div>
        </form>
      </div>

      <div class="bottom-container">
        <div class="row">
          <div class="col">
            <a href="/login" style="color:white" class="btn">login</a>
          </div>

        </div>
      </div>
</body>
</html>
