#include<stdio.h>
#include<stdlib.h>

struct Node{

    int DATA;
    struct Node* NEXT;
};

struct Node* head=NULL;

 struct Node* constructNode(int value)
 {
    struct Node* newNode= (struct Node*)malloc(sizeof(struct Node));
    newNode -> DATA = value;
    newNode -> NEXT = NULL;
    return newNode;
 }


struct Node* mergeList(struct Node* list1, struct Node* list2)
{
        struct Node* temp=list1;
        while(temp->NEXT!=NULL){

            temp=temp->NEXT;
        }
        temp->NEXT= list2;
        
        return list1;

}




void display(struct Node* list) {
    struct Node* temp = list;
    if (temp == NULL) {
        printf("List is empty\n");
        return;
    }
    else{
         while (temp != NULL) {
            printf("%d -> ", temp->DATA);
            temp = temp->NEXT;
         }
         printf("NULL\n");
    }
    
   
    
}

int main()
{
    struct Node* new1= constructNode(30);
    new1->NEXT = constructNode(20);
    new1->NEXT = constructNode(40);

    struct Node* new2 = constructNode(10);
    new2->NEXT = constructNode(25);
    new2->NEXT = constructNode(35);

    display(new1);
    display(new2);
    struct Node* new = mergeList(new1,new2);
    printf("new merged node\n");
    display(new);
    


    return 0;
}