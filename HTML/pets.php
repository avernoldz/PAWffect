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

    .form-row.weight {
      width: 51%;
    }

    button.next.add.btn.btn-primary {
      margin-right: 20px;
    }
  </style>
  <title>Document</title>
</head>

<body>
  <?php
      include "../Connections/Include.php";
  $participantid = $_GET['participantid'];
  $active = "pets";
  include "active.php";
  ?>
  <div class="container2">
    <form class="needs-validation" action="" method="GET" novalidate>

      <div class="form-row md">
        <div class="col">
          <label for="validationCustom01">Pet name</label><label class="required">*</label>
          <input type="text" class="form-control" name="petname" id="validationCustom01" placeholder="Pet name"
            required>
          <div class="invalid-feedback">
            Please provide your name.
          </div>
        </div>
        <div class="col">
          <label for="validationCustom02">Pet Type</label><label class="required">*</label>
          <select class="form-control" name="type">
            <option selected>Dog</option>
            <option>Cat</option>
          </select>
        </div>
      </div>

      <div class="form-row md">
        <div class="col">
          <label for="validationCustom03">Pet Breed</label><label class="required">*</label>
          <input type="text" class="form-control" name="breed" id="validationCustom03"
            placeholder="Pet breed Ex. Shitsu" required>
          <div class="invalid-feedback">
            Please provide your pet breed.
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md">
          <label for="validationCustomUsername">Pet Age</label><label class="required">*</label>
          <input type="number" class="form-control" name="age" id="validationCustom03" placeholder="Pet age in years"
            required>
          <div class="invalid-feedback">
            Please provide your pet age.
          </div>
        </div>

        <div class="col-md">
          <label for="inputAddress">Sex</label><label class="required">*</label><br />
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Male" required>
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Female" required>
            <label class="form-check-label" for="inlineRadio2">Female</label>
          </div>
        </div>
      </div>

      <div class="form-row weight">
        <div class="col-md">
          <label for="validationCustomUsername">Pet Weight</label><label class="required">*</label>
          <input type="number" class="form-control" name="weight" id="validationCustom03" placeholder="Pet weight in kg"
            required>
          <div class="invalid-feedback">
            Please provide your pet weight.
          </div>
        </div>
      </div>

      <input type="hidden" value="<?php echo "$participantid"?>"
        name="participantid">
      <input type="hidden" value="approved" name="status">

      <!-- Button trigger modal -->
      <button type="button" class="next btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Next
      </button>
      <button id="addNew" type="button" class="next add btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Add Pet
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
              <input type="hidden" name="add" value="" id="add">
              <input class=" btn btn-primary w-15" type="submit" name="submit" value="Submit">
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>


  <?php

  if(isset($_GET['submit'])) {

      $petname = $_GET['petname'];
      $type = $_GET['type'];
      $breed = $_GET['breed'];
      $age = $_GET['age'];
      $weight = $_GET['weight'];
      $sex = $_GET['sex'];
      $participantid = $_GET['participantid'];
      $add = $_GET['add'];

      $query = "INSERT INTO pets(type, name, gender, age, weight, breed, participantid) 
      VALUES ('$type','$petname','$sex','$age','$weight','$breed','$participantid')";


      if(mysqli_query($conn, $query)) {
          if($add == 'add') {
              echo "<script>window.location.href='pets.php?participantid=$participantid&alert=1';</script>";
          } else {
              echo "<script>window.location.href='location.php?participantid=$participantid';</script>";
          }
      } else {
          echo mysqli_error($conn);
      }

      mysqli_close($conn);

  }
      
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(function(){
      $('#addNew').click(function(){
        $('#add').val("add");
      console.log('Hello');
    });
    });
  </script>
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

    //Getting value from the url
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(window.location.search);
    const alert = urlParams.get('alert')
    //Swal Notification
    if (alert == 1) {
      Swal.fire({
        title: "Registered successfully!",
        text: "You can add more pets",
        icon: "success"
      });
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
  </script>
</body>

</html>