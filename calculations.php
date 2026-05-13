<?php

header("Content-Type: application/json");

$expression = $_GET["expression"] ?? "";

if ($expression === "") {
    echo json_encode(["error" => "empty expression"]);
    exit;
}
if (!preg_match('/^[0-9+\-*\/()!√eπlnog.]+$/', $expression)) {
    echo json_encode(["error" => "invalid characters"]);
    exit;
}

$result = calculate($expression);

echo json_encode([
    "result" => $result
]);

function factorial($n) {
    if ($n < 0) return 0;
    if ($n == 0) return 1;

    return $n * factorial($n - 1);
}

function calculate($expression) {
    $expression = str_replace(' ', '', $expression);
    $tokens = createTockens($expression);

    $i = 0;
    
    return parse($tokens);
}

function createTockens($expr) {
    $tokens = [];
    $num = '';
    $i = 0;

    while ($i < strlen($expr)) {

        $ch = mb_substr($expr, $i, 1);


        if (is_numeric($ch) || $ch === '.') {
            $num .= $ch;
            $i++;
            continue;
        }

        if ($num !== '') {
            $tokens[] = $num;
            $num = '';
        }


        if ($ch === '*' && isset($expr[$i+1]) && $expr[$i+1] === '*') {
            $tokens[] = '**';
            $i += 2;
            continue;
        }

        if ($ch === 'l' && substr($expr, $i, 2) === 'ln') {
            $tokens[] = 'ln';
            $i += 2;
            continue;
        }

        if ($ch === 'l' && substr($expr, $i, 3) === 'log') {
            $tokens[] = 'log';
            $i += 3;
            continue;
        }

        if ($ch === '√') {
            $tokens[] = 'sqrt';
            $i++;
            continue;
        }

        if ($ch === 'π') {
            $tokens[] = 'pi';
            $i++;
            continue;
        }

        if ($ch === 'e') {
            $tokens[] = 'e';
            $i++;
            continue;
        }

        if ($ch === '!') {
            $tokens[] = '!';
            $i++;
            continue;
        }

        $tokens[] = $ch;
        $i++;
    }

    if ($num !== '') {
        $tokens[] = $num;
    }

    return $tokens;
}

function parse($tokens) {
    $i = 0;
    return expr($tokens, $i);
}

function expr($t, &$i) {
    $result = term($t, $i);

    while ($i < count($t)) {

        $op = $t[$i];

        if ($op != '+' && $op != '-') break;

        $i++;

        $right = term($t, $i);

        if ($op == '+') $result += $right;
        else $result -= $right;
    }

    return $result;
}

function term($t, &$i) {

    $result = factor($t, $i);

    while ($i < count($t)) {

        if (!isset($t[$i])) break;

        $op = $t[$i];

        if ($op == '**') {
            $i++;
            $result = pow($result, factor($t, $i));
            continue;
        }

        if ($op != '*' && $op != '/') break;

        $i++;

        $right = factor($t, $i);

        if ($op == '*') $result *= $right;
        else $result /= $right;
    }

    return $result;
}

function factor($t, &$i) {

    $token = $t[$i] ?? null;

    if ($token === null) return 0;


    if ($token === '-') {
        $i++;
        return -factor($t, $i);
    }


    if ($token === '(') {
        $i++;
        $result = expr($t, $i);


        if (isset($t[$i]) && $t[$i] === ')') {
            $i++;
        }


        if (isset($t[$i]) && $t[$i] === '!') {
            $i++;
            return factorial($result);
        }

        return $result;
    }

    if ($token === 'pi') {
        $i++;
        return pi();
    }

    if ($token === 'e') {
        $i++;
        return exp(1);
    }

    if ($token === 'sqrt') {
        $i++;
        return sqrt(factor($t, $i));
    }

    if ($token === 'ln') {
        $i++;
        return log(factor($t, $i));
    }

    if ($token === 'log') {
        $i++;
        return log10(factor($t, $i));
    }

    elseif (is_numeric($token)) {
        $i++;
        $result = (float)$token;
    }


    else {
        $i++;
        return 0;
    }


    if (isset($t[$i]) && $t[$i] === '!') {
        $i++;
        return factorial($result);
    }

    return $result;
}
?>