list=[]
n=int(input("enter the list limit:"))
def positive_list(n):
    for i in range(n):
        x=int(input("enter number to add to the list"))
        list.append(x)
    li=[i for i in list if i>0]
    print(li)
positive_list(n)