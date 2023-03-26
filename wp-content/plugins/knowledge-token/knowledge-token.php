<?php

/**
 * Plugin Name: Knowledge Token
 * Description: Add Knowledge Token NFT's to your content. This allows users to buy Knowledge NFT-s and therefore monetise your content.
 * Plugin URI: https://knowledge-token.com/
 * Author: Knowledge Token
 * Version: 1.0.2
 */
function knowledge_token_block_script_register()
{
  wp_enqueue_script('knowledge-token-block', plugin_dir_url(__FILE__).'knowledge-token-block.js',array('wp-blocks','wp-i18n','wp-editor'),true,false);
}

add_action('enqueue_block_editor_assets', 'knowledge_token_block_script_register');

 ?>