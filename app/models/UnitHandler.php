<?php

class UnitHandler extends Model {
    
    // --- LENGTH CONVERTERS ---
    public function metersToFeet($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val * 3.28084;
        return $this->formatConversionResult($val, 'Meters (m)', $res, 'Feet', "Multiply the length value by 3.281");
    }

    public function feetToMeters($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 3.28084;
        return $this->formatConversionResult($val, 'Feet (ft)', $res, 'Meters', "Divide the length value by 3.281");
    }

    public function cmToInches($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 2.54;
        return $this->formatConversionResult($val, 'Centimeters (cm)', $res, 'Inches', "Divide the length value by 2.54");
    }

    public function inchesToCm($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val * 2.54;
        return $this->formatConversionResult($val, 'Inches (in)', $res, 'Centimeters', "Multiply the length value by 2.54");
    }

    public function kmToMiles($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 1.609344;
        return $this->formatConversionResult($val, 'Kilometers (km)', $res, 'Miles', "Divide the distance by 1.609");
    }

    public function milesToKm($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val * 1.609344;
        return $this->formatConversionResult($val, 'Miles (mi)', $res, 'Kilometers', "Multiply the distance by 1.609");
    }

    // --- WEIGHT CONVERTERS ---
    public function kgToLbs($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val * 2.20462;
        return $this->formatConversionResult($val, 'Kilograms', $res, 'Pounds', "Multiply the mass by 2.205");
    }

    public function lbsToKg($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 2.20462;
        return $this->formatConversionResult($val, 'Pounds', $res, 'Kilograms', "Divide the mass by 2.205");
    }

    public function gramsToOunces($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 28.34952;
        return $this->formatConversionResult($val, 'Grams', $res, 'Ounces', "Divide the mass value by 28.35");
    }

    public function ouncesToGrams($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val * 28.34952;
        return $this->formatConversionResult($val, 'Ounces', $res, 'Grams', "Multiply the mass value by 28.35");
    }

    // --- TEMPERATURE CONVERTERS ---
    public function celsiusToFahrenheit($data) {
        $val = floatval($data['val'] ?? 0);
        $res = ($val * 9/5) + 32;
        return $this->formatConversionResult($val, '°C', $res, '°F', "Multiply by 9/5, then add 32");
    }

    public function fahrenheitToCelsius($data) {
        $val = floatval($data['val'] ?? 0);
        $res = ($val - 32) * 5/9;
        return $this->formatConversionResult($val, '°F', $res, '°C', "Deduct 32, then multiply by 5/9");
    }

    public function celsiusToKelvin($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val + 273.15;
        return $this->formatConversionResult($val, '°C', $res, 'K', "Add 273.15 to the Celsius temperature");
    }

    // --- STORAGE CONVERTERS ---
    public function kbToMb($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 1024;
        return $this->formatConversionResult($val, 'KB', $res, 'MB', "Divide the digital value by 1024");
    }

    public function mbToGb($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 1024;
        return $this->formatConversionResult($val, 'MB', $res, 'GB', "Divide the digital value by 1024");
    }

    public function gbToTb($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 1024;
        return $this->formatConversionResult($val, 'GB', $res, 'TB', "Divide the digital value by 1024");
    }

    public function tbToGb($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val * 1024;
        return $this->formatConversionResult($val, 'TB', $res, 'GB', "Multiply the digital value by 1024");
    }

    // --- TIME CONVERTERS ---
    public function secToMin($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 60;
        return $this->formatConversionResult($val, 'Seconds', $res, 'Minutes', "Divide the temporal value by 60");
    }

    public function minToHours($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 60;
        return $this->formatConversionResult($val, 'Minutes', $res, 'Hours', "Divide the temporal value by 60");
    }

    public function hoursToDays($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 24;
        return $this->formatConversionResult($val, 'Hours', $res, 'Days', "Divide the temporal value by 24");
    }

    public function daysToWeeks($data) {
        $val = floatval($data['val'] ?? 0);
        $res = $val / 7;
        return $this->formatConversionResult($val, 'Days', $res, 'Weeks', "Divide the temporal value by 7");
    }

    public function universalConvert($data) {
        $val = floatval($data['val'] ?? 0);
        $from = $data['from'] ?? '';
        $to = $data['to'] ?? '';
        $type = $data['type'] ?? 'length';
        
        $units = [
            'length' => ['m'=>1, 'cm'=>0.01, 'mm'=>0.001, 'km'=>1000, 'in'=>0.0254, 'ft'=>0.3048, 'yd'=>0.9144, 'mi'=>1609.34],
            'weight' => ['kg'=>1, 'g'=>0.001, 'mg'=>0.000001, 'lb'=>0.453592, 'oz'=>0.0283495],
            'storage'=> ['b'=>1, 'kb'=>1024, 'mb'=>1048576, 'gb'=>1073741824, 'tb'=>1099511627776],
            'time'   => ['s'=>1, 'min'=>60, 'h'=>3600, 'd'=>86400, 'w'=>604800, 'y'=>31536000]
        ];
        
        if (!isset($units[$type][$from]) || !isset($units[$type][$to])) return "<div style='color:red;'>Unsupported units.</div>";
        
        $baseVal = $val * $units[$type][$from];
        $res = $baseVal / $units[$type][$to];
        
        return $this->formatConversionResult($val, strtoupper($from), $res, strtoupper($to), "Base ($from) to $to");
    }

