$(document).ready(function () {
  product_tbl_get_product();
  category_tbl_get_category();
  brand_tbl_get_brand();

  //used for admin panel product adding model
  get_product_id();

  function get_product_id() {
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_product_id: 1 },
      success: function (data) {
        $("#Product_id_txt").val(data);
      },
    });
  }

  // get today
  date();
  function date() {
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_date: 1 },
      success: function (data) {
        $("#prd_add_date_txt").val(data);
      },
    });
  }

//Get all category for the add product form 
  get_category_admin();
  function get_category_admin() {
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_category_admin: 1 },
      success: function (data) {
        $("#get_category").html(data);
      },
    });
  }

 //Get all brand for the add product form 
  get_brand_admin();
  function get_brand_admin() {
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_brand_admin: 1 },
      success: function (data) {
        $("#get_brand").html(data);
      },
    });
  }

  //call the funtions - without call prd details not full fill bcz form close rest
  $("body").delegate("#prd_btns", "click", function () {
    get_product_id();
    date();
    get_category_admin();
    get_brand_admin();
  });


	
//product Add form
	product_add_form();
  function product_add_form() {	
    $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: {
          get_product_add_form: 1,
 
        }, // get_search - req ,keywords passing
        success: function (data) {
									get_product_id();
									date();
									get_category_admin();
									get_brand_admin();
									product_tbl_get_product;
								$("#get_add_form").html(data);
	
						},
							});





 }
  





//file upload extension and size check  
   $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
 toastr.error('Invalid file format !');
 $("#file").val("");
 
	  
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
	toastr.error('Image File Size is very big !');
	$("#file").val("");
 
  }
 
 });
 
 

 
  // admin part
 
  $("body").delegate("#form_prd_add_btn", "click", function () {
    event.preventDefault(); //prevent from the submision
 
    //get the value from form using post method
    var Product_id_txt = $("#Product_id_txt").val();
    var prd_add_date_txt = $("#prd_add_date_txt").val();
    var get_category_txt = $("#get_category").val();
    var get_brand_txt = $("#get_brand").val();
    var product_name_txt = $("#product_name_txt").val();
    var product_profit_txt = $("#product_profit_txt").val();
	var get_item_price= $("#product_price_txt").val();
	var product_price_txt = ((product_profit_txt /100)*get_item_price) +parseInt(get_item_price) ;
    var product_desc_txt = $("#product_desc_txt").val();
    var Total_qty = $("#Total_qty").val();
    var get_weight_txt = $("#get_weight").val() ;
    var product_keywords_txt =   $("#product_keywords_txt").val() ;
    var product_keywords_name_plus_keywords =   $("#product_name_txt").val()+ " " +product_keywords_txt ;
	var files = $('#file')[0].files[0];
        if (Product_id_txt == ""  || get_weight_txt=="0" || prd_add_date_txt == "" || get_category_txt == "0" || get_brand_txt == "0" || product_name_txt == "" || product_price_txt == "" || typeof files == 'undefined'|| product_desc_txt == "" || Total_qty =="" || product_keywords_txt == "" || product_profit_txt=="") 
			{
				  toastr.error('Please fill all the fields');
			}	
			else
			{
				var fd = new FormData();		 
				fd.append('add_to_prd_tbl', 1); //arguments
				fd.append('file',files);
				fd.append('Product_id',Product_id_txt); //arguments
				fd.append('prd_add_date', prd_add_date_txt); //arguments
				fd.append('get_category',get_category_txt); //arguments
				fd.append('get_brand',get_brand_txt); //arguments
				fd.append('product_name',product_name_txt); //arguments
				fd.append('product_price',product_price_txt); //arguments
				fd.append('product_profit_rate',product_profit_txt); //arguments
				fd.append('product_desc',product_desc_txt); //arguments
				fd.append('product_keywords',product_keywords_name_plus_keywords); //arguments
				fd.append('prd_total_qty',Total_qty); //arguments
				fd.append('get_weight',get_weight_txt); //arguments
				
				    $.ajax({
                    url:'admin_action.php',
                    type:'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success:function(data){
						
						 					 
								  // 1 is from php code for the exist product 
								  if(data ==1)
								  {
									 toastr.error("Already product is exist");
								  } 
								   // 2 is from php code for the exist product but inactive 
								  else if(data==2)
								 {
								  toastr.error("Already product exists and it is inactive right now ");
								 }
								  else
								 {
								 
									toastr.success("Product successfully added");
									product_count();
									product_tbl_get_product();
									get_product_id();
									date();
									get_category_admin();
									get_brand_admin();
									 
									product_add_form();
									$('#product_reg_form')[0].reset();
									
								 }
						  
						
						 
  
                    }
                });
				
				
				
				
			}
 
 
  });
  
  
 //calculate current price with profit  change value at text box
  $("body").delegate("#product_price_txt", "input", function () {
	var get_item_price= $("#product_price_txt").val();
	var product_profit_txt = $("#product_profit_txt").val();
	var product_price_txt = ((product_profit_txt /100)*get_item_price) +parseInt(get_item_price) ;
	  $("#product_price_with_rate_txt").val(product_price_txt);
  })
  
  
  //calculate current price with profit increase rate
   $("body").delegate("#product_profit_txt", "input", function () {
	var get_item_price= $("#product_price_txt").val();
	var product_profit_txt = $("#product_profit_txt").val();
	var product_price_txt = ((product_profit_txt /100)*get_item_price) +parseInt(get_item_price) ;
	  $("#product_price_with_rate_txt").val(product_price_txt);
   })

 
 

  //admin login verification
  $("#admin_login_page_login_btn").click(function () {
    event.preventDefault(); //prevent from the submision
    var admin_email_txt = $("#admin_email_txt").val();
    var admin_password_txt = $("#admin_password_txt").val();
    var emailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (admin_email_txt == "" || admin_password_txt == "") {
      $("#admin_alert_msg_login").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );
    } else if (!emailformat.test(admin_email_txt)) {
      $("#admin_alert_msg_login").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss>Incorrect <strong>Email!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );
    } else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: {
          admin_userLogin: 1,
          admin_email: admin_email_txt,
          admin_password: admin_password_txt,
        }, // get_search - req ,keywords passing
        success: function (data) {
          $("#admin_alert_msg_login").html(data); //from php userLogin method in action
		
        },
      });
    }
  });

  //used for admin panel product adding model

  function product_tbl_get_product() {
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_admin_product: 1 },
      success: function (data) {
        $("#get_all_product").html(data);
      },
    });
  }

