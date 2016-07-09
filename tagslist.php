<?php
  global $language;

  if($language == 'en-US') {
    $all_t = 'All';
    $select_title = 'select';
  } elseif($language == 'es-ES') {
    $all_t = 'Todo';
    $select_title = 'seleccionar';
  } else {
    $all_t = 'Tudo';
    $select_title = 'selecione';
  }

  function tag_name($tag) {
    return preg_replace('/(\w+)((\_\$)+(\w+)$)/i', '${1}', $tag->name);
  }

  $tags = get_terms( 'post_tag' );
?>
<ul class="tags">
  <li><a href="<?php bloginfo('wpurl');?>" title="Filtrar portfólio"><?=$all_t?></a></li>
  <?php foreach($tags as $tag):?>
    <li><a href="<?php bloginfo('wpurl');?>/tag/<?=$tag->slug;?>" title="Filtrar portfólio"><?=tag_name($tag);?></a></li>
  <?php endforeach;?>
  <select class="tags-select">
    <option value=""><?=$select_title?></option>
    <option value="<?php bloginfo('wpurl');?>"><?=$all_t?></option>
    <?php foreach($tags as $tag):?>
      <option value="<?php bloginfo('wpurl');?>/tag/<?=$tag->slug;?>"><?=tag_name($tag);?></option>
    <?php endforeach;?>
  </select>
  <span class="tags-select-title">[ <?=$select_title?> ]</span>
</ul>
