<?php
/**
 * FAQ Section Partial
 * Requires: $tool (array with title, desc)
 */
$toolTitle = htmlspecialchars($tool['title']);
$faqs = [
    [
        'q' => "Is the {$toolTitle} free to use?",
        'a' => "Yes, absolutely! Our {$toolTitle} is 100% free with no usage limits, no registration required, and no hidden fees. You can use it as many times as you need."
    ],
    [
        'q' => "Is my data safe when using this tool?",
        'a' => "Your privacy is our top priority. All data processing happens directly in your browser. We never store, transmit, or log any of your inputs or outputs."
    ],
    [
        'q' => "Does it work on mobile devices?",
        'a' => "Yes! Our tool is fully responsive and works perfectly on smartphones, tablets, laptops, and desktop computers across all modern browsers."
    ],
    [
        'q' => "Do I need to create an account?",
        'a' => "No account or registration is needed. Simply open the tool and start using it immediately — no sign-up friction at all."
    ],
    [
        'q' => "Can I use this tool offline?",
        'a' => "Since this is a web-based tool, you need an internet connection to load the page. However, many of our tools process data locally in your browser after the page loads."
    ]
];
?>
<section class="tool-faq-section">
    <div class="container">
        <div class="tool-section-header">
            <h2 class="tool-section-title">Frequently Asked Questions</h2>
            <p class="tool-section-subtitle">Quick answers to common questions</p>
        </div>
        <div class="tool-faq-list">
            <?php foreach ($faqs as $i => $faq): ?>
            <div class="tool-faq-item <?php echo $i === 0 ? 'active' : ''; ?>">
                <button class="tool-faq-question" onclick="toggleFaq(this)">
                    <span><?php echo $faq['q']; ?></span>
                    <i class="fa-solid fa-chevron-down tool-faq-arrow"></i>
                </button>
                <div class="tool-faq-answer">
                    <p><?php echo $faq['a']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FAQ Schema for SEO -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php foreach ($faqs as $i => $faq): ?>
        {
            "@type": "Question",
            "name": <?php echo json_encode($faq['q']); ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?php echo json_encode($faq['a']); ?>
            }
        }<?php echo $i < count($faqs) - 1 ? ',' : ''; ?>
        <?php endforeach; ?>
    ]
}
</script>
