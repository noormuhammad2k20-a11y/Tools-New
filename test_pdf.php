<?php
// Temporary test script
require_once 'index.php'; // Load autoloader and constants

try {
    if (!class_exists('TCPDF')) {
        die("TCPDF not found");
    }
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, 'Test PDF', 0, 1);
    
    $uploadDir = PUBLIC_ROOT . DS . 'uploads';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $filePath = $uploadDir . DS . 'test.pdf';
    $pdf->Output($filePath, 'F');
    
    if (file_exists($filePath)) {
        echo "Success: " . $filePath;
    } else {
        echo "Failed to create file";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
