<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Source List</label>
                    <textarea id="input-text" class="form-control" rows="10" placeholder="First Item&#10;Second Item&#10;Third Item"></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="form-check form-switch mt-2">
                            <input class="form-check-input" type="checkbox" id="reverse-content">
                            <label class="form-check-label fw-bold" for="reverse-content">Also Reverse Text Content? (Mirror Each Line)</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <button id="reverse-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                            Reverse List Order <i class="fa-solid fa-rotate ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="d-grid d-md-flex align-items-center">
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold p-0">Clear Editor</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Reversed Output</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy Reversed List</button>
                </div>
                <textarea id="text-output" class="form-control p-4 rounded-4 bg-light border shadow-sm font-monospace" rows="10" readonly></textarea>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Perspective Inversion: Why Reverse Your Data?</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">Data often arrives in a chronological or sequential order that doesn't fit your immediate needs. Our <strong>List Reverse Tool</strong> is a streamlined utility designed to flip the orientation of any dataset—turning "oldest first" into "newest first" (or vice versa) in a single operation. This is an essential time-saver for analysts, developers, and content creators who frequently deal with logs, comment feeds, and historically sorted information.</p>
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
                        <p>Beyond simple line-order reversal, our professional suite includes a "Mirror Mode," allowing you to reverse the actual characters within each line—a specialized feature often used in cryptographic testing and unique text-styling projects.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Power of Chronological Reversal</h3>
                    <p>Many system logs and data exports are categorized by "First Entry" at the top. When you are looking for the most recent activity—such as the latest user registration or the most recent server error—you have to scroll to the very bottom of the document. Reversing the list brings the most relevant, recent information to the forefront, dramatically improving your review speed.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Common Professional Applications</h3>
                    <ol>
                        <li><strong>Log Analysis:</strong> Flip server logs or application events to see the most recent errors immediately at the top of your text editor.</li>
                        <li><strong>Content Curation:</strong> Reverse a list of blog post titles or social media links to prepare them for a "Historical Archive" or "Throwback Thursday" campaign.</li>
                        <li><strong>Inventory & Data Entry:</strong> Invert the order of a batch process to verify that data has been handled consistently from ending to beginning.</li>
                        <li><strong>Developer Shortcuts:</strong> Quickly reverse CSS z-index lists, array-style declarations, or HTML element stacks during a refactor.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Mirroring vs. Sequential Inversion</h3>
                    <p>It is important to understand the difference between the two modes our tool offers:</p>
                    <ul>
                        <li><strong>Sequential Inversion:</strong> This changes which line is on top. If your list is A, B, C, it becomes C, B, A. The characters within 'A' remain untouched.</li>
                        <li><strong>Mirroring (Text Character Reversal):</strong> This reverses the string itself. 'Hello' becomes 'olleH'. This is useful for detecting palindromes or obscuring simple text strings in design mockups.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Zero-Latency, Browser-Based Logic</h3>
                    <p>Privacy is a hallmark of our toolset. Because the reversal logic is implemented in high-performance JavaScript that runs locally on your machine, your data is never sent to our servers. This ensures 100% privacy and instant performance, even when handling lists with thousands of entries. No internet delay, no data tracking—just pure utility.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Reversing Data Structures</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Will reversing a list affect my empty lines?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. Every line, including empty ones, is treated as an element in the sequence. If you have three empty lines at the bottom, they will move to the very top after reversal.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Is this tool compatible with CSV data?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Absolutely. You can paste a CSV file, and the tool will reverse the rows. Note that it treats each row as a single unit, so the columns within that row skip-reversal unless you use the "Mirror Text" option.</div>
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

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "List Reverse Tool Pro",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Instant line order inversion",
    "Optional character mirror mode",
    "Batch processing support",
    "Client-side secure execution",
    "Zero-data-leakage architecture"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { background: #f8fafc; color: #1e293b; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const reverseBtn = document.getElementById('reverse-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('text-output');

    reverseBtn.addEventListener('click', () => {
        const text = input.value;
        if(!text) return;

        const mirrorText = document.getElementById('reverse-content').checked;
        
        // Split by lines
        let lines = text.split('\n');
        
        // Reverse line order
        lines.reverse();

        // Optional mirror reversal
        if(mirrorText) {
            lines = lines.map(line => line.split('').reverse().join(''));
        }

        output.value = lines.join('\n');
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        output.value = '';
        input.focus();
    });

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('Reversed list copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>