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

    }

    return;


    require_once 'src/model/Connexion.php';
    require_once 'vendor/autoload.php';
    
   

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Page d'accueil
    function accessLoginForm(){
        //appelle une vue pour afficher la page d'accueil
        require 'src/view/loginform.php';
    }

    //Verifie et créer un utilisateur
    function createAndCheckUserExist(){
        $loginName = $_POST['loginregister'];
        $loginPass = $_POST['passregister'];
        $loginPass_confirm = $_POST['pass_confirmregister'];
        //verification de l'existance d'un nom identique
        if(count(getAllUser($loginName))==0){
            //verification des deux mots de passe
            if ($loginPass == $loginPass_confirm ) {
            //enregistrement
            registerUsers($loginName,$loginPass);
            echo ("compte créer </br>");
            }
            else {
                echo("<p>mot de passe diffèrent</p>");
                accesRegister();
                } 
        }
        else{
            echo('Identifiant déjà utiliser </br>');
            accesRegister();
        }
    } 



    function addProduct($product){
        if(stristr($_POST['addProductEmotional']['product_size'],'de')){
            $stringMinSize=$_POST['addProductEmotional']['product_size'][3].$_POST['addProductEmotional']['product_size'][4];
            $stringMaxSize=$_POST['addProductEmotional']['product_size'][9].$_POST['addProductEmotional']['product_size'][10];
            $minSize = intval($stringMinSize);
            $maxSize = intval($stringMaxSize);
            if($minSize > 34 && $maxSize > 36 ){
                $rangeSize = ($maxSize - $minSize)/"2";
                
                $_POST['addProductEmotional']['product_size']=$minSize;
                for($i=0;$i<=round($rangeSize);$i++){
                    registerProductEmotional($_POST['addProductEmotional'],'emotional');
                    $_POST['addProductEmotional']['product_size']+=2;
                }

            }
            else{
                echo "taille incorrect";
            }

        }
        else{
			echo"Ce produit existe déjà";
		}
    }

    /*
    ##############################################################################
    -------------------------------TRAITEMENT EXCEL-------------------------------
    ##############################################################################
    */
    
    function headerExcel($dataOrder,$dateOrder){

        $lettre='A';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $ligne=2;
        foreach($dataOrder as $element){
            $lettre='A';
            if($element['partner_name'] =='whynote'){
                $partner_name=$element['partner_name'];
                $whynoteAssociativeArray['Prenom / Nom'] = $element['client_firstname'].' '.$element['client_lastname'] ;
                $whynoteAssociativeArray['Adresse']=$element['client_address'];
                $whynoteAssociativeArray['Adresse complementaire']=$element['client_address2'];
                $whynoteAssociativeArray['Pays']=$element['client_country'];
                $whynoteAssociativeArray['Cp']=$element['client_postal_code'];
                $whynoteAssociativeArray['Ville']=$element['client_city'];
                $whynoteAssociativeArray['Telephone']=$element['client_phone_number'];
                $whynoteAssociativeArray['Offre']=$element['product_name'];
                $whynoteAssociativeArray['Quantite']=$element['product_quantity'];
                $whynoteAssociativeArray['Lignée/Non lignée']=$element['product_option'];
                $whynoteAssociativeArray['Couleur']=$element['product_color'];

                
                   
                foreach ($whynoteAssociativeArray as $key => $value) {
                    $sheet->setCellValue($lettre.'1',$key);
                    $lettre++;
                }
                $lettre='A';
                foreach ($whynoteAssociativeArray as $key => $value) {
                    $sheet->setCellValue($lettre.$ligne,$value);
                    $lettre++;
                }
                $ligne++;
                
                
            }
            else{
                $partner_name=$element['partner_name'];
                $emotionalAssociativeArray['id_order'] = $element['id_order_followed'];
                $emotionalAssociativeArray['id_order_line']=($ligne-1);
                $emotionalAssociativeArray['date_purchased']=date('d/m/Y ', strtotime($element['order_date']));;
                $emotionalAssociativeArray['customer_lastname']=$element['client_lastname'];
                $emotionalAssociativeArray['customer_firstname']=$element['client_firstname'];
                $emotionalAssociativeArray['customer_email']=$element['client_mail'];
                $emotionalAssociativeArray['customer_phone_number']=$element['client_phone_number'];
                $emotionalAssociativeArray['address_delivery_lastname']=$element['client_lastname'];
                $emotionalAssociativeArray['address_delivery_firstname']=$element['client_firstname'];
                $emotionalAssociativeArray['address_delivery_address1']=$element['client_address'];
                $emotionalAssociativeArray['address_delivery_address2']=$element['client_address2'];
                $emotionalAssociativeArray['address_delivery_addrese3'] ="";
                $emotionalAssociativeArray['address_delivery_postalcode'] = $element['client_postal_code'];
                $emotionalAssociativeArray['address_delivery_city'] = $element['client_city'];
                $emotionalAssociativeArray['address_delivery_country'] = $element['client_country'];
                $emotionalAssociativeArray['address_delivery_country_iso'] = "";
                $emotionalAssociativeArray['address_invoice_lastname'] = $element['client_lastname'];
                $emotionalAssociativeArray['address_invoice_firstname'] = $element['client_firstname'];
                $emotionalAssociativeArray['address_invoice_address1'] = $element['client_address'];
                $emotionalAssociativeArray['address_invoice_address2'] = $element['client_address2'];
                $emotionalAssociativeArray['address_invoice_addrese3'] ="";
                $emotionalAssociativeArray['address_invoice_postalcode'] = $element['client_postal_code'];
                $emotionalAssociativeArray['address_invoice_city'] = $element['client_city'];
                $emotionalAssociativeArray['address_invoice_country'] = $element['client_country'];
                $emotionalAssociativeArray['address_invoice_country_iso'] = "";
                $emotionalAssociativeArray['shipping_name'] = $element['shipping_name'];
                $emotionalAssociativeArray['comment'] = $element['order_comment'];
                $emotionalAssociativeArray['product_ean'] = $element['product_ean'];
                $emotionalAssociativeArray['product_reference'] = $element['product_reference'];
                $emotionalAssociativeArray['product_name'] = $element['product_name'];
                $emotionalAssociativeArray['size'] = $element['product_size'];
                $emotionalAssociativeArray['color'] = "";
                $emotionalAssociativeArray['quantity'] = $element['product_quantity'];
                $emotionalAssociativeArray['preview_url'] = "";
                $emotionalAssociativeArray['hd_url'] = "";
                $emotionalAssociativeArray['data'] = $element['product_custom'];
                
                
                   
                foreach ($emotionalAssociativeArray as $key => $value) {
                    $sheet->setCellValue($lettre.'1',$key);
                    $lettre++;
                }
                $lettre='A';
                foreach ($emotionalAssociativeArray as $key => $value) {
                    $sheet->setCellValue($lettre.$ligne,$value);
                    $lettre++;
                }
                $ligne++;
                
                
            }

            }
            $sheet ->getStyle('A1:AH1')->getFont()->setBold(True);
        $sheet ->getStyle('A1:AH1')->getAlignment()->setHorizontal('center');
        $writer = new Xlsx($spreadsheet);
        $writer->save("excel/excel_".$partner_name."_order_".$dateOrder.".xlsx");
       
    }
    

     /*
    ##############################################################################
    -------------------------------SUBMIT MAIL--------------------------
    ##############################################################################
    */
    function sendMail($pathFile,$partnerName,$orderDate){
        $partnerName ="logistique@firstseller.fr";
        
        // if($partnerName == "whynote"){
        //     $mailPartner = "ddprepa@gmail.com";
        // }
        // else if($partnerName == "emotional"){
        //     $mailPartner = "orders@wiseup.fr";

        // }
        $mailPartner="logistique@firstseller.fr";

        $email_subject="FirstsellerOrders";
        $email_from="logistique@firstseller.fr";
        $message_mail="message";
        $subject="testSubject";
        $passage_ligne = "\r\n";
        $path="excel/";
        //$pathFile=$path.$fileName;
        $file_type = filetype($pathFile);
        $fileSize=filesize($pathFile);
        
        $mail = new PHPMailer();
        $mail->From     = $email_from;
        $mail->FromName = "FirstSeller";
        $mail->addAddress($mailPartner, "Reply Address");
        $mail->Subject  = "Subject Text";
        $mail->Body     = "Commande du ".$orderDate."";
        

        // Ajout Attachment
        $attachment = $pathFile;
        $mail->AddAttachment($attachment , $partnerName.".xlsx");
        
        if($mail->send()) {
            exit;
        } 
        else {
            echo "Error: " . $mail->ErrorInfo;
        }   
    }

    

    
    


 
 






  