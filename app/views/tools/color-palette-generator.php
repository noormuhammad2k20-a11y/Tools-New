<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        

        <div class="pro-card shadow-lg border-0 rounded-4 p-4 mb-4">
            <div class="row g-4 align-items-center">
                <div class="col-md-5">
                    <label class="form-label fw-bold">Seed Color</label>
                    <div class="d-flex gap-3">
                        <input type="color" id="seed-color" class="form-control form-control-color" value="#3b82f6" style="width: 80px; height: 80px; border-radius: 15px;">
                        <div class="flex-grow-1">
                            <input type="text" id="seed-hex" class="form-control form-control-lg font-monospace mb-2" value="#3b82f6" placeholder="#000000">
                            <select id="palette-type" class="form-select">
                                <option value="analogous">Analogous</option>
                                <option value="complementary" selected>Complementary</option>
                                <option value="triadic">Triadic</option>
                                <option value="monochromatic">Monochromatic</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 text-end">
                    <button id="generate-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Generate Palette <i class="fa-solid fa-rotate ms-2"></i></button>
                    <button id="random-btn" class="btn btn-outline-secondary btn-lg px-4 rounded-pill ms-2">Random</button>
                </div>
            </div>
        </div>

        <div id="palette-container" class="row g-3 mb-4">
            <!-- Colors will be injected here -->
        </div>

        <div id="code-output-wrapper" class="pro-card shadow-lg border-0 rounded-4 p-4" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">CSS Variables</h5>
                <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyCSS()">Copy All</button>
            </div>
            <pre id="css-variables" class="p-3 bg-dark text-info rounded-4 mb-0 font-monospace" style="font-size: 0.9rem;"></pre>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Designing Brilliance: The Art of Color Palettes</h2>
                    <p class="lead">Choosing the right colors for a website is more than just an aesthetic choice; it's a critical part of branding and user psychology. A well-designed color palette ensures readability, establishes emocional connection, and guides the user's eye to important actions. Our <strong>Color Palette Generator</strong> uses mathematical harmony to create perfect schemes instantly.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Types of Color Harmony</h3>
                    <ul>
                        <li><strong>Analogous:</strong> Colors that are next to each other on the color wheel. This creates a serene and comfortable design often found in nature.</li>
                        <li><strong>Complementary:</strong> Colors that are opposite each other. This provides high contrast and is great for making specific elements (like buttons) stand out.</li>
                        <li><strong>Triadic:</strong> Three colors evenly spaced around the color wheel. This creates a vibrant, balance scheme that is visually exciting.</li>
                        <li><strong>Monochromatic:</strong> Different shades and tints of a single base color. This results in a clean, sophisticated, and unified look.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How to Use Your Palette</h3>
                    <p>Once you've generated a scheme, use the provided CSS variables to integrate them into your project. Use your <strong>Primary</strong> color for headers and key backgrounds, the <strong>Accent</strong> or Complementary color for Call-to-Action (CTA) buttons, and <strong>Secondary</strong> shades for dividers, icons, and less critical UI elements.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Pro Design Tips</h3>
                    <ol>
                        <li><strong>The 60-30-10 Rule:</strong> Use your primary color for 60% of the page, secondary for 30%, and your accent for 10%.</li>
                        <li><strong>Check Contrast:</strong> Ensure your text has enough contrast against the background colors for accessibility.</li>
                        <li><strong>Consistency is Key:</strong> Stick to your palette throughout the entire site to build a cohesive brand.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Secure Digital Workspace</h3>
                    <p>Designed for professional workflows, this palette generator operates <strong>100% locally in your browser</strong>. Your design explorations are never tracked or saved to a server. Your creative process remains entirely private, allowing you to experiment with confidential brand colors with total peace of mind.</p>
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


