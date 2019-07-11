<?php
    require_once 'src/Controllers/UsersController.php';
    require_once 'src/Controllers/ProductsController.php';
    
    class Router {
        private static $requests = [];
        private static $user;
        private static $product;

        public static function registerRequests()
        {
            if (Router::$requests != []) {
                return;
            }

            Router::$user = new UsersController();
            Router::$product = new ProductsController();

            Router::$requests[] = [
                'names' => ['login', 'pass'],
                'action' => function($request) {
                    Router::$user->login([
                        'username' => $request['login'],
                        'password' => $request['pass']
                    ]);
                }
            ];
             /*#################################################################
            ###################################################################
            ###############################  WHYNOTE  #########################
            ###################################################################
            ###################################################################*/
            Router::$requests[] = [
                'names' => ['contentTableWhyNote'],
                'action' => function($request) {
                    echo json_encode(Router::$product->model->getAllProduct('whynote'));
                    die();
                }
            ];
            
            Router::$requests[] = [
                'names' => ['addProductWhyNote'],
                'action' => function($request){
                    Router::$product->checkAndRegisterWhynoteProduct($request['addProductWhyNote']);
                }
            ];

            Router::$requests[] = [
                'names' => ['updateWhyNoteProduct'],
                'action' => function($request){
                    Router::$product->updateWhyNoteProduct($request['updateWhyNoteProduct']);
                }
            ];
            
            Router::$requests[] = [
                'names' => ['deleteWhyNoteProduct'],
                'action' => function($request){
                    Router::$product->deleteProduct($request['deleteWhyNoteProduct'],'whynote');
                }
            ];

            /*#################################################################
            ###################################################################
            #############################  EMOTIONAL  #########################
            ###################################################################
            ###################################################################*/
            Router::$requests[] = [
                'names' => ['contentTableEmotional'],
                'action' => function($request){
                    echo json_encode(Router::$product->model->getAllProduct('emotional'));
                    die();
                }
            ];

            Router::$requests[] = [
                'names' => ['addProductEmotional'],
                'action' => function($request){
                    Router::$product->checkAndRegisterEmotionalProduct($request['addProductEmotional']);
                }

            ];

            Router::$requests[] = [
                'names' => ['updateEmotionalProduct'],
                'action' => function($request){
                    Router::$product->updateEmotionalProduct($request['updateEmotionalProduct']);
                }
            ];

            Router::$requests[] = [
                'names' => ['deleteEmotionalProduct'],
                'action' => function($request){
                    Router::$product->deleteProduct($request['deleteEmotionalProduct'],'emotional');
                }
            ];


        }
        

        public static function readRequest($request)
        {
            foreach (Router::$requests as $reqDatas)
            {
                $badRequest = false;

                foreach ($reqDatas['names'] as $name)
                {
                    if (!isset($request[$name])) {
                        $badRequest = true;
                        break;
                    }
                }

                if ($badRequest) {
                    continue;
                }

                $reqDatas['action']($request);
            }

            require 'src/Views/loginform.php';
        }
        

    }

?>