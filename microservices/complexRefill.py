from flask import Flask, request, jsonify
from flask_cors import CORS
from os import environ
import os

import requests
from invokes import invoke_http

app = Flask(__name__)
CORS(app)

patient_URL = environ.get('patient_URL') or "http://localhost:5000/patient"
prescription_URL = environ.get('prescription_URL') or "http://localhost:5001/prescription2"
refill_URL = environ.get('refill_URL') or "http://localhost:5002/refill2"

#When the user wants to view valid prescriptions to refill
@app.route("/view_prescription", methods=['POST'])
# post Data: {"Patient_Id": "4"}
def view_prescription():

    # send patient Id, invoke prescription, query prescription based on patient id
    # receive prescription 

    # Simple check of input format and data of the request are JSON
    if request.is_json:
        try:
            view_prescription = request.get_json()
            print("\nReceived an order in JSON:", view_prescription)


            # do the actual work
            # 1. Send order info {cart items}
            prescriptions = processViewPrescription(view_prescription)
            print(prescriptions)
            return jsonify(prescriptions), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400

#user makes selction of refill and this creates a refill request
@app.route("/place_refill", methods=["POST"])
    # post data: {"Prescription_Id" : "3",
    # "Total_Refill" : "1"}
def place_refill():
    if request.is_json:
        try:
            refill_details = request.get_json()
            print("\nReceived prescription to make a refill request:", refill_details)

            # do the actual work
            # 1. Send order info {cart items}
            refill_info = processPlaceRefill(refill_details)
            return jsonify(refill_info), 200

        except Exception as e:
            pass  # do nothing

    # if reached here, not a JSON request.
    return jsonify({
        "code": 400,
        "message": "Invalid JSON input: " + str(request.get_data())
    }), 400


def processViewPrescription(view_prescription):

    #Obtain Prescriptions which matches Patient_Id, after 1 month of issue, routed to 'prescription/getByPatient' 
    print('\n-----Invoking prescription microservice-----')
    prescriptions = invoke_http(prescription_URL + "/getByPatient", method='POST', json=view_prescription)
    print('Prescriptions:', prescriptions)


    # r = requests.post('https://httpbin.org/post',data = pload)
    # print(r.text)

    return prescriptions



def processPlaceRefill(refill_details):

    #Creates a Refill Request given the Prescription Id, routed to 'refill2/' 
    print('\n-----Invoking prescription microservice-----')
    refill_info = invoke_http(refill_URL + "/placeRefill", method='POST', json=refill_details)
    print('Refill information:', refill_info)

    return refill_info

if __name__ == "__main__":
    print("This is flask " + os.path.basename(__file__) + " for placing an refill microservice...")
    app.run(host="0.0.0.0", port=5107, debug=True)

