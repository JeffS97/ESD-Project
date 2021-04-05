from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
import os
import requests
from os import environ
from invokes import invoke_http

app = Flask(__name__)
CORS(app, support_credentials=True)

patient_URL = environ.get('patient_URL') or "http://localhost:5000/patient"
appointment_URL = environ.get('appointment_URL') or "http://localhost:5001/appointment"
prescription_URL = environ.get('prescription_URL') or "http://localhost:5002/prescription"
healthworker_URL = environ.get('healthworker_URL') or "http://localhost:5003/healthworker"
notification_URL = environ.get('notification_URL') or "http://localhost:5004/notification"

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
    try:
        details = request.get_json()
        print("\n Recived a collection request for Prescription_Id:", pid)
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

@app.route("/healthworker_Get_Uncollected_Prescriptions/<int:Gid>")
def healthworker_Get_Uncollected_Prescriptions(Gid):

    try:
        print("\nReceived Clinic ID, Gid:", Gid)

        prescriptions = processHealthworkerGetUncollectedPrescriptions(Gid)
        return jsonify(prescriptions), 200

    except Exception as e:
        pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processHealthworkerGetUncollectedPrescriptions(Gid):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Prescription microservice-----')
    prescriptions = invoke_http(prescription_URL + "/HealthworkerGetUnCollectedPrescription/" + str(Gid))
    return prescriptions

@app.route("/patient_get_Uncollected_Prescriptions/<int:Pid>")
def patient_get_Uncollected_Prescriptions(Pid):

    try:
        print("\nReceived Clinic ID, Pid:", Pid)

        prescriptions = processPatientGetUncollectedPrescriptions(Pid)
        return jsonify(prescriptions), 200

    except Exception as e:
        pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processPatientGetUncollectedPrescriptions(Pid):

    #Obtain Appointments which matches Patient_Id 
    print('\n-----Invoking Prescription microservice-----')
    prescriptions = invoke_http(prescription_URL + "/PatientGetUnCollectedPrescription/" + str(Pid))
    print('Prescriptions:', prescriptions)

    return prescriptions

@app.route("/refillcollected", methods=['PUT'])
def update_refill():
    try:
        details = request.get_json()
        #print("\nRecived a collection request for Prescription_Id:", pid)
        toReturn = processRefillCollected(details)

        return toReturn

    except Exception as e:
        pass  # do nothing

    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processRefillCollected(details):

    print('\n-----Invoking Prescription microservice-----')
    toReturn = invoke_http(prescription_URL + "/updateCollected", method="PUT", json=details) #change 
    print('Prescriptions:', toReturn)

    return toReturn









@app.route("/delete_prescription", methods=["DELETE"])
def delete_pres():
    if request.is_json:
        try:
            pres_details = request.get_json()
            print("\nReceived appointment to make an update:", pres_details)

            refill_info = processDeletePrescription(pres_details)
            return jsonify(refill_info), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processDeletePrescription(details):

    #Obtain Prescriptions which matches Patient_Id, after 1 month of issue, routed to 'prescription/getByPatient' 
    print('\n-----Invoking appointment microservice-----')
    appointment_id = invoke_http(prescription_URL+"/deleteprescription", method='DELETE', json=details)
    print('Cancelled Prescription ID:', appointment_id)

    return appointment_id

if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for Prescription related Operations...")
    app.run(host="0.0.0.0", port=5105, debug=True)






