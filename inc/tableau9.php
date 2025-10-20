<?php
include 'connexion.php';

$query = "SELECT * FROM depenses_fonctionnement ORDER BY id";
$result = mysqli_query($dataBase, $query);
if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($dataBase));
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'poste' => $row['poste_depense'],
        '2024' => number_format($row['montant_2024'], 1, ',', ' '),
        '2025' => number_format($row['montant_2025'], 1, ',', ' '),
        'ecart' => number_format($row['ecart'], 1, ',', ' ')
    ];
}
mysqli_close($dataBase);
?>

<div class="card">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">Tableau 9. Récapitulatif des dépenses de fonctionnement (En milliards d’Ariary)</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0 text-center">
                <thead class="table-success">
                    <tr>
                        <th>Poste de dépense</th>
                        <th>2024</th>
                        <th>2025</th>
                        <th>ÉCART</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                        <tr class="<?= $row['poste'] === 'TOTAL' ? 'table-primary fw-bold' : '' ?>">
                            <td><?= $row['poste'] ?></td>
                            <td><?= $row['2024'] ?></td>
                            <td><?= $row['2025'] ?></td>
                            <td><?= $row['ecart'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
