#include<stdio.h>

int i = 5;
int j;

int foo(int j) {
  for (i=0; i<j; i++)
  return j;
}

void ineedj()
{
	printf("Value of j = %d\n",j);	
}

main() {
  int j;
  j = foo(i);
  ineedj();
}
