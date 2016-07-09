<?php
  global $language;
  if($language == 'en-US') {
    $page_name = 'ajax-en';
    $bt_text = 'load more';
  } elseif ($language == 'es-ES') {
    $page_name = 'ajax-es';
    $bt_text = 'cargue más';
  } else {
    $page_name = 'ajax';
    $bt_text = 'carregar mais';
  }
?>
<a href="<?php bloginfo('wpurl');?>/<?=$page_name?>" class="read-more"><?=$bt_text?></a>