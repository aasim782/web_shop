
$(document).ready(function(){
//Starting


	category(); //calling defined method
	brand();
	product();
	filter_category_list();
	particular_prd_view();
	
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
	var currentURL = window.location.pathname;
	var check_page_name =currentURL.includes("index.php");
	
		if(keywords!='')
			{
				//identify the page . no page found in url that is index
					if(check_page_name==true ||currentURL== "/project37/")
						{
							window.open("index.php?srch="+keywords+"","_self");
						}
						else
						{
							window.open("profile.php?srch="+keywords+"","_self");
						} 
	  
				
				
			}
			else
			{
						window.open("index.php","_self");
				
			}
		
		
		
		}
	)
	
	
	
	//filter by search keywords with press enter key in txt box
	$('#search_txt').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
	
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var keywords = search_params.get('srch');
		
		
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index.php");
		
		var keywords= $("#search_txt").val();
				if(keycode == '13'){
					
						if(check_page_name==true ||currentURL== "/project37/"){
							window.open("index.php?srch="+keywords+"","_self");//when index page
						}
						else
						{
							window.open("profile.php?srch="+keywords+"","_self");//when profile page
						}
        
						}
	
	});





		search_prd_txt();
		function search_prd_txt(){
			
	 	 var url = new URL(document.URL);
		var search_params = url.searchParams;
		var keywords = search_params.get('srch');

	 
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
			else
			{	
				window.open("index.php","_self");
			}


		}

	
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
						$("#qty-"+pid).val("1"); 
					}
					
					})

		
	})	
	

		$("body").delegate("#particular_product_search_btn","click",function(){
		event.preventDefault();
		var pid_val= $(this).attr('pid'); //get the value from our self pid attribute pid  
		window.open("product_view.php?pid="+pid_val+"","_self");
	 
 
	})	
	

	
		/* dont kow why we used
		atv();
		function atv()
			{
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var product_id = search_params.get('pid');
		
 
				$.ajax({
					url		:	"action.php",
					method	:	"GET",
					data	:	{prd_view_page:1,pid:product_id}, // get the added product into cart
					success	:	function(data){
						$('#particular_prd_view').html(data);
					}
					})
					

			 }*/
	

	
	
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
	
	 orderd_prd_count(); //orders count nave menue
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
		var new_product_qty = $("#qty-"+pid).val(); 
 
			$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{removefromcart:1,remove_product_id:pid,new_qty:new_product_qty}, // pass the arguments
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
						card_container_btn();
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
		
		
		
		

	
	
	
	




//---------------------------------------my order page---------------------------------------


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
	

		 //generating the page number at myorder page footer 
		myorder_footer_num();
		function myorder_footer_num(){
		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{myorder_footer_num:1},
					success	:	function(data){
					$('#myorder_pagination').html(data);
					}
					})
					
					}
					
	
					
			 //when the user click the particular myorder page number it will be showup that page
			  $('body').delegate('#myorder_page_num','click',function() {
			 event.preventDefault();
			var pagenum= $(this).attr('myorder_page_num');  
	 
					$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{myorder:1,setpagenumber:1,pagenumber:pagenum},
					success	:	function(data){
						$("#my_order_list").html(data);
					}
					})
			
		})		
			
//---------------------------------------my order page---------------------------------------

	
	
	
	
	
	
	
	
	
// change customer password
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
		
		

//get orderd product
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
	

 
  //complain about orderd product
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


//bank payment
 $("#bank_dep_btn").click(function(){	
	event.preventDefault(); //prevent from the submision

	var dep_datetxt = $("#de_datetxt").val(); 
	var dep_timetxt = $("#de_timetxt").val(); 
	var branch_name_txt = $('#branch_nametxt').val();
	var upolod_slip_txt = $('#upolod_slip_txt').val();

		if(dep_datetxt == "" || dep_timetxt == "" || branch_name_txt == "" || upolod_slip_txt == "")
		{
			$('#bank_dep_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		}
		else
		{
			 	 		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{bank_dep:1,dep_date:dep_datetxt,dep_time:dep_timetxt,branch_name:branch_name_txt,upolod_slip:upolod_slip_txt},
					success	:	function(data){
							$('#bank_dep_alert_msg').html(data);
							$('#customer_bankdep_form')[0].reset();
								my_orders();
						card_page_list(); //no need to refresh  it will be load all the orderd products
						cart_prd_count();  // if i remive card qty decrease function call
						card_container_btn();
						cart_nav_list_total(); //order bedget count in navebutto list
						orderd_prd_count();
						}
					})
		}

	

})



