

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Designing Brilliance: The Art of Color Palettes</h2>
                    <p class="lead">Choosing the right colors for a website is more than just an aesthetic choice; it's a critical part of branding and user psychology. A well-designed color palette ensures readability, establishes emocional connection, and guides the user's eye to important actions. Our <strong>Color Palette Generator</strong> uses mathematical harmony to create perfect schemes instantly.</p>
            
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






