    <div class="refreshbtn">
        <a href="#" id="refreshEmotionalOrder"><i class="fas fa-sync"></i></a>
    </div>
    <div id="formContentOrderEmotional">
        <h2 id="titleEmotionalFormOrder">Formulaire Commandes Emotional : </h2>
        <form method="POST"enctype="multipart/form-data" id="EmotionalOrderForm" >
            <h3 class="titleInfoClient">Informations Clients :</h3>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productFirstIdOrderClientEmotional">ID commande :</label>
                    <input type="text" class="form-control" name="id_order_followed" id="productFirstIdOrderClientEmotional" required >
                </div>
                <div class="form-group col-md-6">
                    <label for="productNameClientEmotional">Nom :</label>
                    <input type="text" class="form-control" name="client_lastname" id="productNameClientEmotional" required  >
                </div>
                
            </div>
            <div class="form-row">
                
                <div class="form-group col-md-6">
                    <label for="productFirstNameClientEmotional">Prénom :</label>
                    <input type="text" class="form-control" name="client_firstname" id="productFirstNameClientEmotional"   >
                </div>
                <div class="form-group col-md-3">
                    <label for="productTelephoneNumberClientEmotional">Téléphone :</label>
                    <input type="tel" class="form-control" name="client_phone_number" id="productTelephoneNumberClientEmotional">
                </div>
               
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="productAdressClientEmotional">Adresse :</label>
                    <input type="text" class="form-control" name="client_address" id="productAdressClientEmotional" required >
                </div>
                <div class="form-group col-md-6">
                    <label for="productSupAdressClientEmotional">Complèment d'adresse :</label>
                    <input type="text" class="form-control" name="client_address2" id="productSupAdressClientEmotional" >
                </div>
            </div>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                    <label for="productCpClientEmotional">Code Postal :</label>
                    <input type="number" class="form-control" name="client_postal_code" id="productCpClientEmotional" required >
                </div>
                <div class="form-group col-md-4">
                    <label for="productCityClientEmotional">Ville :</label>
                    <input type="text" class="form-control" name="client_city" id="productCityClientEmotional" required >
                </div>
                <div class="form-group col-md-4">
                    <label for="productCountryClientEmotional">Pays :</label>
                    <input type="text" list="countryList" class="form-control" name="client_country" id="productCountryEmotional" required  >
                    <datalist id="countryList">
                        <option>France (Métropole)</option>
                    <datalist>
                </div>
                
                
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="productEmailClientEmotional">Email :</label>
                    <input type="mail" class="form-control" name="client_mail" id="productEmailClientEmotional"  >
                </div>
                
                <div class="form-group col-md-8">
                    <label for="productCommentClientEmotional">Commentaire :</label>
                    <textarea type="texterra" class="form-control" name="order_comment" id="productCommentClientEmotional" ></textarea>
                </div>
                
                
            </div>
            <h3 class="titleInfoClient">Chercher un produit Emotional:</h3>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="productSKUClientEmotional">SKU :</label>
                        <input list="dropDownOrderProductSku"type="text" class="form-control" name="skuFilter" id="productSKUClientEmotional"  >
                        <datalist id="dropDownOrderProductSku"><datalist>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="productSizeClientEmotional">Taille :</label>
                        <input list="dropDownOrderProductSize"type="text" class="form-control" name="sizeFilter" id="productSizeClientEmotional" >
                        <datalist id="dropDownOrderProductSize"><datalist>
                    </div>
                    <div class="form-group col-md-4 divSubFilter">
                        <button type="button" id="searchButtonOrderEmotional"  class="btn btn-primary btnSubFilter">Rechercher</button>
                    </div>
                   
                    <div class="form-group" id="choicesProduct"></div>
                </div>
                
                <div id="engraving">
                
                </div>
                <div class="form-row ">
                    <div class="form-group col-md-4">
                        <label for="productQuantityEmotional" >Quantite :</label>
                        <input type="number" class="form-control" name="product_quantity" id="productQuantityEmotional" required>
                    </div>
                    <div class="form-group col-md-4 divSubFilter">  
                        <button type="submit"   class="btn btn-primary btnSubOrder ">Confirmer</button>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    <script src="src/js/emotionalOrder.js"></script>
