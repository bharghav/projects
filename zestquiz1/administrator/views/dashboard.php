<?php 
include('includes/session.php');
include('includes/pageaccess.php');
$countusers=$userObj->getCountAllTablesDataCount(TPREFIX.TBL_ADMIN,'user_id'," roletype='senior' or roletype='level1' ");
$countRegisterdusers=$userObj->getCountAllTablesDataCount(TPREFIX.TBL_ADMIN,'user_id'," roletype='level2' ");
$countpages=$userObj->getCountAllTablesDataCount(TPREFIX.TBL_CONTENTPAGES,'page_id','');
$countimages=$userObj->getCountAllTablesDataCount(TPREFIX.TBL_BANNERS,'id','');
$countproducts=$userObj->getCountAllTablesDataCount(TPREFIX.TBL_STOREPRODUCTS,'spid','');
$countnewsevents=$userObj->getCountAllTablesDataCount(TPREFIX.TBL_NEWSEVENTS,'id','');
$recent=sitesettingsClass::gettenrecentActivitiesList(25);
?>
<!-- <div class="container">
<div class="row"> -->
<div class="col-md-12">
<div class="login-panel panel panel-default">
<!--div class="box"-->
    <div class="panel-heading">
      <h3 class="panel-title"><img src="allfiles/home.png" alt=""> Dashboard</h1>
    </div>

    
    <div class="content">
      <div class="panel panel-default">
        <div class="row">
          <div class="col-md-6">
            
              <table class="table table-hove  rtable">
              <thead>
                <tr>
                  <th colspan="2"><label class="title">Overview</label></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><label class="title">Last login</label></td>
                  <td><?php echo date("l dS F Y, H:i:s A", $_SESSION['lastlogin']);?></td>
                </tr>
                <tr>
                  <td><label class="title">Total admin users</label></td>
                  <td><?php echo $countusers;?></td>
                </tr>
                <tr>
                  <td><label class="title">Total Registered users</label></td>
                  <td><?php echo $countRegisterdusers;?></td>
                </tr>
                <tr>
                  <td><label class="title">Total Pages</label></td>
                  <td><?php echo $countpages;?></td>
                </tr>
                <tr>
                  <td><label class="title">Total Banners</label></td>
                  <td><?php echo $countimages;?></td>
                </tr>
                <tr>
                  <td><label class="title">Total News</label></td>
                  <td><?php echo $countnewsevents;?></td>
                </tr>
                <tr>
                  <td><label class="title">Total Products</label></td>
                  <td><?php echo $countproducts;?></td>
                </tr>
                
              </tbody>
            </table>


          </div>
          <div class="col-md-6">
              <table class="table table-hove  rtable">
              <thead>
                <tr>
                  <th colspan="2"><label class="title">Recent Activites / Errors</label></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($recent as $recentact)
  {
  if($recentact->type=="g")
  $tdstyle="class='greenerror'";
  else
  $tdstyle="class='rederror'";
  ?>
  
  <tr>
                  <td <?php echo $tdstyle;?>><?php echo $recentact->matter?></td>
                </tr>
  <?php 
  }
  ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>



      <div class="panel panel-default">
        <div class="row">
          <div class="col-md-12">
            
              <table width="100%" border="0" align="left" cellpadding="2" cellspacing="2">
       <tr class="overview_heading">
    <td colspan="2"  align="left" valign="middle">Panel shortcuts</td>
  </tr>
  <tr>
    <td  align="left" valign="middle" colspan="2">
  <div id="shortcuts" style="width:100%;">
  <ul>
  <li><a href="index.php?option=com_sitesettings"><img src="allfiles/settings.png" alt="Settings"><span>Settings</span></a></li>
  <!--li><a href="index.php?option=com_dbbackup"><img src="allfiles/dbbackup.jpg" alt="DB Backup"><span>DB Backup</span></a></li-->
  <li><a href="index.php?option=com_adminlist"><img src="allfiles/users.png" alt="Admin Users"><span>Admin Users</span></a></li>
  <li><a href="index.php?option=com_pagelist"><img src="allfiles/pages.png" alt="Pages"><span>Pages</span></a></li>
  <li><a href="index.php?option=com_bannerslist"><img src="allfiles/banners.png" alt="Banners"><span>Banners</span></a></li>
  <!--li><a href="index.php?option=com_articlepost"><img src="allfiles/articles.jpg" alt="Articles"><span>Articles</span></a></li-->
  <li><a href="index.php?option=com_blogpost"><img src="allfiles/blogimage.jpg" alt="Blog"><span>Blog</span></a></li>
  <!--li><a href="index.php?option=com_forumtopics"><img src="allfiles/forum.png" alt="Forum"><span>Forum</span></a></li-->
  <!--<li><a href="index.php?option=com_storeproducts"><img src="allfiles/store.jpg" alt="Store"><span>Store</span></a></li>
  <li><a href="index.php?option=com_subscribers"><img src="allfiles/newsletter.jpg" alt="Newsletter"><span>Newsletter</span></a></li>
  <li><a href="index.php?option=com_newseventslist"><img src="allfiles/newsevents.jpeg" alt="News"><span>News</span></a></li>-->
