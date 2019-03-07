<?php $prev = get_previous_post_link( __( '%link', 'numusfinancial' ), '%title&nbsp;&raquo;' ) ?>
<?php $next = get_next_post_link( __( '%link', 'numusfinancial' ), '&laquo;&nbsp;%title' ) ?>
<?php if( $prev || $next ) : ?>
	<div class="navigation-single">
		<?php if( $next ) : ?><div class="next"><?php echo $next ?></div><?php endif ?>
		<?php if( $prev ) : ?><div class="prev"><?php echo $prev ?></div><?php endif ?>
	</div>
<?php endif ?>