get_last_five_prd_dashbord();
   function get_last_five_prd_dashbord() {
	   
	       $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_last_five_prd_dashbord: 1 },
      success: function (data) {
        $("#get_five_product").html(data);
      },
    });
	
 
   }
 
 


product_count();
//product count for admin product 
	function product_count(){
	
	  $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { product_count:1},
        success: function (data) {
   			$("#count_product").html(data);
			
        },
      });

	}








  $("body").delegate(".product_edit", "click", function () 
  { 
  event.preventDefault();
	  var product_edit_id_txt = $(this).attr("product_edit_id"); //get the value from our selected product id

		$("#prd_footer").html("<button type='button' id='form_prd_update_btn' name='form_prd_update_btn' class='btn btn-success'>Update</button>");
	  
	 	 $.ajax({
				url: "admin_action.php",
				method: "POST",
				data: { edit_admin_product:1,product_edit_id:product_edit_id_txt},
				success: function (data) { 
				  if(data!=""){
					var array = data.split('*/*');
				 
					var pricewithprofit = parseInt(array[5]) ; //text to int
					var rate = parseInt(array[6]);; //text to int
				   
					$("#Product_id_txt").val(array[0]);
					$("#prd_add_date_txt").val(array[1]);
					$("#product_name_txt").val(array[4]);
					$("#product_price_txt").val(pricewithprofit-(((rate/(rate+100))*pricewithprofit)));
					$("#product_profit_txt").val(array[6]);
					$("#product_price_with_rate_txt").val(array[5]);
					$("#Total_qty").val(array[10]);
					$("#product_keywords_txt").val(array[11]); 
					$(".note-editable").html(array[8]);	
					$('#get_category').val(array[2]).change();
					$('#get_brand').val(array[3]).change();
					$('#get_weight').val(array[7]).change();

				  }	
				 
				  
				},
	  });
	  
	  
  })
  
  //update button
  $("body").delegate("#form_prd_update_btn", "click", function () 
  { 
   
    //get the value from form using post method
    var Product_id_txt = $("#Product_id_txt").val();
    var prd_add_date_txt = $("#prd_add_date_txt").val();
    var get_category_txt = $("#get_category").val();
    var get_brand_txt = $("#get_brand").val();
    var product_name_txt = $("#product_name_txt").val();
    var product_profit_txt = $("#product_profit_txt").val();
	var get_item_price= $("#product_price_txt").val();
	var product_price_txt = ((product_profit_txt /100)*get_item_price) +parseInt(get_item_price) ;
    var product_desc_txt =  $(".note-editable").html();	
    var Total_qty = $("#Total_qty").val();
    var get_weight_txt = $("#get_weight").val() ;
    var product_keywords_txt =   $("#product_keywords_txt").val() ;
    var product_keywords_name_plus_keywords = product_keywords_txt ;
	var files = $('#file')[0].files[0];
 
 
		if (Product_id_txt == ""  || get_weight_txt=="0" || prd_add_date_txt == "" || get_category_txt == "0" || get_brand_txt == "0" || product_name_txt == "" || product_price_txt == ""  || product_desc_txt == "" || Total_qty =="" || product_keywords_txt == "" || product_profit_txt=="") 
			{
				  toastr.error('Please fill all the fields');
			}	
			else
			{
				var fd = new FormData();		 
				fd.append('update_prd', 1); //arguments
				fd.append('file',files);
				fd.append('Product_id',Product_id_txt); //arguments
				fd.append('prd_add_date', prd_add_date_txt); //arguments
				fd.append('get_category',get_category_txt); //arguments
				fd.append('get_brand',get_brand_txt); //arguments
				fd.append('product_name',product_name_txt); //arguments
				fd.append('product_price',product_price_txt); //arguments
				fd.append('product_profit_rate',product_profit_txt); //arguments
				fd.append('product_desc',product_desc_txt); //arguments
				fd.append('product_keywords',product_keywords_name_plus_keywords); //arguments
				fd.append('prd_total_qty',Total_qty); //arguments
				fd.append('get_weight',get_weight_txt); //arguments
				
				  
				    $.ajax({
                    url:'admin_action.php',
                    type:'post',
                    data:fd,
                    contentType: false,
                    processData: false,
                    success:function(data){
						 
							 if(data==1)
								 {
									toastr.success('Successfully updated');//prd update 
								 
									product_tbl_get_product();
									get_product_id();
									date(); 
									product_add_form();
									$('#product_reg_form')[0].reset();
									
								 } 
					
					}
					})
				
				
				
				
				
				
				
			}
  
  })





 // product delete model
  $("body").delegate(".btn_product_delete", "click", function () {
    var product_delete_id = $(this).attr("product_delete_id"); //get the value from our selected product id
    var product_id 	= $("#product_delete_id_btn").val(product_delete_id); 
  })
  
  
  //delete the product from table
  $("body").delegate(".product_delete", "click", function () {
    event.preventDefault();
    var product_id 	= $("#product_delete_id_btn").val(); 
 
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { delete_admin_product: 1, product_delete_id: product_id }, // pass the arguments
      success: function (data) {
		  toastr.success('Successfully deleted');
		 product_count();
        product_tbl_get_product();
		 $('#product_del_confirm_Modal').modal('hide'); // hide the model
		 Prduct_table_footer_num();
      },
    });
  });



 //filter the product by the search box at admin
 $("#product_filter").keyup(function () {
	      var Serach_val = $("#product_filter").val();
		  
			$.ajax({
			url: "admin_action.php",
			method: "POST",
			data: { get_admin_product_filter: 1,Search_product_filter_table:Serach_val },
			success: function (data) {
			$("#get_all_product").html(data);
			},
			 });
		 


    
	
	
	 }) 
	 
	 
	 
	 
	 
	 
	 
	 
