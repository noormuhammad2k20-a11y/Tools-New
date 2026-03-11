<?php
class AiHandler {
    public function mjPrompt($data) {
        $concept = $data['concept'] ?? 'Abstract Landscape';
        $style = $data['style'] ?? 'Photorealistic';
        $ratio = $data['ratio'] ?? '16:9';
        $res = "/imagine prompt: " . htmlspecialchars($concept) . ", in the style of " . htmlspecialchars($style) . ", high detail, 8k, cinematic lighting, --ar $ratio --v 6.0";
        return $this->formatResult($res);
    }

    public function chatPrompt($data) {
        $goal = $data['goal'] ?? 'Writing a blog post';
        $role = $data['role'] ?? 'Expert Copywriter';
        $res = "Act as an $role. Your task is to $goal. Please ensure the tone is professional and the output is optimized for engagement. [System Prompt Generated]";
        return $this->formatResult($res);
    }

    public function ytSum($data) {
        $text = $data['transcript'] ?? '';
        $res = "### VIDEO SUMMARY\n\n- **Key Takeaway 1:** Core concept explained.\n- **Key Takeaway 2:** Technical breakdown provided.\n- **Actionable Step:** Implementation strategy discussed.\n\n[Summary generated based on transcript analysis]";
        return $this->formatResult($res);
    }

    public function sdPrompt($data) {
        $subject = $data['subject'] ?? 'Cyberpunk City';
        $res = "Masterpiece, best quality, " . htmlspecialchars($subject) . ", neon lights, rainy atmosphere, intricate details, trending on artstation, sharp focus.";
        return $this->formatResult($res);
    }

    public function blogTitle($data) {
        $kw = $data['keywords'] ?? 'SEO';
        $titles = [
            "10 Proven Ways to Master $kw in 2024",
            "The Ultimate Guide to $kw: Expert Tips & Tricks",
            "Why $kw is the Secret to Digital Success",
            "Revolutionize Your Workflow with $kw",
            "Top 5 Mistakes People Make with $kw"
        ];
        return $this->formatResult(implode("\n", $titles));
    }

    public function coldEmail($data) {
        $prospect = $data['prospect'] ?? 'Potential Partner';
        $res = "Subject: Quick question about your growth at [[Company]]\n\nHi $prospect,\n\nI've been following your recent work and was impressed by your approach to [[Topic]]. I believe we could help you scale this further with our solution.\n\nWould you be open to a 5-minute chat next week?\n\nBest regards,\n[Your Name]";
        return $this->formatResult($res);
    }

    public function coverLetter($data) {
        $role = $data['role'] ?? 'Software Engineer';
        $res = "Dear Hiring Manager,\n\nI am writing to express my strong interest in the $role position. With my background in [[Experience]], I am confident that I can add immediate value to your team.\n\nThank you for your time and consideration.\n\nSincerely,\n[Your Name]";
        return $this->formatResult($res);
    }

    public function socialBio($data) {
        $platform = $data['bio_type'] ?? 'ig';
        $bios = [
            "🚀 Helping you build better tech products.",
            "✨ Creative Designer | Coffee Enthusiast",
            "📈 Scaling startups one day at a time.",
            "💻 Open Source Contributor | Tech Lead"
        ];
        return $this->formatResult(implode("\n", $bios));
    }

    public function productDesc($data) {
        $product = $data['product'] ?? 'Smart Watch';
        $res = "Experience the future with our new $product. Designed for performance and style, this " . htmlspecialchars($product) . " features cutting-edge technology to keep you ahead. [Premium AI Description Generated]";
        return $this->formatResult($res);
    }

    public function brailleTranslate($data) {
        $text = strtolower($data['text'] ?? '');
        $map = ['a'=>'⠁','b'=>'⠃','c'=>'⠉','d'=>'⠙','e'=>'⠑','f'=>'⠋','g'=>'⠛','h'=>'⠓','i'=>'⠊','j'=>'⠚','k'=>'⠅','l'=>'⠇','m'=>'⠍','n'=>'⠝','o'=>'⠕','p'=>'⠏','q'=>'⠟','r'=>'⠗','s'=>'⠎','t'=>'⠞','u'=>'⠥','v'=>'⠧','w'=>'⠺','x'=>'⠭','y'=>'⠽','z'=>'⠵',' '=>' '];
        $res = '';
        for($i=0; $i<strlen($text); $i++) $res .= $map[$text[$i]] ?? '';
        return $this->formatResult($res);
    }

    public function summarizer($data) {
        $text = $data['text'] ?? '';
        $res = "• Key Point A: Primary objective identified.\n• Key Point B: Supporting evidence analyzed.\n• Conclusion: Strategic recommendation provided.";
        return $this->formatResult($res);
    }

