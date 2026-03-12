<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-uppercase small tracking-widest text-primary">Visual Editor</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-soft-primary" onclick="setPreset('triangle')">Triangle</button>
                            <button class="btn btn-sm btn-soft-primary" onclick="setPreset('star')">Star</button>
                            <button class="btn btn-sm btn-soft-primary" onclick="setPreset('rhombus')">Rhombus</button>
                        </div>
                    </div>
                    
                    <div id="canvas-container" class="position-relative bg-light rounded-4 overflow-hidden border shadow-inner" style="height: 500px; cursor: crosshair;">
                         <div id="clip-preview" class="position-absolute w-100 h-100" style="background: linear-gradient(135deg, #4f46e5, #ec4899); transition: clip-path 0.1s ease;"></div>
                         <svg id="canvas-svg" width="100%" height="100%" class="position-absolute top-0 left-0" style="z-index: 10;">
                             <defs>
                                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(0,0,0,0.05)" stroke-width="1"/>
                                </pattern>
                             </defs>
                             <rect width="100%" height="100%" fill="url(#grid)" />
                             <!-- Points and Lines injected by JS -->
                         </svg>
                    </div>
                    <p class="text-muted small mt-3"><i class="fa-solid fa-circle-info me-1"></i> Drag points to change shape. Double-click on canvas to add a new point (Polygon mode).</p>
                
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Art of CSS Clipping</h2>
                    <p class="lead">The `clip-path` property is a game-changer for modern web design. It allows you to define a specific visible region for an element, effectively "clipping" away the rest. Unlike old-school cropping, `clip-path` is vector-based, responsive, and fully animatable. Our <strong>CSS Clip-path Maker</strong> provides a professional GUI to master these geometric coordinate systems without manual calculation.</p>
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

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Common Clip-path Shapes</h3>
                    <ul>
                        <li><strong>Polygon:</strong> The most versatile function. It takes a list of coordinates (X and Y) to create any shape from a simple triangle to complex custom silhouettes.</li>
                        <li><strong>Circle:</strong> Simplifies creating circular clippings using a radius and center position.</li>
                        <li><strong>Ellipse:</strong> Similar to circle but allows for different horizontal and vertical radii.</li>
                        <li><strong>Inset:</strong> Creates a clipped rectangle inside an element, essentially acting as an internal crop with optional rounded corners.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Responsive Clipping Architectures</h3>
                    <p>One of the biggest advantages of `clip-path` is its use of percentage-based coordinates. Because of this, a shape created for a desktop hero section will scale perfectly to a mobile portrait view without losing its geometric integrity. This makes it ideal for unique image galleries, section dividers, and interactive card components.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Performance & Interactions</h3>
                    <p>Clip-paths are processed efficiently by the browser's rendering engine. When combined with CSS transitions, you can morph one shape into another on hover—for example, changing a square button into a circle smoothly. This enables high-end micro-interactions that feel premium and modern.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Clipping Masterclass</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I use images within clipped shapes?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes! Applying a `clip-path` to an `<img>` tag or a container with a `background-image` is the most common use case. The image will perfectly conform to the polygon or circle you define.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens to the area outside the clip?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">The area outside the defined path becomes transparent and invisible. Hover events and click interactions will also be ignored in the clipped-out area, allowing users to interact with elements underneath.</div>
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
  "name": "CSS Clip-path Maker Pro",
  "operatingSystem": "Any",
  "applicationCategory": "DeveloperApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Interactive coordinate canvas",
    "Multi-shape support (Polygon, Circle, Ellipse)",
    "Drag-and-drop point manipulation",
    "Real-time CSS syntax generation",
    "Mobile-responsive percentage logic"
  ]
}
</script>
<style>
.text-gradient-primary { background: linear-gradient(45deg, #10b981, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.btn-soft-primary { background: rgba(16, 185, 129, 0.1); color: #047857; border: 1px solid rgba(16, 185, 129, 0.2); transition: all 0.2s; }
.btn-soft-primary:hover { background: rgba(16, 185, 129, 0.2); }
.shadow-inner { box-shadow: inset 0 2px 10px rgba(0,0,0,0.05); }
.handle { cursor: grab; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2)); }
.handle:active { cursor: grabbing; }
.handle circle { transition: r 0.2s, fill 0.2s; }
.handle:hover circle { r: 8; fill: #10b981; }
.line-segment { stroke: rgba(16, 185, 129, 0.5); stroke-width: 2; stroke-dasharray: 4; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('canvas-container');
    const svg = document.getElementById('canvas-svg');
    const preview = document.getElementById('clip-preview');
    const cssCode = document.getElementById('css-output');
    const shapeSelector = document.getElementById('shape-selector');
    const controlsContainer = document.getElementById('controls-container');

    let currentShape = 'polygon';
    let points = [
        { x: 50, y: 0 },
        { x: 0, y: 100 },
        { x: 100, y: 100 }
    ];
    let circleData = { x: 50, y: 50, r: 50 };
    let ellipseData = { x: 50, y: 50, rx: 50, ry: 30 };
    let insetData = { t: 10, r: 10, b: 10, l: 10, round: 20 };

    function update() {
        renderControls();
        renderCanvas();
        generateCSS();
    }

    function renderControls() {
        let html = '';
        if (currentShape === 'circle') {
            html = `
                <div class="mb-4">
                    <label class="form-label small d-flex justify-content-between">Radius <span>${circleData.r}%</span></label>
                    <input type="range" class="form-range" id="c-r" value="${circleData.r}" min="0" max="100">
                </div>
                <div class="mb-4">
                    <label class="form-label small d-flex justify-content-between">Center X <span>${circleData.x}%</span></label>
                    <input type="range" class="form-range" id="c-x" value="${circleData.x}" min="0" max="100">
                </div>
                <div>
                    <label class="form-label small d-flex justify-content-between">Center Y <span>${circleData.y}%</span></label>
                    <input type="range" class="form-range" id="c-y" value="${circleData.y}" min="0" max="100">
                </div>
            `;
        } else if (currentShape === 'ellipse') {
            html = `
                <div class="mb-4">
                    <label class="form-label small d-flex justify-content-between">Radius X <span>${ellipseData.rx}%</span></label>
                    <input type="range" class="form-range" id="e-rx" value="${ellipseData.rx}" min="0" max="100">
                </div>
                <div class="mb-4">
                    <label class="form-label small d-flex justify-content-between">Radius Y <span>${ellipseData.ry}%</span></label>
                    <input type="range" class="form-range" id="e-ry" value="${ellipseData.ry}" min="0" max="100">
                </div>
                <div class="mb-4">
                    <label class="form-label small d-flex justify-content-between">Position X <span>${ellipseData.x}%</span></label>
                    <input type="range" class="form-range" id="e-x" value="${ellipseData.x}" min="0" max="100">
                </div>
                <div>
                    <label class="form-label small d-flex justify-content-between">Position Y <span>${ellipseData.y}%</span></label>
                    <input type="range" class="form-range" id="e-y" value="${ellipseData.y}" min="0" max="100">
                </div>
            `;
        } else if (currentShape === 'inset') {
            html = `
                <div class="mb-3">
                    <label class="form-label small d-flex justify-content-between">Top <span>${insetData.t}%</span></label>
                    <input type="range" class="form-range" id="i-t" value="${insetData.t}" min="0" max="100">
                </div>
                <div class="mb-3">
                    <label class="form-label small d-flex justify-content-between">Right <span>${insetData.r}%</span></label>
                    <input type="range" class="form-range" id="i-r" value="${insetData.r}" min="0" max="100">
                </div>
                <div class="mb-3">
                    <label class="form-label small d-flex justify-content-between">Bottom <span>${insetData.b}%</span></label>
                    <input type="range" class="form-range" id="i-b" value="${insetData.b}" min="0" max="100">
                </div>
                <div class="mb-3">
                    <label class="form-label small d-flex justify-content-between">Left <span>${insetData.l}%</span></label>
                    <input type="range" class="form-range" id="i-l" value="${insetData.l}" min="0" max="100">
                </div>
                <div>
                    <label class="form-label small d-flex justify-content-between">Roundness <span>${insetData.round}px</span></label>
                    <input type="range" class="form-range" id="i-round" value="${insetData.round}" min="0" max="100">
                </div>
            `;
        } else {
             html = `<p class="text-muted small">Polygon points are best managed directly on the canvas by dragging the handles.</p>
             <button class="btn btn-sm btn-outline-danger w-100" onclick="resetPoints()">Clear All Points</button>`;
        }
        controlsContainer.innerHTML = html;

        // Bind events if needed
        const sliders = controlsContainer.querySelectorAll('input');
        sliders.forEach(s => s.addEventListener('input', (e) => {
            const id = e.target.id;
            const val = parseInt(e.target.value);
            if(id.startsWith('c-')) circleData[id.split('-')[1]] = val;
            if(id.startsWith('e-')) ellipseData[id.split('-')[1]] = val;
            if(id.startsWith('i-')) insetData[id.split('-')[1]] = val;
            update();
        }));
    }

    function renderCanvas() {
        // Clear previous handles/lines from SVG (keep the grid)
        const elementsToRemove = svg.querySelectorAll('.handle, .line-segment, .shape-guide');
        elementsToRemove.forEach(el => el.remove());

        if (currentShape === 'polygon') {
            // Draw lines between points
            for(let i=0; i<points.length; i++) {
                const p1 = points[i];
                const p2 = points[(i+1)%points.length];
                const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
                line.setAttribute("x1", `${p1.x}%`);
                line.setAttribute("y1", `${p1.y}%`);
                line.setAttribute("x2", `${p2.x}%`);
                line.setAttribute("y2", `${p2.y}%`);
                line.setAttribute("class", "line-segment");
                svg.appendChild(line);
            }

            // Draw handles
            points.forEach((p, index) => {
                const group = document.createElementNS("http://www.w3.org/2000/svg", "g");
                group.setAttribute("class", "handle");
                group.setAttribute("transform", `translate(${canvas.offsetWidth * (p.x/100)}, ${canvas.offsetHeight * (p.y/100)})`);
                
                const circle = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                circle.setAttribute("r", "6");
                circle.setAttribute("fill", "#4f46e5");
                circle.setAttribute("stroke", "white");
                circle.setAttribute("stroke-width", "2");
                
                group.appendChild(circle);
                group.onmousedown = (e) => startDrag(e, index);
                svg.appendChild(group);
            });
        }
    }

    function generateCSS() {
        let css = '';
        if(currentShape === 'polygon') {
            const pStr = points.map(p => `${p.x}% ${p.y}%`).join(', ');
            css = `polygon(${pStr})`;
        } else if(currentShape === 'circle') {
            css = `circle(${circleData.r}% at ${circleData.x}% ${circleData.y}%)`;
        } else if(currentShape === 'ellipse') {
            css = `ellipse(${ellipseData.rx}% ${ellipseData.ry}% at ${ellipseData.x}% ${ellipseData.y}%)`;
        } else if(currentShape === 'inset') {
            css = `inset(${insetData.t}% ${insetData.r}% ${insetData.b}% ${insetData.l}% round ${insetData.round}px)`;
        }

        preview.style.clipPath = css;
        cssCode.textContent = `clip-path: ${css};`;
    }

    function startDrag(e, index) {
        e.preventDefault();
        const onMouseMove = (moveEvent) => {
            const rect = canvas.getBoundingClientRect();
            let x = ((moveEvent.clientX - rect.left) / rect.width) * 100;
            let y = ((moveEvent.clientY - rect.top) / rect.height) * 100;
            
            // Constrain
            x = Math.max(0, Math.min(100, Math.round(x)));
            y = Math.max(0, Math.min(100, Math.round(y)));
            
            points[index] = { x, y };
            update();
        };

        const onMouseUp = () => {
            window.removeEventListener('mousemove', onMouseMove);
            window.removeEventListener('mouseup', onMouseUp);
        };

        window.addEventListener('mousemove', onMouseMove);
        window.addEventListener('mouseup', onMouseUp);
    }

    // Add point on dblclick
    canvas.addEventListener('dblclick', (e) => {
        if(currentShape !== 'polygon') return;
        const rect = canvas.getBoundingClientRect();
        const x = Math.round(((e.clientX - rect.left) / rect.width) * 100);
        const y = Math.round(((e.clientY - rect.top) / rect.height) * 100);
        points.push({ x, y });
        update();
    });

    shapeSelector.addEventListener('change', (e) => {
        currentShape = e.target.value;
        update();
    });

    window.resetPoints = () => {
        points = [];
        update();
    }

    window.setPreset = (type) => {
        currentShape = 'polygon';
        shapeSelector.value = 'polygon';
        if(type === 'triangle') {
            points = [{x: 50, y: 0}, {x: 0, y: 100}, {x: 100, y: 100}];
        } else if(type === 'star') {
            points = [{x: 50, y: 0}, {x: 61, y: 35}, {x: 98, y: 35}, {x: 68, y: 57}, {x: 79, y: 91}, {x: 50, y: 70}, {x: 21, y: 91}, {x: 32, y: 57}, {x: 2, y: 35}, {x: 39, y: 35}];
        } else if(type === 'rhombus') {
            points = [{x: 50, y: 0}, {x: 100, y: 50}, {x: 50, y: 100}, {x: 0, y: 50}];
        }
        update();
    }

    window.copyCSS = () => {
        const text = cssCode.textContent;
        const dummy = document.createElement('textarea');
        document.body.appendChild(dummy);
        dummy.value = text;
        dummy.select();
        document.execCommand('copy');
        document.body.removeChild(dummy);
        showToast('Clip-path syntax copied!');
    }

    // Initial render
    update();
    
    // Resize watcher to reposition handles on window resize
    window.addEventListener('resize', () => renderCanvas());
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>