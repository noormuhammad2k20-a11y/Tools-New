/**
 * Pro Braille Translator - Frontend Engine
 * Handles live translation between English Text and Braille Unicode (Grade 1).
 */

const BrailleEngine = {
    // English -> Braille Mapping (Grade 1)
    map: {
        'a': '⠁', 'b': '⠃', 'c': '⠉', 'd': '⠙', 'e': '⠑', 'f': '⠋', 'g': '⠛', 'h': '⠓', 'i': '⠊', 'j': '⠚',
        'k': '⠅', 'l': '⠇', 'm': '⠍', 'n': '⠝', 'o': '⠕', 'p': '⠏', 'q': '⠟', 'r': '⠗', 's': '⠎', 't': '⠞',
        'u': '⠥', 'v': '⠧', 'w': '⠺', 'x': '⠭', 'y': '⠽', 'z': '⠵',
        '1': '⠁', '2': '⠃', '3': '⠉', '4': '⠙', '5': '⠑', '6': '⠋', '7': '⠛', '8': '⠓', '9': '⠊', '0': '⠚',
        ' ': '⠀', // U+2800 (Blank)
        '.': '⠲', ',': '⠂', '?': '⠦', '!': '⠖', '-': '⠤', '\'': '⠄', ':': '⠒', ';': '⠂', '(': '⠦', ')': '⠴', '"': '⠴'
    },

    indicators: {
        number: '⠼', // Dots 3,4,5,6
        capital: '⠠'  // Dot 6
    },

    translateToBraille(text) {
        let result = '';
        let numberMode = false;

        for (let i = 0; i < text.length; i++) {
            const char = text[i];
            const lowerChar = char.toLowerCase();

            // Handle numbers
            if (/[0-9]/.test(char)) {
                if (!numberMode) {
                    result += this.indicators.number;
                    numberMode = true;
                }
                result += this.map[char] || '';
            } 
            // Handle letters and spaces
            else {
                numberMode = false;
                if (/[A-Z]/.test(char)) {
                    result += this.indicators.capital;
                }
                
                if (this.map[lowerChar]) {
                    result += this.map[lowerChar];
                } else {
                    result += char; // Keep unknown characters as is
                }
            }
        }
        return result;
    },

    translateToText(braille) {
        // Reverse map for decoding
        const reverseMap = {};
        for (const [key, value] of Object.entries(this.map)) {
            // We only need to map back to letters/numbers for basic decoding
            if (/[a-z0-9 ]/.test(key) || ['.', ',', '?', '!', '-'].includes(key)) {
                if (!reverseMap[value]) reverseMap[value] = key;
            }
        }

        let result = '';
        let numberMode = false;
        let capitalNext = false;

        for (let i = 0; i < braille.length; i++) {
            const char = braille[i];

            if (char === this.indicators.number) {
                numberMode = true;
                continue;
            }
            if (char === this.indicators.capital) {
                capitalNext = true;
                continue;
            }
            if (char === ' ') {
                numberMode = false;
                result += ' ';
                continue;
            }
            if (char === '⠀') { // Braille blank space
                numberMode = false;
                result += ' ';
                continue;
            }

            let translated = reverseMap[char] || '?';

            // Post-processing based on indicators
            if (numberMode) {
                // If it's a letter a-j, it's a number 1-0
                const numVal = this.getNumericValue(char);
                if (numVal !== null) translated = numVal;
                else numberMode = false; // Breaking number mode on non-number braille char
            }

            if (capitalNext) {
                translated = translated.toUpperCase();
                capitalNext = false;
            }

            result += translated;
        }

        return result;
    },

    getNumericValue(brailleChar) {
        const numMap = {'⠁':'1','⠃':'2','⠉':'3','⠙':'4','⠑':'5','⠋':'6','⠛':'7','⠓':'8','⠊':'9','⠚':'0'};
        return numMap[brailleChar] || null;
    }
};

// UI Controller
document.addEventListener('DOMContentLoaded', () => {
    const sourceInput = document.getElementById('source-input');
    const sourceOutput = document.getElementById('source-output');
    const swapBtn = document.getElementById('swap-btn');
    const sourceLabel = document.getElementById('source-label');
    const targetLabel = document.getElementById('target-label');

    let isToBraille = true;

    // Live Translation
    const performTranslation = () => {
        const input = sourceInput.value;
        if (!input) {
            sourceOutput.value = '';
            return;
        }

        if (isToBraille) {
            sourceOutput.value = BrailleEngine.translateToBraille(input);
        } else {
            sourceOutput.value = BrailleEngine.translateToText(input);
        }
    };

    sourceInput.addEventListener('input', performTranslation);

    // Swap Direction
    swapBtn.addEventListener('click', () => {
        isToBraille = !isToBraille;
        
        // Swap labels content
        const tempLabel = sourceLabel.innerText;
        sourceLabel.innerText = targetLabel.innerText;
        targetLabel.innerText = tempLabel;

        // Swap textareas content
        const tempText = sourceInput.value;
        sourceInput.value = sourceOutput.value;
        sourceOutput.value = tempText;

        // Update placeholders
        if (isToBraille) {
            sourceInput.placeholder = "Start typing English text...";
            sourceOutput.placeholder = "Braille appears here...";
            sourceOutput.style.fontSize = "1.5rem";
            sourceInput.style.fontSize = "1.25rem";
        } else {
            sourceInput.placeholder = "Paste Braille Unicode patterns...";
            sourceOutput.placeholder = "English text appears here...";
            sourceInput.style.fontSize = "1.5rem";
            sourceOutput.style.fontSize = "1.25rem";
        }

        performTranslation();
    });
});

// Premium Action Button Handlers
function clearTranslator() {
    document.getElementById('source-input').value = '';
    document.getElementById('source-output').value = '';
    if (window.showToast) showToast('Translator cleared', 'info');
}

function copyTranslatorResult() {
    const result = document.getElementById('source-output').value;
    if (!result) return;

    navigator.clipboard.writeText(result).then(() => {
        if (window.showToast) showToast('Copied to clipboard!');
        else alert('Copied to clipboard!');
    });
}

function downloadTranslatorResult() {
    const result = document.getElementById('source-output').value;
    if (!result) return;

    const blob = new Blob([result], { type: 'text/plain;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    const isToBraille = document.getElementById('source-label').innerText.includes('English');
    
    a.href = url;
    a.download = isToBraille ? 'braille-translation.txt' : 'english-translation.txt';
    a.click();
    URL.revokeObjectURL(url);
    if (window.showToast) showToast('Download started');
}
