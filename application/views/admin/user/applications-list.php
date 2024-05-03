<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Applications</li>
        </ol>
    </nav>
    <style>.table td img { width: 200px;height: auto;border-radius: 0%; }</style>
                
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Tranasction ID</th>
                                <th>Customer First Name</th>
                                  <th>Customer Lastname Name</th>
                                     <th>Customer Email</th>
                                     <th>Customer Contact</th>
                                <th>Order Name</th>
                                <th>Order Price</th>
                                <th>Shipping Fee</th>
                                <th>Currency</th>
                                <th>Payment Status</th>
                                <th> Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                          <tbody>
                            <?php if (!empty($transactions)): $count = 1; foreach ($transactions as $key => $transaction):
                              $customer_details = $this->db->get_where('customer_details', array('transaction_id' => $transaction['id']))->row_array();
                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                     <td><?php echo $transaction['txn_id']; ?></td>
                                    <td><?php echo $customer_details['firstname']; ?></td>
                                    <td><?php echo $customer_details['lastname']; ?></td>
                                     <td><?php echo $customer_details['email_address']; ?></td>
                                     <td><?php echo $customer_details['contact_number'] ;?></td>
                                    <td><?php echo $transaction['name']; ?></td>
                                    <td><?php echo $transaction['item_price']; ?></td>
                                     <td><?php echo $transaction['fedex_shipping_fee']; ?></td>
                                    <td><?php echo $transaction['item_price_currency'];?></td>
                                 
                                    <td><span class="badge badge-success"><?php echo $transaction['payment_status']; ?></span></td>
                                        <td><?php echo "Processing";?></td>
                                         <td>
                                            <a href="<?php echo base_url('admin-application-detail/').$transaction['id'] ;?>" style="background:#a5823e;"  class="btn text-white " >View Application</a>
                                          
                                    </td>
                                </tr>
                                <?php $count++; endforeach; endif; ?>
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

