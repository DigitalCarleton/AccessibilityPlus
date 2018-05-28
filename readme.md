# AccessibilityPlus

Omeka is a content management system that serves as open-source web publishing platforms for sharing digital collections and creating media-rich online exhibits. It comes with an [accessibility statement](https://omeka.org/classic/docs/GettingStarted/Accessibility_Statement/), but there are still weaknesses in how it addresses accessibility.
Alternate Text or Alt-Text is the text that serves as an alternative to viewing images on a website, but still understand the content of the image. It is used by screenreaders, slow internet connections, or individuals with cognitive disabilities who need fewer distractions on webpages. Omeka by default uses the image filename to generate the alt-text, but filenames can frequently be indecipherable (i.e. DSC00891.jpg). To address this issue, this plugin lets you choose a metadata element from the Dublin Core (such as "Title" or "Description") to be used as the alt-text. If the element you choose is missing from an image, then this plugin will use the item title by default. If the title is also missing, the filename is used. So far this only enhances alt-text for full-sized images on Omeka, not thumbnails. The plugin Dublin Core Extended adds the full set of Dublin Core properties, include alternative title for alt-text.

## Getting Started

To use this plugin, go to the folder of your installation of Omeka and place the AccessibilityPlus folder in omeka/plugins.

Then on the admin view of your Omeka website, click the "plugins" button on the navigation bar at the top of the page. Find Accessibility Plus in the list of your plugins and click the "Activate" button.

Your admin's navigation bar on the left side of the webpage should now have an "Accessibility Plus" button. Clicking on it should take you to the configuration page. Select from the dropdown menu the Dublin Core Metadata element you want to used to generate alt-text for images. It is recommended to use "Title" or "Description" or if you have installed the plugin [Dublin Core Extended](https://omeka.org/classic/plugins/DublinCoreExtended/) "Alternative Title."

### Prerequisites

This plugin was designed for Omeka 2.6. It's behavior on other versions it untested, but there is reason for it to work on Omeka 2.0 and above.

## Built With

* [Omeka](https://omeka.org/) - The content management software for digital archives that this plugin was built for.

## Authors

* **Alec Wang** - *Developer* - [See github](https://github.com/alexanderlewis99)
* **Austin Mason** - *Project Overseer* - [See github](https://github.com/apjmason)

## License

This project is licensed with The MIT License.

## Acknowledgments

* Thank you Austin Mason for all your guidance, patience, and support you've given me.
* Thank you Carleton for providing amazing opportunities.
* Thank you Sarah Calhoun and Celeste Sharpe for your support.
