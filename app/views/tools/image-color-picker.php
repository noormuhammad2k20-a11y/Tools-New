

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-8">
                    <div id="canvas-wrapper" class="bg-light rounded-4 border d-flex align-items-center justify-content-center p-4 shadow-inner" style="min-height: 400px; cursor: crosshair;">
                         <div id="upload-state" class="text-center">
                            <i class="fa-solid fa-cloud-arrow-up fa-4x text-muted mb-3"></i>
                            <p class="fw-bold text-muted">Drag or click to upload image</p>
                            <input type="file" id="img-upload" hidden accept="image/*">
                            <button onclick="document.getElementById('img-upload').click()" class="btn btn-primary rounded-pill px-4">Choose Image</button>
                         </div>
                         <canvas id="main-canvas" style="display: none; max-width: 100%; height: auto; border-radius: 10px;"></canvas>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="h-100 d-flex flex-column">
                        <div id="color-preview" class="rounded-4 mb-4 shadow-sm border" style="height: 120px; background: #f8fafc; border: 4px solid white;"></div>
                        
                        <div class="bg-white p-4 rounded-4 border shadow-sm flex-grow-1">
                            <h6 class="fw-bold mb-3">Selected Color</h6>
                            <div class="mb-3">
                                <label class="small text-muted mb-1">HEX</label>
                                <div class="input-group">
                                    <input type="text" id="hex-out" class="form-control" readonly value="#F8FAFC">
                                    <button class="btn btn-light" onclick="copy('hex-out')"><i class="fa-solid fa-copy"></i></button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small text-muted mb-1">RGB</label>
                                <div class="input-group">
                                    <input type="text" id="rgb-out" class="form-control" readonly value="rgb(248, 250, 252)">
                                    <button class="btn btn-light" onclick="copy('rgb-out')"><i class="fa-solid fa-copy"></i></button>
                                </div>
                            </div>
                            
                            <div class="mt-4 pt-4 border-top">
                                <h6 class="fw-bold mb-3 small opacity-75">Recent Picks</h6>
                                <div id="history" class="d-flex flex-wrap gap-2"></div>
                            </div>
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
const upload = document.getElementById('img-upload');
const canvas = document.getElementById('main-canvas');
const ctx = canvas.getContext('2d');
const wrapper = document.getElementById('upload-state');
const preview = document.getElementById('color-preview');
const hexOut = document.getElementById('hex-out');
const rgbOut = document.getElementById('rgb-out');
const history = document.getElementById('history');

upload.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return;
    
    const reader = new FileReader();
    reader.onload = (event) => {
        const img = new Image();
        img.onload = () => {
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);
            canvas.style.display = 'block';
            wrapper.style.display = 'none';
        };
        img.src = event.target.result;
    };
    reader.readAsDataURL(file);
});

canvas.addEventListener('mousedown', (e) => {
    const rect = canvas.getBoundingClientRect();
    const x = (e.clientX - rect.left) * (canvas.width / rect.width);
    const y = (e.clientY - rect.top) * (canvas.height / rect.height);
    
    const pixel = ctx.getImageData(x, y, 1, 1).data;
    const hex = "#" + [pixel[0], pixel[1], pixel[2]].map(c => c.toString(16).padStart(2, '0')).join('');
    const rgb = `rgb(${pixel[0]}, ${pixel[1]}, ${pixel[2]})`;
    
    preview.style.backgroundColor = hex;
    hexOut.value = hex.toUpperCase();
    rgbOut.value = rgb;
    
    addToHistory(hex);
});

function addToHistory(hex) {
    const dot = document.createElement('div');
    dot.style.width = '30px';
    dot.style.height = '30px';
    dot.style.borderRadius = '6px';
    dot.style.backgroundColor = hex;
    dot.style.cursor = 'pointer';
    dot.style.border = '1px solid #ddd';
    dot.onclick = () => {
        hexOut.value = hex;
        preview.style.backgroundColor = hex;
    };
    if(history.children.length >= 10) history.removeChild(history.lastChild);
    history.prepend(dot);
}

function copy(id) {
    navigator.clipboard.writeText(document.getElementById(id).value);
    toast('Copied!');
}
</script>






