<style>
.checkout-inner>form>.row>.col-12:first-child {
    height: fit-content;
    position: sticky;
    top: 10px;
}
#show-cuntry-visa-sts li:hover {
    transition: 0.5s;
    box-shadow: -1px 1px 7px 2px lab(0 0 0 / .16);
    cursor: pointer;
}
  #show-cuntry-visa-sts {
            list-style-type: none;
            padding: 0;
        }
     #show-cuntry-visa-sts li {
    margin-bottom: 13px;
    border: 1px solid #a5823e;
    padding: 10px;
   
    box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.1) inset;
    /*background: #a5823e;*/
    /*color: #fff;*/
    /*border-radius: 10px;*/
    /*display: inline-block;*/
    /*margin-right: 11px;*/
}#show-cuntry-visa-sts li {
    border-radius: 10px;
    background: none !important;
    box-shadow: none;
    width: 47%;
    display: inline-block;
    margin: 5px;
    font-size: 14px;
    line-height: 1;
}
#show-cuntry-visa-sts li strong:before {
    content: '\f57d';
    font-family: 'Font Awesome 5 Pro';
    padding-right: 5px;
    color: #a38242;
}
#show-cuntry-visa-sts li strong {
    display: flex;
    align-items: center;
}
#show-cuntry-visa-sts li strong:last-child:before {
    content: '\f5ab';
    font-weight: 400;
}
#show-cuntry-visa-sts li strong:last-child {
    margin-top: 10px;
    border-top: 1px solid #a18246;
    padding-top: 10px;
}
#show-cuntry-visa-sts li strong {
    margin: 5px 0;
    font-size: 16px;
}
#show-cuntry-visa-sts {
    margin-bottom: 20px;
}
.check_out_modal .modal-dialog {
    max-width: 50%;
    top: 20%;
}
.check_out_modal .modal-dialog .modal-header {
    text-align: center !important;
    background: #a5823e;
    justify-content: center;
}
.check_out_modal .modal-dialog .modal-header h1 {
    text-align: center !important;
    color: #fff;
    font-size: 28px !important;
}
.check_out_modal .modal-dialog .modal-header button.btn-close {
    position: absolute;
    top: 0;
    right: 0;
    width: 30px;
    height: 30px;
    border: 3px solid #000;
    border-radius: 100%;
    z-index: 9;
    color: #fff !important;
    filter: invert(1);
    opacity: 1;
}
.check_out_modal .modal-dialog  .modal-body {
    padding: 40px 25px;
}
.check_out_modal  .modal-content {border-radius: 20px;border: none;}
</style>
<section class="checkout-sec">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-11 col-xxl-11">
                    <div class="checkout-inner">
                        <form action="<?php echo base_url('payment-process')?>" method="post">
                            <div class="row">
                                <div class="col-12 col-md-12 col-sm-12 col-lg-8 col-xl-8 col-xxl-8">
                                    <div class="data-wrapper">
                                        <div class="contact-info">
                                            <h3>Application Details</h3>
                                            <div class="row">
												<?php $total_price = '';?>
												<?php
												$applicants = $this->session->userdata('application_data');
											
												?>
												<?php if (isset($applicants) && !empty($applicants)): ?>
													<?php foreach ($applicants as $index => $applicant): ?>
														<h4>Applicant <?php echo $index + 1; ?></h4>
														<ul>
															<li>Full Name: <?php echo $applicant['firstname'] . " " . $applicant['middlename'] . " " . $applicant['lastname']; ?></li>
															<li>Date of Birth: <?php echo $applicant['dob']; ?></li>
															<li>Contact No: <?php echo $applicant['contact_number']; ?></li>
															<li>Email Address: <?php echo $applicant['email_address']; ?></li>
														</ul>
													<?php endforeach; ?>
												<?php else: ?>
													<p>No applicant data found.</p>
												<?php endif; ?>
                                            </div>
                                        </div>

										<div class="contact-info">
                                            <h3>Credit Card Information</h3>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="floating-field">
                                                        <input type="text" id="cnumber" placeholder="Enter Card Number" name="card_number" value="4111111111111111">
                                                        <label for="first-name">Card Number</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 col-sm-12 col-lg-6 col-xl-6 col-xxl-6">
                                                    <div class="floating-field">
                                                        <input type="text" name="cexpdate" id="cexpdate" placeholder="Enter Expiration Date" value="1226">
                                                        <label for="last-name">Expiration Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="floating-field">
                                                        <input type="text" id="ccode" name="ccode" placeholder="Enter Card Code" value="123">
                                                        <label for="ccode">Card Code</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

								<div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4">
									<div class="order-summary">
										<?php
										$carts = $this->cart->contents();
										if ($this->cart->total_items() > 0):
											?>
											<h5>Order Summary</h5>
											<hr>
											<?php
											$total_price = 0;
											$applicantNumber = 1;
											foreach ($this->cart->contents() as $cart_item):
												?>
												<div class="order-results" id="<?php echo $cart_item['rowid']; ?>">
													<span class="applicant-info">Applicant   <?php echo $applicantNumber++; ?></span>
													<h6>U.S. Passport Application</h6>
										
													<ul>
														<li>
															<span><?php echo $cart_item['name']; ?></span>
															<span><?php $cart_price = number_format($cart_item['price'], 2); echo '$' . $cart_price; ?></span>
														</li>
													</ul>
													<h6>
														<span>Subtotal</span>
														<span><?php $cart_price = number_format($cart_item['price'], 2); echo '$' . $cart_price; ?></span>
													</h6>
													<hr>
												</div>
												<?php
												$total_price += $cart_item['price']; // Add the item price to the total
											endforeach;
											?>
											<h5>Travel Destinations</h5>
												
												<ul id="show-cuntry-visa-sts">
											<?php
                                              
                                                for ($i = 0; $i < count($countries); $i++) {
                                                    echo "<li>";
                                                    echo "<input type='hidden' name='country[]' value='" . $countries[$i] . "'>";
                                                    echo "<input type='hidden' name='visa_required_results[]' value='" . $visa_required_results[$i] . "'>";
                                                    echo "<strong>Country:</strong> " . $countries[$i] . "<br>";
                                                    echo "<strong>Visa Status:</strong> " . $visa_required_results[$i];
                                                    echo "</li>";
                                                }
                                                ?>
                                                </ul>
											<div class="row shipping-rates">
												<div class="col-12">
													<h5>Select shipping</h5>
													<hr>
													<?php
													// Check if rates data is not empty
													if (!empty($rates->RateReplyDetails)) {
														foreach ($rates->RateReplyDetails as $index => $rateReplyDetail) {
															// Assuming $rateReplyDetail->ServiceType contains the service type name
															$serviceType = $rateReplyDetail->ServiceType;
															// Assuming $ratedShipmentDetail->ShipmentRateDetail->TotalNetCharge->Amount contains the shipping rate amount
															$rateAmount = $rateReplyDetail->RatedShipmentDetails[0]->ShipmentRateDetail->TotalNetCharge->Amount;

															// Generate radio button for each service type with rate as value
															echo '<div class="rate-name">';
                                                            echo '<input type="radio" name="shipping_rate" value="' . $rateAmount . '" id="rate' . $index . '" data-service-type="' . $serviceType . '">';
															echo '<label for="rate' . $index . '">' . $serviceType . ' : $' . $rateAmount . '</label>';
															echo '</div>';
														}
													} else {
														// Handle case when rates data is empty
														echo "No shipping rates available.";
													}
													?>


												</div>
											</div>
											<hr>
											<div class="row justify-content-around">
												<div class="col-md-6">
													<h4>Total</h4>
												</div>
												<div class="col-md-6 total-amount">
													<h4> <?php echo '$' . number_format($total_price, 2); ?></h4>
												</div>
											</div>
										<?php
										else:
											echo ' <h5>Order Summary</h5>';
											echo '<hr>';
											echo '<div class="empty-cart-message">There are no orders in the cart.</div>';
										endif;
										?>
									</div>
								</div>

							</div>
                            <div class="btn-wrapper">
								<?php
								foreach ($this->cart->contents() as $index => $cart_item):
									// Use unique names for each hidden input based on the index
									$hidden_input_name = "cart_item[$index]";
									?>
									<input type="hidden" name="<?php echo $hidden_input_name; ?>[name]" value="<?php echo $cart_item['name']; ?>">
									<input type="hidden" id="price-go" name="<?php echo $hidden_input_name; ?>[price]" value="<?php echo $total_price; ?>">
									<!-- Add more hidden inputs if needed -->
									<input type="hidden" name="<?php echo $hidden_input_name; ?>[subtotal]" value="<?php echo $cart_item['subtotal']; ?>">
								<?php
								endforeach;
								?>
								<input type="hidden" name="shipping_fee" id="shipping_fee" value="">
                                <input type="hidden" name="shipping_type" id="shipping_type" value="">
								<button type="submit" class="continue-btn">Pay now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
