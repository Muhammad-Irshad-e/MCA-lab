
def countDisplay(text):
    words=text.lower().split()
    word_count={}
    for word in words:
        new_words=''.join(x for x in word if x.isalnum())
        if new_words in word_count:
            word_count[new_words] +=1
        else:
            word_count[new_words]=1
            
    return word_count
   

str= input("Enter the string")
out=countDisplay(str)
print(out)