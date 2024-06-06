<style>
    .error {
        margin-left: 2%;
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
                <h6>Temps/Coureur</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Temps d'arrivé de chaque coureur:</h5>
                    </div>
                    <!-- Afficher les erreurs de validation -->
                    <?php echo validation_errors('<div class="error">', '</div>'); ?>
                    <!-- Afficher les exceptions si elles existent -->
                    <?php if ($this->session->flashdata('exception')) { ?>
                        <div class="error"><?php echo $this->session->flashdata('exception'); ?></div>
                    <?php } ?>
                    <?php echo form_open_multipart('ListeEtapeAdminController/validerFormulaire'); ?>
                    <div class="card-body">
                        <input type="hidden" name="idetape" value="<?php echo $idetape ?>">
                        <input type="hidden" name="datedepart" value="<?php echo $datedepart ?>">
                        <?php 
                           $datepardefaut = explode(" ", $datedepart)[0];
                        ?>
                        <?php foreach ($coureurs as $index => $coureur) { ?>
                            <div class="row mb-3">
                                <input type="hidden" name="idcoureur[]" value="<?php echo $coureur->idcoureur ?>">
                                <div class="col">
                                    <p><label><?php echo $coureur->nomequipe ?> : </label></p>
                                    <p><label><?php echo $coureur->nomcoureur ?> , Numéro : <?php echo $coureur->numerodossard ?></label></p>
                                </div>
                                <div class="col">
                                    <label for="date_<?php echo $index; ?>">Date d'arrivé:</label>
                                    <input type="date" class="form-control" name="date[<?php echo $index; ?>]" id="date_<?php echo $index; ?>" step="1" value="<?php echo set_value('date[' . $index . ']', $this->session->flashdata('date')[$index] ?? $datepardefaut); ?>">
                                </div>
                                <div class="col">
                                    <label for="temps_<?php echo $index; ?>">Heure d'arrivé:</label>
                                    <input type="time" class="form-control" name="temps[<?php echo $index; ?>]" id="temps_<?php echo $index; ?>" step="1" value="<?php echo set_value('temps[' . $index . ']', $this->session->flashdata('temps')[$index] ?? ''); ?>">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="submit" value="Submit">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <?php 
                    $this->session->unset_userdata('exception');
                    $this->session->unset_userdata('idetape');
                    $this->session->unset_userdata('datedepart');
                    $this->session->unset_userdata('date');
                    $this->session->unset_userdata('temps');
                    $this->session->unset_userdata('coureurs');
                ?>
            </div>
        </div>
    </div>
</div>
