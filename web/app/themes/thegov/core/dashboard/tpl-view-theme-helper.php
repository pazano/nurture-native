<?php

/**
 * Template Activate Theme
 *
 * @link       https://themeforest.net/user/webgeniuslab
 * @since      1.0.0
 *
 * @package    Thegov
 * @subpackage Thegov/core/dashboard
 */

/**
 * @since      1.0.0
 * @package    Thegov
 * @subpackage Thegov/core/dashboard
 * @author     WebGeniusLab <webgeniuslab@gmail.com>
 */

$allowed_html = array(
	'a' => array(
		'href' => true,
		'target' => true,
	),
);
?>
<div class="wgl-theme-helper">
	<div class="container-form">
		<h1 class="wgl-title">
			<?php echo esc_html__('Need Help? WebGeniusLab Help Center Here', 'thegov');?>
		</h1>
		<div class="wgl-content">
			<p class="wgl-content_subtitle">
				<?php
					echo wp_kses( __( 'Please read a <a target="_blank" href="https://themeforest.net/page/item_support_policy">Support Policy</a> before submitting a ticket and make sure that your question related to our product issues.', 'thegov' ), $allowed_html);
				?>
				<br/>
					<?php
					echo esc_html__('If you did not find an answer to your question, feel free to contact us.', 'thegov');
					?>
			</p>
		</div>
		<div class="wgl-row">			
			<div class="wgl-col wgl-col-4">
				<div class="wgl-col_inner">
					<div class="wgl-info-box_wrapper">
						<div class="wgl-info-box">
							<div class="wgl-info-box_icon-wrapper">
								<div class="wgl-info-box_icon">
									<img src="<?php echo esc_url(get_template_directory_uri()) . '/core/admin/img/dashboard/document_icon.png'?>">
								</div>
							</div>
							<div class="wgl-info-box_content-wrapper">	
								<div class="wgl-info-box_title">
									<h3 class="wgl-info-box_icon-heading">
										<?php
											esc_html_e('Documentation', 'thegov');
										?>
									</h3>
								</div>					
								<div class="wgl-info-box_content">
									<p>
										<?php
										esc_html_e('Before submitting a ticket, please read the documentation. Probably, your issue already described.', 'thegov');
										?>
									</p>
								</div>		
								<div class="wgl-info-box_btn">
									<a target="_blank" href="http://thegov.wgl-demo.net/doc">
										<?php
											esc_html_e('Visit Documentation', 'thegov');
										?>	
									</a>
								</div>
							</div>
						</div>			
					</div>	
				</div>
			</div>
			<div class="wgl-col wgl-col-4">
				<div class="wgl-col_inner">
					<div class="wgl-info-box_wrapper">
						<div class="wgl-info-box">
							<div class="wgl-info-box_icon-wrapper">
								<div class="wgl-info-box_icon">
									<img src="<?php echo esc_url(get_template_directory_uri()) . '/core/admin/img/dashboard/video_icon.png'?>">
								</div>
							</div>
							<div class="wgl-info-box_content-wrapper">	
								<div class="wgl-info-box_title">
									<h3 class="wgl-info-box_icon-heading">
										<?php
											esc_html_e('Video Tutorials', 'thegov');
										?>
									</h3>
								</div>					
								<div class="wgl-info-box_content">
									<p>
										<?php
											esc_html_e('There you can watch tutorial for main issues. How to import demo content? How to create a Mega Menu? etc..', 'thegov');
										?>
									</p>
								</div>		
								<div class="wgl-info-box_btn">
									<a target="_blank" href="https://www.youtube.com/playlist?list=PLUkplXWvHAHOathCyT5dp-srdKXrUNcjo">
										<?php
											esc_html_e('Watch Tutorials', 'thegov');
										?>	
									</a>
								</div>
							</div>
						</div>			
					</div>	
				</div>
			</div>		
			<div class="wgl-col wgl-col-4">
				<div class="wgl-col_inner">
					<div class="wgl-info-box_wrapper">
						<div class="wgl-info-box">
							<div class="wgl-info-box_icon-wrapper">
								<div class="wgl-info-box_icon">
									<img src="<?php echo esc_url(get_template_directory_uri()) . '/core/admin/img/dashboard/support_icon.png'?>">
								</div>
							</div>
							<div class="wgl-info-box_content-wrapper">	
								<div class="wgl-info-box_title">
									<h3 class="wgl-info-box_icon-heading">
										<?php
											esc_html_e('Support forum', 'thegov');
										?>
									</h3>
								</div>					
								<div class="wgl-info-box_content">
									<p>
										<?php
											esc_html_e('If you did not find an answer to your question, submit a ticket with well describe your issue.', 'thegov');
										?>
									</p>
								</div>		
								<div class="wgl-info-box_btn">
									<a target="_blank" href="https://webgeniuslab.ticksy.com">
										<?php
											esc_html_e('Create a ticket', 'thegov');
										?>	
									</a>
								</div>
							</div>
						</div>			
					</div>	
				</div>
			</div>					
	
		</div>
		<div class="theme-helper_desc">
			<?php
				echo wp_kses( __( 'Do You have some other questions? Need Customization? Pre-purchase questions? Ask it <a  target="_blank"  href="mailto:webgeniuslab@gmail.com">there!</a>', 'thegov' ), $allowed_html);
			?>			
		</div>

	</div>
</div>

