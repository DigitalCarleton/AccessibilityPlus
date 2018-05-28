Also be working on full docs in github repo (readme, etc), written at a mid-level guiding way (less in the weeds than omeka documentation - write to you, 6 months ago)
https://www.deque.com/blog/great-alt-text-introduction/

# This Document

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

A LAMP stack is a type of solution stack. A solution stack (or "software stack") is a set of software components that work together to create a complete platform. They work so well that no additional software is needed to support them [Wikipedia](https://en.wikipedia.org/wiki/Solution_stack). As LAMP is a web application solution stack, the software components are:
1. the target operating system
2. the web server
3. the database
4. the programming language.
These four parts are responsible for the acronym "LAMP" and act as a platform to build dynamic web sites and run web applications. While they are interchangeable with equivalent software, here is some brief information on the original ones.

### 1. Linux - The Target Operating System
Linux is a Unix-like computer operating system and thus its basic design is assembled from principles established in Unix. It was created under as free and open source software by Linus Benedict Torvalds.
"An operating system (OS) is system software that manages computer hardware and software resources and provides common services for computer programs." - Wikipedia

### 2. Apache - The Web Server
Information on what Web Servers are

### 3. MySQL - The Database
Information on what databases are

### 4. PHP - The Programming Language
Information on what programming languages are

# Zend Framework
A brief description (with links) of the fact that Omeka is built on it.
The MVC framework info would go there along with hooks and filters as a basic means of extending a framework.
MVC, hooks, and filters work with the Zend Framework

## Hooks
See [OmekaDoc's Tutorial on Understand Hooks ](http://omeka.readthedocs.io/en/latest/Tutorials/understandingHooks.html) for more information.
Hooks and filters are a basic way to extend an existing platform or framework with plugins and themes. You might want to find and read something on Wordpress hooks and plugins to be able to abstract out the general concepts from what is unique to each CMS.

## Filters

See [OmekaDoc's Tutorial on Understand Filters ](http://omeka.readthedocs.io/en/latest/Tutorials/understandingFilters.html) for more information.

## Models, Views, and Controllers

"The Model-View-Controller pattern is designed to help manage the tasks of describing an object in the database (Model), managing the retrieval and manipulation of that data (Controller), and formatting it for display (View). Keeping these three areas separate makes it easier to understand, maintain, and develop your code. Not every plugin will need to make use of this architecture, but for complex tasks it is essential to understand."

See Omeka's [1.x documentation](https://web.archive.org/web/20170728215119/http://omeka.org:80/codex/MVC_Pattern_and_URL_Paths_in_Omeka) on the web archiver for further information on Models, Views, and Controllers.

Redirect to other resources
Rough understanding of what each one does

# Getting Started With Plugin Development

Then your final section would focus on how all this is implemented in omeka itself. Does that make sense?

See [OmekaDoc's Tutorial on Plugin Directory Structure ](http://omeka.readthedocs.io/en/latest/Tutorials/pluginStructure.html/) for more information.

See [OmekaDoc's Tutorial on Best Practices For Plugin Development ](http://omeka.readthedocs.io/en/latest/Tutorials/bestPracticesPlugins.html) for more information.
See 1.x tutorial: https://web.archive.org/web/20171004172739/http://omeka.org/codex/Plugin_Writing_Best_Practices

# Components of This Plugin

## Main Plugin File: AccessibilityPlusPlugin.php

Information about the main file and how it works.

## Model: Settings.php

## Controller: IndexController.php

## View: index.php
