<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'ProTools - Professional Web Utilities'; ?></title>
    <meta name="description" content="<?php echo $pageDesc ?? 'High-performance digital tools for developers and creators.'; ?>">

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
        <?php echo $content; ?>
    </main>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="<?php echo URL_ROOT; ?>/" class="logo">
                        <i class="fa-solid fa-layer-group"></i> ProTools
                    </a>
                    <p>Professional digital utilities for software engineers and creators. High-performance, secure, and privacy-first by architecture.</p>
                </div>
                <div class="footer-col">
                    <h4>Products</h4>
                    <ul>
                        <li><a href="<?php echo URL_ROOT; ?>/category/ai-content">AI Tools</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/category/developer-tools">Dev Tools</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/category/text-tools">Text Tools</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">API Reference</a></li>
                        <li><a href="#">System Status</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div>&copy; <?php echo date('Y'); ?> ProTools Infrastructure. All rights reserved.</div>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URL_ROOT; ?>/assets/js/main.js?v=<?php echo time(); ?>"></script>
    <script src="<?php echo URL_ROOT; ?>/assets/js/app.js?v=<?php echo time(); ?>"></script>
</body>

</html>

