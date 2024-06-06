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
                <h6>Réinitialisation:</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Réinitialiser les donees</h5>
                    </div>
                    <div class="card-body">

                        <?php echo form_open_multipart('ReinitialisationController/reinitieliser'); ?>
                            <div class="card-body">
                                <div class="mb-3">
                                    <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="submit" value="Submit">
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
