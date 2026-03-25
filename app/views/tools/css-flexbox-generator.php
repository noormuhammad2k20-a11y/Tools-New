

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="bg-light p-4 rounded-4 border shadow-sm">
                        <h5 class="fw-bold mb-4">Flex Properties</h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Flex Direction</label>
                            <select id="flex-dir" class="form-select">
                                <option value="row">Row</option>
                                <option value="row-reverse">Row Reverse</option>
                                <option value="column">Column</option>
                                <option value="column-reverse">Column Reverse</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Justify Content</label>
                            <select id="flex-justify" class="form-select">
                                <option value="flex-start">Flex Start</option>
                                <option value="center">Center</option>
                                <option value="flex-end">Flex End</option>
                                <option value="space-between">Space Between</option>
                                <option value="space-around">Space Around</option>
                                <option value="space-evenly">Space Evenly</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Align Items</label>
                            <select id="flex-align" class="form-select">
                                <option value="stretch">Stretch (Default)</option>
                                <option value="center" selected>Center</option>
                                <option value="flex-start">Flex Start</option>
                                <option value="flex-end">Flex End</option>
                                <option value="baseline">Baseline</option>
                            </select>
                        </div>

                        <button id="add-item" class="btn btn-outline-pink w-100 py-2 rounded-pill fw-bold mb-2" style="color: #ec4899; border-color: #ec4899;">
                            <i class="fa-solid fa-plus me-2"></i> Add Item
                        </button>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="h-100 d-flex flex-column">
                        <div class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 p-4 border overflow-auto" style="min-height: 300px;">
                            <div id="flex-preview" style="display: flex; min-height: 250px; background: #f8fafc; border-radius: 12px; border: 2px dashed #e2e8f0; padding: 10px;">
                                <div class="flex-item">1</div>
                                <div class="flex-item">2</div>
                                <div class="flex-item">3</div>
                            </div>
                        </div>
                        
                        <div class="bg-dark p-4 rounded-4 shadow-sm border-0 position-relative">
                            <h6 class="text-white-50 small fw-bold text-uppercase mb-3">Flexbox CSS Snippet</h6>
                            <pre id="flex-code" class="text-info m-0" style="white-space: pre-wrap; font-family: 'Fira Code', monospace;"></pre>
                            <button onclick="copyCode()" class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-4 rounded-pill">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
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



<style>
.flex-item {
    background: #ec4899;
    color: white;
    width: 60px;
    height: 60px;
    margin: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    font-weight: bold;
    font-size: 1.2rem;
    box-shadow: 0 4px 6px rgba(236, 72, 153, 0.2);
}
</style>

<script>
const preview = document.getElementById('flex-preview');
const codeEl = document.getElementById('flex-code');
const dirIn = document.getElementById('flex-dir');
const justifyIn = document.getElementById('flex-justify');
const alignIn = document.getElementById('flex-align');
const addItemBtn = document.getElementById('add-item');

function updateFlex() {
    const dir = dirIn.value;
    const justify = justifyIn.value;
    const align = alignIn.value;

    preview.style.flexDirection = dir;
    preview.style.justifyContent = justify;
    preview.style.alignItems = align;

    const cssText = `.flex-container {\n  display: flex;\n  flex-direction: ${dir};\n  justify-content: ${justify};\n  align-items: ${align};\n}`;
    codeEl.textContent = cssText;
}

addItemBtn.addEventListener('click', () => {
    const items = preview.querySelectorAll('.flex-item').length;
    if(items >= 10) return;
    const item = document.createElement('div');
    item.className = 'flex-item';
    item.textContent = items + 1;
    preview.appendChild(item);
});

function copyCode() {
    navigator.clipboard.writeText(codeEl.textContent);
    toast('Flex CSS copied!');
}

[dirIn, justifyIn, alignIn].forEach(el => el.addEventListener('change', updateFlex));
updateFlex();
</script>






