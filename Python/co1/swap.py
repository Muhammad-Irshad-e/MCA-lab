x=int(input("Enter first number"))
y=int(input("Enter second number"))
def swap(a,b):
    temp=a
    a=b
    b=temp
    
    print(a,b)
swap(x,y)
