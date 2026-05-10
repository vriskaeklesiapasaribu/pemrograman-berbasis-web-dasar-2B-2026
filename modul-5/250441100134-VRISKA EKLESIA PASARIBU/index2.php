<?php
$timeline = [
    "2019" => "Masuk SMA",
    "2020" => "Belajar HTML",
    "2021" => "Belajar CSS",
    "2022" => "Belajar PHP",
    "2023" => "Project pertama"
];

function highlight($tahun){
    if($tahun == "2022"){
        return "<b style='color:red'>$tahun</b>";
    }
    return $tahun;
}
?>

<h2>Timeline Belajar Coding</h2>

<ul>
<?php
foreach($timeline as $tahun => $kegiatan){
    echo "<li>".highlight($tahun)." - $kegiatan</li>";
}
?>
</ul>

<a href="index.php">Kembali ke Profil</a>
<a href="blog.php">Ke Blog</a>