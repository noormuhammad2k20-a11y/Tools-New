

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <form class="ajax-tool-form space-y-6 <?php echo !empty($tool['is_frontend_only']) ? 'frontend-only' : ''; ?>" action="<?php echo URL_ROOT; ?>/<?php echo $tool['slug']; ?>" method="POST" enctype="multipart/form-data">
            <?php if (!empty($tool['inputs'])): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($tool['inputs'] as $input): ?>
                        <div class="space-y-2 <?php echo ($input['type'] === 'textarea' || $input['type'] === 'file' || $input['type'] === 'cards') ? 'md:col-span-2' : ''; ?>">
                            <?php if ($input['type'] !== 'checkbox' && $input['type'] !== 'hidden'): ?>
                                <label for="<?php echo $input['name']; ?>" class="block text-sm font-semibold text-gray-700"><?php echo htmlspecialchars($input['label']); ?></label>
                            <?php endif; ?>
                            
                            <?php if ($input['type'] === 'textarea'): ?>
                                <textarea id="<?php echo $input['name']; ?>" name="<?php echo $input['name']; ?>" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-sm text-gray-900 <?php echo !empty($input['class']) ? htmlspecialchars($input['class']) : ''; ?>" rows="<?php echo $input['rows'] ?? 6; ?>" <?php echo !empty($input['placeholder']) ? 'placeholder="'.htmlspecialchars($input['placeholder']).'"' : ''; ?> <?php echo !empty($input['required']) ? 'required' : ''; ?>></textarea>
                            <?php elseif ($input['type'] === 'select'): ?>
                                <select id="<?php echo $input['name']; ?>" name="<?php echo $input['name']; ?>" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-sm text-gray-900" <?php echo !empty($input['required']) ? 'required' : ''; ?>>
                                    <?php foreach ($input['options'] as $val => $lbl): ?>
                                        <option value="<?php echo $val; ?>"><?php echo htmlspecialchars($lbl); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php elseif ($input['type'] === 'checkbox'): ?>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="checkbox" id="<?php echo $input['name']; ?>" name="<?php echo $input['name']; ?>" value="<?php echo htmlspecialchars($input['value'] ?? '1'); ?>" class="w-5 h-5 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary focus:ring-2 cursor-pointer" <?php echo !empty($input['checked']) ? 'checked' : ''; ?>>
                                    <span class="text-sm font-medium text-gray-700"><?php echo htmlspecialchars($input['label']); ?></span>
                                </label>
                            <?php elseif ($input['type'] === 'file'): ?>
                                <div class="file-drop-area relative block w-full border-2 border-dashed border-gray-300 hover:border-primary/50 bg-gray-50 hover:bg-blue-50/50 rounded-xl p-10 text-center cursor-pointer transition-colors group <?php echo !empty($input['sortable']) ? 'sortable-dropzone' : ''; ?>" id="dropArea-<?php echo $input['name']; ?>">
                                    <div class="text-4xl text-gray-400 group-hover:text-primary transition-colors mb-3"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                                    <div class="file-drop-msg text-lg font-semibold text-gray-700 mb-1"><?php echo !empty($input['multiple']) ? 'Drop files here' : 'Drop file here'; ?></div>
                                    <div class="file-drop-info text-sm text-gray-500">or click to browse</div>
                                    <input type="file" id="<?php echo $input['name']; ?>" name="<?php echo $input['name'] . (!empty($input['multiple']) ? '[]' : ''); ?>" class="file-drop-input absolute inset-0 w-full h-full opacity-0 cursor-pointer" <?php echo !empty($input['required']) ? 'required' : ''; ?> <?php echo !empty($input['multiple']) ? 'multiple' : ''; ?>>
                                    <div class="file-preview-list text-left mt-4 text-sm text-gray-600"></div>
                                </div>
                            <?php elseif ($input['type'] === 'range'): ?>
                                <div class="flex items-center space-x-4">
                                    <input type="range" id="<?php echo $input['name']; ?>" name="<?php echo $input['name']; ?>" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary" min="<?php echo $input['min'] ?? 0; ?>" max="<?php echo $input['max'] ?? 100; ?>" value="<?php echo $input['value'] ?? 50; ?>" oninput="document.getElementById('<?php echo $input['name']; ?>-val').innerText = this.value + '%'">
                                    <span id="<?php echo $input['name']; ?>-val" class="font-mono text-sm font-semibold text-gray-700 w-12 text-right"><?php echo $input['value'] ?? 50; ?>%</span>
                                </div>
                            <?php elseif ($input['type'] === 'cards'): ?>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 ui-cards-grid" data-name="<?php echo $input['name']; ?>">
                                    <?php foreach ($input['options'] as $val => $card): ?>
                                        <div class="ui-card cursor-pointer border-2 rounded-xl p-4 text-center transition-all <?php echo ($input['value'] ?? '') === $val ? 'border-primary bg-blue-50 text-primary active' : 'border-gray-200 bg-white hover:border-gray-300 hover:bg-gray-50 text-gray-700'; ?>" data-value="<?php echo $val; ?>">
                                            <div class="text-2xl mb-2"><?php echo $card['icon']; ?></div>
                                            <div class="font-semibold text-sm mb-1"><?php echo $card['title']; ?></div>
                                            <div class="text-xs text-gray-500"><?php echo $card['desc']; ?></div>
                                        </div>
                                    <?php endforeach; ?>
                                    <input type="hidden" name="<?php echo $input['name']; ?>" value="<?php echo $input['value'] ?? ''; ?>">
                                </div>
                            <?php elseif ($input['type'] === 'color'): ?>
                                <div class="flex items-center space-x-3 bg-gray-50 border border-gray-200 rounded-xl p-2 w-max">
                                    <input type="color" id="<?php echo $input['name']; ?>" name="<?php echo $input['name']; ?>" value="<?php echo $input['value'] ?? '#3b82f6'; ?>" class="w-10 h-10 rounded cursor-pointer border-0 bg-transparent p-0">
                                    <code class="text-sm font-mono text-gray-700 font-semibold pr-2"><?php echo $input['value'] ?? '#3b82f6'; ?></code>
                                </div>
                            <?php elseif ($input['type'] === 'hidden'): ?>
                                <input type="hidden" name="<?php echo $input['name']; ?>" id="<?php echo $input['name']; ?>" value="<?php echo htmlspecialchars($input['value'] ?? ''); ?>">
                            <?php else: ?>
                                <input type="<?php echo $input['type']; ?>" id="<?php echo $input['name']; ?>" name="<?php echo $input['name']; ?>" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-sm text-gray-900" value="<?php echo htmlspecialchars($input['value'] ?? ''); ?>" <?php echo !empty($input['placeholder']) ? 'placeholder="'.htmlspecialchars($input['placeholder']).'"' : ''; ?> <?php echo !empty($input['required']) ? 'required' : ''; ?> <?php echo ($input['type'] === 'number') ? 'step="any"' : ''; ?>>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="pt-6 border-t border-gray-100 flex items-center gap-4">
                <button type="submit" class="px-8 py-3.5 bg-primary hover:bg-primary-hover text-white font-bold rounded-xl transition-all shadow-md shadow-primary/20 flex items-center gap-2">Execute <i class="fa-solid fa-wand-magic-sparkles"></i></button>
                <button type="button" class="px-6 py-3.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-semibold rounded-xl transition-all" onclick="clearToolForm()">Clear</button>
            </div>
        </form>

        <!-- Result -->
        <div id="toolResultWrapper" class="mt-8 border-t border-gray-200 pt-8" style="display:none;">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">Output Result</h3>
                <div class="flex space-x-2">
                    <button type="button" class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors" onclick="copyToolResult()" title="Copy"><i class="fa-regular fa-copy"></i></button>
                    <button type="button" class="w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors" onclick="downloadToolResult('<?php echo htmlspecialchars($tool['slug']); ?>')" title="Download"><i class="fa-solid fa-download"></i></button>
                </div>
            </div>
            <div id="toolResult" class="bg-gray-50 border border-gray-200 rounded-xl p-4 overflow-x-auto text-sm text-gray-800 font-mono shadow-inner min-h-[100px]"></div>
        </div>
    </div>
    
    <!-- PDF Visual Editor Workspace -->
    <div id="pdf-visual-editor-workspace" style="display:none; background:#ffffff; padding:2rem; border-radius:1rem; border:1px solid #e2e8f0; margin-top:1.5rem; shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
            <h3 id="visual-editor-title" style="margin:0; font-size:1.25rem; font-weight:700;">Visual PDF Editor</h3>
            <button type="button" class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50" id="visual-editor-cancel">Cancel</button>
        </div>
        <div id="visual-editor-toolbar" style="display:flex; gap:0.75rem; margin-bottom:1rem; flex-wrap:wrap; padding-bottom:1rem; border-bottom:1px solid #e2e8f0;"></div>
        <div id="visual-editor-canvas-container" style="background:#f8fafc; padding:1.5rem; border-radius:0.5rem; border:1px dashed #cbd5e1; min-height:300px; display:flex; flex-wrap:wrap; gap:1rem; justify-content:center; align-items:flex-start; overflow-x:auto;">
            <div style="color:#64748b; padding-top:3rem;">Loading PDF Preview...</div>
        </div>
        <div style="margin-top:1.5rem; text-align:right;">
            <button type="button" class="px-6 py-2.5 bg-primary hover:bg-primary-hover text-white font-semibold flex-shrink-0 rounded-lg" id="visual-editor-apply">Apply & Process</button>
        </div>
    </div>


