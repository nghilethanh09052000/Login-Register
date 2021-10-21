<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="changePass.css">
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
                     <form action="changePass-check.php" method="post" name="forgotpass">
                        <h2>Please Type Your New Password</h2>
                         <?php if (isset($_GET['error'])) { ?>
                           <p style="text-align: center;color: #F24444; padding-bottom:10px; font-weight:bold" ><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <input type="password" name="password" placeholder="New password">
                        <input type="password" name="re_password" placeholder="Confirm new password">
                        <input type="submit"  value="Confirm">

                     </form>
                  </div>
               </div>
               
            </div>
         </div>
         </section>
     
   </body>
</html>