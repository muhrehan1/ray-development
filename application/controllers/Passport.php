<?php
require './vendor/autoload.php';

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\contract\v1\MerchantAuthenticationType;
use net\authorize\api\contract\v1\CreateTransactionResponse;
use net\authorize\api\controller as AnetController;
defined('BASEPATH') OR exit('No direct script access allowed');
class Passport extends Front_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
		  $this->load->library('session');
		  $this->load->helper('url');
		$this->config->load('authorize_net');
		$this->config->load('admin_email');
		$this->load->library('fedex_api');
    	$this->load->library('shipping_label');
		  $this->load->model('documents');
	}

	public function index()
	{
		$data['renewal_passport'] = $this->general->single('renewal_passport');
		$data['main_content'] = 'renewal-passport';
		$this->load->view('front/inc/view',$data);
	}


	public function new_passport()
	{
		$data['new_passport'] = $this->general->single('new_passport');
		$data['main_content'] = 'new-passport';
		$this->load->view('front/inc/view',$data);
	}

	public function lost_passport()
	{
		$data['lost_passport'] = $this->general->single('lost_passport');
		$data['main_content'] = 'lost-passport';
		$this->load->view('front/inc/view',$data);
	}


	public function minor_passport()
	{
		$data['minor_passport'] = $this->general->single('minor_passport');
		$data['main_content'] = 'minor-passport';
		$this->load->view('front/inc/view',$data);
	}

	public function data_correction_passport()
	{
	    
		$data['correction_passport'] = $this->general->single('data_correction_passport');
		$data['main_content'] = 'data-correction-passport';
		$this->load->view('front/inc/view',$data);
	}


	public function second_additonal_passport()
	{
		$data['second_additional_passport'] = $this->general->single('second_additional_passport');
		$data['main_content'] = 'second-additional-passport';
		$this->load->view('front/inc/view',$data);
	}

	public function second_additonal_renewal_passport()
	{
		$data['second_additional_renewal_passport'] = $this->general->single('second_additional_renewal_passport');
		$data['main_content'] = 'second-additional-renewal-passport';
		$this->load->view('front/inc/view',$data);
	}

	public function renewal_packages(){
				 $data['packages'] = $this->general->all('plans' ,array('category_id'=> '14'));
		
			$data['main_content'] = 'renewal-packages';
			$this->load->view('front/inc/view',$data); 
		
	}

	public function  new_passport_packages(){
		$data['new_passports_packages'] = $this->general->all('plans' ,array('category_id'=> '17'));
		$data['main_content'] = 'new-passport-packages';
		$this->load->view('front/inc/view',$data);
	}

	public function  lost_passport_packages(){
		$data['lost_passport_packages'] =  $this->general->all('plans' ,array('category_id'=>'19'));
		$data['main_content'] = 'lost-passport-packages';
		$this->load->view('front/inc/view',$data);
	}
	

	public function  minor_passport_packages(){
	    
	    $data['minor_passport_packages'] = $this->general->all('plans' ,array('category_id'=> '21'));
		$data['main_content'] = 'minor-passport-packages';
		$this->load->view('front/inc/view',$data);
	}
	public function  data_correction_passport_packages(){
	    $data['packages'] = $this->general->all('plans' ,array('category_id'=> '23'));
		$data['main_content'] = 'data-correction-packages';
		$this->load->view('front/inc/view',$data);
	}
	public function  second_additional_packages(){
	     $data['packages'] = $this->general->all('plans' ,array('category_id'=> '25'));
		$data['main_content'] = 'second-additional-packages';
		$this->load->view('front/inc/view',$data);
	}
	public function  second_additional_renewal_packages(){
	     $data['packages'] = $this->general->all('plans' ,array('category_id'=> '26'));
		$data['main_content'] = 'second-additional-renewal-packages';
		$this->load->view('front/inc/view',$data);
	}
		
		
	public function	get_passport(){
	    	$data['main_content'] = 'get-passport';
	$this->load->view('front/inc/view',$data);
	}		
	
	public function country_visa(){
	$data['main_content'] = 'country-visa';
	$this->load->view('front/inc/view',$data);
	}
	
	
	public function anotherAplicant() {

		if (empty($_POST)) {

			// $data['main_content'] = 'checkout';
			// $this->load->view('front/inc/view', $data);
		} else {
			// Add item to cart
			// echo $plan_id = $this->input->post('order_id', TRUE);
			echo $plan_id = $this->input->post('order_id', TRUE);
			$get_plan = $this->general->single('plans', array('plans_id' => $plan_id));

			if ($get_plan) {
				$id = $get_plan->plans_id;
				$category_id = $get_plan->category_id;
				$plan_name = $get_plan->plan_name;
				$plan_price = $get_plan->plan_price;
				$plan_processing_time = $get_plan->plan_processing_time;

				$data = array(
					'id' => $id,
					'qty' => 1,
					'price' => $plan_price,
					'name' => $plan_name,
					'options' => array(' Processing Time' => $plan_processing_time)
				);
				$this->cart->insert($data);
			}

			// $data['main_content'] = 'checkout';
			// $this->load->view('front/inc/view', $data);
		}
	}
		public function getCartsData() {
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
					<a href="javascript:;" class="action-btn btn-trash remove-item" data-rowid="<?php echo $cart_item['rowid']; ?>"><i class="fa fa-trash"></i></a>
					<span class="applicant-info">Applicant   <?php echo $applicantNumber++; ?></span>
					<h6>U.S. Passport Application</h6>
					<ul>
						<li>
							<span><?php echo $cart_item['name'] ;?></span>
							<span><?php $cart_price = number_format($cart_item['price'] ,2) ; echo '$'.$cart_price;?></span>
						</li>
					</ul>
					<h6>
						<span>Subtotal</span>
						<span><?php $cart_price = number_format($cart_item['price'] ,2) ; echo '$'.$cart_price;?></span>
					</h6>
					<hr>
				</div>
				<?php
				$total_price += $cart_item['price']; // Add the item price to the total
			endforeach;
			?>
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
		endif; ?>

		<script>
			jQuery('.remove-item').click(function(e) {
				e.preventDefault();
				var rowid = $(this).data('rowid');
				// alert(rowid);
				var clickedElement = $(this);
				jQuery.ajax({
					url: "<?php echo site_url('cart/remove_item_ajax'); ?>",
					type: "POST",
					data: { rowid: rowid },
					success: function(response) {
						var jsonResponse = typeof response === 'string' ? JSON.parse(response) : response;
						jQuery('#' + rowid).hide();
						var totalItems = jsonResponse.total_items;
						var totalAmount = jsonResponse.total_amount;
						jQuery('.order-summary h5').text('Order Summary ');
						jQuery('.order-summary .total-amount h4').text('$' + totalAmount);

				// 		toastr.options = {
				// 			"closeButton": true,
				// 			"debug": false,
				// 			"newestOnTop": false,
				// 			"progressBar": true,
				// 			"positionClass": "toast-top-right",
				// 			"preventDuplicates": false,
				// 			"onclick": null,
				// 			"showDuration": "300",
				// 			"hideDuration": "1000",
				// 			"timeOut": "5000",
				// 			"extendedTimeOut": "1000",
				// 			"showEasing": "swing",
				// 			"hideEasing": "linear",
				// 			"showMethod": "fadeIn",
				// 			"hideMethod": "fadeOut"
				// 		}
				// 		toastr.success('Item Delete successfully.');

					},

					error: function(xhr, status, error) {
						console.log('AJAX error:', xhr.responseText);
					}
				});
			});
		</script>

		<?php
	}
	
	
		public function get_packages_by_cat()
	{
		$package_cat_id = $_POST['package_cat_id'];
		$data['packages'] = $this->general->all('plans',array('category_id'=>$package_cat_id));
		$packages_data = $data['packages'];
		$packages_result = array();
		for($i =0; $i< count($packages_data); $i++){
			$package_id = $packages_data[$i]->plans_id;
			$plan_name =  $packages_data[$i]->plan_name;
			$package_price = $packages_data[$i]->plan_price;
			$plan_processing_time  = $packages_data[$i]->plan_processing_time;
				$packages_result['data'][] = array(
				'package_id'=>$package_id,
				'plan_name' => $plan_name,
				'package_price' =>$package_price,
				'plan_processing_time' =>$plan_processing_time,
			);

		}

			echo json_encode($packages_result);

		exit;
	}

	public function get_cart_items() {
	   
	 
	   
        $data['cart_items'] = $this->cart->contents();
      
	   
        $data['main_content'] = 'checkout';
			$this->load->view('front/inc/view', $data);
    }



 public function update_documents() {
       

        // Handle form submission
        if ($_POST) {
            $application_id = $this->input->post('application_id');
            $app_status =  $this->input->post('status');
            $documents = $this->input->post('documents');
            $user_id = $this->input->post('user_id');
          	$query = $this->db->query("SELECT * FROM transaction_details WHERE id ={$application_id} AND user_id ={$user_id}");
            $data['application_detail'] = $query->result_array();
          
                if ($data['application_detail']) {
                    
                    $update_data = array(
                        'status' => $app_status 
                    );
                    
                    $this->db->where('id', $application_id);
                     $this->db->where('user_id', $user_id);
                    $this->db->update('transaction_details', $update_data);
                }
          
            $current_documents = $this->documents->get_user_documents($user_id);
            $this->documents->update_user_documents($user_id, $documents, $current_documents);
            
         
             redirect($_SERVER['HTTP_REFERER']);
        } else {
           
            $this->load->view('documents/update');
        }
    }



	public function processOrder() {
	    	// 		$data['categories_packages'] = $this->general->all('category');
		
	
		if (empty($_POST)) {
		
			$data['main_content'] = 'checkout';
			$this->load->view('front/inc/view', $data);
		} else {
				// Add item to cart
				$plan_id = $this->input->post('order_id', TRUE);
				$get_plan = $this->general->single('plans', array('plans_id' => $plan_id));

				if ($get_plan) {
					$id = $get_plan->plans_id;
					$category_id = $get_plan->category_id;
					$plan_name = $get_plan->plan_name;
					$plan_price = $get_plan->plan_price;
					$plan_processing_time = $get_plan->plan_processing_time;

					$data = array(
						'id' => $id,
						'qty' => 1,
						'price' => $plan_price,
						'name' => $plan_name,
						'options' => array(' Processing Time' => $plan_processing_time)
					);
					$this->cart->insert($data);
				}


			$data['main_content'] = 'checkout';
			$this->load->view('front/inc/view', $data);
		}
	}

	public function processStep() {
// Load the FedEx configuration file
            
        $applicants = [];
		foreach ($this->input->post('firstname') as $index => $firstName) {
			$applicants[$index] = array(
				"firstname" => $firstName,
				"middlename" => $this->input->post('middlename')[$index],
				"lastname" => $this->input->post('lastname')[$index],
				"company_name" => $this->input->post('company_name')[$index],
				"dob" => $this->input->post('dob')[$index],
				"contact_number" => $this->input->post('contact_number')[$index],
				"email_address" => $this->input->post('email_address')[$index],
				"confirm_email" => $this->input->post('confirm_email')[$index],
			);
		}

		$this->session->set_userdata('application_data', $applicants);
		$this->session->set_userdata('form_data', $applicants);
		
		$data['countries'] =   $this->input->post('countries_name');
	    $data['visa_statuses'] =  $this->input->post('has_visa');
		$data['visa_required_results'] = $this->input->post('contact_me');

		$data['cart_items'] = $this->cart->contents();
		// $senderAddress = $this->input->post('shipping_address');
		$this->session->set_userdata('form_data', array(
			"firstname" => $this->input->post('firstname'),
			"middlename" => $this->input->post('middlename'),
			"lastname" => $this->input->post('lastname'),
			"company_name" => $this->input->post('company_name'),
			"dob" => $this->input->post('dob'),
			"contact_number" => $this->input->post('contact_number'),
			"email_address" => $this->input->post('email_address'),
			"confirm_email" => $this->input->post('confirm_email'),	
			"shipping_address" => $this->input->post('shipping_address'),
			"travel_departure" =>$this->input->post('travel_departure'),
			
		));

		$recipient = array(

			'address' => $this->input->post('shipping_address'),
			'city' =>$this->input->post('city'),
			'state'  =>$this->input->post('state'),
			'zipcode'=>$this->input->post('zipcode'),
			'person_name'=>$this->input->post('firstname'),
			'contact_number'=>$this->input->post('contact_number')

		);
            $this->session->set_userdata('recipient_address', $recipient);
	        $rates = $this->fedex_api->get_shipping_rates($recipient);
	  
		$data['rates'] = $rates;
		$data['main_content'] = 'checkout-step-2';
		$this->load->view('front/inc/view',$data);
	}




	public function  visa_ask_lead()
	{

		if(isset($_POST)){
		 
            $customer_name = $_POST['customer_name'];
            $email = $_POST['get_email'];
            $phone = $_POST['phone'];
            
            $data = array(
                'customer_name'=>$customer_name,
                 'customer_phone'=>$phone,
                  'customer_email'=>$email,
                
                );
                
                $this->general->gadd('visa_app_leads', $data);
	
		}
        $message = "Your request has beend sent.";
		echo  json_encode(array('id'=>'success' ,'message' =>$message));
	}




	public function  request_consultation()
	{

		if(isset($_POST)){
		 
            $customer_name = $_POST['customer_name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $phone = $_POST['phone'];
	

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = 'lucaswillis741@gmail.com';
			$subject = 'Request Consultation';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;"><strong>Customer Name:</strong>'.$customer_name.'</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;"><strong>Customer Email:</strong>'.$email.'</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;"><strong>Customer Phone:</strong>'.$phone.'</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;"><strong>Message:</strong>'.$message.'</p><br>';
		
			$section['body'] .= '</td>';

			$section['subject'] = 'Request Consultation';
			$body = $this->load->view('front/email/request_consultation', $section, TRUE);

			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}
        $message = "Your request has beend sent.";
		echo  json_encode(array('id'=>'success' ,'message' =>$message));
	}


	public function  send_email()
	{

		if(isset($_POST['admin_email'])){
			$email = $_POST['admin_email'];

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = $email;
			$subject = 'Passport Requirements For Passport Renewal';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<h6 style="font-size:22px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">Dear, <span style="color:red">'.$email.'</span></h6>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;">ALL OF THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT: </p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) You are in possession of a previously issued US Passport and it is in fair condition.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2)You were at least 16 years of age when this passport was issued.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">3)This passport was issued less than 15 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">If you have any additional questions regarding your forms, instructions, or requirements, please call us at <a href="tel:(800) 783-8472">(800) 783-8472</a>, and we will be happy to assist.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">Thank you again for visiting RJR!</p>';
			$section['body'] .= '</td>';

			$section['subject'] = 'Passport Requirements For Passport Renewal';
			$body = $this->load->view('front/email/renewal_template', $section, TRUE);

			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			
			$file_path = FCPATH . 'requirements/9cd80fd1cdbbf950461673613a026085.pdf';

             $this->email->attach($file_path);
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}
        $message  = 'Your message has been sent';
		echo  json_encode(array('id'=>'success','message'=>$message));
	}


	public function  send_email_lost_pssport()
	{

		if(isset($_POST['admin_email'])){
			$email = $_POST['admin_email'];

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = $email;
			$subject = 'Passport Requirements For Lost Passport';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<h6 style="font-size:22px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">Dear, <span style="color:red">'.$email.'</span></h6>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;">ONE OF MORE OF THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT: </p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) You have never previously been issued a US passport.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2)You have previously been issued a US Passport but were under the age of 16 when it was issued.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">3)Your most recent passport was issued over 15 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">4)Your existing passport was mutilated or somehow destroyed (washing machine etc.), but you still have it, or it remains in your possession.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">If you have any additional questions regarding your forms, instructions, or requirements, please call us at <a href="tel:(800) 783-8472">(800) 783-8472</a>, and we will be happy to assist.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">Thank you again for visiting RJR!</p>';
			$section['body'] .= '</td>';

			$section['subject'] = 'Passport Requirements For Lost Passport';
			$body = $this->load->view('front/email/lost_passport', $section, TRUE);
	$file_path = FCPATH . 'requirements/9cce24fe67d0787efccee9dd113b4223.pdf';

             $this->email->attach($file_path);
			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}

		 $message  = 'Your message has been sent';
		echo  json_encode(array('id'=>'success','message'=>$message));
	}


	public function  second_additional_renewal_email()
	{

		if(isset($_POST['admin_email'])){
			$email = $_POST['admin_email'];

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = $email;
			$subject = 'Passport Requirements For Additional or 2nd US Passport Renewal';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<h6 style="font-size:22px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">Dear, <span style="color:red">'.$email.'</span></h6>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;"><strong>Note:</strong> It is <u>not</u> commonly known that the U.S. State Department issues to qualified applicants 2nd or additional U.S. passports. They are legally issued under specific circumstances by the Federal government. Normally they are issued for the following two reasons:</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) Applicant is traveling to countries having known diplomatic conflict with each other such as Israel and Saudi Arabia. If you have an Israeli embarkation stamp in your current passport you cannot obtain nor apply for a Saudi Arabian visa.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2) Applicant is traveling abroad so frequently and to countries which require visas that they are unable to meet deadlines. An example of this would be traveling to China departing in 3-4 days and returning 10 days later, then departing to Russia 3 days after returning from China; this itinerary wouldn’t allow for a person to travel and get visas within the allotted time they have.</p><br>';
			$section['body'] .= '<h6 style="font-size:16px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">The State Department allows the issuance of the 2nd passport when evidence of such a travel conflict is stated and proven. This is achieved through formal requests and fight reservations showing travel intentions.</h6><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;"><strong>Description:</strong> The following must be true for you to use this method of obtaining a 2ND or Additional US Passport:</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) You are in possession of a previously issued full term (10 year) US Passport in fair condition which still has at least 1 or 2 years remaining validity, or</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2) You are in possession of a previously issued 2nd or limited US passport expired or still valid and this passport was issued not greater than 5 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">3) You were at least 16 years of age when this passport was issued.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">4) This passport was issued less than 15 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">If you have any additional questions regarding your forms, instructions, or requirements, please call us at <a href="tel:(800) 783-8472">(800) 783-8472</a>, and we will be happy to assist.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">Thank you again for visiting RJR!</p>';
			$section['body'] .= '</td>';

			$section['subject'] = 'Passport Requirements For Additional or 2nd US Passport Renewal	';
			$body = $this->load->view('front/email/second_additiaonal_renewal', $section, TRUE);
$file_path = FCPATH . 'requirements/State-Dept-Form-2nd-Passport-2024-for-website.pdf';

             $this->email->attach($file_path);
			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}

		 $message  = 'Your message has been sent';
		echo  json_encode(array('id'=>'success','message'=>$message));
	}

	public function  second_additional_email()
	{

		if(isset($_POST['admin_email'])){
			$email = $_POST['admin_email'];

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = $email;
			$subject = 'Passport Requirements For Additional or 2nd US Passport Application';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<h6 style="font-size:22px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">Dear, <span style="color:red">'.$email.'</span></h6>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;"><strong>Note:</strong> It is <u>not</u> commonly known that the U.S. State Department issues to qualified applicant’s 2nd or additional U.S. passports. They are legally issued under specific circumstances by the Federal government. Normally they are issued for the following two reasons:</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) Applicant is traveling to countries having known diplomatic conflict with each other such as Israel and Saudi Arabia. If you have an Israeli embarkation stamp in your current passport you cannot obtain nor apply for a Saudi Arabian visa.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2) Applicant is traveling abroad so frequently and to countries which require visas that they are unable to meet deadlines. An example of this would be traveling to China departing in 3-4 days and returning 10 days later, then departing to Russia 3 days after returning from China; this itinerary wouldn’t allow for a person to travel and get visas within the allotted time they have.</p><br>';
			$section['body'] .= '<h6 style="font-size:16px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">The State Department allows the issuance of the 2nd passport when evidence of such a travel conflict is stated and proven. This is achieved through formal requests and fight reservations showing travel intentions.</h6><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;"><strong>Description:</strong> The following must be true for you to use this method of obtaining a 2ND or Additional US Passport:</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) You are in possession of a previously issued full term (10 year) US Passport in fair condition which still has at least 1 or 2 years remaining validity, or</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2) You are in possession of a previously issued 2nd or limited US passport expired or still valid and this passport was issued not greater than 5 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">3) You were at least 16 years of age when this passport was issued.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">4) This passport was issued less than 15 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">If you have any additional questions regarding your forms, instructions, or requirements, please call us at <a href="tel:(800) 783-8472">(800) 783-8472</a>, and we will be happy to assist.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">Thank you again for visiting RJR!</p>';
			$section['body'] .= '</td>';

			$section['subject'] = 'Passport Requirements For Additional or 2nd US Passport Application';
			$body = $this->load->view('front/email/second_additional', $section, TRUE);
   
            $file_path = FCPATH . 'requirements/State-Dept-Form-2nd-Passport-2024-for-website.pdf';

             $this->email->attach($file_path);
			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}

		 $message  = 'Your message has been sent';
		echo  json_encode(array('id'=>'success','message'=>$message));
	}

	public function  data_correction_email()
	{

		if(isset($_POST['admin_email'])){
			$email = $_POST['admin_email'];

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = $email;
			$subject = 'Passport Requirements For Name Change or Data Correction';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<h6 style="font-size:22px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">Dear, <span style="color:red">'.$email.'</span></h6>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;">THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT:</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1)You are in possession of a previously issued US Passport and it is in fair condition.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2)You were at least 16 years of age when this passport was issued.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">3)This passport was issued less than 15 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">4)You have Legally changed your name or gender e.g. marriage, divorce, court order etc.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">5)The current passport you are in possession of was issued with errors. (i.e. your name was misspelled or your date of birth is wrong etc and you need to correct it).</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">If you have any additional questions regarding your forms, instructions, or requirements, please call us at <a href="tel:(800) 783-8472">(800) 783-8472</a>, and we will be happy to assist.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">Thank you again for visiting RJR!</p>';
			$section['body'] .= '</td>';

			$section['subject'] = 'Passport Requirements For Name Change or Data Correction';
			$body = $this->load->view('front/email/data_correction', $section, TRUE);
