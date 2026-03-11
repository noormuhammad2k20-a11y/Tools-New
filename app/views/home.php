<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- TinyWow-Style Hero Section -->
<section class="bg-white pt-20 pb-16 px-4 sm:px-6 lg:px-8 text-center border-b border-gray-100">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight mb-6">
            Free Tools to Make <span class="text-primary relative inline-block">Everything<svg class="absolute w-full h-3 -bottom-1 left-0 text-blue-200" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="3" fill="none"/></svg></span> Simple
        </h1>
        <p class="text-lg sm:text-xl text-gray-500 mb-10 max-w-2xl mx-auto">
            We offer PDF, video, image, and other online tools to make your life easier. All perfectly free, format your data instantly.
        </p>

        <!-- Prominent Search Bar -->
        <div class="relative max-w-2xl mx-auto mb-10 shadow-lg shadow-gray-200/50 rounded-2xl group">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                <i class="fa-solid fa-magnifying-glass text-gray-400 text-lg group-focus-within:text-primary transition-colors"></i>
            </div>
            <input type="text" id="searchInput" class="block w-full pl-14 pr-8 py-5 border-2 border-transparent focus:border-primary/20 bg-white rounded-2xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-primary/10 transition-all text-lg font-medium" placeholder="Search for tools...">
        </div>

        <!-- Category Pills (Horizontal Scroll) -->
        <div class="flex overflow-x-auto pb-4 pt-1 mb-8 -mx-4 px-4 sm:mx-0 sm:px-0 hide-scrollbar justify-start sm:justify-center gap-3">
            <button class="cat-filter active whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-gray-900 text-white shadow-md shadow-gray-900/20" data-cat="all">All Tools</button>
            <button class="cat-filter whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-900" data-cat="text-tools">Text Tools</button>
            <button class="cat-filter whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-900" data-cat="developer-tools">Developer</button>
            <button class="cat-filter whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-900" data-cat="math-calculators">Math & Finance</button>
            <button class="cat-filter whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-900" data-cat="random-generators">Generators</button>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="bg-white border-b border-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-100">
            <div>
                <div class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2"><?php echo count($tools); ?>+</div>
                <div class="text-xs sm:text-sm font-semibold text-gray-500 uppercase tracking-wide">Total Tools</div>
            </div>
            <div>
                <div class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">1M+</div>
                <div class="text-xs sm:text-sm font-semibold text-gray-500 uppercase tracking-wide">Active Users</div>
            </div>
            <div>
                <div class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">5M+</div>
                <div class="text-xs sm:text-sm font-semibold text-gray-500 uppercase tracking-wide">Files Processed</div>
            </div>
            <div>
                <div class="text-3xl sm:text-4xl font-bold text-gray-900 mb-2">10+</div>
                <div class="text-xs sm:text-sm font-semibold text-gray-500 uppercase tracking-wide">Categories</div>
            </div>
        </div>
    </div>
</section>

<!-- Tools Grid Section -->
<section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8 min-h-screen">
    <div class="max-w-7xl mx-auto">
        
        <!-- Featured Tools -->
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Featured Tools</h2>
            <a href="<?php echo URL_ROOT; ?>/categories" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">All Categories &rarr;</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            <?php 
            // Select 3 featured tools (for demo, just slicing the first 3)
            $featuredTools = array_slice($tools, 0, 3, true);
            foreach ($featuredTools as $slug => $t): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $slug; ?>" class="group bg-white border border-gray-200 rounded-2xl p-6 flex flex-col items-center text-center hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all duration-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 bg-red-500 text-white text-[10px] uppercase font-bold px-3 py-1 rounded-bl-lg tracking-wider">Hot</div>
                <div class="w-16 h-16 bg-blue-50 text-primary rounded-xl flex items-center justify-center text-3xl group-hover:bg-primary group-hover:text-white transition-colors duration-300 mb-4">
                    <?php echo render_tool_icon($t['icon']); ?>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($t['title']); ?></h3>
                <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($t['desc']); ?></p>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- All Tools Header -->
        <div class="flex items-center justify-between mb-8 border-t border-gray-200 pt-16">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight" id="grid-title">All Web Tools</h2>
            <span class="text-sm text-gray-500 font-medium bg-gray-200 px-3 py-1 rounded-full" id="tools-count"><?php echo count($tools); ?> Tools</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="toolsGrid">
            <?php foreach ($tools as $slug => $t): ?>
            <!-- TinyWow Style Tool Card -->
            <a href="<?php echo URL_ROOT; ?>/<?php echo $slug; ?>" class="tool-card group bg-white border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200" data-category="<?php echo htmlspecialchars($t['category']); ?>" data-title="<?php echo strtolower(htmlspecialchars($t['title'])); ?>" data-desc="<?php echo strtolower(htmlspecialchars($t['desc'])); ?>">
                
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

        <!-- No Results Empty State -->
        <div id="noResults" class="hidden text-center py-20">
            <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4">
                <i class="fa-solid fa-ghost"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">No tools found</h3>
            <p class="text-gray-500">We couldn't find anything matching your search query.</p>
        </div>

    </div>
</section>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.tool-card');
    const noResults = document.getElementById('noResults');
    const filterBtns = document.querySelectorAll('.cat-filter');
    const gridTitle = document.getElementById('grid-title');
    const toolsCount = document.getElementById('tools-count');
    
    let currentCategory = 'all';
    let currentSearch = '';

    function filterTools() {
        let visibleCount = 0;
        
        cards.forEach(card => {
            const title = card.dataset.title;
            const desc = card.dataset.desc;
            const cat = card.dataset.category;
            
            const matchesSearch = currentSearch === '' || title.includes(currentSearch) || desc.includes(currentSearch);
            const matchesCat = currentCategory === 'all' || cat === currentCategory;
            
            if (matchesSearch && matchesCat) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        toolsCount.textContent = visibleCount + (visibleCount === 1 ? ' Tool' : ' Tools');
    }

    searchInput.addEventListener('input', (e) => {
        currentSearch = e.target.value.toLowerCase();
        filterTools();
    });

    filterBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            // Update active state
            filterBtns.forEach(b => {
                b.className = 'cat-filter whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-white text-gray-600 border border-gray-200 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-900';
            });
            e.target.className = 'cat-filter active whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-semibold transition-all bg-gray-900 text-white shadow-md shadow-gray-900/20';
            
            // Apply filter
            currentCategory = e.target.dataset.cat;
            gridTitle.textContent = e.target.textContent === 'All Tools' ? 'Our Most Popular Tools' : e.target.textContent + ' Tools';
            filterTools();
        });
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
