


<div id="groupeButtonAddProductForm">
	<button  id="modalWhyNoteProduct" type="button" class="btn btn-primary btnFormProduct" data-toggle="modal" data-target="#modalAddWhyNoteProduct" data-whatever="@getbootstrap">Ajouter un produit WhyNote</button>
</div>

<table id="tableForWhyNoteProduct" style="width:100%" >
    <thead >
        <tr id="headerTableForWhyNoteProduct">
            <th>Nom du Produit</th>
            <th>Couleur</th>
			<th>Option du Produit</th>
            <th>Date D'Ajout</th>
			<th>Modification</th> 
        </tr>
    </thead>
	
	<tbody id="tbodyWhyNote">
	</tbody>
</table>



<!--##############################################################################-->
<!-------------------------------MODAL WhyNote----------------------------------->
<!--##############################################################################-->
<div class="modal fade" id="modalAddWhyNoteProduct" tabindex="-1" role="dialog" aria-labelledby="modalAddWhyNoteProductLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
    		<div class="modal-header">
        		<h5 class="modal-title" id="modalAddWhyNoteProductLabel">Ajouter un Produit WhyNote</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      		</div>
			<form enctype="multipart/form-data" id="addProductWhyNote">
				<div class="modal-body">
					<div class="form-row">
						<div class="form-group col-md-8">
							<label for="productNameWhyNote">Nom du produit</label>
							<input type="text" id="productNameWhyNote"class="form-control" name="product_name" required>
						</div>
					</div>
					
					<div class="form-group ">
						<label for="productColorWhyNote">Ajouter une couleur</label>
						<input type="text" id="productColorWhyNote" class="form-control col-md-8" name="product_color" >
					</div>
					
					<div class="form-group ">
						<label for="productUrlWhyNote">Ajouter une photo</label>
						<input type="url" class="form-control  col-md-8" id="productUrlWhyNote" name='product_picture_url' placeholder="URL">
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-7">
							<label for="inputNewOption">Ajouter une option</label>
							<input type="text" class="form-control" name="addProductOptionWhyNote" id="inputNewOption">
						</div>
						<div class=" col-md-6">
						<p class="text-center">ou</p>
						</div>
						
						<div class="form-group col-md-7">
							<label for ="choiseOptionWhyNote">Choisir une option existante:<br></label>
							<input list="dataOptionWhyNote" type="text" name="productOptionWhyNote"  id="choiseOptionWhyNote" class="form-control" >
							<datalist id="dataOptionWhyNote"></datalist>
						</div>
						
					</div>
				</div>
				
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<button type="submit" id="submitFormAddProduct" class="btn btn-primary">Ajouter</button>
					
				</div>
			
			</form>
		</div>
	</div>
</div>

<script src="src/js/whyNoteApp.js"></script>








