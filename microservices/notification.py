from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import json
import pika
import uuid
import threading

app = Flask(__name__)
queue = {}

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/ESD5'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:root@localhost:8889/ESD5'



if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5004, debug=True)