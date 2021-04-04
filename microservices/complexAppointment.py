from flask import Flask, request, jsonify, make_response
from flask_cors import CORS, cross_origin
import os
import requests
from invokes import invoke_http
import json
import amqp_setup
import pika

app = Flask(__name__)
CORS(app, support_credentials=True)

patient_URL = "http://localhost:5000/patient"
appointment_URL = "http://localhost:5001/appointment"
prescription_URL = "http://localhost:5002/prescription"
healthworker_URL = "http://localhost:5003/healthworker"
notification_URL = "http://localhost:5004/notification"

@app.route("/worker_views_all_appointments", methods=['POST'])
def worker_views_all_appointments():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointments = processWorkerViewsAllAppointments(details)
            return jsonify(appointments), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processWorkerViewsAllAppointments(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Appointment microservice-----')
    appointments = invoke_http(appointment_URL + "/healthcareCurrentAppointments", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments

#Patient makes selection for a particular medication 
@app.route("/update_medication_date", methods=['POST'])
def patient_views_all_appointments():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointments = processPatientViewsAllAppointments(details)
            return jsonify(appointments), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processPatientViewsAllAppointments(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Appointment microservice-----')
    appointments = invoke_http(appointment_URL + "/patientViewsAppointment", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments

@app.route("/patient_views_appointment_history", methods=['POST'])
@cross_origin(supports_credentials=True)
def patient_views_appointment_history():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointments = processPatientViewsAppointmentHistory(details)
            return jsonify(appointments), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processPatientViewsAppointmentHistory(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Appointment microservice-----')
    appointments = invoke_http(appointment_URL + "/patientViewsAppointmentHistory", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments

@app.route("/patient_views_upcoming_appointment", methods=['POST'])
def patient_views_upcoming_appointment():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointments = processPatientViewsUpcomingAppointment(details)
            return jsonify(appointments), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def processPatientViewsUpcomingAppointment(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Appointment microservice-----')
    appointments = invoke_http(appointment_URL + "/patientViewsUpcomingAppointment", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments

@app.route("/patient_views_lapsed_appointment", methods=['POST'])
def patient_views_lapsed_appointment():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointments = processPatientViewsLapsedAppointment(details)
            return jsonify(appointments), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def processPatientViewsLapsedAppointment(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Appointment microservice-----')
    appointments = invoke_http(appointment_URL + "/patientViewsLapsedAppointment", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments

@app.route("/view_by_appointment", methods=['POST'])
def view_by_appointment():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointment = processViewByAppointment(details)
            return jsonify(appointment), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def processViewByAppointment(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Appointment microservice-----')
    appointments = invoke_http(appointment_URL + "/viewAppointmentById", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments


@app.route("/update_appointment", methods=["PUT"])
def update_appointment():
    if request.is_json:
        try:
            appointment_details = request.get_json()
            print("\nReceived appointment to make an update for:", appointment_details)

            refill_info = processUpdateAppointments(appointment_details)
            return jsonify(refill_info), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processUpdateAppointments(details):

    #Obtain Prescriptions which matches Patient_Id, after 1 month of issue, routed to 'prescription/getByPatient' 
    print('\n-----Invoking appointment microservice-----')
    appointments = invoke_http(appointment_URL + '/updateAppointment', method='PUT', json=details)
    print('Appointments:', appointments)

    return appointments

@app.route("/delete_appointment", methods=["DELETE"])
def delete_appointment():
    if request.is_json:
        try:
            appointment_details = request.get_json()
            print("\nReceived appointment to make an update:", appointment_details)

            refill_info = processDeleteAppointments(appointment_details)
            return jsonify(refill_info), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processDeleteAppointments(details):

    #Obtain Prescriptions which matches Patient_Id, after 1 month of issue, routed to 'prescription/getByPatient' 
    print('\n-----Invoking appointment microservice-----')
    appointment_id = invoke_http(appointment_URL + '/delete_appointment', method='DELETE', json=details)
    print('Deleted Appointment ID:', appointment_id)

    return appointment_id


@app.route("/create_appointment", methods=["POST"])
def create_appointment():
    if request.is_json:
        try:
            appointment_details = request.get_json()
            print("\nNew Appointment Request:", appointment_details)

            # do the actual work
            # 1. Send order info {cart items}
            notification = processCreateAppointments(appointment_details)
            return jsonify(notification), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processCreateAppointments(details):

    #Obtain Prescriptions which matches Patient_Id, after 1 month of issue, routed to 'prescription/getByPatient' 
    print('\n-----Invoking appointment microservice-----')
    appointment = invoke_http(appointment_URL + "/createAppointment", method='POST', json=details)
    
    print('\n-----Invoking Patient microservice-----')
    patient = invoke_http(patient_URL + "/findById", method="POST", json=appointment['data'])
    
    #print(appointment["data"]["ApptDate"])
    dateStr = str(appointment["data"]["ApptDate"])
    timeStr = str(appointment["data"]["ApptTime"])
    p_name = str(patient['data']['P_name'])
    chatId = str(patient['data']['ChatId'])

    bingbong = {"P_name" : p_name,
            "ChatId": chatId,
            "ApptTime": timeStr, 
            "ApptDate": dateStr}

    toSend = json.dumps(bingbong)
    amqp_setup.channel.basic_publish(exchange=amqp_setup.exchangename, routing_key="appointment.notification", 
            body=toSend, properties=pika.BasicProperties(delivery_mode = 2)) 

    #notification = invoke_http(notification_URL + '/message/' + chatId, method='POST', json=toSend)

    #return notification

if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for placing Appointment related Operations...")
    app.run(host="0.0.0.0", port=5100, debug=True)