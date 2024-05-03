<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ecom_process extends Front_Controller
{
	public function cart_insert()
	{
		$prodetails = $this->global_model->records_single('product',array('product_id'=>$_POST['product_id']));	
		$brand = get_name_by_id('brand',$prodetails->brand_id);

		$data['id'] = $_POST['product_id'];
		$data['qty'] = $_POST['product_qty'];
		$data['size'] = $_POST['product_size'];
		$color = $prodetails->product_color_id; 

		if($data['size'][0] == "A")
		{
			$size = str_replace('A','', $data['size']);
			$weight = $prodetails->product_weight; 
			$DisPrice = $prodetails->product_discounted_price;
			$RegPrice = $prodetails->product_regular_price;
			$Quantity = $prodetails->product_quantity;

			if($DisPrice > 0)
			{
				$price = $DisPrice;
			}
			else
			{
				$price = $RegPrice;
			}

		}
		elseif($data['size'][0] == "B")
		{
			$size = str_replace('B','', $data['size']);
			$weight = $prodetails->product_weight; 
			$DisPrice = $this->global_model->coloum_record_one('product_variant',array('product_id'=>$_POST['product_id'],'product_size_id'=>$size),'product_discounted_price');
			$RegPrice = $this->global_model->coloum_record_one('product_variant',array('product_id'=>$_POST['product_id'],'product_size_id'=>$size),'product_regular_price');
			$Quantity = $this->global_model->coloum_record_one('product_variant',array('product_id'=>$_POST['product_id'],'product_size_id'=>$size),'product_weight');;

			if($DisPrice > 0)
			{
				$price = $DisPrice;
			}
			else
			{
				$price = $RegPrice;
			}
		}

		$this->cart->product_name_rules= "\d\D";
		foreach($this->cart->contents() as $item)
		{
			if(($_POST['product_id'] == $item['id']) && ($size == $item['options']['size']))
			{
				if($item['qty']+$_POST['product_qty'] > $Quantity){
					$response = array(
						'status' => 5,
					);
					echo json_encode($response);
					die;	    
				}

			}
			
		}
		
		$data['name'] = $prodetails->product_name;	
		$data['image'] = $prodetails->product_image;
		$data['options'] = array(
			'brand' => $brand,
			'size' =>$size,
			'color' =>$color,
			'weight' =>$weight
		);
		$data['price'] = $price;
		$result = $this->cart->insert($data);
		$response = array(
			'imagePath' => base_url('uploads/product/').$prodetails->product_image,
			'brand' => $brand,
			'color' => $color ,
			'size' =>  $size,
			'productName' =>  $prodetails->product_name,
			'total_in_cart' => count($this->cart->contents()),
			'status' => 1,
			'cartTotal' => ($this->cart->total()),
		);
		echo json_encode($response);
		
	}
	public function check_cart()
	{
		$response = array(
			'total_in_cart' => count($this->cart->contents()),
			'status' => 1,
			'cartTotal' => ($this->cart->total())
		);
		echo json_encode($response);
	}

	public function change_currency()
	{
		$currency = $_POST['currency'];

		if($currency == "USD")
		{
			$this->session->set_userdata('currency','USD');
			echo 1;
		}
		elseif($currency == "SAR")
		{
			$this->session->set_userdata('currency','SAR');
			echo 1;
		}
		elseif($currency == "EUR")
		{
			$this->session->set_userdata('currency','EUR');
			echo 1;
		}

	}

	public function wish()
	{
		if($this->session->userdata('customer_email'))
		{
			$wish_pro_id = $this->global_model->coloum_record_one('wishlist',array('product_id'=>$_POST['product_id']),'product_id');
			$wish_cus_id = $this->global_model->coloum_record_one('wishlist',array('customer_id'=> $this->session->userdata('customer_id')),'customer_id');
			if($wish_pro_id == $_POST['product_id'] && $wish_cus_id == $this->session->userdata('customer_id'))
			{				
				echo 3;
			}
			else
			{
				$data['product_id'] = $_POST['product_id'];
				$data['customer_id'] = $this->session->userdata('customer_id');

				$result = $this->global_model->insert_record('wishlist',$data);			
				if($result){	
					echo 1;
				}else{			
					echo 2;
				}
			}
		}
		else
		{
			echo 4;	
		}	
	}
	
	public function pro_check()
	{
	    
	    if($_POST['size'][0] == "B")
	    {
	        $idPro = str_replace('B','', $_POST['size']);
	         $result = $this->global_model->records_single('product_variant',array('product_size_id'=>$idPro,'product_id' => $_POST['product_id']));
	        
	       $response = array(
	           'new_regular_price' => $result->product_regular_price,
	           'new_discounted_price' => $result->product_discounted_price,
	           'new_saving' => ($result->product_regular_price-$result->product_discounted_price),
	           'new_saving_def' => round((($result->product_regular_price-$result->product_discounted_price)/$result->product_regular_price)*100,2)
	           );
	           
	           echo json_encode($response);
	    }
	    else
	    {
	        $idPro = str_replace('A','', $_POST['size']);
	       $result = $this->global_model->records_single('product',array('product_size_id'=>$idPro,'product_id' => $_POST['product_id']));
	       $response = array(
	           'new_regular_price' => $result->product_regular_price,
	           'new_discounted_price' => $result->product_discounted_price,
	           'new_saving' => ($result->product_regular_price-$result->product_discounted_price),
	           'new_saving_def' => round((($result->product_regular_price-$result->product_discounted_price)/$result->product_regular_price)*100,2)
	           );
	           echo json_encode($response);
	    }
	}
	
	public function check_coupon()
	{
		$VoucherCouponAmount = coloum_record_one('voucher_coupon',array('voucher_coupon_name'=>$this->input->post('coupon')),'voucher_coupon_amount');
		if(!empty($VoucherCouponAmount))
		{
			$response = array(
				'resultstatus' => 1,
				'amount' => $VoucherCouponAmount
			);
			echo json_encode($response);
		}
		else
		{
			$response = array(
				'resultstatus' => 2,
			);
			echo json_encode($response);
		}
	}


	public function updatecart()
	{	
		if(!empty($_POST['proid']) && !empty($_POST['colorid']) && !empty($_POST['sizeid']))
		{
			$actualQuantityUpdate = $this->global_model->coloum_record_one('product_variant',array('product_id'=>$_POST['proid'],'product_color_id'=> $_POST['colorid'],'product_size_id'=>$_POST['sizeid']),'quantity');
			if(empty($actualQuantityUpdate))
			{
				$actualQuantityUpdate = $this->global_model->coloum_record_one('product',array('product_id'=>$_POST['proid']),'product_quantity');
			}
			if($_POST['qty'] > $actualQuantityUpdate)
			{
				echo 3;
				die;
			}
		}

		

		$data = array(
			'rowid' => $_POST['id'],
			'qty'   => $_POST['qty'],
		);
		$result = $this->cart->update($data);
		if($result)
		{	
			echo 1;
		}
		else
		{			
			echo 2;
		}		
	}

	public function apply_coupon()
	{	
		$code = $_POST['coupon_code'];
		$result = $this->global_model->records_single('coupon',array('coupon_code'=>$code));
		$ip = $this->input->ip_address();
		if($result)
		{
			$this->session->set_userdata('coupon_code', $_POST['coupon_code']);
			echo 1;
		}
		else
		{
			echo 2;
		}			
	}

	public function get_cities()
	{		
		$country = $this->input->post("id");
		$options = $this->global_model->records_all('cities',array('country_code'=>$country));
		echo '<option value="">Please Select</option>';
		foreach($options as $option)
		{
			echo '<option value="'. $option->name .'">'. $option->name .'</option>';
		}
		return;	
	}

	
	
	public function request_product()
	{
		$productName =   coloum_record_one('product',array('product_id'=>$this->input->post("product_id")),'product_name');
		$productColor =   coloum_record_one('product_color',array('product_color_id'=>$this->input->post("color_variant")),'product_color_name');
		$productSize =   coloum_record_one('product_size',array('product_size_id'=>$this->input->post("size_variant")),'product_size_name');
		$productQuantity =  $this->input->post("product_qty");
		$section['body'] = '<table width="100%" border="1px" >';
		$section['body'] .='<tr><td>Product Name:</td><td>'.$productName.'<td></tr>';
		$section['body'] .='<tr><td>Size:</td><td>'.$productColor.'<td></tr>';
		$section['body'] .='<tr><td>Color:</td><td>'.$productSize.'<td></tr>';
		$section['body'] .='<tr><td>Quantity:</td><td>'.$productQuantity.'<td></tr>';
		$section['body'] .='<br>';
		$section['body'] .='<tr><td>Customer product request</td></tr>';
		$section['body'].= '</table>';
		$data = array(
			'product'=> $productName,
			'color'=> $productColor,
			'size'=> $productSize,
			'quantity'=> $productQuantity,
		);
		$this->global_model->insert_record('requested_products',$data);
		$section['subject'] = 'Product Request From Aptandidle';
		$body = $this->load->view('email/template',$section, TRUE);
		$result = send_email('sartaj.akbar@informiatech.com','Product Request From Aptandidle',$body);
		echo 1;
	}


	public function proceed_checkout()
	{
		if(!empty($_POST))
		{
			$VoucherCoupon = $this->input->post('voucher_coupon');
			$UnConvertedVerifiedVoucherCouponAmount = coloum_record_one('voucher_coupon',array('voucher_coupon_name'=>$VoucherCoupon),'voucher_coupon_amount');
			
			$VerifiedVoucherCouponAmount = round($UnConvertedVerifiedVoucherCouponAmount,2);

			$grandTotal = str_replace(',','',get_grand_total());
			$shippingRates = 0;//$this->aramex_ship_calculate($country,$state);
			$voucherAmountAvailed = 0;
			
			if(!empty($VerifiedVoucherCouponAmount))
			{
				if($grandTotal < $VerifiedVoucherCouponAmount)
				{
					$VerifiedVoucherCouponAmountUpdate = $VerifiedVoucherCouponAmount-$grandTotal;
					$this->global_model->update_record('voucher_coupon',array('voucher_coupon_amount'=>$VerifiedVoucherCouponAmountUpdate),array('voucher_coupon_name' => $VoucherCoupon));
					$grandTotal = 0;
					$voucherAmountAvailed = $VerifiedVoucherCouponAmount-$VerifiedVoucherCouponAmountUpdate;
				}
				else
				{
					$this->global_model->update_record('voucher_coupon',array('voucher_coupon_amount'=>0),array('voucher_coupon_name' => $VoucherCoupon));
					$grandTotal = $grandTotal - $VerifiedVoucherCouponAmount;
					$voucherAmountAvailed = $VerifiedVoucherCouponAmount;
				}
			}
			
			$totalToPay = $grandTotal + $shippingRates;
			
			$today = date("Ymd");
			$rand = strtoupper(substr(uniqid(sha1(time())),0,12));
			$unique = $today . $rand;
			$orders_no = $unique;
			$data['orders_no'] = $orders_no;
			
			$data['orders_sub_total_amt'] = round((get_sub_total()),2);
			$data['orders_diss_amt'] = round((get_discounted_amount()),2);
			$data['orders_total_amt'] = round($grandTotal,2);
			$data['shipping_charges'] = round($shippingRates,2);
			
			$data['total_with_ship'] = round($totalToPay,2);
			$data['voucher_discount_amount'] = round($voucherAmountAvailed,2);
			
			$data['order_type'] = "UNPAID";
			$data['currency'] = $this->currency;
			if($this->session->userdata('customer_id'))
			{
				$data['customer_id'] = $this->session->userdata('customer_id');		
			}
			foreach($_POST as $key => $val)
			{
				$data[$key] = $this->input->post($key,TRUE);
			}	
			$address = $_POST['address']; 
			$orders_id = $this->global_model->insert_record('orders',$data);
			$this->session->set_userdata('orders_no',$orders_no);
			foreach ($this->cart->contents() as $items)
			{
				$data2['orders_id'] = $orders_id;
				$data2['orders_no'] = $orders_no;
				$data2['product_id'] = $items["id"];
				$data2['product_name'] = $items["name"];
				$data2['product_qty'] = $items["qty"];
				$data2['color'] =  $items["options"]['color'];
				$data2['size'] =  $items["options"]['size'];
				$data2['product_price'] = round($items["price"],2);
				$data2['order_items_total_amt'] = round($items["subtotal"],2);
				$this->global_model->insert_record('order_items',$data2);				
			}

			
			$totalToPay = round($totalToPay,2);
			
			$section['body'] = '<table width="100%" border="1px" >';
			$section['body'] .='<tr><td>First Name:</td><td>'.$this->input->post("first_name").'<td></tr>';
			$section['body'] .='<tr><td>Last Name:</td><td>'.$this->input->post("last_name").'<td></tr>';
			$section['body'] .='<tr><td>Email Address:</td><td>'.$this->input->post("email").'<td></tr>';
			$section['body'] .='<tr><td>Phone Number:</td><td>'.$this->input->post("phone").'<td></tr>';
			$section['body'] .='<tr><td>Street:</td><td>'.$address.'<td></tr>';
			$section['body'] .='<br>';

			foreach($this->cart->contents() as $email_product)
			{
				$section['body'] .='<tr><td>Product Name:</td><td>'.$email_product["name"].'<td></tr>';
				$section['body'] .='<tr><td>Product Quantity:</td><td>'.$email_product["qty"].'<td></tr>';
				$section['body'] .='<tr><td>Product Price:</td><td>'.$email_product["price"].'<td></tr>';
				$section['body'] .='<tr><td>Product Color:</td><td>'.coloum_record_one('product_color',array('product_color_id'=>$email_product["options"]['color']),'product_color_name').'<td></tr>';
				$section['body'] .='<tr><td>Product Size:</td><td>'.coloum_record_one('product_size',array('product_size_id'=>$email_product["options"]['size']),'product_size_name').'<td></tr>';
				$section['body'] .='<td></tr>';
				$section['body'] .='<br>';
			}
			$section['body'] .='<tr><td>Currency:</td><td>'.$this->currency.'<td></tr>';
			$section['body'] .='<tr><td>Sub Total:</td><td>'.$data['orders_sub_total_amt'].'<td></tr>';
			$section['body'] .='<tr><td>Discount Amount:</td><td>'.$data['orders_diss_amt'].'<td></tr>';
			$section['body'] .='<tr><td>Shipping Amount:</td><td>'.$shippingRates.'<td></tr>';
			$section['body'] .='<tr><td>Order Total:</td><td>'.($totalToPay).'<td></tr>';
			$section['body'] .='<tr><td>Thankyou For Your Purchase</td></tr>';
			$section['body'].= '</table>';


			$section['subject'] = 'New order from weltelonline';
			$body = $this->load->view('email/template',$section, TRUE);
			//$result = send_email('sartaj.akbar@informiatech.com','New order from aptandidle',$body);
			
			if(isset($_SESSION['coupon_code']) && !empty($this->session->userdata('coupon_code')))
			{
				$coupons = $this->global_model->coloum_record_one('coupon',array('coupon_code'=> $this->session->userdata('coupon_code')),'coupon_id');
				if($coupons ){
					$data3['coupon_id'] = $coupons;
					$data3['orders_id'] = $orders_id;
					$data3['orders_no'] = $orders_no;
					$data3['coupon_availed_ip'] = $this->input->ip_address();
					$this->global_model->insert_record('coupon_availed',$data3);
				}	
			}
			
			
			if($_POST['cod_check'] == "yes")
			{
				$this->success_checkout();
			}
			else
			{
				$returnSucc = base_url('ecom_process/telr_success');
				$returnCancel = base_url('ecom_process/telr_cancel');
				$this->telr_pay($orders_no,$totalToPay,$returnSucc,$returnCancel);
			}	
		}
		else
		{
			redirect('sign-in');
		}
	}


//======================================================= TAPS GATEWAY===========================================================================	
	public function telr_success()
	{
		$LastOrderedItems = $this->global_model->records_all('order_items',array('orders_no' => $this->session->userdata('orders_no')));
		foreach($LastOrderedItems as $updating)
		{
			$variantQuantity = $this->global_model->records_single('product_variant',array('product_size_id' => $updating->size,'product_id'=>$updating->product_id));
			if(empty($variantQuantity))
			{
				$productData = $this->global_model->records_select('product_quantity','product',array('product_id'=>$updating->product_id)); 
				if($productData->product_quantity <= 5)
				{
					$productDetails = $this->global_model->records_select('product_name,product_color_id,product_size_id,product_quantity','product',array('product_id' =>$updating->product_id));

					$section['body'] = '<table width="100%" border="1px" >';
					$section['body'] .='<tr><td>Product Name:</td><td>'.$productDetails->product_name.'<td></tr>';
					$section['body'] .='<tr><td>Product Color:</td><td>'.$this->global_model->coloum_record_one('product_color',array('product_color_id' => $productDetails->product_color_id),'product_color_name').'<td></tr>';
					$section['body'] .='<tr><td>Quantity Avaliable:</td><td>'.$productDetails->product_quantity.'<td></tr>';
					$section['body'] .='<tr><td>Auto generated email from weltel</td></tr>';
					$section['body'].= '</table>';
					$section['subject'] = 'ALERT! Product Quantity Low';
					$body = $this->load->view('email/template',$section, TRUE);
					$result = send_email('sartaj.akbar@informiatech.com','ALERT! Product Quantity Low',$body);
				}

				$productData = $this->global_model->records_select('product_quantity','product',array('product_id'=>$updating->product_id)); 
				$newQty =$productData->product_quantity - $updating->product_qty;
				$this->global_model->update_record('product',array('product_quantity' => $newQty),array('product_id'=>$updating->product_id));
			}
			else
			{
				$productData = $this->global_model->records_select('quantity','product_variant',array('product_size_id' => $updating->size,'product_color_id'=>$updating->color,'product_id'=>$updating->product_id)); 
				$newQty =$productData->quantity - $updating->product_qty;

				if($productData->quantity <= 5)
				{
					$productDetails = $this->global_model->records_select('product_name','product',array('product_id' =>$updating->product_id));

					$section['body'] = '<table width="100%" border="1px" >';
					$section['body'] .='<tr><td>Product Name:</td><td>'.$productDetails->product_name.'<td></tr>';
					$section['body'] .='<tr><td>Product Size:</td><td>'.$this->global_model->coloum_record_one('product_size',array('product_size_id' => $updating->size),'product_size_name').'<td></tr>';
					$section['body'] .='<tr><td>Product Color:</td><td>'.$this->global_model->coloum_record_one('product_color',array('product_color_id' => $updating->color),'product_color_name').'<td></tr>';
					$section['body'] .='<tr><td>Quantity Avaliable:</td><td>'.$newQty.'<td></tr>';
					$section['body'] .='<tr><td>Auto generated email from aptandidle.com</td></tr>';
					$section['body'].= '</table>';
					$section['subject'] = 'ALERT! Product Quantity Low';
					$body = $this->load->view('email/template',$section, TRUE);
					$result = send_email('sartaj.akbar@informiatech.com','ALERT! Product Quantity Low',$body);
				}

				$this->global_model->update_record('product_variant',array('quantity' => $newQty),array('product_size_id' => $updating->size,'product_color_id'=>$updating->color,'product_id'=>$updating->product_id));
			}

		}


		$data = array(
			'order_type' => 'PAID',
		);
		$this->global_model->update_record('orders',$data,array('orders_no' => $this->session->userdata('orders_no')));
		$this->session->set_flashdata('msg', '1');
		$this->session->set_flashdata('alert_data', 'ORDER COMPLETED, KINDLY CHECK IN DASHBOARD');
		$this->cart->destroy();
		redirect('home');
	}

	public function telr_cancel()
	{
		$this->session->set_flashdata('msg', '2');
		$this->session->set_flashdata('alert_data', 'ORDER FAILED, TRY AGAIN');
		redirect('home');
	}

	public function telr_pay($orders_no,$totalToPay,$returnSucc,$returnCancel)
	{
		$params = array(
			'ivp_method'  => 'create',
			'ivp_store'   => '23192',
			'ivp_authkey' => 'SrPCT~gmj8g#t8vW',
			'ivp_cart'    =>  $orders_no,  
			'ivp_test'    => '1',
			'ivp_amount'  =>  $totalToPay,
			'ivp_currency'=> 'AED',
			'ivp_desc'    => 'Purchase from weltelonline',
			'return_auth' =>  $returnSucc,
			'return_can'  =>  $returnCancel,
			'return_decl' => 'https://domain.com/return.html'
		);


		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
		curl_setopt($ch, CURLOPT_POST, count($params));
		curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
		$results = curl_exec($ch);
		curl_close($ch);
		$results = json_decode($results,true);
		$ref= trim($results['order']['ref']);
		$url= trim($results['order']['url']);
		redirect($url);
	}

	public function success_checkout()
	{


		$this->session->unset_userdata('coupon_code');

		$LastOrderedItems = $this->global_model->records_all('order_items',array('orders_no' => $this->session->userdata('orders_no')));

		foreach($LastOrderedItems as $updating)
		{
			$variantQuantity = $this->global_model->records_single('product_variant',array('product_size_id' => $updating->size,'product_color_id'=>$updating->color,'product_id'=>$updating->product_id));
			if(empty($variantQuantity))
			{

				$productData = $this->global_model->records_select('product_quantity','product',array('product_id'=>$updating->product_id)); 
				if($productData->product_quantity <= 5)
				{
					$productDetails = $this->global_model->records_select('product_name,product_color_id,product_size_id,product_quantity','product',array('product_id' =>$updating->product_id));

					$section['body'] = '<table width="100%" border="1px" >';
					$section['body'] .='<tr><td>Product Name:</td><td>'.$productDetails->product_name.'<td></tr>';
					$section['body'] .='<tr><td>Product Size:</td><td>'.$this->global_model->coloum_record_one('product_size',array('product_size_id' => $productDetails->product_size_id),'product_size_name').'<td></tr>';
					$section['body'] .='<tr><td>Product Color:</td><td>'.$this->global_model->coloum_record_one('product_color',array('product_color_id' => $productDetails->product_color_id),'product_color_name').'<td></tr>';
					$section['body'] .='<tr><td>Quantity Avaliable:</td><td>'.$productDetails->product_quantity.'<td></tr>';
					$section['body'] .='<tr><td>Auto generated email from aptandidle.com</td></tr>';
					$section['body'].= '</table>';
					$section['subject'] = 'ALERT! Product Quantity Low';
					$body = $this->load->view('email/template',$section, TRUE);
					$result = send_email('sartaj.akbar@informiatech.com','ALERT! Product Quantity Low',$body);
				}
				$newQty =$productData->product_quantity - $updating->product_qty;
				$this->global_model->update_record('product',array('product_quantity' => $newQty),array('product_id'=>$updating->product_id));
			}
			else
			{
				$productData = $this->global_model->records_select('quantity','product_variant',array('product_size_id' => $updating->size,'product_color_id'=>$updating->color,'product_id'=>$updating->product_id)); 
				$newQty =$productData->quantity - $updating->product_qty;

				if($productData->quantity <= 5)
				{
					$productDetails = $this->global_model->records_select('product_name','product',array('product_id' =>$updating->product_id));

					$section['body'] = '<table width="100%" border="1px" >';
					$section['body'] .='<tr><td>Product Name:</td><td>'.$productDetails->product_name.'<td></tr>';
					$section['body'] .='<tr><td>Product Size:</td><td>'.$this->global_model->coloum_record_one('product_size',array('product_size_id' => $updating->size),'product_size_name').'<td></tr>';
					$section['body'] .='<tr><td>Product Color:</td><td>'.$this->global_model->coloum_record_one('product_color',array('product_color_id' => $updating->color),'product_color_name').'<td></tr>';
					$section['body'] .='<tr><td>Quantity Avaliable:</td><td>'.$newQty.'<td></tr>';
					$section['body'] .='<tr><td>Auto generated email from aptandidle.com</td></tr>';
					$section['body'].= '</table>';
					$section['subject'] = 'ALERT! Product Quantity Low';
					$body = $this->load->view('email/template',$section, TRUE);
					$result = send_email('sartaj.akbar@informiatech.com','ALERT! Product Quantity Low',$body);
				}

				$this->global_model->update_record('product_variant',array('quantity' => $newQty),array('product_size_id' => $updating->size,'product_color_id'=>$updating->color,'product_id'=>$updating->product_id));


			}

		}


		$data = array(
			'order_type' => 'Cash on Delivery',
		);
		$this->global_model->update_record('orders',$data,array('orders_no' => $this->session->userdata('orders_no')));
		$this->session->set_flashdata('msg', '1');
		$this->session->set_flashdata('alert_data', 'ORDER COMPLETED, KINDLY CHECK IN DASHBOARD');
		$this->cart->destroy();
		redirect('home');


	}



}



?>