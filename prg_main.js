
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
						 window.open("index_filter.php?srch="+keywords+"&cat=0&brd=0&lprice=0&hprice=0&rate=0","_self");
						}
						else
						{
						 window.open("profile_filter.php?srch="+keywords+"&cat=0&brd=0&lprice=0&hprice=0&rate=0","_self");
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
	
		var check_page_name_2 =currentURL.includes("index_filter.php");
		
			var keywords = search_params.get('srch');
			
 
		var keywords= $("#search_txt").val();
				if(keycode == '13')
				{
					
									if(check_page_name==true)
									{
										 window.open("index_filter.php?srch="+keywords+"&cat=0&brd=0&lprice=0&hprice=0&rate=0","_self");
									}
									else
									{
										
										if(check_page_name==false && check_page_name_2==true)
										{
											 window.open("index_filter.php?srch="+keywords+"&cat=0&brd=0&lprice=0&hprice=0&rate=0","_self");
										}
										else
										{
											window.open("profile_filter.php?srch="+keywords+"&cat=0&brd=0&lprice=0&hprice=0&rate=0","_self");
										}
										
									}
					
				}
	
	});


			
//category filter
$('body').delegate('#filter_category_btn','click',function() {
 		 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid= $(this).attr('cid');
		var brd_val = search_params.get('brd');
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
		  
		  
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		 
	 
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+brd_val+"&lprice="+lprice_val+"&hprice="+hprice_val+"&rate="+rate_val+"");
		prodcuct_multiple_filter();
  
	
	//  window.open;
		 
   //	window.location.href = ("");
		
})





	
	
//brand filter
$('body').delegate('#filter_brand_btn','click',function() {
 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid = search_params.get('cat');
		var brd_val = $(this).attr('bid');
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
		 
	
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		 
 
		 
window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+brd_val+"&lprice="+lprice_val+"&hprice="+hprice_val+"&rate="+rate_val+"");
 prodcuct_multiple_filter(); 
   
    
})	
  
  
  
  	$('body').delegate('#feedbackstrs','click',function() {
	 
	 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid = search_params.get('cat');
		var brd_val = search_params.get('brd');
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = $(this).attr('startval');
		 
		 
		 
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		 
		  
		 
		 
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+brd_val+"&lprice="+lprice_val+"&hprice="+hprice_val+"&rate="+rate_val+"");
		 prodcuct_multiple_filter();
		
		
		})
		 
		 
		 
		 
		 
	 	$('body').delegate('#price_val_btn','click',function() {
			
				
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid = search_params.get('cat');
		var brd_val = search_params.get('brd');
		var lprice_val  =  $('#lpriceid').val(); 
		var hprice_val  = $('#hpriceid').val();
		var rate_val = search_params.get('rate');
	 
		 
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		 
		 
		 
		 
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+brd_val+"&lprice="+lprice_val+"&hprice="+hprice_val+"&rate="+rate_val+"");
		 prodcuct_multiple_filter();
		 })
		 
		 
		 
		 

