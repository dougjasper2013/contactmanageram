<?php
    session_start();
    // get the data from the form
    $user_name = filter_input(INPUT_POST, 'user_name');
    $password = filter_input(INPUT_POST, 'password');
    $_SESSION["pass"] = $password;    

    // code to save to process Login goes here    

    
    require_once('database.php');

    // Add the contact to the database
    $query = 'SELECT password FROM registrations
                WHERE userName = :userName';

    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $user_name);    
            
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $hash = $row['password'];
    $_SESSION["isLoggedIn"] = password_verify($_SESSION["pass"], $hash);        

    if ($_SESSION["isLoggedIn"] == TRUE)
    {        
        $_SESSION["userName"] = $user_name;
        $_SESSION["password"] = $password;
        $_SESSION["hash"] = $hash;
        // redirect to confirmation page

        $url = "login_confirmation.php";
        header("Location: " . $url);
        die();
    }
    elseif($_SESSION["isLoggedIn"] == FALSE)
    {
        $_SESSION = [];        // Clear all session data
        session_destroy();     // Clean up the session ID

        $url = "login_form.php";
        header("Location: " . $url);
        die();
    }
    else
    {
        $_SESSION = [];        // Clear all session data
        session_destroy();     // Clean up the session ID

        $url = "login_form.php";
        header("Location: " . $url);
        die();
    }
        

?>