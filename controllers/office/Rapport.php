<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!$_SESSION['role']) {
    header('location: /login');
    exit; 
}

require __DIR__ . '/../../vendor/autoload.php';

use Dompdf\Dompdf;

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


    $office = $db->query("SELECT * FROM local WHERE id_local = :id_local", [
        'id_local' => $_POST['id_local']
    ])->get(); 

    $office_name =$db->query("SELECT name FROM local WHERE id_local = :id_local", [
        'id_local' => $_POST['id_local']
    ])->fetchColumn();

    // Fetch the equipment list for the selected office
    $equipmentsoffice = $db->query("
        SELECT localequipment.*, equipment.name AS equipment_name, equipment.Referance as ref_equipment ,localequipment.status as status
        FROM localequipment
        JOIN equipment ON localequipment.id_equipment = equipment.id_equipment
        WHERE localequipment.id_local = :id_local
    ", [
        'id_local' => $_POST['id_local']
    ])->get(); 

    // Create a new Dompdf instance
    $dompdf = new Dompdf();
        foreach ($office as $b) {
    // Generate the PDF content
    $html = '<h1>Liste des equipment ' . $b['name'] . '</h1>'; // Include office name in the heading
    $html .= '<ul>'; // Start a list for equipment
    }
    foreach ($equipmentsoffice as $equipment) {
        // List each equipment item
        $html .= '<li>' . $equipment['equipment_name'] . ' (' . $equipment['ref_equipment'] . ') , Condition : ('. $equipment['status'] .' )</li>';
    }
    $html .= '</ul>'; // Close the list

    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the PDF
    $dompdf->render();

    // Output the PDF as a download
    $fileName = 'ficheImmo_' . $office_name . '.pdf'; // Construct the file name with the office name

    $dompdf->stream($fileName, ['Attachment' => true]);

    
    exit; 