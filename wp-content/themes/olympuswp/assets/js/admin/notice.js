/**
 * File notice.js.
 */
 jQuery( document ).ready( function() {
	
	jQuery( '.oly-notice' ).on( 'click', '.oly-notice-dismiss', function(e) {
		e.preventDefault();
        var $wrapperElm = jQuery( this ).closest( '.oly-notice' );
		jQuery.post( ajaxurl, {
			action: 'oly_set_admin_notice_viewed',
			notice_id: $wrapperElm.data( 'notice_id' )
		} );
        $wrapperElm.fadeTo( 100, 0, function() {
			$wrapperElm.slideUp( 100, function() {
				$wrapperElm.remove();
			} );
        } );
	} );
} );