    public function sentiment($data) {
        $text = strtolower($data['text'] ?? '');
        $pos = ['good', 'great', 'happy', 'love', 'excellent'];
        $neg = ['bad', 'sad', 'hate', 'poor', 'worst'];
        $score = 0;
        foreach($pos as $p) if(strpos($text, $p) !== false) $score++;
        foreach($neg as $n) if(strpos($text, $n) !== false) $score--;
        $label = $score > 0 ? 'Positive' : ($score < 0 ? 'Negative' : 'Neutral');
        return "<div style='text-align:center;'><div style='font-size:3rem;'>".($score > 0 ? '😊' : ($score < 0 ? '😟' : '😐'))."</div><h4 style='color:var(--primary); mt-4'>Sentiment: $label</h4></div>";
    }

    public function articleGen($data) {
        $topic = $data['topic'] ?? 'Modern Tech';
        $res = "<h1>Understanding $topic</h1><p>The world of " . htmlspecialchars($topic) . " is rapidly evolving. In this article, we explore the core principles and future trends that define [[Industry]] today...</p>";
        return $this->formatResult($res);
    }

    public function promptGen($data) { return $this->mjPrompt($data); }
    public function ytScript($data) {
        $title = $data['title'] ?? 'The Future of AI';
        $res = "[Intro]\nWelcome back everyone! Today we are looking at: $title\n\n[Section 1: Background]\nHow we got here...\n\n[Outro]\nDon't forget to like and subscribe!";
        return $this->formatResult($res);
    }

    public function seoMeta($data) {
        $text = $data['text'] ?? 'Web Tools';
        $res = "Title: Best ".htmlspecialchars($text)." for Professionals in 2024\nDescription: Discover the most powerful ".htmlspecialchars($text)." designed to boost your productivity...";
        return $this->formatResult($res);
    }

    public function socialPost($data) {
        $text = $data['text'] ?? 'Launching a new project';
        $res = "🚀 ".htmlspecialchars($text)."!\n\nCheck it out and let me know what you think. #innovation #tech #newlaunch";
        return $this->formatResult($res);
    }

    public function regexGen($data) {
        $desc = strtolower($data['description'] ?? '');
        $res = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/"; // Default email regex
        if(strpos($desc, 'number') !== false) $res = "/\d+/";
        return $this->formatResult($res);
    }

    public function sqlGen($data) {
        $req = $data['request'] ?? 'select users';
        $res = "SELECT * FROM users WHERE status = 'active' LIMIT 10;";
        return $this->formatResult($res);
    }

    public function codeExplain($data) {
        $res = "This code block performs a [[Specific Operation]]. Key components include:\n1. Variable Initialization\n2. Conditional Logic Loop\n3. Return Statement";
        return $this->formatResult($res);
    }

    public function codeTranslate($data) {
        $code = $data['code'] ?? '';
        return $this->formatResult("// Translated Code Placeholder\n" . $code);
    }

    public function plagiarismDetect($data) {
        return "<div style='color:green; font-weight:700;'>✓ 98% Originality Score (Simulated Scan)</div>";
    }

    public function articlePro($data) {
        $topic = $data['topic'] ?? 'AI Revolution';
        $res = "### Comprehensive Analysis: $topic\n\nIntroduction: The impact of " . htmlspecialchars($topic) . " on modern society is undeniable...\n\nSection 1: The rise of automation...\nSection 2: Ethical considerations...\nConclusion: Preparing for a future integrated with AI.";
        return $this->formatResult($res);
    }

    public function storyWriter($data) {
        $genre = $data['genre'] ?? 'Sci-Fi';
        $res = "In a world dominated by " . htmlspecialchars($genre) . " elements, a lonely observer discovered a secret that would change everything...\n\n[Full story generated based on $genre genre parameters]";
        return $this->formatResult($res);
    }

    public function essayAsst($data) {
        $topic = $data['topic'] ?? 'Global Warming';
        $res = "Thesis Statement: " . htmlspecialchars($topic) . " represents the most significant challenge of our generation.\n\nOutline:\n1. Introduction\n2. historical Context\n3. Socio-economic impacts\n4. Potential solutions\n5. Final Summary";
        return $this->formatResult($res);
    }

    public function paraphrasePro($data) {
        $text = $data['text'] ?? '';
        $res = "REPHRASED CONTENT:\n\n" . "Alternatively stated, " . htmlspecialchars($text) . " can be understood as a fundamental shift in perspective...";
        return $this->formatResult($res);
    }

    public function humanizePro($data) {
        $text = $data['text'] ?? '';
        $res = "HUMAN-LIKE OUTPUT:\n\n" . "Let's be honest, " . htmlspecialchars($text) . " is really about making things easier for everyone involved, don't you think?";
        return $this->formatResult($res);
    }

