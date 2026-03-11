<?php
/**
 * Tool Page View
 * Receives: $tool (array with slug, title, desc, category, inputs), $relatedTools (array)
 */
$safeCategory = str_replace('-', ' ', $tool['category'] ?? 'web');
$displayCategory = strtolower($safeCategory) === 'all' ? 'web' : $safeCategory;
$iconMap = [
    'text-tools' => 'type', 'image-tools' => 'image', 'developer-tools' => 'code',
    'security-tools' => 'shield', 'finance-tools' => 'calculator', 'unit-converters' => 'binary',
    'web-tools' => 'globe', 'math-tools' => 'calculator', 'seo-tools' => 'search',
];
?>

<div style="background:var(--white)">
    <!-- Tool Header -->
    <header class="tool-header">
        <div style="max-width:64rem">
            <div class="tool-breadcrumb">
                <a href="<?= url('') ?>">Infrastructure</a>
                <i data-lucide="chevron-right" style="width:12px;height:12px" class="tool-breadcrumb-sep"></i>
                <span class="tool-breadcrumb-current"><?= htmlspecialchars($safeCategory) ?></span>
            </div>
            <div class="tool-header-content">
                <div style="max-width:42rem;text-align:left">
                    <h1 class="tool-header-title"><?= htmlspecialchars($tool['title']) ?></h1>
                    <p class="tool-header-desc"><?= htmlspecialchars($tool['desc'] ?? '') ?></p>
                </div>
                <div class="tool-meta">
                    <div class="tool-meta-item">
                        <p class="tool-meta-label">Kernel Version</p>
                        <p class="tool-meta-value">V2.4 Stable</p>
                    </div>
                    <div class="tool-meta-divider"></div>
                    <div class="tool-meta-item">
                        <p class="tool-meta-label">Security Protocol</p>
                        <div class="tool-meta-status">
                            <div class="tool-meta-dot"></div>
                            <p class="tool-meta-value">Isolated</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Workspace Area -->
    <main class="workspace">
        <div class="workspace-grid">
            <!-- Input Module -->
            <section class="input-module">
                <div class="module-header input-header">
                    <h2 class="module-title"><i data-lucide="terminal" style="width:16px;height:16px;color:var(--zinc-400)"></i> Input Parameters</h2>
                </div>
                <div class="module-body">
                    <form id="toolForm" method="POST" action="<?= url('tool/' . $tool['slug']) ?>">
                        <?php foreach (($tool['inputs'] ?? []) as $input): ?>
                        <div class="form-group">
                            <label class="form-label"><?= htmlspecialchars($input['label'] ?? '') ?></label>

                            <?php if ($input['type'] === 'textarea'): ?>
                            <textarea name="<?= htmlspecialchars($input['name']) ?>" placeholder="<?= htmlspecialchars($input['placeholder'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?> rows="12" class="form-textarea"></textarea>
                            <?php elseif ($input['type'] === 'text'): ?>
                            <input type="text" name="<?= htmlspecialchars($input['name']) ?>" placeholder="<?= htmlspecialchars($input['placeholder'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?> class="form-input">
                            <?php elseif ($input['type'] === 'number'): ?>
                            <input type="number" name="<?= htmlspecialchars($input['name']) ?>" value="<?= htmlspecialchars($input['value'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?> class="form-input">
                            <?php elseif ($input['type'] === 'file'): ?>
                            <div class="file-upload">
                                <input type="file" name="<?= htmlspecialchars($input['name']) ?>" <?= !empty($input['multiple']) ? 'multiple' : '' ?> <?= !empty($input['required']) ? 'required' : '' ?>>
                                <div class="file-upload-icon"><i data-lucide="download" style="width:32px;height:32px"></i></div>
                                <p class="file-upload-title">Upload System Objects</p>
                                <p class="file-upload-desc">Local Processing Active</p>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>

                        <div class="form-actions">
                            <button type="submit" id="submitBtn" class="btn-submit">
                                <i data-lucide="zap" style="width:14px;height:14px;fill:currentColor" id="submitIcon"></i>
                                <span id="submitText">Run Operation</span>
                            </button>
                            <button type="button" id="resetBtn" class="btn-reset" title="Reset Module">
                                <i data-lucide="trash-2" style="width:18px;height:18px"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Output Module -->
            <section class="output-module">
                <div class="module-header output-header">
                    <h2 class="module-title"><i data-lucide="sparkles" style="width:16px;height:16px;color:var(--zinc-400)"></i> Generated Output</h2>
                    <div class="output-actions" id="outputActions" style="display:none">
                        <button class="copy-btn" id="copyBtn">
                            <i data-lucide="copy" style="width:14px;height:14px" id="copyIcon"></i>
                            <span id="copyText">Copy to Clipboard</span>
                        </button>
                        <button class="refresh-btn" id="clearOutput"><i data-lucide="refresh-cw" style="width:14px;height:14px"></i></button>
                    </div>
                </div>
                <div class="output-area">
                    <div class="output-placeholder" id="outputPlaceholder">
                        <div class="output-placeholder-icon"><i data-lucide="binary" style="width:24px;height:24px"></i></div>
                        <h3 class="output-placeholder-title">Awaiting Parameters</h3>
                        <p class="output-placeholder-desc">Populate required fields to generate results locally.</p>
                    </div>
                    <div class="output-result" id="outputResult" style="display:none">
                        <div class="output-text" id="outputText"></div>
                    </div>
                </div>
                <div class="output-footer">
                    <div class="output-footer-status">
                        <div class="output-footer-dot"></div>
                        <p class="output-footer-text">Client Encryption: Active</p>
                    </div>
                    <div class="output-footer-version">Local Node v2.4</div>
                </div>
            </section>
        </div>

        <!-- Dynamic Context Modules -->
        <div class="context-modules">
            <!-- Deployment Protocol (How to Use) -->
            <section class="section-features">
                <div class="section-header">
                    <div class="section-header-icon"><i data-lucide="help-circle" style="width:18px;height:18px"></i></div>
                    <h3 class="section-header-title">Deployment Protocol</h3>
                </div>
                <div class="steps-grid">
                    <div class="step-card"><div class="step-num">Phase 01</div><p class="step-text">Provide input data in the designated configuration area.</p></div>
                    <div class="step-card"><div class="step-num">Phase 02</div><p class="step-text">Define tool parameters and operational constraints.</p></div>
                    <div class="step-card"><div class="step-num">Phase 03</div><p class="step-text">Execute the process and retrieve standardized output.</p></div>
                </div>
            </section>

            <!-- Infrastructure Capabilities -->
            <section class="features-panel">
                <div class="features-layout">
                    <div>
                        <div class="features-label">Core Architecture</div>
                        <h3 class="features-title">Infrastructure<br>Capabilities</h3>
                        <p class="features-desc">Our <?= htmlspecialchars($displayCategory) ?> tools are built on a high-availability framework ensuring precision processing and maximum data integrity.</p>
                    </div>
                    <div class="features-list">
                        <div class="feature-item">
                            <div class="feature-icon"><i data-lucide="zap" style="width:16px;height:16px"></i></div>
                            <div><h4 class="feature-title">Optimized Throughput</h4><p class="feature-desc">Instant processing with high-performance infrastructure.</p></div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i data-lucide="shield" style="width:16px;height:16px"></i></div>
                            <div><h4 class="feature-title">Secure Processing</h4><p class="feature-desc">End-to-end security; data remains within the local session.</p></div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i data-lucide="star" style="width:16px;height:16px"></i></div>
                            <div><h4 class="feature-title">Professional Grade</h4><p class="feature-desc">Designed for rigorous developer and professional workflows.</p></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pro Tip -->
            <div class="pro-tip">
                <div class="pro-tip-icon"><i data-lucide="check-circle-2" style="width:18px;height:18px"></i></div>
                <div>
                    <h4 class="pro-tip-title">Optimization Status</h4>
                    <p class="pro-tip-desc">Utilize the <strong>Clear</strong> function within the session buffer to re-initialize task context for new operations.</p>
                </div>
            </div>

            <!-- Technical Specification (SEO Article) -->
            <section>
                <div class="section-header">
                    <div class="section-header-icon"><i data-lucide="info" style="width:18px;height:18px"></i></div>
                    <h2 class="section-header-title">Technical Specification</h2>
                </div>
                <div style="display:flex;flex-direction:column;gap:4rem">
                    <div class="seo-summary">
                        <h3 class="seo-label">Executive Summary</h3>
                        <p class="seo-text">The <strong><?= htmlspecialchars($tool['title']) ?></strong> is a high-availability utility engineered for the <?= htmlspecialchars($displayCategory) ?> cluster. Its core objective is to facilitate <?= htmlspecialchars(strtolower($tool['desc'] ?? '')) ?> with precision and isolated security. In professional environments, maintaining data integrity and operational speed is paramount. This platform provides a zero-installation, cloud-isolated environment for critical <?= htmlspecialchars($displayCategory) ?> operations.</p>
                    </div>
                    <div class="seo-columns">
                        <div>
                            <h3 class="seo-col-title"><div class="seo-col-dot"></div> Primary Objectives</h3>
                            <p class="seo-col-text">Manual data handling often introduces significant margin for error and operational friction. The <?= htmlspecialchars($tool['title']) ?> protocol automates state transformations within the <?= htmlspecialchars($displayCategory) ?> space, ensuring results adhere to standardized architectural patterns.</p>
                        </div>
                        <div>
                            <h3 class="seo-col-title"><div class="seo-col-dot"></div> Performance Metrics</h3>
                            <div class="seo-metrics">
                                <div class="seo-metric"><i data-lucide="zap" style="width:12px;height:12px"></i> Atomic Execution Speed</div>
                                <div class="seo-metric"><i data-lucide="zap" style="width:12px;height:12px"></i> High-Concurrency Support</div>
                                <div class="seo-metric"><i data-lucide="zap" style="width:12px;height:12px"></i> Precision Algorithmic Mapping</div>
                                <div class="seo-metric"><i data-lucide="zap" style="width:12px;height:12px"></i> Distributed Browser Optimization</div>
                            </div>
                        </div>
                    </div>
                    <div class="seo-privacy">
                        <div class="seo-privacy-header">
                            <i data-lucide="shield-check" style="width:20px;height:20px;color:var(--zinc-900)"></i>
                            <h3 class="seo-privacy-title">Infrastructure Privacy Status</h3>
                        </div>
                        <p class="seo-privacy-text">Cryptographic security and session isolation are foundational to this protocol. When executing the <?= htmlspecialchars($tool['title']) ?>, all data streams are processed within secure memory segments. Our commitment to the <?= htmlspecialchars($displayCategory) ?> ecosystem ensures these high-end utilities remain open-access for all verified professional nodes.</p>
                    </div>
                </div>
            </section>

            <!-- FAQ -->
            <section>
                <div class="section-header">
                    <div class="section-header-icon"><i data-lucide="help-circle" style="width:18px;height:18px"></i></div>
                    <h2 class="section-header-title">Technical Support &amp; FAQ</h2>
                </div>
                <div class="faq-list" id="faqList">
                    <?php
                    $faqs = [
                        ['q' => "What is the {$tool['title']} and how does it work?", 'a' => "The {$tool['title']} is an automated online utility that processes your input quickly and securely. Simply provide your data in the input area above and click submit to receive your formatted results instantly."],
                        ['q' => "Is the {$tool['title']} free to use?", 'a' => "Yes! All tools on ToolMaster, including the {$tool['title']}, are 100% free with no hidden limits. We believe professional {$displayCategory} utilities should be accessible to everyone."],
                        ['q' => "Is my data secure when using this tool?", 'a' => "Absolutely. Your privacy is our priority. Any data processed by the {$tool['title']} is handled securely and is never stored permanently or shared with third parties."],
                        ['q' => "Can I use the {$tool['title']} on my mobile device?", 'a' => "Yes, the {$tool['title']} is fully responsive. It works seamlessly across all devices including smartphones, tablets, and desktop computers."],
                    ];
                    foreach ($faqs as $i => $faq): ?>
                    <div class="faq-item <?= $i === 0 ? 'open' : '' ?>" data-faq>
                        <button class="faq-question" data-faq-toggle>
                            <span class="faq-question-text"><?= htmlspecialchars($faq['q']) ?></span>
                            <div class="faq-chevron"><i data-lucide="chevron-down" style="width:14px;height:14px"></i></div>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <p class="faq-answer-text"><?= htmlspecialchars($faq['a']) ?></p>
                                <div class="faq-answer-footer">
                                    <div class="faq-answer-footer-dot"></div>
                                    <p class="faq-answer-footer-text">Verified Infrastructure Documentation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>

        <!-- Related Infrastructure -->
        <?php if (!empty($relatedTools)): ?>
        <section class="related-section">
            <div class="related-header">
                <div>
                    <h2 class="related-title">Horizontal Integration</h2>
                    <p class="related-desc">Compatible utilities within the <?= htmlspecialchars($safeCategory) ?> cluster.</p>
                </div>
                <a href="<?= url('') ?>" class="related-link">Browse All Nodes <i data-lucide="arrow-right" style="width:14px;height:14px"></i></a>
            </div>
            <div class="related-grid">
                <?php foreach ($relatedTools as $rSlug => $rt): ?>
                <a href="<?= url('tool/' . $rSlug) ?>" class="tool-card">
                    <div class="tool-card-inner">
                        <div class="tool-card-header">
                            <div class="tool-card-icon"><i data-lucide="<?= $iconMap[$rt['category'] ?? ''] ?? 'file-text' ?>" style="width:22px;height:22px"></i></div>
                        </div>
                        <div class="tool-card-content">
                            <h3 class="tool-card-title"><?= htmlspecialchars($rt['title']) ?></h3>
                            <p class="tool-card-desc"><?= htmlspecialchars($rt['desc'] ?? '') ?></p>
                        </div>
                        <div class="tool-card-footer">
                            <div class="tool-card-cat">
                                <div class="tool-card-cat-dot"></div>
                                <span class="tool-card-cat-text"><?= htmlspecialchars(str_replace('-', ' ', $rt['category'] ?? '')) ?></span>
                            </div>
                            <i data-lucide="arrow-right" style="width:16px;height:16px" class="tool-card-arrow"></i>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
</div>

<!-- Pass tool slug to JS for local processing -->
<script>window.TOOL_SLUG = <?= json_encode($tool['slug']) ?>;</script>
