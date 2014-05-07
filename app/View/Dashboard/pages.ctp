<h2>Page Manager</h2>
<?php 
if($pages) 
{

$i=0;
foreach($pages as $p)
{
    $i++;
    ?>

    <div class="list"><div class="number"><?php echo $i;?>.</div><div class="title"><?php echo $p['Page']['title']?></div><div class="action"><a href="<?php echo $this->webroot; ?>dashboard/editPage/<?php echo $p['Page']['id'];?>" class="btn btn-info">Edit</a> <?php if($p['Page']['id']==3 || $p['Page']['id']==4){?><a href="<?php echo $this->webroot; ?>dashboard/addPage/<?php echo $p['Page']['id'];?>" class="btn btn-success">Add</a><?php }?></div><div class="clear"></div></div>

    
    <?php
    if($p['Page']['id']==2 || $p['Page']['id']==3 || $p['Page']['id']==4)
    $q = $this->requestAction('/dashboard/getChild/'.$p['Page']['id']);
    else
    $q=false;
    if($q)
    {
        ?>
        <table class="table table-bordered">
        <tr><td><strong>S.N</strong></td><td><strong>Title</strong></td><td><strong>Action</strong></td></tr>
        <?php
        $j=0;
        foreach($q as $child)
        {
            $j++;
            ?>
            <tr><td><?php echo $j;?></td><td><?php echo $child['Page']['title'];?></td><td><a href="<?php echo $this->webroot; ?>dashboard/editPage/<?php echo $child['Page']['id'];?>" class="btn btn-info">Edit</a> <?php if($p['Page']['id']!=2){?><a href="<?php echo $this->webroot; ?>dashboard/deletePage/<?php echo $child['Page']['id'];?>" onclick="return confirm('Are you sure you want to delete this page?');" class="btn btn-danger">Delete</a><?php }?></td></tr>
            <?php    
        }
        ?>
        </table>
        <?php
    }
    ?>
    <hr />
    <?php 
}

 }
 else echo "No Pages Found"; 
?>