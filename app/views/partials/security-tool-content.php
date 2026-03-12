<?php
/**
 * Security Tool Content Partial
 * Based on the professional "SHA-256" template requested by the user.
 * 
 * Variables:
 * @var string $tool_name The name of the tool (e.g., "SHA-256")
 * @var string $intro_title The headline for the intro
 * @var string $intro_content The main description text (~100-150 words)
 * @var string $detailed_title The title for the detailed section (e.g., "Why Developers Choose...")
 * @var string $detailed_content The detailed use cases/technical info (~100-150 words)
 * @var array  $features Custom features if different from default (Lightning Fast, 100% Secure, Easy to Use)
 */

$default_features = [
    [
        'title' => 'Lightning Fast',
        'desc' => 'Get your results instantly without waiting or reloading.',
        'icon' => 'fa-solid fa-bolt'
    ],
    [
        'title' => '100% Secure',
        'desc' => 'All data processing happens securely in your own browser.',
        'icon' => 'fa-solid fa-shield-halved'
    ],
    [
        'title' => 'Easy to Use',
        'desc' => 'No complex settings, just drop your data and execute.',
        'icon' => 'fa-solid fa-wand-magic-sparkles'
    ]
];

$features = $features ?? $default_features;
?>

<div class="mt-16 max-w-4xl mx-auto space-y-16 pb-16">
    <!-- Intro Section -->
    <section>
        <h2 class="text-3xl font-bold text-slate-900 mb-6"><?php echo $intro_title ?? "$tool_name: The Backbone of Modern Security"; ?></h2>
        <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
            <?php echo $intro_content; ?>
        </div>
    </section>

    <!-- Feature Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($features as $feature): ?>
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-6">
                    <i class="<?php echo $feature['icon']; ?> text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3"><?php echo $feature['title']; ?></h3>
                <p class="text-slate-600 leading-relaxed"><?php echo $feature['desc']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Detailed Section -->
    <section>
        <h2 class="text-2xl font-bold text-slate-900 mb-6"><?php echo $detailed_title ?? "Why Professionals Choose $tool_name"; ?></h2>
        <div class="prose prose-slate prose-lg max-w-none text-slate-600 leading-relaxed">
            <?php echo $detailed_content; ?>
        </div>
    </section>

    <!-- Security Assurance -->
    <div class="bg-slate-50 rounded-2xl p-8 border border-slate-100 flex flex-col md:flex-row items-center gap-6">
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-sm shrink-0">
            <i class="fa-solid fa-lock text-green-500 text-2xl"></i>
        </div>
        <div>
            <h4 class="text-lg font-bold text-slate-900 mb-1">Local, In-Browser Processing</h4>
            <p class="text-slate-600">Your data never leaves your computer. All <?php echo $tool_name; ?> operations are performed locally using your browser's hardware acceleration for maximum privacy and speed.</p>
        </div>
    </div>
</div>
