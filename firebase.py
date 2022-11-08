#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Thu Oct 27 00:21:22 2022

@author: elshadairampengan
"""

import pyrebase

firebaseConfig={
    "apiKey": "AIzaSyBzkSFyssx0-CNKaiuHieWB-NFuD0hCwYo",
    "authDomain": "realtimedbevas.firebaseapp.com",
    "projectId": "realtimedbevas",
    "databaseURL": "https://realtimedbevas-default-rtdb.firebaseio.com/",
    "storageBucket": "realtimedbevas.appspot.com",
    "messagingSenderId": "993658685023",
    "appId": "1:993658685023:web:6c5de02db507349d5abdea"}

firebase=pyrebase.initialize_app(firebaseConfig)

db = firebase.database()

# # Push data
# data={"name":"John", "age":20}
# db.child("users").push(data)

# # Create our own key
# data={"age": 21}
# db.child("users").set(data)

# Retrieve Data
users = db.child("users").get()
# print(users.val())
print(users.key())

