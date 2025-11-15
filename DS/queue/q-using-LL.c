#include <stdio.h>
#include <stdlib.h>

struct Node{

    int DATA;
    struct Node* NEXT;
};

struct Node* head=NULL;


void insertRear(int value)
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
    printf("%d Inserted at the Rear of Queue\n",value);
    
}
void deleteNode()
{
    if (head == NULL) {
        printf("Queue Underflow\n");
        return;
    }
    struct Node* temp = head;
    head = head->NEXT;
    printf("%d Deleted from Front of Queue\n", temp->DATA);
    free(temp);
}
void display() {
    struct Node* temp = head;
    if (temp == NULL) {
        printf("Queue is empty\n");
        return;
    }

    printf("Queue (front to rear): ");
    while (temp != NULL) {
        printf("%d -> ", temp->DATA);
        temp = temp->NEXT;
    }
    printf("NULL\n");
}


int main() {
    int x;
    int value;
    do{

         printf("\nQueue using linked list operations \n\n");
         printf("\n 1.Insert \n 2.Delete \n 3.display \n 4.exit\n");
         printf("Choose an option");
         scanf("%d",&x);
        switch(x)
        {
            case 1:
                    printf("Enter the value");
                    scanf("%d",&value);
                    insertRear(value);
                    break;

            case 2:
                    deleteNode();
                    break;

            case 3:
                    display();
                    break;

            case 4:
               return 0;

            default:
            printf("Invalid Choice\n\n");

        }

    }while(1);
}