=== lj tag parser ===
Contributors: alibee
Tags: livejournal, ljcut, ljuser, ljcomm
Requires at least: 2.3.3
Tested up to: 2.7.4
Stable tag: 0.5

Replaces lj user, lj comm, and lj-cut tags with correct HTML code. This means your lj-cuts will behave like "more"s!

== Description ==

Replaces &lt;lj user="username"/&gt;, &lt;lj comm="community"/&gt;, and &lt;lj-cut text=""&gt; with correct HTML code. This means your lj-cuts will behave like "more"s!

== Installation ==

1. Upload `lj-tag-parser` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. MAKE SURE that under Setting/Writing/Formatting, "WordPress should correct invalidly nested XHTML automatically" is NOT checked.
4. If you are using JournalPress and want to use lj-cuts, you need to make some changes to the code in jpfunctions.php (essentially, you need to change the parsing of cut tags from mores to lj-cuts).

== Changelog ==

= 0.5 =
* More readme issues. Ugh!

= 0.4 =
* Removed ^Ms. Ah, the "joy" of Windows. ;)

= 0.3 =
* Fixed up the community icon to render correctly.

= 0.2 =
* Tested up to the current version of WP, woot!

= 0.1 =
* Initial release. Please let me know if you find any issues with it! :D
