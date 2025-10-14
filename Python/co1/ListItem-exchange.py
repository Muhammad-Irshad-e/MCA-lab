str=input("Enter a list of colours seperated by commas")
li=str.split(sep=",")
n=len(li)
print(f"first colour:{li[0]} \n last colour:{li[n-1]}")