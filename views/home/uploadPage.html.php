<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<script src='js/jquery-2.1.4.min.js'></script>
		<link href="css/main.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form id="newFileForm" method="post" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-5">
						<label class="control-label">Sélectionnez le fichier :</label>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<input id="input-1" type="file" name="document" required>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						<label class="control-label">Libéllé :</label>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<input  id="newFileLibelleInput" class="form-control" required>
					</div>

					<div class="col-md-5">
                         <label for="promo">Promotion liée :</label>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <select id="listPromoSelect" class="form-control">

                        </select>
                    </div>

					<div class="col-md-5">
						<label class="control-label">Rang :</label>
					</div>
					<div class="col-md-6 col-md-offset-1">
						<input  id="newFileRankInput" class="form-control" type="number" required>
					</div>
				</div>
				<div class="center">
					<button id="newFileBtn" title="Ajouter un fichier" class="btn btn-primary" style="display: inline" data-dismiss="modal" aria-hidden="true" type="submit">
						Envoyer le fichier
					</button>
				</div>
			</form>
		</div>
	</div>

		<script>
            $(document).ready(function(){
                refreshPromoSelect();
            });

			$(function(){
				$('#newFileForm').submit(function(event){
					var action = '';
					action = "<?=url_for('/files/add')?>" + "/" + $("#listPromoSelect").val() + "/" + $("#newFileRankInput").val() + "/" + $("#newFileLibelleInput").val() + "/"
					console.log(action);
					//event.preventDefault();
					$(this).attr('action', action);
				})
            });

            function refreshPromoSelect(){
                $.ajax({
                    url: "<?=url_for('/promos/get'); ?>",
                    method: "GET",
                    dataType: "json"
                }).success( function(content){
                    content=parsePromoSelect(content);
                    $("#listPromoSelect").html(content);
                });
            }

            function parsePromoSelect(content){
                listParsed = '<option value="tous">Commun à toutes les promos</option>';

                for(i=0; i<content.promos.length; i++){
                    listParsed += '<option value="'+content.promos[i].promo+'">'+content.promos[i].label+'</option>';
                }
                return listParsed;
            }
		</script>
	</body>
</html>
