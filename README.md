# wordpress_prettycode
php wordpress plugin that wraps code and makes it look nice

The plugin defines a shortcode [pqpc] that accepts two attributes: lang and content. The lang attribute is used to specify the language of the code block, and the content attribute contains the actual code.

When the shortcode is used, the plugin converts the content into a formatted code block using the appropriate syntax highlighting based on the lang attribute. It also enqueues the necessary styles and scripts to render the code block in a monospace font and dracula theme.

To use the plugin, simply wrap your code block in [pqpc lang="language"]...[/pqpc] shortcode, where language can be either python, c, c++, javascript, or plain (for non-highlighted code blocks).
