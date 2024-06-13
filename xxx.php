<?php

function nameComparison(?string $a, ?string $b): bool
    {
        $a = mb_strtoupper(trim($a ?? ''));
        $b = mb_strtoupper(trim($b ?? ''));
        if ($this->isIdentificationProviderOnfido()) {
            return $this->substringNameComparison(Strings::toAscii($a),  Strings::toAscii($b));
        }
        return strcasecmp($a, $b) === 0;
    }

function getSubstringNameComparisonSplitRegex(): string {
        if (self::$substringNameComparisonSplitRegex === null) {
            $delimiters = array_map(
                static fn (string $v): string => preg_quote($v, '/'),
                static::SUBSTRING_NAME_COMPARISON_DELIMITERS
            );
            self::$substringNameComparisonSplitRegex = '/(' . implode('|', $delimiters) . ')+/';
        }
        return self::$substringNameComparisonSplitRegex;
    }

function substringNameComparison(?string $a, ?string $b): bool
    {
        $a = mb_strtoupper(trim($a ?? ''));
        $b = mb_strtoupper(trim($b ?? ''));
        $splitRegex = static::getSubstringNameComparisonSplitRegex();
        $aValues = preg_split($splitRegex, $a);
        $bValues = preg_split($splitRegex, $b);
        $aValues = array_filter($aValues, static fn (string $v) => !Strings::isNullOrWhiteSpace($v));
        $bValues = array_filter($bValues, static fn (string $v) => !Strings::isNullOrWhiteSpace($v));
        foreach ($aValues as $aValue) {
            foreach ($bValues as $bValue) {
                if (strcasecmp($aValue, $bValue) === 0) {
                    return true;
                }
            }
        }
        return false;
    }
}


php?>