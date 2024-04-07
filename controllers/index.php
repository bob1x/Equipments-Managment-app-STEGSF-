<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!$_SESSION['role']){
    header('location: /login');
}

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$mat_user = $_SESSION['mat_user'];
$placement = '';

// Check if 'placement' is set in $_GET
if (isset($_GET['placement'])) {
    $placement = $_GET['placement'];
}

// Use prepared statements to prevent SQL injection
$query = "SELECT localusers.*, local.name AS name, local.placement, local.image, users.name AS user_name
          FROM localusers
          JOIN local ON localusers.id_local = local.id_local
          JOIN users ON localusers.id_user = users.id_user
          WHERE localusers.mat_user = :mat_user";

$params = ['mat_user' => $mat_user];

// Add placement condition if 'placement' is set
if (!empty($placement)) {
    $query .= " AND local.placement = :placement";
    $params['placement'] = $placement;
    
}

$offices = $db->query($query, $params)->get();

// Fetch broken equipments
$brokenEquipments = $db->query("
    SELECT COUNT(*) as count, local.name as office_name
    FROM localequipment
    INNER JOIN local ON localequipment.id_local = local.id_local
    INNER JOIN localusers ON localequipment.id_local = localusers.id_local
    WHERE (localequipment.status = 'casse' OR localequipment.status = 'EnPanne')
    AND localusers.mat_user = :mat_user
    GROUP BY localequipment.id_local
", ['mat_user' => $mat_user])->get();


$offices = [];
$userAccess = [];
$officesCoords = []; // Initialize $officesCoords array
try {
    $mat_user = $_SESSION['mat_user'];

    // Fetch all offices
    $offices = $db->query(
        "SELECT id_local FROM local"
    )->get();

    $userAccess = $db->query('SELECT id_local as office_id FROM localusers WHERE mat_user = :mat_user', ['mat_user' => $mat_user])->get();

    // Define the office coordinates
    $officeCoordinates = [
   1=> [53, 10],
   2=> [37, 10],
   3=> [20, 10],
   4=> [20, 23],
   5=> [20, 30],
   6=> [20, 36],
   7=> [20, 42],
   8=> [20, 50],
   9=> [20, 57],
   10=>[20, 65]
    ];

    $imageUrl = '';
if ($placement === '1er ETAGE') {
  $imageUrl = 'OfficesSTEG/1erETAGE.png';
} else if ($placement === 'RDC') {
  $imageUrl = 'OfficesSTEG/RDC.png';
} else {
    $imageUrl = 'images/steg-nav.png';
}

    if($placement === '1er ETAGE'){
    if (!empty($userAccess)) {
        foreach ($userAccess as $access) {
            $officeId = $access['office_id'];
            if (isset($officeCoordinates[$officeId])) {
                $officesCoords[] = $officeCoordinates[$officeId];
            }
        }
    } else {
        echo "You don't have access to any office";
    }
}
} catch (Exception $e) {
    echo $e->getMessage();
}
// dd($userAccess);

$query = "SELECT localusers.*, local.name AS name, local.placement, local.image, users.name AS user_name
          FROM localusers
          JOIN local ON localusers.id_local = local.id_local
          JOIN users ON localusers.id_user = users.id_user
          WHERE localusers.mat_user = :mat_user";

$params = ['mat_user' => $mat_user];

$offices = $db->query($query, $params)->get();




view("home.views.php", [
    'heading' => 'Home',
    'offices' => $offices,
    'brokenEquipments' => $brokenEquipments,
    'officesCoords' => $officesCoords,
    'userAccess' => $userAccess,
    'imageUrl' => $imageUrl
]);
