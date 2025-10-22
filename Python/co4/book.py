class Publisher:
    def __init__(self,name):
        self.name = name
    
    def display(self):
        print(f"Publisher:{self.name}")

class Book(Publisher):
    def __init__(self, name,title,author):
        super().__init__(name)
        self.title = title
        self.author = author
    #method overriding
    def display(self):
        print(f"Title :{self.title}\nAuthor:{self.author}")
        super().display()
        
class Ds(Book):
    def __init__(self, name, title, author,prize,page_no):
        super().__init__(name, title, author)
        self.prize = prize
        self.page_no = page_no
    
     #method overriding
    def display(self):
        super().display()
        print(f"Prize :${self.prize}\n{self.page_no} Pages.")
        
b = Ds(name="CET",title="Data Structure",author="Rashid",prize=40.98,page_no=256)
b.display()
    