#!/usr/bin/env python

import serial
import os
import time

def cls():
	os.system('clear')



class colors:
        HEADER = '\033[95m'
        OKBLUE = '\033[94m'
        OKGREEN = '\033[92m'
        WARNING = '\033[31m'
        FAIL = '\033[91m'
        ENDC = '\033[0m'
        BOLD = '\033[1m'
        UNDERLINE = '\033[4m'






print colors.FAIL + "[?]ATTENTE PORT SERIE" + colors.ENDC


while not os.path.exists("/dev/ttyACM0"):
    a = 1
print colors.OKGREEN + "[OK]PORT SERIE DETECTE" + colors.ENDC
time.sleep(1)
serialport = serial.Serial("/dev/ttyACM0", 9600, timeout=30)

d_tempint = "/var/www/html/tempint.dat"
d_tempext = "/var/www/html/tempext.dat"
d_luminosite = "/var/www/html/lumin.dat"
d_batterie = "/var/www/html/batterie.dat"
d_etat = "/var/www/html/etat.dat"
d_mode = "/var/www/html/mode.dat"
d_ouverture = "/var/www/html/ouverture.dat"


iter = 0

def envoi_serveur(fichier, data):
	contenu = open(fichier, 'w')
	contenu.truncate()
	contenu.write(data)
class colors:
	HEADER = '\033[95m'
	OKBLUE = '\033[94m'
	OKGREEN = '\033[92m'
	WARNING = '\033[31m'
	FAIL = '\033[91m'
	ENDC = '\033[0m'
	BOLD = '\033[1m'
	UNDERLINE = '\033[4m'

os.system('sleep 3')

while True:
	print colors.OKBLUE + "[?]LECTURE PORT SERIE" + colors.ENDC
	response = serialport.readline()
	print response
	iter = iter + 1
	if not response:
		print "error"
	else:
		print iter
		tempint,tempext,batterie,luminosite,etat,mode,dump= response.split("|")

		if tempint != "x":
			envoi_serveur(d_tempint,tempint)

		if tempext != "x":
			envoi_serveur(d_tempext,tempext)

		if batterie != "x":
			envoi_serveur(d_batterie,batterie)

		if luminosite != "x":
			envoi_serveur(d_luminosite,luminosite)

		if etat != "x":
			envoi_serveur(d_etat,etat)

		if mode != "x":
			envoi_serveur(d_mode,mode)

		if etat == "ouvert":
			envoi_serveur(d_ouverture,'haut')
		if etat == "ferme":
			envoi_serveur(d_ouverture, 'bas')



	print "==============="


