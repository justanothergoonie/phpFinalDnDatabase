<?php
include 'head.php'
?>

<h1>Dashboard</h1>
<ul>
    <h2>Dungeon Master Games</h2>
    <li>
        <a href="">Campaign 1</a>
    </li>
    <li>
        <a href="">Campaign 2</a>
    </li>
    <li>
        <a href="">Campaign 3</a>
    </li>
    <li>
        <a href="">Campaign 4</a>
    </li>
</ul>

<ul>
    <h2>Current Parties</h2>
    <li>
        <a href="">Party 1</a>
    </li>
    <li>
        <a href="">Party 2</a>
    </li>
    <li>
        <a href="">Party 3</a>
    </li>
    <li>
        <a href="">Party 4</a>
    </li>
</ul>

<br />
<a href="character-creation.php">
    <h2>Create New Character</h2>
</a>
<br />

<form method="post">
    <h2>Start New Party</h2>

    <label>Party Name</label>
    <input type="text">

    <input type="submit">
</form>

<?php
include 'footer.php'
?>