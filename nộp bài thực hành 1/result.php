<?php
// Đọc lại file để lấy đáp án đúng (tương tự file index.php)
$filename = "Quiz.txt";
$questions = [];
if (file_exists($filename)) {
    $file_content = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $current_question = [];
    foreach ($file_content as $line) {
        if (strpos($line, "ANSWER:") === 0) {
            $current_question['answer'] = trim(substr($line, 7));
            $questions[] = $current_question;
            $current_question = [];
        } elseif (preg_match('/^[A-D]\./', $line)) {
            $current_question['options'][] = $line;
        } else {
            $current_question['question'] = $line;
        }
    }
}

$score = 0;
$total = count($questions);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả bài thi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h1>Kết quả bài làm</h1>
        </div>

        <?php
        foreach ($questions as $index => $question) {
            // Lấy đáp án người dùng chọn từ $_POST
            $userAnswer = isset($_POST['question_' . $index]) ? $_POST['question_' . $index] : '';
            $correctAnswer = $question['answer'];

            if ($userAnswer === $correctAnswer) {
                $score++;
                echo "<div class='alert alert-success'><strong>Câu " . ($index + 1) . ":</strong> Chính xác! Đáp án là $correctAnswer</div>";
            } else {
                echo "<div class='alert alert-danger'><strong>Câu " . ($index + 1) . ":</strong> Sai rồi! Bạn chọn '$userAnswer', đáp án đúng là '$correctAnswer'</div>";
            }
        }
        ?>

        <div class="alert alert-primary text-center mt-4">
            <h3>Tổng điểm: <?php echo $score; ?> / <?php echo $total; ?></h3>
            <a href="index.php" class="btn btn-dark mt-2">Làm lại</a>
        </div>
    </div>
</body>
</html>