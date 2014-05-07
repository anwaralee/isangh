<?php

    $c = $content;
    
?>
<h1>Edit Page - <?php echo $c['Page']['title'];?></h1>
<form action="<?php echo $this->webroot; ?>dashboard/editPage/<?php echo $c['Page']['id']; ?>" method="post">
<label>Page Title</label>
<input type="text" value="<?php echo $c['Page']['title'];?>" name="title" />
<label>Page Description</label>
<textarea name="description" class="ckeditor"><?php echo $c['Page']['description'];?></textarea>
<hr />
<input type="submit" value="Edit" name="submit" class="btn btn-primary btn-large" />
</form>
