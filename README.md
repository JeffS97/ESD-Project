# Project Hero - Team H

Project Hero is a project that aims to connect freelancers with people who require help with tasks. It serves as a hub of communication between task poster and freelancer, facilitating the transaction and event itself **during this covid period**

# File Organization

Project Hero's files are organized into folders by: 

| Folder | Purpose |
| ------ | ------ |
| Main | Storing of php files used to process data |
| backend_services | Storing of backend Javascript files |
| database_scripts | Storing of database scripts for loading data |
| model | Storing of files related to the creation of DAO Objects |
| resources | Storing of commonly accessed files and resources |
| views | Storing of all page views |
| deprecated | Storing of Non-functional and ignored files |

#  Setting up

Project Hero's initial set up phase can be done by: 

  - After downloading the source code, import the SQL script(hero_db.sql) located in the database_scripts folder
  - Ensure the ConnectionManager.php located in the Model folder is properly configured to your settings
  - Access the webpage via homepage.php (This functions as an index.html page)
  - Sign-up for an account via the log-in button at the top right hand corner of the navigation bar

# Functionality

Project Hero possesses the following functionality :

  - Account Creation and Logging in
  - Posting of task/gig by user
  - Search for gigs using the search bar or by clicking the carousell in the view bookings page
  - View list of bookings and accept booking made by other users
  - Message each other via a chat function
  - View status of the gig/task with an interactive Map showing the distance and duration of the booker and accepter
  - Mark the gig/task as completed when desired
  - Profile page which allows the user to edit their profile details including password and display picture
  - Viewing of personal earnings which displays the total amount the user has earned using our website in a chart format using chart.js
  - History page where the user can view all the past tasks/gigs that they have created
  - Top Heroes page which shows a leaderboard of users who have accepted tasks and orders them by total tasks completed

# Tech

Project Hero uses a number of open source projects in order to function properly:

* [Vue.JS] - To make our pages responsive
* [Axios] - To facilitate responsive database actions
* [Animate.css] - To animate our pages and make them look beautiful
* [Chart.js] - To display details in chart format
* [JQuery] - To manipulate and handle events
* [MySQL] - To store the data of users, gigs and the chat
* [Twitter Bootstrap] - To make our page responsive on different viewports
* [SASS] - To stylize and beautify our webpage

# APIs Used

Project Hero uses a number of APIs in order to function properly:
* [Google Maps Api] - To calculate distance between users
* [Open Weather Api] - To measure duration based on weather conditions
* [ReCaptcha Api] - To validate logins and prevent malicious attacks
* [Iconify Api] - To stylize the icons

**Project Team: Glenda Marco Conejero Satuito, Jeffvinder Singh, Lim Si Hui Amanda, Ling Li Yin, Rohan Manoj Kuruvilla**

   [Home]: <https://github.com/JeffS97/WAD-2-Project>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [Vue.js]: <https://vuejs.org/>
   [Axios]:<https://www.axios.com/>
   [Animate.css]: <https://animate.style/>
   [Chart.js]: <https://www.chartjs.org/>
   [MySQL]: <https://www.mysql.com/>
   [SASS]: <https://sass-lang.com/>
   
   [Google Maps Api]: <https://developers.google.com/maps/documentation>
   [Open Weather Api]: <https://openweathermap.org/api>
   [ReCaptcha Api]: <https://www.google.com/recaptcha/api.js>
   [Iconify Api]: <https://docs.iconify.design/sources/api/hosting.html>
   

   
