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
<nav>
    <ul>
        <li><a href="edit-account.php">Edit Account</a></li>
        <li><a href="delete-account.php">Delete Account</a></li>
        <li><a href="?_action=logout">Log out</a></li>
        <li><a href="dn-dashboard.php">Dashboard</a></li>
    </ul>
</nav>
<?php else : ?>
<h2>Welcome to Dungeons & Databases <span>Please Login or Create an Account</span> </h2>
<?php endif; ?>

<hr>