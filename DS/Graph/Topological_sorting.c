//Topological Sorting using Indegree Method
#include<stdio.h>
#include<stdlib.h>
#define MAX 10

int queue[MAX];
int rear = -1 ,front = -1;

void enqueue(int vertex) {
    if (rear == MAX - 1)
        printf("Queue is full!\n");
    else {
        if (front == -1)
            front = 0;
        queue[++rear] = vertex;
    }
}

int dequeue() {
    if (front == -1 || front > rear)
        return -1;
    else
        return queue[front++];
}
int empty()
{
    return(front == -1 || front > rear);
}
void topoLogicalSort(int adj[MAX][MAX], int vertices)
{
    int indegree[MAX] = {0};
    int count = 0;
    for(int i=0;i<vertices;i++)
    {
        for(int j=0;j<vertices;j++)
        {
            if(adj[i][j]==1)
            {
                indegree[j]++;
            }
        }
    }

    for(int i=0; i<vertices;i++){
        if(indegree[i]==0)
        {
            enqueue(i);
        }
    }

    while(!empty())
    {
        int current = dequeue();
        printf("%d\t",current);
        for(int i=0;i<vertices;i++)
        {
            if(adj[current][i]==1)
            {
                indegree[i]--;
                if(indegree[i]==0)
                {
                    enqueue(i);
                }
            }
        }
        count ++; 
        
    }
    if (count != vertices)
        printf("Graph has cycle! Topological sort not possible!\n");
    else
        printf("\n");
}

int main()
{
    int vertices;
    int adj[MAX][MAX] = {0};
    printf("Enter the no.of vertices :");
    scanf("%d",&vertices);
    printf("Enter the adjacency matrix of (%d x %d)",vertices,vertices);
    for(int i = 0; i < vertices; i++)
    {
        for(int j=0;j<vertices;j++)
        {
            scanf("%d",&adj[i][j]);
        }
    }
    topoLogicalSort(adj,vertices);
    return 0;
}