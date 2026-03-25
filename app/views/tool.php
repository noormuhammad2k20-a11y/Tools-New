<?php
/**
 * ProTools Standardized Tool Template
 * Redesigned for a High-End React-Style Experience
 */
$safeCategory = str_replace('-', ' ', $tool['category'] ?? 'web');
$toolTitle = htmlspecialchars($tool['title'] ?? 'Digital Utility');
$toolDesc = htmlspecialchars($tool['desc'] ?? '');
$toolSlug = $tool['slug'] ?? '';
$isTextTool = ($tool['category'] ?? '') === 'text-tools';

// 1. Buffer the tool view to extract unique content
$toolViewPath = APP . DS . 'views' . DS . 'tools' . DS . $toolSlug . '.php';
$toolInterface = '';
$uniqueArticle = '';
$uniqueFAQ = '';

if (file_exists($toolViewPath)) {
    ob_start();
    include $toolViewPath;
    $rawViewOutput = ob_get_clean();

    // Extract Unique Article if present
    if (preg_match('/<div id="unique-article-content"[^>]*>(.*?)<\/div>/s', $rawViewOutput, $matches)) {
        $uniqueArticle = $matches[1];
        $rawViewOutput = str_replace($matches[0], '', $rawViewOutput);
    }
    
    // Extract Unique FAQ if present
    if (preg_match('/<div id="unique-faq-content"[^>]*>(.*?)<\/div>/s', $rawViewOutput, $matches)) {
        $uniqueFAQ = $matches[1];
        $rawViewOutput = str_replace($matches[0], '', $rawViewOutput);
    }

    $toolInterface = $rawViewOutput;
}

// 2. Dynamic Content Generator for Text Tools (if unique content is missing)
if ($isTextTool) {
    if (empty(trim(strip_tags($uniqueArticle)))) {
        $uniqueArticle = "
            <p class='lead'>Our <strong>{$toolTitle}</strong> is a precision-engineered utility designed for professionals who demand speed, accuracy, and absolute privacy in their text processing workflows. Whether you're a developer cleaning up code, a writer refining a manuscript, or a data analyst processing large datasets, this tool offers the granular control necessary to achieve perfect results instantly.</p>
            
            <h3>Understanding {$toolTitle}</h3>
            <p>At its core, {$toolTitle} utilizes advanced string manipulation algorithms to process your input locally. This means your data never leaves your browser, ensuring 100% security for sensitive documents, credentials, or proprietary information. The interface is optimized for high-volume text, handling thousands of lines without lag or performance degradation.</p>
            
            <h3>Why Professionals Choose ProTools</h3>
            <p>Unlike generic online converters, our suite is built with a 'Developer-First' philosophy. We prioritize clean output, predictable behavior, and a non-intrusive UI. You won't find distracting ads or unnecessary page reloads here—just a streamlined environment designed to keep you in your productive flow.</p>
            
            <h3>Optimizing Your Workflow</h3>
            <p>To get the most out of {$toolTitle}, we recommend using it as part of your broader text transformation pipeline. Many of our users pair this utility with our 'List Sorter' or 'Case Converter' to achieve complex multi-step formatting in seconds. The output generated is formatted to be clipboard-ready, allowing for immediate integration into your code editor, CMS, or document processor.</p>
        ";
    }

    if (empty(trim(strip_tags($uniqueFAQ)))) {
        $uniqueFAQ = "
            <div class='faq-item animate-fade-up'>
                <h3><i class='fa-solid fa-circle-question'></i> How does {$toolTitle} protect my data?</h3>
                <p>We use local JavaScript execution. Your text is processed entirely within your browser's memory and is never uploaded to our servers. This ensures absolute privacy for every operation.</p>
            </div>
            <div class='faq-item animate-fade-up'>
                <h3><i class='fa-solid fa-circle-question'></i> Is there a character limit for this tool?</h3>
                <p>Most modern browsers can handle several megabytes of text efficiently. For {$toolTitle}, you can typically process documents up to 500,000 characters without any issues.</p>
            </div>
            <div class='faq-item animate-fade-up'>
                <h3><i class='fa-solid fa-circle-question'></i> Can I use {$toolTitle} for commercial projects?</h3>
                <p>Yes. All utilities in the ProTools suite are free for both personal and commercial use. No attribution is required, though it is always appreciated!</p>
            </div>
        ";
    }
}
?>

