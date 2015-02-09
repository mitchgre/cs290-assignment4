<!DOCTYPE HTML SYSTEM>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>content1</title>
    <script>
     function logout(){
         console.log("logging out");
       var l = new XMLHttpRequest();
       l.open("GET", "content1.php?logout=true" , true);
       l.onreadystatechange = function (e) 
       {
	 if (l.readyState === 4) 
	 {
	   if (l.status === 200) 
	   {
	     // redirect to login.php
	     //window.location.replace('login.php');
           //window.location.assign('login.php');
	     console.log('got here');
	   } 
	   else 
	   {
	     console.log("Error", l.statusText);
	   }
	 }
       };
       l.send("logout=true");

     };
    </script>
  </head>
<body>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo "Post Request Received";
    //print_r($_POST);
    if (! empty($_POST))
        {
            //$n = 0;
            // print_r($_POST);
            if ( isset($_POST["username"]) && $_POST["username"] != null)
                {
                    //$_SESSION['
                    echo "<br>Hello ".$_POST["username"].
                        " you have visited this page ".$_SESSION['n'].
                        " times before. Click <a href=\"./content1.php?logout=true\" onclick=\"logout();\">here</a> to logout.";
                    $_SESSION['n']++;
                }
            else if (isset($_POST["logout"]) && $_POST["logout"] == "true")
                {
                    logoutSession();
                }
            else
                echo "A username must be entered. Click <a href=\"./login.php\">here</a> to return to the login screen";
        }
    
    else // post is empty
        {
            echo "you shouldn't be here.";
        }

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_GET))
        if ( isset($_GET["logout"]) && $_POST["logout"] == 'true')
            {
                echo "logging out";
                logoutSession();
            }
        else
            {
                echo "something";//echo json_encode(array("Type"=>"GET", "parameters"=>null));
                logoutSession();
            }
    
}



function logoutSession(){
  unset($_SESSION['username']);
  session_destroy();
  $redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
  header("Location: {$redirect}/login.php",true);
  die();  
}

?>
</body>
</html>
