  <?php include 'head.php';
    ?>
  <form method="post" class="delete">
      <h2>Delete Account</h2>

      <div>
          <strong>Are You Sure?</strong>
          <input type="hidden" name="_action" value="confirm_delete">
          <button>Yes, Im Sure</button>
      </div>
      <a href="login.php">Cancel</a>
  </form>

  <?php
    include 'footer.php'
    ?>