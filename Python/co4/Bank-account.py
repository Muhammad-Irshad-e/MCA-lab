#Bank account (Constructor and methods)

class Account:
    def __init__(self,acc_no,name,acc_type,bal):
        self.acc_no = acc_no
        self.name = name
        self.acc_type = acc_type
        self.bal = bal
    
    def deposit(self,amount):
        self.bal+=amount
        print(f"Deposited Rs.{amount} successfully")
        print(f"Your Balance:{self.bal}")
    
    def withdraw(self,amount):
        if amount>self.bal:
            print("Insufficient Balance")
        else:
            self.bal-=amount
            print(f"Withdrawn Rs.{amount} successfully") 
            print(f"Your Balance:{self.bal}")


    
    def display(self):
        print(f"Account Number:{member.acc_no :10}\nName:{member.name :10}\nAccount Type:{member.acc_type :10}")
            
        
Account_number = input("Enter the Account Number:")
Name = input("Enter the name:")
Account_type = input("Enter the Account Type:")

member = Account(Account_number,Name,Account_type,0)


while True:
    
    transaction = int(input("Enter 1 to deposit, 2 to withdraw and 3 to End:"))
    if transaction == 1:
        member.deposit(int(input("Enter the amount to deposit:")))
        
    elif transaction == 2:
        member.withdraw(int(input("Enter the amount to withdraw:")))
        
    elif transaction == 3:
         exit()      
    else:
        print("Invalid option!!")
    