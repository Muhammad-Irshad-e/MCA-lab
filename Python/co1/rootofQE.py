import math
import cmath
def root(a,b,c):
    d =b**2 -4*a*c
    if d>0:
        r1 = (-b + math.sqrt(d)) /2*a
        r2 = (-b - math.sqrt(d)) /2*a
    elif d == 0:
        r1 = (-b) /2*a
        r2 = (-b) /2*a
    else:
        r1 = (-b + cmath.sqrt(d)) /2*a
        r2 = (-b - cmath.sqrt(d)) /2*a

    print(f"root1:{r1} and root2:{r2}")

a=4
b=-3
c=2
root(a,b,c)