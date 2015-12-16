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
                    <button id="exportDatasBtn" title="Exporter au format csv" class="btn btn-primary" style="display: inline-block;" onclick="">
						Exporter au format csv
                    </button>
					<button id="deleteDatasBtn" title="Supprimer toute les données" class="btn btn-danger" style="display: inline-block;" onclick="">
						Supprimer toute les données
                    </button>
                </div>

				<table>
					<tr>
						<th>Id</th><th>Identifiant</th><th>Nom_fils</th>
						<th>Prenom_fils</th><th>Ddn_fils</th><th>Tel_mobile</th>
						<th>Courriel</th><th>Date</th><th>Ip</th>
						<th>Actions</th>
					</tr>
				</table>

                <div id="datasList" class="limitedHeight">

                </div>

            </section>

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
						'<button id="updDatasBtn" title="Modifier" class="btn btn-primary" style="display: inline-block;" onclick="">' +
							'Modifier' +
						'</button>' +
						'<button id="exportDatasBtn" title="Supprimer" class="btn btn-danger" style="display: inline-block;" onclick="">' +
							'Supprimer' +
						'</button>' +
					'</td>' +
				'</tr>'
			}
			listParsed += "</table>";
			return listParsed;
		}

	</script>

<?php end_content_for();?>