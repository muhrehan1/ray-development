<div class="page-content">
	<nav class="page-breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Admin</a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo ucwords(str_replace('_', ' ', $table)); ?></li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><?php echo ucwords(str_replace('_', ' ', $table)); ?></h4>
					<form method="post" action="<?php echo base_url('admin/update_record_data/').$table?>" novalidate="true" enctype="multipart/form-data">
						<fieldset>
							<?php if(!empty($fields)): foreach($fields as $field): ?>
								<?php $commentChecker =  explode('|',$field['comment']); ?>
								<?php $string = preg_split("/[\s|]+/",$field['comment']); ?>
								<!-- ============================================= RELTAIONSHIPS STARTS ===========================================================  -->
								<?php if(preg_match_all("/RELATION_/i",$string[0])):
									$newField = str_replace('RELATION_','',$string[0]);
									$nameTable = str_replace('_id','',$newField);
									$nameField = $nameTable.'_name';
									$tableData = all($nameTable);
									?>
									<script>

										$('<?php echo "#".$newField; ?>').on('change',function(){
											var parentId = $('<?php echo "#".$newField; ?>').val();
											var mainParent = '<?php echo $nameTable ?>';var getChild = "<?php echo str_replace('_id','',$field['field_name'])?>";

											$.ajax({
												url: '<?php echo base_url('admin/get_relations'); ?>',
												type: 'post',
												data: {
													id:parentId,
													parent:mainParent,
													child:getChild,
												},
												success: function (data) {

													$('<?php echo ".".$field['field_name']; ?>').html(data);
													
												}
											});
											
										});
									</script>

									<div class="form-group">
										<label><?php echo ucwords(str_replace('_', ' ', str_replace('_id','',$field['field_name']))); ?></label>
										<select name="<?php echo $field['field_name']?>" id="<?php echo $field['field_name']?>" class=" w-100 <?php echo $field['field_name']?>" required="false" data-width="100%">
											<option value="">Please Select Parent</option>
										</select>
									</div>

									<!-- ============================================= RELTAIONSHIPS ENDS ===========================================================  -->
									<!-- ============================================= SINGLE IMAGE STARTS ===========================================================  -->
									<?php elseif(in_array("IMAGE",$commentChecker)):?>
										<div class="form-group">
											<label for="password"><?php echo ucwords(str_replace("_",' ',$field['field_name'])); ?></label>
											<div class=" stretch-card">
												<div class="card">
													<div class="card-body">
														<h6 class="card-title"></h6>
														<input type="file" name="<?php echo $field['field_name']; ?>"  id="<?php echo $field['field_name']; ?>" class="border myDropify"/>
													</div>
												</div>
											</div>
										</div>
										<script>
                                                    <?php $imgId = '#'.$field['field_name']; ?>
        											$('<?php echo $imgId; ?>').on('change',function(){
        											 var singleHitUrl = "<?php echo base_url('admin/upload_single/')?>"+<?php echo $new_record_id; ?>;
        											 var data = new FormData();
        											  $.each($('<?php echo $imgId; ?>')[0].files, function(i, file) {
                                                        data.append('image', file);
                                                      });
                                                        data.append('table', '<?php echo $table; ?>');
                                                        data.append('field', '<?php echo $field['field_name']; ?>');
                                                		$.ajax({
                                                            url: singleHitUrl,
                                                            type: 'post',
                                                            data: data,
                                                            contentType: false,
                                                            processData: false,
                                                            success: function(response){
                                                             
                                                            },
                                                        });
        												
        											});
        										</script>
										
									
										<!-- ============================================= SINGLE IMAGE ENDS ===========================================================  -->
										<!-- ============================================= MULTI IMAGE STARTS ===========================================================  -->
										<?php elseif(in_array("MULTIIMAGE",$commentChecker)):?>
											<link rel="stylesheet" href="<?php echo base_url('assets/admin/')?>vendors/dropzone/dropzone.min.css">
											<script src="<?php echo base_url('assets/admin/')?>vendors/dropzone/dropzone.min.js"></script>


											<div class="form-group">
												<label for="password"><?php echo ucwords(str_replace("_",' ',$field['field_name'])); ?></label>
												<div class=" stretch-card">
													<div class="card">
														<div class="card-body">
															<h6 class="card-title"></h6>
															<input type="hidden" value="asdsda" name="<?php echo $field['field_name']; ?>">
															<input type="file" name="<?php echo $field['field_name']; ?>" value="" id="<?php echo $field['field_name']; ?>" class="border myDropify"/>
														</div>
													</div>
												</div>
											</div>
												<script>
                                                    <?php $imgId = '#'.$field['field_name']; ?>
        											$('<?php echo $imgId; ?>').on('change',function(){
        											 var singleHitUrl = "<?php echo base_url('admin/upload_single/')?>"+<?php echo $new_record_id; ?>;
        											 var data = new FormData();
        											  $.each($('<?php echo $imgId; ?>')[0].files, function(i, file) {
                                                        data.append('image', file);
                                                      });
                                                        data.append('table', '<?php echo $table; ?>');
                                                        data.append('field', '<?php echo $field['field_name']; ?>');
                                                		$.ajax({
                                                            url: singleHitUrl,
                                                            type: 'post',
                                                            data: data,
                                                            contentType: false,
                                                            processData: false,
                                                            success: function(response){
                                                             
                                                            },
                                                        });
        												
        											});
        										</script>
											

											<div class="form-group">
											<div class="stretch-card grid-margin grid-margin-md-0">
												<div class="card">
													<div class="card-body">
														<h6 >Multi Images</h6>
														<div class="dropzone" id="exampleDropzone"></div>
													</div>
												</div>
											</div>
											</div>

											<!-- ============================================= MULTI IMAGE ENDS ===========================================================  -->
											<!-- ============================================= SELFDROP STARTS ===========================================================  -->
											<?php elseif(in_array("SELFDROP",$commentChecker)):?>
												<?php 
												$tableFiltered = str_replace('_id','', $field['field_name']);
												$dataTable = all($tableFiltered); 
												$nameVar = str_replace('_id',"_name", $field['field_name']);
												$fieldName = $field['field_name'];
												?>
												<div class="form-group">
													<label for="<?php echo $field['field_name']; ?>"><?php echo ucwords(str_replace('_',' ',str_replace("_id",' ',$field['field_name']))); ?></label>
													<select name="<?php echo $fieldName; ?>" class="form-control" id="<?php echo $fieldName; ?>">
														<option value="">Please Select</option>
														<?php if(!empty($dataTable)): foreach($dataTable as $tdatasingle): ?>
															<option value="<?php echo $tdatasingle->$fieldName; ?>"><?php echo $tdatasingle->$nameVar; ?></option>
														<?php endforeach; endif; ?>
													</select>
												</div>
												<!-- ============================================= SELFDROP ENDS ===========================================================  -->
												<!-- ============================================= ENUM STARTS ===========================================================  -->
												 <?php elseif(in_array("ENUM",$commentChecker)):?>
                                                        <div class="form-group">
                                                          <label><?php echo ucwords(str_replace("_",' ',$field['field_name'])); ?> </label>
                                                          <select class="form-control" id="<?php echo $field['field_name']; ?>" name="<?php echo $field['field_name']; ?>">
                                                            <?php $editvalue = $field['field_name']; ?>
                                                            <option value="<?php echo !empty($record->$editvalue)? $record->$editvalue:''; ?>"><?php echo !empty($record->$editvalue)? $record->$editvalue:''; ?></option>
                                                            <?php $enumfields = $this->general->get_enum_values($table,$field['field_name']);?>
                                                            <?php if(!empty($enumfields)): foreach($enumfields as $enf):  ?>
                                                              <option value="<?php echo $enf ;?>"><?php echo $enf ;?></option>
                                                            <?php endforeach; endif; ?>
                                                          </select>         
                                                        </div> 
                                                        <!-- ============================================= ENUM ENDS ===========================================================  -->
												
												<!-- ============================================= EDITOR STARTS ===========================================================  -->
												<?php elseif(in_array("EDITOR",$commentChecker)):?>
													<div class="form-group">
														<label for="<?php echo $field['field_name']; ?>"><?php echo ucwords(str_replace("_",' ',$field['field_name'])); ?></label>
														<textarea id="<?php echo $field['field_name']; ?>" class="form-control tinymceExample" name="<?php echo $field['field_name']; ?>" rows="10"></textarea>
													</div>
													
													
													<!-- ============================================= EDITOR ENDS ===========================================================  -->
													<!-- ============================================= SLUG STARTS ===========================================================  -->
													<?php elseif(in_array("SLUG",$commentChecker)):?>
														<input id="<?php echo $field['field_name']; ?>" class="form-control" name="<?php echo $field['field_name']; ?>" type="hidden">
														<?php $slugParent = str_replace('_slug','_name', $field['field_name']); ?>
														<script>

															$('<?php echo "#".$slugParent; ?>').on('change',function(){
																var fieldvalue = $(this).val();
																fieldvalue = fieldvalue.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').toLowerCase();
																$('<?php echo "#".$field['field_name']; ?>').val(fieldvalue);
															});
														</script>
														<!-- ============================================= SLUG ENDS ===========================================================  -->
														<!-- ============================================= DEFAULT FIELDS STARTS ===========================================================  -->
														
														<?php elseif(in_array("TIMESTAMP",$commentChecker)): ?>
															<div class="form-group">
																<label for="<?php echo $field['field_name']; ?>"><?php echo ucwords(str_replace("_",' ',$field['field_name'])); ?></label>
																<input id="<?php echo $field['field_name']; ?>"  required="false" class="form-control" name="<?php echo $field['field_name']; ?>" type="datetime-local">
															</div>
														
														
														<?php elseif(in_array("DATE",$commentChecker)): ?>
															<div class="form-group">
																<label for="<?php echo $field['field_name']; ?>"><?php echo ucwords(str_replace("_",' ',$field['field_name'])); ?></label>
																<input id="<?php echo $field['field_name']; ?>"  required="false" class="form-control" name="<?php echo $field['field_name']; ?>" type="date">
															</div>
														
														<?php else: ?>
															<div class="form-group">
																<label for="<?php echo $field['field_name']; ?>"><?php echo ucwords(str_replace("_",' ',$field['field_name'])); ?></label>
																<input id="<?php echo $field['field_name']; ?>"  required="false" class="form-control" name="<?php echo $field['field_name']; ?>" type="text">
															</div>
														<?php endif; ?>
														<!-- ============================================= DEFAULT FIELDS ENDS ===========================================================  -->
													<?php endforeach; endif; ?>
													<input type="hidden" name="entry_process" value="complete">
													<button type="submit" id="addSubBtn" class="btn btn-primary" value="addSubBtn">Add a new record</button>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<script src="<?php echo base_url('assets/admin/')?>vendors/tinymce/tinymce.min.js"></script>
						<script src="<?php echo base_url('assets/admin/')?>js/tinymce.js"></script>
						<script src="<?php echo base_url('assets/admin/')?>vendors/select2/select2.min.js"></script>
						<script src="<?php echo base_url('assets/admin/')?>js/select2.js"></script>
                        
                        <?php $images = all('product_img',array('product_id' => $new_record_id)); ?>
						<script>
						    var hitUrl = "https://projects-delivery.com/dev/admintop/admin/uploadsf/"+<?php echo $new_record_id; ?>;
						    var deleteUrl = "https://projects-delivery.com/dev/admintop/admin/deletef/"+<?php echo $new_record_id; ?>;
							if ($('#exampleDropzone').length) {
								'use strict';
                
								Dropzone.autoDiscover = false;
								var myDropzone = new Dropzone("div#exampleDropzone", 
								{ 
								    paramName: "files", // The name that will be used to transfer the file
								    addRemoveLinks: true,
								    uploadMultiple: true,
								    autoProcessQueue: true,
								    parallelUploads: 50,
								    thumbnailWidth: 180,
								    maxFilesize: 20, // MB
								    acceptedFiles: ".png, .jpeg, .jpg, .gif",
								    url: hitUrl,
								    
								    init: function() {
                                        var self = this;
                                        self.on("queuecomplete", function(progress) {
                                          $('#addSubBtn').show();
                                        });
                                        self.on("processing", function(file) {
                                          $('#addSubBtn').hide();
                                        })
                                      },
                                      removedfile: function(file) {
                                         var fileName = file.name; 
                                         $.ajax({
                                           type: 'POST',
                                           url: deleteUrl,
                                           data: {name: fileName,request: 'delete'},
                                           sucess: function(data){
                                           }
                                         });
                                        var _ref;
                                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                                	 }
                                      
								    
								});
								
								<?php if(!empty($images)): foreach($images as $img): ?>
								<?php $url = base_url('uploads/product_img').$img->product_img_image; ?>
								    var mockFile = { name: "<?php echo $img->product_img_image; ?>", size: 0 };
                                    resizeThumbnail = true;
                                    myDropzone.displayExistingFile(mockFile, "<?php echo $url; ?>", '', '', resizeThumbnail);
                                <?php endforeach; endif; ?>
                                

								$("#novalue").change(function (){
									myDropzone.processQueue();
									return false;
								});
							}

						</script>