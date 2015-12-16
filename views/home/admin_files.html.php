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

            <section class="promotionListPanel listPanel">
                <h1>Liste des promotions</h1>

                <div class="row">
                    <div class="col-md-12 center">
                        <button id="newPromoModalBtn" title="Ajouter une promotion" class="btn btn-primary" style="display: inline-block;" onclick="showNewPromoModal(this)">
                            Ajouter
                        </button>
                    </div>
                </div>

                <div id="promotionList" class="limitedHeight">

                </div>

            </section>

        </div>

        <div class="col-md-7">
            <section class="fileListPanel listPanel">
                <h1>Liste des fichiers</h1>

                <div class="row">
                    <div class="col-md-12 center">
                        <button id="newFileModalBtn" title="Ajouter un fichier" class="btn btn-primary" style="display: inline-block;" onclick="showNewFileModal(this)">
                            Ajouter
                        </button>
                    </div>
                </div>

                <div id="fileList" class="limitedHeight">

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
                                  <div class=" col-md-5 ">
                                      <input  id="promotionNameInput" class="form-control" disabled>
                                  </div>
                                  <div class=" col-md-6 col-md-offset-1">
                                      <input  id="promotionLabelInput" class="form-control">
                                  </div>
                              </div>
                              <br>
                          </div>
                          <div class="modal-footer">
                          <button id="editPromo" class="btn btn-success" data-dismiss="modal" aria-hidden="true" onclick="modifPromo(this)">Sauvegarder</button>
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
                          <button id="delPromoBtn" class="btn btn-success" data-dismiss="modal" aria-hidden="true" onclick="delPromo(this)">Supprimer</button>
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

        <!-- Modal Modif file-->
                    <div class="modal fade" id="modifFileModal" role="dialog" >
                      <div class="modal-dialog">

                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modification de Fichier</h4>
                          </div>
                          <div class="modal-body">
                              <p>Vous pouvez modifier les éléments du fichier</p>
                              <div class="row">
                                <input  id="fileIdInput" class="form-control hidden" disabled>

                                <div class="col-md-5">
                                     <label for="libelle">Libéllé :</label>
                                </div>
                                <div class=" col-md-6 col-md-offset-1">
                                    <input  id="fileLibelleInput" class="form-control">
                                </div>

                                <div class="col-md-5">
                                     <label for="promo">Promotion liée :</label>
                                </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <input  id="filePromoInput" class="form-control">
                                </div>

                                <div class="col-md-5">
                                     <label for="rank">Rang :</label>
                                </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <input  id="fileRankInput" class="form-control">
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

        <!-- Modal Suppr file-->
                    <div class="modal fade" id="delFileModal" role="dialog" >
                      <div class="modal-dialog">

                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Suppression de Fichier</h4>
                          </div>
                          <div class="modal-body">
                              <p>Êtes-vous sur de vouloir supprimer le fichier <span id="disFileLabel"></span> ?</p>
                          </div>
                          <div class="modal-footer">
                          <button id="delFileBtn" class="btn btn-success" data-dismiss="modal" aria-hidden="true" onclick="delFile(this)">Supprimer</button>
                          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

                          </div>
                        </div>

                      </div>
                    </div>

        <!-- Modal add file-->
                    <div class="modal fade" id="newFileModal" role="dialog" >
                      <div class="modal-dialog">

                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ajouter un Fichier</h4>
                          </div>
                          <form id="newFileForm" method="post" action="rien.php">
                              <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="control-label">Sélectionnez le fichier :</label>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1">
                                        <div class="btn btn-primary btn-file upload">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                            <span class="hidden-xs">Parcourir …</span>
                                            <input id="input-1" class="file" type="file" name="document">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <label class="control-label">Libéllé :</label>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1">
                                        <input  id="newFileLibelleInput" class="form-control">
                                    </div>

                                    <div class="col-md-5">
                                        <label class="control-label">Promo liée :</label>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1">
                                        <input  id="newFilePromoInput" class="form-control">
                                    </div>

                                    <div class="col-md-5">
                                        <label class="control-label">Rang :</label>
                                    </div>
                                    <div class="col-md-6 col-md-offset-1">
                                        <input  id="newFileRankInput" class="form-control">
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                              <button id="newFileBtn" title="Ajouter un fichier" class="btn btn-success" style="display: inline-block;" data-dismiss="modal" aria-hidden="true" type="submit">Valider</button>
                              <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

                              </div>
                          </form>
                        </div>

                      </div>
                    </div>

<?php end_content_for();?>

<?php content_for('script'); ?>

<script>

    $(document).ready(function(){
        refreshPromos();
        refreshFiles(-1);
    });

