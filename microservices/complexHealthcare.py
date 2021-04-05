from flask import Flask, request, jsonify
from flask_cors import CORS
from os import environ

import os

import requests
from invokes import invoke_http

app = Flask(__name__)
CORS(app)

patient_URL = environ.get('patient_URL') or "http://localhost:5000/patient"
prescription_URL = environ.get('prescription_URL') or "http://localhost:5001/prescription"
refill_URL = environ.get('refill_URL') or "http://localhost:5002/refill"
appointment_URL = environ.get('appointment_URL') or "http://localhost:5003/appointment"
clinic_URL = environ.get('clinic_URL') or "http://localhost:5004/clinic"
healthworker_URL = environ.get('healthworker_URL') or "http://localhost:5005/healthworker"

@app.route("/view_appointments_healthcare", methods=['POST'])
def view_appointments_healthcare():
    #obtain Gid
    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointment = processViewAppointmentsHealthcare(details)
            return jsonify(appointment), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def processViewAppointmentsHealthcare(details):

    #Obtain Appointments which matches Gid
    print('\n-----Invoking prescription microservice-----')
    appointments = invoke_http(appointment_URL + "/viewHealthcareAppointment", method='POST', json=details)
    print('Appointments:', appointments)

    return appointments


@app.route("/approve_appointments_healthcare", methods=['POST'])
def approve_appointments_healthcare():
    #obtain Gid
    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived details in JSON:", details)

            appointment = processApproveAppointmentsHealthcare(details)
            return jsonify(appointment), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

def processApproveAppointmentsHealthcare(details):

    #Obtain Appointments which matches Gid
    print('\n-----Invoking Appointment microservice-----')
    appointment = invoke_http(appointment_URL + "/approveHealthcareAppointment", method='POST', json=details)
    print('Updated Appointment:', appointment)

    return appointment


if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for placing an refill microservice...")
    app.run(host="0.0.0.0", port=5102, debug=True)