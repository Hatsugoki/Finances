<?php
include 'connexion.php';

$query = "SELECT * FROM postes_budgetaires_2025 ORDER BY id";
$result = mysqli_query($dataBase, $query);
if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($dataBase));
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'ministere' => $row['ministere'],
        'budget' => number_format($row['budget_alloue'], 1, ',', ' '),
        'pourcentage' => number_format($row['pourcentage_total'], 2, ',', ' ')
    ];
}
mysqli_close($dataBase);
?>

<div class="card">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">POSTES BUDGÉTAIRES AUTORISÉES POUR 2025</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0 text-center">
                <thead class="table-success">
                    <tr>
                        <th>Ministère</th>
                        <th>Budget alloué (en milliards d’Ariary)</th>
                        <th>% du total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                        <tr class="<?= $row['ministere'] === 'TOTAL' ? 'table-primary fw-bold' : '' ?>">
                            <td class="text-start"><?= $row['ministere'] ?></td>
                            <td><?= $row['budget'] ?></td>
                            <td><?= $row['pourcentage'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