$file_path = FCPATH . 'requirements/8cafb42b14b1e46964bb6caf3ae3d195.pdf';

             $this->email->attach($file_path);
			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}

	 $message  = 'Your message has been sent';
		echo  json_encode(array('id'=>'success','message'=>$message));
	}

	public function  send_email_minor_pssport()
	{

		if(isset($_POST['admin_email'])){
			$email = $_POST['admin_email'];

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = $email;
			$subject = 'Passport Requirements For Children’s Application of a US Passport';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<h6 style="font-size:22px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">Dear, <span style="color:red">'.$email.'</span></h6>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;">THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT:</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) Your Child is under the age of 16 on the actual date your passport is applied for,</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2)Your Child has never been issued a US passport,</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">3)Your Child has had a passport issued but it has been lost and cannot locate it.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">4)or, Your Child has been issued a US Passport, but they were under the age of 16 when it was issued.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">If you have any additional questions regarding your forms, instructions, or requirements, please call us at <a href="tel:(800) 783-8472">(800) 783-8472</a>, and we will be happy to assist.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">Thank you again for visiting RJR!</p>';
			$section['body'] .= '</td>';

			$section['subject'] = 'Passport Requirements For Minor Passport';
			$body = $this->load->view('front/email/minor_passport', $section, TRUE);
$file_path = FCPATH . 'requirements/d567668a0052f8070f6b6568d8e0cc6b.pdf';

             $this->email->attach($file_path);
			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}

		 $message  = 'Your message has been sent';
		echo  json_encode(array('id'=>'success','message'=>$message));
	}
	public function  send_email_new_pssport()
	{

		if(isset($_POST['admin_email'])){
			$email = $_POST['admin_email'];

			$this->load->library('email');
			$config = array();
			$config['protocol']     = "smtp";
			$config['smtp_host']    = "smtp.gmail.com";
			$config['smtp_user']    = "lucaswillis741@gmail.com";
			$config['smtp_pass']    = "riyf trkd okkb gejo";
			$config['smtp_port']    = 465;
			$config['smtp_crypto']  = 'ssl';
			$config['smtp_timeout'] = 5;
			$config['mailtype']     = "html";
			$config['charset']      = "utf-8";
			$config['newline']      = "\r\n";
			$config['wordwrap']     = TRUE;
			$config['validate']     = FALSE;

			$this->email->initialize($config);
			$send_to = $email;
			$subject = 'Passport Requirements For First Time Application of a US Passport';
			$section['body']  = '<td style="padding: 50px;">';
			$section['body'] .= '<h6 style="font-size:22px;font-weight:500;font-family:\'Lato\', sans-serif;color:#000">Dear, <span style="color:red">'.$email.'</span></h6>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 18px; font-weight: 400; color: #000;">ONE OF MORE OF THE FOLLOWING MUST BE TRUE IN ORDER FOR YOU TO USE THIS METHOD OF OBTAINING A US PASSPORT: </p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">1) You have never previously been issued a US passport.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">2)You have previously been issued a US Passport but were under the age of 16 when it was issued.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">3)Your most recent passport was issued over 15 years ago.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">4)Your existing passport was mutilated or somehow destroyed (washing machine etc.), but you still have it, or it remains in your possession.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">If you have any additional questions regarding your forms, instructions, or requirements, please call us at <a href="tel:(800) 783-8472">(800) 783-8472</a>, and we will be happy to assist.</p><br>';
			$section['body'] .= '<p style="font-family: \'Lato\', sans-serif; font-size: 14px; font-weight: 400; color: #000;">Thank you again for visiting RJR!</p>';
			$section['body'] .= '</td>';

			$section['subject'] = 'Passport Requirements For Passport Renewal';
			$body = $this->load->view('front/email/new_passport', $section, TRUE);
$file_path = FCPATH . 'requirements/3eb529e0ff25be3c4fa3622d566d07f6.pdf';

             $this->email->attach($file_path);
			$this->email->from('lucaswillis741@gmail.com','RJR Passports');
			$this->email->to($send_to);
			$this->email->subject($subject);
			$this->email->message($body);
			$mails = $this->email->send();
		}

		 $message  = 'Your message has been sent';
		echo  json_encode(array('id'=>'success','message'=>$message));
	}

	public function remove_item_ajax() {
		$this->load->library('cart');
	
		// Get the rowid and quantity before removing the item
		$rowid = $this->input->post('rowid');
		$item = $this->cart->get_item($rowid);
		$quantityBeforeRemoval = $item['qty'];
	
		// Set quantity to 0 to remove the item
		$data = array(
			'rowid' => $rowid,
			'qty'   => 0
		);
	
		// Update the cart
		$this->cart->update($data);
	
		// Get the updated quantity after removal
		$updatedItem = $this->cart->get_item($rowid);
		$quantityAfterRemoval = $updatedItem ? $updatedItem['qty'] : 0;
	
		// Check if the quantity is 0 after removal
		$isQuantityZero = ($quantityAfterRemoval === 0);
	
		$totalItems = $this->cart->total_items();
		$totalAmount = $this->cart->total();
	
		$response = array(
			'status' => 'success',
			'quantityBeforeRemoval' => $quantityBeforeRemoval,
			'quantityAfterRemoval' => $quantityAfterRemoval,
			'isQuantityZero' => $isQuantityZero,
			'rowid' => $rowid,
			'total_items' => $totalItems,
			'total_amount' => $totalAmount
		);
	
		// You can return a response if needed
		echo json_encode($response);
		exit;
	}
