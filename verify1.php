<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="verify1.css">
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
                     <form action="verify1-check.php" method="post">
                        <h2>Please Type Valid Code</h2>

                        <?php if (isset($_GET['error'])) { ?>
                           <p style="text-align: center;color: #F24444; padding-bottom:10px; font-weight:bold"><?php echo $_GET['error']; ?></p>
                        <?php } ?>


                        

                        <input type="text" name="otp_code" placeholder="Type your code here...">
                        <p style="display:inline; color: #F24444;">Your code will expire in  
                           <p style="display:inline; color: #F24444;" id="countdown">&nbsp;</p>
                        </p>
                        <input type="submit" name="submit" value="Verify">

                     

                     </form>
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

         const startingMinutes=3;
         let time= startingMinutes*60
         const countDown=document.getElementById('countdown');
         setInterval(updateCountDown,1000);

         function updateCountDown(){
            const minutes=Math.floor(time/60);
            let seconds=time % 60;
            seconds=seconds<10 ? '0'+ seconds:seconds;
            countDown.innerHTML=`${minutes}:${seconds}`;
            time--;
         }
         function Redirect() {
               window.location="register.php?error=Your otp is expried";
            }
            setTimeout('Redirect()', 180000);

        
      </script>
   </body>
</html>