<style>
	.dashboard-side {
		margin-top: 150px;
	}
	.secDashboard>.container {
    padding-left: 22px;
    padding-right: 22px;
}
.secDashboard>.container .user_dashbrd {
    background: #a5823e;
    padding-right: 0;
    padding-top: 104px;
    border-radius:10px;
}
.side_bar .side_menu {
    list-style: none;
    padding: 0;
    margin: 0;
}
.side_bar .side_menu li {
    font-size: 18px;
    color: #fff;
    line-height: 25px;
    font-weight: 500;
}
.side_bar .side_menu li a {
    color: #fff;
    padding: 24px 30px 24px 30px;
    position: relative;
    transition: all 0.4s ease-in-out !important;
    border-radius: 8px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.side_bar .side_menu li a .icon {
    position: absolute;
    left: 0;
    top: 22px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.4s ease-in-out !important;
}
.side_bar .side_menu li.active a, .side_bar .side_menu li a:hover {
    background: #fff;
    color: #202020;
    padding-left: 61px;
    font-weight: 600;
    box-shadow: -5px 1px 14px 1px rgb(14 14 14 / 28%);
}
.side_bar {
    padding-left: 42px;
    height: 100%;
    position: relative;
}
.secDashboard>.container>.row>.col-12.col-md-9 {
    padding-top: 100px;
    padding-left: 55px;
}
.side_bar .side_menu li.active a .icon,
.side_bar .side_menu li a:hover .icon {
    left: 30px;
    opacity: 1;
    visibility: visible;
}
.side_bar .xt_links {
    position: absolute;
    bottom: 95px;
     left: 103px
}
.side_bar .xt_links p a {
    color: #fff
}
.side_bar .xt_links a .icon {
    margin-right: 16px;
}
.side_bar .xt_links p {
    margin-bottom: 40px;
}
.side_bar .xt_links p:last-child {
    margin-bottom: 0;
}
section.about.secDashboard .row {
    height: 100vh;
}

section.about.secDashboard .col-md-9 {

    padding-top:8%
}


@media only screen and (max-width : 991px) {

    section.about.secDashboard .row {
        height: auto;
    }
    .secDashboard>.container .user_dashbrd {
        padding-top: 0 !important;
        margin-bottom: 30px;
    }
    
}


@media only screen and (max-width : 568px) {
    .secDashboard>.container .user_dashbrd {
        padding-left: 20px;
    }
}

</style>
<section class="about secDashboard">
  <div class="container">
    <div  class="row justify-content-center dashboard-side">
      <?php $this->load->view('front/customer/side-nav'); ?>
      <div class="col-md-12 col-sm-12 col-lg-9">
        <table id="example1" class="table">

          <tbody>

            <tr>
              <td><b>First Name</b></td> 
              <td><?php echo $customerData->user_name?></td>
            </tr> 

            <tr>
              <td><b>Last Name</b></td>
              <td><?php echo $customerData->last_name?></td>
            </tr>

            <tr>
              <td><b>Email</b></td> 
              <td><?php echo $customerData->user_email?></td>
            </tr> 

            <tr>
              <td><b>Phone Number</b></td> 
              <td><?php echo $customerData->contact_number?></td>
            </tr> 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>






