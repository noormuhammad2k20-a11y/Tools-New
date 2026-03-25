

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="mb-8">
            <textarea id="input-text" class="w-full h-48 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-xl font-medium resize-none outline-none" placeholder="Paste your article or text here for deep analysis..."></textarea>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 text-center group hover:bg-white transition-all shadow-sm">
                <div id="read-score" class="text-3xl font-black text-primary mb-1">0</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Ease Score</div>
            </div>
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 text-center group hover:bg-white transition-all shadow-sm">
                <div id="grade-level" class="text-3xl font-black text-indigo-500 mb-1">...</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Grade Level</div>
            </div>
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 text-center group hover:bg-white transition-all shadow-sm">
                <div id="word-count" class="text-3xl font-black text-emerald-500 mb-1">0</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Words</div>
            </div>
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 text-center group hover:bg-white transition-all shadow-sm">
                <div id="sent-count" class="text-3xl font-black text-blue-500 mb-1">0</div>
                <div class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Sentences</div>
            </div>
        </div>

        <div class="p-8 bg-gray-900 rounded-3xl border border-gray-800 shadow-2xl relative overflow-hidden group">
            <div class="relative z-10">
                <h4 class="text-emerald-400 text-xs font-black uppercase tracking-[0.3em] mb-4">Linguistic Summary</h4>
                <p id="analysis-text" class="text-gray-400 text-sm leading-relaxed italic">Type some text to see the readability verdict...</p>
            </div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl group-hover:bg-primary/10 transition-colors"></div>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const readScoreEl = document.getElementById('read-score');
    const gradeLevelEl = document.getElementById('grade-level');
    const wordCountEl = document.getElementById('word-count');
    const sentCountEl = document.getElementById('sent-count');
    const analysisText = document.getElementById('analysis-text');

    function countSyllables(word) {
        word = word.toLowerCase();
        if(word.length <= 3) return 1;
        word = word.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');
        word = word.replace(/^y/, '');
        return word.match(/[aeiouy]{1,2}/g)?.length || 1;
    }

    function analyze() {
        const text = input.value.trim();
        if(!text) {
            readScoreEl.innerText = '0';
            gradeLevelEl.innerText = '...';
            wordCountEl.innerText = '0';
            sentCountEl.innerText = '0';
            analysisText.innerText = 'Type some text to see the readability verdict...';
            return;
        }

        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
        const words = text.split(/\s+/).filter(w => w.trim().length > 0);
        
        let totalSyllables = 0;
        words.forEach(w => totalSyllables += countSyllables(w));

        const avgWordsPerSent = words.length / (sentences.length || 1);
        const avgSyllablesPerWord = totalSyllables / (words.length || 1);

        // Flesch Reading Ease
        const score = 206.835 - (1.015 * avgWordsPerSent) - (84.6 * avgSyllablesPerWord);
        const roundedScore = Math.round(score);

        // Flesch-Kincaid Grade Level
        const gradeLevel = (0.39 * avgWordsPerSent) + (11.8 * avgSyllablesPerWord) - 15.59;
        const roundedGrade = Math.round(gradeLevel * 10) / 10;

        readScoreEl.innerText = Math.max(0, roundedScore);
        gradeLevelEl.innerText = roundedGrade;
        wordCountEl.innerText = words.length;
        sentCountEl.innerText = sentences.length;

        let verdict = "";
        if(score > 90) verdict = "Very easy to read. Easily understood by an average 11-year-old student.";
        else if(score > 80) verdict = "Easy to read. Conversational English for consumers.";
        else if(score > 70) verdict = "Fairly easy to read.";
        else if(score > 60) verdict = "Standard. Plain English. Easily understood by 13- to 15-year-old students.";
        else if(score > 50) verdict = "Fairly difficult to read.";
        else if(score > 30) verdict = "Difficult to read. Academic or professional level.";
        else verdict = "Very difficult to read. Best understood by university graduates.";

        analysisText.innerText = verdict;
    }

    input.addEventListener('input', analyze);
    analyze();
});
</script>





