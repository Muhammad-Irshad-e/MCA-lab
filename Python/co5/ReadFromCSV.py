#Read each row of a given scv file and print their contents.
import csv
x = input('Enter CSV file path:')
file = open(x,"r")
reader = csv.reader(file)
for row in reader:
    print(row)