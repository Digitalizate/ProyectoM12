<?php 
	$honeywaves_actions = $this->recommended_actions;
	$honeywaves_actions_todo = get_option( 'honeywaves_recommended_actions', false );
?>
<div id="recommended_actions" class="honeywaves-tab-pane panel-close">
	<div class="action-list">
	    <div class="row">
			<?php if($honeywaves_actions): foreach ($honeywaves_actions as $key => $honeywaves_val): ?>
			<div class="col-md-6">
				<div class="action" id="<?php echo esc_attr($honeywaves_val['id']); ?>">
					<div class="action-box">
						<div class="action-watch">
						<?php if(!$honeywaves_val['is_done']): ?>
							<?php if(!isset($honeywaves_actions_todo[$honeywaves_val['id']]) || !$honeywaves_actions_todo[$honeywaves_val['id']]): ?>
								<span class="dashicons dashicons-visibility"></span>
							<?php else: ?>
								<span class="dashicons dashicons-hidden"></span>
							<?php endif; ?>
						<?php else: ?>
							<span class="dashicons dashicons-yes"></span>
						<?php endif; ?>
						</div>
						<div class="action-inner">
							<h3 class="action-title"><?php echo esc_html($honeywaves_val['title']); ?></h3>
							<div class="action-desc"><?php echo esc_html($honeywaves_val['desc']); ?></div>
							<?php echo wp_kses_post($honeywaves_val['link']); ?>
						</div>
					</div>	
				</div>
			</div>
			<?php endforeach; endif; ?>
		</div>
	</div>
</div>