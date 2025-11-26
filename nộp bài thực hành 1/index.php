<?php include 'flower.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách các loài hoa đẹp</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #333; }
        .flower-item { display: flex; border-bottom: 1px solid #eee; padding: 15px 0; align-items: flex-start; }
        .flower-item:last-child { border-bottom: none; }
        .flower-item img { width: 150px; height: 100px; object-fit: cover; border-radius: 5px; margin-right: 20px; }
        .flower-info h3 { margin: 0 0 10px; color: #2c3e50; }
        .flower-info p { margin: 0; color: #555; }
        /* Responsive cho mobile */
        @media (max-width: 600px) {
            .flower-item { flex-direction: column; }
            .flower-item img { width: 100%; height: auto; margin-bottom: 10px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>14 loại hoa tuyệt đẹp thích hợp trồng dịp xuân hè</h1>
        
        <?php foreach ($flowers as $flower): ?>
            <div class="flower-item">
                <img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>">
                <div class="flower-info">
                    <h3><?php echo $flower['name']; ?></h3>
                    <p><?php echo $flower['description']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
</body>
</html>