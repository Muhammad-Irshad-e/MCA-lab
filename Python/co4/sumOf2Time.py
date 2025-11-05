#Create a class Time with attributes hours , minutes and seconds.Overload + operator to find sum of two time .
class Time:
    def __init__(self,hour,minute,second):
        self.__hour = hour
        self.__minute = minute
        self.__second = second
    
    def __add__(self,other):
        h = self.__hour + other.__hour
        m = self.__minute + other.__minute
        s = self.__second + other.__second
        
        if s>=60:
            s = s % 60
            m+=1
        
        if m >= 60:
            m %= 60
            h+=1
        
        
        return Time(h,m,s)
    
    def __str__(self):
        return f"{self.__hour:02d}:{self.__minute:02d}:{self.__second:02d}"    

t1 = Time(12,42,34)
t2 = Time(3,22,28)
t = t1 + t2
print(t)           