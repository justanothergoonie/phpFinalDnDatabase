<?php
include_once "database.php";

class User

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

    function login($try_user, $try_pass)
    {

        $sql =
            'SELECT id,username FROM users WHERE username = :user AND password = :pass';
        $statement = $this->dbh->prepare($sql);
        $statement->execute(['user' => $try_user, 'pass' => $try_pass]);

        $user = $statement->fetch();
        // print_r($user);
        if (empty($user)) {
            $this->error = 'Invalid Credentials';
        } else {
            $_SESSION['user'] = $user;
            // print_r($user['username']);
            $_SESSION['is_logged_in'] = true;
            header('Location: dn-dashboard.php');
            die();
        }
        $this->dbh = null;
    }

    function do_login($vars)
    {
        try {
            $try_user = $vars['username'];
            $try_pass = $vars['password'];

            if (!empty($try_user) && !empty($try_pass)) {
                self::login($try_user, $try_pass);
            } else {
                $this->error = '';
            }
        } catch (PDOException $e) {
            print_r('uh-oh!' . $e->getMessage() . '<br />');
        }
    }
    function do_update_account($vars)
    {
        try {
            $current_user = $_SESSION['user'];
            $try_update_username = $vars['username'];
            $try_update_password = $vars['password'];
            $try_confirm_update_password = $vars['confirm_password'];

            if ($try_update_password !== $try_confirm_update_password) {

                $this->error = 'pass dont match yo';
            } else if (
                !empty($try_update_username) &&
                !empty($try_update_password) &&
                !empty($try_confirm_update_password)
            ) {

                $sql_id_check =
                    'SELECT id FROM users WHERE username = :user';
                $id_check_stmt = $this->dbh->prepare($sql_id_check);
                $id_check_stmt->execute(['user' => $current_user['username']]);
                $user_id_relates = $id_check_stmt->fetch();
                if ($user_id_relates) {

                    $sql_user_check = 'SELECT * FROM  users WHERE username=?';
                    $stmt = $this->dbh->prepare($sql_user_check);
                    $stmt->execute([$try_update_username]);
                    $user_name_taken = $stmt->fetch();
                    if ($user_name_taken) {
                        $this->error = 'name already taken';
                    } else {
                        $sql_update_user = 'UPDATE users SET username = :user, password = :pass WHERE id = :existing_user_id';
                        $update_stmt = $this->dbh->prepare($sql_update_user);
                        $result = $update_stmt->execute(['user' => $try_update_username, 'pass' => $try_update_password, 'existing_user_id' => $user_id_relates['id']]);
                        if ($result == 1) {
                            $_SESSION['user']['username'] = $try_update_username;
                        } else {
                            $this->error = "had a problem!";
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            print_r('uh-oh!' . $e->getMessage() . '<br />');
        }
    }

    function do_signup($vars)
    {
        try {
            $try_new_username = $vars['username'];
            $try_new_password = $vars['password'];
            $try_confirm_new_password = $vars['confirm_password'];
            if ($try_new_password !== $try_confirm_new_password) {
                $this->error = 'pass dont match';
            }
            if (
                !empty($try_new_username) &&
                !empty($try_new_password) &&
                !empty($try_confirm_new_password)
            ) {

                $sql_user_check = 'SELECT * FROM  users WHERE username=?';
                $stmt = $this->dbh->prepare($sql_user_check);
                $stmt->execute([$try_new_username]);
                $user_name_taken = $stmt->fetch();
                if ($user_name_taken) {
                    $this->error = 'name already taken';
                } else {
                    $sql_add_user =
                        'INSERT INTO users (username, password) VALUES(:username, :password)';
                    $add_stmt = $this->dbh->prepare($sql_add_user);
                    $add_stmt->bindParam(':username', $try_new_username);
                    $add_stmt->bindParam(':password', $try_new_password);
                    $result = $add_stmt->execute();
                    if ($result == 1) {
                        self::login($try_new_username, $try_new_password);
                    }
                }
            }
        } catch (PDOException $e) {
            print_r('uh-oh!' . $e->getMessage() . '<br />');
        }
    }
    function do_confirm_delete()
    {
        $current_user = $_SESSION['user'];

        $sql_delete_user = 'DELETE FROM users WHERE username = :user';
        $delete_stmt = $this->dbh->prepare($sql_delete_user);
        $result = $delete_stmt->execute(['user' => $current_user['username']]);
        if ($result == 1) {
            self::logout();
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: login.php');
        die();
    }
}