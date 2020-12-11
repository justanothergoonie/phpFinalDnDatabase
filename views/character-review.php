<?php
include 'head.php';
$individual_character_race = $userManager->get_character_race($_GET['race_id']);
$individual_character = $userManager->get_individual_base_character_info($_GET['id']);

?>
<h2>
    <?php echo $individual_character['name']; ?>
    <?php echo $individual_character['level']; ?>
    <?php echo $individual_character_race['race']; ?>
</h2>



<?php
include 'footer.php'
?>