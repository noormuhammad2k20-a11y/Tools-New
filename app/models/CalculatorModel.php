<?php
class CalculatorModel extends ToolModel {
    public function calculatePercentage($value, $total) {
        if ($total == 0) return ['error' => 'Total cannot be zero'];
        return ['success' => true, 'result' => ($value / $total) * 100];
    }
}
