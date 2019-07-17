<?php
    require_once 'src/Controllers/UsersController.php';
    require_once 'src/Controllers/ProductsController.php';
    require_once 'src/Controllers/OrdersController.php';
    require_once 'src/Controllers/FontsController.php';
    require_once 'src/Helper/Helper.php';
    
    class Router {
        private static $requests = [];
        private static $user;
        private static $product;
        private static $order;
        private static $font;
        private static $helper;

        public static function registerRequests()
        {
            if (Router::$requests != []) {
                return;
            }

            Router::$user = new UsersController();
            Router::$product = new ProductsController();
            Router::$order = new OrdersController();
            Router::$font = new FontsController();
            Router::$helper = new Helper();

            Router::$requests[] = [
                'names' => ['login', 'pass'],
                'action' => function($request) {
                    Router::$user->login([
                        'username' => $request['login'],
                        'password' => $request['pass']
                    ]);
                }
            ];
            Router::$requests[] = [
                'names' => ['disconnect'],
                'action' => function($request) {
                    Router::$user->disconnect();
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
            
            Router::$requests[] = [
                'names' => ['optionWhyNote'],
                'action' => function($request) {
                    
                    echo json_encode(Router::$product->model->getDiferentOptionProduct('product_option','whynote'));
                    die();
                }
                
            ];
            
            Router::$requests[] = [
                'names' => ['displayListFilterWhyNote'],
                'action' => function($request){
                    echo json_encode(Router::$product->getDiferentFilterProduct('whynote'));
                    die();
                }
            ];
            
            //*************************  ORDERS  *****************************/
            
            Router::$requests[] = [
                'names' => ['filterWhyNote'],
                'action' => function($request){
                    Router::$product->getProductFilter($request['filterWhyNote'],'whynote');
                    die();
                }
            ];
            
            Router::$requests[] = [
                'names' => ['WhyNoteOrderData'],
                'action' => function($request){
                    Router::$order->model->addWhynoteOrder($request['WhyNoteOrderData']);
                    die();
                }
            ];
            
            Router::$requests[] = [
                'names' => ['contentTableHistoricWhyNote'],
                'action' => function($request){
                    echo json_encode(Router::$order->model->getAllOrders('whynote'));
                    die();
                }
            ];
            
            Router::$requests[] = [
                'names' => ['deleteOrder'],
                'action' => function($request){
                    Router::$order->deleteOrder($request['deleteOrder']);
                    die();
                }
            ];
            

            /*#################################################################
            ###################################################################
            ################################  FONT  ###########################
            ###################################################################
            ###################################################################*/
            Router::$requests[] = [
                'names' => ['fontEmotional'],
                'action' => function($request){
                    Router::$font->addEmotionalFont($request);
                }
            ];
            
            Router::$requests[] = [
                'names' => ['datalistOrderEmotional'],
                'action' => function($request){
                    echo json_encode(Router::$font->model->getEmotionalFont());
                    die();
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
                'names' => ['dataEmotionalClient'],
                'action' => function($request){
                    Router::$order->addEmotionalOrder($request['dataEmotionalClient']);
                    die();
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

            Router::$requests[] = [
                'names' => ['displayListFilterEmotional'],
                'action' => function($request){
                    echo json_encode(Router::$product->getDiferentFilterProduct('emotional'));
                    die();
                }
            ];
            
            Router::$requests[] = [
                'names' => ['filterEmotional'],
                'action' => function($request){
                    Router::$product->getProductFilter($request['filterEmotional'],'emotional');
                    die();
                }
            ];
            
            Router::$requests[] = [
                'names' => ['contentTableHistoricEmotional'],
                'action' => function($request){
                    echo json_encode(Router::$order->model->getAllOrders('emotional'));
                    die();
                }
            ];

            Router::$requests[] = [
                'names' => ['deleteOrderEmotional'],
                'action' => function($request){
                    Router::$order->deleteOrder($request['deleteOrderEmotional']);
                    die();
                }
            ];


            Router::$requests[] = [
                'names' => ['dateExcel'],
                'action' => function($request){
                    Router::$helper->createExcel(Router::$order->model->getAllOrders($request['partnerName']),$request['dateExcel']);
                    echo'Excel créé';
                    die();
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