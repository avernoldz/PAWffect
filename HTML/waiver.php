<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/root.css">
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
      height: 35vh;
      overflow-y: scroll;
    }

    .form-row select {
      padding: 1rem;
    }

    .header {
      font-family: "Schoolbell", cursive;
      color: var(--violet);
      font-weight: bolder;
      text-shadow: 2px 2px #505050;
      text-align: center;
    }

    .btn-primary:disabled {
      color: #fff;
      background-color: #919191;
      border-color: #919191;
    }
  </style>
  <link rel="stylesheet" href="../CSS/checkbox.css">
  <title>Document</title>
</head>

<body>
  <?php
      include "../Connections/Include.php";
  $participantid = $_GET['participantid'];
  $active = "waiver";
  include "active.php";
  ?>
  <div class="container2">
    <form class="needs-validation" action="" method="GET" novalidate>
      <div>
        <h1 class="header">WAIVER</h1>
      </div>

      <div class="container">
        <div class="row">
          <div class="col">
            <div class="reminders">
              <p>
                I, the undersigned, have read and understand this entire page and authorize Shelter Outreach Services to
                anesthetize, surgically sterilize, and provide other related medical care [“Procedure”] to my Pet. I
                agree to pay according to the fee schedule set up by the shelter or humane society that arranged the
                Procedure.
                <br /><br />
                I understand there are medical risks associated with the Procedure, including but not limited to
                infection, hemorrhage, allergic reaction, anesthetic drug reaction, anesthesia-induced cardiac
                compromise, and death. I understand that SOS will perform a physical exam but not perform a
                comprehensive cardiac exam, other diagnostic tests, and blood-work prior to the Procedure. I understand
                that there are increased risks due to the fact that SOS will not perform extensive pre-operative
                diagnostic evaluations. I further understand that there are additional risks if the pet is not current
                on recommended vaccines.
                <br /><br />
                I will hold harmless SOS, its officers, directors, veterinarians, technicians, volunteers, and agents
                for any problems experienced by the animal as a result of the Procedure or the above risk factors. I
                further agree to hold harmless the animal shelter or human society that scheduled the Procedure.
                <br /><br />
                If in the course of treatment, a condition is discovered that requires medical attention or an
                additional procedure, such as hernia repair or the administration of IV fluids, the attending
                veterinarian may, in his/her absolute discretion, perform such procedure. I consent to these procedures
                and agree to pay reasonable additional charges if any.
                <br /><br />
                I agree that I will be available by phone today. If a situation arises and I cannot be reached at the
                phone number below, I authorize the veterinarian to use his/her discretion and clinical judgment as to
                how to proceed. I understand that the SOS staff and the shelter staff will not leave a message, and that
                I have to be available by phone during the day of the procedure.
                <br /><br />
                I agree that I will be financially responsible for any post-operative medical treatment relating to this
                Procedure or any other unrelated medical problems of my animal.
              </p>
            </div>
            <br />
            <div class="form-group center">
              <div class="checkbox">
                <label class="container hov">I understand and agree.
                  <input type="checkbox" id="check" name="checkbox">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <input type="hidden" value="<?php echo "$participantid"?>"
        name="participantid">
      <input type="hidden" value="approved" name="status">
      <!-- Button trigger modal -->
      <button type="button" id="btncheck" class="next btn btn-primary" data-toggle="modal"
        data-target="#exampleModalCenter" disabled>
        Finish
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    //Disable submit until checkbox is checked
    $(function() {
      $('#check').on('change', function() {
        $('#btncheck').prop("disabled", !this.checked); //true: disabled, false: enabled
      }).trigger('change'); //page load trigger event
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