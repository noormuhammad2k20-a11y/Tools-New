<!-- Command Bar / Search Overlay -->
<div class="command-overlay" id="commandOverlay">
    <div class="command-backdrop" id="commandBackdrop"></div>
    <div class="command-modal">
        <div class="command-input-row">
            <i data-lucide="search" style="width:20px;height:20px"></i>
            <input type="text" class="command-input" id="commandInput" placeholder="Infrastructure search..." autocomplete="off">
            <button class="command-close" id="commandClose">ESC</button>
        </div>
        <div class="command-results" id="commandResults">
            <div class="command-empty" id="commandDefault">
                <i data-lucide="command" style="width:48px;height:48px"></i>
                <p class="command-empty-title">System Search</p>
                <p class="command-empty-desc">Input identifier to locate resource</p>
            </div>
        </div>
        <div class="command-footer">
            <div style="display:flex;align-items:center;gap:1.5rem">
                <div class="command-hint"><kbd>ENTER</kbd> Select</div>
                <div class="command-hint"><kbd>ESC</kbd> Close</div>
            </div>
            <div class="command-node">NODE_ID: ARCH_SEARCH_V2</div>
        </div>
    </div>
</div>
