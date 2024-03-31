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
    }

    .form-row select {
      padding: 1rem;
    }

    .all-in label:last-of-type,
    .note label {
      font-size: 15px !important;
      font-style: italic;
      font-weight: normal;
    }

    .header {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 0px !important
    }

    .container label {
      font-weight: normal;
      font-size: 17px;
    }

    .service .row {
      justify-content: space-between;
    }

    .price {
      color: red;
    }

    .service .col-6 {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: baseline;
    }

    .pricelabel {
      font-size: 20px !important;
      font-weight: bold !important;
      font-style: normal !important;
      margin-left: 20px
    }

    .all-in.two {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      margin-bottom: 15px;
    }
  </style>
  <link rel="stylesheet" href="../CSS/checkbox.css">
  <title>Document</title>
</head>

<body>
  <?php
      include "../Connections/Include.php";
  $participantid = $_GET['participantid'];
  $active = "services";
  include "active.php";
  ?>
  <div class="container2">
    <form class="needs-validation" action="" method="GET" novalidate>
      <!-- <div>
        <h1 class="header">All-In Neutering</h1>
      </div> -->

      <div class="container">
        <div class="row">
          <div class="col-7">
            <div class="all-in">
              <p class="header">All-In Neutering</p>
              <label>Note: Inclusive of Medications & Rabbies Vaccine</label>
            </div>

            <div class="form-group service">
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Cat
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div>
                    <label class="price">&#8369; 100</label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div>
                    <label class="price">&#8369; 100</label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Cat
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div>
                    <label class="price">&#8369; 100</label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div>
                    <label class="price">&#8369; 100</label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6 note">
                  <label>Note: Required with CBC, 3days prior surgery</label>
                </div>
                <div class="col-6 note">
                  <label>Note: +100 If 10kg above</label>
                </div>
              </div>
            </div>
          </div>

          <div class="col-5">
            <div class="all-in two">
              <div>
                <p class="header">Deworming</p>
              </div>
              <div>
                <span class="pricelabel">&#8369; 100</span>
              </div>
            </div>

            <div class="form-group service">
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Cat
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Cat
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-6">
            <div class="all-in two">
              <div>
                <p class="header">Anti-Rabbies Vaccine</p>
              </div>
              <div>
                <span class="pricelabel">&#8369; 100</span>
              </div>
            </div>

            <div class="form-group service">
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Cat
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Cat
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="all-in two">
              <div>
                <p class="header">Kennel Cough Vaccine</p>
              </div>
              <div>
                <span class="pricelabel">&#8369; 100</span>
              </div>
            </div>

            <div class="form-group service">
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Cat
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Cat
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="all-in two">
              <div>
                <p class="header">4-in-1 Vaccine</p>
              </div>
              <div>
                <span class="pricelabel">&#8369; 100</span>
              </div>
            </div>

            <div class="form-group service">
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Cat
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Cat
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="all-in two">
              <div>
                <p class="header">7-in-1 Vaccine</p>
              </div>
              <div>
                <span class="pricelabel">&#8369; 100</span>
              </div>
            </div>

            <div class="form-group service">
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Cat
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Cat
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="all-in two">
              <div>
                <p class="header">Heartworm</p>
              </div>
              <div>
                <span class="pricelabel">&#8369; 100</span>
              </div>
            </div>

            <div class="form-group service">
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Cat
                      <input type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Male Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Cat
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
                <div class="col-6">
                  <div>
                    <label class="container hov">Female Dog
                      <input type="checkbox">
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
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