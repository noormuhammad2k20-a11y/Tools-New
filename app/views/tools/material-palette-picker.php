

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2.5rem;">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: linear-gradient(135deg, #2196f3 0%, #1976d2 100%); color: white; border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-layer-group fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary">Material Palette</h1>
                    <p class="text-muted mb-0">Pick from standard Google Material Design color arrays including official primary and accent palettes for app development.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <h5 class="fw-bold mb-4">Material Hue</h5>
                        
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Select Base Hue</label>
                            <div id="hue-grid" class="d-grid gap-2" style="grid-template-columns: repeat(4, 1fr);">
                                <!-- Generate Hue Buttons -->
                            </div>
                        </div>

                        <div class="p-3 bg-white rounded-3 border small">
                            <i class="fa-solid fa-palette text-primary me-2"></i> These colors follow the official Material Design guidelines for accessibility and contrast.
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="h-100 d-flex flex-column">
                        <div id="material-grid" class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 p-4 border grid gap-1" style="grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));">
                            <!-- JS Generated Grid -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script>
const hueGrid = document.getElementById('hue-grid');
const materialGrid = document.getElementById('material-grid');

const materialColors = {
    Red: ["#ffebee", "#ffcdd2", "#ef9a9a", "#e57373", "#ef5350", "#f44336", "#e53935", "#d32f2f", "#c62828", "#b71c1c"],
    Pink: ["#fce4ec", "#f8bbd0", "#f48fb1", "#f06292", "#ec407a", "#e91e63", "#d81b60", "#c2185b", "#ad1457", "#880e4f"],
    Purple: ["#f3e5f5", "#e1bee7", "#ce93d8", "#ba68c8", "#ab47bc", "#9c27b0", "#8e24aa", "#7b1fa2", "#6a1b9a", "#4a148c"],
    DeepPurple: ["#ede7f6", "#d1c4e9", "#b39ddb", "#9575cd", "#7e57c2", "#673ab7", "#5e35b1", "#512da8", "#4527a0", "#311b92"],
    Indigo: ["#e8eaf6", "#c5cae9", "#9fa8da", "#7986cb", "#5c6bc0", "#3f51b5", "#3949ab", "#303f9f", "#283593", "#1a237e"],
    Blue: ["#e3f2fd", "#bbdefb", "#90caf9", "#64b5f6", "#42a5f5", "#2196f3", "#1e88e5", "#1976d2", "#1565c0", "#0d47a1"],
    LightBlue: ["#e1f5fe", "#b3e5fc", "#81d4fa", "#4fc3f7", "#29b6f6", "#03a9f4", "#039be5", "#0288d1", "#0277bd", "#01579b"],
    Cyan: ["#e0f7fa", "#b2ebf2", "#80deea", "#4dd0e1", "#26c6da", "#00bcd4", "#00acc1", "#0097a7", "#00838f", "#006064"],
    Teal: ["#e0f2f1", "#b2dfdb", "#80cbc4", "#4db6ac", "#26a69a", "#009688", "#00897b", "#00796b", "#00695c", "#004d40"],
    Green: ["#e8f5e9", "#c8e6c9", "#a5d6a7", "#81c784", "#66bb6a", "#4caf50", "#43a047", "#388e3c", "#2e7d32", "#1b5e20"],
    Orange: ["#fff3e0", "#ffe0b2", "#ffcc80", "#ffb74d", "#ffa726", "#ff9800", "#fb8c00", "#f57c00", "#ef6c00", "#e65100"],
    BlueGrey: ["#eceff1", "#cfd8dc", "#b0bec5", "#90a4ae", "#78909c", "#607d8b", "#546e7a", "#455a64", "#37474f", "#263238"]
};

function renderHueButtons() {
    Object.keys(materialColors).forEach(hue => {
        const btn = document.createElement('button');
        btn.className = 'w-100 rounded-circle border-0 shadow-sm';
        btn.style.aspectRatio = '1';
        btn.style.backgroundColor = materialColors[hue][5];
        btn.onclick = () => renderPalette(hue);
        hueGrid.appendChild(btn);
    });
}

function renderPalette(hueName) {
    const colors = materialColors[hueName];
    materialGrid.innerHTML = '';
    colors.forEach((hex, i) => {
        const stop = (i === 0) ? 50 : i * 100;
        const card = document.createElement('div');
        card.className = 'p-3 rounded-4 border text-center shadow-sm';
        card.style.backgroundColor = hex;
        // Determine text color for contrast
        const isLight = i < 5;
        card.style.color = isLight ? '#333' : '#fff';
        card.innerHTML = `
            <div class="fw-bold small mb-1">${stop}</div>
            <div class="font-monospace small">${hex}</div>
            <button class="btn btn-sm btn-light p-1 mt-2 rounded-circle" onclick="event.stopPropagation(); navigator.clipboard.writeText('${hex}'); toast('Copied ${hex}')">
                <i class="fa-solid fa-copy"></i>
            </button>
        `;
        materialGrid.appendChild(card);
    });
}

renderHueButtons();
renderPalette('Blue');
</script>