<!--  <li><a href="index.php?option=com_productslist"><img src="allfiles/products.jpeg" alt="Products"><span>Products</span></a></li>
  <li><a href="index.php?option=com_newseventslist"><img src="allfiles/newsevents.jpeg" alt="News"><span>News</span></a></li-->
  <li><a href="index.php?option=com_testimonialslist"><img src="allfiles/testimonial.png" alt="Testimonials"><span>Testimonials</span></a></li>
  </ul>
  </div>  </td>
  </tr>
</table>


          </div>
          
        </div>
      </div>



      
      <!--table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><div class="overview" style="width:99%;">
              <table width="100%" border="0" align="left" cellpadding="2" cellspacing="2">
    		   <tr class="overview_heading">
        <td colspan="2"  align="left" valign="middle">Overview</td>
      </tr>
      <tr>
        <td  align="left" valign="middle"><label class="title">Last login</label></td>
        <td align="left" valign="middle"><?php echo date("l dS F Y, H:i:s A", $_SESSION['lastlogin']);?></td>
      </tr>
      <tr>
        <td align="left" valign="middle"><label class="title">Total admin users</label> </td>
        <td align="left" valign="middle"><?php echo $countusers;?></td>
      </tr>
      <tr>
        <td align="left" valign="middle"><label class="title">Total Registered users</label> </td>
        <td align="left" valign="middle"><?php echo $countRegisterdusers;?></td>
      </tr>
      <tr>
        <td align="left" valign="middle"><label class="title">Total Pages</label> </td>
        <td align="left" valign="middle"><?php echo $countpages;?></td>
      </tr>
      <tr>
        <td align="left" valign="middle"><label class="title">Total Banners</label> </td>
        <td align="left" valign="middle"><?php echo $countimages;?></td>
      </tr>
      <tr>
        <td align="left" valign="middle"><label class="title">Total News</label> </td>
        <td align="left" valign="middle"><?php echo $countnewsevents;?></td>
      </tr>
      <tr>
        <td align="left" valign="middle"><label class="title">Total Products</label> </td>
        <td align="left" valign="middle"><?php echo $countproducts;?></td>
      </tr>
    </table-->


    
