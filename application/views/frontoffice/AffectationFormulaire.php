<style>
    .error {
        margin-left:2%;
        border: 2px solid darkred;
        background-color: #ffcccc; 
        color: black;
        padding: 10px; 
        border-radius: 5px;
        width: fit-content; 
    }
</style> 

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Choix des coureurs pour une étape:</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Liste des coureurs</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        // Afficher l'exception s'il y en a une
                        if ($this->session->flashdata('exception')) {
                            echo '<div class="error">' . $this->session->flashdata('exception') . '</div>';
                        }
                        ?>

                        <?php echo form_open_multipart('ListeEtapeEquipeController/affecter'); ?>
                            <div class="card-body">
                                <?php
                                // Restaurer les valeurs sélectionnées
                                $selected_coureurs = $this->session->flashdata('selected_coureurs');
                                ?>
                                <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                                <input type="hidden" name="idetape" value="<?php echo $idetape ?>">
                                <input type="hidden" name="nombredanslacourse" value="<?php echo $nombredanslacourse ?>">
                                <div>
                                    <div class="row">
                                        <label for="coureur">Coureur:</label>
                                        <?php for($i = 0 ; $i < count($coureur) ; $i++) { ?>
                                            <div class="col-md-12">
                                                <input type="checkbox" value="<?php echo $coureur[$i]->idcoureur ?>" name="coureur[]" <?php if(validation_errors() || (is_array($selected_coureurs) && in_array($coureur[$i]->idcoureur, $selected_coureurs))) echo 'checked'; ?>>
                                                <?php echo $coureur[$i]->nomcoureur ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="submit" value="Submit">
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- Détruire les sessions une fois qu'elles ont été utilisées -->
                        <?php
                            $this->session->unset_userdata('exception');
                            $this->session->unset_userdata('selected_coureurs');
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
