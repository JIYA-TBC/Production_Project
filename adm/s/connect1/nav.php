<ul class="navbar-nav ml-auto">
<!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bell fa-fw"></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter">1+</span>
  </a>
  <!-- Dropdown - Alerts -->
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">
      Notifications
    </h6>
    
    <a class="dropdown-item d-flex align-items-center" href="#">
      <div class="mr-3">
        <div class="icon-circle bg-primary">
          <i class="fas fa-file-alt text-white"></i>
        </div>
      </div>
      <div>
        <div class="small text-gray-500"><?php echo date("d M, Y"); ?></div>
        <span class="font-weight-bold"><?php echo $fname; ?>, Welcome to PMS E-Learn</span>
      </div>
    </a>
   
   
    
  </div>
</li>

<!-- Nav Item - Messages -->
<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-envelope fa-fw"></i>
    <!-- Counter - Messages -->
    <span class="badge badge-danger badge-counter">1</span>
  </a>
  <!-- Dropdown - Messages -->
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
      Messages
    </h6>
    
   
  
    <a class="dropdown-item d-flex align-items-center" href="#">
      
      <div>
        <div class="text-truncat"><?php echo $fname.", you registered as ".$stage; ?></div>
        <div class="small text-gray-500"><?php echo date("d M, Y"); ?></div>
      </div>
    </a>
   
  </div>
</li>

<div class="topbar-divider d-none d-sm-block"></div>

<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" >
    <span class="mr-2 d-none d-lg-inline" style="font-size: 15px; color: #444;"><?php echo $fname; ?></span>
  </a>
</li>
</ul>