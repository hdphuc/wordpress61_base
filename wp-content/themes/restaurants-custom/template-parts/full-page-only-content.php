<?php

/**
 * Template Name: Full Width Only Content
*/

 ?>
<?php

/**
 * Header for the theme 
 * 
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title() ?></title>
    <?php wp_head(); ?>
</head>
<body>

<?php get_template_part('template-parts/content/content') ?>

 
<?php wp_footer(); ?>
</body>
</html>
 