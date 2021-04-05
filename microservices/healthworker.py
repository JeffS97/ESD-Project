from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
from flask_cors import CORS
from os import environ

app = Flask(__name__)

app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL') or 'mysql+mysqlconnector://root@localhost:3306/ESD5'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:root@localhost:8889/ESD5'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False

db = SQLAlchemy(app)

class Healthworker(db.Model):
    __tablename__ = 'Healthworker'

    Healthworker_Id = db.Column(db.Integer, primary_key=True)
    H_Name = db.Column(db.String(64), nullable=False)
    Gid = db.Column(db.Integer, nullable=False)
    H_Role = db.Column(db.String(500), nullable=False)
    H_Password = db.Column(db.String(500), nullable=False)

    def __init__(self, Healthworker_Id, H_Name, Gid, H_Role, H_Password):
        self.Healthworker_Id = Healthworker_Id
        self.H_Name = H_Name
        self.Gid = Gid
        self.H_Role = H_Role
        self.H_Password = H_Password

    def json(self):
        return {"Healthworker_Id": self.Healthworker_Id, "H_Name": self.H_Name, "H_Password": self.H_Password, "H_Role": self.H_Role, "Gid": self.Gid}


@app.route("/healthworkers")
def get_all():
    healthworker_list = Healthworker.query.all()
    if len(healthworker_list):
        return jsonify(
            {
                "code": 200,
                "data": {
                    "healthworkers": [healthworker.json() for healthworker in healthworker_list]
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "There are no healthworkers."
        }
    ), 404


@app.route("/healthworker/<int:hid>")
def find_by_hid(hid):
    healthworker = Healthworker.query.filter_by(Healthworker_Id=hid).first()
    if healthworker:
        return jsonify(
            {
                "code": 200,
                "data": healthworker.json()
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "Healthworker not found."
        }
    ), 404


@app.route("/healthworker/add/<int:hid>", methods=['POST'])
def add_healthworker(hid):
    if (Healthworker.query.filter_by(Healthworker_Id=hid).first()):
        return jsonify(
            {
                "code": 400,
                "data": {
                    "Healthworker_Id": hid
                },
                "message": "Healthworker already exists."
            }
        ), 400
 
    data = request.get_json()
    healthworker = Healthworker(hid, **data)
    print(healthworker.json())
    try:
        db.session.add(healthworker)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "data": {
                    "Healthworker_Id": hid
                },
                "message": "An error occurred whilst adding the healthworker."
            }
        ), 500
 
    return jsonify(
        {
            "code": 201,
            "data": healthworker.json()
        }
    ), 201

@app.route("/healthworker/update/<int:hid>", methods=['PUT'])
def update_healthworker(hid):
    try:
        healthworker = Healthworker.query.filter_by(Healthworker_Id=hid).first()
        if not healthworker:
            return jsonify(
                {
                    "code": 404,
                    "data": {
                        "Healthworker_Id": hid
                    },
                    "message": "Healthworker not found."
                }
            ), 404

        # data = request.get_json()
        # if data['Allergy']:
        #     patient.Allergy = data['Allergy']
        #     db.session.commit()
        #     return jsonify(
        #         {
        #             "code": 200,
        #             "data": patient.json()
        #         }
        #     ), 200
            
    except Exception as e:
        return jsonify(
            {
                "code": 500,
                "data": {
                    "Healthworker_Id": hid
                },
                "message": "An error occurred while updating the healthworker information. " + str(e)
            }
        ), 500
 

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5003, debug=True)