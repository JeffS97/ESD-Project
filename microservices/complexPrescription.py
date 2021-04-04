from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
import os
import requests
from invokes import invoke_http

app = Flask(__name__)
CORS(app, support_credentials=True)

patient_URL = "http://localhost:5000/patient"
appointment_URL = "http://localhost:5001/appointment"
prescription_URL = "http://localhost:5022/prescription"
healthworker_URL = "http://localhost:5003/healthworker"
notification_URL = "http://localhost:5004/notification"

#view all prescriptions valid for a refill given the appointment Id based upon the current day
@app.route("/display_possible_refills", methods=['POST'])
@cross_origin(supports_credentials=True)
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
    prescriptions = invoke_http(prescription_URL + "/getByAppointment", method='POST', json=details) #replace this with AID (SESSION)
    print('Prescriptions:', prescriptions)

    return prescriptions

#takes a refill ID to update criteria for next refill as well as send a notification via tele
@app.route("/refill/<int:pid>", methods=['PUT'])
def make_refill(pid):
    if request.is_json:
        try:
            details = request.get_json()
            print("\nRecived a collection request for Prescription_Id:", pid)
            toReturn = processRefill(pid, details)

            # return jsonify(result), 200
            # toSend = {
            #     "Prescription_Id" : str(prescription['data']['Prescription_Id']),
            #     "Appointment_Id" : str(prescription['data']['Appointment_Id']),
            #     "Interval_Days" : str(prescription['data']['Interval_Days']),
            #     "PrevDate" : prevDateStr,
            #     "EndDate" : endDateStr,
            #     "Name" : str(prescription['data']['Name']),
            #     "Collected" : str(prescription['data']['Collected']),
            #     "Price" : str(prescription['data']['Price']),
            #     "Patient_Id" : str(prescription['data']['Patient_Id'])  
            # }
            # toReturn = json.dumps(toSend)
            return toReturn

        except Exception as e:
            pass  # do nothing

    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processRefill(pid, details):

    print('\n-----Invoking Prescription microservice-----')
    toReturn = invoke_http(prescription_URL + "/update/" + str(pid), method="PUT", json=details) #change 
    print('Prescriptions:', toReturn)

    # print('\n-----Invoking Appointment microservice-----')
    # appointment = invoke_http(appointment_URL + "/viewAppointmentById", method="POST", json=prescription['data'])
    
    # print('\n-----Invoking Patient microservice-----')
    # patient = invoke_http(patient_URL + "/findById", method="POST", json=appointment['data'])
    
    # toSend = jsonify(
    #     {
    #         'P_Name' : patient['P_Name'],
    #         'ChatId': patient['ChatId'],
    #         'Name': prescription['Name']
    #     }
    # )
    # notification = invoke_http(notification_URL + '/refill', method='POST', json=toSend)

    # prevDateStr = str(prescription['data']['PrevDate'])
    # endDateStr = str(prescription['data']['EndDate'])

    # toSend = {
    #             "Prescription_Id" : str(prescription['data']['Prescription_Id']),
    #             "Appointment_Id" : str(prescription['data']['Appointment_Id']),
    #             "Interval_Days" : str(prescription['data']['Interval_Days']),
    #             "PrevDate" : prevDateStr,
    #             "EndDate" : endDateStr,
    #             "Name" : str(prescription['data']['Name']),
    #             "Collected" : str(prescription['data']['Collected']),
    #             "Price" : str(prescription['data']['Price']),
    #             "Patient_Id" : str(prescription['data']['Patient_Id'])  
    #             }
    # toReturn = json.dumps(toSend)
    return toReturn


@app.route("/add_Prescription", methods=['POST'])
def add_Prescription():

    if request.is_json:
        try:
            details = request.get_json()
            print("\nReceived appointment ID in JSON:", details)

            appointments = processAddPrescription(details)
            return jsonify(appointments), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processAddPrescription(details):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Prescription microservice-----')
    prescriptions = invoke_http(prescription_URL + "/addPrescription", method='POST', json=details) #replace this with AID (SESSION)
    print('Prescriptions:', prescriptions)

    return prescriptions


if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for Prescription related Operations...")
    app.run(host="0.0.0.0", port=5125, debug=True)






