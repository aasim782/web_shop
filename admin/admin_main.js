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

  // get category  for product add list
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

  // get brand for product add list
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



  $("#prd_btns").on("click", function (event) {
	  
	     event.preventDefault(); //prevent from the submision
  $("#get_add_form").html("<div class='card card-warning card-outline'>   <div class='card-header text-center'  >				<h2>Add Product</h2>              </div>			            <div class='card-body'>            <form id='product_reg_form' >	 		<div id='product_reg_msg' > </div>		  <div class='form-row'>			<div class='col-md-6'>			  <label for='validationCustom01'>Product ID</label>			  <input type='text' class='form-control text-center' id='Product_id_txt' name=''    disabled>					</div>						<div class='col-md-6'>			  <label for='validationCustom02'>Date</label>			  <input type='date' class='form-control text-center' id='prd_add_date_txt'  name=''  >					</div>			</div>							<div class='form-row mt-2'>     <div class='form-group col-6'>           <label for='validationCustom02'>Category</label>     <select id='get_category' class='form-control'></select>    </div>   <div class='form-group col-6'>          <label for='validationCustom02'>Brand</label>      <select id='get_brand' class='form-control'></select>    </div>   </div>			  <div class='form-row '>		<div class='col-6'>		  <label for='validationCustom03'>Product Name</label>	  		  <input type='text' class='form-control' id='product_name_txt'  maxlength='18' name='product_name' placeholder='Product Name'>		</div>	   		<div class='col-md-6'>		  <label for='validationCustom05'>Product Price</label>		  <input type='number' class='form-control' id='product_price_txt' placeholder='Product Price'>	</div>	  </div>  	       <div class='form-row mt-2  '>    <div class='col-6 form-group'>  <label for='exampleFormControlFile1'>Select Product Image</label>    <input type='file' class='form-control-file' id='prd_img'>  </div>    <div class='col-6 form-group '>   <label for='exampleFormControlFile1'>Example file input</label>    <img class=' d-block w-48 ' height='70px' src='../prg_img/mouse.jpg' alt='Third slide'>  </div>  </div>      <div class='form-row mt-2'> <div class='col-12'>  <label for='validationCustom05'>Product Decription</label><textarea class='form-control' id='product_desc_txt'  name='product_dec' rows='10'></textarea> </div></div> <div class='form-row mt-2'><div class='col-12'><label for='validationCustom03'>Product Keywords</label>	   <textarea class='form-control' id='product_keywords_txt'  name='ProductKeyword' rows='3'></textarea></div> </div> <div class='modal-footer'> <button type='button' id='form_prd_add_btn' class='btn btn-danger'>Add</button><button type='button' class='btn btn-secondary'    data-card-widget='remove' '>Close</button></div></form> </div></div>");
	  
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
    var product_price_txt = $("#product_price_txt").val();
    var prd_img_txt = $("#prd_img").val();
    var product_desc_txt = $("#product_desc_txt").val();
    var product_keywords_txt =   $("#product_name_txt").val()+ " " +$("#product_keywords_txt").val() ;
	
	  
    if (
      Product_id_txt == "" ||
      prd_add_date_txt == "" ||
      get_category_txt == "0" ||
      get_brand_txt == "0" ||
      product_name_txt == "" ||
      product_price_txt == "" ||
      prd_img == "" ||
      product_desc_txt == "" ||
      product_keywords_txt == ""
    ) {
      $("#product_reg_msg").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Admin !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );
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
          product_keywords: product_keywords_txt,
        },
        success: function (data) {
          $("#product_reg_msg").html(data);
        },
      });
    }
  });

  $("#Category_reg_form").on("submit", function (event) {
    event.preventDefault(); //prevent from the submision

    var Category_txt = $("#Category_txt").val();

    if (Category_txt == "") {
      $("#Category_reg_msg").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Admin !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );
    } else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { add_category_admin: 1, category_name: Category_txt },
        success: function (data) {
          $("#Category_reg_msg").html(data);
          category_tbl_get_category();
        },
      });
    }
  });

  $("#brand_reg_form").on("submit", function (event) {
    event.preventDefault(); //prevent from the submision

    var bramd_txt = $("#bramd_txt").val();
    if (bramd_txt == "") {
      $("#brand_reg_msg").html(
        "<div class='alert alert-danger alert-dismissible fade show' role='alert' data-auto-dismiss><strong>Dear Admin !</strong> please fill all the field<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>"
      );
    } else {
      $.ajax({
        url: "admin_action.php",
        method: "POST",
        data: { add_brand_admin: 1, brand_name: bramd_txt },
        success: function (data) {
          $("#brand_reg_msg").html(data);
          brand_tbl_get_brand();
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

  //delete the product from table
  $("body").delegate(".product_delete", "click", function () {
    event.preventDefault();
    var product_id = $(this).attr("product_delete_id"); //get the value from our selected product id

    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { delete_admin_product: 1, product_delete_id: product_id }, // pass the arguments
      success: function (data) {
        product_tbl_get_product();
      },
    });
  });

  //edit the category from card
  $("body").delegate(".category_edit", "click", function () {
    event.preventDefault();

    var edit_pid = $(this).attr("category_edit_id"); //get the value from our selected product id

    $("#Category_txt_val").val(data);
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
        category_tbl_get_category();
      },
    });
  });

  //remove the brand from card
  $("body").delegate(".brand_delete", "click", function () {
    event.preventDefault();
    var brand_id = $(this).attr("brand_delete_id"); //get the value from our selected product id

    $.ajax({
      url: "admin_action.php",
      method: "POST",
      data: { delete_admin_brand: 1, brand_delete_id: brand_id }, // pass the arguments
      success: function (data) {
        brand_tbl_get_brand();
      },
    });
  });
});
