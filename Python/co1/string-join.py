#Create a single string from two strings, swapping the characters at position 1
str1 = input("Enter the first string:")
str2 = input("Enter the second string:")


str=str1[0]+str2[1]+str1[2:]+" "+str2[0]+str1[1]+str2[2:]
print(str)

