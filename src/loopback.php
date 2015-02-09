<!DOCTYPE HTML SYSTEM>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>loopback</title>
  </head>
<body>
<?php
/*

   This file should accept either a GET or POST for input. That GET or
   POST will have an unknown number of key/value pairs. 

   The page should return a JSON object (remember, this is almost
   identical to an object literal in JavaScript) of the form 

 {"Type":"[GET|POST]","parameters":{"key1":"value1",   ... ,"keyn":"valuen"}}. 

   Behavior if a key is passed in and no value is specified is
   undefined. If no key value pairs are passed it should return

   {"Type":"[GET|POST]", "parameters":null}. You are welcome to use
   built in JSON function in PHP to produce this output. 

*/


// um.. can't be this simple... can it?

// handle post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo "Post Request Received";
    //print_r($_POST);
    if (!empty($_POST))
        echo json_encode(array("Type"=>"POST", "parameters"=>$_POST));
    else
        echo json_encode(array("Type"=>"POST", "parameters"=>null));
}
// handle get request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //echo "Get Request Received";
    //print_r($_GET);
    if (!empty($_GET))
        echo json_encode(array("Type"=>"GET", "parameters"=>$_GET));
    else
        echo json_encode(array("Type"=>"GET", "parameters"=>null));
}



?>

</body>
</html>
