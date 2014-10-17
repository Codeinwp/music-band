<?php
/*
 * The template for displaying search forms in music-band-pro
 *
 * @package music-band-pro
 */
?>
<form method="get" id="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
  <input name="s" type="text" size="40" placeholder="<?php _e('Search','music-band-pro'); ?>..." />
</form>
