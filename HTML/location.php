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

    .container .form-check {
      margin-left: 20px;
      margin-top: 15px
    }

    .container .reminders {
      padding: 1.5rem 2rem 1.5rem 1.5rem;
      border: 2px solid var(--violet);
      border-radius: 5px;
    }

    .form-row select {
      padding: 1rem;
    }

    .header {
      font-family: "Schoolbell", cursive;
      color: var(--violet);
      font-weight: bolder;
      text-shadow: 2px 2px #505050;
    }
  </style>
  <title>Document</title>
</head>

<body>
  <?php
      include "../Connections/Include.php";
  $participantid = $_GET['participantid'];
  $active = "location";
  include "active.php";

  $query = "SELECT * FROM events INNER JOIN location ON events.eventsid = location.eventid";
  $results = mysqli_query($conn, $query);
  ?>
  <div class="container2">
    <form class="needs-validation" action="" method="GET" novalidate>
      <div>
        <h1 class="header">REMINDER</h1>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-7">
            <div class="reminders">
              <ul>
                <li>Pet must be perfectly healthy, no health issues</li>
                <li>Secured cage or carrier in cats and leash for dogs with name-tags is required and bring underpad
                </li>
                <li>Age starts at - Male 4 months & Female 6 months upto 5 years old only</li>
                <li>Atleast 6 hours fasting no food & water before surgery</li>
                <li>CBC is required (from other vet clinic) for all dogs and 2 years older cats atleast 3 days prior
                  surgery</li>
                <li>Additional +300 if the cat is pregnant</li>
                <li>Dogs that are Brachycephalic/flat faced as Shih Tzu, Bulldog, Bully & etc. will be handled with
                  safety precautions</li>
                <li>No Appointment, No Schedule Policy</li>
              </ul>
            </div>

            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
          </div>

          <!-- Fetch Data -->
          <?php if(mysqli_num_rows($results)>0) {
              ?>

          <div class="col-5">
            <div class="form-row">
              <div class="col">
                <label for="validationCustom02">Preferred Location</label><label class="required">*</label>
                <select class="form-control" name="location" id="location">
                  <option selected>Select your preferred location</option>
                  <?php
                    while($rows = mysqli_fetch_array($results)) {
                        echo "<option class='$rows[locationid]' id='$rows[eventsid]'>$rows[locationname]</option>";
                    }
              ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="validationCustom02" class="city">City</label><label class="required">*</label>
                <select class="form-control" id="city">
                  <option selected>Select your city</option>
                </select>
              </div>
            </div>
            <div class="date">
            </div>
            <?php } else {
            }?>
          </div>
        </div>
      </div>

      <input type="hidden" value="<?php echo "$participantid"?>"
        name="participantid">
      <input type="hidden" value="approved" name="status">
      <br />
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
              <input class="btn btn-primary w-15" type="submit" name="submit" value="Submit">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="demo">

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

      $query = "INSERT INTO pets(type, name, gender, age, weight, breed, participantid) 
      VALUES ('$type','$petname','$sex','$age','$weight','$breed','$participantid')";


      if(mysqli_query($conn, $query)) {
          echo "<script>window.location.href='services.php?participantid=$participantid&alert=1';</script>";
      } else {
          echo mysqli_error($conn);
      }

      mysqli_close($conn);

  }
      
  ?>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(function() {

      // optional: don't cache ajax to force the content to be fresh

      // specify the server/url you want to load data from
      
      var urlA = "AJAX/selectCities.php";
      var urlB = "AJAX/dateTime.php";

      var locid = "";
      var eventsid = "";
      
      // on click, load the data dynamically into the #demo div
      // while loading, show three dots (…)
      $("#location").change(function() {
        
         locid = $(this).children(":selected").attr("class");
         eventsid = $(this).children(":selected").attr("id");

               $.ajax ({
                type: 'POST',
                url: urlA,
                data: { locationid : locid },
                success : function(data) {
                    $('#city').html(data);
                },error:function(e){
                alert("error");}
            });
            console.log(eventsid);
            console.log(locid);
      });

      $("#city").change(function() {
               $.ajax ({
                type: 'POST',
                url: urlB,
                data: { locid : locid },
                success : function(data) {
                    $('.date').html(data);
                },error:function(e){
                alert("error");}
            });
            
            console.log(locid);
      });

    });

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
    if (alert == 2) {
      Swal.fire({
        title: "Registered Successfully!",
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