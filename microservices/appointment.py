from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import json
import datetime
import time


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/esd7'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

# conn = psycopg2.connect(
#     host="localhost",
#     database="",
#     user="postgres",
#     password="Abcd1234")

db = SQLAlchemy(app)

CORS(app)  

class Appointment(db.Model):
    __tablename__ = 'appointment'
    Appointment_Id=db.Column(db.Integer, primary_key=True, autoincrement = True)
    Patient_Id = db.Column(db.Integer,nullable=False)
    Gid= db.Column(db.Integer, nullable=False)
    Symptom = db.Column(db.String(255), nullable=False)
    ATime= db.Column(db.Time,nullable=False)
    ADate=db.Column(db.Date,nullable=False)
    Approved=db.Column(db.String,nullable=False)

    def __init__(self, Appointment_Id ,Patient_Id, Gid,Symptom, ATime,ADate,Approved):
        # self.Appointment_Id=Appointment_Id
        self.Patient_Id = Patient_Id
        self.Gid = Gid
        self.Symptom = Symptom
        self.ATime = ATime
        self.ADate=ADate
        self.Approved=Approved

    def json(self):
        return {"Patient_Id": self.Patient_Id, "Gid": self.Gid, "Symptom": self.Symptom, "ATime": self.ATime,"ADate":self.ADate, "Approved":self.Approved}

        
@app.route("/appointment")
def get_all():
    applist = Appointment.query.all()
    if len(applist):
        return jsonify(
            {
                "code": 200,
                "data": {
                    "books": [app.json() for app in applist]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "There are no Appointments"
        }
    ), 404

    current_date = datetime.date.now()
    # one_month = current_time - datetime.timedelta(weeks=4)

    prescriptions = Prescription.query.filter(Appointment.ATime > current_time).filter_by(Gid = Gid)
    if prescriptions:
        return jsonify(
            {
                "code": 200,
                "data": {
                    "prescriptions":  [Prescription.json() for Prescription in prescriptions]
                }
            }
        )
@app.route("/appointment/currentAppointments", methods=['POST'])
def currentAppointments():

    data = request.get_json()
    print('Hello')
    Gid = data['Gid']
    ADate = data['ADate']
    

    applist = Appointment.query.filter_by(Gid=Gid, ADate=ADate)
    allAppointments = []
    for app in applist:
        dateStr = str(app.ADate)
        timeStr = str(app.ATime)

        output = {
            'Appointment_Id' : app.Appointment_Id,
            'Patient_Id' : app.Patient_Id,
            'Gid' : app.Gid,
            'Symptom' : app.Symptom,
            'ATime' : timeStr,
            'ADate' :  dateStr,
            'Approved' : app.Approved
        }

        allAppointments.append(output)
        
    if applist:
        return jsonify(
            {
                "code": 200,
                "data": {
                    "appointments": allAppointments
                }
            }
        )
    print(allAppointments)

    print('test')
    return jsonify(
        {
            "code": 404,
            "message": "Appointments not found."
        }
    ), 404

@app.route("/appointment/approveHealthcareAppointment", methods=['POST'])
def approve_appointment(Appointment_Id):
    Appointment = Appointment.query.filter_by(Appointment_Id=Appointment_Id).first()
    if Appointment:
        data = request.get_json()
        Appointment.Approved = True
        db.session.commit()
        return jsonify(
            {
                "code": 200,
                "data": app.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "Appointment not found."
        }
    ), 404


@app.route("/appointment/viewHealthcareAppointment", methods=['POST'])
def viewHealthcareAppointments():

    current_date = datetime.date.today() 
    t = time.localtime()
    current_time = time.strftime("%H:%M:%S", t)


    data = request.get_json()
    Gid = data['Gid']

    app = Appointment.query.filter(current_time <= Appointment.ATime).filter(current_date <= Appointment.ADate).filter_by(Gid = Gid)

    if app:
        print('---------ANSWER ---------------')
        print(app)
        dateStr = str(app.ADate)
        timeStr = str(app.ATime)

        return jsonify(
            {
                "code": 200,
                "data": {
                    'Appointment_Id' : app.Appointment_Id,
                    'Patient_Id' : app.Patient_Id,
                    'Gid' : app.Gid,
                    'Symptom' : app.Symptom,
                    'ATime' : timeStr,
                    'ADate' :  dateStr,
                    'Approved' : app.Approved
                }
            }
        )

    return jsonify(
        {
            "code": 404,
            "message": "Appointment not found."
        }
    ), 404

@app.route("/appointment/<int:Appointment_Id>")
def find_by_appointment_id(Appointment_Id):
    app = Appointment.query.filter_by(Appointment_Id=Appointment_Id).first()
    if app:
        return jsonify(
            {
                "code": 200,
                "data": app.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "Appointment not found."
        }
    ), 404




@app.route("/appointment/createAppointment", methods=['POST'])
def create_appointment():

    data = request.get_json()
    # Appointment_Id = None
    # Prevent double selection should be in place
    app = Appointment(**data)
    try: 
        db.session.add(app)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "data": {
                    "Patient_id": data.Patient_id
                },
                "message": "An error occurred creating the appointment."
            }
        ), 500

    return jsonify(
        {
            "code": 201,
            "data": app.json()
        }
    ), 201


@app.route("/appointment/<int:Appointment_Id>", methods=['PUT'])
def update_appointment(Appointment_Id):
    book = Appointment.query.filter_by(Appointment_Id=Appointment_Id).first()
    if book:
        data = request.get_json()
        if data['Symptom']:
            book.Sympton = data['Symptom']
        if data['ATime']:
            book.ATime = data['ATime']
        if data['ADate']:
            book.ADate = data['ADate']
        
        db.session.commit()
        return jsonify(
            {
                "code": 200,
                "data": app.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            
            "message": "Appointment not found."
        }
    ), 404


@app.route("/appointment/<int:Appointment_Id>", methods=['DELETE'])
def delete_appointment(Appointment_Id):
    app= Appointment.query.filter_by(Appointment_Id=Appointment_Id).first()
    if app:
        db.session.delete(app)
        db.session.commit()
        return jsonify(
            {
                "code": 200,
                "data": {
                    "Appointment_Id": Appointment_Id
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "data": {
                "Appointment_Id": Appointment_Id
            },
            "message": "Appointment not found."
        }
    ), 404


if __name__ == '__main__':
    app.run(port=5003, debug=True)