<style>
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.color-swatch { height: 200px; transition: transform 0.3s; cursor: pointer; position: relative; overflow: hidden; }
.color-swatch:hover { transform: translateY(-10px); }
.swatch-info { position: absolute; bottom: 0; left: 0; right: 0; padding: 15px; background: rgba(255,255,255,0.9); text-align: center; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const seedPicker = document.getElementById('seed-color');
    const seedInput = document.getElementById('seed-hex');
    const generateBtn = document.getElementById('generate-btn');
    const randomBtn = document.getElementById('random-btn');
    const paletteBox = document.getElementById('palette-container');
    const variablesBox = document.getElementById('css-variables');
    const wrapper = document.getElementById('code-output-wrapper');

    function hexToHsl(hex) {
        let r = parseInt(hex.substring(1, 3), 16) / 255;
        let g = parseInt(hex.substring(3, 5), 16) / 255;
        let b = parseInt(hex.substring(5, 7), 16) / 255;
        let max = Math.max(r, g, b), min = Math.min(r, g, b);
        let h, s, l = (max + min) / 2;
        if(max === min) { h = s = 0; }
        else {
            let d = max - min;
            s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
            switch(max) {
                case r: h = (g - b) / d + (g < b ? 6 : 0); break;
                case g: h = (b - r) / d + 2; break;
                case b: h = (r - g) / d + 4; break;
            }
            h /= 6;
        }
        return [h * 360, s * 100, l * 100];
    }

    function hslToHex(h, s, l) {
        l /= 100;
        const a = s * Math.min(l, 1 - l) / 100;
        const f = n => {
            const k = (n + h / 30) % 12;
            const color = l - a * Math.max(Math.min(k - 3, 9 - k, 1), -1);
            return Math.round(255 * color).toString(16).padStart(2, '0');
        };
        return `#${f(0)}${f(8)}${f(4)}`;
    }

    function createSwatches() {
        const hex = seedInput.value;
        const [h, s, l] = hexToHsl(hex);
        const type = document.getElementById('palette-type').value;
        let colors = [hex];

        if(type === 'analogous') {
            colors.push(hslToHex((h + 30) % 360, s, l));
            colors.push(hslToHex((h + 60) % 360, s, l));
            colors.push(hslToHex((h - 30 + 360) % 360, s, l));
            colors.push(hslToHex((h - 60 + 360) % 360, s, l));
        } else if(type === 'complementary') {
            colors.push(hslToHex((h + 180) % 360, s, l));
            colors.push(hslToHex(h, s, l - 20));
            colors.push(hslToHex(h, s, l + 20));
            colors.push(hslToHex((h + 180) % 360, s, l - 20));
        } else if(type === 'triadic') {
            colors.push(hslToHex((h + 120) % 360, s, l));
            colors.push(hslToHex((h + 240) % 360, s, l));
            colors.push(hslToHex(h, s - 30, l));
            colors.push(hslToHex((h + 120) % 360, s - 30, l));
        } else if(type === 'monochromatic') {
            colors.push(hslToHex(h, s, l - 15));
            colors.push(hslToHex(h, s, l - 30));
            colors.push(hslToHex(h, s, l + 15));
            colors.push(hslToHex(h, s, l + 30));
        }

        paletteBox.innerHTML = '';
        let vars = ':root {\n';
        colors.forEach((c, idx) => {
            const col = document.createElement('div');
            col.className = 'col-md-2 col-6';
            col.innerHTML = `
                <div class="pro-card color-swatch rounded-4" style="background: ${c}" onclick="copySingle('${c}')">
                    <div class="swatch-info small fw-bold font-monospace">${c.toUpperCase()}</div>
                </div>
            `;
            paletteBox.appendChild(col);
            vars += `  --color-${idx + 1}: ${c.toUpperCase()};\n`;
        });
        vars += '}';

        variablesBox.textContent = vars;
        wrapper.style.display = 'block';
    }

    seedPicker.addEventListener('input', (e) => {
        seedInput.value = e.target.value;
        createSwatches();
    });

    seedInput.addEventListener('input', (e) => {
        if(/^#[0-9A-F]{6}$/i.test(e.target.value)) {
            seedPicker.value = e.target.value;
            createSwatches();
        }
    });

    generateBtn.addEventListener('click', createSwatches);

    randomBtn.addEventListener('click', () => {
        const randomHex = '#' + Math.floor(Math.random()*16777215).toString(16).padStart(6, '0');
        seedInput.value = randomHex;
        seedPicker.value = randomHex;
        createSwatches();
    });

    window.copySingle = (c) => {
        const temp = document.createElement('input');
        temp.value = c;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        showToast(`Color ${c.toUpperCase()} copied!`);
    };

    window.copyCSS = () => {
        const temp = document.createElement('textarea');
        temp.value = variablesBox.textContent;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        showToast('CSS Variables copied!');
    };

    createSwatches(); // Initial
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>