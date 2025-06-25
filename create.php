<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Company Details</title>
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
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="crud.php">Home</a></li>
                <li class="breadcrumb-item text-light active" aria-current="page">Create Company</li>
            </ol>
        </nav>
        <?php
        require "db.php";
        if (isset($_POST['submit'])) {
            try {
                $company_name = $_POST['company_name'];
                $date = $_POST['date'];
                $closed = $_POST['closed'];
                $open = $_POST['open'];
                $high = $_POST['high'];
                $low = $_POST['low'];
                $insert = "INSERT INTO companies(name) VALUES(:name);";
                $stmt = $db->prepare($insert);
                $stmt->execute(["name" => $company_name]);
                $company_id = $db->lastInsertId();
                $insertTwo = "INSERT INTO sell_details (company_name_id, date, closed, open, high, low) VALUES (:company_name_id, :date, :closed, :open, :high, :low);";
                $stmtTwo = $db->prepare($insertTwo);
                $stmtTwo->execute(["company_name_id" => $company_id, "date" => $date, "closed" => $closed, "open" => $open, "high" => $high, "low" => $low]); ?>
                <div class="alert alert-success d-flex justify-content-between" role="alert">
                    <div>
                        Inserted Successfully
                    </div>
                    <div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                </div>
            <?php } catch (PDOException $er) { ?>
                <div class="alert alert-danger" role="alert">
                    Error: <?php echo $er->getMessage(); ?>
                </div>
            <?php }
        }
        ?>



        <h2 class="text-warning mb-3"><i class="bi bi-plus-circle-fill"></i> Add Company Detail</h2>
        <form action="" method="post">
            <label class="label text-warning mb-3">Company Name</label>
            <input type="text" class="input mb-3" id="company-name" name="company_name" required>
            <label class="label text-warning mb-3">Date</label>
            <input type="date" class="input mb-3" id="date" name="date" required>
            <label class="label text-warning mb-3">Closed</label>
            <input type="text" class="input mb-3" id="closed" name="closed" required>
            <label class="label text-warning mb-3">Open</label>
            <input type="text" class="input mb-3" id="open" name="open" required>
            <label class="label text-warning mb-3">High</label>
            <input type="text" class="input mb-3" id="high" name="high" required>
            <label class="label text-warning mb-3">Low</label>
            <input type="text" class="input mb-3" id="low" name="low" required>
            <button class="btn btn-warning text-light" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>