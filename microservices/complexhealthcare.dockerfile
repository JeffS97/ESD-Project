FROM python:3-slim
WORKDIR /usr/src/app
COPY requirements.txt ./
RUN pip install --no-cache-dir -r requirements.txt
ENV TZ="Asia/Singapore"
RUN date
COPY ./complexHealthcare.py ./invokes.py ./amqp_setup.py ./
CMD [ "python", "./complexHealthcare.py" ]