<?php
function base32Decode($base32) {
    $base32Chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    $bytes = [];
    $buffer = 0;
    $bitsLeft = 0;

    for ($i = 0; $i < strlen($base32); $i++) {
        $value = strpos($base32Chars, strtoupper($base32[$i]));
        if ($value === false) continue;
        $buffer = ($buffer << 5) | $value;
        $bitsLeft += 5;

        if ($bitsLeft >= 8) {
            $bytes[] = ($buffer >> ($bitsLeft - 8)) & 0xff;
            $bitsLeft -= 8;
        }
    }
    return $bytes;
}

function hmacSha1($key, $message) {
    return hash_hmac('sha1', $message, $key, true);
}

function generateTotp($secret) {
    $timeStep = floor(time() / 30);
    $secretBytes = base32Decode($secret);
    $key = pack('C*', ...$secretBytes);
    $timeBuffer = pack('N', $timeStep);
    $hmac = hmacSha1($key, str_pad($timeBuffer, 8, "\0", STR_PAD_LEFT));

    $offset = ord($hmac[19]) & 0xf;
    $otp = (ord($hmac[$offset]) & 0x7f) << 24 |
           (ord($hmac[$offset + 1]) & 0xff) << 16 |
           (ord($hmac[$offset + 2]) & 0xff) << 8 |
           (ord($hmac[$offset + 3]) & 0xff);

    return str_pad($otp % 1000000, 6, '0', STR_PAD_LEFT);
}

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$secret = $data['secretKey'] ?? '';

if (!empty($secret)) {
    $otp = generateTotp($secret);
    echo json_encode(['status' => 'success', 'code' => $otp]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid secret.']);
}
exit;
?>
