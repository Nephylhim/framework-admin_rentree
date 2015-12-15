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
        <div class="col-md-5">

            <section class="promotionListPanel">
                <h1>Liste des promotions</h1>

                <div class="row">
                    <div class="col-md-12 center">
                        <button id="newPromoModalBtn" title="Ajouter une promotion" class="btn btn-primary" style="display: inline-block;" onclick="showNewPromoModal(this)">
                            Ajouter
                        </button>
                    </div>
                    <!--<div class="col-md-4">
                        <button id="modifPromoModalBtn" title="Modifier une promotion" class="btn btn-primary" style="display: inline-block;" onclick="showModifPromoModal(this)">
                            Modifier
                        </button>
                    </div>-->
                    <!--<div class="col-md-6 center">
                        <button id="newPromoBtn" title="Supprimer une promotion" class="btn btn-danger" style="display: inline-block;" onclick="showDelPromoModal(this)">
                            Supprimer
                        </button>
                    </div>-->
                </div>

                <div id="promotionList">

                </div>

            </section>

        </div>

        <div class="col-md-7">
            <section class="promotionListPanel">
                <h1>Liste des promotions</h1>

                <div class="newPromo row">
                    <div class="col-md-6">
                        <input id="promotionName" class="form-control" placeholder="Nouvelle promotion">
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                        <button id="bouton_AjouterPromo" title="Ajouter une promotion" class="btn generation_element_to_change btn-success" style="display: inline-block;">
                            Valider
                        </button>
                    </div>
                </div>

                <div id="test">

                </div>

            </section>
        </div>

    </div>
</div>


        <!-- Modal Modif promo-->
                    <div class="modal fade" id="modifPromoModal" role="dialog" >
                      <div class="modal-dialog">

                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modification de promotion</h4>
                          </div>
                          <div class="modal-body">
                              <p>Vous pouvez modifier le nom de la promotion</p>
                              <div class="row">
                                  <div class=" col-md-5 "><input  id="promotionNameInput" class="form-control"></div>
                                  <div class=" col-md-6 col-md-offset-1">
                                      <input  id="promotionLabelInput" class="form-control">
                                  </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col-md-2 col-md-offset-5">
                                      <button class="btn btn-danger" data-dismiss="modal" onclick="showDelPromoModal(this)">Supprimer</button>
                                  </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                          <button id="editPromo" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Sauvegarder</button>
                          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

                          </div>
                        </div>

                      </div>
                    </div>

        <!-- Modal Suppr promo-->
                    <div class="modal fade" id="delPromoModal" role="dialog" >
                      <div class="modal-dialog">

                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Suppression de promotion</h4>
                          </div>
                          <div class="modal-body">
                              <p>Êtes-vous sur de vouloir supprimer la promotion <span id="disPromoLabel"></span> ?</p>
                          </div>
                          <div class="modal-footer">
                          <button id="editPromo" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Supprimer</button>
                          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

                          </div>
                        </div>

                      </div>
                    </div>

        <!-- Modal add promo-->
                    <div class="modal fade" id="newPromoModal" role="dialog" >
                      <div class="modal-dialog">

                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ajouter une promotion</h4>
                          </div>
                          <div class="modal-body">
                              <div class="newPromo row">
                                <div class="col-md-6">
                                    <input id="newPromoName" class="form-control" placeholder="Nouvelle promotion : nom"/>
                                </div>
                                <div class="col-md-6">
                                    <input id="newPromoLbl" class="form-control" placeholder="Nouvelle promotion : label"/>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                          <button id="newPromoBtn" title="Ajouter une promotion" class="btn btn-success" style="display: inline-block;" onclick="newPromo()" data-dismiss="modal" aria-hidden="true">Valider</button>
                          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

                          </div>
                        </div>

                      </div>
                    </div>


<?php end_content_for();?>

<?php content_for('script'); ?>

<script>

    $(document).ready(function(){
        refresh_promo();

        for(var i=0; i<50; i++){
            console.log("Keine Problem !!!");
            console.log("");
        }
    });

    function refresh_promo(){
        $.ajax({
            url: "<?=url_for('/promos/get'); ?>",
            method: "GET",
            dataType: "json"
        }).success( function(content){
            content=parseList(content);
            $("#promotionList").html(content);
            $("#promotionList").children("ul").children("li").children(".listBtn").hide();
        });
    }

    function parseList(content){
        listParsed = '<ul><li id="tous">Commun à toutes les promos</li>';

        for(i=0; i<content.promos.length; i++){
            listParsed += '<li id="'+content.promos[i].promo+'" onclick="activePromo(this)" >'+content.promos[i].label+'<div class="row listBtn" aria-hidden="true">'
                +'<div class="col-md-6 right"><button id="modifPromoModalBtn" title="Modifier une promotion" class="btn btn-primary" onclick="showModifPromoModal(this)">Modifier</button></div>'
                +'<div class="col-md-6 left"><button id="delPromoModalBtn" title="Supprimer une promotion" class="btn btn-danger" onclick="showDelPromoModal(this)">Supprimer</button></div>'
                +'</div></li>';
        }
        listParsed += "</ul>";
        return listParsed;
    }

    function activePromo(eventSrc){
        var promoId = $("#promotionNameInput").val();
        if(promoId != ""){
            $("#"+promoId).children(".listBtn").hide();
        }

        promoId = eventSrc.id;
        var promoLabel = $("#"+promoId).html();
        $("#promotionNameInput").val(promoId);
        $("#promotionLabelInput").val(promoLabel);

        //$("#"+promoId).children(".listBtn").attr("aria-hidden", "false");
        $("#"+promoId).children(".listBtn").show();
    }

    function showNewPromoModal(eventSrc){
        $("#newPromoModal").modal({backdrop: true});
    }

    function showModifPromoModal(eventSrc){
        $("#modifPromoModal").modal({backdrop: true});
    }

    function showDelPromoModal(eventSrc){
        promoLabel = $("#promotionLabelInput").val();
        $("#disPromoLabel").html( promoLabel );
        $("#delPromoModal").modal({backdrop: true});
    }

    function newPromo(){
        var name = $("#newPromoName").val();
        var label = $("#newPromoLbl").val();
        var urlStr = '/promos/add/'+name+'/'+label;
        $.ajax({
            url: "<?=url_for('/promos/add'); ?>/"+name+"/"+label,
            method: "POST",
        }).success( refresh_promo() );
    }
</script>

<?php end_content_for();?>
