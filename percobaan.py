#!/usr/bin/env python3
# import pyrebase
import string


data = {"var1": "abdul", "lastname": "elsha"}
try:
    import pandas
except Exception as e:
    print(e.__repr__())
try:
    import joblib
except Exception as e:
    print(e.__repr__())

try:
    import string
except Exception as e:
    print(e.__repr__())

try:
    import pickle
except Exception as e:
    print(e.__repr__())

try:
    from sklearn.svm import SVC
except Exception as e:
    print(e.__repr__())

try:
    from sklearn.svm import LinearSVC
except Exception as e:
    print(e.__repr__())

try:
    from sklearn.pipeline import make_pipeline
except Exception as e:
    print(e.__repr__())

try:
    from sklearn.calibration import CalibratedClassifierCV
except Exception as e:
    print(e.__repr__())

try:
    from sklearn.feature_extraction.text import TfidfVectorizer
except Exception as e:
    print(e.__repr__())


print(data)
exit
