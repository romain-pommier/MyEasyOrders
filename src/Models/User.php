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

        public function registerUsers(){
            ///////REMPLIR
        }
    }
?>