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
                <h6>Liste des étapes</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            <?php if ($etapes != null) { ?>
                <?php foreach ($etapes as $etape) { ?>
                    <h4><?php echo $etape->nometape ?> [ <?php echo $etape->kilometre ?> km ] - <?php echo $etape->nombrecoureur ?> coureur(s) </h4>
                    <table id="authorsTable" class="table align-items-center mb-0">
                    <!-- <table> -->
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom de coureur</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temps de chrono(duree sans pénalité)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($etapesavectempscoureurs as $etp) { ?>
                                <?php if ($etp->idetape == $etape->idetape && $etp->idequipe == $this->session->userdata('idUtilisateur')) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary mb-0" style="font-size:18px !important;"><?php echo $etp->nomcoureur ?></p>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <!-- <p class="text-xs text-secondary mb-0" style="text-align:left; padding-right:300px ;font-size:18px !important;"><?php echo $etp->heurearrive ?></p> -->
                                            <p class="text-xs text-secondary mb-0" style="text-align:left; padding-right:300px ;font-size:18px !important;"><?php echo gmdate("H:i:s",$etp->duree) ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <tbody>
                    </table>

                    <p>
                        <span class="badge badge-sm bg-gradient-success">
                            <a href="<?php echo base_url("ListeEtapeEquipeController/affecterformulaire") ?>?idetape=<?php echo $etape->idetape ?>&nombre=<?php echo $etape->nombrecoureur ?>">Affecter un coureur</a>
                        </span>
                        <span class="badge badge-sm bg-gradient-success">
                            <a href="<?php echo base_url("ListeEtapeEquipeController/classementparetape") ?>?idetape=<?php echo $etape->idetape ?>">Classement</a>
                        </span>
                    </p>
                <?php } ?>
            <?php } ?>

            </div>
        </div>
    </div>
</div>
