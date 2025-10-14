#include<stdio.h>
#include<stdlib.h>

struct Node{

    int DATA;
    struct Node* NEXT;
};

struct Node* head=NULL;

void insertStart(int value)
{
    struct Node* newNode= (struct Node*)malloc(sizeof(struct Node));
    newNode -> DATA = value;
    newNode -> NEXT = head;
    head = newNode;
    printf("%d Inserted at the Beginning",value);

}

void insertEnd(int value)
{
    struct Node* newNode= (struct Node*)malloc(sizeof(struct Node));
    newNode -> DATA = value;
    newNode -> NEXT = NULL;

    if (head==NULL)
    {
        head=newNode;

    }
    else{
        struct Node* temp=head;
        while(temp->NEXT!=NULL){

            temp=temp->NEXT;
        }
        temp->NEXT=newNode;
    }
    printf("%d Inserted at the End",value);
    
}

void insertAny(int value,int position)
{
    if(position <1)
    {
        printf("Invalid position\n");
        return;
    }
    struct Node* newNode= (struct Node*)malloc(sizeof(struct Node));
    newNode -> DATA = value;
    newNode -> NEXT = NULL;

    if(position==1)
    {
        newNode -> NEXT = head;
        head = newNode;
        printf("%d Inserted at %dth Position",value,position);

    }
    struct Node* temp = head;
    for(int i=1;i < position-1  && temp->NEXT!=NULL;i++)
    {
        temp=temp->NEXT;
    }
    if (temp == NULL) {
        printf("Position %d out of range\n", position);
        free(newNode);
        return;
    }

    newNode->NEXT=temp->NEXT;
    temp->NEXT=newNode;
    printf("%d Inserted at %dth Position",value,position);


}

void deleteNode(int value)
{
    struct Node* temp=head;
    struct Node* prev=NULL;

    if (temp != NULL && temp->DATA == value) {
        head = temp->NEXT;
        free(temp);
        printf("%d deleted\n", value);
        return;
    }

    while (temp != NULL && temp->DATA != value) {
        prev = temp;
        temp = temp->NEXT;
    }

    if (temp == NULL) {
        printf("%d not found\n", value);
        return;
    }

    prev->NEXT = temp->NEXT;
    free(temp);
    printf("%d deleted\n", value);    
}

void display() {
    struct Node* temp = head;
    if (temp == NULL) {
        printf("List is empty\n");
        return;
    }

    printf("Linked List: ");
    while (temp != NULL) {
        printf("%d -> ", temp->DATA);
        temp = temp->NEXT;
    }
    printf("NULL\n");
}

int main()
{
    int x;
    int value,position;
    do{

        printf("Singly linked list operations \n\n")
         printf("\n 1.Insert at the Beginning \n 2.Insert at the End\n 3.Insert at Other Positions\n  4.Delete \n 5.display \n 6.exit\n");
         printf("Choose an option");
         scanf("%d",&x);
        switch(x)
        {
            case 1:
                    printf("Enter the value");
                    scanf("%d",&value);
                    insertStart(value);
                    break;
            
            case 2:
                    printf("Enter the value");
                    scanf("%d",&value);
                    insertEnd(value);
                    break;

            case 3:
                    printf("Enter the value");
                    scanf("%d",&value);
                    printf("\nEnter the position");
                    scanf("%d",&position);
                    insertAny(value,position);
                    break;

            case 4:
                    printf("Enter the value");
                    scanf("%d",&value);
                    deleteNode(value);
                    break;

            case 5:
                   
                    display();
                    break;

            case 6:
               return 0;
            
            default:
            printf("Invalid Choice\n\n");

        }
        
    }while(1);

    return 0;
}