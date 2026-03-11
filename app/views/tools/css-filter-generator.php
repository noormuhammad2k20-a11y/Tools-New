<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary">CSS Code</h5>
                        <button class="btn btn-sm btn-primary rounded-pill px-4" onclick="copyCSS()">Copy CSS</button>
                    </div>
                    <div class="bg-dark rounded-3 p-3 text-center">
                         <div class="p-4 rounded-3" style="background: rgba(0,0,0,0.3); border: 1px solid #444;">
                            <code id="css-output" class="text-light" style="font-family: 'Fira Code', monospace; line-height: 1.6; word-break: break-all;">filter: grayscale(0%) blur(0px)...;</code>
                         </div>
                    </div>
                
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Elevating Visuals with CSS3 Filters</h2>
                    <p class="lead">CSS filters are a powerful set of functions that allow you to achieve professional image processing effects directly in the browser. Unlike traditional image editing, CSS filters are non-destructive, hardware-accelerated, and highly performant. Our <strong>CSS Filter Generator</strong> provides a visual sandbox to architect these complex filter chains instantly.</p>
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

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding Filter Functions</h3>
                    <p>Each slider in our generator corresponds to a specific CSS property that manipulates the visual output of an element:</p>
                    <ul>
                        <li><strong>Grayscale:</strong> Converts the input image to black and white. 100% is completely grayscale, while 0% leaves the image unchanged.</li>
                        <li><strong>Blur:</strong> Applies a Gaussian blur to the image. It accepts a pixel value; the higher the number, the more intense the blur.</li>
                        <li><strong>Brightness:</strong> Adjusts the overall light levels. 100% is original, 0% is black, and values above 100% brighten the image.</li>
                        <li><strong>Contrast:</strong> Adjusts the difference between light and dark areas. 0% is a flat gray, 100% is normal, and values above increase intensity.</li>
                        <li><strong>Hue-Rotate:</strong> Shifts the colors around the color wheel by a specified degree (0-360). Useful for unique branding effects.</li>
                        <li><strong>Invert:</strong> Flips all colors in the image. 100% gives you a classic "negative" film look.</li>
                        <li><strong>Saturate:</strong> Controls color intensity. 0% is grayscale, 100% is normal, and higher values make colors pop aggressively.</li>
                        <li><strong>Sepia:</strong> Gives your image a nostalgic, tinged "old photograph" look.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Chaining Filters for Professional Looks</h3>
                    <p>The true power of CSS filters lies in **chaining**. You can apply multiple functions to a single element. For example, `filter: grayscale(50%) blur(2px) brightness(110%);`. Our generator handles the syntax logic for you, ensuring that spaces and units (%, px, deg) are perfectly formatted for your stylesheet.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Hardware Acceleration & Performance</h3>
                    <p>Because CSS filters are processed by the GPU (Graphics Processing Unit) rather than the main CPU thread, they are incredibly fast. This allows for smooth animations—you can transition filter values on hover to create stunning, interactive UI patterns without any JavaScript overhead.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: CSS Filter Masterclass</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Do filters work on all elements?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes. While commonly used on `<img>` tags, filters can be applied to any HTML element, including `<div>` containers, text, and even entire video streams.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Are CSS filters SEO-friendly?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Absolutely. Because the original image is still present in the DOM, search engines can index it normally. Filters only change how it is *rendered* visually, not what it *is* semantically.</div>
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
  "name": "CSS Filter Generator Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Real-time image preview",
    "Hardware-accelerated chaining",
    "Multi-precision sliders",
    "Custom image upload support",
    "Zero-server local processing"
  ]
}
</script>
<style>
.text-gradient-primary { background: linear-gradient(45deg, #f43f5e, #fb923c); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.bg-soft-primary { background: rgba(244, 63, 94, 0.1); border-radius: 6px; padding: 2px 8px; font-size: 12px; }
.cursor-pointer { cursor: pointer; }
.shadow-inner { box-shadow: inset 0 2px 10px rgba(0,0,0,0.05); }
.form-range::-webkit-slider-thumb { background: #f43f5e; box-shadow: 0 0 10px rgba(244,63,94,0.3); }
.form-range::-moz-range-thumb { background: #f43f5e; }
.preview-container { border: 1px solid rgba(0,0,0,0.05); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const preview = document.getElementById('preview-image');
    const cssCode = document.getElementById('css-output');
    const inputs = document.querySelectorAll('.filter-input');
    const uploader = document.getElementById('image-upload');

    function updateFilters() {
        const grayscale = document.getElementById('grayscale').value;
        const blur = document.getElementById('blur').value;
        const brightness = document.getElementById('brightness').value;
        const contrast = document.getElementById('contrast').value;
        const hue = document.getElementById('huerotate').value;
        const invert = document.getElementById('invert').value;
        const saturate = document.getElementById('saturate').value;
        const sepia = document.getElementById('sepia').value;

        // Update labels
        document.getElementById('val-grayscale').textContent = grayscale + '%';
        document.getElementById('val-blur').textContent = blur + 'px';
        document.getElementById('val-brightness').textContent = brightness + '%';
        document.getElementById('val-contrast').textContent = contrast + '%';
        document.getElementById('val-huerotate').textContent = hue + 'deg';
        document.getElementById('val-invert').textContent = invert + '%';
        document.getElementById('val-saturate').textContent = saturate + '%';
        document.getElementById('val-sepia').textContent = sepia + '%';

        let filterString = '';
        if(grayscale != 0) filterString += `grayscale(${grayscale}%) `;
        if(blur != 0) filterString += `blur(${blur}px) `;
        if(brightness != 100) filterString += `brightness(${brightness}%) `;
        if(contrast != 100) filterString += `contrast(${contrast}%) `;
        if(hue != 0) filterString += `hue-rotate(${hue}deg) `;
        if(invert != 0) filterString += `invert(${invert}%) `;
        if(saturate != 100) filterString += `saturate(${saturate}%) `;
        if(sepia != 0) filterString += `sepia(${sepia}%) `;

        filterString = filterString.trim() || 'none';
        
        preview.style.filter = filterString === 'none' ? '' : filterString;
        cssCode.textContent = filterString === 'none' ? 'filter: none;' : `filter: ${filterString};`;
    }

    inputs.forEach(input => {
        input.addEventListener('input', updateFilters);
    });

    uploader.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                preview.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    window.resetFilters = () => {
        document.getElementById('grayscale').value = 0;
        document.getElementById('blur').value = 0;
        document.getElementById('brightness').value = 100;
        document.getElementById('contrast').value = 100;
        document.getElementById('huerotate').value = 0;
        document.getElementById('invert').value = 0;
        document.getElementById('saturate').value = 100;
        document.getElementById('sepia').value = 0;
        updateFilters();
    };

    window.copyCSS = () => {
        const text = cssCode.textContent;
        const el = document.createElement('textarea');
        el.value = text;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        showToast('CSS copied to clipboard!');
    };

    // Initial run
    updateFilters();
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>