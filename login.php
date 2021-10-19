<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="login.css">
      <script src="Angular/angular.min.js"></script>
      <script src="Angular/angular-route.min.js"></script>
      
   </head>
   <body>
      <section>
         <div class="color"></div>
         <div class="color"></div>
         <div class="color"></div>
         <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container">
               <div class="user signinBx" ng-controller="loginCtrl">
                  <div class="imgBx">
                     <img style=" width: 350px; height: 400px;" src="HinhAnh/1.jpg">
                  </div>
                  <div class="formBx">
                     <form action="signin.php" method="post" id="myLogin">
                        <h2>Sign in</h2>
                        <?php if (isset($_GET['error'])) { ?>
                        <p style="text-align: center" class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <input type="text" placeholder="Email" name="email">
                        <input type="password"  placeholder="Password" name="password">
                        <input type="submit" value="Login">
                        <p class="signup">Don't have an account ?
                           <a href="register.php" onclick="toggleForm()">Sign up</a>
                        </p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>