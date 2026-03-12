<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - ToolMaster' : 'ToolMaster - Professional Web Tools' ?></title>
    <meta name="description" content="<?= isset($pageDesc) ? htmlspecialchars($pageDesc) : 'Professional digital utilities for software engineers and creators.' ?>">
    
    <!-- Frameworks & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- FontAwesome Fallback for legacy registry icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="<?= url('assets/css/style.css?v=' . time()) ?>">
    <link rel="icon" type="image/png" href="<?= url('assets/img/favicon.png') ?>">
</head>
<body>
<div class="app-shell">
    <?php include __DIR__ . '/partials/navbar.php'; ?>
    <?php include __DIR__ . '/partials/command_bar.php'; ?>

    <main class="main-container">
        <div class="content-frame">
            <div class="content-body">
                <?= $content ?>
            </div>

            <?php include __DIR__ . '/partials/footer.php'; ?>
        </div>
    </main>
</div>

<!-- Scripts -->
<script>const SITE_URL = '<?= url('') ?>/';</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= url('assets/js/main.js?v=' . time()) ?>"></script>

</body>
</html>
