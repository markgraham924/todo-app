# Todo App
*Created by Mark Graham 2019 &copy;*

Allows users to keep track of their task's needing to be done. It allows custom status' to be created, meaning endless customization.
It runs on any PHP enabled webserver ideal for families who can run it locally to keep track of their tasks.
## Installation Instructions
1. Clone the repositry (into webserver public HTML)
	 `git clone https://github.com/markgraham924/todo-app.git`
2. Create the database:
	In your MYSQL client, enter the following commands.
	 `CREATE DATABASE todo-app;`
	 This creates a database called 'todo-app'.
3. Use the database:
	 `USE todo-app;`
4. Add a table:
	`CREATE TABLE todoData (todoID int NOT NULL AUTO_INCREMENT, headingName varchar(25), mainContent varchar(255), statusType int(5), PRIMARY KEY (todoID));`
	We are creating a table with four columns. All the content/data for the todo app will be stored in this table.
	
|Column ID|Type|Reason|
|--|--|--|
|todoID|Auto Incrementing Primary Key|This is the primary key, we will use this as a reference point.  |
|headingName|Varchar (Max Length: 25)|This is the heading of the todo note.|
|mainContent|Varchar (Max Length: 255)|This is where the main content of the todo note is stored.|
|statusType|Integer (Max Length: 5)|This is where a foreign key will be stored for the status of the todo note.|
5. Add a second table:
	`CREATE TABLE statusData (statusType int NOT NULL AUTO_INCREMENT, statusName varchar(15), completedState varchar(3), PRIMARY KEY (statusType));`
	A second table is created to store the status of the todo note. This allows you to create personal completed types.
	
|Column ID|Type|Reason|
|--|--|--|
|statusType|Auto Incrementing Primary Key|This is the primary key, it is used to link the data below to another table.|
|statusName|Varchar (Max Length: 15)|This is the name of the status, e.g. Done, Started, Created|
|completedState|Varchar (Max Length: 3)|To show the state, either completed, yes or no. If yes the text is struck through.|
6. Change the SQL login credentials:
	The creds.json, now needs to be edited to include your credentials and server host.
	`{"servername": "Server IP", "username": "Username", "password": "Password", "database": "Database Name"}`
	Update each item with your own credentials for your MySQL server.
**The app should now be installed on your webserver ready for everyone to use!**
You may have to create some status's first, I suggest defaults such as Completed and Not-Completed.


	 
