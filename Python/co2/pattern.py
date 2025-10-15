#Construct a pattern using nested loop

n=int(input("Enter the length:"))
for i in range(n):
    print(" "*(n-i),end="")
    for j in range(i+1):

        print("*",end=" ")
    print()
