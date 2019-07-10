<?php
	ob_start();
	

?>




<nav id="onglets" class="navbar navbar-expand-lg navbar-light bg-light">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
<a id='titleMenu' class="navbar-brand" href="home.php"><img id="logoFirstseller" src="src/images/logo-firstseller.jpg"></a>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav" >
			<li class="nav-item dropdown">
				<button  class="nav-link dropdown-toggle buttonDropDown"   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produit </button >
				<div class="dropdown-menu" aria-labelledby="navbarDropdown" id="listMenuProduct">
					<a id="whyNoteProductPage"class="dropdown-item" href="productPageWhyNote.php">Produit Whynote</a>
					<a  id="emotionalProductPage"class="dropdown-item" href="productPageEmotional.php">Produit Emotional</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<button  class="nav-link dropdown-toggle buttonDropDown"   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Commande </button >
				<div class="dropdown-menu" aria-labelledby="navbarDropdown" id="listMenuOrder">
					<a id="whyNoteOrderPage"class="dropdown-item" href="orderPageWhyNote.php">Commande Whynote</a>
					<a  id="emotionalOrderPage"class="dropdown-item" href="orderPageEmotional.php">Commande Emotional</a>
				</div>
			</li>	
			
			<li claas="nav-item dropdown">
				<button class="nav-link  dropdown-toggle buttonDropDown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Historique </button>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown" id="listMenuHistoric">
					<a id="whyNoteHistoricPage" class="dropdown-item" href="historicPageWhyNote.php"> Historique Whynote</a>
					<a id="emotionalHistoricPage" class="dropdown-item" href="historicPageEmotional.php"> Historique Emotional</a>
				</div>
			</li>
		</div>
	</div>
	<form method="post">
		<button class="btn btn-link btnHomePage" type="submit" name="disconnect" value="disconnect" data-toggle="tooltip" data-placement="bottom" title="Disconnect">
			<i class="fas fa-power-off"></i> 
		</button>
	</form>
</nav> 

<div id="contentAjax"></div>
<?php
	$content = ob_get_clean();
	require_once 'template.php';
?>



