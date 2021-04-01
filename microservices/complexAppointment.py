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
appointment_URL = "http://localhost:5003/appointment"
clinic_URL = "http://localhost:5004/clinic"
healthworker_URL = "http://localhost:5005/healthworker"

@app.route("/view_appointment", methods=['POST'])
def view_appointments():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            # do the actual work
            # 1. Send order info {cart items}
            appointment = processViewAppointments(details)
            return jsonify(appointment), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processViewAppointments(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Appointment microservice-----')
    appointments = invoke_http(appointment_URL + "/currentAppointments", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments

@app.route("/create_appointment", methods=["POST"])
def create_appointment():
    if request.is_json:
        try:
            appointment_details = request.get_json()
            print("\nReceived appointment to make a refill request:", appointment_details)

            # do the actual work
            # 1. Send order info {cart items}
            refill_info = processCreateAppointments(appointment_details)
            return jsonify(refill_info), 200

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
    appointments = invoke_http(appointment_URL + "/createAppointment", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments


if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for placing an refill microservice...")
    app.run(host="0.0.0.0", port=5101, debug=True)