// 	public function process_payment() {
// 		try {
		    
		
// 			$cart_items = $this->cart->contents();

// 			// Process cart items
// 			$cart_item_names = [];
// 			foreach ($cart_items as $cart_item) {
// 				$cart_item_names[] = $cart_item['name'];
// 			}
// 			$cart_item_names_string = implode(', ', $cart_item_names);

// 			$cart_item_prices = []; // Initialize an array to store prices
// 			foreach ($cart_items as $cart_item) {
// 				$cart_item_prices[] = $cart_item['price']; // Add each price to the array
// 			}
// 			$cart_total_price = array_sum($cart_item_prices); // Sum up all the prices
//   $prices = array();

//         // Loop through each cart item
//         foreach ($cart_items as $index => $cart_item) {
//             // Accessing price from the POST data using the unique name generated earlier
//             $price = $_POST['cart_item'][$index]['price'];
//             // Storing price in the prices array
//             $prices[$index] = $price;
//         }
           

// 			// Additional processing and payment handling
// 			// Access API credentials from the loaded configuration
// 			$api_login_id = $this->config->item('authorize_net_api_login_id');
// 			$transaction_key = $this->config->item('authorize_net_transaction_key');
// 			$user_id =  $this->session->userdata('user_id');
// 			$userdata = $this->general->single('user',array('user_id' => $user_id));
// 			$user_email =  $userdata->user_email ?? $this->input->post('email_address');
// 			$user_name =  $userdata->user_name;
// 			$amount = $prices[$index];
// 			$fee =  $this->input->post('shipping_fee') ;
// 			$shipping_type =  $this->input->post('shipping_type');
// 			$phone = $this->input->post('phone');
// 			$company_name = $this->input->post('company_name');
// 			$contact_number =  $this->input->post('contact_number');
// 			$shipping_number  = $this->input->post('shipping_address');
// 			$customer_name_firstname = $this->input->post('first_name');
// 			$customer_name_lastname = $this->input->post('last_name') ;
// 			$cardNumber = $this->input->post('card_number');
// 			$expirationDate = $this->input->post('cexpdate');
// 			$cvv =  $this->input->post('ccode');
// 			$recipient = $this->session->userdata('recipient_address');
			
			
			
