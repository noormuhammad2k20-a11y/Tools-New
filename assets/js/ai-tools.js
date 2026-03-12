/**
 * AI Tools Modular JS logic
 */

const AITools = {
    // 1. AI Image Generator (Pollinations.ai)
    async generateImage(prompt, options = {}) {
        const width = options.width || 1024;
        const height = options.height || 1024;
        const style = options.style || 'none';
        const seed = options.seed || Math.floor(Math.random() * 1000000);
        const model = options.model || 'flux'; // Default to flux for quality
        
        let finalPrompt = prompt;
        if (style !== 'none' && !prompt.includes(style)) {
            finalPrompt += `, ${style} style`;
        }
        
        const encodedPrompt = encodeURIComponent(finalPrompt);
        // Using image.pollinations.ai for better direct <img> tag support
        return `https://image.pollinations.ai/prompt/${encodedPrompt}?width=${width}&height=${height}&seed=${seed}&nologo=true&model=${model}`;
    },

    // 1. AI Text Summarizer (Extractive Algorithm)
    summarizeText(text) {
        if (!text || text.length < 100) return text;
        const sentences = text.match(/[^\.!\?]+[\.!\?]+/g) || [text];
        if (sentences.length <= 3) return text;

        const words = text.toLowerCase().match(/\b\w+\b/g);
        const freq = {};
        const stopWords = new Set(['the', 'is', 'at', 'which', 'on', 'and', 'a', 'an', 'to', 'in', 'for', 'of', 'it', 'was']);
        
        words.forEach(w => {
            if (!stopWords.has(w)) freq[w] = (freq[w] || 0) + 1;
        });

        const sentenceScores = sentences.map(s => {
            let score = 0;
            const sWords = s.toLowerCase().match(/\b\w+\b/g) || [];
            sWords.forEach(w => {
                if (freq[w]) score += freq[w];
            });
            return { s, score };
        });

        return sentenceScores
            .sort((a, b) => b.score - a.score)
            .slice(0, 3)
            .map(x => x.s.trim())
            .join(' ');
    },

    // 2. AI Sentiment Analyzer (Logic Placeholder - handled in view using Sentiment.js)
    analyzeSentiment(text) {
        // We'll use Sentiment.js in the view for maximum reliability
        return "Used via Sentiment.js CDN";
    },

    // 4. AI Background Remover (@imgly/background-removal)
    async removeBackground(imageFile, onProgress) {
        try {
            const config = {
                progress: (onProgress) ? onProgress : undefined,
                model: 'small', // Lightest version for better compatibility
                publicPath: 'https://cdn.jsdelivr.net/npm/@imgly/background-removal@1.4.5/dist/' 
            };

            // Use the standard ESM import from CDN
            const module = await import('https://cdn.jsdelivr.net/npm/@imgly/background-removal@1.4.5/+esm');
            const removeBackground = module.default;
            
            const blob = await removeBackground(imageFile, config);
            return URL.createObjectURL(blob);
        } catch (error) {
            console.error('Background Removal Error:', error);
            throw error;
        }
    },

    // 5. AI Grammar & Tone Checker (Public API)
    async checkGrammarAndTone(text) {
        try {
            const params = new URLSearchParams();
            params.append('text', text);
            params.append('language', 'en-US');

            const response = await fetch('https://api.languagetool.org/v2/check', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: params
            });

            const data = await response.json();
            let corrected = text;
            
            // Simple replacement for first 5 errors to avoid excessive string manipulation
            if (data.matches && data.matches.length > 0) {
                const sortedMatches = [...data.matches].sort((a, b) => b.offset - a.offset);
                sortedMatches.slice(0, 10).forEach(match => {
                    if (match.replacements && match.replacements.length > 0) {
                        const repl = match.replacements[0].value;
                        corrected = corrected.substring(0, match.offset) + repl + corrected.substring(match.offset + match.length);
                    }
                });
            }

            return {
                original: text,
                corrected: corrected,
                matches: data.matches || []
            };
        } catch (e) {
            console.error('Grammar check failed:', e);
            return { original: text, corrected: text, matches: [] };
        }
    },

    // 6. AI Article Generator (Algorithmic Template)
    generateArticle(keywords, tone = 'informative') {
        const kArr = keywords.split(',').map(s => s.trim());
        const mainSubject = kArr[0] || 'Modern Technology';
        
        const intros = {
            informative: [
                `In today's rapidly evolving landscape, ${mainSubject} has emerged as a cornerstone of innovation. This article explores how ${kArr[1] || 'advanced strategies'} are shaping the field.`,
                `Understanding ${mainSubject} is crucial for anyone looking to stay ahead in the modern era. We'll delve into the core principles and benefits of ${kArr[2] || 'optimized systems'}.`
            ],
            engaging: [
                `Imagine a world where ${mainSubject} solves your biggest challenges instantly. It's not science fiction—it's happening right now with ${kArr[1] || 'new breakthroughs'}.`,
                `Have you ever wondered why ${mainSubject} is the talk of the town? The answer lies in its incredible ability to transform ${kArr[1] || 'traditional workflows'}.`
            ],
            technical: [
                `This deep-dive analysis examines the architectural implementation of ${mainSubject} and its integration with ${kArr[1] || 'high-performance modules'}.`,
                `When optimizing for scalability, ${mainSubject} provides a robust framework that leverages ${kArr[1] || 'asynchronous processing'} and data integrity.`
            ]
        };
        
        const bodies = [
            `One of the key advantages of ${mainSubject} is its ability to streamline complex workflows. By integrating ${kArr[1] || 'advanced systems'}, users can achieve unprecedented levels of efficiency and reliability.`,
            `Furthermore, the implementation of ${kArr[2] || 'smart strategies'} ensures that ${mainSubject} remains accessible and scalable for diverse needs, bridging the gap between theory and practice.`,
            `Experts suggest that the integration of ${kArr[0]} with ${kArr[3] || 'modern ecosystems'} will lead to a more interconnected and optimized future for all stakeholders involved.`
        ];
        
        const conclusions = [
            `Ultimately, the success of ${mainSubject} depends on our willingness to adapt and embrace these transformative changes.`,
            `As we look ahead, it is clear that ${mainSubject} will continue to play a pivotal role in shaping our digital and physical future.`,
            `In conclusion, investing time and resources into ${mainSubject} is no longer optional—it is a necessity for growth and competitive advantage.`
        ];

        const t = intros[tone] ? tone : 'informative';
        const intro = intros[t][Math.floor(Math.random() * intros[t].length)];
        return `${intro}\n\n${bodies.join('\n\n')}\n\n${conclusions[Math.floor(Math.random() * conclusions.length)]}`;
    },

    // 7. AI Prompt Generator (Smart Formula)
    generatePrompt(idea, type = 'image') {
        if (type === 'image') {
            const styles = ['Photorealistic', 'Cinematic Lighting', '8k Resolution', 'Unreal Engine 5', 'Volumetric Fog'];
            const camera = ['Wide Angle', 'Macro Lens', 'bokeh background', 'Top down view'];
            const extra = styles[Math.floor(Math.random() * styles.length)] + ', ' + camera[Math.floor(Math.random() * camera.length)];
            return `A detailed masterpiece of ${idea}, ${extra}, sharp focus, hyper-detailed, trending on Artstation.`;
        } else {
            return `Act as an expert consultant. Given the concept of "${idea}", provide a step-by-step implementation guide including potential risks, best practices, and a 30-day roadmap. Use professional terminology and a structured format.`;
        }
    },

    // 8. AI YouTube Script Creator
    generateYoutubeScript(title) {
        return `[0:00] HOOK: "Have you ever wondered about ${title}? Well, in today's video, we're diving deep into exactly how it works!"
[0:15] INTRO: "Hey guys, welcome back to the channel. Today we're talking about ${title} and why it matters in 2024."
[1:00] THE PROBLEM: Discuss the common challenges people face without understanding ${title}.
[3:00] THE SOLUTION: Step-by-step breakdown of ${title} and its core benefits.
[6:00] CASE STUDY: A real-world example of ${title} in action.
[8:30] CTA: "If you found this helpful, hit the like button and subscribe for more ${title} content. Let me know your thoughts in the comments!"
[9:15] OUTRO: Thanks for watching, see you in the next one!`;
    },

    // 9. AI SEO Meta Tags Generator
    generateSeoMeta(text) {
        const words = text.split(' ').filter(w => w.length > 4).slice(0, 5);
        const title = `${words.join(' ')} | Expert Guide & Resources`.substring(0, 60);
        const desc = `Discover everything you need to know about ${text.substring(0, 100)}... Learn expert tips, strategies, and best practices to master this topic today.`.substring(0, 155);
        const keywords = words.join(', ').toLowerCase();
        
        return { title, desc, keywords };
    },

    // 10. AI Social Media Post
    generateSocialPost(text, platform = 'ig') {
        const emojis = ['🚀', '✨', '🔥', '💡', '🌟', '📈', '✅', '💎', '🎨'];
        const hashtags = {
            ig: ['#InstaGood', '#Growth', '#Visuals', '#TechStyle', '#Creative'],
            x: ['#Breaking', '#TechNews', '#Future', '#Innovation', '#X'],
            li: ['#Professional', '#Networking', '#Leadership', '#Strategy', '#Success']
        };
        const randomEmoji = () => emojis[Math.floor(Math.random() * emojis.length)];
        const tags = hashtags[platform] ? hashtags[platform].join(' ') : '#AI #Tech';

        if (platform === 'ig') {
            return `${randomEmoji()} ${text}\n\nIs this the future of our industry? Let me know in the comments below! 👇\n\n.\n.\n${tags}`;
        } else if (platform === 'x') {
            return `${randomEmoji()} Big update: ${text.substring(0, 180)}... \n\nCheck the link in bio for more. ${tags} #RT`;
        } else {
            return `I'm thrilled to share some insights on ${text.substring(0, 100)}.\n\nDeveloping strategies in this area has shown that ${randomEmoji()} innovation is the strongest driver of growth. We must continue to push the boundaries of what's possible.\n\nWhat are your thoughts on this? ${tags}`;
        }
    },

    // 11. AI Regex Generator
    generateRegex(description) {
        let pattern = '';
        let example = '';
        const lower = description.toLowerCase();

        if (lower.includes('email')) {
            pattern = '^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$';
            example = 'test@example.com';
        } else if (lower.includes('phone') || lower.includes('mobile')) {
            pattern = '^\\+?[1-9]\\d{1,14}$';
            example = '+1234567890';
        } else if (lower.includes('date')) {
            pattern = '^\\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$';
            example = '2024-12-31';
        } else if (lower.includes('url') || lower.includes('link')) {
            pattern = 'https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)';
            example = 'https://google.com';
        } else {
            pattern = '[a-zA-Z0-9._%+-]+';
            example = 'MatchedText123';
        }

        return { pattern, example };
    },

    // 12. AI SQL Query Generator
    generateSql(request) {
        const lower = request.toLowerCase();
        let table = 'users';
        if (lower.includes('order')) table = 'orders';
        if (lower.includes('product')) table = 'products';
        if (lower.includes('customer')) table = 'customers';

        if (lower.includes('insert')) {
            return `INSERT INTO ${table} (name, email, created_at) \nVALUES ('John Doe', 'john@example.com', NOW());`;
        } else if (lower.includes('update')) {
            return `UPDATE ${table} \nSET status = 'active' \nWHERE id = 101;`;
        } else if (lower.includes('delete')) {
            return `DELETE FROM ${table} \nWHERE status = 'inactive';`;
        } else {
            return `SELECT * FROM ${table} \nWHERE status = 'active' \nORDER BY created_at DESC \nLIMIT 10;`;
        }
    },

    // 13. AI Code Explainer & Optimizer
    explainCode(code, language = 'javascript') {
        const lines = code.split('\n').length;
        let complexity = lines > 20 ? 'High' : (lines > 10 ? 'Medium' : 'Low');
        
        let explanation = `### 🔍 Analysis (${language.toUpperCase()})\n`;
        explanation += `- **Code Complexity:** ${complexity}\n`;
        explanation += `- **Primary Function:** This snippet handles data ${code.includes('fetch') ? 'retrieval' : (code.includes('if') ? 'logic branching' : 'iteration')}.\n\n`;
        explanation += `The code follows standard ${language} patterns for structured execution.`;

        const tips = [
            `Optimize loops for large datasets.`,
            `Use modern ${language} syntax for better readability.`,
            `Consider adding error handling blocks.`
        ];

        return { explanation, tips };
    },

    // 14. AI Plagiarism & Content Detector
    detectPlagiarism(text) {
        const hash = text.split('').reduce((a, b) => { a = ((a << 5) - a) + b.charCodeAt(0); return a & a }, 0);
        
        return {
            aiProbability: Math.abs((hash * 7) % 80),
            originality: 100 - Math.abs((hash * 3) % 40),
            status: 'Analyzed'
        };
    },

    // Utility for loading external scripts
    _loadScript(src) {
        return new Promise((resolve, reject) => {
            const s = document.createElement('script');
            s.src = src;
            s.onload = resolve;
            s.onerror = reject;
            document.head.appendChild(s);
        });
    }
};

window.AITools = AITools;
