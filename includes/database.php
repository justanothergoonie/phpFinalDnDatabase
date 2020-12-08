<?php
class Database
{
    private $db_host = 'localhost';
    private $db_user = 'web';
    private $db_pass = 'web';
    private $db_name = 'DnDatabase';
    private $error = '';
    private $dsn = '';
    public function get_dbh()
    {
        return new PDO($this->dsn, $this->db_user, $this->db_pass);
    }

    function __construct()
    {
        $this->dsn = "mysql:host={$this->db_host};dbname={$this->db_name};";
    }
    public function errorMessage()
    {
        return $this->error;
    }
    function handleAction($action, $vars)
    {
        $action_function = "do_{$action}";
        if (method_exists($this, $action_function)) {
            $this->$action_function($vars);
        }
    }
}