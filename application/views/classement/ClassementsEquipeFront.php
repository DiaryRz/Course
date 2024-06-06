<link rel="stylesheet" href="<?php echo base_url("assets/csstrier/jquerytable.js") ?>">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Classement général des équipes</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="authorsTable" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Equipe</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($classements != null) { ?>
                                <?php foreach ($classements as $classement): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <p class="text-xs text-secondary mb-0 "><?php echo $classement->nomequipe ?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0" style="text-align:left;padding-left:75px"><?php echo $classement->rang ?></p>
                                            </div>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs text-secondary mb-0" style="text-align:left;padding-left:55px"><?php echo $classement->points ?></p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>



           
        <div style="width:350px;margin-left:35%;"> 
            <canvas id="myChart"></canvas>
        </div>        
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var labels = [];
            var data = [];

            <?php foreach ($classements as $row): ?>
                labels.push("<?php echo $row->nomequipe; ?>");
                data.push("<?php echo $row->points; ?>");
            <?php endforeach; ?>

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Points',
                        data: data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>