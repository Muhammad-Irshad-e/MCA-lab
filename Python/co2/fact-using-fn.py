#Factorial using function
n = int(input("Enter the number"))

def factorial(n):
    if n==1:
        return 1
    else:
        return n*factorial(n-1)
    
print(f"Factorial of {n}:",factorial(n))