<div class="modal fade check_out_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Notice</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        The U.S. passport card is a wallet-sized, plastic passport that has no visa pages. The card is proof of U.S. citizenship and identity and has the same length of validity as the passport book. It cannot be used to fly out of the USA only by ground within the USA or to Canada, Mexico, or Caribbean.  The Passport Card is not issued simultaneously with your passport and cannot be expedited; therefore, RJR doesn’t recommend getting one at this time.  If you would still like to get a passport card, continue to place your order and email us letting us know you would like one, we can call you and add it to your order later.
      </div>
     
    </div>
  </div>
</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			// Store the original cart price
			var originalCartPrice = parseFloat($('#price-go').val());

			$('input[name="shipping_rate"]').on('change', function() {
				var shippingRate = parseFloat($(this).val());
				    var serviceType = $(this).data('service-type'); // Accessing the custom attribute

				// Calculate the new total price by adding the original cart price to the selected shipping rate
				var totalPrice = originalCartPrice + shippingRate;

				// Update the hidden input value with the new total price
				$('#price-go').val(totalPrice.toFixed(2)); // Display total price with two decimal places
                    $('#shipping_fee').val(shippingRate);
                    $('#shipping_type').val(serviceType);
				// Update the visible total price display
				$('.total-amount h4').text('$' + totalPrice.toFixed(2));
			});
		});

	</script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function() {
    // Trigger modal after window load
    $(window).on('load', function() {
      $('#modalTriggerBtn').trigger('click'); // Simulate a click on the hidden button to trigger the modal
      // Open modal after 3 seconds
      setTimeout(function() {
        $('#exampleModal').modal('show');
      }, 3000);
    });
  });
</script>
</section>
