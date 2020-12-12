<?php
include 'head.php';

$individual_character = $userManager->get_individual_base_character_info($_GET['id']);
$character_skills = $userManager->get_character_skills($_GET['id']);
$character_feats = $userManager->get_character_feats($_GET['id']);
$character_stats = $userManager->get_character_stats($_GET['id']);

?>

<h2>Name: <?php echo $individual_character['name']; ?></h2>
<div class="base-info">
    <span>Level: <?php echo $individual_character['level']; ?></span>
    <span>Race: <?php echo $individual_character['race']; ?></span>
    <span>Class: <?php echo $individual_character['type']; ?></span>
</div>



<h3>Stats</h3>
<ul>
    <?php foreach ($character_stats as $stat) :
        $stat_name = $stat['stat_name'];
        $stat_description = $stat['stat_description'];
        $stat_value = $stat['stat_value'] ?>
    <li class="stat-list">
        <div></div><?php echo $stat_name ?> - <?php echo $stat_value ?>
        <img src="../dist/img/info.png" alt="" class="info">
        <div class="hide">
            <?php echo $stat_description ?>
        </div>
    </li>


    <?php endforeach ?>
</ul>
<h3>Skills</h3>
<ul>
    <?php foreach ($character_skills as $skill) :
        $skill_name = $skill['skill_name'];
        $skill_description = $skill['description'] ?>
    <li class="skill-list"><?php echo $skill_name ?> - <?php echo $skill_description ?> </li>
    <?php endforeach ?>
</ul>

<h3>Feats</h3>
<ul>
    <?php foreach ($character_feats as $feat) :
        $feat_name = $feat['feat_name'];
        $feat_description = $feat['description'] ?>
    <li class="feat-list"><?php echo $feat_name ?> - <?php echo $feat_description ?> </li>
    <?php endforeach ?>
</ul>




<?php
include 'footer.php'
?>