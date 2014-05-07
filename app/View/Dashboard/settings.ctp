<h1>Admin Settings</h1>
<form action="" method="post">
    <label>Username</label>
    <input type="text" name="username" value="<?php echo $a['Admin']['username'];?>" />
    
    <label>Email</label>
    <input type="text" name="username" value="<?php echo $a['Admin']['email'];?>" />
    
    <label>Password</label>
    <input type="password" name="password" value="<?php echo $a['Admin']['password'];?>" />
    
    <hr />
    <input type="submit" value="Change Setting" class="btn btn-large btn-primary" />
</form>