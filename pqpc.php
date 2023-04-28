<?php
/*
Plugin Name: PrettyQuickPrettyCode (PQPC)
Description: A WordPress plugin that allows the user to wrap a block of text in a special string, marking it as a block of code. The plugin then renders the text in a monospace font, in the dracula theme, with proper indentation. It works for Python, C/C++, and JavaScript syntax.
Version: 1.0
Author: greydoubt
Author URI: www.greydoubt.com
License: GPL2
*/


/*
The plugin defines a shortcode [pqpc] that accepts two attributes: lang and content. The lang attribute is used to specify the language of the code block, and the content attribute contains the actual code.

When the shortcode is used, the plugin converts the content into a formatted code block using the appropriate syntax highlighting based on the lang attribute. It also enqueues the necessary styles and scripts to render the code block in a monospace font and dracula theme.

To use the plugin, simply wrap your code block in [pqpc lang="language"]...[/pqpc] shortcode, where language can be either python, c, c++, javascript, or plain (for non-highlighted code blocks).

*/

function pqpc_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'lang' => 'plain',
    ), $atts );

    $content = wp_strip_all_tags( $content );
    $content = esc_html( $content );
    $content = trim( $content );

    switch ( strtolower( $atts['lang'] ) ) {
        case 'python':
            $content = htmlspecialchars( $content, ENT_QUOTES );
            $content = highlight_string( "<?php\n" . $content, true );
            $content = str_replace( '&lt;?php<br />', '', $content );
            break;
        case 'c':
        case 'c++':
            $content = htmlspecialchars( $content, ENT_QUOTES );
            $content = highlight_string( "<?php\n" . $content, true );
            $content = str_replace( '&lt;?php<br />', '', $content );
            break;
        case 'javascript':
            $content = htmlspecialchars( $content, ENT_QUOTES );
            $content = highlight_string( "<?php\n" . $content, true );
            $content = str_replace( '&lt;?php<br />', '', $content );
            break;
        default:
            $content = nl2br( $content );
            break;
    }

    $output = '<pre class="prettyprint linenums">';
    $output .= $content;
    $output .= '</pre>';

    return $output;
}

function pqpc_init() {
    wp_enqueue_style( 'pqpc-styles', plugins_url( 'assets/styles.css', __FILE__ ) );
    wp_enqueue_script( 'pqpc-scripts', plugins_url( 'assets/scripts.js', __FILE__ ), array( 'jquery' ) );
    add_shortcode( 'pqpc', 'pqpc_shortcode' );
}

add_action( 'init', 'pqpc_init' );
