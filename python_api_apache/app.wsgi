#! /usr/bin/python3.6

import logging
import sys
logging.basicConfig(stream=sys.stderr)
sys.path.insert(0, '/var/www/html/tcds/python_api_apache')
from my_flask_app import app as application
application.secret_key = 'anything you wish'
