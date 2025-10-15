#sorting dictionary in ascending and descending order
d={3:"orange",2:"apple",5:"pineapple",1:"banana"}

print(dict(sorted(d.items())))

print(dict(reversed(sorted(d.items()))))