search_prd_txt();
 function search_prd_txt(){
			
	 	 var url = new URL(document.URL);
		var search_params = url.searchParams;
		var keywords = search_params.get('srch');//search value
 
	 	var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("profile.php");
 
			 if(keywords!='')
			{
	
			  $('#search_txt').val(keywords); //URL Search to serach text box
				
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
				window.open("index_filter.php","_self");
			}

		
	
	


		}
		
		
		
		
		
		
	
		
		
		

	
	//customer resgistration form
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
			var phonenumberformat= /^\d{11}$/;
			var postalcodeformat= /^\d{5}$/;
			
			
			if(fname == "" || lname == "" || email == "" || phone == "" || passwords == "" || repassword == "" || address == "" || city == "" || postal == "" )
			{
				
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Please fill all the fields to continue<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
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
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Firstname and Lastname </strong>  are the same!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
			else if(!emailformat.test(email))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Email!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
			else if(!phonenumberformat.test(phone))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Phone Number!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
			else if(phone.length <= 10 )
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Phone Number!</strong> Please inlude 94<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
		
			else if( passwords.length < 8 )
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Please enter a password of 6 - 20 characters !</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}
		
			else if( passwords != repassword)
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Password doesn't match with each other</strong> <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
			}	

				else if(!postalcodeformat.test(postal))
			{
						
			$('#cus_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Incorrect Postal code!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
				
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

	//customer login verification code
	$("#login_page_login_btn").click(function(){	
	event.preventDefault(); //prevent from the submision
		var lg_email_txt = $('#lg_email_txt').val(); //getting user enterted email id from login text box
		var lg_password_txt = $('#lg_password_txt').val(); //getting user enterted password from login text box
		var emailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
			if(lg_email_txt == "" || lg_password_txt == "") //verification for empty textbox
			{
				 //empty alert message
			$('#cus_reg_alert_msg_login').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
			}
			
			else if(!emailformat.test(lg_email_txt))  //verification for email id formate
			{
				 
				$('#cus_reg_alert_msg_login').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss>Incorrect <strong>Email!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
			}
	
			else{	
		
				$.ajax({
					url		:	"action.php", //parsing the data to action PHP page
					method	:	"POST", //using post method to parse
					data	:	{userLogin:1,useremail:lg_email_txt,userpassword:lg_password_txt}, //parse the data with different param
					success	:	function(data){
				
							$('#cus_reg_alert_msg_login').html(data); 	// output mmessage
					}
					})
					
			}})
	
 
 
 
 
 
 
//login model hide when click create account button
$('body').delegate('#create_form_model','click',function() {
 $('#customer_login_model').modal('hide');
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
	
		// particular product search button click
		$("body").delegate("#particular_product_search_btn","click",function(){
		event.preventDefault();
		var pid_val= $(this).attr('pid'); //get the value from our self pid attribute pid 
		var session_val= $(this).attr('session_val'); //get the value from our self pid attribute pid 
   
		 	$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{product_available_verify:1,product_id:pid_val}, 
					success	:	function(data){
			 		
					//if product is active 
					if(data==1)
					{
						
						if(session_val=="")
						 {
						 window.open("unreg_product_view.php?pid="+pid_val+"","_self");
						 }
						 else
						 {
						 window.open("product_view.php?pid="+pid_val+"","_self");
						 }
						 
					}
					else //if product is inactive 
					{
						
						$('#prodcuct_not_available_msg_model').modal('show');
					      setTimeout(function(){// wait for 2 secs
							   location.reload(); // then reload the page.
						  }, 2000); 
						
						
						 product_longer_available_msg();
						function product_longer_available_msg(){
						$('.card-body').html('<center>Sorry, this product is no longer available</center>');
						}
					}
				
			 
					}
					
					})
					
					
		
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
	//added product list container  also used for online payment
	function card_container_btn(){
		
		var offer_txt = $("#offer_msg_at_profile").html();
 
				$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{get_added_products_into_card:1,offer:offer_txt}, // get the added product into cart
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
	
	
		//tracking prograss line color apply
			function tracking_prograss_line(get_order_id,customer_ord_id_txt){
				   
				  var g_order_id = get_order_id;
				  var customer_ord_id_txt = customer_ord_id_txt;
				  
					$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{tracking_prograss_line:1,order_id:g_order_id,customer_ord_id:customer_ord_id_txt}, // get the added product into cart
					success	:	function(data){
						$('#tracking_prograss_line').html(data);
					}
					})
			}
			
			
		 //tracking model details (payment still not verified/vertified/tracking ifo)
		tracking_model_details();
		function tracking_model_details(get_order_id,customer_ord_id_txt)
		{
				    var g_order_id = get_order_id;
				    var customer_ord_id_txt = customer_ord_id_txt;
					$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{tracking_model_details:1,order_id:g_order_id,customer_ord_id:customer_ord_id_txt}, // get the added product into cart
					success	:	function(data){
						$('#tracking_model_details').html(data);
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
						$('#customer_change_passwrd_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
			}
			else if(New_Paasword.length < 8 )
			{
				
				$('#customer_change_passwrd_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Please enter the new password</strong> 6 - 20 characters ! <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		
			}
			else if(New_Paasword != Confirm_Paaswordtxt)
			{
					$('#customer_change_passwrd_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> password doesn't match with each other<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
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
  
	if(complain_message == "" || customer_ord_id == "null" )
		{
			$('#customer_complain_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
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











 
  //complain about orderd product
  $("#customer_feedback_btn").click(function(){	
	event.preventDefault(); //prevent from the submision
 
	var feedback_messager_txt = $('#feedback_messagetxt').val();
 
 
	if(feedback_messager_txt == "")
		{
			$('#customer_feedback_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		}
		else{
			 		$.ajax({
					url		:	"action.php",
					method	:	"POST",
					data	:	{feedback_msg:1,feedback_message:feedback_messager_txt},
					success	:	function(data){
					$('#customer_feedback_msg').html(data);
						  $('#customer_feedback_frm')[0].reset();
						  	
					
					}
					})
		}

	

})



//bank payment
 $("#but_upload").click(function(){	
	event.preventDefault(); //prevent from the submision
 
  
 	var dep_datetxt = $("#de_datetxt").val(); 
	var dep_timetxt = $("#de_timetxt").val(); 
	var branch_name_txt = $('#branch_nametxt').val();
	var files = $('#file')[0].files[0];
	
	if(dep_datetxt == "" || dep_timetxt == "" || branch_name_txt == "" 	|| typeof files == 'undefined')
		{
			$('#bank_dep_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		}
		else
		{
			 //image upload
				var fd = new FormData();
               						 
                fd.append('file',files);
				fd.append('bank_dep', 1); //arguments
				fd.append('dep_date',dep_datetxt); //arguments
				fd.append('dep_time', dep_timetxt); //arguments
				fd.append('branch_name',branch_name_txt); //arguments
			 
			 
				
                $.ajax({
                    url:'action.php',
                    type:'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success:function(data){
 
					$('#bank_dep_alert_msg').html(data);
					$('#customer_bankdep_form')[0].reset();
					
						my_orders();
						card_page_list(); //no need to refresh  it will be load all the orderd products
						cart_prd_count();  // if i remive card qty decrease function call
						card_container_btn();
						cart_nav_list_total(); //order bedget count in navebutto list
						orderd_prd_count();
						 
                    }
                });
			
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
	
 
  
  
 //prd feedbacks
get_customer_order_item_feedback();
function get_customer_order_item_feedback(){
	
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var product_id_txt = search_params.get('pid');
		
	 	$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_customer_order_item_feedback:1,product_id:product_id_txt},
			success	:	function(data){
		 
			  $("#trk_model_order_id").html(get_order_id);
		 
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
			 	$('#Indivitual_product_view').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
		
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
		
	 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	}
	else if( pohne_txt.length < 11 || pohne_txt.length > 11 )
	{
		
	 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please enter your correct number<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	
	}
 
	else if(!pohne_txt.startsWith("94"))
	{
			 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Phone Number should start with '94' <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	}
 
	else
		{
 
 	
	var userId=12524;
	var ApiKey="giZ3NGSE0P2E9Cr0agz9"
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
					 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Verification timeout!</strong> Please try agian<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
					 window.open("index.php","_self");
					}
				timer(120);//60seconds
				 $("#customer_phone_num").html("");//empty 3 digit div
				 $("#otp_alert_msg").html("<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please enter your OTP CODE<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
				 $("#otp_text_div").html("<input type='number' class='form-control' id='user_otp_txt' placeholder='Enter your 6-digit OTP code'/>");
				 $("#otp_button_div").html(" <button  id='pohne_code_verify_btn' class='btn btn-success'>Verify</button>");
			 
			 }
			 else if(data==2)
			 {
				  $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Your phone number is incorrect, Please make correct your phone number<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");	 
		
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
		
				 $("#otp_alert_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> verification code is 6-digit code <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");	 
		
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

 




//customer trcking model button 
$('body').delegate('#trcking_btn','click',function() {
	
	 var get_order_id= $(this).attr('order_id');  
	 var customer_ord_id_txt= $(this).attr('customer_ord_id');  
 
	$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{tracking_model_items:1,order_id:get_order_id,customer_ord_id:customer_ord_id_txt},
			success	:	function(data){
			 tracking_prograss_line(get_order_id,customer_ord_id_txt);
			 tracking_model_details(get_order_id,customer_ord_id_txt);
			  $("#traveling_item").html(data);
			  $("#trk_model_order_id").html(get_order_id);
		 
			}
	
})
});
 
 

  

//fedback start coded
$('.stars a').on('mouseover', function(){
  $('.stars span, .stars a').removeClass('active');

  $(this).addClass('active');
  $('.stars span').addClass('active');
   
 var rating_val= $(this).attr('rating_val');  
 
   $("#rated_val").html(rating_val);
	$("#g_rating_val").val(rating_val);
 
});




//refreshing the page
			$('body').delegate('#feedback_close_button','click',function() {
				location.reload();
			})				
				
 


//pass the customer order id/item id to customer prd fedback cofirm btn
$('body').delegate('#customer_prd_conform_btn','click',function() {
	 var customer_ord_id= $(this).attr('customer_ord_id');  
	$("#customer_prd_fedb_conform_btn").val(customer_ord_id);
	
 		$('#customer_prd_conform_feedback').modal('show');
	
  })






//hide the model
$('body').delegate('#forget_btn','click',function() {
	
 $('#customer_login_model').modal('hide');
  })


 

 

//get customer order id/item id to confirm btn
$('body').delegate('#customer_prd_fedb_conform_btn','click',function() {
	var customer_ord_id_val= $("#customer_prd_fedb_conform_btn").val();
	var customer_item_beedback_txt= $("#customer_item_beedback_txt").val();
	var g_rating_val= $("#g_rating_val").val();
	var files = $('#file')[0].files[0];
 
				var fd = new FormData();
				//image upload	
			 			
                fd.append('customer_order_item_feedback',1);
				fd.append('customer_ord_id', customer_ord_id_val); //arguments
				fd.append('customer_item_feedback_description', customer_item_beedback_txt); //arguments
				fd.append('g_rating', g_rating_val); //arguments
			  
                $.ajax({
                    url:'action.php',
                    type:'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success:function(data){
							my_orders();
						  $("#cus_order_feedback_alert_msg").html(data);
						  $("#cus_order_feedback_form").html(data);
						  $("#customer_prd_fedb_conform_footer").html(" <button type='button' class='btn btn-secondary' data-dismiss='modal' id='feedback_close_button'>Close</button>");
							orderd_prd_count(); //orders count nave menue
							complain_item_list();//compline list shot at the select menue
                    }
                });
				
				})
				
				
			
			
	//reset password through the email		 
  $('body').delegate('#verify_btn','click',function() {
		event.preventDefault(); //prevent from the submision
		var email= $("#reset_email_txt").val();
		var phone= $("#reset_phone_txt").val();
		var emailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  
	if( email == "" ||  phone=="")
	{
		
		$("#customer_forget_Password_model_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	
	}
	else if(!emailformat.test(email))
	{
			 $("#customer_forget_Password_model_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please enter correct email<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 

	}
	else if( phone.length < 11 || phone.length > 11 )
	{
		
	 $("#customer_forget_Password_model_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please enter your correct number<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	
	}
 
	else if(!phone.startsWith("94"))
	{
			 $("#customer_forget_Password_model_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Phone Number should start with '94' <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
	}
 
	else
		{
 
	
																				var userId=12526;
																				var ApiKey="myqAHZdfT8X3tsxsrutg"
																				var digits = '0123456789'; 
																				let OTP = ''; 
																				
																				
																				
																				for (let i = 0; i < 6; i++ ) 
																				{ 
																					OTP += digits[Math.floor(Math.random() * 10)]; 
																				}

					
							$.ajax({
							url		:	"action.php",
							method	:	"POST",
							data	:	{reset_password_pohne_code_verify_fucn:1,phone_no:phone,OTP_code:OTP,email_id:email},
							success	:	function(data){
						
						
			if(data==1)
			{
					 $('#myHiddeOTP').load('https://app.notify.lk/api/v1/send?user_id='+userId+'&api_key='+ApiKey+'&sender_id=NotifyDEMO&to='+phone+'&message=Your-code-is:'+OTP+'.');
					//timer label
					
					$("#customer_forget_Password_model_form").html('<div> Please enter your 6 digit OTP code  </div><br><div class="form-row col-md-12" id="otp_text_div"><input type="number" class="form-control" id="reset_user_otp_txt" placeholder="Enter your 6-digit OTP code"></div><div id="reset_otp_timer_div" class="text-left ml-3 mt-2"><div>');
					$("#reset_otp_timer_div").html("<div>Time left = <span id='timer'></span></div>");		 

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
					 $("#customer_forget_Password_model_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Verification timeout!</strong> Please try agian<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
					 window.open("index.php","_self");
					}
				timer(120);//60seconds
				$("#password_reset_footer").html('<button type="submit" class="btn btn-danger" email='+email+' id="reset_verify_btn">Verify</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button')
				$("#customer_forget_Password_model_msg").html("<div class='alert alert-success alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please enter your OTP CODE <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");		 
			}
			
			
			 else if(data==2)
			 {
				 
				 
				 
				  $("#customer_forget_Password_model_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Your email or phone number is incorrect<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");	 
		
		
		
			 }
			 
			 
			 
			 
						
							}
						})



	
		}
	
	 
	 
  })
			

				
  			
	//verify btn click --> reset password		
   $('body').delegate('#reset_verify_btn','click',function() {
 	event.preventDefault(); //prevent from the submision
	   	var reset_user_otp_txt= $("#reset_user_otp_txt").val(); 
		var email= $(this).attr('email');   // get the email id
  		

						$.ajax({
							url		:	"action.php",
							method	:	"POST",
							data	:	{pohne_code_verify_btn:1,OTP_code:reset_user_otp_txt,email_id:email},
							success	:	function(data)
							{
								
								if(data==1)
								{
									$("#customer_forget_Password_model_msg").html('');
									$("#customer_forget_Password_model_form").html('<label>New Paasword</label><input type="text" class="form-control" id="reset_new_pasword_txt" placeholder="New password">');
									$("#password_reset_footer").html('<button type="submit" class="btn btn-warning" id="reset_newpassword_verify_btn" reset_email='+email+' >Save</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button')
							
								}
								else if(data==2)
								{
								   $("#customer_forget_Password_model_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Your OTP code is incorrect<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");	 
								}
							}
				  
				  
			  })
   })
   
   
   //verify btn click --> new password save btn		
   $('body').delegate('#reset_newpassword_verify_btn','click',function() {
	    	event.preventDefault(); //prevent from the submision
   	   	var reset_new_pasword_txt= $("#reset_new_pasword_txt").val();
		var email= $(this).attr('reset_email');  
 
 
				$.ajax({
							url		:	"action.php",
							method	:	"POST",
							data	:	{reset_password_update_fun:1,reset_new_pasword:reset_new_pasword_txt,email_id:email},
							success	:	function(data)
							{
							   $("#customer_forget_Password_model_msg").html(data);
							   
							}
 
 
		  
   })
   })
   
   
   
   
   
   
   
   
   
   
   	category_in_filter();
	//categor list for profile filter page
	function category_in_filter(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{category_in_filter:1},
			success	:	function(data){
			$("#get_category_in_filter").html(data);
			
			}
		})
	}
	
	
   
   
   
      	brand_in_filter();
	//brand list for profile filter page
	function brand_in_filter(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{brand_in_filter:1},
			success	:	function(data){
			$("#get_brand_in_filter").html(data);
			
			}
		})
	}
	
	
	
	
	
	
      
   	get_slider_image();
	// get the slider image
	function get_slider_image(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_slider_image:1},
			success	:	function(data){
			$("#slider_images_index").html(data);//index page
			$("#slider_images_profile").html(data);//profile page
 
			
			}
		})
	}
	
	
	 get_slider_image_footer();
	// get the slider image footer
	function get_slider_image_footer(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_slider_image_footer:1},
			success	:	function(data){
			$("#slider_footer_profile").html(data); //profile page
			$("#slider_footer_index").html(data); //index page
 
			
			}
		})
	}
	
	
   
   
   
 get_ongoing_offer();
//get offer to admin banner and home page
	function get_ongoing_offer(){
		  $.ajax({
        url: "action.php",
        method: "POST",
        data: { get_ongoing_offer:1},
        success: function (data) {
		 
			if(data=="")
			{
				$("#offer_msg_at_index").html("");
				$("#offer_msg_at_profile").html("");
				$("#offer_msg_at_profile_filter").html("");
				$("#offer_msg_at_card").html("");
			 }
		else{
			$("#offer_msg_at_index").html("<div class='alert p-0 alert-danger alert-dismissible m-0 fade show rounded-0' role='alert' id='offet_div'><center> "+data+"</center> <button type='button' class='close p-0 m-0' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div> ");
			$("#offer_msg_at_profile").html("<div class='alert p-0 alert-danger alert-dismissible m-0 fade show rounded-0' role='alert' id='offet_div'><center> "+data+"</center> <button type='button' class='close p-0 m-0' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div> ");
			$("#offer_msg_at_profile_filter").html("<div class='alert p-0 alert-danger alert-dismissible m-0 fade show rounded-0' role='alert' id='offet_div'><center> "+data+"</center> <button type='button' class='close p-0 m-0' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div> ");
			$("#offer_msg_at_card").html("<div class='alert p-0 alert-danger alert-dismissible m-0 fade show rounded-0' role='alert' id='offet_div'><center> "+data+"</center> <button type='button' class='close p-0 m-0' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div> ");
			 }
		
			
			
        },
      });
	
	} 
   
   
   
   
   
   
   
   
   
   
  prodcuct_multiple_filter();
 function prodcuct_multiple_filter(){
	 
	 filter_tag_present();// fiter tag calling
	 
	    
 		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid = search_params.get('cat');
		var brd_val = search_params.get('brd');
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
 
 
		 $("#lpriceid").val(lprice_val); 
		 $("#hpriceid").val(hprice_val);


		$('#search_txt').val(search_val); //URL Search to serach text box
		
			 
					 		
					$.ajax({
					url: "action.php",
					method: "POST",
					data: { prodcuct_multiple_filter:1,search_txt:search_val,cid_txt:cid,brd_txt:brd_val,lprice_txt:lprice_val,hprice_txt:hprice_val,rate_txt:rate_val},
					success: function (data) {
						
						//alert(cid + '/' + brd_val+ '/' + brd_val   + '/' + lprice_val   + '/' + hprice_val   + '/' + rate_val);
				 
					   $("#get_product_filter").html(data);
					 }}) 
					  
			 
	
				
				 
		 
		 

 }
 
 
  
 	filter_tag_present();
	function filter_tag_present(){
		 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid= search_params.get('cat'); 
		var brd_val = search_params.get('brd');
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
	   
		if(cid== null)
		{
			cid=0;
		}
		
		if(brd_val== null)
		{
			brd_val=0;
		}
		
			 
					$.ajax({
					url: "action.php",
					method: "POST",
					data: { get_cat_brd_names_tag:1,cid_id:cid,brd_id:brd_val},
					success: function (data) {
					
					var names_array = data.split('*/*');
				 
					var categor_name = names_array[0]; 
					var brand_name = names_array[1]; 
				 
					
					
				
				if(cid == 0 &&  brd_val ==0 && lprice_val == 0 &&  hprice_val == 0 &&  rate_val == 0)
				{
					$("#Filter_title_tag").html("");
				}
				else
				{
					$("#Filter_title_tag").html("<b>Filtered by </b> <i class='fas fa-caret-down' aria-hidden='false'></i>");
					
				}
		  
				
				
				if( cid != 0 )
				{
					 $("#Category_tag").html("<span class='badge shadow-sm  badge-pill pl-3 ml-2 mb-2 p-2 text-center' id='Category_tag' style='background-color:#e3e3e3;'>Category: "+categor_name+"<button type='button'  id='category_close' class='close ml-2' style='line-height:1rem;font-size:1rem' aria-label='Close'><span aria-hidden='true'>&times;</span></button></span>");
				}
				 else
				{
					 $("#Category_tag").html("");
				}
				
				
				
				
				if(brd_val != 0)
				{
					
					 $("#brand_tag").html("<span class='badge shadow-sm  badge-pill pl-3 ml-2 mb-2 p-2 text-center'  style='background-color:#e3e3e3;'>Brand: "+brand_name+"  <button type='button'  id='brand_close'  class='close ml-2' style='line-height:1rem;font-size:1rem'   aria-label='Close'><span aria-hidden='true'>&times;</span></button></span>");
			 	}
					else
				{
					 $("#brand_tag").html("");
				}
				
				
				
				if(lprice_val !=0)
				{
					
				 $("#Lower_tag").html("<span class='badge shadow-sm  badge-pill pl-3 ml-2 mb-2 p-2 text-center'  style='background-color:#e3e3e3;'>Lowest: Rs."+lprice_val+".00 <button type='button' class='close ml-2'   id='lowest_close' style='line-height:1rem;font-size:1rem' aria-label='Close'><span aria-hidden='true'>&times;</span></button></span>");	 
				 
			 	
				}
				else
				{
					 $("#Lower_tag").html("");
				}
				
				
				
				
				if(hprice_val!=0)
				{
					 $("#Highest_tag").html("<span class='badge shadow-sm  badge-pill pl-3 ml-2 mb-2 p-2 text-center'  style='background-color:#e3e3e3;'>Highest :Rs."+hprice_val+".00<button type='button' class='close ml-2' id='highest_close' style='line-height:1rem;font-size:1rem' aria-label='Close'><span aria-hidden='true'>&times;</span></button></span>");
				  
				
	
				}
				else
				{
					 $("#Highest_tag").html("");
				}
				
				
				
				if(rate_val !=0)
				{
					
					 $("#Rating_tag").html("<span class='badge shadow-sm  badge-pill pl-3 ml-2 mb-2 p-2 text-center' style='background-color:#e3e3e3;'>Rating: "+rate_val+"<button type='button' class='close ml-2'   id='rating_close' style='line-height:1rem;font-size:1rem' aria-label='Close'><span aria-hidden='true'>&times;</span></button></span>");
						 
					
				}
				else
				{
					 $("#Rating_tag").html("");
				}
				
				


				}}) 
		
		}
		
		
		
		
 $('body').delegate('#category_close','click',function() {
			 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var brd_val = search_params.get('brd');
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
		  
		  
		$("#Category_tag").html("");
		
		
		
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		  
		
		
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+0+"&brd="+brd_val+"&lprice="+lprice_val+"&hprice="+hprice_val+"&rate="+rate_val+"");
		prodcuct_multiple_filter();
		filter_tag_present(); 
			 
		   })
		
		
		
		
		
		
	 $('body').delegate('#brand_close','click',function() {
			 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid= search_params.get('cat'); 
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
		  
		  
		$("#brand_tag").html("");
		
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		
		
		
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+0+"&lprice="+lprice_val+"&hprice="+hprice_val+"&rate="+rate_val+"");
		prodcuct_multiple_filter();
		filter_tag_present(); 
			 
		   })	
		
		
		
		
	 $('body').delegate('#lowest_close','click',function() {
			 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid= search_params.get('cat'); 
		var brd_val = search_params.get('brd');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
		
		
		  
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		
		
		
		$("#Lower_tag").html("");
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+brd_val+"&lprice="+0+"&hprice="+hprice_val+"&rate="+rate_val+"");
		prodcuct_multiple_filter();
		filter_tag_present(); 
			 
		   })	
		
	

	 $('body').delegate('#highest_close','click',function() {
			 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid= search_params.get('cat'); 
		var brd_val = search_params.get('brd');
		var lprice_val= search_params.get('lprice');
		var rate_val = search_params.get('rate');
		  
		  
		$("#Highest_tag").html("");
		
		
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+brd_val+"&lprice="+lprice_val+"&hprice="+0+"&rate="+rate_val+"");
		prodcuct_multiple_filter();
		filter_tag_present(); 
			 
		   })		
		
		
		
		
		
		
	  $('body').delegate('#Rating_tag','click',function() {
			 
		var url = new URL(document.URL);
		var search_params = url.searchParams;
		var search_val = search_params.get('srch');
		var cid= search_params.get('cat'); 
		var brd_val = search_params.get('brd');
		var lprice_val= search_params.get('lprice');
		var hprice_val = search_params.get('hprice');
		var rate_val = search_params.get('rate');
		  
		  
		$("#Rating_tag").html("");
		
		
			
		var currentURL = window.location.pathname;
		var check_page_name =currentURL.includes("index_filter.php");
		
		if(check_page_name == true)
		{
			
			page_filter="index_filter";
		}
		else
		{
		
			page_filter="profile_filter";
			
		}
		
		
		
		window.history.pushState('page2', 'Title', "/project37/"+page_filter+".php?srch="+search_val+"&cat="+cid+"&brd="+brd_val+"&lprice="+lprice_val+"&hprice="+hprice_val+"&rate="+0+"");
		prodcuct_multiple_filter();
		filter_tag_present(); 
			 
		   })		
		
		
		

});