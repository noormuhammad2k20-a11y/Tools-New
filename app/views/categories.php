

<?php
$iconMap = [
    'text-tools' => 'fa-align-left', 
    'image-tools' => 'fa-image', 
    'developer-tools' => 'fa-code',
    'security-tools' => 'fa-shield-halved', 
    'finance-tools' => 'fa-calculator',
    'unit-converters' => 'fa-right-left',
    'web-tools' => 'fa-globe',
    'seo-tools' => 'fa-magnifying-glass',
    'math-tools' => 'fa-calculator',
];
$fallbackIcon = 'fa-file-lines';
?>

<section class="hero container" style="padding: 80px 0 40px;">
    <h1 class="animate-fade-up">All <span class="text-gradient">Categories</span></h1>
    <p class="animate-fade-up" style="animation-delay: 0.1s;">Explore our full directory of professional utilities structured by dedicated categories.</p>
    
    <div class="search-container animate-fade-up" style="animation-delay: 0.2s; margin-top: 32px;">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <input type="text" id="catSearchInput" class="search-input" placeholder="Search across all categories...">
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div id="noResults" class="container" style="display: none; text-align: center; padding: 100px 20px;">
        <i class="fa-solid fa-magnifying-glass" style="font-size: 48px; color: var(--text-secondary); margin-bottom: 20px; opacity: 0.5;"></i>
        <h3 style="color: var(--text-primary); margin-bottom: 8px;">No tools found</h3>
        <p style="color: var(--text-secondary);">We couldn't find any tools matching your search.</p>
    </div>

    <?php foreach ($categories as $catSlug => $toolList): ?>
    <section id="<?php echo $catSlug; ?>" class="category-section container" style="margin-top: 60px;">
        <div class="section-header">
            <div class="section-title">
                <h2><?php echo ucfirst(str_replace('-', ' ', $catSlug)); ?> <small style="font-size: 14px; color: var(--text-tertiary); font-weight: 500; margin-left: 10px;"><?php echo count($toolList); ?> Tools</small></h2>
            </div>
        </div>
        
        <div class="grid-cards">
            <?php foreach ($toolList as $t): ?>
            <a href="<?php echo URL_ROOT; ?>/tool/<?php echo $t['slug']; ?>" class="card-tool animate-fade-up">
                <div class="icon-box"><i class="fa-solid <?php echo $iconMap[$catSlug] ?? $fallbackIcon; ?>"></i></div>
                <div class="card-content">
                    <h3><?php echo htmlspecialchars($t['title']); ?></h3>
                    <p><?php echo htmlspecialchars($t['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endforeach; ?>

    <script>
        document.getElementById('catSearchInput').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            const sections = document.querySelectorAll('.category-section');
            let totalVisible = 0;

            sections.forEach(section => {
                const cards = section.querySelectorAll('.card-tool');
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

                section.style.display = sectionVisible > 0 ? 'block' : 'none';
            });

            document.getElementById('noResults').style.display = totalVisible > 0 ? 'none' : 'block';
        });
    </script>
</div>


