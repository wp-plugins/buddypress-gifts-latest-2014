=== Buddypress Gifts latest 2014 ===

Contributors: Amreeta Ray
Tags: buddypress, gifts, updated, latest, 2014, social networking, fun, community
Requires at least: WordPress 3.8.1, BuddyPress 1.9.1
Tested up to: WordPress 3.8.1 / BuddyPress 1.9.1
Stable tag: 1.7

Latest development of popular plugin Buddypress Gifts. Send a gift image and message to user in BuddyPress profile using activity stream function.

== Description ==

This plugin is based on Buddypress Gifts developed by Warut and later given rebirth by Slawomir Kroczak. Because this author also abandoned his project I have decided to give it third life.

Kindly note:-

I have updated plugin to version 1.2+. if you get a redeclare error in your admin page after activating the new plugin than you need to deactivate the old plugin starting with bp-gift and than you can activate the new plugin starting with buddypress-gift . This will solve your error.

Buddypress Gifts latest 2014 gives user ability to send gifts image to other members in BuddyPress. It use activity stream to keep the gifts sent information.

Member can choose a gift from gift box in others member gifts tab and type a message to receiver member.
Receiver member can delete or reply message using activity stream function in own profile.
Administrator can upload delete and edit gifts item in backend admin dashboard

Note-This plugin at present is not fully compaible with Multisites. Work is under progress and very soon we will update the plugin to work for multisites. Users can test and report bugs.

It is now integrated to MyCred point system as Well. But at a time only single point system will owrk not both.

== Installation ==

1. Upload buddypress-gifts-latest-2014 to the /wp-content/plugins/ directory or use automatic installation from wp plugin panel
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Buddypress Plugins need to be installed and either of Cubepoints or MyCred plugins to be installed for this plugin to work.

* best to upload 64*64px image to buddypress-gifts-latest-2014/includes/images before activate if want to use own gifts image or add one by one in admin dashboard

== Frequently Asked Questions ==

= What if i use a different theme? =

BuddyPress Gifts plugin will work out-of-the-box with nearly every WordPress theme.

If you have any issue you can send a bug report.


= Where can I get support? =


The support forums can be found at <a href="http://smartyblog.com/forums/">http://smartyblog.com/forums/</a>.



= Where can I find documentation? =


The documentation codex can be found at <a href="http://smartyblog.com/">http://smartyblog.com/</a>.



= Where can I report a bug? =


Report bugs at <a href="http://smartyblog.com/">http://smartyblog.com/</a>.

== Screenshots ==

1. Send gifts image to other members in BuddyPress.
2. Administrator can upload delete and edit gifts item in backend admin dashboard 


== Changelog ==

= 1.0 =
* first beta release version 
* no clean uninstall. have to manual delete buddypress-gifts-rebirth table and activity stream after uninstall 
= 1.1 =
* cubepoints is now fully integrated. Viewers can send a gift only if they have required number of points for that gift. 
* previous and next button added to the image carousel. 
= 1.2 =
* problem with notification solved. 
* condition added for sending gift. required points not met gift cannot be send.
* Tried to solve the multisite issue. Found Bugs than Kindly report in the support section so that i can edit my plugin accordingly. 
* Further the image linking problem resolved.
= 1.3 =
* Cubepoint related errors corrected
* Big images deleted
* wordpress database error corrected
= 1.4 =
* Added MyCred Point system. Any gifts sent will deduct mycred points(if it has any) from the user.
= 1.5 =
* Based on user requirements integer value of points is changed to floating point so you can have for eg 5.52 points.
= 1.6 =
* MyCred point deduction error rectified. Reason was myCred  API changes after version 1.4.
= 1.7 =
* I updated this without any code changes. Previous version 1.6 loaded incorrectly to SVN. Sorry for that.