<div class="row">
    <div class="col-12">
        <div class="card mb-4">
        <div class="card-header pb-0">
            <h6>Import de données</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Import des étapes et des résultats</h5>
                </div>
                    <form action="<?php echo base_url('ImportController/imporEtapeEtResultat'); ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name">Importer étape:</label>
                                    <input type="file" name="csv_file" class="form-control" id="name"  required>
                                </div>
                                <div class="mb-3">
                                    <label for="name">Importer résultats:</label>
                                    <input type="file" name="csv_resultat" class="form-control" id="name"  required>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="submit" value="Submit">
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>