</div></td>
 <?php /*?>   <td rowspan="3" align="left" valign="top">
	<div class="overview" style="margin-left:10px;width:99%;">
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
		   <tr class="overview_heading">
    <td colspan="2"  align="left" valign="middle">Recent Activites / Errors</td>
  </tr>
  <tr>
    <td align="left" valign="top"></td>
    <td align="left" valign="top">
	<div style="width:560px;height:300px;overflow:auto; float:left;position:inherit;">
	<table style="width:538px;" border="0" cellspacing="2" cellpadding="2" align="left">
	<?php foreach($recent as $recentact)
	{
	if($recentact->type=="g")
	$tdstyle="class='greenerror'";
	else
	$tdstyle="class='rederror'";
	?>
	<tr>
	<td align="left" height="20" valign="top" <?php echo $tdstyle;?>><?php echo $recentact->matter?> </td>
	</tr>
	<?php 
	}
	?>
	</table>
	</div>
	</td>
  </tr>
</table>
      </div>	</td> <?php */?>
  </tr>
  <tr>
    <td valign="top" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%" align="left" valign="top">
	<div class="overview" style="width:99%;">
         <?php /* ?> <table width="100%" border="0" align="left" cellpadding="2" cellspacing="2">
		   <tr class="overview_heading">
    <td colspan="2"  align="left" valign="middle">Panel shortcuts</td>
  </tr>
  <tr>
    <td  align="left" valign="middle" colspan="2">
	<div id="shortcuts">
	<ul>
	<li><a href="index.php?option=com_sitesettings"><img src="allfiles/settings.jpeg" alt="Settings"><span>Settings</span></a></li>
	<li><a href="index.php?option=com_dbbackup"><img src="allfiles/dbbackup.jpg" alt="DB Backup"><span>DB Backup</span></a></li>
	<li><a href="index.php?option=com_adminlist"><img src="allfiles/users.jpg" alt="Admin Users"><span>Admin Users</span></a></li>
	<li><a href="index.php?option=com_pagelist"><img src="allfiles/pages.jpeg" alt="Pages"><span>Pages</span></a></li>
	<li><a href="index.php?option=com_bannerslist"><img src="allfiles/gallery.jpg" alt="Banners"><span>Banners</span></a></li>
	<li><a href="index.php?option=com_articlepost"><img src="allfiles/articles.jpg" alt="Articles"><span>Articles</span></a></li>
	<li><a href="index.php?option=com_blogpost"><img src="allfiles/blogimage.jpg" alt="Blog"><span>Blog</span></a></li>
	<li><a href="index.php?option=com_forumtopics"><img src="allfiles/forum.jpg" alt="Forum"><span>Forum</span></a></li>
	<li><a href="index.php?option=com_storeproducts"><img src="allfiles/store.jpg" alt="Store"><span>Store</span></a></li>
	<!--<li><a href="index.php?option=com_subscribers"><img src="allfiles/newsletter.jpg" alt="Newsletter"><span>Newsletter</span></a></li>
	<li><a href="index.php?option=com_newseventslist"><img src="allfiles/newsevents.jpeg" alt="News"><span>News</span></a></li>-->
<!--	<li><a href="index.php?option=com_productslist"><img src="allfiles/products.jpeg" alt="Products"><span>Products</span></a></li>
	<li><a href="index.php?option=com_newseventslist"><img src="allfiles/newsevents.jpeg" alt="News"><span>News</span></a></li>
	<li><a href="index.php?option=com_testimonialslist"><img src="allfiles/testimonials.jpeg" alt="Testimonials"><span>Testimonials</span></a></li>-->
	</ul>
	</div>	</td>
  </tr>
</table> <?php */?>
</div></td>
    </tr>
</table>

	  
      
	  
      <!--<div class="latest">
        <div class="dashboard-heading">Latest 10 Orders</div>
        <div class="dashboard-content">
          <table width="400" cellpadding="0" cellspacing="0" class="list">
            <thead>
              <tr>
                <td class="right">Order ID</td>
                <td class="left">Customer</td>
                <td class="left">Status</td>
                <td class="left">Date Added</td>
                <td class="right">Total</td>
                <td class="right">Action</td>
              </tr>
            </thead>
            <tbody>
                            <tr>
                <td class="center" colspan="6">No results!</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>-->
    </div>
  </div>
</div>
<!-- end of the container -->
<!-- </div>
</div> -->