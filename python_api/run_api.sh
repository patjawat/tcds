#!/bin/sh
#!/usr/bin/env python3

#ps ax | grep server.py
# nohup python3 server.py > output.log & 
nohup python -u ./server.py > output.log &