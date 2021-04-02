from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import json
import pika
import uuid
import threading

app = Flask(__name__)
queue = {}