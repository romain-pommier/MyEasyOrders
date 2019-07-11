<?php
	require_once 'src/Data/Router.php';

	session_start();
	extract($_POST);

	Router::registerRequests();
	Router::readRequest($_POST);

	return;

	require_once 'src/Controllers/Controller.php';








	/*
    ##############################################################################
    *-------------------------------------WhyNote------------------------------
    ##############################################################################
	*/
	if(isset($_POST['addProductWhyNote'])){
		if(count(getWhyNoteProduct($_POST['addProductWhyNote']))==0){
			registerProduct($_POST['addProductWhyNote'],'whynote');
			echo "Produit ajouté";
		}
		else{
			echo"Ce produit existe deja"; 
		}
	}
	else if (isset($_POST['updateProductWhyNote'])){
		updateWhyNoteProduct($_POST['updateProductWhyNote']);
		echo"Produit modifier";
	}
	else if (isset($_POST['deleteWhyNoteProduct'])){
		deleteProduct($_POST['deleteWhyNoteProduct'],'whynote');
		echo "Produit supprimer";
	}
	else if (isset($_POST['optionWhyNote'])){
		echo json_encode(getDiferentOptionProduct("product_option","whynote"));
	}
	
	else if (isset($_POST['contentTableWhyNote'])){
		echo json_encode(getAllProduct("whynote"));
	}
	
	else if(isset($_POST['displayListFilterWhyNote'])){
		$filter=["product_name","product_color"];
		$dataList=[getDiferentOptionProduct($filter[0],'whynote'),getDiferentOptionProduct($filter[1],'whynote')];
		echo json_encode($dataList);
	}
	//Vérifie la table dataArray
	
	else if (isset($_POST['contentTableHistoricWhyNote'])){
		echo json_encode(getAllOrders("whynote"));
		
	}
	else if (isset($_POST['deleteOrder'])){
		deleteOrder($_POST['deleteOrder']);
		echo "Commande supprimée";
	
	}
	//Verifie la valeur des filtre
	else if (isset($_POST['filterWhyNote'])){
		if (count($_POST['filterWhyNote'])==1 && $_POST['filterWhyNote'] !== 0){
			if(array_key_exists('product_name',$_POST['filterWhyNote'])){
				echo json_encode(getProductsByOneFilter('product_name',$_POST['filterWhyNote']['product_name'],'whynote'));
			}
			else{
				echo json_encode(getProductsByOneFilter('product_color',$_POST['filterWhyNote']['product_color'],'whynote'));
			}
		}
		else{
			$filter=['product_name','product_color'];
			$value=[$_POST['filterWhyNote']['product_name'],$_POST['filterWhyNote']['product_color']];
			echo json_encode(getProductsByTwoFilter($filter,$value,'whynote'));
		}
	}
	else if(isset($_POST['WhyNoteOrderData'])){
		addOrder($_POST["WhyNoteOrderData"],'whynote');
		echo"Commande Ajouter";
	}
	
	
/*
    ##############################################################################
    *-------------------------------------EMOTIONAL------------------------------
	##############################################################################
	
	
*/
else if (isset($_POST['deleteOrderEmotional'])){
	deleteOrder($_POST['deleteOrderEmotional']);
	echo("Commande Emotional supprimer");
}

else if(isset($_POST['dataEmotionalClient'])){
	
	addOrderEmotional($_POST["dataEmotionalClient"]);
	echo"Commande Ajouter";
}
//Verifie la valeur des filtre
	else if (isset($_POST['filterEmotional'])){
		if (count($_POST['filterEmotional'])==1 && $_POST['filterEmotional'] !== 0){
			if(array_key_exists('product_sku',$_POST['filterEmotional'])){
				echo json_encode(getProductsByOneFilter('product_sku',$_POST['filterEmotional']['product_sku'],'emotional'));
			}
			else{
				echo json_encode(getProductsByOneFilter('product_size',$_POST['filterEmotional']['product_size'],'emotional'));
			}
		}
		else{
			$filter=['product_sku','product_size'];
			$value=[$_POST['filterEmotional']['product_sku'],$_POST['filterEmotional']['product_size']];
			echo json_encode(getProductsByTwoFilter($filter,$value,'emotional'));
		}
	}

	else if(isset($_POST['displayListFilterEmotional'])){
		$filter=["product_sku","product_size"];
		$dataList=[getDiferentOptionProduct($filter[0],"emotional"),getDiferentOptionProduct($filter[1],"emotional")];
		echo json_encode($dataList);
	}




	//Vérification du post produit why note + echo du detail
	
	else if (isset($_POST['updateProductEmotional'])){
		echo ("Produit modifié");
		updateEmotionnalProduct($_POST['updateProductEmotional']);
	}
	//verification du post produit emotional + echo du detail
	else if (isset($_POST['addProductEmotional'])){
		//verifier l'existance par id
		if(count(getDataExistInEmotionalProduct($_POST['addProductEmotional']))==0){
			addProduct($_POST['addProductEmotional']);
		}
		else{
			registerProductEmotional($_POST['addProductEmotional'],'emotional');
			echo "Produit ajouté";
		}
		
		
	}
	else if (isset($_POST['focusDeleteEmotionalProduct'])){
		echo("Produit Supprimé");
		deleteProduct($_POST['focusDeleteEmotionalProduct'],"emotional");
	}
	
	else if (isset($_POST['contentTableEmotional'])){
		echo json_encode(getAllProduct('emotional'));

	}
	else if (isset($_POST['fontEmotional'])){
		addEmotionalFont($_POST['fontEmotional']);
		echo "Police Ajouter";
	}
	else if (isset($_POST['datalistOrderEmotional'])){
		echo json_encode(getEmotionalFont());

	}
	else if (isset($_POST['contentTableHistoricEmotional'])){
		echo json_encode(getAllOrders("emotional"));
	}
	/*
    ##############################################################################
    *-------------------------------------HOME------------------------------
    ##############################################################################
	*/
	

	else if (isset($_POST["dateExcel"]) ){
		if(getAllOrdersByDate($_POST['partnerName'],$_POST["dateExcel"])){
			headerExcel(getAllOrdersByDate($_POST['partnerName'],$_POST["dateExcel"]),$_POST["dateExcel"]);
			echo "Tableau Excel Créé";
		}
		else{
			echo "aucune commande n'a était enregistré le ".$_POST["dateExcel"];
		}
		
	}
	/*
    ##############################################################################
    *-------------------------------------USER------------------------------
    ##############################################################################
	*/
	//Vérifie que le POST enregistrement soit rempli
	else if(isset($_POST['registeraccess'])){
		accesRegister();
	}
	//Vérifie que le POST deconnexion soit rempli
	else if (isset($_POST['disconnect'])){
		session_destroy();
		accessLoginForm();	
	}
	//Vérifie que le POST loginet mot de passe de connection soit rempli
	else if(isset($_POST['login']) && isset($_POST['pass'])){
		login($_POST['login'],$_POST['pass']);
	}
	//Vérifie que le POST login et mot de passe d'enregistrement soit rempli
	else if (isset($_POST['loginregister'] ) && isset($_POST['passregister'])){
		createAndCheckUserExist();
		accessLoginForm();	   
	}
	else if(isset($_SESSION['name'])){
		require 'src/View/membre.php';
		
	}	
	else{
		accessLoginForm();
	}
	















