<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "marielnq_jakesdb";
$password = "j4k3sdbp4ss";
$dbname = "marielnq_jakesdb";

$q = strval($_GET['q']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM asteroids WHERE name = '".$q."'";
$result = $conn->query($sql);

echo $q;
echo "<br>";
echo "<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Score</th>
</tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
    	echo "<td>" . $row['id'] . "</td>";
    	echo "<td>" . $row['name'] . "</td>";
    	echo "<td>" . $row['score'] . "</td>";
    	echo "</tr>";    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>