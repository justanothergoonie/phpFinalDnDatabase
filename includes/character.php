<?php
include_once "database.php";

class Character
{
    function __construct()
    {
        $db = new Database();
        $this->dbh = $db->get_dbh();
    }

    function handleAction($action, $vars)
    {
        $action_function = "do_{$action}";
        if (method_exists($this, $action_function)) {
            $this->$action_function($vars);
        }
    }
    public function errorMessage()
    {
        return $this->error;
    }

    public function get_races()
    {
        $races = [];
        foreach ($this->dbh->query('SELECT * from character_races') as $row) {
            $races[] = $row;
        }
        return $races;
    }
    public function get_classes()
    {
        $classes = [];
        foreach ($this->dbh->query('SELECT * from character_class') as $row) {
            $classes[] = $row;
        }
        return $classes;
    }
    public function get_feats()
    {
        $feats = [];
        foreach ($this->dbh->query('SELECT * from feats') as $row) {
            $feats[] = $row;
        }
        return $feats;
    }
    public function get_skills()
    {
        $skills = [];
        foreach ($this->dbh->query('SELECT * from skills') as $row) {
            $skills[] = $row;
        }
        return $skills;
    }
    public function get_stats()
    {
        $stats = [];
        foreach ($this->dbh->query('SELECT * from stats') as $row) {
            $stats[] = $row;
        }
        return $stats;
    }
    function do_create_character($vars)
    {
        // print_r($vars);
        try {
            $try_character_name = $vars['character_name'];
            $try_character_level = $vars['character_level'];
            $try_character_race = $vars['character_race'];
            $try_character_class = $vars['character_class'];
            $try_character_feats = $vars['character_feat[]'];

            if (
                !empty($try_character_name)
            ) {

                $sql_add_character = 'INSERT INTO player (name, level, race_id, class_id, user_id) VALUES(:characterName,:characterLevel,:characterRace, :characterClass, :userId)';
                $add_player_stmt = $this->dbh->prepare($sql_add_character);
                $add_player_stmt->bindParam(':characterName', $try_character_name);
                $add_player_stmt->bindParam(':characterLevel', $try_character_level);
                $add_player_stmt->bindParam(':characterRace', $try_character_race);
                $add_player_stmt->bindParam(':characterClass', $try_character_class);
                $add_player_stmt->bindParam(':userId', $_SESSION['user_id']);
                $add_player_stmt->execute();
                $player_id = $this->dbh->lastInsertId();


                foreach ($try_character_feats as $selected_feat) {
                    $sql_add_feats = 'INSERT INTO player_feats (player_id,feat_id) VALUES(:playerId, :featId)';
                    $add_feat_statement = $this->dbh->prepare($sql_add_feats);
                    $add_feat_statement->bindParam(':featId', $selected_feat);
                }
                $add_feat_statement->bindParam(':playerId', $player_id);

                foreach ($vars as $var_key => $var_value) {
                    if (strpos($var_key, "stat_id") !== false) {
                        $stat_id = substr($var_key, 8);
                        $sql_add_player_stat = 'INSERT INTO player_stats (player_id, stat_id, stat_value) VALUES(:player_id, :stat_id, :stat_value)';
                        $add_player_stat_stmt = $this->dbh->prepare($sql_add_player_stat);
                        $add_player_stat_stmt->bindParam(':player_id', $player_id);
                        $add_player_stat_stmt->bindParam(':stat_id', $stat_id);
                        $add_player_stat_stmt->bindParam(':stat_value', $var_value);
                        $add_player_stat_stmt->execute();
                    }
                }
            } else {
                $this->error = 'please fill out all fields';
            }
        } catch (PDOException $e) {
            print_r('uh-oh!' . $e->getMessage() . '<br />');
        }
    }
}