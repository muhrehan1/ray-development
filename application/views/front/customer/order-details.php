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
.form-control {
    height:56px !important;
}
#submit-btn-profile{
    background:#a5823e !important;
   border:none;
}table#table {
    width: 1230px !important;
    margin: 0;
}

.maintable {
    overflow-x: scroll;
}
.maintable::-webkit-scrollbar {
  height: 5px;
}

.maintable::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
}

.maintable::-webkit-scrollbar-thumb {
  height: 5px;
  background-color: #a5823e;
}

.maintable::-webkit-scrollbar-thumb:hover {
  background-color: #f1db9d;
}

.maintable::-webkit-scrollbar:vertical {
  display: none;
}
#table th {
    font-weight: 500;
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
                       <div class="col-md-12 col-sm-12 col-lg-9 ">
				<div class="tb_head">
					<h3>Applications</h3>
				</div>
				<div class="maintable">
        			<table id="table" class="display table table-responsive table-bordered table-striped table-hover" style="width:100%">
        		        <thead>
        		           <tr>
                            <th>S.no</th>
                            <th>Tranasction ID</th>
                            <th>First Name</th>
                            <th>Lastname Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Order Name</th>
                            <th>Order Price</th>
                             <th>Shipping Fee</th>
                            <th>Currency</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                           
                                </tr>
        		        </thead>
        		        <tbody>
        		            <?php if(!empty($applications)):  $count = 1; foreach($applications as $application): 
        		             $customer_details = $this->db->get_where('customer_details', array('transaction_id' => $application['id']))->row_array();
        		            
        		            ?>
        		            <tr>
                                        <td><?php echo $count; ?></td>
                                         <td><?php echo $application['txn_id']; ?></td>
                                        <td><?php echo $customer_details['firstname']; ?></td>
                                        <td><?php echo $customer_details['lastname']; ?></td>
                                         <td><?php echo $customer_details['email_address']; ?></td>
                                         <td><?php echo $customer_details['contact_number'] ;?></td>
                                        <td><?php echo $application['name']; ?></td>
                                        <td><?php echo $application['item_price']; ?></td>
                                        <td><?php echo $application['fedex_shipping_fee']; ?></td>
                                        <td><?php echo $application['item_price_currency'];?></td>
                                         <td><?php echo $application['payment_status']; ?></td>
                                         <td><?php echo $application['status'] ?? 'No Status Found'; ?></td>
                                       
                                    </tr>
        		        	<?php $count++; endforeach; endif; ?>
        		        </tbody>
        		    </table>
        		    </div>
			</div>
      </div>
    </div>
  </div>
</section>






