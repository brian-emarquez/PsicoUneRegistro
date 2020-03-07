<?php 

$connect = mysqli_connect("localhost", "briandb", "briandb", "rpo");
$query = "SELECT * FROM people";

$result = mysqli_query($connect, $query);
$chart_data = '';


while($row = mysqli_fetch_array($result))
{
    $chart_data .= "{ year:'".$row["year"]."', name:'".$row["name"]."', edad:".$row["edad"].", dni:".$row["dni"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

?>







