FROM python:3-slim
WORKDIR /usr/src/app
COPY requirements.txt ./
# ENV TZ="Asia/Singapore"
# RUN date
RUN pip install --no-cache-dir -r requirements.txt
COPY ./payment.py ./
CMD [ "python", "./payment.py" ]



