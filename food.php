<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/logo-01.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body class="animsition">
	
	<!-- Header -->
	<?php include "connect/header.php"; ?>
<?php  if(!empty($food)): ?>

<?php   foreach($food as $food_row) :   ?>
  <?php foreach($food_samples as $food_sample) : if($food_sample->id_food == $food_row->id ):      ?>

    <!--Note's Modal-->
    <div id="<?php echo $food_sample->id ?>" class="modal fade " role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div  class="modal-body">
            <p><?php echo $food_sample->note; ?></p>
          </div>
        </div>
      </div>
    </div>

  <?php endif; endforeach;  ?>
<?php  endforeach;  ?>




<div id="all" class=" col-xs-12"  >
  <table class="rules table table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center">Food</th>
        <th class="text-center">Baby Status</th>
        <th class="text-center">Rating</th>
        <th class="text-center">Samples</th>
      </tr>
    </thead>
  <tbody>
    <?php   foreach($food as $food_row) :   ?>
      <tr class="record">
        <td class="first"><?php echo $food_row->name; ?></td>

        

        <?php if($food_row->status == "good"){ ?>
          <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first success text-center"><?php echo $food_row->status; ?></td>
        <?php }else if($food_row->status == "pending"){ ?>
          <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first warning  text-center"><?php echo $food_row->status; ?></td>
        <?php }else if($food_row->status == "blocked"){ ?>
          <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first danger text-center"><?php echo $food_row->status; ?></td>
        <?php }  ?>

        <td><div class="btn btn-info btn-sm pull-center samples" data-toggle="tooltip" data-placement="bottom" title="show"><span class="glyphicon glyphicon-book"></span></div></td>
      </tr>
      <tr class="companion">
        <td class="output" colspan="7">
          <table class="table " id="sample-1-table">
            <tbody>
              <?php $is=0; foreach($food_samples as $food_sample) : if($food_sample->id_food == $food_row->id ):  $is++;     ?>
                <?php if($is==1): ?>
                  <thead>
                    <tr>
                      <th class="text-center">Sample Date</th>
                      <th class="text-center">Note</th>
                      <th class="text-center">Note Date</th>
                   </tr>
                  </thead>
                <?php endif; ?>
                <tr>
                    <td><label><?php echo $food_sample->date; ?></label></td>
                    <td><div class="btn btn-info btn-sm pull-center" style="margin-left:-24%" data-toggle="modal" data-target="#<?php echo $food_sample->id ?>"  data-placement="bottom" title="Show"><span class="glyphicon glyphicon-file "></span></div></td>
                    <td><label><?php echo $food_sample->note_date; ?></label></td>
                </tr>


              <?php endif; endforeach;  ?>

              </tbody>
              <tfoot>
                <tr><td colspan="7">
                  <div title="<?php echo $food_row->id; ?>" class="center inline btn-group">
                      <div name="blocked"  class="btn btn-danger btn-sm  status_btn"  data-toggle="tooltip" data-placement="bottom" title="Reject"><span class="glyphicon glyphicon-remove"></span></div>
                      <div name="pending"  class="btn btn-warning btn-sm  status_btn"data-toggle="tooltip" data-placement="bottom" title="Pending"> <span class="glyphicon glyphicon-minus"></span></div>
                      <div name="good"   class="btn btn-success btn-sm active  status_btn" data-toggle="tooltip" data-placement="bottom" title="Accept"><span class="glyphicon glyphicon-ok"></span></div>
                  </div></td></tr>
              </tfoot>
            </table>
        </td>
      </tr>
    <?php $is=0;   endforeach;  ?>

    </tbody>
  </table>

  <div class="clearfix"></div>