//             $pdfFilePath = $this->shipping_label->generateShippingLabel($recipient);
//             $label_shipping = basename($pdfFilePath);
          
// 			if (!is_numeric($amount) || $amount <= 0) {
// 				throw new Exception("Invalid amount");
// 			}

// 			// Initialize Authorize.Net configuration
// 			$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
// 			$merchantAuthentication->setName($api_login_id);
// 			$merchantAuthentication->setTransactionKey($transaction_key);

// 			// Create a reference ID
// 			$refId = 'ref' . time();

// 			// Create a payment transaction
// 			$transactionRequestType = new AnetAPI\TransactionRequestType();
// 			$transactionRequestType->setTransactionType("authCaptureTransaction");
// 			$transactionRequestType->setAmount($amount); // Use the provided amount

// 			// Set payment details with user-entered card information
// 			$payment = new AnetAPI\PaymentType();
// 			$creditCard = new AnetAPI\CreditCardType();
// 			$creditCard->setCardNumber($cardNumber);
// 			$creditCard->setExpirationDate($expirationDate);
// 			$creditCard->setCardCode($cvv);
// 			$payment->setCreditCard($creditCard);
// 			$transactionRequestType->setPayment($payment);

// 			// Set customer details
// 			$transactionRequestType->setBillTo(new AnetAPI\CustomerAddressType());
// 			$transactionRequestType->getBillTo()->setPhoneNumber($phone);
// 			$transactionRequestType->getBillTo()->setEmail($user_email);
// 			$transactionRequestType->getBillTo()->setFirstName($customer_name_firstname);
// 			$transactionRequestType->getBillTo()->setLastName($customer_name_lastname);
// 			$transactionRequestType->getBillTo()->setCompany($company_name);
// 			$transactionRequestType->getBillTo()->setAddress($shipping_number);

