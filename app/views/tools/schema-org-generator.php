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
                    <div class="bg-light p-4 rounded-4 border">
                        <h5 class="fw-bold mb-4">Schema Details</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Schema Type</label>
                            <select id="sch-type" class="form-select rounded-3">
                                <option value="Article">Article</option>
                                <option value="LocalBusiness">Local Business</option>
                                <option value="Product">Product</option>
                                <option value="Event">Event</option>
                                <option value="Organization">Organization</option>
                            </select>
                        </div>

                        <div id="fields-container">
                            <!-- Dynamic fields will be injected here -->
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="bg-dark p-4 rounded-4 shadow-lg h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-white fw-bold mb-0">JSON-LD Snippet</h5>
                            <button id="copy-btn" class="btn btn-primary btn-sm rounded-pill px-3">
                                <i class="fa-solid fa-copy me-1"></i> Copy JSON
                            </button>
                        </div>
                        <pre id="output-code" class="text-success m-0" style="font-family: 'Fira Code', monospace; font-size: 0.85rem; overflow-x: auto; white-space: pre-wrap; min-height: 300px;"></pre>
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
document.addEventListener('DOMContentLoaded', () => {
    const typeSelect = document.getElementById('sch-type');
    const container = document.getElementById('fields-container');
    const output = document.getElementById('output-code');
    const copyBtn = document.getElementById('copy-btn');

    const schemaConfigs = {
        Article: [
            { id: 'headline', label: 'Headline', placeholder: 'The Future of AI' },
            { id: 'author', label: 'Author Name', placeholder: 'John Doe' },
            { id: 'date', label: 'Date Published', type: 'date' },
            { id: 'image', label: 'Image URL', placeholder: 'https://...' },
        ],
        LocalBusiness: [
            { id: 'name', label: 'Business Name', placeholder: 'City Coffee' },
            { id: 'street', label: 'Street Address', placeholder: '123 Main St' },
            { id: 'city', label: 'City', placeholder: 'New York' },
            { id: 'phone', label: 'Phone Number', placeholder: '+1...' },
        ],
        Product: [
            { id: 'name', label: 'Product Name', placeholder: 'Smart Watch X' },
            { id: 'price', label: 'Price', type: 'number', placeholder: '199.99' },
            { id: 'currency', label: 'Currency', placeholder: 'USD' },
            { id: 'brand', label: 'Brand', placeholder: 'TechCo' },
        ],
        Event: [
            { id: 'name', label: 'Event Name', placeholder: 'Tech Summit 2026' },
            { id: 'start', label: 'Start Date', type: 'date' },
            { id: 'location', label: 'Venue Name', placeholder: 'Convention Center' },
        ],
        Organization: [
            { id: 'name', label: 'Org Name', placeholder: 'Google' },
            { id: 'url', label: 'Website URL', placeholder: 'https://...' },
            { id: 'logo', label: 'Logo URL', placeholder: 'https://...' },
        ]
    };

    const updateFields = () => {
        const type = typeSelect.value;
        const config = schemaConfigs[type];
        container.innerHTML = '';

        config.forEach(f => {
            const div = document.createElement('div');
            div.className = 'mb-3';
            div.innerHTML = `
                <label class="form-label small fw-bold">${f.label}</label>
                <input type="${f.type || 'text'}" id="f-${f.id}" class="form-control rounded-3 schema-input" placeholder="${f.placeholder || ''}">
            `;
            container.appendChild(div);
        });

        document.querySelectorAll('.schema-input').forEach(el => {
            el.addEventListener('input', generate);
        });
        generate();
    };

    const generate = () => {
        const type = typeSelect.value;
        const inputs = document.querySelectorAll('.schema-input');
        const data = {
            "@context": "https://schema.org",
            "@type": type
        };

        inputs.forEach(input => {
            const key = input.id.replace('f-', '');
            if (input.value) {
                // Special mapping for complex schemas nested objects
                if (type === 'LocalBusiness' && (key === 'street' || key === 'city')) {
                    if (!data.address) data.address = { "@type": "PostalAddress" };
                    if (key === 'street') data.address.streetAddress = input.value;
                    if (key === 'city') data.address.addressLocality = input.value;
                } else if (type === 'Product' && (key === 'price' || key === 'currency')) {
                    if (!data.offers) data.offers = { "@type": "Offer" };
                    if (key === 'price') data.offers.price = input.value;
                    if (key === 'currency') data.offers.priceCurrency = input.value;
                } else {
                    data[key] = input.value;
                }
            }
        });

        output.textContent = `<script type="application/ld+json">\n${JSON.stringify(data, null, 4)}\n<\/script>`;
    };

    typeSelect.addEventListener('change', updateFields);
    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('Schema copied!'));
    });

    updateFields();
});
</script>



<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>