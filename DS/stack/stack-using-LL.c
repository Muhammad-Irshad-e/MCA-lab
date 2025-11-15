#include <stdio.h>
#include <stdlib.h>

struct Node{

    int DATA;
    struct Node* NEXT;
};

struct Node* top=NULL;


void push(int value)
{
    struct Node* newNode= (struct Node*)malloc(sizeof(struct Node));
    newNode -> DATA = value;
    newNode -> NEXT = top;
    top = newNode;
    printf("%d Pushed onto stack\n",value);

}
void pop()
{
    if (top == NULL) {
        printf("Stack Underflow\n");
        return;
    }
    struct Node* temp = top;
    top = top->NEXT;
    printf("%d Popped from stack\n", temp->DATA);
    free(temp);
}
void display() {
    struct Node* temp = top;
    if (temp == NULL) {
        printf("Stack is empty\n");
        return;
    }

    printf("Stack (top to bottom): ");
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
                    push(value);
                    break;
            
            case 2:
                    pop();
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
    return 0;
}