/*
to print the fibonacii numbers in between 1 to n
*/
function fibonacii(n)
{
	var a=0,b==1,c;
	while(b < n )
	{
		document.write(b+"<br/>");
		c=a+b;
		a=b;
		b=c;
	}
}