<!-- Content + Sidebar (SEO, FAQ, Related Tools) -->
<?php 
$categoryLabel = ucwords(str_replace('-', ' ', $tool['category']));
require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; 
?>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<!-- Schema -->
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"SoftwareApplication","name":"<?php echo htmlspecialchars($tool['title']); ?>","operatingSystem":"All","applicationCategory":"UtilitiesApplication","offers":{"@type":"Offer","price":"0","priceCurrency":"USD"}}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
function copyToolResult() {
    const res = document.getElementById('toolResult');
    const ta = res.querySelector('textarea');
    const text = ta ? ta.value : res.innerText;
    if(!text.trim()) return;
    navigator.clipboard.writeText(text).then(() => {
        if (window.showToast) showToast('Copied!');
    });
}

function downloadToolResult(slug) {
    const res = document.getElementById('toolResult');
    const ta = res.querySelector('textarea');
    const text = ta ? ta.value : res.innerText;
    if(!text.trim()) return;
    const a = document.createElement('a');
    a.href = URL.createObjectURL(new Blob([text], { type: 'text/plain' }));
    a.download = slug + '-result.txt';
    a.click();
}

function clearToolForm() {
    const form = document.querySelector('.ajax-tool-form');
    if(form) form.reset();
    document.getElementById('toolResultWrapper').style.display = 'none';
    document.getElementById('toolResult').innerHTML = '';
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.file-drop-area').forEach(area => {
        const input = area.querySelector('.file-drop-input');
        ['dragenter','dragover','dragleave','drop'].forEach(e => {
            area.addEventListener(e, ev => { ev.preventDefault(); ev.stopPropagation(); });
        });
        ['dragenter','dragover'].forEach(e => area.addEventListener(e, () => area.classList.add('dragover')));
        ['dragleave','drop'].forEach(e => area.addEventListener(e, () => area.classList.remove('dragover')));
        area.addEventListener('drop', e => { input.files = e.dataTransfer.files; });
        input.addEventListener('change', function() {
            const msg = area.querySelector('.file-drop-msg');
            if(this.files.length && msg) msg.textContent = this.files.length === 1 ? this.files[0].name : this.files.length + ' files';
        });
    });
});
</script>

<!-- CodeMirror -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/htmlmixed/htmlmixed.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('textarea').forEach(ta => {
        let mode = 'text/plain';
        if (ta.classList.contains('codemirror-json')) mode = 'application/json';
        if (ta.classList.contains('codemirror-html')) mode = 'text/html';
        if (ta.classList.contains('codemirror-css')) mode = 'text/css';
        if (ta.classList.contains('codemirror-js')) mode = 'text/javascript';
        if (mode !== 'text/plain') {
            const editor = CodeMirror.fromTextArea(ta, { lineNumbers: true, mode, matchBrackets: true, viewportMargin: Infinity });
            ta.form.addEventListener('submit', () => editor.save());
            ta.CodeMirrorEditor = editor;
        }
    });
});
</script>

<!-- PDF Dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
    window.CURRENT_TOOL_SLUG = '<?php echo $tool['slug']; ?>';
</script>
<script src="<?php echo URL_ROOT; ?>/assets/js/pdf-visual-editor.js"></script>
<?php if ($tool['slug'] === 'pdf-to-excel'): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="<?php echo URL_ROOT; ?>/assets/js/pdf-to-excel.js"></script>
<?php endif; ?>





