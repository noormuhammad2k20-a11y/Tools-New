<?php
/**
 * Tool Page View
 * Receives: $tool (array with slug, title, desc, category, inputs), $relatedTools (array)
 */
$safeCategory = str_replace('-', ' ', $tool['category'] ?? 'web');
$displayCategory = strtolower($safeCategory) === 'all' ? 'web' : $safeCategory;
$iconMap = [
    'text-tools' => 'bi-chat-left-text', 
    'image-tools' => 'bi-image', 
    'developer-tools' => 'bi-code-slash',
    'security-tools' => 'bi-shield-lock', 
    'finance-tools' => 'bi-lightning-charge',
    'unit-converters' => 'bi-unindent',
    'web-tools' => 'bi-globe',
    'seo-tools' => 'bi-search',
    'math-tools' => 'bi-calculator',
];
?>

<div class="bg-white">
    <!-- Tool Header -->
    <header class="tool-header">
        <div class="container-fluid px-4 px-lg-5" style="max-width: 80rem;">
            <div class="tool-breadcrumb mb-4">
                <a href="<?= url('') ?>" class="text-uppercase fw-bold text-zinc-400" style="font-size: 10px; letter-spacing: 0.15em;">Infrastructure</a>
                <i class="bi bi-chevron-right text-zinc-300 mx-2" style="font-size: 10px;"></i>
                <span class="tool-breadcrumb-current bg-zinc-100 px-2 py-1 rounded text-zinc-900 fw-bold text-uppercase" style="font-size: 10px; letter-spacing: 0.15em;"><?= htmlspecialchars($safeCategory) ?></span>
            </div>
            
            <div class="row align-items-end gy-4">
                <div class="col-lg-7 text-start">
                    <h1 class="tool-header-title text-zinc-900 fw-bold tracking-tight mb-3" style="font-size: 2.5rem;"><?= htmlspecialchars($tool['title']) ?></h1>
                    <p class="tool-header-desc text-zinc-500 font-medium mb-0" style="font-size: 1.125rem; line-height: 1.7;"><?= htmlspecialchars($tool['desc'] ?? '') ?></p>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-4 justify-content-lg-end">
                        <div class="tool-meta-item">
                            <p class="tool-meta-label text-zinc-400 fw-bold text-uppercase mb-2" style="font-size: 9px; letter-spacing: 0.1em;">Kernel Version</p>
                            <p class="tool-meta-value text-zinc-900 fw-bold mb-0" style="font-size: 12px;">V2.4 Stable</p>
                        </div>
                        <div class="vr bg-zinc-200" style="height: 2rem;"></div>
                        <div class="tool-meta-item">
                            <p class="tool-meta-label text-zinc-400 fw-bold text-uppercase mb-2" style="font-size: 9px; letter-spacing: 0.1em;">Security Protocol</p>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-emerald-500 rounded-circle" style="width: 6px; height: 6px;"></div>
                                <p class="tool-meta-value text-zinc-900 fw-bold mb-0" style="font-size: 12px;">Isolated</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Workspace Area -->
    <main class="workspace container-fluid px-4 px-lg-5 py-5" style="max-width: 80rem;">
        <div class="row g-4">
            <!-- Input Module -->
            <div class="col-lg-6">
                <section class="input-module border border-zinc-200 rounded-4 overflow-hidden shadow-sm h-100 bg-white">
                    <div class="module-header px-4 py-3 border-bottom border-zinc-100 bg-zinc-50/50 d-flex align-items-center justify-content-between">
                        <h2 class="mb-0 text-zinc-500 fw-bold text-uppercase tracking-widest" style="font-size: 10px;">
                            <i class="bi bi-terminal me-2"></i> Input Parameters
                        </h2>
                    </div>
                    <div class="module-body p-4">
                        <form id="toolForm" method="POST" action="<?= url('tool/' . $tool['slug']) ?>">
                            <?php foreach (($tool['inputs'] ?? []) as $input): ?>
                            <div class="mb-4">
                                <label class="form-label d-block text-zinc-900 fw-bold text-uppercase tracking-widest mb-2" style="font-size: 10px;"><?= htmlspecialchars($input['label'] ?? '') ?></label>

                                <?php if ($input['type'] === 'textarea'): ?>
                                <textarea name="<?= htmlspecialchars($input['name']) ?>" placeholder="<?= htmlspecialchars($input['placeholder'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?> rows="12" class="form-control form-textarea bg-zinc-50 border-zinc-200 rounded-3 p-3 font-monospace" style="font-size: 13px;"></textarea>
                                <?php elseif ($input['type'] === 'text'): ?>
                                <input type="text" name="<?= htmlspecialchars($input['name']) ?>" placeholder="<?= htmlspecialchars($input['placeholder'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?> class="form-control bg-zinc-50 border-zinc-200 rounded-3 p-3 font-monospace" style="font-size: 13px; line-height: 1;">
                                <?php elseif ($input['type'] === 'number'): ?>
                                <input type="number" name="<?= htmlspecialchars($input['name']) ?>" value="<?= htmlspecialchars($input['value'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?> class="form-control bg-zinc-50 border-zinc-200 rounded-3 p-3 font-monospace" style="font-size: 13px; line-height: 1;">
                                <?php elseif ($input['type'] === 'file'): ?>
                                <div class="file-upload border-2 border-dashed border-zinc-200 rounded-4 p-5 text-center bg-zinc-50 transition-all hover-border-zinc-300">
                                    <input type="file" name="<?= htmlspecialchars($input['name']) ?>" <?= !empty($input['multiple']) ? 'multiple' : '' ?> <?= !empty($input['required']) ? 'required' : '' ?> class="position-absolute inset-0 w-100 h-100 opacity-0 cursor-pointer">
                                    <div class="text-zinc-300 mb-3"><i class="bi bi-cloud-upload" style="font-size: 40px;"></i></div>
                                    <p class="text-zinc-900 fw-bold mb-1" style="font-size: 12px;">Upload System Objects</p>
                                    <p class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-0" style="font-size: 9px;">Local Processing Active</p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>

                            <div class="d-flex gap-2 pt-2">
                                <button type="submit" id="submitBtn" class="btn btn-pro-dark flex-grow-1">
                                    <i class="bi bi-lightning-charge-fill me-2" id="submitIcon"></i>
                                    <span id="submitText">Run Operation</span>
                                </button>
                                <button type="button" id="resetBtn" class="btn btn-pro-outline px-3" title="Reset Module">
                                    <i class="bi bi-trash3 fs-5"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <!-- Output Module -->
            <div class="col-lg-6">
                <section class="output-module border border-zinc-200 rounded-4 overflow-hidden shadow-sm h-100 bg-zinc-50/30">
                    <div class="module-header px-4 py-3 border-bottom border-zinc-100 bg-white d-flex align-items-center justify-content-between">
                        <h2 class="mb-0 text-zinc-500 fw-bold text-uppercase tracking-widest" style="font-size: 10px;">
                            <i class="bi bi-stars me-2"></i> Generated Output
                        </h2>
                        <div class="d-flex align-items-center gap-3" id="outputActions" style="display:none">
                            <button class="text-zinc-400 hover-text-zinc-900 fw-bold text-uppercase tracking-widest border-0 bg-transparent" id="copyBtn" style="font-size: 10px;">
                                <i class="bi bi-copy me-2" id="copyIcon"></i>
                                <span id="copyText">Copy Output</span>
                            </button>
                            <button class="text-zinc-300 hover-text-zinc-900 border-0 bg-transparent" id="clearOutput"><i class="bi bi-arrow-clockwise"></i></button>
                        </div>
                    </div>
                    
                    <div class="output-area p-0 flex-grow-1 position-relative" style="min-height: 480px;">
                        <div class="output-placeholder d-flex flex-column align-items-center justify-content-center text-center p-5 h-100" id="outputPlaceholder">
                            <div class="bg-white border border-zinc-100 rounded-3 shadow-sm d-flex align-items-center justify-content-center mb-4" style="width: 56px; height: 56px; color: var(--zinc-300);">
                                <i class="bi bi-binary fs-1"></i>
                            </div>
                            <h3 class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-2" style="font-size: 10px;">Awaiting Parameters</h3>
                            <p class="text-zinc-300 fw-bold text-uppercase tracking-widest mb-0" style="font-size: 9px; max-width: 180px; line-height: 1.7;">Populate required fields to generate results locally.</p>
                        </div>
                        <div class="output-result p-4 h-100" id="outputResult" style="display:none">
                            <div class="output-text bg-white border border-zinc-200 rounded-3 p-4 h-100 overflow-auto font-monospace shadow-sm" id="outputText" style="font-size: 13px; line-height: 1.8;"></div>
                        </div>
                    </div>

                    <div class="output-footer px-4 py-3 border-top border-zinc-100 bg-white d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-emerald-500 rounded-circle" style="width: 6px; height: 6px; animation: pulse 2s infinite;"></div>
                            <p class="mb-0 text-zinc-400 fw-bold text-uppercase tracking-widest" style="font-size: 9px;">Client Encryption: Active</p>
                        </div>
                        <div class="text-zinc-300 fw-bold text-uppercase tracking-widest" style="font-size: 9px;">Local Node v2.4</div>
                    </div>
                </section>
            </div>
        </div>

        <!-- Deployment Protocol -->
        <div class="mt-5 pt-5 border-top border-zinc-100">
            <div class="row gy-5">
                <div class="col-12">
                   <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="bg-zinc-50 border border-zinc-200 rounded-3 p-2 d-flex align-items-center justify-content-center text-zinc-400 shadow-sm">
                            <i class="bi bi-question-circle fs-5"></i>
                        </div>
                        <h3 class="text-zinc-900 fw-bold tracking-tight mb-0" style="font-size: 1.25rem;">Deployment Protocol</h3>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="border border-zinc-200 rounded-4 p-4 h-100 bg-white hover-border-zinc-300 transition-all">
                                <p class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-3" style="font-size: 9px;">Phase 01</p>
                                <p class="text-zinc-500 font-medium mb-0" style="font-size: 13px; line-height: 1.7;">Provide input data in the designated configuration area.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border border-zinc-200 rounded-4 p-4 h-100 bg-white hover-border-zinc-300 transition-all">
                                <p class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-3" style="font-size: 9px;">Phase 02</p>
                                <p class="text-zinc-500 font-medium mb-0" style="font-size: 13px; line-height: 1.7;">Define tool parameters and operational constraints.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border border-zinc-200 rounded-4 p-4 h-100 bg-white hover-border-zinc-300 transition-all">
                                <p class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-3" style="font-size: 9px;">Phase 03</p>
                                <p class="text-zinc-500 font-medium mb-0" style="font-size: 13px; line-height: 1.7;">Execute the process and retrieve standardized output.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Panel -->
                <div class="col-12">
                    <div class="bg-zinc-50/50 border border-zinc-200 rounded-4 p-5">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-5">
                                <p class="text-zinc-400 fw-bold text-uppercase tracking-widest mb-3" style="font-size: 10px;">Core Architecture</p>
                                <h3 class="text-zinc-900 fw-bold tracking-tight mb-3" style="font-size: 1.5rem; line-height: 1.3;">Infrastructure<br>Capabilities</h3>
                                <p class="text-zinc-500 font-medium mb-0" style="font-size: 14px; line-height: 1.7;">Our <?= htmlspecialchars($displayCategory) ?> tools are built on a high-availability framework ensuring precision processing and maximum data integrity.</p>
                            </div>
                            <div class="col-lg-7">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="d-flex align-items-start gap-4 p-4 bg-white border border-zinc-200 rounded-4 shadow-sm hover-border-zinc-300 transition-all">
                                            <div class="bg-zinc-50 border border-zinc-200 rounded-3 p-2 text-zinc-400 d-flex"><i class="bi bi-zap"></i></div>
                                            <div>
                                                <h4 class="text-zinc-900 fw-bold text-uppercase tracking-widest mb-1" style="font-size: 11px;">Optimized Throughput</h4>
                                                <p class="text-zinc-500 font-medium mb-0" style="font-size: 11px;">Instant processing with high-performance infrastructure.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex align-items-start gap-4 p-4 bg-white border border-zinc-200 rounded-4 shadow-sm hover-border-zinc-300 transition-all">
                                            <div class="bg-zinc-50 border border-zinc-200 rounded-3 p-2 text-zinc-400 d-flex"><i class="bi bi-shield-check"></i></div>
                                            <div>
                                                <h4 class="text-zinc-900 fw-bold text-uppercase tracking-widest mb-1" style="font-size: 11px;">Secure Processing</h4>
                                                <p class="text-zinc-500 font-medium mb-0" style="font-size: 11px;">End-to-end security; data remains within the local session.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pro Tip -->
                <div class="col-12">
                    <div class="bg-emerald-50/50 border border-emerald-100 rounded-4 p-4 d-flex align-items-start gap-4">
                        <div class="bg-white border border-emerald-100 rounded-3 p-2 text-emerald-600 shadow-sm d-flex"><i class="bi bi-check2-circle fs-5"></i></div>
                        <div>
                            <h4 class="text-emerald-900 fw-bold text-uppercase tracking-widest mb-1" style="font-size: 10px;">Optimization Status</h4>
                            <p class="text-emerald-700 font-medium mb-0" style="font-size: 13px; line-height: 1.7;">Utilize the <strong>Clear</strong> function within the session buffer to re-initialize task context for new operations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Section -->
        <?php if (!empty($relatedTools)): ?>
        <section class="mt-5 pt-5 border-top border-zinc-200">
            <div class="d-flex align-items-end justify-content-between mb-5">
                <div>
                    <h2 class="text-zinc-900 fw-bold tracking-tight mb-2" style="font-size: 1.5rem;">Horizontal Integration</h2>
                    <p class="text-zinc-500 font-medium mb-0" style="font-size: 14px;">Compatible utilities within the <?= htmlspecialchars($safeCategory) ?> cluster.</p>
                </div>
                <a href="<?= url('') ?>" class="text-zinc-400 hover-text-zinc-900 fw-bold text-uppercase tracking-widest d-flex align-items-center gap-2" style="font-size: 10px;">
                    Browse All Nodes <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 pb-5">
                <?php foreach ($relatedTools as $rSlug => $rt): ?>
                <div class="col">
                    <a href="<?= url('tool/' . $rSlug) ?>" class="tool-card d-flex flex-column h-100">
                        <div class="card-icon-box" style="width: 3rem; height: 3rem;">
                            <i class="bi <?= $iconMap[$rt['category']] ?? 'bi-file-earmark-text' ?> fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="card-title" style="font-size: 0.875rem;"><?= htmlspecialchars($rt['title']) ?></h3>
                            <p class="card-desc" style="font-size: 12px;"><?= htmlspecialchars($rt['desc'] ?? '') ?></p>
                        </div>
                        <div class="card-footer px-0 bg-transparent mt-4 pt-3 border-top border-zinc-100">
                            <div class="card-category">
                                <div class="cat-dot"></div>
                                <span style="font-size: 9px;"><?= htmlspecialchars(str_replace('-', ' ', $rt['category'])) ?></span>
                            </div>
                            <i class="bi bi-arrow-right text-zinc-300"></i>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
</div>

<script>window.TOOL_SLUG = <?= json_encode($tool['slug']) ?>;</script>
