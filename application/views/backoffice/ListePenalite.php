<style>
    .pagination {
        margin: 20px 0;
        text-align: center;
    }
    .pagination a, .pagination .current , .pagination strong {
        padding: 5px 10px;
        margin: 0 5px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        color: #333;
        text-decoration: none;
    }
    .pagination a:hover {
        background-color: #e5e5e5;
    }
    .pagination .current {
        background-color: #007bff;
        color: #fff;
    }
    #recherche{
        text-align:center;
    }

</style>


<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Information</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="authorsTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom de l'équipe</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Etape</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($penalites != null) { ?>
                                <?php foreach ($penalites as $penalite): ?>
                                    <tr>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" style="text-align:left; padding-right:300px ;font-size:18px !important;"><?php echo $penalite->nomequipe ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" style="text-align:left; padding-right:300px ;font-size:18px !important;"><?php echo $penalite->nometape ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" style="text-align:left; padding-right:300px ;font-size:18px !important;"><?php echo $penalite->temps ?></p>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-success supprimer"  data-user-id="<?php echo $penalite->idpenalite ?>">
                                                Supprimer
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- afficher alert pour confirmer si on veut effacer ou pas ilay ligne -->
<script>
var elements = document.querySelectorAll(".supprimer");
elements.forEach(function(element) {
    element.addEventListener("click", function(event) {
        event.preventDefault(); 
        var confirmation = confirm("Voulez-vous vraiment supprimer ?");
        if (confirmation) {
            var userId = this.getAttribute("data-user-id");
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "<?= base_url('PenaliteController/delete') ?>?idpenalite=" + userId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
                    location.reload();
                }
            };
            xhr.send();
        }
    });
});
</script>
