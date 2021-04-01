from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
import datetime

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/cliniq'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

# string given by db 
# date_time_str = '2018-06-29'
# how to create datetime object
# now = str(datetime.now())
# print(now)
# altered = now[:10]+ 'T' + now[11:-7]
# date_obj = date(2021,3,23)
# print(date_obj)
# date = date_obj.strftime("%Y-%M-%D")
# date = str(date.year) + '-' + str(date.month) + '-' + str(date.day)
# date_time_obj.strftime('%Y%M%D')
# print(date)
# print(type(date))
# print(date_time_obj)
# print(type(date_time_obj))

class Prescription(db.Model):
    __tablename__ = 'prescription'
    # mapping table properties to db column
    Prescription_Id = db.Column(db.Integer, primary_key=True)
    Patient_Id = db.Column(db.Integer, nullable=False)
    Gid = db.Column(db.Integer, nullable=False)
    ATime = db.Column(db.DateTime, nullable=False)
    Prescription_time = db.Column(db.DateTime, nullable=False)
    Description = db.Column(db.String, nullable=False)

    def init(self, Prescription_Id, Patient_Id, Gid, ATime, Prescription_time, Description):
        self.Prescription_Id = Prescription_Id
        self.Patient_Id = Patient_Id
        self.Gid = Gid
        self.ATime = ATime
        self.Prescription_time = Prescription_time
        self.Description = Description

    def json(self):
        return {"Prescription_Id": self.Prescription_Id, "Patient_Id": self.Patient_Id, "Gid": self.Gid, "ATime": self.ATime, "Prescription_time": self.Prescription_time, "Description": self.Description}

@app.route("/")
def test():

    print('hello')
    return jsonify(
        {
            "code": 200,
            "message": "Test."
        }
    ), 200

@app.route("/getAll")
def get_all():
    allPrescriptions = Prescription.query.all()
    if len(allPrescriptions):
        return jsonify(
            {
                "code": 200,
                "data": {
                    "prescriptions": [Prescription.json() for Prescription in allPrescriptions]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "No Prescriptions found."
        }
    ), 404


@app.route("/getByPatient", methods=['POST'])
def find_by_patient():
    # Get for a patient
    # Perhaps we may need to set an additional condition to limit refills by date or number
    
    # Get post request json 
    data = request.get_json()
    pid = data['Patient_Id']
    print(pid) 


    current_time = datetime.datetime.now()
    one_month = current_time - datetime.timedelta(weeks=4)

    prescriptions = Prescription.query.filter(Prescription.ATime > one_month).filter_by(Patient_Id = pid)
    if prescriptions:
        return jsonify(
            {
                "code": 200,
                "data": {
                    #Need to change in accordance to Appointment
                    "prescriptions":  [Prescription.json() for Prescription in prescriptions]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "No Prescriptions not found."
        }
    ), 404


@app.route("/getPrescription/<int:Prescription_Id>")
def find_by_Id(Prescription_Id):
    prescription = Prescription.query.filter_by(Prescription_Id=Prescription_Id).first()
    if prescription:
        return jsonify(
            {
                "code": 200,
                "data": prescription.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "No Prescriptions not found."
        }
    ), 404



@app.route("/addPrescription", methods= ['POST'])
def create_prescription():

# @app.route("/addPrescription/<int:pid>/<int:Gid>/<string:ATime>", methods=['POST'])
# def create_prescription(pid, Gid, ATime):

    # value3 = Prescription.query.filter_by(Patient_Id=pid, Gid=Gid, ATime=ATime).first()
    # print(value3)
    # value2 = value.query.filter_by(Gid=Gid)
    # value3 = value2.query.filter_by(ATime=ATime)

    # if (Prescription.query.filter_by(Patient_Id=Patient_Id).filter_by(Gid=Gid).filter_by(ATime=ATime)):
    # if value3:
        # return jsonify(
        #     {
        #         "code": 400,
        #         "message": "Prescription already exits."
        #     }
        # ), 400

    data = request.get_json()
    prescription = Prescription(**data)

    try:
        db.session.add(prescription)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred creating the prescription."
            }
        ), 500

    return jsonify(
        {
            "code": 201,
            "data": prescription.json()
        }
    ), 201


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5001, debug=True)
