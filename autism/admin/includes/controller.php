<?php

if($_GET['option']!="")

$option=$_GET['option'];

else

$option="com_login";

		switch($option)

		{

			case "com_login":

			$disptemp="views/login.php";

			break;

			case "com_dashboard":

			$disptemp="views/dashboard.php"; 

			$left_dashboard_focus='class="lst_bg"'; 

			break;

			case "com_adminlist":

			$disptemp="views/adminlist.php";

			$left_adminlist_focus='class="lst_bg"';  

			break;

			case "com_adminlist_insert":

			$disptemp="views/adminlist.php";

			$left_adminlist_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_contentpages":

			$disptemp="views/contentpages.php";

			$left_contentpages_focus='class="lst_bg"';  

			break;

			case "com_contentpages_insert":

			$disptemp="views/contentpages.php";

			$left_contentpages_focus='class="lst_bg"';  

			break;
			
			
			case "com_faqs":

			$disptemp="views/faq.php";

			$left_faq_focus='class="lst_bg"';  

			break;

			case "com_faqs_insert":

			$disptemp="views/faq.php";

			$left_faq_focus='class="lst_bg"';  

			break;
			
			
			case "com_reviews":

			$disptemp="views/reviews.php";

			$left_reviews_focus='class="lst_bg"';  

			break;

			case "com_reviews_insert":

			$disptemp="views/reviews.php";

			$left_reviews_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_blog":

			$disptemp="views/blog.php";

			$left_blog_focus='class="lst_bg"';  

			break;

			case "com_blog_insert":

			$disptemp="views/blog.php";

			$left_blog_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_sitesettings":

			$disptemp="views/sitesettings.php";

			$left_sitesettings_focus='class="lst_bg"'; 

			break;

			
			case "com_orderlist":

			$disptemp="views/orders.php";

			$left_order_focus='class="lst_bg"';  

			break;
			
			
			case "com_orderlistview":

			$disptemp="views/orderlistview.php";

			$left_order_focus='class="lst_bg"';  

			break;

			case "com_orderlist_insert":

			$disptemp="views/orders.php";

			$left_order_focus='class="lst_bg"';  

			break;	
			
			
			case "com_financialreport":

			$disptemp="views/financialreport.php";

			$left_freport_focus='class="lst_bg"';  

			break;	
			
			
			
			
			case "com_banners":

			$disptemp="views/banners.php";

			$left_banners_focus='class="lst_bg"';  

			break;

			case "com_banners_insert":

			$disptemp="views/banners.php";

			$left_banners_focus='class="lst_bg"';  

			break;	
			
			case "com_coupouns":

			$disptemp="views/coupouns.php";

			$left_coupoun_focus='class="lst_bg"';  

			break;

			case "com_coupouns_insert":

			$disptemp="views/coupouns.php";

			$left_coupoun_focus='class="lst_bg"';  

			break;	
			
			case "com_profile":

			$disptemp="views/profile.php";

			$left_dashboard_focus='class="lst_bg"';

			break;
			
			
			
			case "com_subscription":



			$disptemp="views/newsletter.php";



			$left_subscription_focus='class="lst_bg"';  



			break;



			case "com_subscription_insert":



			$disptemp="views/newsletter.php";



			$left_subscription_focus='class="lst_bg"';  



			break;	

			

			case "mail":



			$disptemp="views/mail_need.php";



			$left_subscription_focus='class="lst_bg"';  



			break;

			
			
			case "com_mail":

			$disptemp="views/mail.php";

			$left_mail_focus='class="lst_bg"';  

			break;
			
			case "com_mail_insert":

			$disptemp="views/mail.php";

			$left_mail_focus='class="lst_bg"';  

			break;
			
			
			case "com_mail_functions":

			$disptemp="views/mail_function.php";

			$left_mail_functions_focus='class="lst_bg"';  

			break;
			
			case "com_mail_functions_insert":

			$disptemp="views/mail_function.php";

			$left_mail_functions_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_productslist":

			$disptemp="views/products.php";

			$left_products_focus='class="lst_bg"';  

			break;

			case "com_productslist_insert":

			$disptemp="views/products.php";

			$left_products_focus='class="lst_bg"';  

			break;
			
			case "com_customers":

			$disptemp="views/customers.php";

			$left_customers_focus='class="lst_bg"';  

			break;

			case "com_customers_insert":

			$disptemp="views/customers.php";

			$left_customers_focus='class="lst_bg"';  

			break;
			
			case "com_users":

			$disptemp="views/users.php";

			$left_users_focus='class="lst_bg"';  

			break;

			case "com_users_insert":

			$disptemp="views/users.php";

			$left_users_focus='class="lst_bg"';  

			break;
			
			
			
			case "com_regusers":

			$disptemp="views/regusers.php";

			$left_regusers_focus='class="lst_bg"';  

			break;

			case "com_regusers_insert":

			$disptemp="views/regusers.php";

			$left_regusers_focus='class="lst_bg"';  

			break;
			
			
		//msr start here	
			case "com_category":

			$disptemp="views/cat.php";

			$left_cat_focus='class="lst_bg"';  

			break;

			case "com_category_insert":

			$disptemp="views/cat.php";

			$left_cat_focus='class="lst_bg"';  

			break;
			
			//sub category
			case "com_subcategory":

			$disptemp="views/sub.php";

			$left_subcat_focus='class="lst_bg"';  

			break;

			case "com_subcategory_insert":

			$disptemp="views/sub.php";

			$left_subcat_focus='class="lst_bg"';  

			break;
			
			//Barnds
			case "com_barnd":

			$disptemp="views/brand.php";

			$left_barnd_focus='class="lst_bg"';  

			break;

			case "com_barnd_insert":

			$disptemp="views/brand.php";

			$left_barnd_focus='class="lst_bg"';  

			break;
			
			
			
			//Barnds
			case "com_price":

			$disptemp="views/price.php";

			$left_price_focus='class="lst_bg"';  

			break;
			
			
			//shipping
			case "com_shipping":

			$disptemp="views/shipping.php";

			$left_shipping_focus='class="lst_bg"';  

			break;

			case "com_shipping_insert":

			$disptemp="views/shipping.php";

			$left_shipping_focus='class="lst_bg"';  

			break;

			
			
			
			

			
			case "com_logout":

			$disptemp="views/logout.php";

			break;

		}

		

?>

