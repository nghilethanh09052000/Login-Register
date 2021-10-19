<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="register.css">
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
               <div class="user signupBx">
                  <div class="formBx">
                     <form action="signup.php" method="post">
                        <h2>Create an account</h2>
                        <?php if (isset($_GET['error'])) { ?>
                           <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                           <p class="success"><?php echo $_GET['success']; ?><p>
                           <?php } ?> 
                        <input type="text" name="email" placeholder="Username" >
                        <input type="password" name="password" placeholder="Create Password" >
                        <input type="password" placeholder="Confirm Password" name="re_password">

                        <!-- <p>Your otp will automatically send in </p> -->
                        
                        <input type="text" placeholder="OTP" name="#" >
                        <input type="submit" value="Sign Up">

                        <p class="signup">Already have an account ?
                           <a href="login.php" onclick="toggleForm()">Sign in</a>
                        </p>
                     </form>
                  </div>
                  <div class="imgBx">
                     <img style=" width:380px; height: 400px;" src="HinhAnh/2.jpg">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script>
         function toggleForm(){
         	section=document.querySelector('section');
         	container=document.querySelector('.container');
         	section.classList.toggle('active');
         	container.classList.toggle('active');
         }

         
      </script>
   </body>
</html>