<?php
echo head(array(
    'title' => 'Accessibility Plus',
    'bodyclass' => 'accessibility-plus browse'
));
?>

<div class="carleton-img">
    <img src="<?php echo img('carleton-dh-logo.png'); ?>" />
</div>

<h4><?php echo __('Alternative Text Options'); ?></h4>

<p class="explanation">
    <?php echo _('Alternate Text or Alt-Text is the text read by screenreaders '
    . 'when coming across images on a website. Omeka by default uses the filename, '
    . 'which can frequently be indecipherable (i.e. DSC00891.jpg). '
    . 'To address this issue, this plugin lets you choose a metadata element '
    . 'from the Dublin Core (such as "Title" or "Description") to be used as the alt-text. '
    . 'So far this only works for when looking at fullsized images, not thumbnails. '
    . 'The plugin <a href="https://omeka.org/classic/plugins/DublinCoreExtended/">'
    . 'Dublin Core Extended </a> adds the full set of Dublin Core properties, '
    . 'include alternative title for alt-text. If the element you choose is missing, '
    . 'from an image this plugin uses the item title by default.'
    ); ?>

</p>

<?php echo $form; ?>

<?php echo foot();
