<?php
include 'connexion.php';

$query = "SELECT * FROM croissance_sectorielle ORDER BY secteur, sous_secteur, annee";
$result = mysqli_query($dataBase, $query);
if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($dataBase));
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $secteur = $row['secteur'];
    $sous = $row['sous_secteur'];
    $annee = $row['annee'];
    $taux = $row['taux_croissance'];
    $data[$secteur][$sous][$annee] = $taux;
}
mysqli_close($dataBase);
?>

<div class="accordion" id="accordionTab2">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">Tableau 2. Taux de croissance sectorielle</h5>
    </div>
    <div class="accordion" id="secteurAccordion">
    <?php $secteurId = 0; ?>
    <?php foreach ($data as $secteur => $sousSecteurs): ?>
        <?php $secteurId++; ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTab2<?= $secteurId ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTab2<?= $secteurId ?>" aria-expanded="false" aria-controls="collapseTab2<?= $secteurId ?>">
                    <?= strtoupper($secteur) ?>
                </button>
            </h2>
            <div id="collapseTab2<?= $secteurId ?>" class="accordion-collapse collapse" aria-labelledby="headingTab2<?= $secteurId ?>" data-bs-parent="#accordionTab2">
                <div class="accordion-body p-0">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="table-success">
                            <tr>
                                <th>Sous-secteur</th>
                                <th>2024</th>
                                <th>2025</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sousSecteurs as $sous => $annees): ?>
                                <tr class="<?= $sous === 'Total' ? 'table-primary fw-bold' : '' ?>">
                                    <td><?= $sous ?></td>
                                    <td><?= isset($annees['2024']) ? $annees['2024'] : '-' ?></td>
                                    <td><?= isset($annees['2025']) ? $annees['2025'] : '-' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
