# About This Starter Plugin Documentation

Also be working on full docs in github repo (readme, etc), written at a mid-level guiding way (less in the weeds than omeka documentation - write to you, 6 months ago)
https://www.deque.com/blog/great-alt-text-introduction/

When I first began plugin development for Omeka, I had no experience in web development other than just completing a PHP tutorial. When going through [Omeka's Tutorials](http://omeka.readthedocs.io/en/latest/Tutorials/index.html) on OmekadDocs, the website that holds their documentation, I initially found it confusing. I took me awhile to make sense of basic concepts. This starter plugin documentation is designed to help individuals with an understanding of PHP but who are new to either back-end web development or working with Omeka. From this, they should learn basic ideas of web development and how to build plugins in Omeka.

This documentation is structured so that it first explains the concepts of:
1. Web Development Basics
2. Zend Framework
3. Getting Started With Omeka Classic Plugin Development
Then it walks you through the different files in this plugin and how they work. During this part, the ideas introduced in the first few sections will be further explained and demonstrated using the plugin.

If you have questions about Omeka plugin development or Omeka in general, post to their form at: https://forum.omeka.org/.

# Web Development Basics

## The front-end and the back-end
The front end of a website is the part of the website that the users interact with. This includes fonts, colors, lines, buttons, dropdown menus, sliders, and more. It is a mesh of HTML, CSS, and JavaScript being manipulated by your computer’s browser. The responsibility of the front-end web developer is to use this code to design beautiful websites, while ensuring those websites are easy to navigate and have digestible content.

The back-end part of the website consists of a server, an application, and a database that together provide the content that allows the user-facing side of the website to exist. The role of a back-end developer is to use server-side languages, such as PHP, Ruby, Python, and Java, to let these components talk to one another, and to use tools, such as MySQL and Oracle, to locate, add, or change data before sending it to the front-end part of the website.

A full-stack developer works with both the front-end and the back-end.

Plugin development is primarily concerned with back-end web development.

[Click here for more information on web development ](https://blog.udacity.com/2014/12/front-end-vs-back-end-vs-full-stack-web-developers.html)
[Click here for more information on back-end web development ](https://www.upwork.com/hiring/development/back-end-web-developer/)

## LAMP Stacks

A LAMP stack is a type of solution stack. A solution stack (or "software stack") is a complete set of software components that work together to address a given problem by providing a needed  platform or infrastructure. Its two subtypes are a "server stack" and a "web stack." [Wikipedia](https://en.wikipedia.org/wiki/Solution_stack). As LAMP is a web stack, the software components are:
1. the target operating system
2. the web server
3. the database
4. the programming language.
These four parts are responsible for the acronym "LAMP" and act as a platform to serve dynamic content across the web. While they are interchangeable with equivalent software, here is some brief information on the original ones.

### 1. Linux - The Target Operating System
Linux is a Unix-like computer operating system and thus its basic design is assembled from principles established in Unix. It was created under as free and open source software by Linus Benedict Torvalds. As an operating system, Linux serves as the base layer of the LAMP stack, supporting the basic functions of the server.

### 2. Apache - The Web Server
The role of LAMP's web server has been traditionally supplied by Apache, an open source-software, which runs the background process that maintain the server.

### 3. MySQL - The Database
MySQL is a "multithreaded, multi-user, SQL database management system" ([Wikipedia](https://en.wikipedia.org/wiki/LAMP_%28software_bundle%29#MySQL_and_alternatives)) and stores all the information served by Apache.

### 4. PHP - The Programming Language
PHP is a server-side scripting language designed for web development. It can be embedded directly in the HTML of a website and outputs HTML code, allowing the PHP itself to be invisible to the user of the webpage. It lets the user interact with the web content by fetching and displaying information from the database.

# Zend Framework
Zend Framework is a collection of PHP packages that can be used to develop web applications using object-oriented code. [Omeka is built on Zend Framework 2](http://omeka.readthedocs.io/en/latest/whatsnew/2.0.html) and consequently, the code uses a Models Views and Controllers or "MVC" framework and one must interact it using hooks and filters. Both of these concepts will be explained. [Learn more about Zend Framework](https://framework.zend.com/about).

## Hooks
Hooks and filters are a basic way to extend an existing platform or framework with plugins and themes. In this case, we use them to extend the Zend Framework Omeka is built on.

Hooks are a set of special functions that can be used to customize Omeka's existing behavior. Hooks are activated or "fired" at regular points in Omeka's code and if you add your own function onto one of Omeka's preexisting hook, it will be called at those regular points as well. These regular points in the code are called "Actions."

Actions are functions performed when a certain event occurs, such as saving a record, deleting a record, rendering some kinds of pages, constructing the navigation menu, etc. At these regular points, the Hook takes your special function and passes it into a callback function (a function whose parameter is another function). The callback function simply takes the data that your function returns and then uses it.

For more information on hooks, see [OmekaDoc's Tutorial on Understand Hooks ](http://omeka.readthedocs.io/en/latest/Tutorials/understandingHooks.html).

## Filters

Filters modify information and like hooks are activated at regular points in the code. However, they are focused on modifying and returning data instead of simply executing code or outputting data in some particular place. Filter functions always take two parameters.

An example of how they modify data is by adding an additional link to the navigation link array and then returning it. Then when the navigation link array is used to create links, the addition link will be generated.

See [OmekaDoc's Tutorial on Understand Filters ](http://omeka.readthedocs.io/en/latest/Tutorials/understandingFilters.html) for more information.

## Models, Views, and Controllers
Quoted directly from [Omeka's 1.x documentation on the webarchiver](https://web.archive.org/web/20170728215119/http://omeka.org:80/codex/MVC_Pattern_and_URL_Paths_in_Omeka): "The Model-View-Controller pattern is designed to help manage the tasks of describing an object in the database (Model), managing the retrieval and manipulation of that data (Controller), and formatting it for display (View). Keeping these three areas separate makes it easier to understand, maintain, and develop your code. Not every plugin will need to make use of this architecture, but for complex tasks it is essential to understand."

### Model
A Model describes what data is stored in the database for each kind of object. For instance, there are models for Users, Items, Collections, and Files. In the database, a file stores data for its id, item order, size, filename, and original filename as well as many other things. Thus the model for a file includes
```
  public $item_id;
  public $order;
  public $filename;
  public $original_filename;
  public $size = 0;
```
Think of the Model as just the core data representing the thing you are working with: the stuff in the database. Plugins can define their own Models as needed.

### View
The View is the code for the webpage that's displayed. It's usually an HTML page with maybe some PHP in it.

### Controller
Arguably the most complicated of the three, Controllers direct what happens with data when a request is made to the site. Depending on the request, the Controller will retrieve the data from the database, manipulate it if necessary, and then pass it to a View to display.
In Omeka, Controllers have methods called action-methods. Each Action corresponds to a particular View and is called when its View is loaded. The View then handles the display to the user.
If you have a controller at admin/my-plugin/controllers/controller-name/ with an Action, it's corresponding view for that Action will be MyPlugin/views/admin/controller-name/action-name.php.
For instance for the indexAction in IndexController.php located at AccessibilityPlus/controllers, its' corresponding view index.php is in AccessibilityPlus/views/admin/index/.

# Getting Started With Omeka Classic Plugin Development

Omeka has a unique but simple structure for their plugins and advises you to follow their "best practices."

## Omeka (And General) Terminology
* plugin
    - A plugin or plug-in is a piece of software that adds additional features to an existing computer program. See [Omekadoc's Working With Plugins](https://omeka.org/classic/docs/Admin/Adding_and_Managing_Plugins/).
* record
    - A record is a object pulled from Omeka database. This can be anything from a file to an element to a user.
* item
    - An item is what makes up the content of Omeka. It is represented by a record.
* file
    - Files are uploaded to items on Omeka. A file is represented by a record.
* metadata
    - metadata is information about files or items (i.e. Title, Date Created, Creator, etc.).
* element sets and elements
    - "Element Sets are standardized metadata categories that enable you to consistently classify, identify, and sort the digital resources in your Omeka database." [Omekadocs](https://omeka.org/classic/docs/Admin/Settings/Element_Sets/).
    An element is a single attribute of metadata (i.e. Title).
* [Dublin Core](http://dublincore.org/about/)
    - An Element Set used by Omeka.
* global function
    - Global functions are stored in globals.php. They can be called anywhere in the code.
* view helper
    - View helpers are objects in Omeka with functions to assist views. Their functions can only be called by them as opposed to global functions.
* (database) options
    - Options in a database is information stored in the options table. It can be set with the set_option($option_name, $value) function, retrieved with get_option($option_name), and removed with delete_option($option_name).

## Plugin Directory Structure
I highly recommend reading the original tutorial on [OmekaDocs on Plugin Directory Structure ](http://omeka.readthedocs.io/en/latest/Tutorials/pluginStructure.html/) for clearer information. However, to summarize what they say:
* Your plugin folder should be CamelCased, Unique, Simple and Descriptive
* Your plugin folder belongs in the omeka/plugins folder.
* If you plugin folder is Foo then your main plugin file should be named FooPlugin.php
* Your main plugin file should be a subclass of [Omeka_Plugin_AbstractPlugin](http://omeka.readthedocs.io/en/latest/Tutorials/understandingOmeka_Plugin_AbstractPlugin.html).
* You should have a plugin.ini file in your plugin folder, which contains general information about your plugin, and the other plugin files.

## Better Practices
These a few of many recommendations from Omeka's [Best Practices for Plugin Development Tutorial](http://omeka.readthedocs.io/en/latest/Tutorials/bestPracticesPlugins.html). It contains greater detail and I recommend you go take a look at it.
1. Make methods camelCase and start private and protected methods with an underscore.
2. Be careful to not change standard Omeka behavior when overwriting methods.
3. Use View Helpers, which are helper methods for the view class, instead of global functions, which pertain to the whole of the class.
4. Send all processes that may run longer than a typical web process to a job by creating a class that extends Omeka_Job_AbstractJob and running a function from it. Either run using default or long-running depending on how long it’ll take.
5. Set up your plugin’s configuration page using the framework Omeka provides for you. When a user installs or upgrades your plugin, Omeka redirects the user to the configuration page. The data the user submits on that page is sent as a POST (an array of data from the submitted form). You can use the config_form hook to handle that POST and update the options or other settings. You can keep the code to do this in a config_form.php include file.
6. Omeka lets you build forms for records with different options available.
7. Use Omeka’s search_query_types filter and the search_sql hook to add a new search type to Omeka’s search form. This can make your record full-text searchable and customize it with three search query types: keyword (full text), boolean, and exact match.

See [OmekaDoc's Tutorial on Best Practices For Plugin Development ](http://omeka.readthedocs.io/en/latest/Tutorials/bestPracticesPlugins.html) for more information.
See 1.x tutorial: https://web.archive.org/web/20171004172739/http://omeka.org/codex/Plugin_Writing_Best_Practices

## Omeka Forms
While some plugins write out forms using standard HTML, it is better to take advantage of how Omeka uses Zend’s Form_Element class for building forms. After creating a Omeka_Form object, you use the addElement() method which takes three parameters.
1. String $element - which allows you to choose what type of element it is.
    - This can include: button, captcha, checkbox, file, multicheckbox, multiselect, radio, select, submit, text, and textarea.
2. String $name - The name attribute for the form element
3. array $options - Additional options for the form element, such as the label, description, and required.
Also see [OmekaDoc's Tutorial on Understanding Form Elements](http://omeka.readthedocs.io/en/latest/Tutorials/understandingFormElements.html).
For in-depth information, see [Creating Forms Using Zend_Form](https://framework.zend.com/manual/1.10/en/zend.form.forms.html).

# Components of This Plugin
With this brief overview of back-end web development, Zend Frameworks, and Omeka Classic Plugin Development, I will you walk-through the different files of this plugin and how they fit together.

WARNING: As this plugin is updated, differences may occur between what this documentation discusses and the content of the plugin. However, these differences should be minor and the content described here should still be understandable.

## Overall Plugin Layout
This plugin has two primary parts:
1. The form on the admin side that lets users select an element of file metadata.
  * index.php
      - A view with the HTML for the form's webpage.
  * Settings.php
      - Creates the form with the dropdown menu, showing the different types of metadata.
  * IndexController.php
      - A controller that takes information from the form and updates the options table in the database.
2. The code that generates the new alt text.
  * AccessibilityPlusPlugin.php
      - Examines the set option from the databases, retrieves the corresponding metadata and generates the alternative text for images.

## Main Plugin File: AccessibilityPlusPlugin.php

### Overview
This main plugin file, AccessibilityPlusPlugin.php, encodes the two hooks and two filters used by the plugin. This is important for installing and uninstalling the plugin, navigating on the admin sidebar, and replacing the alt-text for images.

The plugin class is constructed as below:

```PHP
class AccessibilityPlusPlugin extends Omeka_Plugin_AbstractPlugin
{

}
```

### Hooks Example

As mentioned before, Hooks are a way to alter the behavior of Omeka. A simple example in AccessibilityPlusPlugin.php is the install hook. In your plugin class, you first add it to an array in your plugin class.

```PHP
  protected $_hooks = array('install');
```
Then you have a function with the word "hook" and then in CamelCase the name of the hook.
In this case, we just have it add the 'alt_text_data' option to our database and set the default value to 'Title'. Thus, when our plugin is installed, this hook fires.

```PHP
  function hookInstall()
  {
    set_option('alt_text_data', 'Title');
  }
```

The uninstall hook works in a similar way.

### Filters Example
As mentioned before, filters modify information and always receive two parameters.

The admin_navigation_main filter is a little different because it has a parameter. The `$args` variable is passed into the hook. `$args` is an array that contains the different arguments for the hook. In this case, `$navArray` is a two-dimensional array (an array of arrays) that is used by Zend to generate the top-level navigation for the admin theme. Our function passes in 'AccessibilityPlus' with its label for the navigation button and generated url to the array. Then by returning it this filter function adds AccessibilityPlus to the admin navigation sidebar menu.

```PHP
public function filterAdminNavigationMain($navArray)
{
    $navArray['AccessibilityPlus'] = array(
        'label' => __("AccessibilityPlus"),
        'uri' => url('accessibility-plus')
    );
    return $navArray;
}
```

The file_markup filter function is more complicated. They key lines of the function are shown below.
```PHP
public function filterFileMarkup($html, $args)
{
  $file = $args['file'];
  if($file->hasThumbnail() || $file->hasFullsize())
  {
      $selected_option = get_option('alt_text_data');
      $newAlt = metadata($file, array('Dublin Core', $selected_option));
      $newCode = 'alt="'.$newAlt.'"';
      $html = substr_replace($html, $newCode, $posStart, $length);
      return $html;
  }
}
```
This time we have two parameters passed to us. The first one is $html, which is the HTML to display a file. Similar to before, $args is passed to us.
```PHP
$file = $args['file'];
if($file->hasThumbnail() || $file->hasFullsize())
```
From `$args`, we retrieve the file record being marked up by FileMarkup.php. Then we ask whether it has an Thumbnail or full size image.

If it does, then we retrieve our 'alt_text_data' option from the database (remember `hookInstall()` added it to the database). `$selected_option` will be something like 'Title' or 'Description'. Then we use the [metadata() function](https://omeka.readthedocs.io/en/latest/Reference/libraries/globals/metadata.html)–one of Omeka's many global functions–to retrieve from the Dublin Core a piece of metadata. The type of metadata is specified by `$selected_option` and comes from our `$file`.

Once we have our metadata–referenced by `$newAlt`–we create the HTML code to represent our alt-text and assign it to $newCode. Then in the `$html`, we use the `substr_replace()` PHP function to replace the alt-text of the image with `$newCode`. (You can see how we found `$posStart` and `$length` using `strpos()` in the main code).

At the end, we return `$html` with our modification.

## Form: Settings.php
Our settings form is the key part of the Admin view: it lets a user select from a dropdown menu  the metadata element they want to use as alt-text for an image file.

First, we create our form with its initializing function with the following:
```PHP
class AccessibilityPlus_Form_Settings extends Omeka_Form
{
    public function init()
    {
        parent::init();
    }
}    
```
Before creating our dropdown menu, we need to retrieve the Dublin Core elements from the database.
```PHP
$valueOptions = array();
$db = get_db();
$table = $db->getTable('Element');
$elements = $table->fetchObjects('SELECT * FROM omeka_elements WHERE element_set_id = 1');
foreach ($elements as $element){
  $element_title = $element->getProperty('name');
  $valueOptions["$element_title"] = "$element_title";
}
```
`$valueOptions` is the array that will hold the Dublin Core elements. We will get these elements through `$db`, which is the [database manager object](http://omeka.readthedocs.io/en/latest/Reference/libraries/Omeka/Db.html) and lets us interact with the Omeka database.
For instance, we use `$table = $db->getTable('Element')` to retrieve the [database table](http://omeka.readthedocs.io/en/latest/Reference/libraries/Omeka/Db/Table.html) of elements. Then from `$table` we use `fetchObjects()` to retrieve all the elements using an SQL query.
The `foreach` loops goes through each element record, retrieves their `name` from the database, and then adds it to the `$valueOptions` array using key-value pairing.

By extending Omeka_Form, we can use `$this->addElement($element, $name, $options)` to build our form instead of writing the HTML. The following code builds our dropdown menu:
```PHP
$this->addElement(
    'select',
    'DublinCore',
    array(
        'label' => 'Dublin Core Metadata Types',
        'multiOptions' => $valueOptions,
      )
);
```
The element is of type 'select'. Its name is 'DublinCore'. The label is 'Dublin Core Metadata Types'. Its `multiOptions` are created using `$valueOptions`.

Our other element is the submit button, which is built similarly.

For aesthetic purposes each are put in their display groups, which create virtual groupings of elements for display purposes.
```php
$this->addDisplayGroup(
    array('DublinCore'),
    'Dropdownmenu'
);
```
Simply, you pass in an array with the names of the different form elements, and then give the grouping a name.

## Controller: IndexController.php
When the submit button of the form is pressed, the information from the form is sent to the controller, IndexController.php.
```PHP
class AccessibilityPlus_IndexController extends Omeka_Controller_AbstractActionController
{
  public function indexAction()
  {
    $form = new AccessibilityPlus_Form_Settings();
    $this->view->form = $form;

    $request = $this->getRequest();
    if ($request->isPost()) {
        if ($form->isValid($request->getPost())) {
            $options = $form->getValues();
            foreach ($options as $value) {
                set_option('alt_text_data', $value);
            }
        }
    }
    return;
  }
}
```
The action function is `indexAction()`, which is a special action function for the view index.php–a view that is loaded from the top-level navigation for the admin theme. This Controller is run when the page request is sent. First, it creates a form and sets it to the view using:
```PHP
$form = new AccessibilityPlus_Form_Settings();
$this->view->form = $form;
```
If also you recall, above, `AccessibilityPlus_Form_Settings()` is part of the constructor for the Omeka form in Settings.php. Thus it is generating the form from the file.
Then it handles the form data:
```PHP
$request = $this->getRequest();
if ($request->isPost()) {
    if ($form->isValid($request->getPost())) {
        $options = $form->getValues();
        foreach ($options as $value) {
            set_option('alt_text_data', $value);
        }
    }
}
return;
```
It uses `getRequest()` to retrieve a page request. If `$request->isPost()` meaning if the information is from a POST (returned from an HTML form). Then since Zend_Form doesn't access data from the POST directly, we have to pass the data in. One of the ways this is done is by the `isValid()` call. If that call returns data, our following lines execute.

`$options = $form->getValues()` retrieves the submitted metadata element from our dropdown menu. However, it is an array, because forms can return multiple values. Thus we use a foreach loop to retrieve the `$value` from `$options` and then use `set_option('alt_text_data', $value);` to update the options table in the database.

## View: index.php
Because the controller passes to our index.php view the Settings form using `$this->view->form = $form;`, the settings form is created in index.php with the simple line: `echo $form;`.
The rest of index.php is simple PHP, [Omeka's img() function](http://omeka.readthedocs.io/en/latest/Reference/libraries/globals/img.html), and HTML code.