//------------------------------------------------------------Category
//get all catergory to the admin category table
  function category_tbl_get_category() {
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_admin_category: 1 },
      success: function (data) {
        $("#get_all_category").html(data);
      },
    });
  }



  
  
  //add the category
  $("body").delegate("#category_add_btn_admin", "click", function () {
    event.preventDefault(); //prevent from the submision

    var Category_txt = $("#Category_txt").val();

    if (Category_txt == "") {
          toastr.error('Please fill all the fields')
} else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { add_category_admin: 1, category_name: Category_txt },
        success: function (data) {

		// 1 is from php code for the exist product  and active
		 if(data ==1)
		 {
			toastr.error("Already this category exists");
		 }	
		 // 2 is from php code for the exist product  but inactive
		 else if(data==2)
		 {
			 toastr.error("Already this category exists and it is inactive right now ");
		 }
		  else
		 { 
			toastr.success("Successfully Added");	 
			category_count();
			category_tbl_get_category();
			$("#Category_txt").val("");
		 }
		 
		 

		   
        },
      });
    }
  });

category_count();
//category count for admin category option
	function category_count(){
	
	  $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { category_count:1},
        success: function (data) {
   			$("#count_catg").html(data);
			
        },
      });

	}
	


  //edit the category from card (add/update button autochange) 
  $("body").delegate(".category_edit", "click", function () {
    event.preventDefault();
	
	 toastr.warning('You can edit now');
    var edit_pid = $(this).attr("category_edit_id"); //get the value from our selected product id
	 $("#category_add_footer").html("<button type='submit' class='btn btn-success'  btn_val='"+edit_pid+"' id='category_update_btn_admin'>Update</button>");
	    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { edit_category: 1,pid: edit_pid}, // pass the arguments
      success: function (data) {
          $("#Category_txt").val(data);
      },
    });
	
 
  });
  
  
    //update the category at the admin panel
  $("body").delegate("#category_update_btn_admin", "click", function () {
     event.preventDefault();
	 
    var edit_pid = $(this).attr("category_edit_id"); //get the value from our selected product id
    var btn_val = $(this).attr("btn_val"); //get the value from our selected product id
     var Category_txt = $("#Category_txt").val();
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { update_admin_category: 1, Update_catg_id: btn_val,Update_Category_Val:Category_txt }, // pass the arguments
      success: function (data) {
		toastr.success('Successfully updated')
		  	  $('#Category_txt').val("");
			  $('#category_filter').val(""); // filter search text box in category table
			    $("#category_add_footer").html("<button type='submit' class='btn btn-danger'  id='category_add_btn_admin'>Add</button>");
			     category_tbl_get_category();
				  
      },
    });
  
	  });
 
 
 
 
  // change the category id to category confirm model
  $("body").delegate(".btn_category_delete", "click", function () {
    var delete_pid = $(this).attr("category_delete_id"); //get the value from our selected product id
	 $("#category_delete_id_btn").val(delete_pid); 
  })
  
  
  
  //remove the category from card
  $("body").delegate(".category_delete", "click", function () {
    event.preventDefault();
 
	var delete_pid= $("#category_delete_id_btn").val(); 
 
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { remove_admin_category: 1, delete_id: delete_pid }, // pass the arguments
      success: function (data) {
		  		toastr.success('Successfully deleted');
				category_count();
				category_tbl_get_category();
			  $('#category_form')[0].reset();
			  $('#category_filter').val(""); // filter category through search box 
			  $('#category_del_confirm_Modal').modal('hide'); // hide the model
			  Category_table_footer_num();
      },
    });
  });

 //filter the category by the search box at admin category table
 $("#category_filter").keyup(function () {
	      var Serach_val = $("#category_filter").val();
		  
			$.ajax({
			url: "admin_action.php",
			method: "POST",
			data: { get_admin_category_filter: 1,Search_category_filter_table:Serach_val },
			success: function (data) {
			$("#get_all_category").html(data);
			},
			 });
		 

	
	
	 }) 