// 			// Create the transaction request
// 			$request = new AnetAPI\CreateTransactionRequest();
// 			$request->setMerchantAuthentication($merchantAuthentication);
// 			$request->setRefId($refId);
// 			$request->setTransactionRequest($transactionRequestType);

// 			// Execute the transaction request
// 			$controller = new AnetController\CreateTransactionController($request);
// 			$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

// 			// Handle the response
// 			if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
// 			    $this->cart->destroy();
// 				// Payment success handling
// 				$transactionResponse = $response->getTransactionResponse();
// 				$trannaction_id = $transactionResponse->getTransId();
// 				// Insert transaction data into database
// 				$transaction_data = array(
// 					'txn_id' => $trannaction_id,
// 					'user_id'=> $user_id ?? '',
// 					'name' => $cart_item_names_string,
// 					'email' => $user_email,
// 					'item_name' => $cart_item_names_string, // Insert concatenated names
// 					'item_number' => $refId, // Insert item number if available
// 					'item_price' => $amount, // Insert individual item price if available
// 					'item_price_currency' => 'USD', // Assuming currency is USD
// 					'card_number' => $cardNumber, // Insert card number
// 					'card_exp_month' => substr($expirationDate, 0, 2), // Extract month from expiration date
// 					'card_exp_year' => substr($expirationDate, -2), // Extract last two digits of year from expiration date
// 					'paid_amount' => $cart_total_price,
// 					'payment_status' => 'success', // Assuming payment status is success
// 					'payment_response' => $trannaction_id,
// 					'fedex_shipping_fee'=>$fee,
// 					'shipping_type'=>$shipping_type,
// 					'shipping_label'=>$label_shipping,
// 					'auth_code'=>$trannaction_id
// 				);

// 				$transaction_id = $this->general->gadd('transaction_details', $transaction_data);
// 				// Insert customer details into database
// 				if (!empty($transaction_id)) {
				    
// 				     $countries = $this->input->post('country');
//           $visa_statuses   =  $this->input->post('visa_status');
//           $countries_with_statuses = array();
//     foreach ($countries as $index => $country) {
//         $countries_with_statuses[$country] = $visa_statuses[$index];
//     }
//     $countries_and_statuses = serialize($countries_with_statuses);
           
// 					$customer_datails_data = array(
// 						'transaction_id' => $transaction_id,
// 						'firstname' => $customer_name_firstname,
// 						'middlename' =>$customer_name_lastname ,
// 						'lastname' => $customer_name_lastname,
// 						'company_name' =>$company_name ,
// 						'dob' =>$company_name ,
// 						'contact_number' =>$contact_number,
// 						'email_address' => $user_email,
// 						'confirm_email' =>$user_email,
// 						'shipping_address' => $shipping_number,
// 						'travel_departure' =>$shipping_number ,
// 						'travel_destinations'=>$countries_and_statuses

// 						// Include other customer details here
// 					);

// 					$customer_id =  $this->general->gadd('customer_details', $customer_datails_data);
// 					if (!empty($customer_id)) {

// 						$this->load->library('email');
// 						$config = array();
// 						$config['protocol']     = "smtp";
// 						$config['smtp_host']    = "smtp.gmail.com";
// 						$config['smtp_user']    = "lucaswillis741@gmail.com";
// 						$config['smtp_pass']    = "riyf trkd okkb gejo";
// 						$config['smtp_port']    = 465;
// 						$config['smtp_crypto']  = 'ssl';
// 						$config['smtp_timeout'] = 5;
// 						$config['mailtype']     = "html";
// 						$config['charset']      = "utf-8";
// 						$config['newline']      = "\r\n";
// 						$config['wordwrap']     = TRUE;
// 						$config['validate']     = FALSE;

