<?php 
    // your database connection goes here
    include '../../Connections/Include.php';

    $locationid = $_POST["locationid"];

    $query = "SELECT city FROM location WHERE locationid = ' {$locationid} '";
    $result = mysqli_query($conn, $query);

    echo"<option>Select your city</option>";
    while($rows = mysqli_fetch_array($result)){
?>
    <option> <?php echo "$rows[city]" ?> </option>
<?php
    }

?> 