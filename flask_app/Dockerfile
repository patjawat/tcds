# Dockerfile - this is a comment. Delete me if you want.
FROM python:3.6
COPY . /app
WORKDIR /app
#RUN pip install -r requirements.txt
RUN apt-get update
RUN apt-get install libapache2-mod-wsgi-py3 python-dev libzbar0 libapache2-mod-wsgi-py3 -y
RUN pip install waitress jsonify flask flask_restful flask_cors pandas pyzbar Pillow opencv-python opencv-contrib-python opencv-python-headless opencv-contrib-python-headless simplejson requests
ENTRYPOINT ["python"]
CMD ["app.py"]