<!-- 1. Hero & Breadcrumb Section -->
<div class="tool-header">
    <div class="container animate-fade-up">
        <nav class="breadcrumb">
            <a href="<?php echo URL_ROOT; ?>/">Home</a>
            <i class="fa-solid fa-chevron-right" style="font-size: 8px; opacity: 0.5;"></i>
            <a href="<?php echo URL_ROOT; ?>/category/<?php echo $tool['category'] ?? 'other'; ?>"><?php echo ucwords($safeCategory); ?></a>
            <i class="fa-solid fa-chevron-right" style="font-size: 8px; opacity: 0.5;"></i>
            <span class="active"><?php echo $toolTitle; ?></span>
        </nav>

        <div class="tool-title-section" style="margin-top: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 24px; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <div class="icon-box-primary" style="width: 48px; height: 48px; font-size: 20px;">
                        <i class="fa-solid <?php echo $tool['icon'] ?? 'fa-cube'; ?>"></i>
                    </div>
                    <div>
                        <h1 style="margin:0; font-size: 24px;"><?php echo $toolTitle; ?></h1>
                        <p class="tool-desc" style="margin: 4px 0 0; font-size: 14px; opacity: 0.8;"><?php echo $toolDesc; ?></p>
                    </div>
                </div>
                <div class="badge-secure" style="padding: 6px 14px; font-size: 11px;">
                    <i class="fa-solid fa-lock" style="font-size: 10px;"></i> SECURE LOCAL
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 2. Tool Interface Section -->
<div class="container py-4 mt-n4" style="position: relative; z-index: 10;">
    <?php if ($toolInterface): ?>
        <div class="react-card animate-fade-up shadow-lg">
            <?php echo $toolInterface; ?>
        </div>
    <?php else: ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 24px;">
            <!-- Standard Input Panel -->
            <div class="react-card">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
                    <i class="fa-solid fa-sliders" style="color: #2563eb; font-size: 16px;"></i>
                    <h2 class="modern-label" style="margin: 0; font-size: 13px;">Input</h2>
                </div>
                
                <form id="toolForm" method="POST" action="<?= url('tool/' . $toolSlug) ?>">
                    <?php foreach (($tool['inputs'] ?? []) as $input): ?>
                    <div style="margin-bottom: 20px;">
                        <label class="modern-label"><?= htmlspecialchars($input['label'] ?? '') ?></label>

                        <?php if ($input['type'] === 'textarea'): ?>
                        <textarea id="input-data" class="modern-textarea" name="<?= htmlspecialchars($input['name']) ?>" placeholder="<?= htmlspecialchars($input['placeholder'] ?? 'Paste content here...') ?>" <?= !empty($input['required']) ? 'required' : '' ?> rows="10"></textarea>
                        <?php elseif ($input['type'] === 'text'): ?>
                        <input type="text" id="input-data" class="modern-input" name="<?= htmlspecialchars($input['name']) ?>" placeholder="<?= htmlspecialchars($input['placeholder'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?>>
                        <?php elseif ($input['type'] === 'number'): ?>
                        <input type="number" id="input-data" class="modern-input" name="<?= htmlspecialchars($input['name']) ?>" value="<?= htmlspecialchars($input['value'] ?? '') ?>" <?= !empty($input['required']) ? 'required' : '' ?>>
                        <?php elseif ($input['type'] === 'file'): ?>
                        <div style="border: 2px dashed #e2e8f0; border-radius: 12px; padding: 32px; text-align: center; position: relative; transition: all 0.2s; background: #f8fafc;">
                            <input type="file" name="<?= htmlspecialchars($input['name']) ?>" <?= !empty($input['multiple']) ? 'multiple' : '' ?> <?= !empty($input['required']) ? 'required' : '' ?> style="position: absolute; inset: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                            <i class="fa-solid fa-cloud-arrow-up" style="font-size: 32px; color: #94a3b8; margin-bottom: 12px;"></i>
                            <p style="margin: 0; font-weight: 600; font-size: 13px; color: #64748b;">Drop or click to upload</p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>

                    <button type="submit" id="submitBtn" class="vibe-button" style="width: 100%; justify-content: center; height: 46px;">
                        <i class="fa-solid fa-bolt" id="submitIcon"></i>
                        <span id="submitText">Process Now</span>
                    </button>
                </form>
            </div>

            <!-- Standard Output Panel -->
            <div class="react-card" style="display: flex; flex-direction: column;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-sparkles" style="color: #2563eb; font-size: 16px;"></i>
                        <h2 class="modern-label" style="margin: 0; font-size: 13px;">Result</h2>
                    </div>
                    <div id="outputActions" style="display:none">
                        <button id="copyBtn" class="vibe-button" style="padding: 6px 12px; font-size: 12px; height: 32px;">
                            <i class="fa-solid fa-copy"></i> Copy
                        </button>
                    </div>
                </div>
                
                <div class="output-container" style="flex: 1; display: flex; flex-direction: column;">
                    <div id="outputPlaceholder" class="output-placeholder" style="flex: 1; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0; padding: 40px;">
                        <i class="fa-solid fa-terminal" style="font-size: 24px; opacity: 0.2"></i>
                        <h3 style="font-size: 14px; color: #64748b; margin-top: 12px;">Awaiting Input</h3>
                    </div>
                    <div id="outputResult" style="display:none; height: 100%;">
                        <div id="outputText" class="result-box" style="height: 100%; min-height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- 3. Features Section -->
