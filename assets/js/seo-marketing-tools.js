/**
 * SEO & Marketing Tools - Shared JS Utilities
 * JSON template databases, scoring algorithms, toast & copy helpers
 */
const SMTools = {
    toast(msg) {
        const t = document.createElement('div');
        t.textContent = msg;
        Object.assign(t.style, { position:'fixed', bottom:'2rem', right:'2rem', background:'#1e293b', color:'#fff', padding:'1rem 2rem', borderRadius:'14px', fontWeight:'600', zIndex:'9999', boxShadow:'0 10px 40px rgba(0,0,0,0.2)', animation:'fadeIn .3s' });
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3000);
    },
    copy(text) {
        navigator.clipboard.writeText(text);
        this.toast('Copied to clipboard!');
    },

    // --- Thread Hook Database ---
    hookDB: [
        { template: "I spent {time} studying {topic}. Here are {count} lessons that changed everything:", tags: ["growth","learning"] },
        { template: "{topic} is broken. Here's what nobody tells you about {subtopic}:", tags: ["controversial","insight"] },
        { template: "Stop doing {bad_practice}. Start doing {good_practice} instead. Here's why (thread):", tags: ["advice","actionable"] },
        { template: "I went from {before} to {after} in {time}. Here's my exact playbook:", tags: ["transformation","story"] },
        { template: "{number}% of {audience} make this mistake with {topic}. Don't be one of them:", tags: ["data","warning"] },
        { template: "Unpopular opinion: {opinion}. Let me explain with {count} examples:", tags: ["controversial","opinion"] },
        { template: "I analyzed {number} {things}. The data reveals something surprising about {topic}:", tags: ["data","research"] },
        { template: "The {topic} industry doesn't want you to know these {count} secrets:", tags: ["secrets","insider"] },
        { template: "In {year}, {topic} will change forever. Here's how to prepare:", tags: ["prediction","future"] },
        { template: "I asked {number} {experts} the same question about {topic}. Here's what they said:", tags: ["expert","interview"] },
        { template: "Most {audience} think {myth}. The truth is far more interesting:", tags: ["myth-busting","education"] },
        { template: "{famous_person} used this {topic} strategy to {achievement}. You can too. Here's how:", tags: ["inspiration","strategy"] },
        { template: "Delete {thing} from your {platform}. Here's what to do instead:", tags: ["actionable","contrarian"] },
        { template: "This one {topic} trick saved me {benefit}. And it takes 5 minutes:", tags: ["quick-win","hack"] },
        { template: "A thread on everything I know about {topic} after {time} of experience:", tags: ["mega-thread","expertise"] }
    ],

    // --- TikTok Ideas Database ---
    tiktokDB: [
        { title: "Day in the Life", format: "vlog", niche: "any", script: "Film your daily routine highlighting [niche] moments. Start with alarm, show key activities, end with reflection.", hashtags: "#dayinmylife #routine #vlog" },
        { title: "Things I Wish I Knew", format: "talking-head", niche: "any", script: "List 3-5 things you wish you knew before starting [topic]. Use text overlays for each point.", hashtags: "#thingsiwishiknew #tips #advice" },
        { title: "Quick Tutorial", format: "screen-record", niche: "tech", script: "Show a hidden feature or shortcut. Hook: 'Stop doing X the hard way.' Demo in 30 seconds.", hashtags: "#tutorial #hack #learnontiktok" },
        { title: "Before vs After", format: "transition", niche: "any", script: "Show dramatic transformation. Use trending audio. Quick cut from before to after state.", hashtags: "#transformation #beforeandafter #glow" },
        { title: "POV: You're a [Role]", format: "skit", niche: "any", script: "Create relatable scenario in your niche. Exaggerate for comedy. Use trending sound.", hashtags: "#pov #relatable #comedy" },
        { title: "Myth vs Reality", format: "split-screen", niche: "any", script: "Debunk common myths in your niche. Show what people think vs what actually happens.", hashtags: "#mythvsreality #facts #themoreyouknow" },
        { title: "Storytime", format: "talking-head", niche: "any", script: "Tell a wild story from your experience. Hook with the craziest moment first, then explain.", hashtags: "#storytime #crazy #truestory" },
        { title: "Reply to Comment", format: "reply", niche: "any", script: "Reply to interesting/controversial comment with a full video response. Great for engagement.", hashtags: "#replytothis #comment #response" },
        { title: "Ranking Things", format: "tier-list", niche: "any", script: "Rank popular items in your niche from worst to best. Be bold with opinions.", hashtags: "#ranking #tierlist #hot" },
        { title: "3 Tools You Need", format: "list", niche: "tech", script: "Show 3 tools/apps that changed your workflow. Quick demo of each. 'Save this for later.'", hashtags: "#tools #productivity #musthave" }
    ],

    // --- Cold Email Templates Database ---
    coldEmailDB: [
        { name: "Sales Outreach", subject: "Quick question about {company}", body: "Hi {name},\n\nI noticed that {company} is {observation}. We've helped similar companies like {reference} achieve {result}.\n\nWould you be open to a 15-minute call this week to explore if we could help you with {pain_point}?\n\nBest regards,\n{sender}" },
        { name: "Partnership Proposal", subject: "Partnership idea: {sender_company} × {company}", body: "Hi {name},\n\nI'm {sender} from {sender_company}. I've been following {company}'s work on {topic} and I believe there's a great synergy between our audiences.\n\nI'd love to explore a partnership where we could {proposal}. Our audience of {audience_size} {audience_type} would benefit greatly from your expertise.\n\nWould you be interested in a quick chat?\n\nCheers,\n{sender}" },
        { name: "Guest Post Pitch", subject: "Content idea for {company}'s blog", body: "Hi {name},\n\nI've been a reader of {company}'s blog and really enjoyed the recent piece on {topic}.\n\nI'd love to contribute a guest post on \"{article_title}\" — it covers {brief_description} and would be a great fit for your audience.\n\nI've previously written for {publications}. Happy to share samples.\n\nBest,\n{sender}" },
        { name: "Follow-Up", subject: "Re: Following up on my previous email", body: "Hi {name},\n\nI wanted to follow up on my email from last week about {topic}. I understand you're busy, so I'll keep this brief.\n\n{one_liner_value_prop}\n\nWould {day} at {time} work for a quick 10-minute call?\n\nThanks,\n{sender}" },
        { name: "Referral Request", subject: "{mutual_contact} suggested I reach out", body: "Hi {name},\n\n{mutual_contact} mentioned you might be interested in {topic}. They spoke highly of your work at {company}.\n\nWe've been helping {industry} companies {benefit}, and I think there could be a great fit.\n\nWould you be open to a brief conversation?\n\nBest,\n{sender}" }
    ],

    // --- Domain Name Prefixes/Suffixes ---
    domainPrefixes: ['get','try','use','go','my','the','hey','be','re','un','top','pro','super','mega','hyper','ultra','smart','fast','easy','quick'],
    domainSuffixes: ['ly','io','co','app','hub','lab','ify','ize','ful','able','nest','base','pad','dock','spot','zone','hq','kit','box','stack'],
    domainTLDs: ['.com','.io','.co','.app','.dev','.ai','.me','.xyz','.tech','.org'],

    // --- Podcast Show Notes Templates ---
    podcastNotesDB: [
        { section: "Episode Summary", prompt: "Write a 2-3 sentence overview of what this episode covers." },
        { section: "Key Takeaways", prompt: "List 3-5 main lessons or insights from the episode." },
        { section: "Guest Bio", prompt: "Brief biography and credentials of the guest speaker." },
        { section: "Resources Mentioned", prompt: "Links and references discussed during the episode." },
        { section: "Timestamps", prompt: "Key topic markers with time codes." },
        { section: "Notable Quotes", prompt: "2-3 memorable quotes from the episode." },
        { section: "Action Items", prompt: "What listeners should do after hearing this episode." },
        { section: "Connect", prompt: "Social media links and contact information." }
    ],

    // --- Subject Line Scoring ---
    scoreSubjectLine(subject) {
        let score = 50;
        const reasons = [];
        const len = subject.length;

        if (len >= 30 && len <= 50) { score += 10; reasons.push({ text: 'Optimal length (30-50 chars)', type: 'good' }); }
        else if (len < 20) { score -= 10; reasons.push({ text: 'Too short — may lack context', type: 'bad' }); }
        else if (len > 70) { score -= 15; reasons.push({ text: 'Too long — will be truncated on mobile', type: 'bad' }); }
        else { reasons.push({ text: `Length is acceptable (${len} chars)`, type: 'ok' }); }

        const powerWords = ['free','secret','proven','exclusive','limited','urgent','instant','new','breaking','discover','unlock','revealed','ultimate'];
        const found = powerWords.filter(w => subject.toLowerCase().includes(w));
        if (found.length > 0) { score += 12; reasons.push({ text: `Power words found: ${found.join(', ')}`, type: 'good' }); }
        else { reasons.push({ text: 'No power words — consider adding urgency/curiosity', type: 'ok' }); }

        if (/\d/.test(subject)) { score += 8; reasons.push({ text: 'Contains numbers — increases open rates', type: 'good' }); }
        if (/[?]/.test(subject)) { score += 5; reasons.push({ text: 'Question format — triggers curiosity', type: 'good' }); }
        if (/[!]{2,}/.test(subject)) { score -= 10; reasons.push({ text: 'Multiple exclamation marks — looks spammy', type: 'bad' }); }
        if (/^(re:|fw:)/i.test(subject)) { score -= 5; reasons.push({ text: 'Fake reply/forward prefix — may trigger spam filters', type: 'bad' }); }

        const spamWords = ['buy now','click here','act now','congratulations','winner','$$','free money','no cost','100% free'];
        const spamFound = spamWords.filter(w => subject.toLowerCase().includes(w));
        if (spamFound.length > 0) { score -= 20; reasons.push({ text: `Spam trigger words: ${spamFound.join(', ')}`, type: 'bad' }); }

        if (/[\u{1F600}-\u{1F9FF}]/u.test(subject)) { score += 3; reasons.push({ text: 'Emoji detected — can boost visibility', type: 'good' }); }
        if (subject === subject.toUpperCase() && len > 5) { score -= 15; reasons.push({ text: 'ALL CAPS — looks like spam', type: 'bad' }); }

        const personal = ['{name}','{first_name}','you','your'];
        if (personal.some(p => subject.toLowerCase().includes(p))) { score += 7; reasons.push({ text: 'Personalization detected — boosts engagement', type: 'good' }); }

        return { score: Math.max(0, Math.min(100, score)), reasons };
    }
};
