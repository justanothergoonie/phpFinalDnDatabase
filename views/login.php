<?php
session_start();

include '../includes/user.php';
if ($_REQUEST['_action'] == 'logout') {
    User::logout();
}

$userManager = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_REQUEST['_action'])) {
    $userManager->handleAction($_REQUEST['_action'], $_REQUEST);
}
$is_logged_in = $_SESSION['is_logged_in'];
$user = $_SESSION['user'];

include 'head.php';
?>




<?php if ($is_logged_in) : ?>
    <em style="color: red;"><?php echo $userManager->errorMessage(); ?></em>
    <h1>Welcome, <?php echo $user['username']; ?>!</h1>

    <?php switch ($_GET['_action']) {
        case 'edit':
            //show edit code
            include 'edit_account.php';
        case 'delete':
            //show delete code
            include 'delete-account.php';
            break;
    }
    ?>
<?php else : ?>

    <em style="color: red;"><?php echo $userManager->errorMessage(); ?></em>

    <form method="post">
        <input type="hidden" name="_action" value="login">
        <h2>Existing Users</h2>
        <label>Username</label>
        <input type="text" name="username" />
        <br />

        <label>Password</label>
        <input type="password" name="password" />
        <br />
        <input type="submit" value="Login" />
    </form>



    <form method="post">
        <input type="hidden" name="_action" value="signup">
        <h2>Create an Account</h2>


        <label>Create Username</label>
        <input type="text" name="username">
        <br />

        <label>Password</label>
        <input type="password" name="password">
        <br />

        <label>Confirm Password</label>
        <input type="password" name="confirm_password">

        <br />

        <input type="submit" value="Create">
    </form>
<?php endif; ?>

<?php include 'footer.php'; ?>