<?php
include 'db.php';

header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"));

if (isset($data->target)) {
    $target = $data->target;

    // Siapkan dan eksekusi query untuk menyimpan nomor T
    $stmt = $pdo->prepare("INSERT INTO targets (nomor_t) VALUES (:target)");
    $stmt->bindParam(':target', $target);

    try {
        $stmt->execute();
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Target tidak valid.']);
}
?>
