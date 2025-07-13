<?php
include_once(__DIR__ . '/../Cores/Database.php');
include_once('../../Model/CheckpointsModel.php');


$db = new Database();
$conn = $db;
$model = new CheckpointsModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_checkpoint'])) {
  $id = $_POST['checkpoint_id'];
  $checked = $_POST['is_checked'];
  $notes = $_POST['notes'];
  $admin_id = 1; // nanti diganti dari $_SESSION jika sudah login
  $model->updateCheckpoint($id, $checked, $notes, $admin_id);
  header("Location: " . $_SERVER['PHP_SELF'] . "?trip_id=" . $_POST['trip_id']);
  exit;
}

$trip_id = $_GET['trip_id'] ?? 1;
$checkpoints = $model->getCheckpointsByTripId($trip_id);

$db->query("SELECT * FROM trips WHERE id = :trip_id");
$db->bind(':trip_id', $trip_id);
$trip = $db->single(); // ambil 1 baris trip

$checkedCheckpoints = 0;
foreach ($checkpoints as $c) {
  if ($c['is_checked']) {
    $checkedCheckpoints++;
  }
}