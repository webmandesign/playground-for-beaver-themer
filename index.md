---
layout: home
html_title: Playground for Beaver Themer | WordPress theme
title: Playground for Beaver Themer
subtitle: Barebone WordPress theme by <a href="https://www.webmandesign.eu">WebMan Design</a>
intro_text: Blank, simple, bare base theme for using Beaver Themer (and Beaver Builder) plugin to built your whole website.
intro_image: assets/images/website-sections.png
---

This theme relies solely on using Beaver Themer (and Beaver Builder) plugin to create a whole website. The theme itself does not display any WordPress website content.

It only takes a few moments to create all the theme layouts and views using Beaver Themer and modify it in an easy-to-use drag and drop interface. This simply allows you to create and style any website section to your needs. No coding required.

Actually, the only coding you might need to do, is apply some additional CSS styles based on your needs. Such as typography or forms styles. For information on what basic styles the theme provides, please refer to FAQ section below.

You can obtain Beaver Themer plugin from https://www.wpbeaverbuilder.com/beaver-themer/
You will also need the Beaver Builder plugin, but only the paid version, as the free version is not compatible with Beaver Themer. Get Beaver Builder from https://www.wpbeaverbuilder.com/pricing/
For instructions on how to use Beaver Themer plugin, please check the documentation at https://kb.wpbeaverbuilder.com/


{% include features.html %}


## Frequently Asked Questions

### How can I update the theme?

You can download the newest version of the theme at this very page and overwrite the copy on your server via FTP then.

Or, for automatic theme updates, you can install GitHub Updater (https://github.com/afragen/github-updater) plugin which will take care of the theme updates for you.

### What styles does the theme contain?

Stylesheets are compiled from SASS partial files from within `assets/sass` folder. The theme enqueues 3 stylesheets:

1. `assets/css/normalize.css` - Makes browsers render all elements more consistently and in line with modern standards. More info at https://necolas.github.io/normalize.css/
2. `assets/css/base.css` - The RTL (Right To Left) languages ready stylesheet containing basic styles for:
  - border box sizing on all elements,
  - inheriting border color from parent elements,
  - basic typography styles, line height, default font families, and heading sizes,
  - vertical spacing for most block elements,
  - headings, blockquote, preformatted text and table elements,
  - form elements and buttons,
  - required `.screen-reader-text` accessibility class,
  - default WordPress alignments (please note that optional `.alignwide` and `.alignfull` classes are not styled),
  - image captions,
  - comments,
  - gallery,
  - images and other embed media,
  - logo,
  - pagination,
  - widgets.
3. If a child theme is used, it also enqueues child theme's `style.css` file.

### What styles are not contained in the theme?

Basically, all styles above are very basic. In most cases they are sufficient enough, but in certain cases you might need to style your website elements to your needs using additional CSS code. For example, you could wish to style comments to your needs, or form elements, or links colors and behavior.
Please feel free to put your custom CSS code into **Appearance &rarr; Customize &rarr; Additional CSS**, or into your child theme's `style.css` file.

### How can I set up custom fonts?

If you would like to set up custom fonts for your website, such as Google Fonts or Adobe Fonts, the simplest solution is to use a dedicated plugin: https://wordpress.org/plugins/search/fonts/
Other than that you could use your child theme to load your custom font files into your website and use a custom CSS code to apply it on your website elements.

### Are there any theme options?

Yes, just a few. You can find those under **Appearance &rarr; Customize &rarr; Theme Options**.

### How can I set `$content_width` global theme variable?

You can do this directly in theme options at **Appearance &rarr; Customize &rarr; Theme Options &rarr; Layout &rarr; "Content width"**. Or you can set the `PFBT_CONTENT_WIDTH` PHP constant in your child theme's `functions.php` file.

### What hooks are available in the theme?

The theme contains several helpful action and filter hooks you can use to hook your child theme functionality to or modify the theme variables.

Available hooks:

- `pfbt_html_before` - action hook in `header.php` file,
- `pfbt_body_top` - action hook in `header.php` file,
- `pfbt_header_before` - action hook in `header.php` file,
- `pfbt_header_after` - action hook in `header.php` file,
- `pfbt_content_before` - action hook in `header.php` file,
- `pfbt_content` - action hook in `index.php` file,
- `pfbt_content_after` - action hook in `footer.php` file,
- `pfbt_footer_before` - action hook in `footer.php` file,
- `pfbt_footer_after` - action hook in `footer.php` file,
- `pfbt_body_bottom` - action hook in `footer.php` file,
- `pfbt_content_width` - filter hook in `includes/class-setup.php` file.
Please check the file containing the hook for more info.

### Can I use a child theme?

Sure! You can even grab a sample child theme from https://github.com/webmandesign/child-theme
