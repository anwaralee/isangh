<h2>Page Manager</h2>
<?php 
if($pages) 
{

$i=0;
foreach($pages as $p)
{
    $i++;
    ?>
    <div class="list"><div class="number"><?php echo $i;?>.</div><div class="title"><?php echo $p['Page']['title']?></div><div class="action"><a href="#" class="btn btn-info">Edit</a> <?php if($p['Page']['id']==3 ||$p['Page']['id']==4){?><a href="#" class="btn btn-success">Add</a><?php }?></div><div class="clear"></div></div>
    
    <?php
    if($p['Page']['id']==2 || $p['Page']['id']==3)
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
            <tr><td><?php echo $j;?></td><td><?php echo $child['Page']['title'];?></td><td><a href="#" class="btn btn-info">Edit</a> <a href="#" class="btn btn-danger">Delete</a></td></tr>
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