<?php
declare(strict_types=1);

// Show all errors for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Correct paths to db files
require __DIR__ . '/../../db/app.php';
require __DIR__ . '/../../db/database.php';

session_start();

// Only admin can access
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ' . BASE_URL . '/auth/login.php');
    exit;
}

// Optional flash message after creating an incident
$successMsg = $_SESSION['incident_success'] ?? null;
unset($_SESSION['incident_success']);

// Fetch all incidents with customer and product info
$stmt = $pdo->query("
    SELECT i.incidentID, i.title, i.description, i.dateOpened, i.dateClosed,
           c.firstName, c.lastName,
           p.name AS productName, p.productCode
    FROM incidents i
    JOIN customers c ON i.customerID = c.customerID
    JOIN products p ON i.productCode = p.productCode
    ORDER BY i.dateOpened DESC
");
$incidents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>View Incidents</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>All Incidents</h2>

    <?php if ($successMsg): ?>
        <div class="alert alert-success"><?= htmlspecialchars($successMsg) ?></div>
    <?php endif; ?>

    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date Opened</th>
                <th>Date Closed</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($incidents)): ?>
            <tr>
                <td colspan="7" class="text-center">No incidents found.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($incidents as $incident): ?>
                <tr>
                    <td><?= $incident['incidentID'] ?></td>
                    <td><?= htmlspecialchars($incident['firstName'] . ' ' . $incident['lastName']) ?></td>
                    <td><?= htmlspecialchars($incident['productName']) ?></td>
                    <td><?= htmlspecialchars($incident['title']) ?></td>
                    <td><?= htmlspecialchars($incident['description']) ?></td>
                    <td><?= $incident['dateOpened'] ?></td>
                    <td><?= $incident['dateClosed'] ?? '-' ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

    <a href="create_incident.php" class="btn btn-primary">Create New Incident</a>
    <a href="<?= BASE_URL ?>/auth/logout.php" class="btn btn-secondary">Logout</a>
</div>

</body>
</html>
