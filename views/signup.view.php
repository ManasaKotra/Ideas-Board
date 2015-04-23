	
    <!-- <div class="container"> -->
		<!-- <h3 class="masthead-brand" style="margin-left:33%;margin-top:70px;" >IDEAS BOARD</h3> -->
      <form class="form-signin" action="" method="POST" >
        <h2 class="form-signin-heading">SignUp</h2><br>
        <label for="email" class="sr-only">Email address</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="username" class="sr-only">Username</label>
        <input type="username" name="username" id="username" class="form-control" placeholder="Username" required >
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <label for="inputcPassword" class="sr-only">Confirm Password</label>
        <input type="password" id="inputcPassword" class="form-control" onkeyup="match();" placeholder="Confirm Password" required><span id="confirmMessage" class="confirmMessage"></span>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block"  type="submit">Sign up</button>

    </div> <!-- /container -->
<script>
  function match(){
  var pwd1 =document.getElementById("password");
   var pwd2 =document.getElementById("inputcPassword");
   var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#99CCFF";
    var badColor = "#FF8484";
  if ( pwd1.value == pwd2.value)
  {
    //alert("singup");
      pwd2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
  }
  else{
  //alert("password dont match");
        pwd2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
  }
  }
  </script>