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



<link rel="stylesheet" href="<?php echo base_url("assets/csstrier/jquerytable.js") ?>">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Liste des étpes</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="authorsTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Etape</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Numero de l'Etape</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date et heure de l'etape</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Longueur du Course</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre de courreur/equipe</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Affecter un courreur</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Classement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($etapes != null) { ?>
                                <?php foreach ($etapes as $etape): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary mb-0"><?php echo $etape->nometape ?></p>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" style="text-align:center;"><?php echo $etape->rangetape ?></p>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary mb-0"><?php echo $etape->dateetape ?></p>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" style="text-align:center;"><?php echo number_format($etape->kilometre, 2, ',', ' ' ); ?> km</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" style="text-align:center;"><?php echo $etape->nombrecoureur ?></p>
                                        </td>

                                        <td>
                                            <span class="badge badge-sm bg-gradient-success">
                                                <a href="<?php echo base_url("ListeEtapeAdminController/formulairetemps") ?>?idetape=<?php echo $etape->idetape ?>&nombre=<?php echo $etape->nombrecoureur ?>">Définir le temps/Coureur</a>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-success">
                                                <a href="<?php echo base_url("ListeEtapeAdminController/classementparetape") ?>?idetape=<?php echo $etape->idetape ?>">Classement</a>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
