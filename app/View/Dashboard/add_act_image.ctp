<?php
if($content)
{
    $i=0;
 ?>
<h1>Image Activities</h1>
<?php
foreach($content as $c)
{
    $i++;
 ?>
<div class="list"><div class="number"><?php echo $i;?>.</div><div class="title"><?php echo $c['Image']['title']?></div><div class="action"><a href="<?php echo $this->webroot; ?>dashboard/editActImage/<?php echo $c['Image']['id'];?>" class="btn btn-info">Edit</a> <a href="<?php echo $this->webroot; ?>dashboard/deleteActImage/<?php echo $c['Image']['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></div><div class="clear"></div></div>
<?php 
}
}
?>
<h1>Add Activities Image</h1>
<form action="<?php echo $this->webroot;?>dashboard/addActImage" enctype="multipart/form-data" method="post">
<label>Title : </label><input type="text" name="title" />
<label>Upload Image : </label><input type="file" name="file" />
<input type="submit" value="Save"  class="btn btn-primary btn-large" />
</form>