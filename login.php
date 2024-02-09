<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="login.css">
</head>
<body>


<div class="container">
  <form action="/action_page.php">
    <div class="row">
      <a href="#" class="close btn"><i class="fa fa-times" aria-hidden="true"></i></a>
    </div>
    <div class="row">
      <div class="col">
       <h2>WELLCOME ! Login here...</h2>
      </div>
      <div class="col">
        <img src="resources/images/Aura 2.png" alt="" class="logo">
      </div>
      
    </div>
    <div class="row">
      <div class="vl">
        <span class="vl-innertext"></span>
      </div>

      <div class="col">
        <a href="#" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Facebook
         </a>
        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
          </i> Google+
        </a>
      </div>

      <div class="col">
        <div class="hide-md-lg">
          <p>OR</p>
        </div>

        <input type="text" name="username" placeholder="Username" id="user-name" required>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" value="Login" onclick="sendCustomerLoginCredentials();">
      </div>
      
    </div>
  </form>

  <div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="customerRegistration.php" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="#" class="btn">Forgot password?</a>
    </div>
  </div>
</div>
</div>
<script src="jsProcesses.js"></script>
<script src="js/bootstrap.bundle.js"></script>

</body>
</html>
