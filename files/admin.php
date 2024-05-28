<?php
add_action( 'admin_menu', 'jm_news_add_admin_menu' );
add_action( 'admin_init', 'jm_news_settings_init' );

function jm_news_add_admin_menu(  ) {

    add_options_page( 'JM News', 'JM News', 'manage_options', 'jm_news', 'jm_news_options_page' );

}

function jm_news_settings_init(  ) {

    register_setting( 'pluginPage', 'jm_news_settings' );

    add_settings_section(
        'jm_news_pluginPage_section',
        __( 'Settings:', 'jmunyan-news' ),
        'jm_news_settings_section_callback',
        'pluginPage'
    );

    add_settings_section(
        'jm_news_settings_section_info',
        __( 'Settings:', 'jmunyan-news' ),
        'jm_news_settings_section_info',
        'pluginPage'
    );

    add_settings_field(
        'jm_news_select_field_0',
        __( 'Image size', 'jmunyan-news' ),
        'jm_news_select_field_0_render',
        'pluginPage',
        'jm_news_pluginPage_section'
    );

    add_settings_field(
        'theme_files',
        __( "Don't use plugin template for archive page", 'JM News' ),
        'jm_news_theme_files_render',
        'pluginPage',
        'jm_news_pluginPage_section'
    );


}

function jm_news_select_field_0_render(  ) {

    $options = get_option( 'jm_news_settings' );
    ?>
    <select name='jm_news_settings[jm_news_select_field_0]'>
        <option value='1' <?php selected( $options['jm_news_select_field_0'], 1 ); ?>>ImageSize 700 x 700 - Default</option>
        <option value='2' <?php selected( $options['jm_news_select_field_0'], 2 ); ?>>ImageSize - Original</option>
    </select>

<?php }


function jm_news_theme_files_render(  ) {

    $options = get_option( 'jm_news_settings' );
    $options['theme_files'] = !empty( $options['theme_files'] ) ? 1 : 0;

?>
    <input type='checkbox' name='jm_news_settings[theme_files]' <?php checked( $options['theme_files'], 1 ); ?> value='1'>

<?php }



function jm_news_settings_section_callback(  ) {
    echo '<p class="jm_news_info">' . __( 'Choose between 2 image sizes', 'jmunyan-news' ) . '</p>';
}

function jm_news_settings_section_info(  ) {
    echo '<div class="jmunyan-news-info">';
    echo '<p><strong>Shortcodes examples:</strong><br /><em>' . __( '<code>[news] - [news number=2] - [news offset=2] - [news type=related] - [news order=desc] - [news number=3 order=asc] - [news cat=1] - [news cat=1,2] - [news col=3]</code>' ) . '</em></p>';
    echo '<p><strong>Widgets:</strong><br />' . __('A widget that will show your defined number of latest news. Options to filter results by category id.') . '</p>';
    echo '<p><strong>Widget area (only on page = /news):</strong><br />' . __('"News top" and "News bottom" for text and other stuff before and after the "news grid".') . '</p>';
    echo '<p><strong>"/news":</strong> <em>archive-news.php</em><br />' . __('Change the page width in the Wordpress custom CSS as you like.') . '<br /><code> .jmunyan-news-grid-con { max-width: 1100px; }</code><br /><em>"default max-width = 1240px</em>"</p><p>Page background color:<br /><code> .jmunyan-news-grid-con { background-color: #ffffff; }</code>';
    echo '</div>';
}


function jm_news_options_page(  ) { ?>
    <style>
        .form-table th {min-width: 300px;}
        p.jm_news_info {background: chocolate; padding: 1em; color: #fff;}
        h2 {display: none;}
        .jmunyan-news-info {background:rgba(212, 105, 6, 0.1); padding: 1em;}
        .jmunyan-news-info p {line-height: 2;}
        .jmunyan-news-info strong {font-size: 1.5em;}
    </style>
    <form action='options.php' method='post' style="background-color: #fff; padding: 1em 2em; margin: 20px 20px 20px 0; box-shadow: 0 0 1px #000;">
        <h1>JM News</h1>
        <?php
            settings_fields( 'pluginPage' );
            do_settings_sections( 'pluginPage' );
            submit_button();
        ?>
    </form>
<?php } ?>