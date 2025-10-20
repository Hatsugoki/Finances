<?php
include 'connexion.php';

$query = "SELECT * FROM depenses_rubriques ORDER BY rubrique, annee";
$result = mysqli_query($dataBase, $query);
if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($dataBase));
}

$annees = [];
$data = [];
$total_data = [];

while ($row = mysqli_fetch_assoc($result)) {
    if (!in_array($row['annee'], $annees)) {
        $annees[] = $row['annee'];
    }
    
    $rubrique = $row['rubrique'];
    $montant_formate = number_format($row['montant'], 1, ',', ' ');

    if ($rubrique === 'TOTAL') {
        $total_data[$row['annee']] = $montant_formate;
    } else {
        $data[$rubrique][$row['annee']] = $montant_formate;
    }
}
mysqli_close($dataBase);
?>

<div class="card">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">Tableau 7. Dépenses par Rubrique (En milliards d'Ariary)</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead class="table-success text-center">
                    <tr>
                        <th>Rubrique</th>
                        <?php foreach ($annees as $annee): ?>
                            <th><?= $annee ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $rubrique => $valeurs): ?>
                        <tr>
                            <td><?= $rubrique ?></td>
                            <?php foreach ($annees as $annee): ?>
                                <td class="text-center"><?= isset($valeurs[$annee]) ? $valeurs[$annee] : '-' ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    
                    <?php if (!empty($total_data)): ?>
                        <tr class="table-primary fw-bold">
                            <td>TOTAL</td>
                            <?php foreach ($annees as $annee): ?>
                                <td class="text-center"><?= isset($total_data[$annee]) ? $total_data[$annee] : '-' ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>