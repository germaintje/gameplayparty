<!-- include header -->
<?php include 'view/header.html'; ?>

<!-- include table navigation -->
<div class='row col-xs-12 tableNav'>
    <div class='col-xs-5 float-l'>
        <a class='generatedTableButton ' href='index.php?op=create'> <i class='buttonIconColor fas fa-plus'></i> Create</a>
    </div>
    <?php include 'view/tableNavSearch.html'; ?>
</div>

<!-- set main and footer -->
<div style='padding-bottom: 5px' class='wrapper--generateTable'>
    <?php echo $content;?>
</div>

<?php
if ( isset($pagination) ) {
    echo $pagination;
}
include 'view/footer.html';
?>