//cash on delivery payment
	$('body').delegate('#cash_on_agree_btn','click',function() {
	event.preventDefault(); //prevent from the submision
		 		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{cash_on_delivery:1},
					success	:	function(data){
							$('#cart_msg').html(data);
						card_container_btn();
						card_page_list(); //no need to refresh  it will be load all the orderd products
						cart_prd_count();  // if i remive card qty decrease function call
						cart_nav_list_total(); //order bedget count in navebutto list
						orderd_prd_count();
						
						}
					})
  })
  
  
 
   
   
  prd_dec_detail();
  //prd_dec_details tab details;
 function prd_dec_detail(){
	 
	 	var url = new URL(document.URL);
		var search_params = url.searchParams;
		var product_id = search_params.get('pid');
		
		
	 
	 	 		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{prd_dec_details_get:1,pid:product_id},
					success	:	function(data){
						 
							 $('#prd_dec_details').html(data);
				 
						}
					})
 }
	
 
 
 //Single product view in productViewPage 
 function particular_prd_view()
		{
			
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var product_id = search_params.get('pid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{particular_prd_view:1,pid:product_id},
			success	:	function(data){
			 $('#indivitual_prd_view').html(data);
			 	$('#Indivitual_product_view').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		
			}
		})
			
		}
		
		
		 recomended_prd_list_right();
	 	// recomended_prd_list show 
	function recomended_prd_list_right(){
		
		//used for identify the category
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var product_id = search_params.get('pid');
		
		
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{recomended_prd_list_right:1,pid:product_id},
			success	:	function(data){
			$("#recomended_prd_list_right").html(data);			
			}
		})
	}
	
	
	
	
	
	
	
	
	
			 recomended_prd_list_left();
	 	// recomended_prd_list show 
	function recomended_prd_list_left(){
		
		//used for identify the category
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var product_id = search_params.get('pid');
		
		
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{recomended_prd_list_left:1,pid:product_id},
			success	:	function(data){
			$("#recomended_prd_list_left").html(data);			
			}
		})
	}
	
		/*already added particulaer search button so no need but for chk we comment
		$('body').delegate('#image_click','click',function() {
		 var pid_val= $(this).attr('pid'); //get the value from our self pid attribute pid 
		window.open("product_view.php?pid="+pid_val+"","_self");
			
		});
	*/
	
	
		$('body').delegate('#card_page_view_url','click',function() {
		window.open("cart.php","_self");
			
		});
	
 
		
	
	/*nagative_value_disable
	nagative_value_disable();
function nagative_value_disable(){
var number = document.getElementById('price-"+pid');

number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}



}*/
	
 








//get customer phne for last 3digit
phone_number_show();
function phone_number_show(){
	$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{phone_number_show:1},
			success	:	function(data){
		$("#customer_phone_num").html(data);
		
			}
		})

}


//OTP for cash on delivery
$('body').delegate('#pohne_code_send_btn','click',function() {
	event.preventDefault(); //prevent from the submision
	var pohne_txt = $("#pohne_txt").val();
 
	if( pohne_txt == ""){
		
	 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	}
	else if( pohne_txt.length < 11 || pohne_txt.length > 11 )
	{
		
	 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please enter coorrect number<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	
	}
 
	else if(!pohne_txt.startsWith("94"))
	{
			 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Phone Number should start with '94' <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	}
 
	else
		{
 
 	
	var userId=12053;
	var ApiKey="91oxM0uahaka5kAsmvEh"
	var digits = '0123456789'; 
    let OTP = ''; 
    for (let i = 0; i < 6; i++ ) 
	{ 
        OTP += digits[Math.floor(Math.random() * 10)]; 
	} 
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{pohne_code_send_btn_func:1,pohne_no:pohne_txt,OTP_code:OTP},
			success	:	function(data){
				
				
			 
			 if(data==1)
			 {
					 $('#myHiddeOTP').load('https://app.notify.lk/api/v1/send?user_id='+userId+'&api_key='+ApiKey+'&sender_id=NotifyDEMO&to='+pohne_txt+'&message=Your-code-is:'+OTP+'.');
					//timer label
					$("#otp_timer_div").html("<div>Time left = <span id='timer'></span></div>");		 

					let timerOn = true;
					function timer(remaining) {
					  var m = Math.floor(remaining / 60);
					  var s = remaining % 60;
					  
					  m = m < 10 ? '0' + m : m;
					  s = s < 10 ? '0' + s : s;
					  document.getElementById('timer').innerHTML = m + ':' + s;
					  remaining -= 1;
					  
					  if(remaining >= 0 && timerOn) {
						setTimeout(function() {
							timer(remaining);
						}, 1000);
						return;
					  }

					  if(!timerOn) {
						// Do validate stuff here
						return;
					  }
					  
					  // Do timeout stuff here
					 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Verification timeout !</strong> please try agian<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
					 window.open("index.php","_self");
					}
				timer(120);//60seconds
				 $("#customer_phone_num").html("");//empty 3 digit div
				 $("#otp_alert_msg").html("<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> please enter your OTP CODE<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
				 $("#otp_text_div").html("<input type='text' class='form-control' id='user_otp_txt' placeholder='Enter your OTP number'/>");
				 $("#otp_button_div").html(" <button  id='pohne_code_verify_btn' class='btn btn-success'>Verify</button>");
			 
			 }
			 else if(data==2)
			 {
				  $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Your phone number is wrong please make sure your number<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");	 
		
			 }
			 
			 
		

		
			}
		})
		
		
		}
	
	


})

//verify OTP
 var attempt=0;
$('body').delegate('#pohne_code_verify_btn','click',function() {
		event.preventDefault(); //prevent from the submision
		var user_otp_txt = $("#user_otp_txt").val();
 
		 attempt++;
	 
			if(user_otp_txt.length <6 || user_otp_txt.length>6)
			 {
		
				 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> verification code is totally 6 digit <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");	 
		
			 }
 
			 else{
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{pohne_code_verify_fucn:1,user_otp:user_otp_txt,attempt_val:attempt},
			success	:	function(data){
				
			  $("#otp_alert_msg").html(data);
			}
			 })  
			 }
		
	
})

 













//end
});