list=[]
for i in range(1,10+1):
    x=int(input("Enter the number"))
    if x>100:
        list.append("over")
    else:
        list.append(x)
print(list)