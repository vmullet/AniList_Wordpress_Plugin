# AniList-Wordpress-Plugin

This AniList wordpress plugin will help you to manage/display your animeList on your website. This plugin uses the aniList API which you can find there : https://anilist-api.readthedocs.io

The plugin uses a cache system to load the data from your aniList profile directly in your wordpress database. It also has its own settings page to setup the diferent informations needed such as 

- 'username'

- 'client_id'

- 'client_secret'

etc...

##Functionalities

Actually, the plugin uses the Oauth 2.0 system with aniList API so the token is refreshed when it becomes invalid (token validity checked just before to cache your data)

Working functionalities :

- Token management (validity check/refresh)

- Get animeList with all data (check anilist_anime.class.php)

- Get anime staff with all data (check anilist_person.class.php and anilist_staff.class.php)

- Get anime characters with all data (seiyuu included , check anilist_character.class.php)

###Notes :

_This plugin is still in development so diferent functionalities still need to be added_ like modify,add,delete elements to your profile/animelist.

##Project Structure

The project contains the following folders :

- cache : Folder containing files related to the cacheSystem

- managers : Folder containing manager classes which are generic php singleton (Some can be reused easily in other plugins)

- menu : Folder containing files related to the settings page (functions to register/display the plugin menu in the settings page)

- model : Folder containing the diferent classes for a better management in your template

- sql : Folder containing sql scripts to create tables to store aniList API data (automatically created when plugin is enabled)

>_At the root folder, you have the main file of the plugin : wp-anilist.php_

##Cache System

The plugin loads the API data directly in your database. These data can be refreshed periodically by using a cron Task / Job. You can use a cron Job by using the cronJob of Wordpress or create yours directly on your webServer.

Two files are involved in the cacheSystem : 

- **anilist_cacheManager.class.php** in managers folder (contain cache function to get API data and insert them in your database)

- **anilist_cacheLoader.php** in cache folder (contain the cache_loader function to check/refresh token and cache all data)

>_Instructions on how to use the cache are explained in the Installation part_


##Database System

All API data are stored in your wordpress database. SQL scripts to create these tables are stored in the sql folder

Table names are the following :

- wp_anilist_animelist
- wp_anilist_characters
- wp_anilist_profile
- wp_anilist_staff


##Installation

You just need to copy the wp-anilist directory in your wordpress plugin directory.
Once you have done that, you have to enable the plugin
(database tables will be automatically created)

Then , in your admin dashboard, go to the **Settings->AniList API** and fill the diferent fields with your profile informations

**Cache System :**

- You have to create a php template file containing the following code at the root of your theme directory :

    
        /* 
        Template Name: AniList Cache Load
        */
    
        get_header();

        if (!anilist_tokenManager::Instance()->isTokenValid()) {

        $token = anilist_tokenManager::Instance()->options['anilist_token'];
        echo "The token ".$token." is not valid anymore";

        anilist_tokenManager::Instance()->refreshToken();

        $token = anilist_tokenManager::Instance()->options['anilist_token'];
        echo 'It was replaced by '.$token;

        }

        anilist_load_cache();

        get_footer();

- After that , create a new blank page based on the template 'AniList Cache Load' and run it .

**IMPORTANT :You will use this page url with your cronJob/Task to refresh your API data**

- And to display all of these data, you can create your own aniList template and put some code like this at the top :


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
       
        
##LICENSE

This project is licensed under the GNU Public License 3.0


    





