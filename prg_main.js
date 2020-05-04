
$(document).ready(function(){
//Starting


	category(); //calling defined method
	brand();
	product();
	filter_category_list();
	
	//category list request 
	function category(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{category:1},
			success	:	function(data){
			$("#get_category").html(data);			
			}
		})
	}
	
		//category list at filter 
	function filter_category_list(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{filter_category_list_item:1},
			success	:	function(data){
			$("#filter_category").html(data);
			}
		})
	}
	
	
	
	//brand list request 
	function brand(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{brand:1},
			success	:	function(data){
			$("#get_brand").html(data);
				
			}
		})
	}

	//product list request 
	function product(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{product:1},
			success	:	function(data){
			$("#get_product").html(data);
				
			}
		})
	}


	//filter by category
	$("body").delegate("#category","click",function(event){
		event.preventDefault();
		var cid= $(this).attr('cid');
		
				$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_selected_category:1,selected_cid:cid},// get_selected_category - req ,selected_cid passing
			success	:	function(data){
			$("#get_product").html(data);
				
			}
		})
		
		
	})
	
	
		//filter by brand
		$("body").delegate("#brand","click",function(event){
		event.preventDefault();
		var bid= $(this).attr('bid');
		
				$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_selected_brand:1,selected_bid:bid},// get_selected_brand - req ,selected_bid passing
			success	:	function(data){
			$("#get_product").html(data);
				
			}
		})
		
		
	})
	
	//filter by search keywords using search btn
	$("#search_btn").click(function(){
	var keywords= $("#search_txt").val();
		
		if(keywords!='')
			{
	
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_search:1,keywords:keywords}, // get_search - req ,keywords passing
			success	:	function(data){
			$("#get_product").html(data);
				
			}
				})
				
				
			}
		
		
		
	}
	)
	
	
	
	//filter by search keywords with press enter key in txt box
	$('#search_txt').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
		
		
			var keywords= $("#search_txt").val();
		
		if(keywords!='')
			{
	
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_search:1,keywords:keywords}, 
			success	:	function(data){
			$("#get_product").html(data);
				
			}
				})
				
				
			}
		
		
        
    }
	});


	
	$('#customer_reg_form').on('submit',function(event){
			
			event.preventDefault(); //prevent from the submision
			
			
			//get the value from form using post method
			var fname = $('#fname').val();
			var lname = $('#lname').val();
			var email = $('#email').val();
			var phone = $('#phone').val();
			var passwords = $('#password').val();
			var repassword = $('#repassword').val();
			var address = $('#address').val();
			var city = $('#city').val();
			var postal = $('#postal').val();
			
			//default validation values
			var nameformat = /^[A-Za-z]+$/;; 
			var emailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var phonenumberformat= /^\d{10}$/;
			var postalcodeformat= /^\d{5}$/;
			
			
			if(fname == "" || lname == "" || email == "" || phone == "" || passwords == "" || repassword == "" || address == "" || city == "" || postal == "" )
			{
				
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
			}	
			else if(!nameformat.test(fname))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect First Name !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
				else if(!nameformat.test(lname))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Last Name !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
				else if(fname == lname)
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Firstname and Lastname </strong>  are same !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
			else if(!emailformat.test(email))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Email !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
			else if(!phonenumberformat.test(phone))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Phone Number !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
		
			else if( passwords.length < 8 )
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Please enter password 6 - 20 characters !</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
		
			else if( passwords != repassword)
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Password not match with</strong> Conform password !<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}	

				else if(!postalcodeformat.test(postal))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Postal code !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}	
		

			else{ // if no errors
						$.ajax({
						url		:	"action.php",
						method	:	"POST",
						data	:	{cus_reg:1,fname:fname,lname:lname,email:email,phone:phone,passwords:passwords,address:address,city:city,postal:postal},
						success	:	function(data){ 
						$('#cus_alert_msg').html(data);
							}
						})
					
		
		
				
						
			}
		

		
		
	});

	//filter by search keywords using search btn
	$("#login_page_login_btn").click(function(){	
	event.preventDefault(); //prevent from the submision
		var lg_email_txt = $('#lg_email_txt').val();
		var lg_password_txt = $('#lg_password_txt').val();
		var emailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
			if(lg_email_txt == "" || lg_password_txt == "")
			{
				
			$('#cus_reg_alert_msg_login').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
			}
			
			else if(!emailformat.test(lg_email_txt))
			{
				$('#cus_reg_alert_msg_login').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss>Incorrect <strong>Email !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
			}
	
			else{	
		
				$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{userLogin:1,useremail:lg_email_txt,userpassword:lg_password_txt}, // get_search - req ,keywords passing
					success	:	function(data){
				
							$('#cus_reg_alert_msg_login').html(data); 	//from php userLogin method in action
					}
					})
						
				
			}
		})
	





		cart_prd_count();
		cart_nav_list_total();		
		//product add to card
		$("body").delegate("#particular_product_btn","click",function(){
		event.preventDefault();
		var pid= $(this).attr('pid'); //get the value from our self pid attribute pid 
		var product_qty_txt = $("#qty-"+pid).val(); 
				$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{add_to_card:1,product_id:pid,product_qty:product_qty_txt}, // add_to_card -method name , product_id - opaasing value to php
					success	:	function(data){
						$('#show_msg').html(data);
						card_container_btn();
					}
					
					})

		
	})	
	
	
	
	
	
	
	
	
	card_container_btn();
	//added product list container
	function card_container_btn(){
				$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{get_added_products_into_card:1}, // get the added product into cart
					success	:	function(data){
						$('#all_product_list').html(data);
					}
					})
	cart_prd_count(); 	
	cart_nav_list_total();
		
	}
	
	
	function cart_prd_count(){
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{cart_count:1}, // get the added product into cart
					success	:	function(data){
						$('#badge').html(data);
						$('#badge_in_nave_manue').html(data);
					}
					}) 
		
	}
	
	
	
	cart_nav_list_total();
	function cart_nav_list_total(){
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{nav_list_total:1}, // get the order's total val
					success	:	function(data){
						$('#nav_list_total_val').html(data);
					}
					}) 
	
	
	}
	
	 orderd_prd_count();
		function orderd_prd_count(){
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{orderd_prd_count:1}, // get the added product into cart
					success	:	function(data){
						$('#orders_badge_in_nave_manue').html(data);
					}
					}) 
		
	}
	
	
	
	
	
	
	//get all ordered prouct in card card page
	card_page_list();
	function card_page_list(){
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{card_page_list:1}, // get the added product into cart
					success	:	function(data){
						$('#card_page_list').html(data);
							cart_nav_list_total();
					}
					})
		
		
		
	}
	


