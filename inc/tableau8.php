<?php
include 'connexion.php';

$query = "SELECT * FROM evolution_depenses_soldes ORDER BY libelle, annee";
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
    $libelle = $row['libelle'];
    $valeur = $row['type_valeur'] === 'pourcentage' 
        ? number_format($row['valeur'], 1, ',', ' ') . ' %'
        : number_format($row['valeur'], 1, ',', ' ');
    $data[$libelle][$row['annee']] = $valeur;
}
mysqli_close($dataBase);
?>

<div class="card" style="width: 100%; float: left;">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">Tableau 8. Évolution des Dépenses de Soldes</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0" style="font-size: 0.9em;">
                <thead class="table-success text-center">
                    <tr>
                        <th style="width: 50%;">Indicateurs</th>
                        <?php foreach ($annees as $annee): ?>
                            <th style="width: 25%;"><?= $annee ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $libelle => $valeurs): ?>
                        <tr>
                            <td><?= $libelle ?></td>
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

<div style="clear: both;"></div>