<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <h5 class="fw-bold mb-4">Color Selection</h5>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Test Color (HEX)</label>
                            <div class="input-group input-group-lg">
                                <input type="color" id="cb-picker" class="form-control form-control-color border-end-0" value="#ff5733" style="width: 80px;">
                                <input type="text" id="cb-hex" class="form-control border-start-0" value="#ff5733">
                            </div>
                        </div>

                        <div class="p-3 bg-white rounded-3 border small">
                            <i class="fa-solid fa-universal-access text-primary me-2"></i><b>Pro Tip:</b> Use this tool to ensure critical UI actions aren't distinguished by color alone.
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div id="cb-grid" class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 p-4 border grid gap-3" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                            <!-- JS Generated Cards -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<script>
const grid = document.getElementById('cb-grid');
const picker = document.getElementById('cb-picker');
const hexIn = document.getElementById('cb-hex');

const types = [
    { name: 'Normal Vision', slug: 'normal' },
    { name: 'Protanopia (No Red)', slug: 'protanopia' },
    { name: 'Deuteranopia (No Green)', slug: 'deuteranopia' },
    { name: 'Tritanopia (No Blue)', slug: 'tritanopia' },
    { name: 'Achromatopsia (Grayscale)', slug: 'achromatopsia' }
];

function blinder(hex, type) {
    let r = parseInt(hex.slice(1, 3), 16);
    let g = parseInt(hex.slice(3, 5), 16);
    let b = parseInt(hex.slice(5, 7), 16);

    let nr, ng, nb;
    switch(type) {
        case 'protanopia':
            nr = 0.567 * r + 0.433 * g;
            ng = 0.558 * r + 0.442 * g;
            nb = 0.242 * g + 0.758 * b;
            break;
        case 'deuteranopia':
            nr = 0.625 * r + 0.375 * g;
            ng = 0.7 * r + 0.3 * g;
            nb = 0.3 * g + 0.7 * b;
            break;
        case 'tritanopia':
            nr = 0.95 * r + 0.05 * g;
            ng = 0.433 * g + 0.567 * b;
            nb = 0.475 * g + 0.525 * b;
            break;
        case 'achromatopsia':
            let gray = 0.299 * r + 0.587 * g + 0.114 * b;
            nr = ng = nb = gray;
            break;
        default:
            nr = r; ng = g; nb = b;
    }

    const toHex = (c) => Math.round(c).toString(16).padStart(2, '0');
    return `#${toHex(nr)}${toHex(ng)}${toHex(nb)}`;
}

function updateSim() {
    const hex = hexIn.value;
    grid.innerHTML = '';
    
    types.forEach(type => {
        const simulatedHex = blinder(hex, type.slug);
        const card = document.createElement('div');
        card.className = 'p-4 rounded-4 border shadow-sm text-center';
        card.style.backgroundColor = simulatedHex;
        const colorVal = parseInt(simulatedHex.slice(1), 16);
        card.style.color = (colorVal > 0xffffff / 1.5) ? '#333' : '#fff';
        card.innerHTML = `
            <div class="fw-bold mb-2">${type.name}</div>
            <div class="font-monospace">${simulatedHex}</div>
        `;
        grid.appendChild(card);
    });
}

picker.addEventListener('input', (e) => {
    hexIn.value = e.target.value;
    updateSim();
});

hexIn.addEventListener('input', (e) => {
    if(/^#[0-9A-F]{6}$/i.test(e.target.value)) {
        picker.value = e.target.value;
        updateSim();
    }
});

updateSim();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>