<ul class="navbar-nav sidebar sidebar-dark accordion text-xs font-weight-bold" style="background:#116800;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <span class="fas glyphicon glyphicon-edit"></span>
        </div>
        <div class="sidebar-brand-text mx-3" style="text-shadow:0 3px 0 #000;">Post-Partum Admin </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

     
     

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span>Tutorials</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Upload Format:</h6>
			<a class="collapse-item" href="uptext.php">Uplaod Text</a>
            <a class="collapse-item" href="upvideos.php">Upload Videos</a>
            <a class="collapse-item" href="upvideolink.php">Upload Video Links</a>
            <a class="collapse-item" href="uppdf.php">PDFs / Docxs / Images</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
        <a class="nav-link" href="immunize.php">
          <i class="fas fa-fw fa-child"></i>
          <span>Add Immunization</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav Item - Pages Collapse Menu -->

      <li class="nav-item">
        <a class="nav-link" href="chat_system_dr/index.php">
          <i class="fas fa-fw fa-users"></i>
          <span>View / Send sms</span></a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
      

    <li class="nav-item">
        <a class="nav-link" href="quest.php">
          <i class="fas fa-fw fa-question-circle"></i>
          <span>Questions
              <span class="badge col-sm-2" style="background:red; color:#fff;" id="badge">
                <?php
                $count="select id from que_st where stage='$stage'";
                $check=mysqli_query($con,$count);
                if($check){
                $show=mysqli_num_rows($check);
                echo $show;	
                }
                ?>
              </span>
          </span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     

      <!-- Nav Item - Pages Collapse Menu -->
      
      <li class="nav-item">
        <a class="nav-link" href="bookapp.php">
          <i class="fas fa-fw fa-edit"></i>
          <span>Appointments
          <span class="badge col-sm-2" style="background:red; color:#fff;" id="badge">
                <?php
                $count="select id from book_app where dept='$stage'";
                $check=mysqli_query($con,$count);
                if($check){
                $show=mysqli_num_rows($check);
                echo $show;	
                }
                ?>
          </span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

	  
	  <li class="nav-item">
        <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
          <i class="fas fa-fw fa-power-off"></i>
          <span>Logout</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button  id="sidebarToggle" style="border-radius: 20px;"></button>
      </div>

    </ul>