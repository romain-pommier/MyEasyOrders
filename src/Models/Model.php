<?php
    require_once 'src/Data/DatabaseLogs.php';

    class Model {

        private $ionos = null;
        private $ovh = null;
        private $local = null;
        private $localTest = null;
        private $logins = null;

        public function __construct()
        {
            $this->ionos = new DatabaseLogs(3306, "dbs102996", "dbu322716", "Beltxa-p31ion!*", "db5000108489.hosting-data.io");
            $this->ovh = new DatabaseLogs(3306, "keethfuorders", "keethfuorders", "Orders31", "keethfuorders.mysql.db");
            $this->local = new DatabaseLogs(3306, "firstsellerorderdata",  "root", "Beltxa-p31php!*", "localhost");
            $this->localTest = new DatabaseLogs(3308, "MyEasyOrders",  "root", "Beltxa-p31php!*", "localhost");
        
            $this->logins = $this->localTest;
        }

        public function connectDatabase()
        {
            $logins = $this->logins;

            try {
                $dbh = new PDO("mysql:host=$logins->host;port=" . $logins->port . ";dbname=" . $logins->database, $logins->user, $logins->pass);
                $dbh->exec("SET NAMES 'UTF8'");
            } 
            catch (PDOException $e){
                print "Erreur !: " . $e->getMessage() . "<br/>";
            }
            
            return $dbh;
        }

        public function executeQuery($data)
        {
            $request = $this->connectDatabase()->prepare($data['query']);
            if (!isset($data['definitions']) || $data['definitions'] == null || $data['definitions'] == []) {
                $request->execute();
            }
            else {
                $request->execute($data['definitions']);
            }
            return $request;
        }
        
        public function fetch($data)
        {
            $request = $this->executeQuery($data);
            return $request->fetch();
        }
        
        public function fetchAll($data)
        {
            $request = $this->executeQuery($data);
            return $request->fetchAll();
        }
    }
?>