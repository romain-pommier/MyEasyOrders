<?php
    require_once 'src/Models/Model.php';

    class User extends Model {

        public function connect($logins)
        {
            $user = $this->fetch([
                'query' => "SELECT * FROM users WHERE name=:loginName",
                'definitions' => [':loginName' => $logins['username']]
            ]);
            
            if (!$user) {
                return false;
            }
            else {
                return password_verify($logins['password'], $user['password']);
            }
        }

        public function registerUsers($loginName, $loginPass){
           $this->executeQuery([
               'query' => 'INSERT INTO users VALUES  (nuul ,:name,:password);',
               'definition' => [':name' => $loginName, ':password' => password_hash($loginPass, PASSWORD_DEFAULT)]
           ]);
        }
        public function getAllUser($login){
            $this->executeQuery([
                'query' => 'SELECT * FROM users WHERE name=:name',
                'definitions' => [':name' => $login]
            ]);
        }

    }
?>