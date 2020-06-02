Steps to repro issue:

Clone this repo, then run composer update and npm update. Once these are done, setup your db connection, then run migrate, then the seeder files. 

Use creds in the user seeder to login from the localhost/login screen.

Then put in the url bar routes/edit-route/1 (the 1 stands for the route_id which is a column in the customers table, and is the PK of the routes table). This will bring you to the page where you can sort the customers in the view by dragging and dropping them in any order you want. Pressing the save button will take you to the json formatted data where it gives order: null. 