<section class="tool-section" style="padding: 60px 0;">
    <div class="container text-center">
        <div class="tool-section-title animate-fade-up" style="margin-bottom: 40px;">
            <h2 style="font-size: 22px;">Why use ProTools <?php echo $toolTitle; ?>?</h2>
            <p style="color: #64748b; margin-top: 4px; font-size: 14px;">Professional calibration for digital workflows.</p>
        </div>
        <div class="features-grid" style="gap: 24px;">
            <div class="feature-card animate-fade-up" style="padding: 24px; border-radius: 20px;">
                <div class="feature-icon" style="width: 44px; height: 44px; font-size: 18px; margin-bottom: 16px;"><i class="fa-solid fa-lock"></i></div>
                <h3 style="font-size: 16px; margin-bottom: 8px;">Private</h3>
                <p style="font-size: 13px; margin: 0;">100% client-side. Data never leaves your device.</p>
            </div>
            <div class="feature-card animate-fade-up" style="padding: 24px; border-radius: 20px;">
                <div class="feature-icon" style="width: 44px; height: 44px; font-size: 18px; margin-bottom: 16px;"><i class="fa-solid fa-bolt-lightning"></i></div>
                <h3 style="font-size: 16px; margin-bottom: 8px;">Instant</h3>
                <p style="font-size: 13px; margin: 0;">Zero-latency processing for immediate results.</p>
            </div>
            <div class="feature-card animate-fade-up" style="padding: 24px; border-radius: 20px;">
                <div class="feature-icon" style="width: 44px; height: 44px; font-size: 18px; margin-bottom: 16px;"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                <h3 style="font-size: 16px; margin-bottom: 8px;">Pro-Grade</h3>
                <p style="font-size: 13px; margin: 0;">Clean, focused interface for maximum output.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. SEO Article Section -->
<section class="tool-section bg-surface" style="padding: 60px 0;">
    <div class="container">
        <div class="article-content animate-fade-up" style="background: white; padding: 40px; border-radius: 24px; border: 1px solid var(--border-color); font-size: 15px;">
            <?php if ($uniqueArticle): ?>
                <?php echo $uniqueArticle; ?>
            <?php else: ?>
                <h2 style="font-size: 20px; margin-bottom: 20px;">Professional Usage Guide</h2>
                <p>Our utility suite is designed for engineers, editors, and digital creators who require stable and secure tools for daily operations.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 5. FAQ Section -->
<section class="tool-section" style="padding: 60px 0;">
    <div class="container faq-container">
        <div class="tool-section-title animate-fade-up" style="margin-bottom: 40px;">
            <h2 style="font-size: 20px;">Common Questions</h2>
        </div>
        <div class="faq-list">
            <?php if ($uniqueFAQ): ?>
                <?php echo $uniqueFAQ; ?>
            <?php else: ?>
                <div class="faq-item animate-fade-up">
                    <h3 style="font-size: 15px;"><i class="fa-solid fa-circle-question"></i> Is it free?</h3>
                    <p style="font-size: 14px;">Yes, all tools are free for both personal and professional use.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- 6. Related Utilities -->
<?php if (!empty($relatedTools)): ?>
<section class="tool-section related-section" style="padding: 60px 0;">
    <div class="container">
        <div class="tool-section-title animate-fade-up" style="margin-bottom: 40px;">
            <h2 style="font-size: 20px;">Suggested Tools</h2>
        </div>
        <div class="grid-cards" style="gap: 20px;">
            <?php 
                $count = 0;
                foreach ($relatedTools as $rSlug => $rt): 
                    if ($count >= 4) break;
                    $count++;
            ?>
            <a href="<?php echo URL_ROOT; ?>/tool/<?php echo $rSlug; ?>" class="card-tool animate-fade-up" style="padding: 20px; border-radius: 16px;">
                <div class="icon-box" style="width: 40px; height: 40px; font-size: 16px;"><i class="fa-solid <?php echo $rt['icon'] ?? 'fa-link'; ?>"></i></div>
                <div class="card-content">
                    <h3 style="font-size: 15px; margin-bottom: 4px;"><?php echo htmlspecialchars($rt['title']); ?></h3>
                    <p style="font-size: 12px;"><?php echo htmlspecialchars($rt['desc'] ?? ''); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<script>window.TOOL_SLUG = <?= json_encode($toolSlug) ?>;</script>
