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
<div class="character_container">


    <ul>
        <h1>Your Characters</h1>
        <?php foreach ($characters as $i => $character) : ?>
        <li><?php echo $i + 1; ?>.
            <a href="character-review.php?id=<?php echo $character['id']; ?>"><?php echo $character['name']; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>

    <a href="character-creation.php">
        <h2>Create New Character</h2>
    </a>
</div>


<?php
include 'footer.php'
?>