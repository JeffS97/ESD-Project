from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import join, desc
from os import environ
from flask_cors import CORS,cross_origin
import json
import datetime


app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = environ.get(
    'dbURL') or 'mysql+mysqlconnector://root@localhost:3306/ESD5'
#app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:root@localhost:8889/ESD5'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

CORS(app)

class Payment(db.Model):
    tablename = 'payment'
    # mapping table properties to db column
    Payment_Id = db.Column(db.Integer, primary_key=True)
    Patient_Id = db.Column(db.Integer, nullable = False)
    Date = db.Column(db.Date, nullable=False)
    Price = db.Column(db.Float, nullable = True)

    def init(self, Payment_Id, Patient_Id,Date,Price):
            self.Payment_Id = Payment_Id
            self.Patient_Id = Patient_Id
            self.Date = Date
            self.Price = Price

    def json(self):
            return {"Payment_Id" : self.Payment_Id, "Patient_Id" : self.Patient_Id, "Date": self.Date,  "Price": self.Price}

@app.route("/payment/getPayment", methods=['GET'])
def get_payment():
    data = request.get_json()
    current_date = datetime.date.today() 
    pid = data['Patient_Id']
    # payment= Payment.query.filter(Payment.Patient_Id==pid).filter(Payment.Date==current_date).order_by(desc(MyEntity.time)).first()
    # payment= Payment.query.filter(Payment.Patient_Id==pid).filter(Payment.Date==current_date).order_by(desc(Payment.Date), desc(Payment.Payment_Id)).first()
    payment= Payment.query.filter(Payment.Patient_Id==pid).filter(Payment.Date==current_date).order_by(desc(Payment.Payment_Id)).first()
    print(payment)
    if payment:
        True
    return jsonify(
        {
        "code": 200,
        "data": {
            "payment":  payment.json()
            }
        }
    )

    return jsonify(
        {
            "code": 404,
            "message": "No Payments found."
        }
    ), 404


@app.route("/payment/addPayment", methods= ['POST'])
def create_payment():

    data = request.get_json()
    payment = Payment(**data)

    try:
        db.session.add(payment)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "message": "An error occurred creating the payment."
            }
        ), 500

    return jsonify(
        {
            "code": 201,
            "data": payment.json()
        }
    ), 201

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5005, debug=True)