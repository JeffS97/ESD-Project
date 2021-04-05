from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from os import environ
app = Flask(__name__)
 
app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL') or 'mysql+mysqlconnector://root@localhost:3306/esd5'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
 
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/esd6'
# app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL')
# app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
 
db = SQLAlchemy(app)
 
class Refill(db.Model):
    __tablename__ = 'refill'
    #mapping table properties to db column
    Prescription_Id = db.Column(db.Integer, primary_key=True)
    Refill_Id = db.Column(db.Integer, primary_key=True)
    Total_Refill = db.Column(db.Integer, nullable=False)
 
    def init(self, Refill_Id, Prescription_Id, Total_Refill):
        self.Refill_Id = Refill_Id
        self.Prescription_Id = Prescription_Id
        self.Total_Refill = Total_Refill
 
    def json(self):
        return {"Refill_Id": self.Refill_Id, "Prescription_Id": self.Prescription_Id, "Total_Refill": self.Total_Refill}
 
@app.route("/getRefill") #Consider getting refill by gid instead of getting refill from all clinics
def get_all():
    refill_list = Refill.query.all()
    if len(refill_list):
        return jsonify(
            {
                "code": 200,
                "data": {
                    "refills": [refill.json() for refill in refill_list] 
                }
            }
        )
    return jsonify(
        {
            "code": 404,
            "message": "There are no refills."
        }
    ), 404
 
@app.route("/createRefill", methods=['POST']) #Make this work
def create_refill(): #Prescription_Id,Total_Refill
    # if (Refill.query.filter_by(Prescription_Id = Prescription_Id).first()):
    #     return jsonify(
    #         {
    #             "code": 400,
    #             "data": {
    #                 "refillid" : Refill_Id
    #                 "prescriptionid" : Prescription_Id
    #             },
    #             "message": "Refill already exists."
    #         }
    #     ), 400
 
    data = request.get_json()
    refill = Refill(**data)
 
    try:
        db.session.add(refill)
        db.session.commit()
    except:
        return jsonify(
            {
                "code": 500,
                "data": {
                    
                    "Refill_Id": Refill_Id
                    

                },
                "message": "An error occurred creating the book."
            }
        ), 500
 
    return jsonify(
        {
            "code": 201,
            "data": refill.json()
        }
        ), 201

# @app.route("/book/<string:isbn13>")
# def find_by_isbn13(isbn13):
#     book = Book.query.filter_by(isbn13=isbn13).first()
#     if book:
#         return jsonify(
#             {
#                 "code": 200,
#                 "data": book.json()
#             }
#         )
#     return jsonify(
#         {
#             "code": 404,
#             "message": "Book not found."
#         }
#     ), 404
 
  


# @app.route("/createRefill/<string:isbn13>")
# def find_by_refillid(Refill_Id, Prescription_Id):
#     refill = Refill.query.filter_by(Refill_Id = refillid and Prescription_Id = prescriptionid).first()
#     if refill:
#         return jsonify(
#             {
#                 "code": 200,
#                 "data": refill.json()
#             }
#         )
#     return jsonify(
#         {
#             "code": 404,
#             "message": "Refill not found."
#         }
#     ), 404

# @app.route("/book/<string:isbn13>", methods=['POST'])
# def create_book(isbn13):
#     if (Book.query.filter_by(isbn13=isbn13).first()):
#         return jsonify(
#             {
#                 "code": 400,
#                 "data": {
#                     "isbn13": isbn13
#                 },
#                 "message": "Book already exists."
#             }
#         ), 400
 
#     data = request.get_json()
#     book = Book(isbn13, **data)
 
#     try:
#         db.session.add(book)
#         db.session.commit()
#     except:
#         return jsonify(
#             {
#                 "code": 500,
#                 "data": {
#                     "isbn13": isbn13
#                 },
#                 "message": "An error occurred creating the book."
#             }
#         ), 500
 
#     return jsonify(
#         {
#             "code": 201,
#             "data": book.json()
#         }
#         ), 201
 
 
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5004, debug=True)