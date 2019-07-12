<?php



require_once 'src/Controllers/Controller.php';


//Ajouter une verification avant d'ajouter
class FontsController extends Controller{
    public function __construct(){
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
    
    }
}