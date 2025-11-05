#Copy odd lines of one file to another.
newfile = open("Hello2.txt","w")
file = open("Python\co5\Hello1.txt","r")
lines = file.readlines()
for i in range(len(lines)):
    if i % 2 == 0:
        newfile.write(lines[i])
    
