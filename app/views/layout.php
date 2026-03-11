<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - ToolMaster' : 'ToolMaster - Professional Web Tools' ?></title>
    <meta name="description" content="<?= isset($pageDesc) ? htmlspecialchars($pageDesc) : 'Professional digital utilities for software engineers and creators.' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>">
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

<script src="https://unpkg.com/lucide@latest"></script>
<script src="<?= url('assets/js/app.js?v=' . time()) ?>"></script>
<script>
    // Initialize Lucide icons after DOM load
    document.addEventListener('DOMContentLoaded', () => { lucide.createIcons(); });
</script>
</body>
</html>
