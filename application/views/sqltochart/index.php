<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='//<?=base_url();?>asset/css/bootstrap.min.css'>
        <link rel='stylesheet' href='//<?=base_url();?>asset/css/jquery-ui.css'>
        <link rel='stylesheet' href='//<?=base_url();?>asset/css/jquery-ui-timepicker-addon.css'>
        <script src='//<?=base_url();?>asset/js/jquery-1.9.1.js'></script>
        <script src='//<?=base_url();?>asset/js/bootstrap.min.js'></script>
        <script src='//<?=base_url();?>asset/js/jquery-ui.js'></script>
        <script src='//<?=base_url();?>asset/js/jquery-ui-timepicker-addon.js'></script>
    </head>
    <body>
        <div class='container'>
            <h2><?=$title;?></h2>
            <a class='btn btn-success' href='//<?=base_url();?>sqltochart/add'>Add</a>
            <?=$table;?>
        </div>
    </body>
</html>
    
