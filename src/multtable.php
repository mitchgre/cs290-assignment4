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
inclusive.  Every cell within the table should be the product of the  corresponding multiplicand and multiplier.

To accomplish the above task you will want to work with loops to
dynamically create rows and within each row, loop to create the
cells. It should  output as a valid HTML5 document.

* checklist [1/8]
 - [X] accept 4 parameters min-multiplicand, max-multiplicand, min-multiplier, max-multiplier

 - [ ] check that 4 parameters are integers
 - [ ] if not, print 1 message for each invalid input: "[min-multiplicand...max-multiplier] must be an integer."
 - [ ] check that min < max for both multiplicands and multipliers
 - [ ] if not, print message: "Minimum [multiplicand|multiplier] larger than maximum."
 - [ ] check that all 4 parameters exist.
 - [ ] for each missing parameter print: "Missing parameter [min-multiplicand ...  max-multiplier]."
 - [ ] print table with following properties [0/6]
   - [ ] (max-multiplicand - min-multiplicand + 2) tall
   - [ ] (max-multiplier - min-multiplier + 2) wide
   - [ ] upper left cell is empty
   - [ ] left column should have integers running from  min-multiplicand through max-multiplicand inclusive
   - [ ] top row should have integers running from min-multiplier to max-multiplier inclusive
   - [ ] Every cell within the table should be the product of the  corresponding multiplicand and multiplier
   
* code

 */


// could probably do a better job of this, but it works
$row_min = $_GET['min-multiplicand'];
$row_max = $_GET['max-multiplicand'];
$col_min = $_GET['min-multiplier'];
$col_max = $_GET['max-multiplier'];


/* 
 check that 4 parameters are integers
 if not, print 1 message for each invalid input: "[min-multiplicand...max-multiplier] must be an integer."

*/

// compact all vars to an array, then loop over the array
foreach( compact(array("row_min", "row_max", "col_min", "col_max")) as $i )
    {
        if ( !is_int ($i) )
            echo  $$i . "must be an integer\n";
    }




echo "<table border='1'>";
for ($tr=$row_min; $tr<=$row_max; $tr++)
    {
        echo "<tr>";
        for ($td=$col_min; $td<=$col_max; $td++)
            {
                echo "<td align='center' border='1'>".$tr*$td."</td>";
            }
        echo "</tr>";
    }
echo "</table>";



?>


