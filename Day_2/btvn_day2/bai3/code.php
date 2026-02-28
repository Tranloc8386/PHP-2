<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài tập Modal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="text-center mb-4">Bài 1</h3>

    <div class="row">
        <?php for($i = 1; $i <= 4; $i++) { ?>
            <div class="col-md-3">
                <div class="card text-center">
                    <img src="image/<?php echo $i; ?>.jpg" 
                         class="card-img-top" 
                         style="height:150px; object-fit:cover;">

                    <div class="card-body">
                        <h5>Hình ảnh <?php echo $i; ?></h5>

                        <!-- Button -->
                        <button class="btn btn-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#modal<?php echo $i; ?>">
                            View
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal<?php echo $i; ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                Modal Hình ảnh <?php echo $i; ?>
                            </h5>
                            <button type="button" 
                                    class="btn-close" 
                                    data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-center">
                            <img src="image/<?php echo $i; ?>.jpg" 
                                 class="img-fluid">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" 
                                    data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>