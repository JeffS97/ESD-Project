from flask import Flask, request, jsonify
from flask_cors import CORS
import os
import requests
from invokes import invoke_http

app = Flask(__name__)
CORS(app)

patient_URL = "http://localhost:5000/patient"
appointment_URL = "http://localhost:5001/appointment"
prescription_URL = "http://localhost:5002/prescription"
healthworker_URL = "http://localhost:5003/healthworker"
notification_URL = "http://localhost:5004/notification"

#view all prescriptions valid for a refill given the appointment Id based upon the current day
@app.route("/display_possible_refills", methods=['POST'])
def display_possible_refills():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived appointment ID in JSON:", details)

            appointments = processDisplayPossibleRefills(details)
            return jsonify(appointments), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processDisplayPossibleRefills(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Prescription microservice-----')
    prescriptions = invoke_http(prescription_URL + "/getByAppointment/" + "1", json=details) #replace this with AID (SESSION)
    print('Prescriptions:', prescriptions)

    return prescriptions

#takes a refill ID to update criteria for next refill as well as send a notification via tele
@app.route("/refill", methods=['POST'])
def make_refill():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived refill ID in JSON:", details)
            notification = processMakeRefill(details)

            return jsonify(notification), 200

        except Exception as e:
            pass  # do nothing

    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processMakeRefill(details):

    print('\n-----Invoking Prescription microservice-----')
    prescription = invoke_http(prescription_URL + "/update/" + "<int:pid>", method="POST", json=details) #change 
    print('Prescriptions:', prescription)

    print('\n-----Invoking Appointment microservice-----')
    appointment = invoke_http(appointment_URL + "/viewAppointmentById", method="POST", json=prescription['data'])
    
    print('\n-----Invoking Patient microservice-----')
    patient = invoke_http(patient_URL + "/findById", method="POST", json=appointment['data'])
    
    toSend = jsonify(
        {
            'P_Name' : patient.P_Name,
            'ChatId': patient.ChatId,
            'Name': prescription.Name
        }
    )
    notification = invoke_http(notification_URL + '/refill', method='POST', json=toSend)


if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for Prescription related Operations...")
    app.run(host="0.0.0.0", port=5105, debug=True)






