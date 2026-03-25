

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Website / App Name</label>
                    <input type="text" id="ppName" class="form-control" placeholder="My Awesome App">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Website URL</label>
                    <input type="text" id="ppURL" class="form-control" placeholder="https://example.com">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Contact Email</label>
                    <input type="email" id="ppEmail" class="form-control" placeholder="privacy@example.com">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Company / Entity Name</label>
                    <input type="text" id="ppCompany" class="form-control" placeholder="Acme Corp LLC">
                </div>
            </div>

            <div style="margin-bottom:2rem;">
                <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Data Collected</label>
                <div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-name" checked> Name</label>
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-email" checked> Email</label>
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-phone"> Phone</label>
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-address"> Address</label>
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-payment"> Payment Info</label>
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-cookies" checked> Cookies</label>
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-analytics" checked> Analytics Data</label>
                    <label style="display:flex;align-items:center;gap:0.5rem;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:10px;cursor:pointer;background:var(--bg-body);"><input type="checkbox" id="dc-location"> Location Data</label>
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="generatePrivacy()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Generate Policy 🔒
                </button>
            </div>

            <div id="pp-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
                    <h3 style="margin:0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Your Privacy Policy</h3>
                    <div style="display:flex;gap:0.75rem;">
                        <button type="button" onclick="navigator.clipboard.writeText(document.getElementById('pp-output').textContent);BizTools.toast('Copied!')" class="btn btn-primary btn-sm" style="border-radius:8px;">Copy</button>
                        <button type="button" onclick="downloadPP()" class="btn btn-outline btn-sm" style="border-radius:8px;">Download TXT</button>
                    </div>
                </div>
                <div id="pp-output" style="background:var(--bg-body); color:var(--text-main); padding:2rem; border-radius:18px; font-size:0.95rem; line-height:1.8; border:1px solid var(--border); white-space:pre-wrap; max-height:600px; overflow-y:auto;"></div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
function generatePrivacy() {
    const name = document.getElementById('ppName').value.trim() || '[Your Website Name]';
    const url = document.getElementById('ppURL').value.trim() || '[Your Website URL]';
    const email = document.getElementById('ppEmail').value.trim() || '[your@email.com]';
    const company = document.getElementById('ppCompany').value.trim() || '[Your Company Name]';
    const date = new Date().toLocaleDateString('en-US', { year:'numeric', month:'long', day:'numeric' });

    const dataItems = [];
    if (document.getElementById('dc-name').checked) dataItems.push('Full name');
    if (document.getElementById('dc-email').checked) dataItems.push('Email address');
    if (document.getElementById('dc-phone').checked) dataItems.push('Phone number');
    if (document.getElementById('dc-address').checked) dataItems.push('Mailing address');
    if (document.getElementById('dc-payment').checked) dataItems.push('Payment and billing information');
    if (document.getElementById('dc-cookies').checked) dataItems.push('Cookies and usage data');
    if (document.getElementById('dc-analytics').checked) dataItems.push('Analytics data (browser type, IP address, pages visited)');
    if (document.getElementById('dc-location').checked) dataItems.push('Geographic location data');

    const dataList = dataItems.map(d => '  • ' + d).join('\n');

    const text = `PRIVACY POLICY

Last Updated: ${date}

${company} ("we," "us," or "our") operates ${name} (${url}). This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website.

1. INFORMATION WE COLLECT

We may collect the following personal information:
${dataList}

2. HOW WE USE YOUR INFORMATION

We use the information we collect to:
  • Provide, operate, and maintain our website
  • Improve, personalize, and expand our website
  • Communicate with you directly or through partners
  • Send you updates, marketing communications, and promotional content
  • Process transactions and manage your account
  • Find and prevent fraud and abuse

3. COOKIES AND TRACKING TECHNOLOGIES

We use cookies and similar tracking technologies to track activity on our website and store certain information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.

4. THIRD-PARTY SERVICES

We may employ third-party companies and individuals to facilitate our service, provide the service on our behalf, perform service-related tasks, or assist us in analyzing how our service is used. These third parties have access to your information only to perform these tasks on our behalf.

5. DATA SECURITY

We use commercially acceptable means to protect your personal information, but no method of transmission over the Internet or electronic storage is 100% secure. We cannot guarantee absolute security.

6. YOUR DATA RIGHTS

Depending on your location, you may have the following rights:
  • Right to access your personal data
  • Right to rectification of inaccurate data
  • Right to erasure ("right to be forgotten")
  • Right to restrict processing
  • Right to data portability
  • Right to object to processing

7. CHILDREN'S PRIVACY

Our service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from children under 13.

8. CHANGES TO THIS PRIVACY POLICY

We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.

9. CONTACT US

If you have any questions about this Privacy Policy, please contact us at:
  Email: ${email}
  Website: ${url}`;

    document.getElementById('pp-output').textContent = text;
    document.getElementById('pp-results').style.display = 'block';
    BizTools.toast('Privacy policy generated!');
}

function downloadPP() {
    const blob = new Blob([document.getElementById('pp-output').textContent], { type: 'text/plain' });
    const a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'privacy-policy.txt';
    a.click();
    URL.revokeObjectURL(a.href);
    BizTools.toast('Download started!');
}
</script>






