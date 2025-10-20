<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css_added/added_css.css">
    <title></title>
</head>
<body>
    <?php include 'inc/header.php'; ?>

    <section class="presentation container">
    <h1>BDC – Budget des Citoyens<br><small class="text-muted">Loi de Finances 2025</small></h1>
    <p>
        Le <strong>Budget des Citoyens (BDC)</strong> est une version simplifiee de la Loi de Finances,
        conçue pour permettre à tous les citoyens de comprendre comment sont collectees et utilisees les ressources publiques.
        Il vise à renforcer la transparence, la participation et la responsabilite dans la gestion des finances publiques.
    </p>
    <p>
        Ce site offre la possibilite de <strong>visiter, verifier et etudier</strong> les budgets des citoyens de Madagascar
        relatifs à la <strong>Loi de Finances 2025</strong>.  
        Explorez les donnees, decouvrez la repartition des depenses et suivez les projets finances à travers le pays.
    </p>
    <a href="#decouvrir-bdc" class="btn btn-success btn-lg mt-3">Decouvrir les BDC</a>
    </section>

<div class="container py-5">
    <div class="row g-4 justify-content-center">

        <div class="col-md-3">
            <a href="depenses.php" class="budget-card depense d-block">
                DÉPENSE TOTALE<br>
                <span class="budget-value">16 304,9 milliards</span>
            </a>
        </div>

        <div class="col-md-3">
            <a href="deficit.php" class="budget-card depense d-block">
                DÉFICIT BUDGÉTAIRE<br>
                <span class="budget-value">3 642,2 milliards</span>
            </a>
        </div>

        <div class="col-md-3">
            <a href="financement_exterieur.php" class="budget-card fin-ext d-block">
                FINANCEMENT EXTÉRIEUR<br>
                <span class="budget-value">3 147,6 milliards</span>
            </a>
        </div>

        <div class="col-md-3">
            <a href="financement_interieur.php" class="budget-card fin-int d-block">
                FINANCEMENT INTÉRIEUR<br>
                <span class="budget-value">494,6 milliards</span>
            </a>
        </div>

    </div>
</div>



    
    <section id="decouvrir-bdc" class="container my-5" style="padding-top: 90px;">
    <h2 class="text-success mb-4 text-center">Découvrir le BUDGET DES CITOYENS RELATIF À LA LOI DE FINANCES 2025 - Madagascar</h2>
  
    <div class="row g-4">

        <div class="col-md-6">
        <a href="pages/page-perspectives.php" class="text-decoration-none text-dark">
            <div class="border rounded p-3 h-100 shadow-sm">
            <h5 class="fw-bold">I. Perspectives economiques</h5>
            <ul class="mb-0 small">
                <li>Analyse generale</li>
            </ul>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="pages/page-recettes.php" class="text-decoration-none text-dark">
            <div class="border rounded p-3 h-100 shadow-sm">
            <h5 class="fw-bold">II. Recettes</h5>
            <ul class="mb-0 small">
                <li>Recettes par source</li>
                <li>Recettes fiscales interieures</li>
                <li>Recettes douanieres</li>
                <li>Recettes non fiscales</li>
                <li>Dons</li>
            </ul>
            </div>
        </a>
    </div>

   
    <div class="col-md-6">
        <a href="pages/page-depenses.php" class="text-decoration-none text-dark">
            <div class="border rounded p-3 h-100 shadow-sm">
            <h5 class="fw-bold">III. Depenses</h5>
            <ul class="mb-0 small">
                <li>Repartition des depenses par nature economique</li>
                <li>Interêts de la dette</li>
                <li>Depenses de soldes et pensions</li>
                <li>Depenses de fonctionnement (hors solde)</li>
                <li>Depenses d’investissement</li>
                <li>Repartition par rattachement administratif</li>
            </ul>
            </div>
        </a>
    </div>
    
    <div class="col-md-6">
        <a href="pages/page-dispositions.php" class="text-decoration-none text-dark">
            <div class="border rounded p-3 h-100 shadow-sm">
            <h5 class="fw-bold">IV. Extraits de dispositions fiscales et douanieres</h5>
            <ul class="mb-0 small">
                <li>Nouvelles dispositions dans le code des impots</li>
            </ul>
            </div>
        </a>
    </div>
  </div>
</section>

    <?php include 'inc/footer.php'; ?>
</body>
</html>