<!-- Tool Interface -->
<div class="card border-0 shadow-sm transition-all" style="border-radius: var(--radius-md); overflow: hidden;">
    <div class="card-body p-6 sm:p-10">
            <div class="bg-light border rounded-4 p-4 p-md-5 font-monospace small text-muted" id="toolResult" style="min-height: 300px; white-space: pre-wrap; word-break: break-all;">
            </div>
        </div>

        <!-- Placeholder -->
        <div id="result-placeholder" class="text-center py-10 border border-dashed rounded-4 bg-light bg-opacity-50">
            <div class="display-1 text-muted opacity-10 mb-4"><i class="fa-solid fa-address-card"></i></div>
            <h6 class="fw-bold text-muted text-uppercase small tracking-widest">Auditor Ready</h6>
            <p class="small text-muted mb-0">Input a domain to extract registration milestones.</p>
        </div>
    </div>
</div>

<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'WHOIS Lookup',
    'intro_title' => 'WHOIS: Transparent Intelligence for Digital Assets',
    'intro_content' => 'WHOIS is the definitive query and response protocol for auditing the ownership, registration, and technical metadata of internet resources like domain names and IP blocks.',
    'detailed_title' => 'Registrar Auditing and Ownership Transparency',
    'detailed_content' => '<ul class="list-unstyled mt-3">
        <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Domain Lifecycle Tracking:</strong> Protect brand assets.</li>
        <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Administrative Metadata:</strong> Audit infrastructure security.</li>
        <li><i class="fa-solid fa-check-circle text-success me-2"></i><strong>High-Integrity Sourcing:</strong> Direct regitry connections.</li>
    </ul>'
]);
?>

<script>
$(document).ready(function() {
    window.onToolSuccess = function(data) {
        $('#result-placeholder').addClass('d-none');
        $('#toolResultWrapper').removeClass('d-none').addClass('animate-fade-in');
        $('#toolResult').html(data);
    };
    window.copyWhois = function() {
        navigator.clipboard.writeText($('#toolResult').text()).then(() => showToast('WHOIS record copied'));
    };
});
</script>



