<?php
function deveridlink_btn( $template ) {
    global $post;
    
    $post_type = get_option('deveridlink_options')['deveridlink_post_type'];
    if (!$post_type)
        $post_type = array('post','product');
    
    if(in_array($post->post_type, $post_type)){
        $btn_position = get_option('deveridlink_options')['deveridlink_btn_position'];
        if(!$btn_position)
            $btn_position = 'bl';
        
        $margin = get_option('deveridlink_options')['deveridlink_btn_margin'];
        if(!$margin)
            $margin = '30';
        
        
        $link_type = get_option('deveridlink_options')['deveridlink_link_type'];
        $style = get_option('deveridlink_options')['deveridlink_style'];
        if($link_type == 'url'){
            $link = get_permalink($post->ID);
        }else{
            $link = get_site_url().'/?p='.$post->ID;
        }
        ?>
        
        <input id="deveridlink-product" type="text" value="<?php echo $link ?>" style="position:fixed;opacity:0;top:-1000px">
        <?php if($style ==! 'float'){ ?>
        <div id="deveridlink_btn">
            <!--<?php echo __('Copy link','deveridlink') ?>-->
            <img src="<?php echo plugin_dir_url( __DIR__ ) .'images/link.svg' ?>" width="50px" title="<?php echo __('Copy link','deveridlink') ?>">
        </div>
        <script>
            jQuery('#deveridlink_btn').click(function(){
                var deveridlink_btn = document.getElementById("deveridlink-product");
                deveridlink_btn.select();
                document.execCommand("copy");
                Swal.fire({
                    icon: 'success',
                    title: '<?php echo __('Copied','deveridlink') ?>',
                    html: '<?php echo __('The link for this page has been copied','deveridlink') ?><br><br><?php echo $link ?>',
                    confirmButtonText: '<?php echo __('Okey','deveridlink') ?>',
                })
    
            })
        </script>
        
        <?php
        if($btn_position == 'tr'){
            $py = 'top';
            $px = 'right';
        }elseif($btn_position == 'tl'){
            $py = 'top';
            $px = 'left';
        }elseif($btn_position == 'br'){
            $py = 'bottom';
            $px = 'right';
        }elseif($btn_position == 'bl'){
            $py = 'bottom';
            $px = 'left';
        }
        ?>
        <style>
            #deveridlink_btn{
                position: fixed;
                <?php echo $py ?>: 10px;
                <?php echo $px ?>: 10px;
                z-index: 9;
                margin: auto;
                cursor: pointer;
                display: inline-table;
                background: #4054b2;
                height: auto;
                direction: ltr;
                border-radius: 100px;
                font-weight: bold;
                color: white;
                padding: 10px;
                transition: 0.2s;
                
            }
            #deveridlink_btn:hover{
                <?php echo $py ?>: 20px;
                transition: 0.5s;
            }
            #deveridlink_btn img{
                width: <?php echo $margin ?>px;
            }
        </style>
        <?php } ?>
    <?php }
    
}

add_filter( 'wp_head', 'deveridlink_btn' );