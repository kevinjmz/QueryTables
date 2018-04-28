<?php
$host = 'earth.cs.utep.edu';
$user = '';
$password = '';
$database = '';
$connection = mysql_connect($host, $user, $password);
if (!$connection) {
    die('Could not connect' . mysql_error());
}
echo "<h3>TABLE: Supplies_T</h3>";
mysql_select_db($database, $connection);
$query = 'SELECT * FROM Supplies_T';
$result = mysql_query($query, $connection);
if (!$result) {
    die('Could not query. ' . mysql_error());
}

$x = mysql_num_rows($result);
$y = mysql_num_fields($result);
echo "<h4> degree = " . $y . " cardinality = " . $x . "</h4>";

$fieldnm = mysql_field_name($result, 0);

echo "<table border='5' align='center' >";
echo "<tr>";
for ($i = 0; $i < $y; $i++) {
    $fieldnm = mysql_field_name($result, $i);
    echo "<th>" . $fieldnm . "</th>";
}
echo "</tr>";
while ($rowdata = mysql_fetch_array($result)) {
    echo "<tr>";
    foreach ($rowdata as $key => $value) {
        echo "<td>" . $key . "=>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<h4>closing</h4>";
mysql_close($connection);

?>
