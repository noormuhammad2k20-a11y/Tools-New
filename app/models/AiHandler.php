<?php
class AiHandler {
    public function mjPrompt($post) { return "Frontend Only"; }
    public function chatPrompt($post) { return "Frontend Only"; }
    public function humanize($post) { return "Frontend Only"; }
    public function ytSum($post) { return "Frontend Only"; }
    public function sdPrompt($post) { return "Frontend Only"; }
    public function blogTitle($post) { return "Frontend Only"; }
    public function coldEmail($post) { return "Frontend Only"; }
    public function coverLetter($post) { return "Frontend Only"; }
    public function socialBio($post) { return "Frontend Only"; }
    public function productDesc($post) { return "Frontend Only"; }
    public function brailleTranslate($post) { return "Frontend Only"; }
    public function summarizer($post) { return "Frontend Only"; }
    public function sentiment($post) { return "Frontend Only"; }
    public function imageGen($post) { return "Frontend Only"; }
    public function bgRemover($post) { return "Frontend Only"; }
    public function grammarTone($post) { return "Frontend Only"; }
    public function articleGen($post) { return "Frontend Only"; }
    public function promptGen($post) { return "Frontend Only"; }
    public function ytScript($post) { return "Frontend Only"; }
    public function seoMeta($post) { return "Frontend Only"; }
    public function socialPost($post) { return "Frontend Only"; }
    public function regexGen($post) { return "Frontend Only"; }
    public function sqlGen($post) { return "Frontend Only"; }
    public function codeExplain($post) { return "Frontend Only"; }
    public function plagiarismDetect($post) { return "Frontend Only"; }
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
