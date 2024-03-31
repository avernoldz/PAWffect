<?php 
    // your database connection goes here
    include '../../Connections/Include.php';

    $locid = $_POST["locid"];
    $locid = trim($locid);

    $query = "SELECT * FROM events INNER JOIN location ON events.eventsid = location.eventid WHERE locationid = '{$locid}'";
    $result = mysqli_query($conn, $query);

    while($rows = mysqli_fetch_array($result)){
?>
    <div class="form-row">
              <div class="col">
                <label for="validationCustom02">Venue Full Address</label><label class="required">*</label>
                <input type="text" readonly class="form-control" name="breed" id="validationCustom03"
                  value="<?php echo "$rows[locationname] $rows[city]" ?>">
                <!-- <br/><label>Hello</label> -->
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="validationCustom02">Date</label><label class="required">*</label>
                <input type="text" readonly class="form-control" name="breed" id="validationCustom03"
                  value="<?php echo "$rows[eventsdate]" ?>">
              </div>
              <div class="col">
                <label for="validationCustom02">Time</label><label class="required">*</label>
                <input type="text" readonly class="form-control" name="breed" id="validationCustom03" value="<?php echo "$rows[eventstime]" ?>">
              </div>
            </div>
<?php
    }

?> 