// used to clear all model when close
$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
});





			
		//product add to card
	$("body").delegate(".qty","input",function(){
		event.preventDefault();
		var pid= $(this).attr('pid'); //get the value from our self pid attribute pid 
		var product_qty = $("#qty-"+pid).val(); 
		var product_price = $("#price-"+pid).text();
		var product_total = product_qty * product_price;
		 $("#total-"+pid).text(product_total);
		 
		
	})	


	//remove the product from card
	$("body").delegate(".remove","click",function(){
		event.preventDefault();
		var pid= $(this).attr('remove_id'); //get the value from our selected product id 
			

			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{removefromcart:1,remove_product_id:pid}, // pass the arguments
					success	:	function(data){
						$('#cart_msg').html(data);
						card_page_list(); //no need to refresh  it will be load all the orderd products
						cart_prd_count();  // if i remive card qty decrease function call
						card_container_btn();// if i remive card list update
						cart_nav_list_total();
					}
					})
		
	})



	//Update the product from card
	$("body").delegate(".update","click",function(){
		event.preventDefault();
		var pid= $(this).attr('update_id'); //get the value from our self pid attribute pid 
		var product_qty = $("#qty-"+pid).val(); 
		var customer_note_txt =$("#note-"+pid).val(); 
		
		var product_price = $("#price-"+pid).text();
		var product_total = product_qty * product_price;
	
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{updatefromcart:1,update_product_id:pid,new_qty:product_qty,current_product_total:product_total,customer_note:customer_note_txt},
					success	:	function(data){
						$('#cart_msg').html(data);
						card_page_list();
						
					}
					})
		
	})


		//generating the page number at footer
		page();
		function page(){
		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{page_footer_num:1},
					success	:	function(data){
					$('#pagenumber').html(data);
					}
					})
					
					}

		//when the user click the particular page number it will be showup that page
		$('body').delegate('#page','click',function() {
			var pagenum= $(this).attr('page');  
			
					$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{product:1,setpagenumber:1,pagenumber:pagenum},
					success	:	function(data){
					$("#get_product").html(data);
					}
					})
			
		})
		
		
		
		
			//get paid product (onlinepayent/cash on delivery/bank)
			my_orders();
			function my_orders(){
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{myorder:1}, // get the added product into cart
					success	:	function(data){
						$('#my_order_list').html(data);
					}
					})
		
		
		
	}
	
		$("#cus_chanepassword_btn").click(function(){	
		event.preventDefault(); //prevent from the submision
		var Old_password = $('#Old_passwordtxt').val();
		var New_Paasword = $('#New_Paaswordtxt').val();
		var Confirm_Paaswordtxt = $('#Confirm_Paaswordtxt').val();
	
		
			if(Old_password == "" || New_Paasword == "" || Confirm_Paaswordtxt =="")
			{
						$('#customer_change_passwrd_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
			}
			else if(New_Paasword.length < 8 )
			{
				
				$('#customer_change_passwrd_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Please enter new password</strong> 6 - 20 characters ! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		
			}
			else if(New_Paasword != Confirm_Paaswordtxt)
			{
					$('#customer_change_passwrd_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> password not match<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
			}
		
		
			else
			{
				
					$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{chnagepassowrd:1,oldpsw:Old_password,new_psw:New_Paasword}, 
					success	:	function(data){
						$('#customer_change_passwrd_msg').html(data);
						  $('#customer_change_password_form')[0].reset();
					}
					})
				
				
				
			}

		}
		)


complain_item_list();
 function complain_item_list(){

	 		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{complain_items:1},
					success	:	function(data){
					$('#complain_item_list').html(data);
					}
					})

	 
 }




	
	

 
  
  $("#complain_btn").click(function(){	
	event.preventDefault(); //prevent from the submision

	var customer_ord_id = $("#complain_item_list").val(); 
	var complain_message = $('#complain_messagetxt').val();
 
 
	if(complain_message == "" || customer_ord_id=="Please Select Order ID.." )
		{
			$('#customer_complain_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		}
		else{
			 		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{complain_msg:1,customer_ord_ids:customer_ord_id,complain_messages:complain_message},
					success	:	function(data){
					$('#customer_complain_msg').html(data);
						  $('#customer_complian_form')[0].reset();
					
					}
					})
		}

	

})

  




//end
});