<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Pratyusha</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="responsive.css" type="text/css">

<!--font-family: 'Raleway', sans-serif;-->
 <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script src="jquery.min.js"></script>

<!-- <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script> -->
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link  rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css">
<script src="js/jquery.datetimeduck.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".menu_trigger").click(function(){
		$(".menu_blg ul").slideToggle();
        
	});
});
</script>


<style>

/*Basic reset*/
* {margin: 0; padding: 0;}


/*heading styles*/
#accordian h3 {
	font-size: 15px;
	line-height: 34px;
	padding: 0 10px;
	cursor: pointer;
	color:#FFF;
	/*fallback for browsers not supporting gradients*/
	/*background: #003040; 
	background: linear-gradient(#fif3fa, #002535);*/
}
/*heading hover effect*/
/*#accordian h3:hover {
	text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
}
*//*iconfont styles*/
#accordian h3 span {
	font-size: 24px;
	margin-right: 10px;
	
}
/*list items*/
#accordian li {
	list-style-type: none;
}
/*links*/
#accordian ul ul li a {
	color: white;
	text-decoration: none;
	font-size: 13px;
	line-height: 38px;
	display: block;
	padding: 0px 15px 0px 10px;
	/*transition for smooth hover animation*/
	transition: all 0.15s;
}
/*hover effect on links*/
#accordian ul ul li a:hover {
	/*background: #003545;*/
	  background: #00a2c7;
	border-left: 5px solid #DDD;
}
/*Lets hide the non active LIs by default*/
#accordian ul ul {
	display: none;
}
#accordian li.Active ul {
	display: block;
}
#accordian li.Active h3 {
/* background: red;
  background: #085FB2;
  background: linear-gradient(#015DAE, #395BB4);*/
background: #00a2c7;
}
</style>
</head>

<body>
	<div class="site_wrap">
    	
        	<div class="site_lft">
            	<!--login_blg-->
                <?php /*?><div class="menu_blg">
                	<div class="menu_trigger">
            			<a href="#"><img src="images/nav-icn.png" alt=""></a>
           			 </div><!--menu_trigger-->
                    
                	<ul>
                    	<li <?php echo $left_dashboard_focus;?>>
                        	<a href="index.php?option=com_dashboard"><img src="images/list_pics_03.png">
                            <span>Dashboard</span></a>                        </li>
                            
                            
                            
                       <li <?php echo $left_cat_focus;?>>
                           <a href="index.php?option=com_category"><img src="images/list_pics_07.png">
                            <span>Category Management</span></a> </li>
                            
                            
                          <li <?php echo $left_subcat_focus;?>>
                           <a href="index.php?option=com_subcategory"><img src="images/list_pics_07.png">
                            <span>Sub Category</span></a> </li>
                            
                            <li <?php echo $left_subcat_focus;?>>
                           <a href="index.php?option=com_barnd"><img src="images/list_pics_07.png">
                            <span>Brands</span></a> </li> 
                            
                        <li <?php echo $left_products_focus;?>>
                        	<a href="index.php?option=com_productslist"><img src="images/list_pics_07.png">
                            <span>Product Management</span></a>                        </li>
                        <li <?php echo $left_order_focus;?>>
                        	<a href="index.php?option=com_orderlist"><img src="images/list_pics_11.png">
                            <span>Orders Management</span></a>                        </li>
                       <!-- <li <?php echo $left_page_focus;?>>
                        	<a href="#"><img src="images/list_pics_15.png">
                            <span>Reports</span></a>
                        </li>-->
                        <li <?php echo $left_customers_focus;?>>
                        	<a href="index.php?option=com_customers"><img src="images/list_pics_19.png">
                            <span>Customer Management</span></a>                        </li>
                        <!--<li <?php echo $left_users_focus;?>>
                        	<a href="index.php?option=com_users"><img src="images/list_pics_39.png">
                            <span>Staff Management</span></a>                        </li>-->
                        
                        <li <?php echo $left_banners_focus;?>>
                        	<a href="index.php?option=com_banners"><img src="images/list_pics_23.png">
                            <span>Banner Management</span></a>                        </li>
                        <li <?php echo $left_coupoun_focus;?>>
                        	<a href="index.php?option=com_coupouns"><img src="images/list_pics_27.png">
                            <span>Discount Coupons</span></a>                        </li>
                        <li <?php echo $left_subscription_focus;?>>
                        	<a href="index.php?option=com_subscription"><img src="images/list_pics_31.png">
                            <span>Newsletter Subscription</span></a>                        </li>
						
						 <li <?php echo $left_faq_focus;?>>
                        	<a href="index.php?option=com_faqs"><img src="images/faqicon.png">
                            <span>FAQ's</span></a>                        </li>
                            
                         <li <?php echo $left_reviews_focus;?>>
                        	<a href="index.php?option=com_reviews"><img src="images/faqicon.png">
                            <span>Reviews</span></a>                        </li>
                           <!-- 
                        <li <?php echo $left_page_focus;?>>
                        	<a href="#"><img src="images/list_pics_35.png">
                            <span>Financial Statistics</span></a>                        </li>
                        
                        <li <?php echo $left_page_focus;?>>
                        	<a href="#"><img src="images/list_pics_42.png">
                            <span>Total Statistics</span></a>                        </li>-->
                    </ul>
                   
              </div><?php */?><!--menu_blg-->
