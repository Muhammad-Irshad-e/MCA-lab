#include<stdio.h>
#include<limits.h>
#define MAX 10

void prims(int cost[MAX][MAX] , int n)
{
    int visited[MAX] = {0};
    int total_cost = 0;
    int no_of_edges = 0;
    visited[0] = 1;
    printf("Edges\tcost\n");
    while(no_of_edges < n-1)
    {
        int x = 0 , y = 0;
        int min = INT_MAX;
        for(int i = 0; i < n; i++)
        {
            if(visited[i] == 1)
            {
                for(int j = 0;j < n; j++)
                {
                    if(!visited[j] && cost[i][j] < min)
                    {
                        min = cost[i][j];
                        x = i;
                        y = j;
                    }
                }
            }
        }
        printf("\n%d->%d\t%d",x+1,y+1,cost[x][y]);
        visited[y] = 1;
        total_cost += cost[x][y];
        no_of_edges++;

    }
    printf("\nTotal minimum cost:%d",total_cost);

}
int main()
{
    int vertices;
    int cost[MAX][MAX];

    printf("Enter the number of vertices:");
    scanf("%d",&vertices);
    printf("\nEnter the j cost matrix of (%dx%d)\n",vertices,vertices);
    for(int i=0;i < vertices; i++)
    {
        for(int j = 0; j < vertices; j++)
        {
            scanf("%d",&cost[i][j]);
            if(cost[i][j] == 0)
            {
                cost[i][j] = INT_MAX;
            }
        }
    }
    prims(cost , vertices);
    return 0;
}