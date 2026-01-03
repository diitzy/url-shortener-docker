<?php
$dataFile = "data.json";
$data = json_decode(file_get_contents($dataFile), true);

if (isset($_POST['url'])) {
    $code = substr(md5(time()), 0, 6);
    $data[$code] = $_POST['url'];
    file_put_contents($dataFile, json_encode($data));
    $shortUrl = "http://localhost:8082/r/$code";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <h2>URL Shortener</h2>

    <form method="post">
        <input type="url" name="url" placeholder="Masukkan URL" required>
        <button>Shorten</button>
    </form>

    <?php if (isset($shortUrl)): ?>
        <div class="result">
            Short URL:
            <a href="<?php echo $shortUrl; ?>" target="_blank">
                <?php echo $shortUrl; ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="footer">
        © <?php echo date("Y"); ?> Muhammad Aditya Saputra (1124160009)
    </div>
</div>

</body>
</html>