</div>


    <div id="good" class=" col-xs-12"  >
      <table class="rules table table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">Food</th>
            <th class="text-center">Baby Status</th>
            <th class="text-center">Rating</th>
            <th class="text-center">Samples</th>
          </tr>
        </thead>
      <tbody>
        <?php   foreach($food as $food_row) : if($food_row->status=='good'):  ?>
        <tr class="record">
          <td class="first"><?php echo $food_row->name; ?></td>

            

            <?php if($food_row->status == "good"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first success text-center"><?php echo $food_row->status; ?></td>
            <?php }else if($food_row->status == "pending"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first warning  text-center"><?php echo $food_row->status; ?></td>
            <?php }else if($food_row->status == "blocked"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first danger text-center"><?php echo $food_row->status; ?></td>
            <?php }  ?>

          <td><div class="btn btn-info btn-sm pull-center samples" data-toggle="tooltip" data-placement="bottom" title="إظهار"><span class="glyphicon glyphicon-book"></span></div></td>
          </tr>
          <tr class="companion">
            <td class="output" colspan="7">
              <table class="table " id="sample-1-table">
                <tbody>
                  <?php $is=0; foreach($food_samples as $food_sample) : if($food_sample->id_food == $food_row->id ):  $is++;     ?>
                    <?php if($is==1): ?>
                      <thead>
                        <tr>
                          <th class="text-center">Sample Date</th>
                          <th class="text-center">Note</th>
                          <th class="text-center">Note Date</th>
                       </tr>
                      </thead>
                    <?php endif; ?>
                    <tr>
                      <td><label><?php echo $food_sample->date; ?></label></td>
                      <td><div class="btn btn-info btn-sm pull-center" style="margin-left:-24%" data-toggle="modal" data-target="#<?php echo $food_sample->id ?>"  data-placement="bottom" title="show"><span class="glyphicon glyphicon-file "></span></div></td>
                      <td><label><?php echo $food_sample->note_date; ?></label></td>
                    </tr>


                  <?php endif; endforeach;  ?>

                  </tbody>
                  <tfoot>
                    <tr><td colspan="7">
                      <div title="<?php echo $food_row->id; ?>" class="center inline btn-group">
                          <div name="blocked"  class="btn btn-danger btn-sm  status_btn"  data-toggle="tooltip" data-placement="bottom" title="رفض"><span class="glyphicon glyphicon-remove"></span></div>
                          <div name="pending"  class="btn btn-warning btn-sm  status_btn"data-toggle="tooltip" data-placement="bottom" title="انتظار"> <span class="glyphicon glyphicon-minus"></span></div>
                          <div name="good"   class="btn btn-success btn-sm active  status_btn" data-toggle="tooltip" data-placement="bottom" title="قبول"><span class="glyphicon glyphicon-ok"></span></div>
                      </div></td></tr>
                  </tfoot>
                </table>
            </td>
          </tr>
        <?php $is=0; endif;  endforeach;  ?>

        </tbody>
      </table>

      <div class="clearfix"></div>

    </div>

    <div id="pending" class=" col-xs-12"  >
      <table class="rules table table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">Food</th>
            <th class="text-center">Baby Status</th>
            <th class="text-center">Rating</th>
            <th class="text-center">Samples</th>
          </tr>
        </thead>
      <tbody >
        <?php   foreach($food as $food_row) : if($food_row->status=='pending'):  ?>
        <tr class="record">
          <td class="first"><?php echo $food_row->name; ?></td>

           

            <?php if($food_row->status == "good"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first success text-center"><?php echo $food_row->status; ?></td>
            <?php }else if($food_row->status == "pending"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first warning  text-center"><?php echo $food_row->status; ?></td>
            <?php }else if($food_row->status == "blocked"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first danger text-center"><?php echo $food_row->status; ?></td>
            <?php }  ?>

          <td><div class="btn btn-info btn-sm pull-center samples" data-toggle="tooltip" data-placement="bottom" title="إظهار"><span class="glyphicon glyphicon-book"></span></div></td>

          </tr>
          <tr class="companion">
            <td class="output" colspan="7">
              <table class="table " id="sample-1-table">
                <tbody>
                  <?php $is=0; foreach($food_samples as $food_sample) : if($food_sample->id_food == $food_row->id ):  $is++;     ?>
                    <?php if($is==1): ?>
                      <thead>
                        <tr>
                          <th class="text-center">Sample Date</th>
                          <th class="text-center">Note</th>
                          <th class="text-center">Note Date</th>
                       </tr>
                      </thead>
                    <?php endif; ?>
                    <tr>
                      <td><label><?php echo $food_sample->date; ?></label></td>
                      <td><div class="btn btn-info btn-sm pull-center" style="margin-left:-24%" data-toggle="modal" data-target="#<?php echo $food_sample->id ?>"  data-placement="bottom" title="Show"><span class="glyphicon glyphicon-file "></span></div></td>
                      <td><label><?php echo $food_sample->note_date; ?></label></td>

                    </tr>


                  <?php endif; endforeach;  ?>

                  </tbody>
                  <tfoot>
                    <tr><td colspan="7">
                      <div title="<?php echo $food_row->id; ?>" class="center inline btn-group">
                          <div name="blocked"  class="btn btn-danger btn-sm  status_btn"  data-toggle="tooltip" data-placement="bottom" title="رفض"><span class="glyphicon glyphicon-remove"></span></div>
                          <div name="pending"  class="btn btn-warning btn-sm  status_btn"data-toggle="tooltip" data-placement="bottom" title="انتظار"> <span class="glyphicon glyphicon-minus"></span></div>
                          <div name="good"   class="btn btn-success btn-sm active  status_btn" data-toggle="tooltip" data-placement="bottom" title="قبول"><span class="glyphicon glyphicon-ok"></span></div>
                      </div></td></tr>
                  </tfoot>
                </table>
            </td>
          </tr>
        <?php $is=0; endif;  endforeach;  ?>

        </tbody>
      </table>

      <div class="clearfix"></div>

    </div>

    <div id="blocked" class=" col-xs-12"  >
      <table class="rules table table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">Food</th>
            <th class="text-center">Baby Status</th>
            <th class="text-center">Rating</th>
            <th class="text-center">Samples</th>
          </tr>
        </thead>
      <tbody>
        <?php   foreach($food as $food_row) : if($food_row->status=='blocked'):  ?>
        <tr class="record">
          <td class="first"><?php echo $food_row->name; ?></td>
            

            <?php if($food_row->status == "good"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first success text-center"><?php echo $food_row->status; ?></td>
            <?php }else if($food_row->status == "pending"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?> first warning  text-center"><?php echo $food_row->status; ?></td>
            <?php }else if($food_row->status == "blocked"){ ?>
              <td id="status<?php echo $food_row->id ?>" class="status<?php echo $food_row->id ?>  first danger text-center"><?php echo $food_row->status; ?></td>
            <?php }  ?>

          <td><div class="btn btn-info btn-sm pull-center samples" data-toggle="tooltip" data-placement="bottom" title="إظهار"><span class="glyphicon glyphicon-book"></span></div></td>

          </tr>
          <tr class="companion">
            <td class="output" colspan="7">
              <table class="table " id="sample-1-table">
                <tbody>
                  <?php $is=0; foreach($food_samples as $food_sample) : if($food_sample->id_food == $food_row->id ):  $is++;     ?>
                    <?php if($is==1): ?>
                      <thead>
                        <tr>
                          <th class="text-center">Sample Date</th>
                          <th class="text-center">Note</th>
                          <th class="text-center">Note Date</th>
                       </tr>
                      </thead>
                    <?php endif; ?>
                    <tr>
                      <td><label><?php echo $food_sample->date; ?></label></td>
                      <td><div class="btn btn-info btn-sm pull-center" style="margin-left:-24%" data-toggle="modal" data-target="#<?php echo $food_sample->id ?>"  data-placement="bottom" title="Show"><span class="glyphicon glyphicon-file "></span></div></td>
                      <td><label><?php echo $food_sample->note_date; ?></label></td>
                    </tr>


                  <?php endif; endforeach;  ?>

                  </tbody>
                  <tfoot>
                    <tr><td colspan="7">
                      <div title="<?php echo $food_row->id; ?>" class="center inline btn-group">
                          <div name="blocked"  class="btn btn-danger btn-sm  status_btn"  data-toggle="tooltip" data-placement="bottom" title="رفض"><span class="glyphicon glyphicon-remove"></span></div>
                          <div name="pending"  class="btn btn-warning btn-sm  status_btn"data-toggle="tooltip" data-placement="bottom" title="انتظار"> <span class="glyphicon glyphicon-minus"></span></div>
                          <div name="good"   class="btn btn-success btn-sm active  status_btn" data-toggle="tooltip" data-placement="bottom" title="قبول"><span class="glyphicon glyphicon-ok"></span></div>
                      </div></td></tr>
                  </tfoot>
                </table>
            </td>
          </tr>
        <?php $is=0; endif;  endforeach;  ?>

        </tbody>
      </table>

      <div class="clearfix"></div>

    </div>



  <?php endif; ?>
<!-- Footer -->
	<?php include "connect/footer.php"; ?>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>