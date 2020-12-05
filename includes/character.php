<?php
class Character
{
    function __construct()
    {
        $db = new Database();
        $this->dbh = $db->get_dbh();
    }
    function do_create_character($vars)
    {
        try {
            $try_character_name = $vars['character_name'];
            $try_character_level = $vars['character_level'];

            if (!empty($try_character_name)) {
                $sql_add_character_name = 'INSERT INTO player (name) VALUES(:characterName)';
                $add_character_name_stmt = $this->dbh->prepare($sql_add_character_name);
                $add_character_name_stmt->bindParam(':characterName', $try_character_name);
                $add_character_name_stmt->execute();

                $sql_add_character_level = 'INSERT INTO player_stats (player_id, stat_id, stat_number, level) VALUES(null, null, null, :characterLevel)';
                $add_character_level_stmt = $this->dbh->prepare($sql_add_character_level);
                $add_character_level_stmt->bindParam(':characterLevel', $try_character_level);
                $add_character_level_stmt->execute();
            } else {
                $this->error = 'nah';
            }
        } catch (PDOException $e) {
            print_r('uh-oh!' . $e->getMessage() . '<br />');
        }
    }
}