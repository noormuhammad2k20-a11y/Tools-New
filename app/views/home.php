<?php
/**
 * Home Page View
 * Receives: $tools (array), $activeCategory (string|null)
 */
$activeCategory = $activeCategory ?? 'all';

$iconMap = [
    'text-tools' => 'bi-chat-left-text', 
    'image-tools' => 'bi-image', 
    'developer-tools' => 'bi-code-slash',
    'security-tools' => 'bi-shield-lock', 
    'finance-tools' => 'bi-lightning-charge',
    'unit-converters' => 'bi-unindent',
    'web-tools' => 'bi-globe',
    'seo-tools' => 'bi-search',
    'math-tools' => 'bi-calculator',
];
$fallbackIcon = 'bi-file-earmark-text';
?>

<?php include __DIR__ . '/partials/hero.php'; ?>

<section class="directory-section container-fluid px-4 px-lg-5">
    <div class="row mb-5 gy-4 align-items-end">
        <div class="col-lg-7">
            <h2 class="text-zinc-900 fw-extrabold tracking-tight mb-3" style="font-size: 2rem;">Premium Tool Directory</h2>
            <p class="text-zinc-500 font-medium mb-0" style="max-width: 600px; line-height: 1.6;">
                Explore our curated collection of professional-grade digital utilities. 
                High-speed processing, absolute privacy, and seamless integration.
            </p>
        </div>
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center gap-2" id="categoryTabs">
                <a href="<?= url('') ?>" class="category-btn <?= $activeCategory === 'all' ? 'active' : '' ?>">
                    <i class="bi bi-grid-3x3-gap me-2"></i> All Tools
                </a>
                
                <?php 
                $uniqueCategories = array_unique(array_map(function($t) { return $t['category']; }, $tools)); 
                foreach ($uniqueCategories as $cat): 
                ?>
                <a href="<?= url('category/' . $cat) ?>" class="category-btn <?= $activeCategory === $cat ? 'active' : '' ?>">
                    <i class="bi <?= $iconMap[$cat] ?? 'bi-file-earmark-text' ?> me-2"></i>
                    <?= ucwords(str_replace('-', ' ', $cat)) ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Tool Grid -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4 pb-5" id="toolsGrid">
        <?php $index = 0; foreach ($tools as $slug => $tool): ?>
        <div class="col tool-container" data-category="<?= htmlspecialchars($tool['category']) ?>">
            <a href="<?= url('tool/' . $slug) ?>" class="tool-card d-flex flex-column h-100">
                <div class="card-header border-0 bg-transparent p-0 mb-3 d-flex align-items-center">
                    <div class="tool-icon-wrapper me-3">
                        <i class="bi <?= $iconMap[$tool['category']] ?? $fallbackIcon ?> text-primary" style="font-size: 1.25rem;"></i>
                    </div>
                    <h5 class="card-title mb-0 h6 fw-bold"><?= htmlspecialchars($tool['title']) ?></h5>
                </div>
                
                <div class="flex-grow-1">
                    <p class="card-desc"><?= htmlspecialchars($tool['desc'] ?? 'Professional digital utility for ' . $tool['category']) ?></p>
                </div>

                <div class="card-footer px-0 bg-transparent">
                    <div class="card-category">
                        <div class="cat-dot"></div>
                        <span><?= htmlspecialchars(str_replace('-', ' ', $tool['category'])) ?></span>
                    </div>
                    <i class="bi bi-arrow-right text-zinc-300 transition-all card-arrow"></i>
                </a>
            </div>
        </div>
        <?php $index++; endforeach; ?>
    </div>

    <!-- Empty State -->
    <div id="emptyState" class="d-none py-5 mt-5">
        <div class="text-center py-5 border-2 border-dashed border-zinc-100 rounded-4 bg-zinc-50/30">
            <div class="bg-white border border-zinc-200 rounded-3 shadow-sm d-inline-flex align-items-center justify-content-center mb-4" style="width: 64px; height: 64px;">
                <i class="bi bi-terminal text-zinc-300 fs-1"></i>
            </div>
            <h3 class="text-uppercase fw-bold text-zinc-900 mb-2" style="font-size: 14px; letter-spacing: 0.1em;">No utilities found</h3>
            <p class="text-zinc-400 font-medium mb-4 mx-auto" style="max-width: 300px; font-size: 12px;">
                Adjust your filters or search parameters to locate the required digital assets.
            </p>
            <a href="<?= url('') ?>" class="btn btn-pro-dark px-4">Reset Directory</a>
        </div>
    </div>
</section>

<style>
.tool-card:hover .card-arrow {
    transform: translateX(5px);
    color: var(--zinc-900) !important;
}
</style>