//------------------------------------------------------------Category






//------------------------------------------------------------Brand
  //add the brand
  $("body").delegate("#brand_add_btn_admin", "click", function () {
    event.preventDefault(); //prevent from the submision

	var brand_txt = $("#brand_txt").val();

    if (brand_txt == "") {
          toastr.error('Please fill all the fields')
	} else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { add_brand_admin: 1, brand_name: brand_txt },
        success: function (data) {
			
			
	 // 1 is from php code for the exist brand  and active
		 if(data ==1)
		 {
			toastr.error("Already this brand exists");
		 }	
		 // 2 is from php code for the exist brand  but inactive
		 else if(data==2)
		 {
			 toastr.error("Already this brand exists and it is inactive right now");
		 }
		  else
		 { 
	 
			brand_count();
			toastr.success("Successfully Added");	 
			$("#brand_txt").val("");
			brand_tbl_get_brand();
		 }
		  
		  
	
        },
      });
    }
  });



//get all brand to the admin category table
  function brand_tbl_get_brand() {
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_admin_brand: 1 },
      success: function (data) {
        $("#get_all_brand").html(data);
      },
    });
  }




 // change the brand id to brand confirm model
  $("body").delegate(".btn_delete_model", "click", function () {
    var brand_id = $(this).attr("brand_delete_id"); //get the value from our selected brand id
	 $("#brand_delete_id_btn").val(brand_id); 
  })


  //remove the brand
  $("body").delegate(".brand_delete", "click", function () {
   event.preventDefault();
   var brand_id = $("#brand_delete_id_btn").val();
   
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { delete_admin_brand: 1, brand_delete_id: brand_id }, // pass the arguments
      success: function (data) {
		    brand_count();
        brand_tbl_get_brand();
		toastr.success('Successfully deleted');
		 $('#Brand_form')[0].reset();
		    $('#brand_filter').val("");
			$('#brand_del_confirm_Modal').modal('hide');
			 Brand_table_footer_num();
      },
    });
  });
  
  

 //edit the brand from card (add/update button autochange) 
  $("body").delegate(".brand_edit", "click", function () {
    event.preventDefault();
	 toastr.warning('You can edit now');
    var edit_pid = $(this).attr("brand_edit_id"); //get the value from our selected product id
	$("#Brand_add_footer").html("<button type='submit' class='btn btn-success'  btn_val='"+edit_pid+"' id='brand_update_btn_admin'>Update</button>");
	  
	  $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { edit_brand: 1,pid: edit_pid}, // pass the arguments
      success: function (data) {
          $("#brand_txt").val(data);
      },
    });
	
 
  });
  
  
   
    //update the brand at the admin panel
  $("body").delegate("#brand_update_btn_admin", "click", function () {
     event.preventDefault();
	 
    var edit_pid = $(this).attr("brand_edit_id"); //get the value from our selected product id
    var btn_val = $(this).attr("btn_val"); //get the value from our selected product id
     var brand_txt = $("#brand_txt").val();
    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { update_admin_brand: 1, Update_brand_id: btn_val,Update_brand_Val:brand_txt }, // pass the arguments
      success: function (data) {
		toastr.success('Successfully updated')
		  
			   	  $('#brand_txt').val("");
				   $('#brand_filter').val("");
			    $("#Brand_add_footer").html("<button type='submit' class='btn btn-danger'  id='brand_add_btn_admin'>Add</button>");
			     brand_tbl_get_brand();
				  
      },
    });
  
	  });
  
  
 
  brand_count();
