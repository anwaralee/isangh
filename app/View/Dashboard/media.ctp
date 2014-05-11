<h1>Media Manager</h1>
<?php 
if($content)
{
?>
<a href="" class="btn btn-success">Add Media Type</a>
<?php
    $i=0;
    foreach($content as $c)
    {
        $i++;
?>
<div class="list"><div class="number"><?php echo $i;?>.</div><div class="title"><?php echo $c['Media']['title']?></div><div class="action"><a href="<?php echo $this->webroot; ?>dashboard/editMedia/<?php echo $c['Media']['id'];?>" class="btn btn-info">Edit</a> <a href="<?php echo $this->webroot; ?>dashboard/deleteMedia/<?php echo $c['Media']['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></div><div class="clear"></div></div>
<?php
    }
}
else
echo "No Media to Display";
?>