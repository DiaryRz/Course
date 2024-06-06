<h2>Details par coureur:</h2>

<table id="authorsTable" class="table align-items-center mb-0">
    <tr>
        <th>Nom de l'équipe</th>
        <th>Nom du coureur</th>
        <th>Total points</th>
    </tr>
    <?php foreach ($listecoureurs as $coureur) { ?>
        <tr>
            <td style="font-size:20px"><?php echo $coureur->nomequipe ?></td>
            <td style="font-size:20px"><?php echo $coureur->nomcoureur ?></td>
            <td style="font-size:20px"><?php echo $coureur->points ?></td>
        </tr>
    <?php } ?>
</table>