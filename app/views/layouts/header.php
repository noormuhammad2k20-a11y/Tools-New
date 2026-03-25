<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? SITE_TITLE; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <div class="container navbar">
            <a href="<?php echo URL_ROOT; ?>/" class="logo">
                <i class="fa-solid fa-layer-group"></i> ProTools
            </a>
            <?php include APP . DS . 'views' . DS . 'partials' . DS . 'navbar.php'; ?>
        </div>
    </header>

    <main>
