<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
    </head>
    <body>
        <header>
            <?php require 'view/common/header.php'; ?>
        </header>
        <article>
            
            <?php echo $content ; ?>
        </article>
        <footer>
            <?php require 'view/common/footer.php'; ?>
        </footer>
    </body>
</html>