/*------------------------------------------------------------------ Promos -----------------------------------------------------------------------*/

    function refreshPromos(){
        $.ajax({
            url: "<?=url_for('/promos/get'); ?>",
            method: "GET",
            dataType: "json"
        }).success( function(content){
            content=parsePromoList(content);
            $("#promotionList").html(content);
            $("#promotionList").children("ul").children("li").children(".listBtn").hide();
        });
    }

    function parsePromoList(content){
        listParsed = '<ul><li id="tous" onclick="activePromoCommon(this)">Commun à toutes les promos</li>';

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
        var promoLabel = $("#"+promoId).clone().children().remove().end().text();
        $("#promotionNameInput").val(promoId);
        $("#promotionLabelInput").val(promoLabel);

        $("#"+promoId).children(".listBtn").show();
        refreshFiles(promoId);
    }

    function activePromoCommon(eventSrc){
        var promoId = $("#promotionNameInput").val();
        if(promoId != ""){
            $("#"+promoId).children(".listBtn").hide();
        }

        promoId = eventSrc.id;
        var promoLabel = $("#"+promoId).clone().children().remove().end().text();
        $("#promotionNameInput").val(promoId);
        $("#promotionLabelInput").val(promoLabel);

        refreshFiles(-1);
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
        var name = $("#newPromoName").val().replace(/\ /g, "_");;
        var label = $("#newPromoLbl").val();
        $.ajax({
            url: "<?=url_for('/promos/add'); ?>/"+name+"/"+label,
            method: "POST",
        }).success( refreshPromos() );
    }

    function delPromo(eventScr){
        var name = $("#promotionNameInput").val();
        $.ajax({
            url: "<?=url_for('/promos/del'); ?>/"+name,
            method: "POST",
        }).success( refreshPromos() );
    }

    function modifPromo(eventSrc){
        var name = $("#promotionNameInput").val();
        var label = $("#promotionLabelInput").val();
        $.ajax({
            url: "<?=url_for('/promos/upd'); ?>/"+name+"/"+label,
            method: "POST",
        }).success( refreshPromos() );
    }

/*------------------------------------------------------------------- Files -----------------------------------------------------------------------*/

    function refreshFiles(wyw){
        $.ajax({
            url: "<?=url_for('/files/get'); ?>/promo/"+wyw,
            method: "GET",
            dataType: "json"
        }).success( function(content){
            console.log(content);
            content=parseFileList(content);
            $("#fileList").html(content);
            $("#fileList").children("ul").children("li").children(".listBtn").hide();
        });
    }

    function parseFileList(content){
        listParsed = '<ul>';

        for(i=0; i<content.files.length; i++){
            listParsed += '<li id="'+content.files[i].id+'" onclick="activeFile(this)" >'+content.files[i].libelle+'<div class="row listBtn" aria-hidden="true">'
                +'<div class="col-md-6 right"><button id="modifFileModalBtn" title="Modifier un fichier" class="btn btn-primary" onclick="showModifFileModal(this)">Modifier</button></div>'
                +'<div class="col-md-6 left"><button id="delFileModalBtn" title="Supprimer un fichier" class="btn btn-danger" onclick="showDelFileModal(this)">Supprimer</button></div>'
                +'</div><div class="hidden"><div class="rank">'+content.files[i].rang+'</div><div class="promo">'+content.files[i].promo+'</div></div></li>';
        }
        listParsed += "</ul>";
        return listParsed;
    }

    function activeFile(eventSrc){
        var fileId = $("#fileIdInput").val();
        if(fileId != ""){
            $("#"+fileId).children(".listBtn").hide();
        }

        fileId = eventSrc.id;
        var fileLibelle = $("#"+fileId).clone().children().remove().end().text();
        var filePromo = $("#"+fileId).children(".hidden").children(".promo").html();
        var fileRank = $("#"+fileId).children(".hidden").children(".rank").html();

        $("#fileIdInput").val(fileId);
        $("#fileLibelleInput").val(fileLibelle);
        $("#filePromoInput").val(filePromo);
        $("#fileRankInput").val(fileRank);

        //$("#"+promoId).children(".listBtn").attr("aria-hidden", "false");
        $("#"+fileId).children(".listBtn").show();
    }

    function showNewFileModal(eventSrc){
        $("#newFileModal").modal({backdrop: true});
    }

    function showModifFileModal(eventSrc){
        $("#modifFileModal").modal({backdrop: true});
    }

    function showDelFileModal(eventSrc){
        fileLibelle = $("#fileLibelleInput").val();
        $("#disFileLabel").html( fileLibelle );
        $("#delFileModal").modal({backdrop: true});
    }

    function delFile(eventScr){
        var id = $("#fileIdInput").val();
        $.ajax({
            url: "<?=url_for('/files/del'); ?>/"+id,
            method: "POST",
        }).success(function(){
            var promoId = $("#promotionNameInput").val();
            refreshFiles(promoId);
        });
    }

    function newFile(eventSrc){
        var libelle = $("#newFileLibelleInput").val();
        var rang = $("#newFileRankInput").val();
        var promo = $("#newFilePromoInput").val();
        console.log(libelle);
        console.log(rang);
        console.log(promo);
        $.ajax({
            url: "<?=url_for('/files/add'); ?>/"+promo+"/"+rang+"/"+libelle,
            method: "POST",
            data: $form.serialize(),
            contentType: false, // obligatoire pour de l'upload
            processData: false, // obligatoire pour de l'upload
            data: data,
        }).success(function(content){
            console.log(content);
            var promoId = $("#promotionNameInput").val();
            refreshFiles(promoId);
        });
    }

    $(function () {
        $('#newFileForm').on('submit', function (e) {
            console.log("catch");

            // On empêche le navigateur de soumettre le formulaire
            //e.preventDefault();

            var $form = $(this);
            var formdata = (window.FormData) ? new FormData($form[0]) : null;
            var data = (formdata !== null) ? formdata : $form.serialize();

            var libelle = $("#newFileLibelleInput").val();
            var rang = $("#newFileRankInput").val();
            var promo = $("#newFilePromoInput").val();

            $.ajax({
                url: "<?=url_for('/files/add'); ?>/"+promo+"/"+rang+"/"+libelle,
                method: "POST",
                //data: $form.serialize(),
                //contentType: false, // obligatoire pour de l'upload
                //processData: false, // obligatoire pour de l'upload
                data: data,
            }).success(function(content){
                console.log(content);
                var promoId = $("#promotionNameInput").val();
                refreshFiles(promoId);
            }).error(function(err){
                console.log(err);
            });
        });
    });

</script>

<?php end_content_for();?>
