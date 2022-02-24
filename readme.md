# AccessibilityPlus

## Getting Started

To use this plugin, go to the folder of your installation of Omeka and place the AccessibilityPlus folder in omeka/plugins.

Then on the admin view of your Omeka website, click the "plugins" button on the navigation bar at the top of the page. Find Accessibility Plus in the list of your plugins and click the "Activate" button.

Your admin's navigation bar on the left side of the webpage should now have an "Accessibility Plus" button. Clicking on it should take you to the configuration page. Select from the dropdown menu the Dublin Core Metadata element you want to used to generate alt-text for images. It is recommended to use "Title" or "Description" or if you have installed the plugin [Dublin Core Extended](https://omeka.org/classic/plugins/DublinCoreExtended/) "Alternative Title."

## Features

### Alt-Text

Alternate Text or Alt-Text is the text that helps users understand the content of an image without needing to view the image. It is used by screenreader users, users with slow internet connections, and individuals with cognitive disabilities who need fewer distractions on webpages. ([Read more about alt-text here](https://www.deque.com/blog/great-alt-text-introduction/)). 

Generally, web designers should take the time to handwrite alt-text for every image on their site. However, an Omeka developer may decide that a metadata element for an item may be a sufficient description for an image. This plugin allows developers to automate the process.

Omeka by default uses the image filename to generate the alt-text, but filenames can frequently be indecipherable (i.e. DSC00891.jpg). To address this issue, this plugin lets you choose a metadata element from the Dublin Core (such as "Title" or "Description") to be used as the alt-text. If the element you choose is missing from an image, then this plugin will use the item title by default. If the title is also missing, the filename is used. So far this only enhances alt-text for full-sized images on Omeka, not thumbnails. The plugin Dublin Core Extended adds the full set of Dublin Core properties, include alternative title for alt-text.

Before using this feature, developers should ensure that the metadata element provides a sufficient description for the images they display.

### Keyboard Focus Outlines

Developers now have the option of enhancing the tab-focus outlines of HTML elements by choosing a high-contrast color. Many users with disabilities (motor function, cognitive, visual, etc.) use the tab-focus feature to navigate sites instead of a keyboard and mouse. Choosing a sharper color for the focus outlines can help these users better navigate the website. Developers can input hex code colors or CSS color names to choose the color of the focus outline.

## Long-term Goals

- Skip navigation links (these help screen-reader users skip directly to a site's content)
- Enforce alt-text when chosen metadata element is empty
- Enable customizable alt-text to override the chosen metadata element
- Add admin view which allows admin to view the alt-text of items and gives advice on how to write good alt-text
- Color contrast tester


## Prerequisites

This plugin was designed for Omeka 2.7. AccessibilityPlus will not work on any version of Omeka older than 2.7 because it relies on a filter that was only introduced in this release.

## Built With

* [Omeka](https://omeka.org/) - The content management software for digital archives that this plugin was built for.

## Authors

* **Alec Wang** - *Developer* - [See github](https://github.com/alexanderlewis99)
* **Chris Padilla** - *Developer* - [See github](https://github.com/padillac)
* **Austin Mason** - *Project Overseer* - [See github](https://github.com/apjmason)

## License

This project is licensed with The MIT License.

