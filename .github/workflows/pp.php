<?php
ob_start();
require('config.php');
$fname=$_SESSION['fname'];
if(empty($fname))
  require('heder.php');
elseif(!empty($fname) && $fname=='Admin')
  require('Aheader.php');
else
  require('Uheader.php');
?>
<!doctype html>

<html lang="en">
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="a.css">
	<link rel="stylesheet" href="b.css">
	<link rel="stylesheet" href="c.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>

  </head>
  <body>
  <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
          <div class="demo-graphs mdl-shadow--6dp mdl-color--Cyan-900 mdl-cell mdl-cell--12-col mdl-color--teal-A700">
            <h2><font color="white">Our Privacy Policy</font></h2>
          <p><font size="2" color="white" This website is owned and operated by Tech Info Inc.>
We are concerned home privacy issues and want you to be familiar with how we collect, use and disclose information. This Privacy Policy describes our practices in connection with information that we collect through this website owned and controlled by us which display or link to this Privacy Policy (the "Site"). By using our Sites, you agree to the terms and conditions of this Privacy Policy.<br />
How we collect information:<br /> <br />
<b>A. Personal Information We Collect. We collect personally identifiable information that can identify you as an individual ("Personal Information"), such as:</b><br /> <br/>
<li>  Name<br/>
<li>  Gender<br/>
<li>  Email address<br/><br/>
<li>  Profile photo (which is optional)<br/><br/>
<b>B. How We Collect Personal Information.</b><br><br>
 We collect Personal Information directly from you when you interact with us on the Site, for example, when you register for the Site or fill in an Internet form on our Site. <br/><br/>
<b>C. How We Use Personal Information We may use Personal Information</b>:<br/><br/>
<li>  To send you important information regarding the Site, changes to our terms, conditions, and policies and/or other administrative information.<br/><br/>
<b>D. What we do with the information we gather</b><br/><br/>
  We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:<br/><br/>
<li>  Internal record keeping.<br/><br/>
<li>  We may use the information to improve our technical discussion service.<br/><br/>
<b>E. Security</b><br/><br/>
<li>  We are committed to ensuring that your information is secure. In order to prevent unauthorised access or disclosure we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.<br/><br/>
<b>F. How we use cookies</b><br/><br/>
<li>  A cookie is a small file which asks permission to be placed on your computer’s hard drive. Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information home your preferences.We use traffic log cookies to identify which pages are being used. This helps us analyse data home webpage traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful andwhich you do not. A cookie in no way gives us access to your computer or any information home you, other than the data you choose to share with us.You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.
</font></p>
          </div>
		  </div>
		  </main>
      <?php require('footer.php');?>
		  </body>
		  </html>