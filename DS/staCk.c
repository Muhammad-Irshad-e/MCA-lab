#include <stdio.h>
#define max 5
int stack[max],top=-1,item;
void push()
{
    if(top==max-1)
    {
        printf("stack Overflow");

    }
    else
    {
        printf("Enter the number\n");
        scanf("%d",&item);
        top=top+1;
        stack[top]=item;
    }
}
void pop()
{
    if(top==-1)
    {
        printf("stack underflow");
        
    }
    else{

        item=stack[top];
        top--;
        printf("Item Popped Successfully");
    }

}
void display(){

    if(top==-1)
    {
        printf("stack is empty");

    }
    else{
        printf("Elements in stack are:\n");
        for(int i=0;i<=top;i++)
        {   
            int value=stack[i];
            printf("%d\t",value);
        }
    }
}
int main()
{
    int x;
   
    do{
         printf("\n1.Push \n 2.Pop \n 3.display \n 4.exit\n");
         printf("Choose an option");
         scanf("%d",&x);
        switch(x)
        {
            case 1:push();
                    break;
            
            case 2:pop();
            break;

            case 3:display();
            break;

            case 4:
               return 0;
            
            default:
            printf("Invalid Choice");

        }
        
    }while(1);

    return 0;
}