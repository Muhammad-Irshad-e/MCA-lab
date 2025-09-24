import datetime

current_year = datetime.datetime.now().year
final_year = int(input("Enter final year"))
print("Leap years:")
for i in range(current_year,final_year+1):
    if (i%4==0 and i%100!=0) or (i%400==0):
        print(i)