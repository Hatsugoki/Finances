<?php
include 'connexion.php';

$query = "SELECT * FROM recettes_fiscales ORDER BY nature_impot, annee";
$result = mysqli_query($dataBase, $query);
if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($dataBase));
}

$annees = [];
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    if (!in_array($row['annee'], $annees)) {
        $annees[] = $row['annee'];
    }
    $type = $row['nature_impot'];
    $data[$type][$row['annee']] = number_format($row['montant'], 1, ',', ' ');
}
mysqli_close($dataBase);
?>

<div class="card">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">Tableau 3. Recettes fiscales Intérieures (En milliards d’Ariary)</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead class="table-success text-center">
                    <tr>
                        <th>NATURE D’IMPÔTS</th>
                        <?php foreach ($annees as $annee): ?>
                            <th><?= $annee ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $type => $valeurs): ?>
                        <tr class="<?= $type === 'TOTAL' ? 'table-primary fw-bold' : '' ?>">
                            <td><?= $type ?></td>
                            <?php foreach ($annees as $annee): ?>
                                <td class="text-center"><?= isset($valeurs[$annee]) ? $valeurs[$annee] : '-' ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
