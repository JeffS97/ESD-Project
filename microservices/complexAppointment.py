from flask import Flask, request, jsonify
from flask_cors import CORS
import os
import requests
from invokes import invoke_http

app = Flask(__name__)
CORS(app)

patient_URL = "http://localhost:5000/patient"
prescription_URL = "http://localhost:5001/prescription"
refill_URL = "http://localhost:5002/refill"
appointment_URL = "http://localhost:5028/appointment"
clinic_URL = "http://localhost:5004/clinic"
healthworker_URL = "http://localhost:5005/healthworker"
notification_URL = "http://localhost:5030/notification"

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

app.route("/patient_views_appointment_history", methods=['POST'])
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
    appointment_id = invoke_http(appointment_URL, method='DELETE', json=details)
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
    

    dateStr = str(appointment.ApptDate)
    timeStr = str(appointment.ApptTime)


    toSend = jsonify(
        {
            'P_Name' : patient.P_Name,
            'ChatId': patient.ChatId,
            'ApptTime': timeStr, 
            'ApptDate': dateStr
        }
    )
    notification = invoke_http(notification_URL + '/appointment', method='POST', json=toSend)

    return notification



if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for placing an refill microservice...")
    app.run(host="0.0.0.0", port=5121, debug=True)