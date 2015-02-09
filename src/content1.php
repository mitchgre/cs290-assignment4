<!DOCTYPE HTML SYSTEM>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>content1</title>
  </head>
<body>

<?php
session_start();
if (ini_get('register_globals'))
{
    foreach ($_SESSION as $key=>$value)
    {
        if (isset($GLOBALS[$key]))
            unset($GLOBALS[$key]);
    }
}


// start script here
if ( ! isset($_SESSION['loggedin']) ) // if not logged in yet, let's see if we can log in 
{
  checkLogout();
  if (! checkLogin() )
    logoutSession();
}
else // otherwise, we ARE already logged in so let's proceed
{
  checkLogout();
  proceed();  
}

// what? you're leaving already?
function checkLogout(){
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (!empty($_GET))
            if ( isset($_GET["logout"]) && $_POST["logout"] == 'true')
                {
                    echo "logging out";
                    logoutSession();
                }
            else
                {
                    echo "something went wrong. ";
                    logoutSession();
                }
    }
}


// let's just see if you are who you say you are.
function checkLogin(){
    $flag = true;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            if (! empty($_POST))
                {
                    if ( isset($_POST["username"]) && $_POST["username"] != null)
                        {
                            $_SESSION['loggedin'] = true;
                            proceed();
                            return true;
                        }
                    else
                        {
                            echo "A username must be entered. Click <a href=\"./login.php\">here</a> to return to the login screen";
                            return true;
                        }
      
                } 
    
            else // post is empty
                {
                    echo "you shouldn't be here.";
                    return false;
                    //$flag = false;
                    //logoutSession();
                }
        }
}


// If you got here, then you passed our crude security checks.  
// Don't think I don't have my eye on you though. 
function proceed(){
  echo "<h1>content1</h1>Hello ".$_POST["username"].
       " you have visited this page ".$_SESSION['n'].
       " times before. Click <a href=\"./content1.php?logout=true\">here</a> to logout.<br>";
  echo "Here is a secret link to secret information: <a href='content2.php'>content2.php</a>.";
  $_SESSION['n']++;
}

// go back to from where you came.
function logoutSession(){
  unset($_SESSION['username']);
  session_destroy();
  //$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
  header("Location: {$redirect}/login.php",true);
  die();  
}

?>
</body>
</html>
