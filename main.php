<div id="containerexample" > 
<table class="table table-hover table-sm" id="patientstable">
<thead class="table-dark">
          <tr>
              <th scope="col">Add to queue</th>
              <th scope="col">Patient no</th>
              <th scope="col">Name</th>
              <th scope="col">Phone</th>
              <th scope="col">Sex</th>
              <th scope="col">Edit details</th>
              <th scope="col">Book appointment</th>
              <th scope="col">Patient Notes</th>
              <th scope="col">Delete patients</th>
          </tr>
</thead>
<tbody>
<?php
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, patient_no, name, age, phone, sex, allergy, note, balance FROM patients"; 
$result = $conn->query($sql);
if ($result !== false && $result->num_rows > 0){
// output data of each row
while($row = $result->fetch_assoc()) {
    $id= $row["id"];
    $_SESSION["name"]=$row["name"];
echo "<tr>
<th scope='row'><a href='addtoqueue.php?id=" . $row["id"]. "'>➕</th>
<td><a href='convertid.php?id=" . $row["id"]. "'> " . $row["patient_no"]. "</td>
<td><a href='convertid.php?id=". $row["id"]. " '>" . $row["name"] . "</a></td>
<td>"
. $row["phone"]. "</td><td>" . $row["sex"] . "</td>
<td><a href='updatepatient.php?id=" . $row["id"]. "'><button class='btn btn-primary' type='button'>Edit</button> </a></td>
<td><a href='bookappointment.php?id=" . $row["id"]. "'><button class='btn btn-primary' type='button'>Book </button> </a></td>
<td>" . $row["note"] .  "</td>
<td><a onclick='checker()' href='deletepatient.php?id=" . $row["id"]. "'><button class='btn btn-primary' type='button'>Delete</button> </a></td></tr>";
}
//echo "</table>";
} else { echo "0 results"; }

?>
 
</tbody>
</table>
</div>
