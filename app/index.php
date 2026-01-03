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

<h2>URL Shortener</h2>

<form method="post">
    <input type="url" name="url" placeholder="Masukkan URL" required>
    <button>Shorten</button>
</form>

<?php if (isset($shortUrl)) echo "<p>Short URL: <a href='$shortUrl'>$shortUrl</a></p>"; ?>
