<script>
  $(document).ready(function(){
   $.ajax({
    url: '<?php echo base_url('ecom_process/check_cart'); ?>',
    type: 'post',
    success: function (data) {
      let cartdata = JSON.parse(data);
      if(cartdata.status == 1){
       $('#itemInCart').text(cartdata.total_in_cart);
     } else if (data == 2) {
      toastr.error('Something Went Wrong, Please Try Again Later.')
    }
  }
});
 });

  $("#cart_form").submit(function (event) {
   event.preventDefault();
   $.ajax({
    url: '<?php echo base_url('ecom_process/cart_insert'); ?>',
    type: 'post',
    data: $("#cart_form").serialize(),
    success: function (data) {

      let cartdata = JSON.parse(data);

      if(cartdata.status == 1){
       toastr.success('Added To Cart.');
    //  $('#ShowCart').show();
     $('#itemInCart').text(cartdata.total_in_cart);
   } else if (data == 2) {
    toastr.error('Something Went Wrong, Please Try Again Later.')
  }
}
});
 });

  $(".remove_from_cart").on('click',function(){    
   var id = $(this).data('id');
   $.ajax({
    url: '<?php echo base_url('ecom_process/updatecart')?>',
    type: 'post',
    data: {
     qty:'0',
     id:id,
   },
   success: function(data){       
     if(data == 1){    
      location.reload();
    }else if(data == 2){
      toastr.error('Something Went Wrong, Please Try Again Later.')
    }
  }
});
 });


  $("#apply-coupon").click(function(){  
    $.ajax({
     url: '<?php echo base_url("ecom_process/apply_coupon");?>',
     type: 'POST',
     data: {coupon_code:$('#couponcode').val()},
     success: function(data) {
      location.reload();
      if(data == 1)
      {
       toastr.success('Coupon Code Applied')
     }
     else if(data == 2)
     {
       toastr.error('Invalid Coupon Code.')
     }
   }
 });
  });


  $(".phoneValid").keydown(function(e) {
   if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
     (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
     (e.keyCode >= 35 && e.keyCode <= 40)) {
     return;
 }
 if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
   e.preventDefault();
 }
});

  $('.pro-qty').on('change',function(event){
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/updatecart');?>",  
      data: {
        qty: $(this).val(),
        id: $(this).data('id'),
      },   
      dataType: "html",     
      success: function(data){
        location.reload();
      },
      error: function(data) {
        console.log(data);
      }
    }); 
  });

  $("#country").on("change",function() {  
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/get_cities');?>",  
      data: {
        id: $(this).val()
      },      
      dataType: "html",     
      success: function(data){
        $('#city').html(data);
      },
      error: function(data) {
        console.log(data);
      }
    });   
  });


  $("#city").on("change",function() { 
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ecom_process/aramex_ship_cart_price');?>",  
      data: {
        country: $('#country').val(),
        city:$(this).val(),
      },      
      dataType: "html",     
      success: function(data){
        if(data == '"free-ship"')
        {
          $('.ship').text('<?php echo $this->currency?> '+'Free shipping');
        }
        else
        {
          var grandtotal = '<?php echo get_grand_total(); ?>';
          var shiptotal = data;
          var paytotal = parseFloat(grandtotal)+parseFloat(shiptotal);
          var toshow = '<strong><?php echo $this->currency; ?> '+paytotal+'</strong>';
          $('.finalValue').html(toshow);
          $('.ship').text('<?php echo $this->currency?> '+data);
        }
      },
      error: function(data) {
        alert(data);
      }
    });   
  });

  $('.customColorsd').click(function(){
    location.reload();
  });

  $('.ColorChanger').on('click',function(){

   $.ajax({
    url: '<?php echo base_url('ecom_process/get_products_by_color')?>',
    type: 'post',
    data: {
     product_id:$('#product_id').val(),
     product_color_id:$(this).data('color'),
   },
   success: function(data){  
    $('.extraadd').remove();
    // let sizedata = JSON.parse(data);
    // var sizehtmltoappend = '';
    // $.each(sizedata, function( key, value ) {
    //   sizehtmltoappend +='<div class="position-relative mb-2 extraadd">';
    //   sizehtmltoappend +='<input type="radio" id="l"  name="product_size_id" value="'+value.product_size_id+'">';
    //   sizehtmltoappend +='<label class=""  for="l" >'+value.product_size_name+'</label>';
    //   sizehtmltoappend += '</div>'; 
    // });  
    // sizehtmltoappend += ' <div class="position-relative mb-2">';
    // sizehtmltoappend += '<input type="radio" id="custom" name="size" value="custom">';
    // sizehtmltoappend += ' <label class="" for="custom" >CUSTOMIZE SIZE</label>';
    // sizehtmltoappend += '</div> ';

    $('.notNeeded').remove();
   // $('.textAppender').prepend(sizehtmltoappend);

  }
});

   $('.ColorChanger').removeClass('customColor');
   $(this).addClass('customColor');
   $('.product_color_id').val($(this).data('color'));






 });

  function reed()
  {
    $('#custom').click(function(){
      $('#custom-size').toggleClass('active')
    });
  }


</script>