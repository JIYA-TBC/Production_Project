
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .bg-gradient-pink {
    background-image: linear-gradient(to bottom, #f24185, #f24185);
}

.black-text {
    color: black;
}

  </style>

</head>
<body>
  
</body>
</html>
<ul class="navbar-nav bg-gradient-pink sidebar sidebar-dark accordion text-xs font-weight-bold" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <span class="fas glyphicon glyphicon-edit"></span>
        </div>
        <div class="sidebar-brand-text mx-3" style="text-shadow:0 3px 0 #ed9abd; color: #000; font-size: 15px; ">Post-Partum </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-2">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active" class="black-text">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span >Dashboard</span></a>
      </li>

      <!-- Heading -->
      <div class="sidebar-heading" class="black-text">
        Menu
      </div>

      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item" class="black-text">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-book"></i>
          <span >Resources/Support</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Learning-Resources:</h6>
			<a class="collapse-item" href="text.php">Text</a>
            <a class="collapse-item" href="videos.php">Videos</a>
            <a class="collapse-item" href="videolink.php">Video Links</a>
            <a class="collapse-item" href="pdf.php">PDFs / Docxs / Images</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="assinpdf.php">
          <i class="fas fa-fw fa-question-circle"></i>
          <span>Queries / Complain</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="immunization.php">
          <i class="fas fa-syringe"></i>
          <span>Immunization</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="graph.php">
          <i class="fas fa-syringe"></i>
          <span>graph</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="quiz.php">
          <i class="fas fa-syringe"></i>
          <span>Test your self</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bookapp.php">
          <i class="fas fa-fw fa-edit"></i>
          <span>Book Appointment</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
     

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Settings</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="profile.php">Profile</a>
            
			<a class="collapse-item" href="activity.php">Login Activity</a>
            <div class="collapse-divider"></div>
            
          </div>
        </div>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
          <i class="fas fa-fw fa-power-off"></i>
          <span>Logout</span></a>
      </li>

      <!-- Nav Item - Charts -->
      

      <!-- Nav Item - Tables -->
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button  id="sidebarToggle" style="border-radius: 20px;"></button>
      </div>

    </ul>
