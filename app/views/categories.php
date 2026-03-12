<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<main class="bg-gray-50 min-h-screen pb-16">
    <section class="bg-white pt-16 pb-12 px-4 sm:px-6 lg:px-8 border-b border-gray-200 text-center">
        <h1 class="text-4xl font-bold text-gray-900 tracking-tight mb-4">All Categories</h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto mb-8">Browse all tools structured by dedicated categories</p>
        
        <div class="relative max-w-2xl mx-auto group">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400 text-lg group-focus-within:text-primary transition-colors"></i>
            </div>
            <input type="text" id="catSearchInput" class="block w-full pl-14 pr-8 py-4 border border-gray-200 focus:border-primary/30 shadow-sm bg-white rounded-2xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-primary/10 transition-all text-base font-medium" placeholder="Search across all categories...">
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php 
        $catMap = [
            'text-tools' => 'Text Tools',
            'developer-tools' => 'Developer Tools',
            'math-calculators' => 'Math Calculators',
            'finance-calculators' => 'Finance Calculators',
            'random-generators' => 'Random Generators',
            'seo-tools' => '[Ultra Bst Pro] SEO Suite',
            'security-tools' => '[Ultra Bst Pro] Security & Privacy',
            'image-tools' => '[Ultra Bst Pro] Image & Design Pro'
        ];

        foreach ($categories as $catSlug => $toolList): 
            $catName = $catMap[$catSlug] ?? ucfirst(str_replace('-', ' ', $catSlug));
        ?>
        <section id="<?php echo $catSlug; ?>" class="category-section mt-12">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight mb-6"><?php echo htmlspecialchars($catName); ?> <span class="text-sm font-medium text-gray-400 ml-2"><?php echo count($toolList); ?> Tools</span></h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <?php foreach ($toolList as $t): ?>
                <a href="<?php echo URL_ROOT; ?>/<?php echo $t['slug']; ?>" class="tool-card-mini group bg-white border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200 block">
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
        </section>
        <?php endforeach; ?>

        <!-- Empty State -->
        <div id="noResults" class="hidden text-center py-20 mt-12 bg-white rounded-2xl border border-gray-200">
            <div class="w-16 h-16 bg-gray-50 text-gray-400 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 border border-gray-100">
                <i class="fa-solid fa-ghost"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">No tools found</h3>
            <p class="text-gray-500">Try different keywords or browse by category.</p>
        </div>
    </div>

    <script>
        document.getElementById('catSearchInput').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            const sections = document.querySelectorAll('.category-section');
            let totalVisible = 0;

            sections.forEach(section => {
                const cards = section.querySelectorAll('.tool-card-mini');
                let sectionVisible = 0;

                cards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const desc = card.querySelector('p').textContent.toLowerCase();

                    if (title.includes(term) || desc.includes(term)) {
                        card.style.display = 'flex';
                        sectionVisible++;
                        totalVisible++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Hide entire section header if no tools are visible
                section.style.display = sectionVisible > 0 ? 'block' : 'none';
            });

            // Show/Hide no results message
            document.getElementById('noResults').style.display = totalVisible > 0 ? 'none' : 'block';
        });
    </script>
</main>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
