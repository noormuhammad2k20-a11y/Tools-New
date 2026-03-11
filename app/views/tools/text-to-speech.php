<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-8 group">
            <div class="absolute -top-3 left-6 px-3 py-1 bg-white border border-gray-100 rounded-lg text-[10px] font-black text-gray-400 uppercase tracking-widest z-20">Input Text</div>
            <textarea id="input-text" class="w-full h-56 p-8 bg-gray-50 border border-gray-100 rounded-3xl focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all text-gray-700 text-xl font-medium resize-none shadow-inner" placeholder="Type your text here to speak..."></textarea>
            <div class="absolute bottom-4 right-4 text-[10px] font-bold text-gray-300 uppercase tracking-widest group-focus-within:text-primary/50 transition-colors">Web Speech AI v2.0</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
            <div class="space-y-3">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Select Premium Voice</label>
                <div class="relative">
                    <select id="voice-select" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-600 outline-none focus:ring-4 focus:ring-primary/5 appearance-none cursor-pointer pr-10"></select>
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-chevron-down text-[10px]"></i>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Speech Rate</label>
                        <span id="rate-val" class="text-[10px] font-black text-primary">1.0x</span>
                    </div>
                    <input type="range" id="rate-slider" min="0.5" max="2" step="0.1" value="1" class="w-full h-2 bg-gray-100 rounded-xl appearance-none cursor-pointer accent-primary slider-thumb-premium">
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Voice Pitch</label>
                        <span id="pitch-val" class="text-[10px] font-black text-primary">1.0</span>
                    </div>
                    <input type="range" id="pitch-slider" min="0.5" max="2" step="0.1" value="1" class="w-full h-2 bg-gray-100 rounded-xl appearance-none cursor-pointer accent-primary slider-thumb-premium">
                </div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4">
            <button id="speak-btn" class="flex-[3] py-5 bg-primary text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-volume-high text-xl"></i>
                Speak Now
            </button>
            <button id="stop-btn" class="flex-1 py-5 bg-white border border-gray-100 text-gray-400 rounded-2xl font-black uppercase tracking-widest hover:text-rose-500 hover:border-rose-100 hover:bg-rose-50/30 transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-stop-circle"></i>
                Stop
            </button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const speakBtn = document.getElementById('speak-btn');
    const stopBtn = document.getElementById('stop-btn');
    const input = document.getElementById('input-text');
    const voiceSelect = document.getElementById('voice-select');
    const rateSlider = document.getElementById('rate-slider');
    const pitchSlider = document.getElementById('pitch-slider');

    const synth = window.speechSynthesis;
    let voices = [];

    function populateVoices() {
        voices = synth.getVoices();
        voiceSelect.innerHTML = voices.map((v, i) => `<option value="${i}">${v.name} (${v.lang})</option>`).join('');
    }

    populateVoices();
    if (speechSynthesis.onvoiceschanged !== undefined) {
        speechSynthesis.onvoiceschanged = populateVoices;
    }

    rateSlider.oninput = () => document.getElementById('rate-val').innerText = rateSlider.value + 'x';
    pitchSlider.oninput = () => document.getElementById('pitch-val').innerText = pitchSlider.value;

    speakBtn.addEventListener('click', () => {
        if(synth.speaking) synth.cancel();
        if(!input.value) return;

        const utter = new SpeechSynthesisUtterance(input.value);
        utter.voice = voices[voiceSelect.value];
        utter.rate = rateSlider.value;
        utter.pitch = pitchSlider.value;

        utter.onstart = () => {
            speakBtn.innerHTML = '<i class="fa-solid fa-circle-play animate-bounce text-xl"></i> Speaking...';
        };
        utter.onend = () => {
            speakBtn.innerHTML = '<i class="fa-solid fa-volume-high text-xl"></i> Speak Now';
        };
        
        synth.speak(utter);
    });

    stopBtn.addEventListener('click', () => {
        synth.cancel();
        speakBtn.innerHTML = '<i class="fa-solid fa-volume-high text-xl"></i> Speak Now';
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
