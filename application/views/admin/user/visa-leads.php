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
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone</th>
                               
                            </tr>
                            </thead>
                          <tbody>
                            <?php if (!empty($leads)): $count = 1; foreach ($leads as $key => $lead):
                            
                            ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                     <td><?php echo $lead['customer_name']; ?></td>
                                    <td><?php echo $lead['customer_email']; ?></td>
                                     <td><?php echo $lead['customer_phone']; ?></td>
                                  
                                 
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

