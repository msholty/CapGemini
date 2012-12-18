README
======

This directory should be used to place project specfic documentation including
but not limited to project notes, generated API/phpdoc documentation, or
manual files generated or hand written.  Ideally, this directory would remain
in your development environment only and should not be deployed with your
application to it's final production location.


Setting Up Your VHOST
=====================

The following is a sample VHOST you might want to consider for your project.

<VirtualHost *:80>
<<<<<<< HEAD
   DocumentRoot "C:/sholm001_workspace/Projects/CapGemini/public"
   ServerName .local
=======
   DocumentRoot "/Users/shahar/Code/DevCloud/AppPackages/Empty_ZF_Application/EmptyApp/public"
   ServerName EmptyApp.local
>>>>>>> 5ac6f6a6818e4e45455749afe3e318b4ad33031e

   # This should be omitted in the production environment
   SetEnv APPLICATION_ENV development

<<<<<<< HEAD
   <Directory "C:/sholm001_workspace/Projects/CapGemini/public">
=======
   <Directory "/Users/shahar/Code/DevCloud/AppPackages/Empty_ZF_Application/EmptyApp/public">
>>>>>>> 5ac6f6a6818e4e45455749afe3e318b4ad33031e
       Options Indexes MultiViews FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
   </Directory>

</VirtualHost>
