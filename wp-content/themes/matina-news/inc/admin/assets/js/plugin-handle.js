/**
 * Get Started button on dashboard notice.
 *
 * @package Matina News
 */

jQuery(document).ready(function($) {
    var WpAjaxurl       = ogAdminObject.ajax_url;
    var _wpnonce        = ogAdminObject._wpnonce;
    var buttonStatus    = ogAdminObject.buttonStatus;

    /**
     * Popup on click demo import if mysterythemes demo importer plugin is not activated.
     */
    if( buttonStatus === 'disable' ) $( '.matina-news-demo-import' ).addClass( 'disabled' );

    switch( buttonStatus ) {
        case 'activate' :
            $( '.matina-news-get-started' ).on( 'click', function() {
                var _this = $( this );
                matina_news_do_plugin( 'matina_news_activate_plugin', _this );
            });
            $( '.matina-news-activate-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                matina_news_do_plugin( 'matina_news_activate_plugin', _this );
            });
            break;
        case 'install' :
            $( '.matina-news-get-started' ).on( 'click', function() {
                var _this = $( this );
                matina_news_do_plugin( 'matina_news_install_plugin', _this );
            });
            $( '.matina-news-install-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                matina_news_do_plugin( 'matina_news_install_plugin', _this );
            });
            break;
        case 'redirect' :
            $( '.matina-news-get-started' ).on( 'click', function() {
                var _this = $( this );
                location.href = _this.data( 'redirect' );
            });
            break;
    }
    
    matina_news_do_plugin = function ( ajax_action, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

    $('.mt-action-btn').click(function(){
        var _this = $(this), actionBtnStatus = _this.data('status'), pluginSlug = _this.data('slug');
        console.log(actionBtnStatus);
        switch(actionBtnStatus){
            case 'install':
                matina_news_do_free_plugin( 'matina_news_install_free_plugin', pluginSlug, _this );
                break;

            case 'active':
                matina_news_do_free_plugin( 'matina_news_activate_free_plugin', pluginSlug, _this );
                break;
        }

    });

    matina_news_do_free_plugin = function ( ajax_action, pluginSlug, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                'plugin_slug': pluginSlug,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

});