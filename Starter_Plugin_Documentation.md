# About This Starter Plugin Documentation

Also be working on full docs in github repo (readme, etc), written at a mid-level guiding way (less in the weeds than omeka documentation - write to you, 6 months ago)
https://www.deque.com/blog/great-alt-text-introduction/

Information about this starter plugin documentation and the plugin itself

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

The MVC framework info would go there along with hooks and filters as a basic means of extending a framework.
MVC, hooks, and filters work with the Zend Framework

## Hooks
Hooks and filters are a basic way to extend an existing platform or framework with plugins and themes.

Hooks are a set of special functions that can be used to customize Omeka's existing behavior. Hooks are activated or "fired" at regular points in Omeka's code and if you add your own function onto one of Omeka's preexisting hook, it will be called at those regular points as well. These regular points in the code are called "Actions."

Actions are functions performed when a certain event occurs, such as saving a record, deleting a record, rendering some kinds of pages, constructing the navigation menu, etc. At these regular points, the Hook takes your special function and passes it into a callback function (a function whose parameter is another function). The callback function simply takes the data that your function returns and then uses it.

A simple example is the install hook. Let's say you have a function that calls Omeka's add_option hook. In your plugin class, you first add it to an array in your plugin class.

```PHP
  protected $_hooks = array('install');
```
Then you have a function with the word "hook" and then in CamelCase the name of the hook.
In this case, we just have it add the 'alt_text_data' option to our database and set the default value to 'title'. Thus, when our plugin is installed, this hook fires.

```PHP
  function hookInstall()
  {
    set_option('alt_text_data', 'title');
  }
```
For more information on hooks, see [OmekaDoc's Tutorial on Understand Hooks ](http://omeka.readthedocs.io/en/latest/Tutorials/understandingHooks.html).

## Filters

Filters modify information and like hooks are activated at regular points in the code (see Understanding Filters).
You can add your own functions calls in a filter to add data, such as adding an additional link to the navigation link array.

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
The View is the code for the webpage that's displayed. It's usually an HTML page with PHP in it.

### Controller
Arguably the most complicated of the three, Controllers direct what happens with data when a request is made to the site. Depending on the request, the Controller will retrieve the data from the database, manipulate it if necessary, and then pass it to a View to display.
In Omeka, Controllers have methods called action-methods. Each Action corresponds to a particular View and is called when its View is loaded. The View then handles the display to the user.
If you have a controller at admin/my-plugin/controllers/controller-name/ with an Action, it's corresponding view for that Action will be MyPlugin/views/admin/controller-name/action-name.php.
For instance for the indexAction in IndexController.php located at AccessibilityPlus/controllers, its' corresponding view index.php is in AccessibilityPlus/views/admin/index/.

# Getting Started With Omeka Plugin Development

See [OmekaDoc's Tutorial on Plugin Directory Structure ](http://omeka.readthedocs.io/en/latest/Tutorials/pluginStructure.html/) for more information.

See [OmekaDoc's Tutorial on Best Practices For Plugin Development ](http://omeka.readthedocs.io/en/latest/Tutorials/bestPracticesPlugins.html) for more information.
See 1.x tutorial: https://web.archive.org/web/20171004172739/http://omeka.org/codex/Plugin_Writing_Best_Practices

# Components of This Plugin

Then your final section would focus on how all this is implemented in Omeka itself.

## Main Plugin File: AccessibilityPlusPlugin.php

Information about the main file and how it works.

## Form: Settings.php

## Controller: IndexController.php

## View: index.php
