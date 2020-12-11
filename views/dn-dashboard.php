<?php
include 'head.php';
$characters = $userManager->get_characters();
?>
<!--   
    mark up to see characters 
    sql select commands
    mark up to edit character
    sql update commands
    markup to delete characters
    sql delete commands
-->
<h1>Dashboard</h1>

<ul>
    <h2>Your Characters</h2>
    <?php foreach ($characters as $i => $character) : ?>
    <li><?php echo $i + 1; ?>. <a
            href="character-review.php?id=<?php echo $character['id']; ?>?race_id=<?php echo $character['race_id']; ?>"><?php echo $character['name']; ?>/<?php echo $character['id']; ?></a>
    </li>

    <?php endforeach; ?>
</ul>
<br />
<a href=" character-creation.php">
    <h2>Create New Character</h2>
</a>
<br />

<?php
include 'footer.php'
?>