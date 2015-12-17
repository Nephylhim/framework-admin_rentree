<?php content_for('body'); ?>

<div class="header">
    <div class="row">
        <div class="col-md-4">
            <img src="ressources/images/logo_ISEN.png" />
        </div>
        <div class="col-md-4">
            <h1 class="center blisen">Panneau d'administration</h1>
        </div>
    </div>
</div>

<div class="body">
    <nav>
        <a href="?">Accueil</a>
        <a href="?/admin_files"> Administration Fichiers / Promos </a>
        <a href="?/admin_datas"> Administration Datas </a>
    </nav>
    <div class="row">
        <div class="col-md-12">

            <section class="datasListPanel listPanel">
                <h1>Liste des donnnées élèves</h1>
				<div class="col-md-12 center">
                    <button id="exportDatasBtn" title="Exporter au format csv" class="btn btn-primary" style="display: inline-block;" onclick="downloadDataCsv()">
						Exporter au format csv
                    </button>
					<button id="deleteDatasBtn" title="Supprimer toute les données" class="btn btn-danger" style="display: inline-block;" onclick="showDelAllDatasDialog()">
						Supprimer toute les données
                    </button>
                </div>

				<table>
					<tr>
						<th>Id</th><th>Identifiant</th><th>Nom</th>
						<th>Prénom</th><th>Date de naissance</th><th>Tel_mobile</th>
						<th>Courriel parents</th><th>Date</th><th>Ip</th>
						<th>Actions</th>
					</tr>
				</table>

                <div id="datasList" class="limitedHeight">

                </div>

            </section>

        </div>
    </div>
</div>


	<!-- Modal Suppr all datas-->
	<div class="modal fade" id="delAllDatasModal" role="dialog" >
		<div class="modal-dialog">

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Suppression de toutes les données élèves</h4>
				</div>
				<div class="modal-body">
					<p>Êtes-vous sur de vouloir supprimer toutes les données élèves ?</p>
				</div>
				<div class="modal-footer">
					<button id="delFileBtn" class="btn btn-success" data-dismiss="modal" aria-hidden="true" onclick="delAllDatas()">Supprimer toutes les données élèves</button>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

				</div>
			</div>

		</div>
	</div>

	<!-- Modal Suppr a data-->
	<div class="modal fade" id="delDataModal" role="dialog" >
		<div class="modal-dialog">

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Suppression d'une donnée élève</h4>
				</div>
				<div class="modal-body">
					<p>Êtes-vous sur de vouloir supprimer données élèves de l'elév identifié par <span id="delDataLabel"></span> (id n°<span id="idDataLabel"></span>) ?</p>
				</div>
				<div class="modal-footer">
					<button id="delFileBtn" class="btn btn-success" data-dismiss="modal" aria-hidden="true" onclick="delData()">Supprimer l'élève</button>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

				</div>
			</div>

		</div>
	</div>

	<!-- Modal Modif data-->
	<div class="modal fade" id="updDataModal" role="dialog" >
		<div class="modal-dialog">

			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">Modification de données élève</h4>
				</div>
				<div class="modal-body">
					<p>Vous pouvez modifier les éléments suivants</p>
					<div class="row">
						<div class="col-md-5">
							<label for="idDataInput">Id:</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="idDataInput" class="form-control" disabled>
						</div>

						<div class="col-md-5">
							<label for="identifiantDataInput">Identifiant :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="identifiantDataInput" class="form-control">
						</div>

						<div class="col-md-5">
							<label for="nom_filsDataInput">Nom :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="nom_filsDataInput" class="form-control">
						</div>

						<div class="col-md-5">
							<label for="prenom_filsDataInput">Prénom :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="prenom_filsDataInput" class="form-control">
						</div>

						<div class="col-md-5">
							<label for="ddn_filsDataInput">Date de naissance (jj-mm-aa) :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="ddn_filsDataInput" class="form-control">
						</div>

						<div class="col-md-5">
							<label for="tel_mobileDataInput">Tel_mobile :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="tel_mobileDataInput" class="form-control">
						</div>

						<div class="col-md-5">
							<label for="courrielDataInput">Courriel parents :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="courrielDataInput" class="form-control">
						</div>

						<div class="col-md-5">
							<label for="dateDataInput">Date :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="dateDataInput" class="form-control" disabled>
						</div>

						<div class="col-md-5">
							<label for="ipDataInput">Ip :</label>
						</div>
						<div class=" col-md-6 col-md-offset-1">
							<input  id="ipDataInput" class="form-control" disabled>
						</div>
					</div>
					<br>
				</div>
				<div class="modal-footer">
					<button id="editFile" class="btn btn-success" data-dismiss="modal" aria-hidden="true" onclick="modifFile(this)">Sauvegarder</button>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

				</div>
			</div>

		</div>
	</div>

