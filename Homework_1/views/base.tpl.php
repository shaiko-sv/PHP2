<!doctype html>
<html lang="<?= LANG?>">
<head>
    <meta charset="<?= CHARSET?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php echo $pageData['title']; ?></title>
<?php if(count($pageData['styles'])):?>
<?php foreach ($pageData['styles'] as $style):?>
    <link rel="stylesheet" href="<?= CSS_FOLDER . $style?>">
<?php endforeach;?>
<?php endif;?>

<?php if(count($pageData['js_head'])):?>
<?php
//External scripts
foreach ($pageData['js_head'] as $script):?>
    <script src="<?= $script?>"></script>
<?php endforeach;?>
<?php endif;?>
    <link rel="shortcut icon" href="<?=ICON?>" type="image/x-icon">
</head>
<body>
    <div class="container">
<?php if(count($pageData['headers'])) :?>
        <header>
<?php foreach ($pageData['headers'] as $header) {
    include $header;
} ?>
        </header>
<?php endif;?>
<?php if(count($pageData['navs'])) :?>
        <nav>
<?php foreach ($pageData['navs'] as $nav) {
     include $nav;
} ?>
        </nav>
<?php endif;?>
<?php if(count($pageData['contents'])) :?>
        <main>
<?php foreach ($pageData['contents'] as $content) {
     $content->view->render($content->getPageTpl(), $content->getPageData());
} ?>
        </main>
<?php endif;?>
<?php if(count($pageData['footers'])) :?>
        <footer>
<?php foreach ($pageData['footers'] as $footer) {
    include $footer;
} ?>
        </footer>
<?php endif;?>
    </div>
<?php if(count($pageData['js'])) :?>
<?php foreach ($pageData['js'] as $script) :?>
    <script src="<?= JS_FOLDER . $script; ?>"></script>
<?php endforeach;?>
<?php endif;?>
    <?php if(count($pageData['js_head'])):?>
        <?php
//External scripts
        foreach ($pageData['js_foot'] as $script):?>
            <script src="<?= $script?>"></script>
        <?php endforeach;?>
    <?php endif;?>
</body>
</html>