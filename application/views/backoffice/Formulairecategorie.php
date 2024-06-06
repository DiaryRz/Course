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
            <h6>Catégorie</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Attribuer des Categories</h5>
                </div>
                    <form action="<?php echo base_url('CategorieController/attribuerCategorie') ?>" method="post">
                        <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="submit" value="Attribuer des catégories aux coureurs">
                    </form>
            </div>
        </div>
    </div>
</div>
