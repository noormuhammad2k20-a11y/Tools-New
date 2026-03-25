

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






