<?php
echo head(array(
    'title' => 'Accessibility Plus',
    'bodyclass' => 'accessibility-plus browse'
));
?>

<h4><?php echo __('Select What Type Of Metadata You Want To Use And Click Submit'); ?></h4>

<p class="explanation">
    <?php echo _('These different metadata options are from the dublin core.'); ?>
</p>

<?php echo $form; ?>

<?php echo foot();
