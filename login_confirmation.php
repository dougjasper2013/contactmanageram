<?php
    session_start();
?>
    <!DOCTYPE html>
<html>
   <head>
       <title>Contact Manager - Login Confirmation</title>
       <link rel="stylesheet" type="text/css" href="css/main.css" />       
   </head>
   <body>
       <?php include("header.php"); ?>
       <main>
        <h2>Login Confirmation</h2>

        <p>
            Thank you, <?php echo $_SESSION["userName"]; ?> for
            logging in. You may proceed to the contact list using the following link.
        </p>        
        
        <p><a href="index.php">Contact List</a></p>
       </main>
       <?php include("footer.php"); ?>
   </body>
</html>