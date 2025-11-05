#Write a python dictionary to a csv file, read the csv and display its contents
import csv
data = [{'Name':'Alice','Age':25,'City':'London'},
        {'Name':'Bob','Age':30,'City':'New York'},
        {'Name':'Charlie','Age':28,'City':'Paris'}]
keys = data[0].keys()
with open('Python\co5\output.csv','w',newline='') as output_file:
    dict_writer = csv.DictWriter(output_file,fieldnames=keys)
    dict_writer.writeheader()
    dict_writer.writerows(data)
with open('Python\co5\output.csv','r') as input_file:
    reader = csv.reader(input_file)
    for row in reader:
        print(row)