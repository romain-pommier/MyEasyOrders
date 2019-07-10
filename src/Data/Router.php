<?php
    require_once 'src/Controllers/UsersController.php';
    require_once 'src/Controllers/ProductsController.php';
    
    class Router {

        private $user = null;
        private $product = null;

        public function __construct()
        {
            $this->user = new UsersController();
            $this->product = new ProductsController();
        }

        public function read($request)
        {
            $this->user->read($request);
            $this->product->read($request);

            require 'src/Views/loginform.php';
        }
    }

?>