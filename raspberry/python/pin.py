#!/usr/bin/env python
import RPi.GPIO as GPIO
import time
import os

time.sleep(2)

GPIO.setmode(GPIO.BOARD)

GPIO.setup(35, GPIO.OUT) # mode auto/manuel
GPIO.setup(37, GPIO.OUT) # stop
GPIO.setup(33, GPIO.OUT)  # volet en haut

GPIO.setup(29, GPIO.OUT) # Volet est en bas
GPIO.setup(5, GPIO.OUT) # Fermer le volet
GPIO.setup(36, GPIO.OUT) # ouvrir le volet


d_etat = "/var/www/html/etat.dat"
d_ouverture = "/var/www/html/ouverture.dat"
d_mode = "/var/www/html/mode.dat"
d_stop = "/var/www/html/stop.dat"

try:
	while True:


		mode = open(d_mode).read()
		ouverture = open(d_ouverture).read()
		arret = open(d_stop).read()
		etat = open(d_etat).read()
		print "mode:" + mode + " ouverture:" + ouverture + " stop:" + arret + " etat:" + etat
		time.sleep(1)
		os.system('clear')

		if mode == "manuel":
			GPIO.output(35, 1)

			if ouverture == "haut":
				GPIO.output(5,0)
				GPIO.output(36, 1)
			else:
				GPIO.output(36, 0)
				GPIO.output(5, 1)

			if arret == "1":
				GPIO.output(37, 1)
			else:
				GPIO.output(37,0)

		if mode == "auto":
			GPIO.output(35, 0)
			GPIO.output(37,0)

		if etat == "stop":
			GPIO.output(33, 0)
			GPIO.output(29, 0)

		if etat == "ferme":
			GPIO.output(33,0)
			GPIO.output(29, 1)

		if etat == "ouvert":
			GPIO.output(29,0)
			GPIO.output(33,1)

except KeyboardInterrupt:
	GPIO.cleanup() 
	print "==  ARRET == "

