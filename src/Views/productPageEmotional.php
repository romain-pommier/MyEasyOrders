


<div id="groupeButtonAddProductForm">
	<button id="modalEmotionalProduct" type="button" class="btn btn-primary btnFormProduct" data-toggle="modal" data-target="#modalAddEmotionalProduct" data-whatever="@getbootstrap">Ajouter un produit emotional</button>
	<button id="modalEmotionalFont" type="button" class="btn btn-primary btnFormFont" data-toggle="modal" data-target="#modalAddEmotionalFont" data-whatever="@getbootstrap">Ajouter une Police d'écriture</button>

</div>

<table id="tableForEmotionalProduct" style="width:100%">
    <thead>
        <tr id="headerTableForEmotionalProduct">
            <th>Nom du Produit</th>
            <th>N° Référence</th>
			<th>EAN</th>
			<th>SKU</th>
            <th>Taille</th>
            <th>Gravure</th>
            <th>N°Ligne a graver</th>
            <th>N°caractère par ligne</th>
            <th>Date d'ajout</th>
			<th>Modification</th>
        </tr>
    </thead>
	
	<tbody id="tbodyEmotional">
	</tbody>
</table>

<!--##############################################################################-->
<!-------------------------------MODAL emotional----------------------------------->
<!--##############################################################################-->
<div class="modal fade" id="modalAddEmotionalProduct" tabindex="-1" role="dialog" aria-labelledby="modalAddEmotionalProductLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
    		<div class="modal-header">
        		<h5 class="modal-title" id="modalAddEmotionalProductLabel">Ajouter un Produit emotional</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
			<form enctype="multipart/form-data" id="addEmotionalProduct">
				<div class="modal-body">
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="productNameEmotional">Nom du produit :</label>
							<input type="text" class="form-control" name="product_name" id="productNameEmotional"  >
						</div>
						<div class="form-group col-md-6">
							<label for="productReferenceEmotional">Référence du produit :</label>
							<input type="text" class="form-control" name="product_reference" id="productReferenceEmotional" required >
						</div>
					</div>
					
					<div class="form-row ">
						<div class="form-group col-md-6">
								<label for="productEanEmotional">EAN du produit :</label>
								<input type="text" class="form-control" name="product_ean" id="productEanEmotional" required >
						</div>
						<div class="form-group col-md-6">
								<label for="productSkuEmotional">SKU du produit :</label>
								<input type="text" class="form-control" name="product_sku" id="productSkuEmotional" required >
						</div>
					</div>
					<h6>TAILLE</h6>
					<hr>
					<div class="form-row ">
						<div class="form-group col-md-8">
							<label>Type de Taille</label> :<br>
							<div class="form-radio">
								<input type="radio" value="unique" class="form-radio-input sizeTypeEmotional" id="uniqueSizeProduct" name="product_type_size" >
								<label class="form-check-label " for="uniqueSizeProduct">Unique</label>
							</div>
							<div class="form-radio rangeDivSize ">
								<input type="radio" value="Range" class="form-radio-input sizeTypeEmotional" id="rangeSizeProduct" name="product_type_size" >
								<label class="form-check-label " for="rangeSizeProduct">Range</label>
							</div>
							<div class="form-radio multipleDivSize">
								<input type="radio" value="multiple" class="form-radio-input  sizeTypeEmotional" id="multipleSizeProduct" name="product_type_size" >
								<label class="form-check-label " for="multipleSizeProduct">Multiple</label>
							</div>
							
							
						</div>
						<div class="form-group col-md-8">
							<div class="form-group  uniqueInputSizeEmotional">
								<label for="uniqueInputSizeEmotional ">Taille Unique du produit :</label>
								<input type="number" class="form-control" name="uniqueSizeEmotional" id="uniqueInputSizeEmotional" >
							</div>
							<div class="form-group col-md-12 RangeSizeEmotional">
							<label>Range:</label>
								<div class="col-md-12"style="display:inline-flex;">
									<div class="form-group col-md-6">
										<label for="RangeSizeEmotional">Min</label>
										<input type="number" class="form-control" name="rangeMinSizeEmotional" id="RangeMinSizeEmotional">
									</div>
									<div class="form-group col-md-6">
										<label for="RangeSizeEmotional">Max</label>
										<input type="number" class="form-control" name="rangeMaxSizeEmotional" id="RangeMaxSizeEmotional">
									</div>
								</div>
							</div>
							
							<div class="multipleSizeEmotional">
								<div class="form-group col-md-12 ">
									<label>Taille :</label>
									<div class="col-md-12"style="display:inline-flex;">
										<div class=" col-md-6" >
											<label for="multipleSizeEmotional">Min</label>
											<input type="number" class="form-control" name="minSizeEmotional" id="multipleMinSizeEmotional" >
										</div>
										<div class=" col-md-6">
											<label for="multipleSizeEmotional">Max</label>
											<input type="number" class="form-control" name="maxSizeEmotional" id="multipleMaxSizeEmotional" >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h6>GRAVURE</h6>
					<hr>
					<div class="form-row  ">
						<div class="form-group col-md-3">
							<label>Gravure</label> :<br>
							<div class="form-radio">
								<input type="radio" value=1 class="form-radio-input" id="yesForEngravingProduct" name="product_engraving_bool" required>
								<label class="form-check-label" for="yesForEngravingProduct">Oui</label>
							</div>
							<div class="form-radio ">
								<input type="radio" value=0 class="form-radio-input" id="noForEngravingProduct" name="product_engraving_bool">
								<label class="form-check-label" for="nonForEngravingProduct">Non</label>
							</div>
						</div>
						<div class="engraving form-group col-md-9">
						</div>
					</div>
					<hr>
					<div class="form-row">
						<div class="form-group col-md-7 ">
							<label for="productUrlEmotional">Ajouter une photo :</label>
							<input type="url" class="form-control  " id="productUrlEmotional" name='product_picture_url' placeholder="URL" >
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--##############################################################################-->
<!-------------------------------MODAL emotional Police----------------------------->
<!--##############################################################################-->
<div class="modal fade" id="modalAddEmotionalFont" tabindex="-1" role="dialog" aria-labelledby="modalAddEmotionalFontLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
    		<div class="modal-header">
        		<h5 class="modal-title" id="modalAddEmotionalFontLabel">Ajouter une Police</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
			<form enctype="multipart/form-data" id="addEmotionalFont">
				<div class="modal-body">
					<div class="form-group col-md-6">
						<label for ="fontEmotional">Ajouter une police :<br></label>
						<input  type="text" name="fontEmotional"  id="fontEmotional" class="form-control" required >
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary "  data-dismiss="modal">Annuler</button>
					<button type="submit" class="btn btn-primary">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="src/js/emotionalApp.js"></script>










