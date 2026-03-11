<?php
// Current path detection for active states
$currentPath = isset($_GET['url']) ? '/' . trim($_GET['url'], '/') : '/';
$isHome = ($currentPath === '/' || $currentPath === '/home');
$isCategory = (strpos($currentPath, '/category/') === 0);
$currentCategory = $isCategory ? str_replace('/category/', '', $currentPath) : '';

$navItems = [
    ['icon' => 'type', 'label' => 'Text', 'desc' => 'Format, analyze and manipulate strings', 'path' => '/category/text-tools'],
    ['icon' => 'image', 'label' => 'Images', 'desc' => 'Optimize, resize and convert media', 'path' => '/category/image-tools'],
    ['icon' => 'code', 'label' => 'Developer', 'desc' => 'JSON markers, code formatting and git', 'path' => '/category/developer-tools'],
    ['icon' => 'shield', 'label' => 'Security', 'desc' => 'Hash generators and token validation', 'path' => '/category/security-tools'],
    ['icon' => 'zap', 'label' => 'Finance', 'desc' => 'Currency and mathematical modeling', 'path' => '/category/finance-tools'],
    ['icon' => 'binary', 'label' => 'Conversions', 'desc' => 'Unit transformation protocols', 'path' => '/category/unit-converters'],
    ['icon' => 'globe', 'label' => 'Web', 'desc' => 'Domain, DNS and HTTP utilities', 'path' => '/category/web-tools'],
];
?>
<nav class="navbar">
    <div class="navbar-inner">
        <!-- Brand -->
        <div class="navbar-left">
            <a href="<?= url('') ?>" class="brand">
                <div class="brand-icon"><i data-lucide="zap" style="width:18px;height:18px;fill:currentColor"></i></div>
                <span class="brand-text">ToolMaster</span>
            </a>

            <!-- Desktop Nav Links -->
            <div class="nav-links">
                <a href="<?= url('') ?>" class="nav-link <?= $isHome ? 'active' : '' ?>">Dashboard</a>

                <div class="dropdown-wrapper" id="navDropdown">
                    <button class="nav-link dropdown-trigger <?= $isCategory ? 'active' : '' ?>" id="dropdownTrigger">
                        Service Clusters
                        <i data-lucide="chevron-down" class="chevron" style="width:14px;height:14px"></i>
                    </button>

                    <div class="dropdown-menu">
                        <div class="dropdown-grid">
                            <p class="dropdown-label">Categories</p>
                            <?php foreach ($navItems as $item): ?>
                            <a href="<?= url('category/' . basename($item['path'])) ?>" class="dropdown-item <?= $currentCategory === basename($item['path']) ? 'active' : '' ?>">
                                <div class="dropdown-icon"><i data-lucide="<?= $item['icon'] ?>" style="width:16px;height:16px"></i></div>
                                <div style="overflow:hidden">
                                    <p class="dropdown-item-label"><?= $item['label'] ?></p>
                                    <p class="dropdown-item-desc"><?= $item['desc'] ?></p>
                                </div>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="dropdown-footer">
                            <div class="dropdown-featured">
                                <div class="dropdown-featured-icon"><i data-lucide="zap" style="width:16px;height:16px"></i></div>
                                <div>
                                    <p class="dropdown-featured-title">Featured Tool</p>
                                    <p class="dropdown-featured-desc">Try our High-Speed Image Resizer</p>
                                </div>
                            </div>
                            <a href="<?= url('tool/image-resizer') ?>" class="dropdown-cta">Open Tool</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center: Search Trigger -->
        <button class="search-trigger" id="searchTrigger">
            <i data-lucide="search" style="width:16px;height:16px"></i>
            <span class="search-trigger-text">Index Search...</span>
            <div class="search-kbd"><i data-lucide="command" style="width:10px;height:10px"></i> K</div>
        </button>

        <!-- Right side -->
        <div class="navbar-right">
            <div class="navbar-controls">
                <button class="icon-btn">
                    <i data-lucide="bell" style="width:20px;height:20px"></i>
                    <span class="notification-dot"></span>
                </button>
                <div class="nav-divider"></div>
                <button class="user-btn">
                    <div class="user-avatar"><i data-lucide="user" style="width:18px;height:18px"></i></div>
                    <div class="user-info">
                        <p class="user-name">Developer Account</p>
                        <p class="user-role">Enterprise Node</p>
                    </div>
                </button>
            </div>
            <button class="mobile-toggle" id="mobileToggle">
                <i data-lucide="menu" style="width:24px;height:24px" id="mobileMenuIcon"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-inner">
            <p class="mobile-section-label">Operational Access</p>
            <a href="<?= url('') ?>" class="mobile-link <?= $isHome ? 'active' : '' ?>">
                <i data-lucide="layout-dashboard" style="width:18px;height:18px"></i> Global Dashboard
            </a>
            <div style="padding-top:1rem">
                <p class="mobile-section-label">Service Clusters</p>
                <div>
                    <?php foreach ($navItems as $item): ?>
                    <a href="<?= url('category/' . basename($item['path'])) ?>" class="mobile-link <?= $currentCategory === basename($item['path']) ? 'active' : '' ?>">
                        <i data-lucide="<?= $item['icon'] ?>" style="width:18px;height:18px"></i> <?= $item['label'] ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div style="padding-top:1rem;padding-bottom:.5rem">
                <button class="mobile-link" id="mobileSearchTrigger">
                    <i data-lucide="search" style="width:18px;height:18px"></i> Quick Search
                </button>
            </div>
        </div>
        <div class="mobile-footer">
            <div style="display:flex;align-items:center;gap:.75rem">
                <div class="user-avatar"><i data-lucide="user" style="width:18px;height:18px"></i></div>
                <div>
                    <p class="user-name">Developer Account</p>
                    <p class="user-role">Enterprise Node</p>
                </div>
            </div>
            <button class="icon-btn"><i data-lucide="bell" style="width:20px;height:20px"></i></button>
        </div>
    </div>
</nav>
