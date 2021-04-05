from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import and_, or_
from flask_cors import CORS
import json
import datetime
import time
from os import environ


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL') or 'mysql+mysqlconnector://root@localhost:3306/ESD5'
#app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:root@localhost:8889/ESD5'
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
    ApptTime= db.Column(db.Time,nullable=False)
    ApptDate=db.Column(db.Date,nullable=False)
    Completed=db.Column(db.String,nullable=False)

    def __init__(self, Patient_Id, Gid,Symptom, ApptTime, ApptDate,Completed):
        # self.Appointment_Id=Appointment_Id
        self.Patient_Id = Patient_Id
        self.Gid = Gid
        self.Symptom = Symptom
        self.ApptTime = ApptTime
        self.ApptDate = ApptDate
        self.Completed=Completed

    def json(self):
        return {"Appointment_Id": self.Appointment_Id, "Patient_Id": self.Patient_Id, "Gid": self.Gid, "Symptom": self.Symptom, "ApptTime": self.ApptTime,"ApptDate":self.ApptDate, "Completed":self.Completed}

#Healthcareworker View       
@app.route("/appointment/healthcareCurrentAppointments", methods=['POST'])
def currentAppointments():

    data = request.get_json()
    ApptDate = data['ApptDate']
    Gid = data['Gid']

    applist = Appointment.query.filter_by(ApptDate=ApptDate, Gid=Gid)
    allAppointments = []
    for app in applist:
        dateStr = str(app.ApptDate)
        timeStr = str(app.ApptTime)

        output = {
            'Appointment_Id' : app.Appointment_Id,
            'Patient_Id' : app.Patient_Id,
            'Gid' : app.Gid,
            'Symptom' : app.Symptom,
            'ApptTime' : timeStr,
            'ApptDate' :  dateStr,
            'Completed' : app.Completed
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

#Patient views appointment history or upcoming appointment
@app.route("/appointment/patientViewsAppointment", methods=['POST'])
def patientViewsAppointment():
    data = request.get_json()
    pid = data['Patient_Id']

    # data = request.get_json()
    # ApptDate = data['ApptDate']
    
    allAppointments = Appointment.query.filter_by(Patient_Id = pid)
    returnAppointments = []

    if allAppointments:
        for app in allAppointments:
            dateStr = str(app.ApptDate)
            timeStr = str(app.ApptTime)

            output = {
                'Appointment_Id' : app.Appointment_Id,
                'Patient_Id' : app.Patient_Id,
                'Gid' : app.Gid,
                'Symptom' : app.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : app.Completed
            }

            returnAppointments.append(output)

            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "appointments": returnAppointments
                    }
                }
            )
    return jsonify(
            {
                "code": 404,
                "message": "No Prescriptions found."
            }
    ), 404



#Patient Views Appointment History
@app.route("/appointment/patientViewsAppointmentHistory", methods=['POST'])
def patientViewsAppointmentHistory():

    current_date = datetime.date.today() 
    t = time.localtime()
    current_time = time.strftime("%H:%M:%S", t)


    data = request.get_json()
    print('---------------------------------------------')
    print(data)
    Pid = data['Patient_Id']
    

    apps = Appointment.query.filter(or_(and_(Appointment.ApptDate == current_date,Appointment.ApptTime <= current_time), (Appointment.ApptDate < current_date))).filter_by(Patient_Id = Pid,Completed = True).all()

    if apps: 
        output = []
        for app in apps: 
            dateStr = str(app.ApptDate)
            timeStr = str(app.ApptTime)
            appointment = {
                'Appointment_Id' : app.Appointment_Id,
                'Patient_Id' : app.Patient_Id,
                'Gid' : app.Gid,
                'Symptom' : app.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : app.Completed
            }

            output.append(appointment)
        return jsonify(
            {
                "code": 200,
                "data": {
                    "appointments": output
                }
            }
        )
    return jsonify(
            {
                "code": 404,
                "message": "No Prescriptions found."
            }
    ), 404
        
        

