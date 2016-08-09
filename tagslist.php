<?php
  global $language;

  $tag_title = single_tag_title("", false);
  $is_tag = $tag_title != "";
  if($language == 'en-US') {
    $all_t = 'all';
    $select_title = 'select';
  } elseif($language == 'es-ES') {
    $all_t = 'todo';
    $select_title = 'seleccionar';
  } else {
    $all_t = 'tudo';
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
    <option value="<?php bloginfo('wpurl');?>"><?=$is_tag ? $all_t : $select_title ?></option>
    <?php foreach($tags as $tag):?>
      <option
        value="<?php bloginfo('wpurl');?>/tag/<?=$tag->slug;?>"
        <?php if($tag->name == $tag_title) { echo "selected"; }?>
      ><?=tag_name($tag);?></option>
    <?php endforeach;?>
  </select>
  <span class="tags-select-title">[ <?=$is_tag ? $tag_title : $select_title?> ]</span>
</ul>
