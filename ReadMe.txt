Desition made during the coding
-------------------------------
1) Question is asking do a command line application but I made it more user friendly manner (Since no strict requirement)
2) Added file uploading method where you can upload files like (.xml,.json,.csv,.yml,.yaml)
3) If no supported file type then error message will poped up
4) If uploaded files are not properly typed then error message will be poped up
5) I build web page using pure php(7.4.7), xampp(7.4.7) with apache, js, css, html
6) Php frameworks are not used therefore i build mvc architechture manually to keep coding standard
7) I have used .htaccess files to navigate the routing paths in a customize way
8) following is the folder structure of the project
    interview
        -app
            -config
                > config.php (Configuration of the program)
            -controllers
                > Main.php (Main controller class)
            -helpers
                -composer (All the composer files are installed here)
                -downloadables (File structure of downloadable files)
                > Encode.php (File conversion is happening here)
                > session_helper.php (create popup messages)
                > url_helper.php (to navigate)
            -libraries
                > BaseController.php (including all the view files)
                > Core.php (Initial navigation and other navigation controlled here)
            -models (No modal is used for this project)
            -tests (Some unit tests are added here)
            -views
                - _includes (Parts of main views)
                - Main (Main view)
                    > index.php
            > bootstrap.php (include all initial files and run the programm)
        -public ( Front end accesible files )
            -css
            -img
            -js
            .htaccess
        .htaccess

9) Some automated unit testing is added to the /app/tests folder you can run them using phpunit in following way
    C:\xampp\htdocs\interview\app\helpers\composer\vendor\bin\phpunit EncodeTest.php

10) files are convertable to other formats and out put is showing in a table
11) symfony/serializer used for encoding and decoding xml, json, (type 1)yaml, yml, csv
12) symfony/yaml is used specially to generate (type 2)yaml files
13) phpunit/phpunit is used for unit testing
14) I have made a youtube video to demostrate the system the link for that as follows
    https://youtu.be/konKNtbTQFw