#Patient Views Upcoming Appointment
@app.route("/appointment/patientViewsUpcomingAppointment", methods=['POST'])
def patientViewsUpcomingAppointment():

    current_date = datetime.date.today() 
    print(current_date)
    print(type(current_date))

    t = time.localtime()
    current_time = time.strftime("%H:%M:%S", t)
    print(current_time)
    print(type(current_time))


    data = request.get_json()
    Pid = data['Patient_Id']

    # apps = Appointment.query.filter(or_
    # (and_(Appointment.ApptDate == current_date,Appointment.ApptTime >= current_time)), (Appointment.ApptDate > current_date)).filter_by(Patient_Id = Pid, Completed = 0).all()

    apps = Appointment.query.filter(or_(and_(Appointment.ApptDate == current_date,Appointment.ApptTime >= current_time), (Appointment.ApptDate > current_date))).filter_by(Patient_Id = Pid,Completed = False).all()

    if apps: 
        output = []
        for app in apps: 
            dateStr = str(app.ApptDate)
            timeStr = str(app.ApptTime)
            appointment = {
                'Appointment_Id' : app.Appointment_Id,
                'Patient_Id' : app.Patient_Id,
                'Gid' : app.Gid,
                'Symptom' : app.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : app.Completed
            }

            output.append(appointment)
        return jsonify(
            {
                "code": 200,
                "data": {
                    "appointments": output
                }
            }
        )
    return jsonify(
            {
                "code": 404,
                "message": "No Prescriptions found."
            }
    ), 404



#Patient Views Lapsed Appointment
@app.route("/appointment/patientViewsLapsedAppointment", methods=['POST'])
def patientViewsLapsedAppointment():

    current_date = datetime.date.today() 
    print(current_date)
    print(type(current_date))

    t = time.localtime()
    current_time = time.strftime("%H:%M:%S", t)
    print(current_time)
    print(type(current_time))


    data = request.get_json()
    Pid = data['Patient_Id']

    apps = Appointment.query.filter(or_(and_(Appointment.ApptDate == current_date,Appointment.ApptTime <= current_time), (Appointment.ApptDate < current_date))).filter_by(Patient_Id = Pid,Completed = False).all()


    # apps = Appointment.query.filter((Appointment.ApptDate == current_date & Appointment.ApptTime <= current_time) | (Appointment.ApptDate < current_date)).filter_by(Patient_Id = Pid,Completed = False).all()
    # apps = Appointment.query.filter(or_(and_(Appointment.ApptDate == current_date,Appointment.ApptTime <= current_time)),(Appointment.ApptDate < current_date)).filter_by(Patient_Id = Pid,Completed = False).all()


    #apps = Appointment.query.filter(Appointment.ApptDate < current_date).filter_by(Patient_Id = Pid,Completed = False).all()

    if apps: 
        print('app condition runs')
        output = []
        for app in apps: 
            print('loop')
            dateStr = str(app.ApptDate)
            timeStr = str(app.ApptTime)
            appointment = {
                'Appointment_Id' : app.Appointment_Id,
                'Patient_Id' : app.Patient_Id,
                'Gid' : app.Gid,
                'Symptom' : app.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : app.Completed
            }

            output.append(appointment)
        return jsonify(
            {
                "code": 200,
                "data": {
                    "appointments": output
                }
            }
        )
    return jsonify(
            {
                "code": 404,
                "message": "No Prescriptions found."
            }
    ), 404


#View a specific appointment
@app.route("/appointment/viewAppointmentById", methods =['POST'])
def find_by_appointment_id():
    
    data = request.get_json()
    Appointment_Id = data['Appointment_Id']

    app = Appointment.query.filter_by(Appointment_Id=Appointment_Id).first()
    if app:
            dateStr = str(app.ApptDate)
            timeStr = str(app.ApptTime)
            return jsonify(
            {
                "code": 200,
                "data": {
                'Appointment_Id' : app.Appointment_Id,
                'Patient_Id' : app.Patient_Id,
                'Gid' : app.Gid,
                'Symptom' : app.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : app.Completed
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "Appointment not found."
        }
    ), 404


#create Appointment
@app.route("/appointment/createAppointment", methods=['POST'])
def create_appointment():

    data = request.get_json()
    del data['Clinic_Name']
    app = Appointment(**data)
    try: 
        db.session.add(app)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred creating the appointment."
            }
        ), 500

    dateStr = str(app.ApptDate)
    timeStr = str(app.ApptTime)
    return jsonify(
        {
            "code": 201,
            "data": {
                'Appointment_Id' : app.Appointment_Id,
                'Patient_Id' : app.Patient_Id,
                'Gid' : app.Gid,
                'Symptom' : app.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : app.Completed
            }
        }
    ), 201

