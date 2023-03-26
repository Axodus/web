/**
 * File search.js.
 */
( function() {
	'use strict';

    document.addEventListener( 'DOMContentLoaded', function() {
        const searchWrap = document.querySelector( '.olympus-search-icon' );
        const searchLink = document.querySelectorAll( '.olympus-search-icon-link' );
        const searchClose = document.querySelector( '.olympus-search-close' );
        if ( searchLink ) {
            for ( let i = 0; i < searchLink.length; i++ ) {
                searchLink[i].addEventListener( 'click', function( e ) {
                    e.preventDefault();
                    document.body.classList.toggle( 'olympus-search-active' );
                    setTimeout( function() {
                        document.querySelector( '.olympus-search-wrapper .search-field' ).focus();
                    }, 200 );
                } );
            }

            if ( searchWrap ) {
                if ( ! searchWrap.classList.contains( 'search-full-screen' ) ) {
                    // Close when clicking elsewhere
                    document.addEventListener( 'click', function(e) {
                        if ( ! document.querySelector( '.olympus-search-icon' ).contains( e.target ) ) {
                            document.body.classList.remove( 'olympus-search-active' );
                        }
                    } );
                }
                
                if ( ! searchWrap.classList.contains( 'search-dropdown' ) ) {
                    searchClose.addEventListener( 'click', function() {
                        document.body.classList.remove( 'olympus-search-active' );
                    } );
                }
            }
        }
    } );

}() );