//brand count for admin brand option
	function brand_count(){
	
	  $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { brand_count:1},
        success: function (data) {
   			$("#count_brand").html(data);
			
        },
      });

	}
	
	
	
 //filter the brand by the search box at admin category table
 $("#brand_filter").keyup(function () {
	 
	 var Serach_val = $("#brand_filter").val();
 
       
			$.ajax({
			url: "admin_action.php",
			method: "POST",
			data: { get_admin_brand_filter: 1,Search_brand_filter_table:Serach_val },
			success: function (data) {
		    $("#get_all_brand").html(data);
			},
			 });
		 

	
	
	 }) 
	 
	
 //------------------------------------------------------------Brand
  
  
 

 
 
	
 
 
 		//generating the page number at footer
		Prduct_table_footer_num();
		function Prduct_table_footer_num(){
		$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{Prduct_table_footer_num:1},
					success	:	function(data){
					$('#get_footer_num_product').html(data);
					}
					})
					
					}
					
					
					
		 //when the user click the particular page number it will be showup that page
		$('body').delegate('#product_tbl_page_num','click',function() {
			 event.preventDefault();
			var pagenum= $(this).attr('product_tbl_page_num');  
		 
					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_admin_product:1,setpagenumber:1,pagenumber:pagenum},
					success	:	function(data){
						$("#get_all_product").html(data);
					}
					})
			
		})		
					
					
					
					
					
					
					
		 //generating the page number at footer for category
		Category_table_footer_num();
		function Category_table_footer_num(){
		$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{Category_table_footer_num:1},
					success	:	function(data){
					$('#get_footer_num_category').html(data);
					}
					})
					
					}		
					
		 //when the user click the particular page number it will be showup that page
		$('body').delegate('#category_tbl_page_num','click',function() {
			 event.preventDefault();
			var pagenum= $(this).attr('category_tbl_page_num');  
	 
					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_admin_category:1,setpagenumber:1,pagenumber:pagenum},
					success	:	function(data){
						$("#get_all_category").html(data);
					}
					})
			
		})		
					
					
					
					
					
					
						 //generating the page number at footer
		Brand_table_footer_num();
		function Brand_table_footer_num(){
		$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{Brand_table_footer_num:1},
					success	:	function(data){
					$('#get_footer_num_brand').html(data);
					}
					})
					
					}
					
	
				
				 //when the user click the particular page number it will be showup that page
			  $('body').delegate('#brand_tbl_page_num','click',function() {
			 event.preventDefault();
			var pagenum= $(this).attr('brand_tbl_page_num');  
	 
					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_admin_brand:1,setpagenumber:1,pagenumber:pagenum},
					success	:	function(data){
						$("#get_all_brand").html(data);
					}
					})
			
		})		
					
					
	
	
	
	//get all ordered prd to order admin table 
	all_customer_order()	
		function all_customer_order(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{all_customer_order:1},
					success	:	function(data){
						$("#all_customer_order").html(data);
					}
					})
					
		}
		
		
		
		
		
		
	 //generating the page number at footer for all order table in admin
		all_customer_order_footer_num()
		function all_customer_order_footer_num(){
		$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{all_customer_order_footer_num:1},
					success	:	function(data){
 
					$('#get_customer_order_footer_num').html(data);
					}
					})
					
			 }
		 
		 
		 
		 
		 //all_customer_order_footer_num click
		 $('body').delegate('#all_order_table_footer_num','click',function() {
			var pagenum= $(this).attr('all_order_table_footer_num');  
			
					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{all_customer_order:1,setpagenumber:1,pagenumber:pagenum},
					success	:	function(data){
					$("#all_customer_order").html(data);
					}
					})
			
		})
			 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		
		 //filter the brand by the search box at admin category table
 $("#all_order_filter").keyup(function () {
	 
	 var Serach_val = $("#all_order_filter").val();
 
			$.ajax({
			url: "admin_action.php",
			method: "POST",
			data: { get_all_order_filter: 1,Search_all_orde_filter_table:Serach_val },
			success: function (data) {
		  		$("#all_customer_order").html(data);
			},
			 });
		 

	
	
	 }) 
	 

	 
	 //get all_delivered_orders to admin deliver table 
	get_all_delivered_orders()	
		function get_all_delivered_orders(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_delivered_orders:1},
					success	:	function(data){
						$("#all_delivered_orders").html(data);
					}
					})
					
		}
		
 
		 
		
			 //get all_panding_orders to admin deliver table 
	get_all_panding_orders()	
		function get_all_panding_orders(){
 
					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_panding_orders:1},
					success	:	function(data){
					$("#panding_orders").html(data);
				
					}
					})
					
			 
				 
		}
		
		 
		
			//count unpaid orders
	count_total_panding_order()	
		function count_total_panding_order(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{count_total_panding_order:1},
					success	:	function(data){
						$("#count_total_panding_order").html(data);
						$("#count_total_panding_order_noti").html(data);
					}
					})
					
		}
		

	 
	 
		
		
  
  	//get all process order  to admin processing table 
	get_all_process_orders()	
		function get_all_process_orders(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_process_orders:1},
					success	:	function(data){
						$("#get_all_process_orders").html(data);
					}
					})
					
		}
		
		
		 //count shpped orders
		count_total_process_order()	
		function count_total_process_order(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{count_total_process_order:1},
					success	:	function(data){
						$("#count_total_process_order").html(data);
						$("#count_total_process_order_noti").html(data);
						
						
					}
					})
					
		}
		
		
		
		
		
		
		
				
  
  	//get all shipped order  to admin processing table 
	get_all_shipped_orders()	
		function get_all_shipped_orders(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_shipped_orders:1},
					success	:	function(data){
						$("#get_all_shipped_orders").html(data);
					}
					})
					
		}
		
		//count shpped orders
		count_total_shipped_order()	
		function count_total_shipped_order(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{count_total_shipped_order:1},
					success	:	function(data){
						$("#count_total_shipped_order").html(data);
						$("#count_total_shipped_order_noti").html(data);
					}
					})
					
		}
		
		
		
		
		
		 
		
		
		  
  	//get all unpaid order  to admin processing table 
	get_all_unpaid_orders()	
		function get_all_unpaid_orders(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_unpaid_orders:1},
					success	:	function(data){
						$("#get_all_unpaid_orders").html(data);
					}
					})
					
		}
		
		
		
		
	//count unpaid orders
	count_total_unpaid_order()	
		function count_total_unpaid_order(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{count_total_unpaid_order:1},
					success	:	function(data){
						$("#count_total_unpaid_order").html(data);
						$("#count_total_unpaid_order_noti").html(data);
						
					}
					})
					
		}
		
		
		 
		
		
		//get all customer 
		get_all_customers()	
		function get_all_customers(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_customers:1},
					success	:	function(data){
						$("#get_all_customers").html(data);
					}
					})
					
		}
		
		
				 
		
		
		
		//change panding order to process order
			$('body').delegate('#order_accept_panding_btn','click',function() {
			 event.preventDefault();
				var ordid= $(this).attr('ordid');  
				var cust_order_id_txt= $(this).attr('cust_order_id');  
				 
			 
	 	    	$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{change_panding_to_process:1,order_id:ordid,cust_order_id:cust_order_id_txt},
					success	:	function(data){
						toastr.success('Order Accepted');
						get_all_panding_orders();
						all_customer_order();
						count_total_panding_order()	
						count_total_process_order()
						
					}
					})
					
					
					
			});
			
			
			
			
			
			 
		
 
		 
		
		//change panding order to process order
			$('body').delegate('#order_shipment_btn','click',function() {
			 event.preventDefault();
			 var ordid= $(this).attr('ordid');  
			 var cust_order_id_txt= $(this).attr('cust_order_id');  
			 
						$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{change_process_to_shipment:1,order_id:ordid,cust_order_id:cust_order_id_txt},
					success	:	function(data){
						toastr.success('Item shipped  to the customer');
						all_customer_order();
						get_all_process_orders()
						count_total_process_order()
						count_total_shipped_order()	
					}
					})
					
					
			});
		
		//bank deposit slip view btn code
			$('body').delegate('#bankslip_image_btn','click',function() {
			 event.preventDefault();
			 
		 	 var ordid= $(this).attr('ordid');  
			 
		 		$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{bankslip_image_view:1,order_id:ordid},
					success	:	function(data){
				 
								$("#bankslip_image_View").html(data);
					}
					})
			 	
					
			});
		
 
 
 
 
 
   
		
		
	//All order header .when click on top load the page 
		$('body').delegate('#total_pending_order','click',function() {
		window.open("pending_order.php","_self");
			
		});
		
		$('body').delegate('#total_processing_order','click',function() {
		window.open("processing_order.php","_self");
			
		});

		$('body').delegate('#total_shipped_order','click',function() {
		window.open("shipped_order.php","_self");
			
		}); 

		$('body').delegate('#total_unpaid_order','click',function() {
		window.open("un_paid_order.php","_self");
			
		});
		
		
		
		
		
		
		
		
		
		
		 //get all customer feedback
		get_all_customers_feedback();	
		function get_all_customers_feedback(){
 
					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_customers_feedback:1},
					success	:	function(data){
					 
						$("#get_all_customers_feedback").html(data);
					}
					})
					
		}
		
		
		
			//get all customer complain
		get_all_customers_complain()	
		function get_all_customers_complain(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_customers_complain:1},
					success	:	function(data){
						$("#get_all_customers_complain").html(data);
						
					}
					})
					
		}	
		
		
		
		
		
			
		
		
 
 
 
 //courier login
	$("#courier_login_page_login_btn").click(function(){	
	event.preventDefault(); //prevent from the submision
		var cori_email_txt = $('#cori_email_txt').val();
		var cori_password_txt = $('#cori_password_txt').val();
		var emailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
			if(cori_email_txt == "" || cori_password_txt == "")
			{
				
			$('#cori_login_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear User!</strong> Please fill all the fields<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
			}
			
			else if(!emailformat.test(cori_email_txt))
			{
				$('#cori_login_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss>Incorrect <strong>Email!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
		
			}
	
			else{	
		
				$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{courier_login:1,cori_email:cori_email_txt,cori_password:cori_password_txt}, // get_search - req ,keywords passing
					success	:	function(data){
				
							$('#cori_login_alert_msg').html(data); 	//from php userLogin method in action
					}
					})
						
				
			}
		})
	
 
	 //db_backup_btn
	$("#db_backup_btn").click(function(){	
		event.preventDefault(); //prevent from the submision
	 			$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{db_backup:1}, 
					success	:	function(data){
					window.open("/Project37/admin/database_backup_code.php");
				 	$('#db_backup_msg').html(data); 

					}
					})
 
	});
		
	 
	//coriour tracking page update button coded 
	 $("#courier_tracking_info_update_btn").click(function(){	
	 event.preventDefault(); //prevent from the submision
	 var cori_tracking_id_txt = $('#cori_tracking_id_txt').val();
			if(cori_tracking_id_txt=="")
			{
				 	$('#cori_tracking_alert_msg').html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong> Please enter the tracking ID</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"); 
			}else
			{
				$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{courier_tracking_info_update:1,cori_tracking_id:cori_tracking_id_txt}, 
					success	:	function(data){
				 	$('#cori_tracking_alert_msg').html(data); 
					$('#cori_tracking_id_txt').val("");

					}
					})
			}
	 })
		
		
	 
 //remove the product from card
