<?php
require_once 'index.php';
$logFile = ROOT . DS . 'test_write.txt';
if (file_put_contents($logFile, "Testing write at " . date('H:i:s'))) {
    echo "Success writing to " . $logFile;
} else {
    echo "Failed to write to " . $logFile;
}
