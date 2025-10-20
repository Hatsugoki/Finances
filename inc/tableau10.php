<?php
include 'connexion.php';

$query = "SELECT * FROM repartition_budget_admin ORDER BY categorie, institution_ministere";
$result = mysqli_query($dataBase, $query);
if (!$result) {
    die("Erreur dans la requête : " . mysqli_error($dataBase));
}

$data = [];
$totaux_partiels = [];
$total_general = [];

while ($row = mysqli_fetch_assoc($result)) {
    $categorie = $row['categorie'];
    $institution = $row['institution_ministere'];
    
    $lfr_2024 = $row['lfr_2024'] > 0 ? number_format($row['lfr_2024'], 1, ',', ' ') : '-';
    $lf_2025 = $row['lf_2025'] > 0 ? number_format($row['lf_2025'], 1, ',', ' ') : '-';
    
    if (strpos($categorie, 'Total') !== false) {
        if ($categorie === 'Total général') {
            $total_general = [
                'lfr_2024' => $lfr_2024,
                'lf_2025' => $lf_2025
            ];
        } else {
            $totaux_partiels[] = [
                'institution' => $institution,
                'lfr_2024' => $lfr_2024,
                'lf_2025' => $lf_2025,
                'categorie' => $categorie
            ];
        }
    } else {
        $data[$categorie][$institution] = [
            'lfr_2024' => $lfr_2024,
            'lf_2025' => $lf_2025
        ];
    }
}
mysqli_close($dataBase);
?>

<div class="card">
    <div class="card-header bg-success text-white text-center">
        <h5 class="mb-0">Tableau 10. Répartition Budgétaire par Institution et Ministère (En milliards d'Ariary)</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover mb-0">
                <thead class="table-success text-center">
                    <tr>
                        <th>Institution/Ministère</th>
                        <th>LFR 2024</th>
                        <th>LF 2025</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Institutions -->
                    <?php if (isset($data['Institution'])): ?>
                        <tr class="table-warning fw-bold">
                            <td colspan="3">INSTITUTIONS</td>
                        </tr>
                        <?php foreach ($data['Institution'] as $institution => $valeurs): ?>
                            <tr>
                                <td><?= $institution ?></td>
                                <td class="text-center"><?= $valeurs['lfr_2024'] ?></td>
                                <td class="text-center"><?= $valeurs['lf_2025'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Ministères -->
                    <?php if (isset($data['Ministère'])): ?>
                        <tr class="table-warning fw-bold">
                            <td colspan="3">MINISTÈRES</td>
                        </tr>
                        <?php foreach ($data['Ministère'] as $institution => $valeurs): ?>
                            <tr>
                                <td><?= $institution ?></td>
                                <td class="text-center"><?= $valeurs['lfr_2024'] ?></td>
                                <td class="text-center"><?= $valeurs['lf_2025'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Total Institutions et Ministères -->
                    <?php foreach ($totaux_partiels as $total): ?>
                        <?php if ($total['categorie'] === 'Total partiel' && strpos($total['institution'], 'Institutions et Ministères') !== false): ?>
                            <tr class="table-info fw-bold">
                                <td><?= $total['institution'] ?></td>
                                <td class="text-center"><?= $total['lfr_2024'] ?></td>
                                <td class="text-center"><?= $total['lf_2025'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <!-- Organes Constitutionnels -->
                    <?php if (isset($data['Organe Constitutionnel'])): ?>
                        <tr class="table-warning fw-bold">
                            <td colspan="3">ORGANES CONSTITUTIONNELS</td>
                        </tr>
                        <?php foreach ($data['Organe Constitutionnel'] as $institution => $valeurs): ?>
                            <tr>
                                <td><?= $institution ?></td>
                                <td class="text-center"><?= $valeurs['lfr_2024'] ?></td>
                                <td class="text-center"><?= $valeurs['lf_2025'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Total Organes Constitutionnels -->
                    <?php foreach ($totaux_partiels as $total): ?>
                        <?php if ($total['categorie'] === 'Total partiel' && strpos($total['institution'], 'Organes Constitutionnels') !== false): ?>
                            <tr class="table-info fw-bold">
                                <td><?= $total['institution'] ?></td>
                                <td class="text-center"><?= $total['lfr_2024'] ?></td>
                                <td class="text-center"><?= $total['lf_2025'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <!-- Autres Institutions -->
                    <?php if (isset($data['Institution'])): ?>
                        <?php foreach ($data['Institution'] as $institution => $valeurs): ?>
                            <?php if (strpos($institution, 'Haute Cour de Justice') !== false): ?>
                                <tr>
                                    <td><?= $institution ?></td>
                                    <td class="text-center"><?= $valeurs['lfr_2024'] ?></td>
                                    <td class="text-center"><?= $valeurs['lf_2025'] ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Total Général -->
                    <?php if (!empty($total_general)): ?>
                        <tr class="table-primary fw-bold">
                            <td>Total Hors « Opérations d'ordre »</td>
                            <td class="text-center"><?= $total_general['lfr_2024'] ?></td>
                            <td class="text-center"><?= $total_general['lf_2025'] ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>