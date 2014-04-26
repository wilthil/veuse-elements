Veuse Elements
===========

Veuse Elements has a myriad of useful shortcodes and widgets for your website. It is especially made to be used with <a href="http://wordpress.org/plugins/siteorigin-panels/">Page Builder plugin</a> by SiteOrigin.

View demo: http://veuse.com/veuse-uikit

##How to use
 

**Installation**

Upload the veuse-elements folder to your plugins folder. In your wp-admin, go to Plugins and activate the Elements by Veuse plugin.


***


**Customizing plugin files**

The files that display your widgets content are all located in the _views/front/_ directory. They are all named locically.

I strongly advice you do not change any files in the plugin directly, as any changes you make will be overwritten if you update the plugin. The best approach is to make a copy of the files you want to customize, and put it in your theme folder. 

To keep things organized, I recommend you create a folder in your theme called veuse-elements, and put the files in there. The theme files will automatically override the plugin files. Remember that the file names must be the same as in the plugin files.

***

**Disable plugin stylesheet**

If you want to deregister the plugin styles, and add your own styles via your theme, you should add the following code to your themes functions.php:

    function my_deregister_elements_styles() {
        wp_deregister_style( 'veuse-elements-styles' );
    }
    add_action( 'wp_enqueue_scripts', 'my_deregister_elements_styles', 100 );

***

**Shortcodes**

Most of the functionality in Elements by Veuse can be inserted via widgets on your pages and posts, if you have the Page Builder plugin by SiteOrigin installed and activated.

If you don't want to, or can't use the Page Builder, you can insert the shortcodes manually. 


***


**Widgets**

More than 14 custom widgets are included.

* Alert widget: Insert an alert/notice on your page.
* Button widget: For inserting buttons
* Callout widget: For inserting call-to-action sections
* Divider widget: For inserting divider lines, with or without text and icons
* Download widget: For inserting a call-to-action box for downloading documents
* Iconbox widget: For inserting a styled section with icon, title, description and link
* Image widget: For inserting an image from the media library. Uses the wordpress media uploader.
* Featured page widget: For inserting parts of other pages in a styled box with (optionally) featured image, page title, excerpt and link.
* Posts widget: For inserting a list of posts from chosen categories
* Postslider widget: For inserting a slider with the recent post from selected categories.
* Progressbar widget: For inserting a styled progressbar
* Image slider widget: For inserting sliders
* Tab widget: For inserting a tab in a tabbed panel
* Toggle widget: For inserting a toggle.
* Vertical tab widget: For inserting tabs in a tabbed panel, with a vertical navigation
* Testimonial widget

**Most of the shortcodes in veuse-uikit can be inserted via widgets on your pages and posts if you have the <a href="http://wordpress.org/support/plugin/siteorigin-panels">Page Builder plugin by SiteOrigin</a> installed and activated.** 

If you don't want to, or can't use the Page Builder, you can insert the shortcodes manually. For a full reference, see below.



##Shortcode reference

### Alerts

    [veuse_alert icon="" color=""] The text you want to display [/veuse_alert]

**Attributes**
- Color: white, red, yellow, green, grey or blue ( Optional. Default is blue )
- Icon: Select any Fontawesome icon from http://fontawesome.io. Leave out fa- in the icon name. Write only icon name like '_star-o_' ( Optional. Default is NULL )

***

###Buttons

    [veuse_button href="" size="" color="" style="" align="" target="" width="" icon="" bevel="" ]

**Attributes**
- href: the url you want the button to link to ( Required ).
- size: tiny, small, medium, large ( Optional. Default is small ) 
- align: left, right, none, justif ( Optional. Default is none )
- target: none or blank to open link in new tab/window.
- icon: Select any Fontawesome icon from <http://fontawesome.io/icons>. Leave out fa- in the icon name. Write only icon name like '_star-o_'


***

### Attachment Download

