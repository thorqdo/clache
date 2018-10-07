#from pyzbar.pyzbar import ZBarSymbol
from PIL import Image
from pyzbar.pyzbar import ZBarSymbol, decode

d = decode(Image.open('Code found.png'),symbols=[ZBarSymbol.QRCODE])
print ("qr code decoded..")
# print(d,"\n")
print("And\n")
l = len(d)
t = type(d)
print(l,t)
for i in range (0,l):
	print (d[i])
print("\nend")
