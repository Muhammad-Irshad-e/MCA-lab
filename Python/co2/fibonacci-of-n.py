#Fibonacci series of N terms

n = int(input("Enter the number:"))

def fib(n):
    if n<=1:
        return 1
    else:
        return fib(n-1)+fib(n-2)
print("fibonacci series:")
for i in range(n):
    print(fib(i), end=", ")
