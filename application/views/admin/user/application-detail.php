<style>
   .customer-detail h6{
   font-weight:400;
   }.pdf-download-link {
    display: inline-block;
    padding: 19px 10px;
    background-color: #a5823e;
    color: #fff;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow */
    transition: box-shadow 0.3s ease;
}
.pdf-download-link:hover{
    color:#fff;
}.applicant-container {
            margin-bottom: 20px;
        }
        .applicant-heading {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .applicant-details {
           
            padding: 10px;
            margin-bottom: 10px;
            
        }
        
       .applicant-details .col-lg-4 {
            
            border-radius:10px;
           padding: 10px;
            border: 1px solid #ccc;
            box-shadow:0px 0px 20px 0px #e5e5e5 ;
             background:#a5823e;
            color:#fff;
            
        }
        .applicant-details h3 {
            margin-top: 0;
        }
        .applicant-details p {
            margin: 5px 0;
        }


</style>
<div class="page-content">
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
   <div>
      <h4 class="mb-3 mb-md-0">Application Detail</h4>
   </div>
   <div class="d-flex align-items-center flex-wrap text-nowrap">
   </div>
</div>
<?php 

   $customer_details = $this->db->get_where('customer_details', array('transaction_id' => $application_detail[0]['id']))->row_array();

   ?>
<div class="row">
   <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">
         <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between align-items-baseline">
                  </div>
                  <div class="row">
                     <div class="col-6 col-md-12 col-xl-12 customer-detail">
                        <br>
                        <h6 class="mb-5"><strong>Order Name :</strong> <?php echo $application_detail[0]['name'] ;?></h6>
                        <h6 class="mb-5"><strong>Order Price:</strong> <?php echo '$'.$application_detail[0]['item_price'] ;?></h6>
                        <h6 class="mb-5"><strong>Customer Firstname:</strong> <?php echo $customer_details['firstname'] ;?></h6>
                        <h6 class="mb-5"><strong>Customer LastName: </strong> <?php echo $customer_details['lastname'] ;?></h6>
                        <h6 class="mb-5"><strong>Company Name:</strong>  <?php echo $customer_details['company_name'] ;?></h6>
                        <h6 class="mb-5"><strong>Contact Number : </strong>  <?php echo $customer_details['contact_number'] ;?></h6>
                        <h6 class="mb-5"><strong>Customer Email :</strong>  <?php echo $customer_details['confirm_email'] ;?></h6>
                    
                         
						 <h6 class="mb-5"><strong>Travel Destinations :</strong>
							 <?php
							 $countries_with_statuses = unserialize($customer_details['travel_destinations']);
							 foreach ($countries_with_statuses as $country => $visa_status) {
								 $badge_class = ($visa_status == "I don't want to be contacted") ? 'badge-danger' : 'badge-success';
								 ?>
								 <span class="badge <?php echo $badge_class; ?> text-white mr-2 mb-3">
									<i data-feather="globe"></i> <?php echo 'Country:'. ''.$country; ?>:
									<?php echo 'Visa Status:'. ''.$visa_status; ?> <i class="fas fa-passport"></i>
									<?php echo ($visa_status == 'Yes') ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'; ?>
								</span>
							 <?php } ?>
						 </h6>

                         <h6 class="mb-5"><strong>Shipping Service Type :</strong>  <?php echo $application_detail[0]['shipping_type'] ;?></h6>
                        <h6 class="mb-5"><strong>Shipping Fee :</strong>  <?php echo $application_detail[0]['fedex_shipping_fee'] ;?></h6>
                        <h6 class="mb-5"><strong>Given Documents :</strong>
                           <?php if (!empty($docs)) {
                              $doc_names = array(); 
                              foreach ($docs as $doc) {
                                  $doc_names[] = $doc['document_name']; // Store document name in the array
                              }
                              
                              echo implode(', ', $doc_names);
                              } ?>
                        </h6>
                      
                        <h6 class="mb-5"><strong>Status :</strong>  <?php echo  $application_detail[0]['status'];?></h6>
                        <?php

                        $json_data = $customer_details['applicants_data'];
                        $records = json_decode($json_data, true);
                        if ($records !== null) {
                            // Output heading for applicants
                            echo '<h2>Applicants</h2>';
                            
                            // Loop through the applicants data
                            foreach ($records as $key => $applicant) {
                                echo '<div class="applicant-container">';
                                echo '<div class=" row applicant-details">';
                                  echo '<div class=" col-lg-4">';
                                echo '<h3>Applicant ' . ($key + 1) . '</h3>';
                                echo '<p><strong>First Name:</strong> ' . $applicant['firstname'] . '</p>';
                                echo '<p><strong>Middle Name:</strong> ' . $applicant['middlename'] . '</p>';
                                echo '<p><strong>Last Name:</strong> ' . $applicant['lastname'] . '</p>';
                                echo '<p><strong>Company Name:</strong> ' . $applicant['company_name'] . '</p>';
                                echo '<p><strong>Date of Birth:</strong> ' . $applicant['dob'] . '</p>';
                                echo '<p><strong>Contact Number:</strong> ' . $applicant['contact_number'] . '</p>';
                                echo '<p><strong>Email Address:</strong> ' . $applicant['email_address'] . '</p>';
                                echo '<p><strong>Confirm Email:</strong> ' . $applicant['confirm_email'] . '</p>';
                                echo '</div>'; // Closing .applicant-details
                                  echo '</div>'; 
                                echo '</div>'; // Closing .applicant-container
                            }
                        } else {
                            echo "<p style='color:red;'>No Applicants Found</p>";
                        }

                    ?>
                        
                            <a href="<?php echo base_url('pdf/' . $application_detail[0]['shipping_label']); ?>" class="pdf-download-link" download>
                                <span ><i data-feather="file-text"></i></span> 
                                Download Shipping Label
                            </a>
                        <div class="d-flex align-items-baseline">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- row -->
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
   <div>
      <h4 class="mb-3 mb-md-0">Documents Checklist</h4>
   </div>
   <div class="d-flex align-items-center flex-wrap text-nowrap">
   </div>
</div>
<div class="row">
   <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">
         <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
               <form action="<?php echo base_url('documents/update');?>" method="post">
                  <div class="card-body">
                     <div class="row">
                        <div class="d-flex justify-content-between align-items-baseline">
                           <div class="col-lg-12">
                              <label for="status" class="form-label">Documents</label>
                              <div class="check-group">
                                 <?php
                                    // Array of available documents
                                    $available_documents = array(
                                        "Letter of Authorization",
                                        "Recent Passport Photo",
                                        "DS-11 Form",
                                        "Passport Card",
                                        "Proof of Identification"
                                    );
                                    
                                    // Loop through available documents
                                    foreach ($available_documents as $document) {
                                        // Check if the document is selected
                                        $checked = in_array($document, $selected_documents) ? 'checked' : '';
                                        ?>
                                 <label class="checkbox">
                                    <input class="checkbox__input" name="documents[]" type="checkbox" value="<?php echo $document; ?>" <?php echo $checked; ?>>
                                    <svg class="checkbox__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                                       <rect width="21" height="21" x=".5" y=".5" fill="#FFF" stroke="#006F94" rx="3" />
                                       <path class="tick" stroke="#6EA340" fill="none" stroke-linecap="round" stroke-width="4" d="M4 10l5 5 9-9" />
                                    </svg>
                                    <span class="checkbox__label"><?php echo $document; ?></span>
                                 </label>
                                 <?php } ?>
                                 <div class="check-group__result">Options chosen:</div>
                              </div>
                           </div>
                           <?php  ?>
                        </div>
                     </div>
                     <div class="row mt-3">
                        <div class="d-flex justify-content-between align-items-baseline">
                           <div class="col-lg-12">
                              <div class="check-group">
                                 <div class="form-group">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-select" aria-label="Default select example">
                                        <option value="">Please select</option>
                                        <option value="processing" <?php echo ($application_detail[0]['status'] === 'processing') ? 'selected' : ''; ?>>Processing</option>
                                        <option value="In review" <?php echo ($application_detail[0]['status'] === 'In review') ? 'selected' : ''; ?>>In review</option>
                                        <option value="Pending Documents" <?php echo ($application_detail[0]['status'] === 'Pending Documents') ? 'selected' : ''; ?>>Pending Documents</option>
                                        <option value="Approved" <?php echo ($application_detail[0]['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                    </select>

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="application_id" value=" <?php echo $application_detail[0]['id'] ;?>">
                     <input type="hidden" name="user_id" value=" <?php echo $application_detail[0]['user_id'] ;?>">
                     <button type="submit" name="submit" class="btn btn-primary mt-3">Update Application</button>
               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>