<div id="accordian">
	<ul>

    
    
    <li <?php  if($option=="com_dashboard" ||$option=="com_sitesettings" ){ echo "class='Active'" ; }?>>
        <h1><img src="<?php echo SITEURL; ?>/uploads/site/<?php echo $site_settings_disp->site_image; ?>" height="110"></h1>
      <h3><span class="icon-tasks"></span>Dashboard </h3>
       <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_dashboard"> Dashboard</a> </li>
         <!-- <li <?php echo $left_sitesettings_focus;?>><a href="index.php?option=com_sitesettings"> Site Settings</a> </li> -->
        </ul>
    </li>
    
    <li <?php  if($option=="com_customers" || $option=="com_customers_insert" || $option=="com_regusers" || $option=="com_regusers_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>User Mangement</h3>
    
        <ul>
        <?php /*?><li <?php echo $left_users_focus;?>><a href="index.php?option=com_users">Admin User Management</a> </li><?php */?>
       <?php /*?> <li <?php echo $left_customers_focus;?>><a href="index.php?option=com_customers">Customer Management</a> </li><?php */?>
        
        <li <?php echo $left_regusers_focus;?>><a href="index.php?option=com_regusers">Registered Users</a> </li>
        
        </ul>
    </li> 
    
    
    <li <?php  if($option=="com_category" || $option=="com_subcategory" || $option=="com_category_insert" || $option=="com_subcategory_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-tasks"></span>Category Management</h3>
    <ul>
    <li <?php echo $left_cat_focus;?>><a href="index.php?option=com_category"> Category</a> </li>
    <!-- <li <?php echo $left_subcat_focus;?>><a href="index.php?option=com_subcategory">Subcategory</a> </li> -->
    </ul>
    </li>
    
  
    
  
    
     <!-- <li <?php  if($option=="com_barnd" || $option=="com_barnd_insert"){ echo "class='Active'" ; }?>>
        <h3><span class="icon-heart"></span>Brands</h3>
                <ul>
                <li <?php echo $left_barnd_focus;?>><a href="index.php?option=com_barnd">Brands</a> </li>
                </ul>
        </li> -->
    
        <li <?php  if($option=="com_productslist" || $option=="com_productslist_insert"){ echo "class='Active'" ; }?>>
        <h3><span class="icon-heart"></span>Product Management</h3>
                <ul>
                <li <?php echo $left_products_focus;?>><a href="index.php?option=com_productslist">Products</a> </li>
                </ul>
        </li>
     
     
      <li <?php  if($option=="com_orderlist" || $option=="com_orderlist_insert" || $option=="com_financialreport"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Auction Mangement</h3>
        <ul>
        <li <?php echo $left_order_focus;?>><a href="index.php?option=com_orderlist">Auctions</a> </li>
        
          <?php /*?> <li <?php echo $left_freport_focus;?>><a href="index.php?option=com_financialreport">Financialreports</a> </li><?php */?>
        </ul>
    </li>    
    
    
        
    <li <?php  if($option=="com_banners" || $option=="com_banners_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Banner Mangement</h3>
        <ul>
        <li <?php echo $left_banners_focus;?>><a href="index.php?option=com_banners">Banner Management</a> </li>
        </ul>
    </li>
     
     
    
     <!-- <li <?php  if($option=="com_price"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Price Management</h3>
        <ul>
        <li <?php echo $left_price_focus;?>><a href="index.php?option=com_price">Price Management</a> </li>
        </ul>
    </li>   -->   
      
     <!-- <li <?php  if($option=="com_shipping" || $option=="com_shipping_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Shipping Management</h3>
        <ul>
        <li <?php echo $left_shipping_focus;?>><a href="index.php?option=com_shipping">Shipping Management</a> </li>
        </ul>
    </li>  -->  
    
    
    <!-- <li <?php  if($option=="com_coupouns" || $option=="com_coupouns_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Discount Coupons</h3>
        <ul>
        <li <?php echo $left_coupoun_focus;?>><a href="index.php?option=com_coupouns">Discount Coupons</a> </li>
        </ul>
    </li>   -->
    
     <li <?php  if($option=="com_subscription" || $option=="com_subscription_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Subscription</h3>
        <ul>
        <li <?php echo $left_subscription_focus;?>><a href="index.php?option=com_subscription">Subscription</a> </li>
        </ul>
    </li> 

 <li <?php  if($option=="com_faqs" || $option=="com_faqs_insert" || $option=="com_contentpages" || $option=="com_contentpages_insert"  || $option=="com_reviews" || $option=="com_reviews_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>FAQ's</h3>
        <ul>
        <li <?php echo $left_faq_focus;?>><a href="index.php?option=com_faqs">FAQ's</a> </li>
        <li <?php echo $left_contentpages_focus;?>><a href="index.php?option=com_contentpages">Content Pages</a> </li>
        <!-- <li <?php echo $left_reviews_focus;?>> <a href="index.php?option=com_reviews">Reviews</a></li> -->
        </ul>
    </li> 
    
 <?php /*?><li <?php  if($option=="com_reviews" || $option=="com_reviews_insert"){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Reviews</h3>
        <ul>
    <li <?php echo $left_reviews_focus;?>> <a href="index.php?option=com_reviews">Reviews</a></li>
   </ul>
    </li><?php */?>  
    
    
     <li <?php  if($option=="com_mail" || $option=="com_mail_insert" || $option=="com_mail_functions" || $option=="com_mail_functions_insert"  ){ echo "class='Active'" ; }?>>
    <h3><span class="icon-calendar"></span>Mail Template</h3>
        <ul>
        <li <?php echo $left_mail_focus;?>><a href="index.php?option=com_mail">Mail Template</a> </li>
        <li <?php echo $left_mail_functions_focus;?>><a href="index.php?option=com_mail_functions">Mail Functions</a> </li>
       
        </ul>
    </li> 
    
    
     
     
   
    
   
    
      
         
	</ul>
</div>

<script>
/*jQuery time*/
$(document).ready(function(){
	$("#accordian h3").click(function(){
		//slide up all the link lists
		$("#accordian ul ul").slideUp();
		//slide down the link list below the h3 clicked - only if its closed
		if(!$(this).next().is(":visible"))
		{
			$(this).next().slideDown();
		}
	})
    /*$( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();*/
    $('#demo12-input').datetimepicker({ 
    clockType: 24,
    showTime: true
    });

    $('#demo13-input').datetimepicker({ 
    clockType: 24,
    showTime: true
    });
})
</script>

            </div><!--site_lft-->
