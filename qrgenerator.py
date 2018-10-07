import pyqrcode
import sys
from datetime import datetime


def qrcode():
    x = sys.argv[1]
   
    # y = datetime.now().strftime("%H:%M:%S %d-%m-%Y")
    q = pyqrcode.create(x)
    q.png('student.png', scale=8)
   

if __name__== '__main__':
    qrcode()
