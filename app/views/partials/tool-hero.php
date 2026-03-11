<?php
/**
 * Tool Hero Section — TinyWow Style
 * Requires: $tool (array with title, desc, icon, category, slug)
 */
$categoryLabel = ucwords(str_replace('-', ' ', $tool['category']));
?>
<section class="bg-bg-soft pt-8 pb-4 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto text-center">
        <!-- Breadcrumb -->
        <nav class="flex items-center justify-center space-x-2 text-sm text-gray-400 mb-4" aria-label="Breadcrumb">
            <a href="<?php echo URL_ROOT; ?>/" class="hover:text-primary transition-colors">Home</a>
            <span>›</span>
            <a href="<?php echo URL_ROOT; ?>/categories#<?php echo $tool['category']; ?>" class="hover:text-primary transition-colors"><?php echo $categoryLabel; ?></a>
            <span>›</span>
            <span class="text-gray-600 truncate"><?php echo htmlspecialchars($tool['title']); ?></span>
        </nav>

        <!-- Title & Desc -->
        <div class="inline-flex items-center justify-center w-14 h-14 bg-white border border-gray-200 text-primary rounded-xl text-2xl mb-4 shadow-sm">
            <?php echo render_tool_icon($tool['icon']); ?>
        </div>
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3 tracking-tight"><?php echo htmlspecialchars($tool['title']); ?></h1>
        <p class="text-gray-500 text-lg max-w-2xl mx-auto"><?php echo htmlspecialchars($tool['desc']); ?></p>
    </div>
</section>

