<?php

function hide_meta_boxes_template_toggle()
{
    $screen = get_current_screen();
    if ($screen && $screen->id === 'page'):
    ?>

<script>

$ = $ || jQuery; // Allow non-conflicting use of '$'

$(function(){

    // Hide the custom meta box(s)
    $('#your_fields_meta_box').hide();
    $('#extra_content').hide();

    // Create an observer to watch for Gutenberg editor changes
    const observer = new MutationObserver( function( mutationsList, observer ){

        // Template select box element
        let $templateField = $( '.editor-page-attributes__template select' );

        // Once we have the select in the DOM...
        if( $templateField.length ){

            $( document ).ready(function() {
                console.log('enqueued!!');
                if($templateField.val() === 'page-templates/three-image-header.php') {
                    $('#your_fields_meta_box').show();
                }
                if($templateField.val() === 'page-templates/two-column-template.php') {
                    $('#extra_content').show();
                }
            });

            // ...add the handler, then...
            $templateField.on( 'change', function(){

                // ...do your on-change work here
                if($(this).val() === 'page-templates/three-image-header.php') {
                    $('#your_fields_meta_box').show();
                    $('#extra_content').hide();
                } else if($(this).val() === 'page-templates/two-column-template.php') {
                    $('#extra_content').show();
                    $('#your_fields_meta_box').hide();
                } else {
                    $('#your_fields_meta_box').hide();
                    $('#extra_content').hide();
                }
                

            });
            observer.disconnect();

        }

    });
    // Trigger the observer on the nearest parent that exists at 'DOMReady' time
    observer.observe( document.getElementsByClassName( 'block-editor__container' )[0], {
        childList: true, // One of the required-to-be-true attributes (throws error if not set)
        subtree: true // Watches for the target element's subtree (where the select lives)
    });

});
</script>

<?php
endif;
}
add_action('admin_print_footer_scripts', 'hide_meta_boxes_template_toggle');