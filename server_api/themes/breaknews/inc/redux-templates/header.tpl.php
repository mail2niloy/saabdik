<div id="redux-header">
    <?php if ( ! empty( $this->parent->args['display_name'] ) ) { ?>
        <div class="display_header">
            <div class="dev-overlay" style="z-index:1"></div>
                <img src="<?php echo get_template_directory_uri() . '/images/milliomola-logo.png'; ?>">
                <h2>
                    <?php echo wp_kses_post( $this->parent->args['display_name'] ); ?>
                    <span class="subtitle"> - <?php esc_html_e('Theme options', 'breaknews') ?></span>
                    <?php if ( ! empty( $this->parent->args['display_version'] ) ) { ?>
                        <div class="version"><?php esc_html_e('version', 'breaknews') ?>: <?php echo wp_kses_post( $this->parent->args['display_version'] ); ?></div>
                    <?php } ?>
                </h2>
            </div>

    <?php } ?>

    <div class="clear"></div>
</div>