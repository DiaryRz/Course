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
            <h6>Choix du coureur</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Selectionne le coureur</h5>
                </div>

                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open_multipart('ListeEtapeAdminController/formulaireinsertiontemps'); ?>
                            <div class="card-body">

                            <input type="hidden" name="datedepart" value="<?php echo $datedepart ?>">
                            <input type="hidden" name="idetape" value="<?php echo $idetape ?>">
                            <input type="hidden" name="heureetape" value="<?php echo $heureetape ?>">

                                <div class="mb-3">
                                    <label for="file1">Coureur:</label>
                                    <select name="idcoureur" id="idcoureur" class="form-control">
                                        <?php foreach ($coureurs as $coureur) { ?>
                                            <option value="<?php echo $coureur->idcoureur ?>" >
                                                <?php echo $coureur->nomcoureur ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="submit" value="Submit">
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                
            </div>
        </div>
    </div>
</div>