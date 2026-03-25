<?php include APP . DS . 'views' . DS . 'partials' . DS . 'hero.php'; ?>

<?php
// Group tools by category if not already grouped
if (!isset($catTools) && isset($tools)) {
    $catTools = [];
    foreach ($tools as $slug => $tool) {
        $category = $tool['category'] ?? 'other';
        $catTools[$category][$slug] = $tool;
    }
}
?>

<div id="toolsGrid">
    <?php
    $categoryTitles = [
        'ai-powered-tools' => 'AI & Intelligent Systems',
        'text-tools' => 'Advanced Text Processing',
        'converters' => 'Universal Converters',
        'pdf-document' => 'PDF & Document Suite',
        'developer-tools' => 'Professional Dev Utilities',
        'security-tools' => 'Security & Encryption'
    ];

    $iconMap = [
        'ai-powered-tools' => 'fa-robot',
        'text-tools' => 'fa-align-left',
        'converters' => 'fa-right-left',
        'pdf-document' => 'fa-file-pdf',
        'developer-tools' => 'fa-terminal',
        'security-tools' => 'fa-shield-halved',
    ];

    if (isset($catTools)):
        foreach ($catTools as $category => $tools_in_cat):
            $title = $categoryTitles[$category] ?? ucwords(str_replace('-', ' ', $category));
            $headerIcon = $iconMap[$category] ?? 'fa-cube';
    ?>
        <?php if (!empty($tools_in_cat)): ?>
            <section class="container" id="<?php echo htmlspecialchars($category); ?>">
                <div class="section-header animate-fade-up">
                    <div class="section-title">
                        <h2><?php echo $title; ?></h2>
                    </div>
                </div>

                <div class="grid-cards">
                    <?php foreach ($tools_in_cat as $slug => $tool): ?>
                        <div class="animate-fade-up">
                            <a href="<?php echo URL_ROOT; ?>/tool/<?php echo $slug; ?>" class="card-tool">
                                <div class="icon-box">
                                    <i class="fa-solid <?php echo $tool['icon'] ?? $headerIcon; ?>"></i>
                                </div>
                                <div class="card-content">
                                    <h3><?php echo htmlspecialchars($tool['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($tool['desc'] ?? ''); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
