

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">
<div class="pro-card">
    

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:1.5rem;margin-bottom:2rem;">
        <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.95rem;">Episode Title</label><input type="text" id="pnTitle" class="form-control" placeholder="Episode title"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.95rem;">Episode Number</label><input type="text" id="pnNumber" class="form-control" placeholder="EP 42"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.95rem;">Guest Name (optional)</label><input type="text" id="pnGuest" class="form-control" placeholder="John Smith"></div>
        <div><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.95rem;">Guest Title/Role</label><input type="text" id="pnGuestTitle" class="form-control" placeholder="CEO of Acme"></div>
    </div>
    <div style="margin-bottom:2rem;"><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.95rem;">Episode Summary (2-3 sentences)</label><textarea id="pnSummary" class="form-control" rows="3" placeholder="What was discussed in this episode?"></textarea></div>
    <div style="margin-bottom:2rem;"><label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.95rem;">Key Topics (comma separated)</label><input type="text" id="pnTopics" class="form-control" placeholder="AI, productivity, remote work"></div>

    <h4 style="font-weight:700;margin-bottom:1rem;">Timestamps <span style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;padding:0.2rem 0.6rem;border-radius:6px;font-size:0.7rem;font-weight:800;">PRO</span></h4>
    <div id="pn-timestamps" style="margin-bottom:1.5rem;">
        <div class="pn-ts-row" style="display:grid;grid-template-columns:120px 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;"><input type="text" class="form-control ts-time" placeholder="00:00" value="00:00"><input type="text" class="form-control ts-desc" placeholder="Introduction" value="Introduction &amp; Welcome"><button type="button" onclick="this.closest('.pn-ts-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button></div>
    </div>
    <button type="button" onclick="addTimestamp()" style="border:none;background:var(--primary-glow);color:var(--primary);font-weight:600;padding:0.5rem 1rem;border-radius:10px;cursor:pointer;font-size:0.85rem;margin-bottom:2rem;">+ Add Timestamp</button>

    <div><button type="button" onclick="generateShowNotes()" class="btn btn-primary" style="padding:1rem 3rem;font-size:1.15rem;font-weight:700;border-radius:14px;">Generate Show Notes 🎙️</button></div>

    <div id="pn-results" style="display:none;margin-top:3rem;padding-top:2.5rem;border-top:2px dashed var(--border);">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;"><h3 style="margin:0;font-size:1.5rem;font-weight:800;">Show Notes</h3>
            <div style="display:flex;gap:0.75rem;"><button onclick="SMTools.copy(document.getElementById('pn-output').textContent)" class="btn btn-primary btn-sm" style="border-radius:8px;">Copy Text</button><button onclick="copyHTML()" class="btn btn-outline btn-sm" style="border-radius:8px;">Copy HTML</button></div>
        </div>
        <div id="pn-output" style="background:var(--bg-body);border:1px solid var(--border);border-radius:16px;padding:2rem;line-height:1.8;"></div>
    </div>
</div>

<div class="pro-card" style="margin-top:2rem;"><article>
    <h2 style="font-size:1.5rem;font-weight:800;margin-bottom:1rem;">What is the Podcast Show Notes Generator?</h2>
    <p>The Podcast Show Notes Generator creates professional, SEO-optimized show notes for your podcast episodes. Show notes are the written companion to your audio content, typically published on your podcast website, Apple Podcasts, and Spotify. Well-crafted show notes improve discoverability through search engines, provide value to listeners who want to reference key points, and serve as effective marketing assets for driving new subscribers to your podcast.</p>
    <p>Studies show that podcasts with detailed show notes receive 30% more organic search traffic and higher engagement rates. Our generator creates structured, comprehensive notes including episode summaries, timestamps, key takeaways, guest bios, and resource links — all formatted and ready to publish on your podcast platform of choice.</p>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">How to Use This Tool Like a Pro</h3>
    <ul><li>Enter your episode title, number, and guest information for proper formatting.</li><li>Write a compelling 2-3 sentence summary highlighting the episode's main value proposition.</li><li>Add chapter timestamps using the PRO timestamp builder for enhanced accessibility.</li><li>List key topics covered for SEO keyword integration.</li><li>Copy the generated notes in plain text or HTML format for your publishing platform.</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Key Features &amp; Premium Benefits</h3>
    <ul><li>Structured show note templates following podcast industry best practices</li><li><strong>PRO:</strong> Chapter timestamp builder for enhanced navigation</li><li>SEO-optimized formatting with proper heading hierarchy</li><li>Both plain text and HTML output options</li><li>Compatible with Apple Podcasts, Spotify, and podcast websites</li></ul>

    <h3 style="font-size:1.2rem;font-weight:700;margin-top:1.5rem;">Frequently Asked Questions (FAQs)</h3>
    <ul><li><strong>How long should podcast show notes be?</strong> Aim for 200-500 words. Longer notes provide better SEO value, while concise notes are easier for listeners to scan.</li><li><strong>Should I include a full transcript?</strong> While transcripts offer maximum SEO benefit, comprehensive show notes with timestamps serve as an effective middle ground.</li><li><strong>What platform formats are supported?</strong> The HTML output works on WordPress, Squarespace, and most podcast hosting platforms. Plain text works for Apple Podcasts and Spotify descriptions.</li><li><strong>How do timestamps help?</strong> YouTube and some podcast apps convert timestamps into clickable chapter markers, improving user experience and engagement significantly.</li></ul>
