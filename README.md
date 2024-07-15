# Guardian-Link

Julian's Guardian Link Assignment

---

COMPLETED Functions

About Section (Who we are, What we do, Why we do it, Partnerships)
NGO Registration (Email, Organization name, Area of Concern)
Volunteer Registration (Name, Email, # of Hours worked, Background Check, Linkedin Page)
3 User Types (NGO, Volunteer, Admin)
Access Control (Users log in to view opposite user type profiles, and cannot see users of same type)
Communication (Users can directly email as email info is provided on the dashboard)
Admin Privileges (Admin ability to create and delete users, assign admin roles, reset passwords. Reg users can delete own accounts.)

INCOMPLETE Functions

Forgot Password (Function for users to reset passwords. This requires email functionality that I cannot figure out.)

---

OVERVIEW

This is Julian Soriano's attempt at the Coding for Veterans Capstone project.
The goal of this site is to connect NGO's and Cybersecurity volunteers together.

I decided to tackle this project by creating two separate login systems based on the two main user types, NGO and Volunteer.

SUMMARY OF DOCUMENT PAGES

admin.php
This is the main page that the users who are given admin privilages have access to to control admin status, create and delete accounts, and modify user passwords.

connect.php
Used to connect my front end files to the MySQL database

header.php
Contains the consistant navigation bar at the top of site.

index.php
Contains the home page for the website and the About Us section.

logout.php
Contains code that handles logging the current user out when called.

reset_password.php
Contains the page that allows the user to request an email link to recover password. This section is incomplete.

send_email.php
Contains the code that allows mail functionality. This section is incomplete.

style.php
Contains the CSS and styling for the site.

NGO and VOLUNTEER PAGES

The NGO and VOLUNTEER users have their own versions of the login (along with another page called login_process.php that contains code for the login.php), register, and dashboard hub
These pages are duplicated but modified to reflect the needs of the specific user.

---

TECH STACK AND RATIONALE
I am a windows user and decided to stay within the XAMP (Windows, Apache, MySql, PHP) stack as it was the one explained to use during the course of our studies. As I have no coding background I don't have alternative options. For the front end code I used HTML and CSS as this was also covered in our course.

CHALLENGES FACED

I faced numerous challenges during the course of this assignment.

The first major hurdle was the database. Setting it up, relearning how mySQL works. I had a few issues when I experienced a database crash and lost access to my tables. This led to me starting to use GitHub to contain the back up files of my website and exporting the MySQL files to a separate folder in my computer.

The second major hurdle was the connecting code to interact with the database. I misunderstood how it worked and once I figured it out, I was able to get over my plateau and gain momentum in working towards this project.

The third major hurdle was the login system and admin page. This was a challenge that set me back from completing this assignment for months and I was stuck until I figured out meaning behind the POST functions. Once I understood how to make If statements and different POST conditions I was able to integrate the admin functionality I was struggling with.

The final major hurdle was the email system which I was not able to overcome.

LESSONS LEARNED AND FUTURE RECOMMENDATIONS

One of the major flaws in the way I coded this assignment was the fact that my login system inherently had plenty of duplicated code as I had a seperate system for both user types.
The reason this complicated things was it did make it tougher to read it as I found myself bouncing back and forth between pages. Knowing this, I tried my best to make my code readable by commenting each line of code and explaining how they work in laymen's terms.

If I was to repeat this assignment in the future, I would find a way to amalgamate the login system and have an identifier for each user type so that everything works in one table on the database end.

---