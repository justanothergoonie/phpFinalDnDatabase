<?php
session_start();

include "../includes/character.php";

$characterManager = new Character();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_REQUEST['_action'])) {
    $characterManager->handleAction($_REQUEST['_action'], $_REQUEST);
}

include "head.php";

$races = $characterManager->get_races();
$classes = $characterManager->get_classes();
$feats = $characterManager->get_feats();
$skills = $characterManager->get_skills();
$stats = $characterManager->get_stats();
?>
<?php echo $characterManager->errorMessage(); ?>
<form method="post" id="char-create-from">
    <input type="hidden" name="_action" value="create_character">
    <div class="name-level">
        <div class="name">
            <label for="Name">Name</label>
            <input type="text" name="character_name">
        </div>

        <div class="level"> <label for="level">Level</label>
            <select name="character_level">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select>
        </div>
    </div>

    <div class="char-stats">
        <h2>Stats</h2>
        <?php foreach ($stats as $statsObj) :
            $stat = $statsObj['stat_name'];
            $stat_id = $statsObj['id']
        ?>
        <div class="stat-block">
            <label for="<?php $stat ?>"> <?php echo $stat ?></label>
            <input type="text" name="stat_id_<?php echo $stat_id ?>" required>
        </div>

        <?php endforeach; ?>
    </div>
    <div class="race-class">
        <div class="char-race">
            <label for="race">Race</label>
            <select name="character_race" id="">
                <?php foreach ($races as $raceObj) :
                    $race = $raceObj['race'];
                    $race_id = $raceObj['id']
                ?>
                <option value="<?php echo $race_id ?>"><?php echo $race ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class=char-class>
            <label for="Class">Class</label>
            <select name="character_class" id="">
                <?php foreach ($classes as $classObj) :
                    $class = $classObj['type'];
                    $class_id = $classObj['id']
                ?>
                <option value="<?php echo $class_id ?>"> <?php echo $class ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>


    <div class="char-feats">
        <h2> Feats </h2>
        <?php foreach ($feats as $featsObj) :
            $feats = $featsObj['feat_name'];
            $feats_id = $featsObj['id'];
            $feats_description =
                $featsObj['description'];
        ?>
        <div class="feats">
            <div>
                <input name="character_feat[]" type="checkbox" value="<?php echo $feats_id ?>">
                <label><?php echo $feats ?></label>
                <img src="../dist/img/info.png" alt="" class="info">
                <p class="hide">
                    <?php echo $feats_description ?>
                </p>
            </div>
        </div>

        <?php endforeach; ?>
    </div>

    <div class="char-skills">
        <h2>Skills</h2>
        <?php foreach ($skills as $skillsObj) :
            $skills = $skillsObj['skill_name'];
            $skills_id = $skillsObj['id'];
            $skills_description =
                $skillsObj['description'];
        ?>
        <div class="skills">
            <div>
                <input name="character_skill[]" type="checkbox" value="<?php echo $skills_id ?>">
                <label> <?php echo $skills ?> </label>
                <img src="../dist/img/info.png" alt="" class="info">
                <p class="hide">
                    <?php echo $skills_description ?>
                </p>
            </div>

        </div> <?php endforeach; ?>
    </div>




    <input type="submit" value="Create Character" class="submit">
</form>
<?php
include "footer.php"
?>