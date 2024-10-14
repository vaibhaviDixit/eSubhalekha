<?php

errors(1);

require_once __DIR__ . '/../../../controllers/vendor/autoload.php';

if (isset($_REQUEST['id'])) {
    $currentUser = App::getUser();

    $weddingID = $_REQUEST['id'];

    controller("Payment");
    $payment = new Payment();

    controller("Wedding");
    $wedding = new Wedding();

    $getPayment = $payment->getPaymentByID($weddingID, $currentUser['userID']);
    $weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);
    $template = $weddingData['template'];
    $themeName = ucwords(explode("_", $template)[0]);
    $themeDetails = json_decode(file_get_contents('themes/' . $template . '/manifest.json'), true);
    $themePrice = $themeDetails['themePrice'];
} else {
    return;
}

// Create an instance of mPDF
$mpdf = new \Mpdf\Mpdf();

// Start buffering to generate the HTML content
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Plan Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        h2, h3 {
            text-align: center;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .text-end {
            text-align: right;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>eSubhalekha.com</h2>
    <h3>Invoice</h3>
    <div>
        <p><strong>Invoice:</strong> <?= $getPayment['paymentID']; ?></p>
        <p><strong>Paid At:</strong> <?= $getPayment['paidAt']; ?></p>
        <p><strong>Wedding ID:</strong> <?= $getPayment['weddingID']; ?></p>
    </div>
    <div>
        <p><strong>Name:</strong> <?= $currentUser['name']; ?></p>
        <p><strong>Email:</strong> <?= $currentUser['email']; ?></p>
        <p><strong>Phone:</strong> <?= $currentUser['phone']; ?></p>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Details</th>
            <th class="text-end">Amount</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Wedding Theme</td>
            <td class="text-end"><?= $themeName; ?></td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td class="text-end"><strong>Total</strong></td>
            <td class="text-end total"><?= $themePrice; ?> &#8377;</td>
        </tr>
        </tfoot>
    </table>
</div>

</body>
</html>

<?php
// Get the content from the buffer and clean it
$html = ob_get_clean();

// Write the HTML content to the PDF
$mpdf->WriteHTML($html);

// Output the PDF as a downloadable file
$mpdf->Output('wedding-invoice.pdf', 'D');