</article></div>
</div>
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="<?php echo URL_ROOT; ?>/assets/js/seo-marketing-tools.js"></script>
<script>
function addTimestamp(){document.getElementById('pn-timestamps').insertAdjacentHTML('beforeend',`<div class="pn-ts-row" style="display:grid;grid-template-columns:120px 1fr 40px;gap:0.75rem;margin-bottom:0.5rem;"><input type="text" class="form-control ts-time" placeholder="mm:ss"><input type="text" class="form-control ts-desc" placeholder="Topic discussed"><button type="button" onclick="this.closest('.pn-ts-row').remove()" style="border:none;background:#fee2e2;color:#dc2626;border-radius:8px;cursor:pointer;font-weight:700;">×</button></div>`);}

function generateShowNotes(){
    const title=document.getElementById('pnTitle').value||'[Episode Title]';
    const num=document.getElementById('pnNumber').value||'';
    const guest=document.getElementById('pnGuest').value;
    const guestTitle=document.getElementById('pnGuestTitle').value;
    const summary=document.getElementById('pnSummary').value||'[Episode summary goes here]';
    const topics=document.getElementById('pnTopics').value.split(',').map(t=>t.trim()).filter(Boolean);

    const timestamps=[];
    document.querySelectorAll('.pn-ts-row').forEach(r=>{const t=r.querySelector('.ts-time').value;const d=r.querySelector('.ts-desc').value;if(t&&d)timestamps.push({t,d});});

    let html=`<h2 style="font-size:1.3rem;font-weight:800;margin-bottom:0.5rem;">${num?num+': ':''}${title}</h2>`;
    if(guest)html+=`<p style="color:var(--text-muted);margin-bottom:1.5rem;">Featuring <strong>${guest}</strong>${guestTitle?' — '+guestTitle:''}</p>`;
    html+=`<h3 style="font-size:1.1rem;font-weight:700;margin-top:1.5rem;">📝 Episode Summary</h3><p>${summary}</p>`;
    if(topics.length){html+=`<h3 style="font-size:1.1rem;font-weight:700;margin-top:1.5rem;">🔑 Key Takeaways</h3><ul>${topics.map(t=>`<li>${t}</li>`).join('')}</ul>`;}
    if(timestamps.length){html+=`<h3 style="font-size:1.1rem;font-weight:700;margin-top:1.5rem;">⏱️ Timestamps</h3><ul style="list-style:none;padding:0;">${timestamps.map(ts=>`<li style="padding:0.3rem 0;"><code style="background:#f1f5f9;padding:0.2rem 0.5rem;border-radius:4px;font-weight:600;">${ts.t}</code> ${ts.d}</li>`).join('')}</ul>`;}
    if(guest){html+=`<h3 style="font-size:1.1rem;font-weight:700;margin-top:1.5rem;">👤 About ${guest}</h3><p>${guest} is ${guestTitle||'our guest'} and an expert in ${topics[0]||'this field'}. Connect with them on social media.</p>`;}
    html+=`<h3 style="font-size:1.1rem;font-weight:700;margin-top:1.5rem;">📲 Subscribe & Follow</h3><p>If you enjoyed this episode, please subscribe and leave a review. Share this episode with someone who needs to hear it!</p>`;

    document.getElementById('pn-output').innerHTML=html;
    document.getElementById('pn-results').style.display='block';
    SMTools.toast('Show notes generated!');
}
function copyHTML(){SMTools.copy(document.getElementById('pn-output').innerHTML);}
</script>






