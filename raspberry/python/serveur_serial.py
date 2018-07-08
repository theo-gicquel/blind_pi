#!/usr/bin/env python

import serial
import os
import time

<<<<<<< HEAD
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
=======
>>>>>>> 77ebd645b892c682f5b1a11a885b13f45cdc6fc4
serialport = serial.Serial("/dev/ttyACM0", 9600, timeout=30)

d_tempint = "/var/www/html/tempint.dat"
d_tempext = "/var/www/html/tempext.dat"
<<<<<<< HEAD
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
=======
d_luminosite = "/var/www/html/luminosite.dat"
d_batterie = "/var/www/html/batterie.dat"
d_etat = "/var/www/html/etat.dat"
d_mode = "/var/www/html/mode.dat"

def cls():
	os.system('clear')


def envoi_serveur(fichier, data):
	print colors.OKBLUE + "[>]SYNCHRONISATION ( %s >>>>  %s ) " % (data,fichier)
	contenu = open(fichier, 'w')
	contenu.truncate()
	contenu.write(data)
	print colors.ENDC + colors.OKGREEN + "[OK]" + colors.ENDC



def envoi_arduino(fichier,contenu):
	contenu = open(fichier, 'r')
	serial.write(contenu)

>>>>>>> 77ebd645b892c682f5b1a11a885b13f45cdc6fc4
class colors:
	HEADER = '\033[95m'
	OKBLUE = '\033[94m'
	OKGREEN = '\033[92m'
	WARNING = '\033[31m'
	FAIL = '\033[91m'
	ENDC = '\033[0m'
	BOLD = '\033[1m'
	UNDERLINE = '\033[4m'

<<<<<<< HEAD
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
=======
cls()

while True:


	#ouverture = open(d_ouverture).read()
	#print ouverture

	#automatisme = open(d_automatisme).read()
	#print automatisme

	#serial_envoi = automatisme + "/" + ouverture

	#envoi serie



	print colors.OKBLUE + "[?]LECTURE PORT SERIE" + colors.ENDC
	response = serialport.readline()

	if not response:
		print colors.WARNING + "[!]ERREUR CRITIQUE:ANNULATION " + colors.ENDC
	else:
		print colors.OKGREEN + "[*]DONNES RECUES" + colors.ENDC
		print ""


		tempint,tempext,batterie,luminosite,etat,dump = response.split("|")



		envoi_serveur(d_tempint,tempint)
		envoi_serveur(d_tempext,tempext)
		envoi_serveur(d_batterie,batterie)
		envoi_serveur(d_luminosite,luminosite)
		envoi_serveur(d_etat,etat)
	print "----------------------------------------------"
	print ""

>>>>>>> 77ebd645b892c682f5b1a11a885b13f45cdc6fc4


