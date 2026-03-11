<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Word Count</label>
                <input type="number" id="qty-input" value="10" min="1" max="100" 
                    class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 focus:ring-4 focus:ring-primary/5 outline-none transition-all">
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Case Format</label>
                <select id="case-select" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all">
                    <option value="none">Original</option>
                    <option value="upper">UPPERCASE</option>
                    <option value="lower">lowercase</option>
                    <option value="title" selected>Title Case</option>
                </select>
            </div>
            <div class="flex items-end">
                <button id="gen-btn" class="w-full py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrows-rotate"></i>
                    Generate
                </button>
            </div>
        </div>

        <div class="relative group">
            <div id="output-list" class="w-full min-h-[300px] p-8 bg-gray-50 border border-gray-100 rounded-3xl text-gray-700 text-lg leading-relaxed flex flex-wrap gap-3 items-start transition-all group-hover:bg-white group-hover:shadow-lg group-hover:shadow-primary/5">
                <!-- Words will appear here as chips -->
            </div>
            <div class="absolute top-4 right-4">
                <button id="copy-btn" class="px-6 py-2.5 bg-white border border-gray-100 text-primary text-[10px] font-black uppercase tracking-widest rounded-xl shadow-sm hover:border-primary transition-all flex items-center gap-2">
                    <i class="fa-solid fa-copy"></i>
                    Copy All
                </button>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const qtyInput = document.getElementById('qty-input');
    const caseSelect = document.getElementById('case-select');
    const genBtn = document.getElementById('gen-btn');
    const output = document.getElementById('output-list');

    const dictionary = ["ability", "absence", "academy", "account", "accuse", "achieve", "acquire", "address", "admire", "advance", "advice", "advise", "affair", "afford", "afraid", "agency", "agenda", "agree", "alarm", "alcohol", "alert", "alliance", "alone", "along", "already", "alter", "always", "ambition", "amount", "ancient", "angel", "anger", "angle", "animal", "annual", "answer", "anxiety", "anybody", "anyhow", "anyone", "anyway", "apart", "appeal", "appear", "apple", "apply", "appoint", "approve", "area", "argue", "arise", "armor", "around", "arrange", "arrest", "arrival", "arrive", "arrow", "article", "artist", "asleep", "aspect", "assault", "assert", "assess", "asset", "assign", "assist", "assume", "assure", "athlete", "atomic", "attach", "attack", "attempt", "attend", "attract", "auction", "audience", "author", "average", "avoid", "awake", "award", "aware", "away", "awful", "awkward", "axis", "baby", "back", "bad", "bag", "bake", "balance", "ball", "band", "bank", "bar", "bare", "base", "basic", "bath", "battle", "beach", "beam", "bean", "bear", "beat", "beauty", "become", "bed", "beer", "before", "begin", "behave", "behind", "belief", "believe", "bell", "belong", "below", "belt", "bench", "bend", "beneath", "benefit", "berry", "beside", "best", "betray", "better", "between", "beyond", "bible", "bicycle", "big", "bike", "bill", "bind", "bird", "birth", "bit", "bite", "bitter", "black", "blade", "blame", "blank", "blast", "blaze", "bleed", "blend", "bless", "blind", "blink", "block", "blood", "bloom", "blow", "blue", "board", "boat", "body", "boil", "bold", "bolt", "bomb", "bond", "bone", "book", "boom", "boot", "border", "bore", "borrow", "boss", "both", "bottle", "bottom", "bounce", "bound", "bowl", "box", "boy", "brain", "brake", "branch", "brand", "brass", "brave", "bread", "break", "breast", "breath", "breathe", "breed", "brick", "bridge", "brief", "bright", "bring", "brisk", "broad", "brown", "brush", "brute", "bubble", "bucket", "budget", "build", "bulb", "bulk", "bull", "bullet", "bundle", "burden", "burn", "burst", "bury", "bush", "business", "busy", "but", "butter", "button", "buy", "buyer", "buzz", "cabin", "cable", "cage", "cake", "call", "calm", "camera", "camp", "campus", "canal", "cancel", "cancer", "candle", "candy", "cane", "cannon", "canvas", "cap", "capable", "capital", "capture", "car", "card", "care", "career", "cargo", "carpet", "carry", "cart", "case", "cash", "castle", "cat", "catch", "cause", "cave", "cease", "cell", "cement", "center", "century", "certain", "chain", "chair", "chalk", "chamber", "chance", "change", "channel", "chapter", "charge", "charity", "charm", "chart", "chase", "cheap", "cheat", "check", "cheek", "cheer", "cheese", "chef", "cherry", "chess", "chest", "chew", "chief", "child", "chill", "chimney", "chin", "chip", "choice", "choir", "choose", "chop", "chorus", "church", "cigar", "cinema", "circle", "circuit", "cite", "citizen", "city", "civil", "claim", "clap", "class", "classic", "clause", "claw", "clay", "clean", "clear", "clerk", "clever", "click", "client", "cliff", "climb", "cling", "clinic", "clip", "clock", "close", "cloth", "cloud", "clown", "club", "clue", "clutch", "coach", "coal", "coast", "coat", "code", "coffee", "coin", "cold", "collar", "collect", "college", "colony", "color", "column", "combat", "combine", "come", "comedy", "comfort", "command", "comment", "commit", "common", "company", "compare", "compel", "compens", "complex", "comply", "compose", "compute", "concept", "concern", "concert", "conclude", "condemn", "conduct", "confer", "confess", "confide", "confirm", "conflict", "conform", "confuse", "connect", "conquer", "consent", "conserve", "consist", "console", "consort", "conspire", "constant", "construct", "consult", "consume", "contact", "contain", "content", "contest", "context", "contin", "contour", "contract", "contrary", "control", "convert", "convex", "convey", "convict", "convinc", "cook", "cool", "cooperat", "cope", "copy", "cord", "core", "cork", "corn", "corner", "correct", "corrupt", "cost", "costume", "cottage", "cotton", "couch", "cough", "could", "council", "counsel", "count", "counter", "country", "county", "couple", "courage", "course", "court", "cousin", "cover", "cow", "crack", "craft", "crash", "crawl", "crazy", "cream", "create", "credit", "creep", "crew", "cried", "crime", "crop", "cross", "crowd", "crown", "crude", "cruel", "cruise", "crush", "cry", "crystal", "cube", "cultur", "cup", "curb", "cure", "curious", "curl", "current", "curtain", "curve", "custom", "cut", "cycle", "daily", "dairy", "damage", "dance", "danger", "dare", "dark", "darling", "dash", "data", "date", "daughter", "dawn", "day", "dead", "deaf", "deal", "dealer", "dear", "death", "debate", "debt", "decade"];

    function generate() {
        const qty = parseInt(qtyInput.value) || 10;
        const caseFmt = caseSelect.value;
        let res = [];
        
        for(let i=0; i<qty; i++) {
            let w = dictionary[Math.floor(Math.random() * dictionary.length)];
            if(caseFmt === 'upper') w = w.toUpperCase();
            else if(caseFmt === 'lower') w = w.toLowerCase();
            else if(caseFmt === 'title') w = w.charAt(0).toUpperCase() + w.slice(1);
            res.push(`<span class="px-4 py-2 bg-white border border-gray-100 rounded-xl shadow-sm text-gray-700 text-sm font-bold hover:border-primary/50 hover:text-primary transition-all cursor-default select-all">${w}</span>`);
        }
        output.innerHTML = res.join('');
    }

    genBtn.addEventListener('click', generate);
    
    document.getElementById('copy-btn').addEventListener('click', () => {
        const text = Array.from(output.querySelectorAll('span')).map(s => s.innerText).join('\n');
        const el = document.createElement('textarea');
        el.value = text;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>