$("body").delegate(".remove","click",function(){
		event.preventDefault();
		var cust_order_id= $(this).attr('cust_order_id'); //get the order id from our selected product
	  
			$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{remove_cus_order:1,remove_cust_order_id:cust_order_id}, // pass the arguments
					success	:	function(data){
					toastr.success("Order Cancelled");	 
						all_customer_order();
						all_customer_order_footer_num();
						get_all_unpaid_orders();
						get_all_panding_orders()	
					}
					})
		
	})



		 
	

//out of stock model
var url = new URL(document.URL);
var search_params = url.searchParams;
var login_success = search_params.get('success');
	
if(login_success==1){
	out_of_stock();
}

function out_of_stock(){
	
	   $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { get_out_of_stock_product: 1 },
      success: function (data) {
	  	$('#out_of_stock_list').html(data); 
	    $('#out_of_stock_Modal').modal('show');
      },
    });
	
	
}
 


//file upload extension,size,width and height
   $(document).on('change', '#file_banner', function(e){
  var name = document.getElementById("file_banner").files[0].name;
  var _URL = window.URL || window.webkitURL;
 var file, img;
	 
	   
 // image width and height validation	

    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
        var width=this.width;
         var height=this.height;
	
         if((width < 1520 || height < 400) || (width > 1550 || height > 400))
         {
		 
           	toastr.error('Image width and height is not match');
			$("#file_banner").val("");
         }
       
         
        };
        img.src = _URL.createObjectURL(file);
    }
	
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
 toastr.error('Invalid file format !');
 $("#file_banner").val("");
  
	  
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
	toastr.error('Image File Size is very big !');
	$("#file_banner").val("");
 
  }
 
 

	
 });
 




