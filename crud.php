<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Details</title>
    <link rel="shortcut icon" href="https://img.icons8.com/parakeet-line/48/globe.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between mt-4">
            <div>
                <h1>Selling Details </h1>
            </div>
            <div>
                <a href="create.php" class="btn btn-warning text-light text-decoration-none"><i
                        class="bi bi-plus-circle-fill"></i> Add Company Details</a>
            </div>
        </div>
        <?php 
             require "db.php";
            if (isset($_POST['update'])){
                try {
                    $name = $_POST['company_name'];
                    $companyId = $_POST['company_id'];
                    $date = $_POST['date'];
                    $closed = $_POST['closed'];
                    $open = $_POST['open'];
                    
                    $high = $_POST['high'];
                    $low = $_POST['low'];
                    $sql = "UPDATE companies SET name = :name WHERE id = :id;";
                    $stmt = $db->prepare($sql);
                    $stmt->execute(["name" => $name, "id" => $companyId]);
                    $sell_id = $_POST['id'];
                    $sqlQueryTwo = "UPDATE sell_details SET company_name_id = :companyid, date = :date, closed = :closed, open = :open, high = :high, low = :low WHERE id = :id;";
                    $stmtTwo = $db->prepare($sqlQueryTwo);
                    $stmtTwo->execute(["companyid" => $companyId, "date" => $date, "closed" => $closed,  "open" => $open, "high" => $high, "low" => $low, "id" => $sell_id]); ?>
                    <div class="alert alert-success d-flex justify-content-between" role="alert">
                        <div>
                        Updated Successfully
                        </div>
                        <div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                </div>
    <?php            } catch (\Throwable $th) { ?>
                    <div class="alert alert-danger d-flex justify-content-between" role="alert">
                        <div>
                            Error: <?php echo $th->getMessage(); ?>
                        </div>
                        <div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    
                    </div>
          <?php }
            }
            if (isset($_POST['delete'])) {
                try {
                    $deleteId = $_POST['delete_id'];
                    $deleteSql = "DELETE FROM sell_details WHERE id = :id;";
                    $stmtDelete = $db->prepare($deleteSql);
                    $stmtDelete->execute(["id" => $deleteId]); ?>
                    <div class="alert alert-success" role="alert">
                        Deleted Successfully
                    </div>
              <?php  } catch (\Throwable $th) { ?>
                    <div class="alert alert-danger" role="alert">
                        Error: <?php echo $th->getMessage(); ?>
                    </div>
            <?php    }
            }
        ?>

        <table class="table table-collapse table-warning mt-3 table-bordered border-warning table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Company Name</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Open</th>
                    <th>High</th>
                    <th>Low</th>
                    <th>Average</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php
           

            try {
                $sql = "SELECT A.name,B.id,B.company_name_id,B.date, B.closed, B.open, B.high, B.low FROM companies as A join sell_details as B on A.id = B.company_name_id";
                $stmt = $db->query($sql);
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <tbody>
                    <?php
                    if ($rows) {
                        $i = 0;
                        foreach ($rows as $row) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['closed']; ?></td>
                                <td><?php echo $row['open']; ?></td>
                                <td><?php echo $row['high']; ?></td>
                                <td><?php echo $row['low']; ?></td>
                                <td>
                                    <?php
                                    $total = $row['high'] + $row['low'];
                                    $average = $total / 2;
                                    echo $average;
                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-evenly">
                                        <div>
                                            <a href="" class="btn btn-success text-decoration-none" data-bs-toggle="modal"
                                                data-bs-target="#editModal<?php echo $row['id']; ?>"><i class="bi bi-pen"></i></a>
                                            <div class="modal fade" id="editModal<?php echo $row['id']; ?>" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Company</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                <input type="hidden" class="input mb-3" value="<?php echo $row['company_name_id'];?>" name="company_id" id="company-id">
                                                                <input type="hidden" class="input mb-3" value="<?php echo $row['id'];?>" name="id" id="id">
                                                                <label class="label text-warning mb-3">Company Name</label>
                                                                <input type="text" class="input mb-3" id="company-name"
                                                                    name="company_name" value="<?php echo $row['name']; ?>" required>
                                                                <label class="label text-warning mb-3">Date</label>
                                                                <input type="date" class="input mb-3" id="date" name="date" value="<?php echo $row['date']; ?>"
                                                                    required>
                                                                <label class="label text-warning mb-3">Closed</label>
                                                                <input type="text" class="input mb-3" id="closed" name="closed"
                                                                   value="<?php echo $row['closed']; ?>" required>
                                                                <label class="label text-warning mb-3">Open</label>
                                                                <input type="text" class="input mb-3" id="open" name="open"
                                                                   value="<?php echo $row['open']; ?>" required>
                                                                <label class="label text-warning mb-3">High</label>
                                                                <input type="text" class="input mb-3" id="high" name="high"
                                                                   value="<?php echo $row['high']; ?>" required>
                                                                <label class="label text-warning mb-3">Low</label>
                                                                <input type="text" class="input mb-3" id="low" name="low" value="<?php echo $row['low']; ?>" required>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" name="update">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <!-- <a href="delete.php" class="btn btn-danger text-decoration-none"><i class="bi bi-trash"></i></a> -->
                                            <form action="" onsubmit="return confirm('Are you sure to delete?');" method="post"><input type="hidden" value="<?php echo $row['id']; ?>" name="delete_id"> <button type="submit"  class="btn btn-danger" name="delete"><i class="bi bi-trash"></i></button></form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }

            } catch (PDOException $th) {
                echo "Error: " . $th->getMessage();
            }
            ?>
            </tbody>
        </table>
    </div>

</body>

</html>