<!-- Card Body -->
<div class="card-body">
  <div class="row pb-5 container">
    <div class="w3-card col-md-6" style="border:1px solid #ccc; padding:20px;">


      <form action="bookapp.php" method="POST" class="user">


        <div class="form-group">
          <!-- <input type="text" class="form-control" name="location" placeholder="Enter Your Location"> -->

          <select style="font-size:10px;" name="doc" class="form-control" required="required">
            <option value="">------- Choose Doctor ------</option>
            <!-- php here -->
            <?php
            $mysqli1 = "select * from  ad_in ";
            $myquery1 = mysqli_query($con, $mysqli1) or die(mysqli_error($con));
            while ($row2 = mysqli_fetch_object($myquery1)) {
            ?>
              <option value="<?php echo $row2->fullname; ?>">
                <?php echo $row2->fullname; ?>
              </option>
            <?php } ?>
          </select>
        </div>


        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <select style="font-size:px;" name="stage" class="form-control" required="required">
                <option value=""> Choose Department </option>
                <option value="Post-Partum">Post-Partum</option>
                <!-- <option value="O & G">O & G</option>
                                <option value="Radiology">Radiology</option>
                                <option value="Nephrology">Nephrology</option>
                                <option value="Paediatrics">Paediatrics</option> -->
              </select>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control form-control" name="fullname" value="<?php echo $sn . " " . $fn . " " . $ln; ?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="form-control form-control" name="phone" value="<?php echo $ph; ?>" readonly>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control form-control" name="email" value="<?php echo $mail; ?>" readonly>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <span class="fa fa-calendar"></span> date
              <input type="date" class="form-control form-control" name="date" placeholder="date" required>
            </div>
            <div class="col-md-6">
              <span class="fa fa-clock-o"></span> time
              <input type="time" class="form-control form-control" name="time" placeholder="time" required>
            </div>
          </div>
        </div>

        <div class="form-group">
          <textarea style="resize:none;" class="form-control " name="qus" rows=4 placeholder="Enter Appointment Note here..."></textarea>
        </div>

        <button class="btn btn-primary btn-user btn-block" name="bk"><b><span class="fa fa-send"></span> Book Appointment</b>
        </button>

        <hr>
    </div>
    </form>

    <div class="col-md-1"></div>

    <div class=" col-md-5">
      <div class="w3-card">
        <div class="w3-container w3-blue text-center pt-3 pb-2">
          <h6 style="font-weight: bold;">Doctors & their Department</h6>
        </div>
        <div class="">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Doctor</th>
                <th>Department</th>
              </tr>
            </thead>
            <tbody>
              <!-- php here -->
              <?php
              $mysqli1 = "select * from  ad_in ";
              $myquery1 = mysqli_query($con, $mysqli1) or die(mysqli_error($con));
              while ($row2 = mysqli_fetch_object($myquery1)) {

              ?>
                <tr class="">
                  <td><?php echo $row2->fullname; ?></td>
                  <td><?php echo $row2->stage; ?></td>
                </tr>
              <?php  } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>