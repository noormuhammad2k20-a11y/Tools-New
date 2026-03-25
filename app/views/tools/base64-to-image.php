

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label class="form-label fw-bold">Base64 String / Data URI</label>
                        <textarea id="base64-input" class="form-control font-monospace" rows="12" placeholder="data:image/png;base64,iVBORw0KGgoAAA..." style="background: #f8fafc; font-size: 12px;"></textarea>
                    </div>
                    <div class="d-flex gap-3">
                        <button id="decode-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Decode Image <i class="fa-solid fa-eye ms-2"></i></button>
                        <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label fw-bold">Image Preview</label>
                        <div id="preview-container" class="border rounded-4 p-3 bg-light d-flex align-items-center justify-content-center" style="min-height: 300px; overflow: hidden;">
                            <span class="text-muted italic">Image preview will appear here...</span>
                        </div>
                    </div>
                    <div id="action-buttons" class="mt-3 d-none">
                        <a id="download-btn" href="#" class="btn btn-success rounded-pill px-4 me-2">Download Image <i class="fa-solid fa-download ms-2"></i></a>
                        <div id="image-info" class="mt-2 small text-muted"></div>
                    </div>
                </div>
            </div>
            <div id="error-msg" class="alert alert-danger d-none mt-4"></div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Restoring Visuals from Data URIs</h2>
                    <p class="lead">Base64 is a binary-to-text encoding scheme that represents binary data in an ASCII string format. This is widely used in web development for embedding images directly into HTML or CSS as "Data URIs." Our <strong>Base64 to Image Decoder</strong> allows you to instantly visualize these encoded strings and save them as standard image files.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">When to Use This Tool</h3>
                    <p>Developers often encounter Base64 encoded images when working with API responses, database blobs, or CSS background properties. Instead of writing code to save these images, you can simply paste the string into our tool to verify its content, dimensions, and quality.</p>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Supporting All Modern Formats</h3>
                    <p>Our decoder is compatible with all major web-safe formats, including:</p>
                    <ul>
                        <li><strong>PNG & JPEG:</strong> Standard photography and transparency support.</li>
                        <li><strong>WebP:</strong> Modern, high-efficiency image format.</li>
                        <li><strong>SVG:</strong> Vector-based graphics encoded as XML-based strings.</li>
                        <li><strong>GIF:</strong> Both static and animated graphics.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Advantage of Offline Decoding</h3>
                    <p>Images can be large, consuming significant bandwidth if uploaded to a server. Our tool performs the decoding process locally within your browser using the HTML5 Canvas and Blob APIs. This means instantaneous results regardless of your internet speed and complete privacy for your visual assets.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How it Works</h3>
                    <p>When you click decode, the tool parses the Base64 string and creates a data object. It then attempts to render this object inside a preview container. If successful, it generates a temporary download URL, allowing you to save the file with the correct extension identified from the string's header (MIME type).</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #7c3aed); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#preview-container img { max-width: 100%; max-height: 400px; object-fit: contain; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); border-radius: 8px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('base64-input');
    const decodeBtn = document.getElementById('decode-btn');
    const clearBtn = document.getElementById('clear-btn');
    const preview = document.getElementById('preview-container');
    const actionBtns = document.getElementById('action-buttons');
    const downloadBtn = document.getElementById('download-btn');
    const imageInfo = document.getElementById('image-info');
    const errorMsg = document.getElementById('error-msg');

    decodeBtn.addEventListener('click', () => {
        let val = input.value.trim();
        if(!val) return;
        
        errorMsg.classList.add('d-none');
        
        // Add data prefix if missing (trying to be helpful)
        if(!val.startsWith('data:image/')) {
            // Check if it's likely a base64 string
            val = 'data:image/png;base64,' + val;
        }

        const img = new Image();
        img.onload = function() {
            preview.innerHTML = '';
            preview.appendChild(img);
            actionBtns.classList.remove('d-none');
            downloadBtn.href = val;
            
            // Extract format
            const match = val.match(/^data:image\/(\w+);/);
            const format = match ? match[1].toUpperCase() : 'PNG';
            
            imageInfo.textContent = `Format: ${format} | Size: ${img.naturalWidth}x${img.naturalHeight}px`;
            downloadBtn.download = `decoded-image.${format.toLowerCase()}`;
        };
        
        img.onerror = function() {
            errorMsg.textContent = 'Invalid Base64 Image string. Please ensure it is a valid Data URI.';
            errorMsg.classList.remove('d-none');
            preview.innerHTML = '<span class="text-muted italic">Image preview will appear here...</span>';
            actionBtns.classList.add('d-none');
        };
        
        img.src = val;
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        preview.innerHTML = '<span class="text-muted italic">Image preview will appear here...</span>';
        actionBtns.classList.add('d-none');
        errorMsg.classList.add('d-none');
    });
});
</script>






