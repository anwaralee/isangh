<?php
    
    $c = $content;
    
?>
<h1>Edit Media Content - <?php echo $c['Media']['type'];?></h1>
<form action="<?php echo $this->webroot; ?>dashboard/editPage/<?php echo $c['Media']['id']; ?>" method="post">
<label>Media Title</label>
<input type="text" value="<?php echo $c['Media']['title'];?>" name="title" />
<label>Page Description</label>
<textarea name="description" class="ckeditor"><?php echo $c['Media']['description'];?></textarea>
<hr />
<input type="submit" value="Edit" name="submit" class="btn btn-primary btn-large" />
</form>
