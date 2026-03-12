<div class="command-overlay" id="commandOverlay">
    <div class="command-backdrop" id="commandBackdrop"></div>
    
    <div class="command-modal">
        <div class="command-input-group px-4">
            <i class="bi bi-search text-zinc-400 fs-5"></i>
            <input type="text" class="command-input" id="commandInput" placeholder="Infrastructure search..." autofocus autocomplete="off">
            <button class="command-close" id="commandClose">ESC</button>
        </div>

        <div class="command-results" id="commandResults">
            <!-- Results will be injected by main.js -->
            <div class="text-center py-5">
                <i class="bi bi-command text-zinc-100 mb-3" style="font-size: 48px; opacity: 0.5;"></i>
                <p class="text-uppercase fw-bold text-zinc-900 mb-1" style="font-size: 11px; letter-spacing: 0.1em;">System Search</p>
                <p class="text-uppercase fw-bold text-zinc-400" style="font-size: 10px; letter-spacing: 0.1em;">Input identifier to locate resource</p>
            </div>
        </div>

        <div class="command-footer px-4 py-3">
            <div class="d-flex align-items-center gap-4">
               <div class="command-hint">
                 <span class="bg-white border border-zinc-200 px-2 py-1 rounded shadow-sm me-2">ENTER</span> Select
               </div>
               <div class="command-hint">
                 <span class="bg-white border border-zinc-200 px-2 py-1 rounded shadow-sm me-2">ESC</span> Close
               </div>
            </div>
            <div class="command-node text-zinc-300 fw-bold text-uppercase tracking-widest" style="font-size: 9px;">
              NODE_ID: ARCH_SEARCH_V2
            </div>
        </div>
    </div>
</div>

<template id="searchItemTemplate">
    <button class="result-item border-0 bg-transparent text-start">
        <div class="d-flex align-items-center gap-4">
            <div class="command-result-icon bg-zinc-50 border border-zinc-100 rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-file-earmark-text text-zinc-400"></i>
            </div>
            <div>
                <p class="mb-0 fw-bold text-zinc-900 tool-title" style="font-size: 14px;"></p>
                <p class="mb-0 text-zinc-400 text-uppercase fw-bold tool-category" style="font-size: 11px; letter-spacing: 0.05em;"></p>
            </div>
        </div>
        <i class="bi bi-arrow-right text-zinc-200 arrow-icon"></i>
    </button>
</template>
