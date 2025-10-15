#Arithmetic Operations
x=int(input("Enter first number"))
y=int(input("Enter second number"))
i=int(input("Enter 1 to add, 2 to subtract, 3 to multiply and 4 divide"))
if i==1:
    print(x,"+",y,"=",x+y)

elif i==2:
    print(x,"-",y,"=",x-y)
elif i==3:
    print(x,"*",y,"=",x*y)

elif i==4:
    print(x,"/",y,"=",x/y)
else:
    print("invlaid input")