    public function pressure($data) {
        $val = floatval($data['val'] ?? 1);
        $from = $data['from'] ?? 'pa';
        $to = $data['to'] ?? 'bar';
        
        $units = ['pa'=>1, 'bar'=>100000, 'psi'=>6894.76, 'atm'=>101325];
        $base = $val * $units[$from];
        $res = $base / $units[$to];
        return $this->formatConversionResult($val, strtoupper($from), $res, strtoupper($to), "Pressure conversion");
    }

    public function angle($data) {
        $val = floatval($data['val'] ?? 180);
        $from = $data['from'] ?? 'deg';
        $to = $data['to'] ?? 'rad';
        
        if ($from == 'deg' && $to == 'rad') $res = $val * (pi() / 180);
        elseif ($from == 'rad' && $to == 'deg') $res = $val * (180 / pi());
        else $res = $val;
        
        return $this->formatConversionResult($val, $from, $res, $to, "Angle conversion");
    }

    public function shoeSize($data) {
        $size = floatval($data['size'] ?? 9);
        $gender = $data['gender'] ?? 'men';
        return $this->formatConversionResult($size, "US ($gender)", $size + 33, "EU", "Estimated standard chart");
    }

    public function roman($data) {
        $num = intval($data['val'] ?? 2024);
        $map = ['M'=>1000,'CM'=>900,'D'=>500,'CD'=>400,'C'=>100,'XC'=>90,'L'=>50,'XL'=>40,'X'=>10,'IX'=>9,'V'=>5,'IV'=>4,'I'=>1];
        $res = '';
        foreach($map as $roman => $value) {
            $matches = intval($num / $value);
            $res .= str_repeat($roman, $matches);
            $num %= $value;
        }
        return "
        <div style='background:var(--bg); padding:2rem; border-radius:12px; border:1px solid var(--border); text-align:center;'>
            <div style='font-size:3rem; font-weight:900; color:var(--primary); font-family:serif;'>$res</div>
            <div style='color:var(--text-muted);'>Roman Numeral</div>
        </div>";
    }

    public function sciNotation($data) {
        $num = floatval($data['val'] ?? 1234567);
        $res = sprintf("%.2e", $num);
        return $this->formatConversionResult($num, "Decimal", $res, "Scientific", "Standard e-notation");
    }

    public function fractionPercent($data) {
        $num = floatval($data['val'] ?? 0.75);
        $pct = $num * 100;
        return "
        <div style='background:var(--bg); padding:1.5rem; border-radius:12px; border:1px solid var(--border); text-align:center;'>
             <div style='font-size:2.5rem; color:var(--primary); font-weight:bold;'>$pct%</div>
             <div style='color:var(--text-muted);'>Percentage Equivalent</div>
        </div>";
    }

    private function formatConversionResult($inputVal, $inputLabel, $resVal, $resLabel, $formula) {
        // Automatically round huge decimals to not break aesthetics, but keep precision where necessary
        if(is_float($resVal)) {
            $formattedRes = (fmod($resVal, 1) !== 0.0) ? number_format($resVal, 4, '.', '') : number_format($resVal, 0);
            $formattedRes = rtrim(rtrim($formattedRes, '0'), '.'); // clean trailing zeros
        } else {
            $formattedRes = $resVal;
        }

        return "
        <div style='background: var(--bg); padding: 2rem; border-radius: var(--radius); border: 1px solid var(--border); text-align: center; margin-bottom:1rem;'>
            <div style='display:flex; align-items:center; justify-content:center; gap:1.5rem;'>
                <div style='flex:1;'>
                    <div style='font-size:2rem; font-weight:800; color:var(--text-dark); word-break: break-all;'>{$inputVal}</div>
                    <div style='font-size:0.875rem; color:var(--text-muted); text-transform:uppercase;'>{$inputLabel}</div>
                </div>
                <div style='font-size:2rem; color:var(--primary);'>=</div>
                <div style='flex:1;'>
                    <div style='font-size:3rem; font-weight:900; color:var(--primary); word-break: break-all;'>{$formattedRes}</div>
                    <div style='font-size:0.875rem; color:var(--text-muted); text-transform:uppercase; font-weight:bold;'>{$resLabel}</div>
                </div>
            </div>
        </div>
        <div style='background:#f8fafc; padding:1.25rem; border-radius:8px; border:1px dashed var(--border); text-align:center;'>
            <div style='font-size:0.75rem; color:var(--text-muted); text-transform:uppercase; font-weight:bold; letter-spacing:1px; margin-bottom:0.25rem;'>Conversion Formula</div>
            <div style='font-size:1.125rem; color:var(--text-dark); font-family:monospace;'>{$formula}</div>
        </div>";
    }
}
