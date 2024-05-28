# JM-news
A news plugin for wordpress
(img, title, date, excerpt and link)

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description ##

News are order by pub date.
A post type "NEWS" is added.
Shortcodes

**Shortcodes**
*All shortcodes can combines!*
* [news]
Number:
* [news number=2]
Offset:
* [news offset=3]
Order:
* [news order=desc] - *default*
* [news order=asc]
Categories:
* [news cat=1]
* [news cat=1,2,4]
Columns / grid *(CSS grid styling)*:
* [news col=2]
* [news col=3]
* [news col=4]
* Related *(Print this shortcode on the single news sidebar, and it shows news in the same category)*:
* [news type=related]

**Shortcode page design examples**
*  2 - 4 grid:
* [news number=2 col=2] [news col=4 offset=2]
2 - 4 grid *(only category 3)* :
* [news number=2 col=2 cat=3] [news col=4 offset=2 cat=3]

== Installation ==
Place the JM-News folder in your wp-content/plugins folder
Activate the plugin
Save permalink structure again
Publish some news with the new post type = NEWS
Use the shortcodes on a published page
