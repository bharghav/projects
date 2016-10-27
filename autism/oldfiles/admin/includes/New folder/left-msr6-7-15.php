<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Apanabazar</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="responsive.css" type="text/css">

<!--font-family: 'Raleway', sans-serif;-->

<script src="jquery.min.js"></script>

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
	background: #003040; 
	background: linear-gradient(#003040, #002535);
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
	line-height: 54px;
	display: block;
	padding: 0 15px;
	/*transition for smooth hover animation*/
	transition: all 0.15s;
}
/*hover effect on links*/
#accordian ul ul li a:hover {
	background: #003545;
	border-left: 5px solid lightgreen;
}
/*Lets hide the non active LIs by default*/
#accordian ul ul {
	display: none;
}
#accordian li.Active ul {
	display: block;
}

</style>
</head>

<body>
	<div class="site_wrap">
    	
        	<div class="site_lft">
            	<div class="logo_blg" style="background-color:#FFF;">
                	<div class="logo_blg_lft">
                    	<?php /*?><a href="index.php?option=com_dashboard"><img src="images/logo_pic_05.png" alt=""></a><?php */?>
                        <a href="index.php?option=com_dashboard"><img src="../uploads/site/logo_14358115555594bee33d54f.png" alt=""></a>
                    </div><!--logo_blg_lft-->
                    <div class="logo_blg_rgt">
                    	<a href="index.php?option=com_dashboard"><img src="images/logo_pic_08.png" alt=""></a>	
                    </div><!--logo_blg_rgt-->
                </div><!--login_blg-->
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

    
    
    <li <?php  if($option=="com_dashboard"){ echo "class='Active'" ; }?>>
      <h3><span class="icon-tasks"></span>Dashboard </h3>
       <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_dashboard"> Dashboard</a> </li>
        </ul>
    </li>
    
    
    <li>
    <h3><span class="icon-tasks"></span>Category Management</h3>
    <ul>
    <li <?php echo $left_cat_focus;?>><a href="index.php?option=com_category"> Category</a> </li>
    <li <?php echo $left_cat_focus;?>><a href="index.php?option=com_subcategory">Subcategory</a> </li>
    </ul>
    </li>
    
    <li>
    <h3><span class="icon-calendar"></span>Category</h3>
        <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_dashboard">Dashboard</a> </li>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_dashboard">Dashboard</a> </li>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_dashboard">Dashboard</a> </li>
        
        </ul>
    </li>
    
  
    
     <li>
        <h3><span class="icon-heart"></span>Brands</h3>
                <ul>
                <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_barnd">Dashboard</a> </li>
                </ul>
        </li>
    
        <li>
        <h3><span class="icon-heart"></span>Product Management</h3>
                <ul>
                <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_productslist">Dashboard</a> </li>
                </ul>
        </li>
     
     
     <li>
    <h3><span class="icon-calendar"></span>Order Mangement</h3>
        <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_orderlist">Dashboard</a> </li>
        
        </ul>
    </li>   
    
    <li>
    <h3><span class="icon-calendar"></span>Customer Mangement</h3>
        <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_customers">Customer Management</a> </li>
        </ul>
    </li> 
        
    <li>
    <h3><span class="icon-calendar"></span>Banner Mangement</h3>
        <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_banners">Banner Management</a> </li>
        </ul>
    </li>      
    
    <li>
    <h3><span class="icon-calendar"></span>Discount Coupons</h3>
        <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_coupouns">Discount Coupons</a> </li>
        </ul>
    </li>  
    
     <li>
    <h3><span class="icon-calendar"></span>Subscription</h3>
        <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_coupouns">Subscription</a> </li>
        </ul>
    </li> 

 <li>
    <h3><span class="icon-calendar"></span>FAQ's</h3>
        <ul>
        <li <?php echo $left_dashboard_focus;?>><a href="index.php?option=com_faqs">FAQ's</a> </li>
        </ul>
    </li> 
 <li>
    <h3><span class="icon-calendar"></span>Reviews</h3>
        <ul>
    <li <?php echo $left_reviews_focus;?>> <a href="index.php?option=com_reviews">Reviews</a></li>
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
})
</script>

            </div><!--site_lft-->