// 						$this->email->initialize($config);
// 						$send_to = $user_email;
// 						$subject = 'Documenmts Requirement';
// 								$section['body'] =' <tr>
// 						<td bgcolor="#ffffff" align="left" style="padding: 50px 30px 50px 30px;">
// 							<h6 style="font-size: 22px; font-weight: 500; font-family: \'lato\'; color: #000; margin: 0;">Dear, {<span style="color: red;">'.$customer_name_firstname.' '.$customer_name_lastname.'</span>}</h6>
// 							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Thank you for previously placing your order with RJR Passports!</p>';
// 						$section['body'] .= '<!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Order Invoice</title>
//     <style>
//         body {
//             font-family: Arial, sans-serif;
//             line-height: 1.6;
//         }
//         .invoice-container {
//             max-width: 800px;
//             margin: 0 auto;
//             border: 1px solid #ccc;
//             border-radius: 5px;
//         }
//         .invoice-header {
//             background-color: #a5823e;
//             padding: 20px;
//             border-bottom: 1px solid #ccc;
//         }
//         .invoice-header h2 {
//             margin: 0;
//         }
//         .invoice-body {
//             padding: 20px;
//         }
//         .invoice-table {
//             width: 100%;
//             border-collapse: collapse;
//         }
//         .invoice-table th, .invoice-table td {
//             border: 1px solid #ccc;
//             padding: 8px;
//             text-align: left;
//         }
//         .invoice-footer {
//             background-color: #fff	;
//             padding: 20px;
//             border-top: 1px solid #ccc;
//         }
//         .footer-text {
//             margin: 0;
//         }
//     </style>
// </head>
// <body>
//     <div class="invoice-container">
//         <div class="invoice-header">
//             <h2 style="color: #fff;">Order Invoice('.$transaction_id.')  '.$currentDate.'</h2>
//         </div>
//         <div class="invoice-body">
//             <table class="invoice-table">
//                 <thead>
//                     <tr>
//                         <th>Order Name</th>
//                         <th>Order Price</th>
//                         <th>Shipping Name</th>
//                         <th>Shipping Fee</th>
//                     </tr>
//                 </thead>
//                 <tbody>
//                     <tr>
//                         <td>'.$cart_item_names_string.'</td>
//                         <td>$'.$amount.'</td>
//                         <td>'.$shipping_type.'</td>
//                         <td>$'.$fee.'</td>
//                     </tr>
//                     <!-- Add more rows for additional products if needed -->
//                 </tbody>
//             </table>
//         </div>
//         <div class="invoice-footer">
//             <p class="footer-text"  style="color: #000;">Thank you for your order!</p>
//         </div>
//     </div>
// </body>
// </html>';

// 					$section['body'] .= ' <p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Your order has been received and is currently being reviewed.</p>
// 							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">After reviewing your documents, we will inform you in the event there are any problems associated with your order. Otherwise assume your order is being processed according to your original order with us.</p>
// 							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">If you have any additional questions regarding your order, please call us at <a href="tel:8007838472">800.783.8472</a> , and we will be happy to assist you.</p>
// 							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Thank you,</p>
// 							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">RJR Passports</p>
// 						</td>
// 					</tr>';

// 						$section['subject'] = 'Document Requirements';
// 						$body = $this->load->view('front/email/passport_email', $section, TRUE);

// 						$this->email->from('ray@rjrpv.com','RJR Passports');
// 						$this->email->to($send_to);
// 						$this->email->subject($subject);
// 						$this->email->message($body);
// 						$mails = $this->email->send();
// 						if ($mails) {
// 							$link = base_url('document-requirements');
// 							$this->load->library('email');
// 							$config = array();
// 							$config['protocol']     = "smtp";
// 							$config['smtp_host']    = "smtp.gmail.com";
// 							$config['smtp_user']    = "lucaswillis741@gmail.com";
// 							$config['smtp_pass']    = "riyf trkd okkb gejo";
// 							$config['smtp_port']    = 465;
// 							$config['smtp_crypto']  = 'ssl';
// 							$config['smtp_timeout'] = 5;
// 							$config['mailtype']     = "html";
// 							$config['charset']      = "utf-8";
// 							$config['newline']      = "\r\n";
// 							$config['wordwrap']     = TRUE;
// 							$config['validate']     = FALSE;

// 							$this->email->initialize($config);
// 							$send_to = $user_email;
// 							$subject = 'Form Requirements';
// 							$section['body'] =' <tr>
// 						<td bgcolor="#ffffff" align="left" style="padding: 50px 30px 50px 30px;">
// 							<h6 style="font-size: 22px; font-weight: 500; font-family: \'lato\'; color: #000; margin: 0;">Dear, <span style="color: red;">'.$user_name.'</span></h6>
// 							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Thank you for placing your order with RJR </p>
// 							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;"><a href="'.$link.'" style="background-color: #a5823e; color: white; padding: 15px 25px; text-align: center; text-decoration: none; display: inline-block; border-radius: 5px;">Click here to download the Forms, instructions, Requirements for your order</a></p>
// 						</td>
// 					</tr>';
						
// 							$section['subject'] = 'Document Requirements';
// 							$body = $this->load->view('front/email/passport_email', $section, TRUE);

// 							$this->email->from('ray@rjrpv.com','RJR Passports');
// 							$this->email->to($send_to);
// 							$this->email->subject($subject);
// 							$this->email->message($body);
// 							$this->email->send();

