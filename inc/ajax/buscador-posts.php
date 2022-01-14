<?php
function load_blog_posts()
{
    $paged = $_POST['paged'] ? $_POST['paged'] : 1;
    $category =  $_POST['cat'] ? $_POST['cat'] : '';
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => '4',
        'paged'          => $paged,
        'category_name'=> $_POST['cat']
        );

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        
        while ( $query->have_posts() ) {
    
            $query->the_post();?>
            <div class="blog-posts-categorias-entradas-lista-card ">
                <div class="blog-posts-categorias-entradas-lista-card-image"> <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(  );?> </a></div>
                <div class="blog-posts-categorias-entradas-lista-card-info container">
                    <p class="blog-posts-categorias-entradas-lista-card-info-categoria"><a href="<?php echo get_the_category()[0]->slug; ?>"><?php echo get_the_category()[0]->name; ?></a></p>
                    <h3 class="blog-posts-categorias-entradas-lista-card-info-titulo"><?php the_title(); ?></h3>
                    <p class="blog-posts-categorias-entradas-lista-card-info-texto"><?php echo get_field('descripcion_corta'); ?></p>
                    <div class="blog-posts-categorias-entradas-lista-card-info-autor">
                        <?php echo get_avatar(get_the_author_meta( 'ID' ), get_the_category()[0]->id);?> </span>
                        <p class="blog-posts-categorias-entradas-lista-card-info-autor-nombre"><?php echo get_the_author(); ?></p>      
                    </div>
                </div>
            </div>
        
    <?php  } 
    wp_reset_postdata();
    
    ?>

    <nav aria-label="Paginación" id="posts_pagination">
        <ul class="pagination">
            <?php if ($query->query['paged'] > 1) { ?>
                <li class="page-item"><a class="page-link" data-page="1"><?php _e('<<', 'dokan-child') ?></a></li>
            <?php } ?>
            
            <?php for ($i=1; $i <= $query->max_num_pages ; $i++) { ?>
                <?php if ($query->query['paged'] == $i) { ?>
                    <li class="page-item active"><a class="page-link" data-page="<?=$i?>"><?=$i?></a></li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" data-page="<?=$i?>"><?=$i?></a></li>
                <?php } ?>
            <?php } ?>


            <?php if ($query->query['paged'] < $query->max_num_pages) { ?>
                <li class="page-item"><a class="page-link ult" data-page="<?=$query->max_num_pages?>"><?php _e('>>', 'dokan-child') ?></a></li>
            <?php } ?>

        </ul>
    </nav>
    <?php     
    } 
    wp_die();   

}
add_action('wp_ajax_nopriv_load_blog_posts', 'load_blog_posts');
add_action('wp_ajax_load_blog_posts', 'load_blog_posts');
