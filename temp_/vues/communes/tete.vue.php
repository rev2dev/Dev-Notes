<!DOCTYPE html>
<html>
   <head>
      <meta charset="<?php echo isset($charset) ? $charset : "utf-8"; ?>">
      <title><?php echo isset($title) ? $title : "By r2d" ; ?></title>
      <?php if( !empty($css) && is_array($css) ) : ?>
      <?php    foreach($css as $link) : ?> 

      <link rel="stylesheet" type="text/css" href="<?php echo $link ?>">

      <?php    endforeach; ?> 
      <?php    unset($css); ?> 
      <?php endif; ?>
      <?php if( !empty($js) && is_array($js) ) : ?>
      <?php    foreach($js as $script) : ?> 

      <script type="text/javascript" src="<?php echo $script ?>"></script>

      <?php    endforeach; ?> 
      <?php    unset($js); ?> 
      <?php endif; ?>
      
      <?php unset($charset); unset($title); ?>
   </head>
