#include <stdio.h>
#include <stdlib.h>


struct node {
	int data;
	struct node *next;
};


int size = 0, flag = 0;
struct node *head = NULL;
struct node *newnode, *delnode, *temp;



void deletion();
void display(struct node *ptr);


void main() {
	int choice;
	while (1) {
		printf(" \n1. display \n2. insert at the beginning, \n3. insert at the end \n4. insert at any position \n5. delete from beginning \n6. delete from end \n7. delete from any position \n8.exit()  ");
		scanf("%d", &choice);
		switch (choice) {
			case 1:
				display(head);
				break;
			case 2:
				insertAtBeginning();
				break;
			case 3:
				insertAtEnd();
				break;
			case 4:
				inserAtAny();
                break;
            case 5:
                delAtBeginning();
                break;
            case 6:
                delAtEnd();
                break;
            case 7:
                delAtAny();
                break;
            case 8:
                return;
			default:
				break;
		}
	}
}


// Insertion
void insertAtBeginning() {
    temp = head;
	newnode = (struct node *) malloc(sizeof(struct node));
	printf("Element: ");
	scanf("%d", &newnode->data);

	if (head == NULL) {
		head = newnode;
		newnode->next = newnode;
		display(head);
		size++;
		return;
	}
	newnode->next = head;
	while (temp->next != head)
		temp = temp->next;
	temp->next = newnode;
	head = newnode;
    size++;
    display(head);
}
void insertAtEnd() {
    	temp = head;
	newnode = (struct node *) malloc(sizeof(struct node));
	printf("Element: ");
	scanf("%d", &newnode->data);

	if (head == NULL) {
		head = newnode;
		newnode->next = newnode;
		display(head);
		size++;
		return;
	}
	while (temp->next != head)
		temp = temp->next;
	temp->next = newnode;
	newnode->next = head;
    size++;
    display(head);
}
void inserAtAny() {
    temp = head;
	newnode = (struct node *) malloc(sizeof(struct node));
	printf("Element: ");
	scanf("%d", &newnode->data);

	if (head == NULL) {
		head = newnode;
		newnode->next = newnode;
		display(head);
		size++;
		return;
	}
	int position;
	printf("Enter the position to insert into: ");
	scanf("%d", &position);
	if (position <=1 || position > size) {
		printf("Invalid position!\n");
		return;
	}
	temp = head;
	int i = 2;
	while (i < position) {
		temp = temp->next;
		i++;
	}
	newnode->next = temp->next;
	temp->next = newnode;
    size++;

    display(head);
}		


// Deletion
void delAtBeginning() {
    temp = head;

	if (head == NULL)
		return;

	if (head->next == head) {
		head = NULL;
		free(temp);
		display(head);
		return;
	}
	
	delnode = head;
	while (temp->next != head)
		temp = temp->next;
	head = head->next;
	temp->next = head;
    display(head);
	free(delnode);
	size--;
}
void delAtEnd() {
    temp = head;

	if (head == NULL)
		return;

	if (head->next == head) {
		head = NULL;
		free(temp);
		display(head);
		return;
	}
	
	while (temp->next->next != head)
		temp = temp->next;
	delnode = temp->next;
	temp->next = head;
    display(head);
	free(delnode);
	size--;
}
void delAtAny(){

    temp = head;

	if (head == NULL)
		return;

	if (head->next == head) {
		head = NULL;
		free(temp);
		display(head);
		return;
	}
	
	int position;
	printf("Position: ");
	scanf("%d", &position);
	if (position >= size || position <= 1) {
		printf("Invalid!\n");
		return;
	}

	int i = 2;
	while (i < position) {
		temp = temp->next;
		i++;
	}	

	delnode = temp->next;
	temp->next = delnode->next;
    display(head);
	free(delnode);
	size--;
}


void display(struct node *ptr) {

	// If empty
	if (head == NULL) {
		printf("NULL\n");
		return;
	}
	if (ptr->next == head) {
		printf("%d\n", ptr->data);
		return;		
	}
	printf("%d -> ", ptr->data);
	
	display(ptr->next);
}






