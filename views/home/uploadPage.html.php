<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<!--<link rel='stylesheet' href='css/bootstrap.min.css'>-->
		<script src='js/jquery-2.1.4.min.js'></script>
		<link href="css/main.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<form id="newFileForm" method="post" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-5">
						<label class="control-label">Sélectionnez le fichier :</label>
					</div>
					<div class="col-md-5 col-md-offset-1">
						<input id="input-1" type="file" name="document" required>
					</div>

					<div class="col-md-5">
						<label class="control-label">Libéllé :</label>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<input  id="newFileLibelleInput" class="form-control" required>
					</div>

					<div class="col-md-5">
						<label class="control-label">Promo liée :</label>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<input  id="newFilePromoInput" class="form-control" required>
					</div>

					<div class="col-md-5">
						<label class="control-label">Rang :</label>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<input  id="newFileRankInput" class="form-control" type="number" required>
					</div>
				</div>
			<button id="newFileBtn" title="Ajouter un fichier" class="btn btn-success" style="display: inline-block;" data-dismiss="modal" aria-hidden="true" type="submit">Valider</button>
		</form>
		<script>
			$(function(){
				$('#newFileForm').submit(function(event){
					var action = '';
					action = "<?=url_for('/files/add')?>" + "/" + $("#newFilePromoInput").val() + "/" + $("#newFileRankInput").val() + "/" + $("#newFileLibelleInput").val() + "/"
					console.log(action);
					//event.preventDefault();
					$(this).attr('action', action);
				})});
		</script>
	</body>
</html>