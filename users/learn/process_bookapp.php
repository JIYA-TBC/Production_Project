<?php
include "../../connect.php";
                      if (isset($_POST['bk'])) {

                        //form validation to avoid exploit
                        function test_input($data)
                        {
                          $data = trim($data);
                          $data = stripslashes($data);
                          $data = htmlspecialchars($data);
                          return $data;
                        }
                        //exploit ends

                        $doc = test_input($_POST["doc"]);
                        $dept = test_input($_POST["stage"]);
                        $fullname = test_input($_POST["fullname"]);
                        $phone = test_input($_POST["phone"]);
                        $email = test_input($_POST["email"]);
                        $date = test_input($_POST["date"]);
                        $time = test_input($_POST["time"]);
                        $qus = test_input($_POST["qus"]);

                        $check2 = mysqli_query($con, "select * from book_app where appdate ='" . mysqli_real_escape_string($con, $date) . "' and apptime ='" . mysqli_real_escape_string($con, $time) . "' and docname ='" . mysqli_real_escape_string($con, $doc) . "' ");

                        $row2 = mysqli_num_rows($check2);
                        if ($row2 > 0) {
                          echo "<script>alert('Sorry this day has been booked... Do change it')</script>";
                        } else {

                          $senddata2 = mysqli_query($con, "insert into book_app (docname,dept,fullname,phone,email,appdate,apptime,appnote) values
                          ('" . mysqli_real_escape_string($con, $doc) . "','" . mysqli_real_escape_string($con, $dept) . "','" . mysqli_real_escape_string($con, $fullname) . "','" . mysqli_real_escape_string($con, $phone) . "','" . mysqli_real_escape_string($con, $email) . "','" . mysqli_real_escape_string($con, $date) . "','" . mysqli_real_escape_string($con, $time) . "','" . mysqli_real_escape_string($con, $qus) . "')") or die(mysqli_error($con));
                        }
                        if (@$senddata2) {
                          echo "<script>alert('$fullname, Your Appointment was successfully Booked')</script>";
                        } else {
                          echo "<script>alert('An error occured')</script>";
                        }
                      }

                      ?>