#update Appointment
#issues
@app.route("/appointment/updateAppointment", methods=['PUT'])
def update_appointment():
    data = request.get_json()
    Aid = data['Appointment_Id']
    appointment = Appointment.query.filter_by(Appointment_Id=Aid).first()
    if appointment: 
        appointment.Completed = 1
        db.session.commit()
        dateStr = str(appointment.ApptDate)
        timeStr = str(appointment.ApptTime)
        return jsonify(
            {
                "code": 200,
                "data":  {
                'Appointment_Id' : appointment.Appointment_Id,
                'Patient_Id' : appointment.Patient_Id,
                'Gid' : appointment.Gid,
                'Symptom' : appointment.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : appointment.Completed
                }
            }
        ), 200
    return jsonify(
        {
            "code": 404,
            
            "message": "Appointment not found."
        }
    ), 404

#delete Appointment
@app.route("/appointment/delete_appointment", methods=['DELETE'])
def delete_appointment():
    data = request.get_json()
    Appointment_Id = data['Appointment_Id']
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


@app.route("/appointment/getFirstInLine", methods=['POST'])
def getFirstInLine():

    current_date = datetime.date.today() 
    print(current_date)
    print(type(current_date))

    t = time.localtime()
    current_time = time.strftime("%H:%M:%S", t)
    print(current_time)
    print(type(current_time))

    data = request.get_json()
    Gid = data["Gid"]

    # apps = Appointment.query.filter(or_
    # (and_(Appointment.ApptDate == current_date,Appointment.ApptTime >= current_time)), (Appointment.ApptDate > current_date)).filter_by(Patient_Id = Pid, Completed = 0).all()

    app = Appointment.query.filter(Appointment.ApptTime >= current_time).filter(Appointment.ApptDate == current_date).filter(Appointment.Gid == Gid).filter(Appointment.Completed == False).order_by(Appointment.ApptDate, Appointment.ApptTime).first()
    # print(app)
    dateStr = str(app.ApptDate)
    timeStr = str(app.ApptTime)
    # print(app)

    return jsonify({
            "appointment": {
                'Appointment_Id' : app.Appointment_Id,
                'Patient_Id' : app.Patient_Id,
                'Gid' : app.Gid,
                'Symptom' : app.Symptom,
                'ApptTime' : timeStr,
                'ApptDate' :  dateStr,
                'Completed' : app.Completed
            }
    }
    )

    return jsonify(
            {
                "code": 404,
                "message": "No Prescriptions found."
            }
    ), 404

@app.route("/appointment/getQueueNumber", methods=['POST'])
def getQueueNumber():

    current_date = datetime.date.today() 
    print(current_date)
    print(type(current_date))

    t = time.localtime()
    current_time = time.strftime("%H:%M:%S", t)
    print(current_time)
    print(type(current_time))


    data = request.get_json()
    aid = data['Appointment_Id']
    Gid = data["Gid"]

    # apps = Appointment.query.filter(or_
    # (and_(Appointment.ApptDate == current_date,Appointment.ApptTime >= current_time)), (Appointment.ApptDate > current_date)).filter_by(Patient_Id = Pid, Completed = 0).all()

    apps = Appointment.query.filter(Appointment.ApptTime >= current_time).filter( Appointment.ApptDate == current_date).filter(Gid == Gid). filter(Appointment.Completed == False).order_by(Appointment.ApptDate, Appointment.ApptTime).all()

    counter = 0
    found = False
    if apps: 
        for app in apps: 
            if str(app.Appointment_Id) == str(aid):
                found = True
                break
            counter += 1
        if found:
            return jsonify(
                {
                    "code": 200,
                    "data": {
                        "count": counter
                    }
                }
            )
        
    return jsonify(
            {
                "code": 404,
                "message": "No Prescriptions found."
            }
    ), 404

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001, debug=True)
