<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function nameComparison(?string $a, ?string $b): bool
    {
        $a = mb_strtoupper(trim($a ?? ''));
        $b = mb_strtoupper(trim($b ?? ''));
        if ($this->isIdentificationProviderOnfido()) {
            return $this->substringNameComparison(Strings::toAscii($a),  Strings::toAscii($b));
        }
        return strcasecmp($a, $b) === 0;
    }




echo "aaa";
?>