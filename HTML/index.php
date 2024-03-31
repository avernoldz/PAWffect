<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/index2.css">
  <?php include "../Connections/cdn.php"?>
  <style>
    body {
      background-image: url("../Assets/bg.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      background-color: var(--lightviolet);
      font-family: "Roboto", sans-serif;
      font-weight: 500;
      font-style: normal;
      background-attachment: fixed;
    }
  </style>
  <title>Document</title>
</head>

<body>
  <?php
      include "../Connections/Include.php";

  $select = "SELECT * FROM participant ORDER BY participantid DESC LIMIT 1";
  $results = mysqli_query($conn, $select);
  $rows = mysqli_fetch_array($results);
  $participantid = $rows['participantid'] + 1;
  $active = "details";

  include "active.php";

  ?>
  <div class="container2">
    <form class="needs-validation" action="" method="GET" novalidate>
      <!-- <div>
        <h2>Registration Form</h2>
        <hr />
        <br />
      </div> -->

      <div class="form-row">
        <div class="col">
          <div>
            <label for="validationCustom01">First name</label><label class="required">*</label>
            <input type="text" class="form-control" name="firstname" id="validationCustom01" placeholder="First name"
              required>
            <div class="invalid-feedback">
              Please provide your name.
            </div>
          </div>

          <div>
            <label for="validationCustom02">Middle name</label>
            <input type="text" class="form-control" name="middlename" id="validationCustom02" placeholder="Middle name">
          </div>

          <div>
            <label for="validationCustom03">Last name</label><label class="required">*</label>
            <input type="text" class="form-control" name="lastname" id="validationCustom03" placeholder="Last name"
              required>
            <div class="invalid-feedback">
              Please provide your name.
            </div>
          </div>

          <div>
            <label for="validationCustomPhone">Phone Number</label><label class="required">*</label>
            <!-- <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend">+63</span>
            </div> -->
            <input type="text" class="form-control" name="phonenumber" id="validationCustomPhone"
              placeholder="+639123456789" aria-describedby="inputGroupPrepend" pattern="[0-9]+" maxlength="10" required>
            <div class="invalid-feedback">
              Please provide a valid phone number.
            </div>
          </div>

          <div>
            <label for="validationTooltip05">Email Address</label><label class="required">*</label>
            <input type="email" class="form-control" name="email" id="validationTooltip05" placeholder="juan@abc.com"
              required>
            <div class="invalid-feedback">
              Please provide a valid email address.
            </div>
          </div>

        </div>

        <div class="col">
          <div>
            <label for="validationTooltip03">Region</label><label class="required">*</label>
            <select class="form-control country" name="region" onchange="loadProvince()">
              <option selected>Select Region</option>
            </select>
            <!-- <input type="text" class="form-control" name="city" id="validationTooltip03" placeholder="City" required> -->
            <div class="invalid-feedback">
              Please provide a valid region.
            </div>
          </div>

          <div>
            <label for="validationTooltip03">Province</label><label class="required">*</label>
            <select class="form-control state" aria-label="Default select example" name="province"
              onchange="loadCities()">
              <option selected>Select Province</option>
            </select>
            <!-- <input type="text" class="form-control" name="city" id="validationTooltip03" placeholder="City" required> -->
            <div class="invalid-feedback">
              Please provide a valid province.
            </div>
          </div>

          <div>
            <label for="validationTooltip04">City</label><label class="required">*</label>
            <!-- <input type="text" class="form-control" name="city" id="validationTooltip04" placeholder="City" required> -->
            <select class="form-control city" name="city" onchange="loadBrgy()">
              <option selected>Select City</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>

          <div>
            <label for="validationTooltip04">Brgy.</label><label class="required">*</label>
            <!-- <input type="text" class="form-control" name="city" id="validationTooltip04" placeholder="City" required> -->
            <select class="form-control brgy" name="brgy" onchange="load()">
              <option selected>Select Brgy.</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid brgy.
            </div>
          </div>

          <div>
            <label for="inputAddress">Street</label><label class="required">*</label>
            <input type="text" class="form-control" name="street" id="inputAddress" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please provide a valid address.
            </div>
          </div>

        </div>
      </div>

      <br />


      <input type="hidden" value="1" name="eventid">
      <input type="hidden" value="approved" name="status">

      <!-- Button trigger modal -->
      <button type="button" class="next btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Next
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Save</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to proceed?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input class="btn btn-primary w-15" type="submit" name="next" value="Submit">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>


  <?php

  if(isset($_GET['next'])) {

      $firstname = $_GET['firstname'];
      $middlename = $_GET['middlename'];
      $lastname = $_GET['lastname'];
      $phonenumber = $_GET['phonenumber'];
      $email = $_GET['email'];
      $street = $_GET['street'];
      $brgy = $_GET['brgy'];
      $city = $_GET['city'];
      $province = $_GET['province'];
      $region = $_GET['region'];
      $status = $_GET['status'];
      $eventid = $_GET['eventid'];

      $query = "INSERT INTO participant(firstname, middlename, lastname, phonenumber, email, street, brgy, city, province, region, registrationstatus, eventid) 
    VALUES ('$firstname','$middlename','$lastname','$phonenumber', '$email', '$street', '$brgy', '$city','$province','$region','$status','$eventid')";

      if(mysqli_query($conn, $query)) {
          echo "<script>window.location.href='pets.php?participantid=$participantid';</script>";
      } else {
          echo mysqli_error($conn);
      }
  }
      
  ?>

  <script src="../Javascript/app.js"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

    //Swal Notification
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
</body>

</html>