#include<stdio.h>
#include<stdlib.h>
#define max 10

int queue[max];
int rear = -1 , front =-1;

void enqueue(int vertex)
{
    if(rear == max-1)
    {
        printf("Queue Full!");
    }
    else{

        if(front == -1)
            front = 0;
        queue[++rear] = vertex;
    }
}

int dequeue()
{
    if(front == -1 || front > rear)
    {
        printf("Queue Underflow!");
        return -1;
    }
    return queue[front++];
}
int isEmpty()
{
    return (front == -1 || front>rear);
}

void BFS(int adj[max][max],int vertices,int start)
{
    int visited[max] = {0};
    visited[start] = 1;
    enqueue(start);
    while(!isEmpty())
    {
        int current = dequeue();
        printf("%d ",current);
        for(int i = 0; i<vertices ; i++)
        {
            if(adj[current][i]==1 && visited[i] == 0)
            {
                visited[i] =1;
                enqueue(i);
            }
        }
    }
    printf("\n");

}

int main()
{
    int vertices,start;
    int adj[max][max];

    printf("Enter the no.of Vertices :");
    scanf("%d",&vertices);
    printf("\nEnter the adjecency matrix of (%d x %d):\n",vertices,vertices);
    for(int i=0;i<vertices;i++)
    {
        for(int j=0;j<vertices;j++)
        {
            scanf("%d",&adj[i][j]);
        }
    }


    printf("\nEnter the vertex to start the searching:");
    scanf("%d",&start);

    BFS(adj,vertices,start);
    
    return 0;
}
