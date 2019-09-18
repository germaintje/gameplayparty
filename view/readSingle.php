<!-- include header -->
<?php include 'view/header.html'; ?>

<!-- include table navigation -->
<div class='row col-xs-12'>
    <div class='col-xs-5 float-l'>
        <a class='generatedTableButton' href='index.php?op=create'> <i class='buttonIconColor fas fa-plus'></i> Create</a>
        <a class='generatedTableButton' href='index.php?op=read'> <i class='buttonIconColor fas fa-book'></i> Read All</a>
    </div>
    <?php include 'view/tableNavSearch.html'; ?>
</div>

<!-- Include table and footer -->
<div style='padding-bottom: 5px' class='col-xs-12 wrapper--generateTable'>
    <?php echo $content;?>
</div>

<?php
if (isset($pagination) ) {
    echo $pagination;
}
include 'view/footer.html';?>
