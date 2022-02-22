<?php
echo head(array(
    'title' => 'Accessibility Plus',
    'bodyclass' => 'accessibility-plus browse'
));
?>

<div class="carleton-img">
    <img src="<?php echo img('carleton-dh-logo.png'); ?>" alt="Carleton College Digital Humanities Logo"/>
</div>

<h4><?php echo __('Accessibility Features'); ?></h4>

<p class="explanation">
    <?php echo _("AccessibilityPlus is an Omeka plugin designed to improve the accessibility "
    . "features of Omeka sites. It is developed and maintained by the Digital Humanities department "
    . "at Carleton College. Visit the <a href='https://github.com/DigitalCarleton/AccessibilityPlus'>GitHub page</a> to report bugs or propose features."
    ); ?>

</p>

<?php echo $form; ?>

<?php echo foot();
