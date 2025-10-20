<?php
include 'connexion.php';

$query = "SELECT * FROM perspect_eco ORDER BY annee";
$result = mysqli_query($dataBase, $query);
if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($dataBase));
}

// Stockage des données
$annees = [];
$dataGlobal = [];
$dataChange = [];
$dataInvest = [];
$dataFiscal = [];
while ($row = mysqli_fetch_assoc($result)) {
    $annees[] = $row['annee'];

    // GLOBAL
    $dataGlobal['PIB nominal (milliards d’Ariary)'][$row['annee']] = number_format($row['pib_nominal'], 1, ',', ' ');
    $dataGlobal['Taux de croissance économique'][$row['annee']] = number_format($row['taux_croissance'], 2, ',', '');
    $dataGlobal['Indice des prix à la consommation (fin de période)'][$row['annee']] = number_format($row['indice_prix_cons'], 1, ',', '');
    $dataGlobal['Ratio de dépenses publiques (% PIB)'][$row['annee']] = number_format($row['ratio_dep_publ'], 1, ',', '');
    $dataGlobal['Solde global (base caisse)'][$row['annee']] = number_format($row['solde_global'], 1, ',', '');
    $dataGlobal['Solde primaire (base caisse)'][$row['annee']] = number_format($row['solde_primaire'], 1, ',', ' ');
    
    // Taux de change
    $dataChange['Dollars/Ariary'][$row['annee']] = number_format($row['taux_change_usd'], 2, ',', ' ');
    $dataChange['Euro/Ariary'][$row['annee']] = number_format($row['taux_change_eur'], 2, ',', ' ');
    
    // Taux d’investissement
    $dataInvest['Investissement public (% PIB)'][$row['annee']] = number_format($row['investissement_public'], 1, ',', '');
    $dataInvest['Investissement privé (% PIB)'][$row['annee']] = number_format($row['investissement_prive'], 1, ',', '');
    // Pression fiscale
    $dataFiscal['Taux de pression fiscale (% PIB)'][$row['annee']] = number_format($row['pression_fiscale'], 1, ',', '');
}
mysqli_close($dataBase);
?>

<div class="accordion" id="accordionTab1">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">Tableau 1. Prévisions macroéconomiques</h5>
    </div>
    <?php
    $sections = [
        "Global" => $dataGlobal,
        "Taux de change (moyenne période)" => $dataChange,
        "Taux d'investissement (% PIB)" => $dataInvest,
        "Taux de pression fiscale (% PIB)" => $dataFiscal
    ];
    $secId = 0;
    ?>
    <?php foreach ($sections as $title => $sectionData): ?>
        <?php $secId++; ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTab1<?= $secId ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTab1<?= $secId ?>" aria-expanded="false" aria-controls="collapseTab1<?= $secId ?>">
                    <?= $title ?>
                </button>
            </h2>
            <div id="collapseTab1<?= $secId ?>" class="accordion-collapse collapse" aria-labelledby="headingTab1<?= $secId ?>" data-bs-parent="#accordionTab1">                
                <div class="accordion-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead class="table-success text-center">
                                <tr>
                                    <th>Agrégats</th>
                                    <?php foreach ($annees as $annee): ?>
                                        <th><?= $annee ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sectionData as $label => $valeurs): ?>
                                    <tr>
                                        <td><?= $label ?></td>
                                        <?php foreach ($annees as $annee): ?>
                                            <td class="text-center"><?= $valeurs[$annee] ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
