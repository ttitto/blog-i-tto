<?php foreach($data['posts'] as $post_data) { ?>
    <?php echo \Core\Helper::isset_get($post_data,'header')?>
    <a href="/posts/view/<?php echo \Core\Helper::isset_get($post_data,'id');?>"><?php echo \Core\Helper::isset_get($post_data,'header');?></a>
<?php } ?>
