<?php
// config/tools_registry.php
// Auto-fixed 2026-03-11 06:10:01 - Added default inputs to 163 tools

return array (
  'word-counter' => 
  array (
    'title' => 'Word Counter Pro',
    'desc' => 'Advanced text metrics including reading time, syllable count and keyword density.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-hashtag',
    'handler' => 'TextHandler',
    'action' => 'wordCount',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Paste your text here...',
        'required' => true,
      ),
    ),
  ),
  'uppercase-converter' => 
  array (
    'title' => 'Uppercase Converter',
    'desc' => 'Convert any text to ALL UPPERCASE letters instantly. Great for headlines and emphasis.',
    'category' => 'text-tools',
    'icon' => 'ABC',
    'handler' => 'TextHandler',
    'action' => 'uppercase',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Type text to convert...',
        'required' => true,
      ),
    ),
  ),
  'lowercase-converter' => 
  array (
    'title' => 'Lowercase Converter',
    'desc' => 'Convert completely capitalized text into lowercase format easily.',
    'category' => 'text-tools',
    'icon' => 'abc',
    'handler' => 'TextHandler',
    'action' => 'lowercase',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Type text to convert...',
        'required' => true,
      ),
    ),
  ),
  'reverse-text' => 
  array (
    'title' => 'Reverse Text Generator',
    'desc' => 'Mirror and reverse any text string from end to start.',
    'category' => 'text-tools',
    'icon' => '⇄',
    'handler' => 'TextHandler',
    'action' => 'reverse',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text to Reverse',
        'placeholder' => 'abcd...',
        'required' => true,
      ),
    ),
  ),
  'remove-extra-spaces' => 
  array (
    'title' => 'Remove Extra Spaces',
    'desc' => 'Clean up messy text by removing duplicate spaces and trim leading/trailing empty space.',
    'category' => 'text-tools',
    'icon' => '_',
    'handler' => 'TextHandler',
    'action' => 'removeSpaces',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Paste messy text here...',
        'required' => true,
      ),
    ),
  ),
  'ai-article-generator' => 
  array (
    'title' => 'AI Article & Blog Generator',
    'desc' => 'Generate high-quality blog posts and articles based on keywords and titles.',
    'category' => 'ai-powered-tools',
    'icon' => '📰',
    'handler' => 'AiHandler',
    'action' => 'articleGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'keywords',
        'type' => 'text',
        'label' => 'Keywords / Topic',
        'placeholder' => 'Future of AI, Web Development...',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'tone',
        'type' => 'select',
        'label' => 'Tone',
        'options' => 
        array (
          'informative' => 'Informative',
          'engaging' => 'Engaging',
          'technical' => 'Technical',
        ),
      ),
    ),
  ),
  'ai-content-summarizer' => 
  array (
    'title' => 'AI Content Summarizer',
    'desc' => 'Condense long articles and documents into concise, readable summaries.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-compress',
    'handler' => 'TextHandler',
    'action' => 'aiSummarizer',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'ai-youtube-script-generator' => 
  array (
    'title' => 'AI YouTube Script Generator',
    'desc' => 'Create engaging video scripts with hook, body, and call-to-action sections.',
    'category' => 'text-tools',
    'icon' => 'fa-brands fa-youtube',
    'handler' => 'TextHandler',
    'action' => 'aiYoutube',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'ai-text-humanizer' => 
  array (
    'title' => 'AI Text Humanizer',
    'desc' => 'Analyze and suggest edits to make AI text sound more human.',
    'category' => 'text-tools',
    'icon' => '🧑',
    'handler' => 'AiHandler',
    'action' => 'humanize',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Paste AI Text',
        'required' => true,
      ),
    ),
  ),
  'ai-paraphraser' => 
  array (
    'title' => 'AI Paraphraser',
    'desc' => 'Rewrite sentences and paragraphs while maintaining the original meaning.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-sync',
    'handler' => 'TextHandler',
    'action' => 'aiParaphraser',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'ai-grammar-checker' => 
  array (
    'title' => 'AI Grammar & Tone Checker',
    'desc' => 'Fix grammar mistakes and rewrite text to match a specific tone (Professional, Casual).',
    'category' => 'ai-powered-tools',
    'icon' => '✍️',
    'handler' => 'AiHandler',
    'action' => 'grammarTone',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'tone',
        'type' => 'select',
        'label' => 'Target Tone',
        'options' => 
        array (
          'professional' => 'Professional',
          'casual' => 'Casual',
          'friendly' => 'Friendly',
          'authoritative' => 'Authoritative',
        ),
      ),
    ),
  ),
  'chatgpt-mega-prompt-generator' => 
  array (
    'title' => 'ChatGPT Mega Prompt Generator',
    'desc' => 'Create ultra-detailed prompts for better AI responses.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-bolt',
    'handler' => 'TextHandler',
    'action' => 'aiPrompt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'midjourney-prompt-generator' => 
  array (
    'title' => 'Midjourney Prompt Generator',
    'desc' => 'Generate detailed descriptive prompts for AI image creation.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-palette',
    'handler' => 'TextHandler',
    'action' => 'midjourneyPrompt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'ai-image-generator' => 
  array (
    'title' => 'AI Image Generator',
    'desc' => 'Generate high-quality images from text descriptions for free with Pollinations AI.',
    'category' => 'ai-powered-tools',
    'icon' => '🎨',
    'handler' => 'AiHandler',
    'action' => 'imageGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'prompt',
        'type' => 'textarea',
        'label' => 'Describe your image',
        'placeholder' => 'A futuristic city at sunset, cinematic lighting...',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'aspect_ratio',
        'type' => 'cards',
        'label' => 'Aspect Ratio',
        'value' => '1:1',
        'options' => 
        array (
          '1:1' => 
          array (
            'title' => 'Square',
            'icon' => '⬛',
            'desc' => '1:1',
          ),
          '16:9' => 
          array (
            'title' => 'Widescreen',
            'icon' => '📺',
            'desc' => '16:9',
          ),
          '9:16' => 
          array (
            'title' => 'Mobile',
            'icon' => '📱',
            'desc' => '9:16',
          ),
        ),
      ),
      2 => 
      array (
        'name' => 'style',
        'type' => 'select',
        'label' => 'Style',
        'options' => 
        array (
          'none' => 'None',
          'photorealistic' => 'Photorealistic',
          'anime' => 'Anime',
          'cinematic' => 'Cinematic',
          '3d-render' => '3D Render',
        ),
      ),
    ),
  ),
  'ai-image-upscaler' => 
  array (
    'title' => 'AI Image Upscaler',
    'desc' => 'Enhance image quality and resolution using advanced AI models.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-up-right-and-down-left-from-center',
    'handler' => 'TextHandler',
    'action' => 'aiUpscale',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'ai-background-remover' => 
  array (
    'title' => 'AI Background Remover',
    'desc' => 'Remove image backgrounds instantly in your browser using AI-powered edge detection.',
    'category' => 'ai-powered-tools',
    'icon' => '✂️',
    'handler' => 'AiHandler',
    'action' => 'bgRemover',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Select Image',
        'required' => true,
      ),
    ),
  ),
  'ai-code-explainer' => 
  array (
    'title' => 'AI Code Explainer & Optimizer',
    'desc' => 'Explain complex code in plain English and get suggestions for better performance/quality.',
    'category' => 'ai-powered-tools',
    'icon' => '💻',
    'handler' => 'AiHandler',
    'action' => 'codeExplain',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'code',
        'type' => 'textarea',
        'label' => 'Paste your code',
        'class' => 'codemirror-js',
        'required' => true,
      ),
    ),
  ),
  'palindrome-checker' => 
  array (
    'title' => 'Palindrome Checker',
    'desc' => 'Identify if a word, phrase, or sentence reads the same backward as forward.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-arrows-left-right',
    'handler' => 'TextHandler',
    'action' => 'palindrome',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'character-frequency-analyzer' => 
  array (
    'title' => 'Character Frequency Analyzer',
    'desc' => 'Detailed breakdown of how often each character appears in your text.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-chart-pie',
    'handler' => 'TextHandler',
    'action' => 'charFreq',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'sentence-length-analyzer' => 
  array (
    'title' => 'Sentence Length Analyzer',
    'desc' => 'Measure the length of individual sentences to gauge readability and flow.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-ruler-horizontal',
    'handler' => 'TextHandler',
    'action' => 'sentenceLength',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'word-length-analyzer' => 
  array (
    'title' => 'Word Length Analyzer',
    'desc' => 'Analyze the distribution of word lengths throughout your document.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-text-width',
    'handler' => 'TextHandler',
    'action' => 'wordLength',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'random-word-generator' => 
  array (
    'title' => 'Random Word Generator',
    'desc' => 'Generate a list of random words for brainstorming or creative writing.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-shuffle',
    'handler' => 'TextHandler',
    'action' => 'randomWord',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'random-paragraph-generator' => 
  array (
    'title' => 'Random Paragraph Generator',
    'desc' => 'Create random paragraphs of text to use as placeholders or inspiration.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-quote-left',
    'handler' => 'TextHandler',
    'action' => 'randomPara',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'random-letter-generator' => 
  array (
    'title' => 'Random Letter Generator',
    'desc' => 'Generate random individual letters or sequences.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-font',
    'handler' => 'TextHandler',
    'action' => 'randomLetter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'text-column-formatter' => 
  array (
    'title' => 'Text Column Formatter',
    'desc' => 'Format plain text into neatly aligned columns.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-table-columns',
    'handler' => 'TextHandler',
    'action' => 'textColumn',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'whitespace-visualizer' => 
  array (
    'title' => 'Whitespace Visualizer',
    'desc' => 'See invisible characters like spaces, tabs, and line breaks.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-eye',
    'handler' => 'TextHandler',
    'action' => 'whiteSpace',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'unicode-inspector' => 
  array (
    'title' => 'Unicode Inspector',
    'desc' => 'Inspect the underlying Unicode values of every character in your text.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-circle-info',
    'handler' => 'TextHandler',
    'action' => 'unicode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'stop-words-remover' => 
  array (
    'title' => 'Stop Words Remover',
    'desc' => 'Clean your text by removing common words like "the", "and", and "is".',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-filter',
    'handler' => 'TextHandler',
    'action' => 'stopWords',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'slug-to-title-converter' => 
  array (
    'title' => 'Slug to Title Converter',
    'desc' => 'Convert URL-friendly slugs back into readable titles.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-heading',
    'handler' => 'TextHandler',
    'action' => 'slugTitle',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'list-randomizer' => 
  array (
    'title' => 'List Randomizer',
    'desc' => 'Shuffle the items in any list to create a random order.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-list-ol',
    'handler' => 'TextHandler',
    'action' => 'listShuffle',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'list-sorter' => 
  array (
    'title' => 'List Sorter',
    'desc' => 'Sort text lines A to Z ascending alphabetically or numerically.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-arrow-down-a-z',
    'handler' => 'TextHandler',
    'action' => 'listSort',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'list-reverse-tool' => 
  array (
    'title' => 'List Reverse Tool',
    'desc' => 'Invert the order of items in any given list.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-backward-step',
    'handler' => 'TextHandler',
    'action' => 'listReverse',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'list-deduplicator' => 
  array (
    'title' => 'List Deduplicator',
    'desc' => 'Instantly remove duplicate items from any list or collection.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-wand-sparkles',
    'handler' => 'TextHandler',
    'action' => 'listDedupe',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'list-to-json-converter' => 
  array (
    'title' => 'List to JSON Converter',
    'desc' => 'Transform plain line-separated lists into structured JSON arrays.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-file-code',
    'handler' => 'TextHandler',
    'action' => 'listToJson',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'csv-to-json-converter' => 
  array (
    'title' => 'CSV to JSON Converter',
    'desc' => 'Convert tabulated CSV data into structured JSON objects.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-table-list',
    'handler' => 'TextHandler',
    'action' => 'csvToJson',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'json-to-csv-converter' => 
  array (
    'title' => 'JSON to CSV Converter',
    'desc' => 'Convert nested JSON data arrays into standard CSV format.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-file-csv',
    'handler' => 'TextHandler',
    'action' => 'jsonToCsv',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'case-converter' => 
  array (
    'title' => 'Case Converter Pro',
    'desc' => 'Switch between common programming and writing cases instantly.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-font-case',
    'handler' => 'TextHandler',
    'action' => 'caseConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'lorem-ipsum-generator' => 
  array (
    'title' => 'Lorem Ipsum Generator',
    'desc' => 'Create custom dummy text for your design mockups with flexible options.',
    'category' => 'text-tools',
    'icon' => '📜',
    'handler' => 'TextHandler',
    'action' => 'loremIpsum',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'paragraphs',
        'type' => 'number',
        'label' => 'Paragraphs',
        'value' => '3',
      ),
      1 => 
      array (
        'name' => 'type',
        'type' => 'select',
        'label' => 'Type',
        'options' => 
        array (
          'std' => 'Standard',
          'words' => 'Words',
          'bytes' => 'Bytes',
        ),
      ),
    ),
  ),
  'text-to-binary-hex' => 
  array (
    'title' => 'Text to Binary/Hex/Octal',
    'desc' => 'Encode text into machine-readable binary, hex, or octal strings.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-microchip',
    'handler' => 'TextHandler',
    'action' => 'textToMachine',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'binary-hex-to-text' => 
  array (
    'title' => 'Binary/Hex to Text',
    'desc' => 'Decode machine data (Binary, Hex, Octal) back to human-readable text.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-user-gear',
    'handler' => 'TextHandler',
    'action' => 'machineToText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'base64-encoder-decoder' => 
  array (
    'title' => 'Base64 Encoder/Decoder',
    'desc' => 'Convert text to Base64 format and back, with URL-safe support.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-shield-halved',
    'handler' => 'TextHandler',
    'action' => 'base64',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'url-encoder-decoder' => 
  array (
    'title' => 'URL Encoder/Decoder',
    'desc' => 'Precisely encode or decode URL parameters for web compatibility.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-link',
    'handler' => 'TextHandler',
    'action' => 'urlEncDec',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'html-entity-encoder-decoder' => 
  array (
    'title' => 'HTML Entity Encoder/Decoder',
    'desc' => 'Convert special characters to HTML entities for security and rendering.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-code-compare',
    'handler' => 'TextHandler',
    'action' => 'htmlEntities',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'text-reverser' => 
  array (
    'title' => 'Text Reverser Pro',
    'desc' => 'Instantly flip characters, words, or lines for creative styling.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-arrows-rotate',
    'handler' => 'TextHandler',
    'action' => 'textReverse',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'upside-down-text' => 
  array (
    'title' => 'Upside Down Text',
    'desc' => 'ʇxǝʇ uʍop ǝpısdn Generate inverted text for fun messages.',
    'category' => 'social-tools',
    'icon' => 'uʍop',
    'handler' => 'SocialHandler',
    'action' => 'upsideDown',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter text to invert',
        'required' => true,
      ),
    ),
  ),
  'old-english-text' => 
  array (
    'title' => 'Old English Text Generator',
    'desc' => 'Transform modern text into majestic Gothic and Fraktur styles.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-feather-pointed',
    'handler' => 'TextHandler',
    'action' => 'oldEnglish',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'cursive-text-generator' => 
  array (
    'title' => 'Cursive Text Generator',
    'desc' => 'Convert standard text into elegant script and calligraphy styles.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-signature',
    'handler' => 'TextHandler',
    'action' => 'cursiveText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'css-filter-generator' => 
  array (
    'title' => 'CSS Filter Generator',
    'desc' => 'Apply grayscale, blur, sepia and other visual effects to images using CSS filters.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-wand-magic-sparkles',
    'handler' => 'TextHandler',
    'action' => 'cssFilter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'css-clip-path-maker' => 
  array (
    'title' => 'CSS Clip-path Maker',
    'desc' => 'Create complex shapes and clip-paths visually with drag-and-drop support.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-shapes',
    'handler' => 'TextHandler',
    'action' => 'cssClipPath',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'json-schema-generator' => 
  array (
    'title' => 'JSON Schema Generator',
    'desc' => 'Automatically generate valid JSON Schema draft-07 from your JSON data.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-sitemap',
    'handler' => 'TextHandler',
    'action' => 'jsonSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'curl-to-code-converter' => 
  array (
    'title' => 'Curl to Code Converter',
    'desc' => 'Transform cURL commands into JavaScript, PHP, Python, and Go code snippets.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-terminal',
    'handler' => 'TextHandler',
    'action' => 'curlToCode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'base64-encode' => 
  array (
    'title' => 'Base64 Encoder',
    'desc' => 'Encode strings into Base64 format securely. Standard web safe encoding tool.',
    'category' => 'developer-tools',
    'icon' => '64↑',
    'handler' => 'DevHandler',
    'action' => 'base64encode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'String to Encode',
        'placeholder' => 'Plain text...',
        'required' => true,
      ),
    ),
  ),
  'base64-decode' => 
  array (
    'title' => 'Base64 Decoder',
    'desc' => 'Decode Base64 strings back to normal text string payload instantly.',
    'category' => 'developer-tools',
    'icon' => '64↓',
    'handler' => 'DevHandler',
    'action' => 'base64decode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Base64 String',
        'placeholder' => 'aGVsbG8...',
        'required' => true,
      ),
    ),
  ),
  'url-encoder' => 
  array (
    'title' => 'URL Encoder',
    'desc' => 'Encode URLs and parameters to be web safe by escaping special characters.',
    'category' => 'developer-tools',
    'icon' => '🔗↑',
    'handler' => 'DevHandler',
    'action' => 'urlencode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'String to encode',
        'required' => true,
      ),
    ),
  ),
  'url-decoder' => 
  array (
    'title' => 'URL Decoder',
    'desc' => 'Reverse an encoded URL back to its human readable format.',
    'category' => 'developer-tools',
    'icon' => '🔗↓',
    'handler' => 'DevHandler',
    'action' => 'urldecode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Encoded String',
        'required' => true,
      ),
    ),
  ),
  'md5-generator' => 
  array (
    'title' => 'MD5 Generator (Pro)',
    'desc' => 'Generate highly secure 128-bit MD5 fingerprints for any text data or secret keys.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-hashtag',
    'handler' => 'DevHandler',
    'action' => 'md5',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'sha1-generator' => 
  array (
    'title' => 'SHA-1 Generator (Pro)',
    'desc' => 'Create secure 160-bit SHA-1 message digests for data verification and legacy systems.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-shield-halved',
    'handler' => 'DevHandler',
    'action' => 'sha1',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'sha256-generator' => 
  array (
    'title' => 'SHA-256 Generator (Pro)',
    'desc' => 'Generate cryptographically secure 256-bit hashes using the industry-standard SHA-2 algorithm.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-lock',
    'handler' => 'DevHandler',
    'action' => 'sha256',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'uuid-generator' => 
  array (
    'title' => 'UUID v4 Generator (Pro)',
    'desc' => 'Generate cryptographically secure, universally unique identifiers for your systems.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-id-card',
    'handler' => 'DevHandler',
    'action' => 'uuid',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'jwt-decoder' => 
  array (
    'title' => 'JWT Decoder (Pro)',
    'desc' => 'Securely parse and inspect JSON Web Tokens (JWT) to view headers, payloads, and claims.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-user-secret',
    'handler' => 'DevHandler',
    'action' => 'jwtDecoder',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'bcrypt-generator' => 
  array (
    'title' => 'Bcrypt Generator (Pro)',
    'desc' => 'Securely hash passwords with adaptive cost factors using the industry-standard Bcrypt algorithm.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-key',
    'handler' => 'DevHandler',
    'action' => 'bcrypt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'json-to-csv' => 
  array (
    'title' => 'JSON to CSV Converter',
    'desc' => 'Convert flat or nested JSON data arrays seamlessly into Comma Separated Values (CSV).',
    'category' => 'developer-tools',
    'icon' => '{,}→',
    'handler' => 'DevHandler',
    'action' => 'jsonToCsv',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Valid JSON Data',
        'placeholder' => '[{"id":1,"name":"John"}]',
        'required' => true,
      ),
    ),
  ),
  'csv-to-json' => 
  array (
    'title' => 'CSV to JSON Converter',
    'desc' => 'Convert CSV data to structured JSON format instantly.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-file-csv',
    'handler' => 'DevHandler',
    'action' => 'noop',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'csv',
        'type' => 'textarea',
        'label' => 'CSV Content',
        'required' => true,
      ),
    ),
  ),
  'sql-formatter' => 
  array (
    'title' => 'SQL Query Formatter',
    'desc' => 'Format and beautify your SQL queries for better readability.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-database',
    'handler' => 'DevHandler',
    'action' => 'noop',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'sql',
        'type' => 'textarea',
        'label' => 'SQL Query',
        'placeholder' => 'SELECT * FROM users WHERE id = 1',
        'required' => true,
      ),
    ),
  ),
  'color-contrast-checker' => 
  array (
    'title' => 'Color Contrast Checker',
    'desc' => 'Calculate WCAG accessibility ratio between background and foreground colors to ensure readability.',
    'category' => 'developer-tools',
    'icon' => '🎨✅',
    'handler' => 'DevHandler',
    'action' => 'colorContrast',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'bg',
        'type' => 'color',
        'label' => 'Background Color',
        'value' => '#ffffff',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'fg',
        'type' => 'color',
        'label' => 'Foreground Text Color',
        'value' => '#000000',
        'required' => true,
      ),
    ),
  ),
  'percentage-calculator' => 
  array (
    'title' => 'Percentage Calculator',
    'desc' => 'Calculate percentages effortlessly. Figure out what percent one value is of another.',
    'category' => 'math-calculators',
    'icon' => '%',
    'handler' => 'MathHandler',
    'action' => 'percentage',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'What is',
        'placeholder' => '20',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'total',
        'type' => 'number',
        'label' => '% of',
        'placeholder' => '100',
        'required' => true,
      ),
    ),
  ),
  'margin-calculator' => 
  array (
    'title' => 'Margin Calculator',
    'desc' => 'Determine gross profit margin percentage from item cost and total revenue.',
    'category' => 'math-tools',
    'icon' => '%',
    'handler' => 'MathHandler',
    'action' => 'margin',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'cost',
        'type' => 'number',
        'label' => 'Cost of Goods',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'revenue',
        'type' => 'number',
        'label' => 'Total Revenue',
        'required' => true,
      ),
    ),
  ),
  'password-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Strong Password Generator',
    'desc' => 'Generate highly secure, random passwords protecting against brute force attacks.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-key',
    'handler' => 'GeneratorHandler',
    'action' => 'password',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'length',
        'type' => 'number',
        'label' => 'Length',
        'value' => '16',
        'required' => true,
      ),
    ),
  ),
  'bip39-seed-generator' => 
  array (
    'title' => '[Ultra Bst Pro] BIP39 Seed Phrase Generator',
    'desc' => 'Generate cryptographically secure 12 or 24-word BIP39 mnemonic recovery phrases.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-phrase-list',
    'handler' => 'GeneratorHandler',
    'action' => 'bip39',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'words',
        'type' => 'number',
        'label' => 'Phrase Length (12 or 24)',
        'value' => '12',
        'required' => true,
      ),
    ),
  ),
  'grammar-checker-pro' => 
  array (
    'title' => 'Grammar Checker PRO',
    'desc' => 'Advanced AI-powered style and grammar analysis for professional writing.',
    'category' => 'text-tools',
    'icon' => '✍️',
    'handler' => 'TextHandler',
    'action' => 'grammarChecker',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Paste your draft here...',
        'required' => true,
      ),
    ),
  ),
  'advanced-sentiment-analyzer' => 
  array (
    'title' => 'Sentiment Analyzer',
    'desc' => 'Deep linguistic analysis to detect emotional tone and intensity of text.',
    'category' => 'text-tools',
    'icon' => '🧠',
    'handler' => 'TextHandler',
    'action' => 'advancedSentiment',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Customer feedback or social posts...',
        'required' => true,
      ),
    ),
  ),
  'readability-hub-pro' => 
  array (
    'title' => 'Readability Score',
    'desc' => 'Comprehensive scoring using Flesch-Kincaid and Gunning Fog indexes.',
    'category' => 'text-tools',
    'icon' => '📖',
    'handler' => 'TextHandler',
    'action' => 'readabilityHub',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Min. 100 characters...',
        'required' => true,
      ),
    ),
  ),
  'keyword-density-checker-seo' => 
  array (
    'title' => 'Keyword Density',
    'desc' => 'SEO-focused n-gram analyzer for 1, 2, and 3-word phrase frequency.',
    'category' => 'text-tools',
    'icon' => '📈',
    'handler' => 'TextHandler',
    'action' => 'advancedKeywordDensity',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Article text for SEO analysis...',
        'required' => true,
      ),
    ),
  ),
  'case-converter-premium' => 
  array (
    'title' => 'Case Converter PRO',
    'desc' => 'Switch between common programming and writing cases instantly.',
    'category' => 'text-tools',
    'icon' => 'Aa',
    'handler' => 'TextHandler',
    'action' => 'caseConverterPro',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input Text',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'type',
        'type' => 'cards',
        'label' => 'Select Target Case',
        'value' => 'sentence',
        'options' => 
        array (
          'sentence' => 
          array (
            'title' => 'Sentence',
            'icon' => 'Aa',
            'desc' => 'Upper first char',
          ),
          'title' => 
          array (
            'title' => 'Title',
            'icon' => 'AB',
            'desc' => 'Capitalize Every Word',
          ),
          'camel' => 
          array (
            'title' => 'camelCase',
            'icon' => 'cC',
            'desc' => 'Variable style',
          ),
          'pascal' => 
          array (
            'title' => 'Pascal',
            'icon' => 'PC',
            'desc' => 'Class style',
          ),
          'snake' => 
          array (
            'title' => 'snake_case',
            'icon' => 's_c',
            'desc' => 'Database style',
          ),
          'kebab' => 
          array (
            'title' => 'kebab-case',
            'icon' => 'k-c',
            'desc' => 'URL style',
          ),
        ),
        'required' => true,
      ),
    ),
  ),
  'image-resizer-pro' => 
  array (
    'title' => '[Ultra Bst Pro] Advanced Image Resizer',
    'desc' => 'Resize Any Image Online — Free & Instant. Choose custom dimensions and format.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-expand',
    'handler' => 'ImageHandler',
    'action' => 'imageResizer',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'batch-image-compressor' => 
  array (
    'title' => 'Batch Image Compressor',
    'desc' => 'Compress multiple images at once to WebP format for maximum efficiency.',
    'category' => 'image-tools',
    'icon' => '📁',
    'handler' => 'ImageHandler',
    'action' => 'batchCompressor',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'images',
        'type' => 'file',
        'label' => 'Select Images',
        'multiple' => true,
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'quality',
        'type' => 'number',
        'label' => 'Quality (1-100)',
        'value' => '70',
        'required' => true,
      ),
    ),
  ),
  'color-palette-extractor' => 
  array (
    'title' => 'Color Palette Extractor',
    'desc' => 'Extract dominant colors from any image for your design projects.',
    'category' => 'design-tools',
    'icon' => '🎨',
    'handler' => 'DesignHandler',
    'action' => 'colorExtract',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'image-filter-pro' => 
  array (
    'title' => 'Advanced Image Filters',
    'desc' => 'Apply high-quality filters to your photos instantly using GPU-ready effects.',
    'category' => 'image-tools',
    'icon' => '🎭',
    'handler' => 'ImageHandler',
    'action' => 'imageFilterPro',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'filter',
        'type' => 'cards',
        'label' => 'Select Filter',
        'value' => 'grayscale',
        'options' => 
        array (
          'grayscale' => 
          array (
            'title' => 'B&W',
            'icon' => '📷',
            'desc' => 'Noir Style',
          ),
          'sepia' => 
          array (
            'title' => 'Sepia',
            'icon' => '📜',
            'desc' => 'Vintage Era',
          ),
          'invert' => 
          array (
            'title' => 'Invert',
            'icon' => '🌓',
            'desc' => 'Negative',
          ),
          'blur' => 
          array (
            'title' => 'Blur',
            'icon' => '🌫',
            'desc' => 'Soft Focus',
          ),
          'brightness' => 
          array (
            'title' => 'Glow',
            'icon' => '☀️',
            'desc' => 'Extra Bright',
          ),
        ),
        'required' => true,
      ),
    ),
  ),
  'syntax-highlighter-pro' => 
  array (
    'title' => 'Syntax Highlighter',
    'desc' => 'Beautifully highlight your code with Pro themes and line numbering.',
    'category' => 'developer-tools',
    'icon' => '🌈',
    'handler' => 'DevHandler',
    'action' => 'syntaxHighlighter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Paste Code',
        'placeholder' => 'System.out.println("Hello World");',
        'required' => true,
        'class' => 'codemirror-js',
      ),
      1 => 
      array (
        'name' => 'lang',
        'type' => 'cards',
        'label' => 'Select Language',
        'value' => 'javascript',
        'options' => 
        array (
          'javascript' => 
          array (
            'title' => 'JS',
            'icon' => 'JS',
            'desc' => 'JavaScript',
          ),
          'php' => 
          array (
            'title' => 'PHP',
            'icon' => '🐘',
            'desc' => 'PHP',
          ),
          'python' => 
          array (
            'title' => 'Py',
            'icon' => '🐍',
            'desc' => 'Python',
          ),
          'html' => 
          array (
            'title' => 'HTML',
            'icon' => '<>',
            'desc' => 'HTML5',
          ),
          'css' => 
          array (
            'title' => 'CSS',
            'icon' => '{}',
            'desc' => 'CSS3',
          ),
          'sql' => 
          array (
            'title' => 'SQL',
            'icon' => 'DB',
            'desc' => 'MySQL/Postgre',
          ),
        ),
        'required' => true,
      ),
    ),
  ),
  'advanced-regex-tester' => 
  array (
    'title' => 'Regex Tester PRO',
    'desc' => 'Instant regex testing with match highlighting and group capture.',
    'category' => 'developer-tools',
    'icon' => '🔍',
    'handler' => 'DevHandler',
    'action' => 'regexTester',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'regex',
        'type' => 'text',
        'label' => 'Regular Expression',
        'placeholder' => '[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,}',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'flags',
        'type' => 'text',
        'label' => 'Flags (g, i, m)',
        'value' => 'g',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Test String',
        'placeholder' => 'Enter text to test against...',
        'required' => true,
      ),
    ),
  ),
  'emi-calculator-pro' => 
  array (
    'title' => 'EMI Calculator PRO',
    'desc' => 'Interactive loan calculator with principal vs interest breakdown charts.',
    'category' => 'finance-tools',
    'icon' => '📉',
    'handler' => 'FinanceHandler',
    'action' => 'emiPro',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'p',
        'type' => 'number',
        'label' => 'Loan Amount',
        'value' => '100000',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Interest Rate (%)',
        'value' => '10.5',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'n',
        'type' => 'number',
        'label' => 'Tenure (Months)',
        'value' => '12',
        'required' => true,
      ),
    ),
  ),
  'sip-calculator-pro' => 
  array (
    'title' => 'SIP Investment Planner',
    'desc' => 'Calculate your future wealth with interactive compounding visualizations.',
    'category' => 'finance-tools',
    'icon' => '🚀',
    'handler' => 'FinanceHandler',
    'action' => 'sipCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'monthly',
        'type' => 'number',
        'label' => 'Monthly Investment',
        'value' => '5000',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'rate',
        'type' => 'number',
        'label' => 'Expected Return (%)',
        'value' => '12',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'years',
        'type' => 'number',
        'label' => 'Time Period (Years)',
        'value' => '10',
        'required' => true,
      ),
    ),
  ),
  'line-counter' => 
  array (
    'title' => 'Line Counter',
    'desc' => 'Count the exact number of lines in a given text document.',
    'category' => 'text-tools',
    'icon' => '☰',
    'handler' => 'TextHandler',
    'action' => 'lineCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Data',
        'required' => true,
      ),
    ),
  ),
  'vowel-counter' => 
  array (
    'title' => 'Vowel Counter',
    'desc' => 'Count total vowels (A, E, I, O, U) inside a string.',
    'category' => 'text-tools',
    'icon' => 'A',
    'handler' => 'TextHandler',
    'action' => 'vowelCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Data',
        'required' => true,
      ),
    ),
  ),
  'consonant-counter' => 
  array (
    'title' => 'Consonant Counter',
    'desc' => 'Count absolute number of consonants in a string.',
    'category' => 'text-tools',
    'icon' => 'B',
    'handler' => 'TextHandler',
    'action' => 'consonantCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Data',
        'required' => true,
      ),
    ),
  ),
  'syllable-counter' => 
  array (
    'title' => 'Syllable Counter',
    'desc' => 'Estimate the number of syllables in an English text block.',
    'category' => 'text-tools',
    'icon' => 'S',
    'handler' => 'TextHandler',
    'action' => 'syllableCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Data',
        'required' => true,
      ),
    ),
  ),
  'sentence-counter' => 
  array (
    'title' => 'Sentence Counter',
    'desc' => 'Quickly determine exactly how many sentences are in your paragraph.',
    'category' => 'text-tools',
    'icon' => '.',
    'handler' => 'TextHandler',
    'action' => 'sentenceCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Data',
        'required' => true,
      ),
    ),
  ),
  'paragraph-counter' => 
  array (
    'title' => 'Paragraph Counter',
    'desc' => 'Count the total number of paragraphs separated by line breaks.',
    'category' => 'text-tools',
    'icon' => 'P',
    'handler' => 'TextHandler',
    'action' => 'paragraphCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Data',
        'required' => true,
      ),
    ),
  ),
  'space-counter' => 
  array (
    'title' => 'Space Counter',
    'desc' => 'Find exactly how many empty spaces exist in your string.',
    'category' => 'text-tools',
    'icon' => '_',
    'handler' => 'TextHandler',
    'action' => 'spaceCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Data',
        'required' => true,
      ),
    ),
  ),
  'title-case-converter' => 
  array (
    'title' => 'Title Case',
    'desc' => 'Capitalize the first letter of every word (Title Case format).',
    'category' => 'text-tools',
    'icon' => 'Aa',
    'handler' => 'TextHandler',
    'action' => 'titleCase',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to format',
        'required' => true,
      ),
    ),
  ),
  'camel-case-converter' => 
  array (
    'title' => 'Camel Case',
    'desc' => 'Convert text to standard programmatic camelCase.',
    'category' => 'text-tools',
    'icon' => 'cC',
    'handler' => 'TextHandler',
    'action' => 'camelCase',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to format',
        'required' => true,
      ),
    ),
  ),
  'snake-case-converter' => 
  array (
    'title' => 'Snake Case',
    'desc' => 'Convert text to programmatic snake_case format.',
    'category' => 'text-tools',
    'icon' => 's_c',
    'handler' => 'TextHandler',
    'action' => 'snakeCase',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to format',
        'required' => true,
      ),
    ),
  ),
  'pascal-case-converter' => 
  array (
    'title' => 'Pascal Case',
    'desc' => 'Convert string to standard PascalCase string representation.',
    'category' => 'text-tools',
    'icon' => 'PC',
    'handler' => 'TextHandler',
    'action' => 'pascalCase',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to format',
        'required' => true,
      ),
    ),
  ),
  'kebab-case-converter' => 
  array (
    'title' => 'Kebab Case',
    'desc' => 'Parse text out into valid-url kebab-case-format.',
    'category' => 'text-tools',
    'icon' => 'k-c',
    'handler' => 'TextHandler',
    'action' => 'kebabCase',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to format',
        'required' => true,
      ),
    ),
  ),
  'text-sorter' => 
  array (
    'title' => 'Text Sorter',
    'desc' => 'Sort text lines A to Z ascending alphabetically.',
    'category' => 'text-tools',
    'icon' => 'A-Z',
    'handler' => 'TextHandler',
    'action' => 'textSorter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Lines to sort',
        'required' => true,
      ),
    ),
  ),
  'reverse-words' => 
  array (
    'title' => 'Reverse Words',
    'desc' => 'Reverse the order of words in a sentence structure.',
    'category' => 'text-tools',
    'icon' => '⇄',
    'handler' => 'TextHandler',
    'action' => 'reverseWords',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to reverse',
        'required' => true,
      ),
    ),
  ),
  'remove-empty-lines' => 
  array (
    'title' => 'Remove Empty Lines',
    'desc' => 'Filter string and completely strip all blank empty line feeds.',
    'category' => 'text-tools',
    'icon' => '≡',
    'handler' => 'TextHandler',
    'action' => 'removeEmptyLines',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text',
        'required' => true,
      ),
    ),
  ),
  'remove-duplicate-words' => 
  array (
    'title' => 'Remove Duplicates',
    'desc' => 'Extract a list containing only unique consecutive words.',
    'category' => 'text-tools',
    'icon' => '1',
    'handler' => 'TextHandler',
    'action' => 'removeDuplicateWords',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text',
        'required' => true,
      ),
    ),
  ),
  'extract-emails' => 
  array (
    'title' => 'Extract Emails',
    'desc' => 'Find and extract all standard email addresses dumped in text.',
    'category' => 'text-tools',
    'icon' => '@',
    'handler' => 'TextHandler',
    'action' => 'extractEmails',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text Data',
        'required' => true,
      ),
    ),
  ),
  'find-and-replace' => 
  array (
    'title' => 'Find and Replace',
    'desc' => 'Quickly find and replace text strings within long content.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-search',
    'handler' => 'DevHandler',
    'action' => 'csvToJson',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Original Text',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'find',
        'type' => 'text',
        'label' => 'Find what',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'replace',
        'type' => 'text',
        'label' => 'Replace with',
        'required' => true,
      ),
    ),
  ),
  'string-to-slug' => 
  array (
    'title' => 'String to Slug',
    'desc' => 'Convert an article title directly to an SEO-friendly URL slug.',
    'category' => 'text-tools',
    'icon' => '🔗',
    'handler' => 'TextHandler',
    'action' => 'stringToSlug',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'String Title',
        'required' => true,
      ),
    ),
  ),
  'html-minifier' => 
  array (
    'title' => 'HTML Minifier',
    'desc' => 'Compress HTML size efficiently using powerful regex.',
    'category' => 'developer-tools',
    'icon' => '<>',
    'handler' => 'DevHandler',
    'action' => 'htmlMinifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Raw HTML',
        'required' => true,
      ),
    ),
  ),
  'css-minifier' => 
  array (
    'title' => 'CSS Minifier (Pro)',
    'desc' => 'Optimize CSS files for production by stripping unnecessary characters and formatting.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-file-contract',
    'handler' => 'DevHandler',
    'action' => 'cssMinifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'js-minifier' => 
  array (
    'title' => 'JavaScript Minifier',
    'desc' => 'Compress JavaScript code by removing whitespace and comments to boost performance.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-compress',
    'handler' => 'DevHandler',
    'action' => 'jsMinifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'json-validator' => 
  array (
    'title' => 'JSON Validator',
    'desc' => 'Strictly format and validate standard JSON encoded properties.',
    'category' => 'developer-tools',
    'icon' => '{}',
    'handler' => 'DevHandler',
    'action' => 'jsonValidator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'JSON Data',
        'required' => true,
      ),
    ),
  ),
  'url-parser' => 
  array (
    'title' => 'URL Parser',
    'desc' => 'Break a URL down into fragment, host, path, and scheme sets.',
    'category' => 'developer-tools',
    'icon' => '🔗',
    'handler' => 'DevHandler',
    'action' => 'urlParser',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Absolute URL',
        'required' => true,
      ),
    ),
  ),
  'html-entity-encode' => 
  array (
    'title' => 'HTML Entity Encode',
    'desc' => 'Securely encode special characters into their HTML entity equivalents.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-code-branch',
    'handler' => 'DevHandler',
    'action' => 'htmlEntityEncode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'html-entity-decode' => 
  array (
    'title' => 'HTML Entity Decode',
    'desc' => 'Convert HTML entities back into their original readable characters.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-code',
    'handler' => 'DevHandler',
    'action' => 'htmlEntityDecode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'ipv4-to-ipv6' => 
  array (
    'title' => 'IPv4 to IPv6',
    'desc' => 'Map standard IPv4 addresses to their IPv6 transition equivalents.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-arrows-split-up-and-left',
    'handler' => 'DevHandler',
    'action' => 'ipv4ToIpv6',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'http-status-checker' => 
  array (
    'title' => 'HTTP Status Checker',
    'desc' => 'Instant lookup for all standard HTTP status codes and their meanings.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-server',
    'handler' => 'DevHandler',
    'action' => 'httpStatus',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'meta-tags-generator' => 
  array (
    'title' => 'Meta Tags Generator',
    'desc' => 'Create SEO-friendly HTML meta tags to improve search engine rankings.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-rectangle-ad',
    'handler' => 'DevHandler',
    'action' => 'metaTags',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'css-box-shadow' => 
  array (
    'title' => 'CSS Box Shadow',
    'desc' => 'Visually design and generate code for professional CSS3 box shadows.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-layer-group',
    'handler' => 'DevHandler',
    'action' => 'boxShadow',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'hex-to-rgb' => 
  array (
    'title' => 'HEX to RGB',
    'desc' => 'Convert web HEX colors to RGB or RGBA values with real-time preview.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-palette',
    'handler' => 'DevHandler',
    'action' => 'hexToRgb',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'rgb-to-hex' => 
  array (
    'title' => 'RGB to HEX',
    'desc' => 'Convert RGB color values to their Hexadecimal equivalents.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-fill-drip',
    'handler' => 'DevHandler',
    'action' => 'rgbToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'random-color-palette' => 
  array (
    'title' => 'Color Palette Generator',
    'desc' => 'Yield randomly matched distinct hex web color strings natively.',
    'category' => 'developer-tools',
    'icon' => '🎨',
    'handler' => 'DevHandler',
    'action' => 'randomColorPalette',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'qr-code' => 
  array (
    'title' => 'QR Code Generator',
    'desc' => 'Create a 2D QR visual payload code representation natively.',
    'category' => 'developer-tools',
    'icon' => '📱',
    'handler' => 'DevHandler',
    'action' => 'qrCode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'String to Map',
        'required' => true,
      ),
    ),
  ),
  'addition-calculator' => 
  array (
    'title' => 'Addition Calculator',
    'desc' => 'Instantly sum two numeric values together.',
    'category' => 'math-calculators',
    'icon' => '+',
    'handler' => 'MathHandler',
    'action' => 'addition',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'number',
        'label' => 'Number 1',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'number',
        'label' => 'Number 2',
        'required' => true,
      ),
    ),
  ),
  'subtraction-calculator' => 
  array (
    'title' => 'Subtraction Calculator',
    'desc' => 'Subtract one number from another effortlessly.',
    'category' => 'math-calculators',
    'icon' => '-',
    'handler' => 'MathHandler',
    'action' => 'subtraction',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'number',
        'label' => 'Number 1',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'number',
        'label' => 'Number 2',
        'required' => true,
      ),
    ),
  ),
  'multiplication-calculator' => 
  array (
    'title' => 'Multiplication Calculator',
    'desc' => 'Find the definitive product of two distinct variables.',
    'category' => 'math-calculators',
    'icon' => '×',
    'handler' => 'MathHandler',
    'action' => 'multiplication',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'number',
        'label' => 'Number 1',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'number',
        'label' => 'Number 2',
        'required' => true,
      ),
    ),
  ),
  'division-calculator' => 
  array (
    'title' => 'Division Calculator',
    'desc' => 'Compute the accurate quotient dividing two integers or floats.',
    'category' => 'math-calculators',
    'icon' => '÷',
    'handler' => 'MathHandler',
    'action' => 'division',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'number',
        'label' => 'Dividend / Numerator',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'number',
        'label' => 'Divisor / Denominator',
        'required' => true,
      ),
    ),
  ),
  'prime-number-checker' => 
  array (
    'title' => 'Prime Number Checker',
    'desc' => 'Verify mathematically if a given large integer is a pure prime number.',
    'category' => 'math-tools',
    'icon' => 'P',
    'handler' => 'MathHandler',
    'action' => 'primeChecker',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Enter Integer',
        'required' => true,
      ),
    ),
  ),
  'factorial-calculator' => 
  array (
    'title' => 'Factorial Calculator',
    'desc' => 'Calculate the exact factorial (n!) mathematical product of any integer.',
    'category' => 'math-tools',
    'icon' => 'n!',
    'handler' => 'MathHandler',
    'action' => 'factorial',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Enter Integer (Max: 1000)',
        'required' => true,
      ),
    ),
  ),
  'exponent-calculator' => 
  array (
    'title' => 'Exponent Calculator',
    'desc' => 'Calculate the total mathematical result of raising a base number to a specific power.',
    'category' => 'math-tools',
    'icon' => 'xʸ',
    'handler' => 'MathHandler',
    'action' => 'exponent',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'base',
        'type' => 'number',
        'label' => 'Base (x)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'exp',
        'type' => 'number',
        'label' => 'Exponent (y)',
        'required' => true,
      ),
    ),
  ),
  'square-root-calculator' => 
  array (
    'title' => 'Square Root',
    'desc' => 'Retrieve the exact square root (√) of numeric inputs instantly.',
    'category' => 'math-calculators',
    'icon' => '√',
    'handler' => 'MathHandler',
    'action' => 'squareRoot',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num',
        'type' => 'number',
        'label' => 'Number',
        'required' => true,
      ),
    ),
  ),
  'percentage-difference' => 
  array (
    'title' => 'Percentage Increase/Decrease',
    'desc' => 'Calculate the % variance drop or peak between initial and final values.',
    'category' => 'math-calculators',
    'icon' => '%Δ',
    'handler' => 'MathHandler',
    'action' => 'percentDifference',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'initial',
        'type' => 'number',
        'label' => 'Initial Value',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'final',
        'type' => 'number',
        'label' => 'Final Value',
        'required' => true,
      ),
    ),
  ),
  'lcm-gcd-calculator' => 
  array (
    'title' => 'LCM / GCD Calculator',
    'desc' => 'Compute the Least Common Multiple & Greatest Common Divisor mathematically.',
    'category' => 'math-calculators',
    'icon' => 'GCD',
    'handler' => 'MathHandler',
    'action' => 'lcmGcd',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'number',
        'label' => 'First Integer',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'number',
        'label' => 'Second Integer',
        'required' => true,
      ),
    ),
  ),
  'area-square' => 
  array (
    'title' => 'Area of a Square/Rectangle',
    'desc' => 'Determine the surface layout area of 2D 4-sided box polygons.',
    'category' => 'geometry-calculators',
    'icon' => '□',
    'handler' => 'MathHandler',
    'action' => 'areaSquare',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'length',
        'type' => 'number',
        'label' => 'Length (L)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'width',
        'type' => 'number',
        'label' => 'Width (W)',
        'required' => true,
      ),
    ),
  ),
  'area-circle' => 
  array (
    'title' => 'Area of a Circle',
    'desc' => 'Ascertain the space mapped by a geometric circle using radius.',
    'category' => 'geometry-calculators',
    'icon' => '○',
    'handler' => 'MathHandler',
    'action' => 'areaCircle',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'radius',
        'type' => 'number',
        'label' => 'Radius (r)',
        'required' => true,
      ),
    ),
  ),
  'volume-cylinder' => 
  array (
    'title' => 'Volume of a Cylinder',
    'desc' => 'Calculate the 3D internal capacity space of a perfect cylinder.',
    'category' => 'geometry-calculators',
    'icon' => '⛁',
    'handler' => 'MathHandler',
    'action' => 'volumeCylinder',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'radius',
        'type' => 'number',
        'label' => 'Radius (r)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'height',
        'type' => 'number',
        'label' => 'Height (h)',
        'required' => true,
      ),
    ),
  ),
  'pythagorean-theorem' => 
  array (
    'title' => 'Pythagorean Theorem',
    'desc' => 'Solve for the hypotenuse length (c) on a standard Right Triangle.',
    'category' => 'geometry-calculators',
    'icon' => '⊿',
    'handler' => 'MathHandler',
    'action' => 'pythagorean',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'Leg A length',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Leg B length',
        'required' => true,
      ),
    ),
  ),
  'simple-interest' => 
  array (
    'title' => 'Simple Interest',
    'desc' => 'Yield the raw interest accrued based solely on a principle amount linearly.',
    'category' => 'finance-calculators',
    'icon' => '$%',
    'handler' => 'FinanceHandler',
    'action' => 'simpleInterest',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'p',
        'type' => 'number',
        'label' => 'Principle ($)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Annual Rate (%)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 't',
        'type' => 'number',
        'label' => 'Time (Years)',
        'required' => true,
      ),
    ),
  ),
  'compound-interest' => 
  array (
    'title' => 'Compound Interest',
    'desc' => 'Estimate wealth building returns of a compounding exponential yield curve.',
    'category' => 'finance-calculators',
    'icon' => '📈',
    'handler' => 'FinanceHandler',
    'action' => 'compoundInterest',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'p',
        'type' => 'number',
        'label' => 'Initial Principle ($)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Annual Interest Rate (%)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'n',
        'type' => 'number',
        'label' => 'Compounds per Year (e.g. 12)',
        'value' => '12',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 't',
        'type' => 'number',
        'label' => 'Investment Time (Years)',
        'required' => true,
      ),
    ),
  ),
  'roi-calculator' => 
  array (
    'title' => 'ROI Calculator',
    'desc' => 'Calculate Return on Investment to measure the probability of gaining a return from an investment.',
    'category' => 'finance-tools',
    'icon' => 'ROI',
    'handler' => 'MathHandler',
    'action' => 'roi',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'invested',
        'type' => 'number',
        'label' => 'Amount Invested',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'returned',
        'type' => 'number',
        'label' => 'Amount Returned',
        'required' => true,
      ),
    ),
  ),
  'discount-calculator' => 
  array (
    'title' => 'Discount Calculator',
    'desc' => 'Determine your final price and total money saved after applying a store discount coupon.',
    'category' => 'finance-tools',
    'icon' => '-%',
    'handler' => 'MathHandler',
    'action' => 'discount',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Original Price',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'discount',
        'type' => 'number',
        'label' => 'Discount (%)',
        'required' => true,
      ),
    ),
  ),
  'sales-tax-calculator' => 
  array (
    'title' => 'Sales Tax / GST',
    'desc' => 'Inject tax percentages into raw baseline pricing reliably.',
    'category' => 'finance-calculators',
    'icon' => 'GST',
    'handler' => 'FinanceHandler',
    'action' => 'salesTax',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Item Price Before Tax ($)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'tax',
        'type' => 'number',
        'label' => 'Tax Rate (%)',
        'required' => true,
      ),
    ),
  ),
  'tip-calculator' => 
  array (
    'title' => 'Tip Calculator',
    'desc' => 'Calculate accurate restaurant gratuity percentages and total bill split distributions.',
    'category' => 'finance-tools',
    'icon' => '$',
    'handler' => 'MathHandler',
    'action' => 'tip',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'bill',
        'type' => 'number',
        'label' => 'Total Bill Amount ($)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'tip',
        'type' => 'number',
        'label' => 'Tip Percentage (%)',
        'value' => '20',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'split',
        'type' => 'number',
        'label' => 'Split between (People)',
        'value' => '1',
        'required' => true,
      ),
    ),
  ),
  'salary-hourly' => 
  array (
    'title' => 'Salary to Hourly',
    'desc' => 'Convert your gross annual take-home salary to standard hourly/weekly wages.',
    'category' => 'finance-calculators',
    'icon' => '⏱',
    'handler' => 'FinanceHandler',
    'action' => 'salaryHourly',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'salary',
        'type' => 'number',
        'label' => 'Annual Salary ($)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'hours',
        'type' => 'number',
        'label' => 'Hours / Week',
        'value' => '40',
        'required' => true,
      ),
    ),
  ),
  'emi-mortgage' => 
  array (
    'title' => 'EMI / Mortgage',
    'desc' => 'Map out fixed monthly property amortization payments (Equated Monthly Installment).',
    'category' => 'finance-calculators',
    'icon' => '🏠',
    'handler' => 'FinanceHandler',
    'action' => 'emiMortgage',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'loan',
        'type' => 'number',
        'label' => 'Loan Amount ($)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'rate',
        'type' => 'number',
        'label' => 'Annual Interest Rate (%)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'years',
        'type' => 'number',
        'label' => 'Loan Tenure (Years)',
        'required' => true,
      ),
    ),
  ),
  'bmr-calculator' => 
  array (
    'title' => 'BMR Calculator',
    'desc' => 'Estimate your precise Basal Metabolic Rate (BMR) required just to exist at rest.',
    'category' => 'health-calculators',
    'icon' => '⚡',
    'handler' => 'HealthHandler',
    'action' => 'bmr',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'gender',
        'type' => 'text',
        'label' => 'Gender (M/F)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'age',
        'type' => 'number',
        'label' => 'Age (Years)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'weight',
        'type' => 'number',
        'label' => 'Weight (kg)',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'height',
        'type' => 'number',
        'label' => 'Height (cm)',
        'required' => true,
      ),
    ),
  ),
  'tdee-calculator' => 
  array (
    'title' => 'TDEE Calculator',
    'desc' => 'Calculate Total Daily Energy Expenditure (how many calories you burn a day).',
    'category' => 'health-calculators',
    'icon' => '🔥',
    'handler' => 'HealthHandler',
    'action' => 'tdee',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'bmr',
        'type' => 'number',
        'label' => 'Your BMR',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'activity',
        'type' => 'number',
        'label' => 'Multiplier (1.2 - 1.9)',
        'value' => '1.2',
        'required' => true,
      ),
    ),
  ),
  'body-fat-us-navy' => 
  array (
    'title' => 'Body Fat % (US Navy)',
    'desc' => 'Algorithmically estimate absolute human body fat ratio using bodily circumferences.',
    'category' => 'health-calculators',
    'icon' => '💪',
    'handler' => 'HealthHandler',
    'action' => 'bodyFat',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'gender',
        'type' => 'text',
        'label' => 'Gender (M/F)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'height',
        'type' => 'number',
        'label' => 'Height (cm)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'neck',
        'type' => 'number',
        'label' => 'Neck Circumference (cm)',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'waist',
        'type' => 'number',
        'label' => 'Waist Circumference (cm)',
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'hip',
        'type' => 'number',
        'label' => 'Hip Circumference (cm) - Female Only',
        'required' => false,
      ),
    ),
  ),
  'ideal-body-weight' => 
  array (
    'title' => 'Ideal Body Weight',
    'desc' => 'Derive your scientifically categorized perfect weight metric.',
    'category' => 'health-calculators',
    'icon' => '⚖',
    'handler' => 'HealthHandler',
    'action' => 'ibw',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'gender',
        'type' => 'text',
        'label' => 'Gender (M/F)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'height',
        'type' => 'number',
        'label' => 'Height (cm)',
        'required' => true,
      ),
    ),
  ),
  'daily-calorie-needs' => 
  array (
    'title' => 'Daily Caloric Needs',
    'desc' => 'Set explicit caloric thresholds for Bulking, Maintenance, or Clinical Cutting phases.',
    'category' => 'health-calculators',
    'icon' => '🍎',
    'handler' => 'HealthHandler',
    'action' => 'calorieNeeds',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'tdee',
        'type' => 'number',
        'label' => 'Your TDEE Calories',
        'required' => true,
      ),
    ),
  ),
  'target-heart-rate' => 
  array (
    'title' => 'Target Heart Rate',
    'desc' => 'Discover maximum biological beats per minute safe thresholds for cardio.',
    'category' => 'health-calculators',
    'icon' => '❤',
    'handler' => 'HealthHandler',
    'action' => 'heartRate',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'age',
        'type' => 'number',
        'label' => 'Your Age',
        'required' => true,
      ),
    ),
  ),
  'age-calculator' => 
  array (
    'title' => 'Age Calculator',
    'desc' => 'Determine your exact chronological age in years, months, and days.',
    'category' => 'time-calculators',
    'icon' => '🎂',
    'handler' => 'DateHandler',
    'action' => 'ageCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'dob',
        'type' => 'date',
        'label' => 'Date of Birth',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'target',
        'type' => 'date',
        'label' => 'Age at Date (Optional)',
        'required' => false,
      ),
    ),
  ),
  'date-difference' => 
  array (
    'title' => 'Date Difference Calculator',
    'desc' => 'Calculate the span between two explicit calendar dates precisely.',
    'category' => 'time-calculators',
    'icon' => '📅',
    'handler' => 'DateHandler',
    'action' => 'dateDifference',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'date1',
        'type' => 'date',
        'label' => 'Start Date',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'date2',
        'type' => 'date',
        'label' => 'End Date',
        'required' => true,
      ),
    ),
  ),
  'days-between-dates' => 
  array (
    'title' => 'Days Between Dates',
    'desc' => 'Find the absolute number of calendar days bridging two dates.',
    'category' => 'time-calculators',
    'icon' => 'N',
    'handler' => 'DateHandler',
    'action' => 'daysBetween',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'date1',
        'type' => 'date',
        'label' => 'Start Date',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'date2',
        'type' => 'date',
        'label' => 'End Date',
        'required' => true,
      ),
    ),
  ),
  'add-days' => 
  array (
    'title' => 'Add Days to Date',
    'desc' => 'Shift a calendar date forward by a specific number of days.',
    'category' => 'time-calculators',
    'icon' => '+D',
    'handler' => 'DateHandler',
    'action' => 'addDays',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'date',
        'type' => 'date',
        'label' => 'Base Date',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'days',
        'type' => 'number',
        'label' => 'Days to Add',
        'required' => true,
      ),
    ),
  ),
  'subtract-days' => 
  array (
    'title' => 'Subtract Days from Date',
    'desc' => 'Rewind a calendar date backward chronologically by X days.',
    'category' => 'time-calculators',
    'icon' => '-D',
    'handler' => 'DateHandler',
    'action' => 'subtractDays',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'date',
        'type' => 'date',
        'label' => 'Base Date',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'days',
        'type' => 'number',
        'label' => 'Days to Subtract',
        'required' => true,
      ),
    ),
  ),
  'leap-year-checker' => 
  array (
    'title' => 'Leap Year Checker',
    'desc' => 'Verify if a given year mathematically qualifies as a Leap Year.',
    'category' => 'time-calculators',
    'icon' => 'L',
    'handler' => 'DateHandler',
    'action' => 'leapYear',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'year',
        'type' => 'number',
        'label' => 'Four Digit Year (e.g. 2024)',
        'required' => true,
      ),
    ),
  ),
  'business-days' => 
  array (
    'title' => 'Business Days Calculator',
    'desc' => 'Count operable weekdays (Mon-Fri) existing between two periods.',
    'category' => 'time-calculators',
    'icon' => '🏢',
    'handler' => 'DateHandler',
    'action' => 'businessDays',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'date1',
        'type' => 'date',
        'label' => 'Start Date',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'date2',
        'type' => 'date',
        'label' => 'End Date',
        'required' => true,
      ),
    ),
  ),
  'unix-timestamp' => 
  array (
    'title' => 'UNIX Timestamp',
    'desc' => 'Generate the exact seconds elapsed since January 1st, 1970 UTC.',
    'category' => 'time-calculators',
    'icon' => '⏱',
    'handler' => 'DateHandler',
    'action' => 'unixTimestamp',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'meters-to-feet' => 
  array (
    'title' => 'Meters to Feet',
    'desc' => 'Convert linear metric meters physically into imperial feet easily.',
    'category' => 'length-converters',
    'icon' => 'm→ft',
    'handler' => 'UnitHandler',
    'action' => 'metersToFeet',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Meters (m)',
        'required' => true,
      ),
    ),
  ),
  'feet-to-meters' => 
  array (
    'title' => 'Feet to Meters',
    'desc' => 'Translate standard US customary feet into SI metric meters.',
    'category' => 'length-converters',
    'icon' => 'ft→m',
    'handler' => 'UnitHandler',
    'action' => 'feetToMeters',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Feet (ft)',
        'required' => true,
      ),
    ),
  ),
  'cm-to-inches' => 
  array (
    'title' => 'Centimeters to Inches',
    'desc' => 'Transform metric centimeters exactly into standard fractional inches.',
    'category' => 'length-converters',
    'icon' => 'cm→in',
    'handler' => 'UnitHandler',
    'action' => 'cmToInches',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Centimeters (cm)',
        'required' => true,
      ),
    ),
  ),
  'inches-to-cm' => 
  array (
    'title' => 'Inches to Centimeters',
    'desc' => 'Shift customary standard dimensional inches backward to centimeters.',
    'category' => 'length-converters',
    'icon' => 'in→cm',
    'handler' => 'UnitHandler',
    'action' => 'inchesToCm',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Inches (in)',
        'required' => true,
      ),
    ),
  ),
  'km-to-miles' => 
  array (
    'title' => 'Kilometers to Miles',
    'desc' => 'Convert international road distance mapping KM to highway Miles.',
    'category' => 'length-converters',
    'icon' => 'km→mi',
    'handler' => 'UnitHandler',
    'action' => 'kmToMiles',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Kilometers (km)',
        'required' => true,
      ),
    ),
  ),
  'miles-to-km' => 
  array (
    'title' => 'Miles to Kilometers',
    'desc' => 'Process terrestrial distance from UK/US Miles into global Kilometers.',
    'category' => 'length-converters',
    'icon' => 'mi→km',
    'handler' => 'UnitHandler',
    'action' => 'milesToKm',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Miles (mi)',
        'required' => true,
      ),
    ),
  ),
  'kg-to-lbs' => 
  array (
    'title' => 'Kilograms to Pounds',
    'desc' => 'Convert metric weights from Kilograms (kg) to imperial Pounds (lbs).',
    'category' => 'converters',
    'icon' => 'K>L',
    'handler' => 'ConverterHandler',
    'action' => 'kgToLbs',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num',
        'type' => 'number',
        'label' => 'Kilograms (kg)',
        'required' => true,
      ),
    ),
  ),
  'lbs-to-kg' => 
  array (
    'title' => 'Pounds to Kilograms',
    'desc' => 'Convert metric weights from imperial Pounds (lbs) to Kilograms (kg).',
    'category' => 'converters',
    'icon' => 'L>K',
    'handler' => 'ConverterHandler',
    'action' => 'lbsToKg',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num',
        'type' => 'number',
        'label' => 'Pounds (lbs)',
        'required' => true,
      ),
    ),
  ),
  'grams-to-ounces' => 
  array (
    'title' => 'Grams to Ounces',
    'desc' => 'Compute microscopic metric grams against fluid or dry ounces.',
    'category' => 'weight-converters',
    'icon' => 'g→oz',
    'handler' => 'UnitHandler',
    'action' => 'gramsToOunces',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Grams (g)',
        'required' => true,
      ),
    ),
  ),
  'ounces-to-grams' => 
  array (
    'title' => 'Ounces to Grams',
    'desc' => 'Convert fractional dry culinary Ounces accurately to precise Grams.',
    'category' => 'weight-converters',
    'icon' => 'oz→g',
    'handler' => 'UnitHandler',
    'action' => 'ouncesToGrams',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Ounces (oz)',
        'required' => true,
      ),
    ),
  ),
  'celsius-to-fahrenheit' => 
  array (
    'title' => 'Celsius to Fahrenheit',
    'desc' => 'Convert temperature from metric Celsius to imperial Fahrenheit.',
    'category' => 'converters',
    'icon' => 'C>F',
    'handler' => 'ConverterHandler',
    'action' => 'celToFah',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num',
        'type' => 'number',
        'label' => 'Celsius °C',
        'required' => true,
      ),
    ),
  ),
  'fahrenheit-to-celsius' => 
  array (
    'title' => 'Fahrenheit to Celsius',
    'desc' => 'Convert temperature from imperial Fahrenheit to metric Celsius.',
    'category' => 'converters',
    'icon' => 'F>C',
    'handler' => 'ConverterHandler',
    'action' => 'fahToCel',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num',
        'type' => 'number',
        'label' => 'Fahrenheit °F',
        'required' => true,
      ),
    ),
  ),
  'celsius-to-kelvin' => 
  array (
    'title' => 'Celsius to Kelvin',
    'desc' => 'Shift scientific Celsius variants absolutely to 0-base Kelvin.',
    'category' => 'temperature-converters',
    'icon' => '°C→K',
    'handler' => 'UnitHandler',
    'action' => 'celsiusToKelvin',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Celsius (°C)',
        'required' => true,
      ),
    ),
  ),
  'kb-to-mb' => 
  array (
    'title' => 'KB to MB',
    'desc' => 'Scale Kilobytes digitally into standard Megabyte data capacities.',
    'category' => 'storage-converters',
    'icon' => 'KB→MB',
    'handler' => 'UnitHandler',
    'action' => 'kbToMb',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Kilobytes (KB)',
        'required' => true,
      ),
    ),
  ),
  'mb-to-gb' => 
  array (
    'title' => 'MB to GB',
    'desc' => 'Convert file storage scale Megabytes broadly into Gigabytes.',
    'category' => 'storage-converters',
    'icon' => 'MB→GB',
    'handler' => 'UnitHandler',
    'action' => 'mbToGb',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Megabytes (MB)',
        'required' => true,
      ),
    ),
  ),
  'gb-to-tb' => 
  array (
    'title' => 'GB to TB',
    'desc' => 'Compress vast binary Gigabytes sequentially into Terabytes.',
    'category' => 'storage-converters',
    'icon' => 'GB→TB',
    'handler' => 'UnitHandler',
    'action' => 'gbToTb',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Gigabytes (GB)',
        'required' => true,
      ),
    ),
  ),
  'tb-to-gb' => 
  array (
    'title' => 'TB to GB',
    'desc' => 'Parse sheer volume Terabytes backwards into granular Gigabytes.',
    'category' => 'storage-converters',
    'icon' => 'TB→GB',
    'handler' => 'UnitHandler',
    'action' => 'tbToGb',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Terabytes (TB)',
        'required' => true,
      ),
    ),
  ),
  'sec-to-min' => 
  array (
    'title' => 'Seconds to Minutes',
    'desc' => 'Bundle distinct baseline temporal seconds into fractional Minutes.',
    'category' => 'time-converters',
    'icon' => 's→m',
    'handler' => 'UnitHandler',
    'action' => 'secToMin',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Seconds',
        'required' => true,
      ),
    ),
  ),
  'min-to-hours' => 
  array (
    'title' => 'Minutes to Hours',
    'desc' => 'Consolidate 60-part mapping Minutes upward into hourly digits.',
    'category' => 'time-converters',
    'icon' => 'm→h',
    'handler' => 'UnitHandler',
    'action' => 'minToHours',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Minutes',
        'required' => true,
      ),
    ),
  ),
  'hours-to-days' => 
  array (
    'title' => 'Hours to Days',
    'desc' => 'Stack absolute cumulative hours dividing into whole calendar Days.',
    'category' => 'time-converters',
    'icon' => 'h→d',
    'handler' => 'UnitHandler',
    'action' => 'hoursToDays',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Hours',
        'required' => true,
      ),
    ),
  ),
  'days-to-weeks' => 
  array (
    'title' => 'Days to Weeks',
    'desc' => 'Collate disparate daily sums rapidly into broader 7-day Weeks.',
    'category' => 'time-converters',
    'icon' => 'd→w',
    'handler' => 'UnitHandler',
    'action' => 'daysToWeeks',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Days',
        'required' => true,
      ),
    ),
  ),
  'markdown-to-html' => 
  array (
    'title' => 'Markdown to HTML',
    'desc' => 'Convert raw Markdown formatting instantly to HTML tags.',
    'category' => 'text-tools',
    'icon' => 'M↓',
    'handler' => 'TextHandler',
    'action' => 'markdownToHtml',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Markdown Text',
        'required' => true,
      ),
    ),
  ),
  'html-to-markdown' => 
  array (
    'title' => 'HTML to Markdown',
    'desc' => 'Strip HTML tags and convert them cleanly back into raw Markdown text.',
    'category' => 'text-tools',
    'icon' => 'M↑',
    'handler' => 'TextHandler',
    'action' => 'htmlToMarkdown',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'HTML Code',
        'required' => true,
      ),
    ),
  ),
  'text-to-binary' => 
  array (
    'title' => 'Text to Binary',
    'desc' => 'Encode regular text sequences into 0s and 1s binary code.',
    'category' => 'text-tools',
    'icon' => '01',
    'handler' => 'TextHandler',
    'action' => 'textToBinary',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Normal Text',
        'required' => true,
      ),
    ),
  ),
  'binary-to-text' => 
  array (
    'title' => 'Binary to Text',
    'desc' => 'Convert binary numbers to readable ASCII text characters.',
    'category' => 'converters',
    'icon' => '0>A',
    'handler' => 'ConverterHandler',
    'action' => 'binaryToText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Binary String',
        'required' => true,
      ),
    ),
  ),
  'text-to-hex' => 
  array (
    'title' => 'Text to Hexadecimal',
    'desc' => 'Convert any text string into its Hexadecimal mathematical equivalent.',
    'category' => 'text-tools',
    'icon' => 'TH',
    'handler' => 'TextHandler',
    'action' => 'textToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Standard Text',
        'required' => true,
      ),
    ),
  ),
  'hex-to-text' => 
  array (
    'title' => 'Hexadecimal to Text',
    'desc' => 'Decode hex sequences cleanly back into standard human-readable text.',
    'category' => 'text-tools',
    'icon' => 'HT',
    'handler' => 'TextHandler',
    'action' => 'hexToText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Hex String',
        'required' => true,
      ),
    ),
  ),
  'text-to-ascii' => 
  array (
    'title' => 'Text to ASCII',
    'desc' => 'Convert standard text strings directly into comma-separated ASCII codes.',
    'category' => 'text-tools',
    'icon' => 'TA',
    'handler' => 'TextHandler',
    'action' => 'textToAscii',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text String',
        'required' => true,
      ),
    ),
  ),
  'ascii-to-text' => 
  array (
    'title' => 'ASCII to Text',
    'desc' => 'Convert ASCII decimal arrays and codes back to standard text.',
    'category' => 'text-tools',
    'icon' => 'AT',
    'handler' => 'TextHandler',
    'action' => 'asciiToText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'ASCII Values (Space Separated)',
        'required' => true,
      ),
    ),
  ),
  'text-to-morse' => 
  array (
    'title' => 'Morse Code Translator',
    'desc' => 'Translate standard English phonetic text into dot-dash Morse Code.',
    'category' => 'text-tools',
    'icon' => '...',
    'handler' => 'TextHandler',
    'action' => 'textToMorse',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'morse-code-decoder' => 
  array (
    'title' => 'Morse Code Decoder',
    'desc' => 'Parse incoming dot-dash Morse Code strings back into English alphabet letters.',
    'category' => 'text-tools',
    'icon' => '-.-',
    'handler' => 'TextHandler',
    'action' => 'morseToText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Morse Code',
        'placeholder' => '.... . .-.. .-.. ---',
        'required' => true,
      ),
    ),
  ),
  'braille-translator' => 
  array (
    'title' => 'Pro Braille Translator',
    'desc' => 'Convert English text to Braille and Braille back to English instantly.',
    'category' => 'text-tools',
    'icon' => '⠃',
    'handler' => 'AiHandler',
    'action' => 'brailleTranslate',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'zalgo-text' => 
  array (
    'title' => 'Zalgo Text Generator',
    'desc' => 'Apply demonic, glitchy-looking unicode Zalgo artifacts to standard text.',
    'category' => 'text-tools',
    'icon' => 'Z',
    'handler' => 'TextHandler',
    'action' => 'zalgoText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Normal Text',
        'required' => true,
      ),
    ),
  ),
  'l33t-speak' => 
  array (
    'title' => 'L33t Speak Generator',
    'desc' => 'Convert text to classic 1990s hacker elite l337 5p34k format.',
    'category' => 'text-tools',
    'icon' => '1337',
    'handler' => 'TextHandler',
    'action' => 'leetSpeak',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Normal Text',
        'required' => true,
      ),
    ),
  ),
  'text-repeater' => 
  array (
    'title' => 'Text Repeater',
    'desc' => 'Multiply and repeat a string of text up to 10,000 times instantly.',
    'category' => 'text-tools',
    'icon' => 'x10',
    'handler' => 'TextHandler',
    'action' => 'textRepeater',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to Repeat',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'times',
        'type' => 'number',
        'label' => 'Times to Repeat',
        'value' => '100',
        'required' => true,
      ),
    ),
  ),
  'text-to-octal' => 
  array (
    'title' => 'Text to Octal',
    'desc' => 'Convert standard character text arrays into Base-8 Octal format.',
    'category' => 'text-tools',
    'icon' => 'TO',
    'handler' => 'TextHandler',
    'action' => 'textToOctal',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Standard Text',
        'required' => true,
      ),
    ),
  ),
  'octal-to-text' => 
  array (
    'title' => 'Octal to Text',
    'desc' => 'Translate Base-8 Octal format inputs cleanly back to string text.',
    'category' => 'text-tools',
    'icon' => 'OT',
    'handler' => 'TextHandler',
    'action' => 'octalToText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Octal Data',
        'required' => true,
      ),
    ),
  ),
  'rot-13-encoder' => 
  array (
    'title' => 'ROT13 Encoder',
    'desc' => 'Apply the classic ROT13 letter-substitution cipher to standard strings.',
    'category' => 'text-tools',
    'icon' => 'R13',
    'handler' => 'TextHandler',
    'action' => 'rot13',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'word-scrambler' => 
  array (
    'title' => 'Word Scrambler',
    'desc' => 'Randomly shuffle and scramble letters inside all words of a text.',
    'category' => 'text-tools',
    'icon' => 'SCRM',
    'handler' => 'TextHandler',
    'action' => 'wordScrambler',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Clean Text',
        'required' => true,
      ),
    ),
  ),
  'bionic-reading' => 
  array (
    'title' => 'Bionic Reading Converter',
    'desc' => 'Bionic format text by bolding the first half of words to improve reading speed.',
    'category' => 'text-tools',
    'icon' => 'B',
    'handler' => 'TextHandler',
    'action' => 'bionicReading',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Standard Text',
        'required' => true,
      ),
    ),
  ),
  'xml-formatter' => 
  array (
    'title' => 'XML Formatter',
    'desc' => 'Beautify and indent raw XML strings into readable structured trees.',
    'category' => 'developer-tools',
    'icon' => '</>',
    'handler' => 'DevHandler',
    'action' => 'xmlFormatter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Raw XML',
        'required' => true,
      ),
    ),
  ),
  'json-to-xml' => 
  array (
    'title' => 'JSON to XML',
    'desc' => 'Convert JSON data structures cleanly into XML format.',
    'category' => 'converters',
    'icon' => 'J>X',
    'handler' => 'ConverterHandler',
    'action' => 'jsonToXml',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'JSON Data',
        'required' => true,
      ),
    ),
  ),
  'xml-to-json' => 
  array (
    'title' => 'XML to JSON Converter',
    'desc' => 'Convert XML data to JSON format accurately.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-file-code',
    'handler' => 'DevHandler',
    'action' => 'xmlToJson',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'xml',
        'type' => 'textarea',
        'label' => 'XML Input',
        'required' => true,
      ),
    ),
  ),
  'sha512-generator' => 
  array (
    'title' => 'SHA-512 Generator (Pro)',
    'desc' => 'Create ultra-strong 512-bit message digests for highest-integrity data signatures.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-vault',
    'handler' => 'DevHandler',
    'action' => 'sha512',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'sha384-generator' => 
  array (
    'title' => 'SHA-384 Hash Generator',
    'desc' => 'Generate cryptographic SHA-384 hashes for sensitive payload verification.',
    'category' => 'developer-tools',
    'icon' => '384',
    'handler' => 'DevHandler',
    'action' => 'sha384',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'sha224-generator' => 
  array (
    'title' => 'SHA-224 Hash Generator',
    'desc' => 'Generate truncated 224-bit hashes within the SHA-2 family.',
    'category' => 'developer-tools',
    'icon' => '224',
    'handler' => 'DevHandler',
    'action' => 'sha224',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'sha512-256-generator' => 
  array (
    'title' => 'SHA-512/256 Generator',
    'desc' => 'Generate SHA-512/256 truncated hashes for secure embedded systems.',
    'category' => 'developer-tools',
    'icon' => 'S/2',
    'handler' => 'DevHandler',
    'action' => 'sha512_256',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'sha512-224-generator' => 
  array (
    'title' => 'SHA-512/224 Generator',
    'desc' => 'Generate SHA-512/224 truncated hashes for secure embedded systems.',
    'category' => 'developer-tools',
    'icon' => 'S/2',
    'handler' => 'DevHandler',
    'action' => 'sha512_224',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'sha3-512-generator' => 
  array (
    'title' => 'SHA3-512 Hash Generator',
    'desc' => 'Generate futuristic Keccak SHA3-512 hashes.',
    'category' => 'developer-tools',
    'icon' => 'K3',
    'handler' => 'DevHandler',
    'action' => 'sha3_512',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'whirlpool-generator' => 
  array (
    'title' => 'Whirlpool Hash Generator',
    'desc' => 'Generate secure 512-bit Whirlpool hashes originally designed by AES creators.',
    'category' => 'developer-tools',
    'icon' => 'WHL',
    'handler' => 'DevHandler',
    'action' => 'whirlpool',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'ripemd160-generator' => 
  array (
    'title' => 'RIPEMD-160 Generator',
    'desc' => 'Generate 160-bit message digests commonly used in Bitcoin/Crypto standards.',
    'category' => 'developer-tools',
    'icon' => 'R16',
    'handler' => 'DevHandler',
    'action' => 'ripemd160',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input String',
        'required' => true,
      ),
    ),
  ),
  'mac-address-generator' => 
  array (
    'title' => 'MAC Address Generator',
    'desc' => 'Generate randomized standard MAC address hardware identifiers locally.',
    'category' => 'developer-tools',
    'icon' => 'MAC',
    'handler' => 'DevHandler',
    'action' => 'macGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'binary-to-decimal' => 
  array (
    'title' => 'Binary to Decimal',
    'desc' => 'Convert base-2 binary strings back to integer decimal numbers.',
    'category' => 'converters',
    'icon' => 'B>D',
    'handler' => 'ConverterHandler',
    'action' => 'binaryToDec',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Binary String',
        'required' => true,
      ),
    ),
  ),
  'decimal-to-binary' => 
  array (
    'title' => 'Decimal to Binary',
    'desc' => 'Convert integer decimal numbers to base-2 binary strings.',
    'category' => 'converters',
    'icon' => 'D>B',
    'handler' => 'ConverterHandler',
    'action' => 'decToBinary',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Decimal Number',
        'required' => true,
      ),
    ),
  ),
  'decimal-to-hex' => 
  array (
    'title' => 'Decimal to HEX',
    'desc' => 'Translate standard Decimal integers rapidly into Hexadecimal variables.',
    'category' => 'developer-tools',
    'icon' => 'D2H',
    'handler' => 'DevHandler',
    'action' => 'decimalToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Decimal String',
        'required' => true,
      ),
    ),
  ),
  'hex-to-decimal' => 
  array (
    'title' => 'HEX to Decimal',
    'desc' => 'Convert programmatic Hexadecimal notation bounds back to Decimal integers.',
    'category' => 'developer-tools',
    'icon' => 'H2D',
    'handler' => 'DevHandler',
    'action' => 'hexToDecimal',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Hexadecimal String',
        'required' => true,
      ),
    ),
  ),
  'decimal-to-octal' => 
  array (
    'title' => 'Decimal to Octal',
    'desc' => 'Convert standard Decimal formats into Base-8 Octal mathematical data.',
    'category' => 'developer-tools',
    'icon' => 'D2O',
    'handler' => 'DevHandler',
    'action' => 'decimalToOctal',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Decimal String',
        'required' => true,
      ),
    ),
  ),
  'octal-to-decimal' => 
  array (
    'title' => 'Octal to Decimal',
    'desc' => 'Revert mathematical Base-8 Octal formatting to logical Decimal notation.',
    'category' => 'developer-tools',
    'icon' => 'O2D',
    'handler' => 'DevHandler',
    'action' => 'octalToDecimal',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Octal String',
        'required' => true,
      ),
    ),
  ),
  'ip-to-decimal' => 
  array (
    'title' => 'IP to Decimal',
    'desc' => 'Convert an IPv4 dotted-decimal address into its long decimal numeric equivalent.',
    'category' => 'developer-tools',
    'icon' => 'IP2',
    'handler' => 'DevHandler',
    'action' => 'ipToDecimal',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'IPv4 Address',
        'required' => true,
      ),
    ),
  ),
  'decimal-to-ip' => 
  array (
    'title' => 'Decimal to IP',
    'desc' => 'Revert long string numeric formats back into IPv4 dot-decimal constraints.',
    'category' => 'developer-tools',
    'icon' => '2IP',
    'handler' => 'DevHandler',
    'action' => 'decimalToIp',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Decimal IP Value',
        'required' => true,
      ),
    ),
  ),
  'variance-calculator' => 
  array (
    'title' => 'Variance Calculator',
    'desc' => 'Calculate the statistical variance of a provided dataset sample or population.',
    'category' => 'math-tools',
    'icon' => 'σ²',
    'handler' => 'MathHandler',
    'action' => 'variance',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Dataset (comma separated)',
        'required' => true,
      ),
    ),
  ),
  'standard-deviation' => 
  array (
    'title' => 'Standard Deviation',
    'desc' => 'Compute the standard deviation to measure the amount of variation in a set of values.',
    'category' => 'math-tools',
    'icon' => 'σ',
    'handler' => 'MathHandler',
    'action' => 'stdDev',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Dataset (comma separated)',
        'required' => true,
      ),
    ),
  ),
  'mean-median-mode' => 
  array (
    'title' => 'Mean, Median, Mode',
    'desc' => 'Find the central tendency (average, exact middle, and most frequent) of numbers.',
    'category' => 'math-tools',
    'icon' => 'M³',
    'handler' => 'MathHandler',
    'action' => 'meanMedianMode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Dataset (comma separated)',
        'required' => true,
      ),
    ),
  ),
  'fibonacci-generator' => 
  array (
    'title' => 'Fibonacci Sequence Generator',
    'desc' => 'Generate the famous Fibonacci mathematical sequence up to a specific term (N).',
    'category' => 'math-tools',
    'icon' => 'F(n)',
    'handler' => 'MathHandler',
    'action' => 'fibonacci',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Number of Terms (Max: 1000)',
        'required' => true,
      ),
    ),
  ),
  'combination-calculator' => 
  array (
    'title' => 'Combination Calculator (nCr)',
    'desc' => 'Find the total number of combinations where order does NOT matter.',
    'category' => 'math-tools',
    'icon' => 'nCr',
    'handler' => 'MathHandler',
    'action' => 'combination',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'n',
        'type' => 'number',
        'label' => 'Total Objects (n)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Sample Size (r)',
        'required' => true,
      ),
    ),
  ),
  'permutation-calculator' => 
  array (
    'title' => 'Permutation Calculator (nPr)',
    'desc' => 'Find the total number of permutations where selection order DOES matter.',
    'category' => 'math-tools',
    'icon' => 'nPr',
    'handler' => 'MathHandler',
    'action' => 'permutation',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'n',
        'type' => 'number',
        'label' => 'Total Objects (n)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Sample Size (r)',
        'required' => true,
      ),
    ),
  ),
  'markup-calculator' => 
  array (
    'title' => 'Markup Calculator',
    'desc' => 'Calculate the price markup percentage added to the base cost of a product.',
    'category' => 'math-tools',
    'icon' => '↑%',
    'handler' => 'MathHandler',
    'action' => 'markup',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'cost',
        'type' => 'number',
        'label' => 'Base Cost',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Selling Price',
        'required' => true,
      ),
    ),
  ),
  'gcd-calculator' => 
  array (
    'title' => 'Greatest Common Divisor (GCD)',
    'desc' => 'Find the largest positive integer that divides two numbers without a remainder.',
    'category' => 'math-tools',
    'icon' => 'GCD',
    'handler' => 'MathHandler',
    'action' => 'gcd',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'Number A',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Number B',
        'required' => true,
      ),
    ),
  ),
  'lcm-calculator' => 
  array (
    'title' => 'Least Common Multiple (LCM)',
    'desc' => 'Compute the smallest positive integer perfectly divisible by two numbers.',
    'category' => 'math-tools',
    'icon' => 'LCM',
    'handler' => 'MathHandler',
    'action' => 'lcm',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'Number A',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Number B',
        'required' => true,
      ),
    ),
  ),
  'ratio-calculator' => 
  array (
    'title' => 'Ratio Calculator',
    'desc' => 'Solve for missing values in proportional ratios or simplify existing ones.',
    'category' => 'math-tools',
    'icon' => 'A:B',
    'handler' => 'MathHandler',
    'action' => 'ratio',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'A (Known)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'B (Known)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'c',
        'type' => 'number',
        'label' => 'C (Optional)',
      ),
      3 => 
      array (
        'name' => 'd',
        'type' => 'number',
        'label' => 'D (Optional)',
      ),
    ),
  ),
  'log-calculator' => 
  array (
    'title' => 'Logarithm Calculator',
    'desc' => 'Compute the common logarithm (base 10) or natural logarithm (base e) of a variable.',
    'category' => 'math-tools',
    'icon' => 'log',
    'handler' => 'MathHandler',
    'action' => 'logarithm',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Number',
        'required' => true,
      ),
    ),
  ),
  'quadratic-equation' => 
  array (
    'title' => 'Quadratic Equation Solver',
    'desc' => 'Find the exact real roots (x) of a polynomial quadratic equation (ax² + bx + c = 0).',
    'category' => 'math-tools',
    'icon' => 'x²',
    'handler' => 'MathHandler',
    'action' => 'quadratic',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'Value A (x²)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Value B (x)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'c',
        'type' => 'number',
        'label' => 'Value C (constant)',
        'required' => true,
      ),
    ),
  ),
  'cube-root-calculator' => 
  array (
    'title' => 'Cube Root Calculator',
    'desc' => 'Ascertain the precise principal cube root of any positive or negative number.',
    'category' => 'math-tools',
    'icon' => '∛x',
    'handler' => 'MathHandler',
    'action' => 'cubeRoot',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Enter Number',
        'required' => true,
      ),
    ),
  ),
  'gpa-calculator' => 
  array (
    'title' => 'GPA Calculator',
    'desc' => 'Calculate your semester or cumulative GPA easily.',
    'category' => 'math-tools',
    'icon' => '🎓',
    'handler' => 'CalculatorsHandler',
    'action' => 'gpaCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'grades',
        'type' => 'textarea',
        'label' => 'Grades (comma separated, e.g. 4,3.5,3)',
        'required' => true,
      ),
    ),
  ),
  'grade-calculator' => 
  array (
    'title' => 'Grade Calculator',
    'desc' => 'Determine the grade you need on an exam to reach a target.',
    'category' => 'math-tools',
    'icon' => '📝',
    'handler' => 'CalculatorsHandler',
    'action' => 'gradeCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'current',
        'type' => 'number',
        'label' => 'Current Grade (%)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'target',
        'type' => 'number',
        'label' => 'Target Grade (%)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'weight',
        'type' => 'number',
        'label' => 'Final Weight (%)',
        'required' => true,
      ),
    ),
  ),
  'speed-distance-time' => 
  array (
    'title' => 'Speed Distance Time',
    'desc' => 'Solve for speed, distance, or time using the motion formula.',
    'category' => 'math-tools',
    'icon' => '🏎️',
    'handler' => 'CalculatorsHandler',
    'action' => 'speedDistanceTime',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'v',
        'type' => 'number',
        'label' => 'Speed (v)',
      ),
      1 => 
      array (
        'name' => 'd',
        'type' => 'number',
        'label' => 'Distance (d)',
      ),
      2 => 
      array (
        'name' => 't',
        'type' => 'number',
        'label' => 'Time (t)',
      ),
    ),
  ),
  'fuel-cost-calculator' => 
  array (
    'title' => 'Fuel Cost Calculator',
    'desc' => 'Estimate the total cost of fuel for a specific trip distance.',
    'category' => 'math-tools',
    'icon' => '⛽',
    'handler' => 'CalculatorsHandler',
    'action' => 'fuelCostCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'dist',
        'type' => 'number',
        'label' => 'Distance (km/mi)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'eff',
        'type' => 'number',
        'label' => 'Efficiency (L/100km or MPG)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Fuel Price per Unit',
        'required' => true,
      ),
    ),
  ),
  'pet-age-calculator' => 
  array (
    'title' => 'Pet Age Calculator',
    'desc' => 'Convert your dog or cat age into human years.',
    'category' => 'math-tools',
    'icon' => '🐾',
    'handler' => 'CalculatorsHandler',
    'action' => 'petAgeCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'age',
        'type' => 'number',
        'label' => 'Pet Age',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'type',
        'type' => 'select',
        'label' => 'Pet Type',
        'options' => 
        array (
          'dog' => 'Dog',
          'cat' => 'Cat',
        ),
        'required' => true,
      ),
    ),
  ),
  'love-calculator' => 
  array (
    'title' => 'Love Calculator',
    'desc' => 'Find the compatibility percentage between two names.',
    'category' => 'math-tools',
    'icon' => '❤️',
    'handler' => 'CalculatorsHandler',
    'action' => 'loveCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'name1',
        'type' => 'text',
        'label' => 'Your Name',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'name2',
        'type' => 'text',
        'label' => 'Partner Name',
        'required' => true,
      ),
    ),
  ),
  'user-agent-parser' => 
  array (
    'title' => 'User-Agent Parser',
    'desc' => 'Deconstruct HTTP User-Agent headers to identify browser, OS, and device metadata.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-user-gear',
    'handler' => 'DevHandler',
    'action' => 'uaParser',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'open-graph-generator' => 
  array (
    'title' => 'Open Graph Generator',
    'desc' => 'Generate flawless Facebook OG Meta Tags instantly for enhanced social sharing.',
    'category' => 'web-tools',
    'icon' => 'OG',
    'handler' => 'WebHandler',
    'action' => 'ogGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'title',
        'type' => 'text',
        'label' => 'Page Title',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'desc',
        'type' => 'textarea',
        'label' => 'Description (Max 200 chars)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'Website URL',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'image',
        'type' => 'text',
        'label' => 'Image URL',
        'required' => true,
      ),
    ),
  ),
  'twitter-card-generator' => 
  array (
    'title' => 'Twitter Card Generator',
    'desc' => 'Create properly formatted Twitter Meta Cards to optimize social media previews.',
    'category' => 'web-tools',
    'icon' => 'X',
    'handler' => 'WebHandler',
    'action' => 'twitterCard',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'title',
        'type' => 'text',
        'label' => 'Title',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'desc',
        'type' => 'textarea',
        'label' => 'Description',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'card_type',
        'type' => 'select',
        'label' => 'Card Type',
        'options' => 
        array (
          'summary' => 'Summary',
          'summary_large_image' => 'Large Image Summary',
        ),
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'site',
        'type' => 'text',
        'label' => 'Site Username (@handle)',
      ),
      4 => 
      array (
        'name' => 'image',
        'type' => 'text',
        'label' => 'Image URL',
      ),
    ),
  ),
  'robots-txt-generator' => 
  array (
    'title' => 'Robots.txt Generator',
    'desc' => 'Safely generate SEO-optimized robots.txt files to govern search engine crawling.',
    'category' => 'web-tools',
    'icon' => 'R',
    'handler' => 'WebHandler',
    'action' => 'robotsTxt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'delay',
        'type' => 'number',
        'label' => 'Crawl-Delay (Seconds)',
        'value' => '',
      ),
      1 => 
      array (
        'name' => 'sitemap',
        'type' => 'text',
        'label' => 'Sitemap XML URL',
        'value' => 'https://domain.com/sitemap.xml',
      ),
      2 => 
      array (
        'name' => 'disallow',
        'type' => 'textarea',
        'label' => 'Disallow Directories (Line Separated)',
        'value' => '/cgi-bin/
/tmp/
/admin/',
      ),
    ),
  ),
  'htaccess-generator' => 
  array (
    'title' => '.htaccess Generator',
    'desc' => 'Quickly generate vital Apache .htaccess security and rewrite parameters.',
    'category' => 'web-tools',
    'icon' => 'HTA',
    'handler' => 'WebHandler',
    'action' => 'htaccessGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'https',
        'type' => 'select',
        'label' => 'Force HTTPS?',
        'options' => 
        array (
          'yes' => 'Yes, Force HTTPS',
          'no' => 'No',
        ),
      ),
      1 => 
      array (
        'name' => 'www',
        'type' => 'select',
        'label' => 'Force WWW or Non-WWW?',
        'options' => 
        array (
          'www' => 'Force WWW',
          'nonwww' => 'Force Non-WWW',
          'none' => 'Leave As Is',
        ),
      ),
      2 => 
      array (
        'name' => 'domain',
        'type' => 'text',
        'label' => 'Your Domain (e.g., example.com)',
      ),
    ),
  ),
  'utm-builder' => 
  array (
    'title' => 'UTM Campaign Builder (Pro)',
    'desc' => 'Construct perfect tracking URLs for Google Analytics to monitor your inbound marketing performance.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-link',
    'handler' => 'SeoHandler',
    'action' => 'utmBuilder',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'htpasswd-generator' => 
  array (
    'title' => 'Htpasswd Generator',
    'desc' => 'Generate .htpasswd entries for basic HTTP authentication.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-user-lock',
    'handler' => 'DevHandler',
    'action' => 'htpasswdGenerator',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'user',
        'type' => 'text',
        'label' => 'Username',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'pass',
        'type' => 'text',
        'label' => 'Password',
        'required' => true,
      ),
    ),
  ),
  'dns-lookup' => 
  array (
    'title' => 'DNS Record Lookup',
    'desc' => 'Fetch A, AAAA, MX, NS, and TXT records for any domain.',
    'category' => 'dev-tools',
    'icon' => '🔍',
    'handler' => 'NetworkHandler',
    'action' => 'dnsLookup',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'domain',
        'type' => 'text',
        'label' => 'Domain Name',
        'placeholder' => 'example.com',
        'required' => true,
      ),
    ),
  ),
  'http-headers' => 
  array (
    'title' => 'HTTP Headers Checker',
    'desc' => 'Send simulated requests to inspect raw HTTP response headers of any URL.',
    'category' => 'web-tools',
    'icon' => 'HTTP',
    'handler' => 'WebHandler',
    'action' => 'httpHeaders',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Website URL',
        'required' => true,
      ),
    ),
  ),
  'slug-generator' => 
  array (
    'title' => 'URL Slug Generator',
    'desc' => 'Convert long blog post text titles cleanly into SEO-friendly permalink slugs.',
    'category' => 'web-tools',
    'icon' => 'ID',
    'handler' => 'WebHandler',
    'action' => 'slugGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Blog Text Title',
        'required' => true,
      ),
    ),
  ),
  'schema-org-generator' => 
  array (
    'title' => 'Schema JSON-LD Generator',
    'desc' => 'Create rich snippet JSON-LD metadata markup for local businesses and articles.',
    'category' => 'web-tools',
    'icon' => '{}',
    'handler' => 'WebHandler',
    'action' => 'schemaGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'type',
        'type' => 'select',
        'label' => 'Schema Type',
        'options' => 
        array (
          'Article' => 'Article',
          'LocalBusiness' => 'Local Business',
          'Organization' => 'Organization',
        ),
      ),
      1 => 
      array (
        'name' => 'name',
        'type' => 'text',
        'label' => 'Name/Title',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'URL',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'image',
        'type' => 'text',
        'label' => 'Primary Image URL',
      ),
    ),
  ),
  'mailto-generator' => 
  array (
    'title' => 'Mailto Link Generator',
    'desc' => 'Quickly forge pre-filled HTML "mailto:" link code snippets for contact buttons.',
    'category' => 'web-tools',
    'icon' => '@',
    'handler' => 'WebHandler',
    'action' => 'mailtoGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'email',
        'type' => 'text',
        'label' => 'To Application Email',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'subject',
        'type' => 'text',
        'label' => 'Subject Line',
      ),
      2 => 
      array (
        'name' => 'body',
        'type' => 'textarea',
        'label' => 'Message Body',
      ),
    ),
  ),
  'whois-lookup' => 
  array (
    'title' => 'Whois Lookup',
    'desc' => 'Retrieve domain registration and ownership information.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-address-card',
    'handler' => 'DevHandler',
    'action' => 'whoisLookup',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'domain',
        'type' => 'text',
        'label' => 'Domain Name',
        'placeholder' => 'google.com',
        'required' => true,
      ),
    ),
  ),
  'base64-to-image' => 
  array (
    'title' => 'Base64 to Image Decoder',
    'desc' => 'Decode Base64 strings into downloadable image files with real-time preview.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-image',
    'handler' => 'DevHandler',
    'action' => 'base64ToImage',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'mime-lookup' => 
  array (
    'title' => 'MIME Type Lookup',
    'desc' => 'Identify the exact server MIME type notation based on the file extension suffix.',
    'category' => 'web-tools',
    'icon' => 'MIM',
    'handler' => 'WebHandler',
    'action' => 'mimeLookup',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'File Extension (e.g. pdf, json, mp4)',
        'required' => true,
      ),
    ),
  ),
  'hex-to-ascii' => 
  array (
    'title' => 'HEX to ASCII',
    'desc' => 'Convert Hexadecimal strings into readable ASCII text.',
    'category' => 'converters',
    'icon' => 'H>A',
    'handler' => 'ConverterHandler',
    'action' => 'hexToAscii',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Hexadecimal String',
        'required' => true,
      ),
    ),
  ),
  'ascii-to-hex' => 
  array (
    'title' => 'ASCII to HEX',
    'desc' => 'Convert standard ASCII text into Hexadecimal representation.',
    'category' => 'converters',
    'icon' => 'A>H',
    'handler' => 'ConverterHandler',
    'action' => 'asciiToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'ASCII Text',
        'required' => true,
      ),
    ),
  ),
  'rgb-to-hsl' => 
  array (
    'title' => 'RGB to HSL',
    'desc' => 'Convert RGB color values to HSL (Hue, Saturation, Lightness).',
    'category' => 'converters',
    'icon' => 'R>L',
    'handler' => 'ConverterHandler',
    'action' => 'rgbToHsl',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Red (0-255)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'g',
        'type' => 'number',
        'label' => 'Green (0-255)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Blue (0-255)',
        'required' => true,
      ),
    ),
  ),
  'hsl-to-rgb' => 
  array (
    'title' => 'HSL to RGB',
    'desc' => 'Convert HSL (Hue, Saturation, Lightness) to RGB values.',
    'category' => 'converters',
    'icon' => 'L>R',
    'handler' => 'ConverterHandler',
    'action' => 'hslToRgb',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'h',
        'type' => 'number',
        'label' => 'Hue (0-360)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 's',
        'type' => 'number',
        'label' => 'Saturation % (0-100)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'l',
        'type' => 'number',
        'label' => 'Lightness % (0-100)',
        'required' => true,
      ),
    ),
  ),
  'unix-to-datetime' => 
  array (
    'title' => 'UNIX to DateTime',
    'desc' => 'Convert UNIX timestamp to human readable date and time formats.',
    'category' => 'converters',
    'icon' => 'U>D',
    'handler' => 'ConverterHandler',
    'action' => 'unixToDate',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'UNIX Timestamp',
        'required' => true,
      ),
    ),
  ),
  'datetime-to-unix' => 
  array (
    'title' => 'DateTime to UNIX',
    'desc' => 'Convert human readable date and time to UNIX timestamp.',
    'category' => 'converters',
    'icon' => 'D>U',
    'handler' => 'ConverterHandler',
    'action' => 'dateToUnix',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'date',
        'type' => 'text',
        'label' => 'Date/Time (e.g. 2024-01-01 12:00:00)',
        'required' => true,
      ),
    ),
  ),
  'yaml-to-json' => 
  array (
    'title' => 'YAML to JSON Converter',
    'desc' => 'Convert YAML data back into JSON format for easier programatic manipulation.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-sync',
    'handler' => 'DevHandler',
    'action' => 'yamlToJson',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'json-to-yaml' => 
  array (
    'title' => 'JSON to YAML Converter',
    'desc' => 'Instantly transform JSON objects into clean, readable YAML configurations.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-exchange-alt',
    'handler' => 'DevHandler',
    'action' => 'jsonToYaml',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'roman-to-number' => 
  array (
    'title' => 'Roman Numeral to Number',
    'desc' => 'Convert ancient Roman Numerals (e.g. XIV) to standard Arabic numbers.',
    'category' => 'converters',
    'icon' => 'R>N',
    'handler' => 'ConverterHandler',
    'action' => 'romanToNum',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Roman Numeral',
        'required' => true,
      ),
    ),
  ),
  'number-to-roman' => 
  array (
    'title' => 'Number to Roman Numeral',
    'desc' => 'Convert standard Arabic numbers into ancient Roman Numerals.',
    'category' => 'converters',
    'icon' => 'N>R',
    'handler' => 'ConverterHandler',
    'action' => 'numToRoman',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Number (1-3999)',
        'required' => true,
      ),
    ),
  ),
  'keyword-density-checker' => 
  array (
    'title' => '[Ultra Bst Pro] Keyword Density Checker',
    'desc' => 'Analyze text to calculate the percentage density of specific SEO target keywords.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-chart-simple',
    'handler' => 'SeoHandler',
    'action' => 'keywordDensity',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Article Content',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'keyword',
        'type' => 'text',
        'label' => 'Target Keyword',
        'required' => true,
      ),
    ),
  ),
  'serp-snippet-preview' => 
  array (
    'title' => '[Ultra Bst Pro] Google SERP Preview',
    'desc' => 'Visualize exactly how your webpage title and meta description will appear on Google.',
    'category' => 'seo-tools',
    'icon' => 'fa-brands fa-google',
    'handler' => 'SeoHandler',
    'action' => 'serpPreview',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'title',
        'type' => 'text',
        'label' => 'SEO Title (max 60 chars)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'desc',
        'type' => 'textarea',
        'label' => 'Meta Description (max 160 chars)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'Page URL',
        'required' => true,
      ),
    ),
  ),
  'faq-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] FAQ Schema Generator',
    'desc' => 'Generate rich snippets Google FAQ JSON-LD schema markup code for higher CTR.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-circle-question',
    'handler' => 'SeoHandler',
    'action' => 'faqSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'q1',
        'type' => 'text',
        'label' => 'Question 1',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'a1',
        'type' => 'textarea',
        'label' => 'Answer 1',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'q2',
        'type' => 'text',
        'label' => 'Question 2 (Optional)',
      ),
      3 => 
      array (
        'name' => 'a2',
        'type' => 'textarea',
        'label' => 'Answer 2 (Optional)',
      ),
      4 => 
      array (
        'name' => 'q3',
        'type' => 'text',
        'label' => 'Question 3 (Optional)',
      ),
      5 => 
      array (
        'name' => 'a3',
        'type' => 'textarea',
        'label' => 'Answer 3 (Optional)',
      ),
    ),
  ),
  'howto-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] HowTo Schema Generator',
    'desc' => 'Create rich snippet instructional HowTo JSON-LD markup for step-by-step guides.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-list-check',
    'handler' => 'SeoHandler',
    'action' => 'howtoSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'type' => 'text',
        'label' => 'HowTo Title/Name',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'desc',
        'type' => 'text',
        'label' => 'Brief Description',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'time',
        'type' => 'text',
        'label' => 'Total Time (e.g. PT15M for 15 minutes)',
      ),
      3 => 
      array (
        'name' => 'step1',
        'type' => 'text',
        'label' => 'Step 1 Instructions',
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'step2',
        'type' => 'text',
        'label' => 'Step 2 Instructions (Optional)',
      ),
      5 => 
      array (
        'name' => 'step3',
        'type' => 'text',
        'label' => 'Step 3 Instructions (Optional)',
      ),
    ),
  ),
  'article-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Article Schema Generator',
    'desc' => 'Build structured data JSON-LD for Articles and BlogPosts to rank in Top Stories.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-newspaper',
    'handler' => 'SeoHandler',
    'action' => 'articleSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'headline',
        'type' => 'text',
        'label' => 'Article Headline',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'author',
        'type' => 'text',
        'label' => 'Author Name',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'publisher',
        'type' => 'text',
        'label' => 'Publisher/Organization Name',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'image',
        'type' => 'text',
        'label' => 'Featured Image URL',
      ),
      4 => 
      array (
        'name' => 'date',
        'type' => 'text',
        'label' => 'Date Published (YYYY-MM-DD)',
        'required' => true,
      ),
    ),
  ),
  'product-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Product Schema Generator',
    'desc' => 'Generate e-commerce Product formatting structured data with price and reviews.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-cart-shopping',
    'handler' => 'SeoHandler',
    'action' => 'productSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'type' => 'text',
        'label' => 'Product Name',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'desc',
        'type' => 'text',
        'label' => 'Description',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'brand',
        'type' => 'text',
        'label' => 'Brand Name',
      ),
      3 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Price',
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'currency',
        'type' => 'text',
        'label' => 'Currency (e.g. USD)',
        'required' => true,
        'value' => 'USD',
      ),
    ),
  ),
  'recipe-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Recipe Schema Generator',
    'desc' => 'Create rich snippet JSON-LD food and culinary Recipe formatting for Google Search.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-utensils',
    'handler' => 'SeoHandler',
    'action' => 'recipeSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'type' => 'text',
        'label' => 'Diet/Recipe Name',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'author',
        'type' => 'text',
        'label' => 'Author',
      ),
      2 => 
      array (
        'name' => 'time',
        'type' => 'text',
        'label' => 'Prep Time (e.g. PT20M)',
      ),
      3 => 
      array (
        'name' => 'yield',
        'type' => 'text',
        'label' => 'Recipe Yield (e.g. 4 servings)',
      ),
      4 => 
      array (
        'name' => 'ingredients',
        'type' => 'textarea',
        'label' => 'Ingredients (Line Separated)',
        'required' => true,
      ),
    ),
  ),
  'job-posting-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Job Posting Schema',
    'desc' => 'Generate rich snippet JSON-LD for Google Jobs hiring board aggregator.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-briefcase',
    'handler' => 'SeoHandler',
    'action' => 'jobSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'title',
        'type' => 'text',
        'label' => 'Job Title',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'company',
        'type' => 'text',
        'label' => 'Hiring Organization',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'location',
        'type' => 'text',
        'label' => 'Location (City, Country)',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'select',
        'label' => 'Employment Type',
        'options' => 
        array (
          'FULL_TIME' => 'Full Time',
          'PART_TIME' => 'Part Time',
          'CONTRACTOR' => 'Contractor',
          'INTERN' => 'Intern',
        ),
      ),
      4 => 
      array (
        'name' => 'date',
        'type' => 'text',
        'label' => 'Valid Through (YYYY-MM-DD)',
      ),
    ),
  ),
  'event-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Event Schema Generator',
    'desc' => 'Generate Event JSON-LD to display concert, festival, or webinar dates in Google.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-calendar-days',
    'handler' => 'SeoHandler',
    'action' => 'eventSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'type' => 'text',
        'label' => 'Event Name',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'start',
        'type' => 'text',
        'label' => 'Start Date/Time (YYYY-MM-DDTHH:MM)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'location',
        'type' => 'text',
        'label' => 'Venue / Location Name',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'address',
        'type' => 'text',
        'label' => 'Venue Address',
        'required' => true,
      ),
    ),
  ),
  'video-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Video Schema Generator',
    'desc' => 'Create rich snippet VideoObject metadata marking up embeded videos on your site.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-file-video',
    'handler' => 'SeoHandler',
    'action' => 'videoSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'type' => 'text',
        'label' => 'Video Title',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'desc',
        'type' => 'text',
        'label' => 'Video Description',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'thumb',
        'type' => 'text',
        'label' => 'Thumbnail URL',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'content',
        'type' => 'text',
        'label' => 'Content URL (e.g. .mp4 link)',
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'date',
        'type' => 'text',
        'label' => 'Upload Date (YYYY-MM-DD)',
        'required' => true,
      ),
    ),
  ),
  'breadcrumb-schema-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Breadcrumb Schema',
    'desc' => 'Construct BreadcrumbList JSON-LD to organize your sites internal page hierarchy.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-folder-tree',
    'handler' => 'SeoHandler',
    'action' => 'breadcrumbSchema',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'n1',
        'type' => 'text',
        'label' => 'Level 1 Name (e.g. Home)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'u1',
        'type' => 'text',
        'label' => 'Level 1 URL',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'n2',
        'type' => 'text',
        'label' => 'Level 2 Name (e.g. Category)',
      ),
      3 => 
      array (
        'name' => 'u2',
        'type' => 'text',
        'label' => 'Level 2 URL',
      ),
      4 => 
      array (
        'name' => 'n3',
        'type' => 'text',
        'label' => 'Level 3 Name (e.g. Post)',
      ),
      5 => 
      array (
        'name' => 'u3',
        'type' => 'text',
        'label' => 'Level 3 URL',
      ),
    ),
  ),
  'hreflang-tags-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Hreflang Tags Generator',
    'desc' => 'Generate HTML link rel="alternate" hreflang attributes for multi-lingual websites.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-language',
    'handler' => 'SeoHandler',
    'action' => 'hreflangGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'default',
        'type' => 'text',
        'label' => 'Default URL (x-default)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'lang1',
        'type' => 'text',
        'label' => 'Language 1 Code (e.g. en, es, fr)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'url1',
        'type' => 'text',
        'label' => 'Language 1 URL',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'lang2',
        'type' => 'text',
        'label' => 'Language 2 Code (Optional)',
      ),
      4 => 
      array (
        'name' => 'url2',
        'type' => 'text',
        'label' => 'Language 2 URL (Optional)',
      ),
    ),
  ),
  'canonical-tag-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Canonical Tag Generator',
    'desc' => 'Instantly generate an SEO rel="canonical" tag to avoid duplicate content penalties.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-link',
    'handler' => 'SeoHandler',
    'action' => 'canonicalGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'Original Authoritative URL',
        'required' => true,
      ),
    ),
  ),
  'disavow-file-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Disavow File Generator',
    'desc' => 'Format a clean txt file for submitting toxic backlink disavowals to Google Search Console.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-ban',
    'handler' => 'SeoHandler',
    'action' => 'disavowGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Domains to Disavow (Line Separated)',
        'required' => true,
      ),
    ),
  ),
  'xml-sitemap-validator' => 
  array (
    'title' => '[Ultra Bst Pro] XML Sitemap Validator',
    'desc' => 'Validate if raw XML sitemap text adheres to the standard sitemap protocol schema.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-sitemap',
    'handler' => 'SeoHandler',
    'action' => 'sitemapValidator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Paste XML Sitemap Code',
        'required' => true,
      ),
    ),
  ),
  'keyword-merger' => 
  array (
    'title' => '[Ultra Bst Pro] Keyword Merger',
    'desc' => 'Combine up to 3 lists of words together to generate massive permutated keyword lists for PPC.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-object-group',
    'handler' => 'SeoHandler',
    'action' => 'keywordMerger',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'list1',
        'type' => 'textarea',
        'label' => 'List 1 (Line Separated)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'list2',
        'type' => 'textarea',
        'label' => 'List 2 (Line Separated)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'list3',
        'type' => 'textarea',
        'label' => 'List 3 (Optional)',
      ),
    ),
  ),
  'long-tail-suggester' => 
  array (
    'title' => '[Ultra Bst Pro] Long Tail Suggester',
    'desc' => 'Bulk append localized suffixes, prepositions, and prefixes (buy, best, near me) to keywords.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-arrow-down-z-a',
    'handler' => 'SeoHandler',
    'action' => 'longTailHelper',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Seed Keywords (Line Separated)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'strategy',
        'type' => 'select',
        'label' => 'Modifier Strategy',
        'options' => 
        array (
          'buyer' => 'Buyer Intent (buy, cheap, best)',
          'local' => 'Local Intent (near me, in [City])',
          'question' => 'Questions (how to, what is)',
        ),
      ),
    ),
  ),
  'seo-url-checker' => 
  array (
    'title' => '[Ultra Bst Pro] SEO Friendly URL Checker',
    'desc' => 'Check your URL structure against the latest algorithm guidelines for length and characters.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-link-slash',
    'handler' => 'SeoHandler',
    'action' => 'urlChecker',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'Full URL to Check',
        'required' => true,
      ),
    ),
  ),
  'meta-refresh-generator' => 
  array (
    'title' => '[Ultra Bst Pro] Meta Refresh Generator',
    'desc' => 'Generate HTML meta refresh tags for client-side redirection when 301 server redirects fail.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-arrows-rotate',
    'handler' => 'SeoHandler',
    'action' => 'metaRefresh',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'Destination URL',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'time',
        'type' => 'number',
        'label' => 'Wait Time (Seconds)',
        'value' => '0',
        'required' => true,
      ),
    ),
  ),
  'google-indexing-api' => 
  array (
    'title' => '[Ultra Bst Pro] Google Indexing JSON',
    'desc' => 'Build the strict JSON payload body required to POST to the true Google Indexing API.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-bolt-lightning',
    'handler' => 'SeoHandler',
    'action' => 'indexingApi',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'URL to Update/Remove',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'type',
        'type' => 'select',
        'label' => 'Request Notification Type',
        'options' => 
        array (
          'URL_UPDATED' => 'URL_UPDATED (Crawl / Request Indexing)',
          'URL_DELETED' => 'URL_DELETED (Remove from Index)',
        ),
      ),
    ),
  ),
  'css-gradient-generator' => 
  array (
    'title' => 'CSS Gradient Generator (Pro)',
    'desc' => 'Design stunning, cross-browser compatible linear and radial CSS backgrounds visually.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-droplet',
    'handler' => 'DevHandler',
    'action' => 'cssGradientGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'css-triangle-generator' => 
  array (
    'title' => 'CSS Triangle Generator',
    'desc' => 'Generate pure CSS code for triangles of any size, color, or direction.',
    'category' => 'design-tools',
    'icon' => '▲',
    'handler' => 'CssHandler',
    'action' => 'triangleGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'direction',
        'type' => 'select',
        'label' => 'Direction',
        'options' => 
        array (
          'top' => 'Top',
          'bottom' => 'Bottom',
          'left' => 'Left',
          'right' => 'Right',
        ),
      ),
      1 => 
      array (
        'name' => 'color',
        'type' => 'color',
        'label' => 'Color',
        'value' => '#ff7a59',
      ),
      2 => 
      array (
        'name' => 'size',
        'type' => 'number',
        'label' => 'Size (px)',
        'value' => '50',
      ),
    ),
  ),
  'css-ribbon-generator' => 
  array (
    'title' => 'CSS Ribbon Generator',
    'desc' => 'Create stylish CSS ribbons for headers and labels with code to match.',
    'category' => 'design-tools',
    'icon' => '🎗️',
    'handler' => 'CssHandler',
    'action' => 'ribbonGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Ribbon Text',
        'value' => 'Sale!',
      ),
      1 => 
      array (
        'name' => 'color',
        'type' => 'color',
        'label' => 'Color',
        'value' => '#dc2626',
      ),
    ),
  ),
  'css-blob-generator' => 
  array (
    'title' => 'CSS Blob Generator',
    'desc' => 'Generate organic, random blob shapes for modern UI layouts.',
    'category' => 'design-tools',
    'icon' => '💧',
    'handler' => 'CssHandler',
    'action' => 'blobGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'color',
        'label' => 'Color',
        'value' => '#ff7a59',
      ),
    ),
  ),
  'css-text-shadow' => 
  array (
    'title' => 'CSS Text Shadow',
    'desc' => 'Easily construct complex text-shadow variables visually.',
    'category' => 'dev-tools',
    'icon' => 'T',
    'handler' => 'CssHandler',
    'action' => 'textShadow',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'offset_x',
        'type' => 'number',
        'label' => 'Offset X (px)',
        'value' => '2',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'offset_y',
        'type' => 'number',
        'label' => 'Offset Y (px)',
        'value' => '2',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'blur',
        'type' => 'number',
        'label' => 'Blur Radius (px)',
        'value' => '4',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'color',
        'type' => 'text',
        'label' => 'Shadow Color',
        'value' => 'rgba(0,0,0,0.5)',
        'required' => true,
      ),
    ),
  ),
  'css-button-generator' => 
  array (
    'title' => 'CSS Button Generator',
    'desc' => 'Quickly design professional CSS buttons for your web projects.',
    'category' => 'design-tools',
    'icon' => '🔘',
    'handler' => 'CssHandler',
    'action' => 'buttonGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Button Text',
        'value' => 'Click Me',
      ),
      1 => 
      array (
        'name' => 'bg',
        'type' => 'color',
        'label' => 'Background',
        'value' => '#ff7a59',
      ),
      2 => 
      array (
        'name' => 'radius',
        'type' => 'number',
        'label' => 'Radius (px)',
        'value' => '8',
      ),
    ),
  ),
  'neumorphism-generator' => 
  array (
    'title' => 'Neumorphism Generator',
    'desc' => 'Calculate soft UI CSS box-shadows dynamically for neumorphic aesthetics.',
    'category' => 'dev-tools',
    'icon' => 'N',
    'handler' => 'CssHandler',
    'action' => 'neumorphismGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'text',
        'label' => 'Base UI Color',
        'value' => '#e0e5ec',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'distance',
        'type' => 'number',
        'label' => 'Shadow Distance (px)',
        'value' => '9',
        'required' => true,
      ),
    ),
  ),
  'glassmorphism-generator' => 
  array (
    'title' => 'Glassmorphism UI',
    'desc' => 'Design frosted-glass effects applying CSS backdrop-filters.',
    'category' => 'dev-tools',
    'icon' => '🍷',
    'handler' => 'CssHandler',
    'action' => 'glassmorphismGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'blur',
        'type' => 'number',
        'label' => 'Blur (px)',
        'value' => '10',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'transparency',
        'type' => 'text',
        'label' => 'Transparency (0 to 1)',
        'value' => '0.2',
        'required' => true,
      ),
    ),
  ),
  'css-grid-generator' => 
  array (
    'title' => 'CSS Grid Layout',
    'desc' => 'Generate structural CSS Grid display columns and rows templates.',
    'category' => 'dev-tools',
    'icon' => '▦',
    'handler' => 'CssHandler',
    'action' => 'gridGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'col',
        'type' => 'number',
        'label' => 'Columns',
        'value' => '3',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'row',
        'type' => 'number',
        'label' => 'Rows',
        'value' => '3',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'gap',
        'type' => 'number',
        'label' => 'Gap (px)',
        'value' => '20',
        'required' => true,
      ),
    ),
  ),
  'css-flexbox-generator' => 
  array (
    'title' => 'CSS Flexbox Generator',
    'desc' => 'Configure flex direction, alignment, and justification for your components.',
    'category' => 'design-tools',
    'icon' => '↔️',
    'handler' => 'CssHandler',
    'action' => 'flexGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'direction',
        'type' => 'select',
        'label' => 'Direction',
        'options' => 
        array (
          'row' => 'Row',
          'column' => 'Column',
        ),
      ),
      1 => 
      array (
        'name' => 'justify',
        'type' => 'select',
        'label' => 'Justify',
        'options' => 
        array (
          'center' => 'Center',
          'flex-start' => 'Start',
          'flex-end' => 'End',
          'space-between' => 'Between',
        ),
      ),
      2 => 
      array (
        'name' => 'align',
        'type' => 'select',
        'label' => 'Align',
        'options' => 
        array (
          'center' => 'Center',
          'flex-start' => 'Start',
          'flex-end' => 'End',
        ),
      ),
    ),
  ),
  'css-transform-generator' => 
  array (
    'title' => 'CSS Transform',
    'desc' => 'Generate dynamic 2D and 3D CSS rotate, scale, skew, and translate matrices.',
    'category' => 'dev-tools',
    'icon' => '🔄',
    'handler' => 'CssHandler',
    'action' => 'transformGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'rotate',
        'type' => 'number',
        'label' => 'Rotate (deg)',
        'value' => '45',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'scale',
        'type' => 'text',
        'label' => 'Scale',
        'value' => '1.5',
        'required' => true,
      ),
    ),
  ),
  'css-animation-generator' => 
  array (
    'title' => 'CSS Keyframes',
    'desc' => 'Create CSS @keyframes animation steps mapped clearly.',
    'category' => 'dev-tools',
    'icon' => '🎬',
    'handler' => 'CssHandler',
    'action' => 'keyframeGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'type' => 'text',
        'label' => 'Animation Name',
        'value' => 'bounce',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'dur',
        'type' => 'text',
        'label' => 'Duration (s)',
        'value' => '2s',
        'required' => true,
      ),
    ),
  ),
  'svg-wave-generator' => 
  array (
    'title' => 'SVG Wave Generator',
    'desc' => 'Unique SVG waves for section dividers and hero backgrounds.',
    'category' => 'design-tools',
    'icon' => '🌊',
    'handler' => 'CssHandler',
    'action' => 'svgWaveGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'color',
        'label' => 'Wave Color',
        'value' => '#ff7a59',
      ),
    ),
  ),
  'svg-pattern-generator' => 
  array (
    'title' => 'SVG Pattern Generator',
    'desc' => 'Create repeatable SVG background patterns (dots, grids, diagonals).',
    'category' => 'design-tools',
    'icon' => '🏁',
    'handler' => 'CssHandler',
    'action' => 'svgPattern',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'type',
        'type' => 'select',
        'label' => 'Pattern',
        'options' => 
        array (
          'dots' => 'Dots',
          'grid' => 'Grid',
          'diagonal' => 'Diagonal',
        ),
      ),
    ),
  ),
  'tailwind-palette-generator' => 
  array (
    'title' => 'Tailwind Palette Generator',
    'desc' => 'Auto-generate a 50-900 CSS scale matching Tailwind CSS standards.',
    'category' => 'dev-tools',
    'icon' => 'T',
    'handler' => 'CssHandler',
    'action' => 'tailwindPalette',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'text',
        'label' => 'Base Brand Color (HEX)',
        'value' => '#3b82f6',
        'required' => true,
      ),
    ),
  ),
  'material-palette-picker' => 
  array (
    'title' => 'Material Palette',
    'desc' => 'Pick explicitly from standard Google Material Design default arrays.',
    'category' => 'dev-tools',
    'icon' => 'M',
    'handler' => 'CssHandler',
    'action' => 'materialPalette',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'hue',
        'type' => 'select',
        'label' => 'Select Material Hue',
        'options' => 
        array (
          'red' => 'Red',
          'blue' => 'Blue',
          'green' => 'Green',
          'orange' => 'Orange',
          'purple' => 'Purple',
        ),
      ),
    ),
  ),
  'color-blindness-simulator' => 
  array (
    'title' => 'Color Blindness Simulator',
    'desc' => 'Simulate how different protanopia/deuteranopia combinations view a color.',
    'category' => 'dev-tools',
    'icon' => '👁️',
    'handler' => 'CssHandler',
    'action' => 'colorBlind',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'text',
        'label' => 'Hex Color Format',
        'value' => '#ff7a59',
        'required' => true,
      ),
    ),
  ),
  'image-color-picker' => 
  array (
    'title' => 'Image Color Picker',
    'desc' => 'Note: Requires JS interaction to read colors directly. This is a basic demo fallback.',
    'category' => 'dev-tools',
    'icon' => '🎨',
    'handler' => 'CssHandler',
    'action' => 'imageColor',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'note',
        'type' => 'text',
        'label' => 'Info',
        'value' => 'Use desktop color picker tools mostly. Server logic restricted.',
      ),
    ),
  ),
  'base64-image-pattern' => 
  array (
    'title' => 'Base64 Pattern CSS',
    'desc' => 'Convert a Base64 image payload into seamless CSS background.',
    'category' => 'dev-tools',
    'icon' => 'B64',
    'handler' => 'CssHandler',
    'action' => 'base64Pattern',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'b64',
        'type' => 'textarea',
        'label' => 'Base64 image/png string',
        'required' => true,
      ),
    ),
  ),
  'web-safe-fonts' => 
  array (
    'title' => 'Web Safe Fonts',
    'desc' => 'Quickly preview standard system UI fonts and their CSS stacks.',
    'category' => 'dev-tools',
    'icon' => 'Aa',
    'handler' => 'CssHandler',
    'action' => 'webFonts',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Preview Text',
        'value' => 'The quick brown fox jumps over the lazy dog.',
        'required' => true,
      ),
    ),
  ),
  'youtube-thumbnail-downloader' => 
  array (
    'title' => 'YouTube Thumbnail Downloader',
    'desc' => 'Instantly grab Max Res (HD) thumbnails from any YouTube video URL.',
    'category' => 'social-tools',
    'icon' => '▶️',
    'handler' => 'SocialHandler',
    'action' => 'ytThumbnail',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'YouTube Video URL',
        'placeholder' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        'required' => true,
      ),
    ),
  ),
  'fancy-font-generator' => 
  array (
    'title' => 'Instagram Fonts Generator',
    'desc' => 'Generate cursive, bold, italic, and fancy text for Instagram/X bios.',
    'category' => 'social-tools',
    'icon' => '𝓕',
    'handler' => 'SocialHandler',
    'action' => 'fancyFonts',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter normal text',
        'value' => 'Hello World',
        'required' => true,
      ),
    ),
  ),
  'invisible-text-generator' => 
  array (
    'title' => 'Invisible Text Generator',
    'desc' => 'Copy paste empty characters (Hangul Filler) for blank names or messages.',
    'category' => 'social-tools',
    'icon' => '👻',
    'handler' => 'SocialHandler',
    'action' => 'invisibleText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'kaomoji-lenny-faces' => 
  array (
    'title' => 'Kaomoji & Lenny Faces',
    'desc' => 'A curated list of Japanese text emoticons ready to copy and paste.',
    'category' => 'social-tools',
    'icon' => '( ͡° ͜ʖ ͡°)',
    'handler' => 'SocialHandler',
    'action' => 'kaomoji',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'vaporwave-text-generator' => 
  array (
    'title' => 'Vaporwave / Aesthetic Text',
    'desc' => 'Ｃｏｎｖｅｒｔ　ｔｅｘｔ　ｉｎｔｏ　ｆｕｌｌｗｉｄｔｈ　ａｅｓｔｈｅｔｉｃ．',
    'category' => 'social-tools',
    'icon' => '🌴',
    'handler' => 'SocialHandler',
    'action' => 'vaporwave',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter text',
        'value' => 'vaporwave aesthetic',
        'required' => true,
      ),
    ),
  ),
  'zalgo-text-generator' => 
  array (
    'title' => 'Zalgo Glitch Text',
    'desc' => 'G̷e̷n̷e̷r̷a̷t̷e̷ ̷c̷r̷e̷e̷p̷y̷ ̷g̷l̷i̷t̷c̷h̷e̷d̷ ̷t̷e̷x̷t̷ for memes and scary posts.',
    'category' => 'social-tools',
    'icon' => '̷Z̷',
    'handler' => 'SocialHandler',
    'action' => 'zalgo',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter normal text',
        'value' => 'I come from the dark',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'level',
        'type' => 'select',
        'label' => 'Glitch Level',
        'options' => 
        array (
          'min' => 'Low',
          'mid' => 'Medium',
          'max' => 'High',
        ),
      ),
    ),
  ),
  'hashtag-extractor' => 
  array (
    'title' => 'Hashtag Extractor',
    'desc' => 'Extract all #hashtags from a block of text into a neat list.',
    'category' => 'social-tools',
    'icon' => '#',
    'handler' => 'SocialHandler',
    'action' => 'extractTags',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Paste caption or article here',
        'required' => true,
      ),
    ),
  ),
  'click-to-tweet-link' => 
  array (
    'title' => 'Click to Tweet Link',
    'desc' => 'Generate sharable Twitter/X URLs pre-filled with specific text.',
    'category' => 'social-tools',
    'icon' => '🐦',
    'handler' => 'SocialHandler',
    'action' => 'tweetLink',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Tweet Text',
        'required' => true,
      ),
    ),
  ),
  'twitter-video-downloader' => 
  array (
    'title' => 'Platform Video Downloader',
    'desc' => 'Information on setting up generic video downloading solutions using APIs.',
    'category' => 'social-tools',
    'icon' => '𝕏',
    'handler' => 'SocialHandler',
    'action' => 'socialInfo',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'platform',
        'type' => 'select',
        'label' => 'Select Platform',
        'options' => 
        array (
          'twitter' => 'X / Twitter',
          'facebook' => 'Facebook',
          'tiktok' => 'TikTok',
        ),
      ),
    ),
  ),
  'emoji-translator' => 
  array (
    'title' => 'Text to Emoji Translator',
    'desc' => 'Replaces recognized words with their respective emojis 🌟.',
    'category' => 'social-tools',
    'icon' => '😀',
    'handler' => 'SocialHandler',
    'action' => 'emojiTranslate',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter text',
        'value' => 'I love pizza and cats.',
        'required' => true,
      ),
    ),
  ),
  'strikethrough-text' => 
  array (
    'title' => 'Strikethrough Text',
    'desc' => 'G̶e̶n̶e̶r̶a̶t̶e̶ ̶s̶t̶r̶i̶k̶e̶t̶h̶r̶o̶u̶g̶h̶ text for social media platforms.',
    'category' => 'social-tools',
    'icon' => 'S̶',
    'handler' => 'SocialHandler',
    'action' => 'strike',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter text to cross out',
        'required' => true,
      ),
    ),
  ),
  'morse-code-translator' => 
  array (
    'title' => 'Morse Code Translator',
    'desc' => 'Translate text to Morse code (... --- ...) and vice versa.',
    'category' => 'social-tools',
    'icon' => '.-.',
    'handler' => 'SocialHandler',
    'action' => 'morse',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text or Morse Code',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'mode',
        'type' => 'select',
        'label' => 'Direction',
        'options' => 
        array (
          'encode' => 'Text to Morse',
          'decode' => 'Morse to Text',
        ),
      ),
    ),
  ),
  'what-is-my-ip' => 
  array (
    'title' => 'What is My IP Address?',
    'desc' => 'Instantly discover your public IPv4/IPv6 address and basic network details.',
    'category' => 'dev-tools',
    'icon' => '🌐',
    'handler' => 'NetworkHandler',
    'action' => 'myIp',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'subnet-calculator' => 
  array (
    'title' => 'Subnet & CIDR Calculator (Pro)',
    'desc' => 'Identify network masks, broadcasting constraints, and usable host pathways instantly utilizing IPv4 network metrics.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-network-wired',
    'handler' => 'DevHandler',
    'action' => 'subnetCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'ping-test' => 
  array (
    'title' => 'Ping Test',
    'desc' => 'Check server latency and reachability (ICMP/TCP fallback proxy).',
    'category' => 'dev-tools',
    'icon' => '📡',
    'handler' => 'NetworkHandler',
    'action' => 'pingTest',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'host',
        'type' => 'text',
        'label' => 'Domain or IP',
        'placeholder' => 'google.com',
        'required' => true,
      ),
    ),
  ),
  'port-scanner' => 
  array (
    'title' => 'Online Port Scanner',
    'desc' => 'Check the status of common ports on a remote server or IP.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-search-location',
    'handler' => 'DevHandler',
    'action' => 'portScanner',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'host',
        'type' => 'text',
        'label' => 'Host/IP',
        'placeholder' => 'example.com',
        'required' => true,
      ),
    ),
  ),
  'ssl-checker' => 
  array (
    'title' => '[Ultra Bst Pro] SSL Certificate Checker',
    'desc' => 'Verify SSL/TLS certificate validity, issuer, and expiration date.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-certificate',
    'handler' => 'NetworkHandler',
    'action' => 'sslChecker',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'domain',
        'type' => 'text',
        'label' => 'Domain Name',
        'placeholder' => 'example.com',
        'required' => true,
      ),
    ),
  ),
  'http2-checker' => 
  array (
    'title' => 'HTTP/2 Protocol Checker',
    'desc' => 'Test if a website supports the faster HTTP/2 protocol.',
    'category' => 'dev-tools',
    'icon' => '⚡',
    'handler' => 'NetworkHandler',
    'action' => 'http2Check',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'Website URL',
        'placeholder' => 'https://example.com',
        'required' => true,
      ),
    ),
  ),
  'password-strength' => 
  array (
    'title' => '[Ultra Bst Pro] Password Strength Checker',
    'desc' => 'Analyze entropy and guessability of your passwords.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-gauge-high',
    'handler' => 'NetworkHandler',
    'action' => 'passwordStrength',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'password',
        'type' => 'text',
        'label' => 'Enter Password',
        'required' => true,
      ),
    ),
  ),
  'credit-card-validator' => 
  array (
    'title' => 'Credit Card Validator',
    'desc' => 'Check if a credit card number is valid using the Luhn algorithm.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-credit-card',
    'handler' => 'DevHandler',
    'action' => 'creditCardValidator',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'card_number',
        'type' => 'text',
        'label' => 'Card Number',
        'required' => true,
      ),
    ),
  ),
  'fake-profile-generator' => 
  array (
    'title' => 'Fake Identity Generator',
    'desc' => 'Generate random realistic user profiles (Name, Email, Phone, Job).',
    'category' => 'dev-tools',
    'icon' => '👤',
    'handler' => 'FakeDataHandler',
    'action' => 'profileGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'gender',
        'type' => 'select',
        'label' => 'Gender',
        'options' => 
        array (
          'any' => 'Random',
          'male' => 'Male',
          'female' => 'Female',
        ),
      ),
    ),
  ),
  'fake-address-generator' => 
  array (
    'title' => 'Fake Address Generator',
    'desc' => 'Create random street addresses, cities, and zip codes for testing.',
    'category' => 'dev-tools',
    'icon' => '🏠',
    'handler' => 'FakeDataHandler',
    'action' => 'addressGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'country',
        'type' => 'select',
        'label' => 'Country',
        'options' => 
        array (
          'us' => 'United States',
          'uk' => 'United Kingdom',
          'ca' => 'Canada',
        ),
      ),
    ),
  ),
  'dummy-credit-card' => 
  array (
    'title' => 'Dummy Credit Card Generator',
    'desc' => 'Generate valid-format Credit Card numbers (Luhn checked) for software testing.',
    'category' => 'dev-tools',
    'icon' => '💳',
    'handler' => 'FakeDataHandler',
    'action' => 'dummyCC',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'network',
        'type' => 'select',
        'label' => 'Network',
        'options' => 
        array (
          'visa' => 'Visa',
          'mc' => 'Mastercard',
          'amex' => 'Amex',
        ),
      ),
    ),
  ),
  'random-joke-generator' => 
  array (
    'title' => 'Random Joke Generator',
    'desc' => 'Get a random programming or dad joke at the click of a button.',
    'category' => 'dev-tools',
    'icon' => '😂',
    'handler' => 'FakeDataHandler',
    'action' => 'jokeGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'random-quote-generator' => 
  array (
    'title' => 'Random Quote Generator',
    'desc' => 'Generate inspirational or famous quotes randomly.',
    'category' => 'dev-tools',
    'icon' => '💬',
    'handler' => 'FakeDataHandler',
    'action' => 'quoteGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'random-date-generator' => 
  array (
    'title' => 'Random Date Generator',
    'desc' => 'Generate a random date within a specified range.',
    'category' => 'dev-tools',
    'icon' => '📅',
    'handler' => 'FakeDataHandler',
    'action' => 'dateGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'start',
        'type' => 'number',
        'label' => 'Start Year',
        'value' => '1950',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'end',
        'type' => 'number',
        'label' => 'End Year',
        'value' => '2030',
        'required' => true,
      ),
    ),
  ),
  'random-location-generator' => 
  array (
    'title' => 'Random Country & City Generator',
    'desc' => 'Pick a random country, capital, or city from our database.',
    'category' => 'dev-tools',
    'icon' => '🌍',
    'handler' => 'FakeDataHandler',
    'action' => 'locationGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'json-mock-data' => 
  array (
    'title' => 'JSON Mock Data Generator',
    'desc' => 'Generate arrays of JSON objects containing random realistic data strings.',
    'category' => 'dev-tools',
    'icon' => '{ }',
    'handler' => 'FakeDataHandler',
    'action' => 'jsonMock',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'rows',
        'type' => 'number',
        'label' => 'Number of Rows',
        'value' => '5',
        'required' => true,
      ),
    ),
  ),
  'sql-mock-data' => 
  array (
    'title' => 'SQL Mock Data Generator',
    'desc' => 'Generate a block of SQL INSERT statements filled with random data.',
    'category' => 'dev-tools',
    'icon' => '🗃️',
    'handler' => 'FakeDataHandler',
    'action' => 'sqlMock',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'rows',
        'type' => 'number',
        'label' => 'Number of Rows',
        'value' => '5',
        'required' => true,
      ),
    ),
  ),
  'csv-mock-data' => 
  array (
    'title' => 'CSV Mock Data Generator',
    'desc' => 'Generate a dummy comma-separated CSV block for spreadsheet testing.',
    'category' => 'dev-tools',
    'icon' => '📊',
    'handler' => 'FakeDataHandler',
    'action' => 'csvMock',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'rows',
        'type' => 'number',
        'label' => 'Number of Rows',
        'value' => '10',
        'required' => true,
      ),
    ),
  ),
  'xml-mock-data' => 
  array (
    'title' => 'XML Mock Data Generator',
    'desc' => 'Generate standard XML tree data filled with realistic dummy users.',
    'category' => 'dev-tools',
    'icon' => '< >',
    'handler' => 'FakeDataHandler',
    'action' => 'xmlMock',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'rows',
        'type' => 'number',
        'label' => 'Number of Records',
        'value' => '3',
        'required' => true,
      ),
    ),
  ),
  'regex-patterns' => 
  array (
    'title' => 'Common Regex Cheat Sheet',
    'desc' => 'A curated list of common regex patterns (email, url, ips, phones) to copy.',
    'category' => 'dev-tools',
    'icon' => '.*',
    'handler' => 'FakeDataHandler',
    'action' => 'regexTemplates',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'cron-parser' => 
  array (
    'title' => 'Cron Expression Parser',
    'desc' => 'Translate cron expressions (e.g. 0 0 * * *) into plain English schedules.',
    'category' => 'dev-tools',
    'icon' => '⏱️',
    'handler' => 'FakeDataHandler',
    'action' => 'cronParse',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'cron',
        'type' => 'text',
        'label' => 'Cron Expression',
        'value' => '0 12 * * 1-5',
        'required' => true,
      ),
    ),
  ),
  'uuid-v4-generator' => 
  array (
    'title' => 'UUID v4 Generator',
    'desc' => 'Generate batches of universally unique identifier (UUID) v4 strings.',
    'category' => 'dev-tools',
    'icon' => '🆔',
    'handler' => 'FakeDataHandler',
    'action' => 'uuidGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity',
        'value' => '5',
        'required' => true,
      ),
    ),
  ),
  'image-cropper' => 
  array (
    'title' => 'Image Cropper',
    'desc' => 'Crop your images to any aspect ratio online instantly.',
    'category' => 'image-tools',
    'icon' => '✂️',
    'handler' => 'ImageHandler',
    'action' => 'imageCropper',
    'controller' => 'ImageController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload Image (PNG/JPG)',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'aspect_ratio',
        'type' => 'presets',
        'label' => 'Aspect Ratio',
        'options' => 
        array (
          0 => 
          array (
            'label' => 'Free',
            'value' => 'NaN',
          ),
          1 => 
          array (
            'label' => '1:1',
            'value' => '1',
          ),
          2 => 
          array (
            'label' => '4:3',
            'value' => '1.333',
          ),
          3 => 
          array (
            'label' => '16:9',
            'value' => '1.777',
          ),
          4 => 
          array (
            'label' => '3:2',
            'value' => '1.5',
          ),
          5 => 
          array (
            'label' => '9:16',
            'value' => '0.5625',
          ),
        ),
      ),
      2 => 
      array (
        'name' => 'crop_x',
        'type' => 'hidden',
        'value' => '0',
      ),
      3 => 
      array (
        'name' => 'crop_y',
        'type' => 'hidden',
        'value' => '0',
      ),
      4 => 
      array (
        'name' => 'crop_width',
        'type' => 'hidden',
        'value' => '0',
      ),
      5 => 
      array (
        'name' => 'crop_height',
        'type' => 'hidden',
        'value' => '0',
      ),
    ),
  ),
  'image-compressor' => 
  array (
    'title' => 'Image Compressor',
    'desc' => 'Significantly reduce the file size of your images down to kilobytes without quality loss.',
    'category' => 'image-tools',
    'icon' => '🗜️',
    'handler' => 'ImageHandler',
    'action' => 'compress',
    'controller' => 'ImageController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select Image File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'compression_quality',
        'type' => 'range',
        'label' => 'Compression Quality (%)',
        'min' => '1',
        'max' => '100',
        'value' => '80',
      ),
      2 => 
      array (
        'name' => 'output_format',
        'type' => 'cards',
        'label' => 'Output Format',
        'options' => 
        array (
          'auto' => 
          array (
            'icon' => '✨',
            'title' => 'Auto',
            'desc' => 'Keep Original',
          ),
          'jpeg' => 
          array (
            'icon' => '📸',
            'title' => 'JPEG',
            'desc' => 'Best for Photos',
          ),
          'png' => 
          array (
            'icon' => '🖼️',
            'title' => 'PNG',
            'desc' => 'Lossless',
          ),
          'webp' => 
          array (
            'icon' => '🌐',
            'title' => 'WebP',
            'desc' => 'Next-Gen Size',
          ),
        ),
        'value' => 'auto',
      ),
      3 => 
      array (
        'name' => 'resize_width',
        'type' => 'number',
        'label' => 'Max Width (px)',
        'placeholder' => 'e.g. 1920',
      ),
      4 => 
      array (
        'name' => 'resize_height',
        'type' => 'number',
        'label' => 'Max Height (px)',
        'placeholder' => 'e.g. 1080',
      ),
    ),
  ),
  'image-resizer' => 
  array (
    'title' => 'Image Resizer',
    'desc' => 'Resize your images by defining exact pixels or percentages.',
    'category' => 'image-tools',
    'icon' => '↔️',
    'handler' => 'ImageHandler',
    'action' => 'resize',
    'controller' => 'ImageController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select Image',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'presets',
        'type' => 'presets',
        'label' => 'Quick Presets',
        'options' => 
        array (
          0 => 
          array (
            'label' => 'HD (1920x1080)',
            'w' => '1920',
            'h' => '1080',
          ),
          1 => 
          array (
            'label' => '720p (1280x720)',
            'w' => '1280',
            'h' => '720',
          ),
          2 => 
          array (
            'label' => 'Instagram (1080x1080)',
            'w' => '1080',
            'h' => '1080',
          ),
          3 => 
          array (
            'label' => 'Facebook (1200x630)',
            'w' => '1200',
            'h' => '630',
          ),
        ),
      ),
      2 => 
      array (
        'name' => 'width',
        'type' => 'number',
        'label' => 'Width (px)',
        'placeholder' => 'e.g. 800',
      ),
      3 => 
      array (
        'name' => 'height',
        'type' => 'number',
        'label' => 'Height (px)',
        'placeholder' => 'e.g. 600',
      ),
      4 => 
      array (
        'name' => 'keep_aspect_ratio',
        'type' => 'checkbox',
        'label' => 'Keep Aspect Ratio 🔗',
        'value' => '1',
        'checked' => true,
      ),
    ),
  ),
  'image-converter' => 
  array (
    'title' => 'Image Converter',
    'desc' => 'Convert images between popular formats instantly (PNG, JPG, WebP, GIF, BMP).',
    'category' => 'image-tools',
    'icon' => '🔄',
    'handler' => 'ImageHandler',
    'action' => 'convert',
    'controller' => 'ImageController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select Image',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'output_format',
        'type' => 'cards',
        'label' => 'Convert To',
        'options' => 
        array (
          'jpeg' => 
          array (
            'icon' => '📸',
            'title' => 'JPEG',
            'desc' => 'Standard',
          ),
          'png' => 
          array (
            'icon' => '🖼️',
            'title' => 'PNG',
            'desc' => 'Lossless',
          ),
          'webp' => 
          array (
            'icon' => '🌐',
            'title' => 'WebP',
            'desc' => 'Next-Gen',
          ),
          'gif' => 
          array (
            'icon' => '🎬',
            'title' => 'GIF',
            'desc' => 'Animations',
          ),
          'bmp' => 
          array (
            'icon' => '🔲',
            'title' => 'BMP',
            'desc' => 'Raw',
          ),
        ),
        'value' => 'jpeg',
      ),
      2 => 
      array (
        'name' => 'quality',
        'type' => 'range',
        'label' => 'Quality (%)',
        'min' => '1',
        'max' => '100',
        'value' => '90',
      ),
    ),
  ),
  'image-watermark' => 
  array (
    'title' => 'Image Watermark',
    'desc' => 'Add text or logo watermarks to your images.',
    'category' => 'image-tools',
    'icon' => '©️',
    'handler' => 'ImageHandler',
    'action' => 'watermark',
    'controller' => 'ImageController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select Image',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'watermark_text',
        'type' => 'text',
        'label' => 'Watermark Text',
        'required' => true,
        'placeholder' => 'CONFIDENTIAL',
      ),
      2 => 
      array (
        'name' => 'font_size',
        'type' => 'range',
        'label' => 'Font Size (px)',
        'min' => '10',
        'max' => '200',
        'value' => '48',
      ),
      3 => 
      array (
        'name' => 'opacity',
        'type' => 'range',
        'label' => 'Opacity (%)',
        'min' => '1',
        'max' => '100',
        'value' => '50',
      ),
      4 => 
      array (
        'name' => 'text_color',
        'type' => 'color',
        'label' => 'Text Color',
        'value' => '#ffffff',
      ),
      5 => 
      array (
        'name' => 'position',
        'type' => 'grid_3x3',
        'label' => 'Watermark Position',
        'value' => 'bottom_right',
      ),
    ),
  ),
  'readability-score' => 
  array (
    'title' => 'Readability Score',
    'desc' => 'Calculate Flesch-Kincaid readability ease to see how complex your writing is.',
    'category' => 'text-tools',
    'icon' => '📖',
    'handler' => 'TextHandler',
    'action' => 'readabilityScore',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'keyword-density' => 
  array (
    'title' => 'Keyword Density Checker',
    'desc' => 'Find which words appear most frequently in your content for SEO analysis.',
    'category' => 'text-tools',
    'icon' => '📊',
    'handler' => 'TextHandler',
    'action' => 'keywordDensity',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'text-summarizer' => 
  array (
    'title' => 'Text Summarizer',
    'desc' => 'Generate a shorter version of your text by extracting key sentences.',
    'category' => 'text-tools',
    'icon' => '📝',
    'handler' => 'TextHandler',
    'action' => 'textSummarizer',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Long Text',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'sentences',
        'type' => 'number',
        'label' => 'Summary Length (Sentences)',
        'value' => '3',
      ),
    ),
  ),
  'emoji-remover' => 
  array (
    'title' => 'Emoji Remover',
    'desc' => 'Stripped away all emojs and icons from your text for a clean string.',
    'category' => 'text-tools',
    'icon' => '🚫',
    'handler' => 'TextHandler',
    'action' => 'emojiRemover',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'invisible-char-remover' => 
  array (
    'title' => 'Invisible Char Remover',
    'desc' => 'Remove Zero Width Spaces and other hidden characters that break formatting.',
    'category' => 'text-tools',
    'icon' => '👻',
    'handler' => 'TextHandler',
    'action' => 'invisibleCharRemover',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'random-sentence-generator' => 
  array (
    'title' => 'Random Sentence Generator',
    'desc' => 'Generate completely random sentences for creative writing or testing.',
    'category' => 'text-tools',
    'icon' => '🎲',
    'handler' => 'TextHandler',
    'action' => 'randomSentence',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Number of Sentences',
        'value' => '5',
      ),
    ),
  ),
  'reading-time-calculator' => 
  array (
    'title' => 'Reading Time',
    'desc' => 'Estimate how long it will take to read your text at average speeds.',
    'category' => 'text-tools',
    'icon' => '⏱️',
    'handler' => 'TextHandler',
    'action' => 'readingTimeCalc',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'speaking-time-calculator' => 
  array (
    'title' => 'Speaking Time',
    'desc' => 'Estimate the duration for a speech based on word count.',
    'category' => 'text-tools',
    'icon' => '🎙️',
    'handler' => 'TextHandler',
    'action' => 'speakingTimeCalc',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'text-to-base64' => 
  array (
    'title' => 'Text to Base64 String',
    'desc' => 'Convert plain text into a Base64 encoded string.',
    'category' => 'text-tools',
    'icon' => '64',
    'handler' => 'TextHandler',
    'action' => 'textToBase64',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'text-difference-checker' => 
  array (
    'title' => 'Text Difference (Diff)',
    'desc' => 'Compare two text blocks to find additions and deletions.',
    'category' => 'text-tools',
    'icon' => '∆',
    'handler' => 'TextHandler',
    'action' => 'textDiff',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text1',
        'type' => 'textarea',
        'label' => 'Original Text',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'text2',
        'type' => 'textarea',
        'label' => 'New Text',
        'required' => true,
      ),
    ),
  ),
  'list-alphabetizer' => 
  array (
    'title' => 'List Alphabetizer',
    'desc' => 'Sort lists alphabetically, by length, or even randomly.',
    'category' => 'text-tools',
    'icon' => 'A-Z',
    'handler' => 'TextHandler',
    'action' => 'textSorter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter List (One per line)',
        'required' => true,
      ),
    ),
  ),
  'string-scrambler' => 
  array (
    'title' => 'String Scrambler',
    'desc' => 'Jumble the letters within each word while keeping the first and last intact.',
    'category' => 'text-tools',
    'icon' => '🌀',
    'handler' => 'TextHandler',
    'action' => 'wordScrambler',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'text-to-zalgo' => 
  array (
    'title' => 'Zalgo Text Generator',
    'desc' => 'Create glitched, creepy text using diacritical marks.',
    'category' => 'text-tools',
    'icon' => 'Z',
    'handler' => 'TextHandler',
    'action' => 'zalgoText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'upside-down-text-gen' => 
  array (
    'title' => 'Upside Down Text',
    'desc' => 'Flip your text vertically for a unique look.',
    'category' => 'text-tools',
    'icon' => 'U',
    'handler' => 'TextHandler',
    'action' => 'upsideDownText',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'rot13-encoder-decoder' => 
  array (
    'title' => 'ROT13 Encoder',
    'desc' => 'Apply a simple Caesar cipher that replaces a letter with the 13th letter after it.',
    'category' => 'text-tools',
    'icon' => 'R',
    'handler' => 'TextHandler',
    'action' => 'rot13',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'text-to-morse-code' => 
  array (
    'title' => 'Morse Code Generator',
    'desc' => 'Translate text into dots and dashes of international Morse code.',
    'category' => 'text-tools',
    'icon' => '...',
    'handler' => 'TextHandler',
    'action' => 'textToMorse',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'paragraph-counter-tool' => 
  array (
    'title' => 'Paragraph Counter',
    'desc' => 'Count total paragraphs accurately within a long text block.',
    'category' => 'text-tools',
    'icon' => '¶',
    'handler' => 'TextHandler',
    'action' => 'paragraphCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'syllable-counter-tool' => 
  array (
    'title' => 'Syllable Counter',
    'desc' => 'Calculate syllable counts to measure text rhythm.',
    'category' => 'text-tools',
    'icon' => 'S',
    'handler' => 'TextHandler',
    'action' => 'syllableCounter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'vowel-consonant-count' => 
  array (
    'title' => 'Vowel & Consonant Counter',
    'desc' => 'Get a breakdown of vowels, consonants, and other characters.',
    'category' => 'text-tools',
    'icon' => 'AEI',
    'handler' => 'TextHandler',
    'action' => 'vowelConsonantCount',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'word-count-seo' => 
  array (
    'title' => 'SEO Word Counter',
    'desc' => 'Advanced word counting with density, character distribution, and meta lengths.',
    'category' => 'text-tools',
    'icon' => 'W+',
    'handler' => 'TextHandler',
    'action' => 'wordCountSEO',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'required' => true,
      ),
    ),
  ),
  'text-repeater-tool' => 
  array (
    'title' => 'Text Repeater',
    'desc' => 'Loop a string or word hundreds of times instantly.',
    'category' => 'text-tools',
    'icon' => 'x10',
    'handler' => 'TextHandler',
    'action' => 'textRepeater',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'times',
        'type' => 'number',
        'label' => 'Repetitions',
        'value' => '10',
      ),
    ),
  ),
  'bionic-reading-generator' => 
  array (
    'title' => 'Bionic Reading Format',
    'desc' => 'Enhance reading speed by bolding the first half of words.',
    'category' => 'text-tools',
    'icon' => 'B',
    'handler' => 'TextHandler',
    'action' => 'bionicReading',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'hex-to-rgb-converter' => 
  array (
    'title' => 'HEX to RGB Converter',
    'desc' => 'Convert HEX color codes to RGB values for web development.',
    'category' => 'design-tools',
    'icon' => 'H',
    'handler' => 'CssHandler',
    'action' => 'hexToRgb',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'hex',
        'type' => 'text',
        'label' => 'HEX Code',
        'value' => '#3b82f6',
        'required' => true,
      ),
    ),
  ),
  'rgb-to-hex-converter' => 
  array (
    'title' => 'RGB to HEX Converter',
    'desc' => 'Convert RGB color values to HEX codes instantly.',
    'category' => 'design-tools',
    'icon' => 'R',
    'handler' => 'CssHandler',
    'action' => 'rgbToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Red (0-255)',
        'value' => '59',
      ),
      1 => 
      array (
        'name' => 'g',
        'type' => 'number',
        'label' => 'Green (0-255)',
        'value' => '130',
      ),
      2 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Blue (0-255)',
        'value' => '246',
      ),
    ),
  ),
  'hex-to-cmyk-converter' => 
  array (
    'title' => 'HEX to CMYK Converter',
    'desc' => 'Convert web HEX colors to CMYK format for professional printing.',
    'category' => 'design-tools',
    'icon' => 'C',
    'handler' => 'CssHandler',
    'action' => 'hexToCmyk',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'hex',
        'type' => 'text',
        'label' => 'HEX Code',
        'value' => '#3b82f6',
      ),
    ),
  ),
  'cmyk-to-hex-converter' => 
  array (
    'title' => 'CMYK to HEX Converter',
    'desc' => 'Convert CMYK print colors back to HEX for digital use.',
    'category' => 'design-tools',
    'icon' => 'K',
    'handler' => 'CssHandler',
    'action' => 'cmykToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'c',
        'type' => 'number',
        'label' => 'Cyan %',
        'value' => '76',
      ),
      1 => 
      array (
        'name' => 'm',
        'type' => 'number',
        'label' => 'Magenta %',
        'value' => '47',
      ),
      2 => 
      array (
        'name' => 'y',
        'type' => 'number',
        'label' => 'Yellow %',
        'value' => '0',
      ),
      3 => 
      array (
        'name' => 'k',
        'type' => 'number',
        'label' => 'Black %',
        'value' => '3',
      ),
    ),
  ),
  'hex-to-hsl-converter' => 
  array (
    'title' => 'HEX to HSL Converter',
    'desc' => 'Convert HEX colors to HSL (Hue, Saturation, Lightness) format.',
    'category' => 'design-tools',
    'icon' => 'L',
    'handler' => 'CssHandler',
    'action' => 'hexToHsl',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'hex',
        'type' => 'text',
        'label' => 'HEX Code',
        'value' => '#3b82f6',
      ),
    ),
  ),
  'hsl-to-hex-converter' => 
  array (
    'title' => 'HSL to HEX Converter',
    'desc' => 'Translate HSL color values into web-ready HEX codes.',
    'category' => 'design-tools',
    'icon' => 'S',
    'handler' => 'CssHandler',
    'action' => 'hslToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'h',
        'type' => 'number',
        'label' => 'Hue (0-360)',
        'value' => '217',
      ),
      1 => 
      array (
        'name' => 's',
        'type' => 'number',
        'label' => 'Saturation %',
        'value' => '91',
      ),
      2 => 
      array (
        'name' => 'l',
        'type' => 'number',
        'label' => 'Lightness %',
        'value' => '60',
      ),
    ),
  ),
  'css-text-shadow-generator' => 
  array (
    'title' => 'CSS Text Shadow',
    'desc' => 'Design perfect text shadows with offsets, blur, and custom colors.',
    'category' => 'design-tools',
    'icon' => 'T',
    'handler' => 'CssHandler',
    'action' => 'textShadow',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'offset_x',
        'type' => 'number',
        'label' => 'X Offset',
        'value' => '2',
      ),
      1 => 
      array (
        'name' => 'offset_y',
        'type' => 'number',
        'label' => 'Y Offset',
        'value' => '2',
      ),
      2 => 
      array (
        'name' => 'blur',
        'type' => 'number',
        'label' => 'Blur Radius',
        'value' => '4',
      ),
      3 => 
      array (
        'name' => 'color',
        'type' => 'text',
        'label' => 'Color (RGBA/Hex)',
        'value' => 'rgba(0,0,0,0.5)',
      ),
    ),
  ),
  'neumorphism-css-generator' => 
  array (
    'title' => 'Neumorphism Generator',
    'desc' => 'Create soft-UI neumorphic designs with depth and subtle lighting effects.',
    'category' => 'design-tools',
    'icon' => '☁️',
    'handler' => 'CssHandler',
    'action' => 'neumorphismGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'color',
        'label' => 'Base Color',
        'value' => '#e0e5ec',
      ),
      1 => 
      array (
        'name' => 'distance',
        'type' => 'number',
        'label' => 'Distance',
        'value' => '9',
      ),
    ),
  ),
  'glassmorphism-css-generator' => 
  array (
    'title' => 'Glassmorphism Generator',
    'desc' => 'Design the popular frosted glass effect with blur and transparency.',
    'category' => 'design-tools',
    'icon' => '🎐',
    'handler' => 'CssHandler',
    'action' => 'glassmorphismGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'blur',
        'type' => 'number',
        'label' => 'Blur Amount',
        'value' => '10',
      ),
      1 => 
      array (
        'name' => 'transparency',
        'type' => 'text',
        'label' => 'Opacity (0-1)',
        'value' => '0.2',
      ),
    ),
  ),
  'css-grid-layout-generator' => 
  array (
    'title' => 'CSS Grid Generator',
    'desc' => 'Build complex CSS Grid layouts visually. Define columns, rows, and gaps.',
    'category' => 'design-tools',
    'icon' => '🔳',
    'handler' => 'CssHandler',
    'action' => 'gridGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'col',
        'type' => 'number',
        'label' => 'Columns',
        'value' => '3',
      ),
      1 => 
      array (
        'name' => 'row',
        'type' => 'number',
        'label' => 'Rows',
        'value' => '3',
      ),
      2 => 
      array (
        'name' => 'gap',
        'type' => 'number',
        'label' => 'Gap (px)',
        'value' => '20',
      ),
    ),
  ),
  'tailwind-color-palette' => 
  array (
    'title' => 'Tailwind Palette Builder',
    'desc' => 'Generate a full 50-900 color scale from any single HEX color code.',
    'category' => 'design-tools',
    'icon' => '🎨',
    'handler' => 'CssHandler',
    'action' => 'tailwindPalette',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'color',
        'label' => 'Primary Color',
        'value' => '#3b82f6',
      ),
    ),
  ),
  'material-color-palette' => 
  array (
    'title' => 'Material Design Colors',
    'desc' => 'Explore the official Material Design color system palettes.',
    'category' => 'design-tools',
    'icon' => '🖌️',
    'handler' => 'CssHandler',
    'action' => 'materialPalette',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'hue',
        'type' => 'select',
        'label' => 'Hue',
        'options' => 
        array (
          'blue' => 'Blue',
          'red' => 'Red',
          'green' => 'Green',
          'orange' => 'Orange',
          'purple' => 'Purple',
        ),
      ),
    ),
  ),
  'scientific-calculator' => 
  array (
    'title' => 'Scientific Calculator',
    'desc' => 'Perform complex mathematical calculations with scientific notation and functions.',
    'category' => 'math-calculators',
    'icon' => '🧮',
    'handler' => 'MathHandler',
    'action' => 'scientific',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'exp',
        'type' => 'text',
        'label' => 'Expression',
        'value' => 'sin(45) + log(100)',
        'required' => true,
      ),
    ),
  ),
  'fraction-calculator-tool' => 
  array (
    'title' => 'Fraction Calculator',
    'desc' => 'Add, subtract, multiply, and divide fractions easily with step-by-step results.',
    'category' => 'math-calculators',
    'icon' => '½',
    'handler' => 'MathHandler',
    'action' => 'fraction',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Fraction Operation',
        'placeholder' => '1/2 + 2/3',
        'required' => true,
      ),
    ),
  ),
  'probability-calculator' => 
  array (
    'title' => 'Probability Calculator',
    'desc' => 'Calculate binomial and normal distribution probabilities for statistical analysis.',
    'category' => 'math-calculators',
    'icon' => '🎲',
    'handler' => 'MathHandler',
    'action' => 'probability',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'n',
        'type' => 'number',
        'label' => 'Number of Trials (n)',
        'value' => '10',
      ),
      1 => 
      array (
        'name' => 'k',
        'type' => 'number',
        'label' => 'Successes (k)',
        'value' => '5',
      ),
      2 => 
      array (
        'name' => 'p',
        'type' => 'text',
        'label' => 'Probability (p)',
        'value' => '0.5',
      ),
    ),
  ),
  'standard-deviation-calc' => 
  array (
    'title' => 'Standard Deviation Calculator',
    'desc' => 'Calculate sample and population standard deviation from a set of numbers.',
    'category' => 'math-calculators',
    'icon' => 'σ',
    'handler' => 'MathHandler',
    'action' => 'stdDev',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Numbers (comma separated)',
        'required' => true,
      ),
    ),
  ),
  'matrix-ops-calculator' => 
  array (
    'title' => 'Matrix Calculator',
    'desc' => 'Perform matrix addition, subtraction, and multiplication on user-defined grids.',
    'category' => 'math-calculators',
    'icon' => '▦',
    'handler' => 'MathHandler',
    'action' => 'matrix',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'size',
        'type' => 'number',
        'label' => 'Matrix Size (N x N)',
        'value' => '3',
      ),
    ),
  ),
  'prime-number-checker-tool' => 
  array (
    'title' => 'Prime Number Checker',
    'desc' => 'Instantly check if a number is prime and find its prime factorization.',
    'category' => 'math-calculators',
    'icon' => '17',
    'handler' => 'MathHandler',
    'action' => 'primeChecker',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num',
        'type' => 'number',
        'label' => 'Number to Check',
        'required' => true,
      ),
    ),
  ),
  'factorial-calculator-link' => 
  array (
    'title' => 'Factorial Calculator',
    'desc' => 'Calculate the factorial of integers (n!) for permutations and combinations.',
    'category' => 'math-calculators',
    'icon' => '!',
    'handler' => 'MathHandler',
    'action' => 'factorial',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num',
        'type' => 'number',
        'label' => 'Number (n)',
        'required' => true,
      ),
    ),
  ),
  'fibonacci-sequence-gen' => 
  array (
    'title' => 'Fibonacci Generator',
    'desc' => 'Generate a sequence of Fibonacci numbers up to a specific limit.',
    'category' => 'math-calculators',
    'icon' => '🌀',
    'handler' => 'MathHandler',
    'action' => 'fibonacci',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'N-th Term',
        'value' => '20',
      ),
    ),
  ),
  'random-number-generator-tool' => 
  array (
    'title' => 'Random Number Generator',
    'desc' => 'Generate secure random numbers within a specified range.',
    'category' => 'math-calculators',
    'icon' => '🎰',
    'handler' => 'MathHandler',
    'action' => 'randomNum',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'min',
        'type' => 'number',
        'label' => 'Minimum',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'max',
        'type' => 'number',
        'label' => 'Maximum',
        'value' => '100',
      ),
    ),
  ),
  'physics-velocity-calculator' => 
  array (
    'title' => 'Velocity Calculator',
    'desc' => 'Solve physics problems involving distance, time, and average velocity.',
    'category' => 'math-calculators',
    'icon' => '🚀',
    'handler' => 'MathHandler',
    'action' => 'velocity',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'd',
        'type' => 'number',
        'label' => 'Distance (m)',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 't',
        'type' => 'number',
        'label' => 'Time (s)',
        'value' => '10',
      ),
    ),
  ),
  'molecular-weight-calculator' => 
  array (
    'title' => 'Molecular Weight Calculator',
    'desc' => 'Calculate the molar mass of a chemical compound by its formula.',
    'category' => 'math-calculators',
    'icon' => '🧪',
    'handler' => 'MathHandler',
    'action' => 'molecularWeight',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'formula',
        'type' => 'text',
        'label' => 'Chemical Formula',
        'value' => 'H2O',
      ),
    ),
  ),
  'geometry-calculator-all' => 
  array (
    'title' => 'Geometry Calculator',
    'desc' => 'Calculate area, volume, and perimeter for various geometric shapes.',
    'category' => 'math-calculators',
    'icon' => '📐',
    'handler' => 'MathHandler',
    'action' => 'areaCircle',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'radius',
        'type' => 'number',
        'label' => 'Radius',
        'value' => '5',
      ),
    ),
  ),
  'mean-median-mode-calc' => 
  array (
    'title' => 'Mean, Median, Mode',
    'desc' => 'Statistical summary tool to find the central tendency of a data set.',
    'category' => 'math-calculators',
    'icon' => 'M',
    'handler' => 'MathHandler',
    'action' => 'meanMedianMode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Numbers (comma separated)',
        'required' => true,
      ),
    ),
  ),
  'logarithm-calculator-tool' => 
  array (
    'title' => 'Logarithm Calculator',
    'desc' => 'Calculate logs for base 10, base E (natural), and base 2.',
    'category' => 'math-calculators',
    'icon' => 'ln',
    'handler' => 'MathHandler',
    'action' => 'logarithm',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Value (x)',
        'required' => true,
      ),
    ),
  ),
  'proportion-calculator-tool' => 
  array (
    'title' => 'Proportion Calculator',
    'desc' => 'Solve for X in the proportion A/B = C/D.',
    'category' => 'math-calculators',
    'icon' => '::',
    'handler' => 'MathHandler',
    'action' => 'proportion',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'A',
        'value' => '10',
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'B',
        'value' => '20',
      ),
      2 => 
      array (
        'name' => 'c',
        'type' => 'number',
        'label' => 'C',
        'value' => '30',
      ),
    ),
  ),
  'significant-figures-tool' => 
  array (
    'title' => 'Significant Figures Counter',
    'desc' => 'Identify the number of significant digits in a scientific measurement.',
    'category' => 'math-calculators',
    'icon' => '0.0',
    'handler' => 'MathHandler',
    'action' => 'sigFigs',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Measurement',
        'value' => '0.00123',
      ),
    ),
  ),
  'precision-rounding-tool' => 
  array (
    'title' => 'Rounding Tool',
    'desc' => 'Round numbers to the nearest decimal, floor, or ceiling value.',
    'category' => 'math-calculators',
    'icon' => '≈',
    'handler' => 'MathHandler',
    'action' => 'rounding',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'number',
        'label' => 'Number',
        'value' => '12.3456',
      ),
      1 => 
      array (
        'name' => 'precision',
        'type' => 'number',
        'label' => 'Decimals',
        'value' => '2',
      ),
    ),
  ),
  'quadratic-equation-solver-tool' => 
  array (
    'title' => 'Quadratic Equation Solver',
    'desc' => 'Find the roots of a quadratic equation (ax² + bx + c = 0).',
    'category' => 'math-calculators',
    'icon' => 'x²',
    'handler' => 'MathHandler',
    'action' => 'quadratic',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'a',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'b',
        'value' => '-5',
      ),
      2 => 
      array (
        'name' => 'c',
        'type' => 'number',
        'label' => 'c',
        'value' => '6',
      ),
    ),
  ),
  'complex-number-calc' => 
  array (
    'title' => 'Complex Number Calculator',
    'desc' => 'Perform arithmetic operations with complex numbers (a + bi).',
    'category' => 'math-calculators',
    'icon' => 'i',
    'handler' => 'MathHandler',
    'action' => 'complex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'r1',
        'type' => 'number',
        'label' => 'Real Part 1',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'i1',
        'type' => 'number',
        'label' => 'Imaginary 1',
        'value' => '2',
      ),
      2 => 
      array (
        'name' => 'r2',
        'type' => 'number',
        'label' => 'Real Part 2',
        'value' => '3',
      ),
      3 => 
      array (
        'name' => 'i2',
        'type' => 'number',
        'label' => 'Imaginary 2',
        'value' => '4',
      ),
    ),
  ),
  'gcd-lcm-calculator-tool' => 
  array (
    'title' => 'GCD & LCM Calculator',
    'desc' => 'Find the Greatest Common Divisor and Least Common Multiple of two numbers.',
    'category' => 'math-calculators',
    'icon' => 'G|L',
    'handler' => 'MathHandler',
    'action' => 'lcmGcd',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'number',
        'label' => 'Number 1',
        'value' => '12',
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'number',
        'label' => 'Number 2',
        'value' => '18',
      ),
    ),
  ),
  'truth-table-logic-gen' => 
  array (
    'title' => 'Truth Table Generator',
    'desc' => 'Generate logical truth tables for Boolean expressions.',
    'category' => 'math-calculators',
    'icon' => 'TF',
    'handler' => 'MathHandler',
    'action' => 'truthTable',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'exp',
        'type' => 'text',
        'label' => 'Logical Exp',
        'value' => 'A AND B',
      ),
    ),
  ),
  'binary-math-calc' => 
  array (
    'title' => 'Binary Math Calculator',
    'desc' => 'Perform addition and subtraction on binary number strings.',
    'category' => 'math-calculators',
    'icon' => '01+',
    'handler' => 'MathHandler',
    'action' => 'addition',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'text',
        'label' => 'Binary 1',
        'value' => '1010',
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'text',
        'label' => 'Binary 2',
        'value' => '1100',
      ),
    ),
  ),
  'base-n-converter' => 
  array (
    'title' => 'Any Base Converter',
    'desc' => 'Convert numbers between base 2, 8, 10, 16, and custom bases.',
    'category' => 'math-calculators',
    'icon' => 'N',
    'handler' => 'MathHandler',
    'action' => 'multiplication',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'text',
        'label' => 'Original',
        'value' => '255',
      ),
    ),
  ),
  'percentage-change-calc' => 
  array (
    'title' => 'Percentage Change',
    'desc' => 'Calculate percentage increase or decrease between two values.',
    'category' => 'math-calculators',
    'icon' => '±%',
    'handler' => 'MathHandler',
    'action' => 'percentDifference',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'initial',
        'type' => 'number',
        'label' => 'Original Value',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 'final',
        'type' => 'number',
        'label' => 'New Value',
        'value' => '150',
      ),
    ),
  ),
  'arithmetic-ratio-calculator' => 
  array (
    'title' => 'Ratio Calculator',
    'desc' => 'Simplify ratios or solve for a missing value in a proportional ratio.',
    'category' => 'math-calculators',
    'icon' => '1:2',
    'handler' => 'MathHandler',
    'action' => 'ratio',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'A',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'B',
        'value' => '2',
      ),
    ),
  ),
  'length-converter-universal' => 
  array (
    'title' => 'Universal Length Converter',
    'desc' => 'Convert between meters, feet, inches, kilometers, miles, and yards.',
    'category' => 'unit-converters',
    'icon' => '📏',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'm' => 'Meters',
          'ft' => 'Feet',
          'in' => 'Inches',
          'km' => 'Kilometers',
          'mi' => 'Miles',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'ft' => 'Feet',
          'm' => 'Meters',
          'in' => 'Inches',
          'km' => 'Kilometers',
          'mi' => 'Miles',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'length',
      ),
    ),
  ),
  'weight-mass-converter' => 
  array (
    'title' => 'Weight & Mass Converter',
    'desc' => 'Convert between kilograms, grams, pounds, and ounces accurately.',
    'category' => 'unit-converters',
    'icon' => '⚖️',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'kg' => 'Kilograms',
          'lb' => 'Pounds',
          'g' => 'Grams',
          'oz' => 'Ounces',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'lb' => 'Pounds',
          'kg' => 'Kilograms',
          'g' => 'Grams',
          'oz' => 'Ounces',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'weight',
      ),
    ),
  ),
  'temperature-converter-all' => 
  array (
    'title' => 'Temperature Converter',
    'desc' => 'Convert between Celsius, Fahrenheit, and Kelvin temperature scales.',
    'category' => 'unit-converters',
    'icon' => '🌡️',
    'handler' => 'UnitHandler',
    'action' => 'celsiusToFahrenheit',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Celsius (°C)',
        'value' => '0',
      ),
    ),
  ),
  'area-converter-tool' => 
  array (
    'title' => 'Area Converter',
    'desc' => 'Convert square meters, square feet, acres, and hectares.',
    'category' => 'unit-converters',
    'icon' => '🗺️',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'm2' => 'Sq Meters',
          'ft2' => 'Sq Feet',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'ft2' => 'Sq Feet',
          'm2' => 'Sq Meters',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'length',
      ),
    ),
  ),
  'volume-capacity-converter' => 
  array (
    'title' => 'Volume Converter',
    'desc' => 'Convert liters, gallons, cubic meters, and fluid ounces.',
    'category' => 'unit-converters',
    'icon' => '🥛',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'l' => 'Liters',
          'gal' => 'Gallons',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'gal' => 'Gallons',
          'l' => 'Liters',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'weight',
      ),
    ),
  ),
  'pressure-converter-tool' => 
  array (
    'title' => 'Pressure Converter',
    'desc' => 'Convert between Pascal, Bar, PSI, and Atmosphere units.',
    'category' => 'unit-converters',
    'icon' => '🎈',
    'handler' => 'UnitHandler',
    'action' => 'pressure',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'pa' => 'Pascal',
          'bar' => 'Bar',
          'psi' => 'PSI',
          'atm' => 'Atmosphere',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'bar' => 'Bar',
          'pa' => 'Pascal',
          'psi' => 'PSI',
          'atm' => 'Atmosphere',
        ),
      ),
    ),
  ),
  'speed-velocity-converter' => 
  array (
    'title' => 'Speed Converter',
    'desc' => 'Convert km/h, mph, knots, and meters per second.',
    'category' => 'unit-converters',
    'icon' => '🏎️',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'km' => 'km/h',
          'mi' => 'mph',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'mi' => 'mph',
          'km' => 'km/h',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'length',
      ),
    ),
  ),
  'time-units-converter-tool' => 
  array (
    'title' => 'Time Converter',
    'desc' => 'Convert between seconds, minutes, hours, days, weeks, and years.',
    'category' => 'unit-converters',
    'icon' => '⏱️',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          's' => 'Seconds',
          'min' => 'Minutes',
          'h' => 'Hours',
          'd' => 'Days',
          'w' => 'Weeks',
          'y' => 'Years',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'min' => 'Minutes',
          's' => 'Seconds',
          'h' => 'Hours',
          'd' => 'Days',
          'w' => 'Weeks',
          'y' => 'Years',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'time',
      ),
    ),
  ),
  'energy-work-converter' => 
  array (
    'title' => 'Energy Converter',
    'desc' => 'Convert Joules, Calories, Kilowatt-hours, and British Thermal Units.',
    'category' => 'unit-converters',
    'icon' => '⚡',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'j' => 'Joules',
          'cal' => 'Calories',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'cal' => 'Calories',
          'j' => 'Joules',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'weight',
      ),
    ),
  ),
  'power-converter-tool' => 
  array (
    'title' => 'Power Converter',
    'desc' => 'Convert Watts, Horsepower, and BTUs per hour.',
    'category' => 'unit-converters',
    'icon' => '🔌',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'w' => 'Watts',
          'hp' => 'Horsepower',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'hp' => 'Horsepower',
          'w' => 'Watts',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'weight',
      ),
    ),
  ),
  'data-transfer-rate-calc' => 
  array (
    'title' => 'Data Rate Converter',
    'desc' => 'Convert Mbps, Gbps, and other network transfer speeds.',
    'category' => 'unit-converters',
    'icon' => '🌐',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'mb' => 'Mbps',
          'gb' => 'Gbps',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'gb' => 'Gbps',
          'mb' => 'Mbps',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'storage',
      ),
    ),
  ),
  'digital-storage-converter' => 
  array (
    'title' => 'Digital Storage Calc',
    'desc' => 'Convert bytes, KB, MB, GB, TB, and PB accurately.',
    'category' => 'unit-converters',
    'icon' => '💾',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'kb' => 'KB',
          'mb' => 'MB',
          'gb' => 'GB',
          'tb' => 'TB',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'mb' => 'MB',
          'kb' => 'KB',
          'gb' => 'GB',
          'tb' => 'TB',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'storage',
      ),
    ),
  ),
  'angle-converter-tool' => 
  array (
    'title' => 'Angle Converter',
    'desc' => 'Convert between degrees, radians, and gradians.',
    'category' => 'unit-converters',
    'icon' => '📐',
    'handler' => 'UnitHandler',
    'action' => 'angle',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '180',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'deg' => 'Degrees',
          'rad' => 'Radians',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'rad' => 'Radians',
          'deg' => 'Degrees',
        ),
      ),
    ),
  ),
  'fuel-consumption-converter' => 
  array (
    'title' => 'Fuel Consumption',
    'desc' => 'Convert L/100km to MPG and vice versa.',
    'category' => 'unit-converters',
    'icon' => '⛽',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '10',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'l' => 'L/100km',
          'mi' => 'MPG',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'mi' => 'MPG',
          'l' => 'L/100km',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'length',
      ),
    ),
  ),
  'torque-converter-calculator' => 
  array (
    'title' => 'Torque Converter',
    'desc' => 'Convert Newton-meters to Pound-feet and other torque units.',
    'category' => 'unit-converters',
    'icon' => '🔧',
    'handler' => 'UnitHandler',
    'action' => 'pressure',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Nm',
        'value' => '10',
      ),
    ),
  ),
  'number-system-multibase' => 
  array (
    'title' => 'Number System Converter',
    'desc' => 'Convert numbers between Binary, Octal, Decimal, and Hexadecimal.',
    'category' => 'unit-converters',
    'icon' => '🔢',
    'handler' => 'MathHandler',
    'action' => 'multiplication',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'text',
        'label' => 'Number',
        'value' => '255',
      ),
    ),
  ),
  'cooking-measurements-calc' => 
  array (
    'title' => 'Cooking Converter',
    'desc' => 'Convert cups, tablespoons, teaspoons, and milliliters for recipes.',
    'category' => 'unit-converters',
    'icon' => '🍳',
    'handler' => 'UnitHandler',
    'action' => 'universalConvert',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Value',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From',
        'options' => 
        array (
          'cup' => 'Cups',
          'ml' => 'Milliliters',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To',
        'options' => 
        array (
          'ml' => 'Milliliters',
          'cup' => 'Cups',
        ),
      ),
      3 => 
      array (
        'name' => 'type',
        'type' => 'hidden',
        'value' => 'weight',
      ),
    ),
  ),
  'shoe-size-converter-global' => 
  array (
    'title' => 'Shoe Size Converter',
    'desc' => 'Convert shoe sizes between US, UK, EU, and CM standards.',
    'category' => 'unit-converters',
    'icon' => '👟',
    'handler' => 'UnitHandler',
    'action' => 'shoeSize',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'size',
        'type' => 'number',
        'label' => 'US Size',
        'value' => '9',
      ),
      1 => 
      array (
        'name' => 'gender',
        'type' => 'select',
        'label' => 'Gender',
        'options' => 
        array (
          'men' => 'Men',
          'women' => 'Women',
          'kids' => 'Kids',
        ),
      ),
    ),
  ),
  'clothing-size-converter' => 
  array (
    'title' => 'Clothing Size Converter',
    'desc' => 'International size charts for shirts, pants, and dresses.',
    'category' => 'unit-converters',
    'icon' => '👕',
    'handler' => 'UnitHandler',
    'action' => 'shoeSize',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'size',
        'type' => 'text',
        'label' => 'Size (S/M/L)',
        'value' => 'M',
      ),
    ),
  ),
  'ring-size-standard-calc' => 
  array (
    'title' => 'Ring Size Converter',
    'desc' => 'Convert ring diameters to standard US/UK ring sizes.',
    'category' => 'unit-converters',
    'icon' => '💍',
    'handler' => 'UnitHandler',
    'action' => 'shoeSize',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'size',
        'type' => 'number',
        'label' => 'Diameter (mm)',
        'value' => '16.5',
      ),
    ),
  ),
  'roman-numeral-converter' => 
  array (
    'title' => 'Roman Numeral Converter',
    'desc' => 'Convert integers to Roman numerals and vice versa.',
    'category' => 'unit-converters',
    'icon' => 'IV',
    'handler' => 'UnitHandler',
    'action' => 'roman',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Integer',
        'value' => '2024',
      ),
    ),
  ),
  'scientific-notation-converter' => 
  array (
    'title' => 'Scientific Notation',
    'desc' => 'Convert standard numbers to E-notation and vice versa.',
    'category' => 'unit-converters',
    'icon' => '1.0e',
    'handler' => 'UnitHandler',
    'action' => 'sciNotation',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Number',
        'value' => '1234567',
      ),
    ),
  ),
  'percentage-to-fraction-decimal' => 
  array (
    'title' => 'Percent to Fraction/Dec',
    'desc' => 'Convert percentages to simplified fractions and decimals.',
    'category' => 'unit-converters',
    'icon' => '%/F',
    'handler' => 'UnitHandler',
    'action' => 'fractionPercent',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Percentage',
        'value' => '75',
      ),
    ),
  ),
  'decimal-to-fraction-calc' => 
  array (
    'title' => 'Decimal to Fraction',
    'desc' => 'Convert any decimal number into its simplest fraction form.',
    'category' => 'unit-converters',
    'icon' => '0.5',
    'handler' => 'MathHandler',
    'action' => 'fraction',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Decimal',
        'value' => '0.25',
      ),
    ),
  ),
  'fraction-to-percentage-calc' => 
  array (
    'title' => 'Fraction to Percentage',
    'desc' => 'Translate fractions into their percentage equivalent instantly.',
    'category' => 'unit-converters',
    'icon' => '1/4',
    'handler' => 'UnitHandler',
    'action' => 'fractionPercent',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'text',
        'label' => 'Fraction',
        'value' => '3/4',
      ),
    ),
  ),
  'simple-interest-calculator' => 
  array (
    'title' => 'Simple Interest Calculator',
    'desc' => 'Calculate simple interest on principal with rate and time.',
    'category' => 'finance-tools',
    'icon' => '💵',
    'handler' => 'FinanceHandler',
    'action' => 'simpleInterest',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'p',
        'type' => 'number',
        'label' => 'Principal ($)',
        'value' => '1000',
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Rate (%)',
        'value' => '5',
      ),
      2 => 
      array (
        'name' => 't',
        'type' => 'number',
        'label' => 'Time (Years)',
        'value' => '1',
      ),
    ),
  ),
  'compound-interest-calculator' => 
  array (
    'title' => 'Compound Interest',
    'desc' => 'Calculate the future value of an investment with compounding interest.',
    'category' => 'finance-tools',
    'icon' => '📈',
    'handler' => 'FinanceHandler',
    'action' => 'compoundInterest',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'p',
        'type' => 'number',
        'label' => 'Principal ($)',
        'value' => '1000',
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Rate (%)',
        'value' => '5',
      ),
      2 => 
      array (
        'name' => 't',
        'type' => 'number',
        'label' => 'Time (Years)',
        'value' => '10',
      ),
    ),
  ),
  'loan-emi-calculator' => 
  array (
    'title' => 'EMI Calculator',
    'desc' => 'Calculate Equated Monthly Installments for loans and mortgages.',
    'category' => 'finance-tools',
    'icon' => '🏦',
    'handler' => 'FinanceHandler',
    'action' => 'emi',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'p',
        'type' => 'number',
        'label' => 'Loan Amount',
        'value' => '100000',
      ),
      1 => 
      array (
        'name' => 'r',
        'type' => 'number',
        'label' => 'Annual Rate (%)',
        'value' => '10',
      ),
      2 => 
      array (
        'name' => 'n',
        'type' => 'number',
        'label' => 'Period (Months)',
        'value' => '60',
      ),
    ),
  ),
  'mortgage-calculator-pro' => 
  array (
    'title' => 'Mortgage Calculator',
    'desc' => 'Detailed mortgage planner with down payment and interest options.',
    'category' => 'finance-tools',
    'icon' => '🏠',
    'handler' => 'FinanceHandler',
    'action' => 'mortgage',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Home Price',
        'value' => '300000',
      ),
      1 => 
      array (
        'name' => 'down',
        'type' => 'number',
        'label' => 'Down Payment',
        'value' => '60000',
      ),
    ),
  ),
  'retirement-401k-planner' => 
  array (
    'title' => 'Retirement Planner',
    'desc' => 'Estimate your retirement savings based on current contributions.',
    'category' => 'finance-tools',
    'icon' => '⛳',
    'handler' => 'FinanceHandler',
    'action' => 'retirement',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'age',
        'type' => 'number',
        'label' => 'Current Age',
        'value' => '30',
      ),
    ),
  ),
  'savings-goal-calculator' => 
  array (
    'title' => 'Savings Goal Calc',
    'desc' => 'Calculate how long it takes to reach your financial savings goals.',
    'category' => 'finance-tools',
    'icon' => '💰',
    'handler' => 'FinanceHandler',
    'action' => 'savingsGoal',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'goal',
        'type' => 'number',
        'label' => 'Goal Amount',
        'value' => '10000',
      ),
      1 => 
      array (
        'name' => 'saved',
        'type' => 'number',
        'label' => 'Already Saved',
        'value' => '1000',
      ),
      2 => 
      array (
        'name' => 'monthly',
        'type' => 'number',
        'label' => 'Monthly Save',
        'value' => '500',
      ),
    ),
  ),
  'income-tax-estimator' => 
  array (
    'title' => 'Income Tax Estimator',
    'desc' => 'Quick calculation of estimated income tax and net take-home pay.',
    'category' => 'finance-tools',
    'icon' => '🏛️',
    'handler' => 'FinanceHandler',
    'action' => 'incomeTax',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'income',
        'type' => 'number',
        'label' => 'Annual Income',
        'value' => '50000',
      ),
    ),
  ),
  'sales-tax-vat-calc' => 
  array (
    'title' => 'Sales Tax / VAT',
    'desc' => 'Calculate sales tax or Value Added Tax (VAT) on any purchase.',
    'category' => 'finance-tools',
    'icon' => '🛒',
    'handler' => 'FinanceHandler',
    'action' => 'salesTax',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'amount',
        'type' => 'number',
        'label' => 'Base Amount',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 'rate',
        'type' => 'number',
        'label' => 'Tax Rate (%)',
        'value' => '7.5',
      ),
    ),
  ),
  'break-even-point-calculator' => 
  array (
    'title' => 'Break-Even Point',
    'desc' => 'Find the number of units to sell to cover fixed and variable costs.',
    'category' => 'finance-tools',
    'icon' => '⚖️',
    'handler' => 'FinanceHandler',
    'action' => 'breakEven',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'fixed',
        'type' => 'number',
        'label' => 'Fixed Costs',
        'value' => '1000',
      ),
      1 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Unit Price',
        'value' => '50',
      ),
      2 => 
      array (
        'name' => 'variable',
        'type' => 'number',
        'label' => 'Variable Cost/Unit',
        'value' => '30',
      ),
    ),
  ),
  'cagr-growth-calculator' => 
  array (
    'title' => 'CAGR Calculator',
    'desc' => 'Calculate Compound Annual Growth Rate for investments over time.',
    'category' => 'finance-tools',
    'icon' => '📶',
    'handler' => 'FinanceHandler',
    'action' => 'cagr',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'start',
        'type' => 'number',
        'label' => 'Starting Value',
        'value' => '1000',
      ),
      1 => 
      array (
        'name' => 'end',
        'type' => 'number',
        'label' => 'Ending Value',
        'value' => '2000',
      ),
      2 => 
      array (
        'name' => 't',
        'type' => 'number',
        'label' => 'Years',
        'value' => '5',
      ),
    ),
  ),
  'currency-converter-static' => 
  array (
    'title' => 'Currency Converter',
    'desc' => 'Calculate exchange rates between major global currencies.',
    'category' => 'finance-tools',
    'icon' => '💱',
    'handler' => 'FinanceHandler',
    'action' => 'currency',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'Amount',
        'value' => '100',
      ),
    ),
  ),
  'stock-profit-loss-calc' => 
  array (
    'title' => 'Stock Profit Calc',
    'desc' => 'Calculate your net profit or loss from buying and selling stocks.',
    'category' => 'finance-tools',
    'icon' => '📉',
    'handler' => 'FinanceHandler',
    'action' => 'stockProfit',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'buy',
        'type' => 'number',
        'label' => 'Buy Price',
        'value' => '150',
      ),
      1 => 
      array (
        'name' => 'sell',
        'type' => 'number',
        'label' => 'Sell Price',
        'value' => '180',
      ),
      2 => 
      array (
        'name' => 'qty',
        'type' => 'number',
        'label' => 'Quantity',
        'value' => '10',
      ),
    ),
  ),
  'credit-card-payoff-calc' => 
  array (
    'title' => 'Credit Card Payoff',
    'desc' => 'Plan how long it will take to pay off your credit card balance.',
    'category' => 'finance-tools',
    'icon' => '💳',
    'handler' => 'FinanceHandler',
    'action' => 'creditCard',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'bal',
        'type' => 'number',
        'label' => 'Balance',
        'value' => '5000',
      ),
      1 => 
      array (
        'name' => 'pay',
        'type' => 'number',
        'label' => 'Monthly Pay',
        'value' => '200',
      ),
    ),
  ),
  'hourly-to-salary-converter' => 
  array (
    'title' => 'Hourly to Salary',
    'desc' => 'Convert hourly wages to annual salary based on working hours.',
    'category' => 'finance-tools',
    'icon' => '🕓',
    'handler' => 'FinanceHandler',
    'action' => 'hourlyToSalary',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'hr',
        'type' => 'number',
        'label' => 'Hourly Wage',
        'value' => '25',
      ),
    ),
  ),
  'crypto-satoshi-converter' => 
  array (
    'title' => 'Crypto Unit Converter',
    'desc' => 'Convert Bitcoin (BTC) to Satoshis and other crypto denominations.',
    'category' => 'finance-tools',
    'icon' => '₿',
    'handler' => 'FinanceHandler',
    'action' => 'crypto',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'val',
        'type' => 'number',
        'label' => 'BTC Amount',
        'value' => '1',
      ),
    ),
  ),
  'unit-price-comparison-tool' => 
  array (
    'title' => 'Unit Price Calc',
    'desc' => 'Compare the unit price of two items to find the best value.',
    'category' => 'finance-tools',
    'icon' => '🏷️',
    'handler' => 'MathHandler',
    'action' => 'ratio',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'Price',
        'value' => '10',
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Quantity',
        'value' => '5',
      ),
    ),
  ),
  'dividend-yield-calculator' => 
  array (
    'title' => 'Dividend Yield',
    'desc' => 'Calculate the dividend yield percentage for any stock.',
    'category' => 'finance-tools',
    'icon' => '☘️',
    'handler' => 'MathHandler',
    'action' => 'percentage',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Dividend',
        'value' => '1',
      ),
      1 => 
      array (
        'name' => 'total',
        'type' => 'number',
        'label' => 'Price',
        'value' => '20',
      ),
    ),
  ),
  'pe-ratio-calculator' => 
  array (
    'title' => 'P/E Ratio Calculator',
    'desc' => 'Calculate the Price-to-Earnings ratio for stock valuation.',
    'category' => 'finance-tools',
    'icon' => '📊',
    'handler' => 'MathHandler',
    'action' => 'ratio',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'a',
        'type' => 'number',
        'label' => 'Price',
        'value' => '150',
      ),
      1 => 
      array (
        'name' => 'b',
        'type' => 'number',
        'label' => 'Earnings',
        'value' => '5',
      ),
    ),
  ),
  'market-cap-calculator' => 
  array (
    'title' => 'Market Cap Calc',
    'desc' => 'Calculate a company total market capitalization.',
    'category' => 'finance-tools',
    'icon' => '🏢',
    'handler' => 'MathHandler',
    'action' => 'multiplication',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'num1',
        'type' => 'number',
        'label' => 'Price',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 'num2',
        'type' => 'number',
        'label' => 'Shares (M)',
        'value' => '50',
      ),
    ),
  ),
  'annual-roi-calculator' => 
  array (
    'title' => 'Annual ROI Calc',
    'desc' => 'Calculate annualized Return on Investment for long-term assets.',
    'category' => 'finance-tools',
    'icon' => '🔄',
    'handler' => 'MathHandler',
    'action' => 'roi',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'invested',
        'type' => 'number',
        'label' => 'Invested',
        'value' => '1000',
      ),
      1 => 
      array (
        'name' => 'returned',
        'type' => 'number',
        'label' => 'Returned',
        'value' => '1500',
      ),
    ),
  ),
  'markup-margin-calculator' => 
  array (
    'title' => 'Markup & Margin',
    'desc' => 'Calculate markup percentage and gross margin for products.',
    'category' => 'finance-tools',
    'icon' => '📈',
    'handler' => 'MathHandler',
    'action' => 'markup',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'cost',
        'type' => 'number',
        'label' => 'Cost',
        'value' => '50',
      ),
      1 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Price',
        'value' => '80',
      ),
    ),
  ),
  'margin-calculator-link' => 
  array (
    'title' => 'Gross Margin Calc',
    'desc' => 'Quickly find the gross margin percentage of any sale.',
    'category' => 'finance-tools',
    'icon' => '💹',
    'handler' => 'MathHandler',
    'action' => 'margin',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'cost',
        'type' => 'number',
        'label' => 'Cost',
        'value' => '50',
      ),
      1 => 
      array (
        'name' => 'revenue',
        'type' => 'number',
        'label' => 'Revenue',
        'value' => '80',
      ),
    ),
  ),
  'discount-calculator-link' => 
  array (
    'title' => 'Discount Calculator',
    'desc' => 'Find the final price after applying a percentage discount.',
    'category' => 'finance-tools',
    'icon' => '🏮',
    'handler' => 'MathHandler',
    'action' => 'discount',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'price',
        'type' => 'number',
        'label' => 'Price',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 'discount',
        'type' => 'number',
        'label' => 'Disc. %',
        'value' => '20',
      ),
    ),
  ),
  'tip-calculator-link' => 
  array (
    'title' => 'Tip Calculator',
    'desc' => 'Calculate tips and split bills between multiple people.',
    'category' => 'finance-tools',
    'icon' => '🍽️',
    'handler' => 'MathHandler',
    'action' => 'tip',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'bill',
        'type' => 'number',
        'label' => 'Bill',
        'value' => '100',
      ),
      1 => 
      array (
        'name' => 'tip',
        'type' => 'number',
        'label' => 'Tip %',
        'value' => '15',
      ),
    ),
  ),
  'investment-returns-calc' => 
  array (
    'title' => 'Investment Returns',
    'desc' => 'Basic calculator for total return on any financial investment.',
    'category' => 'finance-tools',
    'icon' => '💰',
    'handler' => 'MathHandler',
    'action' => 'roi',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'invested',
        'type' => 'number',
        'label' => 'Principal',
        'value' => '1000',
      ),
      1 => 
      array (
        'name' => 'returned',
        'type' => 'number',
        'label' => 'Final',
        'value' => '1200',
      ),
    ),
  ),
  'random-joke-generator-fun' => 
  array (
    'title' => 'Random Joke Gen',
    'desc' => 'Get a fresh, funny random joke to brighten your day.',
    'category' => 'miscellaneous',
    'icon' => '😂',
    'handler' => 'GeneratorHandler',
    'action' => 'joke',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'random-quote-generator-pro' => 
  array (
    'title' => 'Inspirational Quotes',
    'desc' => 'Generate famous and inspirational quotes from great minds.',
    'category' => 'miscellaneous',
    'icon' => '📜',
    'handler' => 'GeneratorHandler',
    'action' => 'quote',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'qr-generator' => 
  array (
    'title' => 'QR Code Generator',
    'desc' => 'Create custom QR codes for URLs, text, WiFi, and contacts with live preview.',
    'category' => 'miscellaneous',
    'icon' => '🔳',
    'handler' => 'GeneratorHandler',
    'action' => 'qrGen',
    'controller' => 'GeneratorController',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'qr_type',
        'type' => 'tabs',
        'label' => 'Data Type',
        'options' => 
        array (
          'url' => 
          array (
            'icon' => '🔗',
            'label' => 'URL',
          ),
          'text' => 
          array (
            'icon' => '📝',
            'label' => 'Text',
          ),
          'wifi' => 
          array (
            'icon' => '📶',
            'label' => 'WiFi',
          ),
          'email' => 
          array (
            'icon' => '📧',
            'label' => 'Email',
          ),
        ),
        'value' => 'url',
      ),
      1 => 
      array (
        'name' => 'qr_content',
        'type' => 'text',
        'label' => 'Content',
        'required' => true,
        'placeholder' => 'https://example.com',
      ),
      2 => 
      array (
        'name' => 'size',
        'type' => 'range',
        'label' => 'Size (px)',
        'min' => '100',
        'max' => '1000',
        'value' => '300',
      ),
      3 => 
      array (
        'name' => 'color_fg',
        'type' => 'color',
        'label' => 'Foreground Color',
        'value' => '#000000',
      ),
      4 => 
      array (
        'name' => 'color_bg',
        'type' => 'color',
        'label' => 'Background Color',
        'value' => '#ffffff',
      ),
    ),
  ),
  'barcode-generator-1d' => 
  array (
    'title' => 'Barcode Generator',
    'desc' => 'Generate classic 1D barcodes for various numbering systems.',
    'category' => 'miscellaneous',
    'icon' => '║║',
    'handler' => 'GeneratorHandler',
    'action' => 'barcode',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Number',
        'value' => '123456789',
      ),
    ),
  ),
  'ascii-art-generator-tool' => 
  array (
    'title' => 'ASCII Art Gen',
    'desc' => 'Convert simple text into beautiful large-scale ASCII banners.',
    'category' => 'miscellaneous',
    'icon' => '█',
    'handler' => 'GeneratorHandler',
    'action' => 'asciiArt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Text',
        'value' => 'HELLO',
      ),
    ),
  ),
  'vaporwave-text-generator-fun' => 
  array (
    'title' => 'Vaporwave Text',
    'desc' => 'Transform your text into the aesthetic full-width vaporwave style.',
    'category' => 'miscellaneous',
    'icon' => '🌴',
    'handler' => 'GeneratorHandler',
    'action' => 'vaporwave',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Text',
        'value' => 'Aesthetic',
      ),
    ),
  ),
  'emoji-search-copy-tool' => 
  array (
    'title' => 'Emoji Search',
    'desc' => 'Quickly find and copy emojis for your social media and chats.',
    'category' => 'miscellaneous',
    'icon' => '😀',
    'handler' => 'GeneratorHandler',
    'action' => 'emojiSearch',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'query',
        'type' => 'text',
        'label' => 'Search',
        'value' => 'smile',
      ),
    ),
  ),
  'kaomoji-library-lenny' => 
  array (
    'title' => 'Kaomoji Library',
    'desc' => 'Browse and copy thousands of Japanese kaomoji and Lenny faces.',
    'category' => 'miscellaneous',
    'icon' => '(ツ)',
    'handler' => 'GeneratorHandler',
    'action' => 'kaomoji',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'password-strength-meter-calc' => 
  array (
    'title' => 'Password Strength',
    'desc' => 'Analyze your password security and complexity in real-time.',
    'category' => 'miscellaneous',
    'icon' => '🛡️',
    'handler' => 'GeneratorHandler',
    'action' => 'passwordStrength',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'password',
        'label' => 'Password',
        'value' => '',
      ),
    ),
  ),
  'typing-speed-test-latency' => 
  array (
    'title' => 'Typing Speed Test',
    'desc' => 'Measure your typing speed and accuracy with this interactive test.',
    'category' => 'miscellaneous',
    'icon' => '⌨️',
    'handler' => 'GeneratorHandler',
    'action' => 'typingTest',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Type here',
        'value' => '',
      ),
    ),
  ),
  'merge-pdfs' => 
  array (
    'title' => 'Merge PDF',
    'desc' => 'Combine multiple PDF files into one single document instantly.',
    'category' => 'pdf-tools',
    'icon' => '📂',
    'handler' => 'PdfHandler',
    'action' => 'merge',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'files[]',
        'type' => 'file',
        'label' => 'Select PDF Files (Drag to reorder)',
        'required' => true,
        'multiple' => true,
        'sortable' => true,
      ),
    ),
  ),
  'split-pdf' => 
  array (
    'title' => 'Split PDF',
    'desc' => 'Extract specific pages or ranges from a PDF document.',
    'category' => 'pdf-tools',
    'icon' => '✂️',
    'handler' => 'PdfHandler',
    'action' => 'split',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'pages_range',
        'type' => 'text',
        'label' => 'Custom Page Ranges',
        'placeholder' => 'e.g., 1-5, 8, 11-13',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'extract_all',
        'type' => 'checkbox',
        'label' => 'Extract all pages as separate files',
        'value' => '1',
      ),
    ),
  ),
  'compress-pdf' => 
  array (
    'title' => 'Compress PDF',
    'desc' => 'Reduce the file size of your PDF while maintaining quality.',
    'category' => 'pdf-tools',
    'icon' => '📉',
    'handler' => 'PdfHandler',
    'action' => 'compress',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'compression_level',
        'type' => 'cards',
        'label' => 'Compression Level',
        'options' => 
        array (
          'recommended' => 
          array (
            'icon' => '👌',
            'title' => 'Recommended',
            'desc' => 'Good Quality & Size',
          ),
          'extreme' => 
          array (
            'icon' => '⚡',
            'title' => 'Extreme',
            'desc' => 'Lowest Quality/Smallest Size',
          ),
          'low' => 
          array (
            'icon' => '💎',
            'title' => 'High Quality',
            'desc' => 'Low Compression',
          ),
        ),
        'value' => 'recommended',
      ),
    ),
  ),
  'pdf-to-word' => 
  array (
    'title' => 'PDF to Word',
    'desc' => 'Convert PDF documents to editable Microsoft Word files.',
    'category' => 'pdf-tools',
    'icon' => 'W',
    'handler' => 'PdfHandler',
    'action' => 'toWord',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'word-to-pdf' => 
  array (
    'title' => 'Word to PDF',
    'desc' => 'Convert Microsoft Word documents (DOC/DOCX) to PDF format.',
    'category' => 'pdf-tools',
    'icon' => '📄',
    'handler' => 'PdfHandler',
    'action' => 'fromWord',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select Word File',
        'required' => true,
      ),
    ),
  ),
  'pdf-to-excel' => 
  array (
    'title' => 'PDF to Excel',
    'desc' => 'Extract tables and data from PDF to Microsoft Excel.',
    'category' => 'pdf-tools',
    'icon' => 'X',
    'handler' => 'PdfHandler',
    'action' => 'toExcel',
    'controller' => 'PdfController',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'excel-to-pdf' => 
  array (
    'title' => 'Excel to PDF',
    'desc' => 'Convert Microsoft Excel spreadsheets to PDF format.',
    'category' => 'pdf-tools',
    'icon' => '📊',
    'handler' => 'PdfHandler',
    'action' => 'fromExcel',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select Excel File',
        'required' => true,
      ),
    ),
  ),
  'pdf-to-ppt' => 
  array (
    'title' => 'PDF to PowerPoint',
    'desc' => 'Convert PDF slides to editable PowerPoint presentations.',
    'category' => 'pdf-tools',
    'icon' => 'P',
    'handler' => 'PdfHandler',
    'action' => 'toPpt',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'ppt-to-pdf' => 
  array (
    'title' => 'PowerPoint to PDF',
    'desc' => 'Convert PowerPoint (PPT/PPTX) presentations to PDF.',
    'category' => 'pdf-tools',
    'icon' => '🎬',
    'handler' => 'PdfHandler',
    'action' => 'fromPpt',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PPT File',
        'required' => true,
      ),
    ),
  ),
  'pdf-to-jpg' => 
  array (
    'title' => 'PDF to JPG',
    'desc' => 'Convert each PDF page into a high-quality JPG image.',
    'category' => 'pdf-tools',
    'icon' => '🖼️',
    'handler' => 'PdfHandler',
    'action' => 'toJpg',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'quality',
        'type' => 'select',
        'label' => 'Quality/Resolution',
        'options' => 
        array (
          'standard' => 'Standard (150 DPI)',
          'high' => 'High (300 DPI)',
          'maximum' => 'Maximum (600 DPI)',
        ),
        'required' => true,
      ),
    ),
  ),
  'jpg-to-pdf' => 
  array (
    'title' => 'JPG to PDF',
    'desc' => 'Convert images (JPG, PNG) into a professional PDF document.',
    'category' => 'pdf-tools',
    'icon' => '📷',
    'handler' => 'PdfHandler',
    'action' => 'fromJpg',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'files[]',
        'type' => 'file',
        'label' => 'Select Image Files',
        'required' => true,
        'multiple' => true,
      ),
      1 => 
      array (
        'name' => 'quality',
        'type' => 'select',
        'label' => 'Quality/Resolution',
        'options' => 
        array (
          'standard' => 'Standard (Good for Web)',
          'high' => 'High (Good for Print)',
          'maximum' => 'Maximum (Lossless, Huge File Size)',
        ),
        'required' => true,
      ),
    ),
  ),
  'pdf-unlock' => 
  array (
    'title' => 'PDF Unlock',
    'desc' => 'Remove passwords and permissions from your PDF files.',
    'category' => 'pdf-tools',
    'icon' => '🔓',
    'handler' => 'PdfHandler',
    'action' => 'unlock',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'pdf-protect' => 
  array (
    'title' => 'PDF Protect',
    'desc' => 'Add a password and encrypt your PDF document.',
    'category' => 'pdf-tools',
    'icon' => '🔒',
    'handler' => 'PdfHandler',
    'action' => 'protect',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'user_password',
        'type' => 'password',
        'label' => 'User Password (to open)',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'permissions',
        'type' => 'checkbox_group',
        'label' => 'Permissions',
        'options' => 
        array (
          'allow_print' => 'Allow Printing',
          'allow_copy' => 'Allow Copying',
          'allow_modify' => 'Allow Modifying',
        ),
      ),
    ),
  ),
  'rotate-pdf' => 
  array (
    'title' => 'Rotate PDF',
    'desc' => 'Permanently rotate pages in your PDF document.',
    'category' => 'pdf-tools',
    'icon' => '🔄',
    'handler' => 'PdfHandler',
    'action' => 'rotate',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'angle',
        'type' => 'select',
        'label' => 'Rotation Angle',
        'options' => 
        array (
          90 => 'Right 90°',
          -90 => 'Left 90°',
          180 => '180° Upside Down',
        ),
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'pages_range',
        'type' => 'text',
        'label' => 'Page Range (Leave blank for all)',
        'placeholder' => 'e.g., 1-3, 5',
      ),
    ),
  ),
  'crop-pdf' => 
  array (
    'title' => 'Crop PDF',
    'desc' => 'Trim whitespace or crop specific areas of your PDF pages.',
    'category' => 'pdf-tools',
    'icon' => '📐',
    'handler' => 'PdfHandler',
    'action' => 'crop',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'pdf-editor' => 
  array (
    'title' => 'PDF Editor',
    'desc' => 'Modify content, add text, images, or shapes to your PDF.',
    'category' => 'pdf-tools',
    'icon' => '🖊️',
    'handler' => 'PdfHandler',
    'action' => 'edit',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'pdf-metadata' => 
  array (
    'title' => 'PDF Metadata Editor',
    'desc' => 'Edit author, title, keywords, and other PDF properties.',
    'category' => 'pdf-tools',
    'icon' => 'ℹ️',
    'handler' => 'PdfHandler',
    'action' => 'metadata',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'pdf-numbering' => 
  array (
    'title' => 'PDF Page Numbering',
    'desc' => 'Add professional page numbers to your PDF documents.',
    'category' => 'pdf-tools',
    'icon' => '1️⃣',
    'handler' => 'PdfHandler',
    'action' => 'numbering',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'position',
        'type' => 'select',
        'label' => 'Position',
        'options' => 
        array (
          'bottom_right' => 'Bottom Right',
          'bottom_center' => 'Bottom Center',
          'bottom_left' => 'Bottom Left',
          'top_right' => 'Top Right',
          'top_center' => 'Top Center',
          'top_left' => 'Top Left',
        ),
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'format',
        'type' => 'text',
        'label' => 'Number Format',
        'placeholder' => 'e.g., Page {n} of {p}',
        'value' => 'Page {n} of {p}',
      ),
    ),
  ),
  'pdf-watermark' => 
  array (
    'title' => 'PDF Watermark',
    'desc' => 'Add text or image watermarks to your PDF file.',
    'category' => 'pdf-tools',
    'icon' => '🏷️',
    'handler' => 'PdfHandler',
    'action' => 'watermark',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'watermark_text',
        'type' => 'text',
        'label' => 'Watermark Text',
        'required' => true,
        'placeholder' => 'CONFIDENTIAL',
      ),
      2 => 
      array (
        'name' => 'position',
        'type' => 'select',
        'label' => 'Position',
        'options' => 
        array (
          'center' => 'Center',
          'top_left' => 'Top Left',
          'top_right' => 'Top Right',
          'bottom_left' => 'Bottom Left',
          'bottom_right' => 'Bottom Right',
        ),
      ),
      3 => 
      array (
        'name' => 'font_size',
        'type' => 'number',
        'label' => 'Font Size',
        'value' => '50',
        'min' => '10',
        'max' => '200',
      ),
      4 => 
      array (
        'name' => 'opacity',
        'type' => 'number',
        'label' => 'Opacity %',
        'value' => '50',
        'min' => '1',
        'max' => '100',
      ),
      5 => 
      array (
        'name' => 'text_color',
        'type' => 'color',
        'label' => 'Text Color',
        'value' => '#ff0000',
      ),
      6 => 
      array (
        'name' => 'rotation',
        'type' => 'select',
        'label' => 'Rotation',
        'options' => 
        array (
          -45 => '-45 Degrees',
          0 => '0 Degrees (None)',
          45 => '45 Degrees',
        ),
      ),
    ),
  ),
  'pdf-sign' => 
  array (
    'title' => 'Sign PDF',
    'desc' => 'Digitally sign or add handwriting signatures to PDFs.',
    'category' => 'pdf-tools',
    'icon' => '✍️',
    'handler' => 'PdfHandler',
    'action' => 'sign',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'organize-pdf' => 
  array (
    'title' => 'Organize PDF',
    'desc' => 'Rearrange, delete, duplicate, and rotate pages via a visual grid.',
    'category' => 'pdf-tools',
    'icon' => '▦',
    'handler' => 'PdfHandler',
    'action' => 'organize',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'annotate-pdf' => 
  array (
    'title' => 'Annotate PDF',
    'desc' => 'Highlight, strike-through, underline, add shapes, draw freehand.',
    'category' => 'pdf-tools',
    'icon' => '🖍️',
    'handler' => 'PdfHandler',
    'action' => 'annotate',
    'controller' => 'PdfController',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'watermark-pdf' => 
  array (
    'title' => 'Watermark PDF',
    'desc' => 'Add text or image watermarks to your PDF file.',
    'category' => 'pdf-tools',
    'icon' => '🏷️',
    'handler' => 'PdfHandler',
    'action' => 'watermark',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'watermark_text',
        'type' => 'text',
        'label' => 'Watermark Text',
        'required' => true,
        'placeholder' => 'e.g. CONFIDENTIAL',
      ),
      2 => 
      array (
        'name' => 'font_size',
        'type' => 'range',
        'label' => 'Font Size (pt)',
        'min' => '12',
        'max' => '144',
        'value' => '48',
      ),
      3 => 
      array (
        'name' => 'opacity',
        'type' => 'range',
        'label' => 'Opacity (%)',
        'min' => '1',
        'max' => '100',
        'value' => '50',
      ),
      4 => 
      array (
        'name' => 'text_color',
        'type' => 'color',
        'label' => 'Text Color',
        'value' => '#ff0000',
      ),
      5 => 
      array (
        'name' => 'position',
        'type' => 'grid_3x3',
        'label' => 'Position',
        'value' => 'center',
      ),
      6 => 
      array (
        'name' => 'rotation',
        'type' => 'select',
        'label' => 'Rotation',
        'options' => 
        array (
          0 => '0° Horizontal',
          45 => '45° Diagonal',
          90 => '90° Vertical',
          -45 => '-45° Anti-Diagonal',
        ),
        'value' => '45',
      ),
    ),
  ),
  'pdf-page-numbers' => 
  array (
    'title' => 'PDF Page Numbers',
    'desc' => 'Add customizable page numbers with positioning.',
    'category' => 'pdf-tools',
    'icon' => '1️⃣',
    'handler' => 'PdfHandler',
    'action' => 'numbering',
    'controller' => 'PdfController',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'position',
        'type' => 'select',
        'label' => 'Position',
        'options' => 
        array (
          'bottom_right' => 'Bottom Right',
          'bottom_center' => 'Bottom Center',
          'bottom_left' => 'Bottom Left',
          'top_right' => 'Top Right',
          'top_center' => 'Top Center',
          'top_left' => 'Top Left',
        ),
        'value' => 'bottom_center',
      ),
      2 => 
      array (
        'name' => 'format',
        'type' => 'text',
        'label' => 'Number Format',
        'placeholder' => 'e.g., Page {n} of {p}',
        'value' => 'Page {n} of {p}',
      ),
    ),
  ),
  'ocr-pdf' => 
  array (
    'title' => 'OCR PDF',
    'desc' => 'Extract text from scanned PDFs using Optical Character Recognition (Offline JS).',
    'category' => 'pdf-tools',
    'icon' => '🔍',
    'handler' => 'PdfHandler',
    'action' => 'ocr',
    'controller' => 'PdfController',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select Scanned PDF',
        'required' => true,
      ),
    ),
  ),
  'edit-pdf' => 
  array (
    'title' => 'PDF Editor',
    'desc' => 'Add text, images, and markup to your PDF files directly in browser.',
    'category' => 'pdf-tools',
    'icon' => '🖊️',
    'handler' => 'PdfHandler',
    'action' => 'edit',
    'controller' => 'PdfController',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Select PDF File',
        'required' => true,
      ),
    ),
  ),
  'json-to-typescript' => 
  array (
    'title' => 'JSON to TypeScript',
    'desc' => 'Generate TypeScript interfaces from JSON objects instantly.',
    'category' => 'dev-tools',
    'icon' => 'TS',
    'handler' => 'DevHandler',
    'action' => 'jsonToTs',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'json',
        'type' => 'textarea',
        'label' => 'Paste JSON here',
        'required' => true,
      ),
    ),
  ),
  'cron-generator' => 
  array (
    'title' => 'Cron Job Generator',
    'desc' => 'Create Unix cron schedule expressions with human-readable verification.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-clock',
    'handler' => 'DevHandler',
    'action' => 'cronGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'regex-visualizer' => 
  array (
    'title' => 'Regex Visualizer',
    'desc' => 'Visualize your regular expressions to understand how they work.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-eye',
    'handler' => 'DevHandler',
    'action' => 'regexVisualizer',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'regex',
        'type' => 'text',
        'label' => 'Regex Pattern',
        'placeholder' => '/[a-z]+/i',
        'required' => true,
      ),
    ),
  ),
  'dockerfile-generator' => 
  array (
    'title' => 'Dockerfile Generator',
    'desc' => 'Generate simple Dockerfiles for various environments.',
    'category' => 'developer-tools',
    'icon' => 'fa-brands fa-docker',
    'handler' => 'DevHandler',
    'action' => 'dockerfileGenerator',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'base_image',
        'type' => 'text',
        'label' => 'Base Image',
        'placeholder' => 'node:18',
        'required' => true,
      ),
    ),
  ),
  'gitignore-generator' => 
  array (
    'title' => 'Gitignore Generator',
    'desc' => 'Generate .gitignore files for your projects based on your setup.',
    'category' => 'developer-tools',
    'icon' => 'fa-brands fa-git-alt',
    'handler' => 'DevHandler',
    'action' => 'gitignoreGenerator',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'env',
        'type' => 'text',
        'label' => 'Environment/OS/IDE',
        'placeholder' => 'Node, Windows, VSCode',
        'required' => true,
      ),
    ),
  ),
  'url-scheme-builder' => 
  array (
    'title' => 'URL Scheme Builder',
    'desc' => 'Build custom URL schemes for deep linking in mobile apps.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-link',
    'handler' => 'DevHandler',
    'action' => 'urlSchemeBuilder',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'scheme',
        'type' => 'text',
        'label' => 'Scheme',
        'placeholder' => 'myapp',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'path',
        'type' => 'text',
        'label' => 'Path',
        'placeholder' => 'user/profile',
        'required' => true,
      ),
    ),
  ),
  'curl-converter' => 
  array (
    'title' => 'cURL Command Converter',
    'desc' => 'Convert cURL commands to Fetch, Python, or Go code.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-terminal',
    'handler' => 'DevHandler',
    'action' => 'curlConverter',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'curl',
        'type' => 'textarea',
        'label' => 'cURL Command',
        'placeholder' => 'curl https://api.example.com',
        'required' => true,
      ),
    ),
  ),
  'postman-to-swagger' => 
  array (
    'title' => 'Postman to Swagger',
    'desc' => 'Convert Postman collections to Swagger (OpenAPI) format.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-exchange',
    'handler' => 'DevHandler',
    'action' => 'postmanToSwagger',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'postman_json',
        'type' => 'textarea',
        'label' => 'Postman Collection JSON',
        'required' => true,
      ),
    ),
  ),
  'ssl-decoder' => 
  array (
    'title' => 'SSL Cert Decoder',
    'desc' => 'Decode CSR and certificates to view their details.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-certificate',
    'handler' => 'DevHandler',
    'action' => 'sslDecoder',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'cert',
        'type' => 'textarea',
        'label' => 'Certificate content',
        'required' => true,
      ),
    ),
  ),
  'git-cheatsheet' => 
  array (
    'title' => 'Git Cheatsheet',
    'desc' => 'A handy reference for most common Git commands.',
    'category' => 'developer-tools',
    'icon' => 'fa-brands fa-git',
    'handler' => 'DevHandler',
    'action' => 'gitCheatsheet',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'tailwind-grid-builder' => 
  array (
    'title' => 'Tailwind Grid Builder',
    'desc' => 'Layout CSS grids visually with Tailwind CSS classes.',
    'category' => 'design-tools',
    'icon' => '▦',
    'handler' => 'DesignHandler',
    'action' => 'tailwindGrid',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'cols',
        'type' => 'number',
        'label' => 'Columns',
        'value' => '3',
      ),
    ),
  ),
  'svg-blob-generator' => 
  array (
    'title' => 'SVG Blob Generator',
    'desc' => 'Generate unique, organic SVG blob shapes for your designs.',
    'category' => 'design-tools',
    'icon' => '💧',
    'handler' => 'DesignHandler',
    'action' => 'svgBlob',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'complexity',
        'type' => 'range',
        'label' => 'Complexity',
        'min' => '1',
        'max' => '20',
        'value' => '5',
      ),
    ),
  ),
  'responsive-mockup' => 
  array (
    'title' => 'Responsive Screen Mockup',
    'desc' => 'Preview your website on various device sizes instantly.',
    'category' => 'design-tools',
    'icon' => '📱',
    'handler' => 'DesignHandler',
    'action' => 'mockup',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'Website URL',
        'placeholder' => 'https://example.com',
      ),
    ),
  ),
  'favicon-generator' => 
  array (
    'title' => 'Favicon Generator',
    'desc' => 'Create favicons from text, emojis, or images in all standard sizes.',
    'category' => 'design-tools',
    'icon' => 'Fv',
    'handler' => 'DesignHandler',
    'action' => 'faviconGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'source',
        'type' => 'text',
        'label' => 'Text/Emoji',
        'required' => true,
      ),
    ),
  ),
  'font-pairing' => 
  array (
    'title' => 'Font Pairing Recommender',
    'desc' => 'Discover beautiful Google Font combinations for your website.',
    'category' => 'design-tools',
    'icon' => 'Aa',
    'handler' => 'DesignHandler',
    'action' => 'fontPair',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'scrollbar-customizer' => 
  array (
    'title' => 'Scrollbar Customizer',
    'desc' => 'Generate custom CSS for stylish browser scrollbars.',
    'category' => 'design-tools',
    'icon' => '↕️',
    'handler' => 'DesignHandler',
    'action' => 'scrollbarGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'color',
        'type' => 'color',
        'label' => 'Thumb Color',
        'value' => '#ff7a59',
      ),
    ),
  ),
  'css-cursor-gen' => 
  array (
    'title' => 'CSS Cursor Generator',
    'desc' => 'Preview and copy code for all standard and custom CSS cursors.',
    'category' => 'design-tools',
    'icon' => '🖱️',
    'handler' => 'DesignHandler',
    'action' => 'cursorGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'bootstrap-to-tailwind' => 
  array (
    'title' => 'Bootstrap to Tailwind',
    'desc' => 'Convert classic Bootstrap classes to modern Tailwind CSS equivalents.',
    'category' => 'design-tools',
    'icon' => 'BT',
    'handler' => 'DesignHandler',
    'action' => 'bToT',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'html',
        'type' => 'textarea',
        'label' => 'Paste HTML',
        'required' => true,
      ),
    ),
  ),
  'aspect-ratio-calc' => 
  array (
    'title' => 'Aspect Ratio Calculator',
    'desc' => 'Calculate dimensions based on aspect ratios (16:9, 4:3, etc.).',
    'category' => 'design-tools',
    'icon' => '📐',
    'handler' => 'DesignHandler',
    'action' => 'aspectCalc',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'width',
        'type' => 'number',
        'label' => 'Width',
        'value' => '1920',
      ),
    ),
  ),
  'google-fonts-embed' => 
  array (
    'title' => 'Google Fonts Embed Generator',
    'desc' => 'Generate quick @import or <link> tags for Google Fonts.',
    'category' => 'design-tools',
    'icon' => 'G',
    'handler' => 'DesignHandler',
    'action' => 'fontEmbed',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'font',
        'type' => 'text',
        'label' => 'Font Name',
        'value' => 'Inter',
      ),
    ),
  ),
  'midjourney-prompt-builder' => 
  array (
    'title' => 'Midjourney Prompt Builder',
    'desc' => 'Build complex Midjourney prompts with parameters and styles.',
    'category' => 'text-tools',
    'icon' => '🖼️',
    'handler' => 'AiHandler',
    'action' => 'mjPrompt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'concept',
        'type' => 'text',
        'label' => 'Main Concept',
        'required' => true,
      ),
    ),
  ),
  'chatgpt-mega-prompt' => 
  array (
    'title' => 'ChatGPT Mega-Prompt Generator',
    'desc' => 'Generate expert-level system prompts for better AI responses.',
    'category' => 'text-tools',
    'icon' => '🤖',
    'handler' => 'AiHandler',
    'action' => 'chatPrompt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'goal',
        'type' => 'text',
        'label' => 'Your Goal',
        'required' => true,
      ),
    ),
  ),
  'yt-summarizer' => 
  array (
    'title' => 'YouTube Summarizer Template',
    'desc' => 'Structure your YouTube video notes into professional summaries.',
    'category' => 'text-tools',
    'icon' => '▶️',
    'handler' => 'AiHandler',
    'action' => 'ytSum',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'transcript',
        'type' => 'textarea',
        'label' => 'Paste Transcript',
        'required' => true,
      ),
    ),
  ),
  'stable-diffusion-prompt' => 
  array (
    'title' => 'Stable Diffusion Prompt Gen',
    'desc' => 'Create detailed prompts for Stable Diffusion image generation.',
    'category' => 'text-tools',
    'icon' => '✨',
    'handler' => 'AiHandler',
    'action' => 'sdPrompt',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'subject',
        'type' => 'text',
        'label' => 'Subject',
        'required' => true,
      ),
    ),
  ),
  'blog-title-generator' => 
  array (
    'title' => 'Blog Title Generator',
    'desc' => 'Generate catchy, SEO-friendly titles for your blog posts.',
    'category' => 'text-tools',
    'icon' => '📝',
    'handler' => 'AiHandler',
    'action' => 'blogTitle',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'keywords',
        'type' => 'text',
        'label' => 'Keywords',
        'required' => true,
      ),
    ),
  ),
  'cold-email-gen' => 
  array (
    'title' => 'Cold Email Generator',
    'desc' => 'Generate professional outreach emails tailored to your prospect.',
    'category' => 'text-tools',
    'icon' => '📧',
    'handler' => 'AiHandler',
    'action' => 'coldEmail',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'prospect',
        'type' => 'text',
        'label' => 'Prospect Name',
        'required' => true,
      ),
    ),
  ),
  'cover-letter-gen' => 
  array (
    'title' => 'Cover Letter Generator',
    'desc' => 'Create compelling cover letters for your job applications.',
    'category' => 'text-tools',
    'icon' => '📄',
    'handler' => 'AiHandler',
    'action' => 'coverLetter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'role',
        'type' => 'text',
        'label' => 'Job Role',
        'required' => true,
      ),
    ),
  ),
  'social-media-bio' => 
  array (
    'title' => 'Social Media Bio Gen',
    'desc' => 'Generate creative bios for Instagram, Twitter, and LinkedIn.',
    'category' => 'text-tools',
    'icon' => '👤',
    'handler' => 'AiHandler',
    'action' => 'socialBio',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'bio_type',
        'type' => 'select',
        'label' => 'Platform',
        'options' => 
        array (
          'ig' => 'Instagram',
          'x' => 'Twitter/X',
          'li' => 'LinkedIn',
        ),
      ),
    ),
  ),
  'product-description-gen' => 
  array (
    'title' => 'Product Description Gen',
    'desc' => 'Generate persuasive product descriptions for e-commerce.',
    'category' => 'text-tools',
    'icon' => '🛒',
    'handler' => 'AiHandler',
    'action' => 'productDesc',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'product',
        'type' => 'text',
        'label' => 'Product Name',
        'required' => true,
      ),
    ),
  ),
  'ai-text-summarizer' => 
  array (
    'title' => 'AI Text Summarizer',
    'desc' => 'Summarize long articles and documents into concise bullet points using on-device AI.',
    'category' => 'ai-powered-tools',
    'icon' => '📝',
    'handler' => 'AiHandler',
    'action' => 'summarizer',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Paste Content',
        'placeholder' => 'Enter long text here...',
        'required' => true,
      ),
    ),
  ),
  'ai-sentiment-analyzer' => 
  array (
    'title' => 'AI Sentiment Analyzer',
    'desc' => 'Detect emotional tone (Positive, Negative, Neutral) using real-time NLP models.',
    'category' => 'ai-powered-tools',
    'icon' => '🎭',
    'handler' => 'AiHandler',
    'action' => 'sentiment',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Text',
        'placeholder' => 'Type something emotional...',
        'required' => true,
      ),
    ),
  ),
  'ai-prompt-generator' => 
  array (
    'title' => 'AI Prompt Generator',
    'desc' => 'Expand simple ideas into advanced, high-detail prompts for AI models like Midjourney or ChatGPT.',
    'category' => 'ai-powered-tools',
    'icon' => '🚀',
    'handler' => 'AiHandler',
    'action' => 'promptGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'idea',
        'type' => 'textarea',
        'label' => 'Your Simple Idea',
        'placeholder' => 'A cat in space...',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'type',
        'type' => 'select',
        'label' => 'Model Target',
        'options' => 
        array (
          'image' => 'Image Model (Midjourney/DALL-E)',
          'text' => 'Text Model (ChatGPT/Claude)',
        ),
      ),
    ),
  ),
  'ai-youtube-script-creator' => 
  array (
    'title' => 'AI YouTube Script Creator',
    'desc' => 'Generate structured video scripts with hooks, intro, body, and CTA based on your video title.',
    'category' => 'ai-powered-tools',
    'icon' => '🎬',
    'handler' => 'AiHandler',
    'action' => 'ytScript',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'title',
        'type' => 'text',
        'label' => 'Video Title',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'duration',
        'type' => 'select',
        'label' => 'Target Duration',
        'options' => 
        array (
          'short' => 'Short (< 1 min)',
          'medium' => 'Medium (5-8 min)',
          'long' => 'Long (10+ min)',
        ),
      ),
    ),
  ),
  'ai-seo-meta' => 
  array (
    'title' => 'AI SEO Meta Tags Generator',
    'desc' => 'Automatically generate optimized meta titles and descriptions for better search rankings.',
    'category' => 'ai-powered-tools',
    'icon' => '🔍',
    'handler' => 'AiHandler',
    'action' => 'seoMeta',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Page Content / URL Description',
        'required' => true,
      ),
    ),
  ),
  'ai-social-media-post' => 
  array (
    'title' => 'AI Social Media & Hashtags',
    'desc' => 'Create engaging posts for Instagram, X, and LinkedIn with trending hashtags and emojis.',
    'category' => 'ai-powered-tools',
    'icon' => '📱',
    'handler' => 'AiHandler',
    'action' => 'socialPost',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'What is the post about?',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'platform',
        'type' => 'cards',
        'label' => 'Target Platform',
        'value' => 'ig',
        'options' => 
        array (
          'ig' => 
          array (
            'title' => 'Instagram',
            'icon' => '📸',
            'desc' => 'Visual & Hashtags',
          ),
          'x' => 
          array (
            'title' => 'X / Twitter',
            'icon' => '🐦',
            'desc' => 'Short & Punchy',
          ),
          'li' => 
          array (
            'title' => 'LinkedIn',
            'icon' => '💼',
            'desc' => 'Professional',
          ),
        ),
      ),
    ),
  ),
  'ai-regex-generator' => 
  array (
    'title' => 'AI Regex Generator',
    'desc' => 'Turn plain English descriptions into complex, ready-to-use Regular Expressions.',
    'category' => 'ai-powered-tools',
    'icon' => '🧪',
    'handler' => 'AiHandler',
    'action' => 'regexGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'description',
        'type' => 'text',
        'label' => 'Describe the pattern',
        'placeholder' => 'Find email addresses, extract numbers between tags...',
        'required' => true,
      ),
    ),
  ),
  'ai-sql-query-generator' => 
  array (
    'title' => 'AI SQL Query Generator',
    'desc' => 'Convert natural language into valid SQL queries for MySQL, PostgreSQL, or SQL Server.',
    'category' => 'ai-powered-tools',
    'icon' => '💾',
    'handler' => 'AiHandler',
    'action' => 'sqlGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'request',
        'type' => 'textarea',
        'label' => 'Describe your query',
        'placeholder' => 'Get all users who signed up in 2023 with more than 5 orders...',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'db_type',
        'type' => 'select',
        'label' => 'Database Type',
        'options' => 
        array (
          'mysql' => 'MySQL',
          'pg' => 'PostgreSQL',
          'sqlserver' => 'SQL Server',
        ),
      ),
    ),
  ),
  'ai-code-translator' => 
  array (
    'title' => 'AI Code Translator',
    'desc' => 'Translate code snippets from one programming language to another using AI.',
    'category' => 'ai-powered-tools',
    'icon' => '⇄',
    'handler' => 'AiHandler',
    'action' => 'codeTranslate',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'code',
        'type' => 'textarea',
        'label' => 'Source Code',
        'class' => 'codemirror-js',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'from',
        'type' => 'select',
        'label' => 'From Language',
        'options' => 
        array (
          'javascript' => 'JavaScript',
          'python' => 'Python',
          'php' => 'PHP',
          'java' => 'Java',
        ),
      ),
      2 => 
      array (
        'name' => 'to',
        'type' => 'select',
        'label' => 'To Language',
        'options' => 
        array (
          'javascript' => 'JavaScript',
          'python' => 'Python',
          'php' => 'PHP',
          'java' => 'Java',
        ),
      ),
    ),
  ),
  'ai-plagiarism-detector' => 
  array (
    'title' => 'AI Plagiarism & Detection',
    'desc' => 'Analyze text to detect potential plagiarism and simulate AI-generated content probability.',
    'category' => 'ai-powered-tools',
    'icon' => '🛡️',
    'handler' => 'AiHandler',
    'action' => 'plagiarismDetect',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'required' => true,
      ),
    ),
  ),
  'ai-resume-builder' => 
  array (
    'title' => 'AI Resume & Cover Letter',
    'desc' => 'Build a professional resume and cover letter with AI-generated summaries and formatting.',
    'category' => 'ai-powered-tools',
    'icon' => '📄',
    'handler' => 'AiHandler',
    'action' => 'resumeBuilder',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'full_name',
        'type' => 'text',
        'label' => 'Full Name',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'email',
        'type' => 'text',
        'label' => 'Email Address',
        'required' => true,
      ),
      2 => 
      array (
        'name' => 'job_title',
        'type' => 'text',
        'label' => 'Target Job Title',
        'placeholder' => 'e.g. Senior Software Engineer',
        'required' => true,
      ),
      3 => 
      array (
        'name' => 'experience',
        'type' => 'textarea',
        'label' => 'Experience / Key Skills',
        'required' => true,
      ),
      4 => 
      array (
        'name' => 'interest',
        'type' => 'textarea',
        'label' => 'Cover Letter Interest',
        'required' => true,
      ),
    ),
  ),
  'json-to-ts' => 
  array (
    'title' => 'JSON to TS Interface',
    'desc' => 'Convert JSON objects to TypeScript interfaces instantly.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-code',
    'handler' => 'DevHandler',
    'action' => 'jsonToTs',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'json',
        'type' => 'textarea',
        'label' => 'JSON Input',
        'placeholder' => '{"key": "value"}',
        'required' => true,
      ),
    ),
  ),
  'bcrypt-hash-generator' => 
  array (
    'title' => 'Bcrypt Hash Generator',
    'desc' => 'Hash your passwords securely using the Bcrypt algorithm.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-lock',
    'handler' => 'DevHandler',
    'action' => 'bcryptHash',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'password',
        'type' => 'text',
        'label' => 'Password to Hash',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'rounds',
        'type' => 'number',
        'label' => 'Rounds',
        'value' => 10,
        'required' => true,
      ),
    ),
  ),
  'md-to-html' => 
  array (
    'title' => 'Markdown to HTML',
    'desc' => 'Convert Markdown text to clean HTML code instantly.',
    'category' => 'developer-tools',
    'icon' => 'fa-brands fa-markdown',
    'handler' => 'DevHandler',
    'action' => 'markdownToHtml',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'markdown',
        'type' => 'textarea',
        'label' => 'Markdown Content',
        'required' => true,
      ),
    ),
  ),
  'chmod-calculator' => 
  array (
    'title' => 'Chmod Permissions Calculator (Pro)',
    'desc' => 'Visually map Linux Unix read/write/execute file permissions to their exact Octal and Symbolic representations.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-unlock-keyhole',
    'handler' => 'DevHandler',
    'action' => 'chmodCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'ip-subnet-calculator' => 
  array (
    'title' => 'IP Subnet Calculator',
    'desc' => 'Calculate network ranges, broadcast addresses, and subnets.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-network-wired',
    'handler' => 'DevHandler',
    'action' => 'subnetCalculator',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'ip',
        'type' => 'text',
        'label' => 'IP Address',
        'placeholder' => '192.168.1.1',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'mask',
        'type' => 'text',
        'label' => 'Subnet Mask / CIDR',
        'placeholder' => '24 or 255.255.255.0',
        'required' => true,
      ),
    ),
  ),
  'duplicate-line-remover' => 
  array (
    'title' => 'Duplicate Line Remover',
    'desc' => 'Clean up lists by removing duplicate entries instantly.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-eraser',
    'handler' => 'DevHandler',
    'action' => 'duplicateRemover',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input List',
        'required' => true,
      ),
    ),
  ),
  'alphabetical-sorter' => 
  array (
    'title' => 'Alphabetical Sorter',
    'desc' => 'Sort lists alphabetically (A-Z or Z-A) and remove duplicates.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-sort-alpha-down',
    'handler' => 'DevHandler',
    'action' => 'listSorter',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Input List',
        'required' => true,
      ),
    ),
  ),
  'ascii-art-generator' => 
  array (
    'title' => 'ASCII Art Generator',
    'desc' => 'Convert your text into stylish ASCII art banners.',
    'category' => 'text-tools',
    'icon' => 'fa-solid fa-font',
    'handler' => 'DevHandler',
    'action' => 'asciiArt',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Text',
        'required' => true,
      ),
    ),
  ),
  'excel-to-json' => 
  array (
    'title' => 'Excel to JSON Converter',
    'desc' => 'Upload Excel files and convert them to JSON arrays.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-file-excel',
    'handler' => 'DevHandler',
    'action' => 'excelToJson',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'excel_file',
        'type' => 'file',
        'label' => 'Choose Excel File',
        'required' => true,
      ),
    ),
  ),
  'bbcode-to-json' => 
  array (
    'title' => 'BBCode to JSON/HTML',
    'desc' => 'Convert BBCode forum tags to JSON or HTML format.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-comment-code',
    'handler' => 'DevHandler',
    'action' => 'bbcodeToJson',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'bbcode',
        'type' => 'textarea',
        'label' => 'BBCode Content',
        'required' => true,
      ),
    ),
  ),
  'strong-password-generator' => 
  array (
    'title' => 'Strong Password Generator',
    'desc' => 'Generate cryptographically strong passwords for maximum security.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-key',
    'handler' => 'DevHandler',
    'action' => 'passwordGenerator',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'length',
        'type' => 'number',
        'label' => 'Length',
        'value' => 16,
        'required' => true,
      ),
    ),
  ),
  'password-strength-checker' => 
  array (
    'title' => 'Password Strength Checker',
    'desc' => 'Analyze the strength of your password using the zxcvbn library.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-shield-alt',
    'handler' => 'DevHandler',
    'action' => 'passwordStrength',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'password',
        'type' => 'password',
        'label' => 'Test Password',
        'required' => true,
      ),
    ),
  ),
  'pgp-key-generator' => 
  array (
    'title' => 'PGP Key Generator (Pro)',
    'desc' => 'Generate high-entropy PGP public and private keys for secure, decentralized communication.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-user-secret',
    'handler' => 'DevHandler',
    'action' => 'pgpKeyGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'hmac-generator' => 
  array (
    'title' => 'HMAC Generator (Pro)',
    'desc' => 'Generate Hash-based Message Authentication Codes to ensure both data integrity and authenticity.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-signature',
    'handler' => 'DevHandler',
    'action' => 'hmacGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'aes-256-encryptor' => 
  array (
    'title' => 'AES-256 Text Encryptor',
    'desc' => 'Encrypt and decrypt text using the military-grade AES-256 algorithm.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-vault',
    'handler' => 'DevHandler',
    'action' => 'aesEncrypt',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Text to Encrypt/Decrypt',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'secret',
        'type' => 'text',
        'label' => 'Secret Key',
        'required' => true,
      ),
    ),
  ),
  'dns-leak-tester' => 
  array (
    'title' => 'DNS Leak Tester',
    'desc' => 'Check if your DNS requests are leaking outside your VPN/Proxy.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-broadcast-tower',
    'handler' => 'DevHandler',
    'action' => 'dnsLeakTest',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'mac-address-lookup' => 
  array (
    'title' => 'MAC Address Lookup',
    'desc' => 'Identify the manufacturer and details of a device by its MAC address.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-microchip',
    'handler' => 'DevHandler',
    'action' => 'noop',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'mac',
        'type' => 'text',
        'label' => 'MAC Address',
        'placeholder' => '00:00:00:00:00:00',
        'required' => true,
      ),
    ),
  ),
  'ssl-cert-generator' => 
  array (
    'title' => 'SSL Cert Generator',
    'desc' => 'Generate self-signed SSL certificates for development and testing.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-stamp',
    'handler' => 'DevHandler',
    'action' => 'sslCertGenerator',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'common_name',
        'type' => 'text',
        'label' => 'Common Name (e.g. localhost)',
        'required' => true,
      ),
    ),
  ),
  'email-header-analyzer' => 
  array (
    'title' => 'Email Header Analyzer',
    'desc' => 'Trace the origin and path of an email by analyzing its headers.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-envelope-open-text',
    'handler' => 'DevHandler',
    'action' => 'emailHeaderAnalyzer',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'headers',
        'type' => 'textarea',
        'label' => 'Paste Email Headers',
        'required' => true,
      ),
    ),
  ),
  'malware-url-checker' => 
  array (
    'title' => 'Malware URL Checker',
    'desc' => 'Check if a URL is flag as malicious or suspicious by safety databases.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-virus-slash',
    'handler' => 'DevHandler',
    'action' => 'malwareUrlChecker',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'url',
        'type' => 'text',
        'label' => 'URL to Scan',
        'required' => true,
      ),
    ),
  ),
  'tor-node-checker' => 
  array (
    'title' => 'Tor Node Checker',
    'desc' => 'Identify if an IP address belongs to the Tor network.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-user-secret',
    'handler' => 'DevHandler',
    'action' => 'torNodeChecker',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'ip',
        'type' => 'text',
        'label' => 'IP Address',
        'required' => true,
      ),
    ),
  ),
  'ai-article-pro' => 
  array (
    'title' => 'AI Article & Blog Generator (Pro)',
    'desc' => 'Generate high-quality blog posts and articles based on keywords and titles.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-newspaper',
    'handler' => 'AiHandler',
    'action' => 'articlePro',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'topic',
        'type' => 'text',
        'label' => 'Keywords / Topic',
        'placeholder' => 'e.g. Artificial Intelligence, Digital Marketing',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'tone',
        'type' => 'select',
        'label' => 'Writing Tone',
        'options' => 
        array (
          'informative' => 'Informative',
          'engaging' => 'Engaging',
          'technical' => 'Technical',
        ),
      ),
    ),
  ),
  'ai-story-writer' => 
  array (
    'title' => 'AI Story & Fiction Writer',
    'desc' => 'Craft creative narratives, short stories, and fictional plots with AI.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-book-open-reader',
    'handler' => 'AiHandler',
    'action' => 'storyWriter',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'genre',
        'type' => 'text',
        'label' => 'Genre / Mood',
        'placeholder' => 'e.g. Sci-Fi, Mystery, Romantic',
      ),
      1 => 
      array (
        'name' => 'prompt',
        'type' => 'textarea',
        'label' => 'Starting Prompt',
        'required' => true,
      ),
    ),
  ),
  'ai-essay-assistant' => 
  array (
    'title' => 'AI Essay & Research Assistant',
    'desc' => 'Structured academic writing and research-based content generation.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-graduation-cap',
    'handler' => 'AiHandler',
    'action' => 'essayAsst',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'topic',
        'type' => 'text',
        'label' => 'Essay Topic',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'words',
        'type' => 'number',
        'label' => 'Target Word Count',
        'value' => 500,
      ),
    ),
  ),
  'ai-paraphraser-pro' => 
  array (
    'title' => 'AI Paraphrasing Tool (Ultra)',
    'desc' => 'Rewrite any text to make it more professional, creative, or easy to read.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-repeat',
    'handler' => 'AiHandler',
    'action' => 'paraphrasePro',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter text to rewrite',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'mode',
        'type' => 'select',
        'label' => 'Rewrite Mode',
        'options' => 
        array (
          'standard' => 'Standard',
          'creative' => 'Creative',
          'formal' => 'Formal',
        ),
      ),
    ),
  ),
  'ai-text-humanizer-pro' => 
  array (
    'title' => 'AI Text Humanizer',
    'desc' => 'Refine AI-generated text to sound more natural and avoid robotic patterns.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-user-check',
    'handler' => 'AiHandler',
    'action' => 'humanizePro',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter text',
        'required' => true,
      ),
    ),
  ),
  'ai-headline-creator' => 
  array (
    'title' => 'AI Viral Headline Creator',
    'desc' => 'Generate high CTR headlines for your blogs, articles, and newsletters.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-bolt',
    'handler' => 'AiHandler',
    'action' => 'headlineGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'topic',
        'type' => 'text',
        'label' => 'What is your content about?',
        'required' => true,
      ),
    ),
  ),
  'ai-content-gap' => 
  array (
    'title' => 'AI Content Gap Finder',
    'desc' => 'Identify missing subtopics and angles to make your posts more authoritative.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-magnifying-glass-chart',
    'handler' => 'AiHandler',
    'action' => 'gapFinder',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Paste your current draft',
        'required' => true,
      ),
    ),
  ),
  'ai-intro-hook' => 
  array (
    'title' => 'AI Introduction Hook Writer',
    'desc' => 'Grab attention from the first sentence with compelling opening hooks.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-anchor',
    'handler' => 'AiHandler',
    'action' => 'introHook',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'topic',
        'type' => 'text',
        'label' => 'Content Topic',
        'required' => true,
      ),
    ),
  ),
  'ai-conclusion-gen' => 
  array (
    'title' => 'AI Conclusion & Summary',
    'desc' => 'Create powerful wrap-ups and summary points for any article.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-flag-checkered',
    'handler' => 'AiHandler',
    'action' => 'conclusionGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Main Points / Body',
        'required' => true,
      ),
    ),
  ),
  'ai-outline-creator' => 
  array (
    'title' => 'AI Bullet Point & Outline Creator',
    'desc' => 'Transform vague ideas into a structured, logical content outline.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-list-check',
    'handler' => 'AiHandler',
    'action' => 'outlineGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'topic',
        'type' => 'text',
        'label' => 'Article Topic',
        'required' => true,
      ),
    ),
  ),
  'ai-ad-pro' => 
  array (
    'title' => 'AI Ad Copy Pro',
    'desc' => 'High-converting ad copy for Google Search, Facebook, and LinkedIn Ads.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-rectangle-ad',
    'handler' => 'AiHandler',
    'action' => 'adCopyPro',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'product',
        'type' => 'text',
        'label' => 'Product / Service Name',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'platform',
        'type' => 'select',
        'label' => 'Platform',
        'options' => 
        array (
          'google' => 'Google Ads',
          'fb' => 'Facebook Ads',
          'li' => 'LinkedIn Ads',
        ),
      ),
    ),
  ),
  'ai-email-suite' => 
  array (
    'title' => 'AI Email Marketing Suite',
    'desc' => 'Subject lines and body copy optimized for opens and clicks.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-envelope-open-text',
    'handler' => 'AiHandler',
    'action' => 'emailSuite',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'goal',
        'type' => 'text',
        'label' => 'Email Goal (e.g. Welcome, Sales)',
        'required' => true,
      ),
    ),
  ),
  'ai-product-desc-pro' => 
  array (
    'title' => 'AI Product Description (E-com)',
    'desc' => 'Persuasive descriptions for Shopify, Amazon, and Etsy products.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-cart-shopping',
    'handler' => 'AiHandler',
    'action' => 'prodDescPro',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'features',
        'type' => 'textarea',
        'label' => 'Key Features (Comma separated)',
        'required' => true,
      ),
    ),
  ),
  'ai-landing-page-copy' => 
  array (
    'title' => 'AI Landing Page Copy',
    'desc' => 'Full sales page copy including headlines, benefits, and CTAs.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-desktop',
    'handler' => 'AiHandler',
    'action' => 'lpCopy',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'offer',
        'type' => 'text',
        'label' => 'What are you offering?',
        'required' => true,
      ),
    ),
  ),
  'ai-value-prop' => 
  array (
    'title' => 'AI Value Proposition Generator',
    'desc' => 'Define why customers should choose you in one powerful sentence.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-star',
    'handler' => 'AiHandler',
    'action' => 'valueProp',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'product',
        'type' => 'text',
        'label' => 'Your Product',
        'required' => true,
      ),
    ),
  ),
  'ai-brand-hub' => 
  array (
    'title' => 'AI Startup & Brand Name Hub',
    'desc' => 'Generate memorable, available-style names for new ventures.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-rocket',
    'handler' => 'AiHandler',
    'action' => 'brandHub',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'niche',
        'type' => 'text',
        'label' => 'Startup Niche',
        'required' => true,
      ),
    ),
  ),
  'ai-pro-bio' => 
  array (
    'title' => 'AI Professional Bio Generator',
    'desc' => 'Perfect bios for LinkedIn, Speaker slots, and Portfolio sites.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-id-card',
    'handler' => 'AiHandler',
    'action' => 'proBio',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'info',
        'type' => 'textarea',
        'label' => 'Key Achievements / Role',
        'required' => true,
      ),
    ),
  ),
  'ai-review-responder' => 
  array (
    'title' => 'AI Customer Review Responder',
    'desc' => 'Professional and empathetic responses to customer feedback.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-comments',
    'handler' => 'AiHandler',
    'action' => 'reviewResp',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'review',
        'type' => 'textarea',
        'label' => 'Customer Review',
        'required' => true,
      ),
    ),
  ),
  'ai-interview-prep' => 
  array (
    'title' => 'AI Job Interview Prep',
    'desc' => 'Practice with AI-generated mock questions tailored to your job.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-user-tie',
    'handler' => 'AiHandler',
    'action' => 'interviewPrep',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'job',
        'type' => 'text',
        'label' => 'Target Job Title',
        'required' => true,
      ),
    ),
  ),
  'ai-slogan-gen' => 
  array (
    'title' => 'AI Slogan & Tagline Generator',
    'desc' => 'Catchy, memorable taglines for brands and marketing campaigns.',
    'category' => 'ultra-bst-pro',
    'icon' => 'fa-solid fa-quote-left',
    'handler' => 'AiHandler',
    'action' => 'sloganGen',
    'is_frontend_only' => true,
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'brand',
        'type' => 'text',
        'label' => 'Brand / Product Name',
        'required' => true,
      ),
    ),
  ),
  'adsense-revenue-calculator' => 
  array (
    'title' => 'AdSense Revenue Calculator',
    'desc' => 'Estimate your Google AdSense earnings based on daily page views, CTR, and CPC.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-ad',
    'handler' => 'FinanceHandler',
    'action' => 'adsenseRevenue',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'burn-rate-calculator' => 
  array (
    'title' => 'Burn Rate Calculator',
    'desc' => 'Calculate your startup gross and net burn rate plus projected runway in months.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-fire',
    'handler' => 'FinanceHandler',
    'action' => 'burnRate',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'business-name-generator' => 
  array (
    'title' => 'Business Name Generator',
    'desc' => 'Generate creative and brandable business name ideas for any industry.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-building',
    'handler' => 'FinanceHandler',
    'action' => 'businessName',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'cash-flow-forecaster' => 
  array (
    'title' => 'Cash Flow Forecaster',
    'desc' => 'Project monthly cash inflows and outflows to forecast your financial runway.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-chart-line',
    'handler' => 'FinanceHandler',
    'action' => 'cashFlow',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'disclaimer-generator' => 
  array (
    'title' => 'Disclaimer Generator',
    'desc' => 'Generate a professional website disclaimer tailored to your business type.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-shield-halved',
    'handler' => 'FinanceHandler',
    'action' => 'disclaimer',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'equity-dilution-calculator' => 
  array (
    'title' => 'Equity Dilution Calculator',
    'desc' => 'Visualize founder equity dilution across investment rounds with ownership charts.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-chart-pie',
    'handler' => 'FinanceHandler',
    'action' => 'equityDilution',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'freelance-contract-generator' => 
  array (
    'title' => 'Freelance Contract Generator',
    'desc' => 'Create a professional freelance agreement contract and download as PDF instantly.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-file-contract',
    'handler' => 'FinanceHandler',
    'action' => 'freelanceContract',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'freelance-hourly-rate-calculator' => 
  array (
    'title' => 'Freelance Hourly Rate Calculator',
    'desc' => 'Calculate your ideal hourly rate based on salary goals, expenses, and billable hours.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-money-bill-wave',
    'handler' => 'FinanceHandler',
    'action' => 'freelanceRate',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'gst-tax-calculator' => 
  array (
    'title' => 'GST Tax Calculator',
    'desc' => 'Calculate GST tax amounts for inclusive and exclusive pricing across multiple rates.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-percent',
    'handler' => 'FinanceHandler',
    'action' => 'gstTax',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'invoice-generator' => 
  array (
    'title' => 'Invoice Generator',
    'desc' => 'Create professional invoices with custom branding, line items, and download as PDF.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-file-invoice-dollar',
    'handler' => 'FinanceHandler',
    'action' => 'invoice',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'mission-statement-generator' => 
  array (
    'title' => 'Mission Statement Generator',
    'desc' => 'Craft compelling mission statements for your business, startup, or organization.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-bullseye',
    'handler' => 'FinanceHandler',
    'action' => 'missionStatement',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'privacy-policy-generator' => 
  array (
    'title' => 'Privacy Policy Generator',
    'desc' => 'Generate a comprehensive privacy policy page for your website or mobile app.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-user-shield',
    'handler' => 'FinanceHandler',
    'action' => 'privacyPolicy',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'project-cost-estimator' => 
  array (
    'title' => 'Project Cost Estimator',
    'desc' => 'Estimate total project costs with task breakdown, overhead, and contingency.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-calculator',
    'handler' => 'FinanceHandler',
    'action' => 'projectCost',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'purchase-order-generator' => 
  array (
    'title' => 'Purchase Order Generator',
    'desc' => 'Create professional purchase orders with vendor details and download as PDF.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-cart-shopping',
    'handler' => 'FinanceHandler',
    'action' => 'purchaseOrder',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'receipt-generator' => 
  array (
    'title' => 'Receipt Generator',
    'desc' => 'Generate professional payment receipts with itemized lists and download as PDF.',
    'category' => 'business-tools',
    'icon' => 'fa-solid fa-receipt',
    'handler' => 'FinanceHandler',
    'action' => 'receipt',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'saas-churn-rate-calculator' => 
  array (
    'title' => 'SaaS Churn Rate Calculator',
    'desc' => 'Calculate customer churn rate, retention rate, and projected subscriber loss.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-arrow-trend-down',
    'handler' => 'FinanceHandler',
    'action' => 'saasChurn',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'stripe-fee-calculator' => 
  array (
    'title' => 'Stripe Fee Calculator',
    'desc' => 'Calculate Stripe processing fees, net payout, and fee percentage for any transaction.',
    'category' => 'finance-tools',
    'icon' => 'fa-brands fa-stripe-s',
    'handler' => 'FinanceHandler',
    'action' => 'stripeFee',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'subscription-cac-calculator' => 
  array (
    'title' => 'Subscription CAC Calculator',
    'desc' => 'Calculate Customer Acquisition Cost, LTV, and LTV:CAC ratio for SaaS businesses.',
    'category' => 'finance-tools',
    'icon' => 'fa-solid fa-users',
    'handler' => 'FinanceHandler',
    'action' => 'subscriptionCac',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'website-worth-estimator' => 
  array (
    'title' => 'Website Worth Estimator',
    'desc' => 'Estimate the market value of any website based on traffic, domain age, backlinks, and revenue metrics.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-globe',
    'handler' => 'SeoHandler',
    'action' => 'websiteWorth',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'backlink-quality-checker' => 
  array (
    'title' => 'Backlink Quality Checker',
    'desc' => 'Analyze and score the quality of your backlinks based on domain authority, relevance, and spam signals.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-link',
    'handler' => 'SeoHandler',
    'action' => 'backlinkChecker',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'cold-email-template-generator' => 
  array (
    'title' => 'Cold Email Template Generator',
    'desc' => 'Generate high-converting cold email templates for sales outreach, partnerships, and lead generation.',
    'category' => 'marketing-tools',
    'icon' => 'fa-solid fa-envelope-open-text',
    'handler' => 'SocialHandler',
    'action' => 'coldEmail',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'domain-name-idea-generator' => 
  array (
    'title' => 'Domain Name Idea Generator',
    'desc' => 'Generate creative brandable domain name ideas for your startup, blog, or business.',
    'category' => 'marketing-tools',
    'icon' => 'fa-solid fa-at',
    'handler' => 'SocialHandler',
    'action' => 'domainIdea',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'email-subject-line-tester' => 
  array (
    'title' => 'Email Subject Line Tester',
    'desc' => 'Score and optimize your email subject lines for open rates using proven copywriting principles.',
    'category' => 'marketing-tools',
    'icon' => 'fa-solid fa-envelope',
    'handler' => 'SocialHandler',
    'action' => 'subjectTester',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'facebook-pixel-code-generator' => 
  array (
    'title' => 'Facebook Pixel Code Generator',
    'desc' => 'Generate ready-to-use Facebook Pixel tracking code for your website with custom events.',
    'category' => 'marketing-tools',
    'icon' => 'fa-brands fa-facebook',
    'handler' => 'SocialHandler',
    'action' => 'fbPixel',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'ga4-event-code-generator' => 
  array (
    'title' => 'GA4 Event Code Generator',
    'desc' => 'Generate Google Analytics 4 event tracking code snippets for buttons, forms, and custom events.',
    'category' => 'marketing-tools',
    'icon' => 'fa-solid fa-chart-simple',
    'handler' => 'SocialHandler',
    'action' => 'ga4Event',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'podcast-show-notes-generator' => 
  array (
    'title' => 'Podcast Show Notes Generator',
    'desc' => 'Create professional podcast show notes with timestamps, key takeaways, and SEO-friendly formatting.',
    'category' => 'marketing-tools',
    'icon' => 'fa-solid fa-podcast',
    'handler' => 'SocialHandler',
    'action' => 'podcastNotes',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'seo-audit-checklist-generator' => 
  array (
    'title' => 'SEO Audit Checklist Generator',
    'desc' => 'Generate a comprehensive SEO audit checklist customized for your website type and industry.',
    'category' => 'seo-tools',
    'icon' => 'fa-solid fa-clipboard-check',
    'handler' => 'SeoHandler',
    'action' => 'seoAudit',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'temp-email-generator' => 
  array (
    'title' => 'Temp Email Generator',
    'desc' => 'Generate a temporary disposable email address for signups, testing, and spam protection.',
    'category' => 'utility-tools',
    'icon' => 'fa-solid fa-envelope-circle-check',
    'handler' => 'SocialHandler',
    'action' => 'tempEmail',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'thread-hook-generator' => 
  array (
    'title' => 'Thread Hook Generator',
    'desc' => 'Generate viral Twitter/X thread hooks that grab attention and boost engagement.',
    'category' => 'marketing-tools',
    'icon' => 'fa-solid fa-fire',
    'handler' => 'SocialHandler',
    'action' => 'threadHook',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'tiktok-idea-generator' => 
  array (
    'title' => 'TikTok Idea Generator',
    'desc' => 'Generate trending TikTok video ideas, scripts, and hashtags for your niche.',
    'category' => 'marketing-tools',
    'icon' => 'fa-brands fa-tiktok',
    'handler' => 'SocialHandler',
    'action' => 'tiktokIdea',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'youtube-video-rank-checker' => 
  array (
    'title' => 'YouTube Video Rank Checker',
    'desc' => 'Analyze your YouTube video SEO score and get optimization suggestions for better rankings.',
    'category' => 'seo-tools',
    'icon' => 'fa-brands fa-youtube',
    'handler' => 'SeoHandler',
    'action' => 'ytRankChecker',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'blur-face-in-image' => 
  array (
    'title' => 'Blur Face In Image',
    'desc' => 'Automatically detect and blur faces in photos for privacy protection using AI face detection.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-user-secret',
    'handler' => 'ImageHandler',
    'action' => 'blurFace',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'dpi-converter' => 
  array (
    'title' => 'DPI Converter',
    'desc' => 'Change the DPI/PPI resolution of any image for print or web use without quality loss.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-expand',
    'handler' => 'ImageHandler',
    'action' => 'dpiConverter',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'gif-maker' => 
  array (
    'title' => 'GIF Maker',
    'desc' => 'Create animated GIFs from multiple images with custom speed, size, and loop settings.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-film',
    'handler' => 'ImageHandler',
    'action' => 'gifMaker',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'heic-to-jpg-converter' => 
  array (
    'title' => 'HEIC to JPG Converter',
    'desc' => 'Convert Apple HEIC/HEIF photos to JPG format instantly in your browser. Batch support included.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-image',
    'handler' => 'ImageHandler',
    'action' => 'heicToJpg',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'image-exif-data-viewer' => 
  array (
    'title' => 'Image EXIF Data Viewer',
    'desc' => 'View detailed EXIF metadata from any photo including camera settings, GPS location, and timestamps.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-circle-info',
    'handler' => 'ImageHandler',
    'action' => 'exifDataViewer',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'image-splitter' => 
  array (
    'title' => 'Image Splitter',
    'desc' => 'Split any image into a grid of equal parts for Instagram carousels, puzzles, or printing.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-table-cells',
    'handler' => 'ImageHandler',
    'action' => 'imageSplitter',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'image-upscaler' => 
  array (
    'title' => 'Image Upscaler',
    'desc' => 'Upscale and enhance low-resolution images using advanced interpolation algorithms.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-up-right-and-down-left-from-center',
    'handler' => 'ImageHandler',
    'action' => 'imageUpscaler',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'image-to-pdf-converter' => 
  array (
    'title' => 'Image To PDF Converter',
    'desc' => 'Convert multiple images into a single PDF document instantly and securely in your browser.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-file-pdf',
    'handler' => 'PdfHandler',
    'action' => 'imageToPdf',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'csv-to-pdf-table' => 
  array (
    'title' => 'CSV To PDF Table',
    'desc' => 'Convert raw CSV data into styled, paginated PDF tables with customizable formatting.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-table',
    'handler' => 'PdfHandler',
    'action' => 'csvToPdf',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'epub-to-pdf-converter' => 
  array (
    'title' => 'Epub To PDF Converter',
    'desc' => 'Convert EPUB ebooks to highly readable PDF documents with custom typography settings.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-book',
    'handler' => 'PdfHandler',
    'action' => 'epubToPdf',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'extract-images-from-pdf' => 
  array (
    'title' => 'Extract Images From PDF',
    'desc' => 'Extract all embedded image files from PDF documents in high resolution without quality loss.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-images',
    'handler' => 'PdfHandler',
    'action' => 'extractPdfImages',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'flatten-pdf-tool' => 
  array (
    'title' => 'Flatten PDF Tool',
    'desc' => 'Permanently flatten PDF form fields, annotations, and layers into a secure, non-editable document.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-layer-group',
    'handler' => 'PdfHandler',
    'action' => 'flattenPdf',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'pdf-redaction-tool' => 
  array (
    'title' => 'PDF Redaction Tool',
    'desc' => 'Securely black-out and permanently redact sensitive text and areas from PDF documents.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-marker',
    'handler' => 'PdfHandler',
    'action' => 'redactPdf',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'pdf-text-extractor' => 
  array (
    'title' => 'PDF Text Extractor',
    'desc' => 'Extract selectable text from PDF documents while preserving structure and formatting.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-file-lines',
    'handler' => 'PdfHandler',
    'action' => 'extractPdfText',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'pdf-to-html-converter' => 
  array (
    'title' => 'PDF To HTML Converter',
    'desc' => 'Convert PDF files to clean HTML code with embedded images and layout preservation.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-code',
    'handler' => 'PdfHandler',
    'action' => 'pdfToHtml',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'pdf-to-image-extractor' => 
  array (
    'title' => 'PDF To Image Extractor',
    'desc' => 'Render and extract pages from a PDF document as high-quality PNG or JPEG image files.',
    'category' => 'pdf-tools',
    'icon' => 'fa-solid fa-file-image',
    'handler' => 'PdfHandler',
    'action' => 'pdfToImage',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'compare-two-documents' => 
  array (
    'title' => 'Compare Two Documents Tool',
    'desc' => 'Analyze and visually compare two text documents side-by-side to highlight differences and edits.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-not-equal',
    'handler' => 'DevHandler',
    'action' => 'compareDocs',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file1',
        'type' => 'file',
        'label' => 'Document 1',
        'required' => true,
      ),
      1 => 
      array (
        'name' => 'file2',
        'type' => 'file',
        'label' => 'Document 2',
        'required' => true,
      ),
    ),
  ),
  'profile-picture-maker' => 
  array (
    'title' => 'Profile Picture Maker',
    'desc' => 'Create professional, perfectly cropped profile pictures with custom borders and backgrounds.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-user-circle',
    'handler' => 'DevHandler',
    'action' => 'profilePicMaker',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'sprite-sheet-maker' => 
  array (
    'title' => 'Sprite Sheet Maker',
    'desc' => 'Automatically pack multiple images into an optimized sprite sheet with generated CSS code.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-th',
    'handler' => 'DevHandler',
    'action' => 'spriteSheetMaker',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'svg-to-png-converter' => 
  array (
    'title' => 'SVG To PNG Converter',
    'desc' => 'Convert scalable vector graphics (SVG) into high-resolution PNG raster images up to 8K.',
    'category' => 'image-tools',
    'icon' => 'fa-solid fa-vector-square',
    'handler' => 'DevHandler',
    'action' => 'svgToPng',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'video-to-audio-extractor' => 
  array (
    'title' => 'Video To Audio Extractor',
    'desc' => 'Extract high-quality audio tracks (MP3/WAV) from video files directly in your browser.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-file-audio',
    'handler' => 'DevHandler',
    'action' => 'videoToAudio',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'excel-to-html-converter' => 
  array (
    'title' => 'Excel To HTML Converter',
    'desc' => 'Convert Excel spreadsheets (.xlsx, .xls) into clean, stylable HTML tables instantly.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-table-list',
    'handler' => 'DevHandler',
    'action' => 'excelToHtml',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'email-breach-checker' => 
  array (
    'title' => 'Email Breach Checker',
    'desc' => 'Perform a secure, k-anonymity check to see if your email address was exposed in data breaches.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-shield-virus',
    'handler' => 'DevHandler',
    'action' => 'emailBreach',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'git-commit-message-generator' => 
  array (
    'title' => 'Git Commit Message Generator',
    'desc' => 'Standardize your repo history by generating formatted Conventional Commits messages.',
    'category' => 'developer-tools',
    'icon' => 'fa-brands fa-git-alt',
    'handler' => 'DevHandler',
    'action' => 'gitCommitMsg',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'vcf-file-generator' => 
  array (
    'title' => 'VCF File Generator',
    'desc' => 'Generate and download rich vCard contact files (VCF) optimized with embedded QR codes.',
    'category' => 'utility-tools',
    'icon' => 'fa-solid fa-address-book',
    'handler' => 'DevHandler',
    'action' => 'vcfGen',

    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'qr-code-generator' => 
  array (
    'title' => 'QR Code Generator',
    'desc' => 'Create custom, high-quality QR codes for URLs, text, and Wi-Fi.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-qrcode',
    'handler' => 'DevHandler',
    'action' => 'qrGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'color-palette-generator' => 
  array (
    'title' => 'Color Palette Generator',
    'desc' => 'Generate harmonious color schemes for your next web project.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-swatchbook',
    'handler' => 'DevHandler',
    'action' => 'paletteGen',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'count',
        'type' => 'number',
        'label' => 'Quantity / Count',
        'value' => '1',
        'required' => false,
      ),
    ),
  ),
  'json-formatter' => 
  array (
    'title' => 'JSON Formatter (Pro)',
    'desc' => 'Clean, format, and validate JSON data with syntax highlighting and tree view.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-indent',
    'handler' => 'DevHandler',
    'action' => 'jsonFormatter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'js-beautifier' => 
  array (
    'title' => 'JavaScript Beautifier',
    'desc' => 'Restore readability to minified JS/TS code with customizable formatting rules.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-wand-magic-sparkles',
    'handler' => 'DevHandler',
    'action' => 'jsBeautifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'image-to-base64' => 
  array (
    'title' => 'Image to Base64 Encoder',
    'desc' => 'Convert local images into Base64 strings or Data URIs for source code embedding.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-code',
    'handler' => 'DevHandler',
    'action' => 'imageToBase64',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'image',
        'type' => 'file',
        'label' => 'Upload Image',
        'required' => true,
      ),
    ),
  ),
  'hex-to-string' => 
  array (
    'title' => 'HEX to String Converter (Pro)',
    'desc' => 'Instantly convert hexadecimal character codes into human-readable plain text strings.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-code',
    'handler' => 'DevHandler',
    'action' => 'hexToString',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'string-to-hex' => 
  array (
    'title' => 'String to HEX Converter (Pro)',
    'desc' => 'Encode plain text strings into their hexadecimal character code equivalents instantly.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-file-code',
    'handler' => 'DevHandler',
    'action' => 'stringToHex',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'sql-minifier' => 
  array (
    'title' => 'SQL Minifier (Pro)',
    'desc' => 'Compress multi-line database queries into a single string by removing comments and whitespace.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-compress',
    'handler' => 'DevHandler',
    'action' => 'sqlMinifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'yaml-validator' => 
  array (
    'title' => 'YAML Validator (Pro)',
    'desc' => 'Instantly validate, format, and debug structural errors in your YAML configuration files.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-list-check',
    'handler' => 'DevHandler',
    'action' => 'yamlValidator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'json-minifier' => 
  array (
    'title' => 'JSON Minifier (Pro)',
    'desc' => 'Compress JSON payloads by removing all unnecessary whitespace and line breaks instantly.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-code',
    'handler' => 'DevHandler',
    'action' => 'jsonMinifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'xml-minifier' => 
  array (
    'title' => 'XML Minifier (Pro)',
    'desc' => 'Compress vast XML documents by stripping spacing, tabs, and comments on the fly.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-file-code',
    'handler' => 'DevHandler',
    'action' => 'xmlMinifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'css-beautifier' => 
  array (
    'title' => 'CSS Beautifier (Pro)',
    'desc' => 'Instantly format, align, and organize messy Cascading Style Sheets into highly readable syntax.',
    'category' => 'developer-tools',
    'icon' => 'fa-brands fa-css3-alt',
    'handler' => 'DevHandler',
    'action' => 'cssBeautifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'html-beautifier' => 
  array (
    'title' => 'HTML Beautifier (Pro)',
    'desc' => 'Clean up messy, minified, or unindented HTML structures back into highly readable XML/HTML trees.',
    'category' => 'developer-tools',
    'icon' => 'fa-brands fa-html5',
    'handler' => 'DevHandler',
    'action' => 'htmlBeautifier',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'jwt-generator' => 
  array (
    'title' => 'JWT Generator (Pro)',
    'desc' => 'Create and sign secure JSON Web Tokens locally using custom payloads, secrets, and expiration algorithms.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-key',
    'handler' => 'DevHandler',
    'action' => 'jwtGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'regex-tester' => 
  array (
    'title' => 'Regex Tester (Pro)',
    'desc' => 'Test, debug, and execute complex PCRE/JS Regular Expressions directly within your browser.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-magnifying-glass-text',
    'handler' => 'DevHandler',
    'action' => 'regexTester',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'sql-validator' => 
  array (
    'title' => 'SQL Syntax Validator (Pro)',
    'desc' => 'Instantly parse and validate raw database queries for architectural syntax errors before executing them.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-database',
    'handler' => 'DevHandler',
    'action' => 'sqlValidator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'unix-timestamp-converter' => 
  array (
    'title' => 'Unix Timestamp Converter (Pro)',
    'desc' => 'Instantly convert epoch timestamps to human-readable dates, or parse date strings into precise seconds.',
    'category' => 'developer-tools',
    'icon' => 'fa-regular fa-clock',
    'handler' => 'DevHandler',
    'action' => 'unixTimestampConverter',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'rsa-key-generator' => 
  array (
    'title' => 'RSA Key Pair Generator (Pro)',
    'desc' => 'Securely generate 2048-bit and 4096-bit asymmetric public/private cryptographic key pairs locally.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-key',
    'handler' => 'SecurityHandler',
    'action' => 'rsaKeyGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
  'file-hash-calculator' => 
  array (
    'title' => 'File Hash Calculator (Pro)',
    'desc' => 'Verify data integrity by calculating MD5, SHA-1, SHA-256, and SHA-512 cryptographic digests locally.',
    'category' => 'security-tools',
    'icon' => 'fa-solid fa-file-shield',
    'handler' => 'SecurityHandler',
    'action' => 'fileHashCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'file',
        'type' => 'file',
        'label' => 'Upload File',
        'required' => true,
      ),
    ),
  ),
  'curl-command-generator' => 
  array (
    'title' => 'cURL Command Generator (Pro)',
    'desc' => 'Visually architect, configure, and generate complex command-line HTTP requests with custom headers and payloads.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-terminal',
    'handler' => 'DevHandler',
    'action' => 'curlCommandGenerator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'text',
        'label' => 'Enter Input',
        'placeholder' => 'Enter value...',
        'required' => true,
      ),
    ),
  ),
  'aspect-ratio-calculator' => 
  array (
    'title' => 'Aspect Ratio Calculator (Pro)',
    'desc' => 'Automatically identify the mathematical ratio of a resolution, or scale image dimensions proportionally.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-crop-simple',
    'handler' => 'DevHandler',
    'action' => 'aspectRatioCalculator',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'value',
        'type' => 'number',
        'label' => 'Enter Value',
        'placeholder' => 'Enter a number...',
        'required' => true,
      ),
    ),
  ),
  'text-diff-checker' => 
  array (
    'title' => 'Text Diff Checker (Pro)',
    'desc' => 'Visually compare two strings or codeblocks side-by-side to highlight insertions and deletions instantly.',
    'category' => 'developer-tools',
    'icon' => 'fa-solid fa-code-compare',
    'handler' => 'DevHandler',
    'action' => 'textDiffChecker',
    'inputs' => 
    array (
      0 => 
      array (
        'name' => 'text',
        'type' => 'textarea',
        'label' => 'Enter Content',
        'placeholder' => 'Type or paste your content here...',
        'required' => true,
      ),
    ),
  ),
);
