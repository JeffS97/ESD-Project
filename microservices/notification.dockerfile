FROM python:3-slim
WORKDIR /usr/src/app
COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt
COPY ./notification.py ./invokes.py ./amqp_setup.py ./
CMD [ "python", "./notification.py" ]