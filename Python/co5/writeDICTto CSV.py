#Write a python dictionary to a csv file, read the csv and display its contents
import csv
data = {'Name':['Ali','Ahsan','Ahmed','Owais'],
        'Age':[23,25,22,24],
        'City':['Lahore','Karachi','Islamabad','Multan']}
file = open("Python\co5\dictdata.csv","w",newline='')
writer = csv.writer(file)
writer.writerow(data.keys())
for i in range(len(data['Name'])):
    row = []
    for key in data.keys():
        row.append(data[key][i])
    writer.writerow(row)
