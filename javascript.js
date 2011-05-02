(function($){
        
    $(window).load(function(){
        
        $('#folder_tree .igtvitem').not('#igtv0').hide();
        
        $('#folder_tree a').not('.ygtvspacer')
            .attr({'rel': 'galeria'})
            .each(function(){
                
                $(this).attr('title', $(this).text()).prepend('<img>').parent().find('img').attr(
                    {'src': $(this).attr('href').replace(/mod_folder\/content\/(\d+)\/(.*)/, "mod_folder/content/$1/thumbs/$2")}
                );
                
            }
        );
        
        var thumbs_exist = false;
        
        $('#folder_tree a').not('.ygtvspacer').each(function(){
            
            if ($(this).parent().find('img').attr('src').indexOf('/thumbs/thumbs/') == -1) {
                $(this).fancybox();
            }
            else {
                $(this).parent().parent().parent().parent().parent().parent().parent().parent().remove();
                thumbs_exist = true;
            }
            
        });
        
        if (!thumbs_exist) {
            
            $('#folder_tree a').not('.ygtvspacer').each(function(){
                
                $(this)
                    .attr('title', $(this).text())
                    .parent().find('img')
                        .attr(
                            {'src': $(this).attr('href').replace(/\/thumbs\/thumbs\//, "thumbs")}
                        )
                        .addClass('galeria_thumb');
                
            });
            
        }
        
    });
    
})($jq_galeria)

