<?php
/**
 * Suggested Tools Strip — TinyWow Style
 * Shows 4 tools from the same category
 */

// Basic logic to get 4 random tools from the same category
$registry = require CONFIG . DS . 'tools_registry.php';
$sameCat = [];
foreach ($registry as $s_slug => $s_tool) {
    if ($s_tool['category'] === $tool['category'] && $s_slug !== $tool['slug']) {
        $s_tool['slug'] = $s_slug;
        $sameCat[] = $s_tool;
    }
}
shuffle($sameCat);
$suggestedTools = array_slice($sameCat, 0, 4);

if (count($suggestedTools) > 0):
?>
<section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">More in <?php echo ucwords(str_replace('-', ' ', $tool['category'])); ?></h2>
            <a href="<?php echo URL_ROOT; ?>/categories#<?php echo $tool['category']; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">View All &rarr;</a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach ($suggestedTools as $t): ?>
            <!-- TinyWow Style Tool Card -->
            <a href="<?php echo URL_ROOT; ?>/<?php echo $t['slug']; ?>" class="group bg-white border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                
                <div class="flex-shrink-0 w-12 h-12 bg-blue-50 text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200">
                    <?php echo render_tool_icon($t['icon']); ?>
                </div>
                
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors">
                        <?php echo htmlspecialchars($t['title']); ?>
                    </h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">
                        <?php echo htmlspecialchars($t['desc']); ?>
                    </p>
                </div>

            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
