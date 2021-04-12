------------------------------------------
             IS213 G5TA Setup
------------------------------------------

1. Start WAMP/MAMP Server

2. Import G5TA.sql into phpMyAdmin to setup MySQL Database

3. Navigate to the directory containing "docker-compose.yml" using your preferred CLI
(docker-compose.yml can be found inside "/G5TA/microservices")

4. Run "docker-compose build" to build the containers required

5. Run "docker-compose up" to start the containers just built

6. Once all containers are running, proceed to "localhost:1337" using your preferred 
web browser to login and access KONGA

7. Once inside your KONGA dashboard, select on "Services" in the left navigation bar

8. Select "Add New Service" and proceed to add the TWO following services:

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

9. Return to the "Services" page and click on the names of the newly created services

10. Select "Add Route" and proceed to add the following for their respective services:

	a. Complex Appointment Microservice
	
	   Paths: /api/v1/complexappointment
	   Methods: GET, POST, PUT, OPTIONS, DELETE

	b. Complex Prescription Microservice
	
	   Paths: /api/v1/complexprescription
	   Methods: GET, POST, PUT, OPTIONS, DELETE

11. If everything was set up correctly, CliniQ is now ready for usage!
	   
	   
	   

