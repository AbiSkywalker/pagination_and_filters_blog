
//BUSQUEDAD DE POST POR CATEGORIAS EN EL BLOG
jQuery(function($) {
    var curr_page = 1;
    var categ_actual = '';



    function loader_behaviour_blog(show) {
        if (show) {
            $('.blog-posts-categorias-entradas-lista').fadeIn();
        } else {
            $('.blog-posts-categorias-entradas-lista').fadeOut();
        }
    }

    $(document).on('click', '#lanzarote_booking_pagination .page-link', function (e) {
        curr_page = $(this).data('page');
        load_posts();
    })
    
    $('.blog-posts-categorias-lista-nombre').click(function(e){
        $('.blog-posts-categorias-lista-nombre.seleccionada').removeClass('seleccionada');
        $(this).addClass('seleccionada');
        categ_actual=$('.blog-posts-categorias-lista-nombre.seleccionada').attr('id');
        if (categ_actual == 'all'){
            categ_actual = '';
        }
        curr_page = 1;
        load_posts();
    });

    $('#posts-por-categoria').change(function(e){
        categ_actual=$(this).val();
        if (categ_actual == 'all'){
            categ_actual = '';
        }
        curr_page = 1;
        load_posts();
    });


    //carga inicial
    $(document).ready(function(){
        console.log("Carga inicial posts");
        load_posts();
    });

    function load_posts(category='', page=1){
        console.log("buscando...");
        $.ajax({
            url: my_ajax_object.ajax_url, 
            type : 'POST' , 
            data : {
                'action': 'load_blog_posts',
                'cat' : categ_actual,
                'paged': curr_page,
                //'items': items
            } , 
            success : function (results) {
                loader_behaviour_blog(false);
                //jQuery(".blog-posts-categorias-entradas-lista .blog_loader").css('display', 'none');
                jQuery(".blog-posts-categorias-entradas-lista").html(results).fadeIn();
            }
        })
    }

    
})


