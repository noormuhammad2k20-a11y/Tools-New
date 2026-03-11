<?php
/**
 * Tool Content Sections — TinyWow Style
 * Requires: $tool (array with title, desc)
 */
$toolTitle = htmlspecialchars($tool['title']);
?>
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <!-- Article -->
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">What is the <?php echo $toolTitle; ?>?</h2>
            <p class="mb-8 leading-relaxed">The <strong><?php echo $toolTitle; ?></strong> is a free, fast, and secure online utility designed to help you <?php echo strtolower(htmlspecialchars($tool['desc'])); ?> It operates entirely in your browser — your data is never stored or sent to any server.</p>
            
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 shadow-sm border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 shadow-sm border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 shadow-sm border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4 tracking-tight">How to Use</h3>
            <ol class="list-decimal pl-5 space-y-2 mb-8">
                <li>Enter your data in the input field above.</li>
                <li>Click <strong>Execute</strong> to process the data instantly.</li>
                <li>Copy the output or download your results directly.</li>
            </ol>

            <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4 tracking-tight">Key Benefits</h3>
            <ul class="space-y-3 mb-8">
                <li class="flex items-center text-gray-600"><i class="fa-solid fa-bolt text-primary w-6"></i> Instant results — no waiting or loading screens.</li>
                <li class="flex items-center text-gray-600"><i class="fa-solid fa-lock text-primary w-6"></i> 100% private — processed locally in your browser.</li>
                <li class="flex items-center text-gray-600"><i class="fa-solid fa-infinity text-primary w-6"></i> Unlimited use — completely free forever.</li>
            </ul>
        </article>

        <!-- FAQ -->
        <div class="border-t border-gray-100 pt-10">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 tracking-tight text-center">Frequently Asked Questions</h3>
            <div class="space-y-4">
                <?php
                $faqs = [
                    ["Is the {$toolTitle} free?", "Yes — completely free with no limits, no registration, and no hidden fees."],
                    ["Is my data safe?", "Absolutely. All processing happens in your browser. We never store or transmit your data to our servers."],
                    ["Does it work on mobile?", "Yes. The tool is fully responsive and works on all modern browsers, including mobile devices and tablets."],
                ];
                foreach ($faqs as $i => $faq): ?>
                <details class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden [&_summary::-webkit-details-marker]:hidden" <?php echo $i === 0 ? 'open' : ''; ?>>
                    <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                        <?php echo $faq[0]; ?>
                        <span class="transition group-open:rotate-180">
                            <i class="fa-solid fa-chevron-down text-gray-400"></i>
                        </span>
                    </summary>
                    <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">
                        <?php echo $faq[1]; ?>
                    </div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- FAQ Schema -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                <?php foreach ($faqs as $i => $faq): ?>
                {"@type":"Question","name":<?php echo json_encode($faq[0]); ?>,"acceptedAnswer":{"@type":"Answer","text":<?php echo json_encode($faq[1]); ?>}}<?php echo $i < count($faqs) - 1 ? ',' : ''; ?>
                <?php endforeach; ?>
            ]
        }
        </script>
    </div>
</section>

