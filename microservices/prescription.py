from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import join
from os import environ
import datetime

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/ESD5'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:root@localhost:8889/ESD5'
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
    Appointment_Id = db.Column(db.Integer, nullable = False)
    PrevDate = db.Column(db.Date, nullable=False)
    EndDate = db.Column(db.Date, nullable=False)
    Interval_Days = db.Column(db.Integer, nullable=True)
    Name = db.Column(db.String, nullable=False)


    def init(self, Appointment_Id, PrevDate, EndDate, Interval_Days, Name):
        self.Appointment_Id = Appointment_Id
        self.PrevDate = PrevDate
        self.EndDate = EndDate
        self.Interval_Days = Interval_Days
        self.Name = Name

    def json(self):
        return {"Prescription_Id" : self.Prescription_Id, "Appointment_Id" : self.Appointment_Id, "PrevDate": self.PrevDate, "EndDate": self.EndDate, "Interval_Days": self.Interval_Days, "Name": self.Name}

# @app.route("/")
# def test():

#     print('hello')
#     return jsonify(
#         {
#             "code": 200,
#             "message": "Test."
#         }
#     ), 200

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


#view all prescriptions valid for a refill given the appointment Id based upon the current day
@app.route("/prescription/getByAppointment/<int:Aid>")
def getByAppointment(Aid):

    current_date = datetime.date.today()
    prescriptions = Prescription.query.filter_by(Appointment_Id = Aid).all()
    output = []

    for prescription in prescriptions:
        PrevDate = prescription.PrevDate
        print(PrevDate)
        Interval_Days = prescription.Interval_Days
        EndDate = prescription.EndDate

        if Interval_Days != None:
            nextCollectionDate = PrevDate + datetime.timedelta(days = int(Interval_Days))

            nextCollectionDateStr = str(nextCollectionDate).split(' ')[0]
            nextDate = datetime.datetime.strptime('24052010', "%d%m%Y").date()
            print(nextDate)
            print(type(nextDate))


            if nextDate <= current_date and Interval_Days != None and EndDate >= current_date:
                output.append(prescription)
                print(prescription)
        
    if prescriptions:
        return jsonify(
            {
                "code": 200,
                "data": {
                    "prescriptions":  [Prescription.json() for Prescription in output]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "No Prescriptions not found."
        }
    ), 404


@app.route("/prescription/update<int:pid>", methods=['PUT'])
def update_prescription_date(pid):
    prescription= Prescription.query.filter_by(Prescription_Id=pid).first()
    if prescription:
        current_date = datetime.date.today() 
        prescription.PrevDate = current_date


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
    app.run(host='0.0.0.0', port=5002, debug=True)
