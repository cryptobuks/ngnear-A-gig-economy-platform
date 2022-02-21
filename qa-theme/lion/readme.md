#Lion Theme
####Version 1.0.5-beta
_**Release Date:** 24th January 20197_

## What's new in version 1.0.5-beta
- Fixed mobile login button issue for iOS with new design
- Replaced login/auth box with the dropdown to provide better experience.
- Fixed drawer elements order for RTL 
- Replaced/Renamed `lion-desktop*.css` with `lion-large*.css`
- `get_auth_button()` function is removed

##Installation
- Unzip the package
- Upload `lion-launcher`, `qa-theme` and `qa-plugin` folders to your Question2Answer root (where `qa-config.php` is placed) directory.
- Done

###Activation
To activate Lion theme on mobile
- Login as an ***Admin***
- Go to `Admin > General`
- Set the ***Site Theme*** to ***Lion***
- Set the ***Theme for mobiles*** to ***Lion***
- Done

###Required Steps

####Step 1
To allow color settings from the theme options panel, the `CSS` file must have write permission `744`. If you are getting any trouble seeing colors or kind of broken design and layout, first make sure the following file is having correct permissions.

- `lion-colors.php` in qa-theme/lion/css/ should have `744` permission

####Step 2
Once you checked and done with the file permission, the next step is to set the default theme options. To do that follow the steps below.
- Sing in as an Admin
- Go to Admin section
- On the Admin sub navigation find the `Lion Options` menu item. ***note:** usually it should be the last nav item*
- On the option page, hit the `Save Options` and `Factory Reset` button couple of times. This will create a database record and make theme settings ready to use for your website. 

###Configuration
The Lion theme utilizes the native / core configuration for its UI design. However, we may add additional configuration based on features we add in future version. Do following settings to set the Lion theme UI as exptected.
- Login as an ***Admin***
- Go to `Admin > Users`
- Set the ***Maximum size for storing avatars*** to minimum `512` pixels.
- Set the ***Default avatar*** (it should have `1:1` aspect ration. This means it should be square e.g. `512 x 512` pixels)
- Set the ***Avatar size on user profile page*** to `400` pixels
- Set the ***Avatar size on top users page*** to `400` pixels
- Set the ***Avatar size on questions*** to `64` pixels
- Set the ***Avatar size on answers*** to `64` pixels
- Set the ***Avatar size on comments*** to `32` pixels
- Set the ***Avatar size on question lists*** to `42` pixels
- Set the ***Avatar size on message lists*** to `20` pixels
- Go to `Admin > Lists`
- Set the ***Length of Users page*** to `30` or the number can be divide by `3` This is becuuse the Users page has 3 column grid.

###Theme Options and Color Settings
Lion theme is providing option to customize your theme color. This will helps you to set your Lion theme with your brand color or as per your choice. We have try to keep settings minimal as possible to make it more easier and peasant to set colors of your choice.

![alt text][screenshot]

####Theme Options
Follow the steps below to setup the Lion theme colors.
- Login to your Q2A website as an Admin
- Go to Admin section
- On the Admin sub navigation find the `Lion Options` menu item. ***note:** usually it should be the last nav item*
 
 ####Available Options

**Body Background Color**  
&nbsp;&nbsp;&nbsp;&nbsp;Document background color. It will set for non mobile recognized devices. Such as desktop.   

**Mobile Body Background Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Document background color on Mobile devices. This will apply to mobile theme.   

**Body Text Colorr**       
&nbsp;&nbsp;&nbsp;&nbsp;Global text color. This usually used everywhere.   

**Primary Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Theme primary color.   

**Secondary Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Theme secondary color.   

**Success Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Theme success color.   

**Danger Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Theme danger color.   

**Mobile Sub Nav Background Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Sub navigation background color for mobile theme.   

**Mobile Sub Nav Text Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Sub navigation text color for mobile theme.   

**Tag Background Color**   
&nbsp;&nbsp;&nbsp;&nbsp;Tag background color for question and tags widget. Note: not for the Tags page. That is handeled with the primary color setting.    

**Tag Text Colorr**   
&nbsp;&nbsp;&nbsp;&nbsp;Tag text color.   

****
 

###Launcher Branding
Launcher is the icon and the splash screen for mobile devices. It will run and gives native applicaton like experience to yoru users. Such as app icon on home screen. Splash screen while opening the app.
   
To customize the launcher with your branding, do following settings.
- Open the `mainfest.json` file from the following location `your-q2a-root/lion-launcher/mainfest.json` (**note:** use any plain text editor such as notepad or [sublime](https://www.sublimetext.com/3))
- Replace `YOUR BRAND` in `"short_name": "YOUR BRAND"` with your brand. (**e.g.** Lion Theme). This will be the launcher icon text.
- Replace `YOUR BRAND NAME OR ONE LINE DESCRIPTION` in `"name": "YOUR BRAND NAME OR ONE LINE DESCRIPTION"` with your brand name. (**e.g.** Lion by Q2A Market). This will shown on the splash screen below your brand logo.
- Replace `YOUR DESCRIPTION` in `"description": "YOUR DESCRIPTION"` with your brand short description.
- Replace all 3 brand logos with the same name in `lion-launcher` folder with the following sizes. `192 x 192`, `96 x 96` and `48 x 48` pixels. ***Important: Keep the file name as it is.*** 

```json
{
  "short_name": "YOUR BRAND",
  "name": "YOUR BRAND NAME OR ONE LINE DESCRIPTION",
  "background_color": "white",
  "description": "YOUR DESCRIPTION",
  "theme_color": "#7A532E",
  "icons": [
    {
      "src": "launcher-icon-1x.png",
      "type": "image/png",
      "sizes": "48x48"
    },
    {
      "src": "launcher-icon-2x.png",
      "type": "image/png",
      "sizes": "96x96"
    },
    {
      "src": "launcher-icon-4x.png",
      "type": "image/png",
      "sizes": "192x192"
    }
  ],
  "start_url": "/",
  "display": "standalone"
}
```

####Support:
- You can get Lion theme documentation [here](http://q2amarket.com/docs/)
- [YouTube Playlist](https://www.youtube.com/playlist?list=PLM9WJP7bj5V-5BlpRPKNWa13mQNG8hg5m) 
- If you have any query or bug, please report it to the [support](http://q2amarket.com/forums/forum/lion-theme/) section.
- Post the bug report [here](http://q2amarket.com/forums/forum/lion-theme/bug-report/).
- Post the feature request [here](http://q2amarket.com/forums/forum/lion-theme/feature-request/).
- Post the general query [here](http://q2amarket.com/forums/forum/lion-theme/general/).

####Additional Note
We work **Monday-Friday** between **09:00** to **17:00** ***IST***

####Changelog

######Version 1.0.3-beta (25th September 2018)
- Theme color options plugin
- Added dedicated theme option panel
- Database version record
- Fixed few design and layout issues
- iZModal updated
- Fixed answer box padding and margin issue
- Fixed few more reported bugs
- Added Ticket and Feature request button

######Version 1.0.2-beta (16th April 2018)
- RTL support added
- Fixed action button visibility for guest
- Fixed few design and layout issues

######Version 1.0.1-beta (6th March 2018)
- Added desktop support
- Fixed few designing issue with the mobile version

[screenshot]: http://q2amarket.com/updates/lion/lion-color-options.jpg