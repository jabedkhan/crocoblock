<?php

/* 1. Add your page slug name, where you have the search form.
2. In summary, the script dynamically enables or disables the "Apply" button based on whether all 
specified fields on the page are filled out, ensuring that the button is only clickable when all required fields have data. */



function custom_required_field_script() {
    // Only add this script on the specific page with the slug 'YOUR PAGE SLUG NAME/'
    if (strpos($_SERVER['REQUEST_URI'], 'YOUR PAGE SLUG NAME/') !== false) {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                // Function to check the state of the fields and toggle the button's disabled state
                function toggleApplyButton() {
                    var allFieldsFilled = true;

                    // Check if select filter is filled
                    if ($('.jet-smart-filters-select .jet-select__control').val() === '') {
                        allFieldsFilled = false;
                    }

                    // Check if search filters are filled
                    $('.jet-smart-filters-search .jet-search-filter__input').each(function() {
                        if ($(this).val() === '') {
                            allFieldsFilled = false;
                        }
                    });

                    // Enable or disable the apply button based on the fields' state
                    $('.jet-smart-filters-apply-button .apply-filters__button').prop('disabled', !allFieldsFilled);
                }

                // Initial check on page load
                toggleApplyButton();

                // Check the state of the fields whenever they change
                $('.jet-smart-filters-select .jet-select__control, .jet-smart-filters-search .jet-search-filter__input').on('change keyup', function() {
                    toggleApplyButton();
                });
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'custom_required_field_script');


?>
