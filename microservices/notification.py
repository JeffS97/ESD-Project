from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import requests
import json
import pika
import uuid
import threading
import amqp_setup
import os


app = Flask(__name__)
queue = {}

app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/ESD5'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root:root@localhost:8889/ESD5'

monitorBindingKey='*.notification'
bot_token = '1723827194:AAHYRWaFAz8YGP4-3JwN1CSj8SCVGozG8hQ'

def receive_notification():
    amqp_setup.check_setup()
    queue_name = 'notification'
    amqp_setup.channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
    amqp_setup.channel.start_consuming() # an implicit loop waiting to receive messages; 

def callback(channel, method, properties, body):
    print("\nReceived a notification by " + __file__)
    processNotification(body)
    print() # print a new line feed

def processNotification(notification):
    print("Printing the notification:")
    try: 
        notification = json.loads(notification)
        ApptTime = notification['ApptTime']
        ApptDate = notification['ApptDate']
        name = notification['P_name']
        chid = notification['ChatId']
        bot_message = 'Dear ' + name + ' Your appointment for: ' + ApptDate + " At " + ApptTime + ' Has been confirmed'
        send_text = 'https://api.telegram.org/bot' + bot_token + '/sendMessage?chat_id=' + chid + '&parse_mode=Markdown&text=' + bot_message
        response = requests.get(send_text)
        print("--JSON:", notification)
    except Exception as e:
        print("--NOT JSON:", e)
        print("--DATA:", notification)
    print()

if __name__ == "__main__":  # execute this program only if it is run as a script (not by 'import')    
    print("\nThis is " + os.path.basename(__file__), end='')
    print(": monitoring routing key '{}' in exchange '{}' ...".format(monitorBindingKey, amqp_setup.exchangename))
    #app.run(host="0.0.0.0", port=5004, debug=True)
    receive_notification()
