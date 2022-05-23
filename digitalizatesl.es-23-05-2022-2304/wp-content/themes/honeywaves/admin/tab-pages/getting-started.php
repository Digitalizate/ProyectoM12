<?php
/**
 * Getting started template
 */
?>
<div id="getting_started" class="honeywaves-tab-pane active">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="honeywaves-info-title text-center"><?php echo esc_html__('About the HoneyWaves theme','honeywaves'); ?>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
				<p><?php _e( 'This theme is ideal for creating corporate and business websites. HoneyWaves is a child theme of the HoneyPress WordPress theme. The premium version has tons of features like a homepage with many sections where you can feature unlimited slides, portfolios, user reviews, latest news, services, call to action and much more. Each section in the Homepage template is carefully designed to fit to all business requirements.','honeywaves');?></p>
				<p>
				<?php esc_html_e( 'You can use this theme for any type of activity. HoneyWaves is compatible with popular plugins like WPML and Polylang for the translation.', 'honeywaves' ); ?>
				</p>
				<h1 style="margin-top: 73px !important; font-size:2em !important; background: #0085ba;border-color: #0073aa #006799 #006799; color: #fff; padding: 10px 10px;"><?php esc_html_e( "Getting Started", 'honeywaves' ); ?></h1>
				<div>
				<p style="margin-top: 16px;">
				<?php esc_html_e( 'To take full advantage of all the features this theme has to offer, install and activate the SpiceBox plugin. Go to Customize and install the SpiceBox plugin.', 'honeywaves' ); ?>
				</p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary" style="padding: 3px 15px;height: 40px; font-size: 16px;"><?php esc_html_e( 'Go to the Customizer','honeywaves');?></a></p>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
				<img src="<?php echo esc_url( HONEYWAVES_TEMPLATE_DIR_URI ) . '/admin/img/honeywaves.png'; ?>" alt="<?php esc_attr_e( 'HoneyWaves theme', 'honeywaves' ); ?>" />
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col-md-12">
				<div class="honeywaves-tab-center">
					<h1><?php esc_html_e( "Useful Links", 'honeywaves' ); ?></h1>
				</div>
            </div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://honeywaves.spicethemes.com/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Lite Demo','honeywaves'); ?></p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://demo.spicethemes.com/?theme=HoneyWaves%20Pro'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
						<p class="info-text"><?php echo esc_html__('PRO Demo','honeywaves'); ?></p>
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://wordpress.org/support/theme/honeywaves/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Theme Support','honeywaves'); ?></p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/honeywaves'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','honeywaves'); ?></p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/honeywaves-pro/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Premium Theme Details','honeywaves'); ?></p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://helpdoc.spicethemes.com/category/honeypress/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-editor-help info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Theme Help Docs','honeywaves'); ?></p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/honeypress-free-vs-pro/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-welcome-write-blog info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Free vs Pro','honeywaves'); ?></p></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="honeywaves-tab-pane-half honeywaves-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/honeywaves-changelog/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-editor-help info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Changelog','honeywaves'); ?></p></a>
				</div>
			</div>
		</div>
	</div>
</div>
