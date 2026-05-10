<?php
$artikel = [
    "html" => "Belajar HTML Pertama",
    "error" => "Error Pertama"
];

$quotes = [
    "Jangan menyerah!",
    "Coding itu proses",
    "Error adalah teman belajar"
];

$pilih = isset($_GET['post']) ? $_GET['post'] : null;
?>

<h2>Blog Developer</h2>

<ul>
<?php
foreach($artikel as $key => $judul){
    echo "<li><a href='?post=$key'>$judul</a></li>";
}
?>
</ul>

<?php
if($pilih){
    echo "<h3>".$artikel[$pilih]."</h3>";
    echo "<p>Tanggal: ".date("Y-m-d")."</p>";
    echo "<p>Ini pengalaman belajar coding pertama saya...</p>";
    echo "<img src='img/sample.jpg' width='200'><br>";
    echo "<i>".$quotes[array_rand($quotes)]."</i>";
}
?>

<br>
<a href="timeline.php">Kembali ke Timeline</a>