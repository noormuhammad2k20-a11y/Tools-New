

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-list" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none font-mono" placeholder="Paste your list to convert it to a JSON array..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Format</label>
                <select id="fmt-select" class="p-3 bg-gray-50 border border-gray-100 rounded-xl font-bold text-gray-700 outline-none">
                    <option value="json">JSON Array</option>
                    <option value="php">PHP Array</option>
                    <option value="js">JS Array</option>
                    <option value="csv">CSV (Comma Separated)</option>
                </select>
            </div>
            <div class="flex items-end">
                <button id="exec-btn" class="w-full py-3.5 bg-primary text-white rounded-xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:bg-primary-hover transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-code"></i>
                    Convert List
                </button>
            </div>
        </div>

        <div class="relative group">
            <textarea id="output-data" class="w-full h-64 p-6 bg-indigo-50/10 border border-indigo-100 rounded-2xl text-gray-900 text-sm font-mono resize-none outline-none" readonly placeholder="Array output..."></textarea>
            <button id="copy-btn" class="absolute bottom-4 right-4 px-5 py-2.5 bg-primary text-white text-xs font-black uppercase rounded-xl shadow-lg hover:scale-105 transition-all">Copy Array</button>
        </div>

    </div>


<!-- Content Area -->


<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-list');
    const output = document.getElementById('output-data');
    const fmtSelect = document.getElementById('fmt-select');
    const execBtn = document.getElementById('exec-btn');

    execBtn.addEventListener('click', () => {
        const lines = input.value.split('\n').map(l => l.trim()).filter(l => l.length > 0);
        if(lines.length === 0) return;

        const fmt = fmtSelect.value;
        if(fmt === 'json') {
            output.value = JSON.stringify(lines, null, 4);
        } else if(fmt === 'php') {
            output.value = "$list = [\n    \"" + lines.join("\",\n    \"") + "\"\n];";
        } else if(fmt === 'js') {
            output.value = "const list = [\n    \"" + lines.join("\",\n    \"") + "\"\n];";
        } else {
            output.value = lines.join(', ');
        }
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>





