<?php

namespace MuCTS\DFA;


use MuCTS\DFA\Exceptions\DFAException;

/**
 * @param $str
 * @param null $encoding
 * @return int
 * @throws DFAException
 */
function mb_strlen($str, $encoding = null): int
{
    $length = \mb_strlen($str, $encoding);
    if ($length === false) {
        throw new DFAException(' encoding 无效');
    }
    return $length;
}