//add the banner
	  $("body").delegate("#banner_add_btn", "click", function () {
		  event.preventDefault();
		  	var banner_title_txt = $("#banner_title").val();
			var file = $('#file_banner')[0].files[0];
			
			if (banner_title_txt == "" || typeof file == 'undefined') 
			{
				  toastr.error('Please fill all the fields');
			}	
			else
			{
				var fd_banner = new FormData();		 
				fd_banner.append('add_banner', 1); //arguments
				fd_banner.append('files',file);
				fd_banner.append('banner_title', banner_title_txt); //arguments
				
						$.ajax({
									url:'admin_action.php',
									type:'post',
									data:fd_banner,
									contentType: false,
									processData: false,
									success:function(data){ 
									toastr.success('Banner successfully added'); //successful msg
											$('#banner_form')[0].reset();
											 banner_count();
											  get_banner();
									  }
							  });
								
			}
		    
	  })
	  
	  
	  
	  
	  
  banner_count();
//count the total banners
	function banner_count(){
	
	  $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { banner_count:1},
        success: function (data) {
   			$("#count_banner").html(data);
			
        },
      });

	}




  get_banner();
//get the banners
	function get_banner(){
	
	  $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { get_banner:1},
        success: function (data) {
   			$("#get_all_banners").html(data);
			
        },
      });

	}


//delete the banner
	  $("body").delegate(".btn_banner_delete", "click", function () {
		   event.preventDefault();
		  var banner_title_txt= $(this).attr("banner_title");
 
		   $.ajax({
			  url: "admin_action.php",
			  method: "POST",
			  data: { remove_admin_branner: 1, banner_title: banner_title_txt }, // pass the arguments
			  success: function (data) {
			 			  toastr.success('Successfully deleted');
						   get_banner();
						     banner_count();
				   
				 }
				  
	  });

	  })






  //offer image date picker validation
	$('#Offer_end_txt').change(function(event){
				var Offer_str_txt = $("#Offer_str_txt").val();
				var Offer_end_txt = $("#Offer_end_txt").val();
		
		if(Offer_str_txt=="")
		{
			  toastr.error('Please select starting date');
			    $("#Offer_end_txt").val("");
		}
		else if( Offer_str_txt> Offer_end_txt)
		{
			toastr.error('Incorrect date selection');
			    $("#Offer_end_txt").val("");
		}
})


//offer add
	  $("body").delegate("#offer_add_btn_admin", "click", function () {
		   event.preventDefault();		 
		   
		     	var Offer_desc_txt = $("#Offer_desc_txt").val();
				var Offer_str_txt = $("#Offer_str_txt").val();
				var Offer_end_txt = $("#Offer_end_txt").val();
				var Offer_rate_txt = $("#Offer_rate_txt").val();
				
			if (Offer_desc_txt == "" ||  Offer_str_txt == "" || Offer_end_txt == "" || Offer_rate_txt == "" ) 
			{
				  toastr.error('Please fill all the fields');
			}	
			else if( Offer_str_txt> Offer_end_txt)
			{
				  toastr.error('Incorrect date selection');
				   $("#Offer_str_txt").val("");
				   $("#Offer_end_txt").val("");
			}
			else
			{
				
				$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{Offer_add:1,Offer_desc:Offer_desc_txt,Offer_str:Offer_str_txt,Offer_end:Offer_end_txt,Offer_rate:Offer_rate_txt}, 
					success	:	function(data){
								toastr.success('Successfully added');
								 get_offer();
								$('#offer_form')[0].reset();
					}
					})
				
			}
				
						 
						
		  
	  })
		  
		  
 get_offer();
//get offer
	function get_offer(){
		
	  $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { get_offer:1},
        success: function (data) {
   			$("#get_all_offer").html(data);
			
        },
      });
	}
	
	
 get_ongoing_offer();
