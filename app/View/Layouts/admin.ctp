<!DOCTYPE HTML>
<!--
	Tessellate 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Islami Sangh Nepal</title>
			<link href="<?php echo $this->webroot;?>css/admin.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo $this->webroot;?>css/bootstrap.css" rel="stylesheet" type="text/css" />
            <script src="http://code.jquery.com/jquery-1.10.1.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo $this->webroot;?>js/ckeditor/ckeditor.js"></script>
		
		
	</head>
	<body>
    <div class="wrapper">
    <div class="header">
        <h3>ISN Admin Panel</h3>
        <ul>
            <li><a href="<?php echo $this->webroot;?>dashboard/">Home</a></li>
            <li><a href="<?php echo $this->webroot;?>dashboard/pages">Pages</a></li>
            <li><a href="<?php echo $this->webroot;?>dashboard/media">Media</a></li>
            <li><a href="<?php echo $this->webroot;?>dashboard/settings">Settings</a></li>
            <li><a href="<?php echo $this->webroot;?>dashboard/logout">Logout</a></li>
            
        </ul>
        <div class="clear"></div>
    </div>
    <div class="content">
    <?php echo $this->fetch('content'); ?>
    </div>
    </div>
    </body>
</html>
<?php //echo $this->element('sql_dump'); ?>
