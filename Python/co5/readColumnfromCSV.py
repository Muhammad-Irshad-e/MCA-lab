#Read specific columns of a given scv file and print their contents.
import csv
file = open(input("File path:"),"r")
reader = csv.reader(file)
for row in reader:
    print(row[0],row[2])