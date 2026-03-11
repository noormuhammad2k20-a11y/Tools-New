<?php
// config/tools_registry.php

return [
    // --- TEXT TOOLS ---
    'word-counter' => [
        'title' => 'Word Counter',
        'desc' => 'Count words, characters, sentences, and paragraphs instantly without limits.',
        'category' => 'text-tools',
        'icon' => 'W',
        'handler' => 'TextHandler',
        'action' => 'wordCount',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Type or paste here...', 'required' => true]
        ]
    ],
    'uppercase-converter' => [
        'title' => 'Uppercase Converter',
        'desc' => 'Convert any text to ALL UPPERCASE letters instantly. Great for headlines and emphasis.',
        'category' => 'text-tools',
        'icon' => 'ABC',
        'handler' => 'TextHandler',
        'action' => 'uppercase',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Type text to convert...', 'required' => true]
        ]
    ],
    'lowercase-converter' => [
        'title' => 'Lowercase Converter',
        'desc' => 'Convert completely capitalized text into lowercase format easily.',
        'category' => 'text-tools',
        'icon' => 'abc',
        'handler' => 'TextHandler',
        'action' => 'lowercase',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Type text to convert...', 'required' => true]
        ]
    ],
    'reverse-text' => [
        'title' => 'Reverse Text Generator',
        'desc' => 'Mirror and reverse any text string from end to start.',
        'category' => 'text-tools',
        'icon' => '⇄',
        'handler' => 'TextHandler',
        'action' => 'reverse',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text to Reverse', 'placeholder' => 'abcd...', 'required' => true]
        ]
    ],
    'remove-extra-spaces' => [
        'title' => 'Remove Extra Spaces',
        'desc' => 'Clean up messy text by removing duplicate spaces and trim leading/trailing empty space.',
        'category' => 'text-tools',
        'icon' => '_',
        'handler' => 'TextHandler',
        'action' => 'removeSpaces',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Paste messy text here...', 'required' => true]
        ]
    ],

    // --- CATEGORY 1: TEXT & WRITING TOOLS (Client-Side) ---
    'ai-article-generator' => [
        'title' => 'AI Article Generator', 'desc' => 'Generate high-quality, long-form articles instantly with AI guidance.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-pen-fancy', 'handler' => 'TextHandler', 'action' => 'aiArticle'
    ],
    'ai-content-summarizer' => [
        'title' => 'AI Content Summarizer', 'desc' => 'Condense long articles and documents into concise, readable summaries.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-compress', 'handler' => 'TextHandler', 'action' => 'aiSummarizer'
    ],
    'ai-youtube-script-generator' => [
        'title' => 'AI YouTube Script Generator', 'desc' => 'Create engaging video scripts with hook, body, and call-to-action sections.',
        'category' => 'text-tools', 'icon' => 'fa-brands fa-youtube', 'handler' => 'TextHandler', 'action' => 'aiYoutube'
    ],
    'ai-text-humanizer' => [
        'title' => 'AI Text Humanizer', 'desc' => 'Transform robotic AI-generated text into natural, human-like prose.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-user-check', 'handler' => 'TextHandler', 'action' => 'aiHumanizer'
    ],
    'ai-paraphraser' => [
        'title' => 'AI Paraphraser', 'desc' => 'Rewrite sentences and paragraphs while maintaining the original meaning.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-sync', 'handler' => 'TextHandler', 'action' => 'aiParaphraser'
    ],
    'ai-grammar-checker' => [
        'title' => 'AI Grammar Checker', 'desc' => 'Professional-grade grammar and style analysis for flawless writing.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-spell-check', 'handler' => 'TextHandler', 'action' => 'aiGrammar'
    ],
    'chatgpt-mega-prompt-generator' => [
        'title' => 'ChatGPT Mega Prompt Generator', 'desc' => 'Create ultra-detailed prompts for better AI responses.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-bolt', 'handler' => 'TextHandler', 'action' => 'aiPrompt'
    ],
    'midjourney-prompt-generator' => [
        'title' => 'Midjourney Prompt Generator', 'desc' => 'Generate detailed descriptive prompts for AI image creation.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-palette', 'handler' => 'TextHandler', 'action' => 'midjourneyPrompt'
    ],
    'ai-image-generator' => [
        'title' => 'AI Image Generator', 'desc' => 'Create stunning visuals from simple text descriptions.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-image', 'handler' => 'TextHandler', 'action' => 'aiImageGen'
    ],
    'ai-image-upscaler' => [
        'title' => 'AI Image Upscaler', 'desc' => 'Enhance image quality and resolution using advanced AI models.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-up-right-and-down-left-from-center', 'handler' => 'TextHandler', 'action' => 'aiUpscale'
    ],
    'ai-background-remover' => [
        'title' => 'AI Background Remover', 'desc' => 'Instantly remove backgrounds from images with professional precision.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-scissors', 'handler' => 'TextHandler', 'action' => 'aiBgRemove'
    ],
    'ai-code-explainer' => [
        'title' => 'AI Code Explainer', 'desc' => 'Deconstruct complex code snippets into simple, understandable logic.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-code', 'handler' => 'TextHandler', 'action' => 'aiCodeExplain'
    ],
    'palindrome-checker' => [
        'title' => 'Palindrome Checker', 'desc' => 'Identify if a word, phrase, or sentence reads the same backward as forward.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-arrows-left-right', 'handler' => 'TextHandler', 'action' => 'palindrome'
    ],
    'character-frequency-analyzer' => [
        'title' => 'Character Frequency Analyzer', 'desc' => 'Detailed breakdown of how often each character appears in your text.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-chart-pie', 'handler' => 'TextHandler', 'action' => 'charFreq'
    ],
    'sentence-length-analyzer' => [
        'title' => 'Sentence Length Analyzer', 'desc' => 'Measure the length of individual sentences to gauge readability and flow.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-ruler-horizontal', 'handler' => 'TextHandler', 'action' => 'sentenceLength'
    ],
    'word-length-analyzer' => [
        'title' => 'Word Length Analyzer', 'desc' => 'Analyze the distribution of word lengths throughout your document.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-text-width', 'handler' => 'TextHandler', 'action' => 'wordLength'
    ],
    'random-word-generator' => [
        'title' => 'Random Word Generator', 'desc' => 'Generate a list of random words for brainstorming or creative writing.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-shuffle', 'handler' => 'TextHandler', 'action' => 'randomWord'
    ],
    'random-paragraph-generator' => [
        'title' => 'Random Paragraph Generator', 'desc' => 'Create random paragraphs of text to use as placeholders or inspiration.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-quote-left', 'handler' => 'TextHandler', 'action' => 'randomPara'
    ],
    'random-letter-generator' => [
        'title' => 'Random Letter Generator', 'desc' => 'Generate random individual letters or sequences.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-font', 'handler' => 'TextHandler', 'action' => 'randomLetter'
    ],
    'text-column-formatter' => [
        'title' => 'Text Column Formatter', 'desc' => 'Format plain text into neatly aligned columns.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-table-columns', 'handler' => 'TextHandler', 'action' => 'textColumn'
    ],
    'whitespace-visualizer' => [
        'title' => 'Whitespace Visualizer', 'desc' => 'See invisible characters like spaces, tabs, and line breaks.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-eye', 'handler' => 'TextHandler', 'action' => 'whiteSpace'
    ],
    'unicode-inspector' => [
        'title' => 'Unicode Inspector', 'desc' => 'Inspect the underlying Unicode values of every character in your text.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-circle-info', 'handler' => 'TextHandler', 'action' => 'unicode'
    ],
    'stop-words-remover' => [
        'title' => 'Stop Words Remover', 'desc' => 'Clean your text by removing common words like "the", "and", and "is".',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-filter', 'handler' => 'TextHandler', 'action' => 'stopWords'
    ],
    'slug-to-title-converter' => [
        'title' => 'Slug to Title Converter', 'desc' => 'Convert URL-friendly slugs back into readable titles.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-heading', 'handler' => 'TextHandler', 'action' => 'slugTitle'
    ],
    'list-randomizer' => [
        'title' => 'List Randomizer', 'desc' => 'Shuffle the items in any list to create a random order.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-list-ol', 'handler' => 'TextHandler', 'action' => 'listShuffle'
    ],
    'list-sorter' => [
        'title' => 'List Sorter', 'desc' => 'Sort text lines A to Z ascending alphabetically or numerically.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-arrow-down-a-z', 'handler' => 'TextHandler', 'action' => 'listSort'
    ],
    'list-reverse-tool' => [
        'title' => 'List Reverse Tool', 'desc' => 'Invert the order of items in any given list.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-backward-step', 'handler' => 'TextHandler', 'action' => 'listReverse'
    ],
    'list-deduplicator' => [
        'title' => 'List Deduplicator', 'desc' => 'Instantly remove duplicate items from any list or collection.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-wand-sparkles', 'handler' => 'TextHandler', 'action' => 'listDedupe'
    ],
    'list-to-json-converter' => [
        'title' => 'List to JSON Converter', 'desc' => 'Transform plain line-separated lists into structured JSON arrays.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-file-code', 'handler' => 'TextHandler', 'action' => 'listToJson'
    ],
    'csv-to-json-converter' => [
        'title' => 'CSV to JSON Converter', 'desc' => 'Convert tabulated CSV data into structured JSON objects.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-table-list', 'handler' => 'TextHandler', 'action' => 'csvToJson'
    ],
    'json-to-csv-converter' => [
        'title' => 'JSON to CSV Converter', 'desc' => 'Convert nested JSON data arrays into standard CSV format.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-file-csv', 'handler' => 'TextHandler', 'action' => 'jsonToCsv'
    ],
    'word-counter' => [
        'title' => 'Word Counter Pro', 'desc' => 'Advanced text metrics including reading time, syllable count and keyword density.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-hashtag', 'handler' => 'TextHandler', 'action' => 'wordCount',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Paste your text here...', 'required' => true]]
    ],
    'case-converter' => [
        'title' => 'Case Converter Pro', 'desc' => 'Switch between common programming and writing cases instantly.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-font-case', 'handler' => 'TextHandler', 'action' => 'caseConvert'
    ],
    'lorem-ipsum-generator' => [
        'title' => 'Lorem Ipsum Generator (Advanced)', 'desc' => 'Generate custom placeholder text with HTML tag support.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-paragraph', 'handler' => 'TextHandler', 'action' => 'loremIpsum'
    ],
    'text-to-binary-hex' => [
        'title' => 'Text to Binary/Hex/Octal', 'desc' => 'Encode text into machine-readable binary, hex, or octal strings.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-microchip', 'handler' => 'TextHandler', 'action' => 'textToMachine'
    ],
    'binary-hex-to-text' => [
        'title' => 'Binary/Hex to Text', 'desc' => 'Decode machine data (Binary, Hex, Octal) back to human-readable text.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-user-gear', 'handler' => 'TextHandler', 'action' => 'machineToText'
    ],
    'base64-encoder-decoder' => [
        'title' => 'Base64 Encoder/Decoder', 'desc' => 'Convert text to Base64 format and back, with URL-safe support.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-shield-halved', 'handler' => 'TextHandler', 'action' => 'base64'
    ],
    'url-encoder-decoder' => [
        'title' => 'URL Encoder/Decoder', 'desc' => 'Precisely encode or decode URL parameters for web compatibility.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-link', 'handler' => 'TextHandler', 'action' => 'urlEncDec'
    ],
    'html-entity-encoder-decoder' => [
        'title' => 'HTML Entity Encoder/Decoder', 'desc' => 'Convert special characters to HTML entities for security and rendering.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-code-compare', 'handler' => 'TextHandler', 'action' => 'htmlEntities'
    ],
    'text-reverser' => [
        'title' => 'Text Reverser Pro', 'desc' => 'Instantly flip characters, words, or lines for creative styling.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-arrows-rotate', 'handler' => 'TextHandler', 'action' => 'textReverse'
    ],
    'upside-down-text' => [
        'title' => 'Upside Down Text', 'desc' => 'Flip your name or any text upside down using Unicode characters.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-rotate-left', 'handler' => 'TextHandler', 'action' => 'upsideDown'
    ],
    'old-english-text' => [
        'title' => 'Old English Text Generator', 'desc' => 'Transform modern text into majestic Gothic and Fraktur styles.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-feather-pointed', 'handler' => 'TextHandler', 'action' => 'oldEnglish'
    ],
    'cursive-text-generator' => [
        'title' => 'Cursive Text Generator', 'desc' => 'Convert standard text into elegant script and calligraphy styles.',
        'category' => 'text-tools', 'icon' => 'fa-solid fa-signature', 'handler' => 'TextHandler', 'action' => 'cursiveText'
    ],
    'css-filter-generator' => [
        'title' => 'CSS Filter Generator', 'desc' => 'Apply grayscale, blur, sepia and other visual effects to images using CSS filters.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-wand-magic-sparkles', 'handler' => 'TextHandler', 'action' => 'cssFilter'
    ],
    'css-clip-path-maker' => [
        'title' => 'CSS Clip-path Maker', 'desc' => 'Create complex shapes and clip-paths visually with drag-and-drop support.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-shapes', 'handler' => 'TextHandler', 'action' => 'cssClipPath'
    ],
    'json-schema-generator' => [
        'title' => 'JSON Schema Generator', 'desc' => 'Automatically generate valid JSON Schema draft-07 from your JSON data.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-sitemap', 'handler' => 'TextHandler', 'action' => 'jsonSchema'
    ],
    'curl-to-code-converter' => [
        'title' => 'Curl to Code Converter', 'desc' => 'Transform cURL commands into JavaScript, PHP, Python, and Go code snippets.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-terminal', 'handler' => 'TextHandler', 'action' => 'curlToCode'
    ],

    // --- DEVELOPER TOOLS ---
    'base64-encode' => [
        'title' => 'Base64 Encoder',
        'desc' => 'Encode strings into Base64 format securely. Standard web safe encoding tool.',
        'category' => 'developer-tools',
        'icon' => '64↑',
        'handler' => 'DevHandler',
        'action' => 'base64encode',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'String to Encode', 'placeholder' => 'Plain text...', 'required' => true]
        ]
    ],
    'base64-decode' => [
        'title' => 'Base64 Decoder',
        'desc' => 'Decode Base64 strings back to normal text string payload instantly.',
        'category' => 'developer-tools',
        'icon' => '64↓',
        'handler' => 'DevHandler',
        'action' => 'base64decode',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Base64 String', 'placeholder' => 'aGVsbG8...', 'required' => true]
        ]
    ],
    'url-encoder' => [
        'title' => 'URL Encoder',
        'desc' => 'Encode URLs and parameters to be web safe by escaping special characters.',
        'category' => 'developer-tools',
        'icon' => '🔗↑',
        'handler' => 'DevHandler',
        'action' => 'urlencode',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'String to encode', 'required' => true]
        ]
    ],
    'url-decoder' => [
        'title' => 'URL Decoder',
        'desc' => 'Reverse an encoded URL back to its human readable format.',
        'category' => 'developer-tools',
        'icon' => '🔗↓',
        'handler' => 'DevHandler',
        'action' => 'urldecode',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Encoded String', 'required' => true]
        ]
    ],
    'md5-generator' => [
        'title' => '[Ultra Bst Pro] MD5 Hash Generator',
        'desc' => 'Generate MD5 cryptographic hashes from any input string.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-hashtag',
        'handler' => 'DevHandler',
        'action' => 'md5',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Input String', 'required' => true]
        ]
    ],
    'sha1-generator' => [
        'title' => '[Ultra Bst Pro] SHA-1 Hash Generator',
        'desc' => 'Generate secure SHA-1 hashes from any string or secret.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-shield-halved',
        'handler' => 'DevHandler',
        'action' => 'sha1',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Input String', 'required' => true]
        ]
    ],
    'sha256-generator' => [
        'title' => '[Ultra Bst Pro] SHA-256 Hash Generator',
        'desc' => 'Generate ultra-secure SHA-256 hashes from strings.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-lock',
        'handler' => 'DevHandler',
        'action' => 'sha256',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Input String', 'required' => true]
        ]
    ],
    'uuid-generator' => [
        'title' => 'UUID v4 Generator',
        'desc' => 'Generate universally unique identifiers (UUID v4) for databases and systems.',
        'category' => 'developer-tools',
        'icon' => 'ID',
        'handler' => 'DevHandler',
        'action' => 'uuid',
        'inputs' => [] // No inputs required
    ],
    'jwt-decoder' => [
        'title' => '[Ultra Bst Pro] JWT Decoder',
        'desc' => 'Decode and parse JSON Web Tokens (JWT) safely to read their payload headers and claims without signature verification.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-user-secret',
        'handler' => 'DevHandler',
        'action' => 'jwtDecoder',
        'inputs' => [
            ['name' => 'token', 'type' => 'textarea', 'label' => 'JWT Token String', 'placeholder' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...', 'required' => true]
        ]
    ],
    'bcrypt-generator' => [
        'title' => '[Ultra Bst Pro] Bcrypt Hash Generator',
        'desc' => 'Generate cryptographically secure Bcrypt hashes with a configurable algorithmic cost factor.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-vault',
        'handler' => 'DevHandler',
        'action' => 'bcrypt',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Input String / Password', 'required' => true],
            ['name' => 'cost', 'type' => 'number', 'label' => 'Cost Factor (4-31)', 'value' => '10', 'required' => true]
        ]
    ],
    'json-to-csv' => [
        'title' => 'JSON to CSV Converter',
        'desc' => 'Convert flat or nested JSON data arrays seamlessly into Comma Separated Values (CSV).',
        'category' => 'developer-tools',
        'icon' => '{,}→',
        'handler' => 'DevHandler',
        'action' => 'jsonToCsv',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Valid JSON Data', 'placeholder' => '[{"id":1,"name":"John"}]', 'required' => true]
        ]
    ],
    'csv-to-json' => [
        'title' => 'CSV to JSON Converter',
        'desc' => 'Transform tabulated Comma Separated Values (CSV) data formats into structured JSON arrays.',
        'category' => 'developer-tools',
        'icon' => '→{,}',
        'handler' => 'DevHandler',
        'action' => 'csvToJson',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Valid CSV Data', 'placeholder' => "id,name\n1,John\n2,Jane", 'required' => true]
        ]
    ],
    'sql-formatter' => [
        'title' => 'SQL Formatter',
        'desc' => 'Beautify and indent raw database SQL queries to make them readable and standard-compliant.',
        'category' => 'developer-tools',
        'icon' => 'SQL',
        'handler' => 'DevHandler',
        'action' => 'sqlFormatter',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Raw SQL Query', 'placeholder' => 'SELECT * FROM users WHERE active = 1', 'required' => true]
        ]
    ],
    'color-contrast-checker' => [
        'title' => 'Color Contrast Checker',
        'desc' => 'Calculate WCAG accessibility ratio between background and foreground colors to ensure readability.',
        'category' => 'developer-tools',
        'icon' => '🎨✅',
        'handler' => 'DevHandler',
        'action' => 'colorContrast',
        'inputs' => [
            ['name' => 'bg', 'type' => 'color', 'label' => 'Background Color', 'value' => '#ffffff', 'required' => true],
            ['name' => 'fg', 'type' => 'color', 'label' => 'Foreground Text Color', 'value' => '#000000', 'required' => true]
        ]
    ],

    // --- MATH TOOLS ---
    'percentage-calculator' => [
        'title' => 'Percentage Calculator',
        'desc' => 'Calculate percentages effortlessly. Figure out what percent one value is of another.',
        'category' => 'math-calculators',
        'icon' => '%',
        'handler' => 'MathHandler',
        'action' => 'percentage',
        'inputs' => [
            ['name' => 'value', 'type' => 'number', 'label' => 'What is', 'placeholder' => '20', 'required' => true],
            ['name' => 'total', 'type' => 'number', 'label' => '% of', 'placeholder' => '100', 'required' => true]
        ]
    ],
    'margin-calculator' => [
        'title' => 'Margin Calculator',
        'desc' => 'Calculate gross profit margin, markup percentage, and revenue.',
        'category' => 'finance-calculators',
        'icon' => '$',
        'handler' => 'MathHandler',
        'action' => 'margin',
        'inputs' => [
            ['name' => 'cost', 'type' => 'number', 'label' => 'Cost ($)', 'placeholder' => '100', 'required' => true],
            ['name' => 'revenue', 'type' => 'number', 'label' => 'Revenue ($)', 'placeholder' => '150', 'required' => true]
        ]
    ],

    // --- GENERATORS ---
    'password-generator' => [
        'title' => '[Ultra Bst Pro] Strong Password Generator',
        'desc' => 'Generate highly secure, random passwords protecting against brute force attacks.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-key',
        'handler' => 'GeneratorHandler',
        'action' => 'password',
        'inputs' => [
            ['name' => 'length', 'type' => 'number', 'label' => 'Length', 'value' => '16', 'required' => true]
        ]
    ],
    'bip39-seed-generator' => [
        'title' => '[Ultra Bst Pro] BIP39 Seed Phrase Generator',
        'desc' => 'Generate cryptographically secure 12 or 24-word BIP39 mnemonic recovery phrases.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-phrase-list',
        'handler' => 'GeneratorHandler',
        'action' => 'bip39',
        'inputs' => [
            ['name' => 'words', 'type' => 'number', 'label' => 'Phrase Length (12 or 24)', 'value' => '12', 'required' => true]
        ]
    ],

    // --- PREMIUM TEXT TOOLS ---
    'grammar-checker-pro' => [
        'title' => 'Grammar Checker PRO', 'desc' => 'Advanced AI-powered style and grammar analysis for professional writing.', 'category' => 'text-tools', 'icon' => '✍️', 'handler' => 'TextHandler', 'action' => 'grammarChecker',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Paste your draft here...', 'required' => true]]
    ],
    'advanced-sentiment-analyzer' => [
        'title' => 'Sentiment Analyzer', 'desc' => 'Deep linguistic analysis to detect emotional tone and intensity of text.', 'category' => 'text-tools', 'icon' => '🧠', 'handler' => 'TextHandler', 'action' => 'advancedSentiment',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Customer feedback or social posts...', 'required' => true]]
    ],
    'readability-hub-pro' => [
        'title' => 'Readability Score', 'desc' => 'Comprehensive scoring using Flesch-Kincaid and Gunning Fog indexes.', 'category' => 'text-tools', 'icon' => '📖', 'handler' => 'TextHandler', 'action' => 'readabilityHub',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Min. 100 characters...', 'required' => true]]
    ],
    'keyword-density-checker-seo' => [
        'title' => 'Keyword Density', 'desc' => 'SEO-focused n-gram analyzer for 1, 2, and 3-word phrase frequency.', 'category' => 'text-tools', 'icon' => '📈', 'handler' => 'TextHandler', 'action' => 'advancedKeywordDensity',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Content', 'placeholder' => 'Article text for SEO analysis...', 'required' => true]]
    ],
    'case-converter-premium' => [
        'title' => 'Case Converter PRO', 'desc' => 'Switch between common programming and writing cases instantly.', 'category' => 'text-tools', 'icon' => 'Aa', 'handler' => 'TextHandler', 'action' => 'caseConverterPro',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Input Text', 'required' => true],
            ['name' => 'type', 'type' => 'cards', 'label' => 'Select Target Case', 'value' => 'sentence', 'options' => [
                'sentence' => ['title' => 'Sentence', 'icon' => 'Aa', 'desc' => 'Upper first char'],
                'title' => ['title' => 'Title', 'icon' => 'AB', 'desc' => 'Capitalize Every Word'],
                'camel' => ['title' => 'camelCase', 'icon' => 'cC', 'desc' => 'Variable style'],
                'pascal' => ['title' => 'Pascal', 'icon' => 'PC', 'desc' => 'Class style'],
                'snake' => ['title' => 'snake_case', 'icon' => 's_c', 'desc' => 'Database style'],
                'kebab' => ['title' => 'kebab-case', 'icon' => 'k-c', 'desc' => 'URL style']
            ], 'required' => true]
        ]
    ],

    // --- PREMIUM IMAGE TOOLS ---
    'image-resizer-pro' => [
        'title' => '[Ultra Bst Pro] Advanced Image Resizer', 'desc' => 'Resize Any Image Online — Free & Instant. Choose custom dimensions and format.', 'category' => 'image-tools', 'icon' => 'fa-solid fa-expand', 'handler' => 'ImageHandler', 'action' => 'imageResizer',
        'inputs' => []
    ],
    'batch-image-compressor' => [
        'title' => 'Batch Image Compressor', 'desc' => 'Compress multiple images at once to WebP format for maximum efficiency.', 'category' => 'image-tools', 'icon' => '📁', 'handler' => 'ImageHandler', 'action' => 'batchCompressor',
        'inputs' => [
            ['name' => 'images', 'type' => 'file', 'label' => 'Select Images', 'multiple' => true, 'required' => true],
            ['name' => 'quality', 'type' => 'number', 'label' => 'Quality (1-100)', 'value' => '70', 'required' => true]
        ]
    ],
    'color-palette-extractor' => [
        'title' => 'Color Palette Extractor', 'desc' => 'Upload an image to extract its primary color palette as hex codes.', 'category' => 'image-tools', 'icon' => '🎨', 'handler' => 'ImageHandler', 'action' => 'paletteExtractor',
        'inputs' => [['name' => 'image', 'type' => 'file', 'label' => 'Upload Image', 'required' => true]]
    ],
    'image-filter-pro' => [
        'title' => 'Advanced Image Filters', 'desc' => 'Apply high-quality filters to your photos instantly using GPU-ready effects.', 'category' => 'image-tools', 'icon' => '🎭', 'handler' => 'ImageHandler', 'action' => 'imageFilterPro',
        'inputs' => [
            ['name' => 'image', 'type' => 'file', 'label' => 'Upload Image', 'required' => true],
            ['name' => 'filter', 'type' => 'cards', 'label' => 'Select Filter', 'value' => 'grayscale', 'options' => [
                'grayscale' => ['title' => 'B&W', 'icon' => '📷', 'desc' => 'Noir Style'],
                'sepia' => ['title' => 'Sepia', 'icon' => '📜', 'desc' => 'Vintage Era'],
                'invert' => ['title' => 'Invert', 'icon' => '🌓', 'desc' => 'Negative'],
                'blur' => ['title' => 'Blur', 'icon' => '🌫', 'desc' => 'Soft Focus'],
                'brightness' => ['title' => 'Glow', 'icon' => '☀️', 'desc' => 'Extra Bright']
            ], 'required' => true]
        ]
    ],

    // --- PREMIUM DEV TOOLS ---
    'syntax-highlighter-pro' => [
        'title' => 'Syntax Highlighter', 'desc' => 'Beautifully highlight your code with Pro themes and line numbering.', 'category' => 'developer-tools', 'icon' => '🌈', 'handler' => 'DevHandler', 'action' => 'syntaxHighlighter',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Paste Code', 'placeholder' => 'System.out.println("Hello World");', 'required' => true, 'class' => 'codemirror-js'],
            ['name' => 'lang', 'type' => 'cards', 'label' => 'Select Language', 'value' => 'javascript', 'options' => [
                'javascript' => ['title' => 'JS', 'icon' => 'JS', 'desc' => 'JavaScript'],
                'php' => ['title' => 'PHP', 'icon' => '🐘', 'desc' => 'PHP'],
                'python' => ['title' => 'Py', 'icon' => '🐍', 'desc' => 'Python'],
                'html' => ['title' => 'HTML', 'icon' => '<>', 'desc' => 'HTML5'],
                'css' => ['title' => 'CSS', 'icon' => '{}', 'desc' => 'CSS3'],
                'sql' => ['title' => 'SQL', 'icon' => 'DB', 'desc' => 'MySQL/Postgre']
            ], 'required' => true]
        ]
    ],
    'advanced-regex-tester' => [
        'title' => 'Regex Tester PRO', 'desc' => 'Instant regex testing with match highlighting and group capture.', 'category' => 'developer-tools', 'icon' => '🔍', 'handler' => 'DevHandler', 'action' => 'regexTester',
        'inputs' => [
            ['name' => 'regex', 'type' => 'text', 'label' => 'Regular Expression', 'placeholder' => '[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,}', 'required' => true],
            ['name' => 'flags', 'type' => 'text', 'label' => 'Flags (g, i, m)', 'value' => 'g', 'required' => true],
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Test String', 'placeholder' => 'Enter text to test against...', 'required' => true]
        ]
    ],

    // --- PREMIUM FINANCE TOOLS ---
    'emi-calculator-pro' => [
        'title' => 'EMI Calculator PRO', 'desc' => 'Interactive loan calculator with principal vs interest breakdown charts.', 'category' => 'finance-tools', 'icon' => '📉', 'handler' => 'FinanceHandler', 'action' => 'emiPro',
        'inputs' => [
            ['name' => 'p', 'type' => 'number', 'label' => 'Loan Amount', 'value' => '100000', 'required' => true],
            ['name' => 'r', 'type' => 'number', 'label' => 'Interest Rate (%)', 'value' => '10.5', 'required' => true],
            ['name' => 'n', 'type' => 'number', 'label' => 'Tenure (Months)', 'value' => '12', 'required' => true]
        ]
    ],
    'sip-calculator-pro' => [
        'title' => 'SIP Investment Planner', 'desc' => 'Calculate your future wealth with interactive compounding visualizations.', 'category' => 'finance-tools', 'icon' => '🚀', 'handler' => 'FinanceHandler', 'action' => 'sipCalculator',
        'inputs' => [
            ['name' => 'monthly', 'type' => 'number', 'label' => 'Monthly Investment', 'value' => '5000', 'required' => true],
            ['name' => 'rate', 'type' => 'number', 'label' => 'Expected Return (%)', 'value' => '12', 'required' => true],
            ['name' => 'years', 'type' => 'number', 'label' => 'Time Period (Years)', 'value' => '10', 'required' => true]
        ]
    ],

    // --- TEXT TOOLS (BATCH 1) ---
    'line-counter' => [
        'title' => 'Line Counter', 'desc' => 'Count the exact number of lines in a given text document.', 'category' => 'text-tools', 'icon' => '☰', 'handler' => 'TextHandler', 'action' => 'lineCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Data', 'required' => true]]
    ],
    'vowel-counter' => [
        'title' => 'Vowel Counter', 'desc' => 'Count total vowels (A, E, I, O, U) inside a string.', 'category' => 'text-tools', 'icon' => 'A', 'handler' => 'TextHandler', 'action' => 'vowelCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Data', 'required' => true]]
    ],
    'consonant-counter' => [
        'title' => 'Consonant Counter', 'desc' => 'Count absolute number of consonants in a string.', 'category' => 'text-tools', 'icon' => 'B', 'handler' => 'TextHandler', 'action' => 'consonantCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Data', 'required' => true]]
    ],
    'syllable-counter' => [
        'title' => 'Syllable Counter', 'desc' => 'Estimate the number of syllables in an English text block.', 'category' => 'text-tools', 'icon' => 'S', 'handler' => 'TextHandler', 'action' => 'syllableCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Data', 'required' => true]]
    ],
    'sentence-counter' => [
        'title' => 'Sentence Counter', 'desc' => 'Quickly determine exactly how many sentences are in your paragraph.', 'category' => 'text-tools', 'icon' => '.', 'handler' => 'TextHandler', 'action' => 'sentenceCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Data', 'required' => true]]
    ],
    'paragraph-counter' => [
        'title' => 'Paragraph Counter', 'desc' => 'Count the total number of paragraphs separated by line breaks.', 'category' => 'text-tools', 'icon' => 'P', 'handler' => 'TextHandler', 'action' => 'paragraphCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Data', 'required' => true]]
    ],
    'space-counter' => [
        'title' => 'Space Counter', 'desc' => 'Find exactly how many empty spaces exist in your string.', 'category' => 'text-tools', 'icon' => '_', 'handler' => 'TextHandler', 'action' => 'spaceCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Data', 'required' => true]]
    ],
    'title-case-converter' => [
        'title' => 'Title Case', 'desc' => 'Capitalize the first letter of every word (Title Case format).', 'category' => 'text-tools', 'icon' => 'Aa', 'handler' => 'TextHandler', 'action' => 'titleCase',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text to format', 'required' => true]]
    ],
    'camel-case-converter' => [
        'title' => 'Camel Case', 'desc' => 'Convert text to standard programmatic camelCase.', 'category' => 'text-tools', 'icon' => 'cC', 'handler' => 'TextHandler', 'action' => 'camelCase',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text to format', 'required' => true]]
    ],
    'snake-case-converter' => [
        'title' => 'Snake Case', 'desc' => 'Convert text to programmatic snake_case format.', 'category' => 'text-tools', 'icon' => 's_c', 'handler' => 'TextHandler', 'action' => 'snakeCase',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text to format', 'required' => true]]
    ],
    'pascal-case-converter' => [
        'title' => 'Pascal Case', 'desc' => 'Convert string to standard PascalCase string representation.', 'category' => 'text-tools', 'icon' => 'PC', 'handler' => 'TextHandler', 'action' => 'pascalCase',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text to format', 'required' => true]]
    ],
    'kebab-case-converter' => [
        'title' => 'Kebab Case', 'desc' => 'Parse text out into valid-url kebab-case-format.', 'category' => 'text-tools', 'icon' => 'k-c', 'handler' => 'TextHandler', 'action' => 'kebabCase',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text to format', 'required' => true]]
    ],
    'text-sorter' => [
        'title' => 'Text Sorter', 'desc' => 'Sort text lines A to Z ascending alphabetically.', 'category' => 'text-tools', 'icon' => 'A-Z', 'handler' => 'TextHandler', 'action' => 'textSorter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Lines to sort', 'required' => true]]
    ],
    'reverse-words' => [
        'title' => 'Reverse Words', 'desc' => 'Reverse the order of words in a sentence structure.', 'category' => 'text-tools', 'icon' => '⇄', 'handler' => 'TextHandler', 'action' => 'reverseWords',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text to reverse', 'required' => true]]
    ],
    'remove-empty-lines' => [
        'title' => 'Remove Empty Lines', 'desc' => 'Filter string and completely strip all blank empty line feeds.', 'category' => 'text-tools', 'icon' => '≡', 'handler' => 'TextHandler', 'action' => 'removeEmptyLines',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text', 'required' => true]]
    ],
    'remove-duplicate-words' => [
        'title' => 'Remove Duplicates', 'desc' => 'Extract a list containing only unique consecutive words.', 'category' => 'text-tools', 'icon' => '1', 'handler' => 'TextHandler', 'action' => 'removeDuplicateWords',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text', 'required' => true]]
    ],
    'extract-emails' => [
        'title' => 'Extract Emails', 'desc' => 'Find and extract all standard email addresses dumped in text.', 'category' => 'text-tools', 'icon' => '@', 'handler' => 'TextHandler', 'action' => 'extractEmails',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text Data', 'required' => true]]
    ],
    'find-and-replace' => [
        'title' => 'Find & Replace', 'desc' => 'Find specific sub-strings and replace them globally with another.', 'category' => 'text-tools', 'icon' => '⌕', 'handler' => 'TextHandler', 'action' => 'findAndReplace',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Main Text', 'required' => true],
            ['name' => 'find', 'type' => 'text', 'label' => 'Find String', 'required' => true],
            ['name' => 'replace', 'type' => 'text', 'label' => 'Replace With', 'required' => false]
        ]
    ],
    'string-to-slug' => [
        'title' => 'String to Slug', 'desc' => 'Convert an article title directly to an SEO-friendly URL slug.', 'category' => 'text-tools', 'icon' => '🔗', 'handler' => 'TextHandler', 'action' => 'stringToSlug',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'String Title', 'required' => true]]
    ],

    // --- DEV TOOLS (BATCH 1) ---
    'html-minifier' => [
        'title' => 'HTML Minifier', 'desc' => 'Compress HTML size efficiently using powerful regex.', 'category' => 'developer-tools', 'icon' => '<>', 'handler' => 'DevHandler', 'action' => 'htmlMinifier',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Raw HTML', 'required' => true]]
    ],
    'css-minifier' => [
        'title' => 'CSS Minifier', 'desc' => 'Strip spaces and comments from CSS stylesheets.', 'category' => 'developer-tools', 'icon' => '{}', 'handler' => 'DevHandler', 'action' => 'cssMinifier',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Raw CSS', 'required' => true]]
    ],
    'js-minifier' => [
        'title' => 'JS Minifier', 'desc' => 'Clear loose spacing lines in standard JS code arrays.', 'category' => 'developer-tools', 'icon' => 'JS', 'handler' => 'DevHandler', 'action' => 'jsMinifier',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Raw JavaScript', 'required' => true]]
    ],
    'json-validator' => [
        'title' => 'JSON Validator', 'desc' => 'Strictly format and validate standard JSON encoded properties.', 'category' => 'developer-tools', 'icon' => '{}', 'handler' => 'DevHandler', 'action' => 'jsonValidator',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'JSON Data', 'required' => true]]
    ],
    'url-parser' => [
        'title' => 'URL Parser', 'desc' => 'Break a URL down into fragment, host, path, and scheme sets.', 'category' => 'developer-tools', 'icon' => '🔗', 'handler' => 'DevHandler', 'action' => 'urlParser',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Absolute URL', 'required' => true]]
    ],
    'html-entity-encode' => [
        'title' => 'HTML Entity Encode', 'desc' => 'Encode HTML specific characters (<, >, &, ") securely.', 'category' => 'developer-tools', 'icon' => 'E↑', 'handler' => 'DevHandler', 'action' => 'htmlEntityEncode',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Raw Data', 'required' => true]]
    ],
    'html-entity-decode' => [
        'title' => 'HTML Entity Decode', 'desc' => 'Reconstruct entities encoded natively to basic characters.', 'category' => 'developer-tools', 'icon' => 'E↓', 'handler' => 'DevHandler', 'action' => 'htmlEntityDecode',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Encoded Entities', 'required' => true]]
    ],
    'ipv4-to-ipv6' => [
        'title' => 'IPv4 to IPv6', 'desc' => 'Compute IPv4-mapped IPv6 syntax equivalents.', 'category' => 'developer-tools', 'icon' => 'IP', 'handler' => 'DevHandler', 'action' => 'ipv4ToIpv6',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'IPv4 Address', 'placeholder' => '192.168.1.1', 'required' => true]]
    ],
    'http-status-checker' => [
        'title' => 'HTTP Status Code', 'desc' => 'Lookup standard status details, hints, and HTTP code contexts (200, 404, 500).', 'category' => 'developer-tools', 'icon' => '⚙', 'handler' => 'DevHandler', 'action' => 'httpStatusChecker',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Status Code', 'placeholder' => '404', 'required' => true]]
    ],
    'meta-tags-generator' => [
        'title' => 'Meta Tags Generator', 'desc' => 'Create rich structural HTML meta tags for headers.', 'category' => 'developer-tools', 'icon' => '<m>', 'handler' => 'DevHandler', 'action' => 'metaTags',
        'inputs' => [
            ['name' => 'title', 'type' => 'text', 'label' => 'Page Title', 'required' => true],
            ['name' => 'desc', 'type' => 'text', 'label' => 'Description', 'required' => true],
            ['name' => 'keywords', 'type' => 'text', 'label' => 'Keywords (comma)', 'required' => true],
            ['name' => 'author', 'type' => 'text', 'label' => 'Author', 'required' => true]
        ]
    ],
    'css-box-shadow' => [
        'title' => 'CSS Box Shadow', 'desc' => 'Easily generate a CSS3 box shadow element style.', 'category' => 'developer-tools', 'icon' => '▨', 'handler' => 'DevHandler', 'action' => 'cssBoxShadow',
        'inputs' => [
            ['name' => 'offsetx', 'type' => 'number', 'label' => 'Offset X (px)', 'value' => '10', 'required' => true],
            ['name' => 'offsety', 'type' => 'number', 'label' => 'Offset Y (px)', 'value' => '10', 'required' => true],
            ['name' => 'blur', 'type' => 'number', 'label' => 'Blur Radius (px)', 'value' => '20', 'required' => true],
            ['name' => 'color', 'type' => 'color', 'label' => 'Shadow Color', 'value' => '#000000', 'required' => true]
        ]
    ],
    'hex-to-rgb' => [
        'title' => 'HEX to RGB', 'desc' => 'Convert a hexadecimal web string to its individual RGB notation.', 'category' => 'developer-tools', 'icon' => '#', 'handler' => 'DevHandler', 'action' => 'hexToRgb',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'HEX Color', 'placeholder' => '#ff7a00', 'required' => true]]
    ],
    'rgb-to-hex' => [
        'title' => 'RGB to HEX', 'desc' => 'Convert integer RGB component variables to HEX representations.', 'category' => 'developer-tools', 'icon' => 'RGB', 'handler' => 'DevHandler', 'action' => 'rgbToHex',
        'inputs' => [
            ['name' => 'r', 'type' => 'number', 'label' => 'R (0-255)', 'placeholder' => '0', 'required' => true],
            ['name' => 'g', 'type' => 'number', 'label' => 'G (0-255)', 'placeholder' => '0', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'B (0-255)', 'placeholder' => '0', 'required' => true]
        ]
    ],
    'random-color-palette' => [
        'title' => 'Color Palette Generator', 'desc' => 'Yield randomly matched distinct hex web color strings natively.', 'category' => 'developer-tools', 'icon' => '🎨', 'handler' => 'DevHandler', 'action' => 'randomColorPalette',
        'inputs' => [] // none required
    ],
    'qr-code' => [
        'title' => 'QR Code Generator', 'desc' => 'Create a 2D QR visual payload code representation natively.', 'category' => 'developer-tools', 'icon' => '📱', 'handler' => 'DevHandler', 'action' => 'qrCode',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'String to Map', 'required' => true]]
    ],

    // --- MATH & GEOMETRY TOOLS (BATCH 2) ---
    'addition-calculator' => [
        'title' => 'Addition Calculator', 'desc' => 'Instantly sum two numeric values together.', 'category' => 'math-calculators', 'icon' => '+', 'handler' => 'MathHandler', 'action' => 'addition',
        'inputs' => [
            ['name' => 'num1', 'type' => 'number', 'label' => 'Number 1', 'required' => true],
            ['name' => 'num2', 'type' => 'number', 'label' => 'Number 2', 'required' => true]
        ]
    ],
    'subtraction-calculator' => [
        'title' => 'Subtraction Calculator', 'desc' => 'Subtract one number from another effortlessly.', 'category' => 'math-calculators', 'icon' => '-', 'handler' => 'MathHandler', 'action' => 'subtraction',
        'inputs' => [
            ['name' => 'num1', 'type' => 'number', 'label' => 'Number 1', 'required' => true],
            ['name' => 'num2', 'type' => 'number', 'label' => 'Number 2', 'required' => true]
        ]
    ],
    'multiplication-calculator' => [
        'title' => 'Multiplication Calculator', 'desc' => 'Find the definitive product of two distinct variables.', 'category' => 'math-calculators', 'icon' => '×', 'handler' => 'MathHandler', 'action' => 'multiplication',
        'inputs' => [
            ['name' => 'num1', 'type' => 'number', 'label' => 'Number 1', 'required' => true],
            ['name' => 'num2', 'type' => 'number', 'label' => 'Number 2', 'required' => true]
        ]
    ],
    'division-calculator' => [
        'title' => 'Division Calculator', 'desc' => 'Compute the accurate quotient dividing two integers or floats.', 'category' => 'math-calculators', 'icon' => '÷', 'handler' => 'MathHandler', 'action' => 'division',
        'inputs' => [
            ['name' => 'num1', 'type' => 'number', 'label' => 'Dividend / Numerator', 'required' => true],
            ['name' => 'num2', 'type' => 'number', 'label' => 'Divisor / Denominator', 'required' => true]
        ]
    ],
    'prime-number-checker' => [
        'title' => 'Prime Checker', 'desc' => 'Evaluate whether any positive integer is a Prime Number mathematically.', 'category' => 'math-calculators', 'icon' => 'P', 'handler' => 'MathHandler', 'action' => 'primeChecker',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Positive Integer', 'required' => true]]
    ],
    'factorial-calculator' => [
        'title' => 'Factorial Calculator', 'desc' => 'Determine the massive factorial product (!) of a given number.', 'category' => 'math-calculators', 'icon' => '!', 'handler' => 'MathHandler', 'action' => 'factorial',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Integer N', 'required' => true]]
    ],
    'exponent-calculator' => [
        'title' => 'Exponent Calculator', 'desc' => 'Evaluate the formula Base raised to an Exponent power.', 'category' => 'math-calculators', 'icon' => 'xʸ', 'handler' => 'MathHandler', 'action' => 'exponent',
        'inputs' => [
            ['name' => 'base', 'type' => 'number', 'label' => 'Base Number', 'required' => true],
            ['name' => 'exp', 'type' => 'number', 'label' => 'Exponent (Power)', 'required' => true]
        ]
    ],
    'square-root-calculator' => [
        'title' => 'Square Root', 'desc' => 'Retrieve the exact square root (√) of numeric inputs instantly.', 'category' => 'math-calculators', 'icon' => '√', 'handler' => 'MathHandler', 'action' => 'squareRoot',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Number', 'required' => true]]
    ],
    'percentage-difference' => [
        'title' => 'Percentage Increase/Decrease', 'desc' => 'Calculate the % variance drop or peak between initial and final values.', 'category' => 'math-calculators', 'icon' => '%Δ', 'handler' => 'MathHandler', 'action' => 'percentDifference',
        'inputs' => [
            ['name' => 'initial', 'type' => 'number', 'label' => 'Initial Value', 'required' => true],
            ['name' => 'final', 'type' => 'number', 'label' => 'Final Value', 'required' => true]
        ]
    ],
    'lcm-gcd-calculator' => [
        'title' => 'LCM / GCD Calculator', 'desc' => 'Compute the Least Common Multiple & Greatest Common Divisor mathematically.', 'category' => 'math-calculators', 'icon' => 'GCD', 'handler' => 'MathHandler', 'action' => 'lcmGcd',
        'inputs' => [
            ['name' => 'num1', 'type' => 'number', 'label' => 'First Integer', 'required' => true],
            ['name' => 'num2', 'type' => 'number', 'label' => 'Second Integer', 'required' => true]
        ]
    ],
    'area-square' => [
        'title' => 'Area of a Square/Rectangle', 'desc' => 'Determine the surface layout area of 2D 4-sided box polygons.', 'category' => 'geometry-calculators', 'icon' => '□', 'handler' => 'MathHandler', 'action' => 'areaSquare',
        'inputs' => [
            ['name' => 'length', 'type' => 'number', 'label' => 'Length (L)', 'required' => true],
            ['name' => 'width', 'type' => 'number', 'label' => 'Width (W)', 'required' => true]
        ]
    ],
    'area-circle' => [
        'title' => 'Area of a Circle', 'desc' => 'Ascertain the space mapped by a geometric circle using radius.', 'category' => 'geometry-calculators', 'icon' => '○', 'handler' => 'MathHandler', 'action' => 'areaCircle',
        'inputs' => [['name' => 'radius', 'type' => 'number', 'label' => 'Radius (r)', 'required' => true]]
    ],
    'volume-cylinder' => [
        'title' => 'Volume of a Cylinder', 'desc' => 'Calculate the 3D internal capacity space of a perfect cylinder.', 'category' => 'geometry-calculators', 'icon' => '⛁', 'handler' => 'MathHandler', 'action' => 'volumeCylinder',
        'inputs' => [
            ['name' => 'radius', 'type' => 'number', 'label' => 'Radius (r)', 'required' => true],
            ['name' => 'height', 'type' => 'number', 'label' => 'Height (h)', 'required' => true]
        ]
    ],
    'pythagorean-theorem' => [
        'title' => 'Pythagorean Theorem', 'desc' => 'Solve for the hypotenuse length (c) on a standard Right Triangle.', 'category' => 'geometry-calculators', 'icon' => '⊿', 'handler' => 'MathHandler', 'action' => 'pythagorean',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'Leg A length', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'Leg B length', 'required' => true]
        ]
    ],

    // --- FINANCE TOOLS (BATCH 2) ---
    'simple-interest' => [
        'title' => 'Simple Interest', 'desc' => 'Yield the raw interest accrued based solely on a principle amount linearly.', 'category' => 'finance-calculators', 'icon' => '$%', 'handler' => 'FinanceHandler', 'action' => 'simpleInterest',
        'inputs' => [
            ['name' => 'p', 'type' => 'number', 'label' => 'Principle ($)', 'required' => true],
            ['name' => 'r', 'type' => 'number', 'label' => 'Annual Rate (%)', 'required' => true],
            ['name' => 't', 'type' => 'number', 'label' => 'Time (Years)', 'required' => true]
        ]
    ],
    'compound-interest' => [
        'title' => 'Compound Interest', 'desc' => 'Estimate wealth building returns of a compounding exponential yield curve.', 'category' => 'finance-calculators', 'icon' => '📈', 'handler' => 'FinanceHandler', 'action' => 'compoundInterest',
        'inputs' => [
            ['name' => 'p', 'type' => 'number', 'label' => 'Initial Principle ($)', 'required' => true],
            ['name' => 'r', 'type' => 'number', 'label' => 'Annual Interest Rate (%)', 'required' => true],
            ['name' => 'n', 'type' => 'number', 'label' => 'Compounds per Year (e.g. 12)', 'value' => '12', 'required' => true],
            ['name' => 't', 'type' => 'number', 'label' => 'Investment Time (Years)', 'required' => true]
        ]
    ],
    'roi-calculator' => [
        'title' => 'ROI Calculator', 'desc' => 'Ascertain the precise Return On Investment ratio for asset purchases.', 'category' => 'finance-calculators', 'icon' => 'R%', 'handler' => 'FinanceHandler', 'action' => 'roi',
        'inputs' => [
            ['name' => 'invested', 'type' => 'number', 'label' => 'Total Invested ($)', 'required' => true],
            ['name' => 'returned', 'type' => 'number', 'label' => 'Total Returned ($)', 'required' => true]
        ]
    ],
    'discount-calculator' => [
        'title' => 'Discount Calculator', 'desc' => 'Determine your cash savings and terminal payment price mathematically.', 'category' => 'finance-calculators', 'icon' => '🏷', 'handler' => 'FinanceHandler', 'action' => 'discount',
        'inputs' => [
            ['name' => 'price', 'type' => 'number', 'label' => 'Original Price ($)', 'required' => true],
            ['name' => 'discount', 'type' => 'number', 'label' => 'Discount Rate (%)', 'required' => true]
        ]
    ],
    'sales-tax-calculator' => [
        'title' => 'Sales Tax / GST', 'desc' => 'Inject tax percentages into raw baseline pricing reliably.', 'category' => 'finance-calculators', 'icon' => 'GST', 'handler' => 'FinanceHandler', 'action' => 'salesTax',
        'inputs' => [
            ['name' => 'price', 'type' => 'number', 'label' => 'Item Price Before Tax ($)', 'required' => true],
            ['name' => 'tax', 'type' => 'number', 'label' => 'Tax Rate (%)', 'required' => true]
        ]
    ],
    'tip-calculator' => [
        'title' => 'Restaurant Tip', 'desc' => 'Automatically split hospitality bills and accurately measure standard tipping norms.', 'category' => 'finance-calculators', 'icon' => '☕', 'handler' => 'FinanceHandler', 'action' => 'tip',
        'inputs' => [
            ['name' => 'bill', 'type' => 'number', 'label' => 'Bill Amount ($)', 'required' => true],
            ['name' => 'tip_pct', 'type' => 'number', 'label' => 'Tip Percentage (%)', 'value' => '15', 'required' => true],
            ['name' => 'people', 'type' => 'number', 'label' => 'Split Between (People)', 'value' => '1', 'required' => true]
        ]
    ],
    'salary-hourly' => [
        'title' => 'Salary to Hourly', 'desc' => 'Convert your gross annual take-home salary to standard hourly/weekly wages.', 'category' => 'finance-calculators', 'icon' => '⏱', 'handler' => 'FinanceHandler', 'action' => 'salaryHourly',
        'inputs' => [
            ['name' => 'salary', 'type' => 'number', 'label' => 'Annual Salary ($)', 'required' => true],
            ['name' => 'hours', 'type' => 'number', 'label' => 'Hours / Week', 'value' => '40', 'required' => true]
        ]
    ],
    'emi-mortgage' => [
        'title' => 'EMI / Mortgage', 'desc' => 'Map out fixed monthly property amortization payments (Equated Monthly Installment).', 'category' => 'finance-calculators', 'icon' => '🏠', 'handler' => 'FinanceHandler', 'action' => 'emiMortgage',
        'inputs' => [
            ['name' => 'loan', 'type' => 'number', 'label' => 'Loan Amount ($)', 'required' => true],
            ['name' => 'rate', 'type' => 'number', 'label' => 'Annual Interest Rate (%)', 'required' => true],
            ['name' => 'years', 'type' => 'number', 'label' => 'Loan Tenure (Years)', 'required' => true]
        ]
    ],

    // --- HEALTH TOOLS (BATCH 2) ---
    'bmr-calculator' => [
        'title' => 'BMR Calculator', 'desc' => 'Estimate your precise Basal Metabolic Rate (BMR) required just to exist at rest.', 'category' => 'health-calculators', 'icon' => '⚡', 'handler' => 'HealthHandler', 'action' => 'bmr',
        'inputs' => [
            ['name' => 'gender', 'type' => 'text', 'label' => 'Gender (M/F)', 'required' => true],
            ['name' => 'age', 'type' => 'number', 'label' => 'Age (Years)', 'required' => true],
            ['name' => 'weight', 'type' => 'number', 'label' => 'Weight (kg)', 'required' => true],
            ['name' => 'height', 'type' => 'number', 'label' => 'Height (cm)', 'required' => true]
        ]
    ],
    'tdee-calculator' => [
        'title' => 'TDEE Calculator', 'desc' => 'Calculate Total Daily Energy Expenditure (how many calories you burn a day).', 'category' => 'health-calculators', 'icon' => '🔥', 'handler' => 'HealthHandler', 'action' => 'tdee',
        'inputs' => [
            ['name' => 'bmr', 'type' => 'number', 'label' => 'Your BMR', 'required' => true],
            ['name' => 'activity', 'type' => 'number', 'label' => 'Multiplier (1.2 - 1.9)', 'value' => '1.2', 'required' => true]
        ]
    ],
    'body-fat-us-navy' => [
        'title' => 'Body Fat % (US Navy)', 'desc' => 'Algorithmically estimate absolute human body fat ratio using bodily circumferences.', 'category' => 'health-calculators', 'icon' => '💪', 'handler' => 'HealthHandler', 'action' => 'bodyFat',
        'inputs' => [
            ['name' => 'gender', 'type' => 'text', 'label' => 'Gender (M/F)', 'required' => true],
            ['name' => 'height', 'type' => 'number', 'label' => 'Height (cm)', 'required' => true],
            ['name' => 'neck', 'type' => 'number', 'label' => 'Neck Circumference (cm)', 'required' => true],
            ['name' => 'waist', 'type' => 'number', 'label' => 'Waist Circumference (cm)', 'required' => true],
            ['name' => 'hip', 'type' => 'number', 'label' => 'Hip Circumference (cm) - Female Only', 'required' => false]
        ]
    ],
    'ideal-body-weight' => [
        'title' => 'Ideal Body Weight', 'desc' => 'Derive your scientifically categorized perfect weight metric.', 'category' => 'health-calculators', 'icon' => '⚖', 'handler' => 'HealthHandler', 'action' => 'ibw',
        'inputs' => [
            ['name' => 'gender', 'type' => 'text', 'label' => 'Gender (M/F)', 'required' => true],
            ['name' => 'height', 'type' => 'number', 'label' => 'Height (cm)', 'required' => true]
        ]
    ],
    'daily-calorie-needs' => [
        'title' => 'Daily Caloric Needs', 'desc' => 'Set explicit caloric thresholds for Bulking, Maintenance, or Clinical Cutting phases.', 'category' => 'health-calculators', 'icon' => '🍎', 'handler' => 'HealthHandler', 'action' => 'calorieNeeds',
        'inputs' => [
            ['name' => 'tdee', 'type' => 'number', 'label' => 'Your TDEE Calories', 'required' => true]
        ]
    ],
    'target-heart-rate' => [
        'title' => 'Target Heart Rate', 'desc' => 'Discover maximum biological beats per minute safe thresholds for cardio.', 'category' => 'health-calculators', 'icon' => '❤', 'handler' => 'HealthHandler', 'action' => 'heartRate',
        'inputs' => [['name' => 'age', 'type' => 'number', 'label' => 'Your Age', 'required' => true]]
    ],

    // --- DATE & TIME TOOLS (BATCH 3) ---
    'age-calculator' => [
        'title' => 'Age Calculator', 'desc' => 'Determine your exact chronological age in years, months, and days.', 'category' => 'time-calculators', 'icon' => '🎂', 'handler' => 'DateHandler', 'action' => 'ageCalculator',
        'inputs' => [
            ['name' => 'dob', 'type' => 'date', 'label' => 'Date of Birth', 'required' => true],
            ['name' => 'target', 'type' => 'date', 'label' => 'Age at Date (Optional)', 'required' => false]
        ]
    ],
    'date-difference' => [
        'title' => 'Date Difference Calculator', 'desc' => 'Calculate the span between two explicit calendar dates precisely.', 'category' => 'time-calculators', 'icon' => '📅', 'handler' => 'DateHandler', 'action' => 'dateDifference',
        'inputs' => [
            ['name' => 'date1', 'type' => 'date', 'label' => 'Start Date', 'required' => true],
            ['name' => 'date2', 'type' => 'date', 'label' => 'End Date', 'required' => true]
        ]
    ],
    'days-between-dates' => [
        'title' => 'Days Between Dates', 'desc' => 'Find the absolute number of calendar days bridging two dates.', 'category' => 'time-calculators', 'icon' => 'N', 'handler' => 'DateHandler', 'action' => 'daysBetween',
        'inputs' => [
            ['name' => 'date1', 'type' => 'date', 'label' => 'Start Date', 'required' => true],
            ['name' => 'date2', 'type' => 'date', 'label' => 'End Date', 'required' => true]
        ]
    ],
    'add-days' => [
        'title' => 'Add Days to Date', 'desc' => 'Shift a calendar date forward by a specific number of days.', 'category' => 'time-calculators', 'icon' => '+D', 'handler' => 'DateHandler', 'action' => 'addDays',
        'inputs' => [
            ['name' => 'date', 'type' => 'date', 'label' => 'Base Date', 'required' => true],
            ['name' => 'days', 'type' => 'number', 'label' => 'Days to Add', 'required' => true]
        ]
    ],
    'subtract-days' => [
        'title' => 'Subtract Days from Date', 'desc' => 'Rewind a calendar date backward chronologically by X days.', 'category' => 'time-calculators', 'icon' => '-D', 'handler' => 'DateHandler', 'action' => 'subtractDays',
        'inputs' => [
            ['name' => 'date', 'type' => 'date', 'label' => 'Base Date', 'required' => true],
            ['name' => 'days', 'type' => 'number', 'label' => 'Days to Subtract', 'required' => true]
        ]
    ],
    'leap-year-checker' => [
        'title' => 'Leap Year Checker', 'desc' => 'Verify if a given year mathematically qualifies as a Leap Year.', 'category' => 'time-calculators', 'icon' => 'L', 'handler' => 'DateHandler', 'action' => 'leapYear',
        'inputs' => [['name' => 'year', 'type' => 'number', 'label' => 'Four Digit Year (e.g. 2024)', 'required' => true]]
    ],
    'business-days' => [
        'title' => 'Business Days Calculator', 'desc' => 'Count operable weekdays (Mon-Fri) existing between two periods.', 'category' => 'time-calculators', 'icon' => '🏢', 'handler' => 'DateHandler', 'action' => 'businessDays',
        'inputs' => [
            ['name' => 'date1', 'type' => 'date', 'label' => 'Start Date', 'required' => true],
            ['name' => 'date2', 'type' => 'date', 'label' => 'End Date', 'required' => true]
        ]
    ],
    'unix-timestamp' => [
        'title' => 'UNIX Timestamp', 'desc' => 'Generate the exact seconds elapsed since January 1st, 1970 UTC.', 'category' => 'time-calculators', 'icon' => '⏱', 'handler' => 'DateHandler', 'action' => 'unixTimestamp',
        'inputs' => [] // Current time by default
    ],

    // --- UNIT CONVERTERS (BATCH 3) - INDIVIDUAL SEO PAGES ---
    // Length
    'meters-to-feet' => [
        'title' => 'Meters to Feet', 'desc' => 'Convert linear metric meters physically into imperial feet easily.', 'category' => 'length-converters', 'icon' => 'm→ft', 'handler' => 'UnitHandler', 'action' => 'metersToFeet',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Meters (m)', 'required' => true]]
    ],
    'feet-to-meters' => [
        'title' => 'Feet to Meters', 'desc' => 'Translate standard US customary feet into SI metric meters.', 'category' => 'length-converters', 'icon' => 'ft→m', 'handler' => 'UnitHandler', 'action' => 'feetToMeters',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Feet (ft)', 'required' => true]]
    ],
    'cm-to-inches' => [
        'title' => 'Centimeters to Inches', 'desc' => 'Transform metric centimeters exactly into standard fractional inches.', 'category' => 'length-converters', 'icon' => 'cm→in', 'handler' => 'UnitHandler', 'action' => 'cmToInches',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Centimeters (cm)', 'required' => true]]
    ],
    'inches-to-cm' => [
        'title' => 'Inches to Centimeters', 'desc' => 'Shift customary standard dimensional inches backward to centimeters.', 'category' => 'length-converters', 'icon' => 'in→cm', 'handler' => 'UnitHandler', 'action' => 'inchesToCm',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Inches (in)', 'required' => true]]
    ],
    'km-to-miles' => [
        'title' => 'Kilometers to Miles', 'desc' => 'Convert international road distance mapping KM to highway Miles.', 'category' => 'length-converters', 'icon' => 'km→mi', 'handler' => 'UnitHandler', 'action' => 'kmToMiles',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Kilometers (km)', 'required' => true]]
    ],
    'miles-to-km' => [
        'title' => 'Miles to Kilometers', 'desc' => 'Process terrestrial distance from UK/US Miles into global Kilometers.', 'category' => 'length-converters', 'icon' => 'mi→km', 'handler' => 'UnitHandler', 'action' => 'milesToKm',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Miles (mi)', 'required' => true]]
    ],

    // Weight
    'kg-to-lbs' => [
        'title' => 'Kilograms to Pounds', 'desc' => 'Extrapolate SI metric body or cargo Kilograms into standard Pounds.', 'category' => 'weight-converters', 'icon' => 'kg→lb', 'handler' => 'UnitHandler', 'action' => 'kgToLbs',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Kilograms (kg)', 'required' => true]]
    ],
    'lbs-to-kg' => [
        'title' => 'Pounds to Kilograms', 'desc' => 'Transform structural scaled Pounds mapping directly to Kilograms.', 'category' => 'weight-converters', 'icon' => 'lb→kg', 'handler' => 'UnitHandler', 'action' => 'lbsToKg',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Pounds (lbs)', 'required' => true]]
    ],
    'grams-to-ounces' => [
        'title' => 'Grams to Ounces', 'desc' => 'Compute microscopic metric grams against fluid or dry ounces.', 'category' => 'weight-converters', 'icon' => 'g→oz', 'handler' => 'UnitHandler', 'action' => 'gramsToOunces',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Grams (g)', 'required' => true]]
    ],
    'ounces-to-grams' => [
        'title' => 'Ounces to Grams', 'desc' => 'Convert fractional dry culinary Ounces accurately to precise Grams.', 'category' => 'weight-converters', 'icon' => 'oz→g', 'handler' => 'UnitHandler', 'action' => 'ouncesToGrams',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Ounces (oz)', 'required' => true]]
    ],

    // Temperature
    'celsius-to-fahrenheit' => [
        'title' => 'Celsius to Fahrenheit', 'desc' => 'Scale centigrade °C weather data up to corresponding °F readouts.', 'category' => 'temperature-converters', 'icon' => '°C→°F', 'handler' => 'UnitHandler', 'action' => 'celsiusToFahrenheit',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Celsius (°C)', 'required' => true]]
    ],
    'fahrenheit-to-celsius' => [
        'title' => 'Fahrenheit to Celsius', 'desc' => 'Condense US standard thermometric Fahrenheit mapping to Celsius.', 'category' => 'temperature-converters', 'icon' => '°F→°C', 'handler' => 'UnitHandler', 'action' => 'fahrenheitToCelsius',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Fahrenheit (°F)', 'required' => true]]
    ],
    'celsius-to-kelvin' => [
        'title' => 'Celsius to Kelvin', 'desc' => 'Shift scientific Celsius variants absolutely to 0-base Kelvin.', 'category' => 'temperature-converters', 'icon' => '°C→K', 'handler' => 'UnitHandler', 'action' => 'celsiusToKelvin',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Celsius (°C)', 'required' => true]]
    ],

    // Storage
    'kb-to-mb' => [
        'title' => 'KB to MB', 'desc' => 'Scale Kilobytes digitally into standard Megabyte data capacities.', 'category' => 'storage-converters', 'icon' => 'KB→MB', 'handler' => 'UnitHandler', 'action' => 'kbToMb',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Kilobytes (KB)', 'required' => true]]
    ],
    'mb-to-gb' => [
        'title' => 'MB to GB', 'desc' => 'Convert file storage scale Megabytes broadly into Gigabytes.', 'category' => 'storage-converters', 'icon' => 'MB→GB', 'handler' => 'UnitHandler', 'action' => 'mbToGb',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Megabytes (MB)', 'required' => true]]
    ],
    'gb-to-tb' => [
        'title' => 'GB to TB', 'desc' => 'Compress vast binary Gigabytes sequentially into Terabytes.', 'category' => 'storage-converters', 'icon' => 'GB→TB', 'handler' => 'UnitHandler', 'action' => 'gbToTb',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Gigabytes (GB)', 'required' => true]]
    ],
    'tb-to-gb' => [
        'title' => 'TB to GB', 'desc' => 'Parse sheer volume Terabytes backwards into granular Gigabytes.', 'category' => 'storage-converters', 'icon' => 'TB→GB', 'handler' => 'UnitHandler', 'action' => 'tbToGb',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Terabytes (TB)', 'required' => true]]
    ],

    // Time
    'sec-to-min' => [
        'title' => 'Seconds to Minutes', 'desc' => 'Bundle distinct baseline temporal seconds into fractional Minutes.', 'category' => 'time-converters', 'icon' => 's→m', 'handler' => 'UnitHandler', 'action' => 'secToMin',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Seconds', 'required' => true]]
    ],
    'min-to-hours' => [
        'title' => 'Minutes to Hours', 'desc' => 'Consolidate 60-part mapping Minutes upward into hourly digits.', 'category' => 'time-converters', 'icon' => 'm→h', 'handler' => 'UnitHandler', 'action' => 'minToHours',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Minutes', 'required' => true]]
    ],
    'hours-to-days' => [
        'title' => 'Hours to Days', 'desc' => 'Stack absolute cumulative hours dividing into whole calendar Days.', 'category' => 'time-converters', 'icon' => 'h→d', 'handler' => 'UnitHandler', 'action' => 'hoursToDays',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Hours', 'required' => true]]
    ],
    'days-to-weeks' => [
        'title' => 'Days to Weeks', 'desc' => 'Collate disparate daily sums rapidly into broader 7-day Weeks.', 'category' => 'time-converters', 'icon' => 'd→w', 'handler' => 'UnitHandler', 'action' => 'daysToWeeks',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Days', 'required' => true]]
    ],

    // --- TEXT & FORMATTING (PHASE 14 BATCH 1) ---
    'markdown-to-html' => [
        'title' => 'Markdown to HTML', 'desc' => 'Convert raw Markdown formatting instantly to HTML tags.', 'category' => 'text-tools', 'icon' => 'M↓', 'handler' => 'TextHandler', 'action' => 'markdownToHtml',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Markdown Text', 'required' => true]]
    ],
    'html-to-markdown' => [
        'title' => 'HTML to Markdown', 'desc' => 'Strip HTML tags and convert them cleanly back into raw Markdown text.', 'category' => 'text-tools', 'icon' => 'M↑', 'handler' => 'TextHandler', 'action' => 'htmlToMarkdown',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'HTML Code', 'required' => true]]
    ],
    'text-to-binary' => [
        'title' => 'Text to Binary', 'desc' => 'Encode regular text sequences into 0s and 1s binary code.', 'category' => 'text-tools', 'icon' => '01', 'handler' => 'TextHandler', 'action' => 'textToBinary',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Normal Text', 'required' => true]]
    ],
    'binary-to-text' => [
        'title' => 'Binary to Text', 'desc' => 'Translate 0s and 1s binary code back into readable english characters.', 'category' => 'text-tools', 'icon' => '10', 'handler' => 'TextHandler', 'action' => 'binaryToText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Binary Code', 'required' => true]]
    ],
    'text-to-hex' => [
        'title' => 'Text to Hexadecimal', 'desc' => 'Convert any text string into its Hexadecimal mathematical equivalent.', 'category' => 'text-tools', 'icon' => 'TH', 'handler' => 'TextHandler', 'action' => 'textToHex',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Standard Text', 'required' => true]]
    ],
    'hex-to-text' => [
        'title' => 'Hexadecimal to Text', 'desc' => 'Decode hex sequences cleanly back into standard human-readable text.', 'category' => 'text-tools', 'icon' => 'HT', 'handler' => 'TextHandler', 'action' => 'hexToText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Hex String', 'required' => true]]
    ],
    'text-to-ascii' => [
        'title' => 'Text to ASCII', 'desc' => 'Convert standard text strings directly into comma-separated ASCII codes.', 'category' => 'text-tools', 'icon' => 'TA', 'handler' => 'TextHandler', 'action' => 'textToAscii',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Text String', 'required' => true]]
    ],
    'ascii-to-text' => [
        'title' => 'ASCII to Text', 'desc' => 'Convert ASCII decimal arrays and codes back to standard text.', 'category' => 'text-tools', 'icon' => 'AT', 'handler' => 'TextHandler', 'action' => 'asciiToText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'ASCII Values (Space Separated)', 'required' => true]]
    ],
    'text-to-morse' => [
        'title' => 'Morse Code Translator', 'desc' => 'Translate standard English phonetic text into dot-dash Morse Code.', 'category' => 'text-tools', 'icon' => '...', 'handler' => 'TextHandler', 'action' => 'textToMorse',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'morse-code-decoder' => [
        'title' => 'Morse Code Decoder', 'desc' => 'Parse incoming dot-dash Morse Code strings back into English alphabet letters.', 'category' => 'text-tools', 'icon' => '-.-', 'handler' => 'TextHandler', 'action' => 'morseToText',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Morse Code', 'placeholder' => '.... . .-.. .-.. ---', 'required' => true]
        ]
    ],
    'braille-translator' => [
        'title' => 'Pro Braille Translator', 'desc' => 'Convert English text to Braille and Braille back to English instantly.', 'category' => 'text-tools', 'icon' => '⠃', 'handler' => 'TextHandler', 'action' => 'brailleTranslator',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text or Braille', 'placeholder' => 'Type here...', 'required' => true]
        ]
    ],
    'zalgo-text' => [
        'title' => 'Zalgo Text Generator', 'desc' => 'Apply demonic, glitchy-looking unicode Zalgo artifacts to standard text.', 'category' => 'text-tools', 'icon' => 'Z', 'handler' => 'TextHandler', 'action' => 'zalgoText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Normal Text', 'required' => true]]
    ],
    'l33t-speak' => [
        'title' => 'L33t Speak Generator', 'desc' => 'Convert text to classic 1990s hacker elite l337 5p34k format.', 'category' => 'text-tools', 'icon' => '1337', 'handler' => 'TextHandler', 'action' => 'leetSpeak',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Normal Text', 'required' => true]]
    ],
    'text-repeater' => [
        'title' => 'Text Repeater', 'desc' => 'Multiply and repeat a string of text up to 10,000 times instantly.', 'category' => 'text-tools', 'icon' => 'x10', 'handler' => 'TextHandler', 'action' => 'textRepeater',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Text to Repeat', 'required' => true],
            ['name' => 'times', 'type' => 'number', 'label' => 'Times to Repeat', 'value' => '100', 'required' => true]
        ]
    ],
    'upside-down-text' => [
        'title' => 'Upside Down Text', 'desc' => 'Flip your text completely upside down using specialized unicode characters.', 'category' => 'text-tools', 'icon' => 'ʇ', 'handler' => 'TextHandler', 'action' => 'upsideDownText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Standard Text', 'required' => true]]
    ],
    'text-to-octal' => [
        'title' => 'Text to Octal', 'desc' => 'Convert standard character text arrays into Base-8 Octal format.', 'category' => 'text-tools', 'icon' => 'TO', 'handler' => 'TextHandler', 'action' => 'textToOctal',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Standard Text', 'required' => true]]
    ],
    'octal-to-text' => [
        'title' => 'Octal to Text', 'desc' => 'Translate Base-8 Octal format inputs cleanly back to string text.', 'category' => 'text-tools', 'icon' => 'OT', 'handler' => 'TextHandler', 'action' => 'octalToText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Octal Data', 'required' => true]]
    ],
    'rot-13-encoder' => [
        'title' => 'ROT13 Encoder', 'desc' => 'Apply the classic ROT13 letter-substitution cipher to standard strings.', 'category' => 'text-tools', 'icon' => 'R13', 'handler' => 'TextHandler', 'action' => 'rot13',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'word-scrambler' => [
        'title' => 'Word Scrambler', 'desc' => 'Randomly shuffle and scramble letters inside all words of a text.', 'category' => 'text-tools', 'icon' => 'SCRM', 'handler' => 'TextHandler', 'action' => 'wordScrambler',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Clean Text', 'required' => true]]
    ],
    'bionic-reading' => [
        'title' => 'Bionic Reading Converter', 'desc' => 'Bionic format text by bolding the first half of words to improve reading speed.', 'category' => 'text-tools', 'icon' => 'B', 'handler' => 'TextHandler', 'action' => 'bionicReading',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Standard Text', 'required' => true]]
    ],

    // --- DEVELOPER UTILITIES (PHASE 14 BATCH 2) ---
    'xml-formatter' => [
        'title' => 'XML Formatter', 'desc' => 'Beautify and indent raw XML strings into readable structured trees.', 'category' => 'developer-tools', 'icon' => '</>', 'handler' => 'DevHandler', 'action' => 'xmlFormatter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Raw XML', 'required' => true]]
    ],
    'json-to-xml' => [
        'title' => 'JSON to XML', 'desc' => 'Convert JavaScript Object Notation (JSON) strings into XML formats.', 'category' => 'developer-tools', 'icon' => '{X}', 'handler' => 'DevHandler', 'action' => 'jsonToXml',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'JSON Data', 'required' => true]]
    ],
    'xml-to-json' => [
        'title' => 'XML to JSON', 'desc' => 'Convert Extensible Markup Language (XML) strings into JSON formats.', 'category' => 'developer-tools', 'icon' => 'X{}', 'handler' => 'DevHandler', 'action' => 'xmlToJson',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'XML Data', 'required' => true]]
    ],
    'sha512-generator' => [
        'title' => 'SHA-512 Hash Generator', 'desc' => 'Generate extremely secure 512-bit Secure Hash Algorithm strings.', 'category' => 'developer-tools', 'icon' => '512', 'handler' => 'DevHandler', 'action' => 'sha512',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'sha384-generator' => [
        'title' => 'SHA-384 Hash Generator', 'desc' => 'Generate cryptographic SHA-384 hashes for sensitive payload verification.', 'category' => 'developer-tools', 'icon' => '384', 'handler' => 'DevHandler', 'action' => 'sha384',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'sha224-generator' => [
        'title' => 'SHA-224 Hash Generator', 'desc' => 'Generate truncated 224-bit hashes within the SHA-2 family.', 'category' => 'developer-tools', 'icon' => '224', 'handler' => 'DevHandler', 'action' => 'sha224',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'sha512-256-generator' => [
        'title' => 'SHA-512/256 Generator', 'desc' => 'Generate SHA-512/256 truncated hashes for secure embedded systems.', 'category' => 'developer-tools', 'icon' => 'S/2', 'handler' => 'DevHandler', 'action' => 'sha512_256',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'sha512-224-generator' => [
        'title' => 'SHA-512/224 Generator', 'desc' => 'Generate SHA-512/224 truncated hashes for secure embedded systems.', 'category' => 'developer-tools', 'icon' => 'S/2', 'handler' => 'DevHandler', 'action' => 'sha512_224',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'sha3-512-generator' => [
        'title' => 'SHA3-512 Hash Generator', 'desc' => 'Generate futuristic Keccak SHA3-512 hashes.', 'category' => 'developer-tools', 'icon' => 'K3', 'handler' => 'DevHandler', 'action' => 'sha3_512',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'whirlpool-generator' => [
        'title' => 'Whirlpool Hash Generator', 'desc' => 'Generate secure 512-bit Whirlpool hashes originally designed by AES creators.', 'category' => 'developer-tools', 'icon' => 'WHL', 'handler' => 'DevHandler', 'action' => 'whirlpool',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'ripemd160-generator' => [
        'title' => 'RIPEMD-160 Generator', 'desc' => 'Generate 160-bit message digests commonly used in Bitcoin/Crypto standards.', 'category' => 'developer-tools', 'icon' => 'R16', 'handler' => 'DevHandler', 'action' => 'ripemd160',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Input String', 'required' => true]]
    ],
    'mac-address-generator' => [
        'title' => 'MAC Address Generator', 'desc' => 'Generate randomized standard MAC address hardware identifiers locally.', 'category' => 'developer-tools', 'icon' => 'MAC', 'handler' => 'DevHandler', 'action' => 'macGenerator',
        'inputs' => [] 
    ],
    'binary-to-decimal' => [
        'title' => 'Binary to Decimal', 'desc' => 'Convert machine-code Binary bases directly into Decimal notation.', 'category' => 'developer-tools', 'icon' => 'B2D', 'handler' => 'DevHandler', 'action' => 'binaryToDecimal',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Binary String', 'required' => true]]
    ],
    'decimal-to-binary' => [
        'title' => 'Decimal to Binary', 'desc' => 'Translate standard Decimal notation mapping directly into Binary bases.', 'category' => 'developer-tools', 'icon' => 'D2B', 'handler' => 'DevHandler', 'action' => 'decimalToBinary',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Decimal String', 'required' => true]]
    ],
    'decimal-to-hex' => [
        'title' => 'Decimal to HEX', 'desc' => 'Translate standard Decimal integers rapidly into Hexadecimal variables.', 'category' => 'developer-tools', 'icon' => 'D2H', 'handler' => 'DevHandler', 'action' => 'decimalToHex',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Decimal String', 'required' => true]]
    ],
    'hex-to-decimal' => [
        'title' => 'HEX to Decimal', 'desc' => 'Convert programmatic Hexadecimal notation bounds back to Decimal integers.', 'category' => 'developer-tools', 'icon' => 'H2D', 'handler' => 'DevHandler', 'action' => 'hexToDecimal',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Hexadecimal String', 'required' => true]]
    ],
    'decimal-to-octal' => [
        'title' => 'Decimal to Octal', 'desc' => 'Convert standard Decimal formats into Base-8 Octal mathematical data.', 'category' => 'developer-tools', 'icon' => 'D2O', 'handler' => 'DevHandler', 'action' => 'decimalToOctal',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Decimal String', 'required' => true]]
    ],
    'octal-to-decimal' => [
        'title' => 'Octal to Decimal', 'desc' => 'Revert mathematical Base-8 Octal formatting to logical Decimal notation.', 'category' => 'developer-tools', 'icon' => 'O2D', 'handler' => 'DevHandler', 'action' => 'octalToDecimal',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Octal String', 'required' => true]]
    ],
    'ip-to-decimal' => [
        'title' => 'IP to Decimal', 'desc' => 'Convert an IPv4 dotted-decimal address into its long decimal numeric equivalent.', 'category' => 'developer-tools', 'icon' => 'IP2', 'handler' => 'DevHandler', 'action' => 'ipToDecimal',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'IPv4 Address', 'required' => true]]
    ],
    'decimal-to-ip' => [
        'title' => 'Decimal to IP', 'desc' => 'Revert long string numeric formats back into IPv4 dot-decimal constraints.', 'category' => 'developer-tools', 'icon' => '2IP', 'handler' => 'DevHandler', 'action' => 'decimalToIp',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Decimal IP Value', 'required' => true]]
    ],

    // --- MATH & STATISTICS (PHASE 14 BATCH 3) ---
    'variance-calculator' => [
        'title' => 'Variance Calculator', 'desc' => 'Calculate the statistical variance of a provided dataset sample or population.', 'category' => 'math-tools', 'icon' => 'σ²', 'handler' => 'MathHandler', 'action' => 'variance',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Dataset (comma separated)', 'required' => true]]
    ],
    'standard-deviation' => [
        'title' => 'Standard Deviation', 'desc' => 'Compute the standard deviation to measure the amount of variation in a set of values.', 'category' => 'math-tools', 'icon' => 'σ', 'handler' => 'MathHandler', 'action' => 'stdDev',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Dataset (comma separated)', 'required' => true]]
    ],
    'mean-median-mode' => [
        'title' => 'Mean, Median, Mode', 'desc' => 'Find the central tendency (average, exact middle, and most frequent) of numbers.', 'category' => 'math-tools', 'icon' => 'M³', 'handler' => 'MathHandler', 'action' => 'meanMedianMode',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Dataset (comma separated)', 'required' => true]]
    ],
    'prime-number-checker' => [
        'title' => 'Prime Number Checker', 'desc' => 'Verify mathematically if a given large integer is a pure prime number.', 'category' => 'math-tools', 'icon' => 'P', 'handler' => 'MathHandler', 'action' => 'primeChecker',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Enter Integer', 'required' => true]]
    ],
    'fibonacci-generator' => [
        'title' => 'Fibonacci Sequence Generator', 'desc' => 'Generate the famous Fibonacci mathematical sequence up to a specific term (N).', 'category' => 'math-tools', 'icon' => 'F(n)', 'handler' => 'MathHandler', 'action' => 'fibonacci',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Number of Terms (Max: 1000)', 'required' => true]]
    ],
    'factorial-calculator' => [
        'title' => 'Factorial Calculator', 'desc' => 'Calculate the exact factorial (n!) mathematical product of any integer.', 'category' => 'math-tools', 'icon' => 'n!', 'handler' => 'MathHandler', 'action' => 'factorial',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Enter Integer (Max: 1000)', 'required' => true]]
    ],
    'combination-calculator' => [
        'title' => 'Combination Calculator (nCr)', 'desc' => 'Find the total number of combinations where order does NOT matter.', 'category' => 'math-tools', 'icon' => 'nCr', 'handler' => 'MathHandler', 'action' => 'combination',
        'inputs' => [
            ['name' => 'n', 'type' => 'number', 'label' => 'Total Objects (n)', 'required' => true],
            ['name' => 'r', 'type' => 'number', 'label' => 'Sample Size (r)', 'required' => true]
        ]
    ],
    'permutation-calculator' => [
        'title' => 'Permutation Calculator (nPr)', 'desc' => 'Find the total number of permutations where selection order DOES matter.', 'category' => 'math-tools', 'icon' => 'nPr', 'handler' => 'MathHandler', 'action' => 'permutation',
        'inputs' => [
            ['name' => 'n', 'type' => 'number', 'label' => 'Total Objects (n)', 'required' => true],
            ['name' => 'r', 'type' => 'number', 'label' => 'Sample Size (r)', 'required' => true]
        ]
    ],
    'margin-calculator' => [
        'title' => 'Margin Calculator', 'desc' => 'Determine gross profit margin percentage from item cost and total revenue.', 'category' => 'math-tools', 'icon' => '%', 'handler' => 'MathHandler', 'action' => 'margin',
        'inputs' => [
            ['name' => 'cost', 'type' => 'number', 'label' => 'Cost of Goods', 'required' => true],
            ['name' => 'revenue', 'type' => 'number', 'label' => 'Total Revenue', 'required' => true]
        ]
    ],
    'markup-calculator' => [
        'title' => 'Markup Calculator', 'desc' => 'Calculate the price markup percentage added to the base cost of a product.', 'category' => 'math-tools', 'icon' => '↑%', 'handler' => 'MathHandler', 'action' => 'markup',
        'inputs' => [
            ['name' => 'cost', 'type' => 'number', 'label' => 'Base Cost', 'required' => true],
            ['name' => 'price', 'type' => 'number', 'label' => 'Selling Price', 'required' => true]
        ]
    ],
    'gcd-calculator' => [
        'title' => 'Greatest Common Divisor (GCD)', 'desc' => 'Find the largest positive integer that divides two numbers without a remainder.', 'category' => 'math-tools', 'icon' => 'GCD', 'handler' => 'MathHandler', 'action' => 'gcd',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'Number A', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'Number B', 'required' => true]
        ]
    ],
    'lcm-calculator' => [
        'title' => 'Least Common Multiple (LCM)', 'desc' => 'Compute the smallest positive integer perfectly divisible by two numbers.', 'category' => 'math-tools', 'icon' => 'LCM', 'handler' => 'MathHandler', 'action' => 'lcm',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'Number A', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'Number B', 'required' => true]
        ]
    ],
    'ratio-calculator' => [
        'title' => 'Ratio Calculator', 'desc' => 'Solve for missing values in proportional ratios or simplify existing ones.', 'category' => 'math-tools', 'icon' => 'A:B', 'handler' => 'MathHandler', 'action' => 'ratio',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'A (Known)', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'B (Known)', 'required' => true],
            ['name' => 'c', 'type' => 'number', 'label' => 'C (Optional)'],
            ['name' => 'd', 'type' => 'number', 'label' => 'D (Optional)']
        ]
    ],
    'exponent-calculator' => [
        'title' => 'Exponent Calculator', 'desc' => 'Calculate the total mathematical result of raising a base number to a specific power.', 'category' => 'math-tools', 'icon' => 'xʸ', 'handler' => 'MathHandler', 'action' => 'exponent',
        'inputs' => [
            ['name' => 'base', 'type' => 'number', 'label' => 'Base (x)', 'required' => true],
            ['name' => 'exp', 'type' => 'number', 'label' => 'Exponent (y)', 'required' => true]
        ]
    ],
    'log-calculator' => [
        'title' => 'Logarithm Calculator', 'desc' => 'Compute the common logarithm (base 10) or natural logarithm (base e) of a variable.', 'category' => 'math-tools', 'icon' => 'log', 'handler' => 'MathHandler', 'action' => 'logarithm',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Number', 'required' => true]]
    ],
    'quadratic-equation' => [
        'title' => 'Quadratic Equation Solver', 'desc' => 'Find the exact real roots (x) of a polynomial quadratic equation (ax² + bx + c = 0).', 'category' => 'math-tools', 'icon' => 'x²', 'handler' => 'MathHandler', 'action' => 'quadratic',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'Value A (x²)', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'Value B (x)', 'required' => true],
            ['name' => 'c', 'type' => 'number', 'label' => 'Value C (constant)', 'required' => true]
        ]
    ],
    'cube-root-calculator' => [
        'title' => 'Cube Root Calculator', 'desc' => 'Ascertain the precise principal cube root of any positive or negative number.', 'category' => 'math-tools', 'icon' => '∛x', 'handler' => 'MathHandler', 'action' => 'cubeRoot',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Enter Number', 'required' => true]]
    ],
    'tip-calculator' => [
        'title' => 'Tip Calculator', 'desc' => 'Calculate accurate restaurant gratuity percentages and total bill split distributions.', 'category' => 'finance-tools', 'icon' => '$', 'handler' => 'MathHandler', 'action' => 'tip',
        'inputs' => [
            ['name' => 'bill', 'type' => 'number', 'label' => 'Total Bill Amount ($)', 'required' => true],
            ['name' => 'tip', 'type' => 'number', 'label' => 'Tip Percentage (%)', 'value' => '20', 'required' => true],
            ['name' => 'split', 'type' => 'number', 'label' => 'Split between (People)', 'value' => '1', 'required' => true]
        ]
    ],
    'discount-calculator' => [
        'title' => 'Discount Calculator', 'desc' => 'Determine your final price and total money saved after applying a store discount coupon.', 'category' => 'finance-tools', 'icon' => '-%', 'handler' => 'MathHandler', 'action' => 'discount',
        'inputs' => [
            ['name' => 'price', 'type' => 'number', 'label' => 'Original Price', 'required' => true],
            ['name' => 'discount', 'type' => 'number', 'label' => 'Discount (%)', 'required' => true]
        ]
    ],
    'roi-calculator' => [
        'title' => 'ROI Calculator', 'desc' => 'Calculate Return on Investment to measure the probability of gaining a return from an investment.', 'category' => 'finance-tools', 'icon' => 'ROI', 'handler' => 'MathHandler', 'action' => 'roi',
        'inputs' => [
            ['name' => 'invested', 'type' => 'number', 'label' => 'Amount Invested', 'required' => true],
            ['name' => 'returned', 'type' => 'number', 'label' => 'Amount Returned', 'required' => true]
        ]
    ],

    // --- ADVANCED CALCULATORS (CalculatorsHandler) ---
    'gpa-calculator' => [
        'title' => 'GPA Calculator', 'desc' => 'Calculate your semester or cumulative GPA easily.', 'category' => 'math-tools', 'icon' => '🎓', 'handler' => 'CalculatorsHandler', 'action' => 'gpaCalculator',
        'inputs' => [
            ['name' => 'grades', 'type' => 'textarea', 'label' => 'Grades (comma separated, e.g. 4,3.5,3)', 'required' => true]
        ]
    ],
    'grade-calculator' => [
        'title' => 'Grade Calculator', 'desc' => 'Determine the grade you need on an exam to reach a target.', 'category' => 'math-tools', 'icon' => '📝', 'handler' => 'CalculatorsHandler', 'action' => 'gradeCalculator',
        'inputs' => [
            ['name' => 'current', 'type' => 'number', 'label' => 'Current Grade (%)', 'required' => true],
            ['name' => 'target', 'type' => 'number', 'label' => 'Target Grade (%)', 'required' => true],
            ['name' => 'weight', 'type' => 'number', 'label' => 'Final Weight (%)', 'required' => true]
        ]
    ],
    'speed-distance-time' => [
        'title' => 'Speed Distance Time', 'desc' => 'Solve for speed, distance, or time using the motion formula.', 'category' => 'math-tools', 'icon' => '🏎️', 'handler' => 'CalculatorsHandler', 'action' => 'speedDistanceTime',
        'inputs' => [
            ['name' => 'v', 'type' => 'number', 'label' => 'Speed (v)'],
            ['name' => 'd', 'type' => 'number', 'label' => 'Distance (d)'],
            ['name' => 't', 'type' => 'number', 'label' => 'Time (t)']
        ]
    ],
    'fuel-cost-calculator' => [
        'title' => 'Fuel Cost Calculator', 'desc' => 'Estimate the total cost of fuel for a specific trip distance.', 'category' => 'math-tools', 'icon' => '⛽', 'handler' => 'CalculatorsHandler', 'action' => 'fuelCostCalculator',
        'inputs' => [
            ['name' => 'dist', 'type' => 'number', 'label' => 'Distance (km/mi)', 'required' => true],
            ['name' => 'eff', 'type' => 'number', 'label' => 'Efficiency (L/100km or MPG)', 'required' => true],
            ['name' => 'price', 'type' => 'number', 'label' => 'Fuel Price per Unit', 'required' => true]
        ]
    ],
    'pet-age-calculator' => [
        'title' => 'Pet Age Calculator', 'desc' => 'Convert your dog or cat age into human years.', 'category' => 'math-tools', 'icon' => '🐾', 'handler' => 'CalculatorsHandler', 'action' => 'petAgeCalculator',
        'inputs' => [
            ['name' => 'age', 'type' => 'number', 'label' => 'Pet Age', 'required' => true],
            ['name' => 'type', 'type' => 'select', 'label' => 'Pet Type', 'options' => ['dog'=>'Dog', 'cat'=>'Cat'], 'required' => true]
        ]
    ],
    'love-calculator' => [
        'title' => 'Love Calculator', 'desc' => 'Find the compatibility percentage between two names.', 'category' => 'math-tools', 'icon' => '❤️', 'handler' => 'CalculatorsHandler', 'action' => 'loveCalculator',
        'inputs' => [
            ['name' => 'name1', 'type' => 'text', 'label' => 'Your Name', 'required' => true],
            ['name' => 'name2', 'type' => 'text', 'label' => 'Partner Name', 'required' => true]
        ]
    ],


    // --- WEB & NETWORKING (PHASE 14 BATCH 4) ---
    'user-agent-parser' => [
        'title' => 'User-Agent Parser', 'desc' => 'Deconstruct complex HTTP User-Agent strings to identify browser, OS, and device.', 'category' => 'web-tools', 'icon' => 'UA', 'handler' => 'WebHandler', 'action' => 'uaParser',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'User-Agent String', 'required' => true]]
    ],
    'open-graph-generator' => [
        'title' => 'Open Graph Generator', 'desc' => 'Generate flawless Facebook OG Meta Tags instantly for enhanced social sharing.', 'category' => 'web-tools', 'icon' => 'OG', 'handler' => 'WebHandler', 'action' => 'ogGenerator',
        'inputs' => [
            ['name' => 'title', 'type' => 'text', 'label' => 'Page Title', 'required' => true],
            ['name' => 'desc', 'type' => 'textarea', 'label' => 'Description (Max 200 chars)', 'required' => true],
            ['name' => 'url', 'type' => 'text', 'label' => 'Website URL', 'required' => true],
            ['name' => 'image', 'type' => 'text', 'label' => 'Image URL', 'required' => true]
        ]
    ],
    'twitter-card-generator' => [
        'title' => 'Twitter Card Generator', 'desc' => 'Create properly formatted Twitter Meta Cards to optimize social media previews.', 'category' => 'web-tools', 'icon' => 'X', 'handler' => 'WebHandler', 'action' => 'twitterCard',
        'inputs' => [
            ['name' => 'title', 'type' => 'text', 'label' => 'Title', 'required' => true],
            ['name' => 'desc', 'type' => 'textarea', 'label' => 'Description', 'required' => true],
            ['name' => 'card_type', 'type' => 'select', 'label' => 'Card Type', 'options' => ['summary' => 'Summary', 'summary_large_image' => 'Large Image Summary'], 'required' => true],
            ['name' => 'site', 'type' => 'text', 'label' => 'Site Username (@handle)'],
            ['name' => 'image', 'type' => 'text', 'label' => 'Image URL']
        ]
    ],
    'robots-txt-generator' => [
        'title' => 'Robots.txt Generator', 'desc' => 'Safely generate SEO-optimized robots.txt files to govern search engine crawling.', 'category' => 'web-tools', 'icon' => 'R', 'handler' => 'WebHandler', 'action' => 'robotsTxt',
        'inputs' => [
            ['name' => 'delay', 'type' => 'number', 'label' => 'Crawl-Delay (Seconds)', 'value' => ''],
            ['name' => 'sitemap', 'type' => 'text', 'label' => 'Sitemap XML URL', 'value' => 'https://domain.com/sitemap.xml'],
            ['name' => 'disallow', 'type' => 'textarea', 'label' => 'Disallow Directories (Line Separated)', 'value' => "/cgi-bin/\n/tmp/\n/admin/"]
        ]
    ],
    'htaccess-generator' => [
        'title' => '.htaccess Generator', 'desc' => 'Quickly generate vital Apache .htaccess security and rewrite parameters.', 'category' => 'web-tools', 'icon' => 'HTA', 'handler' => 'WebHandler', 'action' => 'htaccessGen',
        'inputs' => [
            ['name' => 'https', 'type' => 'select', 'label' => 'Force HTTPS?', 'options' => ['yes' => 'Yes, Force HTTPS', 'no' => 'No']],
            ['name' => 'www', 'type' => 'select', 'label' => 'Force WWW or Non-WWW?', 'options' => ['www' => 'Force WWW', 'nonwww' => 'Force Non-WWW', 'none' => 'Leave As Is']],
            ['name' => 'domain', 'type' => 'text', 'label' => 'Your Domain (e.g., example.com)']
        ]
    ],
    'utm-builder' => [
        'title' => 'UTM URL Builder', 'desc' => 'Construct precise Google Analytics UTM tracking variables for marketing campaigns.', 'category' => 'web-tools', 'icon' => 'UTM', 'handler' => 'WebHandler', 'action' => 'utmBuilder',
        'inputs' => [
            ['name' => 'url', 'type' => 'text', 'label' => 'Destination URL', 'required' => true],
            ['name' => 'source', 'type' => 'text', 'label' => 'Campaign Source (utm_source)', 'required' => true],
            ['name' => 'medium', 'type' => 'text', 'label' => 'Campaign Medium (utm_medium)', 'required' => true],
            ['name' => 'campaign', 'type' => 'text', 'label' => 'Campaign Name (utm_campaign)', 'required' => true]
        ]
    ],
    'htpasswd-generator' => [
        'title' => 'Htpasswd Generator', 'desc' => 'Create secure credentials for Apache Basic Access Authentication (.htpasswd).', 'category' => 'web-tools', 'icon' => 'PWD', 'handler' => 'WebHandler', 'action' => 'htpasswdGen',
        'inputs' => [
            ['name' => 'user', 'type' => 'text', 'label' => 'Username', 'required' => true],
            ['name' => 'pass', 'type' => 'text', 'label' => 'Password', 'required' => true]
        ]
    ],
    'dns-lookup' => [
        'title' => 'DNS Record Lookup', 'desc' => 'Query standard public DNS records (A, MX, TXT, NS, CNAME) rapidly.', 'category' => 'web-tools', 'icon' => 'DNS', 'handler' => 'WebHandler', 'action' => 'dnsLookup',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Domain Name', 'required' => true]]
    ],
    'http-headers' => [
        'title' => 'HTTP Headers Checker', 'desc' => 'Send simulated requests to inspect raw HTTP response headers of any URL.', 'category' => 'web-tools', 'icon' => 'HTTP', 'handler' => 'WebHandler', 'action' => 'httpHeaders',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Website URL', 'required' => true]]
    ],
    'slug-generator' => [
        'title' => 'URL Slug Generator', 'desc' => 'Convert long blog post text titles cleanly into SEO-friendly permalink slugs.', 'category' => 'web-tools', 'icon' => 'ID', 'handler' => 'WebHandler', 'action' => 'slugGen',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Blog Text Title', 'required' => true]]
    ],
    'schema-org-generator' => [
        'title' => 'Schema JSON-LD Generator', 'desc' => 'Create rich snippet JSON-LD metadata markup for local businesses and articles.', 'category' => 'web-tools', 'icon' => '{}', 'handler' => 'WebHandler', 'action' => 'schemaGen',
        'inputs' => [
            ['name' => 'type', 'type' => 'select', 'label' => 'Schema Type', 'options' => ['Article' => 'Article', 'LocalBusiness' => 'Local Business', 'Organization' => 'Organization']],
            ['name' => 'name', 'type' => 'text', 'label' => 'Name/Title', 'required' => true],
            ['name' => 'url', 'type' => 'text', 'label' => 'URL', 'required' => true],
            ['name' => 'image', 'type' => 'text', 'label' => 'Primary Image URL']
        ]
    ],
    'mailto-generator' => [
        'title' => 'Mailto Link Generator', 'desc' => 'Quickly forge pre-filled HTML "mailto:" link code snippets for contact buttons.', 'category' => 'web-tools', 'icon' => '@', 'handler' => 'WebHandler', 'action' => 'mailtoGen',
        'inputs' => [
            ['name' => 'email', 'type' => 'text', 'label' => 'To Application Email', 'required' => true],
            ['name' => 'subject', 'type' => 'text', 'label' => 'Subject Line'],
            ['name' => 'body', 'type' => 'textarea', 'label' => 'Message Body']
        ]
    ],
    'whois-lookup' => [
        'title' => 'WHOIS Domain Lookup', 'desc' => 'Find registrar WHOIS availability data and registry records for exact domains.', 'category' => 'web-tools', 'icon' => 'WHS', 'handler' => 'WebHandler', 'action' => 'whoisLookup',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Domain Name', 'required' => true]]
    ],
    'base64-to-image' => [
        'title' => 'Base64 to Image', 'desc' => 'Convert a complex raw Base64 encoded text string directly into a visual image render.', 'category' => 'web-tools', 'icon' => 'IMG', 'handler' => 'WebHandler', 'action' => 'base64ToImage',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Base64 String', 'required' => true]]
    ],
    'mime-lookup' => [
        'title' => 'MIME Type Lookup', 'desc' => 'Identify the exact server MIME type notation based on the file extension suffix.', 'category' => 'web-tools', 'icon' => 'MIM', 'handler' => 'WebHandler', 'action' => 'mimeLookup',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'File Extension (e.g. pdf, json, mp4)', 'required' => true]]
    ],

    // --- CONVERTERS (PHASE 14 BATCH 5) ---
    'hex-to-ascii' => [
        'title' => 'HEX to ASCII', 'desc' => 'Convert Hexadecimal strings into readable ASCII text.', 'category' => 'converters', 'icon' => 'H>A', 'handler' => 'ConverterHandler', 'action' => 'hexToAscii',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Hexadecimal String', 'required' => true]]
    ],
    'ascii-to-hex' => [
        'title' => 'ASCII to HEX', 'desc' => 'Convert standard ASCII text into Hexadecimal representation.', 'category' => 'converters', 'icon' => 'A>H', 'handler' => 'ConverterHandler', 'action' => 'asciiToHex',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'ASCII Text', 'required' => true]]
    ],
    'rgb-to-hex' => [
        'title' => 'RGB to HEX', 'desc' => 'Convert RGB color values to HTML HEX codes.', 'category' => 'converters', 'icon' => 'R>H', 'handler' => 'ConverterHandler', 'action' => 'rgbToHex',
        'inputs' => [
            ['name' => 'r', 'type' => 'number', 'label' => 'Red (0-255)', 'required' => true],
            ['name' => 'g', 'type' => 'number', 'label' => 'Green (0-255)', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'Blue (0-255)', 'required' => true]
        ]
    ],
    'hex-to-rgb' => [
        'title' => 'HEX to RGB', 'desc' => 'Convert HTML HEX color codes to RGB values.', 'category' => 'converters', 'icon' => 'H>R', 'handler' => 'ConverterHandler', 'action' => 'hexToRgb',
        'inputs' => [['name' => 'hex', 'type' => 'text', 'label' => 'HEX Color Code (e.g. #FF5733)', 'required' => true]]
    ],
    'rgb-to-hsl' => [
        'title' => 'RGB to HSL', 'desc' => 'Convert RGB color values to HSL (Hue, Saturation, Lightness).', 'category' => 'converters', 'icon' => 'R>L', 'handler' => 'ConverterHandler', 'action' => 'rgbToHsl',
        'inputs' => [
            ['name' => 'r', 'type' => 'number', 'label' => 'Red (0-255)', 'required' => true],
            ['name' => 'g', 'type' => 'number', 'label' => 'Green (0-255)', 'required' => true],
            ['name' => 'b', 'type' => 'number', 'label' => 'Blue (0-255)', 'required' => true]
        ]
    ],
    'hsl-to-rgb' => [
        'title' => 'HSL to RGB', 'desc' => 'Convert HSL (Hue, Saturation, Lightness) to RGB values.', 'category' => 'converters', 'icon' => 'L>R', 'handler' => 'ConverterHandler', 'action' => 'hslToRgb',
        'inputs' => [
            ['name' => 'h', 'type' => 'number', 'label' => 'Hue (0-360)', 'required' => true],
            ['name' => 's', 'type' => 'number', 'label' => 'Saturation % (0-100)', 'required' => true],
            ['name' => 'l', 'type' => 'number', 'label' => 'Lightness % (0-100)', 'required' => true]
        ]
    ],
    'unix-to-datetime' => [
        'title' => 'UNIX to DateTime', 'desc' => 'Convert UNIX timestamp to human readable date and time formats.', 'category' => 'converters', 'icon' => 'U>D', 'handler' => 'ConverterHandler', 'action' => 'unixToDate',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'UNIX Timestamp', 'required' => true]]
    ],
    'datetime-to-unix' => [
        'title' => 'DateTime to UNIX', 'desc' => 'Convert human readable date and time to UNIX timestamp.', 'category' => 'converters', 'icon' => 'D>U', 'handler' => 'ConverterHandler', 'action' => 'dateToUnix',
        'inputs' => [['name' => 'date', 'type' => 'text', 'label' => 'Date/Time (e.g. 2024-01-01 12:00:00)', 'required' => true]]
    ],
    'json-to-xml' => [
        'title' => 'JSON to XML', 'desc' => 'Convert JSON data structures cleanly into XML format.', 'category' => 'converters', 'icon' => 'J>X', 'handler' => 'ConverterHandler', 'action' => 'jsonToXml',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'JSON Data', 'required' => true]]
    ],
    'xml-to-json' => [
        'title' => 'XML to JSON', 'desc' => 'Convert XML marked up data deeply into standard JSON.', 'category' => 'converters', 'icon' => 'X>J', 'handler' => 'ConverterHandler', 'action' => 'xmlToJson',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'XML Data', 'required' => true]]
    ],
    'yaml-to-json' => [
        'title' => 'YAML to JSON', 'desc' => 'Convert YAML configuration data into JSON format.', 'category' => 'converters', 'icon' => 'Y>J', 'handler' => 'ConverterHandler', 'action' => 'yamlToJson',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'YAML Data', 'required' => true]]
    ],
    'json-to-yaml' => [
        'title' => 'JSON to YAML', 'desc' => 'Convert JSON payload data cleanly into minimal YAML.', 'category' => 'converters', 'icon' => 'J>Y', 'handler' => 'ConverterHandler', 'action' => 'jsonToYaml',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'JSON Data', 'required' => true]]
    ],
    'binary-to-text' => [
        'title' => 'Binary to Text', 'desc' => 'Convert binary numbers to readable ASCII text characters.', 'category' => 'converters', 'icon' => '0>A', 'handler' => 'ConverterHandler', 'action' => 'binaryToText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Binary String', 'required' => true]]
    ],
    'decimal-to-binary' => [
        'title' => 'Decimal to Binary', 'desc' => 'Convert integer decimal numbers to base-2 binary strings.', 'category' => 'converters', 'icon' => 'D>B', 'handler' => 'ConverterHandler', 'action' => 'decToBinary',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Decimal Number', 'required' => true]]
    ],
    'binary-to-decimal' => [
        'title' => 'Binary to Decimal', 'desc' => 'Convert base-2 binary strings back to integer decimal numbers.', 'category' => 'converters', 'icon' => 'B>D', 'handler' => 'ConverterHandler', 'action' => 'binaryToDec',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Binary String', 'required' => true]]
    ],
    'roman-to-number' => [
        'title' => 'Roman Numeral to Number', 'desc' => 'Convert ancient Roman Numerals (e.g. XIV) to standard Arabic numbers.', 'category' => 'converters', 'icon' => 'R>N', 'handler' => 'ConverterHandler', 'action' => 'romanToNum',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Roman Numeral', 'required' => true]]
    ],
    'number-to-roman' => [
        'title' => 'Number to Roman Numeral', 'desc' => 'Convert standard Arabic numbers into ancient Roman Numerals.', 'category' => 'converters', 'icon' => 'N>R', 'handler' => 'ConverterHandler', 'action' => 'numToRoman',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Number (1-3999)', 'required' => true]]
    ],
    'celsius-to-fahrenheit' => [
        'title' => 'Celsius to Fahrenheit', 'desc' => 'Convert temperature from metric Celsius to imperial Fahrenheit.', 'category' => 'converters', 'icon' => 'C>F', 'handler' => 'ConverterHandler', 'action' => 'celToFah',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Celsius °C', 'required' => true]]
    ],
    'fahrenheit-to-celsius' => [
        'title' => 'Fahrenheit to Celsius', 'desc' => 'Convert temperature from imperial Fahrenheit to metric Celsius.', 'category' => 'converters', 'icon' => 'F>C', 'handler' => 'ConverterHandler', 'action' => 'fahToCel',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Fahrenheit °F', 'required' => true]]
    ],
    'lbs-to-kg' => [
        'title' => 'Pounds to Kilograms', 'desc' => 'Convert metric weights from imperial Pounds (lbs) to Kilograms (kg).', 'category' => 'converters', 'icon' => 'L>K', 'handler' => 'ConverterHandler', 'action' => 'lbsToKg',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Pounds (lbs)', 'required' => true]]
    ],
    'kg-to-lbs' => [
        'title' => 'Kilograms to Pounds', 'desc' => 'Convert metric weights from Kilograms (kg) to imperial Pounds (lbs).', 'category' => 'converters', 'icon' => 'K>L', 'handler' => 'ConverterHandler', 'action' => 'kgToLbs',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Kilograms (kg)', 'required' => true]]
    ],

    // --- SEO & SCHEMA GENERATORS (PHASE 15 BATCH 1) ---
    'keyword-density-checker' => [
        'title' => '[Ultra Bst Pro] Keyword Density Checker', 'desc' => 'Analyze text to calculate the percentage density of specific SEO target keywords.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-chart-simple', 'handler' => 'SeoHandler', 'action' => 'keywordDensity',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Article Content', 'required' => true],
            ['name' => 'keyword', 'type' => 'text', 'label' => 'Target Keyword', 'required' => true]
        ]
    ],
    'serp-snippet-preview' => [
        'title' => '[Ultra Bst Pro] Google SERP Preview', 'desc' => 'Visualize exactly how your webpage title and meta description will appear on Google.', 'category' => 'seo-tools', 'icon' => 'fa-brands fa-google', 'handler' => 'SeoHandler', 'action' => 'serpPreview',
        'inputs' => [
            ['name' => 'title', 'type' => 'text', 'label' => 'SEO Title (max 60 chars)', 'required' => true],
            ['name' => 'desc', 'type' => 'textarea', 'label' => 'Meta Description (max 160 chars)', 'required' => true],
            ['name' => 'url', 'type' => 'text', 'label' => 'Page URL', 'required' => true]
        ]
    ],
    'faq-schema-generator' => [
        'title' => '[Ultra Bst Pro] FAQ Schema Generator', 'desc' => 'Generate rich snippets Google FAQ JSON-LD schema markup code for higher CTR.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-circle-question', 'handler' => 'SeoHandler', 'action' => 'faqSchema',
        'inputs' => [
            ['name' => 'q1', 'type' => 'text', 'label' => 'Question 1', 'required' => true], ['name' => 'a1', 'type' => 'textarea', 'label' => 'Answer 1', 'required' => true],
            ['name' => 'q2', 'type' => 'text', 'label' => 'Question 2 (Optional)'], ['name' => 'a2', 'type' => 'textarea', 'label' => 'Answer 2 (Optional)'],
            ['name' => 'q3', 'type' => 'text', 'label' => 'Question 3 (Optional)'], ['name' => 'a3', 'type' => 'textarea', 'label' => 'Answer 3 (Optional)']
        ]
    ],
    'howto-schema-generator' => [
        'title' => '[Ultra Bst Pro] HowTo Schema Generator', 'desc' => 'Create rich snippet instructional HowTo JSON-LD markup for step-by-step guides.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-list-check', 'handler' => 'SeoHandler', 'action' => 'howtoSchema',
        'inputs' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'HowTo Title/Name', 'required' => true],
            ['name' => 'desc', 'type' => 'text', 'label' => 'Brief Description', 'required' => true],
            ['name' => 'time', 'type' => 'text', 'label' => 'Total Time (e.g. PT15M for 15 minutes)'],
            ['name' => 'step1', 'type' => 'text', 'label' => 'Step 1 Instructions', 'required' => true],
            ['name' => 'step2', 'type' => 'text', 'label' => 'Step 2 Instructions (Optional)'],
            ['name' => 'step3', 'type' => 'text', 'label' => 'Step 3 Instructions (Optional)']
        ]
    ],
    'article-schema-generator' => [
        'title' => '[Ultra Bst Pro] Article Schema Generator', 'desc' => 'Build structured data JSON-LD for Articles and BlogPosts to rank in Top Stories.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-newspaper', 'handler' => 'SeoHandler', 'action' => 'articleSchema',
        'inputs' => [
            ['name' => 'headline', 'type' => 'text', 'label' => 'Article Headline', 'required' => true],
            ['name' => 'author', 'type' => 'text', 'label' => 'Author Name', 'required' => true],
            ['name' => 'publisher', 'type' => 'text', 'label' => 'Publisher/Organization Name', 'required' => true],
            ['name' => 'image', 'type' => 'text', 'label' => 'Featured Image URL'],
            ['name' => 'date', 'type' => 'text', 'label' => 'Date Published (YYYY-MM-DD)', 'required' => true]
        ]
    ],
    'product-schema-generator' => [
        'title' => '[Ultra Bst Pro] Product Schema Generator', 'desc' => 'Generate e-commerce Product formatting structured data with price and reviews.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-cart-shopping', 'handler' => 'SeoHandler', 'action' => 'productSchema',
        'inputs' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Product Name', 'required' => true],
            ['name' => 'desc', 'type' => 'text', 'label' => 'Description', 'required' => true],
            ['name' => 'brand', 'type' => 'text', 'label' => 'Brand Name'],
            ['name' => 'price', 'type' => 'number', 'label' => 'Price', 'required' => true],
            ['name' => 'currency', 'type' => 'text', 'label' => 'Currency (e.g. USD)', 'required' => true, 'value' => 'USD']
        ]
    ],
    'recipe-schema-generator' => [
        'title' => '[Ultra Bst Pro] Recipe Schema Generator', 'desc' => 'Create rich snippet JSON-LD food and culinary Recipe formatting for Google Search.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-utensils', 'handler' => 'SeoHandler', 'action' => 'recipeSchema',
        'inputs' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Diet/Recipe Name', 'required' => true],
            ['name' => 'author', 'type' => 'text', 'label' => 'Author'],
            ['name' => 'time', 'type' => 'text', 'label' => 'Prep Time (e.g. PT20M)'],
            ['name' => 'yield', 'type' => 'text', 'label' => 'Recipe Yield (e.g. 4 servings)'],
            ['name' => 'ingredients', 'type' => 'textarea', 'label' => 'Ingredients (Line Separated)', 'required' => true]
        ]
    ],
    'job-posting-schema-generator' => [
        'title' => '[Ultra Bst Pro] Job Posting Schema', 'desc' => 'Generate rich snippet JSON-LD for Google Jobs hiring board aggregator.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-briefcase', 'handler' => 'SeoHandler', 'action' => 'jobSchema',
        'inputs' => [
            ['name' => 'title', 'type' => 'text', 'label' => 'Job Title', 'required' => true],
            ['name' => 'company', 'type' => 'text', 'label' => 'Hiring Organization', 'required' => true],
            ['name' => 'location', 'type' => 'text', 'label' => 'Location (City, Country)', 'required' => true],
            ['name' => 'type', 'type' => 'select', 'label' => 'Employment Type', 'options' => ['FULL_TIME'=>'Full Time','PART_TIME'=>'Part Time','CONTRACTOR'=>'Contractor','INTERN'=>'Intern']],
            ['name' => 'date', 'type' => 'text', 'label' => 'Valid Through (YYYY-MM-DD)']
        ]
    ],
    'event-schema-generator' => [
        'title' => '[Ultra Bst Pro] Event Schema Generator', 'desc' => 'Generate Event JSON-LD to display concert, festival, or webinar dates in Google.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-calendar-days', 'handler' => 'SeoHandler', 'action' => 'eventSchema',
        'inputs' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Event Name', 'required' => true],
            ['name' => 'start', 'type' => 'text', 'label' => 'Start Date/Time (YYYY-MM-DDTHH:MM)', 'required' => true],
            ['name' => 'location', 'type' => 'text', 'label' => 'Venue / Location Name', 'required' => true],
            ['name' => 'address', 'type' => 'text', 'label' => 'Venue Address', 'required' => true]
        ]
    ],
    'video-schema-generator' => [
        'title' => '[Ultra Bst Pro] Video Schema Generator', 'desc' => 'Create rich snippet VideoObject metadata marking up embeded videos on your site.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-file-video', 'handler' => 'SeoHandler', 'action' => 'videoSchema',
        'inputs' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Video Title', 'required' => true],
            ['name' => 'desc', 'type' => 'text', 'label' => 'Video Description', 'required' => true],
            ['name' => 'thumb', 'type' => 'text', 'label' => 'Thumbnail URL', 'required' => true],
            ['name' => 'content', 'type' => 'text', 'label' => 'Content URL (e.g. .mp4 link)', 'required' => true],
            ['name' => 'date', 'type' => 'text', 'label' => 'Upload Date (YYYY-MM-DD)', 'required' => true]
        ]
    ],
    'breadcrumb-schema-generator' => [
        'title' => '[Ultra Bst Pro] Breadcrumb Schema', 'desc' => 'Construct BreadcrumbList JSON-LD to organize your sites internal page hierarchy.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-folder-tree', 'handler' => 'SeoHandler', 'action' => 'breadcrumbSchema',
        'inputs' => [
            ['name' => 'n1', 'type' => 'text', 'label' => 'Level 1 Name (e.g. Home)', 'required' => true], ['name' => 'u1', 'type' => 'text', 'label' => 'Level 1 URL', 'required' => true],
            ['name' => 'n2', 'type' => 'text', 'label' => 'Level 2 Name (e.g. Category)'], ['name' => 'u2', 'type' => 'text', 'label' => 'Level 2 URL'],
            ['name' => 'n3', 'type' => 'text', 'label' => 'Level 3 Name (e.g. Post)'], ['name' => 'u3', 'type' => 'text', 'label' => 'Level 3 URL']
        ]
    ],
    'hreflang-tags-generator' => [
        'title' => '[Ultra Bst Pro] Hreflang Tags Generator', 'desc' => 'Generate HTML link rel="alternate" hreflang attributes for multi-lingual websites.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-language', 'handler' => 'SeoHandler', 'action' => 'hreflangGen',
        'inputs' => [
            ['name' => 'default', 'type' => 'text', 'label' => 'Default URL (x-default)', 'required' => true],
            ['name' => 'lang1', 'type' => 'text', 'label' => 'Language 1 Code (e.g. en, es, fr)', 'required' => true], ['name' => 'url1', 'type' => 'text', 'label' => 'Language 1 URL', 'required' => true],
            ['name' => 'lang2', 'type' => 'text', 'label' => 'Language 2 Code (Optional)'], ['name' => 'url2', 'type' => 'text', 'label' => 'Language 2 URL (Optional)']
        ]
    ],
    'canonical-tag-generator' => [
        'title' => '[Ultra Bst Pro] Canonical Tag Generator', 'desc' => 'Instantly generate an SEO rel="canonical" tag to avoid duplicate content penalties.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-link', 'handler' => 'SeoHandler', 'action' => 'canonicalGen',
        'inputs' => [['name' => 'url', 'type' => 'text', 'label' => 'Original Authoritative URL', 'required' => true]]
    ],
    'disavow-file-generator' => [
        'title' => '[Ultra Bst Pro] Disavow File Generator', 'desc' => 'Format a clean txt file for submitting toxic backlink disavowals to Google Search Console.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-ban', 'handler' => 'SeoHandler', 'action' => 'disavowGen',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Domains to Disavow (Line Separated)', 'required' => true]]
    ],
    'xml-sitemap-validator' => [
        'title' => '[Ultra Bst Pro] XML Sitemap Validator', 'desc' => 'Validate if raw XML sitemap text adheres to the standard sitemap protocol schema.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-sitemap', 'handler' => 'SeoHandler', 'action' => 'sitemapValidator',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Paste XML Sitemap Code', 'required' => true]]
    ],
    'keyword-merger' => [
        'title' => '[Ultra Bst Pro] Keyword Merger', 'desc' => 'Combine up to 3 lists of words together to generate massive permutated keyword lists for PPC.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-object-group', 'handler' => 'SeoHandler', 'action' => 'keywordMerger',
        'inputs' => [
            ['name' => 'list1', 'type' => 'textarea', 'label' => 'List 1 (Line Separated)', 'required' => true],
            ['name' => 'list2', 'type' => 'textarea', 'label' => 'List 2 (Line Separated)', 'required' => true],
            ['name' => 'list3', 'type' => 'textarea', 'label' => 'List 3 (Optional)']
        ]
    ],
    'long-tail-suggester' => [
        'title' => '[Ultra Bst Pro] Long Tail Suggester', 'desc' => 'Bulk append localized suffixes, prepositions, and prefixes (buy, best, near me) to keywords.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-arrow-down-z-a', 'handler' => 'SeoHandler', 'action' => 'longTailHelper',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Seed Keywords (Line Separated)', 'required' => true],
            ['name' => 'strategy', 'type' => 'select', 'label' => 'Modifier Strategy', 'options' => ['buyer'=>'Buyer Intent (buy, cheap, best)','local'=>'Local Intent (near me, in [City])','question'=>'Questions (how to, what is)']]
        ]
    ],
    'seo-url-checker' => [
        'title' => '[Ultra Bst Pro] SEO Friendly URL Checker', 'desc' => 'Check your URL structure against the latest algorithm guidelines for length and characters.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-link-slash', 'handler' => 'SeoHandler', 'action' => 'urlChecker',
        'inputs' => [['name' => 'url', 'type' => 'text', 'label' => 'Full URL to Check', 'required' => true]]
    ],
    'meta-refresh-generator' => [
        'title' => '[Ultra Bst Pro] Meta Refresh Generator', 'desc' => 'Generate HTML meta refresh tags for client-side redirection when 301 server redirects fail.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-arrows-rotate', 'handler' => 'SeoHandler', 'action' => 'metaRefresh',
        'inputs' => [
            ['name' => 'url', 'type' => 'text', 'label' => 'Destination URL', 'required' => true],
            ['name' => 'time', 'type' => 'number', 'label' => 'Wait Time (Seconds)', 'value' => '0', 'required' => true]
        ]
    ],
    'google-indexing-api' => [
        'title' => '[Ultra Bst Pro] Google Indexing JSON', 'desc' => 'Build the strict JSON payload body required to POST to the true Google Indexing API.', 'category' => 'seo-tools', 'icon' => 'fa-solid fa-bolt-lightning', 'handler' => 'SeoHandler', 'action' => 'indexingApi',
        'inputs' => [
            ['name' => 'url', 'type' => 'text', 'label' => 'URL to Update/Remove', 'required' => true],
            ['name' => 'type', 'type' => 'select', 'label' => 'Request Notification Type', 'options' => ['URL_UPDATED'=>'URL_UPDATED (Crawl / Request Indexing)','URL_DELETED'=>'URL_DELETED (Remove from Index)']]
        ]
    ],

    // --- CSS & UI GENERATORS (PHASE 15 BATCH 2) ---
    'css-gradient-generator' => [
        'title' => 'CSS Gradient Generator', 'desc' => 'Generate beautiful linear and radial CSS transitions effortlessly.', 'category' => 'dev-tools', 'icon' => '🎨', 'handler' => 'CssHandler', 'action' => 'gradientGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'color1', 'type' => 'text', 'label' => 'Color 1 (HEX)', 'value' => '#ff7a59', 'required' => true],
            ['name' => 'color2', 'type' => 'text', 'label' => 'Color 2 (HEX)', 'value' => '#3b82f6', 'required' => true],
            ['name' => 'angle', 'type' => 'number', 'label' => 'Angle (Degrees)', 'value' => '135', 'required' => true]
        ]
    ],
    'css-triangle-generator' => [
        'title' => 'CSS Triangle Generator', 'desc' => 'Generate pure CSS triangles using border hacks perfectly.', 'category' => 'dev-tools', 'icon' => '🔺', 'handler' => 'CssHandler', 'action' => 'triangleGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'direction', 'type' => 'select', 'label' => 'Direction', 'options' => ['top'=>'Top','bottom'=>'Bottom','left'=>'Left','right'=>'Right']],
            ['name' => 'color', 'type' => 'text', 'label' => 'Color (HEX)', 'value' => '#ff7a59', 'required' => true],
            ['name' => 'size', 'type' => 'number', 'label' => 'Size (px)', 'value' => '50', 'required' => true]
        ]
    ],
    'css-ribbon-generator' => [
        'title' => 'CSS Ribbon Generator', 'desc' => 'Generate pure CSS 3D corner ribbons for product cards.', 'category' => 'dev-tools', 'icon' => '🎀', 'handler' => 'CssHandler', 'action' => 'ribbonGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Ribbon Text', 'value' => 'Popular', 'required' => true],
            ['name' => 'color', 'type' => 'text', 'label' => 'Ribbon Color', 'value' => '#dc2626', 'required' => true]
        ]
    ],
    'css-blob-generator' => [
        'title' => 'CSS Blob Generator', 'desc' => 'Create organic, complex shapes with advanced border-radius percentages.', 'category' => 'dev-tools', 'icon' => '💧', 'handler' => 'CssHandler', 'action' => 'blobGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'color', 'type' => 'text', 'label' => 'Blob Color', 'value' => '#ff7a59', 'required' => true]
        ]
    ],
    'css-text-shadow' => [
        'title' => 'CSS Text Shadow', 'desc' => 'Easily construct complex text-shadow variables visually.', 'category' => 'dev-tools', 'icon' => 'T', 'handler' => 'CssHandler', 'action' => 'textShadow',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'offset_x', 'type' => 'number', 'label' => 'Offset X (px)', 'value' => '2', 'required' => true],
            ['name' => 'offset_y', 'type' => 'number', 'label' => 'Offset Y (px)', 'value' => '2', 'required' => true],
            ['name' => 'blur', 'type' => 'number', 'label' => 'Blur Radius (px)', 'value' => '4', 'required' => true],
            ['name' => 'color', 'type' => 'text', 'label' => 'Shadow Color', 'value' => 'rgba(0,0,0,0.5)', 'required' => true]
        ]
    ],
    'css-button-generator' => [
        'title' => 'CSS Button Builder', 'desc' => 'Generate highly styled, interactive CSS buttons with hover states.', 'category' => 'dev-tools', 'icon' => 'B', 'handler' => 'CssHandler', 'action' => 'buttonGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Button Text', 'value' => 'Click Me', 'required' => true],
            ['name' => 'bg', 'type' => 'text', 'label' => 'Background Color', 'value' => '#ff7a59', 'required' => true],
            ['name' => 'radius', 'type' => 'number', 'label' => 'Border Radius (px)', 'value' => '8', 'required' => true]
        ]
    ],
    'neumorphism-generator' => [
        'title' => 'Neumorphism Generator', 'desc' => 'Calculate soft UI CSS box-shadows dynamically for neumorphic aesthetics.', 'category' => 'dev-tools', 'icon' => 'N', 'handler' => 'CssHandler', 'action' => 'neumorphismGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'color', 'type' => 'text', 'label' => 'Base UI Color', 'value' => '#e0e5ec', 'required' => true],
            ['name' => 'distance', 'type' => 'number', 'label' => 'Shadow Distance (px)', 'value' => '9', 'required' => true]
        ]
    ],
    'glassmorphism-generator' => [
        'title' => 'Glassmorphism UI', 'desc' => 'Design frosted-glass effects applying CSS backdrop-filters.', 'category' => 'dev-tools', 'icon' => '🍷', 'handler' => 'CssHandler', 'action' => 'glassmorphismGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'blur', 'type' => 'number', 'label' => 'Blur (px)', 'value' => '10', 'required' => true],
            ['name' => 'transparency', 'type' => 'text', 'label' => 'Transparency (0 to 1)', 'value' => '0.2', 'required' => true]
        ]
    ],
    'css-grid-generator' => [
        'title' => 'CSS Grid Layout', 'desc' => 'Generate structural CSS Grid display columns and rows templates.', 'category' => 'dev-tools', 'icon' => '▦', 'handler' => 'CssHandler', 'action' => 'gridGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'col', 'type' => 'number', 'label' => 'Columns', 'value' => '3', 'required' => true],
            ['name' => 'row', 'type' => 'number', 'label' => 'Rows', 'value' => '3', 'required' => true],
            ['name' => 'gap', 'type' => 'number', 'label' => 'Gap (px)', 'value' => '20', 'required' => true]
        ]
    ],
    'css-flexbox-generator' => [
        'title' => 'CSS Flexbox Generator', 'desc' => 'Visualize standard display flex container alignments.', 'category' => 'dev-tools', 'icon' => 'F', 'handler' => 'CssHandler', 'action' => 'flexGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'direction', 'type' => 'select', 'label' => 'Flex Direction', 'options' => ['row'=>'Row','column'=>'Column']],
            ['name' => 'justify', 'type' => 'select', 'label' => 'Justify Content', 'options' => ['center'=>'Center','space-between'=>'Space Between','flex-start'=>'Flex Start','flex-end'=>'Flex End']],
            ['name' => 'align', 'type' => 'select', 'label' => 'Align Items', 'options' => ['center'=>'Center','flex-start'=>'Flex Start','flex-end'=>'Flex End']]
        ]
    ],
    'css-transform-generator' => [
        'title' => 'CSS Transform', 'desc' => 'Generate dynamic 2D and 3D CSS rotate, scale, skew, and translate matrices.', 'category' => 'dev-tools', 'icon' => '🔄', 'handler' => 'CssHandler', 'action' => 'transformGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'rotate', 'type' => 'number', 'label' => 'Rotate (deg)', 'value' => '45', 'required' => true],
            ['name' => 'scale', 'type' => 'text', 'label' => 'Scale', 'value' => '1.5', 'required' => true]
        ]
    ],
    'css-animation-generator' => [
        'title' => 'CSS Keyframes', 'desc' => 'Create CSS @keyframes animation steps mapped clearly.', 'category' => 'dev-tools', 'icon' => '🎬', 'handler' => 'CssHandler', 'action' => 'keyframeGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'name', 'type' => 'text', 'label' => 'Animation Name', 'value' => 'bounce', 'required' => true],
            ['name' => 'dur', 'type' => 'text', 'label' => 'Duration (s)', 'value' => '2s', 'required' => true]
        ]
    ],
    'svg-wave-generator' => [
        'title' => 'SVG Wave Generator', 'desc' => 'Generates custom mathematical SVG curved wave backgrounds.', 'category' => 'dev-tools', 'icon' => '🌊', 'handler' => 'CssHandler', 'action' => 'svgWaveGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'color', 'type' => 'text', 'label' => 'Wave HEX Color', 'value' => '#ff7a59', 'required' => true]
        ]
    ],
    'svg-pattern-generator' => [
        'title' => 'SVG Pattern Generator', 'desc' => 'Create seamlessly tiling geometric SVG structural backgrounds.', 'category' => 'dev-tools', 'icon' => '🧩', 'handler' => 'CssHandler', 'action' => 'svgPattern',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'type', 'type' => 'select', 'label' => 'Pattern Type', 'options' => ['dots'=>'Polka Dots','grid'=>'Square Grid','diagonal'=>'Diagonal Lines']]
        ]
    ],
    'tailwind-palette-generator' => [
        'title' => 'Tailwind Palette Generator', 'desc' => 'Auto-generate a 50-900 CSS scale matching Tailwind CSS standards.', 'category' => 'dev-tools', 'icon' => 'T', 'handler' => 'CssHandler', 'action' => 'tailwindPalette',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'color', 'type' => 'text', 'label' => 'Base Brand Color (HEX)', 'value' => '#3b82f6', 'required' => true]
        ]
    ],
    'material-palette-picker' => [
        'title' => 'Material Palette', 'desc' => 'Pick explicitly from standard Google Material Design default arrays.', 'category' => 'dev-tools', 'icon' => 'M', 'handler' => 'CssHandler', 'action' => 'materialPalette',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'hue', 'type' => 'select', 'label' => 'Select Material Hue', 'options' => ['red'=>'Red','blue'=>'Blue','green'=>'Green','orange'=>'Orange','purple'=>'Purple']]
        ]
    ],
    'color-blindness-simulator' => [
        'title' => 'Color Blindness Simulator', 'desc' => 'Simulate how different protanopia/deuteranopia combinations view a color.', 'category' => 'dev-tools', 'icon' => '👁️', 'handler' => 'CssHandler', 'action' => 'colorBlind',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'color', 'type' => 'text', 'label' => 'Hex Color Format', 'value' => '#ff7a59', 'required' => true]
        ]
    ],
    'image-color-picker' => [
        'title' => 'Image Color Picker', 'desc' => 'Note: Requires JS interaction to read colors directly. This is a basic demo fallback.', 'category' => 'dev-tools', 'icon' => '🎨', 'handler' => 'CssHandler', 'action' => 'imageColor',
        'is_frontend_only' => true,
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'note', 'type' => 'text', 'label' => 'Info', 'value' => 'Use desktop color picker tools mostly. Server logic restricted.']
        ]
    ],
    'base64-image-pattern' => [
        'title' => 'Base64 Pattern CSS', 'desc' => 'Convert a Base64 image payload into seamless CSS background.', 'category' => 'dev-tools', 'icon' => 'B64', 'handler' => 'CssHandler', 'action' => 'base64Pattern',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'b64', 'type' => 'textarea', 'label' => 'Base64 image/png string', 'required' => true]
        ]
    ],
    'web-safe-fonts' => [
        'title' => 'Web Safe Fonts', 'desc' => 'Quickly preview standard system UI fonts and their CSS stacks.', 'category' => 'dev-tools', 'icon' => 'Aa', 'handler' => 'CssHandler', 'action' => 'webFonts',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Preview Text', 'value' => 'The quick brown fox jumps over the lazy dog.', 'required' => true]
        ]
    ],

    // --- SOCIAL MEDIA & FANCY TEXT (PHASE 15 BATCH 3) ---
    'youtube-thumbnail-downloader' => [
        'title' => 'YouTube Thumbnail Downloader', 'desc' => 'Instantly grab Max Res (HD) thumbnails from any YouTube video URL.', 'category' => 'social-tools', 'icon' => '▶️', 'handler' => 'SocialHandler', 'action' => 'ytThumbnail',
        'inputs' => [
            ['name' => 'url', 'type' => 'text', 'label' => 'YouTube Video URL', 'placeholder' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'required' => true]
        ]
    ],
    'fancy-font-generator' => [
        'title' => 'Instagram Fonts Generator', 'desc' => 'Generate cursive, bold, italic, and fancy text for Instagram/X bios.', 'category' => 'social-tools', 'icon' => '𝓕', 'handler' => 'SocialHandler', 'action' => 'fancyFonts',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter normal text', 'value' => 'Hello World', 'required' => true]
        ]
    ],
    'invisible-text-generator' => [
        'title' => 'Invisible Text Generator', 'desc' => 'Copy paste empty characters (Hangul Filler) for blank names or messages.', 'category' => 'social-tools', 'icon' => '👻', 'handler' => 'SocialHandler', 'action' => 'invisibleText',
        'inputs' => []
    ],
    'kaomoji-lenny-faces' => [
        'title' => 'Kaomoji & Lenny Faces', 'desc' => 'A curated list of Japanese text emoticons ready to copy and paste.', 'category' => 'social-tools', 'icon' => '( ͡° ͜ʖ ͡°)', 'handler' => 'SocialHandler', 'action' => 'kaomoji',
        'inputs' => []
    ],
    'braille-translator' => [
        'title' => 'Braille Translator', 'desc' => 'Convert standard English text into Braille unicode characters visually.', 'category' => 'social-tools', 'icon' => '⠃', 'handler' => 'SocialHandler', 'action' => 'braille',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter text to translate', 'value' => 'Braille is amazing', 'required' => true]
        ]
    ],
    'vaporwave-text-generator' => [
        'title' => 'Vaporwave / Aesthetic Text', 'desc' => 'Ｃｏｎｖｅｒｔ　ｔｅｘｔ　ｉｎｔｏ　ｆｕｌｌｗｉｄｔｈ　ａｅｓｔｈｅｔｉｃ．', 'category' => 'social-tools', 'icon' => '🌴', 'handler' => 'SocialHandler', 'action' => 'vaporwave',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Enter text', 'value' => 'vaporwave aesthetic', 'required' => true]
        ]
    ],
    'zalgo-text-generator' => [
        'title' => 'Zalgo Glitch Text', 'desc' => 'G̷e̷n̷e̷r̷a̷t̷e̷ ̷c̷r̷e̷e̷p̷y̷ ̷g̷l̷i̷t̷c̷h̷e̷d̷ ̷t̷e̷x̷t̷ for memes and scary posts.', 'category' => 'social-tools', 'icon' => '̷Z̷', 'handler' => 'SocialHandler', 'action' => 'zalgo',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Enter normal text', 'value' => 'I come from the dark', 'required' => true],
            ['name' => 'level', 'type' => 'select', 'label' => 'Glitch Level', 'options' => ['min'=>'Low','mid'=>'Medium','max'=>'High']]
        ]
    ],
    'hashtag-extractor' => [
        'title' => 'Hashtag Extractor', 'desc' => 'Extract all #hashtags from a block of text into a neat list.', 'category' => 'social-tools', 'icon' => '#', 'handler' => 'SocialHandler', 'action' => 'extractTags',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Paste caption or article here', 'required' => true]
        ]
    ],
    'click-to-tweet-link' => [
        'title' => 'Click to Tweet Link', 'desc' => 'Generate sharable Twitter/X URLs pre-filled with specific text.', 'category' => 'social-tools', 'icon' => '🐦', 'handler' => 'SocialHandler', 'action' => 'tweetLink',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Tweet Text', 'required' => true]
        ]
    ],
    'twitter-video-downloader' => [
        'title' => 'Platform Video Downloader', 'desc' => 'Information on setting up generic video downloading solutions using APIs.', 'category' => 'social-tools', 'icon' => '𝕏', 'handler' => 'SocialHandler', 'action' => 'socialInfo',
        'inputs' => [
            ['name' => 'platform', 'type' => 'select', 'label' => 'Select Platform', 'options' => ['twitter'=>'X / Twitter', 'facebook'=>'Facebook', 'tiktok'=>'TikTok']]
        ]
    ],
    'emoji-translator' => [
        'title' => 'Text to Emoji Translator', 'desc' => 'Replaces recognized words with their respective emojis 🌟.', 'category' => 'social-tools', 'icon' => '😀', 'handler' => 'SocialHandler', 'action' => 'emojiTranslate',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter text', 'value' => 'I love pizza and cats.', 'required' => true]
        ]
    ],
    'strikethrough-text' => [
        'title' => 'Strikethrough Text', 'desc' => 'G̶e̶n̶e̶r̶a̶t̶e̶ ̶s̶t̶r̶i̶k̶e̶t̶h̶r̶o̶u̶g̶h̶ text for social media platforms.', 'category' => 'social-tools', 'icon' => 'S̶', 'handler' => 'SocialHandler', 'action' => 'strike',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter text to cross out', 'required' => true]
        ]
    ],
    'upside-down-text' => [
        'title' => 'Upside Down Text', 'desc' => 'ʇxǝʇ uʍop ǝpısdn Generate inverted text for fun messages.', 'category' => 'social-tools', 'icon' => 'uʍop', 'handler' => 'SocialHandler', 'action' => 'upsideDown',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter text to invert', 'required' => true]
        ]
    ],
    'morse-code-translator' => [
        'title' => 'Morse Code Translator', 'desc' => 'Translate text to Morse code (... --- ...) and vice versa.', 'category' => 'social-tools', 'icon' => '.-.', 'handler' => 'SocialHandler', 'action' => 'morse',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Text or Morse Code', 'required' => true],
            ['name' => 'mode', 'type' => 'select', 'label' => 'Direction', 'options' => ['encode'=>'Text to Morse', 'decode'=>'Morse to Text']]
        ]
    ],

    // --- NETWORK & SECURITY (PHASE 15 BATCH 4) ---
    'what-is-my-ip' => [
        'title' => 'What is My IP Address?', 'desc' => 'Instantly discover your public IPv4/IPv6 address and basic network details.', 'category' => 'dev-tools', 'icon' => '🌐', 'handler' => 'NetworkHandler', 'action' => 'myIp',
        'inputs' => []
    ],
    'subnet-calculator' => [
        'title' => 'IPv4 Subnet Calculator', 'desc' => 'Calculate network ranges, mask, and hosts from an IP and CIDR.', 'category' => 'dev-tools', 'icon' => '🖩', 'handler' => 'NetworkHandler', 'action' => 'subnetCalc',
        'inputs' => [
            ['name' => 'ip', 'type' => 'text', 'label' => 'IP Address', 'value' => '192.168.1.0', 'required' => true],
            ['name' => 'cidr', 'type' => 'number', 'label' => 'CIDR (/xx)', 'value' => '24', 'required' => true]
        ]
    ],
    'ping-test' => [
        'title' => 'Ping Test', 'desc' => 'Check server latency and reachability (ICMP/TCP fallback proxy).', 'category' => 'dev-tools', 'icon' => '📡', 'handler' => 'NetworkHandler', 'action' => 'pingTest',
        'inputs' => [
            ['name' => 'host', 'type' => 'text', 'label' => 'Domain or IP', 'placeholder' => 'google.com', 'required' => true]
        ]
    ],
    'port-scanner' => [
        'title' => 'Open Port Scanner', 'desc' => 'Scan common server ports (80, 443, 21, 22) to see if they are open.', 'category' => 'dev-tools', 'icon' => '🚪', 'handler' => 'NetworkHandler', 'action' => 'portScanner',
        'inputs' => [
            ['name' => 'host', 'type' => 'text', 'label' => 'Domain or IP', 'placeholder' => 'example.com', 'required' => true]
        ]
    ],
    'ssl-checker' => [
        'title' => '[Ultra Bst Pro] SSL Certificate Checker', 'desc' => 'Verify SSL/TLS certificate validity, issuer, and expiration date.', 'category' => 'security-tools', 'icon' => 'fa-solid fa-certificate', 'handler' => 'NetworkHandler', 'action' => 'sslChecker',
        'inputs' => [
            ['name' => 'domain', 'type' => 'text', 'label' => 'Domain Name', 'placeholder' => 'example.com', 'required' => true]
        ]
    ],
    'http2-checker' => [
        'title' => 'HTTP/2 Protocol Checker', 'desc' => 'Test if a website supports the faster HTTP/2 protocol.', 'category' => 'dev-tools', 'icon' => '⚡', 'handler' => 'NetworkHandler', 'action' => 'http2Check',
        'inputs' => [
            ['name' => 'url', 'type' => 'text', 'label' => 'Website URL', 'placeholder' => 'https://example.com', 'required' => true]
        ]
    ],
    'password-strength' => [
        'title' => '[Ultra Bst Pro] Password Strength Checker', 'desc' => 'Analyze entropy and guessability of your passwords.', 'category' => 'security-tools', 'icon' => 'fa-solid fa-gauge-high', 'handler' => 'NetworkHandler', 'action' => 'passwordStrength',
        'inputs' => [
            ['name' => 'password', 'type' => 'text', 'label' => 'Enter Password', 'required' => true]
        ]
    ],
    'credit-card-validator' => [
        'title' => '[Ultra Bst Pro] Credit Card Validator', 'desc' => 'Validate CC numbers using the Luhn Algorithm (processed locally).', 'category' => 'security-tools', 'icon' => 'fa-solid fa-credit-card', 'handler' => 'NetworkHandler', 'action' => 'ccValidator',
        'inputs' => [
            ['name' => 'cc', 'type' => 'text', 'label' => 'Card Number', 'required' => true]
        ]
    ],
    'user-agent-parser' => [
        'title' => 'User Agent Parser', 'desc' => 'Extract Device, OS, and Browser information from a User Agent string.', 'category' => 'dev-tools', 'icon' => '📱', 'handler' => 'NetworkHandler', 'action' => 'uaParser',
        'inputs' => [
            ['name' => 'ua', 'type' => 'textarea', 'label' => 'User Agent String', 'required' => true]
        ]
    ],
    'dns-lookup' => [
        'title' => 'DNS Record Lookup', 'desc' => 'Fetch A, AAAA, MX, NS, and TXT records for any domain.', 'category' => 'dev-tools', 'icon' => '🔍', 'handler' => 'NetworkHandler', 'action' => 'dnsLookup',
        'inputs' => [
            ['name' => 'domain', 'type' => 'text', 'label' => 'Domain Name', 'placeholder' => 'example.com', 'required' => true]
        ]
    ],

    // --- FAKE DATA GENERATORS (PHASE 15 BATCH 5) ---
    'fake-profile-generator' => [
        'title' => 'Fake Identity Generator', 'desc' => 'Generate random realistic user profiles (Name, Email, Phone, Job).', 'category' => 'dev-tools', 'icon' => '👤', 'handler' => 'FakeDataHandler', 'action' => 'profileGen',
        'inputs' => [
            ['name' => 'gender', 'type' => 'select', 'label' => 'Gender', 'options' => ['any'=>'Random', 'male'=>'Male', 'female'=>'Female']]
        ]
    ],
    'fake-address-generator' => [
        'title' => 'Fake Address Generator', 'desc' => 'Create random street addresses, cities, and zip codes for testing.', 'category' => 'dev-tools', 'icon' => '🏠', 'handler' => 'FakeDataHandler', 'action' => 'addressGen',
        'inputs' => [
            ['name' => 'country', 'type' => 'select', 'label' => 'Country', 'options' => ['us'=>'United States', 'uk'=>'United Kingdom', 'ca'=>'Canada']]
        ]
    ],
    'dummy-credit-card' => [
        'title' => 'Dummy Credit Card Generator', 'desc' => 'Generate valid-format Credit Card numbers (Luhn checked) for software testing.', 'category' => 'dev-tools', 'icon' => '💳', 'handler' => 'FakeDataHandler', 'action' => 'dummyCC',
        'inputs' => [
            ['name' => 'network', 'type' => 'select', 'label' => 'Network', 'options' => ['visa'=>'Visa', 'mc'=>'Mastercard', 'amex'=>'Amex']]
        ]
    ],
    'random-joke-generator' => [
        'title' => 'Random Joke Generator', 'desc' => 'Get a random programming or dad joke at the click of a button.', 'category' => 'dev-tools', 'icon' => '😂', 'handler' => 'FakeDataHandler', 'action' => 'jokeGen',
        'inputs' => []
    ],
    'random-quote-generator' => [
        'title' => 'Random Quote Generator', 'desc' => 'Generate inspirational or famous quotes randomly.', 'category' => 'dev-tools', 'icon' => '💬', 'handler' => 'FakeDataHandler', 'action' => 'quoteGen',
        'inputs' => []
    ],
    'random-date-generator' => [
        'title' => 'Random Date Generator', 'desc' => 'Generate a random date within a specified range.', 'category' => 'dev-tools', 'icon' => '📅', 'handler' => 'FakeDataHandler', 'action' => 'dateGen',
        'inputs' => [
            ['name' => 'start', 'type' => 'number', 'label' => 'Start Year', 'value' => '1950', 'required' => true],
            ['name' => 'end', 'type' => 'number', 'label' => 'End Year', 'value' => '2030', 'required' => true]
        ]
    ],
    'random-location-generator' => [
        'title' => 'Random Country & City Generator', 'desc' => 'Pick a random country, capital, or city from our database.', 'category' => 'dev-tools', 'icon' => '🌍', 'handler' => 'FakeDataHandler', 'action' => 'locationGen',
        'inputs' => []
    ],
    'json-mock-data' => [
        'title' => 'JSON Mock Data Generator', 'desc' => 'Generate arrays of JSON objects containing random realistic data strings.', 'category' => 'dev-tools', 'icon' => '{ }', 'handler' => 'FakeDataHandler', 'action' => 'jsonMock',
        'inputs' => [
            ['name' => 'rows', 'type' => 'number', 'label' => 'Number of Rows', 'value' => '5', 'required' => true]
        ]
    ],
    'sql-mock-data' => [
        'title' => 'SQL Mock Data Generator', 'desc' => 'Generate a block of SQL INSERT statements filled with random data.', 'category' => 'dev-tools', 'icon' => '🗃️', 'handler' => 'FakeDataHandler', 'action' => 'sqlMock',
        'inputs' => [
            ['name' => 'rows', 'type' => 'number', 'label' => 'Number of Rows', 'value' => '5', 'required' => true]
        ]
    ],
    'csv-mock-data' => [
        'title' => 'CSV Mock Data Generator', 'desc' => 'Generate a dummy comma-separated CSV block for spreadsheet testing.', 'category' => 'dev-tools', 'icon' => '📊', 'handler' => 'FakeDataHandler', 'action' => 'csvMock',
        'inputs' => [
            ['name' => 'rows', 'type' => 'number', 'label' => 'Number of Rows', 'value' => '10', 'required' => true]
        ]
    ],
    'xml-mock-data' => [
        'title' => 'XML Mock Data Generator', 'desc' => 'Generate standard XML tree data filled with realistic dummy users.', 'category' => 'dev-tools', 'icon' => '< >', 'handler' => 'FakeDataHandler', 'action' => 'xmlMock',
        'inputs' => [
            ['name' => 'rows', 'type' => 'number', 'label' => 'Number of Records', 'value' => '3', 'required' => true]
        ]
    ],
    'regex-patterns' => [
        'title' => 'Common Regex Cheat Sheet', 'desc' => 'A curated list of common regex patterns (email, url, ips, phones) to copy.', 'category' => 'dev-tools', 'icon' => '.*', 'handler' => 'FakeDataHandler', 'action' => 'regexTemplates',
        'inputs' => []
    ],
    'cron-parser' => [
        'title' => 'Cron Expression Parser', 'desc' => 'Translate cron expressions (e.g. 0 0 * * *) into plain English schedules.', 'category' => 'dev-tools', 'icon' => '⏱️', 'handler' => 'FakeDataHandler', 'action' => 'cronParse',
        'inputs' => [
            ['name' => 'cron', 'type' => 'text', 'label' => 'Cron Expression', 'value' => '0 12 * * 1-5', 'required' => true]
        ]
    ],
    'uuid-v4-generator' => [
        'title' => 'UUID v4 Generator', 'desc' => 'Generate batches of universally unique identifier (UUID) v4 strings.', 'category' => 'dev-tools', 'icon' => '🆔', 'handler' => 'FakeDataHandler', 'action' => 'uuidGen',
        'inputs' => [
            ['name' => 'count', 'type' => 'number', 'label' => 'Quantity', 'value' => '5', 'required' => true]
        ]
    ],
    'lorem-ipsum-generator' => [
        'title' => 'Lorem Ipsum Generator', 'desc' => 'Generate random Latin placeholder text for designs and layouts.', 'category' => 'dev-tools', 'icon' => '📝', 'handler' => 'FakeDataHandler', 'action' => 'loremGen',
        'inputs' => [
            ['name' => 'paras', 'type' => 'number', 'label' => 'Paragraphs', 'value' => '3', 'required' => true]
        ]
    ],

    // --- IMAGE PROCESSING (PHASE 15 BATCH 6) ---
    'image-cropper' => [
        'title' => 'Image Cropper', 'desc' => 'Crop your images to any aspect ratio online instantly.', 'category' => 'image-tools', 'icon' => '✂️', 'handler' => 'ImageHandler', 'action' => 'imageCropper', 'controller' => 'ImageController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Upload Image (PNG/JPG)', 'required' => true],
            ['name' => 'aspect_ratio', 'type' => 'presets', 'label' => 'Aspect Ratio', 'options' => [
                ['label' => 'Free', 'value' => 'NaN'],
                ['label' => '1:1', 'value' => '1'],
                ['label' => '4:3', 'value' => '1.333'],
                ['label' => '16:9', 'value' => '1.777'],
                ['label' => '3:2', 'value' => '1.5'],
                ['label' => '9:16', 'value' => '0.5625']
            ]],
            ['name' => 'crop_x', 'type' => 'hidden', 'value' => '0'],
            ['name' => 'crop_y', 'type' => 'hidden', 'value' => '0'],
            ['name' => 'crop_width', 'type' => 'hidden', 'value' => '0'],
            ['name' => 'crop_height', 'type' => 'hidden', 'value' => '0']
        ]
    ],
    'image-compressor' => [
        'title' => 'Image Compressor', 'desc' => 'Significantly reduce the file size of your images down to kilobytes without quality loss.', 
        'category' => 'image-tools', 'icon' => '🗜️', 'handler' => 'ImageHandler', 'action' => 'compress', 'controller' => 'ImageController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select Image File', 'required' => true],
            ['name' => 'compression_quality', 'type' => 'range', 'label' => 'Compression Quality (%)', 'min' => '1', 'max' => '100', 'value' => '80'],
            ['name' => 'output_format', 'type' => 'cards', 'label' => 'Output Format', 'options' => [
                'auto' => ['icon' => '✨', 'title' => 'Auto', 'desc' => 'Keep Original'],
                'jpeg' => ['icon' => '📸', 'title' => 'JPEG', 'desc' => 'Best for Photos'],
                'png' => ['icon' => '🖼️', 'title' => 'PNG', 'desc' => 'Lossless'],
                'webp' => ['icon' => '🌐', 'title' => 'WebP', 'desc' => 'Next-Gen Size']
            ], 'value' => 'auto'],
            ['name' => 'resize_width', 'type' => 'number', 'label' => 'Max Width (px)', 'placeholder' => 'e.g. 1920'],
            ['name' => 'resize_height', 'type' => 'number', 'label' => 'Max Height (px)', 'placeholder' => 'e.g. 1080']
        ]
    ],
    'image-resizer' => [
        'title' => 'Image Resizer', 'desc' => 'Resize your images by defining exact pixels or percentages.', 
        'category' => 'image-tools', 'icon' => '↔️', 'handler' => 'ImageHandler', 'action' => 'resize', 'controller' => 'ImageController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select Image', 'required' => true],
            ['name' => 'presets', 'type' => 'presets', 'label' => 'Quick Presets', 'options' => [
                ['label' => 'HD (1920x1080)', 'w' => '1920', 'h' => '1080'],
                ['label' => '720p (1280x720)', 'w' => '1280', 'h' => '720'],
                ['label' => 'Instagram (1080x1080)', 'w' => '1080', 'h' => '1080'],
                ['label' => 'Facebook (1200x630)', 'w' => '1200', 'h' => '630']
            ]],
            ['name' => 'width', 'type' => 'number', 'label' => 'Width (px)', 'placeholder' => 'e.g. 800'],
            ['name' => 'height', 'type' => 'number', 'label' => 'Height (px)', 'placeholder' => 'e.g. 600'],
            ['name' => 'keep_aspect_ratio', 'type' => 'checkbox', 'label' => 'Keep Aspect Ratio 🔗', 'value' => '1', 'checked' => true]
        ]
    ],
    'image-converter' => [
        'title' => 'Image Converter', 'desc' => 'Convert images between popular formats instantly (PNG, JPG, WebP, GIF, BMP).', 
        'category' => 'image-tools', 'icon' => '🔄', 'handler' => 'ImageHandler', 'action' => 'convert', 'controller' => 'ImageController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select Image', 'required' => true],
            ['name' => 'output_format', 'type' => 'cards', 'label' => 'Convert To', 'options' => [
                'jpeg' => ['icon' => '📸', 'title' => 'JPEG', 'desc' => 'Standard'],
                'png' => ['icon' => '🖼️', 'title' => 'PNG', 'desc' => 'Lossless'],
                'webp' => ['icon' => '🌐', 'title' => 'WebP', 'desc' => 'Next-Gen'],
                'gif' => ['icon' => '🎬', 'title' => 'GIF', 'desc' => 'Animations'],
                'bmp' => ['icon' => '🔲', 'title' => 'BMP', 'desc' => 'Raw']
            ], 'value' => 'jpeg'],
            ['name' => 'quality', 'type' => 'range', 'label' => 'Quality (%)', 'min' => '1', 'max' => '100', 'value' => '90']
        ]
    ],
    'image-watermark' => [
        'title' => 'Image Watermark', 'desc' => 'Add text or logo watermarks to your images.', 
        'category' => 'image-tools', 'icon' => '©️', 'handler' => 'ImageHandler', 'action' => 'watermark', 'controller' => 'ImageController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select Image', 'required' => true],
            ['name' => 'watermark_text', 'type' => 'text', 'label' => 'Watermark Text', 'required' => true, 'placeholder' => 'CONFIDENTIAL'],
            ['name' => 'font_size', 'type' => 'range', 'label' => 'Font Size (px)', 'min' => '10', 'max' => '200', 'value' => '48'],
            ['name' => 'opacity', 'type' => 'range', 'label' => 'Opacity (%)', 'min' => '1', 'max' => '100', 'value' => '50'],
            ['name' => 'text_color', 'type' => 'color', 'label' => 'Text Color', 'value' => '#ffffff'],
            ['name' => 'position', 'type' => 'grid_3x3', 'label' => 'Watermark Position', 'value' => 'bottom_right']
        ]
    ],
    'readability-score' => [
        'title' => 'Readability Score', 'desc' => 'Calculate Flesch-Kincaid readability ease to see how complex your writing is.', 'category' => 'text-tools', 'icon' => '📖', 'handler' => 'TextHandler', 'action' => 'readabilityScore',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'keyword-density' => [
        'title' => 'Keyword Density Checker', 'desc' => 'Find which words appear most frequently in your content for SEO analysis.', 'category' => 'text-tools', 'icon' => '📊', 'handler' => 'TextHandler', 'action' => 'keywordDensity',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'text-summarizer' => [
        'title' => 'Text Summarizer', 'desc' => 'Generate a shorter version of your text by extracting key sentences.', 'category' => 'text-tools', 'icon' => '📝', 'handler' => 'TextHandler', 'action' => 'textSummarizer',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Long Text', 'required' => true],
            ['name' => 'sentences', 'type' => 'number', 'label' => 'Summary Length (Sentences)', 'value' => '3']
        ]
    ],
    'emoji-remover' => [
        'title' => 'Emoji Remover', 'desc' => 'Stripped away all emojs and icons from your text for a clean string.', 'category' => 'text-tools', 'icon' => '🚫', 'handler' => 'TextHandler', 'action' => 'emojiRemover',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'invisible-char-remover' => [
        'title' => 'Invisible Char Remover', 'desc' => 'Remove Zero Width Spaces and other hidden characters that break formatting.', 'category' => 'text-tools', 'icon' => '👻', 'handler' => 'TextHandler', 'action' => 'invisibleCharRemover',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'lorem-ipsum-generator' => [
        'title' => 'Lorem Ipsum Generator', 'desc' => 'Create custom dummy text for your design mockups with flexible options.', 'category' => 'text-tools', 'icon' => '📜', 'handler' => 'TextHandler', 'action' => 'loremIpsum',
        'inputs' => [
            ['name' => 'paragraphs', 'type' => 'number', 'label' => 'Paragraphs', 'value' => '3'],
            ['name' => 'type', 'type' => 'select', 'label' => 'Type', 'options' => ['std'=>'Standard', 'words'=>'Words', 'bytes'=>'Bytes']]
        ]
    ],
    'random-sentence-generator' => [
        'title' => 'Random Sentence Generator', 'desc' => 'Generate completely random sentences for creative writing or testing.', 'category' => 'text-tools', 'icon' => '🎲', 'handler' => 'TextHandler', 'action' => 'randomSentence',
        'inputs' => [['name' => 'count', 'type' => 'number', 'label' => 'Number of Sentences', 'value' => '5']]
    ],
    'reading-time-calculator' => [
        'title' => 'Reading Time', 'desc' => 'Estimate how long it will take to read your text at average speeds.', 'category' => 'text-tools', 'icon' => '⏱️', 'handler' => 'TextHandler', 'action' => 'readingTimeCalc',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'speaking-time-calculator' => [
        'title' => 'Speaking Time', 'desc' => 'Estimate the duration for a speech based on word count.', 'category' => 'text-tools', 'icon' => '🎙️', 'handler' => 'TextHandler', 'action' => 'speakingTimeCalc',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'text-to-base64' => [
        'title' => 'Text to Base64 String', 'desc' => 'Convert plain text into a Base64 encoded string.', 'category' => 'text-tools', 'icon' => '64', 'handler' => 'TextHandler', 'action' => 'textToBase64',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'text-difference-checker' => [
        'title' => 'Text Difference (Diff)', 'desc' => 'Compare two text blocks to find additions and deletions.', 'category' => 'text-tools', 'icon' => '∆', 'handler' => 'TextHandler', 'action' => 'textDiff',
        'inputs' => [
            ['name' => 'text1', 'type' => 'textarea', 'label' => 'Original Text', 'required' => true],
            ['name' => 'text2', 'type' => 'textarea', 'label' => 'New Text', 'required' => true]
        ]
    ],
    'list-alphabetizer' => [
        'title' => 'List Alphabetizer', 'desc' => 'Sort lists alphabetically, by length, or even randomly.', 'category' => 'text-tools', 'icon' => 'A-Z', 'handler' => 'TextHandler', 'action' => 'textSorter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter List (One per line)', 'required' => true]]
    ],
    'string-scrambler' => [
        'title' => 'String Scrambler', 'desc' => 'Jumble the letters within each word while keeping the first and last intact.', 'category' => 'text-tools', 'icon' => '🌀', 'handler' => 'TextHandler', 'action' => 'wordScrambler',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'text-to-zalgo' => [
        'title' => 'Zalgo Text Generator', 'desc' => 'Create glitched, creepy text using diacritical marks.', 'category' => 'text-tools', 'icon' => 'Z', 'handler' => 'TextHandler', 'action' => 'zalgoText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'upside-down-text-gen' => [
        'title' => 'Upside Down Text', 'desc' => 'Flip your text vertically for a unique look.', 'category' => 'text-tools', 'icon' => 'U', 'handler' => 'TextHandler', 'action' => 'upsideDownText',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'rot13-encoder-decoder' => [
        'title' => 'ROT13 Encoder', 'desc' => 'Apply a simple Caesar cipher that replaces a letter with the 13th letter after it.', 'category' => 'text-tools', 'icon' => 'R', 'handler' => 'TextHandler', 'action' => 'rot13',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'text-to-morse-code' => [
        'title' => 'Morse Code Generator', 'desc' => 'Translate text into dots and dashes of international Morse code.', 'category' => 'text-tools', 'icon' => '...', 'handler' => 'TextHandler', 'action' => 'textToMorse',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'paragraph-counter-tool' => [
        'title' => 'Paragraph Counter', 'desc' => 'Count total paragraphs accurately within a long text block.', 'category' => 'text-tools', 'icon' => '¶', 'handler' => 'TextHandler', 'action' => 'paragraphCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'syllable-counter-tool' => [
        'title' => 'Syllable Counter', 'desc' => 'Calculate syllable counts to measure text rhythm.', 'category' => 'text-tools', 'icon' => 'S', 'handler' => 'TextHandler', 'action' => 'syllableCounter',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'vowel-consonant-count' => [
        'title' => 'Vowel & Consonant Counter', 'desc' => 'Get a breakdown of vowels, consonants, and other characters.', 'category' => 'text-tools', 'icon' => 'AEI', 'handler' => 'TextHandler', 'action' => 'vowelConsonantCount',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],
    'word-count-seo' => [
        'title' => 'SEO Word Counter', 'desc' => 'Advanced word counting with density, character distribution, and meta lengths.', 'category' => 'text-tools', 'icon' => 'W+', 'handler' => 'TextHandler', 'action' => 'wordCountSEO',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Content', 'required' => true]]
    ],
    'text-repeater-tool' => [
        'title' => 'Text Repeater', 'desc' => 'Loop a string or word hundreds of times instantly.', 'category' => 'text-tools', 'icon' => 'x10', 'handler' => 'TextHandler', 'action' => 'textRepeater',
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true],
            ['name' => 'times', 'type' => 'number', 'label' => 'Repetitions', 'value' => '10']
        ]
    ],
    'bionic-reading-generator' => [
        'title' => 'Bionic Reading Format', 'desc' => 'Enhance reading speed by bolding the first half of words.', 'category' => 'text-tools', 'icon' => 'B', 'handler' => 'TextHandler', 'action' => 'bionicReading',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true]]
    ],

    // --- COLOR & DESIGN UTILITIES (PHASE 16 BATCH 6) ---
    'hex-to-rgb-converter' => [
        'title' => 'HEX to RGB Converter', 'desc' => 'Convert HEX color codes to RGB values for web development.', 'category' => 'design-tools', 'icon' => 'H', 'handler' => 'CssHandler', 'action' => 'hexToRgb',
        'inputs' => [['name' => 'hex', 'type' => 'text', 'label' => 'HEX Code', 'value' => '#3b82f6', 'required' => true]]
    ],
    'rgb-to-hex-converter' => [
        'title' => 'RGB to HEX Converter', 'desc' => 'Convert RGB color values to HEX codes instantly.', 'category' => 'design-tools', 'icon' => 'R', 'handler' => 'CssHandler', 'action' => 'rgbToHex',
        'inputs' => [
            ['name' => 'r', 'type' => 'number', 'label' => 'Red (0-255)', 'value' => '59'],
            ['name' => 'g', 'type' => 'number', 'label' => 'Green (0-255)', 'value' => '130'],
            ['name' => 'b', 'type' => 'number', 'label' => 'Blue (0-255)', 'value' => '246']
        ]
    ],
    'hex-to-cmyk-converter' => [
        'title' => 'HEX to CMYK Converter', 'desc' => 'Convert web HEX colors to CMYK format for professional printing.', 'category' => 'design-tools', 'icon' => 'C', 'handler' => 'CssHandler', 'action' => 'hexToCmyk',
        'inputs' => [['name' => 'hex', 'type' => 'text', 'label' => 'HEX Code', 'value' => '#3b82f6']]
    ],
    'cmyk-to-hex-converter' => [
        'title' => 'CMYK to HEX Converter', 'desc' => 'Convert CMYK print colors back to HEX for digital use.', 'category' => 'design-tools', 'icon' => 'K', 'handler' => 'CssHandler', 'action' => 'cmykToHex',
        'inputs' => [
            ['name' => 'c', 'type' => 'number', 'label' => 'Cyan %', 'value' => '76'],
            ['name' => 'm', 'type' => 'number', 'label' => 'Magenta %', 'value' => '47'],
            ['name' => 'y', 'type' => 'number', 'label' => 'Yellow %', 'value' => '0'],
            ['name' => 'k', 'type' => 'number', 'label' => 'Black %', 'value' => '3']
        ]
    ],
    'hex-to-hsl-converter' => [
        'title' => 'HEX to HSL Converter', 'desc' => 'Convert HEX colors to HSL (Hue, Saturation, Lightness) format.', 'category' => 'design-tools', 'icon' => 'L', 'handler' => 'CssHandler', 'action' => 'hexToHsl',
        'inputs' => [['name' => 'hex', 'type' => 'text', 'label' => 'HEX Code', 'value' => '#3b82f6']]
    ],
    'hsl-to-hex-converter' => [
        'title' => 'HSL to HEX Converter', 'desc' => 'Translate HSL color values into web-ready HEX codes.', 'category' => 'design-tools', 'icon' => 'S', 'handler' => 'CssHandler', 'action' => 'hslToHex',
        'inputs' => [
            ['name' => 'h', 'type' => 'number', 'label' => 'Hue (0-360)', 'value' => '217'],
            ['name' => 's', 'type' => 'number', 'label' => 'Saturation %', 'value' => '91'],
            ['name' => 'l', 'type' => 'number', 'label' => 'Lightness %', 'value' => '60']
        ]
    ],
    'css-gradient-generator' => [
        'title' => 'CSS Gradient Generator', 'desc' => 'Create beautiful linear gradients with custom angles and colors.', 'category' => 'design-tools', 'icon' => 'G', 'handler' => 'CssHandler', 'action' => 'gradientGen',
        'inputs' => [
            ['name' => 'color1', 'type' => 'color', 'label' => 'Start Color', 'value' => '#ff7a59'],
            ['name' => 'color2', 'type' => 'color', 'label' => 'End Color', 'value' => '#3b82f6'],
            ['name' => 'angle', 'type' => 'number', 'label' => 'Angle (deg)', 'value' => '135']
        ]
    ],
    'css-triangle-generator' => [
        'title' => 'CSS Triangle Generator', 'desc' => 'Generate pure CSS code for triangles of any size, color, or direction.', 'category' => 'design-tools', 'icon' => '▲', 'handler' => 'CssHandler', 'action' => 'triangleGen',
        'inputs' => [
            ['name' => 'direction', 'type' => 'select', 'label' => 'Direction', 'options' => ['top'=>'Top', 'bottom'=>'Bottom', 'left'=>'Left', 'right'=>'Right']],
            ['name' => 'color', 'type' => 'color', 'label' => 'Color', 'value' => '#ff7a59'],
            ['name' => 'size', 'type' => 'number', 'label' => 'Size (px)', 'value' => '50']
        ]
    ],
    'css-ribbon-generator' => [
        'title' => 'CSS Ribbon Generator', 'desc' => 'Create stylish CSS ribbons for headers and labels with code to match.', 'category' => 'design-tools', 'icon' => '🎗️', 'handler' => 'CssHandler', 'action' => 'ribbonGen',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Ribbon Text', 'value' => 'Sale!'],
            ['name' => 'color', 'type' => 'color', 'label' => 'Color', 'value' => '#dc2626']
        ]
    ],
    'css-blob-generator' => [
        'title' => 'CSS Blob Generator', 'desc' => 'Generate organic, random blob shapes for modern UI layouts.', 'category' => 'design-tools', 'icon' => '💧', 'handler' => 'CssHandler', 'action' => 'blobGen',
        'inputs' => [['name' => 'color', 'type' => 'color', 'label' => 'Color', 'value' => '#ff7a59']]
    ],
    'css-text-shadow-generator' => [
        'title' => 'CSS Text Shadow', 'desc' => 'Design perfect text shadows with offsets, blur, and custom colors.', 'category' => 'design-tools', 'icon' => 'T', 'handler' => 'CssHandler', 'action' => 'textShadow',
        'inputs' => [
            ['name' => 'offset_x', 'type' => 'number', 'label' => 'X Offset', 'value' => '2'],
            ['name' => 'offset_y', 'type' => 'number', 'label' => 'Y Offset', 'value' => '2'],
            ['name' => 'blur', 'type' => 'number', 'label' => 'Blur Radius', 'value' => '4'],
            ['name' => 'color', 'type' => 'text', 'label' => 'Color (RGBA/Hex)', 'value' => 'rgba(0,0,0,0.5)']
        ]
    ],
    'css-button-generator' => [
        'title' => 'CSS Button Generator', 'desc' => 'Quickly design professional CSS buttons for your web projects.', 'category' => 'design-tools', 'icon' => '🔘', 'handler' => 'CssHandler', 'action' => 'buttonGen',
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Button Text', 'value' => 'Click Me'],
            ['name' => 'bg', 'type' => 'color', 'label' => 'Background', 'value' => '#ff7a59'],
            ['name' => 'radius', 'type' => 'number', 'label' => 'Radius (px)', 'value' => '8']
        ]
    ],
    'neumorphism-css-generator' => [
        'title' => 'Neumorphism Generator', 'desc' => 'Create soft-UI neumorphic designs with depth and subtle lighting effects.', 'category' => 'design-tools', 'icon' => '☁️', 'handler' => 'CssHandler', 'action' => 'neumorphismGen',
        'inputs' => [
            ['name' => 'color', 'type' => 'color', 'label' => 'Base Color', 'value' => '#e0e5ec'],
            ['name' => 'distance', 'type' => 'number', 'label' => 'Distance', 'value' => '9']
        ]
    ],
    'glassmorphism-css-generator' => [
        'title' => 'Glassmorphism Generator', 'desc' => 'Design the popular frosted glass effect with blur and transparency.', 'category' => 'design-tools', 'icon' => '🎐', 'handler' => 'CssHandler', 'action' => 'glassmorphismGen',
        'inputs' => [
            ['name' => 'blur', 'type' => 'number', 'label' => 'Blur Amount', 'value' => '10'],
            ['name' => 'transparency', 'type' => 'text', 'label' => 'Opacity (0-1)', 'value' => '0.2']
        ]
    ],
    'css-grid-layout-generator' => [
        'title' => 'CSS Grid Generator', 'desc' => 'Build complex CSS Grid layouts visually. Define columns, rows, and gaps.', 'category' => 'design-tools', 'icon' => '🔳', 'handler' => 'CssHandler', 'action' => 'gridGen',
        'inputs' => [
            ['name' => 'col', 'type' => 'number', 'label' => 'Columns', 'value' => '3'],
            ['name' => 'row', 'type' => 'number', 'label' => 'Rows', 'value' => '3'],
            ['name' => 'gap', 'type' => 'number', 'label' => 'Gap (px)', 'value' => '20']
        ]
    ],
    'css-flexbox-generator' => [
        'title' => 'CSS Flexbox Generator', 'desc' => 'Configure flex direction, alignment, and justification for your components.', 'category' => 'design-tools', 'icon' => '↔️', 'handler' => 'CssHandler', 'action' => 'flexGen',
        'inputs' => [
            ['name' => 'direction', 'type' => 'select', 'label' => 'Direction', 'options' => ['row'=>'Row', 'column'=>'Column']],
            ['name' => 'justify', 'type' => 'select', 'label' => 'Justify', 'options' => ['center'=>'Center', 'flex-start'=>'Start', 'flex-end'=>'End', 'space-between'=>'Between']],
            ['name' => 'align', 'type' => 'select', 'label' => 'Align', 'options' => ['center'=>'Center', 'flex-start'=>'Start', 'flex-end'=>'End']]
        ]
    ],
    'svg-wave-generator' => [
        'title' => 'SVG Wave Generator', 'desc' => 'Unique SVG waves for section dividers and hero backgrounds.', 'category' => 'design-tools', 'icon' => '🌊', 'handler' => 'CssHandler', 'action' => 'svgWaveGen',
        'inputs' => [['name' => 'color', 'type' => 'color', 'label' => 'Wave Color', 'value' => '#ff7a59']]
    ],
    'svg-pattern-generator' => [
        'title' => 'SVG Pattern Generator', 'desc' => 'Create repeatable SVG background patterns (dots, grids, diagonals).', 'category' => 'design-tools', 'icon' => '🏁', 'handler' => 'CssHandler', 'action' => 'svgPattern',
        'inputs' => [['name' => 'type', 'type' => 'select', 'label' => 'Pattern', 'options' => ['dots'=>'Dots', 'grid'=>'Grid', 'diagonal'=>'Diagonal']]]
    ],
    'tailwind-color-palette' => [
        'title' => 'Tailwind Palette Builder', 'desc' => 'Generate a full 50-900 color scale from any single HEX color code.', 'category' => 'design-tools', 'icon' => '🎨', 'handler' => 'CssHandler', 'action' => 'tailwindPalette',
        'inputs' => [['name' => 'color', 'type' => 'color', 'label' => 'Primary Color', 'value' => '#3b82f6']]
    ],
    'material-color-palette' => [
        'title' => 'Material Design Colors', 'desc' => 'Explore the official Material Design color system palettes.', 'category' => 'design-tools', 'icon' => '🖌️', 'handler' => 'CssHandler', 'action' => 'materialPalette',
        'inputs' => [['name' => 'hue', 'type' => 'select', 'label' => 'Hue', 'options' => ['blue'=>'Blue', 'red'=>'Red', 'green'=>'Green', 'orange'=>'Orange', 'purple'=>'Purple']]]
    ],

    // --- MATH & SCIENCE (PHASE 16 BATCH 7) ---
    'scientific-calculator' => [
        'title' => 'Scientific Calculator', 'desc' => 'Perform complex mathematical calculations with scientific notation and functions.', 'category' => 'math-calculators', 'icon' => '🧮', 'handler' => 'MathHandler', 'action' => 'scientific',
        'inputs' => [['name' => 'exp', 'type' => 'text', 'label' => 'Expression', 'value' => 'sin(45) + log(100)', 'required' => true]]
    ],
    'fraction-calculator-tool' => [
        'title' => 'Fraction Calculator', 'desc' => 'Add, subtract, multiply, and divide fractions easily with step-by-step results.', 'category' => 'math-calculators', 'icon' => '½', 'handler' => 'MathHandler', 'action' => 'fraction',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Fraction Operation', 'placeholder' => '1/2 + 2/3', 'required' => true]]
    ],
    'probability-calculator' => [
        'title' => 'Probability Calculator', 'desc' => 'Calculate binomial and normal distribution probabilities for statistical analysis.', 'category' => 'math-calculators', 'icon' => '🎲', 'handler' => 'MathHandler', 'action' => 'probability',
        'inputs' => [
            ['name' => 'n', 'type' => 'number', 'label' => 'Number of Trials (n)', 'value' => '10'],
            ['name' => 'k', 'type' => 'number', 'label' => 'Successes (k)', 'value' => '5'],
            ['name' => 'p', 'type' => 'text', 'label' => 'Probability (p)', 'value' => '0.5']
        ]
    ],
    'standard-deviation-calc' => [
        'title' => 'Standard Deviation Calculator', 'desc' => 'Calculate sample and population standard deviation from a set of numbers.', 'category' => 'math-calculators', 'icon' => 'σ', 'handler' => 'MathHandler', 'action' => 'stdDev',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Numbers (comma separated)', 'required' => true]]
    ],
    'matrix-ops-calculator' => [
        'title' => 'Matrix Calculator', 'desc' => 'Perform matrix addition, subtraction, and multiplication on user-defined grids.', 'category' => 'math-calculators', 'icon' => '▦', 'handler' => 'MathHandler', 'action' => 'matrix',
        'inputs' => [['name' => 'size', 'type' => 'number', 'label' => 'Matrix Size (N x N)', 'value' => '3']]
    ],
    'prime-number-checker-tool' => [
        'title' => 'Prime Number Checker', 'desc' => 'Instantly check if a number is prime and find its prime factorization.', 'category' => 'math-calculators', 'icon' => '17', 'handler' => 'MathHandler', 'action' => 'primeChecker',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Number to Check', 'required' => true]]
    ],
    'factorial-calculator-link' => [
        'title' => 'Factorial Calculator', 'desc' => 'Calculate the factorial of integers (n!) for permutations and combinations.', 'category' => 'math-calculators', 'icon' => '!', 'handler' => 'MathHandler', 'action' => 'factorial',
        'inputs' => [['name' => 'num', 'type' => 'number', 'label' => 'Number (n)', 'required' => true]]
    ],
    'fibonacci-sequence-gen' => [
        'title' => 'Fibonacci Generator', 'desc' => 'Generate a sequence of Fibonacci numbers up to a specific limit.', 'category' => 'math-calculators', 'icon' => '🌀', 'handler' => 'MathHandler', 'action' => 'fibonacci',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'N-th Term', 'value' => '20']]
    ],
    'random-number-generator-tool' => [
        'title' => 'Random Number Generator', 'desc' => 'Generate secure random numbers within a specified range.', 'category' => 'math-calculators', 'icon' => '🎰', 'handler' => 'MathHandler', 'action' => 'randomNum',
        'inputs' => [
            ['name' => 'min', 'type' => 'number', 'label' => 'Minimum', 'value' => '1'],
            ['name' => 'max', 'type' => 'number', 'label' => 'Maximum', 'value' => '100']
        ]
    ],
    'physics-velocity-calculator' => [
        'title' => 'Velocity Calculator', 'desc' => 'Solve physics problems involving distance, time, and average velocity.', 'category' => 'math-calculators', 'icon' => '🚀', 'handler' => 'MathHandler', 'action' => 'velocity',
        'inputs' => [
            ['name' => 'd', 'type' => 'number', 'label' => 'Distance (m)', 'value' => '100'],
            ['name' => 't', 'type' => 'number', 'label' => 'Time (s)', 'value' => '10']
        ]
    ],
    'molecular-weight-calculator' => [
        'title' => 'Molecular Weight Calculator', 'desc' => 'Calculate the molar mass of a chemical compound by its formula.', 'category' => 'math-calculators', 'icon' => '🧪', 'handler' => 'MathHandler', 'action' => 'molecularWeight',
        'inputs' => [['name' => 'formula', 'type' => 'text', 'label' => 'Chemical Formula', 'value' => 'H2O']]
    ],
    'geometry-calculator-all' => [
        'title' => 'Geometry Calculator', 'desc' => 'Calculate area, volume, and perimeter for various geometric shapes.', 'category' => 'math-calculators', 'icon' => '📐', 'handler' => 'MathHandler', 'action' => 'areaCircle',
        'inputs' => [['name' => 'radius', 'type' => 'number', 'label' => 'Radius', 'value' => '5']]
    ],
    'mean-median-mode-calc' => [
        'title' => 'Mean, Median, Mode', 'desc' => 'Statistical summary tool to find the central tendency of a data set.', 'category' => 'math-calculators', 'icon' => 'M', 'handler' => 'MathHandler', 'action' => 'meanMedianMode',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Numbers (comma separated)', 'required' => true]]
    ],
    'logarithm-calculator-tool' => [
        'title' => 'Logarithm Calculator', 'desc' => 'Calculate logs for base 10, base E (natural), and base 2.', 'category' => 'math-calculators', 'icon' => 'ln', 'handler' => 'MathHandler', 'action' => 'logarithm',
        'inputs' => [['name' => 'text', 'type' => 'number', 'label' => 'Value (x)', 'required' => true]]
    ],
    'proportion-calculator-tool' => [
        'title' => 'Proportion Calculator', 'desc' => 'Solve for X in the proportion A/B = C/D.', 'category' => 'math-calculators', 'icon' => '::', 'handler' => 'MathHandler', 'action' => 'proportion',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'A', 'value' => '10'],
            ['name' => 'b', 'type' => 'number', 'label' => 'B', 'value' => '20'],
            ['name' => 'c', 'type' => 'number', 'label' => 'C', 'value' => '30']
        ]
    ],
    'significant-figures-tool' => [
        'title' => 'Significant Figures Counter', 'desc' => 'Identify the number of significant digits in a scientific measurement.', 'category' => 'math-calculators', 'icon' => '0.0', 'handler' => 'MathHandler', 'action' => 'sigFigs',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Measurement', 'value' => '0.00123']]
    ],
    'precision-rounding-tool' => [
        'title' => 'Rounding Tool', 'desc' => 'Round numbers to the nearest decimal, floor, or ceiling value.', 'category' => 'math-calculators', 'icon' => '≈', 'handler' => 'MathHandler', 'action' => 'rounding',
        'inputs' => [
            ['name' => 'text', 'type' => 'number', 'label' => 'Number', 'value' => '12.3456'],
            ['name' => 'precision', 'type' => 'number', 'label' => 'Decimals', 'value' => '2']
        ]
    ],
    'quadratic-equation-solver-tool' => [
        'title' => 'Quadratic Equation Solver', 'desc' => 'Find the roots of a quadratic equation (ax² + bx + c = 0).', 'category' => 'math-calculators', 'icon' => 'x²', 'handler' => 'MathHandler', 'action' => 'quadratic',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'a', 'value' => '1'],
            ['name' => 'b', 'type' => 'number', 'label' => 'b', 'value' => '-5'],
            ['name' => 'c', 'type' => 'number', 'label' => 'c', 'value' => '6']
        ]
    ],
    'complex-number-calc' => [
        'title' => 'Complex Number Calculator', 'desc' => 'Perform arithmetic operations with complex numbers (a + bi).', 'category' => 'math-calculators', 'icon' => 'i', 'handler' => 'MathHandler', 'action' => 'complex',
        'inputs' => [
            ['name' => 'r1', 'type' => 'number', 'label' => 'Real Part 1', 'value' => '1'],
            ['name' => 'i1', 'type' => 'number', 'label' => 'Imaginary 1', 'value' => '2'],
            ['name' => 'r2', 'type' => 'number', 'label' => 'Real Part 2', 'value' => '3'],
            ['name' => 'i2', 'type' => 'number', 'label' => 'Imaginary 2', 'value' => '4']
        ]
    ],
    'gcd-lcm-calculator-tool' => [
        'title' => 'GCD & LCM Calculator', 'desc' => 'Find the Greatest Common Divisor and Least Common Multiple of two numbers.', 'category' => 'math-calculators', 'icon' => 'G|L', 'handler' => 'MathHandler', 'action' => 'lcmGcd',
        'inputs' => [
            ['name' => 'num1', 'type' => 'number', 'label' => 'Number 1', 'value' => '12'],
            ['name' => 'num2', 'type' => 'number', 'label' => 'Number 2', 'value' => '18']
        ]
    ],
    'truth-table-logic-gen' => [
        'title' => 'Truth Table Generator', 'desc' => 'Generate logical truth tables for Boolean expressions.', 'category' => 'math-calculators', 'icon' => 'TF', 'handler' => 'MathHandler', 'action' => 'truthTable',
        'inputs' => [['name' => 'exp', 'type' => 'text', 'label' => 'Logical Exp', 'value' => 'A AND B']]
    ],
    'binary-math-calc' => [
        'title' => 'Binary Math Calculator', 'desc' => 'Perform addition and subtraction on binary number strings.', 'category' => 'math-calculators', 'icon' => '01+', 'handler' => 'MathHandler', 'action' => 'addition',
        'inputs' => [['name' => 'num1', 'type' => 'text', 'label' => 'Binary 1', 'value' => '1010'], ['name' => 'num2', 'type' => 'text', 'label' => 'Binary 2', 'value' => '1100']]
    ],
    'base-n-converter' => [
        'title' => 'Any Base Converter', 'desc' => 'Convert numbers between base 2, 8, 10, 16, and custom bases.', 'category' => 'math-calculators', 'icon' => 'N', 'handler' => 'MathHandler', 'action' => 'multiplication',
        'inputs' => [['name' => 'num1', 'type' => 'text', 'label' => 'Original', 'value' => '255']]
    ],
    'percentage-change-calc' => [
        'title' => 'Percentage Change', 'desc' => 'Calculate percentage increase or decrease between two values.', 'category' => 'math-calculators', 'icon' => '±%', 'handler' => 'MathHandler', 'action' => 'percentDifference',
        'inputs' => [
            ['name' => 'initial', 'type' => 'number', 'label' => 'Original Value', 'value' => '100'],
            ['name' => 'final', 'type' => 'number', 'label' => 'New Value', 'value' => '150']
        ]
    ],
    'arithmetic-ratio-calculator' => [
        'title' => 'Ratio Calculator', 'desc' => 'Simplify ratios or solve for a missing value in a proportional ratio.', 'category' => 'math-calculators', 'icon' => '1:2', 'handler' => 'MathHandler', 'action' => 'ratio',
        'inputs' => [
            ['name' => 'a', 'type' => 'number', 'label' => 'A', 'value' => '1'],
            ['name' => 'b', 'type' => 'number', 'label' => 'B', 'value' => '2']
        ]
    ],

    // --- UNITS & MEASUREMENTS (PHASE 16 BATCH 8) ---
    'length-converter-universal' => [
        'title' => 'Universal Length Converter', 'desc' => 'Convert between meters, feet, inches, kilometers, miles, and yards.', 'category' => 'unit-converters', 'icon' => '📏', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['m'=>'Meters', 'ft'=>'Feet', 'in'=>'Inches', 'km'=>'Kilometers', 'mi'=>'Miles']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['ft'=>'Feet', 'm'=>'Meters', 'in'=>'Inches', 'km'=>'Kilometers', 'mi'=>'Miles']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'length']
        ]
    ],
    'weight-mass-converter' => [
        'title' => 'Weight & Mass Converter', 'desc' => 'Convert between kilograms, grams, pounds, and ounces accurately.', 'category' => 'unit-converters', 'icon' => '⚖️', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['kg'=>'Kilograms', 'lb'=>'Pounds', 'g'=>'Grams', 'oz'=>'Ounces']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['lb'=>'Pounds', 'kg'=>'Kilograms', 'g'=>'Grams', 'oz'=>'Ounces']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'weight']
        ]
    ],
    'temperature-converter-all' => [
        'title' => 'Temperature Converter', 'desc' => 'Convert between Celsius, Fahrenheit, and Kelvin temperature scales.', 'category' => 'unit-converters', 'icon' => '🌡️', 'handler' => 'UnitHandler', 'action' => 'celsiusToFahrenheit',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Celsius (°C)', 'value' => '0']]
    ],
    'area-converter-tool' => [
        'title' => 'Area Converter', 'desc' => 'Convert square meters, square feet, acres, and hectares.', 'category' => 'unit-converters', 'icon' => '🗺️', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['m2'=>'Sq Meters', 'ft2'=>'Sq Feet']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['ft2'=>'Sq Feet', 'm2'=>'Sq Meters']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'length']
        ]
    ],
    'volume-capacity-converter' => [
        'title' => 'Volume Converter', 'desc' => 'Convert liters, gallons, cubic meters, and fluid ounces.', 'category' => 'unit-converters', 'icon' => '🥛', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['l'=>'Liters', 'gal'=>'Gallons']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['gal'=>'Gallons', 'l'=>'Liters']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'weight']
        ]
    ],
    'pressure-converter-tool' => [
        'title' => 'Pressure Converter', 'desc' => 'Convert between Pascal, Bar, PSI, and Atmosphere units.', 'category' => 'unit-converters', 'icon' => '🎈', 'handler' => 'UnitHandler', 'action' => 'pressure',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['pa'=>'Pascal', 'bar'=>'Bar', 'psi'=>'PSI', 'atm'=>'Atmosphere']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['bar'=>'Bar', 'pa'=>'Pascal', 'psi'=>'PSI', 'atm'=>'Atmosphere']]
        ]
    ],
    'speed-velocity-converter' => [
        'title' => 'Speed Converter', 'desc' => 'Convert km/h, mph, knots, and meters per second.', 'category' => 'unit-converters', 'icon' => '🏎️', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '100'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['km'=>'km/h', 'mi'=>'mph']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['mi'=>'mph', 'km'=>'km/h']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'length']
        ]
    ],
    'time-units-converter-tool' => [
        'title' => 'Time Converter', 'desc' => 'Convert between seconds, minutes, hours, days, weeks, and years.', 'category' => 'unit-converters', 'icon' => '⏱️', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['s'=>'Seconds', 'min'=>'Minutes', 'h'=>'Hours', 'd'=>'Days', 'w'=>'Weeks', 'y'=>'Years']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['min'=>'Minutes', 's'=>'Seconds', 'h'=>'Hours', 'd'=>'Days', 'w'=>'Weeks', 'y'=>'Years']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'time']
        ]
    ],
    'energy-work-converter' => [
        'title' => 'Energy Converter', 'desc' => 'Convert Joules, Calories, Kilowatt-hours, and British Thermal Units.', 'category' => 'unit-converters', 'icon' => '⚡', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['j'=>'Joules', 'cal'=>'Calories']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['cal'=>'Calories', 'j'=>'Joules']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'weight']
        ]
    ],
    'power-converter-tool' => [
        'title' => 'Power Converter', 'desc' => 'Convert Watts, Horsepower, and BTUs per hour.', 'category' => 'unit-converters', 'icon' => '🔌', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['w'=>'Watts', 'hp'=>'Horsepower']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['hp'=>'Horsepower', 'w'=>'Watts']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'weight']
        ]
    ],
    'data-transfer-rate-calc' => [
        'title' => 'Data Rate Converter', 'desc' => 'Convert Mbps, Gbps, and other network transfer speeds.', 'category' => 'unit-converters', 'icon' => '🌐', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '100'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['mb'=>'Mbps', 'gb'=>'Gbps']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['gb'=>'Gbps', 'mb'=>'Mbps']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'storage']
        ]
    ],
    'digital-storage-converter' => [
        'title' => 'Digital Storage Calc', 'desc' => 'Convert bytes, KB, MB, GB, TB, and PB accurately.', 'category' => 'unit-converters', 'icon' => '💾', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['kb'=>'KB', 'mb'=>'MB', 'gb'=>'GB', 'tb'=>'TB']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['mb'=>'MB', 'kb'=>'KB', 'gb'=>'GB', 'tb'=>'TB']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'storage']
        ]
    ],
    'angle-converter-tool' => [
        'title' => 'Angle Converter', 'desc' => 'Convert between degrees, radians, and gradians.', 'category' => 'unit-converters', 'icon' => '📐', 'handler' => 'UnitHandler', 'action' => 'angle',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '180'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['deg'=>'Degrees', 'rad'=>'Radians']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['rad'=>'Radians', 'deg'=>'Degrees']]
        ]
    ],
    'fuel-consumption-converter' => [
        'title' => 'Fuel Consumption', 'desc' => 'Convert L/100km to MPG and vice versa.', 'category' => 'unit-converters', 'icon' => '⛽', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '10'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['l'=>'L/100km', 'mi'=>'MPG']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['mi'=>'MPG', 'l'=>'L/100km']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'length']
        ]
    ],
    'torque-converter-calculator' => [
        'title' => 'Torque Converter', 'desc' => 'Convert Newton-meters to Pound-feet and other torque units.', 'category' => 'unit-converters', 'icon' => '🔧', 'handler' => 'UnitHandler', 'action' => 'pressure',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Nm', 'value' => '10']]
    ],
    'number-system-multibase' => [
        'title' => 'Number System Converter', 'desc' => 'Convert numbers between Binary, Octal, Decimal, and Hexadecimal.', 'category' => 'unit-converters', 'icon' => '🔢', 'handler' => 'MathHandler', 'action' => 'multiplication',
        'inputs' => [['name' => 'num1', 'type' => 'text', 'label' => 'Number', 'value' => '255']]
    ],
    'cooking-measurements-calc' => [
        'title' => 'Cooking Converter', 'desc' => 'Convert cups, tablespoons, teaspoons, and milliliters for recipes.', 'category' => 'unit-converters', 'icon' => '🍳', 'handler' => 'UnitHandler', 'action' => 'universalConvert',
        'inputs' => [
            ['name' => 'val', 'type' => 'number', 'label' => 'Value', 'value' => '1'],
            ['name' => 'from', 'type' => 'select', 'label' => 'From', 'options' => ['cup'=>'Cups', 'ml'=>'Milliliters']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To', 'options' => ['ml'=>'Milliliters', 'cup'=>'Cups']],
            ['name' => 'type', 'type' => 'hidden', 'value' => 'weight']
        ]
    ],
    'shoe-size-converter-global' => [
        'title' => 'Shoe Size Converter', 'desc' => 'Convert shoe sizes between US, UK, EU, and CM standards.', 'category' => 'unit-converters', 'icon' => '👟', 'handler' => 'UnitHandler', 'action' => 'shoeSize',
        'inputs' => [
            ['name' => 'size', 'type' => 'number', 'label' => 'US Size', 'value' => '9'],
            ['name' => 'gender', 'type' => 'select', 'label' => 'Gender', 'options' => ['men'=>'Men', 'women'=>'Women', 'kids'=>'Kids']]
        ]
    ],
    'clothing-size-converter' => [
        'title' => 'Clothing Size Converter', 'desc' => 'International size charts for shirts, pants, and dresses.', 'category' => 'unit-converters', 'icon' => '👕', 'handler' => 'UnitHandler', 'action' => 'shoeSize',
        'inputs' => [['name' => 'size', 'type' => 'text', 'label' => 'Size (S/M/L)', 'value' => 'M']]
    ],
    'ring-size-standard-calc' => [
        'title' => 'Ring Size Converter', 'desc' => 'Convert ring diameters to standard US/UK ring sizes.', 'category' => 'unit-converters', 'icon' => '💍', 'handler' => 'UnitHandler', 'action' => 'shoeSize',
        'inputs' => [['name' => 'size', 'type' => 'number', 'label' => 'Diameter (mm)', 'value' => '16.5']]
    ],
    'roman-numeral-converter' => [
        'title' => 'Roman Numeral Converter', 'desc' => 'Convert integers to Roman numerals and vice versa.', 'category' => 'unit-converters', 'icon' => 'IV', 'handler' => 'UnitHandler', 'action' => 'roman',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Integer', 'value' => '2024']]
    ],
    'scientific-notation-converter' => [
        'title' => 'Scientific Notation', 'desc' => 'Convert standard numbers to E-notation and vice versa.', 'category' => 'unit-converters', 'icon' => '1.0e', 'handler' => 'UnitHandler', 'action' => 'sciNotation',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Number', 'value' => '1234567']]
    ],
    'percentage-to-fraction-decimal' => [
        'title' => 'Percent to Fraction/Dec', 'desc' => 'Convert percentages to simplified fractions and decimals.', 'category' => 'unit-converters', 'icon' => '%/F', 'handler' => 'UnitHandler', 'action' => 'fractionPercent',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Percentage', 'value' => '75']]
    ],
    'decimal-to-fraction-calc' => [
        'title' => 'Decimal to Fraction', 'desc' => 'Convert any decimal number into its simplest fraction form.', 'category' => 'unit-converters', 'icon' => '0.5', 'handler' => 'MathHandler', 'action' => 'fraction',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Decimal', 'value' => '0.25']]
    ],
    'fraction-to-percentage-calc' => [
        'title' => 'Fraction to Percentage', 'desc' => 'Translate fractions into their percentage equivalent instantly.', 'category' => 'unit-converters', 'icon' => '1/4', 'handler' => 'UnitHandler', 'action' => 'fractionPercent',
        'inputs' => [['name' => 'val', 'type' => 'text', 'label' => 'Fraction', 'value' => '3/4']]
    ],

    // --- FINANCIAL & BUSINESS (PHASE 16 BATCH 9) ---
    'simple-interest-calculator' => [
        'title' => 'Simple Interest Calculator', 'desc' => 'Calculate simple interest on principal with rate and time.', 'category' => 'finance-tools', 'icon' => '💵', 'handler' => 'FinanceHandler', 'action' => 'simpleInterest',
        'inputs' => [
            ['name' => 'p', 'type' => 'number', 'label' => 'Principal ($)', 'value' => '1000'],
            ['name' => 'r', 'type' => 'number', 'label' => 'Rate (%)', 'value' => '5'],
            ['name' => 't', 'type' => 'number', 'label' => 'Time (Years)', 'value' => '1']
        ]
    ],
    'compound-interest-calculator' => [
        'title' => 'Compound Interest', 'desc' => 'Calculate the future value of an investment with compounding interest.', 'category' => 'finance-tools', 'icon' => '📈', 'handler' => 'FinanceHandler', 'action' => 'compoundInterest',
        'inputs' => [
            ['name' => 'p', 'type' => 'number', 'label' => 'Principal ($)', 'value' => '1000'],
            ['name' => 'r', 'type' => 'number', 'label' => 'Rate (%)', 'value' => '5'],
            ['name' => 't', 'type' => 'number', 'label' => 'Time (Years)', 'value' => '10']
        ]
    ],
    'loan-emi-calculator' => [
        'title' => 'EMI Calculator', 'desc' => 'Calculate Equated Monthly Installments for loans and mortgages.', 'category' => 'finance-tools', 'icon' => '🏦', 'handler' => 'FinanceHandler', 'action' => 'emi',
        'inputs' => [
            ['name' => 'p', 'type' => 'number', 'label' => 'Loan Amount', 'value' => '100000'],
            ['name' => 'r', 'type' => 'number', 'label' => 'Annual Rate (%)', 'value' => '10'],
            ['name' => 'n', 'type' => 'number', 'label' => 'Period (Months)', 'value' => '60']
        ]
    ],
    'mortgage-calculator-pro' => [
        'title' => 'Mortgage Calculator', 'desc' => 'Detailed mortgage planner with down payment and interest options.', 'category' => 'finance-tools', 'icon' => '🏠', 'handler' => 'FinanceHandler', 'action' => 'mortgage',
        'inputs' => [
            ['name' => 'price', 'type' => 'number', 'label' => 'Home Price', 'value' => '300000'],
            ['name' => 'down', 'type' => 'number', 'label' => 'Down Payment', 'value' => '60000']
        ]
    ],
    'retirement-401k-planner' => [
        'title' => 'Retirement Planner', 'desc' => 'Estimate your retirement savings based on current contributions.', 'category' => 'finance-tools', 'icon' => '⛳', 'handler' => 'FinanceHandler', 'action' => 'retirement',
        'inputs' => [['name' => 'age', 'type' => 'number', 'label' => 'Current Age', 'value' => '30']]
    ],
    'savings-goal-calculator' => [
        'title' => 'Savings Goal Calc', 'desc' => 'Calculate how long it takes to reach your financial savings goals.', 'category' => 'finance-tools', 'icon' => '💰', 'handler' => 'FinanceHandler', 'action' => 'savingsGoal',
        'inputs' => [
            ['name' => 'goal', 'type' => 'number', 'label' => 'Goal Amount', 'value' => '10000'],
            ['name' => 'saved', 'type' => 'number', 'label' => 'Already Saved', 'value' => '1000'],
            ['name' => 'monthly', 'type' => 'number', 'label' => 'Monthly Save', 'value' => '500']
        ]
    ],
    'income-tax-estimator' => [
        'title' => 'Income Tax Estimator', 'desc' => 'Quick calculation of estimated income tax and net take-home pay.', 'category' => 'finance-tools', 'icon' => '🏛️', 'handler' => 'FinanceHandler', 'action' => 'incomeTax',
        'inputs' => [['name' => 'income', 'type' => 'number', 'label' => 'Annual Income', 'value' => '50000']]
    ],
    'sales-tax-vat-calc' => [
        'title' => 'Sales Tax / VAT', 'desc' => 'Calculate sales tax or Value Added Tax (VAT) on any purchase.', 'category' => 'finance-tools', 'icon' => '🛒', 'handler' => 'FinanceHandler', 'action' => 'salesTax',
        'inputs' => [
            ['name' => 'amount', 'type' => 'number', 'label' => 'Base Amount', 'value' => '100'],
            ['name' => 'rate', 'type' => 'number', 'label' => 'Tax Rate (%)', 'value' => '7.5']
        ]
    ],
    'break-even-point-calculator' => [
        'title' => 'Break-Even Point', 'desc' => 'Find the number of units to sell to cover fixed and variable costs.', 'category' => 'finance-tools', 'icon' => '⚖️', 'handler' => 'FinanceHandler', 'action' => 'breakEven',
        'inputs' => [
            ['name' => 'fixed', 'type' => 'number', 'label' => 'Fixed Costs', 'value' => '1000'],
            ['name' => 'price', 'type' => 'number', 'label' => 'Unit Price', 'value' => '50'],
            ['name' => 'variable', 'type' => 'number', 'label' => 'Variable Cost/Unit', 'value' => '30']
        ]
    ],
    'cagr-growth-calculator' => [
        'title' => 'CAGR Calculator', 'desc' => 'Calculate Compound Annual Growth Rate for investments over time.', 'category' => 'finance-tools', 'icon' => '📶', 'handler' => 'FinanceHandler', 'action' => 'cagr',
        'inputs' => [
            ['name' => 'start', 'type' => 'number', 'label' => 'Starting Value', 'value' => '1000'],
            ['name' => 'end', 'type' => 'number', 'label' => 'Ending Value', 'value' => '2000'],
            ['name' => 't', 'type' => 'number', 'label' => 'Years', 'value' => '5']
        ]
    ],
    'currency-converter-static' => [
        'title' => 'Currency Converter', 'desc' => 'Calculate exchange rates between major global currencies.', 'category' => 'finance-tools', 'icon' => '💱', 'handler' => 'FinanceHandler', 'action' => 'currency',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'Amount', 'value' => '100']]
    ],
    'stock-profit-loss-calc' => [
        'title' => 'Stock Profit Calc', 'desc' => 'Calculate your net profit or loss from buying and selling stocks.', 'category' => 'finance-tools', 'icon' => '📉', 'handler' => 'FinanceHandler', 'action' => 'stockProfit',
        'inputs' => [
            ['name' => 'buy', 'type' => 'number', 'label' => 'Buy Price', 'value' => '150'],
            ['name' => 'sell', 'type' => 'number', 'label' => 'Sell Price', 'value' => '180'],
            ['name' => 'qty', 'type' => 'number', 'label' => 'Quantity', 'value' => '10']
        ]
    ],
    'credit-card-payoff-calc' => [
        'title' => 'Credit Card Payoff', 'desc' => 'Plan how long it will take to pay off your credit card balance.', 'category' => 'finance-tools', 'icon' => '💳', 'handler' => 'FinanceHandler', 'action' => 'creditCard',
        'inputs' => [
            ['name' => 'bal', 'type' => 'number', 'label' => 'Balance', 'value' => '5000'],
            ['name' => 'pay', 'type' => 'number', 'label' => 'Monthly Pay', 'value' => '200']
        ]
    ],
    'hourly-to-salary-converter' => [
        'title' => 'Hourly to Salary', 'desc' => 'Convert hourly wages to annual salary based on working hours.', 'category' => 'finance-tools', 'icon' => '🕓', 'handler' => 'FinanceHandler', 'action' => 'hourlyToSalary',
        'inputs' => [['name' => 'hr', 'type' => 'number', 'label' => 'Hourly Wage', 'value' => '25']]
    ],
    'crypto-satoshi-converter' => [
        'title' => 'Crypto Unit Converter', 'desc' => 'Convert Bitcoin (BTC) to Satoshis and other crypto denominations.', 'category' => 'finance-tools', 'icon' => '₿', 'handler' => 'FinanceHandler', 'action' => 'crypto',
        'inputs' => [['name' => 'val', 'type' => 'number', 'label' => 'BTC Amount', 'value' => '1']]
    ],
    'unit-price-comparison-tool' => [
        'title' => 'Unit Price Calc', 'desc' => 'Compare the unit price of two items to find the best value.', 'category' => 'finance-tools', 'icon' => '🏷️', 'handler' => 'MathHandler', 'action' => 'ratio',
        'inputs' => [['name' => 'a', 'type' => 'number', 'label' => 'Price', 'value' => '10'], ['name' => 'b', 'type' => 'number', 'label' => 'Quantity', 'value' => '5']]
    ],
    'dividend-yield-calculator' => [
        'title' => 'Dividend Yield', 'desc' => 'Calculate the dividend yield percentage for any stock.', 'category' => 'finance-tools', 'icon' => '☘️', 'handler' => 'MathHandler', 'action' => 'percentage',
        'inputs' => [['name' => 'value', 'type' => 'number', 'label' => 'Dividend', 'value' => '1'], ['name' => 'total', 'type' => 'number', 'label' => 'Price', 'value' => '20']]
    ],
    'pe-ratio-calculator' => [
        'title' => 'P/E Ratio Calculator', 'desc' => 'Calculate the Price-to-Earnings ratio for stock valuation.', 'category' => 'finance-tools', 'icon' => '📊', 'handler' => 'MathHandler', 'action' => 'ratio',
        'inputs' => [['name' => 'a', 'type' => 'number', 'label' => 'Price', 'value' => '150'], ['name' => 'b', 'type' => 'number', 'label' => 'Earnings', 'value' => '5']]
    ],
    'market-cap-calculator' => [
        'title' => 'Market Cap Calc', 'desc' => 'Calculate a company total market capitalization.', 'category' => 'finance-tools', 'icon' => '🏢', 'handler' => 'MathHandler', 'action' => 'multiplication',
        'inputs' => [['name' => 'num1', 'type' => 'number', 'label' => 'Price', 'value' => '100'], ['name' => 'num2', 'type' => 'number', 'label' => 'Shares (M)', 'value' => '50']]
    ],
    'annual-roi-calculator' => [
        'title' => 'Annual ROI Calc', 'desc' => 'Calculate annualized Return on Investment for long-term assets.', 'category' => 'finance-tools', 'icon' => '🔄', 'handler' => 'MathHandler', 'action' => 'roi',
        'inputs' => [['name' => 'invested', 'type' => 'number', 'label' => 'Invested', 'value' => '1000'], ['name' => 'returned', 'type' => 'number', 'label' => 'Returned', 'value' => '1500']]
    ],
    'markup-margin-calculator' => [
        'title' => 'Markup & Margin', 'desc' => 'Calculate markup percentage and gross margin for products.', 'category' => 'finance-tools', 'icon' => '📈', 'handler' => 'MathHandler', 'action' => 'markup',
        'inputs' => [['name' => 'cost', 'type' => 'number', 'label' => 'Cost', 'value' => '50'], ['name' => 'price', 'type' => 'number', 'label' => 'Price', 'value' => '80']]
    ],
    'margin-calculator-link' => [
        'title' => 'Gross Margin Calc', 'desc' => 'Quickly find the gross margin percentage of any sale.', 'category' => 'finance-tools', 'icon' => '💹', 'handler' => 'MathHandler', 'action' => 'margin',
        'inputs' => [['name' => 'cost', 'type' => 'number', 'label' => 'Cost', 'value' => '50'], ['name' => 'revenue', 'type' => 'number', 'label' => 'Revenue', 'value' => '80']]
    ],
    'discount-calculator-link' => [
        'title' => 'Discount Calculator', 'desc' => 'Find the final price after applying a percentage discount.', 'category' => 'finance-tools', 'icon' => '🏮', 'handler' => 'MathHandler', 'action' => 'discount',
        'inputs' => [['name' => 'price', 'type' => 'number', 'label' => 'Price', 'value' => '100'], ['name' => 'discount', 'type' => 'number', 'label' => 'Disc. %', 'value' => '20']]
    ],
    'tip-calculator-link' => [
        'title' => 'Tip Calculator', 'desc' => 'Calculate tips and split bills between multiple people.', 'category' => 'finance-tools', 'icon' => '🍽️', 'handler' => 'MathHandler', 'action' => 'tip',
        'inputs' => [['name' => 'bill', 'type' => 'number', 'label' => 'Bill', 'value' => '100'], ['name' => 'tip', 'type' => 'number', 'label' => 'Tip %', 'value' => '15']]
    ],
    'investment-returns-calc' => [
        'title' => 'Investment Returns', 'desc' => 'Basic calculator for total return on any financial investment.', 'category' => 'finance-tools', 'icon' => '💰', 'handler' => 'MathHandler', 'action' => 'roi',
        'inputs' => [['name' => 'invested', 'type' => 'number', 'label' => 'Principal', 'value' => '1000'], ['name' => 'returned', 'type' => 'number', 'label' => 'Final', 'value' => '1200']]
    ],

    // --- MISCELLANEOUS & FUN (PHASE 16 BATCH 10) ---
    'random-joke-generator-fun' => [
        'title' => 'Random Joke Gen', 'desc' => 'Get a fresh, funny random joke to brighten your day.', 'category' => 'miscellaneous', 'icon' => '😂', 'handler' => 'GeneratorHandler', 'action' => 'joke',
        'inputs' => []
    ],
    'random-quote-generator-pro' => [
        'title' => 'Inspirational Quotes', 'desc' => 'Generate famous and inspirational quotes from great minds.', 'category' => 'miscellaneous', 'icon' => '📜', 'handler' => 'GeneratorHandler', 'action' => 'quote',
        'inputs' => []
    ],
    'qr-generator' => [
        'title' => 'QR Code Generator', 'desc' => 'Create custom QR codes for URLs, text, WiFi, and contacts with live preview.', 
        'category' => 'miscellaneous', 'icon' => '🔳', 'handler' => 'GeneratorHandler', 'action' => 'qrGen', 'controller' => 'GeneratorController',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'qr_type', 'type' => 'tabs', 'label' => 'Data Type', 'options' => [
                'url' => ['icon' => '🔗', 'label' => 'URL'],
                'text' => ['icon' => '📝', 'label' => 'Text'],
                'wifi' => ['icon' => '📶', 'label' => 'WiFi'],
                'email' => ['icon' => '📧', 'label' => 'Email']
            ], 'value' => 'url'],
            ['name' => 'qr_content', 'type' => 'text', 'label' => 'Content', 'required' => true, 'placeholder' => 'https://example.com'],
            ['name' => 'size', 'type' => 'range', 'label' => 'Size (px)', 'min' => '100', 'max' => '1000', 'value' => '300'],
            ['name' => 'color_fg', 'type' => 'color', 'label' => 'Foreground Color', 'value' => '#000000'],
            ['name' => 'color_bg', 'type' => 'color', 'label' => 'Background Color', 'value' => '#ffffff']
        ]
    ],
    'barcode-generator-1d' => [
        'title' => 'Barcode Generator', 'desc' => 'Generate classic 1D barcodes for various numbering systems.', 'category' => 'miscellaneous', 'icon' => '║║', 'handler' => 'GeneratorHandler', 'action' => 'barcode',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Number', 'value' => '123456789']]
    ],
    'ascii-art-generator-tool' => [
        'title' => 'ASCII Art Gen', 'desc' => 'Convert simple text into beautiful large-scale ASCII banners.', 'category' => 'miscellaneous', 'icon' => '█', 'handler' => 'GeneratorHandler', 'action' => 'asciiArt',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Text', 'value' => 'HELLO']]
    ],
    'vaporwave-text-generator-fun' => [
        'title' => 'Vaporwave Text', 'desc' => 'Transform your text into the aesthetic full-width vaporwave style.', 'category' => 'miscellaneous', 'icon' => '🌴', 'handler' => 'GeneratorHandler', 'action' => 'vaporwave',
        'inputs' => [['name' => 'text', 'type' => 'text', 'label' => 'Text', 'value' => 'Aesthetic']]
    ],
    'emoji-search-copy-tool' => [
        'title' => 'Emoji Search', 'desc' => 'Quickly find and copy emojis for your social media and chats.', 'category' => 'miscellaneous', 'icon' => '😀', 'handler' => 'GeneratorHandler', 'action' => 'emojiSearch',
        'inputs' => [['name' => 'query', 'type' => 'text', 'label' => 'Search', 'value' => 'smile']]
    ],
    'kaomoji-library-lenny' => [
        'title' => 'Kaomoji Library', 'desc' => 'Browse and copy thousands of Japanese kaomoji and Lenny faces.', 'category' => 'miscellaneous', 'icon' => '(ツ)', 'handler' => 'GeneratorHandler', 'action' => 'kaomoji',
        'inputs' => []
    ],
    'password-strength-meter-calc' => [
        'title' => 'Password Strength', 'desc' => 'Analyze your password security and complexity in real-time.', 'category' => 'miscellaneous', 'icon' => '🛡️', 'handler' => 'GeneratorHandler', 'action' => 'passwordStrength',
        'inputs' => [['name' => 'text', 'type' => 'password', 'label' => 'Password', 'value' => '']]
    ],
    'typing-speed-test-latency' => [
        'title' => 'Typing Speed Test', 'desc' => 'Measure your typing speed and accuracy with this interactive test.', 'category' => 'miscellaneous', 'icon' => '⌨️', 'handler' => 'GeneratorHandler', 'action' => 'typingTest',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Type here', 'value' => '']]
    ],
    // --- PDF TOOLS ---
    'merge-pdfs' => [
        'title' => 'Merge PDF', 'desc' => 'Combine multiple PDF files into one single document instantly.', 
        'category' => 'pdf-tools', 'icon' => '📂', 'handler' => 'PdfHandler', 'action' => 'merge', 'controller' => 'PdfController',
        'inputs' => [['name' => 'files[]', 'type' => 'file', 'label' => 'Select PDF Files (Drag to reorder)', 'required' => true, 'multiple' => true, 'sortable' => true]]
    ],
    'split-pdf' => [
        'title' => 'Split PDF', 'desc' => 'Extract specific pages or ranges from a PDF document.', 
        'category' => 'pdf-tools', 'icon' => '✂️', 'handler' => 'PdfHandler', 'action' => 'split', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'pages_range', 'type' => 'text', 'label' => 'Custom Page Ranges', 'placeholder' => 'e.g., 1-5, 8, 11-13', 'required' => true],
            ['name' => 'extract_all', 'type' => 'checkbox', 'label' => 'Extract all pages as separate files', 'value' => '1']
        ]
    ],
    'compress-pdf' => [
        'title' => 'Compress PDF', 'desc' => 'Reduce the file size of your PDF while maintaining quality.', 
        'category' => 'pdf-tools', 'icon' => '📉', 'handler' => 'PdfHandler', 'action' => 'compress', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'compression_level', 'type' => 'cards', 'label' => 'Compression Level', 'options' => [
                'recommended' => ['icon' => '👌', 'title' => 'Recommended', 'desc' => 'Good Quality & Size'],
                'extreme' => ['icon' => '⚡', 'title' => 'Extreme', 'desc' => 'Lowest Quality/Smallest Size'],
                'low' => ['icon' => '💎', 'title' => 'High Quality', 'desc' => 'Low Compression']
            ], 'value' => 'recommended']
        ]
    ],
    'pdf-to-word' => [
        'title' => 'PDF to Word', 'desc' => 'Convert PDF documents to editable Microsoft Word files.', 
        'category' => 'pdf-tools', 'icon' => 'W', 'handler' => 'PdfHandler', 'action' => 'toWord', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'word-to-pdf' => [
        'title' => 'Word to PDF', 'desc' => 'Convert Microsoft Word documents (DOC/DOCX) to PDF format.', 
        'category' => 'pdf-tools', 'icon' => '📄', 'handler' => 'PdfHandler', 'action' => 'fromWord', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select Word File', 'required' => true]]
    ],
    'pdf-to-excel' => [
        'title' => 'PDF to Excel', 'desc' => 'Extract tables and data from PDF to Microsoft Excel.', 
        'category' => 'pdf-tools', 'icon' => 'X', 'handler' => 'PdfHandler', 'action' => 'toExcel', 'controller' => 'PdfController',
        'is_frontend_only' => true,
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'excel-to-pdf' => [
        'title' => 'Excel to PDF', 'desc' => 'Convert Microsoft Excel spreadsheets to PDF format.', 
        'category' => 'pdf-tools', 'icon' => '📊', 'handler' => 'PdfHandler', 'action' => 'fromExcel', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select Excel File', 'required' => true]]
    ],
    'pdf-to-ppt' => [
        'title' => 'PDF to PowerPoint', 'desc' => 'Convert PDF slides to editable PowerPoint presentations.', 
        'category' => 'pdf-tools', 'icon' => 'P', 'handler' => 'PdfHandler', 'action' => 'toPpt', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'ppt-to-pdf' => [
        'title' => 'PowerPoint to PDF', 'desc' => 'Convert PowerPoint (PPT/PPTX) presentations to PDF.', 
        'category' => 'pdf-tools', 'icon' => '🎬', 'handler' => 'PdfHandler', 'action' => 'fromPpt', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PPT File', 'required' => true]]
    ],
    'pdf-to-jpg' => [
        'title' => 'PDF to JPG', 'desc' => 'Convert each PDF page into a high-quality JPG image.', 
        'category' => 'pdf-tools', 'icon' => '🖼️', 'handler' => 'PdfHandler', 'action' => 'toJpg', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'quality', 'type' => 'select', 'label' => 'Quality/Resolution', 'options' => [
                'standard' => 'Standard (150 DPI)',
                'high' => 'High (300 DPI)',
                'maximum' => 'Maximum (600 DPI)'
            ], 'required' => true]
        ]
    ],
    'jpg-to-pdf' => [
        'title' => 'JPG to PDF', 'desc' => 'Convert images (JPG, PNG) into a professional PDF document.', 
        'category' => 'pdf-tools', 'icon' => '📷', 'handler' => 'PdfHandler', 'action' => 'fromJpg', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'files[]', 'type' => 'file', 'label' => 'Select Image Files', 'required' => true, 'multiple' => true],
            ['name' => 'quality', 'type' => 'select', 'label' => 'Quality/Resolution', 'options' => [
                'standard' => 'Standard (Good for Web)',
                'high' => 'High (Good for Print)',
                'maximum' => 'Maximum (Lossless, Huge File Size)'
            ], 'required' => true]
        ]
    ],
    'pdf-unlock' => [
        'title' => 'PDF Unlock', 'desc' => 'Remove passwords and permissions from your PDF files.', 
        'category' => 'pdf-tools', 'icon' => '🔓', 'handler' => 'PdfHandler', 'action' => 'unlock', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'pdf-protect' => [
        'title' => 'PDF Protect', 'desc' => 'Add a password and encrypt your PDF document.', 
        'category' => 'pdf-tools', 'icon' => '🔒', 'handler' => 'PdfHandler', 'action' => 'protect', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'user_password', 'type' => 'password', 'label' => 'User Password (to open)', 'required' => true],
            ['name' => 'permissions', 'type' => 'checkbox_group', 'label' => 'Permissions', 'options' => [
                'allow_print' => 'Allow Printing',
                'allow_copy' => 'Allow Copying',
                'allow_modify' => 'Allow Modifying'
            ]]
        ]
    ],
    'rotate-pdf' => [
        'title' => 'Rotate PDF', 'desc' => 'Permanently rotate pages in your PDF document.', 
        'category' => 'pdf-tools', 'icon' => '🔄', 'handler' => 'PdfHandler', 'action' => 'rotate', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'angle', 'type' => 'select', 'label' => 'Rotation Angle', 'options' => [
                '90' => 'Right 90°',
                '-90' => 'Left 90°',
                '180' => '180° Upside Down'
            ], 'required' => true],
            ['name' => 'pages_range', 'type' => 'text', 'label' => 'Page Range (Leave blank for all)', 'placeholder' => 'e.g., 1-3, 5']
        ]
    ],
    'crop-pdf' => [
        'title' => 'Crop PDF', 'desc' => 'Trim whitespace or crop specific areas of your PDF pages.', 
        'category' => 'pdf-tools', 'icon' => '📐', 'handler' => 'PdfHandler', 'action' => 'crop', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'pdf-editor' => [
        'title' => 'PDF Editor', 'desc' => 'Modify content, add text, images, or shapes to your PDF.', 
        'category' => 'pdf-tools', 'icon' => '🖊️', 'handler' => 'PdfHandler', 'action' => 'edit', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'pdf-metadata' => [
        'title' => 'PDF Metadata Editor', 'desc' => 'Edit author, title, keywords, and other PDF properties.', 
        'category' => 'pdf-tools', 'icon' => 'ℹ️', 'handler' => 'PdfHandler', 'action' => 'metadata', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'pdf-numbering' => [
        'title' => 'PDF Page Numbering', 'desc' => 'Add professional page numbers to your PDF documents.', 
        'category' => 'pdf-tools', 'icon' => '1️⃣', 'handler' => 'PdfHandler', 'action' => 'numbering', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'position', 'type' => 'select', 'label' => 'Position', 'options' => [
                'bottom_right' => 'Bottom Right',
                'bottom_center' => 'Bottom Center',
                'bottom_left' => 'Bottom Left',
                'top_right' => 'Top Right',
                'top_center' => 'Top Center',
                'top_left' => 'Top Left'
            ], 'required' => true],
            ['name' => 'format', 'type' => 'text', 'label' => 'Number Format', 'placeholder' => 'e.g., Page {n} of {p}', 'value' => 'Page {n} of {p}']
        ]
    ],
    'pdf-watermark' => [
        'title' => 'PDF Watermark', 'desc' => 'Add text or image watermarks to your PDF file.', 
        'category' => 'pdf-tools', 'icon' => '🏷️', 'handler' => 'PdfHandler', 'action' => 'watermark', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'watermark_text', 'type' => 'text', 'label' => 'Watermark Text', 'required' => true, 'placeholder' => 'CONFIDENTIAL'],
            ['name' => 'position', 'type' => 'select', 'label' => 'Position', 'options' => [
                'center' => 'Center',
                'top_left' => 'Top Left',
                'top_right' => 'Top Right',
                'bottom_left' => 'Bottom Left',
                'bottom_right' => 'Bottom Right'
            ]],
            ['name' => 'font_size', 'type' => 'number', 'label' => 'Font Size', 'value' => '50', 'min' => '10', 'max' => '200'],
            ['name' => 'opacity', 'type' => 'number', 'label' => 'Opacity %', 'value' => '50', 'min' => '1', 'max' => '100'],
            ['name' => 'text_color', 'type' => 'color', 'label' => 'Text Color', 'value' => '#ff0000'],
            ['name' => 'rotation', 'type' => 'select', 'label' => 'Rotation', 'options' => [
                '-45' => '-45 Degrees',
                '0' => '0 Degrees (None)',
                '45' => '45 Degrees'
            ]]
        ]
    ],
    'pdf-sign' => [
        'title' => 'Sign PDF', 'desc' => 'Digitally sign or add handwriting signatures to PDFs.', 
        'category' => 'pdf-tools', 'icon' => '✍️', 'handler' => 'PdfHandler', 'action' => 'sign', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],


    'organize-pdf' => [
        'title' => 'Organize PDF', 'desc' => 'Rearrange, delete, duplicate, and rotate pages via a visual grid.', 
        'category' => 'pdf-tools', 'icon' => '▦', 'handler' => 'PdfHandler', 'action' => 'organize', 'controller' => 'PdfController',
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'annotate-pdf' => [
        'title' => 'Annotate PDF', 'desc' => 'Highlight, strike-through, underline, add shapes, draw freehand.', 
        'category' => 'pdf-tools', 'icon' => '🖍️', 'handler' => 'PdfHandler', 'action' => 'annotate', 'controller' => 'PdfController',
        'is_frontend_only' => true,
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],
    'watermark-pdf' => [
        'title' => 'Watermark PDF', 'desc' => 'Add text or image watermarks to your PDF file.', 
        'category' => 'pdf-tools', 'icon' => '🏷️', 'handler' => 'PdfHandler', 'action' => 'watermark', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'watermark_text', 'type' => 'text', 'label' => 'Watermark Text', 'required' => true, 'placeholder' => 'e.g. CONFIDENTIAL'],
            ['name' => 'font_size', 'type' => 'range', 'label' => 'Font Size (pt)', 'min' => '12', 'max' => '144', 'value' => '48'],
            ['name' => 'opacity', 'type' => 'range', 'label' => 'Opacity (%)', 'min' => '1', 'max' => '100', 'value' => '50'],
            ['name' => 'text_color', 'type' => 'color', 'label' => 'Text Color', 'value' => '#ff0000'],
            ['name' => 'position', 'type' => 'grid_3x3', 'label' => 'Position', 'value' => 'center'],
            ['name' => 'rotation', 'type' => 'select', 'label' => 'Rotation', 'options' => [
                '0' => '0° Horizontal',
                '45' => '45° Diagonal',
                '90' => '90° Vertical',
                '-45' => '-45° Anti-Diagonal'
            ], 'value' => '45']
        ]
    ],
    'pdf-page-numbers' => [
        'title' => 'PDF Page Numbers', 'desc' => 'Add customizable page numbers with positioning.', 
        'category' => 'pdf-tools', 'icon' => '1️⃣', 'handler' => 'PdfHandler', 'action' => 'numbering', 'controller' => 'PdfController',
        'inputs' => [
            ['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true],
            ['name' => 'position', 'type' => 'select', 'label' => 'Position', 'options' => [
                'bottom_right' => 'Bottom Right',
                'bottom_center' => 'Bottom Center',
                'bottom_left' => 'Bottom Left',
                'top_right' => 'Top Right',
                'top_center' => 'Top Center',
                'top_left' => 'Top Left'
            ], 'value' => 'bottom_center'],
            ['name' => 'format', 'type' => 'text', 'label' => 'Number Format', 'placeholder' => 'e.g., Page {n} of {p}', 'value' => 'Page {n} of {p}']
        ]
    ],
    'ocr-pdf' => [
        'title' => 'OCR PDF', 'desc' => 'Extract text from scanned PDFs using Optical Character Recognition (Offline JS).', 
        'category' => 'pdf-tools', 'icon' => '🔍', 'handler' => 'PdfHandler', 'action' => 'ocr', 'controller' => 'PdfController',
        'is_frontend_only' => true,
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select Scanned PDF', 'required' => true]]
    ],
    'edit-pdf' => [
        'title' => 'PDF Editor', 'desc' => 'Add text, images, and markup to your PDF files directly in browser.', 
        'category' => 'pdf-tools', 'icon' => '🖊️', 'handler' => 'PdfHandler', 'action' => 'edit', 'controller' => 'PdfController',
        'is_frontend_only' => true,
        'inputs' => [['name' => 'file', 'type' => 'file', 'label' => 'Select PDF File', 'required' => true]]
    ],

    // --- NEW TOOLS BATCH (PHASE 1 - 31 TOOLS) ---
    
    // Developer & Security
    'json-to-typescript' => [
        'title' => 'JSON to TypeScript', 'desc' => 'Generate TypeScript interfaces from JSON objects instantly.', 'category' => 'dev-tools', 'icon' => 'TS', 'handler' => 'DevHandler', 'action' => 'jsonToTs',
        'inputs' => [['name' => 'json', 'type' => 'textarea', 'label' => 'Paste JSON here', 'required' => true]]
    ],
    'cron-generator' => [
        'title' => 'Cron Job Generator', 'desc' => 'Create cron expressions easily with a user-friendly interface.', 'category' => 'dev-tools', 'icon' => '⏰', 'handler' => 'DevHandler', 'action' => 'cronGen',
        'inputs' => [['name' => 'config', 'type' => 'text', 'label' => 'Schedule Config', 'required' => true]]
    ],
    'regex-visualizer' => [
        'title' => 'Regex Visualizer', 'desc' => 'Visualize regular expressions to understand how they match text.', 'category' => 'dev-tools', 'icon' => '.*', 'handler' => 'DevHandler', 'action' => 'regexViz',
        'inputs' => [['name' => 'regex', 'type' => 'text', 'label' => 'Enter Regex', 'required' => true]]
    ],
    'dockerfile-generator' => [
        'title' => 'Dockerfile Generator', 'desc' => 'Generate optimized Dockerfiles for various environments.', 'category' => 'dev-tools', 'icon' => '🐳', 'handler' => 'DevHandler', 'action' => 'dockerGen',
        'inputs' => [['name' => 'env', 'type' => 'select', 'label' => 'Base Environment', 'options' => ['node'=>'Node.js', 'php'=>'PHP', 'python'=>'Python']]]
    ],
    'gitignore-generator' => [
        'title' => '.gitignore Generator', 'desc' => 'Generate .gitignore files for your projects based on your stack.', 'category' => 'dev-tools', 'icon' => '🚫', 'handler' => 'DevHandler', 'action' => 'gitIgnoreGen',
        'inputs' => [['name' => 'stack', 'type' => 'text', 'label' => 'Technologies (e.g. Node, Windows)', 'required' => true]]
    ],
    'bcrypt-generator' => [
        'title' => 'Bcrypt Hash Generator', 'desc' => 'Securely hash passwords using the Bcrypt algorithm.', 'category' => 'dev-tools', 'icon' => '🔑', 'handler' => 'DevHandler', 'action' => 'bcryptGen',
        'inputs' => [['name' => 'password', 'type' => 'text', 'label' => 'Password', 'required' => true]]
    ],
    'url-scheme-builder' => [
        'title' => 'URL Scheme Builder', 'desc' => 'Build and test custom URL schemes for mobile app deep linking.', 'category' => 'dev-tools', 'icon' => '🔗', 'handler' => 'DevHandler', 'action' => 'urlScheme',
        'inputs' => [['name' => 'base', 'type' => 'text', 'label' => 'Base Scheme', 'required' => true]]
    ],
    'curl-converter' => [
        'title' => 'Curl to Code Converter', 'desc' => 'Convert cURL commands to PHP, Python, or JavaScript code.', 'category' => 'dev-tools', 'icon' => 'C', 'handler' => 'DevHandler', 'action' => 'curlConvert',
        'inputs' => [['name' => 'curl', 'type' => 'textarea', 'label' => 'Paste cURL command', 'required' => true]]
    ],
    'postman-to-swagger' => [
        'title' => 'Postman to Swagger', 'desc' => 'Convert Postman collections (JSON) to Swagger/OpenAPI format.', 'category' => 'dev-tools', 'icon' => 'S', 'handler' => 'DevHandler', 'action' => 'postmanToSwagger',
        'inputs' => [['name' => 'json', 'type' => 'textarea', 'label' => 'Paste Postman JSON', 'required' => true]]
    ],
    'ssl-decoder' => [
        'title' => 'SSL Certificate Decoder', 'desc' => 'Decode SSL certificates to view details like issuer and expiry.', 'category' => 'dev-tools', 'icon' => '🔒', 'handler' => 'DevHandler', 'action' => 'sslDecode',
        'inputs' => [['name' => 'cert', 'type' => 'textarea', 'label' => 'Paste PEM Certificate', 'required' => true]]
    ],
    'git-cheatsheet' => [
        'title' => 'Git Command Cheatsheet', 'desc' => 'Interactive cheatsheet for common and advanced Git commands.', 'category' => 'dev-tools', 'icon' => 'Git', 'handler' => 'DevHandler', 'action' => 'gitCheat',
        'inputs' => []
    ],

    // Web Design
    'tailwind-grid-builder' => [
        'title' => 'Tailwind Grid Builder', 'desc' => 'Layout CSS grids visually with Tailwind CSS classes.', 'category' => 'design-tools', 'icon' => '▦', 'handler' => 'DesignHandler', 'action' => 'tailwindGrid',
        'inputs' => [['name' => 'cols', 'type' => 'number', 'label' => 'Columns', 'value' => '3']]
    ],
    'svg-blob-generator' => [
        'title' => 'SVG Blob Generator', 'desc' => 'Generate unique, organic SVG blob shapes for your designs.', 'category' => 'design-tools', 'icon' => '💧', 'handler' => 'DesignHandler', 'action' => 'svgBlob',
        'inputs' => [['name' => 'complexity', 'type' => 'range', 'label' => 'Complexity', 'min' => '1', 'max' => '20', 'value' => '5']]
    ],
    'color-palette-extractor' => [
        'title' => 'Color Palette Extractor', 'desc' => 'Extract dominant colors from any image for your design projects.', 'category' => 'design-tools', 'icon' => '🎨', 'handler' => 'DesignHandler', 'action' => 'colorExtract',
        'inputs' => [['name' => 'image', 'type' => 'file', 'label' => 'Upload Image', 'required' => true]]
    ],
    'responsive-mockup' => [
        'title' => 'Responsive Screen Mockup', 'desc' => 'Preview your website on various device sizes instantly.', 'category' => 'design-tools', 'icon' => '📱', 'handler' => 'DesignHandler', 'action' => 'mockup',
        'inputs' => [['name' => 'url', 'type' => 'text', 'label' => 'Website URL', 'placeholder' => 'https://example.com']]
    ],
    'favicon-generator' => [
        'title' => 'Favicon Generator', 'desc' => 'Create favicons from text, emojis, or images in all standard sizes.', 'category' => 'design-tools', 'icon' => 'Fv', 'handler' => 'DesignHandler', 'action' => 'faviconGen',
        'inputs' => [['name' => 'source', 'type' => 'text', 'label' => 'Text/Emoji', 'required' => true]]
    ],
    'font-pairing' => [
        'title' => 'Font Pairing Recommender', 'desc' => 'Discover beautiful Google Font combinations for your website.', 'category' => 'design-tools', 'icon' => 'Aa', 'handler' => 'DesignHandler', 'action' => 'fontPair',
        'inputs' => []
    ],
    'scrollbar-customizer' => [
        'title' => 'Scrollbar Customizer', 'desc' => 'Generate custom CSS for stylish browser scrollbars.', 'category' => 'design-tools', 'icon' => '↕️', 'handler' => 'DesignHandler', 'action' => 'scrollbarGen',
        'inputs' => [['name' => 'color', 'type' => 'color', 'label' => 'Thumb Color', 'value' => '#ff7a59']]
    ],
    'css-cursor-gen' => [
        'title' => 'CSS Cursor Generator', 'desc' => 'Preview and copy code for all standard and custom CSS cursors.', 'category' => 'design-tools', 'icon' => '🖱️', 'handler' => 'DesignHandler', 'action' => 'cursorGen',
        'inputs' => []
    ],
    'bootstrap-to-tailwind' => [
        'title' => 'Bootstrap to Tailwind', 'desc' => 'Convert classic Bootstrap classes to modern Tailwind CSS equivalents.', 'category' => 'design-tools', 'icon' => 'BT', 'handler' => 'DesignHandler', 'action' => 'bToT',
        'inputs' => [['name' => 'html', 'type' => 'textarea', 'label' => 'Paste HTML', 'required' => true]]
    ],
    'aspect-ratio-calc' => [
        'title' => 'Aspect Ratio Calculator', 'desc' => 'Calculate dimensions based on aspect ratios (16:9, 4:3, etc.).', 'category' => 'design-tools', 'icon' => '📐', 'handler' => 'DesignHandler', 'action' => 'aspectCalc',
        'inputs' => [['name' => 'width', 'type' => 'number', 'label' => 'Width', 'value' => '1920']]
    ],
    'google-fonts-embed' => [
        'title' => 'Google Fonts Embed Generator', 'desc' => 'Generate quick @import or <link> tags for Google Fonts.', 'category' => 'design-tools', 'icon' => 'G', 'handler' => 'DesignHandler', 'action' => 'fontEmbed',
        'inputs' => [['name' => 'font', 'type' => 'text', 'label' => 'Font Name', 'value' => 'Inter']]
    ],

    // AI & Content Generators
    'midjourney-prompt-builder' => [
        'title' => 'Midjourney Prompt Builder', 'desc' => 'Build complex Midjourney prompts with parameters and styles.', 'category' => 'text-tools', 'icon' => '🖼️', 'handler' => 'AiHandler', 'action' => 'mjPrompt',
        'inputs' => [['name' => 'concept', 'type' => 'text', 'label' => 'Main Concept', 'required' => true]]
    ],
    'chatgpt-mega-prompt' => [
        'title' => 'ChatGPT Mega-Prompt Generator', 'desc' => 'Generate expert-level system prompts for better AI responses.', 'category' => 'text-tools', 'icon' => '🤖', 'handler' => 'AiHandler', 'action' => 'chatPrompt',
        'inputs' => [['name' => 'goal', 'type' => 'text', 'label' => 'Your Goal', 'required' => true]]
    ],
    'ai-text-humanizer' => [
        'title' => 'AI Text Humanizer', 'desc' => 'Analyze and suggest edits to make AI text sound more human.', 'category' => 'text-tools', 'icon' => '🧑', 'handler' => 'AiHandler', 'action' => 'humanize',
        'inputs' => [['name' => 'text', 'type' => 'textarea', 'label' => 'Paste AI Text', 'required' => true]]
    ],
    'yt-summarizer' => [
        'title' => 'YouTube Summarizer Template', 'desc' => 'Structure your YouTube video notes into professional summaries.', 'category' => 'text-tools', 'icon' => '▶️', 'handler' => 'AiHandler', 'action' => 'ytSum',
        'inputs' => [['name' => 'transcript', 'type' => 'textarea', 'label' => 'Paste Transcript', 'required' => true]]
    ],
    'stable-diffusion-prompt' => [
        'title' => 'Stable Diffusion Prompt Gen', 'desc' => 'Create detailed prompts for Stable Diffusion image generation.', 'category' => 'text-tools', 'icon' => '✨', 'handler' => 'AiHandler', 'action' => 'sdPrompt',
        'inputs' => [['name' => 'subject', 'type' => 'text', 'label' => 'Subject', 'required' => true]]
    ],
    'blog-title-generator' => [
        'title' => 'Blog Title Generator', 'desc' => 'Generate catchy, SEO-friendly titles for your blog posts.', 'category' => 'text-tools', 'icon' => '📝', 'handler' => 'AiHandler', 'action' => 'blogTitle',
        'inputs' => [['name' => 'keywords', 'type' => 'text', 'label' => 'Keywords', 'required' => true]]
    ],
    'cold-email-gen' => [
        'title' => 'Cold Email Generator', 'desc' => 'Generate professional outreach emails tailored to your prospect.', 'category' => 'text-tools', 'icon' => '📧', 'handler' => 'AiHandler', 'action' => 'coldEmail',
        'inputs' => [['name' => 'prospect', 'type' => 'text', 'label' => 'Prospect Name', 'required' => true]]
    ],
    'cover-letter-gen' => [
        'title' => 'Cover Letter Generator', 'desc' => 'Create compelling cover letters for your job applications.', 'category' => 'text-tools', 'icon' => '📄', 'handler' => 'AiHandler', 'action' => 'coverLetter',
        'inputs' => [['name' => 'role', 'type' => 'text', 'label' => 'Job Role', 'required' => true]]
    ],
    'social-media-bio' => [
        'title' => 'Social Media Bio Gen', 'desc' => 'Generate creative bios for Instagram, Twitter, and LinkedIn.', 'category' => 'text-tools', 'icon' => '👤', 'handler' => 'AiHandler', 'action' => 'socialBio',
        'inputs' => [['name' => 'bio_type', 'type' => 'select', 'label' => 'Platform', 'options' => ['ig'=>'Instagram', 'x'=>'Twitter/X', 'li'=>'LinkedIn']]]
    ],
    'product-description-gen' => [
        'title' => 'Product Description Gen', 'desc' => 'Generate persuasive product descriptions for e-commerce.', 'category' => 'text-tools', 'icon' => '🛒', 'handler' => 'AiHandler', 'action' => 'productDesc',
        'inputs' => [['name' => 'product', 'type' => 'text', 'label' => 'Product Name', 'required' => true]]
    ],
    'braille-translator' => [
        'title' => 'Pro Braille Translator', 'desc' => 'Convert English text to Braille and Braille back to English instantly.', 'category' => 'text-tools', 'icon' => '⠃', 'handler' => 'AiHandler', 'action' => 'brailleTranslate',
        'inputs' => []
    ],

    // --- AI POWERED TOOLS ---
    'ai-text-summarizer' => [
        'title' => 'AI Text Summarizer',
        'desc' => 'Summarize long articles and documents into concise bullet points using on-device AI.',
        'category' => 'ai-powered-tools',
        'icon' => '📝',
        'handler' => 'AiHandler',
        'action' => 'summarizer',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Paste Content', 'placeholder' => 'Enter long text here...', 'required' => true]
        ]
    ],
    'ai-sentiment-analyzer' => [
        'title' => 'AI Sentiment Analyzer',
        'desc' => 'Detect emotional tone (Positive, Negative, Neutral) using real-time NLP models.',
        'category' => 'ai-powered-tools',
        'icon' => '🎭',
        'handler' => 'AiHandler',
        'action' => 'sentiment',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'placeholder' => 'Type something emotional...', 'required' => true]
        ]
    ],
    'ai-image-generator' => [
        'title' => 'AI Image Generator',
        'desc' => 'Generate high-quality images from text descriptions for free with Pollinations AI.',
        'category' => 'ai-powered-tools',
        'icon' => '🎨',
        'handler' => 'AiHandler',
        'action' => 'imageGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'prompt', 'type' => 'textarea', 'label' => 'Describe your image', 'placeholder' => 'A futuristic city at sunset, cinematic lighting...', 'required' => true],
            ['name' => 'aspect_ratio', 'type' => 'cards', 'label' => 'Aspect Ratio', 'value' => '1:1', 'options' => [
                '1:1' => ['title' => 'Square', 'icon' => '⬛', 'desc' => '1:1'],
                '16:9' => ['title' => 'Widescreen', 'icon' => '📺', 'desc' => '16:9'],
                '9:16' => ['title' => 'Mobile', 'icon' => '📱', 'desc' => '9:16']
            ]],
            ['name' => 'style', 'type' => 'select', 'label' => 'Style', 'options' => [
                'none' => 'None',
                'photorealistic' => 'Photorealistic',
                'anime' => 'Anime',
                'cinematic' => 'Cinematic',
                '3d-render' => '3D Render'
            ]]
        ]
    ],
    'ai-background-remover' => [
        'title' => 'AI Background Remover',
        'desc' => 'Remove image backgrounds instantly in your browser using AI-powered edge detection.',
        'category' => 'ai-powered-tools',
        'icon' => '✂️',
        'handler' => 'AiHandler',
        'action' => 'bgRemover',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'image', 'type' => 'file', 'label' => 'Select Image', 'required' => true]
        ]
    ],
    'ai-grammar-checker' => [
        'title' => 'AI Grammar & Tone Checker',
        'desc' => 'Fix grammar mistakes and rewrite text to match a specific tone (Professional, Casual).',
        'category' => 'ai-powered-tools',
        'icon' => '✍️',
        'handler' => 'AiHandler',
        'action' => 'grammarTone',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Text', 'required' => true],
            ['name' => 'tone', 'type' => 'select', 'label' => 'Target Tone', 'options' => [
                'professional' => 'Professional',
                'casual' => 'Casual',
                'friendly' => 'Friendly',
                'authoritative' => 'Authoritative'
            ]]
        ]
    ],
    'ai-article-generator' => [
        'title' => 'AI Article & Blog Generator',
        'desc' => 'Generate high-quality blog posts and articles based on keywords and titles.',
        'category' => 'ai-powered-tools',
        'icon' => '📰',
        'handler' => 'AiHandler',
        'action' => 'articleGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'keywords', 'type' => 'text', 'label' => 'Keywords / Topic', 'placeholder' => 'Future of AI, Web Development...', 'required' => true],
            ['name' => 'tone', 'type' => 'select', 'label' => 'Tone', 'options' => ['informative' => 'Informative', 'engaging' => 'Engaging', 'technical' => 'Technical']]
        ]
    ],
    'ai-prompt-generator' => [
        'title' => 'AI Prompt Generator',
        'desc' => 'Expand simple ideas into advanced, high-detail prompts for AI models like Midjourney or ChatGPT.',
        'category' => 'ai-powered-tools',
        'icon' => '🚀',
        'handler' => 'AiHandler',
        'action' => 'promptGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'idea', 'type' => 'textarea', 'label' => 'Your Simple Idea', 'placeholder' => 'A cat in space...', 'required' => true],
            ['name' => 'type', 'type' => 'select', 'label' => 'Model Target', 'options' => ['image' => 'Image Model (Midjourney/DALL-E)', 'text' => 'Text Model (ChatGPT/Claude)']]
        ]
    ],
    'ai-youtube-script-creator' => [
        'title' => 'AI YouTube Script Creator',
        'desc' => 'Generate structured video scripts with hooks, intro, body, and CTA based on your video title.',
        'category' => 'ai-powered-tools',
        'icon' => '🎬',
        'handler' => 'AiHandler',
        'action' => 'ytScript',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'title', 'type' => 'text', 'label' => 'Video Title', 'required' => true],
            ['name' => 'duration', 'type' => 'select', 'label' => 'Target Duration', 'options' => ['short' => 'Short (< 1 min)', 'medium' => 'Medium (5-8 min)', 'long' => 'Long (10+ min)']]
        ]
    ],
    'ai-seo-meta' => [
        'title' => 'AI SEO Meta Tags Generator',
        'desc' => 'Automatically generate optimized meta titles and descriptions for better search rankings.',
        'category' => 'ai-powered-tools',
        'icon' => '🔍',
        'handler' => 'AiHandler',
        'action' => 'seoMeta',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Page Content / URL Description', 'required' => true]
        ]
    ],
    'ai-social-media-post' => [
        'title' => 'AI Social Media & Hashtags',
        'desc' => 'Create engaging posts for Instagram, X, and LinkedIn with trending hashtags and emojis.',
        'category' => 'ai-powered-tools',
        'icon' => '📱',
        'handler' => 'AiHandler',
        'action' => 'socialPost',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'What is the post about?', 'required' => true],
            ['name' => 'platform', 'type' => 'cards', 'label' => 'Target Platform', 'value' => 'ig', 'options' => [
                'ig' => ['title' => 'Instagram', 'icon' => '📸', 'desc' => 'Visual & Hashtags'],
                'x' => ['title' => 'X / Twitter', 'icon' => '🐦', 'desc' => 'Short & Punchy'],
                'li' => ['title' => 'LinkedIn', 'icon' => '💼', 'desc' => 'Professional']
            ]]
        ]
    ],
    'ai-regex-generator' => [
        'title' => 'AI Regex Generator',
        'desc' => 'Turn plain English descriptions into complex, ready-to-use Regular Expressions.',
        'category' => 'ai-powered-tools',
        'icon' => '🧪',
        'handler' => 'AiHandler',
        'action' => 'regexGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'description', 'type' => 'text', 'label' => 'Describe the pattern', 'placeholder' => 'Find email addresses, extract numbers between tags...', 'required' => true]
        ]
    ],
    'ai-sql-query-generator' => [
        'title' => 'AI SQL Query Generator',
        'desc' => 'Convert natural language into valid SQL queries for MySQL, PostgreSQL, or SQL Server.',
        'category' => 'ai-powered-tools',
        'icon' => '💾',
        'handler' => 'AiHandler',
        'action' => 'sqlGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'request', 'type' => 'textarea', 'label' => 'Describe your query', 'placeholder' => 'Get all users who signed up in 2023 with more than 5 orders...', 'required' => true],
            ['name' => 'db_type', 'type' => 'select', 'label' => 'Database Type', 'options' => ['mysql' => 'MySQL', 'pg' => 'PostgreSQL', 'sqlserver' => 'SQL Server']]
        ]
    ],
    'ai-code-explainer' => [
        'title' => 'AI Code Explainer & Optimizer',
        'desc' => 'Explain complex code in plain English and get suggestions for better performance/quality.',
        'category' => 'ai-powered-tools',
        'icon' => '💻',
        'handler' => 'AiHandler',
        'action' => 'codeExplain',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'code', 'type' => 'textarea', 'label' => 'Paste your code', 'class' => 'codemirror-js', 'required' => true]
        ]
    ],
    'ai-code-translator' => [
        'title' => 'AI Code Translator',
        'desc' => 'Translate code snippets from one programming language to another using AI.',
        'category' => 'ai-powered-tools',
        'icon' => '⇄',
        'handler' => 'AiHandler',
        'action' => 'codeTranslate',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'code', 'type' => 'textarea', 'label' => 'Source Code', 'class' => 'codemirror-js', 'required' => true],
            ['name' => 'from', 'type' => 'select', 'label' => 'From Language', 'options' => ['javascript' => 'JavaScript', 'python' => 'Python', 'php' => 'PHP', 'java' => 'Java']],
            ['name' => 'to', 'type' => 'select', 'label' => 'To Language', 'options' => ['javascript' => 'JavaScript', 'python' => 'Python', 'php' => 'PHP', 'java' => 'Java']]
        ]
    ],
    'ai-plagiarism-detector' => [
        'title' => 'AI Plagiarism & Detection',
        'desc' => 'Analyze text to detect potential plagiarism and simulate AI-generated content probability.',
        'category' => 'ai-powered-tools',
        'icon' => '🛡️',
        'handler' => 'AiHandler',
        'action' => 'plagiarismDetect',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter Content', 'required' => true]
        ]
    ],
    'ai-resume-builder' => [
        'title' => 'AI Resume & Cover Letter',
        'desc' => 'Build a professional resume and cover letter with AI-generated summaries and formatting.',
        'category' => 'ai-powered-tools',
        'icon' => '📄',
        'handler' => 'AiHandler',
        'action' => 'resumeBuilder',
        'inputs' => [
            ['name' => 'full_name', 'type' => 'text', 'label' => 'Full Name', 'required' => true],
            ['name' => 'email', 'type' => 'text', 'label' => 'Email Address', 'required' => true],
            ['name' => 'job_title', 'type' => 'text', 'label' => 'Target Job Title', 'placeholder' => 'e.g. Senior Software Engineer', 'required' => true],
            ['name' => 'experience', 'type' => 'textarea', 'label' => 'Experience / Key Skills', 'required' => true],
            ['name' => 'interest', 'type' => 'textarea', 'label' => 'Cover Letter Interest', 'required' => true]
        ]
    ],

    // --- CATEGORY 1: DEVELOPER, FORMATTING & CRYPTO TOOLS ---
    'json-to-ts' => [
        'title' => 'JSON to TS Interface',
        'desc' => 'Convert JSON objects to TypeScript interfaces instantly.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-code',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'json', 'type' => 'textarea', 'label' => 'JSON Input', 'placeholder' => '{"key": "value"}', 'required' => true]
        ]
    ],
    'cron-generator' => [
        'title' => 'Cron Job Generator',
        'desc' => 'Create cron job schedules in plain language with ease.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-clock',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'schedule', 'type' => 'text', 'label' => 'Schedule description', 'placeholder' => 'Every 5 minutes', 'required' => true]
        ]
    ],
    'regex-visualizer' => [
        'title' => 'Regex Visualizer',
        'desc' => 'Visualize your regular expressions to understand how they work.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-eye',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'regex', 'type' => 'text', 'label' => 'Regex Pattern', 'placeholder' => '/[a-z]+/i', 'required' => true]
        ]
    ],
    'jwt-decoder' => [
        'title' => 'JWT Decoder',
        'desc' => 'Decode JSON Web Tokens and view their payload and header.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-key',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'token', 'type' => 'textarea', 'label' => 'JWT Token', 'placeholder' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...', 'required' => true]
        ]
    ],
    'dockerfile-generator' => [
        'title' => 'Dockerfile Generator',
        'desc' => 'Generate simple Dockerfiles for various environments.',
        'category' => 'developer-tools',
        'icon' => 'fa-brands fa-docker',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'base_image', 'type' => 'text', 'label' => 'Base Image', 'placeholder' => 'node:18', 'required' => true]
        ]
    ],
    'sql-formatter' => [
        'title' => 'SQL Query Formatter',
        'desc' => 'Format and beautify your SQL queries for better readability.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-database',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'sql', 'type' => 'textarea', 'label' => 'SQL Query', 'placeholder' => 'SELECT * FROM users WHERE id = 1', 'required' => true]
        ]
    ],
    'gitignore-generator' => [
        'title' => 'Gitignore Generator',
        'desc' => 'Generate .gitignore files for your projects based on your setup.',
        'category' => 'developer-tools',
        'icon' => 'fa-brands fa-git-alt',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'env', 'type' => 'text', 'label' => 'Environment/OS/IDE', 'placeholder' => 'Node, Windows, VSCode', 'required' => true]
        ]
    ],
    'bcrypt-hash-generator' => [
        'title' => 'Bcrypt Hash Generator',
        'desc' => 'Hash your passwords securely using the Bcrypt algorithm.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-lock',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'password', 'type' => 'text', 'label' => 'Password to Hash', 'required' => true],
            ['name' => 'rounds', 'type' => 'number', 'label' => 'Rounds', 'value' => 10, 'required' => true]
        ]
    ],
    'url-scheme-builder' => [
        'title' => 'URL Scheme Builder',
        'desc' => 'Build custom URL schemes for deep linking in mobile apps.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-link',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'scheme', 'type' => 'text', 'label' => 'Scheme', 'placeholder' => 'myapp', 'required' => true],
            ['name' => 'path', 'type' => 'text', 'label' => 'Path', 'placeholder' => 'user/profile', 'required' => true]
        ]
    ],
    'curl-converter' => [
        'title' => 'cURL Command Converter',
        'desc' => 'Convert cURL commands to Fetch, Python, or Go code.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-terminal',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'curl', 'type' => 'textarea', 'label' => 'cURL Command', 'placeholder' => 'curl https://api.example.com', 'required' => true]
        ]
    ],
    'css-minifier' => [
        'title' => 'CSS Minifier',
        'desc' => 'Compress your CSS code to reduce file size and improve performance.',
        'category' => 'developer-tools',
        'icon' => 'fa-brands fa-css3',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'css', 'type' => 'textarea', 'label' => 'CSS Code', 'required' => true]
        ]
    ],
    'postman-to-swagger' => [
        'title' => 'Postman to Swagger',
        'desc' => 'Convert Postman collections to Swagger (OpenAPI) format.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-exchange',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'postman_json', 'type' => 'textarea', 'label' => 'Postman Collection JSON', 'required' => true]
        ]
    ],
    'md-to-html' => [
        'title' => 'Markdown to HTML',
        'desc' => 'Convert Markdown text to clean HTML code instantly.',
        'category' => 'developer-tools',
        'icon' => 'fa-brands fa-markdown',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'markdown', 'type' => 'textarea', 'label' => 'Markdown Content', 'required' => true]
        ]
    ],
    'uuid-generator' => [
        'title' => 'UUID/GUID Generator',
        'desc' => 'Generate unique UUIDs (v4) for your development needs.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-fingerprint',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'xml-to-json' => [
        'title' => 'XML to JSON Converter',
        'desc' => 'Convert XML data to JSON format accurately.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-file-code',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'xml', 'type' => 'textarea', 'label' => 'XML Input', 'required' => true]
        ]
    ],
    'chmod-calculator' => [
        'title' => 'Chmod Calculator',
        'desc' => 'Calculate Linux file permissions in octal and symbolic formats.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-user-shield',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'permissions', 'type' => 'text', 'label' => 'Numeric or Symbolic', 'placeholder' => '755 or rwxr-xr-x', 'required' => true]
        ]
    ],
    'ssl-decoder' => [
        'title' => 'SSL Cert Decoder',
        'desc' => 'Decode CSR and certificates to view their details.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-certificate',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'cert', 'type' => 'textarea', 'label' => 'Certificate content', 'required' => true]
        ]
    ],
    'ip-subnet-calculator' => [
        'title' => 'IP Subnet Calculator',
        'desc' => 'Calculate network ranges, broadcast addresses, and subnets.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-network-wired',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'ip', 'type' => 'text', 'label' => 'IP Address', 'placeholder' => '192.168.1.1', 'required' => true],
            ['name' => 'mask', 'type' => 'text', 'label' => 'Subnet Mask / CIDR', 'placeholder' => '24 or 255.255.255.0', 'required' => true]
        ]
    ],
    'git-cheatsheet' => [
        'title' => 'Git Cheatsheet',
        'desc' => 'A handy reference for most common Git commands.',
        'category' => 'developer-tools',
        'icon' => 'fa-brands fa-git',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'duplicate-line-remover' => [
        'title' => 'Duplicate Line Remover',
        'desc' => 'Clean up lists by removing duplicate entries instantly.',
        'category' => 'text-tools',
        'icon' => 'fa-solid fa-eraser',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Input List', 'required' => true]
        ]
    ],
    'alphabetical-sorter' => [
        'title' => 'Alphabetical Sorter',
        'desc' => 'Sort lists alphabetically (A-Z or Z-A) and remove duplicates.',
        'category' => 'text-tools',
        'icon' => 'fa-solid fa-sort-alpha-down',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Input List', 'required' => true]
        ]
    ],
    'find-and-replace' => [
        'title' => 'Find and Replace',
        'desc' => 'Quickly find and replace text strings within long content.',
        'category' => 'text-tools',
        'icon' => 'fa-solid fa-search',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Original Text', 'required' => true],
            ['name' => 'find', 'type' => 'text', 'label' => 'Find what', 'required' => true],
            ['name' => 'replace', 'type' => 'text', 'label' => 'Replace with', 'required' => true]
        ]
    ],
    'ascii-art-generator' => [
        'title' => 'ASCII Art Generator',
        'desc' => 'Convert your text into stylish ASCII art banners.',
        'category' => 'text-tools',
        'icon' => 'fa-solid fa-font',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'text', 'label' => 'Enter Text', 'required' => true]
        ]
    ],
    'csv-to-json' => [
        'title' => 'CSV to JSON Converter',
        'desc' => 'Convert CSV data to structured JSON format instantly.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-file-csv',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'csv', 'type' => 'textarea', 'label' => 'CSV Content', 'required' => true]
        ]
    ],
    'yaml-to-json' => [
        'title' => 'YAML to JSON Converter',
        'desc' => 'Convert YAML configuration files to JSON data.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-file-code',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'yaml', 'type' => 'textarea', 'label' => 'YAML Content', 'required' => true]
        ]
    ],
    'excel-to-json' => [
        'title' => 'Excel to JSON Converter',
        'desc' => 'Upload Excel files and convert them to JSON arrays.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-file-excel',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'excel_file', 'type' => 'file', 'label' => 'Choose Excel File', 'required' => true]
        ]
    ],
    'bbcode-to-json' => [
        'title' => 'BBCode to JSON/HTML',
        'desc' => 'Convert BBCode forum tags to JSON or HTML format.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-comment-code',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'bbcode', 'type' => 'textarea', 'label' => 'BBCode Content', 'required' => true]
        ]
    ],
    'strong-password-generator' => [
        'title' => 'Strong Password Generator',
        'desc' => 'Generate cryptographically strong passwords for maximum security.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-key',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'length', 'type' => 'number', 'label' => 'Length', 'value' => 16, 'required' => true]
        ]
    ],
    'password-strength-checker' => [
        'title' => 'Password Strength Checker',
        'desc' => 'Analyze the strength of your password using the zxcvbn library.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-shield-alt',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'password', 'type' => 'password', 'label' => 'Test Password', 'required' => true]
        ]
    ],
    'pgp-key-generator' => [
        'title' => 'PGP Key Generator (Pro)', 'desc' => 'Generate high-entropy PGP public and private keys for secure, decentralized communication.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-user-secret', 'handler' => 'DevHandler', 'action' => 'pgpKeyGenerator'
    ],
    'hmac-generator' => [
        'title' => 'HMAC Generator (Pro)', 'desc' => 'Generate Hash-based Message Authentication Codes to ensure both data integrity and authenticity.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-signature', 'handler' => 'DevHandler', 'action' => 'hmacGenerator'
    ],
    'aes-256-encryptor' => [
        'title' => 'AES-256 Text Encryptor',
        'desc' => 'Encrypt and decrypt text using the military-grade AES-256 algorithm.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-vault',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Text to Encrypt/Decrypt', 'required' => true],
            ['name' => 'secret', 'type' => 'text', 'label' => 'Secret Key', 'required' => true]
        ]
    ],
    'htpasswd-generator' => [
        'title' => 'Htpasswd Generator',
        'desc' => 'Generate .htpasswd entries for basic HTTP authentication.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-user-lock',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'user', 'type' => 'text', 'label' => 'Username', 'required' => true],
            ['name' => 'pass', 'type' => 'text', 'label' => 'Password', 'required' => true]
        ]
    ],
    'dns-leak-tester' => [
        'title' => 'DNS Leak Tester',
        'desc' => 'Check if your DNS requests are leaking outside your VPN/Proxy.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-broadcast-tower',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'mac-address-lookup' => [
        'title' => 'MAC Address Lookup',
        'desc' => 'Identify the manufacturer and details of a device by its MAC address.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-microchip',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'mac', 'type' => 'text', 'label' => 'MAC Address', 'placeholder' => '00:00:00:00:00:00', 'required' => true]
        ]
    ],
    'port-scanner' => [
        'title' => 'Online Port Scanner',
        'desc' => 'Check the status of common ports on a remote server or IP.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-search-location',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'host', 'type' => 'text', 'label' => 'Host/IP', 'placeholder' => 'example.com', 'required' => true]
        ]
    ],
    'whois-lookup' => [
        'title' => 'Whois Lookup',
        'desc' => 'Retrieve domain registration and ownership information.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-address-card',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'domain', 'type' => 'text', 'label' => 'Domain Name', 'placeholder' => 'google.com', 'required' => true]
        ]
    ],
    'ssl-cert-generator' => [
        'title' => 'SSL Cert Generator',
        'desc' => 'Generate self-signed SSL certificates for development and testing.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-stamp',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'common_name', 'type' => 'text', 'label' => 'Common Name (e.g. localhost)', 'required' => true]
        ]
    ],
    'credit-card-validator' => [
        'title' => 'Credit Card Validator',
        'desc' => 'Check if a credit card number is valid using the Luhn algorithm.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-credit-card',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'card_number', 'type' => 'text', 'label' => 'Card Number', 'required' => true]
        ]
    ],
    'email-header-analyzer' => [
        'title' => 'Email Header Analyzer',
        'desc' => 'Trace the origin and path of an email by analyzing its headers.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-envelope-open-text',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'headers', 'type' => 'textarea', 'label' => 'Paste Email Headers', 'required' => true]
        ]
    ],
    'malware-url-checker' => [
        'title' => 'Malware URL Checker',
        'desc' => 'Check if a URL is flag as malicious or suspicious by safety databases.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-virus-slash',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'url', 'type' => 'text', 'label' => 'URL to Scan', 'required' => true]
        ]
    ],
    'tor-node-checker' => [
        'title' => 'Tor Node Checker',
        'desc' => 'Identify if an IP address belongs to the Tor network.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-user-secret',
        'handler' => 'DevHandler',
        'action' => 'noop',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'ip', 'type' => 'text', 'label' => 'IP Address', 'required' => true]
        ]
    ],

    // --- ULTRA BST PRO - AI CONTENT SUITE (CATEGORY 8) ---
    'ai-article-pro' => [
        'title' => 'AI Article & Blog Generator (Pro)', 'desc' => 'Generate high-quality blog posts and articles based on keywords and titles.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-newspaper', 'handler' => 'AiHandler', 'action' => 'articlePro',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'topic', 'type' => 'text', 'label' => 'Keywords / Topic', 'placeholder' => 'e.g. Artificial Intelligence, Digital Marketing', 'required' => true],
            ['name' => 'tone', 'type' => 'select', 'label' => 'Writing Tone', 'options' => ['informative'=>'Informative', 'engaging'=>'Engaging', 'technical'=>'Technical']]
        ]
    ],
    'ai-story-writer' => [
        'title' => 'AI Story & Fiction Writer', 'desc' => 'Craft creative narratives, short stories, and fictional plots with AI.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-book-open-reader', 'handler' => 'AiHandler', 'action' => 'storyWriter',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'genre', 'type' => 'text', 'label' => 'Genre / Mood', 'placeholder' => 'e.g. Sci-Fi, Mystery, Romantic'],
            ['name' => 'prompt', 'type' => 'textarea', 'label' => 'Starting Prompt', 'required' => true]
        ]
    ],
    'ai-essay-assistant' => [
        'title' => 'AI Essay & Research Assistant', 'desc' => 'Structured academic writing and research-based content generation.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-graduation-cap', 'handler' => 'AiHandler', 'action' => 'essayAsst',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'topic', 'type' => 'text', 'label' => 'Essay Topic', 'required' => true],
            ['name' => 'words', 'type' => 'number', 'label' => 'Target Word Count', 'value' => 500]
        ]
    ],
    'ai-paraphraser-pro' => [
        'title' => 'AI Paraphrasing Tool (Ultra)', 'desc' => 'Rewrite any text to make it more professional, creative, or easy to read.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-repeat', 'handler' => 'AiHandler', 'action' => 'paraphrasePro',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter text to rewrite', 'required' => true],
            ['name' => 'mode', 'type' => 'select', 'label' => 'Rewrite Mode', 'options' => ['standard'=>'Standard', 'creative'=>'Creative', 'formal'=>'Formal']]
        ]
    ],
    'ai-text-humanizer-pro' => [
        'title' => 'AI Text Humanizer', 'desc' => 'Refine AI-generated text to sound more natural and avoid robotic patterns.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-user-check', 'handler' => 'AiHandler', 'action' => 'humanizePro',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Enter text', 'required' => true]
        ]
    ],
    'ai-headline-creator' => [
        'title' => 'AI Viral Headline Creator', 'desc' => 'Generate high CTR headlines for your blogs, articles, and newsletters.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-bolt', 'handler' => 'AiHandler', 'action' => 'headlineGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'topic', 'type' => 'text', 'label' => 'What is your content about?', 'required' => true]
        ]
    ],
    'ai-content-gap' => [
        'title' => 'AI Content Gap Finder', 'desc' => 'Identify missing subtopics and angles to make your posts more authoritative.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-magnifying-glass-chart', 'handler' => 'AiHandler', 'action' => 'gapFinder',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Paste your current draft', 'required' => true]
        ]
    ],
    'ai-intro-hook' => [
        'title' => 'AI Introduction Hook Writer', 'desc' => 'Grab attention from the first sentence with compelling opening hooks.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-anchor', 'handler' => 'AiHandler', 'action' => 'introHook',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'topic', 'type' => 'text', 'label' => 'Content Topic', 'required' => true]
        ]
    ],
    'ai-conclusion-gen' => [
        'title' => 'AI Conclusion & Summary', 'desc' => 'Create powerful wrap-ups and summary points for any article.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-flag-checkered', 'handler' => 'AiHandler', 'action' => 'conclusionGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'text', 'type' => 'textarea', 'label' => 'Main Points / Body', 'required' => true]
        ]
    ],
    'ai-outline-creator' => [
        'title' => 'AI Bullet Point & Outline Creator', 'desc' => 'Transform vague ideas into a structured, logical content outline.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-list-check', 'handler' => 'AiHandler', 'action' => 'outlineGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'topic', 'type' => 'text', 'label' => 'Article Topic', 'required' => true]
        ]
    ],
    'ai-ad-pro' => [
        'title' => 'AI Ad Copy Pro', 'desc' => 'High-converting ad copy for Google Search, Facebook, and LinkedIn Ads.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-rectangle-ad', 'handler' => 'AiHandler', 'action' => 'adCopyPro',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'product', 'type' => 'text', 'label' => 'Product / Service Name', 'required' => true],
            ['name' => 'platform', 'type' => 'select', 'label' => 'Platform', 'options' => ['google'=>'Google Ads', 'fb'=>'Facebook Ads', 'li'=>'LinkedIn Ads']]
        ]
    ],
    'ai-email-suite' => [
        'title' => 'AI Email Marketing Suite', 'desc' => 'Subject lines and body copy optimized for opens and clicks.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-envelope-open-text', 'handler' => 'AiHandler', 'action' => 'emailSuite',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'goal', 'type' => 'text', 'label' => 'Email Goal (e.g. Welcome, Sales)', 'required' => true]
        ]
    ],
    'ai-product-desc-pro' => [
        'title' => 'AI Product Description (E-com)', 'desc' => 'Persuasive descriptions for Shopify, Amazon, and Etsy products.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-cart-shopping', 'handler' => 'AiHandler', 'action' => 'prodDescPro',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'features', 'type' => 'textarea', 'label' => 'Key Features (Comma separated)', 'required' => true]
        ]
    ],
    'ai-landing-page-copy' => [
        'title' => 'AI Landing Page Copy', 'desc' => 'Full sales page copy including headlines, benefits, and CTAs.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-desktop', 'handler' => 'AiHandler', 'action' => 'lpCopy',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'offer', 'type' => 'text', 'label' => 'What are you offering?', 'required' => true]
        ]
    ],
    'ai-value-prop' => [
        'title' => 'AI Value Proposition Generator', 'desc' => 'Define why customers should choose you in one powerful sentence.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-star', 'handler' => 'AiHandler', 'action' => 'valueProp',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'product', 'type' => 'text', 'label' => 'Your Product', 'required' => true]
        ]
    ],
    'ai-brand-hub' => [
        'title' => 'AI Startup & Brand Name Hub', 'desc' => 'Generate memorable, available-style names for new ventures.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-rocket', 'handler' => 'AiHandler', 'action' => 'brandHub',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'niche', 'type' => 'text', 'label' => 'Startup Niche', 'required' => true]
        ]
    ],
    'ai-pro-bio' => [
        'title' => 'AI Professional Bio Generator', 'desc' => 'Perfect bios for LinkedIn, Speaker slots, and Portfolio sites.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-id-card', 'handler' => 'AiHandler', 'action' => 'proBio',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'info', 'type' => 'textarea', 'label' => 'Key Achievements / Role', 'required' => true]
        ]
    ],
    'ai-review-responder' => [
        'title' => 'AI Customer Review Responder', 'desc' => 'Professional and empathetic responses to customer feedback.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-comments', 'handler' => 'AiHandler', 'action' => 'reviewResp',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'review', 'type' => 'textarea', 'label' => 'Customer Review', 'required' => true]
        ]
    ],
    'ai-interview-prep' => [
        'title' => 'AI Job Interview Prep', 'desc' => 'Practice with AI-generated mock questions tailored to your job.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-user-tie', 'handler' => 'AiHandler', 'action' => 'interviewPrep',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'job', 'type' => 'text', 'label' => 'Target Job Title', 'required' => true]
        ]
    ],
    'ai-slogan-gen' => [
        'title' => 'AI Slogan & Tagline Generator', 'desc' => 'Catchy, memorable taglines for brands and marketing campaigns.', 'category' => 'ultra-bst-pro', 'icon' => 'fa-solid fa-quote-left', 'handler' => 'AiHandler', 'action' => 'sloganGen',
        'is_frontend_only' => true,
        'inputs' => [
            ['name' => 'brand', 'type' => 'text', 'label' => 'Brand / Product Name', 'required' => true]
        ]
    ],

    // ═══════════════════════════════════════════════════════════════
    // BUSINESS, FINANCE & DOCUMENT TOOLS (Batch 1 — 18 Tools)
    // ═══════════════════════════════════════════════════════════════

    // --- CALCULATORS ---
    'adsense-revenue-calculator' => [
        'title' => 'AdSense Revenue Calculator',
        'desc' => 'Estimate your Google AdSense earnings based on daily page views, CTR, and CPC.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-ad',
        'handler' => 'FinanceHandler', 'action' => 'adsenseRevenue',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'burn-rate-calculator' => [
        'title' => 'Burn Rate Calculator',
        'desc' => 'Calculate your startup gross and net burn rate plus projected runway in months.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-fire',
        'handler' => 'FinanceHandler', 'action' => 'burnRate',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'business-name-generator' => [
        'title' => 'Business Name Generator',
        'desc' => 'Generate creative and brandable business name ideas for any industry.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-building',
        'handler' => 'FinanceHandler', 'action' => 'businessName',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'cash-flow-forecaster' => [
        'title' => 'Cash Flow Forecaster',
        'desc' => 'Project monthly cash inflows and outflows to forecast your financial runway.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-chart-line',
        'handler' => 'FinanceHandler', 'action' => 'cashFlow',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'disclaimer-generator' => [
        'title' => 'Disclaimer Generator',
        'desc' => 'Generate a professional website disclaimer tailored to your business type.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-shield-halved',
        'handler' => 'FinanceHandler', 'action' => 'disclaimer',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'equity-dilution-calculator' => [
        'title' => 'Equity Dilution Calculator',
        'desc' => 'Visualize founder equity dilution across investment rounds with ownership charts.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-chart-pie',
        'handler' => 'FinanceHandler', 'action' => 'equityDilution',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'freelance-contract-generator' => [
        'title' => 'Freelance Contract Generator',
        'desc' => 'Create a professional freelance agreement contract and download as PDF instantly.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-file-contract',
        'handler' => 'FinanceHandler', 'action' => 'freelanceContract',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'freelance-hourly-rate-calculator' => [
        'title' => 'Freelance Hourly Rate Calculator',
        'desc' => 'Calculate your ideal hourly rate based on salary goals, expenses, and billable hours.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-money-bill-wave',
        'handler' => 'FinanceHandler', 'action' => 'freelanceRate',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'gst-tax-calculator' => [
        'title' => 'GST Tax Calculator',
        'desc' => 'Calculate GST tax amounts for inclusive and exclusive pricing across multiple rates.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-percent',
        'handler' => 'FinanceHandler', 'action' => 'gstTax',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'invoice-generator' => [
        'title' => 'Invoice Generator',
        'desc' => 'Create professional invoices with custom branding, line items, and download as PDF.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-file-invoice-dollar',
        'handler' => 'FinanceHandler', 'action' => 'invoice',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'mission-statement-generator' => [
        'title' => 'Mission Statement Generator',
        'desc' => 'Craft compelling mission statements for your business, startup, or organization.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-bullseye',
        'handler' => 'FinanceHandler', 'action' => 'missionStatement',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'privacy-policy-generator' => [
        'title' => 'Privacy Policy Generator',
        'desc' => 'Generate a comprehensive privacy policy page for your website or mobile app.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-user-shield',
        'handler' => 'FinanceHandler', 'action' => 'privacyPolicy',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'project-cost-estimator' => [
        'title' => 'Project Cost Estimator',
        'desc' => 'Estimate total project costs with task breakdown, overhead, and contingency.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-calculator',
        'handler' => 'FinanceHandler', 'action' => 'projectCost',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'purchase-order-generator' => [
        'title' => 'Purchase Order Generator',
        'desc' => 'Create professional purchase orders with vendor details and download as PDF.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-cart-shopping',
        'handler' => 'FinanceHandler', 'action' => 'purchaseOrder',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'receipt-generator' => [
        'title' => 'Receipt Generator',
        'desc' => 'Generate professional payment receipts with itemized lists and download as PDF.',
        'category' => 'business-tools',
        'icon' => 'fa-solid fa-receipt',
        'handler' => 'FinanceHandler', 'action' => 'receipt',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'saas-churn-rate-calculator' => [
        'title' => 'SaaS Churn Rate Calculator',
        'desc' => 'Calculate customer churn rate, retention rate, and projected subscriber loss.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-arrow-trend-down',
        'handler' => 'FinanceHandler', 'action' => 'saasChurn',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'stripe-fee-calculator' => [
        'title' => 'Stripe Fee Calculator',
        'desc' => 'Calculate Stripe processing fees, net payout, and fee percentage for any transaction.',
        'category' => 'finance-tools',
        'icon' => 'fa-brands fa-stripe-s',
        'handler' => 'FinanceHandler', 'action' => 'stripeFee',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'subscription-cac-calculator' => [
        'title' => 'Subscription CAC Calculator',
        'desc' => 'Calculate Customer Acquisition Cost, LTV, and LTV:CAC ratio for SaaS businesses.',
        'category' => 'finance-tools',
        'icon' => 'fa-solid fa-users',
        'handler' => 'FinanceHandler', 'action' => 'subscriptionCac',
        'is_frontend_only' => true,
        'inputs' => []
    ],

    // --- BATCH 2: SEO & MARKETING TOOLS ---
    'website-worth-estimator' => [
        'title' => 'Website Worth Estimator',
        'desc' => 'Estimate the market value of any website based on traffic, domain age, backlinks, and revenue metrics.',
        'category' => 'seo-tools',
        'icon' => 'fa-solid fa-globe',
        'handler' => 'SeoHandler', 'action' => 'websiteWorth',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'backlink-quality-checker' => [
        'title' => 'Backlink Quality Checker',
        'desc' => 'Analyze and score the quality of your backlinks based on domain authority, relevance, and spam signals.',
        'category' => 'seo-tools',
        'icon' => 'fa-solid fa-link',
        'handler' => 'SeoHandler', 'action' => 'backlinkChecker',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'cold-email-template-generator' => [
        'title' => 'Cold Email Template Generator',
        'desc' => 'Generate high-converting cold email templates for sales outreach, partnerships, and lead generation.',
        'category' => 'marketing-tools',
        'icon' => 'fa-solid fa-envelope-open-text',
        'handler' => 'SocialHandler', 'action' => 'coldEmail',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'domain-name-idea-generator' => [
        'title' => 'Domain Name Idea Generator',
        'desc' => 'Generate creative brandable domain name ideas for your startup, blog, or business.',
        'category' => 'marketing-tools',
        'icon' => 'fa-solid fa-at',
        'handler' => 'SocialHandler', 'action' => 'domainIdea',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'email-subject-line-tester' => [
        'title' => 'Email Subject Line Tester',
        'desc' => 'Score and optimize your email subject lines for open rates using proven copywriting principles.',
        'category' => 'marketing-tools',
        'icon' => 'fa-solid fa-envelope',
        'handler' => 'SocialHandler', 'action' => 'subjectTester',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'facebook-pixel-code-generator' => [
        'title' => 'Facebook Pixel Code Generator',
        'desc' => 'Generate ready-to-use Facebook Pixel tracking code for your website with custom events.',
        'category' => 'marketing-tools',
        'icon' => 'fa-brands fa-facebook',
        'handler' => 'SocialHandler', 'action' => 'fbPixel',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'ga4-event-code-generator' => [
        'title' => 'GA4 Event Code Generator',
        'desc' => 'Generate Google Analytics 4 event tracking code snippets for buttons, forms, and custom events.',
        'category' => 'marketing-tools',
        'icon' => 'fa-solid fa-chart-simple',
        'handler' => 'SocialHandler', 'action' => 'ga4Event',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'podcast-show-notes-generator' => [
        'title' => 'Podcast Show Notes Generator',
        'desc' => 'Create professional podcast show notes with timestamps, key takeaways, and SEO-friendly formatting.',
        'category' => 'marketing-tools',
        'icon' => 'fa-solid fa-podcast',
        'handler' => 'SocialHandler', 'action' => 'podcastNotes',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'seo-audit-checklist-generator' => [
        'title' => 'SEO Audit Checklist Generator',
        'desc' => 'Generate a comprehensive SEO audit checklist customized for your website type and industry.',
        'category' => 'seo-tools',
        'icon' => 'fa-solid fa-clipboard-check',
        'handler' => 'SeoHandler', 'action' => 'seoAudit',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'temp-email-generator' => [
        'title' => 'Temp Email Generator',
        'desc' => 'Generate a temporary disposable email address for signups, testing, and spam protection.',
        'category' => 'utility-tools',
        'icon' => 'fa-solid fa-envelope-circle-check',
        'handler' => 'SocialHandler', 'action' => 'tempEmail',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'thread-hook-generator' => [
        'title' => 'Thread Hook Generator',
        'desc' => 'Generate viral Twitter/X thread hooks that grab attention and boost engagement.',
        'category' => 'marketing-tools',
        'icon' => 'fa-solid fa-fire',
        'handler' => 'SocialHandler', 'action' => 'threadHook',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'tiktok-idea-generator' => [
        'title' => 'TikTok Idea Generator',
        'desc' => 'Generate trending TikTok video ideas, scripts, and hashtags for your niche.',
        'category' => 'marketing-tools',
        'icon' => 'fa-brands fa-tiktok',
        'handler' => 'SocialHandler', 'action' => 'tiktokIdea',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'youtube-video-rank-checker' => [
        'title' => 'YouTube Video Rank Checker',
        'desc' => 'Analyze your YouTube video SEO score and get optimization suggestions for better rankings.',
        'category' => 'seo-tools',
        'icon' => 'fa-brands fa-youtube',
        'handler' => 'SeoHandler', 'action' => 'ytRankChecker',
        'is_frontend_only' => true,
        'inputs' => []
    ],

    // --- BATCH 2: IMAGE PROCESSING TOOLS ---
    'blur-face-in-image' => [
        'title' => 'Blur Face In Image',
        'desc' => 'Automatically detect and blur faces in photos for privacy protection using AI face detection.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-user-secret',
        'handler' => 'ImageHandler', 'action' => 'blurFace',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'dpi-converter' => [
        'title' => 'DPI Converter',
        'desc' => 'Change the DPI/PPI resolution of any image for print or web use without quality loss.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-expand',
        'handler' => 'ImageHandler', 'action' => 'dpiConverter',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'gif-maker' => [
        'title' => 'GIF Maker',
        'desc' => 'Create animated GIFs from multiple images with custom speed, size, and loop settings.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-film',
        'handler' => 'ImageHandler', 'action' => 'gifMaker',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'heic-to-jpg-converter' => [
        'title' => 'HEIC to JPG Converter',
        'desc' => 'Convert Apple HEIC/HEIF photos to JPG format instantly in your browser. Batch support included.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-image',
        'handler' => 'ImageHandler', 'action' => 'heicToJpg',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'image-exif-data-viewer' => [
        'title' => 'Image EXIF Data Viewer',
        'desc' => 'View detailed EXIF metadata from any photo including camera settings, GPS location, and timestamps.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-circle-info',
        'handler' => 'ImageHandler', 'action' => 'exifDataViewer',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'image-splitter' => [
        'title' => 'Image Splitter',
        'desc' => 'Split any image into a grid of equal parts for Instagram carousels, puzzles, or printing.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-table-cells',
        'handler' => 'ImageHandler', 'action' => 'imageSplitter',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'image-upscaler' => [
        'title' => 'Image Upscaler',
        'desc' => 'Upscale and enhance low-resolution images using advanced interpolation algorithms.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-up-right-and-down-left-from-center',
        'handler' => 'ImageHandler', 'action' => 'imageUpscaler',
        'is_frontend_only' => true,
        'inputs' => []
    ],

    // --- BATCH 3: PDF TOOLS ---
    'image-to-pdf-converter' => [
        'title' => 'Image To PDF Converter',
        'desc' => 'Convert multiple images into a single PDF document instantly and securely in your browser.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-file-pdf',
        'handler' => 'PdfHandler', 'action' => 'imageToPdf',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'csv-to-pdf-table' => [
        'title' => 'CSV To PDF Table',
        'desc' => 'Convert raw CSV data into styled, paginated PDF tables with customizable formatting.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-table',
        'handler' => 'PdfHandler', 'action' => 'csvToPdf',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'epub-to-pdf-converter' => [
        'title' => 'Epub To PDF Converter',
        'desc' => 'Convert EPUB ebooks to highly readable PDF documents with custom typography settings.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-book',
        'handler' => 'PdfHandler', 'action' => 'epubToPdf',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'extract-images-from-pdf' => [
        'title' => 'Extract Images From PDF',
        'desc' => 'Extract all embedded image files from PDF documents in high resolution without quality loss.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-images',
        'handler' => 'PdfHandler', 'action' => 'extractPdfImages',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'flatten-pdf-tool' => [
        'title' => 'Flatten PDF Tool',
        'desc' => 'Permanently flatten PDF form fields, annotations, and layers into a secure, non-editable document.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-layer-group',
        'handler' => 'PdfHandler', 'action' => 'flattenPdf',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'pdf-redaction-tool' => [
        'title' => 'PDF Redaction Tool',
        'desc' => 'Securely black-out and permanently redact sensitive text and areas from PDF documents.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-marker',
        'handler' => 'PdfHandler', 'action' => 'redactPdf',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'pdf-text-extractor' => [
        'title' => 'PDF Text Extractor',
        'desc' => 'Extract selectable text from PDF documents while preserving structure and formatting.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-file-lines',
        'handler' => 'PdfHandler', 'action' => 'extractPdfText',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'pdf-to-html-converter' => [
        'title' => 'PDF To HTML Converter',
        'desc' => 'Convert PDF files to clean HTML code with embedded images and layout preservation.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-code',
        'handler' => 'PdfHandler', 'action' => 'pdfToHtml',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'pdf-to-image-extractor' => [
        'title' => 'PDF To Image Extractor',
        'desc' => 'Render and extract pages from a PDF document as high-quality PNG or JPEG image files.',
        'category' => 'pdf-tools',
        'icon' => 'fa-solid fa-file-image',
        'handler' => 'PdfHandler', 'action' => 'pdfToImage',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'compare-two-documents' => [
        'title' => 'Compare Two Documents Tool',
        'desc' => 'Analyze and visually compare two text documents side-by-side to highlight differences and edits.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-not-equal',
        'handler' => 'DevHandler', 'action' => 'compareDocs',
        'is_frontend_only' => true,
        'inputs' => []
    ],

    // --- BATCH 3: DEVELOPER & UTILITY TOOLS ---
    'profile-picture-maker' => [
        'title' => 'Profile Picture Maker',
        'desc' => 'Create professional, perfectly cropped profile pictures with custom borders and backgrounds.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-user-circle',
        'handler' => 'DevHandler', 'action' => 'profilePicMaker',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'sprite-sheet-maker' => [
        'title' => 'Sprite Sheet Maker',
        'desc' => 'Automatically pack multiple images into an optimized sprite sheet with generated CSS code.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-th',
        'handler' => 'DevHandler', 'action' => 'spriteSheetMaker',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'svg-to-png-converter' => [
        'title' => 'SVG To PNG Converter',
        'desc' => 'Convert scalable vector graphics (SVG) into high-resolution PNG raster images up to 8K.',
        'category' => 'image-tools',
        'icon' => 'fa-solid fa-vector-square',
        'handler' => 'DevHandler', 'action' => 'svgToPng',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'video-to-audio-extractor' => [
        'title' => 'Video To Audio Extractor',
        'desc' => 'Extract high-quality audio tracks (MP3/WAV) from video files directly in your browser.',
        'category' => 'developer-tools', // Can go in media-tools or utility-tools too
        'icon' => 'fa-solid fa-file-audio',
        'handler' => 'DevHandler', 'action' => 'videoToAudio',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'excel-to-html-converter' => [
        'title' => 'Excel To HTML Converter',
        'desc' => 'Convert Excel spreadsheets (.xlsx, .xls) into clean, stylable HTML tables instantly.',
        'category' => 'developer-tools',
        'icon' => 'fa-solid fa-table-list',
        'handler' => 'DevHandler', 'action' => 'excelToHtml',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'email-breach-checker' => [
        'title' => 'Email Breach Checker',
        'desc' => 'Perform a secure, k-anonymity check to see if your email address was exposed in data breaches.',
        'category' => 'security-tools',
        'icon' => 'fa-solid fa-shield-virus',
        'handler' => 'DevHandler', 'action' => 'emailBreach',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'git-commit-message-generator' => [
        'title' => 'Git Commit Message Generator',
        'desc' => 'Standardize your repo history by generating formatted Conventional Commits messages.',
        'category' => 'developer-tools',
        'icon' => 'fa-brands fa-git-alt',
        'handler' => 'DevHandler', 'action' => 'gitCommitMsg',
        'is_frontend_only' => true,
        'inputs' => []
    ],
    'vcf-file-generator' => [
        'title' => 'VCF File Generator',
        'desc' => 'Generate and download rich vCard contact files (VCF) optimized with embedded QR codes.',
        'category' => 'utility-tools',
        'icon' => 'fa-solid fa-address-book',
        'handler' => 'DevHandler', 'action' => 'vcfGen',
        'is_frontend_only' => true,
        'inputs' => []
    ],

    // --- BATCH 4: DEVELOPER TOOLS ---
    'html-entity-encode' => [
        'title' => 'HTML Entity Encode', 'desc' => 'Securely encode special characters into their HTML entity equivalents.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-code-branch', 'handler' => 'DevHandler', 'action' => 'htmlEntityEncode'
    ],
    'html-entity-decode' => [
        'title' => 'HTML Entity Decode', 'desc' => 'Convert HTML entities back into their original readable characters.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-code', 'handler' => 'DevHandler', 'action' => 'htmlEntityDecode'
    ],
    'ipv4-to-ipv6' => [
        'title' => 'IPv4 to IPv6', 'desc' => 'Map standard IPv4 addresses to their IPv6 transition equivalents.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-arrows-split-up-and-left', 'handler' => 'DevHandler', 'action' => 'ipv4ToIpv6'
    ],
    'http-status-checker' => [
        'title' => 'HTTP Status Checker', 'desc' => 'Instant lookup for all standard HTTP status codes and their meanings.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-server', 'handler' => 'DevHandler', 'action' => 'httpStatus'
    ],
    'meta-tags-generator' => [
        'title' => 'Meta Tags Generator', 'desc' => 'Create SEO-friendly HTML meta tags to improve search engine rankings.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-rectangle-ad', 'handler' => 'DevHandler', 'action' => 'metaTags'
    ],
    'css-box-shadow' => [
        'title' => 'CSS Box Shadow', 'desc' => 'Visually design and generate code for professional CSS3 box shadows.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-layer-group', 'handler' => 'DevHandler', 'action' => 'boxShadow'
    ],
    'hex-to-rgb' => [
        'title' => 'HEX to RGB', 'desc' => 'Convert web HEX colors to RGB or RGBA values with real-time preview.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-palette', 'handler' => 'DevHandler', 'action' => 'hexToRgb'
    ],
    'qr-code-generator' => [
        'title' => 'QR Code Generator', 'desc' => 'Create custom, high-quality QR codes for URLs, text, and Wi-Fi.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-qrcode', 'handler' => 'DevHandler', 'action' => 'qrGenerator'
    ],
    'rgb-to-hex' => [
        'title' => 'RGB to HEX', 'desc' => 'Convert RGB color values to their Hexadecimal equivalents.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-fill-drip', 'handler' => 'DevHandler', 'action' => 'rgbToHex'
    ],
    'color-palette-generator' => [
        'title' => 'Color Palette Generator', 'desc' => 'Generate harmonious color schemes for your next web project.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-swatchbook', 'handler' => 'DevHandler', 'action' => 'paletteGen'
    ],

    // --- BATCH 5: FORMATTERS & CONVERTERS ---
    'json-formatter' => [
        'title' => 'JSON Formatter (Pro)', 'desc' => 'Clean, format, and validate JSON data with syntax highlighting and tree view.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-indent', 'handler' => 'DevHandler', 'action' => 'jsonFormatter'
    ],
    'js-minifier' => [
        'title' => 'JavaScript Minifier', 'desc' => 'Compress JavaScript code by removing whitespace and comments to boost performance.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-compress', 'handler' => 'DevHandler', 'action' => 'jsMinifier'
    ],
    'css-minifier' => [
        'title' => 'CSS Minifier (Pro)', 'desc' => 'Optimize CSS files for production by stripping unnecessary characters and formatting.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-file-contract', 'handler' => 'DevHandler', 'action' => 'cssMinifier'
    ],
    'js-beautifier' => [
        'title' => 'JavaScript Beautifier', 'desc' => 'Restore readability to minified JS/TS code with customizable formatting rules.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-wand-magic-sparkles', 'handler' => 'DevHandler', 'action' => 'jsBeautifier'
    ],
    'json-to-yaml' => [
        'title' => 'JSON to YAML Converter', 'desc' => 'Instantly transform JSON objects into clean, readable YAML configurations.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-exchange-alt', 'handler' => 'DevHandler', 'action' => 'jsonToYaml'
    ],
    'yaml-to-json' => [
        'title' => 'YAML to JSON Converter', 'desc' => 'Convert YAML data back into JSON format for easier programatic manipulation.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-sync', 'handler' => 'DevHandler', 'action' => 'yamlToJson'
    ],
    'base64-to-image' => [
        'title' => 'Base64 to Image Decoder', 'desc' => 'Decode Base64 strings into downloadable image files with real-time preview.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-image', 'handler' => 'DevHandler', 'action' => 'base64ToImage'
    ],
    'image-to-base64' => [
        'title' => 'Image to Base64 Encoder', 'desc' => 'Convert local images into Base64 strings or Data URIs for source code embedding.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-code', 'handler' => 'DevHandler', 'action' => 'imageToBase64'
    ],
    'cron-generator' => [
        'title' => 'Cron Job Generator', 'desc' => 'Create Unix cron schedule expressions with human-readable verification.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-clock', 'handler' => 'DevHandler', 'action' => 'cronGenerator'
    ],
    'user-agent-parser' => [
        'title' => 'User-Agent Parser', 'desc' => 'Deconstruct HTTP User-Agent headers to identify browser, OS, and device metadata.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-user-gear', 'handler' => 'DevHandler', 'action' => 'uaParser'
    ],

    // --- BATCH 6: SECURITY & DEV TOOLS ---
    'md5-generator' => [
        'title' => 'MD5 Generator (Pro)', 'desc' => 'Generate highly secure 128-bit MD5 fingerprints for any text data or secret keys.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-hashtag', 'handler' => 'DevHandler', 'action' => 'md5'
    ],
    'sha1-generator' => [
        'title' => 'SHA-1 Generator (Pro)', 'desc' => 'Create secure 160-bit SHA-1 message digests for data verification and legacy systems.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-shield-halved', 'handler' => 'DevHandler', 'action' => 'sha1'
    ],
    'sha256-generator' => [
        'title' => 'SHA-256 Generator (Pro)', 'desc' => 'Generate cryptographically secure 256-bit hashes using the industry-standard SHA-2 algorithm.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-lock', 'handler' => 'DevHandler', 'action' => 'sha256'
    ],
    'sha512-generator' => [
        'title' => 'SHA-512 Generator (Pro)', 'desc' => 'Create ultra-strong 512-bit message digests for highest-integrity data signatures.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-vault', 'handler' => 'DevHandler', 'action' => 'sha512'
    ],
    'bcrypt-generator' => [
        'title' => 'Bcrypt Generator (Pro)', 'desc' => 'Securely hash passwords with adaptive cost factors using the industry-standard Bcrypt algorithm.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-key', 'handler' => 'DevHandler', 'action' => 'bcrypt'
    ],
    'jwt-decoder' => [
        'title' => 'JWT Decoder (Pro)', 'desc' => 'Securely parse and inspect JSON Web Tokens (JWT) to view headers, payloads, and claims.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-user-secret', 'handler' => 'DevHandler', 'action' => 'jwtDecoder'
    ],
    'uuid-generator' => [
        'title' => 'UUID v4 Generator (Pro)', 'desc' => 'Generate cryptographically secure, universally unique identifiers for your systems.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-id-card', 'handler' => 'DevHandler', 'action' => 'uuid'
    ],

    // --- BATCH 6-9: PROFESSIONAL UTILITIES (Consolidated) ---
    'hex-to-string' => [
        'title' => 'HEX to String Converter (Pro)', 'desc' => 'Instantly convert hexadecimal character codes into human-readable plain text strings.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-code', 'handler' => 'DevHandler', 'action' => 'hexToString'
    ],
    'string-to-hex' => [
        'title' => 'String to HEX Converter (Pro)', 'desc' => 'Encode plain text strings into their hexadecimal character code equivalents instantly.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-file-code', 'handler' => 'DevHandler', 'action' => 'stringToHex'
    ],
    'sql-minifier' => [
        'title' => 'SQL Minifier (Pro)', 'desc' => 'Compress multi-line database queries into a single string by removing comments and whitespace.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-compress', 'handler' => 'DevHandler', 'action' => 'sqlMinifier'
    ],
    'yaml-validator' => [
        'title' => 'YAML Validator (Pro)', 'desc' => 'Instantly validate, format, and debug structural errors in your YAML configuration files.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-list-check', 'handler' => 'DevHandler', 'action' => 'yamlValidator'
    ],
    'json-minifier' => [
        'title' => 'JSON Minifier (Pro)', 'desc' => 'Compress JSON payloads by removing all unnecessary whitespace and line breaks instantly.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-code', 'handler' => 'DevHandler', 'action' => 'jsonMinifier'
    ],
    'xml-minifier' => [
        'title' => 'XML Minifier (Pro)', 'desc' => 'Compress vast XML documents by stripping spacing, tabs, and comments on the fly.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-file-code', 'handler' => 'DevHandler', 'action' => 'xmlMinifier'
    ],
    'css-beautifier' => [
        'title' => 'CSS Beautifier (Pro)', 'desc' => 'Instantly format, align, and organize messy Cascading Style Sheets into highly readable syntax.',
        'category' => 'developer-tools', 'icon' => 'fa-brands fa-css3-alt', 'handler' => 'DevHandler', 'action' => 'cssBeautifier'
    ],
    'html-beautifier' => [
        'title' => 'HTML Beautifier (Pro)', 'desc' => 'Clean up messy, minified, or unindented HTML structures back into highly readable XML/HTML trees.',
        'category' => 'developer-tools', 'icon' => 'fa-brands fa-html5', 'handler' => 'DevHandler', 'action' => 'htmlBeautifier'
    ],
    'jwt-generator' => [
        'title' => 'JWT Generator (Pro)', 'desc' => 'Create and sign secure JSON Web Tokens locally using custom payloads, secrets, and expiration algorithms.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-key', 'handler' => 'DevHandler', 'action' => 'jwtGenerator'
    ],
    'regex-tester' => [
        'title' => 'Regex Tester (Pro)', 'desc' => 'Test, debug, and execute complex PCRE/JS Regular Expressions directly within your browser.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-magnifying-glass-text', 'handler' => 'DevHandler', 'action' => 'regexTester'
    ],
    'sql-validator' => [
        'title' => 'SQL Syntax Validator (Pro)', 'desc' => 'Instantly parse and validate raw database queries for architectural syntax errors before executing them.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-database', 'handler' => 'DevHandler', 'action' => 'sqlValidator'
    ],
    'unix-timestamp-converter' => [
        'title' => 'Unix Timestamp Converter (Pro)', 'desc' => 'Instantly convert epoch timestamps to human-readable dates, or parse date strings into precise seconds.',
        'category' => 'developer-tools', 'icon' => 'fa-regular fa-clock', 'handler' => 'DevHandler', 'action' => 'unixTimestampConverter'
    ],
    'rsa-key-generator' => [
        'title' => 'RSA Key Pair Generator (Pro)', 'desc' => 'Securely generate 2048-bit and 4096-bit asymmetric public/private cryptographic key pairs locally.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-key', 'handler' => 'SecurityHandler', 'action' => 'rsaKeyGenerator'
    ],
    'file-hash-calculator' => [
        'title' => 'File Hash Calculator (Pro)', 'desc' => 'Verify data integrity by calculating MD5, SHA-1, SHA-256, and SHA-512 cryptographic digests locally.',
        'category' => 'security-tools', 'icon' => 'fa-solid fa-file-shield', 'handler' => 'SecurityHandler', 'action' => 'fileHashCalculator'
    ],
    'curl-command-generator' => [
        'title' => 'cURL Command Generator (Pro)', 'desc' => 'Visually architect, configure, and generate complex command-line HTTP requests with custom headers and payloads.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-terminal', 'handler' => 'DevHandler', 'action' => 'curlCommandGenerator'
    ],
    'css-gradient-generator' => [
        'title' => 'CSS Gradient Generator (Pro)', 'desc' => 'Design stunning, cross-browser compatible linear and radial CSS backgrounds visually.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-droplet', 'handler' => 'DevHandler', 'action' => 'cssGradientGenerator'
    ],
    'aspect-ratio-calculator' => [
        'title' => 'Aspect Ratio Calculator (Pro)', 'desc' => 'Automatically identify the mathematical ratio of a resolution, or scale image dimensions proportionally.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-crop-simple', 'handler' => 'DevHandler', 'action' => 'aspectRatioCalculator'
    ],
    'chmod-calculator' => [
        'title' => 'Chmod Permissions Calculator (Pro)', 'desc' => 'Visually map Linux Unix read/write/execute file permissions to their exact Octal and Symbolic representations.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-unlock-keyhole', 'handler' => 'DevHandler', 'action' => 'chmodCalculator'
    ],
    'subnet-calculator' => [
        'title' => 'Subnet & CIDR Calculator (Pro)', 'desc' => 'Identify network masks, broadcasting constraints, and usable host pathways instantly utilizing IPv4 network metrics.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-network-wired', 'handler' => 'DevHandler', 'action' => 'subnetCalculator'
    ],
    'utm-builder' => [
        'title' => 'UTM Campaign Builder (Pro)', 'desc' => 'Construct perfect tracking URLs for Google Analytics to monitor your inbound marketing performance.',
        'category' => 'seo-tools', 'icon' => 'fa-solid fa-link', 'handler' => 'SeoHandler', 'action' => 'utmBuilder'
    ],
    'text-diff-checker' => [
        'title' => 'Text Diff Checker (Pro)', 'desc' => 'Visually compare two strings or codeblocks side-by-side to highlight insertions and deletions instantly.',
        'category' => 'developer-tools', 'icon' => 'fa-solid fa-code-compare', 'handler' => 'DevHandler', 'action' => 'textDiffChecker'
    ],

];



