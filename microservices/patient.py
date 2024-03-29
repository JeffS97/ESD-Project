from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
from flask_cors import CORS
import json
import requests
from os import environ

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL') or 'mysql+mysqlconnector://root@localhost:3306/ESD5'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:root@localhost:8889/ESD5'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Patient(db.Model):
    __tablename__ = 'Patient'

    Patient_Id = db.Column(db.Integer, primary_key=True)
    P_name = db.Column(db.String(150), nullable=False)
    Username = db.Column(db.String(150), nullable=False)
    Email = db.Column(db.String(200), nullable=False)
    Age = db.Column(db.Integer, nullable=False)
    Address = db.Column(db.String(200), nullable=False)
    Allergy = db.Column(db.String(200), nullable=True)
    ChatId = db.Column(db.String(200), nullable=True)
    Payment = db.Column(db.String(200), nullable=True)
    password = db.Column(db.String(250), nullable=False)

    def __init__(self, Patient_Id, Username, P_name, Email, Age, Address, Allergy, ChatId, Payment, password):
        self.Patient_Id = Patient_Id
        self.P_name = P_name
        self.Username = Username
        self.Email = Email
        self.Age = Age
        self.Address = Address
        self.Allergy = Allergy
        self.ChatId = ChatId
        self.Payment = Payment
        self.password = password

    def json(self):
        return {"Patient_Id": self.Patient_Id, "P_name": self.P_name, "Email": self.Email, "Age": self.Age, "Allergy": self.Allergy, "Address": self.Address, "ChatId": self.ChatId, "Payment": self.Payment, "password": self.password}


@app.route("/patients")
def get_all():
    patient_list = Patient.query.all()
    if len(patient_list):
        return jsonify(
            {
                "code": 200,
                "data": {
                    "patients": [patient.json() for patient in patient_list]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "There are no patients."
        }
    ), 404


@app.route("/patient/<int:pid>")
def find_by_pid(pid):
    patient = Patient.query.filter_by(Patient_Id=pid).first()
    if patient:
        return jsonify(
            {
                "code": 200,
                "data": patient.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "Patient not found."
        }
    ), 404

@app.route("/patient/findById", methods=['POST'])
def find_by_pid2():
    data = request.get_json()
    pid = data['Patient_Id']
    patient = Patient.query.filter_by(Patient_Id=pid).first()
    if patient:
        return jsonify(
            {
                "code": 200,
                "data": patient.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "Patient not found."
        }
    ), 404

@app.route("/patient/add/<int:pid>", methods=['POST'])
def add_patient(pid):
    if (Patient.query.filter_by(Patient_Id=pid).first()):
        return jsonify(
            {
                "code": 400,
                "data": {
                    "Patient_Id": pid
                },
                "message": "Patient already exists."
            }
        ), 400
 
    data = request.get_json()
    patient = Patient(pid, **data)
 
    try:
        db.session.add(patient)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "data": {
                    "Patient_Id": pid
                },
                "message": "An error occurred whilst adding the patient."
            }
        ), 500
 
    return jsonify(
        {
            "code": 201,
            "data": patient.json()
        }
    ), 201
# @app.route("/patient/update/<string:username>", methods=['PUT'])
# def update_patient(username):
#     try:
#         patient = Patient.query.filter_by(Username=username).first()
#         if not patient:
#             return jsonify(
#                 {
#                     "code": 404,
#                     "data": {
#                         "Username": username
#                     },
#                     "message": "Patient not found."
#                 }
#             ), 404

#         data = request.get_json()
#         if data['ChatId']:
#             patient.ChatId = data['ChatId']
#             db.session.commit()
#             return jsonify(
#                 {
#                     "code": 200,
#                     "data": patient.json()
#                 }
#             ), 200
            
#     except Exception as e:
#         return jsonify(
#             {
#                 "code": 500,
#                 "data": {
#                     "Username": username
#                 },
#                 "message": "An error occurred while updating the order. " + str(e)
#             }
#         ), 500

@app.route("/patient/update/<string:username>", methods=['PUT'])
def update_patient(username):
    try:
        patient = Patient.query.filter_by(Username=username).first()
        #print(patient.P_name)
        if not patient:
            return jsonify(
                {
                    "code": 404,
                    "data": {
                        "Username": username
                    },
                    "message": "Patient not found."
                }
            ), 404

        data = request.get_json()
        data = json.loads(data)

        if data['ChatId']:
            patient.ChatId = data['ChatId']

        
        db.session.commit()
        return jsonify(
            {
                "code": 200,
                "data": patient.json()
            }
        ), 200
            
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "data": {
                    "Username": username
                },
                "message": "An error occurred while updating the order. " + str(e)
            }
        ), 500

@app.route("/patient/getchat/<string:username>")
def getChatId(username):
    bot_token = '1723827194:AAHYRWaFAz8YGP4-3JwN1CSj8SCVGozG8hQ'
    get_updates = 'https://api.telegram.org/bot' + bot_token + '/getUpdates'
    response = requests.get(get_updates)
    final = json.loads(response.text)
    #bot_message = "Your booking is confirmed!"

    Dict = final['result']
    # print(Dict)
    chatID = str(Dict[len(Dict)-1]['message']['chat']['id'])
    offset = str((Dict[len(Dict)-1]['update_id'])+1) # To clear the JSON

    clear_queue = 'https://api.telegram.org/bot' + bot_token + '/getUpdates?offset='+ offset

    response = requests.get(clear_queue)

    return jsonify(
        {
            "code": 200,
            "data": chatID
        }
    ), 200


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)