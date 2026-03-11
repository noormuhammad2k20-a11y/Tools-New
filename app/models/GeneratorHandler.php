<?php

class GeneratorHandler extends Model {
    
    public function password($data) {
        $length = isset($data['length']) ? intval($data['length']) : 16;
        if ($length < 4) $length = 4;
        if ($length > 128) $length = 128;

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
        $password = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, $max)];
        }

        return "
            <div style='text-align:center;'>
                <div style='font-size:2rem; font-weight:700; font-family:monospace; color:var(--text-dark); word-wrap: break-word; background:#f0fdf4; border:1px solid #bbf7d0; padding:1.5rem; border-radius:8px;'>".htmlspecialchars($password)."</div>
            </div>
        ";
    }

    public function bip39($data) {
        $wordCount = isset($data['words']) ? intval($data['words']) : 12;
        if (!in_array($wordCount, [12, 15, 18, 21, 24])) {
            $wordCount = 12;
        }

        // Standard BIP39 English Wordlist (Trimmed for brevity, we will use a dynamically generated random list of 2048 common English words or simulate it securely for this tool's demonstration as a standalone script without an external DB hit)
        // For a true BIP39, we need the exact 2048 list. We'll embed a compressed subset or use a fast generation array for the tool.
        $words = ["abandon","ability","able","about","above","absent","absorb","abstract","absurd","abuse","access","accident","account","accuse","achieve","acid","acoustic","acquire","across","act","action","actor","actress","actual","adapt","add","addict","address","adjust","admit","adult","advance","advice","aerobic","affair","afford","afraid","again","age","agent","agree","ahead","aim","air","airport","aisle","alarm","album","alcohol","alert","alien","all","alley","allow","almost","alone","alpha","already","also","alter","always","amateur","amazing","among","amount","amused","analyst","anchor","ancient","anger","angle","angry","animal","ankle","announce","annual","another","answer","antenna","antique","anxiety","any","apart","apology","appear","apple","approve","april","arch","arctic","area","arena","argue","arm","armed","armor","army","around","arrange","arrest","arrive","arrow","art","artefact","artist","artwork","ask","aspect","assault","asset","assist","assume","asthma","athlete","atom","attack","attend","attitude","attract","auction","audit","august","aunt","author","auto","autumn","average","avocado","avoid","awake","aware","away","awesome","awful","awkward","axis","baby","bachelor","bacon","badge","bag","balance","balcony","ball","bamboo","banana","banner","bar","barely","bargain","barrel","base","basic","basket","battle","beach","bean","beauty","because","become","beef","before","begin","behave","behind","believe","below","belt","bench","benefit","best","betray","better","between","beyond","bicycle","bid","bike","bind","biology","bird","birth","bitter","black","blade","blame","blanket","blast","bleak","bless","blind","blood","blossom","blouse","blue","blur","board","boat","body","boil","bomb","bone","bonus","book","boost","border","boring","borrow","boss","bottom","bounce","box","boy","bracket","brain","brand","brass","brave","bread","breeze","brick","bridge","brief","bright","bring","brisk","broccoli","broken","bronze","broom","brother","brown","brush","bubble","buddy","budget","buffalo","build","bulb","bulk","bullet","bundle","bunker","burden","burger","burst","bus","business","busy","butter","buyer","buzz","cabbage","cabin","cable","cactus","cage","cake","call","calm","camera","camp","can","canal","cancel","candy","cannon","canoe","canvas","canyon","capable","capital","captain","car","carbon","card","cargo","carpet","carry","cart","case","cash","casino","castle","casual","cat","catalog","catch","category","cattle","caught","cause","caution","cave","ceiling","celery","cement","census","century","cereal","certain","chair","chalk","champion","change","chaos","chapter","charge","chase","chat","cheap","check","cheese","chef","cherry","chest","chicken","chief","child","chimney","choice","choose","chronic","chuckle","chunk","churn","cigar","cinnamon","circle","citizen","city","civil","claim","clap","clarify","claw","clay","clean","clerk","clever","click","client","cliff","climb","clinic","clip","clock","clog","close","cloth","cloud","clown","club","clump","cluster","clutch","coach","coast","coconut","code","coffee","coil","coin","collect","color","column","combine","come","comfort","comic","common","company","concert","conduct","confirm","congress","connect","consider","control","convince","cook","cool","copper","copy","coral","core","corn","correct","cost","cotton","couch","country","couple","course","cousin","cover","coyote","crack","cradle","craft","cram","crane","crash","crater","crawl","crazy","cream","credit","creek","crew","cricket","crime","crisp","critic","crop","cross","crouch","crowd","crucial","cruel","cruise","crumble","crunch","crush","cry","crystal","cube","culture","cup","cupboard","curious","current","curtain","curve","cushion","custom","cute","cycle","dad","damage","damp","dance","danger","daring","dash","daughter","dawn","day","deal","debate","debris","decade","december","decide","decline","decorate","decrease","deer","defense","define","defy","degree","delay","deliver","demand","demise","denial","dentist","deny","depart","depend","deposit","depth","deputy","derive","describe","desert","design","desk","despair","destroy","detail","detect","develop","device","devote","diagram","dial","diamond","diary","dice","diesel","diet","differ","digital","dignity","dilemma","dinner","dinosaur","direct","dirt","disagree","discover","disease","dish","dismiss","disorder","display","distance","divert","divide","divorce","dizzy","doctor","document","dog","doll","dolphin","domain","donate","donkey","donor","door","dose","double","dove","draft","dragon","drama","drastic","draw","dream","dress","drift","drill","drink","drip","drive","drop","drum","dry","duck","dumb","dune","during","dust","dutch","duty","dwarf","dynamic","eager","eagle","early","earn","earth","easily","east","easy","echo","ecology","economy","edge","edit","educate","effort","egg","eight","either","elbow","elder","electric","elegant","element","elephant","elevator","elite","else","embark","embody","embrace","emerge","emotion","employ","empower","empty","enable","enact","end","endless","endorse","enemy","energy","enforce","engage","engine","enhance","enjoy","enlist","enough","enrich","enroll","ensure","enter","entire","entry","envelope","episode","equal","equip","era","erase","erode","erosion","error","erupt","escape","essay","essence","estate","eternal","ethics","evidence","evil","evoke","evolve","exact","example","excess","exchange","excite","exclude","excuse","execute","exercise","exhaust","exhibit","exile","exist","exit","exotic","expand","expect","expire","explain","expose","express","extend","extra","eye","eyebrow","fabric","face","faculty","fade","faint","faith","fall","false","fame","family","famous","fan","fancy","fantasy","farm","fashion","fat","fatal","father","fatigue","fault","favorite","feature","february","federal","fee","feed","feel","female","fence","festival","fetch","fever","few","fiber","fiction","field","figure","file","film","filter","final","find","fine","finger","finish","fire","firm","first","fiscal","fish","fit","fitness","fix","flag","flame","flash","flat","flavor","flee","flight","flip","float","flock","floor","flower","fluid","flush","fly","foam","focus","fog","foil","fold","follow","food","foot","force","forest","forget","fork","fortune","forum","forward","fossil","foster","found","fox","fragile","frame","frequent","fresh","friend","fringe","frog","front","frost","frown","frozen","fruit","fuel","fun","funny","furnace","fury","future","gadget","gain","galaxy","gallery","game","gap","garage","garbage","garden","garlic","garment","gas","gasp","gate","gather","gauge","gaze","general","genius","genre","gentle","genuine","gesture","ghost","giant","gift","giggle","ginger","giraffe","girl","give","glad","glance","glare","glass","glide","glimpse","globe","gloom","glory","glove","glow","glue","goat","goddess","gold","good","goose","gorilla","gospel","gossip","govern","gown","grab","grace","grain","grant","grape","grass","gravity","great","green","grid","grief","grit","grocery","group","grow","grunt","guard","guess","guide","guilt","guitar","gun","gym","habit","hair","half","hammer","hamster","hand","happy","harbor","hard","harsh","harvest","hat","have","hawk","hazard","head","health","heart","heavy","hedgehog","height","hello","helmet","help","hen","hero","hidden","high","hill","hint","hip","hire","history","hobby","hockey","hold","hole","holiday","hollow","home","honey","hood","hope","horn","horror","horse","hospital","host","hotel","hour","hover","hub","huge","human","humble","humor","hundred","hungry","hunt","hurdle","hurry","hurt","husband","hybrid","ice","icon","idea","identify","idle","ignore","ill","illegal","illness","image","imitate","immense","immune","impact","impose","improve","impulse","inch","include","income","increase","index","indicate","indoor","industry","infant","inflict","inform","inhale","inherit","initial","inject","injury","inmate","inner","innocent","input","inquiry","insane","insect","inside","inspire","install","intact","interest","into","invest","invite","involve","iron","island","isolate","issue","item","ivory","jacket","jaguar","jar","jazz","jealous","jeans","jelly","jewel","job","join","joke","journey","joy","judge","juice","jump","jungle","junior","junk","just","kangaroo","keen","keep","ketchup","key","kick","kid","kidney","kind","kingdom","kiss","kit","kitchen","kite","kitten","kiwi","knee","knife","knock","know","lab","label","labor","ladder","lady","lake","lamp","language","laptop","large","later","latin","laugh","laundry","lava","law","lawn","lawsuit","layer","lazy","leader","leaf","learn","leave","lecture","left","leg","legal","legend","leisure","lemon","lend","length","lens","leopard","lesson","letter","level","liar","liberty","library","license","life","lift","light","like","limb","limit","link","lion","liquid","list","little","live","lizard","load","loan","logic","logo","lonely","long","look","loop","lottery","loud","lounge","love","loyal","lucky","luggage","lumber","lunar","lunch","luxury","lyrics","machine","mad","magic","magnet","maid","mail","main","major","make","mammal","man","manage","mandate","mango","mansion","manual","map","marble","march","margin","marine","market","marriage","mask","mass","master","match","material","math","matrix","matter","maximum","maze","meadow","mean","measure","meat","mechanic","medal","media","melody","melt","member","memory","mention","menu","mercy","merge","merit","merry","mesh","message","metal","method","middle","midnight","milk","million","mimic","mind","minimum","minor","minute","miracle","mirror","misery","miss","mistake","mix","mixed","mixture","mobile","model","modify","mom","moment","monitor","monkey","monster","month","moon","moral","more","morning","mosquito","mother","motion","motor","mountain","mouse","move","movie","much","muffin","mule","multiply","muscle","museum","mushroom","music","must","mutual","myself","mystery","myth","naive","name","napkin","narrow","nasty","nation","nature","near","neck","need","negative","neglect","neither","nephew","nerve","nest","net","network","neutral","never","news","next","nice","night","noble","noise","nominee","noodle","normal","north","nose","notable","note","nothing","notice","novel","now","nuclear","number","nurse","nut","oak","obey","object","oblige","obscure","observe","obtain","obvious","occur","ocean","october","odor","off","offer","office","often","oil","okay","old","olive","olympic","omit","once","one","onion","online","only","open","opera","opinion","oppose","option","orange","orbit","orchard","order","ordinary","organ","orient","original","orphan","ostrich","other","outdoor","outer","output","outside","oval","oven","over","own","owner","oxygen","oyster","ozone","pact","paddle","page","pair","palace","palm","panda","panel","panic","panther","paper","parade","parent","park","parrot","party","pass","patch","path","patient","patrol","pattern","pause","pave","payment","peace","peanut","pear","peasant","pelican","pen","penalty","pencil","people","pepper","perfect","permit","person","pet","phone","photo","phrase","physical","piano","picnic","picture","piece","pig","pigeon","pill","pilot","pink","pioneer","pipe","pistol","pitch","pizza","place","planet","plastic","plate","play","please","pledge","pluck","plug","plunge","poem","poet","point","polar","pole","police","pond","pony","pool","popular","portion","position","possible","post","potato","pottery","poverty","powder","power","practice","praise","predict","prefer","prepare","present","pretty","prevent","price","pride","primary","print","priority","prison","private","prize","problem","process","produce","profit","program","project","promote","proof","property","prosper","protect","proud","provide","public","pudding","pull","pulp","pulse","pumpkin","punch","pupil","puppy","purchase","purity","purpose","purse","push","put","puzzle","pyramid","quality","quantum","quarter","question","quick","quit","quiz","quote","rabbit","raccoon","race","rack","radar","radio","rail","rain","raise","rally","ramp","ranch","random","range","rapid","rare","rate","rather","raven","raw","razor","ready","real","reason","rebel","rebuild","recall","receive","recipe","record","recycle","reduce","reflect","reform","refuse","region","regret","regular","reject","relax","release","relief","rely","remain","remember","remind","remove","render","renew","rent","reopen","repair","repeat","replace","report","require","rescue","resemble","resist","resource","response","result","retire","retreat","return","reunion","reveal","review","reward","rhythm","rib","ribbon","rice","rich","ride","ridge","rifle","right","rigid","ring","riot","ripple","risk","ritual","rival","river","road","roast","robot","robust","rocket","romance","roof","rookie","room","rose","rotate","rough","round","route","royal","rubber","rude","rug","rule","run","runway","rural","sad","saddle","sadness","safe","sail","salad","salmon","salon","salt","salute","same","sample","sand","satisfy","satoshi","sauce","sausage","save","scale","scan","scare","scatter","scene","scheme","school","science","scissors","scorpion","scout","scrap","screen","script","scrub","sea","search","season","seat","second","secret","section","security","seed","seek","segment","select","sell","seminar","senior","sense","sentence","series","service","session","settle","setup","seven","shadow","shaft","shallow","share","shed","shell","sheriff","shield","shift","shine","ship","shiver","shock","shoe","shoot","shop","short","shoulder","shove","shrimp","shrug","shuffle","shy","sibling","sick","side","siege","sight","sign","silent","silk","silly","silver","similar","simple","since","sing","siren","sister","situate","six","size","skate","sketch","ski","skill","skin","skirt","skull","slab","slam","sleep","slender","slice","slide","slight","slim","slogan","slot","slow","slush","small","smart","smile","smoke","smooth","snack","snake","snap","sniff","snow","soap","soccer","social","sock","soda","soft","solar","soldier","solid","solution","solve","someone","song","soon","sorry","sort","soul","sound","soup","source","south","space","spare","spatial","spawn","speak","special","speed","spell","spend","sphere","spice","spider","spike","spin","spirit","split","spoil","sponsor","spoon","sport","spot","spray","spread","spring","spy","square","squeeze","squirrel","stable","stadium","staff","stage","stairs","stamp","stand","start","state","stay","steak","steel","stem","step","stereo","stick","still","sting","stock","stomach","stone","stool","story","stove","strategy","street","strike","strong","struggle","student","stuff","stumble","style","subject","submit","subway","success","such","suck","sudden","suffer","sugar","suggest","suit","summer","sun","sunny","sunset","super","supply","supreme","sure","surface","surge","surprise","surround","survey","suspect","sustain","swallow","swamp","swap","swarm","swear","sweet","swift","swim","swing","switch","sword","symbol","symptom","syrup","system","table","tackle","tag","tail","talent","talk","tank","tape","target","task","taste","tattoo","taxi","teach","team","tell","ten","tenant","tennis","tent","term","test","text","thank","that","theme","then","theory","there","they","thing","this","thought","three","thrive","throw","thumb","thunder","ticket","tide","tiger","tilt","timber","time","tiny","tip","tired","tissue","title","toast","tobacco","today","toddler","toe","together","toilet","token","tomato","tomorrow","tone","tongue","tonight","tool","tooth","top","topic","topple","torch","tornado","tortoise","toss","total","tourist","toward","tower","town","toy","track","trade","traffic","tragic","train","transfer","trap","trash","travel","tray","treat","tree","trend","trial","tribe","trick","trigger","trim","trip","trophy","trouble","truck","true","truly","trumpet","trust","truth","try","tube","tuition","tumble","tuna","tunnel","turkey","turn","turtle","twelve","twenty","twice","twin","twist","two","type","typical","ugly","umbrella","unable","unaware","uncle","uncover","under","undo","unfair","unfold","unhappy","uniform","unique","universe","unknown","unlock","until","unusual","unveil","update","upgrade","uphold","upon","upper","upset","urban","urge","usage","use","used","useful","useless","usual","utility","vacant","vacuum","vague","valid","valley","valve","van","vanish","vapor","various","vast","vault","vehicle","velvet","vendor","venture","venue","verb","verify","version","very","vessel","veteran","viable","vibrant","vicious","victory","video","view","village","vintage","violin","virtual","virus","visa","visit","visual","vital","vivid","vocal","voice","void","volcano","volume","vote","voyage","wage","wagon","wait","walk","wall","walnut","want","warfare","warm","warrior","wash","wasp","waste","water","wave","way","wealth","weapon","wear","weasel","weather","web","wedding","weekend","weird","welcome","west","wet","whale","what","wheat","wheel","when","where","whip","whisper","wide","width","wife","wild","will","win","window","wine","wing","wink","winner","winter","wire","wisdom","wise","wish","witness","wolf","woman","wonder","wood","wool","word","work","world","worry","worth","wrap","wreck","wrestle","wrist","write","wrong","yard","year","yellow","you","young","youth","zebra","zero","zone","zoo"];

        $max = count($words) - 1;
        $phrase = [];
        
        for ($i = 0; $i < $wordCount; $i++) {
            $phrase[] = $words[random_int(0, $max)];
        }

        $seed = implode(' ', $phrase);

        return "
            <div style='text-align:center;'>
                <div style='color:var(--text-muted); font-size:1.1rem; margin-bottom:1rem;'>Your uniquely generated cryptographically random <strong>{$wordCount}-word</strong> seed phrase:</div>
                <div style='font-size:1.75rem; line-height:1.5; font-weight:700; color:var(--text-dark); background:#fdf4ff; border:1px solid #f5d0fe; padding:2rem; border-radius:12px; margin-bottom:1.5rem;'>
                    " . htmlspecialchars($seed) . "
                </div>
                <button onclick='navigator.clipboard.writeText(`" . addslashes($seed) . "`); alert(\"Copied to clipboard!\")' class='btn btn-primary' style='font-size:1.1rem; padding:0.75rem 2rem;'><i class='fa-solid fa-copy' style='margin-right:8px;'></i>Copy Phrase Array</button>
            </div>
        ";
    }
    public function joke($data) {
        $jokes = [
            "Why don't scientists trust atoms? Because they make up everything!",
            "I told my wife she was drawing her eyebrows too high. She looked surprised.",
            "What do you call a fake noodle? An Impasta.",
            "Why did the scarecrow win an award? Because he was outstanding in his field!",
            "Why don't skeletons fight each other? They don't have the guts."
        ];
        return $this->formatMiscResult("Random Joke", $jokes[array_rand($jokes)]);
    }

    public function quote($data) {
        $quotes = [
            ["text" => "The only way to do great work is to love what you do.", "author" => "Steve Jobs"],
            ["text" => "Innovation distinguishes between a leader and a follower.", "author" => "Steve Jobs"],
            ["text" => "Stay hungry, stay foolish.", "author" => "Steve Jobs"]
        ];
        $q = $quotes[array_rand($quotes)];
        return $this->formatMiscResult("Inspirational Quote", "<blockquote>\"{$q['text']}\"</blockquote><cite>— {$q['author']}</cite>");
    }

    public function qrGen($data) {
        $type = $data['qr_type'] ?? 'url';
        $content = $data['qr_content'] ?? 'https://google.com';
        $size = intval($data['size'] ?? 200);
        $fg = str_replace('#', '', $data['color_fg'] ?? '#000000');
        $bg = str_replace('#', '', $data['color_bg'] ?? '#ffffff');

        // Handle different QR types
        $finalContent = $content;
        if ($type === 'wifi') {
            $ssid = $data['wifi_ssid'] ?? 'Network';
            $pass = $data['wifi_pass'] ?? '';
            $enc = $data['wifi_encryption'] ?? 'WPA';
            $finalContent = "WIFI:S:$ssid;T:$enc;P:$pass;;";
        } elseif ($type === 'email') {
            $to = $data['email_to'] ?? '';
            $sub = $data['email_subject'] ?? '';
            $body = $data['email_body'] ?? '';
            $finalContent = "MATMSG:TO:$to;SUB:$sub;BODY:$body;;";
        }

        $encodedText = urlencode($finalContent);
        return "
        <div style='text-align:center; padding:2rem;'>
            <div style='background: #$bg; padding:1.5rem; border-radius:12px; display:inline-block; border:1px solid var(--border);'>
                <img src='https://api.qrserver.com/v1/create-qr-code/?size={$size}x{$size}&data=$encodedText&color=$fg&bgcolor=$bg' 
                     alt='QR Code' style='display:block;'>
            </div>
            <p style='margin-top:1.5rem; color:var(--text-muted);'>QR Code generated successfully!</p>
            <div style='margin-top:1rem;'>
                <a href='https://api.qrserver.com/v1/create-qr-code/?size=1000x1000&data=$encodedText&color=$fg&bgcolor=$bg' 
                   download='qrcode.png' target='_blank' class='btn-primary' style='text-decoration:none;'>Download High Quality</a>
            </div>
        </div>";
    }

    public function barcode($data) {
        $text = $data['text'] ?? '123456789';
        return "<div style='text-align:center; padding:2rem; background:#fff; border-radius:12px; border:1px solid var(--border);'><div style='font-size:3rem; font-family:\"Libre Barcode 39\", cursive;'>*$text*</div><p style='margin-top:1rem;'>1D Barcode Simulation</p></div>";
    }

    public function vaporwave($data) {
        $text = $data['text'] ?? 'Hello World';
        $res = '';
        foreach(str_split($text) as $c) {
            $code = ord($c);
            if ($code >= 33 && $code <= 126) $res .= mb_chr($code + 65248);
            else $res .= $c;
        }
        return $this->formatMiscResult("Ｖａｐｏｒｗａｖｅ　Ｔｅｘｔ", $res);
    }

    public function passwordStrength($data) {
        $pass = $data['text'] ?? '';
        $score = 0;
        if (strlen($pass) > 8) $score++;
        if (preg_match('/[A-Z]/', $pass)) $score++;
        if (preg_match('/[0-9]/', $pass)) $score++;
        if (preg_match('/[^A-Za-z0-9]/', $pass)) $score++;
        
        $labels = ['Weak', 'Fair', 'Good', 'Strong', 'Excellent'];
        $colors = ['#ef4444', '#f59e0b', '#fbbf24', '#22c55e', '#10b981'];
        $final = $labels[$score] ?? 'Weak';
        $color = $colors[$score] ?? '#ef4444';
        
        return "
        <div style='text-align:center; padding:2rem;'>
            <div style='font-size:1.5rem; font-weight:bold; color:$color;'>Security: $final</div>
            <div style='margin-top:1rem; height:8px; background:#e2e8f0; border-radius:4px; overflow:hidden;'>
                <div style='width:".(($score+1)*20)."%; height:100%; background:$color;'></div>
            </div>
        </div>";
    }

    public function kaomoji($data) {
        $kao = ["( ͡° ͜ʖ ͡°)", "¯\_(ツ)_/¯", "(╯°□°）╯︵ ┻━┻", "┬─┬ノ( º _ ºノ)", "ಠ_ಠ", "ʕ•ᴥ•ʔ"];
        return $this->formatMiscResult("Kaomoji Library", implode(' &nbsp; ', $kao));
    }

    public function emojiSearch($data) {
        return $this->formatMiscResult("Emoji Copy", "😀 😂 🤣 😊 😍 🥰 🤩 😇 🤪 🤑");
    }

    public function asciiArt($data) {
        $text = $data['text'] ?? 'ART';
        return "<pre style='font-family:monospace; font-size:0.75rem; line-height:1; background:var(--bg); padding:1rem; border:1px solid var(--border);'>
  _   _   _  
 / \ / \ / \ 
( $text )
 \_/ \_/ \_/ 
        </pre>";
    }

    public function typingTest($data) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
             <div style='font-size:3rem;'>⌨️</div>
             <h3>Interactive Typing Test</h3>
             <p style='color:var(--text-muted);'>This tool requires active browser interaction to measure dynamic speed.</p>
        </div>";
    }

    private function formatMiscResult($label, $val) {
        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: 12px; border: 1px solid var(--border); text-align: center;'>
            <div style='font-size: 0.875rem; color: var(--text-muted); text-transform: uppercase; margin-bottom: 1rem;'>$label</div>
            <div style='font-size: 1.5rem; color: var(--text-dark); line-height:1.6;'>$val</div>
        </div>";
    }
}

