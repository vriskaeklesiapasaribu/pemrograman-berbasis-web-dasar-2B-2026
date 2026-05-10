<?php
function tampilkanData($data) {
    echo "<table border='1'>";
    foreach ($data as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "</table>";
}
?>

<h2>Profil Interaktif Developer Pemula</h2>

<table border="1">
<tr><td>Nama</td><td>Vriskapasaribu</td></tr>
<tr><td>ID Developer</td><td>DEV001</td></tr>
<tr><td>Kota/Tgl Lahir</td><td>Surabaya, 2005</td></tr>
<tr><td>Email</td><td>email@gmail.com</td></tr>
<tr><td>No WA</td><td>08123456789</td></tr>
</table>

<h3>Form Input</h3>

<form method="POST">
Framework: <input type="text" name="framework"><br><br>

Pengalaman:<br>
<textarea name="pengalaman"></textarea><br><br>

Tools:<br>
<input type="checkbox" name="tools[]" value="VS Code">VS Code
<input type="checkbox" name="tools[]" value="GitHub">GitHub
<input type="checkbox" name="tools[]" value="Figma">Figma<br><br>

Minat:
<input type="radio" name="minat" value="Frontend">Frontend
<input type="radio" name="minat" value="Backend">Backend<br><br>

Skill:
<select name="skill">
<option>Dasar</option>
<option>Cukup</option>
<option>Profesional</option>
</select><br><br>

<input type="submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])){
    if(empty($_POST['framework']) || empty($_POST['pengalaman'])){
        echo "Semua input wajib diisi!";
    } else {
        $framework = explode(",", $_POST['framework']);

        if(count($framework) > 2){
            echo "<p>Skill Anda cukup luas di bidang development!</p>";
        }

        $data = [
            "Framework" => implode(", ", $framework),
            "Tools" => implode(", ", $_POST['tools']),
            "Minat" => $_POST['minat'],
            "Skill" => $_POST['skill']
        ];

        tampilkanData($data);

        echo "<p>Pengalaman: ".$_POST['pengalaman']."</p>";
    }
}
?>