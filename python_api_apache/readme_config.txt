######## Requirements
1.apache2
2.mod_wsgi (for python3)
3.flask

**** Installation Guide
==== >> Install Apache
sudo apt update
sudo apt install apache2

==== >> Install mod_wsgi
** python 3.6
sudo apt-get install libapache2-mod-wsgi-py3 python-dev

** python 2
sudo apt-get install libapache2-mod-wsgi-py python-dev

#######  Install flask
pip3.6 install flask

#######  config 

1. create file  == >> __init__.py
2.create file ==>> my_flask_app.py
    from flask import Flask
    app = Flask(__name__)
    @app.route("/")
    def hello():
        return "Hello world!"

if __name__ == "__main__":
    app.run()
#=================================================
3 create file ==>> my_flask_app.wsgi
    #! /usr/bin/python3.6

    import logging
    import sys
    logging.basicConfig(stream=sys.stderr)
    sys.path.insert(0, '/home/username/ExampleFlask/')
    from my_flask_app import app as application
    application.secret_key = 'anything you wish'
#===================================================
4 create vhost file ==>> /etc/apache2/sites-available/ExampleFlask.conf

        <VirtualHost *:80>
     # Add machine's IP address (use ifconfig command)
     ServerName 192.168.1.103
     # Give an alias to to start your website url with
     WSGIScriptAlias /testFlask /home/username/ExampleFlask/my_flask_app.wsgi
     <Directory /home/username/ExampleFlask/ExampleFlask/>
     		# set permissions as per apache2.conf file
            Options FollowSymLinks
            AllowOverride None
            Require all granted
     </Directory>
     ErrorLog ${APACHE_LOG_DIR}/error.log
     LogLevel warn
     CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

#===================================================
5. sudo a2ensite /etc/apache2/sites-available/ExampleFlask.conf
6. reload apache == >> /etc/init.d/apache2 restart
