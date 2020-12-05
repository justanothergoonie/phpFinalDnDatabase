<?php
session_start();

include_once '../includes/user.php';
if ($_REQUEST['_action'] == 'logout') {
    User::logout();
}

$userManager = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_REQUEST['_action'])) {
    $userManager->handleAction($_REQUEST['_action'], $_REQUEST);
}
$is_logged_in = $_SESSION['is_logged_in'];

?>

<?php if ($is_logged_in) : ?>

<p>
    Actions:
    <a href="?_action=edit">Edit Account</a> |
    <a href="?_action=delete">Delete Account</a> |
    <a href="?_action=logout">Log out</a>
</p>
<?php else : ?>
<a href="views/login.php">Login</a>
<?php endif; ?>

<hr>