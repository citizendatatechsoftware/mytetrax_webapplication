<header class="main-header">
            <a href="<?php echo base_url(); ?>index" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="<?php echo base_url(); ?>resoursefile/assets/dist/img/logo.png" alt="">
               </span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
              
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                   
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;     line-height: 2.5;
             font-size: 17px;">
                        
                        <p class="fa fa-user" style=" font-size: 18px;
             font-weight: 600;">Welcome <?php 
             if($this->session->userdata('username')){
               echo $this->session->userdata('username');
             }
                  if($this->session->userdata('clientid')){
               echo $this->session->userdata('clientid');
             }         ?></p>
                        </a>
                        <ul class="dropdown-menu" >
                          
                           <?php
                           if($this->session->userdata('clientid')){
                           ?>
                           <li><a href="<?php echo base_url(); ?>client_profile"><i class="fa fa-user"></i> View Profile</a></li>
                           <?php
                          }
                           ?>
                           <?php
                           if($this->session->userdata('login')){
                           ?>
                           <li><a href="<?php echo base_url(); ?>admin_profile"><i class="fa fa-user"></i>Admin Profile</a></li>
                           <?php
                          }
                           ?>
                           <?php
                           if($this->session->userdata('type') == 'Super Admin'){
                           ?>
                           <li><a href="<?php echo base_url(); ?>add_admin"><i class="fa fa-user"></i> Add Admin</a></li>
                           <?php
                          }
                           ?>
                           <li><a href="<?php echo base_url(); ?>logout" onClick="return confirm('Are You Sure Want Logout?');">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="<?php echo base_url(); ?>index"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Security</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>addsecurity">Add Security</a></li>
                        <li><a href="<?php echo base_url(); ?>securitylist">Security List</a></li>
                     </ul>
                  </li>
                   <?php 
                  if(!$this->session->userdata('clientid')){
                 ?>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Client</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>addclient">Add Client</a></li>
                        <li><a href="<?php echo base_url(); ?>clientlist">Client List</a></li>
                    
                     </ul>
                  </li>
                 <?php
               }
                  ?>
                  
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-clock-o"></i><span>Employee Attendance</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>attendance">Time History</a></li>
                       <!--  <li><a href="<?php echo base_url(); ?>atreport">Attendance Report</a></li> -->
                     </ul>
                  </li>
                   <li class="treeview">
                     <a href="<?php echo base_url(); ?>security_scan"><i class="fa fa-qrcode"></i><span>Security Scaned Report</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                  <li class="treeview">
                     <a href="<?php echo base_url(); ?>incident_report"><i class="fa fa-car"></i><span>Incident Report</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                   <li class="treeview">
                     <a href="<?php echo base_url(); ?>loneman_report"><i class="fa fa-bed"></i><span>Lone Man Down</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                
                   <li class="treeview">
                     <a href="<?php echo base_url(); ?>notification"><i class="fa fa-bell"></i><span>Chat Room</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                
                   <li class="treeview">
                     <a href="<?php echo base_url(); ?>logout" onClick="return confirm('Are you Sure Want Logout?');"><i class="fa fa-sign-out"></i><span>Logout</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>
        