// 						}
// //						$order_details = $this->general->single('transaction_details', array('user_id' => $user_id));
// 						$data['main_content'] = 'thankyou';
// 						$this->load->view('front/inc/view',$data );
// 					}
// 				}
// 			} else {
// 				// Payment failed handling
// 				$errorMessages = [];
// 				if ($response != null) {
// 					// Collect error messages
// 					$messages = $response->getMessages()->getMessage();
// 					foreach ($messages as $message) {
// 						// General error message for all card types
// 						$errorMessages[] = "Payment failed: " . $message->getText();
// 					}
// 				} else {
// 					// Handle general error
// 					$errorMessages[] = "An unexpected error occurred.";
// 				}
// 				// Handle the error (e.g., display error messages to the user)
// 				echo implode("<br>", $errorMessages);
// 			}
// 		} catch (Exception $e) {
// 			// Handle exceptions
// 			echo "An error occurred: " . $e->getMessage();
// 		}
// 	}

	public function process_payment() {
		try {
     
			$formdata = $this->session->userdata('form_data');

			$applicants = $this->session->userdata('application_data');

			$applicant_email  = $applicants[0]['email_address'];
			$applicant_first_name =  $applicants[0]['firstname'];
			$applicant_last_name =  $applicants[0]['lastname'];
			$applicant_company_name =  $applicants[0]['company_name'];
			$applicant_contact_number =  $applicants[0]['contact_number'];
			$applicant_email_address =  $applicants[0]['email_address'];
			$applicant_dob =$applicants[0]['dob'];

			$jsonApplicants = json_encode($applicants);
			$cart_items = $this->cart->contents();

			$cart_item_names = [];
			foreach ($cart_items as $cart_item) {
				$cart_item_names[] = $cart_item['name'];
			}
			$cart_item_names_string = implode(', ', $cart_item_names);

			$cart_item_prices = [];
			foreach ($cart_items as $cart_item) {
				$cart_item_prices[] = $cart_item['price'];
			}
			$cart_total_price = array_sum($cart_item_prices);
  			$prices = array();

        foreach ($cart_items as $index => $cart_item) {
            $price = $_POST['cart_item'][$index]['price'];
            $prices[$index] = $price;
        }

			$api_login_id = $this->config->item('authorize_net_api_login_id');
			$transaction_key = $this->config->item('authorize_net_transaction_key');
// 			$user_id =  $this->session->userdata('user_id');
// 			$userdata = $this->general->single('user',array('user_id' => $user_id));
// 			$user_name =  $userdata->user_name;
			$amount = $prices[$index];
		
			$fee =  $this->input->post('shipping_fee') ;
		
			$shipping_type =  $this->input->post('shipping_type');
			$phone = $this->input->post('phone');
			$shipping_number  = $formdata['shipping_address'];
           
			$customer_name_firstname = $this->input->post('first_name');

			$customer_name_lastname = $this->input->post('last_name') ;
			$cardNumber = $this->input->post('card_number');
			$expirationDate = $this->input->post('cexpdate');
			$cvv =  $this->input->post('ccode');
			$recipient_data = $this->session->userdata('recipient_address');
			    
		    $recipient =  array(
	            'address' =>$recipient_data['address'] ,
	            'city' => $recipient_data['city'],
	            'state' =>$recipient_data['state'] ,
	            'zipcode' => $recipient_data['zipcode'],
	            'person_name' => $recipient_data['person_name'][0],
	            'contact_number'=>$recipient_data['contact_number'][0],
	            'rate_type' =>$_POST['shipping_type'],
	           
	        );
	        
            $returned_data = $this->shipping_label->generateShippingLabel($recipient);
           
             $trackingNumber = $returned_data['trackingNumber'];
            $pdfFilePath = $returned_data['pdfFilePath'];
            $label_shipping = basename($pdfFilePath);
            
		
			if (!is_numeric($amount) || $amount <= 0) {
				throw new Exception("Invalid amount");
			}

			// Initialize Authorize.Net configuration
			$merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
			$merchantAuthentication->setName($api_login_id);
			$merchantAuthentication->setTransactionKey($transaction_key);

			// Create a reference ID
			$refId = 'ref' . time();

			// Create a payment transaction
			$transactionRequestType = new AnetAPI\TransactionRequestType();
			$transactionRequestType->setTransactionType("authCaptureTransaction");
			$transactionRequestType->setAmount($amount); // Use the provided amount

			// Set payment details with user-entered card information
			$payment = new AnetAPI\PaymentType();
			$creditCard = new AnetAPI\CreditCardType();
			$creditCard->setCardNumber($cardNumber);
			$creditCard->setExpirationDate($expirationDate);
			$creditCard->setCardCode($cvv);
			$payment->setCreditCard($creditCard);
			$transactionRequestType->setPayment($payment);
			date_default_timezone_set('America/New_York');
			$currentDate = date('m/d/Y');

			// Set customer details
			$transactionRequestType->setBillTo(new AnetAPI\CustomerAddressType());
			$transactionRequestType->getBillTo()->setPhoneNumber($phone);
			$transactionRequestType->getBillTo()->setEmail($applicant_email);
			$transactionRequestType->getBillTo()->setFirstName($applicant_first_name);
			$transactionRequestType->getBillTo()->setLastName($applicant_last_name);
			$transactionRequestType->getBillTo()->setCompany($applicant_company_name);
			$transactionRequestType->getBillTo()->setAddress($shipping_number);

			// Create the transaction request
			$request = new AnetAPI\CreateTransactionRequest();
			$request->setMerchantAuthentication($merchantAuthentication);
			$request->setRefId($refId);
			$request->setTransactionRequest($transactionRequestType);

			// Execute the transaction request
			$controller = new AnetController\CreateTransactionController($request);
			$response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

			// Handle the response
			if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
			    $this->cart->destroy();
				// Payment success handling
				$transactionResponse = $response->getTransactionResponse();
				$trannaction_id = $transactionResponse->getTransId();
				// Insert transaction data into database
				$transaction_data = array(
					'txn_id' => $trannaction_id,
					'user_id'=> $user_id ?? '',
					'name' => $cart_item_names_string,
					'email' => $applicant_email,
					'item_name' => $cart_item_names_string,
					'item_number' => $refId,
					'item_price' => $amount,
					'item_price_currency' => 'USD',
					'card_number' => $cardNumber,
					'card_exp_month' => substr($expirationDate, 0, 2),
					'card_exp_year' => substr($expirationDate, -2),
					'paid_amount' => $cart_total_price,
					'payment_status' => 'success',
					'payment_response' => $trannaction_id,
					'fedex_shipping_fee'=>$fee,
					'shipping_type'=>$shipping_type,
					'shipping_label'=>$label_shipping,
					'auth_code'=>$trannaction_id
				);

				$transaction_id = $this->general->gadd('transaction_details', $transaction_data);
				if (!empty($transaction_id)) {
				    
		 
				     $countries = $this->input->post('country');
					$visa_statuses = $this->input->post('visa_required_results');
					$countries_with_statuses = array();

					foreach ($countries as $index => $country) {
						if (!empty($visa_statuses[$index])) {
							$countries_with_statuses[$country] = "I want to be contacted";
						} else {
							$countries_with_statuses[$country] = "I don't want to be contacted";
						}
					}
    				$countries_and_statuses = serialize($countries_with_statuses);
					$customer_datails_data = array(
						'transaction_id' => $transaction_id,
						'firstname' => $applicant_first_name,
						'middlename' =>$applicant_last_name ,
						'lastname' => $applicant_last_name,
						'company_name' =>$applicant_company_name ,
						'dob' =>$applicant_dob ,
						'contact_number' =>$applicant_contact_number,
						'email_address' => $applicant_email_address,
						'confirm_email' =>$applicant_email_address,
						'shipping_address' => $shipping_number,
						'travel_departure' =>$shipping_number ,
						'travel_destinations'=>$countries_and_statuses,
						'applicants_data' =>$jsonApplicants
					);

					$customer_id =  $this->general->gadd('customer_details', $customer_datails_data);
					if (!empty($customer_id)) {

						$this->load->library('email');
						$config = array();
						$config['protocol']     = "smtp";
						$config['smtp_host']    = "smtp.gmail.com";
						$config['smtp_user']    = "lucaswillis741@gmail.com";
						$config['smtp_pass']    = "riyf trkd okkb gejo";
						$config['smtp_port']    = 465;
						$config['smtp_crypto']  = 'ssl';
						$config['smtp_timeout'] = 5;
						$config['mailtype']     = "html";
						$config['charset']      = "utf-8";
						$config['newline']      = "\r\n";
						$config['wordwrap']     = TRUE;
						$config['validate']     = FALSE;

						$this->email->initialize($config);
						$send_to = $applicant_email;
						$subject = 'Documenmts Requirement';
						$section['body'] =' <tr>
						<td bgcolor="#ffffff" align="left" style="padding: 50px 30px 50px 30px;">
							<h6 style="font-size: 22px; font-weight: 500; font-family: \'lato\'; color: #000; margin: 0;">Dear, {<span style="color: red;">'.$applicant_first_name.' '.$applicant_last_name.'</span>}</h6>
							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Thank you for previously placing your order with RJR Passports!</p> <br><p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Your tracking number is: '.$trackingNumber.' </p>';
							
							
						$section['body'] .= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .invoice-header {
            background-color: #a5823e;
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        .invoice-header h2 {
            margin: 0;
        }
        .invoice-body {
            padding: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .invoice-footer {
            background-color: #fff	;
            padding: 20px;
            border-top: 1px solid #ccc;
        }
        .footer-text {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h2 style="color: #fff;">Order Invoice('.$transaction_id.')  '.$currentDate.'</h2>
        </div>
        <div class="invoice-body">
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Order Name</th>
                        <th>Order Price</th>
                        <th>Shipping Name</th>
                        <th>Shipping Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>'.$cart_item_names_string.'</td>
                        <td>$'.$amount.'</td>
                        <td>'.$shipping_type.'</td>
                        <td>$'.$fee.'</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        <div class="invoice-footer">
            <p class="footer-text"  style="color: #000;">Thank you for your order!</p>
        </div>
    </div>
</body>
</html>';

					$section['body'] .= ' <p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Your order has been received and is currently being reviewed.</p>
							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">After reviewing your documents, we will inform you in the event there are any problems associated with your order. Otherwise assume your order is being processed according to your original order with us.</p>
							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">If you have any additional questions regarding your order, please call us at 800.783.8472 (Allow link), and we will be happy to assist you.</p>
							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Thank you,</p>
							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">RJR Passports</p>
						</td>
					</tr>';
			$section['subject'] = 'Document Requirements';
						$body = $this->load->view('front/email/passport_email', $section, TRUE);

						$this->email->from('ray@rjrpv.com','RJR Passports');
						$this->email->to($send_to);
						$this->email->subject($subject);
						$this->email->message($body);
						$mails = $this->email->send();
						if ($mails) {
							$link = base_url('document-requirements');
							$this->load->library('email');
							$config = array();
							$config['protocol']     = "smtp";
							$config['smtp_host']    = "smtp.gmail.com";
							$config['smtp_user']    = "lucaswillis741@gmail.com";
							$config['smtp_pass']    = "riyf trkd okkb gejo";
							$config['smtp_port']    = 465;
							$config['smtp_crypto']  = 'ssl';
							$config['smtp_timeout'] = 5;
							$config['mailtype']     = "html";
							$config['charset']      = "utf-8";
							$config['newline']      = "\r\n";
							$config['wordwrap']     = TRUE;
							$config['validate']     = FALSE;

							$this->email->initialize($config);
							$send_to = $applicant_email;
							$subject = 'Form Requirements';
							$section['body'] =' <tr>
						<td bgcolor="#ffffff" align="left" style="padding: 50px 30px 50px 30px;">
							<h6 style="font-size: 22px; font-weight: 500; font-family: \'lato\'; color: #000; margin: 0;">Dear, <span style="color: red;">'.$applicant_first_name.'</span></h6>
							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;">Thank you for placing your order with RJR </p>
							<p style="font-family: \'lato\'; font-size: 18px; font-weight: 400; color: #000;"><a href="'.$link.'" style="background-color: #a5823e; color: white; padding: 15px 25px; text-align: center; text-decoration: none; display: inline-block; border-radius: 5px;">Click here to download the Forms, instructions, Requirements for your order</a></p>
						</td>
					</tr>';
						
							$section['subject'] = 'Document Requirements';
							$body = $this->load->view('front/email/passport_email', $section, TRUE);

							$this->email->from('ray@rjrpv.com','RJR Passports');
							$this->email->to($send_to);
							$this->email->subject($subject);
							$this->email->message($body);
							$this->email->send();

						}
//						$order_details = $this->general->single('transaction_details', array('user_id' => $user_id));
						$data['main_content'] = 'thankyou';
						$this->load->view('front/inc/view',$data );
					}
				}
			} else {
				// Payment failed handling
				$errorMessages = [];
				if ($response != null) {
					// Collect error messages
					$messages = $response->getMessages()->getMessage();
					foreach ($messages as $message) {
						// General error message for all card types
						$errorMessages[] = "Payment failed: " . $message->getText();
					}
				} else {
					// Handle general error
					$errorMessages[] = "An unexpected error occurred.";
				}
				// Handle the error (e.g., display error messages to the user)
				echo implode("<br>", $errorMessages);
			}
		} catch (Exception $e) {
			// Handle exceptions
			echo "An error occurred: " . $e->getMessage();
		}
	}

public function applications_list()
    {

  		$query = $this->db->query("SELECT * FROM transaction_details");
// 		$data['results'] = $query->result_array();
		$data['transactions'] = $query->result_array();
	
        $data['page'] = 'admin/user/applications-list';
        $this->load->view('admin/inc/render', $data);
    }



	public function thankyou()
	{
		$data['main_content'] = 'thankyou';
		$this->load->view('front/inc/view',$data);

	}

	public function email_front()
	{
		$data['main_content'] = 'email';
		$this->load->view('front/inc/view',$data);
	}
	public function documents()
	{
		$data['main_content'] = 'document-requirements';
		$this->load->view('front/inc/view',$data);

	}
		public function application_detail($id)
	{
	   
		$query = $this->db->query("SELECT * FROM transaction_details WHERE id ={$id}");
	
        $data['application_detail'] = $query->result_array();
        $user_id = $data['application_detail'][0]['user_id'];
         $selected_documents = $this->documents->get_user_documents($user_id); // Replace 'your_model_name' with your actual model name
    
    // Pass the selected documents data to the view if there are records, otherwise, don't pass any data
    $data['selected_documents'] = $selected_documents ? $selected_documents : array();
        $docsquery = $this->db->query("SELECT * FROM user_documents WHERE user_id ={$user_id}");
        $data['docs'] = $docsquery->result_array();
		$data['page'] = 'admin/user/application-detail';
        $this->load->view('admin/inc/render', $data);
	}
	
	
	public function visa_leads()
    {

  		$query = $this->db->query("SELECT * FROM visa_app_leads");

    	$data['leads'] = $query->result_array();
	
        $data['page'] = 'admin/user/visa-leads';
        $this->load->view('admin/inc/render', $data);
    }
            
            
	public  function get_all_countries(){
		$query = $this->db->query("SELECT * FROM rjr_countries");
		$countries = $query->result_array();
		header('Content-Type: application/json');
		echo json_encode($countries); // Return countries as JSON
	}
	
}