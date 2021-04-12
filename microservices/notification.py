from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
import requests
import json
import pika
import uuid
import threading
import amqp_setup
import smtplib, ssl
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
import os
from os import environ


app = Flask(__name__)
queue = {}

app.config['SQLALCHEMY_DATABASE_URI'] = environ.get('dbURL') or 'mysql+mysqlconnector://root@localhost:3306/ESD5'
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
    print(body)
    body2 = json.loads(body)
    if(body2['Type'] == 'Appointment'):
        processNotification(body)
    elif(body2['Type'] == 'Reminder'):
        processReminder(body)
    print() # print a new line feed

def processNotification(notification):
    print("Printing the notification:")
    try: 
        notification = json.loads(notification)
        ApptTime = notification['ApptTime']
        ApptDate = notification['ApptDate']
        Clinic_Name = notification['Clinic_Name']
        name = notification['P_name']
        chid = notification['ChatId']
        receiver_email = notification['Email']
        bot_message = 'Dear ' + name.capitalize() + ' Your appointment at: '+ Clinic_Name +" On: "+ ApptDate + " At: " + ApptTime + ' has been confirmed!'
        send_text = 'https://api.telegram.org/bot' + bot_token + '/sendMessage?chat_id=' + chid + '&parse_mode=Markdown&text=' + bot_message
        response = requests.get(send_text)

        sender_email = 'cliniqservices@gmail.com'
        #receiver_email = "jeffvinder@hotmail.com"
        password = 'esdproject'

        name = 'Jeff'
        ApptTime = '12:04PM'
        ApptDate = '12/02/2021'
        Clinic_Name = 'Penis Health'

        test = 'Dear ' +  name + ' Your appointment at: '+ Clinic_Name +" On: "+ ApptDate + " At: " + ApptTime + ' has been confirmed!'

        message = MIMEMultipart("alternative")
        message["Subject"] = "Appointment Confirmed!"
        message["From"] = sender_email
        message["To"] = receiver_email

        text = test
        part1 = MIMEText(text, "plain")

        message.attach(part1)

        # Create secure connection with server and send email
        context = ssl.create_default_context()
        with smtplib.SMTP_SSL("smtp.gmail.com", 465, context=context) as server:
            server.login(sender_email, password)
            server.sendmail(
                sender_email, receiver_email, message.as_string()
            )

        print("--JSON:", notification)
    except Exception as e:
        print("--NOT JSON:", e)
        print("--DATA:", notification)
    print()

def processReminder(notification):
    print("Printing the notification:")
    try: 
        notification = json.loads(notification)
        ApptTime = notification['ApptTime']
        ApptDate = notification['ApptDate']
        name = notification['P_name']
        chid = notification['ChatId']
        bot_message = 'Dear ' + name + ' Your appointment is up next!'
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
