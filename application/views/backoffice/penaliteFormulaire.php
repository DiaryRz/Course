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
            <h6>Formulaire d'insertion</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Formulaire</h5>
                </div>

                        <?php echo validation_errors('<div class="error">', '</div>'); ?>
                        <?php echo form_open_multipart('PenaliteController/Valider'); ?>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="idequipe">Equipe:</label>
                                    <select name="idequipe" id="selectoption" class="form-control">
                                        <?php foreach ($equipes as $equipe) { ?>
                                            <option value="<?php echo $equipe->idequipe ?>" <?php if(validation_errors()) : ?> <?php echo set_select('selectoption', $equipe->idequipe, ($this->session->userdata('current_client') == $equipe->idequipe)); ?> <?php endif; ?>>
                                                <?php echo $equipe->nomequipe ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="idetape">Etape:</label>
                                    <select name="idetape" id="selectoption" class="form-control">
                                        <?php foreach ($etapes as $etape) { ?>
                                            <option value="<?php echo $etape->idetape ?>" <?php if(validation_errors()) : ?> <?php echo set_select('selectoption', $etape->idetape, ($this->session->userdata('current_client') == $etape->idetape)); ?> <?php endif; ?>>
                                                <?php echo $etape->nometape ?> - <?php echo $etape->kilometre ?> km
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="name">Temps de pénalité:</label>
                                    <input type="time" class="form-control" name="temps" id="name" step="1" <?php if(validation_errors()) : ?> value="<?php echo set_value('temps', $this->session->etapedata('current_client')); ?>" <?php endif; ?> required>
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