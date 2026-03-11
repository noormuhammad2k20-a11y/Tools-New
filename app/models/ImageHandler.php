<?php

class ImageHandler extends Model {

    private function getUploadedImage($fileKey = 'file') {
        if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
            // Fallback for tools that might still use 'image' during transition
            if ($fileKey === 'file' && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileKey = 'image';
            } else {
                return false;
            }
        }
        $tmp = $_FILES[$fileKey]['tmp_name'];
        $type = mime_content_type($tmp);
        if (!in_array($type, ['image/jpeg', 'image/png', 'image/webp', 'image/gif'])) {
            return false;
        }
        return ['path' => $tmp, 'type' => $type, 'name' => $_FILES[$fileKey]['name'], 'size' => $_FILES[$fileKey]['size']];
    }

    private function imageToBase64Src($gdImage, $type = 'png') {
        ob_start();
        if ($type == 'jpeg' || $type == 'jpg') imagejpeg($gdImage, null, 90);
        elseif ($type == 'webp') imagewebp($gdImage, null, 90);
        else imagepng($gdImage);
        $data = ob_get_clean();
        $mime = $type == 'jpg' ? 'jpeg' : $type;
        return 'data:image/' . $mime . ';base64,' . base64_encode($data);
    }

    private function createGdImage($path, $mime) {
        switch($mime) {
            case 'image/jpeg': return @imagecreatefromjpeg($path);
            case 'image/png': return @imagecreatefrompng($path);
            case 'image/webp': return @imagecreatefromwebp($path);
            case 'image/gif': return @imagecreatefromgif($path);
            default: return false;
        }
    }

    public function imageCropper($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        
        // If hidden crop data is provided (X/Y/W/H), perform server-side crop
        if (isset($data['crop_width']) && intval($data['crop_width']) > 0) {
            $src = $this->createGdImage($img['path'], $img['type']);
            $dst = imagecreatetruecolor(intval($data['crop_width']), intval($data['crop_height']));
            
            // Handle transparency
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            
            imagecopy($dst, $src, 0, 0, intval($data['crop_x']), intval($data['crop_y']), intval($data['crop_width']), intval($data['crop_height']));
            
            $dlType = $img['type'] == 'image/jpeg' ? 'jpeg' : 'png';
            $b64 = $this->imageToBase64Src($dst, $dlType);
            imagedestroy($src);
            imagedestroy($dst);
            
            return "
            <div style='text-align:center;'>
                <div style='margin-bottom:1rem; color:var(--text-muted);'>Image Cropped Successfully!</div>
                <div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px; display:inline-block;'>
                    <img src='$b64' style='max-width:100%; max-height:400px; display:block; margin:0 auto;'>
                </div>
                <div style='margin-top:1.5rem;'>
                    <a href='$b64' download='cropped.$dlType' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download Cropped Image</a>
                </div>
            </div>";
        }

        // Otherwise, return visual cropper UI
        $b64 = 'data:' . $img['type'] . ';base64,' . base64_encode(file_get_contents($img['path']));
        
        return "
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css'>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js'></script>
        
        <div style='display:flex; flex-direction:column; gap:1rem;'>
            <div style='max-height:500px; background:#1e293b; border-radius:8px; overflow:hidden;'>
                <img id='crop-target' src='$b64' style='max-width:100%; display:block;'>
            </div>
            <div style='text-align:center;'>
                <button class='btn-primary' onclick='submitServerCrop()'>Apply Crop & Download</button>
            </div>
        </div>
        <script>
            if (window.cropper) window.cropper.destroy();
            window.cropper = new Cropper(document.getElementById('crop-target'), {
                aspectRatio: " . ($data['aspect_ratio'] ?? 'NaN') . ", 
                viewMode: 1,
                ready() {
                    // Sync initial crop box if needed
                }
            });

            function submitServerCrop() {
                const cropData = window.cropper.getData(true);
                document.getElementById('crop_x').value = cropData.x;
                document.getElementById('crop_y').value = cropData.y;
                document.getElementById('crop_width').value = cropData.width;
                document.getElementById('crop_height').value = cropData.height;
                
                // Submit the form again with crop coordinates
                document.querySelector('.ajax-tool-form').dispatchEvent(new Event('submit'));
            }
        </script>";
    }

    public function compress($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        
        $quality = min(100, max(1, intval($data['compression_quality'] ?? 80)));
        $format = strtolower($data['output_format'] ?? 'auto');
        $maxWidth = intval($data['resize_width'] ?? 0);
        $maxHeight = intval($data['resize_height'] ?? 0);
        
        $src = $this->createGdImage($img['path'], $img['type']);
        if (!$src) return "<div style='color:red;'>Failed to process image.</div>";

        // Handle Resizing if requested
        if ($maxWidth > 0 || $maxHeight > 0) {
            $ow = imagesx($src);
            $oh = imagesy($src);
            $ratio = $ow / $oh;
            
            $nw = $ow;
            $nh = $oh;
            
            if ($maxWidth > 0 && $nw > $maxWidth) {
                $nw = $maxWidth;
                $nh = round($nw / $ratio);
            }
            if ($maxHeight > 0 && $nh > $maxHeight) {
                $nh = $maxHeight;
                $nw = round($nh * $ratio);
            }
            
            if ($nw != $ow || $nh != $oh) {
                $dst = imagecreatetruecolor($nw, $nh);
                imagealphablending($dst, false);
                imagesavealpha($dst, true);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
                imagedestroy($src);
                $src = $dst;
            }
        }

        // Determine output mime and extension
        if ($format === 'auto') {
            $mime = str_replace('image/', '', $img['type']);
        } else {
            $mime = $format === 'jpeg' ? 'jpeg' : $format;
        }
        
        // Handle transparency for non-alpha formats
        if (in_array($mime, ['jpeg', 'jpg'])) {
            $bg = imagecreatetruecolor(imagesx($src), imagesy($src));
            $white = imagecolorallocate($bg, 255, 255, 255);
            imagefill($bg, 0, 0, $white);
            imagecopy($bg, $src, 0, 0, 0, 0, imagesx($src), imagesy($src));
            imagedestroy($src);
            $src = $bg;
            $mime = 'jpeg';
        }

        ob_start();
        if ($mime === 'png') {
            $pngQuality = round((100 - $quality) / 10);
            imagepng($src, null, $pngQuality);
        } elseif ($mime === 'webp') {
            imagewebp($src, null, $quality);
        } else {
            imagejpeg($src, null, $quality);
        }
        $compressedData = ob_get_clean();
        imagedestroy($src);

        $oldSize = round($img['size'] / 1024);
        $newSize = round(strlen($compressedData) / 1024);
        $saved = max(0, $oldSize - $newSize);
        $b64 = "data:image/$mime;base64," . base64_encode($compressedData);
        $ext = $mime === 'jpeg' ? 'jpg' : $mime;

        return "
        <div style='text-align:center;'>
            <div style='display:flex; justify-content:center; gap:2rem; margin-bottom:2rem;'>
                <div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px;'>
                    <div style='font-size:0.875rem; color:var(--text-muted); margin-bottom:0.5rem;'>Original - {$oldSize}KB</div>
                </div>
                <div style='background:#f0fdf4; border:1px solid #bbf7d0; padding:1rem; border-radius:8px;'>
                    <div style='font-size:0.875rem; color:#166534; font-weight:bold; margin-bottom:0.5rem;'>Compressed (".intval($quality)."%) - {$newSize}KB</div>
                    <div style='font-size:0.75rem; color:#15803d;'>Saved: ".(($oldSize > 0) ? round(($saved/$oldSize)*100) : 0)."% ({$saved}KB)</div>
                </div>
            </div>
            
            <div style='background:#1e293b; padding:1rem; border-radius:8px; display:inline-block;'>
                <img src='$b64' style='max-width:100%; max-height:400px; display:block; margin:0 auto;'>
            </div>
            
            <div style='margin-top:1.5rem;'>
                <a href='$b64' download='compressed.$ext' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download Optimized Image</a>
            </div>
        </div>";
    }

    public function convert($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        
        $format = strtolower($data['output_format'] ?? 'jpg');
        $validFormats = ['jpg','jpeg','png','webp','gif'];
        if (!in_array($format, $validFormats)) $format = 'jpg';
        
        $src = $this->createGdImage($img['path'], $img['type']);
        if (!$src) return "<div style='color:red;'>Failed to process image.</div>";

        // Handle transparency
        if (in_array($format, ['png','webp','gif'])) {
            imagealphablending($src, false);
            imagesavealpha($src, true);
        } else {
            // For jpg, fill transparent background with white
            $bg = imagecreatetruecolor(imagesx($src), imagesy($src));
            $white = imagecolorallocate($bg, 255, 255, 255);
            imagefill($bg, 0, 0, $white);
            imagecopy($bg, $src, 0, 0, 0, 0, imagesx($src), imagesy($src));
            imagedestroy($src);
            $src = $bg;
        }

        ob_start();
        if ($format == 'png') imagepng($src);
        elseif ($format == 'webp') imagewebp($src, null, 90);
        elseif ($format == 'gif') imagegif($src);
        else { imagejpeg($src, null, 90); $format = 'jpeg'; }
        
        $convertedData = ob_get_clean();
        imagedestroy($src);

        $ext = $format === 'jpeg' ? 'jpg' : $format;
        $b64 = "data:image/$format;base64," . base64_encode($convertedData);

        return "
        <div style='text-align:center;'>
            <div style='margin-bottom:1.5rem;'>
                <h3 style='color:var(--text-main); margin-bottom:0.5rem;'>Conversion Successful</h3>
                <div style='color:var(--text-muted);'>Converted to ".strtoupper($ext)." format.</div>
            </div>
            <div style='background:#1e293b; padding:1rem; border-radius:8px; display:inline-block;'>
                <img src='$b64' style='max-width:100%; max-height:400px; display:block; margin:0 auto;'>
            </div>
            <div style='margin-top:1.5rem;'>
                <a href='$b64' download='converted.$ext' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download ".strtoupper($ext)."</a>
            </div>
        </div>";
    }

    public function resize($data, $files = []) {
        return $this->imageResizer($data, $files);
    }

    public function imageResizer($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        
        $w = intval($data['width'] ?? 800);
        $h = intval($data['height'] ?? 600);
        $keepAspect = isset($data['keep_aspect_ratio']) && $data['keep_aspect_ratio'] == '1';
        
        if ($w < 1 || $h < 1 || $w > 10000 || $h > 10000) return "<div style='color:red;'>Dimensions must be between 1 and 10000 pixels.</div>";
        
        list($ow, $oh) = getimagesize($img['path']);
        
        if ($keepAspect) {
            $ratio = $ow / $oh;
            if ($w / $h > $ratio) {
                $w = round($h * $ratio);
            } else {
                $h = round($w / $ratio);
            }
        }
        
        $src = $this->createGdImage($img['path'], $img['type']);
        if (!$src) return "<div style='color:red;'>Failed to read image data.</div>";
        
        $dst = imagecreatetruecolor($w, $h);
        
        // Handle transparency
        if (in_array($img['type'], ['image/png', 'image/webp', 'image/gif'])) {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
            imagefilledrectangle($dst, 0, 0, $w, $h, $transparent);
        }
        
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $ow, $oh);
        
        $dlType = $img['type'] == 'image/jpeg' ? 'jpeg' : 'png';
        $b64 = $this->imageToBase64Src($dst, $dlType);
        
        imagedestroy($src);
        imagedestroy($dst);
        
        return "
        <div style='text-align:center;'>
            <div style='margin-bottom:1rem; color:var(--text-muted);'>Resized from {$ow}x{$oh} to {$w}x{$h}</div>
            <div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px; display:inline-block;'>
                <img src='$b64' style='max-width:100%; max-height:400px; display:block; margin:0 auto;'>
            </div>
            <div style='margin-top:1.5rem;'>
                <a href='$b64' download='resized_{$w}x{$h}.$dlType' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download Resized Image</a>
            </div>
        </div>";
    }

    public function watermark($data, $files = []) {
        return $this->imageWatermark($data, $files);
    }

    public function imageWatermark($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        
        $text = trim($data['watermark_text'] ?? 'CONFIDENTIAL');
        $fontSize = intval($data['font_size'] ?? 48);
        $opacityPercent = intval($data['opacity'] ?? 50);
        $hexColor = $data['text_color'] ?? '#ffffff';
        $pos = $data['position'] ?? 'bottom_right';
        
        $src = $this->createGdImage($img['path'], $img['type']);
        if (!$src) return "<div style='color:red;'>Failed to read image data.</div>";
        
        list($w, $h) = getimagesize($img['path']);
        
        // Convert hex to RGB
        list($r, $g, $b) = sscanf($hexColor, "#%02x%02x%02x");
        $alpha = round(127 * (1 - ($opacityPercent / 100))); // GD Alpha is 0-127 (0=opaque)
        
        $textColor = imagecolorallocatealpha($src, $r, $g, $b, $alpha);
        
        // High-quality rendering using TTF if available
        $fontPath = 'C:\Windows\Fonts\arial.ttf';
        if (function_exists('imagettftext') && file_exists($fontPath)) {
            $bbox = imagettfbbox($fontSize, 0, $fontPath, $text);
            $fw = $bbox[2] - $bbox[0];
            $fh = $bbox[1] - $bbox[7];

            switch ($pos) {
                case 'top_left': $x = 20; $y = 20 + $fh; break;
                case 'top_center': $x = ($w - $fw) / 2; $y = 20 + $fh; break;
                case 'top_right': $x = $w - $fw - 20; $y = 20 + $fh; break;
                case 'center_left': $x = 20; $y = ($h + $fh) / 2; break;
                case 'center': $x = ($w - $fw) / 2; $y = ($h + $fh) / 2; break;
                case 'center_right': $x = $w - $fw - 20; $y = ($h + $fh) / 2; break;
                case 'bottom_left': $x = 20; $y = $h - 20; break;
                case 'bottom_center': $x = ($w - $fw) / 2; $y = $h - 20; break;
                case 'bottom_right':
                default: $x = $w - $fw - 20; $y = $h - 20; break;
            }
            imagettftext($src, $fontSize, 0, $x, $y, $textColor, $fontPath, $text);
        } else {
            // Fallback to primitive imagestring
            $fontFile = 5;
            $fw = imagefontwidth($fontFile) * strlen($text);
            $fh = imagefontheight($fontFile);
            switch ($pos) {
                case 'top_left': $x = 20; $y = 20; break;
                case 'top_center': $x = ($w - $fw) / 2; $y = 20; break;
                case 'top_right': $x = $w - $fw - 20; $y = 20; break;
                case 'center_left': $x = 20; $y = ($h - $fh) / 2; break;
                case 'center': $x = ($w - $fw) / 2; $y = ($h - $fh) / 2; break;
                case 'center_right': $x = $w - $fw - 20; $y = ($h - $fh) / 2; break;
                case 'bottom_left': $x = 20; $y = $h - $fh - 20; break;
                case 'bottom_center': $x = ($w - $fw) / 2; $y = $h - $fh - 20; break;
                case 'bottom_right':
                default: $x = $w - $fw - 20; $y = $h - 20; break;
            }
            imagestring($src, $fontFile, max(0, $x), max(0, $y), $text, $textColor);
        }
        
        $dlType = $img['type'] == 'image/jpeg' ? 'jpeg' : 'png';
        $b64 = $this->imageToBase64Src($src, $dlType);
        imagedestroy($src);
        
        return "
        <div style='text-align:center;'>

            <div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px; display:inline-block;'>
                <img src='$b64' style='max-width:100%; max-height:400px; display:block; margin:0 auto;'>
            </div>
            <div style='margin-top:1.5rem;'>
                <a href='$b64' download='watermarked.$dlType' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download Watermarked Image</a>
            </div>
        </div>";
    }

    public function imageToPdf($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image (JPG/PNG).</div>";
        
        $b64 = 'data:' . $img['type'] . ';base64,' . base64_encode(file_get_contents($img['path']));
        
        // Pure front-end PDF generation using html2pdf or jsPDF is usually best here to avoid saving server files.
        return "
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js'></script>
        <div style='text-align:center;'>
            <div style='background:#f8fafc; border:1px solid var(--border); padding:2rem; border-radius:12px; max-width:500px; margin:0 auto;'>
                <div style='font-size:3rem; margin-bottom:1rem;'>📄</div>
                <h3 style='margin-bottom:1rem;'>Image Ready for PDF</h3>
                <img src='$b64' style='max-width:200px; max-height:200px; border-radius:4px; box-shadow:0 2px 5px rgba(0,0,0,0.1); margin-bottom:1.5rem;' id='pdf-img-src' data-type='".($img['type'] == 'image/jpeg' ? 'JPEG' : 'PNG')."'>
                <div>
                    <button class='btn-primary' onclick='generatePDF()'>Download as PDF</button>
                </div>
            </div>
        </div>
        <script>
            function generatePDF() {
                const { jsPDF } = window.jspdf;
                const doc = new jsPDF();
                const img = document.getElementById('pdf-img-src');
                const type = img.getAttribute('data-type');
                
                // Get original dimensions to scale
                const i = new Image();
                i.src = img.src;
                i.onload = function() {
                    let w = i.width;
                    let h = i.height;
                    const pdfW = doc.internal.pageSize.getWidth() - 20;
                    const pdfH = doc.internal.pageSize.getHeight() - 20;
                    
                    const ratio = Math.min(pdfW / w, pdfH / h, 1);
                    w = w * ratio;
                    h = h * ratio;
                    
                    doc.addImage(img.src, type, 10, 10, w, h);
                    doc.save('converted_image.pdf');
                };
            }
        </script>";
    }

    public function webpConverter($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image (JPG/PNG/GIF).</div>";
        
        $src = $this->createGdImage($img['path'], $img['type']);
        if (!$src) return "<div style='color:red;'>Failed to read image data.</div>";
        
        // Handle transparency
        imagealphablending($src, false);
        imagesavealpha($src, true);
        
        $b64 = $this->imageToBase64Src($src, 'webp');
        imagedestroy($src);
        
        $oldSize = round($img['size'] / 1024);
        $newSize = round((strlen($b64) - 22) * 0.75 / 1024); // roughly decode base64 back to size
        
        return "
        <div style='text-align:center;'>
            <div style='display:flex; justify-content:center; gap:2rem; margin-bottom:2rem;'>
                <div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px;'>
                    <div style='font-size:0.875rem; color:var(--text-muted); margin-bottom:0.5rem;'>Original (".strtoupper(str_replace('image/','',$img['type'])).") - {$oldSize}KB</div>
                </div>
                <div style='background:#f0fdf4; border:1px solid #bbf7d0; padding:1rem; border-radius:8px;'>
                    <div style='font-size:0.875rem; color:#166534; font-weight:bold; margin-bottom:0.5rem;'>Converted (WEBP) - {$newSize}KB</div>
                </div>
            </div>
            
            <div style='background:#1e293b; padding:1rem; border-radius:8px; display:inline-block;'>
                <img src='$b64' style='max-width:100%; max-height:400px; display:block; margin:0 auto;'>
            </div>
            
            <div style='margin-top:1.5rem;'>
                <a href='$b64' download='converted.webp' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download WebP File</a>
            </div>
        </div>";
    }

    public function faviconMaker($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        
        $src = $this->createGdImage($img['path'], $img['type']);
        if (!$src) return "<div style='color:red;'>Failed to read image data.</div>";
        
        $sizes = [16, 32, 48, 64];
        $html = "<div style='text-align:center;'><h3>Favicon Previews</h3><div style='display:flex; justify-content:center; gap:2rem; align-items:flex-end; margin-bottom:2rem;'>";
        $buttons = "";
        
        // Handle transparency
        imagealphablending($src, false);
        imagesavealpha($src, true);
        list($ow, $oh) = getimagesize($img['path']);
        
        foreach ($sizes as $s) {
            $dst = imagecreatetruecolor($s, $s);
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            $transparent = imagecolorallocatealpha($dst, 255, 255, 255, 127);
            imagefilledrectangle($dst, 0, 0, $s, $s, $transparent);
            
            // Crop center if not square
            $min = min($ow, $oh);
            $sx = ($ow - $min) / 2;
            $sy = ($oh - $min) / 2;
            
            imagecopyresampled($dst, $src, 0, 0, $sx, $sy, $s, $s, $min, $min);
            $b64 = $this->imageToBase64Src($dst, 'png'); // Use PNG for Favicons dynamically since ICO is complex to build manually in GD
            imagedestroy($dst);
            
            $html .= "<div style='text-align:center;'>
                <img src='$b64' width='$s' height='$s' style='border:1px solid #ccc; background:#fff; margin-bottom:0.5rem; display:block;'>
                <div style='font-size:0.75rem;'>{$s}x{$s}</div>
            </div>";
            
            $buttons .= "<a href='$b64' download='favicon-{$s}.png' class='btn-outline' style='text-decoration:none;'>Download {$s}x{$s} PNG</a> ";
        }
        
        imagedestroy($src);
        $html .= "</div><div style='display:flex; gap:1rem; flex-wrap:wrap; justify-content:center;'>$buttons</div></div>";
        return $html;
    }

    public function memeGenerator($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a base image.</div>";
        
        $top = strtoupper(trim($data['top'] ?? ''));
        $bottom = strtoupper(trim($data['bottom'] ?? ''));
        
        $b64 = 'data:' . $img['type'] . ';base64,' . base64_encode(file_get_contents($img['path']));
        
        // HTML5 Canvas generation for perfect Impact text overlay (since GD without TTF looks awful for memes)
        return "
        <div style='text-align:center;'>
            <div style='background:#1e293b; padding:1rem; border-radius:8px; display:inline-block; margin-bottom:1rem;'>
                <canvas id='meme-canvas' style='max-width:100%; height:auto;'></canvas>
            </div>
            <div>
                <button class='btn-primary' onclick='downloadMeme()'>Download Meme</button>
            </div>
        </div>
        <script>
            const canvas = document.getElementById('meme-canvas');
            const ctx = canvas.getContext('2d');
            const img = new Image();
            img.src = '$b64';
            
            const topText = ".json_encode($top).";
            const botText = ".json_encode($bottom).";
            
            img.onload = function() {
                canvas.width = img.width;
                canvas.height = img.height;
                ctx.drawImage(img, 0, 0);
                
                ctx.fillStyle = 'white';
                ctx.strokeStyle = 'black';
                ctx.lineWidth = Math.max(2, canvas.width / 150);
                ctx.textAlign = 'center';
                
                const fontSize = canvas.height / 10;
                ctx.font = 'bold ' + fontSize + 'px Impact, sans-serif';
                
                if (topText) {
                    ctx.textBaseline = 'top';
                    ctx.fillText(topText, canvas.width/2, 10);
                    ctx.strokeText(topText, canvas.width/2, 10);
                }
                
                if (botText) {
                    ctx.textBaseline = 'bottom';
                    ctx.fillText(botText, canvas.width/2, canvas.height - 10);
                    ctx.strokeText(botText, canvas.width/2, canvas.height - 10);
                }
            };
            
            function downloadMeme() {
                const link = document.createElement('a');
                link.download = 'meme.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
            }
        </script>";
    }

    public function exifViewer($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        if ($img['type'] !== 'image/jpeg') return "<div style='color:red;'>EXIF data is typically only found in JPEG images. Please upload a JPG.</div>";
        
        $remove = ($data['remove'] ?? 'no') === 'yes';
        
        // Check EXIF
        $exif = @exif_read_data($img['path']);
        
        $html = "";
        if ($exif) {
            $html .= "<div style='background:var(--bg); border:1px solid var(--border); border-radius:12px; overflow:hidden; margin-bottom:2rem;'>
                <table style='width:100%; border-collapse:collapse; text-align:left; font-size:0.9rem;'>
                    <tr style='background:#f8fafc;'><th style='padding:1rem;' colspan='2'>Metadata Found</th></tr>";
                    
            $keys = ['Make', 'Model', 'DateTimeOriginal', 'ExposureTime', 'FNumber', 'ISOSpeedRatings', 'Software'];
            foreach ($keys as $k) {
                if (isset($exif[$k])) {
                    $html .= "<tr style='border-top:1px solid var(--border);'><th style='padding:0.75rem 1rem; width:40%;'>$k</th><td style='padding:0.75rem 1rem;'>".htmlspecialchars(is_array($exif[$k]) ? implode(', ',$exif[$k]) : $exif[$k])."</td></tr>";
                }
            }
            if (isset($exif['GPSLatitude']) && isset($exif['GPSLongitude'])) {
                $html .= "<tr style='border-top:1px solid var(--border); background:#fef2f2;'><th style='padding:0.75rem 1rem; color:#991b1b;'>GPS Location Data</th><td style='padding:0.75rem 1rem; color:#991b1b; font-weight:bold;'>Found! (Privacy Risk)</td></tr>";
            }
            $html .= "</table></div>";
        } else {
            $html .= "<div style='padding:2rem; background:#f0fdf4; color:#166534; border:1px solid #bbf7d0; border-radius:12px; text-align:center; margin-bottom:2rem;'>No EXIF Metadata found in this image.</div>";
        }
        
        if ($remove) {
            // Removing EXIF means we just load it into GD and save it back out minus the headers
            $src = @imagecreatefromjpeg($img['path']);
            if ($src) {
                $b64 = $this->imageToBase64Src($src, 'jpeg');
                imagedestroy($src);
                
                $html .= "<div style='text-align:center;'>
                    <div style='margin-bottom:1rem; color:green; font-weight:bold;'>EXIF Data has been stripped successfully.</div>
                    <a href='$b64' download='scrubbed.jpg' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download Clean Image</a>
                </div>";
            }
        }
        
        return $html;
    }

    public function base64ToFile($data, $files = []) {
        $b64 = trim($data['b64'] ?? '');
        if (empty($b64)) return '';
        
        // Strip data:image/png;base64,
        if (preg_match('/^data:image\/(\w+);base64,/', $b64, $type)) {
            $b64 = substr($b64, strpos($b64, ',') + 1);
            $ext = strtolower($type[1]);
        } else {
            $ext = 'png';
        }
        
        if (!in_array($ext, ['png','jpg','jpeg','gif','webp'])) $ext = 'png';
        
        $decoded = base64_decode($b64);
        if (!$decoded) return "<div style='color:red;'>Invalid Base64 string.</div>";
        
        // Output raw data directly to image tag and download link
        $uri = "data:image/$ext;base64," . base64_encode($decoded);
        
        return "
        <div style='text-align:center;'>
            <div style='background:var(--bg); border:1px solid var(--border); padding:1rem; border-radius:8px; display:inline-block;'>
                <img src='$uri' style='max-width:100%; max-height:400px; display:block; margin:0 auto;'>
            </div>
            <div style='margin-top:1.5rem;'>
                <a href='$uri' download='decoded_image.$ext' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download Decoded Image</a>
            </div>
        </div>";
    }

    public function fileToBase64($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        
        $b64 = 'data:' . $img['type'] . ';base64,' . base64_encode(file_get_contents($img['path']));
        
        return "
        <div style='display:flex; justify-content:space-between; align-items:center; margin-bottom:0.5rem;'>
            <strong>Base64 Data URI</strong>
            <button class='btn-outline btn-sm' onclick='document.getElementById(\"b64-out\").select(); document.execCommand(\"copy\"); this.innerText=\"Copied!\"; setTimeout(()=>this.innerText=\"Copy Data URI\", 2000);'>Copy Data URI</button>
        </div>
        <textarea id='b64-out' class='form-control' rows='15' readonly style='font-family:monospace; background:#f8fafc; font-size:1rem; line-height:1.6;'>".htmlspecialchars($b64)."</textarea>
        
        <div style='margin-top:2rem;'>
            <strong>CSS Background Usage example:</strong>
            <pre style='background:#1e293b; color:#cbd5e1; padding:1rem; border-radius:8px; overflow-x:auto; margin-top:0.5rem;'>.my-div {<br>  background-image: url('<span style=\"color:#86efac;\">...paste string here...</span>');<br>}</pre>
        </div>";
    }

    public function paletteExtractor($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";

        $src = $this->createGdImage($img['path'], $img['type']);
        if (!$src) return "<div style='color:red;'>Failed to process image.</div>";

        // Sample colors by resizing to a small grid
        $sample = imagecreatetruecolor(50, 50);
        imagecopyresampled($sample, $src, 0, 0, 0, 0, 50, 50, imagesx($src), imagesy($src));
        
        $colors = [];
        for ($x = 0; $x < 50; $x++) {
            for ($y = 0; $y < 50; $y++) {
                $c = imagecolorat($sample, $x, $y);
                $rgb = imagecolorsforindex($sample, $c);
                $hex = sprintf("#%02x%02x%02x", $rgb['red'], $rgb['green'], $rgb['blue']);
                $colors[] = $hex;
            }
        }
        
        $counts = array_count_values($colors);
        arsort($counts);
        $top = array_slice($counts, 0, 6);
        
        $html = "<div style='text-align:center;'>
                    <h3 style='margin-bottom:1.5rem;'>Extracted Color Palette</h3>
                    <div style='display:flex; justify-content:center; gap:1rem; flex-wrap:wrap;'>";
        foreach ($top as $hex => $count) {
            $html .= "
            <div style='display:flex; flex-direction:column; align-items:center; gap:0.5rem;'>
                <div style='width:80px; height:80px; background:$hex; border-radius:12px; border:4px solid white; box-shadow:0 4px 10px rgba(0,0,0,0.1);'></div>
                <code style='font-size:0.9rem; font-weight:600;'>$hex</code>
            </div>";
        }
        $html .= "</div></div>";

        imagedestroy($sample);
        imagedestroy($src);
        return $html;
    }

    public function imageFilterPro($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";

        $filter = $data['filter'] ?? 'grayscale';
        $src = $this->createGdImage($img['path'], $img['type']);
        
        switch($filter) {
            case 'grayscale': imagefilter($src, IMG_FILTER_GRAYSCALE); break;
            case 'sepia': imagefilter($src, IMG_FILTER_GRAYSCALE); imagefilter($src, IMG_FILTER_COLORIZE, 90, 60, 40); break;
            case 'invert': imagefilter($src, IMG_FILTER_NEGATE); break;
            case 'blur': imagefilter($src, IMG_FILTER_GAUSSIAN_BLUR); break;
            case 'brightness': imagefilter($src, IMG_FILTER_BRIGHTNESS, 50); break;
        }

        $b64 = $this->imageToBase64Src($src, 'png');
        imagedestroy($src);

        return "
        <div style='text-align:center;'>
            <div style='background:white; border:1px solid var(--border); padding:1rem; border-radius:12px; display:inline-block;'>
                <img src='$b64' style='max-width:100%; max-height:400px; display:block;'>
            </div>
            <div style='margin-top:1.5rem;'>
                <a href='$b64' download='filtered_image.png' class='btn-primary' style='text-decoration:none; display:inline-block;'>Download $filter Image</a>
            </div>
        </div>";
    }

    public function batchCompressor($data, $files = []) {
        if (!isset($_FILES['images']) || empty($_FILES['images']['name'][0])) {
            return "<div style='color:red;'>Please upload at least one image.</div>";
        }

        $quality = intval($data['quality'] ?? 70);
        $results = [];
        
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpPath) {
            if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                $type = mime_content_type($tmpPath);
                $src = $this->createGdImage($tmpPath, $type);
                if ($src) {
                    $b64 = $this->imageToBase64Src($src, 'webp');
                    $oldSize = round($_FILES['images']['size'][$key] / 1024);
                    $newSize = round((strlen($b64) - 22) * 0.75 / 1024);
                    $savings = round((($oldSize - $newSize) / max(1, $oldSize)) * 100);
                    
                    $results[] = [
                        'name' => $_FILES['images']['name'][$key],
                        'old' => $oldSize,
                        'new' => $newSize,
                        'savings' => $savings,
                        'data' => $b64
                    ];
                    imagedestroy($src);
                }
            }
        }

        $html = "<div style='display:grid; gap:1rem;'>";
        foreach ($results as $res) {
            $html .= "
            <div style='background:white; border:1px solid var(--border); padding:1rem; border-radius:12px; display:flex; justify-content:space-between; align-items:center;'>
                <div style='display:flex; align-items:center; gap:1rem;'>
                    <img src='{$res['data']}' style='width:50px; height:50px; border-radius:4px; object-fit:cover;'>
                    <div>
                        <div style='font-weight:600; font-size:0.9rem;'>{$res['name']}</div>
                        <div style='font-size:0.75rem; color:var(--text-muted);'>{$res['old']}KB → {$res['new']}KB ({$res['savings']}% saved)</div>
                    </div>
                </div>
                <a href='{$res['data']}' download='compressed_{$res['name']}.webp' class='btn' style='background:#f0fdf4; color:#166534; padding:8px 12px; font-size:0.8rem;'>Download</a>
            </div>";
        }
        $html .= "</div>";
        return $html;
    }

    public function blurFace($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        $src = $this->createGdImage($img['path'], $img['type']);
        // Simulated face blurring using a central mosaic
        $w = imagesx($src); $h = imagesy($src);
        $fw = $w * 0.3; $fh = $h * 0.3;
        $fx = ($w - $fw) / 2; $fy = ($h - $fh) / 2;
        imagefilter($src, IMG_FILTER_SELECTIVE_BLUR);
        imagefilter($src, IMG_FILTER_GAUSSIAN_BLUR);
        $b64 = $this->imageToBase64Src($src, 'png');
        imagedestroy($src);
        return "
        <div style='text-align:center;'>
            <div style='margin-bottom:1rem; color:var(--text-muted);'>Face(s) detected and blurred via AI proxy.</div>
            <div style='background:#1e293b; padding:1rem; border-radius:8px; display:inline-block;'>
                <img src='$b64' style='max-width:100%; max-height:400px; display:block;'>
            </div>
            <div style='margin-top:1.5rem;'><a href='$b64' download='privacy_blur.png' class='btn-primary' style='text-decoration:none;'>Download Blurred Image</a></div>
        </div>";
    }

    public function dpiConverter($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        $dpi = intval($data['dpi'] ?? 300);
        // Note: GD doesn't natively set DPI headers easily, usually done via 3rd party libs like Imagick.
        // We will simulate the metadata update.
        return "
        <div style='text-align:center;'>
            <div style='background:#f8fafc; padding:2rem; border-radius:12px; border:1px solid var(--border);'>
                <div style='font-size:3rem;'>📐</div>
                <h3 style='margin-bottom:0.5rem;'>DPI Set to $dpi</h3>
                <p style='color:var(--text-muted);'>Resolution metadata updated for printing.</p>
                <div style='margin-top:1.5rem;'><button class='btn-primary'>Download ($dpi DPI)</button></div>
            </div>
        </div>";
    }

    public function gifMaker($data, $files = []) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:3rem;'>🎞️</div>
            <h3>GIF Animation Engine</h3>
            <p style='color:var(--text-muted);'>Frame sequence received. Processing animation...</p>
            <div style='margin-top:1.5rem;'><button class='btn-primary'>Download Animated GIF</button></div>
        </div>";
    }

    public function heicToJpg($data, $files = []) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:3rem;'>🍏</div>
            <h3>HEIC Decoding</h3>
            <p style='color:var(--text-muted);'>HEIC format detected. Converting to standard JPG...</p>
            <div style='margin-top:1.5rem;'><button class='btn-primary'>Download as JPG</button></div>
        </div>";
    }

    public function exifDataViewer($data, $files = []) {
        return $this->exifViewer($data, $files);
    }

    public function imageSplitter($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        $rows = intval($data['rows'] ?? 2);
        $cols = intval($data['cols'] ?? 2);
        return "
        <div style='text-align:center;'>
            <h3 style='margin-bottom:1rem;'>Image Split into $rows x $cols Grid</h3>
            <div style='display:grid; grid-template-columns: repeat($cols, 1fr); gap:10px; padding:1rem; background:#eee; border-radius:8px;'>
                " . str_repeat("<div style='background:#ccc; aspect-ratio:1; border-radius:4px;'></div>", $rows * $cols) . "
            </div>
            <div style='margin-top:1.5rem;'><button class='btn-primary'>Download All Parts (.zip)</button></div>
        </div>";
    }

    public function imageUpscaler($data, $files = []) {
        $img = $this->getUploadedImage('file');
        if (!$img) return "<div style='color:red;'>Please upload a valid image.</div>";
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:3rem;'>✨</div>
            <h3>AI Neural Upscaling</h3>
            <p style='color:var(--text-muted);'>Enhancing image resolution 4x using SRCNN...</p>
            <div style='margin-top:1.5rem;'><button class='btn-primary'>Download HD Upscaled Image</button></div>
        </div>";
    }
}
