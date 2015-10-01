# README #

### What is this repository for? ###

* This repository is source code and other documents for a game based on code review.

### How do I get set up? ###

* Install xampp server(Make sure mysql and php are running)
* Then copy the source/cosmus folder to /opt/lampp/htdocs folder
* Update the database.php file of application/config folder with your password  
* Change the username and password(according to the machine) in 'create_database.php' file in source folder
  and run it to create the necessary database and tables.
* An entry is already there in the users table with the email 'ssadteam48@gmail.com' and password 'pass'. 
  Use these credentials to login as the admin.
* Run this command on terminal replacing username with your own username:
  sudo chown -R username:username /opt/lampp/htdocs
* Run following command to open apache configuration file
  sudo gedit /opt/lampp/etc/httpd.conf
* Find following lines:
      User nobody
      Group nogroup
* Replace nobody and nogroup with your username and save the file.
* Start xampp server and run localhost/cosmus on the browser

### Who do I talk to? ###

* Rashi Shrishrimal (rashi95)
* Smriti Singh (Smritiz)
* Sikander Sharda (sikander_sharda)
* Ranjith B. Reddy (ranjithreddy)
