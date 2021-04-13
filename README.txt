------------------------------------------
             IS213 G5TA Setup
------------------------------------------

1. Start WAMP/MAMP Server

2. Import G5TA.sql into phpMyAdmin to setup MySQL Database

3. Navigate to the directory containing "docker-compose.yml" using your preferred CLI
(docker-compose.yml can be found inside "/G5TA/microservices")

3a. Edit the database configuration in 'docker-compose.yml' if you are using a different port for your phpMyAdmin (Change 3306 to 8889 for MAC users)

4. Run "docker-compose build" to build the containers required

5. Run "docker-compose up" to start the containers just built (Give it about 2 minutes to fully load the containers)

6. Once all containers are running, proceed to "localhost:1337" using your preferred web browser to login and access KONGA

7. Once inside your KONGA dashboard, select "Snapshots" in the left menu

8. Select "Import From File" and choose the G6TA-Snapshot.json in the "database_scripts" folder

9. Verify that the Services and Routes have been added correctly as below: 

	SERVICES

	a. Complex Appointment Microservice
	   
	   Name: complexappointmentapi
	   Protocol: http 
	   Host: microservices_complexappointment_1
	   Port: 5100

	b. Complex Prescription Microservice
	
	   Name: complexprescriptionapi
	   Protocol: http 
	   Host: microservices_complexprescription_1
	   Port: 5105
	   
	ROUTES
	
	a. Complex Appointment Microservice
	
	   Paths: /api/v1/complexappointment
	   Methods: GET, POST, PUT, OPTIONS, DELETE

	b. Complex Prescription Microservice
	
	   Paths: /api/v1/complexprescription
	   Methods: GET, POST, PUT, OPTIONS, DELETE

10. If everything was set up correctly, CliniQ is now ready for usage!

------------------------------------------------
             Telegram Notification Setup
------------------------------------------------
*After creating account as a patient

1. Click the 'Get Telegram Notifications' button on main.php

2. Open Telegram chat as prompted

3. Click 'Start' button or type '/start' in the chat

4. Go back to main.php and close the Modal Window by clicking on the 'Close' button.

5. Feel free to make an appointment at any clinic and receive confirmation via Telegram!

------------------------------------------------
             Paypal payment login credentials
------------------------------------------------
Username-sb-gafcc5846609@personal.example.com
Password-QAx1-qi0

------------------------------------------------
             Things to note
------------------------------------------------

On the first try might face error which requires refresh to the page ,as kong takes time.
After building wait some time for kong to initialise.
	   

	   