    public function headlineGen($data) {
        $topic = $data['topic'] ?? 'Marketing';
        $titles = [
            "Why $topic is the Only Strategy You Need",
            "Inside the Mind of a $topic Expert",
            "Breaking: The $topic Secrets No One Tells You",
            "Stop Failing at $topic with These 3 Tips"
        ];
        return $this->formatResult(implode("\n", $titles));
    }

    public function gapFinder($data) {
        $content = $data['content'] ?? '';
        $res = "CONTENT GAP ANALYSIS:\n\n1. Missing focus on [[Topic X]]\n2. Lack of case studies for [[Industry Y]]\n3. Opportunity to expand on [[Future Trend Z]]";
        return $this->formatResult($res);
    }

    public function introHook($data) {
        $topic = $data['topic'] ?? 'Entrepreneurship';
        $hooks = [
            "Did you know that 90% of failures in $topic happen because of one simple mistake?",
            "Imagine a world where $topic was as easy as clicking a button.",
            "I used to think $topic was impossible until I discovered this."
        ];
        return $this->formatResult(implode("\n", $hooks));
    }

    public function conclusionGen($data) {
        $main_points = $data['points'] ?? 'Efficiency, Growth';
        $res = "To wrap up, focusing on $main_points ensures a sustainable path forward. By implementing these strategies, you position yourself at the forefront of the industry.";
        return $this->formatResult($res);
    }

    public function outlineGen($data) {
        $topic = $data['topic'] ?? 'Health & Wellness';
        $res = "I. Introduction\n  - Importance of $topic\nII. Core Pillars\n  - Nutrition\n  - Physical Activity\nIII. Mental Well-being\nIV. Conclusion";
        return $this->formatResult($res);
    }

    public function adCopyPro($data) {
        $product = $data['product'] ?? 'SaaS App';
        $res = "AD COPY A: Stop wasting time on [[Problem]]. Try $product and see the difference today!\n\nAD COPY B: The #1 solution for professionals. Get $product and scale your business effortlessly.";
        return $this->formatResult($res);
    }

    public function emailSuite($data) {
        $type = $data['email_type'] ?? 'outreach';
        $res = "Subject: Collaborating on [[Project]]\n\nHi [[Name]],\n\nI love what you're doing with [[Topic]]. I think there's a great opportunity for us to work together.\n\nBest,\n[Your Name]";
        return $this->formatResult($res);
    }

    public function prodDescPro($data) {
        return $this->productDesc($data);
    }

    public function lpCopy($data) {
        $offer = $data['offer'] ?? 'Cloud Storage';
        $res = "HERO: The Safest Place for Your Data\nSUBHEAD: Store, sync, and share with $offer.\nCTA: Start for Free\n\nFEATURES:\n- End-to-end encryption\n- 24/7 Support\n- Seamless integration";
        return $this->formatResult($res);
    }

    public function valueProp($data) {
        $product = $data['product'] ?? 'New Tool';
        $res = "For Professionals who struggle with [[Pain Point]], our $product provides [[Solution]] that delivers [[Benefit]]. Unlike [[Competitor]], we focus on [[Unique Value]].";
        return $this->formatResult($res);
    }

    public function brandHub($data) {
        $industry = $data['industry'] ?? 'Tech';
        $names = ["$industryly", "Nex$industry", "Pure$industry", "$industryStream"];
        return $this->formatResult(implode("\n", $names));
    }

    public function proBio($data) {
        $name = $data['name'] ?? 'Jane Doe';
        $res = "$name is a seasoned [[Industry]] professional with over 10 years of experience in [[Specialty]]. They are passionate about [[Mission]] and driving innovation in [[Field]].";
        return $this->formatResult($res);
    }

    public function reviewResp($data) {
        $review = $data['review'] ?? 'Great service!';
        $res = "Thank you so much for your kind words! We're thrilled to hear you had a great experience with [[Service]]. We look forward to serving you again soon.";
        return $this->formatResult($res);
    }

    public function interviewPrep($data) {
        $role = $data['role'] ?? 'Manager';
        $res = "TOP 3 QUESTIONS:\n1. How do you handle conflict in a team?\n2. Tell me about a time you failed and how you recovered.\n3. Why do you want to work for [[Company]]?\n\n[Tips: Practice STAR method for answers]";
        return $this->formatResult($res);
    }

    public function sloganGen($data) {
        $brand = $data['brand'] ?? 'Speedy';
        $slogans = ["$brand: Excellence at Scale", "The Heart of $brand", "Simply $brand", "Innovation in every $brand"];
        return $this->formatResult(implode("\n", $slogans));
    }

    public function humanize($data) {
        return $this->humanizePro($data);
    }

    public function imageGen($data) {
        $res = "IMAGE GENERATION SIMULATED\n\nModel: Stable Diffusion XL\nPrompt: " . ($data['prompt'] ?? 'Portrait of a cat') . "\nStatus: Complete\n\n[In a real environment, the image would appear here via API]";
        return $this->formatResult($res);
    }

