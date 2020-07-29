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
  $("#prd_btns").on("click", function (event) {
	event.preventDefault(); //prevent from the submision

   $("#get_add_form").html("<div class='card card-warning card-outline'>   <div class='card-header text-center'  ><div class='card-tools'><button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-minus'></i></button><button type='button' class='btn btn-tool' data-card-widget='remove'><i class='fas fa-times'></i></button></div>				<h2>Add Product</h2>              </div>			            <div class='card-body'>            <form id='product_reg_form' >	 		<div id='product_reg_msg' > </div>		  <div class='form-row'>			<div class='col-md-6'>			  <label for='validationCustom01'>Product ID</label>			  <input type='text' class='form-control text-center' id='Product_id_txt' name=''    disabled>					</div>						<div class='col-md-6'>			  <label for='validationCustom02'>Date</label>			  <input type='date' class='form-control text-center' id='prd_add_date_txt'  name=''  >					</div>			</div>							<div class='form-row mt-2'>     <div class='form-group col-6'>           <label for='validationCustom02'>Category</label>     <select id='get_category' class='form-control'></select>    </div>   <div class='form-group col-6'>          <label for='validationCustom02'>Brand</label>      <select id='get_brand' class='form-control'></select>    </div>   </div>			  <div class='form-row '>		<div class='col-6'>		  <label for='validationCustom03'>Product Name</label>	  		  <input type='text' class='form-control' id='product_name_txt'  maxlength='18' name='product_name' placeholder='Product Name'>		</div>	   		<div class='col-md-6'>		  <label for='validationCustom05'>Product Price</label>		  <input type='number'  min='1' class='form-control' id='product_price_txt' placeholder='Product Price'>	</div>	  </div>  	       <div class='form-row mt-2  '>    <div class='col-6 form-group'>    <label for='validationCustom03'>Total Quantity</label>	  		  <input type='number' min='1'  class='form-control' id='Total_qty' maxlength='10' name='Total_qty' placeholder='Total Quantity' autocomplete='off'>	   <label for='exampleFormControlFile1' class='mt-1'>Select Product Image</label>  <div class='custom-file' >  <input     type='file' name='file' id='file' ></div> </div>    <div class='col-6 form-group mt-2 text-center'> <label for='exampleFormControlFile1' id='uploaded_image' width='50%'><img src='./upload/No_Image.png' height='150' width='225' class='img-thumbnail'> </label></div>  </div>      <div class='form-row mt-2'> <div class='col-12'><label for='validationCustom05'>Product Decription</label> <div class='col-md-12'>   <textarea class='textarea' id='product_desc_txt'  name='product_dec' placeholder='Place some text here'style='width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 30px;'></textarea>                            </div>           </div>        </div> <div class='form-row mt-2'> <div class='col-12'><label for='validationCustom03'>Product Keywords</label>	<div class='col-md-12'>    <textarea class='form-control' id='product_keywords_txt'  name='ProductKeyword' rows='3'></textarea>   </div> <div class='modal-footer'> <button type='button' id='form_prd_add_btn' class='btn btn-danger'>Add</button><button type='button' class='btn btn-secondary'    data-card-widget='remove' >Close</button></div></form> </div></div><script>$(function () { $('.textarea').summernote() })</script></div></div> ");
  })
  


  // admin part
 
	    $("body").delegate("#form_prd_add_btn", "click", function () {
    event.preventDefault(); //prevent from the submision

    //get the value from form using post method
    var Product_id_txt = $("#Product_id_txt").val();
    var prd_add_date_txt = $("#prd_add_date_txt").val();
    var get_category_txt = $("#get_category").val();
    var get_brand_txt = $("#get_brand").val();
    var product_name_txt = $("#product_name_txt").val();
    var image_name = $("#file").val();
    var product_price_txt = $("#product_price_txt").val();
    var prd_img_txt = $("#prd_img").val();
    var product_desc_txt = $("#product_desc_txt").val();
    var Total_qty = $("#Total_qty").val();
    var product_keywords_txt =   $("#product_keywords_txt").val() ;
    var product_keywords_name_plus_keywords =   $("#product_name_txt").val()+ " " +product_keywords_txt ;
 
  
 var slip =image_name.split('fakepath\\');
    if (
      Product_id_txt == "" ||
      prd_add_date_txt == "" ||
      get_category_txt == "0" ||
      get_brand_txt == "0" ||
      product_name_txt == "" ||
      product_price_txt == "" ||
      prd_img_txt == "" ||
      product_desc_txt == "" ||
	  Total_qty =="" ||
      product_keywords_txt == "" || image_name==""
    ) {
	  toastr.error('Please fill all the field');
    } else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: {
          add_to_prd_tbl: 1,
          Product_id: Product_id_txt,
          prd_add_date: prd_add_date_txt,
          get_category: get_category_txt,
          get_brand: get_brand_txt,
          product_name: product_name_txt,
          product_price: product_price_txt,
          prd_img: prd_img_txt,
          product_desc: product_desc_txt,
          product_keywords: product_keywords_name_plus_keywords,
          prd_total_qty: Total_qty,
        },
        success: function (data) {
			
		 
		  // 1 is from php code for the exist product 
		  if(data ==1)
		  {
			 toastr.error("Already product is exist");
		  } 
		   // 2 is from php code for the exist product but inactive 
		  else if(data==2)
		 {
		  toastr.error("Already product is exist and it has inactive ");
		 }
		  else
		 {
		 
			toastr.success("Product successfully added");
			product_count();
			product_tbl_get_product();
			$("#get_add_form").html("");
			$('#product_reg_form')[0].reset();
		 }
  
  
  
  
  
 
  
		
        },
      });
    }
  });
  
  


 
 

  //admin login verification
  $("#admin_login_page_login_btn").click(function () {
    event.preventDefault(); //prevent from the submision
    var admin_email_txt = $("#admin_email_txt").val();
    var admin_password_txt = $("#admin_password_txt").val();
    var emailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (admin_email_txt == "" || admin_password_txt == "") {
      $("#admin_alert_msg_login").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Customer !</strong> Please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );
    } else if (!emailformat.test(admin_email_txt)) {
      $("#admin_alert_msg_login").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss>Incorrect <strong>Email !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
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

  //delete the product from table
  $("body").delegate(".product_delete", "click", function () {
    event.preventDefault();
    var product_id = $(this).attr("product_delete_id"); //get the value from our selected product id

    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { delete_admin_product: 1, product_delete_id: product_id }, // pass the arguments
      success: function (data) {
		  toastr.success('Successfully deleted');
		 product_count();
        product_tbl_get_product();
      },
    });
  });



 //filter the category by the search box at admin category table
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
          toastr.error('Please fill all the field')
} else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { add_category_admin: 1, category_name: Category_txt },
        success: function (data) {

		// 1 is from php code for the exist product  and active
		 if(data ==1)
		 {
			toastr.error("Already category is exist");
		 }	
		 // 2 is from php code for the exist product  but inactive
		 else if(data==2)
		 {
			 toastr.error("Already category is exist and it has inactive ");
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
 
 
 
  //remove the category from card
  $("body").delegate(".category_delete", "click", function () {
    event.preventDefault();

    var delete_pid = $(this).attr("category_delete_id"); //get the value from our selected product id

    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { remove_admin_category: 1, delete_id: delete_pid }, // pass the arguments
      success: function (data) {
		  		toastr.success('Successfully deleted');
				category_count();
			category_tbl_get_category();
			  $('#category_form')[0].reset();
			  $('#category_filter').val(""); // filter search text box in category table
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
          toastr.error('Please fill all the field')
	} else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { add_brand_admin: 1, brand_name: brand_txt },
        success: function (data) {
			
			
	 // 1 is from php code for the exist brand  and active
		 if(data ==1)
		 {
			toastr.error("Already brand is exist");
		 }	
		 // 2 is from php code for the exist brand  but inactive
		 else if(data==2)
		 {
			 toastr.error("Already brand is exist and it has inactive ");
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



  //remove the brand
  $("body").delegate(".brand_delete", "click", function () {
    event.preventDefault();
    var brand_id = $(this).attr("brand_delete_id"); //get the value from our selected product id

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
  
  
  
  
  
   $(document).on('change', '#file', function(){
	 
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {


 $("#product_reg_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss>Invalid <strong>file format !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
 $("#file").val("");
 $("#uploaded_image").html("");
	  
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
	$("#product_reg_msg").html("<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss>Image File Size <strong>is very big !</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
 $("#file").val("");
 $("#uploaded_image").html("");
  
  
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
  
   $.ajax({
    url:"admin_action.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
 
 
 
 
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
					data	:	{get_admin_category:1,setpagenumber:1,pagenumber:pagenum},
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
	all_delivered_orders()	
		function all_delivered_orders(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{all_delivered_orders:1},
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
		
		
		
		
		
				
  
  	//get all process order  to admin processing table 
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
		
		
		
		
		
		
		//get all process order  to admin processing table 
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
		
		
		
		
		  
  	//get all process order  to admin processing table 
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
		function get_all_customers(){

					$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{get_all_customers_complain:1},
					success	:	function(data){
						$("#get_all_customers_complain").html(data);
						
					}
					})
					
		}
		
		
		
		
		//change panding order to process order
			$('body').delegate('#order_accept_panding_btn','click',function() {
			 event.preventDefault();
				var ordid= $(this).attr('ordid');  
			 
	 	    	$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{change_panding_to_process:1,order_id:ordid},
					success	:	function(data){
						toastr.success('Order Accepted');
						get_all_panding_orders();
						all_customer_order();
					}
					})
					
					
					
			});


	
		 
		
		//change panding order to process order
			$('body').delegate('#order_cancel_panding_btn','click',function() {
			 event.preventDefault();
			 var ordid= $(this).attr('ordid');  
				alert(ordid);
					
					
					
			});
		
		
			
		 
		
		//change panding order to process order
			$('body').delegate('#order_shipment_btn','click',function() {
			 event.preventDefault();
			 var ordid= $(this).attr('ordid');  
			 
						$.ajax({
					url		:	"admin_action.php",
					method	:	"POST",
					data	:	{change_process_to_shipment:1,order_id:ordid},
					success	:	function(data){
						toastr.success('Item shipped  to the customer');
						all_customer_order();
						get_all_process_orders()	
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

		$('body').delegate('#total_delivered_order','click',function() {
		window.open("delivered_order.php","_self");
			
		});
		
 
});
