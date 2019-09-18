<?php include 'header.php'; ?>
    <a href="index.php?op=read&id=1">klik voor id 1</a>
<?php
while($row = $contacts->fetch(PDO::FETCH_ASSOC)){
    var_dump($row);
    echo "<br>";
}
?>

<?php include 'footer.php'; ?>