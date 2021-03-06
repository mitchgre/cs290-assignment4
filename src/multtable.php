<!DOCTYPE HTML SYSTEM>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>multiplication table</title>
    <style>
     tr,td { align:center;
	     border:solid;
	     border-width: 1px;
       }
    </style>
  </head>
<body>
<?php
/*
This file should accept 4 parameters passed via the URL in a GET
request. 

min-multiplicand
max-multiplicand
min-multiplier
max-multiplier

It should check than the min is in fact less than or equal to the max
multiplicand and multiplier respectively. If it is not, it should
print the message "Minimum [multiplicand|multiplier] larger than
maximum.". It should also check that the values returned are integers
for each parameter. If it is not it should print 1 message for each
invalid input "[min-multiplicand...max-multiplier] must be an
integer.". It  should check that all 4 parameters exist for each
missing  parameter it should print "Missing parameter
[min-multiplicand ...  max-multiplier].".

If all of the above conditions are met, it should produce a
multiplication table that is (max-multiplicand - min-multiplicand + 2)
tall and (max-multiplier - min-multiplier + 2) wide. The upper left
cell should be empty. The left column should have integers running
from  min-multiplicand through max-multiplicand inclusive. The top row
should have integers running from min-multiplier to max-multiplier
inclusive.  Every cell within the table should be the product of the
corresponding multiplicand and multiplier. 

To accomplish the above task you will want to work with loops to
dynamically create rows and within each row, loop to create the
cells. It should  output as a valid HTML5 document.

* checklist [9/10]
 - [ ] HTML valid
 - [X] accept 4 parameters min-multiplicand, max-multiplicand, min-multiplier, max-multiplier
 - [X] check that 4 parameters are integers (WRONG NAMES!)
 - [X] if not, print 1 message for each invalid input: "[min-multiplicand...max-multiplier] must be an integer."
 - [X] check that all 4 parameters exist.
 - [X] for each missing parameter print: "Missing parameter [min-multiplicand ...  max-multiplier]."
 - [X] Deal with naming issue. 
 - [X] check that min < max for both multiplicands and multipliers
 - [X] if not, print message: "Minimum [multiplicand|multiplier] larger than maximum."
 - [X] print table with following properties [6/6]
   - [X] (max-multiplicand - min-multiplicand + 2) tall
   - [X] (max-multiplier - min-multiplier + 2) wide
   - [X] upper left cell is empty
   - [X] left column should have integers running from  min-multiplicand through max-multiplicand inclusive
   - [X] top row should have integers running from min-multiplier to max-multiplier inclusive
   - [X] Every cell within the table should be the product of the  corresponding multiplicand and multiplier
   
* code

 */

// could probably do a better job of this, but it works


//global $inps;
$inps = array(
    "min-multiplicand" => $_GET["min-multiplicand"],
    "max-multiplicand" => $_GET["max-multiplicand"],
    "min-multiplier" => $_GET["min-multiplier"],
    "max-multiplier" => $_GET["max-multiplier"]);


// NEED TO CLEAN THIS TO USE PROPER NAMES.


function errorFree()
{

    global $inps;
    $keepGoing = true;
    foreach ($inps as $key => $val) // here $key is the key and $val is.. well, you get it...
        {
            if ( ! isset($val) ) // ensure all parameters are set
                {
                    echo "Missing parameter ["."$key]" . "<br>";
                    $keepGoing = false;
                }
            else
                if (!ctype_digit($val) ) //( !is_int($val) ) // ensure all parameters are integers
                    {
                        echo "[" . $key . "] must be an integer. " . $val . "<br>";
                        $keepGoing = false;
                    }
        }
    
// check that min < max for both multiplicands and multipliers
    if ($inps["min-multiplicand"] > $inps["max-multiplicand"])
        {
            echo "Minimum multiplicand larger than maximum.<br>" ;
            $keepGoing = false;
        }
    if ($inps["min-multiplier"] > $inps["max-multiplier"])
        {
            echo "Minimum multiplier larger than maximum.<br>";
            $keepGoing = false;
        }
    return $keepGoing;
}



function renderTable()
{
    global $inps; // can't access global vars without 'global' prefix

    echo "<table>"; 

    echo "<tr><td></td>";
    for ($td=$inps["min-multiplier"]; $td<=$inps["max-multiplier"]; $td++)
        echo "<td>".$td."</td>";
    echo "</tr>";

    $i=0;
    for ($tr=$inps["min-multiplicand"]; $tr<=$inps["max-multiplicand"]; $tr++)
        {
            echo "<tr><td>".($inps['min-multiplicand']+$i)."</td>";
            $i = $i+1;
            for ($td=$inps["min-multiplier"]; $td<=$inps["max-multiplier"]; $td++)
                {
                    echo "<td>".($tr)*($td)."</td>";
                }
            echo "</tr>";
        }
    echo "</table>";
}



if (errorFree())
    renderTable();


?>

</body>
</html>