The download-shortcode inserts a section with title, description and a button linking to your attachment file. Great for inserting call-to-actions for i.e. downloading pdf's. 

    [veuse_download id="" title="" button_text=""] Some descriptive text here, like an excerpt [/veuse_download]

**Attributes**
* title: A title text to go with the download-box ( Required )
* id: the id of the file you want to be downloaded ( Required )
* button_text: The text for the link ( Default is _Download_ )

***
### Callout

The callout-shortcode inserts a call-to-action section on your page. Great for conversions.

    [veuse_callout caption="" link="" buttontext="" color="" icon="" ]

**Attributes**
* caption: The text to go in the callout section. ( Required. Default: None )
* link: The url you want the button to point to ( Required. Default: None )
* buttontext: The text for the link/button ( Required. Default: None )
* color: The color of the callout-section ( Optional. Default: None )
* icon: The name of the fontawesome-icon you want to use ( Optional. Default None )


***

### Dividers
    [veuse_divider title="" icon="" textstyle="" alignment=""]

**Attributes**
* title: Text to go in the dividerline
* icon: Enter name of fontawesome icon to go in the dividerline. See <http://fontawesome.io>
* textstyle: Text size ( h3, h4, h5, h6 or paragraph. Optional. Default: h4 )
* alignment: Position of text and icon in dividerline ( left, center or right. Optional. Default: center )

***
### Featured page
    [veuse_page id="" imagesize="" custom_imagesize="" link="" button_text="" image=""]

**Attributes**
* id: The id of the page you want to pull content from
* imagesize: Enter name of imagesize ( Thumbnail, Medium, Large, or any other registered imagesize. Optional. Default: medium)
* custom_imagesize: Manually define an exact image size ( Example: If you enter 300*200, it will output an image of 300px * 200px )
* link: Selec if you want to add a link to the full version of the page. Enter _true_ or _false_. ( Optional. Default: true )
* button_text: The text you want in the link/button. (Optional. Default: Read more )
* image: Select if you want to display the pages featured image. ( true or false. Default: true )

***
### Posts slider
    [veuse_postslider categories="" perpage="" order="" orderby="" width="" height=""]

**Attributes**
* categories: The id's of the categories you want to pull posts from
* perpage: How many posts to show ( -1 == all posts )
* order: The order for the posts. Ascending (ASC) or descending (DESC). Optional. Default is DESC
* orderby: Order post by title or date ( Optional. Default id date )
* width: Value for slider width, calculated in pixels ( Optional. Default is 600 ).
* height: Value for slider height, calculated in pixels ( Optional. Default is 300 ). 

***
### Progress bars
    [veuse_progressbar width="" color="" title=""]

**Attributes**
* title: A caption text for the progress bar
* color: Set color for the bar ( red, green, yellow, blue, orange, black, lightblue, silver, red, pink, purple, magenta, lightgreen, forrestgreen, darkblue, darkbrown, brown, grey )
* width: A percentage value (A value of 90 == 90%. Do not enter % letter ) 

***

### Tab
    [veuse_tab title="" icon=""] Tab content goes here [/veuse_tab]

**Attributes**
* title: The tab button text
* icon: Add name of fontawesome icon you want to use. ( Optional. Default is NULL. View fonts at <http://fontawesome.io>

***

### Testimonial
    [veuse_testimonial name="" designation=""] Testimonial text goes here [/veuse_testimonial]

**Attributes**
* name: The name of the testimonial writer
* designation: The testimonial writers job title

***


### Toggle
    [veuse_toggle title="" icon=""] Toggle content goes here [/veuse_toggle]

**Attributes**
* title: The toggle button text
* icon: Add name of fontawesome icon you want to use. ( Optional. Default is NULL. View fonts at <http://fontawesome.io>


***

### Vertical tab
    [veuse_verticaltab title="" icon=""] Toggle content goes here [/veuse_verticaltab]

**Attributes**
* title: The tab button text
* icon: Add name of fontawesome icon you want to use. ( Optional. Default is NULL. View fonts at <http://fontawesome.io>

***



