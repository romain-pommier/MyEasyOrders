<?php
    class DatabaseLogs {

        public $port = 0;
        public $database = '';
        public $user = '';
        public $pass = '';
        public $host = '';

        public function __construct($port, $database, $user, $pass, $host)
        {
            $this->port = $port;
            $this->database = $database;
            $this->user = $user;
            $this->pass = $pass;
            $this->host = $host;
        }
    }
?>