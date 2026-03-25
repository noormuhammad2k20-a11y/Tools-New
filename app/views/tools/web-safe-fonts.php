

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <h5 class="fw-bold mb-4">Preview Text</h5>
                        <textarea id="font-preview-text" class="form-control mb-4" rows="4">The quick brown fox jumps over the lazy dog.</textarea>
                        
                        <div class="p-3 bg-white rounded-3 border small">
                            <i class="fa-solid fa-circle-info text-primary me-2"></i><b>Note:</b> Web safe fonts ensure consistent performance and zero cumulative layout shift (CLS).
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div id="fonts-grid" class="d-grid gap-3">
                        <!-- JS Generated Font Cards -->
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



<style>
.transition-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.05) !important;
}
</style>

<script>
const grid = document.getElementById('fonts-grid');
const textIn = document.getElementById('font-preview-text');

const fonts = [
    { name: 'Arial', stack: 'Arial, "Helvetica Neue", Helvetica, sans-serif' },
    { name: 'Verdana', stack: 'Verdana, Geneva, sans-serif' },
    { name: 'Tahoma', stack: 'Tahoma, Verdana, Segoe, sans-serif' },
    { name: 'Trebuchet MS', stack: '"Trebuchet MS", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Tahoma, sans-serif' },
    { name: 'Times New Roman', stack: '"Times New Roman", Times, Baskerville, Georgia, serif' },
    { name: 'Georgia', stack: 'Georgia, Times, "Times New Roman", serif' },
    { name: 'Garamond', stack: 'Garamond, Baskerville, "Baskerville Old Face", "Hoefler Text", "Times New Roman", serif' },
    { name: 'Courier New', stack: '"Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace' },
    { name: 'Brush Script MT', stack: '"Brush Script MT", cursive' }
];

function renderFonts() {
    const text = textIn.value;
    grid.innerHTML = '';
    fonts.forEach(f => {
        const card = document.createElement('div');
        card.className = 'bg-white p-4 rounded-4 border shadow-sm transition-hover';
        card.innerHTML = `
            <div class="d-flex justify-content-between align-items-start mb-3">
                <h5 class="fw-bold mb-0">${f.name}</h5>
                <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="copy('${f.stack}')">Copy Stack</button>
            </div>
            <div class="p-3 bg-light rounded-3" style="font-family: ${f.stack}; font-size: 1.25rem; min-height: 80px;">
                ${text}
            </div>
            <div class="mt-2 small text-muted font-monospace">${f.stack}</div>
        `;
        grid.appendChild(card);
    });
}

function copy(text) {
    navigator.clipboard.writeText(`font-family: ${text};`);
    toast('Font stack copied!');
}

textIn.addEventListener('input', renderFonts);
renderFonts();
</script>






