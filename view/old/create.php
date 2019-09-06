<?php include 'header.php'; ?>

<form action="?op=create" method="POST">
    <legend>CREATE NEW CONTACT</legend>
    <label>Id: </label><input type="text" name="product_id">
    <label>Product type code: </label><input type="text" name="product_type_code">
    <label>Supplier id: </label><input type="text" name="supplier_id">
    <label>Product name: </label><input type="text" name="product_name">
    <label>Product price: </label><input type="text" name="product_price">
    <label>Other product details: </label><input type="text" name="other_product_details">
    <button type="submit" name="submit">submit</button>
</form>

<?php include 'footer.php'; ?>