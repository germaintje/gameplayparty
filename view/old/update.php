<?php include 'header.php'; ?>
<?php
echo '<form action="?op=update" method="POST">
    <legend>CREATE NEW CONTACT</legend>
    <label>name: </label><input type="text" name="name">
    <label>phone: </label><input type="text" name="phone">
    <label>email: </label><input type="text" name="email">
    <label>address: </label><input type="text" name="address">
    <button type="submit" name="submit">submit</button>
</form>';
?>
<?php include 'footer.php'; ?>