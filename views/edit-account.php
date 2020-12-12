 <?php include 'head.php';
  ?>
 <form method="post">
     <h2>Edit Account</h2>
     <input type="hidden" name="_action" value="update_account">

     <label>Username</label>
     <input type="text" name="username" value="" placeholder="<?php echo $user['username']; ?>" />
     <br />

     <label>Password</label>
     <input type="password" name="password" />
     <br />
     <label>Confirm Password</label>
     <input type="password" name="confirm_password">

     <input type="submit" value="Update" />
 </form>
 <?php
  include 'footer.php'
  ?>