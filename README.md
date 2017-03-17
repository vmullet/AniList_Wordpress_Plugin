# AniList-Wordpress-Plugin

This AniList wordpress plugin will help you to manage/display your animeList on your website. This plugin uses the aniList API which you can find there : https://anilist-api.readthedocs.io

The plugin uses a cache system to load the data from your aniList profile directly in your wordpress database. It also has its own settings page to setup the diferent informations needed such as 

- 'username'

- 'client_id'

- 'client_secret'

etc...

## Functionalities

Actually, the plugin uses the Oauth 2.0 system with aniList API so the token is refreshed when it becomes invalid (token validity checked just before to cache your data)

Working functionalities :

- Token management (validity check/refresh)

- Get animeList with all data (check anilist_anime.class.php)

- Get anime staff with all data (check anilist_person.class.php and anilist_staff.class.php)

- Get anime characters with all data (seiyuu included , check anilist_character.class.php)

### Notes :

_This plugin is still in development so diferent functionalities still need to be added_ such as modify,add,delete elements to your profile/animelist.

##Project Structure

The project contains the following folders :

- managers : Folder containing manager classes which are generic php singleton (Some can be reused easily in other plugins)

- menu : Folder containing files related to the settings page (functions to register/display the plugin menu in the settings page)

- model : Folder containing the diferent classes for a better management in your template

- sql : Folder containing sql scripts to create tables to store aniList API data (automatically created when plugin is enabled)

- templates : Folder containing templates pages to manage actions such as caching data,api actions (add,update,delete)

>_At the root folder, you have the main file of the plugin : wp-anilist.php_

## Cache System

The plugin loads the API data directly in your database to avoid too many direct api calls. These data can be refreshed periodically by using a cron Task / Job. You can use a cron Job by using the cronJob of Wordpress or create yours directly on your webServer.

Two files are involved in the cacheSystem : 

- **anilist_cacheManager.class.php** in 'managers' folder (contain cache function to get API data and insert them in your database)

- **template-anilist-cache.php** in 'templates' folder (this file uses anilist_cacheManager methods to check/refresh token and cache all data)

>_Instructions on how to use the cache are explained in the Installation part_


## Database System

All API data are stored in your wordpress database. SQL scripts to create these tables are stored in the sql folder

Table names are the following :

- wp_anilist_animelist
- wp_anilist_characters
- wp_anilist_profile
- wp_anilist_staff


## Installation

You just need to copy the wp-anilist directory in your wordpress plugin directory.
Once you have done that, you have to enable the plugin
(database tables,options,pages and files will be automatically created)

Then , in your admin dashboard, go to the **Settings->AniList API** and fill the diferent fields with your profile informations (username,client_id,client_secret and refresh_token)

**IMPORTANT : When you disable the plugin , everything is removed (tables,options,pages and copied files) in order to keep your wordpress installation clean**

**Cache System :**

- A page called AniList Cache is automatically created. It is based on template-anilist-cache.php

- The url of this page is : your_site_url/anilist-cache

- To display all of these data, you can create your own aniList template and put some code like this at the top :


        /*
        Template Name: AniList AnimeList
        */

        $ani_profile = anilist_profile::Instance();
        $ani_list = anilist_animelistManager::Instance();

        $ani_profile->LoadProfile();
        $animeList = $ani_list->LoadAnimeList();
    
_Note : $animelist is an array of anime objects_

- Then , you can use some methods like this one to display what you want in a **_foreach loop_**

        $anime->getAnimeTitleEnglish();
       
        
## LICENSE

This project is licensed under the GNU Public License 3.0
