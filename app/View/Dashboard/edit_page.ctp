<?php
if($content)
{
    $c = $content;
    
?>
<h1>Edit Page - <?php echo $c['Page']['title'];?></h1>
<form action="<?php echo $this->webroot; ?>dashboard/editPage/<?php echo $c['Page']['id']; ?>" method="post">
Page Title : <input type="text" value="<?php echo $c['Page']['title'];?>" name="title" />
Page Description : <input type="text" value="<?php echo $c['Page']['description'];?>" name="description" />
<input type="submit" value="Edit" name="submit" />
</form>
<?php 
}
else echo "No content found";
 ?>