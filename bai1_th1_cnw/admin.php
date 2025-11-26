<?php include 'flower.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị danh sách hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .thumb-img { width: 80px; height: 80px; object-fit: cover; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Quản lý danh sách hoa</h2>
            <button class="btn btn-success"><i class="fas fa-plus"></i> Thêm mới</button>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên hoa</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col" class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($flowers as $index => $flower): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td class="fw-bold"><?php echo $flower['name']; ?></td>
                            <td><?php echo $flower['description']; ?></td>
                            <td>
                                <img src="<?php echo $flower['image']; ?>" class="thumb-img" alt="<?php echo $flower['name']; ?>">
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary btn-sm me-1"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>