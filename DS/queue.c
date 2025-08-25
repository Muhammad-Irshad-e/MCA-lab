#include<stdio.h>
#define max 10

int QUEUE[max],rear=-1,front=-1,item;

void enQueue(){

    if(rear==max-1)
    {
        printf("Queue is full\n");

    }
    
    else{
        if(front==-1){
            front=0;
        }
        printf("Enter the number\n");
        scanf("%d",&item);
        rear=rear+1;
        QUEUE[rear]=item;
    }
}
void deQueue()
{
    if(front==-1 || front>rear)
    {
        printf("Queue empty\n");
        
    }
    else{

        item=QUEUE[front];
        front=front+1;
        printf("Item removed Successfully\n\n");
    }

}
void display(){

    if(front==-1)
    {
        printf("Queue is empty\n\n");

    }
    else{
        printf("Elements in Queue are:\n");
        for(int i=front;i<=rear;i++)
        {   
            int value=QUEUE[i];
            printf("%d\n",value);
        }
    }
}


int main()
{
    int x;
   
    do{
         printf("\n1.Insert \n 2.Delete \n 3.display \n 4.exit\n");
         printf("Choose an option");
         scanf("%d",&x);
        switch(x)
        {
            case 1:enQueue();
                    break;
            
            case 2:deQueue();
            break;

            case 3:display();
            break;

            case 4:
               return 0;
            
            default:
            printf("Invalid Choice\n\n");

        }
       
    }while(1);

    return 0;
}