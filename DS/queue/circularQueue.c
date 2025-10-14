#include <stdio.h>

#define size 5


void display();
int enqueue();
int dequeue();
int IsEmpty();
int IsFull();


int queue[size];
int front = -1;
int rear = -1;


void main() {
	while (1) {
		int choice;
		printf(" \n1.display \n2. enqueue \n3. dequeue, \n4. exit: ");
		scanf("%d", &choice);
		switch(choice) {
			case 1:
				display();
				break;
			case 2:
				enqueue();
				break;
			case 3:
				dequeue();
				break;
			case 4:
				return;
			default:
				break;
		}
	}
}


void display() {
    if (IsEmpty()) {
        printf("Queue is empty!\n");
        return;
    }
	for (int i = front; i != rear; i = (i + 1) % size)
		printf("%d ", queue[i]);
	printf("%d\n", queue[rear]);
}


int enqueue() {
	if (IsFull()) {
		printf("Overflow!\n");
		return 1;
	}
	int value;
	printf("Element: ");
	scanf("%d", &value);	
	if (IsEmpty())
		front =  0;
	rear = (rear + 1) % size;
	queue[rear] = value;
    display();
	return value;
}

int dequeue() {
	if (IsEmpty()) {
		printf("Underflow!\n");
		return 1;
	}
	int value = queue[front];
	if (front == rear) {
		front = rear = -1;
	}
	else {
		front = (front + 1) % size;
	}
    display();
	return value;
}


int IsFull() {
	if ((rear + 1) % size == front)
		return 1;
	return 0;
}

int IsEmpty() {
	if (front == -1)
		return 1;
	return 0;
}