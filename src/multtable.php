<?php
$rows=10;
$cols=10;

echo "<table border='1'>";
for ($tr=1;$tr<$rows;$tr++)
    {
        echo "<tr>";
        for ($td=1;$td<$cols;$td++)
            {
                echo "<td align='center' border='1'>".$tr*$td."</td>";
            }
        echo "</tr>";
    }
echo "</table>";
?>