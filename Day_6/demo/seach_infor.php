<?php
$searchResult = null;
$searchKeyword = '';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['keyword'])) {

 $searchKeyword = trim($_GET['keyword'] ?? '');
    if ($searchKeyword !== '') {
        //kiem tra  cookie " user" 
        if (isset($_COOKIE['user'])) {
            $savedUser = json_decode($_COOKIE['user'], true);

            //so sanh username(khon phan biet hoa thuong)
            if (strtolower($savedUser["username"]) === strtolower($searchKeyword)) {
                $searchResult = $savedUser;
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h2 class="text-center mb-4">Tìm kiếm thông tin tài khoản</h2>

    <!-- Form tìm kiếm - method GET -->
    <form method="GET" class="mb-4">
        <div class="input-group">
            <input 
                type="text" 
                name="keyword" 
                class="form-control"
                placeholder="Nhập tên đăng nhập để tìm..."
                value="<?= htmlspecialchars($searchKeyword ?? '') ?>" 
                required
            >
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <!-- Kết quả tìm kiếm -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['keyword'])): ?>
        <div class="result-box <?= $searchResult ? 'found' : 'not-found' ?>">
            
            <?php if ($searchResult): ?>
                <h4 class="text-success">Tìm thấy tài khoản!</h4>

                <table class="table table-bordered">
                    <tr>
                        <th>Tên đăng nhập</th>
                        <td><?= htmlspecialchars($searchResult['username']) ?></td>
                    </tr>

                    <tr>
                        <th>Mật khẩu (đã mã hóa)</th>
                        <td><?= htmlspecialchars($searchResult['password']) ?></td>
                    </tr>

                    <tr>
                        <th>Thời gian lưu cookie</th>
                        <td><?= date('d/m/Y H:i:s', $_COOKIE['user_time'] ?? time()) ?></td>
                    </tr>
                </table>

            <?php else: ?>
                <h4 class="text-danger">Không tìm thấy tài khoản nào!</h4>

                <p>
                    Không có tài khoản nào khớp với 
                    <strong><?= htmlspecialchars($searchKeyword) ?></strong>
                </p>

                <p>
                    Vui lòng kiểm tra lại tên đăng nhập hoặc 
                    <a href="register.php">đăng ký mới</a>.
                </p>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</div>
</body>
</html>