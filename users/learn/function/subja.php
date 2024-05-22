<div class="row">

    <div class="col-md-12 mt-3" id="divsub">
        <?php
        $query = "select * from  text_tutor where level='" . $stage . "' ";
        $runquery = mysqli_query($con, $query) or die(mysqli_error($con));
        while ($counttot = mysqli_fetch_object($runquery)) {
        ?>

            <li class="resi col-md-2"><a href="php/tryit/?uniqlearn=<?php echo $counttot->uniqlearn; ?>" class="lin"><?php echo $counttot->topic; ?></a></li>

        <?php } ?>
    </div>



</div>