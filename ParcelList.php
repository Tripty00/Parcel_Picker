<?php
include 'Connection.php';

// Update the post status if the form is submitted
if (isset($_POST['update_status'])) {
    $ordersid = $_POST['ordersid'];
    $updateQuery = "UPDATE orders SET status='received' WHERE ordersid='$ordersid'";
    mysqli_query($conn, $updateQuery);
}

// Handle picking the order
if (isset($_POST['pick_order'])) {
    $ordersid = $_POST['ordersid'];
    $updateQuery = "UPDATE orders SET status='Picked' WHERE ordersid='$ordersid'";
    mysqli_query($conn, $updateQuery);
}

// Delete the post if the delete form is submitted
if (isset($_POST['delete_post'])) {
    $ordersid = $_POST['ordersid'];
    $deleteQuery = "DELETE FROM orders WHERE ordersid='$ordersid'";
    mysqli_query($conn, $deleteQuery);
}

// Handle search query
$searchQuery = '';
if (isset($_POST['search'])) {
    $searchInput = mysqli_real_escape_string($conn, $_POST['search_input']);
    $searchQuery = "WHERE senderAddress LIKE '%$searchInput%' OR receiverAddress LIKE '%$searchInput%' OR ordersid LIKE '%$searchInput%'";
}
$postQuery = "SELECT * FROM orders $searchQuery";
$post = mysqli_query($conn, $postQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Parcel List</title>
    <style>
        /* Hover effect for table rows */
        tr[data-bs-toggle="modal"]:hover {
            background-color: #CBC3E3;
            cursor: pointer;
            transition: all 0.3s ease;
            transform: scale(1.02);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body style="background: url(img7.jpeg); background-repeat:no-repeat; background-size:100%">
    <!-- Navbar -->
    <?php include 'Header2.php'; ?>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSearch"></div>
        </div>
    </nav>
    <!-- Search Form -->
    <div class="container mt-3">
        <form method="post" class="d-flex">
            <input class="form-control me-2" type="search" name="search_input" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
        </form>
    </div>
    <!-- Tabs Section -->
    <section class="tabs-section">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="general-info-tab" data-bs-toggle="tab" data-bs-target="#general-info" type="button" role="tab" aria-controls="general-info" aria-selected="true">Parcel List</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general-info" role="tabpanel" aria-labelledby="general-info-tab">
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Sender Address</th>
                                <th scope="col">Receiver Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($post)): ?>
                                <tr data-bs-toggle="modal" data-bs-target="#generalModal<?php echo $row['ordersid']; ?>">
                                    <td><?php echo $row['ordersid']; ?></td>
                                    <td><?php echo $row['senderAddress']; ?></td>
                                    <td><?php echo $row['receiverAddress']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <!-- Form to pick the order -->
                                        <form method="post" style="display:inline;">
                                            <input type="hidden" name="ordersid" value="<?php echo $row['ordersid']; ?>">
                                            <button type="submit" name="pick_order" class="btn btn-primary btn-sm">Pick</button>
                                        </form>
                                        <form method="post" style="display:inline;">
                                            <input type="hidden" name="ordersid" value="<?php echo $row['ordersid']; ?>">
                                            <button type="submit" name="delete_post" class="btn btn-success btn-sm">Done</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- General Modal -->
                                <div class="modal fade" id="generalModal<?php echo $row['ordersid']; ?>" tabindex="-1" aria-labelledby="generalModalLabel<?php echo $row['ordersid']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="generalModalLabel<?php echo $row['ordersid']; ?>">Orders Info</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Order Id:</strong> <?php echo $row['ordersid']; ?></p>
                                                <p><strong>Sender Name:</strong> <?php echo $row['senderName']; ?></p>
                                                <p><strong>Sender Phone Number:</strong> <?php echo $row['senderPhone']; ?></p>
                                                <p><strong>Sender Address:</strong> <?php echo $row['senderAddress']; ?></p>
                                                <p><strong>Receiver Name:</strong> <?php echo $row['receiverName']; ?></p>
                                                <p><strong>Receiver Phone Number:</strong> <?php echo $row['receiverPhone']; ?></p>
                                                <p><strong>Receiver Address:</strong> <?php echo $row['receiverAddress']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $row['ordersid']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $row['ordersid']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?php echo $row['ordersid']; ?>">Confirm Delivery status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure you delivered the parcel?</div>
                                            <div class="modal-footer">
                                                <form method="post" action="">
                                                    <input type="hidden" name="ordersid" value="<?php echo $row['ordersid']; ?>">
                                                    <button type="submit" name="delete_post" class="btn btn-danger">Yes</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
