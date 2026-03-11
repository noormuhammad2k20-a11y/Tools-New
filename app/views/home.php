<?php
/**
 * Home Page View
 * Receives: $tools (array), $activeCategory (string|null)
 */
$categories = [
    'all' => 'All Nodes',
    'text-tools' => 'Text',
    'image-tools' => 'Images',
    'developer-tools' => 'Developer',
    'security-tools' => 'Security',
    'finance-tools' => 'Finance',
    'unit-converters' => 'Converters',
    'web-tools' => 'Web',
];
$activeCategory = $activeCategory ?? 'all';

$iconMap = [
    'text-tools' => 'type', 'image-tools' => 'image', 'developer-tools' => 'code',
    'security-tools' => 'shield', 'finance-tools' => 'calculator', 'unit-converters' => 'binary',
    'web-tools' => 'globe', 'math-tools' => 'calculator', 'seo-tools' => 'search',
];
?>

<?php include __DIR__ . '/partials/hero.php'; ?>

<div class="home-section" id="tools-directory">
    <div class="home-header">
        <div>
            <h2 class="home-title">Premium Tool Directory</h2>
            <p class="home-desc">Curated, validated, and enterprise-ready digital infrastructure. Select a category or search for a specific tool.</p>
        </div>
        <div class="category-filters" id="categoryFilters">
            <?php foreach ($categories as $key => $label): ?>
            <a href="<?= $key === 'all' ? url('') : url('category/' . $key) ?>"
               class="cat-btn <?= $activeCategory === $key ? 'active' : '' ?>"
               data-category="<?= $key ?>">
                <?= $label ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (empty($tools)): ?>
    <div class="empty-state">
        <div class="empty-state-icon"><i data-lucide="search" style="width:24px;height:24px"></i></div>
        <h3 class="empty-state-title">No Matching Nodes</h3>
        <p class="empty-state-desc">No tools found. Try selecting a different cluster.</p>
        <a href="<?= url('') ?>" class="empty-state-btn">Reset Filters</a>
    </div>
    <?php else: ?>
    <div class="tools-grid" id="toolsGrid">
        <?php $index = 0; foreach ($tools as $slug => $tool): ?>
        <a href="<?= url('tool/' . $slug) ?>" class="tool-card fade-in" data-category="<?= htmlspecialchars($tool['category'] ?? '') ?>" style="animation-delay:<?= $index * 0.03 ?>s">
            <div class="tool-card-inner">
                <div class="tool-card-header">
                    <div class="tool-card-icon">
                        <i data-lucide="<?= $iconMap[$tool['category'] ?? ''] ?? 'file-text' ?>" style="width:22px;height:22px"></i>
                    </div>
                    <?php if ($index < 5): ?>
                    <div class="tool-card-badge"><div class="tool-card-badge-dot"></div> Priority</div>
                    <?php endif; ?>
                </div>
                <div class="tool-card-content">
                    <h3 class="tool-card-title"><?= htmlspecialchars($tool['title']) ?></h3>
                    <p class="tool-card-desc"><?= htmlspecialchars($tool['desc'] ?? '') ?></p>
                </div>
                <div class="tool-card-footer">
                    <div class="tool-card-cat">
                        <div class="tool-card-cat-dot"></div>
                        <span class="tool-card-cat-text"><?= htmlspecialchars(str_replace('-', ' ', $tool['category'] ?? '')) ?></span>
                    </div>
                    <i data-lucide="arrow-right" style="width:16px;height:16px" class="tool-card-arrow"></i>
                </div>
            </div>
        </a>
        <?php $index++; endforeach; ?>
    </div>
    <?php endif; ?>
</div>
