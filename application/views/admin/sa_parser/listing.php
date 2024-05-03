<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $table; ?></li>
        </ol>
    </nav>
    <style>.table td img { width: 70px;height: 70px;border-radius: 100%; }</style>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title"><?php echo $table; ?>&nbsp;<a class="btn btn-info" href="<?php echo base_url('add/'.$table);?>">Add a new new record</a></h6>

                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>S.no</th>
                        <?php if(!empty($fields)): foreach($fields as $field): ?>
                            <th><?php echo str_replace('_'," ",$field['field_name']); ?></th>
                        <?php endforeach; endif; ?>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

                    <?php if(!empty($records)): $count = 1; foreach($records as $record): ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <?php if(!empty($fields)): foreach($fields as $field):  $field_name = $field['field_name']; ?>
                                <?php $commentChecker =  explode('|',$field['comment']); ?>

                                <?php if(in_array("IMAGE",$commentChecker) || in_array("MULTIIMAGE",$commentChecker)): ?>
                                <td>
                                    <a href="javascript:;" class="color popover-dismiss" data-toggle="popover" data-trigger="" title="" data-content="<img src='<?php echo base_url('uploads/'.$table.'/').$record->$field_name; ?>' />" tabindex="0">
                                        <img  src="<?php echo base_url('uploads/'.$table.'/').$record->$field_name; ?>">
                                    </a>
                                </td>




                                <?php 
                                elseif(in_array("SELFDROP",$commentChecker)): 
                                $fieldId = $field['field_name'];
                                $selftable = str_replace('_id','',$field['field_name']);
                                $valuedata = name_id($selftable,$record->$fieldId);
                                if(empty($valuedata))
                                {
                                    $valuedata = "No Record";
                                }
                                $field = ucwords(str_replace('_id','',str_replace('_'," ",$field['field_name'])));
                                ?>
                                <td><?php echo $valuedata; ?></td>




                                <?php elseif(empty($field['comment'])): ?>
                                    <td><?php echo $record->$field_name; ?></td>
                                    <?php else: ?>
                                        <td><?php echo $record->$field_name; ?></td>
                                    <?php endif; ?>
                                <?php endforeach; endif; ?>
                                <td>
                                    <?php $record_id = "$table"."_id";?>
                                    <?php if($table == "models"): ?>
                                    <a href="<?php echo base_url('specificlisting/model_photos').'/'.$record->$record_id?>" class="btn btn-info">+ Photos</a>
                                    <a href="<?php echo base_url('specificlisting/').$table.'/'.$record->$record_id?>" class="btn btn-info">+ Videos</a>
                                    <?php endif; ?>
                                    <button style="color:#8c73c4;" type="button" data-record_id = "<?php echo $record->$record_id ?>" class="btn viewData " data-toggle="modal" data-target="#exampleModal"><i data-feather="eye"></i></button>
                                    
                                    <a style="color:#b7b539;" href="<?php echo base_url('admin/dynamic_edit/').$table.'/'.$record->$record_id?>" class="btn bt"><i data-feather="edit"></i></button>

                                    <a style="color:red;" href="<?php echo site_url('delete/'.$table.'/'.$record->$record_id);?>" class="btn"><i data-feather="trash"></i></button>
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
            url: '<?php echo base_url('admin/viewrecord'); ?>',
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