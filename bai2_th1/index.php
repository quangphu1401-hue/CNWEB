<?php
// Đọc file câu hỏi
$filename = "Quiz.txt";
$questions = []; // Mảng chứa các câu hỏi

if (file_exists($filename)) {
    $file_content = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    $current_question = [];
    foreach ($file_content as $line) {
        if (strpos($line, "ANSWER:") === 0) {
            // Nếu gặp dòng bắt đầu bằng "ANSWER:" -> Lưu đáp án đúng và kết thúc câu hỏi này
            $current_question['answer'] = trim(substr($line, 7)); // Lấy chữ cái sau chữ "ANSWER: "
            $questions[] = $current_question; // Thêm vào mảng tổng
            $current_question = []; // Reset chuẩn bị cho câu mới
        } elseif (preg_match('/^[A-D]\./', $line)) {
            // Nếu dòng bắt đầu bằng A., B., C., D. -> Là đáp án lựa chọn
            $current_question['options'][] = $line;
        } else {
            // Còn lại là nội dung câu hỏi
            $current_question['question'] = $line;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm Android</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <h1 class="text-center text-primary mb-4">Bài thi trắc nghiệm</h1>
        
        <form action="result.php" method="POST">
            <?php foreach ($questions as $index => $question): ?>
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <strong>Câu <?php echo $index + 1; ?>: </strong> <?php echo $question['question']; ?>
                    </div>
                    <div class="card-body">
                        <?php foreach ($question['options'] as $option): ?>
                            <?php 
                                // Tách lấy ký tự A, B, C, D để làm value cho input
                                $answer_key = substr($option, 0, 1); 
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" 
                                       name="question_<?php echo $index; ?>" 
                                       value="<?php echo $answer_key; ?>" 
                                       id="q<?php echo $index; ?>_<?php echo $answer_key; ?>">
                                <label class="form-check-label" for="q<?php echo $index; ?>_<?php echo $answer_key; ?>">
                                    <?php echo $option; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <button type="submit" class="btn btn-primary btn-lg w-100">Nộp bài</button>
        </form>
    </div>
</body>
</html>