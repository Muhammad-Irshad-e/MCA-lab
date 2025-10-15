#Add 'ing' at the end of a given string. If it already ends with 'ing', add 'ly'
str = input("Enter the string:")
def update(str):
    if(str[-3:]=="ing"):
        return str+"ly"
    else:
        return str+"ing"
print(update(str))