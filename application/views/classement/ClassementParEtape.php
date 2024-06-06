<link rel="stylesheet" href="<?php echo base_url("assets/csstrier/jquerytable.js") ?>">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Classement par étapes</h6>
            </div>
            <h4><?php echo $Etape->nometape ?> [ <?php echo $Etape->kilometre ?> km ] - Etape numero : <?php echo $Etape->rangetape ?></h4>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="authorsTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Coureur</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Genre</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chrono (durée) sans pénalité</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pénalité</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Temps final (avec pénalité)</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($classements != null) { ?>
                                <?php foreach ($classements as $classement): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary mb-0"><?php echo $classement->rang ?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary mb-0"><?php echo $classement->nomcoureur ?></p>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" ><?php echo $classement->nomgenre ?></p>
                                        </td>

                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary mb-0" style="text-align:center;"><?php echo gmdate('H:i:s',$classement->dureesanspenalite) ?></p>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" ><?php echo $classement->temps ?></p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" ><?php echo gmdate('H:i:s',$classement->duree) ?></p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" ><?php echo $classement->points ?></p>
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
