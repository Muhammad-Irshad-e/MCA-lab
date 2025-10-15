#character frequency 
str = input("Enter the string:")
def charFrequency(str,x):
    count=0
    for i in str:
        if i==x:
            count+=1
        
    return count

frequency = {x:charFrequency(str,x) for x in str}
print(frequency)