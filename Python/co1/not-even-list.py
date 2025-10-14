n = int(input("Enter the no.of elements:"))
list1 =[]
for i in range(n):
    num=int(input())
    list1.append(num)
list2 = [x for x in list1 if x%2!=0 ]
print(list2)