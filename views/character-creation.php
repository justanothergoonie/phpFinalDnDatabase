<?php
include "head.php"
?>

<form method="post">
    <input type="hidden" name="_action" value="create_character">
    <?php echo $userManager->errorMessage(); ?>
    <label for="Name">Name</label>

    <input type="text" name="character_name">

    <label for="level">Level</label>
    <select name="level" name="character_level">
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

    <div class="stats">
        <h2>Stats</h2>

        <label for="charisma">Charisma</label>
        <input type="text" name="charisma">

        <label for="dexterity">Dexterity</label>
        <input type="text" name="dexterity">

        <label for="wisdom">Wisdom</label>
        <input type="text" name="wisdom">

        <label for="intellegince">Intellegince</label>
        <input type="text" name="intelligence">

        <label for="constitution">Constitution</label>
        <input type="text" name="constitution">

        <label for="strength">Strength</label>
        <input type="text" name="strength">
    </div>



    <label for="Race">Race</label>
    <select name="Race" id="">
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
    </select>

    <label for="Class">Class</label>
    <select name="Class" id="">
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
    </select>
    <label for="feats">Feats</label>
    <select name="feats" id="">
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
    </select>
    <label for="skills">Skills</label>
    <select name="skills" id="">
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
        <option value="1">1</option>
    </select>
    <input type="submit" value="Create">
</form>
<?php
include "footer.php"
?>