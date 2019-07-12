<?php
    require_once 'src/Controllers/Controller.php';
    require_once 'src/Models/User.php';

    class UsersController extends Controller
    {
        public function __construct()
        {
            $this->model = new User();
        }
        

        public function login($logins)
        {
            if ($this->model->connect($logins)) {
                $_SESSION['name'] = $logins['username'];
                require 'src/Views/membre.php';
            }
            else {
                echo 'mauvais utilisateur/mdp';
            }
        }
        public function registerUsers(){
            //////REMPLI
        }
        public function disconnect(){
            session_destroy();
		    accessLoginForm();
        }

    }

    return;


    // require_once 'src/model/Connexion.php';
    // require_once 'vendor/autoload.php';
    
   

    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // //Page d'accueil
    // function accessLoginForm(){
    //     //appelle une vue pour afficher la page d'accueil
    //     require 'src/view/loginform.php';
    // }

    // //Verifie et créer un utilisateur
    // function createAndCheckUserExist(){
    //     $loginName = $_POST['loginregister'];
    //     $loginPass = $_POST['passregister'];
    //     $loginPass_confirm = $_POST['pass_confirmregister'];
    //     //verification de l'existance d'un nom identique
    //     if(count(getAllUser($loginName))==0){
    //         //verification des deux mots de passe
    //         if ($loginPass == $loginPass_confirm ) {
    //         //enregistrement
    //         registerUsers($loginName,$loginPass);
    //         echo ("compte créer </br>");
    //         }
    //         else {
    //             echo("<p>mot de passe diffèrent</p>");
    //             accesRegister();
    //             } 
    //     }
    //     else{
    //         echo('Identifiant déjà utiliser </br>');
    //         accesRegister();
    //     }
    // } 



    // function addProduct($product){
    //     if(stristr($_POST['addProductEmotional']['product_size'],'de')){
    //         $stringMinSize=$_POST['addProductEmotional']['product_size'][3].$_POST['addProductEmotional']['product_size'][4];
    //         $stringMaxSize=$_POST['addProductEmotional']['product_size'][9].$_POST['addProductEmotional']['product_size'][10];
    //         $minSize = intval($stringMinSize);
    //         $maxSize = intval($stringMaxSize);
    //         if($minSize > 34 && $maxSize > 36 ){
    //             $rangeSize = ($maxSize - $minSize)/"2";
                
    //             $_POST['addProductEmotional']['product_size']=$minSize;
    //             for($i=0;$i<=round($rangeSize);$i++){
    //                 registerProductEmotional($_POST['addProductEmotional'],'emotional');
    //                 $_POST['addProductEmotional']['product_size']+=2;
    //             }

    //         }
    //         else{
    //             echo "taille incorrect";
    //         }

    //     }
    //     else{
	// 		echo"Ce produit existe déjà";
	// 	}
    // }

    // /*
    // ##############################################################################
    // -------------------------------TRAITEMENT EXCEL-------------------------------
    // ##############################################################################
    // */
    
    
    

    //  /*
    // ##############################################################################
    // -------------------------------SUBMIT MAIL--------------------------
    // ##############################################################################
    // */
    
    

    
    


 
 






  