<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">CSS Code</h5>
                        <button class="btn btn-sm btn-primary rounded-pill px-3" onclick="copyCSS()">Copy CSS</button>
                    </div>
                    <pre id="css-output" class="p-3 bg-dark text-info rounded-4 mb-0 font-monospace" style="font-size: 0.9rem;"></pre>
                
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Elevating Web Design with CSS Box Shadows</h2>
                    <p class="lead">Depth is a critical element in modern UI/UX design. By using the <code>box-shadow</code> property, you can create a sense of hierarchy, making interface elements appear to float above the background. Our <strong>CSS Box Shadow Generator</strong> provides a real-time, visual workspace to craft these effects with pixel-perfect precision.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Mastering the Properties</h3>
                    <ul>
                        <li><strong>Horizontal Offset:</strong> Controls the shadow's position on the X-axis. Positive values move it right, negative values move it left.</li>
                        <li><strong>Vertical Offset:</strong> Controls the Y-axis position. Positive moves it down, negative moves it up.</li>
                        <li><strong>Blur Radius:</strong> Higher values create a softer, more diffused shadow, while zero creates a sharp, solid outline.</li>
                        <li><strong>Spread Radius:</strong> Expands or shrinks the size of the shadow source before the blur is applied.</li>
                        <li><strong>Color & Opacity:</strong> Defining the hue and transparency allows for subtle, natural-looking "soft" shadows.</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Shadow Design Best Practices</h3>
                    <p>In modern "Glassmorphism" and "Neumorphism" designs, shadows are used sparingly but effectively. A common mistake is using solid black shadows with high opacity, which looks dated. Instead, use low-opacity shadows (e.g., 10-20%) with a wide blur radius to achieve a professional, premium aesthetic.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Use This Generator?</h3>
                    <ol>
                        <li><strong>Real-time Feedback:</strong> See changes instantly as you drag the sliders.</li>
                        <li><strong>Cross-Browser Code:</strong> Get clean, standards-compliant CSS that works everywhere.</li>
                        <li><strong>Intuitive UI:</strong> Avoid the trial-and-error of manual coding by exploring shadow parameters visually.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Secure & Client-Side</h3>
                    <p>Designed for professional workflows, this tool works <strong>entirely inside your browser</strong>. Your design parameters and styles are never sent to our servers. Your workstation remains private, and your designs are yours to keep.</p>
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
.form-range::-webkit-slider-thumb { background: #3b82f6; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const box = document.getElementById('preview-box');
    const output = document.getElementById('css-output');
    const controls = ['h-offset', 'v-offset', 'blur', 'spread', 'shadow-color', 'opacity', 'inset'];

    function hexToRgba(hex, alpha) {
        const r = parseInt(hex.slice(1, 3), 16);
        const g = parseInt(hex.slice(3, 5), 16);
        const b = parseInt(hex.slice(5, 7), 16);
        return `rgba(${r}, ${g}, ${b}, ${alpha})`;
    }

    function update() {
        const h = document.getElementById('h-offset').value;
        const v = document.getElementById('v-offset').value;
        const b = document.getElementById('blur').value;
        const s = document.getElementById('spread').value;
        const color = document.getElementById('shadow-color').value;
        const opacity = document.getElementById('opacity').value;
        const isInset = document.getElementById('inset').checked;

        document.getElementById('h-val').textContent = h + 'px';
        document.getElementById('v-val').textContent = v + 'px';
        document.getElementById('b-val').textContent = b + 'px';
        document.getElementById('s-val').textContent = s + 'px';

        const rgba = hexToRgba(color, opacity);
        const shadowValue = `${isInset ? 'inset ' : ''}${h}px ${v}px ${b}px ${s}px ${rgba}`;
        
        box.style.boxShadow = shadowValue;
        output.textContent = `box-shadow: ${shadowValue};`;
    }

    controls.forEach(id => {
        document.getElementById(id).addEventListener('input', update);
    });

    document.getElementById('reset-btn').addEventListener('click', () => {
        document.getElementById('h-offset').value = 10;
        document.getElementById('v-offset').value = 10;
        document.getElementById('blur').value = 15;
        document.getElementById('spread').value = 0;
        document.getElementById('shadow-color').value = '#000000';
        document.getElementById('opacity').value = 0.3;
        document.getElementById('inset').checked = false;
        update();
    });

    window.copyCSS = () => {
        const textToCopy = output.textContent;
        const temp = document.createElement('textarea');
        temp.value = textToCopy;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand('copy');
        document.body.removeChild(temp);
        showToast('CSS copied!');
    };

    update(); // Initial
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>