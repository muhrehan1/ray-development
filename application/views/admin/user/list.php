<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $table; ?></li>
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
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Website Url</th>
                        <th>Website Image</th>                    
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    <?php if(!empty($records)): $count = 1; foreach($records as $record): ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                                
                                <td><?php echo name_id('brands',$record->brands_id); ?></td>
                                <td><?php echo name_id('category',$record->category_id); ?></td>
                                <td><?php echo !empty($record->website_live_url)? $record->website_live_url:$record->website_staging_url; ?></td>
                                <td>
                                    <a href="javascript:;" class="color popover-dismiss" data-toggle="popover" data-trigger="" title="" data-content="<img src='<?php echo base_url('uploads/'.$table.'/').$record->website_type_image; ?>' />" tabindex="0">
                                        <img  src="<?php echo base_url('uploads/'.$table.'/').$record->website_type_image; ?>">
                                    </a>
                                </td>
                                  <td>
                                    <?php $record_id = "$table"."_id";?>
                                    <button style="color:#8c73c4;" type="button" data-record_id = "<?php echo $record->website_register_id ?>" class="btn viewData " data-toggle="modal" data-target="#exampleModal"><i data-feather="eye"></i></button>
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


<script>
    $('.viewData').on('click',function(){
        var record_id = $(this).data('record_id');
        var table = '<?php echo $table; ?>';
        $.ajax({
            url: '<?php echo base_url('user/viewrecord'); ?>',
            type: 'post',
            data: {
               record_id:record_id,
               table:table,
           },
           success: function(data){ 
            var filterData = JSON.parse(data); 
            var renderHtml = "";
            $.each(filterData, function( key, value ) {


              renderHtml += "<tr><th>"+key+"</th><td style='white-space: revert;'><p>"+value+"</p></td></tr>";

          });

            $('#showDbData').html(renderHtml);

        } 
    });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="max-width: 1200px;" class="modal-dialog" role="document">
    <div style="border-radius: 0rem;" class="modal-content">
      <div style="background-image: linear-gradient(to right, #66d1d1 , #ffcbe4);" class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo ucwords($table)." "."View"?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Table Field</th>
                        <th>Field Data</th>
                    </tr>
                </thead>
                <tbody id="showDbData">
                </tbody>
            </table>
        </div>
    </div>
</div>
<div style="background-image: linear-gradient(to right, #ffcbe4 , #66d1d1);" class="modal-footer">
</div>
</div>
</div>
</div>