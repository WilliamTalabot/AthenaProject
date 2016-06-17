<!--Modal de modification du produit de la page administrateur-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modifier Produits</h4>
            </div>
            <div class="modal-body">
                <form class="form-inscription" action="php/modifProduit.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Titre"-->
                                <input type="text" class="form-control input-input" placeholder="Titre" name="titre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!--Champ "Prix"-->
                                <input type="text" class="form-control input-input" placeholder="Prix" name="prix">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!--Champ "Description"-->
                                <textarea class="form-control" rows="3" placeholder="Description" name="desc_annonce"></textarea>
                            </div>
                        </div>
                    </div>
                    <!--Bouton Modifier-->
                    <input type="submit" class="btn btn-lg btn-primary btn-block btn-envoie" value="Modifier" name="envoieModifProduit">
                    <!--Bouton Effacer-->
                    <input type="reset" class="btn btn-lg btn-primary btn-block btn-envoie" value="Effacer" name="reset">
                </form>
            </div>        
        </div>
    </div>
</div>