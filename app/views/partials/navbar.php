<?php
$navItems = [
    ['icon' => 'bi-chat-left-text', 'label' => 'Text', 'desc' => 'Format and analyze strings', 'path' => 'category/text-tools'],
    ['icon' => 'bi-image', 'label' => 'Images', 'desc' => 'Optimize and convert media', 'path' => 'category/image-tools'],
    ['icon' => 'bi-code-slash', 'label' => 'Developer', 'desc' => 'JSON, formatting and git', 'path' => 'category/developer-tools'],
    ['icon' => 'bi-shield-lock', 'label' => 'Security', 'desc' => 'Hash and token validation', 'path' => 'category/security-tools'],
    ['icon' => 'bi-lightning-charge', 'label' => 'Finance', 'desc' => 'Currency and math modeling', 'path' => 'category/finance-tools'],
    ['icon' => 'bi-unindent', 'label' => 'Conversions', 'desc' => 'Unit transformation tools', 'path' => 'category/unit-converters'],
    ['icon' => 'bi-globe', 'label' => 'Web', 'desc' => 'Domain, DNS and HTTP utilities', 'path' => 'category/web-tools'],
    ['icon' => 'bi-search', 'label' => 'SEO', 'desc' => 'Search optimization tools', 'path' => 'category/seo-tools'],
    ['icon' => 'bi-calculator', 'label' => 'Math', 'desc' => 'Scientific and basic math', 'path' => 'category/math-tools'],
];
?>

<nav class="navbar-custom">
    <div class="container-fluid px-4 px-lg-5">
        <div class="d-flex align-items-center justify-content-between w-100 gap-4">
            <!-- Brand -->
            <div class="d-flex align-items-center gap-4">
                <a href="<?= url('') ?>" class="brand-wrapper">
                    <div class="brand-icon">
                        <i class="bi bi-lightning-fill"></i>
                    </div>
                    <span class="brand-text">ToolMaster</span>
                </a>

                <!-- Desktop Nav -->
                <div class="d-none d-lg-flex align-items-center gap-1 ms-4">
                    <a href="<?= url('') ?>" class="nav-link <?= empty($activeCategory) || $activeCategory === 'all' ? 'active' : '' ?>">Dashboard</a>
                    
                    <div class="dropdown">
                        <button class="nav-link dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Service Clusters
                        </button>
                        <div class="dropdown-menu dropdown-menu-custom p-3 shadow-lg border-0 rounded-4" style="width: 480px;">
                            <div class="row g-2">
                                <div class="col-12 mb-2">
                                    <p class="text-uppercase fw-bolder text-zinc-400 mb-0" style="font-size: 10px; letter-spacing: 0.2em;">Categories</p>
                                </div>
                                <?php foreach ($navItems as $item): ?>
                                <div class="col-6">
                                    <a href="<?= url($item['path']) ?>" class="dropdown-item d-flex align-items-center gap-3 p-2 rounded-3">
                                        <div class="dropdown-icon-box border border-zinc-200 bg-white rounded-3 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; color: var(--zinc-400);">
                                            <i class="bi <?= $item['icon'] ?>"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0 fw-bold text-zinc-900" style="font-size: 13px; line-height: 1;"><?= $item['label'] ?></p>
                                            <p class="mb-0 text-zinc-400 text-truncate" style="font-size: 10px;"><?= $item['desc'] ?></p>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Area -->
            <div class="flex-grow-1 d-none d-md-block" style="max-width: 400px;">
                <button type="button" class="search-trigger w-100" id="searchTrigger">
                    <i class="bi bi-search me-2"></i>
                    Index Search...
                    <div class="search-kbd ms-auto">
                        <i class="bi bi-command me-1" style="font-size: 10px;"></i> K
                    </div>
                </button>
            </div>

            <!-- Right Controls -->
            <div class="d-flex align-items-center gap-2">
                <div class="d-none d-sm-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-light rounded-circle p-2 position-relative" style="width: 38px; height: 38px;">
                        <i class="bi bi-bell text-zinc-400"></i>
                        <span class="position-absolute top-2 end-2 p-1 bg-indigo-500 border border-light rounded-circle" style="width: 6px; height: 6px;"></span>
                    </button>
                    <div class="vr mx-2 bg-zinc-200" style="height: 1.5rem; opacity: 1;"></div>
                    <button class="btn btn-sm d-flex align-items-center gap-3 p-1 rounded-pill pe-3 hover-zinc-50">
                        <div class="user-avatar-small rounded-circle border border-zinc-200 d-flex align-items-center justify-content-center bg-white shadow-sm" style="width: 34px; height: 34px;">
                            <i class="bi bi-person text-zinc-500"></i>
                        </div>
                        <div class="text-start d-none d-lg-block">
                            <p class="mb-0 fw-bold text-zinc-900" style="font-size: 11px; line-height: 1;">Developer Account</p>
                            <p class="mb-0 fw-extrabold text-zinc-400 text-uppercase tracking-wider mt-1" style="font-size: 9px;">Enterprise Node</p>
                        </div>
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="d-lg-none btn btn-light p-2" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
                    <i class="bi bi-list fs-3"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Collapse -->
    <div class="collapse d-lg-none position-absolute top-100 start-0 w-100 bg-white border-top border-bottom border-zinc-200 shadow-lg" id="mobileMenu">
        <div class="p-4">
            <p class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-3" style="font-size: 10px;">Operational Access</p>
            <a href="<?= url('') ?>" class="d-flex align-items-center gap-3 p-3 rounded-3 bg-zinc-900 text-white fw-bold mb-4">
                <i class="bi bi-grid-fill"></i> Global Dashboard
            </a>
            
            <p class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-3" style="font-size: 10px;">Service Clusters</p>
            <div class="list-group list-group-flush border-0">
                <?php foreach ($navItems as $item): ?>
                <a href="<?= url($item['path']) ?>" class="list-group-item list-group-item-action border-0 px-0 py-3 d-flex align-items-center gap-3 fw-bold text-zinc-600">
                    <i class="bi <?= $item['icon'] ?> text-zinc-400"></i> <?= $item['label'] ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</nav>

<style>
.dropdown-menu-custom .dropdown-item:hover {
    background-color: var(--zinc-50);
}
.hover-zinc-50:hover {
    background-color: var(--zinc-50);
}
</style>
