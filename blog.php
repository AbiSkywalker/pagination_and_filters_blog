<section class="blog-posts-categorias container">
    <div class="blog-posts-categorias-lista desktop">

    <p id="all" class="blog-posts-categorias-lista-nombre desktop-nombre seleccionada"><?php _e('Todo'); ?></p>
        <?php

            $categories =  get_categories();  
            foreach  ($categories as $category) {?>
               <?php ?>
                <p id="<?php echo $category->slug?>" class="blog-posts-categorias-lista-nombre desktop-nombre"><?php echo $category->name; ?></p>
                
            <?php } 
            
            ?>
    </div>
    <div class="blog-posts-categorias-lista mobile">
        <select name="posts-por-categoria" id="posts-por-categoria">
        <option value="all" id="blog-posts-categorias-lista-nombre-option-todo" class="blog-posts-categorias-lista-nombre-option "><?php _e('Todo'); ?></option>
        <?php

            $categories =  get_categories();  
            foreach  ($categories as $category) {?>
                <option value="<?php echo $category->slug?>" class="blog-posts-categorias-lista-nombre-option "><?php echo $category->name; ?></option>
                
            <?php } 
            
            ?>
        </select>
    </div>

    <div class="blog-posts-categorias-entradas">
        <div class="blog-posts-categorias-entradas-lista">

        </div>
        <?php 
        
        ?>
    </div>
</section>
