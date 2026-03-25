<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Great+Vibes&family=Indie+Flower&family=Shadows+Into+Light&display=swap" rel="stylesheet">

<!-- Tool Interface -->
<div class="card border-0 shadow-sm transition-all" style="border-radius: var(--radius-md); overflow: hidden;">
                    </div>

                    <button id="download-btn" class="btn btn-pro btn-lg w-100 py-3 rounded-pill fw-black text-uppercase tracking-wider">
                        <i class="fa-solid fa-cloud-arrow-down me-2"></i> Export Image
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const preview = document.getElementById('handwriting-preview');
    const fontSelect = document.getElementById('font-select');
    const colorBtns = document.querySelectorAll('.color-btn');
    const downloadBtn = document.getElementById('download-btn');

    function update() {
        if(input.value) preview.innerText = input.value;
        preview.style.fontFamily = fontSelect.value;
    }

    input.addEventListener('input', update);
    fontSelect.addEventListener('change', update);

    colorBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            colorBtns.forEach(b => b.style.outline = 'none');
            btn.style.outline = '3px solid var(--primary)';
            preview.style.color = btn.dataset.color;
        });
    });

    downloadBtn.addEventListener('click', () => {
        const container = document.getElementById('paper-container');
        html2canvas(container).then(canvas => {
            const link = document.createElement('a');
            link.download = 'handwritten-note.png';
            link.href = canvas.toDataURL();
            link.click();
        });
    });
});
</script>



