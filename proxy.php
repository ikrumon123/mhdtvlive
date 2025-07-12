
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$url = 'https://raw.githubusercontent.com/drmlive/fancode-live-events/main/fancode.json';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$result = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpcode == 200) {
    echo $result;
} else {
    http_response_code($httpcode);
    echo json_encode(['error' => 'Failed to fetch data']);
}
?>
