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
        <div class="col-md-6">

            <section class="promotionListPanel">
                <h1>Liste des promotions</h1>

                <div class="newPromo">
                    <div class="col-md-6">
                        <input id="promotionName" class="form-control" placeholder="Nouvelle promotion">
                    </div>
                    <div class="col-md-3">
                        <select id="ANumber" class="form-control">
                            <option>_A1 </option>
                            <option>_A2 </option>
                            <option>_A3 </option>
                            <option>_A4 </option>
                            <option>_A5 </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button id="bouton_AjouterPromo" title="Ajouter une promotion" class="btn generation_element_to_change btn-success" style="display: inline-block;">
                            Valider
                        </button>
                    </div>
                </div>

                <div id="promotionList">

                </div>

                Test
                test
                test
            </section>

        </div>
    </div>
</div>



<?php end_content_for();?>

<?php content_for('script'); ?>

<script>
    /*$.ajax({
        method: "GET",
        url: "?/promos/get";
    }).done( function( content ){
        $("#promotionList").html("Coucou !!!");
    });*/

    $(document).ready(function(){
        console.log( "Appel Ajax" );

        $.ajax({
            url: "<?=url_for('/promos/get'); ?>",
            method: "GET",
            dataType: "json"
        }).success( function(content){
            console.log(content);
            $("#promotionList").html(content);
        });
    });
</script>

<?php end_content_for();?>