//get offer to admin banner and home page
	function get_ongoing_offer(){
		
		  $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { get_ongoing_offer:1},
        success: function (data) {
   			
				if(data==""){
					$("#current_offer_at_admin").html("No offer being selected");
				}
				else
				{
					$("#current_offer_at_admin").html(data);
					$("#current_offer_at_index").html(data);
				}
        },
      });
	
	}
	
	
	
	
	
	//delete the offer
	  $("body").delegate(".btn_offer_delete", "click", function () {
	  event.preventDefault();	
		var offer_id_txt = $(this).attr("offer_id");
		 
	 $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { delete_offer:1,offer_id:offer_id_txt},
        success: function (data) {
   				toastr.success('Successfully deleted');
				 get_offer();
   		  
        },
      });
	  
	  
	  
	  })
	
	
		//edit the offer
	  $("body").delegate(".btn_offer_edit", "click", function () {
		 event.preventDefault();	 
		 var offer_id_txt = $(this).attr("offer_id");
		$("#offfer_footer").html("<button type='submit' class='btn btn-success'  offter_edit_btn_val='"+offer_id_txt+"' id='offer_update_btn_admin'>Update</button>");
	  
	 	 $.ajax({
				url: "admin_action.php",
				method: "POST",
				data: { edit_offer:1,offer_id:offer_id_txt},
				success: function (data) {
	  
				  if(data!=""){
					toastr.warning('You can edit now');
					var array = data.split('*/*');
					var Offer_desc_txt = $("#Offer_desc_txt").val(array[0]);
					var Offer_str_txt = $("#Offer_str_txt").val(array[1]);
					var Offer_end_txt = $("#Offer_end_txt").val(array[2]);
					var Offer_rate_txt = $("#Offer_rate_txt").val(array[3]);

				  }
				},
	  });
			  
	  })
	  
	  	//update the offer
	  $("body").delegate("#offer_update_btn_admin", "click", function () {	
		  event.preventDefault();
	
				var offer_id_txt = $(this).attr("offter_edit_btn_val");
				var Offer_desc_txt = $("#Offer_desc_txt").val();
				var Offer_str_txt = $("#Offer_str_txt").val();
				var Offer_end_txt = $("#Offer_end_txt").val();
				var Offer_rate_txt = $("#Offer_rate_txt").val();
				 
			if (Offer_desc_txt == "" ||  Offer_str_txt == "" || Offer_end_txt == "" || Offer_rate_txt == "" ) 
			{
				  toastr.error('Please fill all the fields');
			}
			else if( Offer_str_txt> Offer_end_txt)
			{
				  toastr.error('Incorrect date selection');
				   $("#Offer_str_txt").val("");
				   $("#Offer_end_txt").val("");
			}			
			else
			{
				
				$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{Offer_update:1,Offer_desc:Offer_desc_txt,Offer_str:Offer_str_txt,Offer_end:Offer_end_txt,Offer_rate:Offer_rate_txt,offer_id:offer_id_txt}, 
					success	:	function(data){
								toastr.success('Successfully updated');
								$('#offer_form')[0].reset();
								get_offer();
								 get_ongoing_offer();
							 $("#offfer_footer").html("<button type='submit' class='btn btn-danger'  id='offer_add_btn_admin'>Add</button>");
					}
					})
			 
			}
				
	 
	  })
	
	
		  	//deactive the offer
	  $("body").delegate("#deactive_btn", "click", function () {	
	   event.preventDefault();
	   	var offer_id_txt = $(this).attr("offer_dactive_id");
 
	 			$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{offer_deactive:1,offer_inactive_id:offer_id_txt}, 
					success	:	function(data){
								toastr.success('Successfully diactivated');
								get_offer();
								get_ongoing_offer();
					}
					})
					
					
					
	  })
	  
	  
	  
	   //active the offer
	  $("body").delegate("#btn_offer_active", "click", function () {	
	   event.preventDefault();
			var offer_id_txt = $(this).attr("offer_active_id");
 
			var offer_id_txt = $(this).attr("offer_active_id");
			var st_date = $(this).attr("st_date");
			var end_date = $(this).attr("end_date");
			var today = new Date().toISOString().split('T')[0]
		 
		 
				if(today>end_date){
					
						toastr.error('Offer expired');
				}
				else
				{
					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{offer_active:1,offer_active_id:offer_id_txt}, 
					success	:	function(data){
								toastr.success('Successfully activated');
								get_offer();
								get_ongoing_offer();
								
								
					}
					})			
					
				}
		 
	 
					
	  })
	  



//total Sales
 total_number_of_sale();
function total_number_of_sale(){

	 	$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{total_number_of_sale:1}, 
					success	:	function(data){
					 
					 if(data!="")
						{
							var array = data.split('*/*');
						  
								$("#count_total").html(array[0]);
								$("#count_total_Revenue").html("Rs."+ array[1] +".00");
								$("#count_total_Profit").html("Rs."+ array[2] +".00");
								$("#count_total_Cost").html("Rs."+ array[3] +".00");
								
						}
						 
		 }
 })	

}




//count customer
count_total_customers();
function count_total_customers(){
	
				$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{count_total_customers:1}, 
					success	:	function(data){
						 
							$("#total_customers").html(data);
					}
					})			
					
	
}


var bar_jan_val;
//customer order month wise for dashboard
customer_order_month();
 function customer_order_month(){

	 				$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{customer_order_month:1}, 
					success	:	function(data){
						  
					 if(data!="")
						{
							var month_array = data.split('*/*');
							bar_jan_val = month_array[0];							 
							 
								alert(bar_jan_val);
						}
						
						
					}
					})			
 }
 
 
fast_moving_prd();
//top fast moving products
fast_moving_prd()
function fast_moving_prd(){
	   
}




});
