import pyrebase
import sys

firebaseConfig = {
  "apiKey": "AIzaSyDgPO_M_b8CezbOCfS3UndPd89_W8vZawY",
  "authDomain": "evasbottrainintent.firebaseapp.com",
  "databaseURL": "https://evasbottrainintent-default-rtdb.firebaseio.com",
  "projectId": "evasbottrainintent",
  "storageBucket": "evasbottrainintent.appspot.com",
  "messagingSenderId": "474135742583",
  "appId": "1:474135742583:web:a32e85f5637171e0df9e72"
};
firebase = pyrebase.initialize_app(firebaseConfig)
database = firebase.database()

# input_intent = $input_intentt 
z = 1

# read input intent from list to string
s = sys.argv[1:-1]
input_intent = ' '.join([str(elem) for elem in s])
option_chosen= (sys.argv[-1])

print("\ninput intent",input_intent)
print("\noption chosen", option_chosen)
# print("y:",len(y))
# TAG ITU ADA option_chosen
# option_chosen = "greeting" # INTENT option_chosen

for x in range(52):

    # 0. if input Greeting
    if option_chosen == "greeting":
            y= database.child("intents").child("0").child("patterns").get("patterns").val()
            # print("y:",len(y))
            z=len(y)
            data=   {
                      z:input_intent
                      }
            database.child("intents").child("0").child("patterns").update(data, "patterns")
            print("Helloworld")
            break

    # 1. if input goodbye                
    if option_chosen == "goodbye":
          y= database.child("intents").child("1").child("patterns").get("patterns").val()
          print("y:",len(y))
          z=len(y)
        
          data=   {
                    z:input_intent
                    }
          database.child("intents").child("1").child("patterns").update(data, "patterns")
          print("Helloworld")
          break
    
    # 2. if input thanks
    if option_chosen == "thanks":
          y= database.child("intents").child("2").child("patterns").get("patterns").val()
          print("y:",len(y))
          z=len(y)
        
          data=   {
                    z:input_intent
                    }
          database.child("intents").child("2").child("patterns").update(data, "patterns")
          print("Helloworld")
          break

    # 3. if input booking
    if option_chosen == "booking":
      y= database.child("intents").child("3").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("3").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
  
    # 4. if input cancel
    if option_chosen == "cancel":
        y= database.child("intents").child("4").child("patterns").get("patterns").val()
        print("y:",len(y))
        z=len(y)
      
        data=   {
                  z:input_intent
                  }
        database.child("intents").child("4").child("patterns").update(data, "patterns")
        print("Helloworld")
        break

    # 5. if input payments
    if option_chosen == "payments":
      y= database.child("intents").child("5").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("5").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 6. if input cara_pesan
    if option_chosen == "cara_pesan":
      y= database.child("intents").child("6").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("6").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 7. if input ability
    if option_chosen == "ability":
      y= database.child("intents").child("7").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("7").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 8. if input language
    if option_chosen == "language":
      y= database.child("intents").child("8").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("8").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 9. if input rules
    if option_chosen == "rules":
      y= database.child("intents").child("9").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("9").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
  
    # 10. if input negative
    if option_chosen == "negative":
      y= database.child("intents").child("10").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("10").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
      
    # 11. if input sorry
    if option_chosen == "sorry":
      y= database.child("intents").child("11").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("11").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 12. if input dining
    if option_chosen == "dining":
      y= database.child("intents").child("12").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("12").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 13. if input location
    if option_chosen == "location":
      y= database.child("intents").child("13").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("13").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 14. if input room_model
    if option_chosen == "room_model":
      y= database.child("intents").child("14").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("14").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 15. if input see_order
    if option_chosen == "see_order":
      y= database.child("intents").child("15").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("15").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 16. if input kepas_name
    if option_chosen == "kepas_name":
      y= database.child("intents").child("16").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("16").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 17. if input identity
    if option_chosen == "identity":
      y= database.child("intents").child("17").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("17").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
      
    # 18. if input robot
    if option_chosen == "robot":
      y= database.child("intents").child("18").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("18").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 19. if input asrama
    if option_chosen == "asrama":
      y= database.child("intents").child("19").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("19").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 20. if input help
    if option_chosen == "help":
      y= database.child("intents").child("20").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("20").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 21. if input time
    if option_chosen == "time":
      y= database.child("intents").child("21").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("21").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 22. if input date
    if option_chosen == "date":
      y= database.child("intents").child("22").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("22").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
    
    # 23. if input day
    if option_chosen == "day":
      y= database.child("intents").child("23").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("23").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 24. if input month
    if option_chosen == "month":
      y= database.child("intents").child("24").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("24").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 25. if input year
    if option_chosen == "year":
      y= database.child("intents").child("25").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("25").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 26. if input age
    if option_chosen == "age":
      y= database.child("intents").child("26").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("26").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 27. if input activity
    if option_chosen == "activity":
      y= database.child("intents").child("27").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("27").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 28. if input laugh
    if option_chosen == "laugh":
      y= database.child("intents").child("28").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("28").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 29. if input date
    if option_chosen == "whatsup":
      y= database.child("intents").child("29").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("29").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "gender":
      y= database.child("intents").child("30").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("30").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
    
    # 30. if input date
    if option_chosen == "sad":
      y= database.child("intents").child("31").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("31").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "happy":
      y= database.child("intents").child("32").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("32").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
        
      # 30. if input date
    if option_chosen == "jokes":
      y= database.child("intents").child("33").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("33").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "loves":
      y= database.child("intents").child("34").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("34").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "motivation":
      y= database.child("intents").child("35").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("35").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "alive":
      y= database.child("intents").child("36").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("36").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "chatbot":
      y= database.child("intents").child("37").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("37").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "programming":
      y= database.child("intents").child("38").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("38").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "creator":
      y= database.child("intents").child("39").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("39").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "floor":
      y= database.child("intents").child("40").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("40").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "price":
      y= database.child("intents").child("41").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("41").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "kapasitas":
      y= database.child("intents").child("42").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("42").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "laundry":
      y= database.child("intents").child("43").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("43").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "facility":
      y= database.child("intents").child("44").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("44").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "facility_room":
      y= database.child("intents").child("45").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("45").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "facility_jasmine":
      y= database.child("intents").child("46").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("46").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "facility_jasmine_room":
      y= database.child("intents").child("47").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("47").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "rules_sleep":
      y= database.child("intents").child("48").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("48").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "rules_bath":
      y= database.child("intents").child("49").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("49").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "yes":
      y= database.child("intents").child("50").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("50").child("patterns").update(data, "patterns")
      print("Helloworld")
      break

    # 30. if input date
    if option_chosen == "no":
      y= database.child("intents").child("51").child("patterns").get("patterns").val()
      print("y:",len(y))
      z=len(y)
    
      data=   {
                z:input_intent
                }
      database.child("intents").child("51").child("patterns").update(data, "patterns")
      print("Helloworld")
      break