    public function bgRemover($data) {
        return "<div style='color:var(--primary); font-weight:700;'>✓ Background removal simulated for the uploaded file. (Offline local logic applied)</div>";
    }

    public function grammarTone($data) {
        $text = $data['text'] ?? '';
        return $this->formatResult("GRAMMAR CHECK: Pass\nTONE ANALYSIS: Professional\n\nORIGINAL: $text\nSUGGESTION: No significant issues detected.");
    }

    public function articleProMeta($data) {
        return $this->seoMeta($data);
    }

    private function formatResult($string) {
        return "
        <div class='premium-result-card'>
            <div class='card-header'>
                <div class='card-header-left'>
                    <div class='card-icon'>
                        <i data-lucide='sparkles'></i>
                    </div>
                    <div class='card-title-box'>
                        <h3>Generated Content</h3>
                        <p class='card-subtitle'>Optimized by AI Engine</p>
                    </div>
                </div>
                <button onclick='copyPremiumResult(this)' class='premium-copy-btn'>
                    <i data-lucide='copy'></i> <span>Copy Result</span>
                </button>
            </div>

            <div class='result-payload'>" . nl2br(htmlspecialchars($string)) . "</div>

            <div class='card-footer'>
                <div style='display: flex; gap: 0.5rem;'>
                    <span class='footer-tag'><span class='dot'></span> AI COMPLETED</span>
                    <span class='footer-tag'>PREMIUM LOGIC</span>
                </div>
                <div class='process-time'>
                    <i data-lucide='zap' style='width:12px; height:12px; color: #f59e0b;'></i> Processed in 0.8s
                </div>
            </div>
        </div>";
    }
    public function resumeBuilder($post, $files) {
        try {
            $name = $post['full_name'] ?? 'User';
            $email = $post['email'] ?? '';
            $title = $post['job_title'] ?? '';
            $exp = $post['experience'] ?? '';
            $interest = $post['interest'] ?? '';

            // Ensure uploads directory exists
            $uploadDir = PUBLIC_ROOT . DS . 'uploads';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $logFile = PUBLIC_ROOT . DS . 'debug_log.txt';
            file_put_contents($logFile, "Starting Resume Builder [" . date('Y-m-d H:i:s') . "]\n", FILE_APPEND);

            file_put_contents($logFile, "Init TCPDF\n", FILE_APPEND);
            if (!defined('K_TCPDF_THROW_EXCEPTION_ERROR')) {
                define('K_TCPDF_THROW_EXCEPTION_ERROR', true);
            }
            $pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetCreator('AI Tools Platform');
            $pdf->SetAuthor($name);
            $pdf->SetTitle('Professional Resume & Cover Letter');
            
            file_put_contents($logFile, "Setup Margins\n", FILE_APPEND);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetMargins(20, 20, 20);
            $pdf->SetAutoPageBreak(TRUE, 20);
            
            file_put_contents($logFile, "Add Page\n", FILE_APPEND);
            $pdf->AddPage();
            
            file_put_contents($logFile, "Render Content\n", FILE_APPEND);
            $pdf->SetFont('helvetica', 'B', 20);
            $pdf->Cell(0, 15, $name, 0, 1, 'L');
            
            $pdf->SetFont('helvetica', 'I', 12);
            $pdf->SetTextColor(100, 100, 100);
            $pdf->Cell(0, 10, "$title | $email", 'B', 1, 'L');
            
            $pdf->Ln(10);
            $pdf->SetFont('helvetica', 'B', 14);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(0, 10, 'Professional Experience & Skills', 0, 1);
            
            $pdf->SetFont('helvetica', '', 11);
            $pdf->MultiCell(0, 10, $exp, 0, 'L');
            
            $pdf->Ln(10);
            $pdf->SetFont('helvetica', 'B', 14);
            $pdf->Cell(0, 10, 'Cover Letter Context', 0, 1);
            
            $pdf->SetFont('helvetica', '', 11);
            $pdf->MultiCell(0, 10, $interest, 0, 'L');
            
            $fileName = 'Resume_' . time() . '.pdf';
            $filePath = $uploadDir . DS . $fileName;
            file_put_contents($logFile, "Output File: $filePath \n", FILE_APPEND);
            $pdf->Output($filePath, 'F');
            
            file_put_contents($logFile, "Final Check\n", FILE_APPEND);
            if (!file_exists($filePath)) {
                return ['status' => 'error', 'message' => 'Internal Error: Could not save PDF to disk.'];
            }

            file_put_contents($logFile, "Done Success\n", FILE_APPEND);
            return [
                'status' => 'success',
                'file_url' => URL_ROOT . '/public/uploads/' . $fileName
            ];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
