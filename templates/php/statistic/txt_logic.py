import json
from wordcloud import WordCloud
from wordcloud import STOPWORDS
from wordcloud import ImageColorGenerator
import pandas as pd
import matplotlib.pylab as plt
from PIL import Image
import numpy as np

import pyrebase
firebaseConfig = {
  "apiKey": "AIzaSyDBz8QAajBpjDsgPMHNvih1UNrYBB0_L4k",
  "authDomain": "chatinput.firebaseapp.com",
  "databaseURL": "https://chatinput-default-rtdb.firebaseio.com",
  "projectId": "chatinput",
  "storageBucket": "chatinput.appspot.com",
  "messagingSenderId": "360592263669",
  "appId": "1:360592263669:web:2ed28f1e88342a96b8f8bc"
};

firebase = pyrebase.initialize_app(firebaseConfig)
database = firebase.database()

xxx = database.get()
# print(xxx.val())
saved= xxx.val()

db = firebase.database()
new = ""

#Mengambil nilai "tag"
output = db.child("chat").get()

for user in output.each():
    x = (user.key())
    hehe=db.child("chat").child(x).child("PredictedIntent").get()
    # print("hehe:",hehe)
    intent = hehe.val()
    # print("intent:", intent)
    new = new + ' ' + intent
    # print(new)

print(new)

#Open and read the file after the appending:
#Buat/write file "history_intent.txt"
File = open("C:/xampp/htdocs/elsven_evas1/evasbot/extractor/templates/php/statistic/history_intent.txt", 'w')
test = File.write(new)
File.close()