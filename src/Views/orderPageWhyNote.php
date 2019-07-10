<div class="refreshbtn">
        <a href="#" id="refreshWhynoteOrder"><i class="fas fa-sync"></i></a>
    </div>

    <div id="formContentOrderWhyNote">
        <h2 id="titleWhyNoteFormOrder">Formulaire Commandes WhyNote : </h2>
        <form enctype="multipart/form-data" id="whynoteOrderForm">
            <h3 class="titleInfoClient">Informations Clients :</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productFirstNameClientWhyNote">Prénom :</label>
                    <input type="text" class="form-control" name="client_firstname" id="productFirstNameClientWhyNote"  >
                </div>
                <div class="form-group col-md-6">
                    <label for="productNameClientWhyNote">Nom :</label>
                    <input type="text" class="form-control" name="client_lastName" id="productNameClientWhyNote"  >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productAdressClientWhyNote">Adresse :</label>
                    <input type="text" class="form-control" name="client_address" id="productAdressClientWhyNote" >
                </div>
                <div class="form-group col-md-6">
                    <label for="productSupAdressClientWhyNote">Complèment d'adresse :</label>
                     <input type="text" class="form-control" name="client_address2" id="productSupAdressClientWhyNote">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="productCountryClientWhyNote">Pays :</label>
                    <input type="text" class="form-control" name="client_country" id="productCountryWhyNote"  >
                </div>
                
                <div class="form-group col-md-4">
                    <label for="productCityClientWhyNote">Ville :</label>
                    <input type="text" class="form-control" name="client_city" id="productCityClientWhyNote" >
                </div>
                <div class="form-group col-md-2">
                    <label for="productCpClientWhyNote">Code Postal :</label>
                    <input type="number" class="form-control" name="client_postal_code" id="productCpClientWhyNote" >
                </div>
                <div class="form-group col-md-2">
                    <label for="productTelephoneNumberClientWhyNote">Téléphone :</label>
                    <input type="tel" class="form-control" name="client_phone_number" id="productTelephoneNumberClientWhyNote" >
                </div>
            </div>
            
            <h3 class="titleProductClient">Ajouter un produit WhyNote :</h3>
           
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="productNameClientWhyNote">Nom du produit :</label>
                        <input list="dropDownOrderProductName"type="text" class="form-control" name="nameFilter" id="productNameClientWhyNote" >
                        <datalist id="dropDownOrderProductName"><datalist>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="productColorClientWhyNote">Couleur :</label>
                        <input list="dropDownOrderProductColor"type="text" class="form-control" name="colorFilter" id="productColorClientWhyNote">
                        <datalist id="dropDownOrderProductColor"><datalist>
                    </div>
                    <div class="form-group col-md-4 divSubFilter">
                        <button type="button" id="searchButtonOrderWhyNote"  class="btn btn-primary btnSubFilter">Rechecher</button>
                    </div>
                    
                    
                    
                    <div class="form-group" id="choicesProduct"></div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="productQuantityClientWhyNote">Quantite :</label>
                        <input type="number" class="form-control" name="product_quantity" id="productQuantityClientWhyNote" >
                        
                    </div>
                    <div class="form-group col-md-4  divSubOrder">
                        <button type="submit"   class="btn btn-primary btnSubOrder ">Confirmer</button>
                    </div>
                </div>
        </form>
    </div>
   
    
<script src="src/js/whyNoteOrder.js"></script>
