<!--Modal de modification du Type de la page administrateur-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier Type</h4>
            </div>
            <div class="modal-body">
                <form class="form-inscription" action="../php/modifType.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!--Champ "Titre"-->
                                <input type="text" class="form-control input-input" placeholder="Titre" name="nom">
                            </div>
                        </div>
                    </div>
                    <!--Bouton Modifier-->
                    <input type="submit" class="btn btn-lg btn-primary btn-block btn-envoie" value="Modifier" name="envoie">
                    <!--Bouton Effacer-->
                    <input type="reset" class="btn btn-lg btn-primary btn-block btn-envoie" value="Effacer" name="envoie">
                </form>
            </div>        
        </div>
    </div>
</div>