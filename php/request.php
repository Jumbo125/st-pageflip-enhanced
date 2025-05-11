<?php
header('Content-Type: application/json');

// Parameter prüfen
if (!isset($_GET['do']) || $_GET['do'] !== 'get_img_files' || !isset($_GET['pfad'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Ungültige Anfrage']);
    exit;
}

$relativePath = $_GET['pfad']; // z.B. /src/turn_js_test/images
$absolutePath = $_SERVER['DOCUMENT_ROOT'] . $relativePath;

$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
$result = [];

if (is_dir($absolutePath)) {
    foreach (scandir($absolutePath) as $file) {
        $filePath = $absolutePath . DIRECTORY_SEPARATOR . $file;

        if (is_file($filePath)) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, $allowedExtensions)) {
                $result[] = $file; // Nur Dateinamen zurückgeben
            }
        }
    }

    echo json_encode($result);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Verzeichnis nicht gefunden']);
}
