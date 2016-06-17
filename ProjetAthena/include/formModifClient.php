<!--Modal de modification du client de la page administrateur-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier Client</h4>
            </div>
            <div class="modal-body">
                <form class="form-inscription" action="../php/modifClient.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Nom"-->
                                <input type="text" class="form-control input-input" placeholder="Nom" name="titre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Prénom"-->
                                <input type="text" class="form-control input-input" placeholder="Prenom" name="prix">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!--Champ "E-mail"-->
                                <input type="text" class="form-control input-input" placeholder="E-mail" name="mail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Mot de Passe"-->
                                <input type="text" class="form-control input-input" placeholder="Mot de Passe" name="mp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Confirùation Mot de Passe"-->
                                <input type="text" class="form-control input-input" placeholder="Confirmation Mot de Passe" name="confirmMP">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!--Champ "Adresse"-->
                                <input type="text" class="form-control input-input" placeholder="Adresse" name="adresse">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Ville"-->
                                <input type="text" class="form-control input-input" placeholder="ville" name="ville">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Code Postal"-->
                                <input type="text" class="form-control input-input" placeholder="Code Postal" name="code postal">
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