<?php end_content_for();?>


<?php content_for('script'); ?>
	<script>

		$(document).ready(function(){
			refreshDatas();
		});

		/*------------------------------------------------------------------ Data -----------------------------------------------------------------------*/

		function refreshDatas(){
			$.ajax({
				url: "<?=url_for('/datas/get/all'); ?>",
				method: "GET",
				dataType: "json"
			}).success( function(content){
				content=parseDatasList(content);
				$("#datasList").html(content);
			});
		}

		function parseDatasList(content){
			listParsed = '<table>';

			for(i=0; i<content.datas.length; i++){
				listParsed +=
				'<tr>' +
					'<td>'+ content.datas[i].id +'</td>' +
					'<td>'+ content.datas[i].identifiant +'</td>' +
					'<td>'+ content.datas[i].nom_fils +'</td>' +
					'<td>'+ content.datas[i].prenom_fils +'</td>' +
					'<td>'+ content.datas[i].ddn_fils +'</td>' +
					'<td>'+ content.datas[i].tel_mobile +'</td>' +
					'<td>'+ content.datas[i].courriel +'</td>' +
					'<td>'+ content.datas[i].date +'</td>' +
					'<td>'+ content.datas[i].ip +'</td>' +
					'<td>' +
						'<button id="updDatasBtn" title="Modifier" class="btn btn-primary" style="display: inline-block;" onclick="showUpdDataDialog(this)">' +
							'Modifier' +
						'</button>' +
						'<button id="exportDatasBtn" title="Supprimer" class="btn btn-danger" style="display: inline-block;" onclick="showDelDataDialog(this)">' +
							'Supprimer' +
						'</button>' +
					'</td>' +
				'</tr>'
			}
			listParsed += "</table>";
			return listParsed;
		}

		function downloadDataCsv(){
			window.location.href = "<?=url_for('/datas/xtr')?>";
		}

		function showDelAllDatasDialog(){
			$("#delAllDatasModal").modal({backdrop: true});
		}

		function delAllDatas(){
			$.ajax({
				url: "<?=url_for('/datas/del/all'); ?>",
				method: "POST"
			}).success( refreshDatas() );
		}

		function showDelDataDialog(src){
			eleve = $(src).parent().parent().children().eq(1).html();
			id = $(src).parent().parent().children().eq(0).html();
			$("#delDataLabel").html(eleve);
			$("#idDataLabel").html(id);
			$("#idDataLabel").html(id);
			$("#delDataModal").modal({backdrop: true});
		}

		function delData(){
			$id = $("#idDataLabel").html(id);
			$.ajax({
				url: "<?=url_for('/datas/del'); ?>/"+id,
				method: "POST"
			}).success( refreshDatas() );
		}

		function showUpdDataDialog(src){
            var eleve = $(src).parent().parent().children().eq(1).html();
			var id = $(src).parent().parent().children().eq(0).html();
            var nomFils = $(src).parent().parent().children().eq(2).html();
            var prenomFils = $(src).parent().parent().children().eq(3).html();
            var ddnFils = $(src).parent().parent().children().eq(4).html();
            var tel = $(src).parent().parent().children().eq(5).html();
            var couriel = $(src).parent().parent().children().eq(6).html();
            var date = $(src).parent().parent().children().eq(7).html();
            var ip = $(src).parent().parent().children().eq(8).html();

            console.log(id);

			$("#identifiantDataInput").val(eleve);
			$("#idDataInput").val(id);
            $("#nom_filsDataInput").val(nomFils);
            $("#prenom_filsDataInput").val(prenomFils);
            $("#ddn_filsDataInput").val(ddnFils);
            $("#tel_mobileDataInput").val(tel);
            $("#courrielDataInput").val(couriel);
            $("#dateDataInput").val(date);
            $("#ipDataInput").val(ip);

			$("#updDataModal").modal({backdrop: true});
		}

		function modifFile(eventSrc){
            var eleve = $("#identifiantDataInput").val();
			var id = $("#idDataInput").val();
            var nomFils = $("#nom_filsDataInput").val();
            var prenomFils = $("#prenom_filsDataInput").val();
            var ddnFils = $("#ddn_filsDataInput").val();
            var tel = $("#tel_mobileDataInput").val();
            var couriel = $("#courrielDataInput").val();
            var date = $("#dateDataInput").val();
            var ip = $("#ipDataInput").val();

            console.log(id+" | "+eleve+" | "+nomFils+" | "+prenomFils);

            $.ajax({
                url: "<?=url_for('/datas/upd'); ?>/"+id+"/"+eleve+"/"+nomFils+"/"+prenomFils+"/"+ddnFils+"/"+tel+"/"+couriel,
                method: "POST",
            }).success(function(){
                refreshDatas();
            });
		}

	</script>

<?php end_content_for();?>
