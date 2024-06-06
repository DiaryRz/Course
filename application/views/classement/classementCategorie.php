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
    #recherche {
        text-align: center;
    }
    .execo {
        background-color: pink;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="<?php echo base_url("assets/csstrier/jquerytable.js") ?>">

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Classement par catégorie:</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <?php if ($categories != null) { ?>
                    <?php foreach ($categories as $categorie) { ?>
                        <h4><?php echo $categorie->nomcategorie ?></h4>
                        <table id="authorsTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Equipe</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Points</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $rangmitovy = array();
                                    foreach ($classements as $classement) {
                                        if ($classement->idcategorie == $categorie->idcategorie) {
                                            if (!isset($rangmitovy[$classement->rang])) {
                                                $rangmitovy[$classement->rang] = 0;
                                            }
                                            $rangmitovy[$classement->rang]++;
                                        }
                                    }
                                ?>
                                <?php foreach ($classements as $classement) { ?>
                                    <?php if ($classement->idcategorie == $categorie->idcategorie) { ?>
                                        <tr class="<?php echo ($rangmitovy[$classement->rang] > 1) ? 'execo' : ''; ?>">
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs text-secondary mb-0" style="font-size:16px !important;"><?php echo $classement->rang ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="text-xs text-secondary mb-0" style="font-size:16px !important;"><?php echo $classement->nomequipe ?></p>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0" style="text-align:center;font-size:16px !important;"><?php echo $classement->points ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0" style="text-align:center;font-size:16px !important;"><?php echo gmdate("H:i:s",$classement->duree) ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <tbody>
                        </table>
                        <div style="width:300px;margin-left:35%;">
                            <canvas id="myChart<?php echo $categorie->idcategorie ?>"></canvas>
                        </div>
                        <script>
                            var labels<?php echo $categorie->idcategorie ?> = [];
                            var data<?php echo $categorie->idcategorie ?> = [];

                            <?php foreach ($classements as $row) {
                                if ($row->idcategorie == $categorie->idcategorie) { ?>
                                    labels<?php echo $categorie->idcategorie ?>.push("<?php echo $row->nomequipe; ?>");
                                    data<?php echo $categorie->idcategorie ?>.push("<?php echo $row->points; ?>");
                            <?php }} ?>

                            var ctx<?php echo $categorie->idcategorie ?> = document.getElementById('myChart<?php echo $categorie->idcategorie ?>').getContext('2d');
                            var myChart<?php echo $categorie->idcategorie ?> = new Chart(ctx<?php echo $categorie->idcategorie ?>, {
                                type: 'pie',
                                data: {
                                    labels: labels<?php echo $categorie->idcategorie ?>,
                                    datasets: [{
                                        label: 'Points',
                                        data: data<?php echo $categorie->idcategorie ?>,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    let label = context.label || '';
                                                    if (label) {
                                                        label += ': ';
                                                    }
                                                    if (context.parsed !== null) {
                                                        label += context.parsed;
                                                    }
                                                    return label;
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        </script>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
