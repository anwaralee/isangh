<h1>Edit Activities Image</h1>
<?php 
if($content)
$c=$content;
?>
<form action="<?php echo $this->webroot;?>dashboard/editActImage/<?php echo $c['Image']['id']; ?>" enctype="multipart/form-data" method="post">
<input type="hidden" name="oldfile" value="<?php echo $c['Image']['file']; ?>" />
<label>Title : </label><input type="text" name="title" value="<?php if($c['Image']['title']) echo $c['Image']['title']; ?>" />
<label>Upload Image : </label><input type="file" name="file" value="<?php if($c['Image']['file']) echo $c['Image']['file']; ?>" /><br />
<?php if($c['Image']['file']) { ?><img src="<?php echo $this->webroot;?>doc/<?php echo $c['Image']['file'];  ?>" width="100 px" /><br /><?php } ?>
<input type="submit" value="Save" name="submit"  class="btn btn-primary btn-large" />
</form>