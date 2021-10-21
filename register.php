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
                     <form action="register-check.php" method="post" name="register">
                        <h2>Create an account</h2>

                        <?php if (isset($_GET['error'])) { ?>
                           <p style="text-align: center;color: #F24444; padding-bottom:10px; font-weight:bold" ><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                  

                        <input type="text" name="email" placeholder="Email" >
                        <input type="password" name="password" placeholder="Create Password" >
                        <input type="password" placeholder="Confirm Password" name="re_password">

                      
                        
                        <input type="submit"  value="Sign Up" name="register">
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